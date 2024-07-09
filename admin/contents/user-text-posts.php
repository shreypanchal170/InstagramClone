<div class="page_title bold"><?php echo $page_Lang['users_shared_posts'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '10';
$countSql = "SELECT COUNT(user_post_id) FROM dot_user_posts WHERE user_post_id AND post_type IN('p_text')";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  

$start_from = ($pagep-1) * $limit;  
$sql = "SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,P.post_audio_id, U.user_name, U.user_fullname,U.user_status,U.user_id FROM dot_user_posts P, dot_users U  WHERE U.user_status='1' AND P.user_id_fk=U.user_id  $morequery AND P.post_type = 'p_text' ORDER BY P.user_post_id ASC LIMIT $start_from, $limit";  
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
								'p_text' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg>'
								
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
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/user-text-posts?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 