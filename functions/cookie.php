<?php 
if(isset($_COOKIE[$cookie_name]) || isset($_GET['token'])){
	$hash = isset($_COOKIE[$cookie_name]) ? mysqli_real_escape_string($db, $_COOKIE[$cookie_name]) : mysqli_real_escape_string($db, $_GET['token']); 
} else if(isset($_SESSION['user_id'])){
    $hash = isset($_SESSION['user_id']) ? mysqli_real_escape_string($db , $_SESSION['user_id']) : "";
} else {
    $hash = '';
}
?>