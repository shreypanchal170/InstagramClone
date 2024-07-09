<?php
namespace App\Service;

use Stripe\Stripe;
use Stripe\Customer as StripeCustomer;
use Stripe\Charge as StripeCharge;
use Exception;

/**
 * This MailService class for manage globally -
 * mail service in application.
 *---------------------------------------------------------------- */
class StripeService
{
    /**
     * @var configData - configData
     */
    protected $configData;

    /**
     * @var configItem - configItem
     */
    protected $configItem;

    /**
     * Constructor.
     *
     *-----------------------------------------------------------------------*/
    public function __construct() {
        $this->configData = configItem();
       
        //collect stripe data in config array
        $configItem = $this->configData['payments']['gateway_configuration']['stripe'];

        //check test mode or product mode set stripeSecretKey or stripePublishKey
        if ($configItem['testMode'] == true) {
            $stripeSecretKey = $configItem['stripeTestingSecretKey'];
            $stripePublishKey = $configItem['stripeTestingPublishKey'];
        } else {
            $stripeSecretKey = $configItem['stripeLiveSecretKey'];
            $stripePublishKey = $configItem['stripeLivePublishKey'];
        }

        //set Stripe Api Secret Key in Stripe static method object
        Stripe::setApiKey($stripeSecretKey);
    }

    /**

     * @param  string $ordderData - Order ID
     * @param  string -$stripeToken - Stripe Token

     * request to Stripe checkout
     *---------------------------------------------------------------- */
    public function processStripeRequest($request)
    {   
        $configItem = [];
        //check stripe configuration array exist
        if (isset($this->configData)) {
            //collect stripe data in config array
            $configItem = $this->configData['payments']['gateway_configuration']['stripe'];
        }

        $stripeChargeData = [];

        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => $request['payer_email'],
                'line_items' => [[
                    'name' => $request['item_name'],                
                    'description' => $request['description'],
                    'amount' => $this->calculateStripeAmount($request['amounts'][$configItem['currency']]),
                    'currency' => $configItem['currency'],
                    'quantity' => $request['item_qty'],
                ]],
                'success_url' => getAppUrl($configItem['callbackUrl']).'?session_id={CHECKOUT_SESSION_ID}'.'&paymentOption=stripe&orderId='.$request['order_id'],
                'cancel_url' => getAppUrl($configItem['callbackUrl']).'?session_id={CHECKOUT_SESSION_ID}'.'&paymentOption=stripe&orderId='.$request['order_id'],
            ]);

            return $session;

        } catch (Exception $e) {
            //if payment failed set failed message
            $errorMessage['message'] = 'failed';

            //set error message if payment failed
            $errorMessage['errorMessage'] = $e->getMessage();

            //return error message array
            return (array) $errorMessage;
        }
    }

    /**
     * Retrieve Stripe data by session Id
     *
     * @param string $sessionId
     *
     * request to Stripe checkout
     *---------------------------------------------------------------- */
    public function retrieveStripeData($sessionId)
    {
        try {

            $sessionData = \Stripe\Checkout\Session::retrieve($sessionId);

            if (empty($sessionData)) {
                throw new Exception("Session data does not exist.");                
            }

            $paymentIntentData = \Stripe\PaymentIntent::retrieve($sessionData->payment_intent);

            return $paymentIntentData;

        } catch (\Stripe\Error\InvalidRequest $err) {
            //set error message if payment failed
            $errorMessage['errorMessage'] = $err->getMessage();

            //return error message array
            return (array) $errorMessage;

        } catch (\Stripe\Error\Card $err) {
            //set error message if payment failed
            $errorMessage['errorMessage'] = $err->getMessage();
            
            //return error message array
            return (array) $errorMessage;
        }
    }

    /**
     * Calculate Stripe Amount
     *
     * @param number $amount - Stripe Amount
     *
     * request to Stripe checkout
     *---------------------------------------------------------------- */
    protected function calculateStripeAmount($amount)
    {
        return $amount * 100;
    }
}