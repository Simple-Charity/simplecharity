<?php
/**
 * Site module for Craft CMS 3
 *
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2018 nystudio107
 */

namespace modules\sitemodule\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;
use craft\commerce\services\Countries;
use craft\commerce\services\Customers;
use craft\commerce\services\PaymentSources;
use craft\commerce\services\States;

/**
 * @author    nystudio107
 * @package   SiteModule
 * @since     1.0.0
 */
class SiteController extends Controller
{
    // Protected Properties
    // =========================================================================

    protected $allowAnonymous = [
        'get-csrf', 'get-stripe-pk', 'get-commerce-countries', 'get-commerce-states', 'get-country-by-id', 'get-current-user'
    ];

    // Public Methods
    // =========================================================================

    /**
     * @return Response
     */
    public function actionGetCsrf(): Response
    {
        return $this->asJson([
            'name' => Craft::$app->getConfig()->getGeneral()->csrfTokenName,
            'value' => Craft::$app->getRequest()->getCsrfToken(),
        ]);
    }


    public function actionGetCurrentUser(): Response
    {
        $user = Craft::$app->getUser()->getIdentity();
        $customers = new Customers;
        $payment_sources = new PaymentSources;

        $user_data = $user ? [
            'userId' => $user->id,
            'userName' => $user->name,
            'paymentSource' => $payment_sources->getAllPaymentSourcesByUserId($user->id)[0] ?? null,
            'friendlyName' => $user->friendlyName,
            'billingAddressId' => $customers->getCustomer()->primaryBillingAddressId,
        ] : null;

        return $this->asJson([
            'user' => $user_data
        ]);
    }

    /**
     * @return Response
     */
    public function actionGetCommerceCountries()
    {
        $countries = new Countries();
        return $this->asJson($countries->getAllCountriesAsList());
    }

    /**
     * @return Response
     */
    public function actionGetCountryById()
    {
        $countries = new Countries();
        $country_id = $_GET['country_id'];
        return $this->asJson($countries->getCountryById($country_id));
    }

    /**
     * @return Response
     */
    public function actionGetCommerceStates()
    {
        $states = new States();
        return $this->asJson($states->getAllStatesAsList());
    }

    /**
     * @return Response
     */
    public function actionGetStripePk(): Response
    {
        return $this->asJson([
            'publishable_key' => getenv('STRIPE_SECRET_KEY')
        ]);
    }
}
