<?php 
include_once 'functions/inc.php';
if(empty($uid)){
   header("Location: $base_url");   
} 
$page = 'chat'; ;
$pageRequestType = 'chat';
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
?> 
<div class="section" id="chatBox" data-type="chat">
  <div class="Chatmain" id="view" data-type="view">
    <!--Left STARTED-->
    <div class="_1enh mobile_1enh openLeftConversationMenu" id="friend_u_list">
      <div class="_36ic"> 
         <span class="icons_two back_to"></span> 
        <h1 class="_1tqi"><?php echo $page_Lang['messenger'][$dataUserPageLanguage];?></h1><span class="glyphsSpriteChatFriends__outline__24__grey_9 icons_tree" id="friends_u" data-type="friendlistchat"></span></div>
      <div class="_36ic"><span class="_5iwm _150g _58ah"><input autocomplete="off" class="_58al" placeholder="<?php echo $page_Lang['search_conversation_user'][$dataUserPageLanguage];?>" spellcheck="false" type="text" id="search_u_chat" data-type="searchChatFriend"></span></div>
      <span class="cl_4u-c">
      <div class="searchListChat">
           <span class="conversationsList" tabindex="5000" style="overflow: hidden; outline: none;">
               <ul class="listOfChat">
                   
               </ul>
           </span> 
        </div>
         <div class="cl_4u-m"> 
         <span class="conversationsList">
            <ul class="listOf"> 
            <?php 
			  $ConversationUserList = $Dot->Dot_ChatUserList($uid);
			  if($ConversationUserList){
				   foreach($ConversationUserList as $cData){  
					   $conversationUserID = $cData['user_id'];   
					   $conversationUserAvatar = $Dot->Dot_UserAvatar($conversationUserID, $base_url);  
					   $conversationLastMessage = $Dot->Dot_ChatLastMessage($uid,$conversationUserID);
					   $conversationUserFullName = $Dot->Dot_UserFullName($conversationUserID);
					   $conversationUserName = $Dot->Dot_GetUserName($conversationUserID); 
					   $time = $conversationLastMessage['message_created_time']; 
					   $conversationLastMessageTime = date("c", $time);
					   $getConversationLastMessage = $conversationLastMessage['message_text'];
					   $getLastMessageID = $conversationLastMessage['msg_id'];
					   $getFromUID = $conversationLastMessage['from_user_id'];
					   $getToUID = $conversationLastMessage['to_user_id'];
					   $getFileName = isset($conversationLastMessage['file_name']) ? $conversationLastMessage['file_name'] : NULL;
					   $getFile = isset($conversationLastMessage['file']) ? $conversationLastMessage['file'] : NULL;
					   $getFileExtension = isset($conversationLastMessage['file_extension ']) ? $conversationLastMessage['file_extension '] : NULL;
					   $getDesto = isset($conversationLastMessage['dest']) ? $conversationLastMessage['dest'] : NULL;
					   $messageSelfDestructionSecret =  isset($conversationLastMessage['secret_checked']) ? $conversationLastMessage['secret_checked'] : NULL; 
					   $messageproductQuestionID = isset($conversationLastMessage['q_question_id']) ? $conversationLastMessage['q_question_id'] : NULL; 
					   $messageproductID = isset($conversationLastMessage['q_product_id']) ? $conversationLastMessage['q_product_id'] : NULL; 
					   if($getDesto){
							if($messageSelfDestructionSecret == '0'){
								  $destText = $page_Lang['self_destruction_message'][$dataUserPageLanguage];
							   }else{
										  $destText = $page_Lang['message_was_self_destruction'][$dataUserPageLanguage];
							   }
					   }else if($getConversationLastMessage){
						   $destText = htmlcode($getConversationLastMessage);
					   }else{
						   $destText = $page_Lang[$Dot->Dot_LanguagesKey($messageproductQuestionID)][$dataUserPageLanguage];
					   }
					   
					   if($getFile){
				         $fileID = $Dot->Dot_GetUploadChatFileID($getFile); 
				     	 $messagefileID = $fileID['file_id'];
					     $messageUploadedFilen = $fileID['uploaded_file'];
					     $messageUploadedFileExtension = $fileID['extension'];
					     $extensionArray = array('ai' => "file_extensions_icon file_ai_mini",'pdf' => "file_extensions_icon file_pdf_mini", 'eps' => "file_extensions_icon file_eps_mini",'tif' => "file_extensions_icon file_tif_mini", 'doc' => "file_extensions_icon file_doc_mini",'docx' => "file_extensions_icon file_doc_mini", 'zip' => "file_extensions_icon file_zip_mini", 'rar' => "file_extensions_icon file_rar_mini",'psd' => "file_extensions_icon file_psd_mini",'txt' => "file_extensions_icon file_txt_mini");
					   $fileIcon = '<span class="'.$extensionArray[$messageUploadedFileExtension].'"></span>';
					   }else{
						$fileIcon ='';  
					   }
					   
					   echo '
							 <!---->
							  <li class="_5l-3 _1ht1 _1ht2 getuse" id="conme'.$getLastMessageID.'" data-id="'.$conversationUserID.'" data-user="'.$conversationUserName.'" data-page="chat">
								<span class="_5l-3 _1ht5">
								  <span class="_1ht5 _2il3 _5l-3 _3itx">
									<span class="_1qt3 _5l-3" id="js_3u">
									  <span>
										<span class="_4ldz" style="height: 50px; width: 50px;">
										  <span class="_4ld-" style="height: 50px; width: 50px;">
											<span class="_55lt" style="width: 50px; height: 50px;">
											  <img src="'.$conversationUserAvatar.'" width="50" height="50" alt="" class="img_avatar"> 
											</span>
										  </span>
										</span>
									  </span>
									</span>
									<span class="_1qt4 _5l-m">
									  <span class="_1qt5 _5l-3"><span class="_1ht6"><span class="txt_st11">'.$conversationUserFullName.'</span></span>
								  <span><abbr class="_1ht7 timeago" id="time'.$conversationUserID.'" title="'.$conversationLastMessageTime.'">'.$conversationLastMessageTime.'</abbr></span>
								</span>
								<span class="_1qt5 _5l-3"><span class="_1htf"><span class="_j0r"></span>'.$fileIcon.'<span class="txt_st12" id="msg'.$conversationUserID.'">'.$destText.'</span></span>
								</span>
							  </span>
							  </span>
							</span>
							<span>
							</span>
							<span class="reson" data-from="'.$getFromUID.'" data-con="'.$getLastMessageID.'" data-to="'.$getToUID.'" data-type="deleteconversation">
									 <span class="mini_icons deletemessageicon"></span>
						    </span>
							</li>
							 <!----> 		 
					   ';
				   }
			  }
			?>

            </ul>
            </span>
            
            </div>
            </span>
      </div>
            <!--Left FINISHED-->
<!--Right STARTED-->
<div class="_1t2u conversationCurrentBox" id="conversations">
   <?php 
      if(isset($_GET['with'])){ 
		   $toUserName = mysqli_real_escape_string($db, $_GET['with']);
		   $userData = $Dot->Dot_ChatUser($toUserName); 
	       if($userData){
			    
			   $toUserName = $userData['user_name'];
			   $toUserID = $userData['user_id']; 
		       $GetChatUserBox = $Dot->Dot_CheckUserExist($toUserID, $toUserName);
			   if($GetChatUserBox) { 
			        include_once("contents/chat_box.php");
			   }
		   }
		     
			 
			 
		   
	  }
   ?>
</div>
<!--Right FINISHED-->
</div>
</div>  
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");
?>
<script type="text/javascript" src="<?php echo $base_url;?>js/scrollFixed.js"></script>
<script type="text/javascript">
  $(".fx7hk").stick_in_parent(); 
  $(document).ready(function(){
     $(".header_container").addClass("aUCRo");
	 $(".header_in").addClass("buoMu");
	 $(".aU2HW").addClass("topico"); 
  });
</script>
</body>
</html>