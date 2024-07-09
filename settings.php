<?php 
include_once 'functions/control.php';
include("functions/inc.php"); 
if(empty($uid)){
   header("Location: $base_url");   
}
$page = 'settings';
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
$getp ='';  
if(isset($_GET['set'])){ $getp = isset($_GET['set']) ? $_GET['set'] : '';	}  
?> 
<div class="section">
   <div class="main">
       <div class="setttings_container">
         <!--Settings Block STARTED-->
          <div class="BvMHM">
              <!---->
              <div class="settings_left">
                 <!--Settings Menu button for Mobile STARTED-->
                 <div class="menuMobileSettings">
                     <span class="Settings_mobile icons"></span>
                     <h1 class="_1tqi"><?php echo $page_Lang['menu'][$dataUserPageLanguage];?></h1><span class="settings_mobile_down icons"></span>
                 </div>
                 <!--Settings Menu Button for Mobile FINISHED-->
                 <!--Settings Menu Container STARTED-->
                 <div class="settings_menu_container">
                        <a href="<?php echo $base_url;?>settings/editProfile"><div class="settings_menu_item hvr-underline-from-center" id="editProfile"><?php echo $page_Lang['edit_profile'][$dataUserPageLanguage];?></div></a>
                        <a href="<?php echo $base_url;?>settings/change-password"><div class="settings_menu_item hvr-underline-from-center" id="change-password"><?php echo $page_Lang['change_password'][$dataUserPageLanguage];?></div></a>
                        <a href="<?php echo $base_url;?>settings/notifications_settings"><div class="settings_menu_item hvr-underline-from-center " id="notifications_settings"><?php echo $page_Lang['notifications'][$dataUserPageLanguage];?></div></a> 
                        <a href="<?php echo $base_url;?>settings/privacy_and_security"><div class="settings_menu_item hvr-underline-from-center" id="privacy_and_security"><?php echo $page_Lang['security_and_privacy'][$dataUserPageLanguage];?></div></a> 
                        <a href="<?php echo $base_url;?>settings/your_informations"><div class="settings_menu_item hvr-underline-from-center" id="your_informations"><?php echo $page_Lang['your_informations'][$dataUserPageLanguage];?></div></a> 
                        <a href="<?php echo $base_url;?>settings/delete_account"><div class="settings_menu_item hvr-underline-from-center" id="delete_account"><?php echo $page_Lang['delete_my_account'][$dataUserPageLanguage];?></div></a> 
                 </div>
                 <!--Settings Menu Container FINISHED-->
              </div>
              <!---->
              <!---->
              <div class="settings_right" id="settingsPanel">
                 <?php  
				 switch($getp) { 
					case 'editProfile': 
						include('contents/edit-profile.php');
						break;
					case 'change-password':
						include('contents/change-password.php');
						break;
					case 'notifications_settings':
						include('contents/notifications_settings.php');
						break;
					case 'privacy_and_security':
						include('contents/privacy_and_security.php');
						break;
					case 'your_informations':
						include('contents/your_informations.php');
						break;
					case 'delete_account':
						include('contents/delete_account.php');
						break;
					default:
					include('contents/edit-profile.php');
				 }
				 ?>
              </div> 
              <!---->
          </div>
         <!--Settings Block FINISHED--> 
        </div>
        <!--Full With Footer STARTED-->
            <div class="settings_footer">
               <div class="VWk7Y iseBh">
          
               </div>
           </div>
        <!--Full With Footer FINISHED-->
   </div> 
</div>  
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");   
?>  
 <script type="text/javascript">
 $(document).ready(function() {
 //Active page link from settings page
   var pathname = (window.location.pathname.match(/[^\/]+$/)[0]); 
   $(".settings_menu_item").removeClass("activeSetting");
   $("#"+pathname).addClass("activeSetting");
 });
 </script>
</body>
</html>