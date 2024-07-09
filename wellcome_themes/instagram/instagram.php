<?php 
if(file_exists('install/install.lock')) { 
    header('Location: ./install/index.php'); 
    exit;
} 
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
  
  <link rel="stylesheet" href="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/wellcome.css">
  <link rel="stylesheet" href="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/swiper/swiper.css">
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>  
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>  
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/<?php echo $wellcomeTheme;?>.js"></script>
  <script type="text/javascript">
    var siteurl = '<?php echo $base_url;?>';    
  </script>
</head>

<body>
<div class="page-container">
    <div class="page-items">
    <div class="middele">
         <div class="page-left">
               <div class="mobile-screen-slider">
                   <div class="page-slider-container">
                       <div class="page-mobile-slider-container"> 
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                      <div class="swiper-slide"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/slider_images/1.png" /></div>
                                      <div class="swiper-slide"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/slider_images/2.png" /></div>
                                      <div class="swiper-slide"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/slider_images/3.png" /></div>
                                      <div class="swiper-slide"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/slider_images/4.png" /></div>
                                      <div class="swiper-slide"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/slider_images/5.png" /></div> 
                                    </div>
                                </div> 
                       </div>
                   </div>
                   <div class="mobile"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/icons/mobile.png" /></div>
               </div>
         </div>
         <div class="page-right"> 
             <!--Form BOX STARTED-->
             <div class="page-form-box">
                 <div class="page-reigster-form-container">
                      <div class="page-logo"><?php echo $siteName;?></div>
                      <div class="page-slogan"><?php echo $page_Lang['slogan'][$DefaultLang];?></div>
                      <div class="page-arrow"></div>
                      <div class="page-forms-container">
                          <!--Login FORM STARTED-->
                          <div class="page-login-form">
                              <div class="error_login" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div> <?php echo $page_Lang['user_pass_incorrect'][$DefaultLang];?></div>
                              <form  class="login-form" enctype="multipart/form-data" method="post" id='loginform' autocomplete="off">
                                 <div class="page-form-item-box"><input type="text" class="form-input"  name="login_username" id="username" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" autocomplete="off"/></div>
                                 <div class="page-form-item-box"><input type="password" class="form-input"  name="login_password" id="password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password"/></div>
                                 <div class="page-form-item-box forgot"><a href="<?php echo $base_url;?>forgot-password" class="_m4qul"><?php echo $page_Lang['forgot_password'][$DefaultLang];?></a></div>
                                 <div class="page-form-item-box">
                                    <button type="submit" name="submit" class="submit_btnl snd" id='login_submit'><?php echo $page_Lang['login'][$DefaultLang];?></button>
                                 </div>
                              </form>
                          </div>
                          <!--Login FORM FINISHED-->
                          <?php if($canRegister == '0'){?>
                          <!--Register FORM STARTED-->
                          <div class="page-register-form" style="display:none;">
                          <div class="error_register" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div> <?php echo $page_Lang['please_checkyour_details'][$DefaultLang];?></div>
                          <div class="panotine ipNot" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div> <?php echo $page_Lang['ip_restrictions'][$DefaultLang];?></div> 
                             <form class="register-form" method="POST" id='registerform' autocomplete="off">
                             <div class="already_use_username usernameUsed" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['username_already_used'][$DefaultLang];?></div>
                             <div class="already_use_username justEnglishCharacter" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['only_english_character'][$DefaultLang];?></div>
                                 <div class="page-form-item-box"><input type="text" class="form-input numeric" name="reusername" id="register_username" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" autocomplete="off"/></div>
                                 <div class="page-form-item-box"><input type="text" class="form-input" name="fullname" id="reg_fullname" placeholder="<?php echo $page_Lang['full_name'][$DefaultLang];?>" autocomplete="off"/></div>
                                 <div class="already_use_email emailAlreadyUsed" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['email_already_in_use'][$DefaultLang];?></div>
                                 <div class="already_use_email emailNotValid" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['not_a_valid_email_addresss'][$DefaultLang];?></div>
                                 <div class="page-form-item-box"><input type="text" class="form-input" name="regemail" id="reg_email" placeholder="<?php echo $page_Lang['email'][$DefaultLang];?>" autocomplete="off"/></div>
                                 <div class="already_use_email passwordNotValid" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['password_must_be_at_x_chhracter'][$DefaultLang];?></div>
                                 <div class="page-form-item-box"><input type="password" class="form-input" name="password" id="reg_password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password"/></div>
                                 <div class="page-form-item-box">
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
                                 <div class="page-form-item-box">
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
                                      <div class="already_use_email choseGender" style="display:none;"><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M177.912,147.608l-70.376,-117.08c-2.456,-4.088 -6.768,-6.528 -11.536,-6.528c-4.768,0 -9.08,2.44 -11.528,6.52l-70.384,117.088c-2.496,4.152 -2.56,9.344 -0.176,13.56c2.376,4.216 6.864,6.832 11.712,6.832h140.76c4.84,0 9.336,-2.616 11.712,-6.832c2.384,-4.216 2.312,-9.408 -0.184,-13.56zM100,144h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,112v0c-4.416,0 -8,-3.584 -8,-8v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><?php echo $page_Lang['please_select_yoour_gender'][$DefaultLang];?></div> 
                                 <div class="page-form-item-box agree"><?php echo $page_Lang['auto_agree'][$DefaultLang];?></div>
                                 <div class="page-form-item-box">
                                    <button type="submit" name="submit" class="submit_btnl snd" id='registeru'><?php echo $page_Lang['register'][$DefaultLang];?></button>
                                 </div>
                              </form>
                          </div>
                          <!--Register FORM FINISHED-->
                          <?php } ?>
                      </div>
                      <!--Latest Registered USERS STARTED-->
                      <div class="page-latest-registered-container">
                          <?php
						    // You can change the number of how many user registered 6 to (YOUR NUMBER)
							 $LatestUsers = $DotOut->Dot_LatestRegisteredUsers(6);
								if($LatestUsers){
								   foreach($LatestUsers as $dataLatests){
									 $l_uid = $dataLatests['user_id'];
									 $l_Avatar = $DotOut->Dot_UserAvatar($l_uid, $base_url); 
									   echo '<div class="userLatest" style="background-image: url('.$l_Avatar.');"><img src="'.$l_Avatar.'" class="proposed-item-img"></div>'; 
								   }
								} 
						 ?>  
                      </div>
                      <!--Latest Registered USERS FINISHED-->
                 </div>
             </div>
             <!--Form BOX FINISHED-->
             <?php if($canRegister == '0'){?>
             <!--Form Control Box  STARTED-->
             <div class="page-form-control-box"> 
                  <div class="register-button change" id="register" data-type="register"><?php echo $page_Lang['do_not_have_account'][$DefaultLang];?> <span class="register"><?php echo $page_Lang['register'][$DefaultLang];?></span></div> 
                  <div class="login-button change" id="login" data-type="login" style="display:none;"><?php echo $page_Lang['already_have_account'][$DefaultLang];?> <span class="register"><?php echo $page_Lang['login'][$DefaultLang];?></span></div>
             </div>
             <!--Form Control Box FINISHED-->
             <?php } ?>
         </div>
         <div class="oobenn-footer-container">
              <div class="oobenn-footer">
                   <a href="<?php echo $base_url;?>about-us">About Us</a>
                   <a href="<?php echo $base_url;?>privacy-policies">Privacy Policies</a> 
              </div>
          </div>
          </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/swiper/swiper.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
	  effect: 'slide', // You can use "slide", "fade", "cube", "coverflow" or "flip" effect
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }, 
    });
  </script>
</body>
</html>