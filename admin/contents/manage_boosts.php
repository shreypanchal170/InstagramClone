<div class="page_title bold"><?php echo $page_Lang['manage_boosts'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '15';
$countSql = "SELECT COUNT(transaction_id) FROM dot_transactions WHERE product_boost_id IS NOT NULL";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_transactions WHERE product_boost_id IS NOT NULL ORDER BY transaction_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>  
        <th>Amout</th>
        <th>Time</th>
        <th  style="text-align:center !important;">Boosted Product</th>
        <th  style="text-align:center !important;">Payment Status</th>
        <th  style="text-align:center !important;">Action</th> 
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {

       $boostTransactionID = $row['transaction_id'];
	   $boostTransactionUserID = $row['uid_fk']; 
	   $boostTransactionPaymentID = $row['payment_id'];
	   $boostTransactionHashID = $row['hash'];
	   $boostTransactionComplete = $row['complete'];
	   $boostTransactionAmount = $row['amonth'];
	   $boostTransactionTime = $row['time'];
	   $boostTransactionThemeID = $row['theme_id'];
	   $boostTransactionThemeType = $row['theme_type'];
	   $boostTransactionPostID = $row['product_boost_id'];
	   $boostTransactionType = $row['display_type'];
	   $dataWithdrawalUserAvatar = $Dot->Dot_UserAvatar($boostTransactionUserID, $base_url);
	   
      $message_time=date("c", $boostTransactionTime);
	  $pointCalculated = '<span class="nocalculatedd">Not Completed!</span>';
	 if($boostTransactionComplete == 1){
	     $pointCalculated = '<span class="calculatedd">Completed</span>';
	 }
?>  
<tr class="langCur olds body<?php echo $boostTransactionID;?>" id="post_<?php echo $boostTransactionID;?>" data-last="<?php echo $boostTransactionID;?>">  
  <td class="bold_td"><?php echo $boostTransactionID; ?></td>  
  <td id="user<?php echo $boostTransactionID; ?>" data-id="<?php echo $boostTransactionUserID;?>">
     <div class="tableincontainer">
          <div class="publicher_avatar">
              <img src="<?php echo $dataWithdrawalUserAvatar;?>" class="a0uk">
          </div>
          <div class="publicher_name truncate"><a href="<?php echo $base_url.'profile/'.$Dot->Dot_GetUserName($boostTransactionUserID);?>"><?php echo $Dot->Dot_UserFullName($boostTransactionUserID);?></a></div>
      </div>
  </td>  
  <td>
     <div class="see_post" id="amount_<?php echo $boostTransactionID;?>" data-amount = "<?php echo $boostTransactionAmount;?>"><?php echo $boostTransactionAmount;?>$</div>
  </td>
  <td>
     <div class="see_time timeago" title="<?php echo $message_time;?>"></div>
  </td>
  <td style="padding:5px 0px !important;"> 
        <div class="see_post showThisPost_" data-type="showPostSingle" data-id="<?php echo $boostTransactionID;?>" data-ui="<?php echo $boostTransactionID;?>">See Post</div> 
  </td> 
  <td>
     <div class="see_post" style="text-align:center;display: inline-block;width: 100%; line-height:24px;" id="drawstat_<?php echo $boostTransactionID;?>"><?php echo $pointCalculated;?></div>
  </td>   
  <td class="copyUrl froz"> 
  <div class="btn waves-effect waves-light red boostdele" style="margin-left:10px;" id="<?php echo $boostTransactionID;?>" data-type="delete_boost"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div></div> 
  </td>
</tr>     
<?php  } ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_boosts?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 
<script type="text/javascript">
  $(document).ready(function(){
       $("body").on("click",".boostdele", function(){
	        var type = $(this).attr("data-type");
			var pointID = $(this).attr("id"); 
			var data = 'f='+type+'&boostid='+pointID;
			$.ajax({
				   type: 'POST',
				   url: requestUrl + 'admin/requests/request',
				   dataType: "json", 
				   data: data, 
				   beforeSend: function(){
					  $("#target-content").before('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
				   },
				   success: function(response){ 
						$('#ccm').remove(); 
							    if(response){
								     var success = response.point_deleted;
									 var paymenticon = response.pay_ok; 
									 if(success == 1){
								          M.toast({html: paymenticon, classes: 'warning'}); 
										  $("#post_"+pointID).slideUp("slow").promise().done(function() { $(this).remove(); });
									 }else {
										   M.toast({html: paymenticon, classes: 'warning'});   
									 }
								}  
				   }
			   });
	   });
   });
</script>
<div class="no_post_can_show">
    <div class="no_post_from">
         <div class="no_available">This post is no longer available.</div>
    </div>
</div>