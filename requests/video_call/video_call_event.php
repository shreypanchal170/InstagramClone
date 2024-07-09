<?php
// Load the configuration file
require_once(__DIR__ .'/config.php');

function video_call_event($values) {
	global $LNG;
	
	require_once(__DIR__ .'/vendor/autoload.php');
	
	if($values['plugin_chat']) {
		$output = '
		<div class="c-w-icon c-w-icon-video-call chat-video-call-btn" title="'.sprintf($LNG['plugin_video_call_start_video'], ($values['user']['idu'] ? realName($values['user']['username'], $values['user']['first_name'], $values['user']['last_name']) : '\'+realname+\'')).'" onclick="video_call_manage(0, '.($values['user']['idu'] ? $values['user']['idu'] : '\'+id+\'').', 1);"></div>
		
		<div class="c-w-icon c-w-icon-audio-call chat-video-call-btn" title="'.sprintf($LNG['plugin_video_call_start_audio'], ($values['user']['idu'] ? realName($values['user']['username'], $values['user']['first_name'], $values['user']['last_name']) : '\'+realname+\'')).'" onclick="video_call_manage(0, '.($values['user']['idu'] ? $values['user']['idu'] : '\'+id+\'').', 0);"></div>
		';
	}
	return $output;
}
?>