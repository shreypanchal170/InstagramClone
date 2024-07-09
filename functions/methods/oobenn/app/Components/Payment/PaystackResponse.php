<?php
namespace App\Components\Payment;

use App\Service\PaystackService;

class PaystackResponse { 
    /**
     * @var paystackData - PaystackData
     */
    protected $paystackService;

    //construt method
    function __construct() {

        //create paystack instance
        $this->paystackService = new PaystackService();        
    }

    public function getPaystackPaymentData($requestData) {
        //get paystack payment request data
        $paystackData = $this->paystackService->processPaystackRequest($requestData);
        
        //return response data
        return  (array) $paystackData['data'];
    }

}





