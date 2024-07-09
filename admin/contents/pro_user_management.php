<div class="page_title bold"><?php echo $page_Lang['manage_pro_members'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '15';
$countSql = "SELECT COUNT(user_id) FROM dot_users WHERE pro_user_type IN('0','1') AND pro_system_type IS NOT NULL";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_users WHERE user_status = '1' AND pro_user_type IN('0','1') AND pro_system_type IS NOT NULL ORDER BY user_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>  
        <th>Pro Type</th>
        <th>End Time</th> 
        <th  style="text-align:center !important;">Status</th>
        <th  style="text-align:center !important;">Action</th> 
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
	 $proUserID = $row['user_id'];
	 $proPlainTime = $row['pro_user_plain_time'];
     $proUserAvatar = $Dot->Dot_UserAvatar($proUserID, $base_url); 
     $message_time= gmdate("Y-d-m", $proPlainTime);
	 $proUserType = $row['pro_system_type'];
	 $getProDetails = $Dot->Dot_GetProPriceFromNumber($proUserType);
	 $proUserIcon = $getProDetails['price_icon'];
	 $plainTableType = $getProDetails['price_type'];
	 $proUserTypeActive = $row['pro_user_type'];
	 $typePro = '';
	 if($proUserTypeActive == 1){ $typePro = '<span class="prtac">Active</span>';}else{$typePro = '<span class="prtexpired">Expired</span>';}
?>  
<tr class="langCur olds body<?php echo $proUserID;?>" id="post_<?php echo $proUserID;?>" data-last="<?php echo $proUserID;?>">  
  <td class="bold_td"><?php echo $proUserID; ?></td>  
  <td id="user<?php echo $proUserID; ?>">
     <div class="tableincontainer">
          <div class="publicher_avatar">
              <img src="<?php echo $proUserAvatar;?>" class="a0uk">
          </div>
          <div class="publicher_name truncate"><a href="<?php echo $base_url.'profile/'.$Dot->Dot_GetUserName($proUserID);?>"><?php echo $Dot->Dot_UserFullName($proUserID);?></a></div>
      </div>
  </td>  
  <td>
     <div class="see_post svgic" id="amount_<?php echo $proUserID;?>"><?php echo $proUserIcon;?><?php echo $page_Lang[$plainTableType][$dataUserPageLanguage];?></div>
  </td>
  <td>
     <div class="see_time timeago"><?php echo $message_time;?></div>
  </td> 
  <td>
     <div class="see_post" style="text-align:center;display: inline-block;width: 100%; line-height:24px;" id="drawstat_<?php echo $proUserID;?>"><?php echo $typePro;?></div>
  </td>   
  <td class="copyUrl froz"> 
      <div class="btn waves-effect waves-light bluue datauser" id="<?php echo $proUserID;?>" data-type="profile"><div class="tableincontainer" style="text-align:center;font-size:13px;">Edit</div></div> 
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