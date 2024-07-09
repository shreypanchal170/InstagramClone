<?php
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
 
require_once(__DIR__ .'/../../../functions/inc.php'); // Plugin config
require_once(__DIR__ .'/../vendor/autoload.php'); // Plugin library

if($dataUsername) {
	$callInfo = $db->query(sprintf("SELECT * FROM `dot_video_calls` WHERE `id` = '%s'", $db->real_escape_string($_GET['call_id'])));
	
	$call = $callInfo->fetch_assoc();
	
	// Get the call status
	if($call['status'] == 2 || $call['status'] == 3) {
		$call_is_ended = 1;
	} else {
		$call_is_ended = 0;
	}
	
	// Verify the call participants
	if($call['from'] != $uid && $call['to'] != $uid) {
		// If the user is not part of the call
		header("Location: ".$base_url);
	}
	
	// Extra stuff for the audio type call
	if($call['type'] == 0) {
		$cssbg = ' style="background: linear-gradient(141deg, #718bcc 0%, #293858 100%);"';
		$cssbc = ' audio-buttons-container';
	} else {
		$cssbg = ' style="background: linear-gradient(141deg, rgb(113, 160, 158) 0%, rgb(33, 46, 51) 100%);"';
		$cssbc = ' audio-buttons-container';
	}
	
	if($call['status'] == 2 || $call['status'] == 3) {
		$cssbg = ' style="background: linear-gradient(141deg, #717b96 0%, #212733 100%);"';
	}
	
	// Select the user image
	$getUser = $db->query(sprintf("SELECT `user_id`,`user_name`, `user_fullname` FROM `dot_users` WHERE `user_id` = '%s'", ($call['from'] == $uid ? $call['to'] : $call['from'])));
	
	$userInfo = $getUser->fetch_assoc();
} else {
	// If the user is not logged in
	header("Location: ".$base_url);
}

// Required for Video grant
$roomName = $_GET['call_id'];
$getCallerAvatar = $Dot->Dot_UserAvatar($userInfo['user_id'],$base_url);
// Participant name
$identity = $dataUsername;

// Create access token, which we will serialize and send to the client
$token = new AccessToken($twilioAccountSid, $apiKeySid, $apiKeySecret, 3600, $identity);

// Create Video grant
$videoGrant = new VideoGrant();
$videoGrant->setRoom($roomName);
$token_id = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10)); 
// Add grant to token
$token->addGrant($videoGrant);

mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title><?php echo $metaTitle; ?> Call - <?php echo $userInfo['user_fullname']; ?></title>
<link href="<?php echo $base_url; ?>css/style.css" rel="stylesheet" type="text/css">
<script src="<?php echo $base_url; ?>js/jquery-3.3.1.min.js"></script> 
<script src="<?php echo $base_url; ?>requests/video_call/js/twilio.js"></script>
<link href="<?php echo $base_url; ?>requests/video_call/video_call.css" rel="stylesheet" type="text/css">
<script>
var Video = Twilio.Video;
var token = '<?php echo $token->toJWT(); ?>';
var call_id = '<?php echo htmlspecialchars($_GET['call_id'], ENT_QUOTES, 'UTF-8'); ?>';

requestUrl = '<?php echo $base_url; ?>';
token_id = '<?php echo $token_id; ?>';
call_is_audio = <?php echo ($call['type'] ? 'false' : 'true'); ?>;
call_is_ended = <?php echo $call_is_ended; ?>;
call_started = false;

if(!call_is_ended) {
	// Connect with audio-only
	Video.connect(token, {
		name: '<?php echo $roomName; ?>',
		audio: true,
		video: <?php echo ($call['type'] ? 'true' : 'false'); ?>
	}).then(function(room) {
		room.on('disconnected', function(room) {
			video_call_end();
		});
		
		remoteView = $('#remote-container');
		localView = $('#local-container');
		
		if(!call_is_audio) {
			localView.css('display', 'grid');
			$('#camera-button').show();
		}
		
		room.on('participantConnected', function(participant) {
			if(call_is_audio) {
				localView.hide();
			} else {
				$('#camera-button').show();
			}
			/*
			participant.on('trackDisabled', function(e) {
			});
			participant.on('trackRemoved', function(e) {
			});
			*/
		});
	  
		// Set the local video stream
		Video.createLocalVideoTrack().then(function(track) {
			if(!call_is_audio) {
				localView[0].append(track.attach());
			}
		});
		
		// Add the remote video stream
		room.on('trackAdded', function(track) {
			remoteView[0].append(track.attach());
			if(typeof callCounter == "undefined") {
				callCounter = setInterval(countTimer, 1000);
				call_started = true;
			}
		});
		
		// Remove the remote video stream
		room.on('participantDisconnected', function(track) {
			// remoteStream.detach();	
			
			video_call_end();
		});
		
		$('#microphone-button').on('click', function() {
			if($('#microphone-button').attr('data-audio') == "true") {
				$('#microphone-button').attr("data-audio", "false");
				$('#microphone-button').addClass('video-call-button-microphone-muted');
				
				room.localParticipant.tracks.forEach(function (track) {
					if(track.kind == "audio") {
						track.mediaStreamTrack.enabled = false;
						track.mediaStreamTrack.muted = true;
					}
				});
			} else {
				$('#microphone-button').attr("data-audio", "true");
				$('#microphone-button').removeClass('video-call-button-microphone-muted');
				
				room.localParticipant.tracks.forEach(function (track) {
					if(track.kind == "audio") {
						track.mediaStreamTrack.enabled = true;
						track.mediaStreamTrack.muted = false;
					}
				});
			}
		});
		
		$('#camera-button').on('click', function() {
			if($('#camera-button').attr('data-video') == "true") {
				$('#camera-button').attr('data-video', 'false');
				$('#camera-button').addClass('video-call-button-camera-off');
				
				room.localParticipant.tracks.forEach(function (track) {
					if(track.kind == "video") {
						track.mediaStreamTrack.enabled = false;
						track.mediaStreamTrack.muted = true;
						$('#local-container video').remove();
					}
				});
			} else {
				$('#camera-button').attr('data-video', 'true');
				$('#camera-button').removeClass('video-call-button-camera-off');
				
				room.localParticipant.tracks.forEach(function (track) {
					if(track.kind == "video") {
						track.mediaStreamTrack.enabled = true;
						track.mediaStreamTrack.muted = false;
						localView[0].appendChild(track.attach());
					}
				});
			}
		});
		
		$('#volume-button').on('click', function() {
			if(typeof $('#remote-container audio')[0] != "undefined") {
				var currentVolume = $('#volume-button').attr('data-volume');
				
				if(currentVolume == "1") {
					$('#volume-button').attr('data-volume', '0');
					$('#remote-container audio')[0].volume = 0;
					$('#volume-button').removeAttr('class').attr('class', 'video-call-button video-call-button-volume-mute');
				} else if(currentVolume == "0") {
					$('#volume-button').attr('data-volume', '0.3');
					$('#remote-container audio')[0].volume = 0.3;
					$('#volume-button').removeAttr('class').attr('class', 'video-call-button video-call-button-volume-low');
				} else if(currentVolume == "0.3") {
					$('#volume-button').attr('data-volume', '0.6');
					$('#remote-container audio')[0].volume = 0.6;
					$('#volume-button').removeAttr('class').attr('class', 'video-call-button video-call-button-volume-med');
				} else if(currentVolume == "0.6") {
					$('#volume-button').attr('data-volume', '1');
					$('#remote-container audio')[0].volume = 1;
					$('#volume-button').removeAttr('class').attr('class', 'video-call-button video-call-button-volume-max');
				}
			}
		});
		
		$('#call-end').on('click', function() {
			room.disconnect();
			
			video_call_end();
		});
	}, function(error) {
		video_call_end(1);
		
		$('#call-time').html('<span class="call-error"><strong>Error:</strong> '+error.name+'</span>')
	});
	/* Call Timer */
	callTime = 0;
	function countTimer() {
		++callTime;
		var hour = pad(Math.floor(callTime /3600));
		var minute = pad(Math.floor((callTime - hour*3600)/60));
		var seconds = pad(callTime - (hour*3600 + minute*60));
		
		if(hour > 0) {
			$("#call-time").html(hour+':'+minute+':'+seconds);
			callDuration = hour+':'+minute+':'+seconds;
		} else {
			$("#call-time").html(minute+':'+seconds);
			callDuration = minute+':'+seconds;
		}
	}
	function pad(x) {
		return (x < 10) ? '0'+x.toString() : x.toString();
	}
} else {
	$(document).ready(function() {
		$('#call-time').html('<?php echo $page_Lang['call_ended'][$dataUserPageLanguage];?>');

		// Remove the Call Buttons
		$('#video-call-buttons').hide();
	});
}
$(document).ready(function() {
	// $(document).on("keydown", disableF5);
	
	// Autoclose conversation if the user does not respond in a defined time
	setTimeout(closeDial, <?php echo ($twilloDialTime*1000); ?>);
	
	// Autoclose conversation if the maximum call time exceeds
	setTimeout(closeCall, <?php echo ($twillioCallTime*60*60*1000); ?>);
});
function closeDial() {
	if(call_started) {
		return false;
	} else {
		video_call_end();
	}
}
function closeCall() {
	video_call_end();
}
function disableF5(e) {
	if ((e.which || e.keyCode) == 116) {
		e.preventDefault();
	}
}
window.onbeforeunload = function() {
	video_call_end();
}
function video_call_end(x) {
	// Prevent multiple conversation closures
	if(typeof call_ended != "undefined") {
		return false;
	}
	call_ended = true;

	$('#remote-container video, #remote-container audio, #local-container').remove();
	
	// Stop counting the call length
	if(typeof callCounter != "undefined") {
		clearInterval(callCounter);
	}

	// Replace the call time with the Call Ended text
	if(typeof callDuration != "undefined") {
		$('#call-time').html('<?php echo $page_Lang['call_ended'][$dataUserPageLanguage];?> ('+callDuration+')');
	} else {
		$('#call-time').html('<?php echo $page_Lang['call_ended'][$dataUserPageLanguage];?>');
	}
	
	// Remove the Call Buttons
	$('#video-call-buttons').hide();
	
	$('#remote-container').css('background', 'linear-gradient(141deg, #717b96 0%, #212733 100%)');

	$.ajax({
		type: "POST",
		url: requestUrl+"requests/video_call/requests/manage_call.php",
		data: "call_id="+call_id+"&type=2&token_id="+token_id,
		success: function(html) {
			if(!x) {
				// Force refresh the browser to ensure all the connections are closed
				setTimeout(window.location.reload.bind(window.location), 90000);
			}
		}
	});
}
</script>
</head>
<body>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div class="video-call-container"<?php echo $cssbg; ?>>
	<div id="remote-container"<?php echo $cssbg; ?>>
		<div id="partner-container">
			<div id="partner-content">
				<div id="partner-image"><img src="<?php echo $getCallerAvatar;?>"></div>
				<div id="partner-name"><?php echo $userInfo['user_fullname'];?></div>
				<div id="call-time"><?php echo $page_Lang['call_calling'][$dataUserPageLanguage];?></div>
			</div>
		</div>
	</div>
	<div id="local-container"></div>
	<div class="video-call-buttons-container<?php echo $cssbc; ?>" id="video-call-buttons">
		<div class="video-call-button video-call-button-camera" id="camera-button" data-video="true"></div>
		<div class="video-call-button video-call-button-microphone" id="microphone-button" data-audio="true"></div>
		<div class="video-call-button video-call-button-volume-max" id="volume-button" data-volume="1"></div>
		<div class="video-call-button video-call-button-end" id="call-end"></div>
	</div>
</div>
</body>
</html>