<div class="page_title bold"><?php echo $page_Lang['users_shared_posts'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '10';
$countSql = "SELECT COUNT(user_post_id) FROM dot_user_posts WHERE user_post_id AND post_type IN('p_watermark')";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  

$start_from = ($pagep-1) * $limit;  
$sql = "SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_watermark' ORDER BY P.user_post_id ASC LIMIT $start_from, $limit";  
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
							'p_watermark' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1"></path><g id="Layer_1" stroke="none" stroke-width="1"><g id="surface1_121_"><path d="M96,16v80l-40,-69.276z" fill="#e91e63"></path><path d="M136,26.724l29.276,29.276l-69.276,40z" fill="#ff5722"></path><path d="M96,16l40,10.724l-40,69.276z" fill="#f44336"></path><path d="M96,176v-80l40,69.276z" fill="#8bc34a"></path><path d="M56,165.276l-29.276,-29.276l69.276,-40z" fill="#03a9f4"></path><path d="M96,176l-40,-10.724l40,-69.276z" fill="#4caf50"></path><path d="M176,96h-80l69.276,-40z" fill="#ff9800"></path><path d="M165.276,136l-29.276,29.276l-40,-69.276z" fill="#ffeb3b"></path><path d="M176,96l-10.724,40l-69.276,-40z" fill="#ffc107"></path><path d="M16,96h80l-69.276,40z" fill="#3f51b5"></path><path d="M26.724,56l29.276,-29.276l40,69.276z" fill="#9c27b0"></path><path d="M16,96l10.724,-40l69.276,40z" fill="#673ab7"></path></g></g><g fill="#ffffff" stroke="none" stroke-width="1"><path d="M90.825,117.19l-2.63,-10.04h-13.51l-2.63,10.04h-10.48l15.33,-49.05h9.06l15.43,49.05zM81.425,81.41l-4.59,17.49h9.17zM132.425,117.19h-9.6c-0.26667,-0.56 -0.53667,-1.50333 -0.81,-2.83v0c-1.70667,2.33333 -4.02,3.5 -6.94,3.5v0c-3.05333,0 -5.58333,-1.01 -7.59,-3.03c-2.01333,-2.02 -3.02,-4.63667 -3.02,-7.85v0c0,-3.82 1.22,-6.77333 3.66,-8.86c2.43333,-2.08667 5.94,-3.15333 10.52,-3.2v0h2.9v-2.93c0,-1.64 -0.28,-2.79667 -0.84,-3.47c-0.56,-0.67333 -1.38,-1.01 -2.46,-1.01v0c-2.38,0 -3.57,1.39333 -3.57,4.18v0h-9.54c0,-3.37333 1.26333,-6.15333 3.79,-8.34c2.52667,-2.19333 5.72333,-3.29 9.59,-3.29v0c4,0 7.09333,1.04 9.28,3.12c2.19333,2.07333 3.29,5.04333 3.29,8.91v0v17.15c0.04,3.14667 0.48667,5.60667 1.34,7.38v0zM117.205,110.38v0c1.05333,0 1.95,-0.21333 2.69,-0.64c0.74,-0.42667 1.29,-0.93 1.65,-1.51v0v-7.58h-2.29c-1.61333,0 -2.88667,0.51667 -3.82,1.55c-0.93333,1.03333 -1.4,2.41333 -1.4,4.14v0c0,2.69333 1.05667,4.04 3.17,4.04z"></path></g><path d="M51.575,127.86v-69.72h90.85v69.72z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0"></path></g></svg>'
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
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/user-watermark-posts?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 