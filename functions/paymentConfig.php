<?php    
// Global Variables
global $base_url; 
global $paypalPaymentMode;
global $paypalActivePasive;
global $paypalSendBoxBusinessEmail;
global $paypalProductBusinessEmail;

global $payStackActivePasive;
global $payStackPaymentMode;
global $payStackTestSecretKey;
global $payStackTestPublicKey;
global $payStackLiveSecretKey;
global $payStackLivePublicKey;

global $bitpayPaymentMode;
global $bitpayActivePasive;
global $bitpayNotificationEmail;
global $bitpayPassword;
global $bitpayPairingCode;
global $bitpayLabel;

global $stripePaymentMode; 
global $stripePaymentActivePasive;
global $stripePaymentTestSecretKey;
global $stripePaymentTestPublicKey;
global $stripePaymentLiveSecretKey;
global $stripePaymentLivePublicKey;

global $authorizePaymentMode;
global $authorizeActivePasive;
global $authorizeTestApiID;
global $authorizeTestTransactionKey;
global $authorizeLiveApiID;
global $authorizeLiveTransactionKey;


global $iyzicoPaymentMode;
global $iyzicoActivePasive;
global $iyzicoTestingSecretKey;
global $iyzicoTestingApiKey;
global $iyzicoLiveApiKey;
global $iyzicoLiveSecretKey;


global $razorPayPaymentMode;
global $razorPayActivePasive;
global $razorPayTestkingKeyID;
global $razorPayTestingSecretKey;
global $razorPayLiveKeyID;
global $razorPayLiveSecretKey;

global $paypalCurrency;
global $iyziCoCurrency;
global $bitPayCurrency;
global $authorizeNetCurrency;
global $paystackCurrency;
global $stripeCurrency;
global $razorPayCurrency;
global $currencys;

// Config Paths
$oobennPaymentConfig = [

    /* Base Path of app
    ------------------------------------------------------------------------- */
    'base_url' =>  $base_url,

    'payments' => [
        /* Gateway Configuration key
        ------------------------------------------------------------------------- */
        'gateway_configuration' => [
            'paypal' => [
                'enable'                        => $paypalActivePasive,      
                'testMode'                      => $paypalPaymentMode, //test mode or product mode (boolean, true or false)
                'gateway'                       => 'Paypal', //payment gateway name
                'paypalSandboxBusinessEmail'        => $paypalSendBoxBusinessEmail, //paypal sandbox business email
                'paypalProductionBusinessEmail'     => $paypalProductBusinessEmail, //paypal production business email
                'currency'                  => $paypalCurrency, //currency
                'currencySymbol'              => $currencys[$paypalCurrency],
                'paypalSandboxUrl'          => 'https://www.sandbox.paypal.com/cgi-bin/webscr', //paypal sandbox test mode Url
                'paypalProdUrl'             => 'https://www.paypal.com/cgi-bin/webscr', //paypal production mode Url
                'notifyIpnURl'              => 'payment-response.php', //paypal ipn request notify Url
                'cancelReturn'              => 'payment-response.php', //cancel payment Url
                'callbackUrl'               => 'payment-response.php', //callback Url after payment successful
                'privateItems'              => []
            ],
            'paystack' => [
                'enable'                    => $payStackActivePasive,
                'testMode'                  => $payStackPaymentMode, //test mode or product mode (boolean, true or false) 
                'gateway'                   => 'Paystack', //payment gateway name
                'currency'                  => $paystackCurrency, //currency
                'currencySymbol'              => $currencys[$paystackCurrency],
                'paystackTestingSecretKey'         => $payStackTestSecretKey, //paystack testing secret key
                'paystackTestingPublicKey'         => $payStackTestPublicKey, //paystack testing public key
                'paystackLiveSecretKey'         => $payStackLiveSecretKey, //paystack live secret key
                'paystackLivePublicKey'         => $payStackLivePublicKey, //paystack live public key
                'callbackUrl'               => 'payment-response.php', //callback Url after payment successful
                'privateItems'              => [
                                                $payStackTestSecretKey,
                                                $payStackTestPublicKey
                                            ]
            ],
            'stripe'    => [
                'enable'                    => $stripePaymentActivePasive,
                'testMode'                  => $stripePaymentMode, //test mode or product mode (boolean, true or false) 
                'gateway'                   => 'Stripe', //payment gateway name
                'locale'                    => 'auto', //set local as auto
                'allowRememberMe'           => false, //set remember me ( true or false)
                'currency'                  => $stripeCurrency, //currency
                'currencySymbol'              => $currencys[$stripeCurrency],
                'stripeTestingSecretKey'    => $stripePaymentTestSecretKey, //Stripe testing Secret Key
                'stripeTestingPublishKey'   => $stripePaymentTestPublicKey, //Stripe testing Publish Key
                'stripeLiveSecretKey'       => $stripePaymentLiveSecretKey, //Stripe Secret live Key
                'stripeLivePublishKey'      => $stripePaymentLivePublicKey, //Stripe live Publish Key
                'callbackUrl'               => 'payment-response.php', //callback Url after payment successful
                'privateItems'              => [
                                                'stripeTestingSecretKey',
                                                'stripeLivePublishKey'
                                            ]
            ],
            'razorpay'    => [
                'enable'                    => $razorPayActivePasive,
                'testMode'                  => $razorPayPaymentMode, //test mode or product mode (boolean, true or false) 
                'gateway'                   => 'Razorpay', //payment gateway name
                'merchantname'              => 'John', //merchant name
                'themeColor'                => '#1e88e5', //set razorpay widget theme color
                'currency'                  => $razorPayCurrency, //currency
                'currencySymbol'              => $currencys[$razorPayCurrency],
                'razorpayTestingkeyId'      => $razorPayTestkingKeyID, //razorpay testing Api Key
                'razorpayTestingSecretkey'  => $razorPayTestingSecretKey, //razorpay testing Api Secret Key
                'razorpayLivekeyId'         =>  $razorPayLiveKeyID, //razorpay live Api Key
                'razorpayLiveSecretkey'     => $razorPayLiveSecretKey, //razorpay live Api Secret Key
                'callbackUrl'               => 'payment-response.php', //callback Url after payment successful
                'privateItems'              => [
                                                'razorpayTestingSecretkey',
                                                'razorpayLiveSecretkey'
                                            ]
            ],
            'iyzico'    => [
                'enable'                    => $iyzicoActivePasive,
                'testMode'                  => $iyzicoPaymentMode, //test mode or product mode (boolean, true or false) 
                'gateway'                   => 'Iyzico', //payment gateway name
                'conversation_id'           => 'CONVERS' . uniqid(), //generate random conversation id
                'currency'                  => $iyziCoCurrency, //currency
                'currencySymbol'              => $currencys[$iyziCoCurrency],
                'subjectType'               => 1, // credit
                'txnType'                   => 2, // renewal
                'subscriptionPlanType'      => 1, //txn status
                'iyzicoTestingSecretkey'    => $iyzicoTestingSecretKey, //iyzico testing Secret Key
                'iyzicoTestingApiKey'          => $iyzicoTestingApiKey, //iyzico live Api Key
                'iyzicoLiveApiKey'          => $iyzicoLiveApiKey, //iyzico live Api Key
                'iyzicoLiveSecretkey'       => $iyzicoLiveSecretKey, //iyzico live Secret Key
                'iyzicoSandboxModeUrl'      => 'https://sandbox-api.iyzipay.com', //iyzico Sandbox test mode Url
                'iyzicoProductionModeUrl'   => 'https://api.iyzipay.com', //iyzico production mode Url
                'callbackUrl'               => 'payment-response.php', //callback Url after payment successful
                'privateItems'              => [
                                                'iyzicoTestingApiKey',
                                                'iyzicoTestingSecretkey',
                                                'iyzicoLiveApiKey',
                                                'iyzicoLiveSecretkey'
                                            ]
            ],
            'authorize-net'    => [
                'enable'                         => $authorizeActivePasive,
                'testMode'                       => $authorizePaymentMode, //test mode or product mode (boolean, true or false) 
                'gateway'                        => 'Authorize.net', //payment gateway name
                'reference_id'                   => 'REF' . uniqid(), //generate random conversation id
                'currency'                       => $authorizeNetCurrency, //currency
                'currencySymbol'                 => $currencys[$authorizeNetCurrency],
                'type'                           => 'individual',
                'txnType'                        => 'authCaptureTransaction',
                'authorizeNetTestApiLoginId'     => $authorizeTestApiID, //authorize-net testing Api login id
                'authorizeNetTestTransactionKey' => $authorizeTestTransactionKey, //Authorize.net testing transaction key
                'authorizeNetLiveApiLoginId'     => $authorizeLiveApiID, //Authorize.net live Api login id
                'authorizeNetLiveTransactionKey' => $authorizeLiveTransactionKey, //Authorize.net live transaction key
                'callbackUrl'                    => 'payment-response.php', //callback Url after payment successful
                'privateItems'                  => [
                                                    'authorizeNetTestApiLoginId',
                                                    'authorizeNetTestTransactionKey',
                                                    'authorizeNetLiveApiLoginId',
                                                    'authorizeNetLiveTransactionKey'
                                                ]
            ],
            'bitpay'    => [
                'enable'                        => $bitpayActivePasive,
                'testMode'                      => $bitpayPaymentMode, //test mode or product mode (boolean, true or false) 
                'notificationEmail'             => $bitpayNotificationEmail, // Merchant Email
                'gateway'                       => 'BitPay', //payment gateway name
                'currency'                      => $bitPayCurrency, //currency
                'currencySymbol'                => $currencys[$bitPayCurrency], //currency Symbol
                'password'                      => $bitpayPassword, // Password for "EncryptedFilesystemStorage"
                'pairingCode'                   => $bitpayPairingCode, // Your pairing Code
                'pairinglabel'                  => $bitpayLabel, // Your Pairing Label
                'callbackUrl'                   => 'payment-response.php', //callback Url after payment successful
                'privateItems'                  => ['pairingCode', 'pairinglabel', 'password']
            ]
        ],
    ],

];

return compact("oobennPaymentConfig");