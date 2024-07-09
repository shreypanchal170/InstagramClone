<?php
include_once '../functions/control.php'; 
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
			     $json = array();
				  $data = array(
					 'message' => htmlcode($GetUserNewMessage['message_text']),
					 'user_one' => $GetUserNewMessage['to_user_id'] ,
					 'user_two' => $GetUserNewMessage['from_user_id'],
					 'id' => $GetUserNewMessage['msg_id'],
					 'time' => $GetUserNewMessage['message_created_time']
					 ); 
				  $result =  json_encode( $data );	
				  echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
			 
	   }
	  
	}
}
?>