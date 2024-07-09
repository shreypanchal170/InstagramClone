<?php
namespace App\Service;

use Razorpay\Api\Api as RazorpayAPI;
use Exception;

/**
 * This MailService class for manage globally -
 * mail service in application.
 *---------------------------------------------------------------- */
class RazorpayService
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
     * @var Razorpay - Razorpay Service
     */
    protected $razorpayAPI;

    /**
     * Constructor.
     *
     *-----------------------------------------------------------------------*/
    public function __construct() {
        $this->configData = configItem();
       
        //collect razorpay data in config array
        $configItem = $this->configData['payments']['gateway_configuration']['razorpay'];

        //check test mode or product mode set razorpaykeyId or razorpaySecretkey, 
        if ($configItem['testMode'] == true) {
            $razorpaykeyId = $configItem['razorpayTestingkeyId'];
            $razorpaySecretkey = $configItem['razorpayTestingSecretkey'];
        } else {
            $razorpaykeyId = $configItem['razorpayLivekeyId'];
            $razorpaySecretkey = $configItem['razorpayLiveSecretkey'];
        }
       
        //create razorpay Api Key object for capture payment request using this parameters
        $this->razorpayAPI = new RazorpayAPI($razorpaykeyId, $razorpaySecretkey);
    }

      /**

     * @param  string $ordderData - Order ID
     * @param  string -$stripeToken - Stripe Token

     * request to Stripe checkout
     *---------------------------------------------------------------- */
    public function processRazorpayRequest($request)
    {   
        $razorpayData = [];
        //capture payment request data in try catch block
        try {
            // fetch a payment data using razorpay Payment Id
            $payment  = $this->razorpayAPI->payment->fetch($request['razorpayPaymentId']);

            // Captures a payment request
            $paymentRecieved  = $this->razorpayAPI->payment->fetch($request['razorpayPaymentId'])->capture(array( 'amount'=>  base64_decode($request['razorpayAmount'])));

            //return payment request array
            // return $paymentRecieved;

            return (array) $paymentRecieved;
          
        }
        catch (Exception $e) {
            //if payment failed set failed message
            $errorMessage['message'] = 'failed';

            //set error message if payment failed
            $errorMessage['errorMessage'] = $e->getMessage();

            //return error message array
            return (array) $errorMessage;
        }
    }
}