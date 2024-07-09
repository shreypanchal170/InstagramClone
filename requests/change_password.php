<?php 
error_reporting(0); 
error_reporting(E_ALL  & ~E_DEPRECATED);
ini_set('display_errors', 1);
include_once '../functions/config.php';
include_once '../functions/user.php';
$Dot = new DOT_USER($db);  
include_once '../functions/sendMail.php';
if(isset($_POST['new_password']) && isset($_POST['new_password_again']) && isset($_POST['activeid'])){
   $newPass = mysqli_real_escape_string($db, $_POST['new_password']);
   $newPassAgain = mysqli_real_escape_string($db, $_POST['new_password_again']);
   $activateID = mysqli_real_escape_string($db, $_POST['activeid']);
   $checkActivateID = $Dot->Dot_CheckActivationCode($activateID);
   if($checkActivateID){
	  if($newPass == $newPassAgain){
		 if(strlen($newPass)>=8){
		   $resetThePass = $Dot->Dot_SetNewPassword($newPass, $activateID);
		   if($resetThePass){
			 echo 'changed';
		 }else{
		     echo 'wrong';
		 }
		 }else{
	        echo 'short';
		 }  
	  }else{
	     echo 'notSame';
	  }
   }else{
      echo 'No ID';
   }
}
?>