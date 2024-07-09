<?php
namespace App\Service;

use Instamojo\Instamojo;
use Exception;

/**
 * This MailService class for manage globally -
 * mail service in application.
 *---------------------------------------------------------------- */
class InstamojoService
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
     * @var Instamojo - Instamojo Service
     */
    protected $instamojoApi;

    /**
     * Constructor.
     *
     *-----------------------------------------------------------------------*/
    public function __construct() {
        $this->configData = configItem();
       
        //collect instamojo data in config array
        $configItem = $this->configData['payments']['gateway_configuration']['instamojo'];

        //check test mode or product mode set instamojoApiKey, instamojoAuthTokenKey, instamojoSandboxRedirectUrl
        if ($configItem['testMode'] == true) {
            $instamojoApiKey = $configItem['instamojoTestingApiKey'];
            $instamojoTokenKey = $configItem['instamojoTestingAuthTokenKey'];
            $instamojoRedirectUrl = $configItem['instamojoSandboxRedirectUrl'];
        } else {
            $instamojoApiKey = $configItem['instamojoLiveApiKey'];
            $instamojoTokenKey = $configItem['instamojoLiveAuthTokenKey'];
            $instamojoRedirectUrl = $configItem['instamojoProdRedirectUrl'];
        }
       
       //create instamojo Api Key object for create payment request using this parameter
        $this->instamojoApi = new Instamojo($instamojoApiKey, $instamojoTokenKey, $instamojoRedirectUrl);
    }

    /**

     * @param  string $ordderData - Order ID
     * @param  string -$instamojoPyamentId - Instamojo Payment Id

     * request to Instamojo checkout
     *---------------------------------------------------------------- */
    public function processInstamojoRequest($request)
    {   
        $configItem = [];
        $errorMessage = [];
        //check config data is exist
        if (isset($this->configData)) {

            //collect instamojo data in config array
            $configItem = $this->configData['payments']['gateway_configuration']['instamojo'];
        }

        //create payment request data in try catch block
        try {
            //Create a new Payment Request.
            $paymentRequest = $this->instamojoApi->paymentRequestCreate(array(
                "purpose"       => 'Order / '.$request['order_id'], // Purpose of the payment request. (max-characters: 30)
                "amount"        => $request['amounts'][$configItem['currency']], // order amount requested (min-value: 9 ; max-value: 200000)
                "send_email"    => $configItem['sendEmail'], // Set this to true if you want to send email to the payer if email is specified. If email is not specified then an error is raised. (default value: false)
                'buyer_name'    => $request['payer_name'], // Email of the payer. (max-characters: 75)
                "email"         => $request['payer_email'], //Email of the payer. (max-characters: 75)
                // 'phone'         => '9665899685', //Phone number of the payer.
                'webhook'       => $configItem['webhook'], // set this to a URL that can accept POST requests made by Instamojo server after successful payment.
                'allow_repeated_payments' => false, // To disallow multiple successful payments on a Payment Request pass false for this field. If this is set to false then the link is not accessible publicly after first successful payment, though you can still access it using API(default value: true).
                "redirect_url" => getAppUrl($configItem['callbackUrl']).'?paymentOption='.$request['paymentOption'].'&orderId='.$request['order_id'], //set this to a thank-you page on your site. Buyers will be redirected here after successful payment.
            ));
            
            //on successful create instamojo payment request then set success message in array
            $paymentRequest['message'] = 'success';

            //return payment request array
            return $paymentRequest;

          //throw exception
        } catch (Exception $e) {

            //if payment failed set failed message
            $errorMessage['message'] = 'failed';

            //set error message if payment failed
            $errorMessage['errorMessage'] = $e->getMessage();
        }

        //return error message array
        return (array) $errorMessage;
    }

    /**

     * @param  string $ordderData - Order ID
     * @param  string -$instamojoPyamentId - Instamojo Payment Id

     * request to Instamojo checkout
     *---------------------------------------------------------------- */
    public function preparePaymentRequestStatus($requestData)
    {  
       
        try {
            //get payment details
            $paymentDetails = $this->instamojoApi->paymentDetail($requestData['payment_id']);
            return $paymentDetails;

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