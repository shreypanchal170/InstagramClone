<?php
// Include Header file
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once 'functions/methods/vendor/autoload.php';
require_once 'functions/inc.php';
 if (!defined('OOBENN_METHODS_CONFIG')) {   
	 define('OOBENN_METHODS_CONFIG', realpath('functions/paymentConfig.php'));
 }
$payment_time = time();
/*
 * Use PaytmResponse Class
 * Use PaystackResponse Class
 * Use StripeResponse Class
 * Use RazorpayResponse Class
 * Use InstamojoResponse Class
 * Use IyzicoResponse Class
 * Use PaypalIpnResponse Class
  * Use BitPayResponse Class
 */
use App\Components\Payment\PaytmResponse;
use App\Components\Payment\PaystackResponse;
use App\Components\Payment\StripeResponse;
use App\Components\Payment\RazorpayResponse;
use App\Components\Payment\InstamojoResponse;
use App\Components\Payment\IyzicoResponse;
use App\Components\Payment\PaypalIpnResponse;
use App\Components\Payment\BitPayResponse;

// Get Config Data 
$configData = configItem();
// Get Request Data when payment success or failed
$requestData = $_REQUEST;

// Check payment Method is paytm
if ($requestData['paymentOption'] == 'paytm') {
    // Get Payment Response instance
    $paytmResponse  = new PaytmResponse();

    // Fetch payment data using payment response instance
    $paytmData = $paytmResponse->getPaytmPaymentData($requestData);
    
    // Check if payment status is success
    if ($paytmData['STATUS'] == 'TXN_SUCCESS') {

        // Create payment success response data.
        $paymentResponseData = [
            'status'   => true,
            'rawData'  => $paytmData,
            'data'     => preparePaymentData($paytmData['ORDERID'], $paytmData['TXNAMOUNT'], $paytmData['TXNID'], 'paytm')
        ];
        // Send data to payment response.
        paymentResponse($paymentResponseData);
    } else {
        // Create payment failed response data.
        $paymentResponseData = [
            'status'   => false,
            'rawData'  => $paytmData,
            'data'     => preparePaymentData($paytmData['ORDERID'], $paytmData['TXNAMOUNT'], $paytmData['TXNID'], 'paytm')
        ];
        // Send data to payment response function
        paymentResponse($paymentResponseData);
    }   
// Check payment method is instamojo
} else if ($requestData['paymentOption'] == 'instamojo') {
    
    // Check if payment successfully procced
    if ($requestData['payment_status'] == "Credit") {

        // Get Instance of instamojo response service
        $instamojoResponse  = new InstamojoResponse();

        // fetch payment data from instamojo response instance
        $instamojoData = $instamojoResponse->getInstamojoPaymentData($requestData);
        
        // Prepare data for payment response
        $paymentResponseData = [
            'status'   => true,
            'rawData'  => $instamojoData,
            'data'     => preparePaymentData($requestData['orderId'], $instamojoData['amount'], $instamojoData['payment_id'], 'instamojo')
        ];
        // Send data to payment response
        paymentResponse($paymentResponseData);
    // Check if payment failed then send failed response
    } else {
        // Prepare data for failed response data
        $paymentResponseData = [
            'status'   => false,
            'rawData'  => $requestData,
            'data'     => preparePaymentData($requestData['orderId'], $instamojoData['amount'], null, 'instamojo')
        ];
        // Send data to payment response function
        paymentResponse($paymentResponseData);
    }

// Check if payment method is iyzico.
} else if ($requestData['paymentOption'] == 'iyzico') {
    
    // Check if payment status is success for iyzico.
    if ($_REQUEST['status'] == 'success') {
        // Get iyzico response.
        $iyzicoResponse  = new IyzicoResponse();

        // fetch payment data using iyzico response instance.
        $iyzicoData = $iyzicoResponse->getIyzicoPaymentData($requestData);
        $rawResult = json_decode($iyzicoData->getRawResult(), true);
        
        // Check if iyzico payment data is success
        // Then create a array for success data
        if ($iyzicoData->getStatus() == 'success') {
            $paymentResponseData = [
                'status'   => true,
                'rawData'  => (array) $iyzicoData,
                'data'     => preparePaymentData($requestData['orderId'], $rawResult['price'], $rawResult['conversationId'], 'iyzico')
            ];			
		   //Calculate User Earning and Admin Earning
		   $adminEarning = $rawResult['price'] /$paymentFEE;
		   $userEarning = $rawResult['price'] - $adminEarning;
		   mysqli_query($db,"UPDATE dot_payments SET payment_status = '1', amount = '".$rawResult['price']."', fee = '$paymentFEE', admin_earning = '".$adminEarning."', user_earning = '".$userEarning."', payment_time = '$payment_time' WHERE order_key = '".$requestData['orderId']."'") or die(mysqli_error($db));
		   $checkPm = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE order_key = '".$requestData['orderId']."'") or die(mysqli_error($db));
		   $proTypeData=mysqli_fetch_array($checkPm,MYSQLI_ASSOC); 
		   $proTypeis = $proTypeData['pro_type'];
		   $checkPb = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeDataPb=mysqli_fetch_array($checkPb,MYSQLI_ASSOC);  
		   $proDuctOwnerID = $proTypeDataPb['product_owner_id'];
		   $proDuctPaymentPostID = $proTypeDataPb['payment_post_id'];
		   if(!empty($proTypeis)){
		          $checkPmPlain = mysqli_query($db,"SELECT pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_key_number = '$proTypeis'") or die(mysqli_error($db));
				  $proPlainData=mysqli_fetch_array($checkPmPlain,MYSQLI_ASSOC);  
				  $thePlainNumber = $proPlainData['pro_price_time'];
				  $thePlainDwmy = $proPlainData['pro_price_year_day_month_week'];
				  $alpha = strtotime('+'.$thePlainNumber.' '.$thePlainDwmy.'', time());
				  $updateUserProStatus = mysqli_query($db,"UPDATE dot_users SET pro_user_type = '1' , pro_user_plain_time = '$alpha', pro_system_type = '$proTypeis' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($db));
		   } 
		   if(!empty($proDuctOwnerID)){ 
		         mysqli_query($db,"UPDATE dot_user_cart SET purchase_status = '1', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber'  WHERE product_owner_id = '$proDuctOwnerID' AND user_id_fk = '$uid' AND product_id_fk = '$proDuctPaymentPostID'") or die(mysqli_error($db));
		    }
            // Send data to payment response
            paymentResponse($paymentResponseData);
        // If payment failed then create data for failed
        } else {
			mysqli_query($db,"DELETE FROM dot_payments WHERE order_key='".$requestData['orderId']."'") or die(mysqli_error($db));
            // Prepare failed payment data
            $paymentResponseData = [
                'status'   => false,
                'rawData'  => (array) $iyzicoData,
                'data'     => preparePaymentData($requestData['orderId'], $rawResult['price'], $rawResult['conversationId'], 'iyzico')
            ]; 
            // Send data to payment response
            paymentResponse($paymentResponseData);
        }
    // Check before 3d payment process payment failed
    } else {
        // Prepare failed payment data
        $paymentResponseData = [
            'status'   => false,
            'rawData'  => $requestData,
            'data'     => preparePaymentData($requestData['orderId'], $rawResult['price'], null, 'iyzico')
        ];
        // Send data to process response
        paymentResponse($paymentResponseData);
    }

// Check Paypal payment process
} else if ($requestData['paymentOption'] == 'paypal') {
    // Get instance of paypal 
    $paypalIpnResponse  = new PaypalIpnResponse();

    // fetch paypal payment data
    $paypalIpnData = $paypalIpnResponse->getPaypalPaymentData();
    $rawData = json_decode($paypalIpnData, true);

    // Note : IPN and redirects will come here
    // Check if payment status exist and it is success
    if (isset($requestData['payment_status']) and $requestData['payment_status'] == "Completed") {

        // Then create a data for success paypal data
        $paymentResponseData = [
            'status'    => true,
            'rawData'   => (array) $paypalIpnData,
            'data'     => preparePaymentData($rawData['invoice'], $rawData['payment_gross'], $rawData['txn_id'], 'paypal')
        ];     
		
		$CurrentPay = $rawData['payment_gross'];
		$adminEarning = ($rawData['payment_gross'])/$paymentFEE;
		$userEarning = ($rawData['payment_gross']) - $adminEarning;
		mysqli_query($db,"UPDATE dot_payments SET payment_status = '1', amount = '".$CurrentPay."', fee = '$paymentFEE', admin_earning = '".$adminEarning."', user_earning = '".$userEarning."', payment_time = '$payment_time' WHERE order_key = '".$rawData['invoice']."'") or die(mysqli_error($db));
        $checkPm = mysqli_query($db,"SELECT pro_type FROM dot_payments WHERE order_key = '".$rawData['invoice']."'") or die(mysqli_error($db));
		   $proTypeData=mysqli_fetch_array($checkPm,MYSQLI_ASSOC); 
		   $proTypeis = $proTypeData['pro_type'];
		   $checkPb = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeDataPb=mysqli_fetch_array($checkPb,MYSQLI_ASSOC);  
		   $proDuctOwnerID = $proTypeDataPb['product_owner_id'];
		   $proDuctPaymentPostID = $proTypeDataPb['payment_post_id'];
		   if(!empty($proTypeis)){
		          $checkPmPlain = mysqli_query($db,"SELECT pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_key_number = '$proTypeis'") or die(mysqli_error($db));
				  $proPlainData=mysqli_fetch_array($checkPmPlain,MYSQLI_ASSOC);  
				  $thePlainNumber = $proPlainData['pro_price_time'];
				  $thePlainDwmy = $proPlainData['pro_price_year_day_month_week'];
				  $alpha = strtotime('+'.$thePlainNumber.' '.$thePlainDwmy.'', time());
				  $updateUserProStatus = mysqli_query($db,"UPDATE dot_users SET pro_user_type = '1' , pro_user_plain_time = '$alpha', pro_system_type = '$proTypeis' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($db));
		   } 
		   if(!empty($proDuctOwnerID)){ 
		         mysqli_query($db,"UPDATE dot_user_cart SET purchase_status = '1', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber'  WHERE product_owner_id = '$proDuctOwnerID' AND user_id_fk = '$uid' AND product_id_fk = '$proDuctPaymentPostID'") or die(mysqli_error($db));
		    }
		// Send data to payment response function for further process
        paymentResponse($paymentResponseData);
    // Check if payment not successfull    
    } else {
        // Prepare payment failed data
        $paymentResponseData = [
            'status'   => false,
            'rawData'  => [],
            'data'     => preparePaymentData($rawData['invoice'], $rawData['payment_gross'], null, 'paypal')
        ]; 
		mysqli_query($db,"DELETE FROM dot_payments WHERE order_key='".$rawData['invoice']."'") or die(mysqli_error($db));
        // Send data to payment response function for further process
        paymentResponse($paymentResponseData);
    }

// Check Paystack payment process
} else if ($requestData['paymentOption'] == 'paystack') {

    $requestData = json_decode($requestData['response'], true);
    
    // Check if status key exists and payment is successfully completed
    if (isset($requestData['status']) and $requestData['status'] == "success") {
        // Create data for payment success
        $paymentResponseData = [
            'status'   => true,
            'rawData'   => $requestData,
            'data'     => preparePaymentData($requestData['data']['reference'], $requestData['data']['amount'], $requestData['data']['reference'], 'paystack')
        ]; 
		 
	    //Calculate User Earning and Admin Earning
		$CurrentPay = $requestData['data']['amount']/100;
		$adminEarning = ($requestData['data']['amount']/100)/$paymentFEE;
		$userEarning = ($requestData['data']['amount']/100) - $adminEarning;
		mysqli_query($db,"UPDATE dot_payments SET payment_status = '1', amount = '".$CurrentPay."', fee = '$paymentFEE', admin_earning = '".$adminEarning."', user_earning = '".$userEarning."', payment_time = '$payment_time' WHERE payment_option = 'paystack' AND payment_user_id = '$uid' AND payment_status = '0'") or die(mysqli_error($db));
           $checkPm = mysqli_query($db,"SELECT pro_type FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pm' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeData=mysqli_fetch_array($checkPm,MYSQLI_ASSOC); 
		   $proTypeis = $proTypeData['pro_type'];
		   $checkPb = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeDataPb=mysqli_fetch_array($checkPb,MYSQLI_ASSOC);  
		   $proDuctOwnerID = $proTypeDataPb['product_owner_id'];
		   $proDuctPaymentPostID = $proTypeDataPb['payment_post_id'];
		   if(!empty($proTypeis)){
		          $checkPmPlain = mysqli_query($db,"SELECT pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_key_number = '$proTypeis'") or die(mysqli_error($db));
				  $proPlainData=mysqli_fetch_array($checkPmPlain,MYSQLI_ASSOC);  
				  $thePlainNumber = $proPlainData['pro_price_time'];
				  $thePlainDwmy = $proPlainData['pro_price_year_day_month_week'];
				  $alpha = strtotime('+'.$thePlainNumber.' '.$thePlainDwmy.'', time());
				  $updateUserProStatus = mysqli_query($db,"UPDATE dot_users SET pro_user_type = '1' , pro_user_plain_time = '$alpha', pro_system_type = '$proTypeis' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($db));
		   }
		    if(!empty($proDuctOwnerID)){ 
		         mysqli_query($db,"UPDATE dot_user_cart SET purchase_status = '1', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber'  WHERE product_owner_id = '$proDuctOwnerID' AND user_id_fk = '$uid' AND product_id_fk = '$proDuctPaymentPostID'") or die(mysqli_error($db));
		    }
		// Send data to payment response for further process
        paymentResponse($paymentResponseData);
    // If paystack payment is failed    
    } else {
        // Prepare data for failed payment 
        $paymentResponseData = [
            'status'   => false,
            'rawData'   => $requestData,
            'data'     => preparePaymentData($requestData['data']['reference'], $requestData['data']['amount'], $requestData['data']['reference'], 'paystack')
        ];
		mysqli_query($db,"DELETE FROM dot_payments WHERE payment_option = 'paystack' AND payment_user_id = '$uid' AND payment_status = '0'") or die(mysqli_error($db));
        // Send data to payment response to further process
        paymentResponse($paymentResponseData);
    }

// Check Stripe payment process
} else if ($requestData['paymentOption'] == 'stripe') {

    $stripeResponse = new StripeResponse();

    $stripeData = $stripeResponse->retrieveStripePaymentData($requestData['session_id']);
    
    // Check if payment charge status key exist in stripe data and it success
    if (isset($stripeData['status']) and $stripeData['status'] == "succeeded") {
        // Prepare data for success
        $paymentResponseData = [
            'status'   => true,
            'rawData'   => $stripeData,
            'data'     => preparePaymentData($stripeData->charges->data[0]['balance_transaction'], $stripeData->amount, $stripeData->charges->data[0]['balance_transaction'], 'stripe')
        ];
		//Calculate User Earning and Admin Earning
		$CurrentPay = $stripeData->amount/100;
		$adminEarning = ($stripeData->amount/100)/$paymentFEE;
		$userEarning = ($stripeData->amount/100) - $adminEarning;
		mysqli_query($db,"UPDATE dot_payments SET payment_status = '1', amount = '".$CurrentPay."', fee = '$paymentFEE', admin_earning = '".$adminEarning."', user_earning = '".$userEarning."', payment_time = '$payment_time' WHERE order_key = '".$requestData['orderId']."'") or die(mysqli_error($db));
        $checkPm = mysqli_query($db,"SELECT pro_type FROM dot_payments WHERE order_key = '".$requestData['orderId']."'") or die(mysqli_error($db));
		   $proTypeData=mysqli_fetch_array($checkPm,MYSQLI_ASSOC); 
		   $proTypeis = $proTypeData['pro_type'];
		   $checkPb = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeDataPb=mysqli_fetch_array($checkPb,MYSQLI_ASSOC);  
		   $proDuctOwnerID = $proTypeDataPb['product_owner_id'];
		   $proDuctPaymentPostID = $proTypeDataPb['payment_post_id'];
		   if(!empty($proTypeis)){
		          $checkPmPlain = mysqli_query($db,"SELECT pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_key_number = '$proTypeis'") or die(mysqli_error($db));
				  $proPlainData=mysqli_fetch_array($checkPmPlain,MYSQLI_ASSOC);  
				  $thePlainNumber = $proPlainData['pro_price_time'];
				  $thePlainDwmy = $proPlainData['pro_price_year_day_month_week'];
				  $alpha = strtotime('+'.$thePlainNumber.' '.$thePlainDwmy.'', time());
				  $updateUserProStatus = mysqli_query($db,"UPDATE dot_users SET pro_user_type = '1' , pro_user_plain_time = '$alpha', pro_system_type = '$proTypeis' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($db));
		   } 
		   if(!empty($proDuctOwnerID)){ 
		         mysqli_query($db,"UPDATE dot_user_cart SET purchase_status = '1', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber'  WHERE product_owner_id = '$proDuctOwnerID' AND user_id_fk = '$uid' AND product_id_fk = '$proDuctPaymentPostID'") or die(mysqli_error($db));
		    }
    // Check if stripe data is failed    
    } else {
        // Prepare failed payment data
        $paymentResponseData = [
            'status'   => false,
            'rawData'   => $stripeData,
            'data'     => preparePaymentData($requestData['orderId'], $stripeData->amount, null, 'stripe')
        ]; 
		mysqli_query($db,"DELETE FROM dot_payments WHERE order_key='".$requestData['orderId']."'") or die(mysqli_error($db));
    } 
    // Send data to payment response for further process
    paymentResponse($paymentResponseData);

// Check Razorpay payment process
} else if ($requestData['paymentOption'] == 'razorpay') {
    $orderId = $requestData['orderId'];
    
    $requestData = json_decode($requestData['response'], true);
    
    // Check if razorpay status exist and status is success
    if (isset($requestData['status']) and $requestData['status'] == 'captured') {
        // prepare payment data
        $paymentResponseData = [
            'status'   => true,
            'rawData'   => $requestData,
            'data'     => preparePaymentData($orderId, $requestData['amount'], $requestData['id'], 'razorpay')
        ];
		//Calculate User Earning and Admin Earning
		$CurrentPay = $requestData['amount']/100;
		$adminEarning = ($requestData['amount']/100)/$paymentFEE;
		$userEarning = ($requestData['amount']/100) - $adminEarning;
		mysqli_query($db,"UPDATE dot_payments SET payment_status = '1', amount = '".$CurrentPay."', fee = '$paymentFEE', admin_earning = '".$adminEarning."', user_earning = '".$userEarning."', payment_time = '$payment_time' WHERE order_key = '".$orderId."'") or die(mysqli_error($db));
        $checkPm = mysqli_query($db,"SELECT pro_type FROM dot_payments WHERE order_key = '".$orderId."'") or die(mysqli_error($db));
		   $proTypeData=mysqli_fetch_array($checkPm,MYSQLI_ASSOC); 
		   $proTypeis = $proTypeData['pro_type'];
		   $checkPb = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeDataPb=mysqli_fetch_array($checkPb,MYSQLI_ASSOC);  
		   $proDuctOwnerID = $proTypeDataPb['product_owner_id'];
		   $proDuctPaymentPostID = $proTypeDataPb['payment_post_id'];
		   if(!empty($proTypeis)){
		          $checkPmPlain = mysqli_query($db,"SELECT pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_key_number = '$proTypeis'") or die(mysqli_error($db));
				  $proPlainData=mysqli_fetch_array($checkPmPlain,MYSQLI_ASSOC);  
				  $thePlainNumber = $proPlainData['pro_price_time'];
				  $thePlainDwmy = $proPlainData['pro_price_year_day_month_week'];
				  $alpha = strtotime('+'.$thePlainNumber.' '.$thePlainDwmy.'', time());
				  $updateUserProStatus = mysqli_query($db,"UPDATE dot_users SET pro_user_type = '1' , pro_user_plain_time = '$alpha', pro_system_type = '$proTypeis' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($db));
		   } 
		   if(!empty($proDuctOwnerID)){ 
		         mysqli_query($db,"UPDATE dot_user_cart SET purchase_status = '1', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber'  WHERE product_owner_id = '$proDuctOwnerID' AND user_id_fk = '$uid' AND product_id_fk = '$proDuctPaymentPostID'") or die(mysqli_error($db));
		    }
		// send data to payment response
        paymentResponse($paymentResponseData);
    // razorpay status is failed
    } else {
        // prepare payment data for failed payment
        $paymentResponseData = [
            'status'   => false,
            'rawData'   => $requestData,
            'data'     => preparePaymentData($orderId, $requestData['amount'], $requestData['id'], 'razorpay')
        ];
		mysqli_query($db,"DELETE FROM dot_payments WHERE order_key='".$orderId."' AND payment_status = '0'") or die(mysqli_error($db));
        // send data to payment response
        paymentResponse($paymentResponseData);
    }
} else if ($requestData['paymentOption'] == 'authorize-net') {
    $orderId = $requestData['order_id'];
    
    $requestData = json_decode($requestData['response'], true);
    
    // Check if razorpay status exist and status is success
    if (isset($requestData['status']) and $requestData['status'] == 'success') {
        // prepare payment data
        $paymentResponseData = [
            'status'   => true,
            'rawData'   => $requestData,
            'data'     => preparePaymentData($orderId, $requestData['amount'], $requestData['transaction_id'], 'authorize-net')
        ];
		//Calculate User Earning and Admin Earning
		$CurrentPay = $requestData['amount'];
		$adminEarning = $requestData['amount']/$paymentFEE;
		$userEarning = $requestData['amount'] - $adminEarning;
		mysqli_query($db,"UPDATE dot_payments SET payment_status = '1', amount = '".$CurrentPay."', fee = '$paymentFEE', admin_earning = '".$adminEarning."', user_earning = '".$userEarning."', payment_time = '$payment_time' WHERE order_key = '".$requestData['order_id']."'") or die(mysqli_error($db));
		$checkPm = mysqli_query($db,"SELECT pro_type FROM dot_payments WHERE order_key = '".$requestData['order_id']."'") or die(mysqli_error($db));
		   $proTypeData=mysqli_fetch_array($checkPm,MYSQLI_ASSOC); 
		   $proTypeis = $proTypeData['pro_type'];
		   $checkPb = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeDataPb=mysqli_fetch_array($checkPb,MYSQLI_ASSOC);  
		   $proDuctOwnerID = $proTypeDataPb['product_owner_id'];
		   $proDuctPaymentPostID = $proTypeDataPb['payment_post_id'];
		   if(!empty($proTypeis)){
		          $checkPmPlain = mysqli_query($db,"SELECT pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_key_number = '$proTypeis'") or die(mysqli_error($db));
				  $proPlainData=mysqli_fetch_array($checkPmPlain,MYSQLI_ASSOC);  
				  $thePlainNumber = $proPlainData['pro_price_time'];
				  $thePlainDwmy = $proPlainData['pro_price_year_day_month_week'];
				  $alpha = strtotime('+'.$thePlainNumber.' '.$thePlainDwmy.'', time());
				  $updateUserProStatus = mysqli_query($db,"UPDATE dot_users SET pro_user_type = '1' , pro_user_plain_time = '$alpha', pro_system_type = '$proTypeis' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($db));
		   } 
		   if(!empty($proDuctOwnerID)){ 
		         mysqli_query($db,"UPDATE dot_user_cart SET purchase_status = '1', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber'  WHERE product_owner_id = '$proDuctOwnerID' AND user_id_fk = '$uid' AND product_id_fk = '$proDuctPaymentPostID'") or die(mysqli_error($db));
		    }
        // send data to payment response
        paymentResponse($paymentResponseData);
    // razorpay status is failed
    } else {
        // prepare payment data for failed payment
        $paymentResponseData = [
            'status'   => false,
            'rawData'   => $requestData,
            'data'     => preparePaymentData($orderId, $requestData['amount'], $requestData['transaction_id'], 'authorize-net')
        ];
		mysqli_query($db,"DELETE FROM dot_payments WHERE order_key='".$orderId."'") or die(mysqli_error($db));
        // send data to payment response
        paymentResponse($paymentResponseData);
    }
} else if ($requestData['paymentOption'] == 'bitpay') {
    // prepare payment data
    $paymentResponseData = [
        'status'   => true,
        'rawData'  => $requestData,
        'data'     => preparePaymentData($requestData['orderId'], $requestData['amount'], $requestData['orderId'], 'bitpay')
    ];
	//Calculate User Earning and Admin Earning
		$CurrentPay = $requestData['amount'];
		$adminEarning = $requestData['amount']/$paymentFEE;
		$userEarning = $requestData['amount'] - $adminEarning;
		mysqli_query($db,"UPDATE dot_payments SET payment_status = '1', amount = '".$CurrentPay."', fee = '$paymentFEE', admin_earning = '".$adminEarning."', user_earning = '".$userEarning."', payment_time = '$payment_time' WHERE order_key = '".$requestData['orderId']."'") or die(mysqli_error($db)); 
       $checkPm = mysqli_query($db,"SELECT pro_type FROM dot_payments WHERE order_key = '".$requestData['order_id']."'") or die(mysqli_error($db));
		   $proTypeData=mysqli_fetch_array($checkPm,MYSQLI_ASSOC); 
		   $proTypeis = $proTypeData['pro_type'];
		  $checkPb = mysqli_query($db,"SELECT pro_type,product_owner_id,payment_post_id FROM dot_payments WHERE payment_user_id = '$uid' AND payment_type = 'pb' ORDER BY payment_id DESC LIMIT 1") or die(mysqli_error($db));
		   $proTypeDataPb=mysqli_fetch_array($checkPb,MYSQLI_ASSOC);  
		   $proDuctOwnerID = $proTypeDataPb['product_owner_id'];
		   $proDuctPaymentPostID = $proTypeDataPb['payment_post_id'];
		   if(!empty($proTypeis)){
		          $checkPmPlain = mysqli_query($db,"SELECT pro_price_time,pro_price_year_day_month_week FROM dot_pro_price_table WHERE price_key_number = '$proTypeis'") or die(mysqli_error($db));
				  $proPlainData=mysqli_fetch_array($checkPmPlain,MYSQLI_ASSOC);  
				  $thePlainNumber = $proPlainData['pro_price_time'];
				  $thePlainDwmy = $proPlainData['pro_price_year_day_month_week'];
				  $alpha = strtotime('+'.$thePlainNumber.' '.$thePlainDwmy.'', time());
				  $updateUserProStatus = mysqli_query($db,"UPDATE dot_users SET pro_user_type = '1' , pro_user_plain_time = '$alpha', pro_system_type = '$proTypeis' WHERE user_id = '$uid' AND user_status = '1'") or die(mysqli_error($db));
		   } 
		   if(!empty($proDuctOwnerID)){ 
		         mysqli_query($db,"UPDATE dot_user_cart SET purchase_status = '1', customer_country = '$dataCountry', customer_city = '$dataCity', customer_state = '$dataState', customer_fullname = '$profileShoppingFullName' ,customer_phone = '$profileShoppingPhoneNumber',customer_address = '$profileShoppingFullAddress',customer_post_code = '$dataUserPostCode',customer_personal_id_or_passport_id = '$dataUserPassportCodeOrIdNumber'  WHERE product_owner_id = '$proDuctOwnerID' AND user_id_fk = '$uid' AND product_id_fk = '$proDuctPaymentPostID'") or die(mysqli_error($db));
		    }
	// send data to payment response
    paymentResponse($paymentResponseData);
} else if ($requestData['paymentOption'] == 'bitpay-ipn') {
    $bitpayResponse = new BitPayResponse;
    $rawPostData = file_get_contents('php://input');
    $ipnData = $bitpayResponse->getBitPayPaymentData($rawPostData);
    if ($ipnData['status'] == 'success') {
        // code here
		mysqli_query($db,"UPDATE dot_payments SET payment_status = '1' WHERE order_key = '".$requestData['orderId']."'") or die(mysqli_error($db));
    } else {
        // code here
		mysqli_query($db,"DELETE FROM dot_payments WHERE order_key='".$requestData['orderId']."'") or die(mysqli_error($db));
    }
}

/*
 * This payment used for get Success / Failed data for any payment method.
 *
 * @param array $paymentResponseData - contains : status and rawData
 *
 */
function paymentResponse($paymentResponseData) {
    // payment status success
    if ($paymentResponseData['status']) {

        // Show payment success page or do whatever you want, like send email, notify to user etc
        header('Location: '. getAppUrl('payment-success.php'));  
		 //  var_dump($paymentResponseData);   
    } else {        
        // Show payment error page or do whatever you want, like send email, notify to user etc
        header('Location: '. getAppUrl('payment-failed.php'));
    }
}

/*
* Prepare Payment Data.
*
* @param array $paymentData
*
*/
function preparePaymentData($orderId, $amount, $txnId, $paymentGateway) {
    return [
        'order_id'              => $orderId,
        'amount'                => $amount,
        'payment_reference_id'  => $txnId,
        'payment_gatway'        => $paymentGateway
    ];
}