<?php 
ob_start();
include_once("functions/inc.php");
$generatedfilename = 'sources/'.$dataUsername.'.html';
if(!file_exists($generatedfilename)) {
     header('Location: index.php');
}
if(isset($_GET['thetype'])){
    $thePageType = mysqli_real_escape_string($db, $_GET['thetype']);
}
$postNotType = array("text","image","link","video","audio","avatar","cover","gif","location","watermark","which","event","page","blog","group","market","bfaf");
if(isset($thePageType) && in_array($thePageType, $postNotType)){
	$typesArray = array(
		 'text' => "p_text",
		 'image' => "p_image",
		 'link' => "icons_tree",
		 'video' => "p_video",
		 'audio' => "p_audio",
		 'avatar' => "p_avatar",
		 'cover' => "p_cover",
		 'gif' => "p_gif",
		 'location' => "p_location",
		 'watermark' => "p_watermark",
		 'which' => "p_which",
		 'event' => "p_event",
		 'page' => "p_page",
		 'blog' => "p_blog",
		 'group' => "p_group",
		 'market' => "p_product",
		 'bfaf' => "p_bfaf",
	  );
	  $theCreateType = $typesArray[$thePageType];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> 
<title><?php echo $dataUserFullName;?> || <?php echo $dot_siteName;?></title> 
 <meta charset="UTF-8"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
<link rel="stylesheet" id="style_mode" href="<?php echo $base_url;?>css/style.css">
<style type="text/css">

html, body {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
	-moz-osx-font-smoothing: grayscale;
}
.simpleheader{
  display:inline-block;
  position:absolute;
  width:100%;
  padding-top:200px;
  background-color:#8e24aa;
  top:0px;
  left:0px;
  z-index:-1;
}
.containera {
  width:100%;
  max-width:855px;
  margin:0px auto; 
  z-index:99;
  padding:30px;
}
.logo_informationa {
  width:100%;
  display:inline-block;
  color:#ffffff;
  text-align:center;
  font-size:60px;
  font-weight:500; 
}
.information_container {
  display:inline-block;
  width:100%;
  height:100%; 
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
  padding-top:40px;
}

.profile_image {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-o-border-radius: 50%;
	overflow: hidden;
	border: 2px solid #ffffff;
	margin: 0px auto;
	margin-top: -50px;
	margin-bottom: 50px;
}

.profile_image img {
  width:100%;
}
  
.profile_info_cover {
  position:relative;
  display:inline-block;
  width:100%;
  height:250px;   
  -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   background-position: center;
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
}
.proposed-item-img {
   position: absolute;
   display: block;
   left: 0;
   right: 0;
   top: 0;
   bottom: 0;
   width: 100%;
   height: 100%;
   opacity: 0;
}

.profile_info_cover:after {
  transform: scale(0.95) translateY(36px) translateZ(-30px);
  filter: blur(20px);
  opacity: 0.9;
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background-image: inherit; 
  background-size: cover;
  z-index: -1;
  transition: filter .3s ease;
}
 .withdrawal_note {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  color: #e53935;
  font-weight: 500;
  font-size: 14px;
  margin-bottom:40px;
}
.pro_info_container {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  border-right: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2); 
  color: #0288d1;
  font-weight: 500;
  font-size: 14px;
  display:block;
}
.info_box_item {
  display:inline-block;
  width:100%;
  padding:20px 15px;
  border-bottom:1px solid #eaeaea;
  font-weight:500;
  font-size:14ppx;
}
.info_span {
  float:left;
  font-weight:600;
  font-size:14px;
  color:#424242;
  padding-right:10px;
}
.intr {
	position: relative;
	display: inline-block;
	margin: 5px 7px 5px 0;
	padding: 7px 15px 8px 12px;
	border-radius: 30px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	background: #F1F1F1;
	color: #949494;
	line-height: 1.143;
	transition: background .2s;
	cursor: pointer;
	border: 1px solid #E4E4E4;
}
.eatingicon {
	float: left;
	width: 16px;
	height: 16px;
	background-position: 0px -143px;
	margin-right: 7px;
}
.intr-txt {
	overflow: hidden;
	max-width: 220px;
	margin: 0 0 -4px;
	white-space: nowrap;
	text-overflow: ellipsis;
	font-weight: 400;
	font-size: 14px;
	line-height: 1.143;
	color: #565656;
}
.pro_info_container_second {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	border-right: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	color: #0288d1;
	font-weight: 500;
	font-size: 14px;
	display: block;
	padding: 15px;
}
.withdrawal_note_two {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	padding: 20px;
	color: #e53935;
	font-weight: 500;
	font-size: 14px;
	margin-bottom: 40px;
	margin-top: 40px;
}
.postsContainer {
    width:100%;
	max-width:550px;
	margin:0px auto;
	padding:50px 0px;
}
.images-compare-label {
	position: absolute;
	padding: 5px 10px;
	background-color: #ffffff;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	-ms-border-radius: 3px;
	top: 10px;
	right: 10px;
	font-weight: 400;
	font-size: 13px;
}
</style>
</head>

<body> 

<div class="simpleheader"></div>
<div class="containera">
    <div class="logo_informationa"><?php echo $dot_siteName;?></div>
    <div class="information_container">
       <div class="profile_info_cover" style="background-image: url('<?php echo $dataUserCover;?>');"><img src="<?php echo $dataUserCover;?>" class="proposed-item-img"></div>
       <div class="profile_image"><img src="<?php echo $dataUserAvatar;?>"></div>
       <div class="withdrawal_note">Your <?php echo $thePageType;?> Posts</div>
        <!--Text Posts S-->
         <div class="postsContainer">
<?php 
$getPosts= $Dot->Dot_GetTextPostsForPage($uid,$theCreateType);
if($getPosts){
   foreach($getPosts as $PostFromData){
       include("contents/postlist.php"); 
  }
}
?>          
         </div>
        <!--Text Posts F-->

       
    </div>
</div>


</body>
</html>

<?php
}else if($thePageType == 'info'){?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $dataUserFullName;?> || <?php echo $dot_siteName;?></title>
<style type="text/css">
html, body {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
	-moz-osx-font-smoothing: grayscale;
}
.simpleheader{
  display:inline-block;
  position:absolute;
  width:100%;
  padding-top:200px;
  background-color:#8e24aa;
  top:0px;
  left:0px;
  z-index:-1;
}
.container {
  width:100%;
  max-width:855px;
  margin:0px auto; 
  z-index:99;
  padding:30px;
}
.logo_information {
  width:100%;
  display:inline-block;
  color:#ffffff;
  text-align:center;
  font-size:60px;
  font-weight:500; 
}
.information_container {
  display:inline-block;
  width:100%;
  height:100%; 
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
  padding-top:40px;
}

.profile_image {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-o-border-radius: 50%;
	overflow: hidden;
	border: 2px solid #ffffff;
	margin: 0px auto;
	margin-top: -50px;
	margin-bottom: 50px;
}

.profile_image img {
  width:100%;
}
 

div {
	-webkit-box-align: stretch;
	-webkit-align-items: stretch;
	-ms-flex-align: stretch;
	align-items: stretch;
	border: 0 solid #000;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-webkit-flex-direction: column;
	-ms-flex-direction: column;
	flex-direction: column;
	-webkit-flex-shrink: 0;
	-ms-flex-negative: 0;
	flex-shrink: 0;
	margin: 0;
	position: relative;
}
.profile_info_cover {
  position:relative;
  display:inline-block;
  width:100%;
  height:250px;   
  -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   background-position: center;
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
}
.proposed-item-img {
   position: absolute;
   display: block;
   left: 0;
   right: 0;
   top: 0;
   bottom: 0;
   width: 100%;
   height: 100%;
   opacity: 0;
}

.profile_info_cover:after {
  transform: scale(0.95) translateY(36px) translateZ(-30px);
  filter: blur(20px);
  opacity: 0.9;
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background-image: inherit; 
  background-size: cover;
  z-index: -1;
  transition: filter .3s ease;
}
 .withdrawal_note {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  color: #e53935;
  font-weight: 500;
  font-size: 14px;
  margin-bottom:40px;
}
.pro_info_container {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  border-right: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2); 
  color: #0288d1;
  font-weight: 500;
  font-size: 14px;
  display:block;
}
.info_box_item {
  display:inline-block;
  width:100%;
  padding:20px 15px;
  border-bottom:1px solid #eaeaea;
  font-weight:500;
  font-size:14ppx;
}
.info_span {
  float:left;
  font-weight:600;
  font-size:14px;
  color:#424242;
  padding-right:10px;
}
.intr {
	position: relative;
	display: inline-block;
	margin: 5px 7px 5px 0;
	padding: 7px 15px 8px 12px;
	border-radius: 30px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	background: #F1F1F1;
	color: #949494;
	line-height: 1.143;
	transition: background .2s;
	cursor: pointer;
	border: 1px solid #E4E4E4;
}
.eatingicon {
	float: left;
	width: 16px;
	height: 16px;
	background-position: 0px -143px;
	margin-right: 7px;
}
.intr-txt {
	overflow: hidden;
	max-width: 220px;
	margin: 0 0 -4px;
	white-space: nowrap;
	text-overflow: ellipsis;
	font-weight: 400;
	font-size: 14px;
	line-height: 1.143;
	color: #565656;
}
.pro_info_container_second {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	border-right: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	color: #0288d1;
	font-weight: 500;
	font-size: 14px;
	display: block;
	padding: 15px;
}
.withdrawal_note_two {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	padding: 20px;
	color: #e53935;
	font-weight: 500;
	font-size: 14px;
	margin-bottom: 40px;
	margin-top: 40px;
}
</style>
</head>

<body> 

<div class="simpleheader"></div>
<div class="container">
    <div class="logo_information"><?php echo $dot_siteName;?></div>
    <div class="information_container">
       <div class="profile_info_cover" style="background-image: url('<?php echo $dataUserCover;?>');"><img src="<?php echo $dataUserCover;?>" class="proposed-item-img"></div>
       <div class="profile_image"><img src="<?php echo $dataUserAvatar;?>"></div>
       <div class="withdrawal_note">Your Profile Informations</div>
       <div class="pro_info_container">
         <!---->
         <div class="info_box_item">  
            <span class="info_span">User ID : </span> <?php echo isset($data_uid) ? $data_uid : '-';?>
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
           <span class="info_span">Username : </span> <?php echo isset($dataUsername) ? $dataUsername : '-';?>
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Full Name : </span> <?php echo isset($dataUserFullName) ? $dataUserFullName : '-';?>    
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Profile Word : </span> <?php echo isset($dataUserWord) ? $dataUserWord : '-';?>     
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Bio : </span> <?php echo isset($dataUserBio) ? $dataUserBio : '-';?>   
         </div>
         <!----> 
         <!---->
         <div class="info_box_item">
            <span class="info_span">Gender : </span> <?php echo isset($dataUserGender) ? $dataUserGender : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Height : </span> <?php echo isset($dataUserHeight) ? $dataUserHeight : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Weight : </span> <?php echo isset($dataUserWeight) ? $dataUserWeight : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Life Style : </span> <?php echo isset($dataUserLifeStyle) ? $dataUserLifeStyle : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Children : </span> <?php echo isset($dataUserChildren) ? $dataUserChildren : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Smoke : </span> <?php echo isset($dataUserSmoke) ? $dataUserSmoke : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Drink : </span> <?php echo isset($dataUserDrink) ? $dataUserDrink : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Body Type : </span> <?php echo isset($dataUserBodyType) ? $dataUserBodyType : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Hair Color : </span> <?php echo isset($dataUserHairColor) ? $dataUserHairColor : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Eye Color : </span> <?php echo isset($dataUserEyeColor) ? $dataUserEyeColor : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Sexuality : </span> <?php echo isset($dataUserSexuality) ? $dataUserSexuality : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Relationship : </span> <?php echo isset($page_Lang[$dataUserRelationShip][$dataUserPageLanguage]) ? $page_Lang[$dataUserRelationShip][$dataUserPageLanguage] : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Job : </span> <?php echo isset($dataUserJobTitle) ? $dataUserJobTitle : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Job Campany Name : </span> <?php echo isset($dataUserCampanyName) ? $dataUserCampanyName : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">School University : </span> <?php echo isset($dataUserSchoolUniversity) ? $dataUserSchoolUniversity : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Phone Number : </span> <?php echo isset($dataUserPhoneNumber) ? $dataUserPhoneNumber : '-';?> 
         </div>
         <!---->
         <!---->
         <div class="info_box_item">
            <span class="info_span">Email : </span> <?php echo isset($dataUserAccountEmail) ? $dataUserAccountEmail : '-';?> 
         </div>
         <!---->
       </div>
       <div class="withdrawal_note_two">Your Interesteds</div>
       <div class="pro_info_container_second">
          <?php  
               $GetAllUserInterstedItems = $Dot->Dot_GetUserInterestedList($uid); 
               if($GetAllUserInterstedItems){
                    foreach($GetAllUserInterstedItems as $GetUserInterest){ 
                        $UserInterestedTypeValue = $GetUserInterest['interested_type_value']; 
                         
                        echo '<span class="intr js-intr"><span class="intr-txt">'.$page_Lang[$UserInterestedTypeValue][$dataUserPageLanguage].'</span></span>'; 
                    }
                } else {
                echo '<div class="noResultf">'.$page_Lang['no_interested_inserted'][$dataUserPageLanguage].'</div>'; 
                }
             ?>      
       </div>
       </div>

       
    </div>
</div>


</body>
</html>

<?php }else if($thePageType == 'stories'){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> 
<title><?php echo $dataUserFullName;?> || <?php echo $dot_siteName;?></title> 
 <meta charset="UTF-8"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
<link rel="stylesheet" id="style_mode" href="<?php echo $base_url;?>css/style.css">
<style type="text/css">

html, body {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
	-moz-osx-font-smoothing: grayscale;
}
.simpleheader{
  display:inline-block;
  position:absolute;
  width:100%;
  padding-top:200px;
  background-color:#8e24aa;
  top:0px;
  left:0px;
  z-index:-1;
}
.containera {
  width:100%;
  max-width:855px;
  margin:0px auto; 
  z-index:99;
  padding:30px;
}
.logo_informationa {
  width:100%;
  display:inline-block;
  color:#ffffff;
  text-align:center;
  font-size:60px;
  font-weight:500; 
}
.information_container {
  display:inline-block;
  width:100%;
  height:100%; 
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
  padding-top:40px;
}

.profile_image {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-o-border-radius: 50%;
	overflow: hidden;
	border: 2px solid #ffffff;
	margin: 0px auto;
	margin-top: -50px;
	margin-bottom: 50px;
}

.profile_image img {
  width:100%;
}
  
.profile_info_cover {
  position:relative;
  display:inline-block;
  width:100%;
  height:250px;   
  -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   background-position: center;
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
}
.proposed-item-img {
   position: absolute;
   display: block;
   left: 0;
   right: 0;
   top: 0;
   bottom: 0;
   width: 100%;
   height: 100%;
   opacity: 0;
}

.profile_info_cover:after {
  transform: scale(0.95) translateY(36px) translateZ(-30px);
  filter: blur(20px);
  opacity: 0.9;
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background-image: inherit; 
  background-size: cover;
  z-index: -1;
  transition: filter .3s ease;
}
 .withdrawal_note {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  color: #e53935;
  font-weight: 500;
  font-size: 14px;
  margin-bottom:40px;
}
.pro_info_container {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  border-right: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2); 
  color: #0288d1;
  font-weight: 500;
  font-size: 14px;
  display:block;
}
.info_box_item {
  display:inline-block;
  width:100%;
  padding:20px 15px;
  border-bottom:1px solid #eaeaea;
  font-weight:500;
  font-size:14ppx;
}
.info_span {
  float:left;
  font-weight:600;
  font-size:14px;
  color:#424242;
  padding-right:10px;
}
.intr {
	position: relative;
	display: inline-block;
	margin: 5px 7px 5px 0;
	padding: 7px 15px 8px 12px;
	border-radius: 30px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	background: #F1F1F1;
	color: #949494;
	line-height: 1.143;
	transition: background .2s;
	cursor: pointer;
	border: 1px solid #E4E4E4;
}
.eatingicon {
	float: left;
	width: 16px;
	height: 16px;
	background-position: 0px -143px;
	margin-right: 7px;
}
.intr-txt {
	overflow: hidden;
	max-width: 220px;
	margin: 0 0 -4px;
	white-space: nowrap;
	text-overflow: ellipsis;
	font-weight: 400;
	font-size: 14px;
	line-height: 1.143;
	color: #565656;
}
.pro_info_container_second {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	border-right: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	color: #0288d1;
	font-weight: 500;
	font-size: 14px;
	display: block;
	padding: 15px;
}
.withdrawal_note_two {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	padding: 20px;
	color: #e53935;
	font-weight: 500;
	font-size: 14px;
	margin-bottom: 40px;
	margin-top: 40px;
}
.postsContainer {
    width:100%;
	max-width:550px;
	margin:0px auto;
	padding:50px 0px;
}
.images-compare-label {
	position: absolute;
	padding: 5px 10px;
	background-color: #ffffff;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	-ms-border-radius: 3px;
	top: 10px;
	right: 10px;
	font-weight: 400;
	font-size: 13px;
}
</style>
</head>

<body> 

<div class="simpleheader"></div>
<div class="containera">
    <div class="logo_informationa"><?php echo $dot_siteName;?></div>
    <div class="information_container">
       <div class="profile_info_cover" style="background-image: url('<?php echo $dataUserCover;?>');"><img src="<?php echo $dataUserCover;?>" class="proposed-item-img"></div>
       <div class="profile_image"><img src="<?php echo $dataUserAvatar;?>"></div>
       <div class="withdrawal_note">Your <?php echo $thePageType;?> Posts</div>
        <!--Text Posts S-->
         <div class="postsContainer">
<?php 
$getPosts= $Dot->Dot_SotriesPostsAlla($uid);
if($getPosts){
   foreach($getPosts as $storyFromData){
       include("contents/html_stories.php"); 
  }
}else{
   echo 'NO post shown';
}
?>          
         </div>
        <!--Text Posts F-->

       
    </div>
</div>


</body>
</html>
<?php  
}else if($thePageType == 'followers'){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> 
<title><?php echo $dataUserFullName;?> || <?php echo $dot_siteName;?></title> 
 <meta charset="UTF-8"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
<link rel="stylesheet" id="style_mode" href="<?php echo $base_url;?>css/style.css">
<style type="text/css">

html, body {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
	-moz-osx-font-smoothing: grayscale;
}
.simpleheader{
  display:inline-block;
  position:absolute;
  width:100%;
  padding-top:200px;
  background-color:#8e24aa;
  top:0px;
  left:0px;
  z-index:-1;
}
.containera {
  width:100%;
  max-width:855px;
  margin:0px auto; 
  z-index:99;
  padding:30px;
}
.logo_informationa {
  width:100%;
  display:inline-block;
  color:#ffffff;
  text-align:center;
  font-size:60px;
  font-weight:500; 
}
.information_container {
  display:inline-block;
  width:100%;
  height:100%; 
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
  padding-top:40px;
}

.profile_image {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-o-border-radius: 50%;
	overflow: hidden;
	border: 2px solid #ffffff;
	margin: 0px auto;
	margin-top: -50px;
	margin-bottom: 50px;
}

.profile_image img {
  width:100%;
}
  
.profile_info_cover {
  position:relative;
  display:inline-block;
  width:100%;
  height:250px;   
  -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   background-position: center;
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
}
.proposed-item-img {
   position: absolute;
   display: block;
   left: 0;
   right: 0;
   top: 0;
   bottom: 0;
   width: 100%;
   height: 100%;
   opacity: 0;
}

.profile_info_cover:after {
  transform: scale(0.95) translateY(36px) translateZ(-30px);
  filter: blur(20px);
  opacity: 0.9;
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background-image: inherit; 
  background-size: cover;
  z-index: -1;
  transition: filter .3s ease;
}
 .withdrawal_note {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  color: #e53935;
  font-weight: 500;
  font-size: 14px;
  margin-bottom:40px;
}
.pro_info_container {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  border-right: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2); 
  color: #0288d1;
  font-weight: 500;
  font-size: 14px;
  display:block;
}
.info_box_item {
  display:inline-block;
  width:100%;
  padding:20px 15px;
  border-bottom:1px solid #eaeaea;
  font-weight:500;
  font-size:14ppx;
}
.info_span {
  float:left;
  font-weight:600;
  font-size:14px;
  color:#424242;
  padding-right:10px;
}
.intr {
	position: relative;
	display: inline-block;
	margin: 5px 7px 5px 0;
	padding: 7px 15px 8px 12px;
	border-radius: 30px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	background: #F1F1F1;
	color: #949494;
	line-height: 1.143;
	transition: background .2s;
	cursor: pointer;
	border: 1px solid #E4E4E4;
}
.eatingicon {
	float: left;
	width: 16px;
	height: 16px;
	background-position: 0px -143px;
	margin-right: 7px;
}
.intr-txt {
	overflow: hidden;
	max-width: 220px;
	margin: 0 0 -4px;
	white-space: nowrap;
	text-overflow: ellipsis;
	font-weight: 400;
	font-size: 14px;
	line-height: 1.143;
	color: #565656;
}
.pro_info_container_second {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	border-right: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	color: #0288d1;
	font-weight: 500;
	font-size: 14px;
	display: block;
	padding: 15px;
}
.withdrawal_note_two {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	padding: 20px;
	color: #e53935;
	font-weight: 500;
	font-size: 14px;
	margin-bottom: 40px;
	margin-top: 40px;
}
.postsContainer {
    width:100%;
	max-width:550px;
	margin:0px auto;
	padding:50px 0px;
}
.images-compare-label {
	position: absolute;
	padding: 5px 10px;
	background-color: #ffffff;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	-ms-border-radius: 3px;
	top: 10px;
	right: 10px;
	font-weight: 400;
	font-size: 13px;
}
.c .profile-style {
	width: 20%;
	float: left;
	box-shadow: 0 0 0 1px #dedede;
	padding: 15px;
	text-align: center;
}
.postsContainerUser {
	width: 100%;  
	padding-bottom:50px;
	display: inline-block;
}
.postsContainerUser .profile-style {
    text-align: center; 
	padding-top:10px;
	padding-bottom:10px;
}
.postsContainerUser .profile-style .avatar {
	width:100%;
	max-width: 150px; 
	margin:0px auto; 
	padding-bottom:10px; 
} 
.postsContainerUser .profile-style .avatar img {
	border-radius: 50%;
	width: 100%; 
	object-fit: cover;
}
.postsContainerUser .profile-style > span > a {
	color: #292929;
	text-decoration: none;
	font-size: 15px;
    font-weight: 400; 
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	display:block;
}
.postsContainerUser .profile-style { 
   width:100%;
   width:calc(100% / 4 - 0px);
   width:-webkit-calc(100% / 4 - 0px);
   width:-o-calc(100% / 4 - 0px);
   width:-ms-calc(100% / 4 - 0px);
   float:left;
}
.postsContainerUser .profile-style:hover {
   background-color:#f5f5f5;
} 
</style>
</head>

<body> 

<div class="simpleheader"></div>
<div class="containera">
    <div class="logo_informationa"><?php echo $dot_siteName;?></div>
    <div class="information_container">
       <div class="profile_info_cover" style="background-image: url('<?php echo $dataUserCover;?>');"><img src="<?php echo $dataUserCover;?>" class="proposed-item-img"></div>
       <div class="profile_image"><img src="<?php echo $dataUserAvatar;?>"></div>
       <div class="withdrawal_note">Your <?php echo $thePageType;?> Users</div>
        <!--Text Posts S-->
         <span class="postsContainerUser">
<?php 
$getPosts= $Dot->Dot_AllUserFollowersPage($uid);
if($getPosts){
   foreach($getPosts as $FriendsFromData){
	   $friendID = $FriendsFromData['user_one'];
	   $FriendDataID = $FriendsFromData['friend_id'];
	   $CardDataUserID = $FriendsFromData['user_id']; 
	   $CardDataUserFullName = $Dot->Dot_UserFullName($friendID);
	   $CardDataUsername = $Dot->Dot_GetUserName($friendID);
	   $CardDataUserAvatar = $Dot->Dot_UserAvatar($friendID, $base_url);
	   $CardDataUserCover = $Dot->Dot_UserCover($friendID, $base_url); 
	   $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$friendID);
	   $CalculateTheUserPost = $Dot->Dot_UserPostCount($friendID);
	   $CalculateTheFriends = $Dot->Dot_UserFriendsCount($friendID);
	   $CalculateTheFollowers = $Dot->Dot_UserFollowersCount($friendID); 
	   ?>
<div class="profile-style" data-id="<?php echo $friendID;?>"> 
        <span class="avatar">
           <a href="<?php echo $base_url.'profile/'.$CardDataUsername;?>"><div class="profile_avatar_image_container" style="background-image: url('<?php echo $CardDataUserAvatar;?>'); "></div> </a>
        </span> 
    <span><a href="<?php echo $base_url.'profile/'.$CardDataUsername;?>"><?php echo $CardDataUserFullName;?></a></span>
</div>       
  <?php }
}else{
   echo 'NO post shown';
}
?>          
         </span>
        <!--Text Posts F-->

       
    </div>
</div>


</body>
</html>
<?php
}else if($thePageType == 'following'){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> 
<title><?php echo $dataUserFullName;?> || <?php echo $dot_siteName;?></title> 
 <meta charset="UTF-8"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
<link rel="stylesheet" id="style_mode" href="<?php echo $base_url;?>css/style.css">
<style type="text/css">

html, body {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
	-moz-osx-font-smoothing: grayscale;
}
.simpleheader{
  display:inline-block;
  position:absolute;
  width:100%;
  padding-top:200px;
  background-color:#8e24aa;
  top:0px;
  left:0px;
  z-index:-1;
}
.containera {
  width:100%;
  max-width:855px;
  margin:0px auto; 
  z-index:99;
  padding:30px;
}
.logo_informationa {
  width:100%;
  display:inline-block;
  color:#ffffff;
  text-align:center;
  font-size:60px;
  font-weight:500; 
}
.information_container {
  display:inline-block;
  width:100%;
  height:100%; 
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
  padding-top:40px;
}

.profile_image {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	-webkit-border-radius: 50%;
	-o-border-radius: 50%;
	overflow: hidden;
	border: 2px solid #ffffff;
	margin: 0px auto;
	margin-top: -50px;
	margin-bottom: 50px;
}

.profile_image img {
  width:100%;
}
  
.profile_info_cover {
  position:relative;
  display:inline-block;
  width:100%;
  height:250px;   
  -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   background-position: center;
  border-radius:5px;
  -webkit-border-radius:5px;
  -o-border-radius:5px;
}
.proposed-item-img {
   position: absolute;
   display: block;
   left: 0;
   right: 0;
   top: 0;
   bottom: 0;
   width: 100%;
   height: 100%;
   opacity: 0;
}

.profile_info_cover:after {
  transform: scale(0.95) translateY(36px) translateZ(-30px);
  filter: blur(20px);
  opacity: 0.9;
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background-image: inherit; 
  background-size: cover;
  z-index: -1;
  transition: filter .3s ease;
}
 .withdrawal_note {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  color: #e53935;
  font-weight: 500;
  font-size: 14px;
  margin-bottom:40px;
}
.pro_info_container {
  width: 100%;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-left: 3px solid #e53935;
  border-right: 3px solid #e53935;
  background-color: #ffffff;
  -webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14),
    0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2); 
  color: #0288d1;
  font-weight: 500;
  font-size: 14px;
  display:block;
}
.info_box_item {
  display:inline-block;
  width:100%;
  padding:20px 15px;
  border-bottom:1px solid #eaeaea;
  font-weight:500;
  font-size:14ppx;
}
.info_span {
  float:left;
  font-weight:600;
  font-size:14px;
  color:#424242;
  padding-right:10px;
}
.intr {
	position: relative;
	display: inline-block;
	margin: 5px 7px 5px 0;
	padding: 7px 15px 8px 12px;
	border-radius: 30px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	background: #F1F1F1;
	color: #949494;
	line-height: 1.143;
	transition: background .2s;
	cursor: pointer;
	border: 1px solid #E4E4E4;
}
.eatingicon {
	float: left;
	width: 16px;
	height: 16px;
	background-position: 0px -143px;
	margin-right: 7px;
}
.intr-txt {
	overflow: hidden;
	max-width: 220px;
	margin: 0 0 -4px;
	white-space: nowrap;
	text-overflow: ellipsis;
	font-weight: 400;
	font-size: 14px;
	line-height: 1.143;
	color: #565656;
}
.pro_info_container_second {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	border-right: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	color: #0288d1;
	font-weight: 500;
	font-size: 14px;
	display: block;
	padding: 15px;
}
.withdrawal_note_two {
	width: 100%;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	border-left: 3px solid #e53935;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 0px 22px 0 rgba(0, 0, 0, 0.14), 0 0px 10px -20px rgba(0, 0, 0, 0.12), 0 0px 0px 0 rgba(0, 0, 0, 0.2);
	padding: 20px;
	color: #e53935;
	font-weight: 500;
	font-size: 14px;
	margin-bottom: 40px;
	margin-top: 40px;
}
.postsContainer {
    width:100%;
	max-width:550px;
	margin:0px auto;
	padding:50px 0px;
}
.images-compare-label {
	position: absolute;
	padding: 5px 10px;
	background-color: #ffffff;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-o-border-radius: 3px;
	-ms-border-radius: 3px;
	top: 10px;
	right: 10px;
	font-weight: 400;
	font-size: 13px;
}
.c .profile-style {
	width: 20%;
	float: left;
	box-shadow: 0 0 0 1px #dedede;
	padding: 15px;
	text-align: center;
}
.postsContainerUser {
	width: 100%;  
	padding-bottom:50px;
	display: inline-block;
}
.postsContainerUser .profile-style {
    text-align: center; 
	padding-top:10px;
	padding-bottom:10px;
}
.postsContainerUser .profile-style .avatar {
	width:100%;
	max-width: 150px; 
	margin:0px auto; 
	padding-bottom:10px; 
} 
.postsContainerUser .profile-style .avatar img {
	border-radius: 50%;
	width: 100%; 
	object-fit: cover;
}
.postsContainerUser .profile-style > span > a {
	color: #292929;
	text-decoration: none;
	font-size: 15px;
    font-weight: 400; 
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	display:block;
}
.postsContainerUser .profile-style { 
   width:100%;
   width:calc(100% / 4 - 0px);
   width:-webkit-calc(100% / 4 - 0px);
   width:-o-calc(100% / 4 - 0px);
   width:-ms-calc(100% / 4 - 0px);
   float:left;
}
.postsContainerUser .profile-style:hover {
   background-color:#f5f5f5;
} 
</style>
</head>

<body> 

<div class="simpleheader"></div>
<div class="containera">
    <div class="logo_informationa"><?php echo $dot_siteName;?></div>
    <div class="information_container">
       <div class="profile_info_cover" style="background-image: url('<?php echo $dataUserCover;?>');"><img src="<?php echo $dataUserCover;?>" class="proposed-item-img"></div>
       <div class="profile_image"><img src="<?php echo $dataUserAvatar;?>"></div>
       <div class="withdrawal_note">Your <?php echo $thePageType;?> Users</div>
        <!--Text Posts S-->
         <span class="postsContainerUser">
<?php 
$getPosts= $Dot->Dot_AllUserFriendsPage($uid);
if($getPosts){
   foreach($getPosts as $FriendsFromData){
	   $friendID = $FriendsFromData['user_two'];
	   $FriendDataID = $FriendsFromData['friend_id'];
	   $CardDataUserID = $FriendsFromData['user_id']; 
	   $CardDataUserFullName = $Dot->Dot_UserFullName($friendID);
	   $CardDataUsername = $Dot->Dot_GetUserName($friendID);
	   $CardDataUserAvatar = $Dot->Dot_UserAvatar($friendID, $base_url);
	   $CardDataUserCover = $Dot->Dot_UserCover($friendID, $base_url); 
	   $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$friendID);
	   $CalculateTheUserPost = $Dot->Dot_UserPostCount($friendID);
	   $CalculateTheFriends = $Dot->Dot_UserFriendsCount($friendID);
	   $CalculateTheFollowers = $Dot->Dot_UserFollowersCount($friendID); 
	   ?>
<div class="profile-style" data-id="<?php echo $friendID;?>"> 
        <span class="avatar">
           <a href="<?php echo $base_url.'profile/'.$CardDataUsername;?>"><div class="profile_avatar_image_container" style="background-image: url('<?php echo $CardDataUserAvatar;?>'); "></div> </a>
        </span> 
    <span><a href="<?php echo $base_url.'profile/'.$CardDataUsername;?>"><?php echo $CardDataUserFullName;?></a></span>
</div>       
  <?php }
}else{
   echo 'NO post shown';
}
?>          
         </span>
        <!--Text Posts F-->

       
    </div>
</div>


</body>
</html>
<?php  } else {
     header('Location: index.php'); 
}
//$nameis = uniqid();
file_put_contents('sources/'.$dataUsername.'.html', ob_get_clean());

$thefile = 'sources/'.$dataUsername.'.html';
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($thefile));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: '.filesize($thefile));
ob_clean();
flush();
readfile($thefile);
unlink($thefile); 
exit;
?>