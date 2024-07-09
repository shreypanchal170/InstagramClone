<?php  
/*
include("config.php"); 
//include("control.php"); 
if(isset($_COOKIE[$cookie_name])){ 

	parse_str($_COOKIE[$cookie_name]); // Convert cookie values to $u, $h, $t (user, hash, token). 
	// Check if user stored in cookie has a session in database
	$result = mysqli_query($db, "SELECT * FROM `dot_users` WHERE user_id='$u' AND user_name='$n'");
	if(mysqli_num_rows($result) == '1'){ 
		$r = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$userid = $r['user_id'];
		$uemail = $r['user_email'];
		$pass = $r['user_password']; 
		//Select session data from database
		$result = mysqli_query($db, "SELECT * FROM `dot_session` WHERE userid='$userid'");
		$r = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$db_userid = $r['userid'];
		$db_auth = $r['auth'];
		$db_tkn = $r['tkn'];
		  
		  
		//Create new hash and token for cookie and database.
		$password_hash = sha1($uemail.$pass);
		$tkn = sha1($uemail.time()); 
		
		//If cookie values match the database values, login with this user and store new values.
		if(($userid == $db_userid) && ($h == $db_auth) && ($t == $db_tkn)){
			
		//Pass new values to cookie.
		if(setcookie ($cookie_name, 'u='.$userid.'&h='.$password_hash.'&t='.$tkn.'&n='.$dbunm , time() + (86400 * 30), "/")){
		
			//Store new session in database for this user
			$result = mysqli_query($db, "SELECT * FROM `dot_session` WHERE userid='$userid'");
			$r = mysqli_num_rows($result);
			mysqli_query($db, "DELETE FROM `dot_session` WHERE userid='$userid'");
			mysqli_query($db, "INSERT INTO `dot_session` (userid, auth, tkn) VALUES ('$userid', '$password_hash', '$tkn')");
			
		} 
		
		// Register the session and go to home.
		$_SESSION['user_id'] = $userid;
		header("Location: ".$base_url."index.php");  
		}
	}else{
	    //header("Location: ".$base_url."logout.php");  
	}
	
	}*/

?>