<?php
// +------------------------------------------------------------------------+
// | @author Mustafa Öztürk (mstfoztrk)
// | @author_url 1: http://www.duhovit.com
// | @author_url 2: http://codecanyon.net/user/mstfoztrk
// | @author_email: socialmaterial@hotmail.com   
// +------------------------------------------------------------------------+
// | oobenn Instagram Style Social Networking Platform
// | Copyright (c) 2016-2020 mstfoztrk. All rights reserved.
// +------------------------------------------------------------------------+
// Database Configuration  
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'oobennSQL');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die(mysqli_connect_error());
mysqli_query ($db, 'set character_set_results="utf8mb4"');
mysqli_query ($db,"SET SESSION SQL_MODE=REPLACE(@@SQL_MODE, 'ONLY_FULL_GROUP_BY', '') ");
mysqli_query ($db,"SET @@global.sql_mode= 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'; "); 
error_reporting(0);  
$base_url = 'http://ubuzzy.com/';
$DocumentRoot = $_SERVER['DOCUMENT_ROOT'].'/';
$audioPath = $DocumentRoot.'/uploads/audio/';
$videoPath = $DocumentRoot.'/uploads/video/';
$LoginRegiserThemeFolder = $DocumentRoot.'/wellcome_themes/';
$imagePath = $DocumentRoot.'/uploads/images/'; 
$imagePath = $DocumentRoot.'/uploads/oldFolder/'; 
$avatarPath = $DocumentRoot.'/uploads/avatar/';
$coverPath = $DocumentRoot.'/uploads/cover/';
$sotryPath = $DocumentRoot.'/uploads/stories/'; 
$stickerPath = $DocumentRoot.'/uploads/emoticons/F_Sticker/';
$gifPath = $DocumentRoot.'/uploads/gifs/';
$watermarksPath = $DocumentRoot.'/uploads/watermarkbg/'; 
$adsPath = $DocumentRoot.'supponsoreduploads/';
$logoPath = $DocumentRoot.'/uploads/logo/';
$eventCoverPath = $DocumentRoot.'/uploads/event__type_covers/';
$eventCategoriesIcon = $DocumentRoot.'/uploads/event_categories_icon/';
$feelingCategoriesIcon = $DocumentRoot.'/uploads/feelings/';
$tumbnails = $DocumentRoot.'/uploads/tumbnails/';
$marketSliderPath = $DocumentRoot.'/uploads/market_slider/'; 
$purchase = '8b90df32-80bc-6517-cbd9-3dcb1f05a867'; // Your purchase code, don\'t give it to anyone. 
$cookie_name = 'oobenn_oauth'; 
?>