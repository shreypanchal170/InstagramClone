<?php
namespace App\Components\Payment;

use App\Service\PaytmService;

class PaytmResponse { 

    /**
     * @var paytmService - PaytmService
     */
    protected $paytmService;

    //construt method
    function __construct() {

        //create paytm instance
        $this->paytmService = new PaytmService();        
    }

    public function getPaytmPaymentData($requestData) {

        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $paramList = $requestData;
        $paytmChecksum = isset($requestData["CHECKSUMHASH"]) ? $requestData["CHECKSUMHASH"] : ""; //Sent by Paytm pg

        //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = $this->paytmService->verifyCheckSum($paramList, $paytmChecksum); //will return TRUE or FALSE string.
        
        if($isValidChecksum == "TRUE") {
            if ($requestData["STATUS"] == "TXN_SUCCESS") {
                //Process your transaction here as success transaction.
                //Verify amount & order id received from Payment gateway with your application's order id and amount.

                if (isset($requestData) && count($requestData) > 0 )
                { 
                    return $requestData;
                }
            }
            else {
                
                if (isset($requestData) && count($requestData) > 0 )
                { 
                    return $requestData;
                }
            }
            
        }
        else {
            //Checksum mismatched
            //Process transaction as suspicious.
            return $requestData;
        }
    }

}
