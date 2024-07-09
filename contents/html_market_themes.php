<?php 
$marketPlaceThemeID = $mtdata['market_theme_id'];
$marketPlaceThemeName = $mtdata['market_theme_name'];
$marketPlaceThemeUploadTime = $mtdata['market_theme_upload_time'];
$marketPlaceThemeStatus = $mtdata['market_theme_status'];
$marketPlaceThemeType = $mtdata['market_theme_type']; 
$marketPlaceThemePrice = $mtdata['market_theme_price'];
$pro ='';
$buy =  '<div class="the_theme_footer_button">'.$page_Lang['free'][$dataUserPageLanguage].'</div>';
$CheckUserAlreadyPurchasedTheme = $Dot->Dot_CheckThemePurchased($uid, $marketPlaceThemeID);
if(!$CheckUserAlreadyPurchasedTheme){
 if($marketPlaceThemeType == 'pro'){
  $pro = '<div class="pro_price">'.$marketPlaceThemePrice.' $</div>';
  $buy = '<div class="buy_this_theme the_theme_footer_button" id="'.$marketPlaceThemeID.'">'.$page_Lang['buy_this_market_theme'][$dataUserPageLanguage].'</div>';
 }
}else{
 $buy = '<div class="the_theme_footer_button">'.$page_Lang['purchased'][$dataUserPageLanguage].'</div>';
}

echo '
<div class="t_c_mar" data-last="'.$marketPlaceThemeID.'">
 <div class="theme_container"> '.$pro.'
	 <div class="theme_tumbnail themeSee" data-id="'.$marketPlaceThemeID.'"><div class="tumb_wrap"><img src="'.$base_url.'market/'.$marketPlaceThemeName.'/'.$marketPlaceThemeName.'.png"></div></div>
	 <div class="theme_name">'.$marketPlaceThemeName.'</div>
	 <span class="theme_footer">
		 <div class="the_theme_footer_button themeSee" data-id="'.$marketPlaceThemeID.'">'.$page_Lang['theme_preview'][$dataUserPageLanguage].'</div>
		 '.$buy.'
	 </span>
 </div>
 </div>
';
?>