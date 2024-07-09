<?php 
include_once '../functions/inc.php'; 
   if(isset($_GET['tm'])){
	     $themeID = mysqli_real_escape_string($db, $_GET['tm']);
		 $getThemeName = $Dot->Dot_GetThemeName($themeID);
		 $marketTheme = $getThemeName['market_theme_name'];
         include_once("$marketTheme/preview.php"); 
   }
?>  