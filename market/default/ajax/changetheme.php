<?php 
include_once '../../../functions/inc.php';  
include_once "../../../functions/clear.php"; 
include_once "../../../api/send_push_notification.php"; 
if(isset($_POST['id'])){
    $themeID = mysqli_real_escape_string($db, $_POST['id']);
	$changeThemeID = $Dot->Dot_ChangeMarketTheme($uid, $themeID);
	if($changeThemeID){
	   echo '1';
	}else{
	   echo '2';
	}
}
?>