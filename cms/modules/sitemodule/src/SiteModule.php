<?php
/**
 * Site module for Craft CMS 3.x
 *
 * Custom site module
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace modules\sitemodule;

use Craft;
use craft\commerce\elements\Order;
use craft\commerce\events\LineItemEvent;
use craft\commerce\events\SubscriptionEvent;
use craft\commerce\services\LineItems;
use craft\commerce\services\Subscriptions;
use craft\commerce\events\CancelSubscriptionEvent;
use craft\commerce\stripe\base\Gateway;
use craft\commerce\stripe\base\SubscriptionGateway as StripeGateway;
use craft\commerce\stripe\events\BuildGatewayRequestEvent;
use craft\commerce\stripe\events\SubscriptionRequestEvent;
use craft\commerce\events\AddressEvent;
use craft\commerce\services\Addresses;
use craft\console\Application;
use craft\events\RegisterTemplateRootsEvent;
use craft\i18n\PhpMessageSource;
use craft\web\twig\variables\CraftVariable;
use craft\web\View;
use modules\sitemodule\assetbundles\sitemodule\SiteModuleAsset;
use modules\sitemodule\services\Helper;
use modules\sitemodule\services\Keap;
use modules\sitemodule\variables\SiteVariable;
use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\base\Module;

/**
 * Class SiteModule
 *
 * @author    nystudio107
 * @package   SiteModule
 * @since     1.0.0
 *
 * @property Helper helper
 * @property Keap keap
 */
class SiteModule extends Module
{
    // Static Properties
    // =========================================================================

    /**
     * @var SiteModule
     */
    public static $instance;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@modules/sitemodule', $this->getBasePath());
        $this->controllerNamespace = 'modules\sitemodule\controllers';

        // Translation category
        $i18n = Craft::$app->getI18n();
        /** @noinspection UnSafeIsSetOverArrayInspection */
        if (!isset($i18n->translations[$id]) && !isset($i18n->translations[$id . '*'])) {
            $i18n->translations[$id] = [
                'class' => PhpMessageSource::class,
                'sourceLanguage' => 'en-US',
                'basePath' => '@modules/sitemodule/translations',
                'forceTranslation' => true,
                'allowOverrides' => true,
            ];
        }

        // Listen for updated addresses from the user account page.
        Event::on(Addresses::class, Addresses::EVENT_AFTER_SAVE_ADDRESS, function(AddressEvent $e) {
            $update_stripe = isset($_POST['updateStripeUser']);
            if ($update_stripe && Craft::$app->getUser()->getIdentity()) {
                $this->helper->updateStripeCustomer($e);
            }
        });

        // Base template directory
        Event::on(View::class, View::EVENT_REGISTER_CP_TEMPLATE_ROOTS, function (RegisterTemplateRootsEvent $e) {
            if (is_dir($baseDir = $this->getBasePath() . DIRECTORY_SEPARATOR . 'templates')) {
                $e->roots[$this->id] = $baseDir;
            }
        });

        // Set this as the global instance of this module class
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$instance = $this;

        if (Craft::$app instanceof Application) {
            $this->controllerNamespace = 'modules\sitemodule\console\controllers';
        }

        Event::on(Order::class, Order::EVENT_AFTER_COMPLETE_ORDER, function (Event $e) {
            /* @var Order $order */

            /*
             * Temporarily remove until we can resolve the Keap
             * situation with Brian.
             *
            $order = $e->sender;

            if ((!isset($_POST['firstName'])) || (!isset($_POST['lastName']))) {
                Craft::error('Order was submitted without first and/or last name in POST', __METHOD__);
                return;
            }

            $this->keap->prepInfusionClient();

            if (!$id = $this->keap->getContactId($order->getEmail())) {
                $id = $this->keap->addContact($order->getEmail(), $_POST['firstName'], $_POST['lastName']);
            }

            $this->keap->achieveGoal($id, 'oneTimeDonation');
            */
        });

        // Send custom metadata to stripe so we know who is receiving the donation.
        Event::on(Gateway::class, Gateway::EVENT_BUILD_GATEWAY_REQUEST, function (BuildGatewayRequestEvent $event) {
            $charityName = $_POST['charityName'];
            if (!empty($charityName)) {
                $event->request['metadata[Charity Name]'] = $charityName;
            }
        });

        Event::on(StripeGateway::class, StripeGateway::EVENT_BEFORE_SUBSCRIBE, function (SubscriptionRequestEvent $e) {
            $amount = $_POST['amount'];

            if (empty($amount)) {
                Craft::error('Amount field is missing from POST for subscription', __METHOD__);
                return false;
            }

            if ($amount % 10 !== 0) {
                Craft::$app->session->setFlash('error', 'Donation amount must be a multiple of 10.');
                return false;
            }

            if ($amount < 10) {
                Craft::$app->session->setFlash('error', 'Donation amount must be at least $10.');
                return false;
            }

            $e->parameters['items'][0]['quantity'] = $amount / 10;
            return true;
        });

        // Make sure all subscription cancelations are immediate.
        Event::on(Subscriptions::class, Subscriptions::EVENT_BEFORE_CANCEL_SUBSCRIPTION, function(CancelSubscriptionEvent $e) {
            $e->parameters['cancelImmediately'] = true;
        });

        Event::on(Subscriptions::class,Subscriptions::EVENT_AFTER_CREATE_SUBSCRIPTION, function (SubscriptionEvent $e) {

            $donation_quantity = $_POST['amount'] / 10;
            $e->subscription->setFieldValue('subscriptionQuantity', (int)$donation_quantity);
            Craft::$app->elements->saveElement($e->subscription);

            $order = $e->subscription->getOrder();

//            $this->keap->prepInfusionClient();

//            if (!$id = $this->keap->getContactId($order->getEmail())) {
//                $id = $this->keap->addContact($order->getEmail(), $_POST['firstName'], $_POST['lastName']);
//            }

//            $this->keap->achieveGoal($id, 'becomeMonthlyDonor');
        });

        // Empty the cart before adding a new line item to it.
        Event::on(LineItems::class, LineItems::EVENT_BEFORE_SAVE_LINE_ITEM, function (LineItemEvent $e) {
            if ($e->isNew) {
                $this->helper->clearCart();
            }
        });

        // Empty the cart before page load.
        Event::on(View::class, View::EVENT_BEFORE_RENDER_PAGE_TEMPLATE, function () {
            if (!Craft::$app->getRequest()->isCpRequest) {
                $this->helper->clearCart();
            }
        });

        // Register our components
        $this->setComponents([
            'helper' => [
                'class' => Helper::class,
            ],
            'keap' => ([
                'class' => Keap::class,
            ]),
        ]);

        // Register our variables
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('site', SiteVariable::class);
            }
        );

        // Register our Asset bundle for CP requests
        if (Craft::$app->getRequest()->getIsCpRequest()) {
            Event::on(
                View::class,
                View::EVENT_BEFORE_RENDER_TEMPLATE,
                function () {
                    try {
                        Craft::$app->getView()->registerAssetBundle(SiteModuleAsset::class);
                    } catch (InvalidConfigException $e) {
                        Craft::error(
                            'Error registering AssetBundle - ' . $e->getMessage(),
                            __METHOD__
                        );
                    }
                }
            );
        }

        Craft::info(
            Craft::t(
                'site-module',
                '{name} module loaded',
                ['name' => 'Site']
            ),
            __METHOD__
        );
    }
}
