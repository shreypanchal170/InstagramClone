<?php
include_once("functions/inc.php"); 
$page = 'paymentffail';
// include header file
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require_once 'functions/methods/vendor/autoload.php';
 if (!defined('OOBENN_METHODS_CONFIG')) {   
	 define('OOBENN_METHODS_CONFIG', realpath('functions/paymentConfig.php'));
 }
// Get config data
$configData = configItem();
include("contents/header.php");
?> 
<div class="section">
<div class="profile_not_found">
    <div class="payment_failed"><?php echo $Dot->Dot_SelectedMenuIcon('payment_failed_icon');?></div>
    <div class="profile_not_found_title"><?php echo $page_Lang['sorry_your_payment_failed'][$dataUserPageLanguage];?></div>
    <div class="payment_failed_note"><?php echo $page_Lang['sorry_your_payment_failed_note'][$dataUserPageLanguage];?></div> 
    <div class="suggest_page_links">
         <div class="suggest_page_link_box hvr-bounce-to-right"><a href="<?php echo $base_url;?>" title="<?php echo $page_Lang['go_main_page'][$dataUserPageLanguage];?>"><?php echo $page_Lang['go_main_page'][$dataUserPageLanguage];?></a></div>
         <div class="suggest_page_link_box hvr-bounce-to-left"><a href="<?php echo $base_url.'profile/'.$dataUsername;?>" title="<?php echo $page_Lang['go_profile_page'][$dataUserPageLanguage];?>"><?php echo $page_Lang['go_profile_page'][$dataUserPageLanguage];?></a></div>
    </div>
</div>
</div>  
<?php include("contents/javascripts_vars.php");?>
</body> 
</html> 