<?php 
include_once '../functions/config.php';
include_once '../functions/user.php';
$Dot = new DOT_USER($db);
if(isset($_POST['username'])){
  $isUsername = mysqli_real_escape_string($db, $_POST['username']);
  if(strlen($isUsername) > 0){
	  if (preg_match('/[^A-Za-z0-9-_]/', $isUsername)) // '/[^a-z\d]/i' should also work.
     {
		echo '4';
		exit();
               // string contains only english letters & digits
     }
      $CheckUsername = $Dot->Dot_CheckUserNameExist($isUsername);
	  if($CheckUsername){
		   echo '1';
	  } else{
		  echo '2'; 
	  }
  }
}
?>