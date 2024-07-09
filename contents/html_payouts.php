<?php include("html_payout_withdrawal.php");?>
<div class="payouts_history">Payouts History</div>
<div class="payouts">
<table class="table-general -bordered-h -statement-table">
  <thead>
    <tr>
      <td>Amount</td>
      <td>Payout Method</td>
      <td>Date Processed</td>
    </tr>
  </thead>
  <tbody>
  <?php 
  if($userWithdrawalPayouts){
      foreach($userWithdrawalPayouts as $payoutData){
		 $payoutID = $payoutData['withdraw_id']; 
		 $payoutAmount  = $payoutData['withdraw_amounth']; 
		 $payoutStatus = $payoutData['withdraw_status']; 
		 $payoutTime = $payoutData['withdraw_time']; 
		 $payoutType = $payoutData['withdrawal_type']; 
	  ?>	
      <tr>
          <td>$<?php echo $payoutAmount;?></td>
          <td><?php echo $payoutType;?></td>
          <td><?php echo gmdate("d M Y", $payoutTime);?></td>
     </tr> 	 
	<?php  }
  }
  ?> 
  </tbody>
</table>
</div>