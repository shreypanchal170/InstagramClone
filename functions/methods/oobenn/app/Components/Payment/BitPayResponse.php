<?php
namespace App\Components\Payment;

use App\Service\BitPayService;

class BitPayResponse {
    /**
     * @var bitPayService - bitPayService
     */
    protected $bitPayService;

    //construt method
    function __construct() {
        //create bitpay instance
        $this->bitPayService = new BitPayService();        
    }

    public function getBitPayPaymentData($requestData) {

        //get bitpay payment request data
        $bitpayData = $this->bitPayService->preparePaymentRequestData($requestData);
        
        //return response data
        return $bitpayData;
    }
}