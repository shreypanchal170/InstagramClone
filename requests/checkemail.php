<?php 
include_once '../functions/config.php';
include_once '../functions/user.php';
$Dot = new DOT_USER($db);
if(isset($_POST['email'])){
  $isEmail = mysqli_real_escape_string($db, $_POST['email']);
  if(!filter_var($isEmail, FILTER_VALIDATE_EMAIL)){ 
	     echo"3"; 
		 exit();
  } 
  if(strlen($isEmail) > 0){
      $CheckEmail = $Dot->Dot_EmailExist($isEmail);
	  if($CheckEmail){
		   echo '1';
		   exit();
	  } else{
		   echo '2';
		   exit();
	  } 
  }  
}
?>