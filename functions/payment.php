<?php   
include_once('paypal_config.php');
//$total = $amount;
// After Step 2
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal($uamount);
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("".$base_url."pay.php?approved=true")
    ->setCancelUrl("".$base_url."pay.php?approved=false");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);
try {
           $payment->create($apiContext);
           $rrurl = $payment->getApprovalLink();
           $hash = md5($payment->getId());
		   $_SESSION['paypal_hash'] = $hash;
		   $payment_id = $payment->getId();
		   $nowtime = time();
		   if(is_numeric($uamount)){
			   $checkUser = mysqli_query($db,"SELECT uid_fk FROM dot_transactions WHERE uid_fk= '$uid' AND complete = '1'") or die(mysqli_error($db));
			   if(mysqli_num_rows($checkUser) == '0'){
				   $store = mysqli_query($db,"INSERT INTO dot_transactions(uid_fk, payment_id, hash, complete, amonth, time)VALUES('$uid','$payment_id','$hash','0','$uamount', '$nowtime')") or die(mysqli_error($db));
			   }else{
					$storeUpdate = mysqli_query($db,"UPDATE dot_transactions SET payment_id = '$payment_id' , hash = '$hash' , complete = '0', amonth = '$uamount', time = '$nowtime' WHERE uid_fk = '$uid'") or die(mysqli_error($db));
			   } 
			   echo $rrurl;
		   } else {
		        echo '200';
		   }
		   //header('Location:' .$rrurl);
           //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n"; 

} catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}
  
?>