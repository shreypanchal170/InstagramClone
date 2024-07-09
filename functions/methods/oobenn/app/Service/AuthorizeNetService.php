<?php
namespace App\Service;
use net\authorize\api\contract\v1 as AnetAPI; 
use net\authorize\api\controller as AnetController; 

/**
 * Authorize.Net payment process service
 * 
 *---------------------------------------------------------------- */
class AuthorizeNetService {
    /**
     * @var configData - configData
     */
    protected $configData;

    /**
     * @var configItem - configItem
     */
    protected $configItem;

    /**
     * @var configItem - configItem
     */
    protected $merchantAuthentication;

    /**
     * Constructor.
     *
     *-----------------------------------------------------------------------*/
    public function __construct() {
        $this->configData = configItem();
       
        //collect authorize-net data in config array
        $this->configItem = $this->configData['payments']['gateway_configuration']['authorize-net'];

        $this->merchantAuthentication = new AnetAPI\MerchantAuthenticationType();

        //check test mode or product mode set stripeSecretKey or stripePublishKey
        if ($this->configItem['testMode'] == true) {
            $this->merchantAuthentication->setName($this->configItem['authorizeNetTestApiLoginId']);    
            $this->merchantAuthentication->setTransactionKey($this->configItem['authorizeNetTestTransactionKey']);
        } else {
            $this->merchantAuthentication->setName($this->configItem['authorizeNetLiveApiLoginId']);    
            $this->merchantAuthentication->setTransactionKey($this->configItem['authorizeNetLiveTransactionKey']);
        }
    }

    /**
     * Process Authorize.Net Request
     *
     *---------------------------------------------------------------- */
    public function processAuthorizeNetRequest($request)
    {
        if ($this->configItem['testMode'] == true) {
            $environment = "SANDBOX";
        } else {
            $environment = "PRODUCTION";
        }

        $amount = $request['amounts'][$this->configItem['currency']];
        $statusMsg = $error = ''; 
        $ordStatus = 'error'; 
        $orderData = [
            'order_id' => $request['order_id'],
            'amount' => $amount,
            'paymentOption' => 'authorize-net'
        ];

        $cardExpiryYearMonth = $request['expyear'].'-'.$request['expmonth'];
        // Create the payment data for a credit card 
        $creditCard = new AnetAPI\CreditCardType(); 
        $creditCard->setCardNumber($request['cardnumber']); 
        $creditCard->setExpirationDate($cardExpiryYearMonth); 
        $creditCard->setCardCode($request['cvv']); 

        // Add the payment data to a paymentType object 
        $paymentOne = new AnetAPI\PaymentType(); 
        $paymentOne->setCreditCard($creditCard); 

        // Create order information 
        $order = new AnetAPI\OrderType(); 
        $order->setDescription($request['item_name']); 

        // Set the customer's identifying information 
        $customerData = new AnetAPI\CustomerDataType(); 
        $customerData->setType($this->configItem['type']); 
        $customerData->setEmail($request['payer_email']); 

        // Create a transaction 
        $transactionRequestType = new AnetAPI\TransactionRequestType(); 
        $transactionRequestType->setTransactionType($this->configItem['txnType']);    
        $transactionRequestType->setAmount($amount); 
        $transactionRequestType->setOrder($order); 
        $transactionRequestType->setPayment($paymentOne); 
        $transactionRequestType->setCustomer($customerData); 
        $request = new AnetAPI\CreateTransactionRequest(); 
        $request->setMerchantAuthentication($this->merchantAuthentication); 
        $request->setRefId($this->configItem['reference_id']); 
        $request->setTransactionRequest($transactionRequestType); 
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(constant("\\net\authorize\api\constants\ANetEnvironment::$environment"));
        
        if ($response != null) { 
            // Check to see if the API request was successfully received and acted upon 
            if ($response->getMessages()->getResultCode() == "Ok") { 
                // Since the API request was successful, look for a transaction response 
                // and parse it to display the results of authorizing the card 
                $tresponse = $response->getTransactionResponse(); 
     
                if ($tresponse != null && $tresponse->getMessages() != null) { 
                    // Transaction info 
                    $orderData['transaction_id'] = $tresponse->getTransId(); 
                    $orderData['payment_status'] = $response->getMessages()->getResultCode(); 
                    $orderData['payment_response'] = $tresponse->getResponseCode(); 
                    $orderData['auth_code'] = $tresponse->getAuthCode(); 
                    $orderData['message_code'] = $tresponse->getMessages()[0]->getCode(); 
                    $orderData['message_desc'] = $tresponse->getMessages()[0]->getDescription();
                     
                    $ordStatus = 'success'; 
                    $statusMsg = 'Your Payment has been Successful!'; 
                } else { 
                    if ($tresponse->getErrors() != null) { 
                        $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>"; 
                    } 
                    $statusMsg = $error; 
                } 
                // Or, print errors if the API request wasn't successful 
            } else { 
                $tresponse = $response->getTransactionResponse(); 
             
                if ($tresponse != null && $tresponse->getErrors() != null) { 
                    $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>"; 
                } else { 
                    $error .= " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "<br/>"; 
                } 
                $statusMsg = $error; 
            } 
        } else { 
            $statusMsg =  "Transaction Failed! No response returned"; 
        }

        $orderData['status'] = $ordStatus;
        $orderData['message'] = $statusMsg;

        return $orderData;
    }
}