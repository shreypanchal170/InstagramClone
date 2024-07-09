<?php  
$lastuid = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';
$visitorListItems = $Dot->Dot_UserWhoAddedFavouriteLisit($uid, $lastuid);
if($visitorListItems){
   foreach($visitorListItems as $visitoru ){
	   include("html_favouritelist.php");
   }
}
?>