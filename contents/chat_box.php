<?php 
$ChatUserDetails = $Dot->Dot_UserDetails($toUserID);
$ChatUserFullName = $ChatUserDetails['user_fullname'];
$ChatUserName = $ChatUserDetails['user_name'];
$ChatUserGender = $ChatUserDetails['user_gender'];
$ChatUserHeight = $ChatUserDetails['user_height'];
$ChatUserWeight = $ChatUserDetails['user_weight'];
$ChatUserLifeStyle = $ChatUserDetails['user_life_style'];
$ChatUserRelationShip = $ChatUserDetails['user_relationship'];
$ChatUserChildren = $ChatUserDetails['user_children'];
$ChatUserSmoke = $ChatUserDetails['user_smoke'];
$ChatUserDrink = $ChatUserDetails['user_drink'];
$ChatUserBodyType = $ChatUserDetails['user_body_type'];
$ChatUserHairColor = $ChatUserDetails['user_hair_color'];
$ChatUserEyeColor = $ChatUserDetails['user_eye_color'];
$ChatUserSexuality = $ChatUserDetails['user_sexuality'];
$ChatUserJobTitle = $ChatUserDetails['user_job_title'];
$ChatUserCompanyName = $ChatUserDetails['user_job_company_name'];
$ChatUserUniversitySchool = $ChatUserDetails['user_school_university'];
$ChatUserAvatar = $Dot->Dot_UserAvatar($toUserID, $base_url);  
$ChatUserOnlineOffline = $ChatUserDetails['last_login'];  
$getLastTime=date("c", $ChatUserOnlineOffline); 
$loggedTime=time()-120;	//2 minutes 
if($ChatUserOnlineOffline > $loggedTime) {
	$online='<span class="_2v6o_online">'.$page_Lang['user_online'][$dataUserPageLanguage].'</span>';
	$VideoAudioButtons = '<li><div class="o_others_op" onclick="video_call_manage(0, '.$toUserID.', 0);"><div class="o_other_i_wrapper">'.$Dot->Dot_SelectedMenuIcon('audio_call_icon').'</div></div></li><li><div class="o_others_op"><div class="o_other_i_wrapper" onclick="video_call_manage(0,'.$toUserID.','.$data_uid.');">'.$Dot->Dot_SelectedMenuIcon('video_call_icon').'</div></div></li>'; 
} else { 
    $online='<span class="_2v6o timeago" title="'.$getLastTime.'"></span>';
	$VideoAudioButtons = '<li><div class="o_others_op"><div class="o_other_i_wrapper" style="cursor: no-drop;">'.$Dot->Dot_SelectedMenuIcon('no_audio_call').'</div></div></li><li><div class="o_others_op"><div class="o_other_i_wrapper" style="cursor: no-drop;">'.$Dot->Dot_SelectedMenuIcon('no_video_call').'</div></div></li>';
	// chat_mini_other_page_icon
}
?>
<div class="_1t2u2" id="getMessage" data-message="getMessage" data-type="view" data-user="<?php echo $ChatUserName;?>" data-userid="<?php echo $toUserID;?>">
  <!--Right Header STARTED-->
  <div class="_673w">
  <ul class="_fl2_openMenu">
      <li>
        <span class="icons_two openChatListLeft"></span>
      </li>
    </ul>
    <!--Right Header User Name STARTED-->
    <div class="_5743" style="width: auto;">
      <h2 class="_17w2" id="js_6">
        <div class="_6f6l"><span class="_3oh-"><span><?php echo $ChatUserFullName;?></span></span>
        </div>
      </h2>
      <?php echo $online;?>
    </div>
    <!--Right Header User Name FINISHED-->
    <!--Right Header Right Menu STARTED-->
    <ul class="_fl2">
      <li>
        <span class="icons_tree aboutChatUser" id="hiddeIt"></span>
      </li>
      <?php if($twilioMode == 1){echo $VideoAudioButtons;}?> 
    </ul>
    <!--Right Header Right Menu FINISHED-->
    <!---->
  </div>
  <!--Right Header FINISHED-->
  <!--Right Main STARTED-->
  <div class="_20bp">
<!--Right Main Right STARTED-->
<div class="_4_j5" id="mobileboxCh">
  <span class="cl_4u-c">
          <div class="cl_4u-m">
              <span class="rightBoxList">
                  <!--User Information STARTED-->
                  <div class="currentUserInformation">
                       <span class="currentUserInformationWrap">
                            <div class="currentConversationUserAvatar">
                            <img src="<?php echo $ChatUserAvatar;?>" width="50" height="50" alt="" class="img_avatar">
                            </div>
                            <div class="_2jnt">
                                 <div class="_3eur"><a href="<?php echo $base_url.'profile/'.$ChatUserName;?>"><?php echo $ChatUserFullName;?></a></div>
                                 <div class="_3eus"><?php echo $online;?></div>
                            </div>
                            <div class="_3-ne">
                                <div class="_3d85">
</div>
</div>
</span>
</div>
<!--User Information FINISHED-->
<!-- User Some Profile Information STARTED-->
<div class="profile_life_info_form">
  <h1 class="info_title">
    <?php echo $page_Lang['personal_information'][$dataUserPageLanguage];?>
  </h1>
  <div class="info_form_items">
    <!--Item STARTED-->
    <div class="info_item_box">
      <div class="info_item_title">
        <?php echo $page_Lang['relationship'][$dataUserPageLanguage];?>
      </div>
      <div class="info_item_answer"><?php echo $page_Lang[$ChatUserRelationShip][$dataUserPageLanguage];?></div>
    </div>
    <!--Item FINISHED-->
    <!--Item STARTED-->
    <div class="info_item_box">
      <div class="info_item_title">
        <?php echo $page_Lang['sexuality'][$dataUserPageLanguage];?>
      </div>
      <div class="info_item_answer">
        <?php echo $page_Lang[$ChatUserSexuality][$dataUserPageLanguage];?>
      </div>
    </div>
    <!--Item FINISHED-->
    <?php if(!$ChatUserHeight && !$ChatUserWeight && $ChatUserBodyType == 'unspecified' && $ChatUserHairColor == 'unspecified' && $ChatUserEyeColor == 'unspecified'){} else{?>
    <!--Item STARTED-->
    <div class="info_item_box">
      <div class="info_item_title">
        <?php echo $page_Lang['appearance'][$dataUserPageLanguage];?>
      </div>
      <div class="info_item_answer">
        <?php if($ChatUserHeight){echo $ChatUserHeight.'cm';}?>
        <?php if($ChatUserWeight){echo ','.$ChatUserHeight.'kg';}?>   
        <?php if($ChatUserBodyType !== 'unspecified'){ echo ','.$page_Lang[$ChatUserBodyType][$dataUserPageLanguage]; }?>   
        <?php if($ChatUserHairColor !== 'unspecified'){ echo ','.$page_Lang[$ChatUserHairColor][$dataUserPageLanguage];}?>   
        <?php if($ChatUserEyeColor !== 'unspecified'){ echo $page_Lang[$ChatUserEyeColor][$dataUserPageLanguage];}?>   
        </div>
    </div>
      <?php }?>     
      
    <!--Item FINISHED-->
    <!--Item STARTED-->
    <div class="info_item_box">
      <div class="info_item_title">
        <?php echo $page_Lang['life_style'][$dataUserPageLanguage];?>:</div>
      <?php   if($dataUserLifeStyle){ echo '<div class="info_item_answer">'.$page_Lang[$ChatUserLifeStyle][$dataUserPageLanguage].'</div>';   }?>
    </div>
    <!--Item FINISHED-->
    <!--Item STARTED-->
    <div class="info_item_box">
      <div class="info_item_title">
        <?php echo $page_Lang['children'][$dataUserPageLanguage];?>:</div>
      <div class="info_item_answer">
        <?php echo $page_Lang[$ChatUserChildren][$dataUserPageLanguage];?>
      </div>
    </div>
    <!--Item FINISHED-->
    <!--Item STARTED-->
    <div class="info_item_box">
      <div class="info_item_title">
        <?php echo $page_Lang['smoke_habit'][$dataUserPageLanguage];?>:</div>
      <div class="info_item_answer">
        <?php echo $page_Lang[$ChatUserSmoke][$dataUserPageLanguage];?>
      </div>
    </div>
    <!--Item FINISHED-->
    <!--Item STARTED-->
    <div class="info_item_box">
      <div class="info_item_title">
        <?php echo $page_Lang['drinking_habit'][$dataUserPageLanguage];?>:</div>
      <div class="info_item_answer">
        <?php echo $page_Lang[$ChatUserDrink][$dataUserPageLanguage];?>
      </div>
    </div>
    <!--Item FINISHED-->
  </div>
  <h1 class="info_title">
    <?php echo $page_Lang['business_and_education'][$dataUserPageLanguage];?>
  </h1>
  <div class="info_form_items">
    <div class="business_scholl_university">
      <div class="info_item_box _item_answer">
        <?php echo $ChatUserJobTitle;?>,
        <?php echo $ChatUserCompanyName;?>
      </div>
      <div class="info_item_box _item_answer">
        <?php echo $ChatUserUniversitySchool;?>
      </div>
    </div>
  </div>
</div>
<!--User Some Profile Information FINISHED-->
<!--User Some Profile Information TWO STARTED-->
<div class="profileInfoCartCardBox">

  <h1 class="info_title">
    <?php echo $page_Lang['areas_of_interest'][$dataUserPageLanguage];?>
  </h1>
  <div class="info_form_items">
    <?php  
	   $GetAllUserInterstedItems = $Dot->Dot_GetUserInterestedList($toUserID);
	   if($GetAllUserInterstedItems){
			foreach($GetAllUserInterstedItems as $GetUserInterest){
				$InterestedIDdata = $GetUserInterest['user_interested_id'];
				$InterestedUserID_fk = $GetUserInterest['interested_user_id_fk'];
				$UserInterestedTypeValue = $GetUserInterest['interested_type_value'];
				$UserInterestedType = $GetUserInterest['user_interested_type'];
				$typesArray = array(
				   'type_eating' => "icons_tree eatingicon",
				   'type_music' => "icons_tree musicicon",
				   'type_film_tv' => "icons_tree filmicon",
				   'type_travel' => "icons_tree travelicon",
				   'type_expertise' => "icons_tree businessicon"
				);
				echo '
				   <span class="intr js-intr js-intr-ids-'.$InterestedIDdata.'" id="'.$UserInterestedTypeValue.'"><span class="icons_tree '.$typesArray[$UserInterestedType].'"></span><span class="intr-txt">'.$page_Lang[$UserInterestedTypeValue][$dataUserPageLanguage].'</span></span>
				'; 
			}
		} else {
		echo '<div class="noResultf">'.$page_Lang['no_interested_inserted'][$dataUserPageLanguage].'</div>'; 
		}
	 ?>
  </div>
</div>
<!--User Some Profile Information TWO FINISHED-->
<!--Shared Images between this User STARTED-->
<div class="profileInfoCartCardBox">
  <h1 class="info_title"><?php echo $page_Lang['shared_photos_title'][$dataUserPageLanguage];?></h1>
  <div class="info_form_items">
    <?php 
       $photosWidget = $Dot->Dot_PhotosWidget($toUserID);
	   if($photosWidget){ 
		   foreach($photosWidget as $photosData) {
			   $photosWidgetID = $photosData['user_post_id'];
				$photosWidgetImageID = $photosData['post_image_id']; 
				$ExplodeImage = explode(",", $photosWidgetImageID); // Explode the images string value 
				$CountExplodes=count($ExplodeImage);
				$more = '';
				if($CountExplodes > 2){
					 $more =  '<div class="icons moreThanone"></div>';
				}
				$newdata=$Dot->Dot_GetUploadImageID($photosWidgetImageID);
				$final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
				if($newdata){
				   echo ' 
					<div class="_pbwg8Uft" id="in1" data-id="1">
					   <div class="_jjzlbUft" style="background-image: url('.$final_image.');">
						   '.$more.'
						   <img src="'.$final_image.'" class="exPexUft">
						</div>
					 </div>  
				'; 
				}  
		   }
	   }
   ?>

  </div>
</div>
<!--Shared Images between this User FINISHED-->
</span>
</div>
</span>
</div>
<!--Right Main Right FINISHED-->
<!--Right Main Left STARTED-->
<div class="_4_j4">
  <span class="_4u-c"> 
    <div class="_4u-m">
      <span class="all_messages" id="getMessages">
	   <?php 
       $GetAllMessages = $Dot->Dot_GetChatMessages($toUserID,$uid); 
       if($GetAllMessages){
           
          foreach($GetAllMessages as $getMessage){
               $getTexts = $getMessage['message_text']; 
               $getToUID = $getMessage['to_user_id']; 
               $getFromUID = $getMessage['from_user_id'];
               $getMessageID = $getMessage['msg_id']; 
			   //Product S
			   $productMesageID = isset($getMessage['q_product_id']) ? $getMessage['q_product_id'] : NULL;
			   $productMessageQuestionID = isset($getMessage['q_question_id']) ? $getMessage['q_question_id'] : NULL;
			   // Product F
			   $getMessageVideoID = isset($getMessage['videoid']) ? $getMessage['videoid'] : NULL;
               $getMessageCreatedTime = $getMessage['message_created_time'];
               $messageTime=date("c", $getMessageCreatedTime); 
			   $messageFileName = isset($getMessage['file_name']) ? $getMessage['file_name'] : NULL;
			   $messageFile = isset($getMessage['file']) ? $getMessage['file'] : NULL;
			   $messageFileExtension = isset($getMessage['file_extension ']) ? $getMessage['file_extension '] : NULL; 
			   $messageSelfDestruction = isset($getMessage['dest']) ? $getMessage['dest'] : NULL;
			   $messageSelfDestructionSecret =  isset($getMessage['secret_checked']) ? $getMessage['secret_checked'] : NULL;
			   if($messageSelfDestructionSecret == '0'){
			          $destText = $page_Lang['self_destruction_message'][$dataUserPageLanguage];
			   }else{
			          $destText = $page_Lang['message_was_self_destruction'][$dataUserPageLanguage];
			   }  
			   $uploadedFile = ''; // Get if Uploded Message
			   $uploadedVideoFile = '';  // Get if Uploaded Video
			   $ChatText = ''; // Get if Text
			   $productMessage = '';  // Get if Product ID 
               $from_to_class= 'you';
			   $from_to_class_image = 'image_you';
			   $from_to_class_video = 'video_you';
			   $from_to_class_product_image = 'product_you';
               $class_set = 'm_time_me'; 
               if($getToUID == $uid){
                   $from_to_class = 'friend';
				   $from_to_class_image = 'image_friend';
				   $from_to_class_video = 'video_friend';
                   $class_set = 'm_time_friend';
				   $from_to_class_product_image = 'product_friend';
               }  
			   $ChatTextProduct = '';
			   if($productMesageID){ 
				   $getProDet = $Dot->Dot_GetProductDetailsByID($productMesageID);
				   $getProductImage = $getProDet['product_images']; 
				   $getProductTitle = $getProDet['m_product_name'];
				   $getProductDescription = $getProDet['m_product_description'];
				   $getProductSlug = $getProDet['slug'];
				   $newdata=$Dot->Dot_GetUploadImageID($getProductImage); 
			       if($newdata){
					    $fileImage = $base_url."uploads/tumbnails/".$newdata['uploaded_image']; 
				   }  
				   $productMessage = '<div class="'.$from_to_class_product_image.'">
				                            <a href="'.$getProductSlug.'" class="prduct">
				                             <div class="product_info_wrapper">
											    <div class="product_image_con">
											      <img src="'.$fileImage.'">
												</div>
												<div class="product_description_con">
												    <div class="product_titlee truncate">'.$getProductTitle.'</div>
													<div class="product_describee">
													     '.$getProductDescription.'
													</div>
												</div>
										     </div>
											 </a>
									     </div>';
					 $ChatTextProduct = '<div class="messageBox_body child '.$from_to_class.'" id="messageBox_body '.$from_to_class.'" data-id="'.$getMessageID.'" data-get="'.$getFromUID.'">'.$page_Lang[$Dot->Dot_LanguagesKey($productMessageQuestionID)][$dataUserPageLanguage].'</div>';
			   }
			   if($getTexts){
			       $ChatText = '<div class="'.$from_to_class.'">'.htmlcode($getTexts).'</div>';
			   }
			   if($messageFile){
				    $extensionArray = array(
								   'ai' => "file_ai",
								   'pdf' => "file_pdf",
								   'eps' => "file_eps",
								   'tif' => "file_tif",
								   'doc' => "file_doc",
								   'docx' => "file_doc",
								   'zip' => "file_zip",
								   'rar' => "file_rar",
								   'psd' => "file_psd",
								   'txt' => "file_txt"
								);
				    $fileID = $Dot->Dot_GetUploadChatFileID($messageFile); 
					$messagefileID = $fileID['file_id'];
					$messageUploadedFilen = $fileID['uploaded_file'];
					$messageUploadedFileExtension = $fileID['extension'];
					$uploadedFile = '<a href="'.$base_url.'uploads/files/'.$messageUploadedFilen.'" download="'.$messageUploadedFilen.'"><div class="file_item '.$from_to_class_image.'"><div class="file_extensions_icon '.$extensionArray[$messageUploadedFileExtension].'"></div><div class="file_name_ex truncate">'.$messageFileName.'</div></div></a>';
			   }
			   $getMessageImage = isset($getMessage['imageid']) ? $getMessage['imageid'] : NULL; 
			   if($getMessageVideoID){
				   $videoDetails = $Dot->Dot_GetUploadChatVideoID($getMessageVideoID);
				  $mvideoName = $videoDetails['uploaded_video'];
				  $mvideoExtension = $videoDetails['extension']; 
				  $videoTumbnail ='';
				  if(file_exists($base_url.$videoPath.$mvideoName.'.png')){
				  	  $videoTumbnail = $base_url.'uploads/video/'.$mvideoName.'.png';   
				  }else{
				  	  $videoTumbnail = $base_url.'uploads/video/safe_video.png';
				  }
				  $uploadedVideoFile = '<div class="'.$from_to_class_video.'"><div class="media-wrapper videoNew UploadedItemNew"><video id="player1" width="100%" height="auto" style="max-width:100%;" poster="'.$videoTumbnail.'" preload="none" controls playsinline webkit-playsinline><source src="'.$base_url.'/uploads/video/'.$mvideoName.'.'.$mvideoExtension.'" type="video/mp4"></video></div></div>';
			   }   
			   
			  if($messageSelfDestruction){
			      echo '<div class="messageBox_body seldDestruct child'.$getFromUID.'" id="messageBox_body'.$getFromUID.'" data-id="'.$getMessageID.'" data-get="'.$getFromUID.'" data-destTime="'.$messageSelfDestruction.'" data-type="selfDestruction">';
				  echo  '<div class="'.$from_to_class.' selfDestructMessage" id="selfDest'.$getMessageID.'">'.$destText.'</div>';
				   echo '<div class="message_time_set '.$class_set.'"><div class="timeago" title="'.$messageTime.'"></div></div></div>'; 
			  }else{
				  echo $ChatTextProduct;
			  echo '<div class="messageBox_body child'.$getFromUID.'" id="messageBox_body'.$getFromUID.'" data-id="'.$getMessageID.'" data-get="'.$getFromUID.'">';
			  echo $ChatText; 
			  echo $productMessage;
			  if($getMessageImage){
				   $ExploreImage = explode(",", $getMessageImage); 
				   $r=1;
			      $CountExplodes=count($ExploreImage); 
			       echo '<div class="theImages '.$from_to_class_image.'">';
						  foreach($ExploreImage as $a) {
							$newdata=$Dot->Dot_GetUploadChatImageID($a); 
								if($newdata){
									 $final_image=$base_url."uploads/images/".$newdata['uploaded_image'];   
								} 
								echo '
										<div class="sldimg">
										  <div class="sld_jjzlbU" style="background-image:url('.$final_image.');">
											<img src="'.$final_image.'" class="sld-exPexU">
										  </div>
										</div>
										';
								
								$r=$r+1;		
						 } 
					  echo ' </div>';
			   }   
			   echo $uploadedVideoFile;
			   echo $uploadedFile;
			  echo '<div class="message_time_set '.$class_set.'"><div class="timeago" title="'.$messageTime.'"></div></div></div>'; 
			  }
              }
            } 
			?>
            </span>
</div>
</span>
<div class="_4rv3">
      <!---->
     <span class="_2a-p">  
           
     </span>
     <!---->
  <div class="_5irm"> 
    <div class="_kmc"><textarea class="chtSend invalc" id="send_message" placeholder="<?php echo $page_Lang['write_something_to_start_chat'][$dataUserPageLanguage];?>"></textarea><input type="hidden" class="invalc" id="cuploadvalues" value=""/><input type="hidden" class="invalc" id="vuploadvalues" value=""/><input type="hidden" class="invalc" id="fuploadvalues" value=""/><input type="hidden" class="invalc" id="selfdestructtime" value="" /></div>
    <div class="_4rv4">
      <div class="XrOeyCh cfil">
      <a class="icons_tree coreSpriteDesktopSendMenu">
         <span class="Szr5JChC dnone">
            <div class="sendcbuttons icons_tree imagesendicon">
               <form id="cuploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">  
                 <label class="labelImageUploadc" for="cuploadBtn"></label><input type="file" name="cuploading" id="cuploadBtn" data-id="cimage" class="upload_image_button">
               </form>
            </div>
            <div class="sendcbuttons icons_tree vidsendicon"> 
              <form id="vuploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">  
                <label class="labelImageUploadc" for="vuploadBtn"></label><input type="file" name="vuploading" id="vuploadBtn" data-id="vvideo" class="upload_image_button">
              </form>
            </div>
            <div class="sendcbuttons flsendicon icons_tree">
              <form id="fuploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">  
                <label class="labelImageUploadc" for="fuploadBtn"></label><input type="file" name="fuploading" id="fuploadBtn" data-id="fileUpload" class="upload_image_button">
              </form>
            </div>
            <div class="sendcbuttons timesendicon icons_tree"></div>
         </span>
      </a></div> 
    </div>
    <div class="_4rv4">
      <div class="XrOeyCh sendmymes"><a class="icons_tree coreSpriteDesktopSendActivity"></a></div> 
    </div>
  </div>
</div>
</div>
<!--Right Main Left FINISHED-->
</div>
<!--Right Main FINISHED-->
</div>
<script type="text/javascript">
$(document).ready(function(){
   var scrollLoading = true;
   $("#getMessages").scrollTop($("#getMessages")[0].scrollHeight); 
   $('#getMessages').on("scroll",function(){
    if (scrollLoading && $('#getMessages').scrollTop() == 0){
		  var old_height = $("#getMessages")[0].scrollHeight; // Old Height
		  var user = $("#getMessage").attr("data-userid");
		  var lastMessage = $(".messageBox_body:first-child").attr("data-id");
		  var type = "more_message";
		  var data = 'f='+type+'&user='+user+'&message='+lastMessage;
		  $.ajax({
			  type: "POST",
			  url: requestUrl + 'requests/activity',
			  data: data,
			  cache: false,
			  beforeSend: function(){ 
			   $(".all_messages").append('<span class="mesLoad"><span class="progress"><span class="indeterminate"></span></span></span>');
			  },
			  success: function(response) {  
			      if($('div.noMoreConversation').length){
				     scrollLoading = false;
				  }else{
				     $(".all_messages").prepend(response);
					  var new_height = $(".all_messages")[0].scrollHeight;
					 $(".all_messages").scrollTop(new_height - old_height); 
					 //$(".all_messages").scrollTop(200);
				  } 
				  $(".mesLoad").remove();
			  }
			});
		return false;
	}
   });
});
</script>