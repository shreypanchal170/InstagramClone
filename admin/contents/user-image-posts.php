<div class="page_title bold"><?php echo $page_Lang['users_shared_posts'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '10';
$countSql = "SELECT COUNT(user_post_id) FROM dot_user_posts WHERE user_post_id AND post_type IN('p_image')";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  

$start_from = ($pagep-1) * $limit;  
$sql = "SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_image' ORDER BY P.user_post_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th><?php echo $page_Lang['publisher'][$dataUserPageLanguage];?></th>   
        <th><?php echo $page_Lang['see_this_post'][$dataUserPageLanguage];?></th> 
        <th  style="text-align:center !important;"><?php echo $page_Lang['user_postt_type'][$dataUserPageLanguage];?></th>
        <th  style=""><?php echo $page_Lang['user_postt_time'][$dataUserPageLanguage];?></th>
        <th  style=""><?php echo $page_Lang['post_admin_action'][$dataUserPageLanguage];?></th>  
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($userPostData = mysqli_fetch_assoc($rs_result)) {
	  $dataUserPostUserID = $userPostData['user_id'];
	  $dataUserPostID = $userPostData['user_post_id'];
	  $dataUserPostType = $userPostData['post_type'];
	  $time = $userPostData['post_created_time']; 
	  $message_time=date("c", $time);
	  $dataPostUserUserName = $userPostData['user_name'];
	  $dataPostUserFullName = $userPostData['user_fullname'];
	  $dataPostUserProfileStatus = $userPostData['user_status']; 
	  $CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);
	  $postType_icon = array(
								'p_image' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#d65039"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg>'
						  );
?>  
<tr class="langCur olds body<?php echo $dataUserPostID;?>" id="post_<?php echo $dataUserPostID;?>" data-last="<?php echo $dataUserPostID;?>">  
  <td class="bold_td"><?php echo $dataUserPostID; ?></td> 
  <td id="user<?php echo $dataUserPostID; ?>">
     <div class="tableincontainer">
          <div class="publicher_avatar">
              <img src="<?php echo $CardDataUserAvatar;?>" class="a0uk">
          </div>
          <div class="publicher_name truncate"><a href="<?php echo $base_url.'profile/'.$dataPostUserUserName;?>"><?php echo $dataPostUserFullName;?></a></div>
      </div>
  </td>
  <td class="bold_td showThisPost_" data-type="showPostSingle" data-id="<?php echo $dataUserPostID;?>" data-ui="<?php echo $dataUserPostUserID;?>"><div class="tableincontainer"><div class="see_post">See Post</div></div></td>    
  <td>
     <div class="see_post" style="text-align:center;display: inline-block;width: 100%; line-height:24px;" id="drawstat_<?php echo $dataUserPostID;?>"><?php echo $postType_icon[$dataUserPostType];?></div>
  </td>  
  <td>
     <div class="see_time timeago" title="<?php echo $message_time;?>"></div>
  </td>  
  <td class="copyUrl froz">  
      <div class="btn waves-effect waves-light red  delete_user_post_alert" data-post="<?php echo $dataUserPostID;?>" data-u="<?php echo $dataUserPostUserID;?>" data-type="deletePosta"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div>
         
  </td>
</tr>     
<?php  }; ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/user-image-posts?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 