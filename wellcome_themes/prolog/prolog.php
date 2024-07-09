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
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Varela+Round" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/style.css">
  <link rel="stylesheet" href="<?php echo $base_url;?>css/animate.css">
  <link rel="stylesheet" href="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/aos.css">
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>  
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script>  
  <script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/aos.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/passhelp.js"></script> 
  <script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/oobenn.js"></script> 
  <script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/oobennForm.js"></script>
  <script type="text/javascript">
    var siteurl = '<?php echo $base_url;?>';   
	var hi_user = '<?php echo $page_Lang['hi_register_success'][$DefaultLang];?>';
	var welcome_registerSuccess = '<?php echo $page_Lang['register_wellcome_success'][$DefaultLang];?>';
	var redirection = '<?php echo $page_Lang['register_success_redirect'][$DefaultLang];?>';
	var incorrectusernameorpass = '<?php echo $page_Lang['user_pass_incorrect'][$DefaultLang];?>'; 
	var goodToSeeYou = '<?php echo $page_Lang['good_to_see_you'][$DefaultLang];?>';
	var transfering = '<?php echo $page_Lang['transfering_you'][$DefaultLang];?>';
  </script> 
</head>

<body> 
<!--Login STARTED-->
  <div class="loginBg">
      <div class="closeReg oplf"></div>
       <div class="oobenn_form_controller_wrapper">
            <div class="oobenn_form_in" id="lap">
                <div class="form__wrapper" id="loginBoxes">
                   <div class="input script_name"><?php echo $siteName;?></div>
                   <form  class="login-form" enctype="multipart/form-data" method="post" id='loginform' autocomplete="off">
                      <div class="input">
                        <input type="text" class="field" name="login_username" id="username" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" autocomplete="off"/><span class="awsome_input_border"></span>
                      </div> 
                      <div class="input">
                        <input type="password" class="field" name="login_password" id="password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password"/><span class="awsome_input_border"></span>
                      </div> 
                      <div class="input inte">
                        <a href="<?php echo $base_url;?>forgot-password" class="_m4qul"><?php echo $page_Lang['forgot_password'][$DefaultLang];?></a>
                      </div>
                      <div class="input">
                         <button type="submit" name="submit" class="submit_btnl snd" id='login_submit'><?php echo $page_Lang['login'][$DefaultLang];?></button>
                      </div>
                   </form>
                </div>
            </div>
       </div>
  </div>
  <!--Login FINISHED-->
  <?php if($canRegister == '0'){?>
  <!--Register Background Color STARTED-->
  <div class="registerBg">
       <div class="closeReg opcl"></div>
       <div class="oobenn_form_controller_wrapper">
            <div class="oobenn_form_in" id="rap">
                <div class="form__wrapper" id="registerBoxes">
                   <div class="input script_name"><?php echo $siteName;?></div>
                   <form class="register-form" method="POST" id='registerform' autocomplete="off">
                      <div class="input" id="e_uname">
                        <input type="text" class="field numeric" name="reusername" id="register_username" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" autocomplete="off"/><span class="awsome_input_border"></span>
                      </div>
                      <div class="unot" style="display:none;"><?php echo $page_Lang['username_already_in_use'][$DefaultLang];?></div>
                      <div class="unote" style="display:none;"><?php echo $page_Lang['only_english_character'][$DefaultLang];?></div>
                      <div class="input">
                        <input type="text" class="field" name="fullname" id="reg_fullname" placeholder="<?php echo $page_Lang['full_name'][$DefaultLang];?>" autocomplete="off"/><span class="awsome_input_border"></span>
                      </div>
                      <div class="input" id="e_email">
                        <input type="text" class="field space" name="regemail" id="reg_email" placeholder="<?php echo $page_Lang['email'][$DefaultLang];?>" autocomplete="off"/><span class="awsome_input_border"></span>
                      </div>
                      <div class="enot" style="display:none;"><?php echo $page_Lang['email_already_in_use'][$DefaultLang];?></div>
                      <div class="input">
                        <input type="password" class="field form-control space" name="password" id="reg_password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password"/><span class="awsome_input_border"></span>
                      </div>
                      <div class="input">
                         <div class="bd">
                             <div class="bdt"><?php echo $page_Lang['reg_birthday'][$DefaultLang];?></div>
                             <div class="bdtsel">
                                <select name="birth_day" id="subscription_day">
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
                             </div>
                         </div> 
                         <div class="bd">
                             <div class="bdt"><?php echo $page_Lang['reg_birthmonth'][$DefaultLang];?></div>
                             <div class="bdtsel">
                                <select name="birth_month" id="subscription_month">
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
                             </div>
                         </div> 
                         <div class="bd">
                             <div class="bdt"><?php echo $page_Lang['reg_birthyear'][$DefaultLang];?></div>
                             <div class="bdtsel">
                                <select name="birth_year" id="subscription_year">
                                       <option value=""><?php echo $page_Lang['year'][$DefaultLang];?></option>
                                       <?php  for ($i=1950; $i<date('Y'); $i++) { ?>
                                       <option value="<?php echo $i; ?>">
                                       <?php echo $i; ?>
                                        </option>
                                       <?php } ?>
                                    </select>
                             </div>
                         </div> 
                      </div>
                      <div class="input">
                          <div class="on_off"  id="gender">
                                <span>
                                      <input type="radio" name="gender" id="male" value="male">
                                      <label for="male" id="male"><?php echo $page_Lang['male'][$DefaultLang];?></label>
                                </span> 
                                <span class="lf">
                                      <input type="radio"  name="gender" id="female" value="female">
                                      <label for="female" id="female"><?php echo $page_Lang['female'][$DefaultLang];?></label>
                                  </span>
                          </div>
                      </div>
                      <div class="input inte">
                        <?php echo $page_Lang['auto_agree'][$DefaultLang];?>
                      </div>
                      <div class="input">
                         <button id="register" class="submit_btn snd" type="submit"><?php echo $page_Lang['register'][$DefaultLang];?></button>
                      </div>
                   </form>
                </div>
            </div>
       </div>
  </div> 
  <!--Register Background Color FINISHED-->
  <?php  } ?>
  <div class="full">
  <!--Backgrodun Round ANIMATION STARTED-->
  <div class="bg" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/bg/bg.svg" alt="Background Image" /></div>
  <!--Backgrodun Round ANIMATION FINISHED-->
  <!--Header STARTED-->
  <div class="oobenn-header-container" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="600">
    <div class="oobenn-header-container-in">
      <!--Logo STARTED-->
      <div class="oobenn-logo" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="700"><?php echo $siteName;?></div>
      <!--Logo FINISHED-->
      <!--Login AND Register Buttons STARTED-->
      <div class="oobenn-login-register-buttons">
        <div class="lrb" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="800">
          <div class="oobenn-login-button LightDarkGreen oplf"><?php echo $page_Lang['login'][$DefaultLang];?></div>
        </div>
        <?php if($canRegister == '0'){?>
        <div class="lrb" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">
          <div class="oobenn-register-button LightDarkRed opcl"><?php echo $page_Lang['register'][$DefaultLang];?></div>
        </div>
        <?php  } ?>
      </div>
      <!--Login AND Register Buttons FINISHED-->
    </div>
  </div>
  <!--Header FINISHED-->
  <!--Middle STARTED-->
  <div class="oobenn-middle-container">
    <div class="oobenn-middle-in">
      <div class="playVideo">
           <div class="playVideoBeat popif"></div>
      </div>
      <div class="oobenn-title"><?php echo $page_Lang['slogan'][$DefaultLang];?></div>
      <div class="oobenn-title-description"><?php echo $page_Lang['prolog_info'][$DefaultLang];?></div>
      <!--Middle Image and Video Button STARTED-->
      <div class="oobenn-images-videoBtn">
        <div class="oobenn-image"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/images/2.png" /></div>
        <div class="oobenn-image" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1200"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/images/1.png" /></div>
        <div class="oobenn-image"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/images/3.png" /></div>
      </div>
      <!--Middle Imag and Video Button FINISHED-->
    </div>
  </div>
  <!--Middle FINISHED-->
  <!--Some Feature LIST STARTED-->
  <div class="oobenn-features-container">
      <div class="oobenn-feature-list-title"><?php echo $page_Lang['prolog_some_features'][$DefaultLang];?></div>
      <div class="oobenn-features-list">
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-chat" data-avatar="chat" data-titl="<?php echo $page_Lang['prolog_chat_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_chat_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="300"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-money" data-avatar="money" data-titl="<?php echo $page_Lang['prolog_money_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_money_descrpition'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-ads" data-avatar="ads" data-titl="<?php echo $page_Lang['prolog_advertisement_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_advertisement_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="700"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-music" data-avatar="music" data-titl="<?php echo $page_Lang['prolog_music_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_music_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="900"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-stories" data-avatar="stories" data-titl="<?php echo $page_Lang['prolog_stories_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_stories_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1200"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-edprof" data-avatar="edprof" data-titl="<?php echo $page_Lang['prolog_customize_profile_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_customize_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1500"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-aa" data-avatar="aa" data-titl="<?php echo $page_Lang['prolog_share_text_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_share_text_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1700"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-pic" data-avatar="pic" data-titl="<?php echo $page_Lang['prolog_share_images'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_share_images_description'][$DefaultLang];?> " data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1900"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-filter" data-avatar="filter" data-titl="<?php echo $page_Lang['prolog_filter_images_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_filter_images_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="2100"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-exp" data-avatar="exp" data-titl="<?php echo $page_Lang['prolog_explore_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_explore_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="2300"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-friend" data-avatar="friend" data-titl="<?php echo $page_Lang['prolog_makefriend_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_makefriend_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="2500"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-vid" data-avatar="vid" data-titl="<?php echo $page_Lang['prolog_share_video_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_share_video_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="2800"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-link" data-avatar="link" data-titl="<?php echo $page_Lang['prolog_share_link_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_share_link_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="3000"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-bgc" data-avatar="bgc" data-titl="<?php echo $page_Lang['prolog_background_image_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_background_image_description'][$DefaultLang];?> " data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="3200"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-custom" data-avatar="custom" data-titl="<?php echo $page_Lang['prolog_change_color_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_change_color_description'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="3500"></div> 
           <!--ITEM FINISHED-->
           <!--ITEM STARTED--> 
                 <div class="oobenn-feature-box oobenn-feature-audio" data-avatar="audio" data-titl="<?php echo $page_Lang['prolog_profile_background_sound_title'][$DefaultLang];?>" data-description="<?php echo $page_Lang['prolog_profile_background_sound_descriptio'][$DefaultLang];?>" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="3700"></div> 
           <!--ITEM FINISHED-->
      </div>
      
  <canvas id="canvas"></canvas>
  </div>
  <!--Some Feature LIST FINISHED-->
  <!--PopUP Video Iframe STARTED-->
  <div class="wmBox_overlay">
  <div class="wmBox_centerWrap">
    <div class="wmBox_centerer">
      <div class="wmBox_contentWrap">
        <div class="wmBox_scaleWrap">
          <div class="wmBox_closeBtn popif"></div>
          <iframe id="playerID" src="https://www.youtube.com/embed/kUyzQxSHZ5A"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--PopUP Video Iframe FINISHED--> 
  <!--Footer STARTED-->
  <div class="oobenn-footer-container">
      <div class="oobenn-footer">
           <a href="<?php echo $base_url;?>about-us">About Us</a>
           <a href="<?php echo $base_url;?>privacy-policies">Privacy Policies</a> 
      </div>
  </div>
  <!--Footer FINISHED--> 
  </div>
  <script type="text/javascript"> 
    AOS.init();
  </script>
</body>

</html>