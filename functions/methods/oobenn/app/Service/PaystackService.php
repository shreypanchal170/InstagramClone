<?php
namespace App\Service;

use Yabacon\Paystack;
use Exception;

/**
 * This MailService class for manage globally -
 * mail service in application.
 *---------------------------------------------------------------- */
class PaystackService
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
     * @var paystackAPI - paystackAPI
     */
    protected $paystackAPI;


    /**
     * Constructor.
     *
     *-----------------------------------------------------------------------*/
    public function __construct() {
        $this->configData = configItem();
       
        //collect paystack data in config array
        $configItem = $this->configData['payments']['gateway_configuration']['paystack'];

        //check test mode or product mode set paystackSecretKey orpaystackPublicKey
        if ($configItem['testMode'] == true) {
            $paystackSecretKey = $configItem['paystackTestingSecretKey'];
            $paystackPublicKey = $configItem['paystackTestingPublicKey'];
        } else {
            $paystackSecretKey = $configItem['paystackLiveSecretKey'];
            $paystackPublicKey = $configItem['paystackLivePublicKey'];
        }

        //check paystack secret key are not valid then add 'sk_' keyword for handing error message
        if (!is_string($paystackSecretKey) || !(substr($paystackSecretKey, 0, 3) ==='sk_')) {
            $paystackSecretKey = substr_replace($paystackSecretKey, "sk_".$paystackSecretKey, 0);
        }

        //check paystack secret key are not empty
        if (!empty($paystackSecretKey)) {
            //create paystack Api Key object 
            $this->paystackAPI = new Paystack($paystackSecretKey);
        }
    }

    /**

     * @param  string $ordderData - Order ID
     * @param  string -$stripeToken - Stripe Token

     * request to Stripe checkout
     *---------------------------------------------------------------- */
    public function processPaystackRequest($request)
    {   
        //get payment request details data in try catch block
        try
        {
            // verify payment request using the library
            $transactionDetail = $this->paystackAPI->transaction->verify([
                'reference'=>   $request['paystackReferenceId'], // unique to transactions
            ]);
            
            //return transaction detail array
            return (array) $transactionDetail;
           
           //iff error throw exception message
        } catch(Exception $e){
            //set error message if payment failed
            $errorMessage['errorMessage'] = $e->getMessage();

            //return error message array
            return (array) $errorMessage;
        }
    }
}