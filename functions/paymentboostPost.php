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
$redirectUrls->setReturnUrl("".$base_url."pay.php?boostpproved=true")
    ->setCancelUrl("".$base_url."pay.php?boostapproved=false");

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
			   $checkUser = mysqli_query($db,"SELECT uid_fk FROM dot_transactions WHERE uid_fk= '$uid' AND product_boost_id = '$boostPostID' AND complete = '1'") or die(mysqli_error($db));
			   if(mysqli_num_rows($checkUser) ==  0 ){
				   $store = mysqli_query($db,"INSERT INTO dot_transactions(uid_fk, payment_id, hash, complete, amonth, time, product_boost_id, display_type)VALUES('$uid','$payment_id','$hash','0','$uamount', '$nowtime', '$boostPostID','$boostDisplayType')") or die(mysqli_error($db));
			   }else if(mysqli_num_rows($checkUser) ==  1){
			       $setBoost = mysqli_query($db,"UPDATE dot_transactions SET amonth = amonth + $uamount, payment_id = '$payment_id', hash = '$hash' WHERE product_boost_id = '$boostPostID' AND uid_fk = '$uid'") or die(mysqli_error($db));
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