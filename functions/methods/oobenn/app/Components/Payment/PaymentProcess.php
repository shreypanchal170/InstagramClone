<?php
//Set Access-Control-Allow-Origin with PHP
// header('Access-Control-Allow-Origin: http://site-a.com', false);
namespace App\Components\Payment;

class PaymentProcess {

    /**
     * @var paytmService - Paytm Service
     */
    protected $paytmService;

    /**
     * @var instamojoService - Instamojo Service
     */
    protected $instamojoService;

    /**
     * @var iyzicoService - Iyzico Service
     */
    protected $iyzicoService;

    /**
     * @var paypalService - Paypal Service
     */
    protected $paypalService;

    /**
     * @var paystackService - Paypal Service
     */
    protected $paystackService;
    
    /**
     * @var razorpayService - Paypal Service
     */
    protected $razorpayService;

    /**
     * @var stripeService - Paypal Service
     */
    protected $stripeService;

    /**
     * @var stripeService - Paypal Service
     */
    protected $authorizeNetService;

    /**
     * @var stripeService - Paypal Service
     */
    protected $bitPayService;

    function __construct($paytmService, $instamojoService, $iyzicoService, $paypalService, $paystackService, $razorpayService, $stripeService, $authorizeNetService, $bitPayService) {
       $this->paytmService          = $paytmService;
       $this->instamojoService      = $instamojoService;
       $this->iyzicoService         = $iyzicoService;
       $this->paypalService         = $paypalService;
       $this->paystackService       = $paystackService;
       $this->razorpayService       = $razorpayService;
       $this->stripeService         = $stripeService;
       $this->authorizeNetService   = $authorizeNetService;
       $this->bitPayService         = $bitPayService;
    }

    public function getPaymentData($request)
    { 
        $processResponse = [];
        if ($request['paymentOption'] == 'paytm') {
            //get paytm request data
            $processResponse = $this->paytmService->handlePaytmRequest($request);

            return $processResponse;

        } else if ($request['paymentOption'] == 'instamojo') {
            //get instamojo request data
            $processResponse = $this->instamojoService->processInstamojoRequest($request);
            return $processResponse;

        } else if ($request['paymentOption'] == 'iyzico') {
            //get iyzico request data
            $processResponse = $this->iyzicoService->processIyzicoRequest($request);
            return $processResponse;

        } else if ($request['paymentOption'] == 'paypal') {
            //get paypal request data
            $processResponse = $this->paypalService->processPaypalRequest($request);
            return $processResponse;

        } else if ($request['paymentOption'] == 'stripe') {
            // Get Stripe request Data
            $processResponse = $this->stripeService->processStripeRequest($request);
            return $processResponse;
        } else if ($request['paymentOption'] == 'paystack') {
            // Get Stripe request Data
            $processResponse = $this->paystackService->processPaystackRequest($request);
            return $processResponse;
        } else if ($request['paymentOption'] == 'razorpay') {
            // Get Stripe request Data
            $processResponse = $this->razorpayService->processRazorpayRequest($request);
            return $processResponse;
        } else if ($request['paymentOption'] == 'authorize-net') {
            $processResponse = $this->authorizeNetService->processAuthorizeNetRequest($request);
            return $processResponse;
        } else if ($request['paymentOption'] == 'bitpay') {
            $processResponse = $this->bitPayService->processBitPayRequest($request);
            return $processResponse;
        }
    }
}