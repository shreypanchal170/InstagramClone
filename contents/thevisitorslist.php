<?php  
$lastuid = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';
$visitorListItems = $Dot->Dot_UserVisitorLisit($uid, $lastuid);
if($visitorListItems){
   foreach($visitorListItems as $visitoru ){
	   include("html_visitors.php");
   }
}
?>