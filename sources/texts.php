<?php 
header('Content-Type: text/html; charset=ISO-8859-15');
include_once("../functions/inc.php");    
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
</style>
</head>

<body> 

<div class="simpleheader"></div>
<div class="containera">
    <div class="logo_informationa"><?php echo $dot_siteName;?></div>
    <div class="information_container">
       <div class="profile_info_cover" style="background-image: url('<?php echo $dataUserCover;?>');"><img src="<?php echo $dataUserCover;?>" class="proposed-item-img"></div>
       <div class="profile_image"><img src="<?php echo $dataUserAvatar;?>"></div>
       <div class="withdrawal_note">Your Text Posts</div>
        <!--Text Posts S-->
         <div class="postsContainer">
<?php 
$getPosts= $Dot->Dot_GetTextPostsForPage($uid);
if($getPosts){
   foreach($getPosts as $PostFromData){
       include("../contents/postlist.php"); 
  }
}
?>          
         </div>
        <!--Text Posts F-->

       
    </div>
</div>


</body>
</html>
