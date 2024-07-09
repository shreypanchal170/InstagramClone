<div class="page_title bold"><?php echo $page_Lang['manage_verified_users'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '15';
$countSql = "SELECT COUNT(user_id) FROM dot_users WHERE user_status = '1' AND verified_user = '1'";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  
if($total_pages < $pagep){
   header("Location: $base_url/dashboard/verified_user_management");
   exit();
} 
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_users WHERE user_status = '1' AND verified_user = '1' ORDER BY user_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>  
        <th>Verified Badge</th>
        <th>Email Verification</th>
        <th>Registered</th>  
        <th  style="text-align:center !important;">Action</th> 
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
	  $verifyUserID = $row['user_id'];
	  $verifyBadge = $row['verified_user']; 
	  $verifyEmail = $row['email_verification']; 
	  $verifyUserRegistered = $row['user_registered'];
	  $message_time=date("c", $verifyUserRegistered);
      $vefiriedUserAvatar = $Dot->Dot_UserAvatar($verifyUserID, $base_url); 
	  if($verifyBadge == 1){ $verBadgeType = '<span class="prtac">Verified</span>';}else{$verBadgeType = '<span class="prtexpired">Not Verified</span>';}
	  if($verifyEmail == 1){ $verEmailType = '<span class="prtac">Actived</span>';}else{$verEmailType = '<span class="prtexpired">Not Activated</span>';}
?>  
<tr class="langCur olds body<?php echo $verifyUserID;?>" id="post_<?php echo $verifyUserID;?>" data-last="<?php echo $verifyUserID;?>">  
  <td class="bold_td"><?php echo $verifyUserID; ?></td>  
  <td id="user<?php echo $verifyUserID; ?>">
     <div class="tableincontainer">
          <div class="publicher_avatar">
              <img src="<?php echo $vefiriedUserAvatar;?>" class="a0uk">
          </div>
          <div class="publicher_name truncate"><a href="<?php echo $base_url.'profile/'.$Dot->Dot_GetUserName($verifyUserID);?>"><?php echo $Dot->Dot_UserFullName($verifyUserID);?></a></div>
      </div>
  </td>    
  <td>
     <div class="see_post" style="text-align:left;display: inline-block;width: 100%; line-height:24px;" id="drawstat_<?php echo $verifyUserID;?>"><?php echo $verBadgeType;?></div>
  </td>
  <td>
     <div class="see_post" style="text-align:left;display: inline-block;width: 100%; line-height:24px;" id="drawstat_<?php echo $verifyUserID;?>"><?php echo $verEmailType;?></div>
  </td> 
  <td>
      <div class="see_time timeago" title="<?php echo $message_time;?>"></div>
  </td>  
  <td class="copyUrl froz"> 
      <div class="btn waves-effect waves-light bluue datauser" id="<?php echo $verifyUserID;?>" data-type="profile"><div class="tableincontainer" style="text-align:center;font-size:13px;">Edit</div></div>
      <div class="btn waves-effect waves-light red del_data_user" style="margin-left:10px;" id="<?php echo $verifyUserID;?>"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div></div>  
  </td>
</tr>     
<?php  }; ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/pro_user_management?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div>  