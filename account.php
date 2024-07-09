<?php
include_once 'functions/config.php'; 
include_once 'functions/user.php';   
$Dot = new DOT_USER($db); 
if(empty($_GET['delete'])){
  header("location:index.php");
}else{
  $GetCode = $_GET['delete'];  
  $CheckActivationCode = $Dot->Dot_DeleteUserAccount($GetCode); 
    session_start();
	session_destroy(); 
  if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ 
	  setcookie("user", '', time()-60*60*24*365, "/"); 
	  setcookie("pass", '', time()-60*60*24*365, "/"); 
  }
  if($CheckActivationCode){
      header("location:".$base_url."account/deleted"); 
  }
  if(empty($CheckActivationCode)){
    header("location:index.php");
	exit();
  } 
} 
?>
