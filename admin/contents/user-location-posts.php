<div class="page_title bold"><?php echo $page_Lang['users_shared_posts'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '10';
$countSql = "SELECT COUNT(user_post_id) FROM dot_user_posts WHERE user_post_id AND post_type IN('p_location')";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  

$start_from = ($pagep-1) * $limit;  
$sql = "SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_location' ORDER BY P.user_post_id ASC LIMIT $start_from, $limit";  
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
							'p_location' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#1E88E5"><path d="M133.5,3c-22.8,0 -41.25,18.45059 -42,41.85059c-0.6,21.75 20.25117,50.39941 32.70117,65.39941c2.4,2.85 5.69883,4.35059 9.29883,4.35059c3.6,0 6.89883,-1.65059 9.29883,-4.35059c12.45,-15.15 33.45117,-43.64941 32.70117,-65.39941c-0.75,-23.4 -19.2,-41.85059 -42,-41.85059zM79.0957,11.42871c-0.31055,0.00762 -0.62754,0.04512 -0.94629,0.12012c-27,5.85 -49.19941,23.40117 -60.89941,48.45117c-9.75,21 -10.80059,44.70117 -2.85059,66.45117c7.95,21.75 23.85,39.29883 45,49.04883c11.7,5.4 24.15,8.25 36.75,8.25c10.05,0 20.10059,-1.8 29.85059,-5.25c21.9,-7.95 39.29883,-23.85 49.04883,-45c4.2,-9 6.75176,-18.45117 7.80175,-28.20117c0.3,-2.4 -1.50176,-4.64824 -4.05175,-4.94824c-2.4,-0.3 -4.64825,1.49883 -4.94825,4.04883c-0.9,8.7 -3.14942,17.25059 -6.89942,25.35059c-8.85,18.9 -24.45117,33.15059 -43.95117,40.35058c-19.5,7.05 -40.79883,6.14825 -59.54883,-2.55175c-2.85,-1.35 -5.55,-2.85 -8.25,-4.5c2.55,-0.15 5.24941,-0.9 7.64941,-2.25c2.7,-1.5 5.54824,-3.29942 8.69824,-5.39942c2.1,-1.5 3.9,-3.44825 5.25,-5.69824c1.5,-2.7 3.30117,-5.55058 4.20117,-8.85058c5.85,-22.5 -13.65,-23.40059 -14.25,-28.35059c-0.6,-5.55 6.60117,-9.75059 10.95117,-14.10059c4.35,-4.35 5.69824,-11.1 3.44824,-15c-7.2,-12.9 -24.29824,-6.15059 -25.94824,7.64941c-0.9,8.25 -5.85176,16.65 -10.05176,21c-4.2,4.2 -12.44824,1.95176 -14.69824,-4.19824c-2.55,-6.9 6.29824,-9.45176 4.94824,-18.30176c-0.3,-2.4 -2.85,-3.59883 -6,-4.04883l-10.35059,0.29883c1.05,-7.5 3.30059,-14.85 6.60059,-21.75c10.2,-22.65 30.15117,-38.39941 54.45117,-43.64942c2.4,-0.45 4.04824,-2.84941 3.44824,-5.39941c-0.39375,-2.1 -2.2793,-3.62461 -4.45312,-3.57129zM133.5,30c8.25,0 15,6.75 15,15c0,8.25 -6.75,15 -15,15c-8.25,0 -15,-6.75 -15,-15c0,-8.25 6.75,-15 15,-15z"></path></g></g></svg>'
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
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/user-location-posts?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 