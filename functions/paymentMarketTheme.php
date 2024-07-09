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
$redirectUrls->setReturnUrl("".$base_url."pay.php?themeapproved=true")
    ->setCancelUrl("".$base_url."pay.php?themeapproved=false");

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
				   $store = mysqli_query($db,"INSERT INTO dot_transactions(uid_fk, payment_id, hash, complete, amonth, time, theme_id, theme_type)VALUES('$uid','$payment_id','$hash','0','$uamount', '$nowtime', '$themeID','market')") or die(mysqli_error($db));
			   
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