<div class="current_withdrawal">
   <div class="next_payouts"><?php echo $page_Lang['your_next_payouts'][$dataUserPageLanguage];?></div>
   <div class="n_payouts">
       <?php  
	       if($userRequestedWithdrawalPayouts){
		      foreach($userRequestedWithdrawalPayouts as $requestedWithdrawal){
				     $requestedpayoutID = $requestedWithdrawal['withdraw_id']; 
					 $requestedpayoutAmount  = $requestedWithdrawal['withdraw_amounth'];  
					 $requestedpayoutTime = $requestedWithdrawal['withdraw_time']; 
					 $requestedpayoutType = $requestedWithdrawal['withdrawal_type']; 
					 if($requestedpayoutType == 'paypal'){
					     $textType = 'PayPal';
					 }else{$textType = $requestedpayoutType;}
	   ?> 
       <div class="pay_day"><?php echo $page_Lang['the_date_on_which_the_payment_was_requested'][$dataUserPageLanguage];?> <?php echo gmdate("d M Y", $requestedpayoutTime)?></div>
       <div class="vpymnt"><?php echo $requestedpayoutAmount;?>$ <div class="dlr"><?php echo $page_Lang['pay_via'][$dataUserPageLanguage];?> <?php echo $textType;?></div></div>  
       <?php }}?>
       <div class="may_pay"><?php echo $page_Lang['payment_processed_within'][$dataUserPageLanguage];?></div>
   </div>
</div>