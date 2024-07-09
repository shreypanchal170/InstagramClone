<?php 
if(file_exists('install/install.lock')) { 
    header('Location: ./install/index.php'); 
    exit;
}
include_once 'functions/control.php'; 
include_once 'functions/user.php';  
$DotOut = new DOT_USER($db); 
$page_Lang =  $DotOut->Dot_Languages();
$siteConfigurations = $DotOut->Dot_Configurations();
$siteTitle = $siteConfigurations['script_title'];
$siteLogo = $siteConfigurations['script_logo'];
$siteName = $siteConfigurations['script_name'];
$maintenance = $siteConfigurations['maintenance_mode'];
$wellcomeTheme = $siteConfigurations['wellcome_theme'];
$DefaultLang = $siteConfigurations['default_lang']; 
$userSelectLang = $siteConfigurations['enable_disable_user_choose_lang'];
$canRegister = $siteConfigurations['enable_disable_register'];
if(isset($_GET['lang'])){ 
   $DefaultLang = mysqli_real_escape_string($db, $_GET['lang']);
}
 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title><?php echo $siteTitle;?></title>
  <link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon"> 
<link href="https://fonts.googleapis.com/css?family=Abel|Metrophobic|Nixie+One|Nobile:400,400i,500,500i|Poiret+One|Quicksand:400,500|Rajdhani:300,400,500,600,700|Zilla+Slab:300,300i,400,400i,500,700&amp;subset=cyrillic,devanagari,latin-ext,vietnamese" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/wellcome.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/materialize.css">
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/materialize.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/<?php echo $wellcomeTheme;?>.js"></script> 
<script type="text/javascript">
 var siteurl = '<?php echo $base_url;?>';  
</script> 
</head>

<body>
 
 <div class="container-info animated-fadeInDown">
    <?php  if($userSelectLang == '0'){?><div class="change_language" id="languages"><div class="lang_icon"></div><?php echo $page_Lang['languages'][$DefaultLang];?></div><?php }?>
    <div class="info-main">
      <div class="info__headshot"><img class="info__headshot-img" src="<?php echo $base_url.'uploads/logo/'.$siteLogo;?>"></div>
      <div class="info__tag"><?php echo $page_Lang['wellcome_to'][$DefaultLang].' '.$siteName;?></div> 
      <?php if($canRegister == '0'){?>
      <div class="left_register_btn" id="call_register"><?php echo $page_Lang['register'][$DefaultLang];?> <div class="next_"></div></div>
      <?php } ?>
   </div>
 </div>
 <div class="container-main animated-fadeInUp">
 
 <!---->
 <div class="global-wrapper-right">
        <div class="note after_note"><?php echo $page_Lang['sign_in_to_impress_people'][$DefaultLang];?></div>
        <div class="lg-rg-wrapper">
        <form class="login-form" enctype="multipart/form-data" method="post" id='loginform'>
            <div class="inputBox"><input type="text" name="login_username" id="username" class="i_nfrm b_u" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>"><div class="icon_input icon_user"></div></div>
            <div class="inputBox">
              <input type="password" name="login_password" class="i_nfrm b_p" id="password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password"><div class="icon_input icon_password"></div>
              <div class="_rpioj_f"><a href="<?php echo $base_url;?>forgot-password" class="_m6qul"><?php echo $page_Lang['forgot_password'][$DefaultLang];?></a></div>
              <div class="alert_box_wrapper" style="display:none;"><?php echo $page_Lang['username_email_or_password_incorrect'][$DefaultLang];?><strong class="rcln" style="cursor:pointer; text-decoration:underline;"><?php echo $page_Lang['do_you_want_to_register'][$DefaultLang];?></strong></div>
            </div>
            <div class="inputBox"><button type="submit" name="submit" class="submit_btn snd" id='login_submit'><?php echo $page_Lang['login'][$DefaultLang];?></button></div> 
        </form>
        </div>
    </div>
 <!---->
 <!---->
<div class="global-wrapper-list flex"> 
<div class="feature_block">
    <div class="feature_block_box heart_color">
       <div class="feature_icon heart_icon"></div>
       <div class="feature_title"><?php echo $page_Lang['like_posts'][$DefaultLang];?></div>
       <div class="feature_description">
            <?php echo $page_Lang['like_posts_description'][$DefaultLang];?>
       </div>
     </div>
</div>
<div class="feature_block"> 
    <div class="feature_block_box follow_color">
       <div class="feature_icon follow_icon"></div>
       <div class="feature_title"><?php echo $page_Lang['follow_users'][$DefaultLang];?></div>
       <div class="feature_description">
           <?php echo $page_Lang['follow_users_description'][$DefaultLang];?>
       </div>
     </div>
</div>
<div class="feature_block"> 
    <div class="feature_block_box story_color">
       <div class="feature_icon story_icon"></div>
       <div class="feature_title"><?php echo $page_Lang['share_story'][$DefaultLang];?></div>
       <div class="feature_description">
            <?php echo $page_Lang['share_story_description'][$DefaultLang];?>
       </div>
     </div>
</div>
</div> 
 <!---->
 <!---->
<div class="global-wrapper-right"> 
         <div class="post_features_item">
           <div class="post-icon text-icon icon-open"><span class="icon-label"><?php echo $page_Lang['text'][$DefaultLang];?></span></div>
           <div class="post-icon new-img-icon icon-open"><span class="icon-label"><?php echo $page_Lang['image'][$DefaultLang];?></span></div>
           <div class="post-icon new-link-icon icon-open"><span class="icon-label"><?php echo $page_Lang['link'][$DefaultLang];?></span></div>
           <div class="post-icon new-music-icon icon-open"><span class="icon-label"><?php echo $page_Lang['audio'][$DefaultLang];?></span></div>
           <div class="post-icon new-video-icon icon-open"><span class="icon-label"><?php echo $page_Lang['video'][$DefaultLang];?></span></div> 
         </div> 
    </div>
 <!----> 
 <!--Footer STARTED-->
     <div class="footer_wellcome">
           <ul class="u4mil">
              <li class="n3ufer"><a href="<?php echo $base_url;?>about-us">About Us</a></li> 
              <li class="n3ufer"><a href="<?php echo $base_url;?>privacy-policies">Privacy Policies</a></li>   
            </ul>
     </div>
 <!--Footer FINISHED-->
 </div>
 <!---->
 <?php if($canRegister == '0'){?>
<!--Register popup wrapper STARTED-->
<div class="popUp__Wrapper">
    <div class="modal-Wrap">
       <div class="modal-middle" id="formRegister">
               
              <div class="close_register"></div>
             <div class="note"><?php echo $page_Lang['what_inside'][$DefaultLang];?></div>
             <form class="register-form" method="POST" id='registerform'>
             <div class="global-wrapper-reg">
                 <div class="global-input-wrapp"><input type="text" name="reusername" id="register_username" class="i_nfrm numeric b_u" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" /><div class="icon_input_register icon_user_register"></div></div>
                 <div class="global-input-wrapp e_u_w" style="display:none"><div class="alreadyexist_in"><?php echo $page_Lang['username_already_in_use'][$DefaultLang];?></div></div>
                 <div class="global-input-wrapp e_u_w_n" style="display:none"><div class="alreadyexist_in"><?php echo $page_Lang['only_english_character'][$DefaultLang];?></div></div>
                 <div class="global-input-wrapp"><input type="text" name="fullname" id="reg_fullname" class="i_nfrm fullname" placeholder="<?php echo $page_Lang['full_name'][$DefaultLang];?>" /><div class="icon_input_fullname icon_user_fullname"></div></div>
                 <div class="global-input-wrapp"><input type="text" class="i_nfrm icon_email" name="regemail" id="reg_email" placeholder="<?php echo $page_Lang['email'][$DefaultLang];?>" /><div class="icon_input_email icon_user_email"></div></div>
                 <div class="global-input-wrapp e_e_w" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['email_already_in_use'][$DefaultLang];?></div></div> 
                 <div class="global-input-wrapp e_e_w_we" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['not_a_valid_email_addresss'][$DefaultLang];?></div></div>
                 <div class="global-input-wrapp"><input type="password" name="password" class="i_nfrm u_password" id="reg_password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password"/><div class="icon_input_password icon_user_password"></div></div>
                 <div class="global-input-wrapp e_e_w_p" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['password_must_be_at_x_chhracter'][$DefaultLang];?></div></div>
                 <div class="global-input-wrapp brth"><?php echo $page_Lang['main_birth_day'][$DefaultLang];?></div>
                 <div class="global-input-wrapp days" id="bdy">
                 <select class="fn" name="birth_day" id="subscription_day">
                      <option value=""><?php echo $page_Lang['day'][$DefaultLang];?></option>
                        <?php
                           $strDay='';
                           for ($i=1; $i<=31; $i++) {
                              $strDay=(string)$i;
                              if($i<10) $strDay='0'.$strDay;
                       ?> 
                       <option value="<?php echo $i; ?>">
                           <?php echo $strDay; ?>
                       </option>
                       <?php } ?>
                    </select>
              <select class="fn" name="birth_month" id="subscription_month">
                        <option value=""><?php echo $page_Lang['month'][$DefaultLang];?></option>
                        <?php
                            $months = array(1 => $page_Lang['jan'][$DefaultLang], 2 => $page_Lang['feb'][$DefaultLang], 3 => $page_Lang['mar'][$DefaultLang], 4 => $page_Lang['apr'][$DefaultLang], 5 => $page_Lang['may'][$DefaultLang], 6 => $page_Lang['jun'][$DefaultLang], 7 => $page_Lang['jul'][$DefaultLang], 8 => $page_Lang['aug'][$DefaultLang], 9 => $page_Lang['sep'][$DefaultLang], 10 =>$page_Lang['oct'][$DefaultLang], 11 => $page_Lang['nov'][$DefaultLang], 12 => $page_Lang['dec'][$DefaultLang]);
							$transposed = array_slice($months, date('n'), 12, true) + array_slice($months, 0, date('n'), true);
							$last8 = array_reverse(array_slice($transposed, -8, 12, true), true); 
                          foreach ($months as $num => $name) {
                        ?> <option value="<?php echo $num; ?>">
                        <?php echo $name; ?>
                        </option>
                        <?php } ?>
                     </select>
                   <select class="fn" name="birth_year" id="subscription_year">
                       <option value=""><?php echo $page_Lang['year'][$DefaultLang];?></option>
                       <?php  for ($i=1950; $i<date('Y'); $i++) { ?>
                       <option value="<?php echo $i; ?>">
                       <?php echo $i; ?>
                        </option>
                       <?php } ?>
                    </select>
                 </div>
                 <div class="global-input-wrapp">
                    <div class="i_bg">
                        <input class="with-gap" name="gender" type="radio" id="man" value="male" />
                        <label for="man"><?php echo $page_Lang['male'][$DefaultLang];?></label>
                     </div>
                     <div class="i_bg">
                        <input class="with-gap" name="gender" type="radio" id="female" value="female" />
                        <label for="female"><?php echo $page_Lang['female'][$DefaultLang];?></label>
                     </div> 
                 </div>
                 <div class="global-input-wrapp e_e_w_g" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['please_select_yoour_gender'][$DefaultLang];?></div></div> 
                 <div class="global-input-wrapp" id="registiration"> 
                    <div class="inputBox"><button id="register"class="submit_btn snd" type="submit"><?php echo $page_Lang['register'][$DefaultLang];?></button></div> 
                 </div>
                  <div class="global-input-wrapp">
                     <div class="_rpioj"><?php echo $page_Lang['auto_agree'][$DefaultLang];?></div>
                 </div>
             </div>
             </form>
       </div>
    </div>
</div>
<!--Register popup wrapper FINISHED-->
<?php }?>
 <!---->
 <?php  if($userSelectLang == '0'){?>
 <!--Language List STARTED-->
 <div class="languagePopUpContainer">
    <div class="language_modal_wrap">
         <div class="register-modal-middle">
              <div class="close_languages"></div>
              <div class="note"><?php echo $page_Lang['languages'][$DefaultLang];?></div>
              <div class="global-wrapper-box">
                 <?php 
						 $langs = $DotOut->Dot_Lngs();
						 if($langs){
							  foreach($langs as $column){
								  $lang_name = $column['Field'];
								  $flag = array(
								   $lang_name => $base_url.'uploads/flags/'.$lang_name.'.png'
								   );
								   echo '
								   <div class="lang_name_box waves-effect waves-teal" data-lang="'.$lang_name.'"> 
									   <div class="langName">'.$lang_name.'</div>
								   </div>';
							  }
						 } 
				   ?>
              </div>
         </div>
    </div>
 </div>
 <!--Language List FINISHED--> 
 <?php } if($maintenance == '1'){?>
 <!--Maintenance Mode STARTED-->
 <div class="maintenance_note_container fadeInMaintenance">
     <div class="close_maintenance"></div>
     <div class="maintenance_header"><img src="<?php echo $base_url.'css/img/maintenance-panel.gif';?>" /></div>
     <div class="maintenance_note">
         <div class="maintenance_title"><?php echo $page_Lang['maintenance_text'][$DefaultLang];?></div>
         <div class="maintenance_info">
             <?php echo $page_Lang['maintenance_note'][$DefaultLang];?> 
         </div>
     </div>
 </div>
 <!--Maintenance Mode FINISHED-->
<?php } ?>

</body>
</html>