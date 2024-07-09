<?php  
if(!isset($last) || $last == '') {
  $last=0;
  // Show next sent official image
 }
if(!isset($last_message) || $last_message == '') {
  $last_message=0;
  // Show next sent official image
 } 

$Conversation_Updates=$Dot->Dot_GetChatHistory($toUserID,$uid,$last,$last_message);
if($Conversation_Updates) { 
    foreach($Conversation_Updates as $data) {
           echo '1';
     }  
 }   
?>