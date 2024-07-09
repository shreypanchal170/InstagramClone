<?php 
$dataPostID = $PostFromData['user_post_id'];
$dataPostUID = $PostFromData['user_id_fk'];
$dataPostType = $PostFromData['post_type'];      
$dataPostTitleText = isset($PostFromData['post_title_text']) ? $PostFromData['post_title_text'] : NULL;
$dataPostTitleTextDetails = isset($PostFromData['post_text_details']) ? $PostFromData['post_text_details'] : NULL;  
$dataPostCreatedImages = isset($PostFromData['post_image_id']) ? $PostFromData['post_image_id'] : NULL;
$dataPostCreatedVideoID = isset($PostFromData['post_video_id']) ? $PostFromData['post_video_id'] : NULL; 
$dataPostCreatedLinkUrl =  isset($PostFromData['post_link_url']) ? $PostFromData['post_link_url'] : NULL;
$dataPostCreatedLinkDescription = isset($PostFromData['post_link_description']) ? $PostFromData['post_link_description'] : NULL;
$dataPostCreatedLinkTitle = isset($PostFromData['post_link_title']) ? $PostFromData['post_link_title'] : NULL;
$dataPostCreatedLinkImg = isset($PostFromData['post_link_img']) ? $PostFromData['post_link_img'] : NULL; 
$dataPostVideoScreenShot = isset($PostFromData['post_video_name']) ? $PostFromData['post_video_name'] : NULL;
$dataPostCreatedLinkMiniUrl = isset($PostFromData['post_link_mini_url']) ? $PostFromData['post_link_mini_url'] : NULL; 
$UniqPostLikeCount = $Dot->Dot_UniqPostLikeCount($dataPostID);
$UniqPostCommentCount = $Dot->Dot_UniqPostCommentCount($dataPostID);
$link_icon = '<div class="icons moreThanoneLink"></div>'; 
?>
<div class="post_explore_box showThisPost_ body<?php echo $dataPostID;?>" id="<?php echo $dataPostID;?>" data-last="<?php echo $dataPostID;?>"  data-type="showPostSingle" data-id="<?php echo $dataPostID;?>" data-ui="<?php echo $dataPostUID;?>">
  <div class="post_explore_box_in">
     
    <?php 
	   if($dataPostType == 'p_image') { 
		      $ExploreImage = explode(",", $dataPostCreatedImages); // Explode the images string value 
			  $CountExplodes=count($ExploreImage);
			  $more = ''; 
			  if($CountExplodes > 2){
				  $more =  '<div class="icons moreThanone"></div>';
			  }
			   $newdata=$Dot->Dot_GetUploadImageID($dataPostCreatedImages); 
			   if($newdata){
				   $fileImage = $base_url."uploads/tumbnails/".$newdata['uploaded_image']; 
				   //$final_image=$base_url."uploads/tumbnails/".$newdata['uploaded_image']; 
				   $nsldimg ='';
				    if($newdata['nude_score'] >= 70){
				       $nsldimg = 'bluredImage';
				   }
				   if(file_exists($fileImage) && filesize($fileImage) > 0) {  
				        $final_image=$base_url."uploads/tumbnails/".$newdata['uploaded_image'];  
					} else {
					   $final_image=$base_url."uploads/images/".$newdata['uploaded_image'];
					}
				   echo '
				   <div class="_6S0lP">
				       <ul class="Ln-UN">
					       <li class="-V_eO"><span>'.$UniqPostLikeCount.'</span><span class="_1P1TY icons coreSpriteHeartSmall"></span></li>
					       <li class="-V_eO"><span>'.$UniqPostCommentCount.'</span><span class="_1P1TY icons coreSpriteSpeechBubbleSmall"></span></li>
					   </ul>
				   </div>
				   <div class="post_explore_item '.$nsldimg.'" style="background-image: url('.$final_image.');">'.$more.'<img src="'.$final_image.'" class="post_explore_item_img"></div>';
			   }
		  }
		  if($dataPostCreatedVideoID &&  $dataPostType == 'p_video'){ 
			  $VideoData = $Dot->Dot_GetUploadedVideoID($dataPostCreatedVideoID);
			  $getVideoImage = $VideoData['video_path'];
			  $getVideoExtension = $VideoData['video_ext'];
			  $videoTumbnail ='';  
			  $tumbImage = $base_url.'uploads/video/'.$dataPostVideoScreenShot.'.png'; 
			  if(file_exists($tumbImage) && filesize($tumbImage) > 0) {   
				 $videoTumbnail = $base_url.'uploads/video/'.$dataPostVideoScreenShot.'.png';  
			  } else {
				 $videoTumbnail = $base_url.'uploads/video/safe_video.png'; 
			  }  
			  echo '<div class="_6S0lP"><ul class="Ln-UN"><li class="-V_eO"><span>'.$UniqPostLikeCount.'</span><span class="_1P1TY icons coreSpriteHeartSmall"></span></li><li class="-V_eO"><span>'.$UniqPostCommentCount.'</span><span class="_1P1TY icons coreSpriteSpeechBubbleSmall"></span></li></ul></div><div class="post_explore_item" style="background-image: url('.$videoTumbnail.');"><div class="icon_f_play"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M57.33333,48.891v74.22517c0,5.6545 6.24217,9.08017 11.01517,6.04867l58.31517,-37.109c4.429,-2.8165 4.429,-9.27367 0,-12.09017l-58.31517,-37.12333c-4.773,-3.03867 -11.01517,0.39417 -11.01517,6.04867z"></path></g></g></svg></div><img src="'.$videoTumbnail.'" class="post_explore_item_img"></div>';
		  }  
		   
	?>
    
  </div>
</div>