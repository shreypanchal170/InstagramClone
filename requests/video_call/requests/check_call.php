<?php 
require_once(__DIR__ .'/../../../functions/inc.php');  
if($_POST['token_id'] != $_SESSION['token_id']) {
	//return false;
}
$output = array();
if($dataUsername) {
	// Get the last incoming call newer than X minutes
	 $incomingCalls = $db->query(sprintf("SELECT * FROM `dot_video_calls` LEFT JOIN `dot_users` ON `dot_video_calls`.`from` = `dot_users`.`user_id` WHERE `dot_video_calls`.`to` = '%s' AND `dot_video_calls`.`status` = 0 AND `dot_video_calls`.`time` > DATE_SUB(NOW(), INTERVAL %s SECOND) LIMIT 0,1", $db->real_escape_string($uid), $twilloDialTime)); 
	
	while($row=mysqli_fetch_array($incomingCalls,MYSQLI_ASSOC)) { 
		$output['type'] = ($row['type'] ? 1 : 0);
		
		$output['caller_id'] = $row['user_id'];
		
		$output['call_id'] = $row['id'];
		
		$output['output'] = '<div class="call_u_details"><div class="video-call-modal-image"><div class="caller_box_avatar" style="background-image:url('.$Dot->Dot_UserAvatar($row['user_id'],$base_url).'); "></div></div><div class="video-call-modal-name">'.$row['user_fullname'].'</div></div>';
		
		$output['title'] = ($row['type'] ? ''.$page_Lang['you_have_a_video_call'][$dataUserPageLanguage].'' : ''.$page_Lang['you_have_a_voice_call'][$dataUserPageLanguage].'');
		
		$output['buttons'] = '<div class="modal-btn button-active waves-effect waves-light btn blue" id="video-call-answer-btn" onclick="video_call_answer()"><a>'.$page_Lang['accept_call'][$dataUserPageLanguage].'</a></div><div class="modal-cancel button-normal waves-effect waves-light btn blue-grey lighten-3" id="video-call-decline-btn" onclick="video_call_decline()"><a>'.$page_Lang['decline_call'][$dataUserPageLanguage].'</a></div>';
	}
} 

 $result =  json_encode($output);	
 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);  

mysqli_close($db);
?>