<?php
include_once '../functions/control.php';  
include_once '../functions/inc.php'; 
if(isset($_POST['keys'])){
   $searchKey = mysqli_real_escape_string($db, $_POST['keys']);
   if($searchKey != ''){
	    $keyRestuls = $Dot->Dot_SearchUser($searchKey);
		if($keyRestuls){
		   echo '<div class="Results">Results For : '.$searchKey.'</div><div class="founded_users">';
		   foreach($keyRestuls as $foundedUser){
		        $dataUsername = $foundedUser['user_name'];
	            $dataUserID = $foundedUser['user_fullname'];
	            $dataUserUid = $foundedUser['user_id'];
	            $sAvatar = $Dot->Dot_UserAvatar($dataUserUid, $base_url); 
			    echo '
				<div class="result_user" id="resulted_user" data-type="usearched" data-id="'.$dataUserUid.'" data-username = "'.$dataUsername.'"> 
				   <div class="result_user_avatar"><img src="'.$sAvatar.'" class="a0uk" /></div>
				   <div class="result_user_name">'.$dataUserID.'</div> 
				</div>
				';
		   }
		   echo '</div>';
		}
	} 
}
?>