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
<script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/<?php echo $wellcomeTheme;?>.js"></script> 
<script type="text/javascript">
 var siteurl = '<?php echo $base_url;?>'; 
</script> 
</head>

<body>
<div class="attantion_container in"><div class="attantion_container_in border-radius"><div class="attantion_container_note"><div class="attantion_icon"></div> <?php echo $page_Lang['user_pass_incorrect'][$DefaultLang];?></div><div class="close_attantion"></div></div></div>
<?php  if($userSelectLang == '0'){?><div class="change_language" id="languages"><div class="lang_icon"></div><?php echo $page_Lang['languages'][$DefaultLang];?></div><?php } ?>
 <?php if($canRegister == '0'){?>
<div class="left_register_btn column_right_header_button" id="signin"><span id="txt"><?php echo $page_Lang['register'][$DefaultLang];?></span> <div class="next_"></div></div> 
<?php }?>
<!--Top Section STARTED-->
<div class="section_top" style="background-image:url(<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/bg/bg.jpg);">
    <div class="section_top_in"> 
         <div class="wellcome_site insta_font"><?php echo $page_Lang['wellcome_to'][$DefaultLang];?></div>
         <div class="sitename insta_font"><?php echo $siteName;?></div>
         <div class="note insta_font"><?php echo $page_Lang['sign_in_to_impress_people'][$DefaultLang];?></div> 
         <form class="login-form" enctype="multipart/form-data" method="post" id='loginform'>
         <div class="lgnbx"> 
            <div class="login_form" id="login_form_container"> 
                 <div class="login_box"><input type="text" class="input_box b_u" name="login_username" id="username" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" /><div class="icon_input icon_user"></div></div>
                 <div class="login_box"><input type="password" class="input_box  b_p" name="login_password"  id="password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password" /><div class="icon_input icon_password"></div>
                 <div class="_rpioj_f"><a href="<?php echo $base_url;?>forgot-password" class="_m6qul"><?php echo $page_Lang['forgot_password'][$DefaultLang];?></a></div></div>
                 <div class="login_box"><button type="submit" name="submit" class="submit_btn snd" id='login_submit'><?php echo $page_Lang['login'][$DefaultLang];?></button></div>
             </div>
         </div>
         </form>  
         
         <div class="global_box">
             <div class="device_phone">
                 
             </div>
         </div>
    </div>
</div>
<!--Top Section FINISHED-->
<!--Section Middle STARTED-->
<div class="section_middle flex">

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
<div class="section_middle_fll bg_color">
<div class="post_features_item">
           <div class="post-icon text-icon icon-open"><span class="icon-label"><?php echo $page_Lang['text'][$DefaultLang];?></span></div>
           <div class="post-icon new-img-icon icon-open"><span class="icon-label"><?php echo $page_Lang['image'][$DefaultLang];?></span></div>
           <div class="post-icon new-link-icon icon-open"><span class="icon-label"><?php echo $page_Lang['link'][$DefaultLang];?></span></div>
           <div class="post-icon new-music-icon icon-open"><span class="icon-label"><?php echo $page_Lang['audio'][$DefaultLang];?></span></div>
           <div class="post-icon new-video-icon icon-open"><span class="icon-label"><?php echo $page_Lang['video'][$DefaultLang];?></span></div> 
           <div class="post-icon new-filter-icon icon-open"><span class="icon-label">Filter</span></div>
         </div>
</div>
<!--Section Middle FINISHED-->
 <!--Footer STARTED-->
     <div class="footer_wellcome">
           <ul class="u4mil">
              <li class="n3ufer"><a href="<?php echo $base_url;?>about-us">About Us</a></li> 
              <li class="n3ufer"><a href="<?php echo $base_url;?>privacy-policies">Privacy Policies</a></li>   
            </ul>
     </div>
 <!--Footer FINISHED-->
  <?php if($canRegister == '0'){?>
<!--Register popup wrapper STARTED-->
<div class="popUp__Wrapper">
    <div class="modal-Wrap">
       <div class="modal-middle" id="formRegister">
               
              <div class="close_register"></div>
             <div class="note_reg insta_font"><?php echo $page_Lang['what_inside'][$DefaultLang];?></div>
             <form class="register-form" method="POST" id='registerform'>
             <div class="global-wrapper-reg"> 
                          <div class="panotine ipNot" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div> <?php echo $page_Lang['ip_restrictions'][$DefaultLang];?></div>
                 <div class="already_use_username usernameUsed" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['username_already_in_use'][$DefaultLang];?></div> 
                 <div class="already_use_username justEnglishCharacter" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['only_english_character'][$DefaultLang];?></div>        
                 <div class="global-input-wrapp"><input type="text" name="reusername" id="register_username" class="input_box numeric" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" /><div class="icon_input_register icon_user_register"></div></div> 
                 <div class="global-input-wrapp"><input type="text" name="fullname" id="reg_fullname" class="input_box" placeholder="<?php echo $page_Lang['full_name'][$DefaultLang];?>" /><div class="icon_input_fullname icon_user_fullname"></div></div>
                 <div class="already_use_email emailAlreadyUsed" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['email_already_in_use'][$DefaultLang];?></div>
                                 <div class="already_use_email emailNotValid" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['not_a_valid_email_addresss'][$DefaultLang];?></div>
                 <div class="global-input-wrapp"><input type="text" class="input_box icon_email" name="regemail" id="reg_email" placeholder="<?php echo $page_Lang['email'][$DefaultLang];?>" /><div class="icon_input_email icon_user_email"></div></div>
                 <div class="already_use_email passwordNotValid" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['password_must_be_at_x_chhracter'][$DefaultLang];?></div>
                 <div class="global-input-wrapp"><input type="password" name="password" class="input_box u_password" id="reg_password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password"/><div class="icon_input_password icon_user_password"></div></div>
                 <div class="global-input-wrapp brth color_dark bold"><?php echo $page_Lang['main_birth_day'][$DefaultLang];?></div>
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
                 <div class="global-input-wrapp brth color_dark bold"><?php echo $page_Lang['gender'][$DefaultLang];?></div>
                 <div class="already_use_email choseGender" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['please_select_yoour_gender'][$DefaultLang];?></div>
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
                 <div class="global-input-wrapp" id="registiration"> 
                    <div class="inputBox"><button id="register"class="submit_btn snd" type="submit">Register</button></div> 
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
<?php } ?>
<?php  if($userSelectLang == '0'){?>
<!--Language List STARTED-->
 <div class="languagePopUpContainer">
    <div class="language_modal_wrap">
         <div class="register-modal-middle">
              <div class="close_languages"></div>
              <div class="note"><?php echo $page_Lang['languages'][$DefaultLang];?></div>
              <div class="global-wrapper-box">
                 <div class="lang_name_box" data-lang="english"><?php echo $page_Lang['english'][$DefaultLang];?></div>
                 <div class="lang_name_box" data-lang="turkish"><?php echo $page_Lang['turkish'][$DefaultLang];?></div> 
              </div>
         </div>
    </div>
 </div>
 <!--Language List FINISHED-->
 <?php } 
 if($maintenance == '1'){?>
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