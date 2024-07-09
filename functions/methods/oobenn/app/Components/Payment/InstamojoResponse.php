<?php
namespace App\Components\Payment;

use App\Service\InstamojoService;

class InstamojoResponse { 

    /**
     * @var razorpayData - RazorpayData
     */
    protected $instamojoService;

    //construt method
    function __construct() {

        //create instamojo instance
        $this->instamojoService = new InstamojoService();        
    }

    public function getInstamojoPaymentData($requestData) {

        //get instamojo payment request data
        $instamojoData = $this->instamojoService->preparePaymentRequestStatus($requestData);
        
        //return response data
        return $instamojoData;
    }

}
