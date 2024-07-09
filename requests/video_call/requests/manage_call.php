<?php
require_once(__DIR__ .'/../../../functions/inc.php');
require_once(__DIR__ .'/../../../functions/vendor/autoload.php'); 
 
if($_POST['token_id'] != $_SESSION['token_id']) {
	//return false;
}

if($dataUsername) {  
	// Decline call
	if($_POST['type'] == 3) { 

		$declineCall = $db->query(sprintf("UPDATE `dot_video_calls` SET `status` = 3 WHERE `dot_video_calls`.`id` = '%s' AND `dot_video_calls`.`from` = '%s' AND `dot_video_calls`.`to` = '%s'", $db->real_escape_string($_POST['call_id']), $db->real_escape_string($_POST['caller_id']), $db->real_escape_string($uid)));
	} elseif($_POST['type'] == 0) {  
		// If the users are friends, start a conversation
		if($Dot->Dot_CheckUserFriendStatusForVideoCall($uid, $_POST['profile_id'])) {   
			// Check if the targeted user doesn't have a pending call
			$incomingCalls = $db->query(sprintf("SELECT * FROM `dot_video_calls` LEFT JOIN `dot_users` ON `dot_video_calls`.`from` = `dot_users`.`user_id` WHERE `dot_video_calls`.`to` = '%s' AND `dot_video_calls`.`status` = 0 AND `dot_video_calls`.`time` > DATE_SUB(NOW(), INTERVAL %s SECOND) LIMIT 0,1", $db->real_escape_string($_POST['profile_id']), $twilloDialTime)); 
			 
			 $resultIncoming = $incomingCalls->fetch_assoc();
			 
			// If there's no pending calls
			if(!$resultIncoming['id']) {
				
				$db->query(sprintf("INSERT INTO `dot_video_calls` (`from`, `to`, `type`, `status`) VALUES ('%s', '%s', '%s', '%s')", $uid, $db->real_escape_string($_POST['profile_id']), $db->real_escape_string($_POST['call_type']), 0));
				
				$selectCall = $db->query(sprintf("SELECT * FROM `dot_video_calls` WHERE `from` = '%s' AND `to` = '%s' AND `type` = '%s' AND `status` = '%s' ORDER BY `id` DESC", $uid, $db->real_escape_string($_POST['profile_id']), $db->real_escape_string($_POST['call_type']), 0));
				
				$result = $selectCall->fetch_assoc(); 
				
				echo json_encode(array('call_id' => $result['id']));
			} else {
				echo json_encode(array('error' => 'User Busy'));
			}
		}
	} elseif($_POST['type'] == 1) {
		$selectCall = $db->query(sprintf("SELECT * FROM `dot_video_calls` WHERE `id` = '%s'", $db->real_escape_string($_POST['profile_id'])));
		 
		$result = $selectCall->fetch_assoc(); 
		// If the call is destinated to the logged-in user
		if($result['to'] == $uid && in_array($result['status'], array(0,1))) {
			$db->query(sprintf("UPDATE `dot_video_calls` SET `status` = 1 WHERE `id` = '%s'", $result['id']));
			
			echo json_encode(array('call_id' => $result['id']));
		} else {
			echo json_encode(array('error' => 'Call Ended'));
		}
	} elseif($_POST['type'] == 2) {
		$selectCall = $db->query(sprintf("SELECT * FROM `dot_video_calls` WHERE `id` = '%s'", $db->real_escape_string($_POST['call_id'])));
		 
		$result = $selectCall->fetch_assoc(); 
		// If participant
		if($result['from'] == $uid || $result['to'] == $uid) {
			$db->query(sprintf("UPDATE `dot_video_calls` SET `status` = 2 WHERE `id` = '%s'", $result['id']));
		}
	}
}

mysqli_close($db);
?>