<?php  
include_once '../functions/inc.php';
$requestArray = array("view");
if(isset($_POST['f']) && in_array($_POST['f'], $requestArray)){
   $activity = mysqli_real_escape_string($db, $_POST['f']); 
   if($activity == 'view'){ 
       //Get New Message
       if(isset($_POST['old']) && isset($_POST['u'])){
	        $oldMessageID = mysqli_real_escape_string($db, $_POST['old']);
			$chatUserID = mysqli_real_escape_string($db, $_POST['u']);
			$GetUserNewMessage = $Dot->Dot_GetUserNewMessage($uid, $chatUserID, $oldMessageID);  
			$NewMessage = $Dot->Dot_GetNewMessageSum($uid);
			$NewMentionNotification = $Dot->Dot_GetMentionNotification($uid);   
			$sumMessage = '0';
			$sumNotification = '0';   
			$sumMention = '0'; 
			$getImages = isset($GetUserNewMessage['imageid']) ? $GetUserNewMessage['imageid'] : NULL;   
			$getVideo = isset($GetUserNewMessage['videoid']) ? $GetUserNewMessage['videoid'] : NULL;  
			$getFile = isset($GetUserNewMessage['file']) ? $GetUserNewMessage['file'] : NULL;  
			$messageFileName = isset($GetUserNewMessage['file_name']) ? $GetUserNewMessage['file_name'] : NULL; 
			$getTimePost =  isset($GetUserNewMessage['dest']) ? $GetUserNewMessage['dest'] : NULL;    
			$getProductID =  isset($GetUserNewMessage['q_product_id']) ? $GetUserNewMessage['q_product_id'] : NULL;    
			$getProductQuestionID =  isset($GetUserNewMessage['q_question_id']) ? $GetUserNewMessage['q_question_id'] : NULL;
			$productMessage ='';
			
			if($getFile){
			$extensionArray = array( 'ai' => "file_ai", 'pdf' => "file_pdf",  'eps' => "file_eps",  'tif' => "file_tif",  'doc' => "file_doc",  'docx' => "file_doc",  'zip' => "file_zip",   'rar' => "file_rar",   'psd' => "file_psd",  'txt' => "file_txt");
				    $fileID = $Dot->Dot_GetUploadChatFileID($getFile); 
					$messagefileID = $fileID['file_id'];
					$messageUploadedFilen = $fileID['uploaded_file'];
					$messageUploadedFileExtension = $fileID['extension'];
					$uploadedFile = '<a href="'.$base_url.'uploads/files/'.$messageUploadedFilen.'.'.$messageUploadedFileExtension.'" download><div class="file_item image_friend"><div class="file_extensions_icon '.$extensionArray[$messageUploadedFileExtension].'"></div><div class="file_name_ex truncate">'.$messageFileName.'</div></div></a>';
			}else{
			   $uploadedFile = '';
			   echo $getFile;
			}
			if($getVideo){
			    $videoDetails = $Dot->Dot_GetUploadChatVideoID($getVideo);
				  $mvideoName = $videoDetails['uploaded_video'];
				  $mvideoExtension = $videoDetails['extension']; 
				  $videoTumbnail ='';
				  if(file_exists($base_url.$videoPath.$mvideoName.'.png')){
				  	  $videoTumbnail = $base_url.'uploads/video/'.$mvideoName.'.png';   
				  }else{
				  	  $videoTumbnail = $base_url.'uploads/video/safe_video.png';
				  }
				   $mvideo =  '<div class="media-wrapper videoNew UploadedItemNew"><video id="player1" width="100%" height="300" style="max-width:100%;" poster="'.$videoTumbnail.'" preload="none" controls playsinline webkit-playsinline><source src="'.$base_url.'/uploads/video/'.$mvideoName.'.'.$mvideoExtension.'" type="video/mp4"></video></div>';
			}else{
			   $mvideo = '';
			}
			if($getImages){
			    $ExploreImage = explode(',', rtrim($getImages, ','));
				$CountExplodes=count($ExploreImage); 
				$final_images = array();                    // Define object as array
				foreach($ExploreImage as $a) { 
				  $newdata=$Dot->Dot_GetUploadChatImageID($a);  
					if($newdata){ 
					  $final_image= '<div class="sldimg"><div class="sld_jjzlbU" style="background-image:url('.$base_url."uploads/images/".$newdata['uploaded_image'].');"><img src="'.$base_url."uploads/images/".$newdata['uploaded_image'].'" class="sld-exPexU"></div></div>'; 
					} 
					$final_images[]= $final_image;
				}
			}else{
			   $final_images = '';
			}
			if($getTimePost){
			    $sendedTimeMessage = $page_Lang['got_self_destriction_message'][$dataUserPageLanguage];
				$destructTime = $getTimePost;
				$theMessage = $page_Lang['got_self_destriction_message'][$dataUserPageLanguage];;
			}else{
                $sendedTimeMessage = '';
				$destructTime = '';
				$theMessage = htmlcode($GetUserNewMessage['message_text']);
			} 
			if($getProductID){
			    $getProDet = $Dot->Dot_GetProductDetailsByID($getProductID);
				   $getProductImage = $getProDet['product_images']; 
				   $getProductTitle = $getProDet['m_product_name'];
				   $getProductDescription = $getProDet['m_product_description'];
				   $getProductSlug = $getProDet['slug'];
				   $newdata=$Dot->Dot_GetUploadImageID($getProductImage); 
			       if($newdata){
					    $fileImage = $base_url."uploads/tumbnails/".$newdata['uploaded_image']; 
				   }   
				   $prodMessage = htmlcode($page_Lang[$Dot->Dot_LanguagesKey($productMessageQuestionID)][$dataUserPageLanguage]);
				   $prodImage = $fileImage;
				   $prodTitle = htmlcode($getProductTitle);
				   $prodDescription = htmlcode($getProductDescription);
				   $prodSlug = $getProductSlug;
				    $productMessage = '<div class="messageBox_body child'.$GetUserNewMessage['from_user_id'].'" id="messageBox_body'.$GetUserNewMessage['from_user_id'].'" data-id="'.$GetUserNewMessage['msg_id'].'" data-get="'.$GetUserNewMessage['from_user_id'].'"><div class="friend">'.htmlcode($page_Lang[$Dot->Dot_LanguagesKey($getProductQuestionID)][$dataUserPageLanguage]).'</div><div class="message_time_set m_time_me"><div class="timeago" title="'.$GetUserNewMessage['message_created_time'].'"></div></div></div><div class="product_friend" style="margin-bottom:10px;"><a href="'.$getProductSlug.'" class="prduct"><div class="product_info_wrapper"><div class="product_image_con"><img src="'.$fileImage.'"></div><div class="product_description_con"><div class="product_titlee truncate">'.htmlcode($getProductTitle).'</div><div class="product_describee">'.htmlcode($getProductDescription).'</div>	</div></div></a></div>';
			}
			$visitNotificationBox ='';
			$fvNotificationBox = ''; 
			$visitorCount = '0';
			$madeFavouriteYou = '0';
			if($proSystemStatus == '1'){
				if($dataUserProType == 1){
						if($Dot->Dot_ProPriceTableAvantagesStatus(2) == '1'){
						   if($Dot->Dot_GetVsitorNotificationNumber($uid) > 0){
							   $visitNotificationBox = '<div class="visitNotification"><a href="'.$base_url.'visitors">'.$Dot->Dot_SelectedMenuIcon('visited_your_profile').'</a></div>';
						   }
						   $visitorCount = $Dot->Dot_GetVsitorNotificationNumber($uid);
						}
						if($Dot->Dot_ProPriceTableAvantagesStatus(6) == '1'){
							if($Dot->Dot_GetFavouriteNotificationNumber($uid) > 0){ 
								$fvNotificationBox = '<div class="fvNotification"><a href="'.$base_url.'favourites">'.$Dot->Dot_SelectedMenuIcon('addFavourite').'</a></div>';
							}
							$madeFavouriteYou = $Dot->Dot_GetFavouriteNotificationNumber($uid);
						}
				}
			}else{ 
				  if($Dot->Dot_ProPriceTableAvantagesStatus(2) == '1'){
					 if($Dot->Dot_GetVsitorNotificationNumber($uid) > 0){
						 $visitNotificationBox = '<div class="visitNotification"><a href="'.$base_url.'visitors">'.$Dot->Dot_SelectedMenuIcon('visited_your_profile').'</a></div>';
					 }
					 $visitorCount = $Dot->Dot_GetVsitorNotificationNumber($uid);
				  }
				  if($Dot->Dot_ProPriceTableAvantagesStatus(6) == '1'){
					  if($Dot->Dot_GetFavouriteNotificationNumber($uid) > 0){ 
						  $fvNotificationBox = '<div class="fvNotification"><a href="'.$base_url.'favourites">'.$Dot->Dot_SelectedMenuIcon('addFavourite').'</a></div>';
					  }
					  $madeFavouriteYou = $Dot->Dot_GetFavouriteNotificationNumber($uid);
				  } 
			}
			if($NewMessage != '0' || $dataUserNotificationCount  != '0' || $NewMentionNotification != '0' || $visitorCount != '0' || $madeFavouriteYou != '0'){$sumMessage  = $NewMessage; $sumNotification = $dataUserNotificationCount;$sumMention = $NewMentionNotification;}
			      $json = array();
				  $data = array(
					 'message' => $theMessage,
					 'user_one' => $GetUserNewMessage['to_user_id'] ,
					 'user_two' => $GetUserNewMessage['from_user_id'],
					 'id' => $GetUserNewMessage['msg_id'],
					 'time' => $GetUserNewMessage['message_created_time'],
					 'newmessage'=> $sumMessage,
				     'newnotification' => $sumNotification,
					 'newmention' =>$sumMention, 
					 'selfdestruct' => $sendedTimeMessage,
					 'destruct' =>$destructTime,
					 'check' => $blocked,
					 'video'=> $mvideo,
					 'file' => $uploadedFile,
					 'image' => $final_images,
					 'productmessage' => $productMessage,
					 'vistNotification' => $visitNotificationBox,
					 'fvcnt' => $fvNotificationBox
					 ); 
				  $result =  json_encode( $data , JSON_UNESCAPED_UNICODE);	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			 
	   }
	  
	}
}
?>