<?php 
$GetMarketUrlName = $Dot->Dot_GetUserMarketUsername($getID);
$GetMarketData = $Dot->Dot_CheckUserMarketPlace($GetMarketUrlName);  
$marketOwner_id = $GetMarketData['market_place_owner_id'];
$marketUserName = $GetMarketData['market_temporary_name'];
$marketName = $GetMarketData['market_place_name'];
$marketTheme = $GetMarketData['market_theme'];
$marketAbout = $GetMarketData['market_about'];
$marketPhone = $GetMarketData['market_phone'];
$marketEmail = $GetMarketData['market_email'];
$marketAddress = $GetMarketData['market_address'];
$marketID = $GetMarketData['market_id'];
$marketLogo = $GetMarketData['market_logo'];
$marketSlogan = $GetMarketData['market_slogan']; 
$marketOwnerProfileData = $Dot->Dot_UserDetails($marketOwner_id);
$mo_Username = $marketOwnerProfileData['user_name'];
$mo_UserFullName = $marketOwnerProfileData['user_fullname'];
$mo_profileAvatar = $Dot->Dot_UserAvatar($marketOwner_id, $base_url);

function format_phone_us($phone) {
  // note: making sure we have something
  if(!isset($phone{3})) { return ''; }
  // note: strip out everything but numbers 
  $phone = preg_replace("/[^0-9]/", "", $phone);
  $length = strlen($phone);
  switch($length) {
  case 7:
    return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
  break;
  case 10:
   return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
  break;
  case 11:
  return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
  break;
  default:
    return $phone;
  break;
  }
}
?>