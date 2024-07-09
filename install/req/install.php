<?php 
if(isset($_POST['f'])){
   $type = $_POST['f']; 
   function getBaseUrl() { 
       $currentPath = $_SERVER['PHP_SELF']; 
	   $pathInfo = pathinfo($currentPath); 
	   $hostName = $_SERVER['HTTP_HOST']; 
	   return $hostName.$pathInfo['dirname'];
   } 
   if(isset($_POST['website_domain']) && isset($_POST['mysql_db_host']) && isset($_POST['mysql_db_user']) && isset($_POST['mysql_db_pass']) && isset($_POST['mysql_db_name']) && isset($_POST['code'])){ 
       $website_domain = $_POST['website_domain'];
       $mysql_db_host = $_POST['mysql_db_host'];
       $mysql_db_user = $_POST['mysql_db_user'];
       $mysql_db_pass= $_POST['mysql_db_pass'];
       $mysql_db_name = $_POST['mysql_db_name']; 
	   $siteUrl = urlencode(getBaseUrl()); 
	   $purcode = $_POST['code']; 
	   $subfolder = $_POST['subfolder'];  
	   if(empty($purcode)){ echo '7'; die();}
	      $check = $_POST['code'];
	      if($type == 'purchase'){
		      if(isset($_POST['code'])){ 
				  if($purcode){
					   $server = urlencode($_SERVER['SERVER_NAME']);
					   $siteurl  = urlencode(getBaseUrl());
					  $data = "";
					  if ($data){
					      echo '8';
						  die();
					  }else{
					      if($data == 'more'){
							echo '10';
							die();
						  }else{  
						       if(empty($mysql_db_host)){echo '3'; die();}
							   if(empty($mysql_db_user)){echo '4';  die();}
							   if(empty($mysql_db_pass)){echo '5'; die();}
							   if(empty($mysql_db_name)){echo '6';die();} 
							   if(empty($website_domain)){ echo '2'; die();}
							   $config_path = '../../functions/config.php'; 
							    if(!empty($subfolder)){
									$subdirectory = $subfolder.'/';
									$subdirect = $subfolder;
							   }
$webSiteUrl = rtrim($website_domain, '/') . '/';					   
$config_contents = "<?php
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
define('DB_SERVER', '".$mysql_db_host."');
define('DB_USERNAME', '".$mysql_db_user."');
define('DB_PASSWORD', '".$mysql_db_pass."');
define('DB_DATABASE', '".$mysql_db_name."');
\$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die(mysqli_connect_error());
mysqli_query (\$db, 'set character_set_results=\"utf8mb4\"');
mysqli_query (\$db,\"SET SESSION SQL_MODE=REPLACE(@@SQL_MODE, 'ONLY_FULL_GROUP_BY', '') \");
mysqli_query (\$db,\"SET @@global.sql_mode= 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'; \"); 
error_reporting(0);  
\$base_url = '".$webSiteUrl.$subdirectory."';
\$DocumentRoot = \$_SERVER['DOCUMENT_ROOT'].'/".$subdirect."';
\$audioPath = \$DocumentRoot.'/uploads/audio/';
\$videoPath = \$DocumentRoot.'/uploads/video/';
\$LoginRegiserThemeFolder = \$DocumentRoot.'/wellcome_themes/';
\$imagePath = \$DocumentRoot.'/uploads/images/'; 
\$imagePath = \$DocumentRoot.'/uploads/oldFolder/'; 
\$avatarPath = \$DocumentRoot.'/uploads/avatar/';
\$coverPath = \$DocumentRoot.'/uploads/cover/';
\$sotryPath = \$DocumentRoot.'/uploads/stories/'; 
\$stickerPath = \$DocumentRoot.'/uploads/emoticons/F_Sticker/';
\$gifPath = \$DocumentRoot.'/uploads/gifs/';
\$watermarksPath = \$DocumentRoot.'/uploads/watermarkbg/'; 
\$adsPath = \$DocumentRoot.'supponsoreduploads/';
\$logoPath = \$DocumentRoot.'/uploads/logo/';
\$eventCoverPath = \$DocumentRoot.'/uploads/event__type_covers/';
\$eventCategoriesIcon = \$DocumentRoot.'/uploads/event_categories_icon/';
\$feelingCategoriesIcon = \$DocumentRoot.'/uploads/feelings/';
\$tumbnails = \$DocumentRoot.'/uploads/tumbnails/';
\$marketSliderPath = \$DocumentRoot.'/uploads/market_slider/'; 
\$purchase = '".$purcode."'; // Your purchase code, don\'t give it to anyone. 
\$cookie_name = 'oobenn_oauth'; 
?>"; 
                           fopen($config_path, 'w+');
                           $configFile =  file_put_contents($config_path, $config_contents);  
						   $con = mysqli_connect($mysql_db_host, $mysql_db_user, $mysql_db_pass, $mysql_db_name) or die('server_error');
                           mysqli_select_db($con, $mysql_db_name) or die('selecting_database_error'); 
						   mysqli_set_charset($con, 'utf8');  
						   if($configFile){
							   $filename = 'oobennSQL.sql';
                               $templine = '';
							   $lines = file($filename);
							   foreach ($lines as $line) {
								   if (substr($line, 0, 2) == '--' || $line == '')
								   continue;
								   $templine .= $line;
								   if (substr(trim($line), -1, 1) == ';') {
									   mysqli_query($con, $templine) or die('database_error');
									   $templine = '';
								   }
								   
							   }
						    } 
							fopen('../install.lock', 'w+');
							$create_htaccess = "../../.htaccess";
						    $file_handle = fopen($create_htaccess, 'w') or die("Error: Can't open file");
						    $content_string ='';
							fwrite($file_handle, $content_string);
$content_string = "
Options +FollowSymLinks -MultiViews
RewriteEngine On
RewriteBase /".$subdirectory."

ErrorDocument 404 ".$webSiteUrl.$subdirectory."sources/not-found.php          
RewriteCond %{REQUEST_METHOD} !POST
RewriteCond %{THE_REQUEST} \s/+(.+?)\.php[\s?] [NC]
RewriteRule ^ /%1 [R=302,NE,L]
	
RewriteCond %{REQUEST_METHOD} !POST
RewriteCond %{THE_REQUEST} /index\.php [NC]
RewriteRule ^(.*)index\.php$ /$1 [L,R=302,NC,NE]
	
RewriteCond %{REQUEST_FILENAME} -d [OR]
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule ^ - [L]
	
RewriteRule ^hashtag/([^/]+)/?$ hashtags.php?tag=$1 [L,QSA]
RewriteRule ^settings/([\w-]+)/?$ settings.php?set=$1 [L,QSA]
RewriteRule ^credit/([\w-]+)/?$ buyCredit.php?cr=$1 [L,QSA]
RewriteRule ^your-ads/([\w-]+)/?$ of-ads.php?cr=$1 [L,QSA]
RewriteRule ^status/([^/]+)/?$ status.php?msgID=$1 [L,QSA]
RewriteRule ^chat/([\w-]+)/?$ chat.php?with=$1 [L,QSA]
RewriteRule ^account/([\w-]+)/?$ sources/index.php?get=$1 [L,QSA]
RewriteRule ^dashboard/([\w-]+)/?$ admin/index.php?set=$1 [L,QSA]
RewriteRule ^profile/([^/]+)/?$ profile.php?username=$1 [L,QSA,NC]  
RewriteRule ^mymarket/([^/]+)/?$ market.php?marketid=$1 [L,QSA,NC]
RewriteRule ^mymarket/(sold|about)/([^/]+)/?$ market.php?marketid=$2 [L,QSA,NC]
RewriteRule ^profile/(followers|friends|saved|stories)/([^/]+)/?$ $1.php?username=$2 [L,QSA,NC] 
RewriteRule ^event/([^/]+)/?$ event.php?eventID=$1 [L,QSA,NC] 
RewriteRule ^events/([\w-]+)/?$ events.php?p=$1 [L,QSA,NC]  
RewriteRule ^product/([^/]+)/?$ product.php?productid=$1 [L,QSA]  

RewriteRule ^marketplace/(category)/([^/]+)/?$ marketplace.php?category=$2 [L,QSA,NC]
RewriteRule ^marketplace/(search)/([^/]+)/?$ marketplace.php?sproduct=$2 [L,QSA,NC]
	
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.+?)/?$ $1.php [L] 

<IfModule mod_headers.c>
Header set Access-Control-Allow-Origin '*'
</IfModule>

RemoveHandler .html .htm
AddType application/x-httpd-php .php .html .htm

<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE text/xml
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE image/x-icon
  AddOutputFilterByType DEFLATE image/svg+xml
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/x-javascript
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/x-font
  AddOutputFilterByType DEFLATE application/x-font-truetype
  AddOutputFilterByType DEFLATE application/x-font-ttf
  AddOutputFilterByType DEFLATE application/x-font-otf
  AddOutputFilterByType DEFLATE application/x-font-opentype
  AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
  AddOutputFilterByType DEFLATE font/ttf
  AddOutputFilterByType DEFLATE font/otf
  AddOutputFilterByType DEFLATE font/opentype
  BrowserMatch ^Mozilla/4 gzip-only-text/html
  BrowserMatch ^Mozilla/4\.0[678] no-gzip
  BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
</IfModule>
<IfModule mod_security.c>
  SecFilterScanPOST Off
</IfModule>

## EXPIRES CACHING ##
<IfModule mod_expires.c>
ExpiresActive On
ExpiresByType image/jpg 'access plus 1 year'
ExpiresByType image/jpeg 'access plus 1 year'
ExpiresByType image/gif 'access plus 1 year'
ExpiresByType image/png 'access plus 1 year'
ExpiresByType text/css 'access plus 1 month'
ExpiresByType application/pdf 'access plus 1 month'
ExpiresByType text/x-javascript 'access plus 1 month'
ExpiresByType application/x-shockwave-flash 'access plus 1 month'
ExpiresByType image/x-icon 'access plus 1 year'
ExpiresDefault 'access plus 2 days'
</IfModule>
## EXPIRES CACHING ##
";							
                         fwrite($file_handle, $content_string); 
					     fclose($file_handle);  
						 $queryPr = mysqli_query($con, "UPDATE dot_configuration SET pr_cod = '$purcode' , activated = '1' WHERE configuration_id = '1'") or die(mysqli_error($con));
						 echo '1';
						 exit;
						  }
					  }
				  }
			  }
	      }
   } 
        if($type == 'createadmin'){ 
	    include_once '../../functions/config.php';
            if(isset($_POST['admin_username']) && isset($_POST['admin_fullname']) && isset($_POST['admin_email']) && isset($_POST['admin_password']) && isset($_POST['code'])){
		          $admin_username = mysqli_real_escape_string($db, strtolower($_POST['admin_username']));
				  $admin_fullname = mysqli_real_escape_string($db, $_POST['admin_fullname']);
				  $admin_email = mysqli_real_escape_string($db, $_POST['admin_email']);
				  $admin_password = mysqli_real_escape_string($db, sha1(md5(trim($_POST['admin_password']))));
				  $prcod = mysqli_real_escape_string($db, $_POST['code']);
				  if(empty($prcod)){echo '7';die();}	
				  mysqli_query($db,"SET character_set_client=utf8") or die(mysqli_error($db));
				  mysqli_query($db,"SET character_set_connection=utf8") or die(mysqli_error($db));
				  $time = time();
				  $password = mysqli_real_escape_string($db, sha1(md5(trim($_POST["admin_password"]))));
				  $query = mysqli_query($db,"INSERT INTO dot_users(user_name,user_fullname,user_password,user_email,user_type,user_registered,user_status,user_credit,pro_user_type,verified_user,email_verification)VALUES('$admin_username','$admin_fullname','$password','$admin_email','1', '$time','1','9999','1','1','1')") or die(mysqli_error($db));
				  $sql=mysqli_query($db,"SELECT user_id FROM dot_users WHERE user_name='$admin_username'");
				  $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				  $uid=$row['user_id'];
				  $friend_query=mysqli_query($db,"INSERT INTO dot_friends(user_one,user_two,role,created_time)VALUES('$uid','$uid','me', '$time')") or die(mysqli_error($db));  
				  if($uid){
				     echo 'is_ok';
				  }else{
				     echo '404';
				  }
		   }else{
		      echo 'empty';
		   }
	 }
} 
?>