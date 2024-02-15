<?php
/**
 * Site module for Craft CMS 3.x
 *
 * Custom site module
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace modules\sitemodule\services;

use Craft;
use craft\base\Component;
use craft\commerce\Plugin as Commerce;
use craft\commerce\stripe\errors\CustomerException;
use craft\commerce\stripe\Plugin as StripePlugin;
use craft\commerce\services\Countries;
use Stripe\Customer;
use Stripe\Stripe;
use Throwable;
use yii\base\ExitException;

/**
 * @author    nystudio107
 * @package   SiteModule
 * @since     1.0.0
 */
class Helper extends Component
{
    // Public Methods
    // =========================================================================
    /**
     * @return bool
     */
    public function clearCart()
    {
        try {
            $cart = Commerce::getInstance()->getCarts()->getCart();
        } catch (Throwable $e) {
            Craft::error($e->getMessage());
            return false;
        }
        if ((!$cart->id) || (!$cart->getLineItems())) {
            return false;
        }

        Commerce::getInstance()->getLineItems()->deleteAllLineItemsByOrderId($cart->id);

        return true;
    }


    public function updateStripeCustomer($e)
    {
        Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

        $address = $e->address;
        $country_id = $e->address->countryId;
        $country = (new Countries())->getCountryById($country_id);

        $user_id = Craft::$app->getUser()->getId();
        $user = Craft::$app->getUsers()->getUserById($user_id);
        $customers = StripePlugin::getInstance()->getCustomers();
        $customer = $customers->getCustomer(4, $user);
        $stripe_customer_id = Customer::retrieve($customer->reference)->id;

        Customer::update($stripe_customer_id, [
            'address' => [
                'line1'         => $address->address1,
                'line2'         => $address->address2,
                'city'          => $address->city,
                'country'       => $country,
                'postal_code'   => $address->zipCode,
                'state'         => $address->stateName
            ]
        ]);
    }

    public function getStripeCustomer(int $userId): Customer
    {
        try {
            $user = Craft::$app->getUsers()->getUserById($userId);
            $customers = StripePlugin::getInstance()->getCustomers();
            $customer = $customers->getCustomer($this->id, $user);
            $stripeCustomer = Customer::retrieve($customer->reference);

            if (!empty($stripeCustomer->deleted)) {
                // Okay, retry one time.
                $customers->deleteCustomerById($customer->id);
                $customer = $customers->getCustomer($this->id, $user);
                $stripeCustomer = Customer::retrieve($customer->reference);
            }

            return $stripeCustomer;
        } catch (\Exception $exception) {
            throw new CustomerException('Could not fetch Stripe customer: ' . $exception->getMessage());
        }
    }


}
