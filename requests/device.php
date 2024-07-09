<?php 
include_once("../functions/inc.php");
if(isset($_GET['f'])){
    $deviceKeyGet = mysqli_real_escape_string($db, $_GET['f']);
    if($deviceKeyGet == 'device_key'){
        if(isset($_GET['id'])){
	       $userDeviceOneSignalKey = mysqli_real_escape_string($db, $_GET['id']);
	       $NewOneSignalDeviceKey = $Dot->Dot_OneSignalDeviceKey($uid, $userDeviceOneSignalKey);
	       if($NewOneSignalDeviceKey){
	          echo '1';
	       }else{
	          echo '2'; 
	       }
	   }
    }
    if($deviceKeyGet == 'remove_device_key'){ 
	    $NewOneSignalDeviceKeyRemove = $Dot->Dot_OneSignalDeviceKeyRemove($uid);
	    if($NewOneSignalDeviceKeyRemove){
	       echo '1';
	    }else{
	       echo '2'; 
	    }
    }
    
}
?>