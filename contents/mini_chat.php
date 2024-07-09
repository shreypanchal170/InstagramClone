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
	$VideoAudioButtons = '<div class="o_others_op" onclick="video_call_manage(0, '.$toUserID.', 0);"><div class="o_other_i_wrapper">'.$Dot->Dot_SelectedMenuIcon('audio_call_icon').'</div></div><div class="o_others_op"><div class="o_other_i_wrapper" onclick="video_call_manage(0,'.$toUserID.','.$data_uid.');">'.$Dot->Dot_SelectedMenuIcon('video_call_icon').'</div></div>'; 
} else { 
    $online='<span class="_2v6o timeago" title="'.$getLastTime.'"></span>';
	$VideoAudioButtons = '<div class="o_others_op"><div class="o_other_i_wrapper" style="cursor: no-drop;">'.$Dot->Dot_SelectedMenuIcon('no_audio_call').'</div></div><div class="o_others_op"><div class="o_other_i_wrapper" style="cursor: no-drop;">'.$Dot->Dot_SelectedMenuIcon('no_video_call').'</div></div>';
	// chat_mini_other_page_icon
}
?> 
<div class="o_chat_box_container opnmini" id="getMessage" data-message="getMessage" data-type="view" data-user="<?php echo $ChatUserName;?>" data-userid="<?php echo $toUserID;?>">
   <div class="o_chat_box_wrapper">
         <!--Chat Header S-->
         <div class="o_chat_header">
              <span class="o_chat_header_in">
                    <div class="o_chat_user_avatar">
                         <div class="chu_box_avatar sep" data-type="userfirstinfo" data-id="<?php echo $toUserID;?>" title="<?php echo $ChatUserFullName;?>" style="background-image: url(<?php echo $ChatUserAvatar;?>); "></div>
                    </div>
                    <div class="o_chat_header_options">
                         <!--UN s-->
                         <div class="o_chat_user_unuf truncate sep" data-type="userfirstinfo" data-id="<?php echo $toUserID;?>" title="<?php echo $ChatUserFullName;?>">
                             <?php echo $ChatUserFullName;?> 
                         </div>
                         <!--UN f-->
                         <!--Other Options S-->
                         <div class="o_chat_other_options"> 
                            <?php if($twilioMode == 1){echo $VideoAudioButtons;}?> 
                            <div class="o_others_op closeminichat">
                                 <a href="<?php echo $base_url;?>chat?with=<?php echo $ChatUserName;?>"><div class="o_other_i_wrapper"><?php echo $Dot->Dot_SelectedMenuIcon('chat_mini_other_page_icon');?></div></a>
                            </div>
                            <div class="o_others_op closeminichat">
                                 <div class="o_other_i_wrapper"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div>
                            </div>
                            
                         </div>
                         <!--Other Options F-->
                    </div>
              </span>
         </div>
         <!--Chat Header F-->
         <!--Chat M S-->
         <div class="o_chat_middle">
             <div class="o_chat_posts" id="getMessages">
                  <!--Messages S-->
                  <div class="o_chat_conversations">
                          <!--Message HERE S-->
<?php 
$GetAllMessages = $Dot->Dot_GetChatMessages($toUserID,$uid); 
    if($GetAllMessages) {
         foreach($GetAllMessages as $getMessage) {
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
				$from_to_class= 'you_mini';
				$from_to_class_image = 'image_you_mini';
				$from_to_class_video = 'video_you_mini';
				$from_to_class_product_image = 'product_you_mini';
				$class_set = 'm_time_me'; 
				if($getToUID == $uid){
				    $from_to_class = 'friend_mini';
				    $from_to_class_image = 'image_friend_mini';
					$from_to_class_video = 'video_friend_mini';
				    $class_set = 'm_time_friend';
				    $from_to_class_product_image = 'product_friend_mini';
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
					<a href="'.$getProductSlug.'" class="prduct"><div class="product_info_wrapper"><div class="product_image_con"><img src="'.$fileImage.'"></div><div class="product_description_con"><div class="product_titlee truncate">'.$getProductTitle.'</div><div class="product_describee">'.$getProductDescription.'</div></div></div></a></div>';
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
						echo '</div>'; 
				}else{
						echo $ChatTextProduct;
						echo '<div class="messageBox_body child'.$getFromUID.'" id="messageBox_body'.$getFromUID.'" data-id="'.$getMessageID.'" data-get="'.$getFromUID.'">';
						echo $ChatText; 
						echo $productMessage;
						if($getMessageImage){
							$ExploreImage = explode(",", rtrim($getMessageImage, ',')); 
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
						echo '</div>'; 
				}
           }
} 
?>                              
                          <!--Message HERE F-->
                  </div>
                  <!--Messages F-->
             </div>
         </div>
         <!--Chat M F-->
         <!--Chat F S-->
         <div class="o_chat_footer">
             <!---->
             <span class="_2a-p">  
                   
             </span>
             <!---->
             <div class="o_chat_footer_items">
                  <div class="o_chat_message_textarea"><textarea class="o_chat_send_message invalc" id="send_message_mini" placeholder="<?php echo $page_Lang['write_something_to_start_chat'][$dataUserPageLanguage];?>"></textarea><input type="hidden" class="invalc" id="cuploadvalues" value=""/><input type="hidden" class="invalc" id="vuploadvalues" value=""/><input type="hidden" class="invalc" id="fuploadvalues" value=""/><input type="hidden" class="invalc" id="selfdestructtime" value="" /></div>
                  <div class="o_chat_message_types">
                      <div class="o_chat_message_types_container">
                           <!--Self Destruction Message icon S-->
                           <div class="send_msg_icon_other desttimeSend">
                               <?php echo $Dot->Dot_SelectedMenuIcon('send_self_desctruction_icon');?>
                           </div>
                           <!--Self Destruuction Message icon F-->
                           <!--Send File S-->
                           <div class="send_msg_icon_other">
                                  <form id="fuploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">  
                                    <label class="labelImageUploadc" for="fuploadBtn"></label><input type="file" name="fuploading" id="fuploadBtn" data-id="fileUpload" class="upload_image_button">
                                  </form>
                                 <?php echo $Dot->Dot_SelectedMenuIcon('send_file_icon');?>
                           </div>
                           <!--Send File F-->
                           <!--Image Send S-->
                           <div class="send_msg_icon_other">
                               <form id="cuploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">  
                                 <label class="labelImageUploadc" for="cuploadBtn"></label><input type="file" name="cuploading" id="cuploadBtn" data-id="cimage" class="upload_image_button">
                               </form>
                                 <?php echo $Dot->Dot_SelectedMenuIcon('send_image_icon');?>
                           </div>
                           <!--Image Send F-->
                           <!--Video Send S-->
                           <div class="send_msg_icon_other">
                                  <form id="vuploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">  
                                    <label class="labelImageUploadc" for="vuploadBtn"></label><input type="file" name="vuploading" id="vuploadBtn" data-id="vvideo" class="upload_image_button">
                                  </form>
                                 <?php echo $Dot->Dot_SelectedMenuIcon('send_video_icon');?>
                           </div>
                           <!--Video Send F-->
                      </div>
                      <div class="o_chat_message_send_box sendmymes_mini"><div class="send_msg_icon"><?php echo $Dot->Dot_SelectedMenuIcon('send_mm_icon');?></div></div>
                  </div>
             </div>
         </div>
         <!--Chat F F-->
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
			   $(".o_chat_posts").append('<span class="mesLoad"><span class="progress"><span class="indeterminate"></span></span></span>');
			  },
			  success: function(response) {  
			      if($('div.noMoreConversation').length){
				     scrollLoading = false;
				  }else{
				     $(".o_chat_posts").prepend(response);
					  var new_height = $(".o_chat_posts")[0].scrollHeight;
					 $(".o_chat_posts").scrollTop(new_height - old_height); 
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
</div> 