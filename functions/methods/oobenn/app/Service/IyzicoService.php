<?php
/*
* IyzipayService.php - Main component file
*
* This file is part of the Account component.
*-----------------------------------------------------------------------------*/

namespace App\Service;

class IyzicoService
{
    /**
     * @var array $options
     */
    protected $options;

    /**
      * Constructor
      *
      * @param AccountRepository $accountRepository - Account Repository
      *
      * @return void
      *-----------------------------------------------------------------------*/

    function __construct()
    {
        $this->configData = configItem();
       
        //collect iyzico data in config array
        $configItem = $this->configData['payments']['gateway_configuration']['iyzico'];

        $this->options = new \Iyzipay\Options();

        //check test mode or product mode set iyzicoApiKey, iyzicoSecretkey, iyzicoSandboxModeUrl
        if ($configItem['testMode'] == true) {
            $setApiKey      = $configItem['iyzicoTestingApiKey'];
            $setSecretKey   = $configItem['iyzicoTestingSecretkey'];
            $baseUrl        = $configItem['iyzicoSandboxModeUrl'];

        } else {
            $setApiKey      = $configItem['iyzicoLiveApiKey'];
            $setSecretKey   = $configItem['iyzicoLiveSecretkey'];
            $baseUrl        = $configItem['iyzicoProductionModeUrl'];
        }

        $this->options->setApiKey($setApiKey); //set Api key instance
        $this->options->setSecretKey($setSecretKey); //set Api Secret key instance
        $this->options->setBaseUrl($baseUrl); //set base Url instance
    }

    /**
      * Request Payment
      *
      * @return json object
      *---------------------------------------------------------------- */
    public function processIyzicoRequest($requestData)
    {   
        $configItem = [];
        //check iyzico config array exist
        if (isset($this->configData)) {
            //collect iyzico data in config array
            $configItem = $this->configData['payments']['gateway_configuration']['iyzico'];
        }

        //collect payment data in array
        $paymentData = [
            'amount'        => $requestData['amounts'][$configItem['currency']], //order amount
            'paymentOption' => $requestData['paymentOption'], //set payment option
            'users__id'     => $requestData['customer_id'], //set user Id
            'order_id'      => $requestData['order_id'], //set order Id
            'ipAddress'     => $requestData['ip_address'], //set IP address
            'city'          => $requestData['city'], //set user city
            'address'       => $requestData['address'], //set user address
            'country'       => $requestData['country'], //set user address
            'name'          => $requestData['payer_name'], //set user name
            'email'         => $requestData['payer_email'], //set user email
            'currency_code' => $configItem['currency'], //set currency
            'subject_type'  => $configItem['subjectType'], // credit
            'txn_type'      => $configItem['txnType'], // renewal
            'conversation_id'   => $configItem['conversation_id'], // renewal   
            'item_basket_id'    => $requestData['item_id'],  //set item id
            'subscription_plan_type'  => $configItem['subscriptionPlanType'], //set subscription plan
            'subscription_plan' => $requestData['order_id'], //set subscription Id
            'callbackUrl'       => getAppUrl($configItem['callbackUrl']) //set callbackUrl
        ];

        // Prepare card Data
        $cardData = [
            'card_number'   => $requestData['cardnumber'], //set card number
            'cvv'           => $requestData['cvv'], //set card cvv
            'name_on_card'  => $requestData['cardname'], //set card card name
            'exp_month'     => $requestData['expmonth'], //set card expiry month
            'exp_year'      => $requestData['expyear'], //set card expiry year
        ];

        //checkcard & payment data in array
        if($paymentData and is_array($paymentData)) {
            //process request for payment
            return $this->processPayment($paymentData, $cardData);
        }

        return false;
    }

    /**
      * process the payment
      *
      * @return json object
      *---------------------------------------------------------------- */
    protected function processPayment($data, $cardData)
    {  
        $iyzicoPaymentData = [];

        //create a payment request in $request object
        $request = new \Iyzipay\Request\CreatePaymentRequest();

            $request->setLocale(\Iyzipay\Model\Locale::EN);
            $request->setConversationId($data['conversation_id']);
            $request->setPrice($data['amount']);
            $request->setPaidPrice($data['amount']);
            $request->setCurrency($data['currency_code']);
            $request->setInstallment(1);
            $request->setBasketId($data['conversation_id']);
            
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

        //set callbackURl function
        $request->setCallbackUrl($data['callbackUrl'].'?paymentOption='.$data['paymentOption'].'&orderId='.$data['order_id']);
        
        //create object of payment card on $paymentcard variable
        $paymentCard = new \Iyzipay\Model\PaymentCard();

            $paymentCard->setCardHolderName($cardData['name_on_card']);
            $paymentCard->setCardNumber($cardData['card_number']);
            $paymentCard->setExpireMonth($cardData['exp_month']);
            $paymentCard->setExpireYear($cardData['exp_year']);
            $paymentCard->setCvc($cardData['cvv']);
            $paymentCard->setRegisterCard(0);
            $request->setPaymentCard($paymentCard);

        //create object of buyer $buyer variable
        $buyer = new \Iyzipay\Model\Buyer();
            $buyer->setId($data['users__id']);
            $buyer->setName($data['name']);
            $buyer->setSurname($data['name']);
            // $buyer->setGsmNumber("+905350000000");
            $buyer->setEmail($data['email']);
            $buyer->setIdentityNumber($data['users__id']);
            // $buyer->setLastLoginDate("2015-10-05 12:43:35");
            // $buyer->setRegistrationDate("2013-04-21 15:12:09");
            $buyer->setRegistrationAddress($data['address']);
            $buyer->setIp($data['ipAddress']);
            $buyer->setCity($data['city']);
            $buyer->setCountry($data['country']);
            // $buyer->setZipCode("34732");
            $request->setBuyer($buyer);

        //create object of shipping address on $shippingAddress variable
        $shippingAddress = new \Iyzipay\Model\Address();
            $shippingAddress->setContactName($cardData['name_on_card']);
            $shippingAddress->setCity($data['city']);
            $shippingAddress->setCountry($data['city']);
            $shippingAddress->setAddress($data['address']);
            // $shippingAddress->setZipCode("34742");
            $request->setShippingAddress($shippingAddress);

        //create object of billing address on $billingAddress variable
        $billingAddress = new \Iyzipay\Model\Address();
            $billingAddress->setContactName($cardData['name_on_card']);
            $billingAddress->setCity($data['city']);
            $billingAddress->setCountry($data['city']);
            $billingAddress->setAddress($data['address']);
            // $billingAddress->setZipCode("34742");
            $request->setBillingAddress($billingAddress);

        //create object of basket items on $basketItems variable
        $basketItems = array();
            $firstBasketItem = new \Iyzipay\Model\BasketItem();
            $firstBasketItem->setId($data['item_basket_id']);
            $firstBasketItem->setName($data['subscription_plan']);
            $firstBasketItem->setCategory1($data['subscription_plan_type']);
            //$firstBasketItem->setCategory2("Accessories");
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
            $firstBasketItem->setPrice($data['amount']);
            $basketItems[0] = $firstBasketItem;
            $request->setBasketItems($basketItems);

        //initialize ThreedsInitialize object for create payment request
        $payment = \Iyzipay\Model\ThreedsInitialize::create($request, $this->options);

        //check payment status
        if(strtolower($payment->getStatus()) !== 'success') {
            //if payment failed set failed message
            $iyzicoPaymentData['message'] = 'failed';

            //get error status on $iyzicoPaymentData array
            $iyzicoPaymentData['errorMessage']  = $payment->getErrorMessage();
        }

        // check payment request success
        if (strtolower($payment->getStatus()) == 'success') {
            $iyzicoPaymentData['htmlContent'] = $payment->getHtmlContent(); //get iyzico html content in response
            $iyzicoPaymentData['status']      = $payment->getStatus(); //get success status in response
        }

        //return iyzico Payment Data request array
        return $iyzicoPaymentData;
    }

    /**
      * Process Threeds payment
      *
      * @return json object
      *---------------------------------------------------------------- */
    public function processThreedsPayment($requestData)
    {   
        //fetch payment request data object
        $request = new \Iyzipay\Request\CreateThreedsPaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::EN);
        $request->setConversationId($requestData['conversationId']);
        $request->setPaymentId($requestData['paymentId']);
        $request->setConversationData($requestData['conversationData']);

        //fetch payment request data
        $threedsPayment = \Iyzipay\Model\ThreedsPayment::create($request, $this->options);

        //return iyzico Payment request data array
        return $threedsPayment;
    }
}