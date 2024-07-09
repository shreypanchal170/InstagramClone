<?php 
include_once("../functions/inc.php");
$lastThemeID = isset($_POST['lastmid']) ? $_POST['lastmid'] : '';
$themeKey = isset($_POST['theme']) ? $_POST['theme'] : '';
$marketThemeList = $Dot->Dot_MarketThemeList($lastThemeID,$themeKey);
if($marketThemeList){
	foreach($marketThemeList as $mtdata){
		 include("html_market_themes.php");
	}
}
?>