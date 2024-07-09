<?php
namespace App\Service;

/**
 * BitPay payment process service
 * 
 *---------------------------------------------------------------- */
class BitPayService {
    /**
     * @var configData - configData
     */
    protected $configData;

    /**
     * @var configItem - configItem
     */
    protected $configItem;

    /**
     * @var privateKeyPath - privateKeyPath
     */
    protected $privateKeyPath;

    /**
     * @var publicKeyPath - publicKeyPath
     */
    protected $publicKeyPath;

    /**
     * @var bitpayTokenPath - bitpayTokenPath
     */
    protected $bitpayTokenPath;

    /**
     * @var password - password
     */
    protected $password;

    /**
     * @var testMode - testMode
     */
    protected $testMode;

    /**
     * Constructor.
     *
     *-----------------------------------------------------------------------*/
    public function __construct() {
        $this->configData       = configItem();
        $this->configItem       = $this->configData['payments']['gateway_configuration']['bitpay'];
        $tempStorage            = __DIR__.'/../Storage/temp/';
        $this->privateKeyPath   = $tempStorage.'bitpay.pri';
        $this->publicKeyPath    = $tempStorage.'bitpay.pub';
        $this->bitpayTokenPath  = $tempStorage.'bitpay-token.php';
        $this->password         = $this->configItem['password'];
        $this->testMode         = $this->configItem['testMode'];
    }

    /**
     * Generate Keys.
     *
     *-----------------------------------------------------------------------*/
    protected function generateKeys()
    {
        /**
         * Create bitpay private key file.
         */
        $bitpayPrivateKeyFile = fopen($this->privateKeyPath, "wb");
        fwrite($bitpayPrivateKeyFile, "");
        fclose($bitpayPrivateKeyFile);
        /**
         * Create bitpay private key file.
         */
        $bitpayPublicKeyFile = fopen($this->publicKeyPath, "wb");
        fwrite($bitpayPublicKeyFile, "");
        fclose($bitpayPublicKeyFile);

        /**
         * Start by creating a PrivateKey object:
         */
        $privateKey = new \Bitpay\PrivateKey($this->privateKeyPath);
        $privateKey->generate();
        /**
         * Once we have a private key, a public
         * key is created from it.
         */
        $publicKey = new \Bitpay\PublicKey($this->publicKeyPath);
        $publicKey->setPrivateKey($privateKey);
        $publicKey->generate();
        /**
         * It's recommended that you use the EncryptedFilesystemStorage engine to persist your
         * keys. You can, of course, create your own as long as it implements the StorageInterface
         */
        $storageEngine = new \Bitpay\Storage\EncryptedFilesystemStorage($this->password);
        $storageEngine->persist($privateKey);
        $storageEngine->persist($publicKey);
    }

    /**
     * Generate Token.
     *
     *-----------------------------------------------------------------------*/
    protected function generateToken()
    {
        /**
         * To load up keys that you have previously saved, you need to use the same
         * storage engine. You also need to tell it the location of the key you want
         * to load.
         */
        $storageEngine = new \Bitpay\Storage\EncryptedFilesystemStorage($this->password);
        $privateKey    = $storageEngine->load($this->privateKeyPath);
        $publicKey     = $storageEngine->load($this->publicKeyPath);
        /**
         * Generate our SIN:
         * Currently this part is required, however future versions of the PHP SDK will
         * be refactor and this part may become obsolete.
         */
        $sin = \Bitpay\SinKey::create()->setPublicKey($publicKey)->generate();
        /**
         * Create the client:
         */
        $client = new \Bitpay\Client\Client();
        /**
         * The network is either livenet or testnet. You
         * can also create your own as long as it
         * implements the NetworkInterface. In this
         * example we will use testnet.
         */
        if ($this->testMode == true) {
            $network = new \Bitpay\Network\Testnet();
        } else {
            $network = new \Bitpay\Network\Livenet();
        }
        
        /**
         * The adapter is what will make the calls to
         * BitPay and return the response from BitPay.
         * This can be updated or changed as long
         * as it implements the AdapterInterface.
         */
        $adapter = new \Bitpay\Client\Adapter\CurlAdapter();
        /**
         * Now all the objects are created and we can
         * inject them into the client.
         */
        $client->setPrivateKey($privateKey);
        $client->setPublicKey($publicKey);
        $client->setNetwork($network);
        $client->setAdapter($adapter);
        /**
         * Paste the pairing code you generated
         * in your merchant dashboard
         */
        $pairingCode = $this->configItem['pairingCode'];

        try {
            $token = $client->createToken(
                array(
                    'pairingCode' => $pairingCode,
                    'label'       => $this->configItem['pairinglabel'],
                    'id'          => (string) $sin,
                )
            );
        } catch (\Exception $e) {
            /**
             * The code will throw an exception if anything goes wrong, if you did not
             * change the $pairingCode value or if you are trying to use a pairing
             * code that has already been used, you will get an exception. It was
             * decided that it makes more sense to allow your application to handle
             * this exception since each app is different and has different requirements.
             */
            echo "Exception occured: " . $e->getMessage().PHP_EOL;

            echo "Pairing failed. Please check whether you're trying to pair a production pairing code on test.".PHP_EOL;
            $request  = $client->getRequest();
            $response = $client->getResponse();
            /**
             * You can use the entire request/response to help figure out what went
             * wrong, but for right now, we will just var_dump them.
             */
            echo (string) $request.PHP_EOL.PHP_EOL.PHP_EOL;
            echo (string) $response.PHP_EOL.PHP_EOL;
            /**
             * NOTE: The `(string)` is include so that the objects are converted to a
             *       user friendly string.
             */

            exit(1); // We do not want to continue if something went wrong
        }

        /**
         * You will need to persist the token somewhere, by the time you get to this
         * point your application has implemented an ORM such as Doctrine or you have
         * your own way to persist data. Such as using a framework or some other code
         * base such as Drupal.
         */
        $persistThisValue = $token->getToken();

        /**
         * Create bitpay token file.
         */
        $content = <<<EOT
<?php 
return [
    'token' => '$persistThisValue'
];
EOT;

        $bitpayTokenFile = fopen($this->bitpayTokenPath, "wb");
        fwrite($bitpayTokenFile, $content);
        fclose($bitpayTokenFile);
    }

    /**
     * Process Bit pay request
     *
     *-----------------------------------------------------------------------*/
    public function processBitPayRequest($request)
    {
        // Check if private key file exists
        if (!file_exists($this->privateKeyPath)) {
            $this->generateKeys();
        }
        // If bitpay token not exists
        if (!file_exists($this->bitpayTokenPath)) {
            $this->generateToken();
        }

        $bitpayTokenArray = require $this->bitpayTokenPath;
        $bitpayToken = $bitpayTokenArray['token'];

        $storageEngine = new \Bitpay\Storage\EncryptedFilesystemStorage($this->password); // Password may need to be updated if you changed it
        $privateKey    = $storageEngine->load($this->privateKeyPath);
        $publicKey     = $storageEngine->load($this->publicKeyPath);
        $client        = new \Bitpay\Client\Client();
        /**
         * The network is either livenet or testnet. You
         * can also create your own as long as it
         * implements the NetworkInterface. In this
         * example we will use testnet.
         */
        if ($this->testMode == true) {
            $network = new \Bitpay\Network\Testnet();
        } else {
            $network = new \Bitpay\Network\Livenet();
        }
        $adapter = new \Bitpay\Client\Adapter\CurlAdapter();
        $client->setPrivateKey($privateKey);
        $client->setPublicKey($publicKey);
        $client->setNetwork($network);
        $client->setAdapter($adapter);
        /**
         * The last object that must be injected is the token object.
         */
        $token = new \Bitpay\Token();
        $token->setToken($bitpayToken);
        /**
         * Token object is injected into the client
         */
        $client->setToken($token);

        /**
         * This is where we will start to create an Invoice object, make sure to check
         * the InvoiceInterface for methods that you can use.
         */
        $invoice = new \Bitpay\Invoice();

        $buyer = new \Bitpay\Buyer();
        $buyer->setEmail($request['payer_email']);

        // Add the buyers info to invoice
        $invoice->setBuyer($buyer);

        $amount = $request['amounts'][$this->configItem['currency']];

        /**
         * Item is used to keep track of a few things
         */
        $item = new \Bitpay\Item();
        $item->setCode($request['item_id'])
              ->setDescription($request['description'])
              ->setPrice($amount);

        $redirectUrl = getAppUrl($this->configItem['callbackUrl']);

         // Configure the rest of the invoice   
        $invoice->setItem($item)
                ->setNotificationEmail($this->configItem['notificationEmail'])
                ->setNotificationUrl($redirectUrl.'?paymentOption=bitpay-ipn')
                ->setRedirectUrl($redirectUrl.'?paymentOption='.$request['paymentOption'].'&orderId='.$request['order_id'].'&amount='.$amount)
                ->setCurrency(new \Bitpay\Currency($this->configItem['currency'])) 
                ->setOrderId($request['order_id']);

        /**
         * Updates invoice with new information such as the invoice id and the URL where
         * a customer can view the invoice.
         */
        try {
            
            $client->createInvoice($invoice);
            
        } catch (\Exception $e) {
            echo "Exception occured: " . $e->getMessage().PHP_EOL;
            $request  = $client->getRequest();
            $response = $client->getResponse();
            echo (string) $request.PHP_EOL.PHP_EOL.PHP_EOL;
            echo (string) $response.PHP_EOL.PHP_EOL;
            exit(1); // We do not want to continue if something went wrong
        }
        header("HTTP/1.1 200 OK");
        return [
            'status'     => 'success',
            'invoiceUrl' => $invoice->getUrl(),
            'invoiceId'  => $invoice->getId()
        ];
    }

    /**
     * Prepare bitcoin response data
     * @param $requestData
     *-----------------------------------------------------------------------*/
    public function preparePaymentRequestData($requestData)
    {
        if (false === $requestData) {
            return [
                'status' => 'error',
                'amount' => 0,
                'order_id' => null,
                'transaction_id' => null,
                'message' => 'Could not read from the php://input stream or invalid Bitpay IPN received.'
            ];
        }

        $ipn = json_decode($requestData);
        if (true === empty($ipn)) {
            return [
                'status' => 'error',
                'amount' => 0,
                'order_id' => null,
                'transaction_id' => null,
                'message' => 'Could not decode the JSON payload from BitPay.'
            ];
        }

        if (true === empty($ipn->id)) {
            return [
                'status' => 'error',
                'amount' => 0,
                'order_id' => null,
                'transaction_id' => null,
                'message' => 'Invalid Bitpay payment notification message received - did not receive invoice ID.'
            ];
        }

        $bitpayTokenArray = require $this->bitpayTokenPath;
        $bitpayToken = $bitpayTokenArray['token'];

        $client        = new \Bitpay\Client\Client();
        $network       = new \Bitpay\Network\Testnet();
        //$network = new \Bitpay\Network\Livenet();
        $adapter       = new \Bitpay\Client\Adapter\CurlAdapter();
        $client->setNetwork($network);
        $client->setAdapter($adapter);
        $token = new \Bitpay\Token();
        $token->setToken($bitpayToken); // UPDATE THIS VALUE
        $client->setToken($token);

        /**
         * This is where we will fetch the invoice object
         */
        $invoice = $client->getInvoice($ipn->id);
        $invoiceId = $invoice->getId();
        $invoiceStatus = $invoice->getStatus();
        $invoiceExceptionStatus = $invoice->getExceptionStatus();
        $invoicePrice = $invoice->getPrice();

        return [
            'status' => 'success',
            'amount' => $invoicePrice,
            'order_id' => $invoiceId,
            'transaction_id' => $invoiceId,
            'message' => 'Payment Successfull.'
        ];
    }
}