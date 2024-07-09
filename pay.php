<?php
include("functions/inc.php");

if(isset($_GET['approved'])){
     $approved = $_GET['approved'] === 'true';
	 if($approved){
	  
	    $payerId = mysqli_real_escape_string($db,$_GET['PayerID']);
		// Get Payment ID from Database
		$pp = mysqli_real_escape_string($db,$_SESSION['paypal_hash']);
		$paymentId = mysqli_query($db, "SELECT payment_id,amonth,uid_fk,complete FROM dot_transactions WHERE hash = '$pp' AND complete = '0'") or die(mysqli_error($db));
		$getPaymentID = mysqli_fetch_array($paymentId, MYSQLI_ASSOC);
	    $newCredit = $getPaymentID['amonth'];
		$paymentUserID = $getPaymentID['uid_fk'];
		$completePayment = $getPaymentID['complete'];
		if($completePayment == 0){
		      $saveUserCredit = mysqli_query($db, "UPDATE dot_users SET user_credit = user_credit + $newCredit WHERE user_id = '$paymentUserID' AND user_status = '1'") or die(mysqli_error($db));
		      $updatePaymentHash = mysqli_query($db,"UPDATE dot_transactions SET complete = '1' WHERE hash = '$pp'") or die(mysqli_error($db));
			  header('Location: ' . $base_url . 'credit/buyCredit');
		}else{
		    header('Location: ' . $base_url . 'credit/buyCredit');
		} 
	    die();
	   }else{
	      header('location: index.php');
	  }
}
if(isset($_GET['themeapproved'])){
     $approved = $_GET['themeapproved'] === 'true';
	 if($approved){
	  
	    $payerId = mysqli_real_escape_string($db,$_GET['PayerID']);
		// Get Payment ID from Database
		$pp = mysqli_real_escape_string($db,$_SESSION['paypal_hash']);
		$paymentId = mysqli_query($db, "SELECT payment_id,amonth,uid_fk,complete,theme_id, theme_type FROM dot_transactions WHERE hash = '$pp' AND complete = '0'") or die(mysqli_error($db));
		$getPaymentID = mysqli_fetch_array($paymentId, MYSQLI_ASSOC);
	    $newCredit = $getPaymentID['amonth'];
		$paymentUserID = $getPaymentID['uid_fk'];
		$completePayment = $getPaymentID['complete'];
		$thethemeID = $getPaymentID['theme_id'];
		$pTime = time();
		if($completePayment == 0){
		      $saveUserCredit = mysqli_query($db, "INSERT INTO dot_user_market_themes(uid_fk,market_theme_id,purchase_time,amounth)VALUES('$paymentUserID','$thethemeID','$pTime','$newCredit')") or die(mysqli_error($db)); 
			  //$updatePaymentHash = mysqli_query($db,"DELETE FROM dot_transactions WHERE hash = '$pp'") or die(mysqli_error($db));
			  $query =mysqli_query($db,"UPDATE dot_transactions SET complete = '1' WHERE hash = '$pp' AND uid_fk = '$paymentUserID'") or die(mysqli_error($db)); 
			  $getUserMarketID = mysqli_query($db, "SELECT market_id, market_place_owner_id, market_temporary_name FROM dot_user_market WHERE market_place_owner_id = '$paymentUserID'") or die(mysqli_error($db));
			  $getName = mysqli_fetch_array($getUserMarketID, MYSQLI_ASSOC);
			  $marketName = $getName['market_temporary_name'];
			  header('Location: ' . $base_url . 'mymarket/'.$marketName);
		}else{
		     header('Location: ' . $base_url . 'marketThemes');
		} 
	    die();
	   }else{
	      header('location: index.php');
	  }
}
if(isset($_GET['boostpproved'])){
     $approved = $_GET['boostpproved'] === 'true';
	 if($approved){
	  
	    $payerId = mysqli_real_escape_string($db,$_GET['PayerID']);
		// Get Payment ID from Database
		$pp = mysqli_real_escape_string($db,$_SESSION['paypal_hash']);
		$paymentId = mysqli_query($db, "SELECT uid_fk, payment_id, hash, complete, amonth, time, product_boost_id,display_type FROM dot_transactions WHERE hash = '$pp' AND complete IN('0','1')") or die(mysqli_error($db));
		$getPaymentID = mysqli_fetch_array($paymentId, MYSQLI_ASSOC);
	    $newCredit = $getPaymentID['amonth'];
		$paymentUserID = $getPaymentID['uid_fk'];
		$completePayment = $getPaymentID['complete'];
		$boostPostID = $getPaymentID['product_boost_id'];
		$boostDisplayType = $getPaymentID['display_type'];
		$boostPypalHash = $getPaymentID['hash'];
		$pTime = time();
		if($completePayment == 0){ 
		      $setBoost = mysqli_query($db,"UPDATE dot_user_posts SET ads_status = '1', ads_price = ads_price + $newCredit , ads_display_type = '$boostDisplayType', ads_budget = ads_budget + $newCredit WHERE user_post_id = '$boostPostID' AND user_id_fk = '$uid' ") or die(mysqli_error($db));
			  //$updatePaymentHash = mysqli_query($db,"DELETE FROM dot_transactions WHERE hash = '$pp'") or die(mysqli_error($db));
			  mysqli_query($db,"UPDATE dot_transactions SET complete = '1' WHERE hash = '$pp'") or die(mysqli_error($db));
			  header('Location: ' . $base_url . 'boosted');
		} else if($completePayment == 1){
			$paymentId = mysqli_query($db, "SELECT uid_fk, payment_id, hash, complete, amonth, time, product_boost_id,display_type FROM dot_transactions WHERE hash = '$pp' AND complete = '1'") or die(mysqli_error($db));
			$getPaymentID = mysqli_fetch_array($paymentId, MYSQLI_ASSOC);
			$newCredit = $getPaymentID['amonth'];
			$paymentUserID = $getPaymentID['uid_fk'];
			$completePayment = $getPaymentID['complete'];
			$boostPostID = $getPaymentID['product_boost_id'];
			$boostDisplayType = $getPaymentID['display_type'];
			$boostPypalHash = $getPaymentID['hash'];
		      $setBoost = mysqli_query($db,"UPDATE dot_user_posts SET ads_status = '1', ads_price = ads_price + $newCredit , ads_display_type = '$boostDisplayType', ads_budget = ads_budget + $newCredit WHERE user_post_id = '$boostPostID' AND user_id_fk = '$uid' ") or die(mysqli_error($db));
			  header('Location: ' . $base_url . 'boosted');
		}else {
		   header('Location: '.$base_url.'');
		}
	    die();
	   }else{
	      header('location: index.php');
	  }
}
?>