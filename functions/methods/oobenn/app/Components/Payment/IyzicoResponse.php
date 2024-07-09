<?php
namespace App\Components\Payment;

use App\Service\IyzicoService;

class IyzicoResponse { 

    /**
     * @var iyzicoService - IyzicoService
     */
    protected $iyzicoService;

    //construt method
    function __construct() {

        //create iyzico instance
        $this->iyzicoService = new IyzicoService();        
    }

    public function getIyzicoPaymentData($requestData) {

        //get iyzico payment request data
        $iyzicoData = $this->iyzicoService->processThreedsPayment($requestData);
        
        //return response data
        return $iyzicoData;
    }

}
