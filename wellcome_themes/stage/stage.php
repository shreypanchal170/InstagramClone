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
$yourIp = $DotOut->get_ip_address();  
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
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title><?php echo $siteTitle;?></title>
  <link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon"> 
<link rel="stylesheet" href="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/wellcome.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/materialize.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/animate.css"> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/materialize.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/XSwitch.min.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/<?php echo $wellcomeTheme;?>.js"></script> 
<script type="text/javascript">
 var siteurl = '<?php echo $base_url;?>';    
</script> 
</head>

<body>
<?php if($canRegister == '0'){?>
<!--Register AREA STARTED-->
<div class="ui_peepr_glass"></div>
<div class="drawer">
  <div class="help-form">
    <div class="close_register"></div>
    <div class="form-container">
      <div class="form-header with-border">
        <div class="site_logo_name font_relavent"><?php echo $siteName;?></div>
        <div class="note_form">
          <?php echo $page_Lang['what_inside'][$DefaultLang];?>
        </div>
      </div>
      <div class="reigster_form_container_in_drawer">
         <div class="alreadyexist e_u_wip" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['ip_restrictions'][$DefaultLang];?></div></div>
        <form class="register-form" method="POST" id='registerform'>
          <div class="global-wrapper-reg">
            <div class="global-input-wrapp" id="register__form"><input type="text" name="reusername" id="register_username" class="i_nfrm numeric b_u" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" />
              <div class="icon_input_register icon_user_register"></div>
            </div>
            <div class="alreadyexist e_u_w" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['username_already_in_use'][$DefaultLang];?></div></div>
            <div class="alreadyexist e_u_w_n" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['only_english_character'][$DefaultLang];?></div></div>
            <div class="global-input-wrapp"><input type="text" name="fullname" id="reg_fullname" class="i_nfrm fullname" placeholder="<?php echo $page_Lang['full_name'][$DefaultLang];?>" />
              <div class="icon_input_fullname icon_user_fullname"></div>
            </div>
            <div class="global-input-wrapp" id="register__email"><input type="text" class="i_nfrm icon_email" name="regemail" id="reg_email" placeholder="<?php echo $page_Lang['email'][$DefaultLang];?>" />
              <div class="icon_input_email icon_user_email"></div>
            </div>
            <div class="alreadyexist e_e_w" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['email_already_in_use'][$DefaultLang];?></div></div> 
            <div class="alreadyexist e_e_w_we" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['not_a_valid_email_addresss'][$DefaultLang];?></div></div> 
            <div class="global-input-wrapp"><input type="password" name="password" class="i_nfrm u_password" id="reg_password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password" />
              <div class="icon_input_password icon_user_password"></div>
            </div>
            <div class="alreadyexist e_e_w_p" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['password_must_be_at_x_chhracter'][$DefaultLang];?></div></div> 
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
            <div class="global-input-wrapp" id="gender">
              <div class="i_bg">
                <input type="radio" class="with-gap" name="gender" id="man" value="male">
                <label for="man"><?php echo $page_Lang['male'][$DefaultLang];?></label>
              </div>
              <div class="i_bg">
                <input type="radio" class="with-gap" name="gender" id="female" value="female">
                <label for="female"><?php echo $page_Lang['female'][$DefaultLang];?></label>
              </div>
            </div>
            <div class="alreadyexist e_e_w_g" style="display:none;"><div class="alreadyexist_in"><?php echo $page_Lang['please_select_yoour_gender'][$DefaultLang];?></div></div> 
            <div class="global-input-wrapp" id="registiration">
              <div class="inputBox"><button id="register" class="submit_btn snd" type="submit"><?php echo $page_Lang['register'][$DefaultLang];?></button></div>
            </div>
            <div class="global-input-wrapp">
              <div class="_rpioj">
                <?php echo $page_Lang['auto_agree'][$DefaultLang];?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Register AREA FINISHED-->
<?php }?> 
<?php if($canRegister == '0'){?>
<div class="left_register_btn column_right_header_button" id="signin"><span id="txt"><?php echo $page_Lang['register'][$DefaultLang];?></span> </div>
<?php }?>
<?php  if($userSelectLang == '0'){?>
<div class="change_language" id="languages">
  <div class="lang_icon"></div>
  <?php echo $page_Lang['languages'][$DefaultLang];?>
</div>
<?php } ?>
<div id="container" data-XSwitch>
  <div class="selections" style="position:relative">
    <div class="selection colorize" id="selection0" style="background-image:url(<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/img/bg.jpg);">
      <div class="login_form_controller box">
        <div class="website_name font_relavent">
          <?php echo $siteName;?>
        </div>
        <div class="website_title font_relavent"><?php echo $page_Lang['slogan'][$DefaultLang];?></div>
        <div class="login_form_container">
          <form class="login-form" enctype="multipart/form-data" method="post" id='loginform'>
            <div class="input_box"><input type="text" class="wellcome_input first" name="login_username" id="username" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" />
              <div class="icon_input icon_user"></div>
            </div>
            <div class="input_box"><input type="password" class="wellcome_input last" name="login_password" id="password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" />
              <div class="icon_input icon_password"></div>
              <div class="_rpioj_f wrng">
                <a href="<?php echo $base_url;?>forgot-password" class="_m6qul">
                  <?php echo $page_Lang['forgot_password'][$DefaultLang];?>
                </a>
              </div>  
              <div class="alert_box_wrapper" style="display:none;"><?php echo $page_Lang['username_email_or_password_incorrect'][$DefaultLang];?><strong class="rcln" style="cursor:pointer; text-decoration:underline;"><?php echo $page_Lang['do_you_want_to_register'][$DefaultLang];?></strong></div>
            </div>
            <div class="button_box"><button type="submit" name="submit" class="submit_btn snd" id='login_submit'><?php echo $page_Lang['login'][$DefaultLang];?></button></div>
          </form>
        </div>
      </div>
    </div>
    <div class="selection" id="selection1">
      <div class="item_middle box">
       <?php
       $LatestUsers = $DotOut->Dot_LatestRegisteredUsers(10);
	  if($LatestUsers){
		 foreach($LatestUsers as $dataLatests){
		   $l_uid = $dataLatests['user_id'];
		   $l_Avatar = $DotOut->Dot_UserAvatar($l_uid, $base_url); 
			 echo '<div class="userLatest" style="background-image: url('.$l_Avatar.');"><img src="'.$l_Avatar.'" class="proposed-item-img"></div>'; 
		 }
	  }
	 ?> 
         
        
        <div class="website_name font_relavent">
          <?php echo $siteName;?>
        </div>
        <div class="section_text"><?php echo $page_Lang['what_is_script'][$DefaultLang];?></div>
        <div class="section_info"><?php echo $page_Lang['script_is'][$DefaultLang];?></div>
      </div>
    </div>
    <div class="selection" id="selection2">
      <div class="item_middle_two box">
        <div class="item_box i_left">
          <div class="st_name"><?php echo $page_Lang['out_stories'][$DefaultLang];?></div>
          <div class="storiesbox">
            <div class="stori_post">
              <div class="st" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
            </div>
            <div class="stori_post">
              <div class="st" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
            </div>
            <div class="stori_post">
              <div class="st" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
            </div>
            <div class="stori_post">
              <div class="st" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
            </div>
            <div class="stori_post">
              <div class="st" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
            </div>
            <div class="stori_post">
              <div class="st" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
            </div>
          </div>
          <div class="ex_post">
            <!---->
            <div class="ex_post_header">
              <div class="ex_post_avatar">
                <div class="avatar" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
              </div>
              <div class="ex_post_owner">Mustafa Öztürk</div>
              <div class="ex_post_dots">
                <div class="post_menu_icn iconPostMenu icons_two"></div>
              </div>
            </div>
            <!---->
            <!---->
            <div class="post_image"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/img/post-2.png" /></div>
            <div class="post_buttons">
              <span class="fr66n like_p">
                        <div class="coreSpriteHeartOpen dCJp8">
                          <span class="Szr5J icons_two glyphsSpriteHeart__outline_ok__24__grey_9"></span>
            </div>
            </span>
            <span class="fr66n eo2As">
                      <div class="dCJp8">
                        <span class="glyphsSpriteComment__outline__24__grey_9 Szr5J icons_two"></span>
          </div>
          </span>
          <span class="fr77n fav_p">
                      <div class="dCJp8">
                        <span class="Szr5J icons_two glyphsSpriteFavourite_outline_added"></span>
        </div>
        </span>
      </div>
      <!---->

    </div>
    <div class="ex_post_two">
      <!---->
      <div class="ex_post_header">
        <div class="ex_post_avatar">
          <div class="avatar" style="background-image:url(<?php echo $base_url;?>uploads/stories/default.jpg);"><img src="<?php echo $base_url;?>uploads/stories/default.jpg" class="proposed-item-img"></div>
        </div>
        <div class="ex_post_owner">Aziz Şahin Bayır</div>
        <div class="ex_post_dots">
          <div class="post_menu_icn iconPostMenu icons_two"></div>
        </div>
      </div>
      <!---->
      <!---->
      <div class="post_image"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/img/post-1.png" /></div>
      <div class="post_buttons">
        <span class="fr66n like_p">
                        <div class="coreSpriteHeartOpen dCJp8">
                          <span class="Szr5J icons_two glyphsSpriteHeart__outline_ok__24__grey_9"></span>
      </div>
      </span>
      <span class="fr66n eo2As">
                      <div class="dCJp8">
                        <span class="glyphsSpriteComment__outline__24__grey_9 Szr5J icons_two"></span>
    </div>
    </span>
    <span class="fr77n fav_p">
                      <div class="dCJp8">
                        <span class="Szr5J icons_two glyphsSpriteFavourite_outline_added"></span>
  </div>
  </span>
</div>
<!---->
</div>
</div>
<div class="item_box right_padding">
  <div class="dashboard-content">
    <h1 class="section-title"><?php echo $page_Lang['know_how_it_works'][$DefaultLang];?>.</h1>
    <p><?php echo $page_Lang['script_working_info'][$DefaultLang];?></p>
  </div>
</div>
</div>
</div>
<div class="selection" id="selection3">
  <div class="item_middle_tree box">
    <div class="post-icon text-icon"><span class="icon-label">Text</span></div>
    <div class="post-icon new-img-icon"><span class="icon-label">Image</span></div>
    <div class="post-icon new-link-icon"><span class="icon-label">Link</span></div>
    <div class="post-icon new-music-icon"><span class="icon-label">Audio</span></div>
    <div class="post-icon new-video-icon"><span class="icon-label">Video</span></div>
    <div class="post-icon new-location-icon"><span class="icon-label">Filter</span></div>
    <div class="section-content-bt">
      <h1 class="section-title-bt"><?php echo $page_Lang['share_anything_you_want'][$DefaultLang];?></h1>
      <p><?php echo $page_Lang['share_six_post'][$DefaultLang];?></p>
    </div>
  </div>
</div>
<div class="selection colorize" id="selection4" style="background-image:url(<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/img/bg_two.png);">
  <div class="login_form_controller box">
    <div class="last_text"><?php echo $page_Lang['info_done'][$DefaultLang];?></div>
    <div class="website_title font_relavent"><?php echo $page_Lang['com_on_in'][$DefaultLang];?></div>
    <?php if($canRegister == '0'){?>
    <div class="comToRegister column_right_header_button"><?php echo $page_Lang['register'][$DefaultLang];?></div>
    <?php }?>
  </div>
</div>
</div>
</div>
<?php  if($userSelectLang == '0'){?>
<!--Language List STARTED-->
<div class="languagePopUpContainer">
  <div class="language_modal_wrap">
    <div class="register-modal-middle">
      <div class="close_languages"></div>
      <div class="note">
        <?php echo $page_Lang['languages'][$DefaultLang];?>
      </div>
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
<?php }?>
</body>
</html>