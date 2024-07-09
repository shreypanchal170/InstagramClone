<?php 
include_once '../../functions/control.php';
include_once '../../functions/inc.php'; 
$Activitytype = array("websiteSettings","maintencance");
if(isset($_POST['f']) && in_array($_POST['f'], $Activitytype)){
	$activity = mysqli_real_escape_string($db, $_POST['f']); 
	/*Save Website Settings*/
	if($activity == 'websiteSettings'){  
	     if(isset($_POST['wn']) && isset($_POST['ww']) && isset($_POST['wi'])){
			 $websiteName = mysqli_real_escape_string($db, $_POST['wn']);
			 $websiteKeyword = mysqli_real_escape_string($db, $_POST['ww']);
			 $websiteInformation = mysqli_real_escape_string($db, $_POST['wi']);
			 $saveWebsiteSettings = $Dot->Dot_UpdateWebsiteSetting($uid,$websiteName,$websiteKeyword,$websiteInformation);
			 if($saveWebsiteSettings){
				 echo '1';
			 }else{
			    echo '2';
			 }
		 }
	}
	/*Maintenance Mode*/
	if($activity == 'maintencance'){
	    if(isset($_POST['change'])){
		    $maintenanceMode = mysqli_real_escape_string($db, $_POST['change']);
			$GetMaintenanceMode = $Dot->Dot_MaintenanceModeUpdate($uid, $maintenanceMode);
			if($GetMaintenanceMode){
			    echo '1';
			}
		}
	}
}
?>