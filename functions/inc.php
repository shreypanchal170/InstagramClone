<?php 
ob_start();
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'config.php'; // Database connection
include_once 'functions.php'; // Functions 
include_once 'html_code.php'; 
include_once 'o_expand.php'; 
include_once 'clear.php';  
$Dot = new DOT_UPDATES($db);   
//include_once 'checklogin.php'; // Functions   
if(isset($_COOKIE[$cookie_name]) || isset($_GET['token'])){
	$hash = isset($_COOKIE[$cookie_name]) ? mysqli_real_escape_string($db, $_COOKIE[$cookie_name]) : mysqli_real_escape_string($db, $_GET['token']); 
} else if(isset($_SESSION['user_id'])){
    $hash = isset($_SESSION['user_id']) ? mysqli_real_escape_string($db , $_SESSION['user_id']) : "";
} else {
    $hash = '';
}
$token_id = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10));
$_SESSION['token_id'] = $token_id;  
			
date_default_timezone_set('UTC'); 
$uid = $Dot->Dot_UserIDFromHash($hash);   
$data=$Dot->Dot_UserDetails($uid);  
$duhovit = $Dot->Dot_Configurations();  
$pagesDefaultLanguage = $duhovit['default_lang'];
$dataUserPageLanguage = isset($data['user_page_lang']) ? $data['user_page_lang'] : $pagesDefaultLanguage; 
$dataUsername = $data['user_name'];
$data_uid = $data['user_id'];
$dataUserFullName = $data['user_fullname'];  
$dataUserWord = $data['user_profile_word'];
$dataUserWebsite = $data['user_website'];
$dataUserBio = $data['user_bio'];
$dataUserPp = $data['user_password'];
$dataUserGender = $data['user_gender'];
$dataUserHeight = $data['user_height'];
$dataUserWeight = $data['user_weight'];
$dataUserLifeStyle = $data['user_life_style'];
$dataUserType = $data['user_type'];
$dataUserChildren = $data['user_children'];
$dataUserAccountDeleteKey = $data['delete_key']; 
$dataUserSmoke = $data['user_smoke'];
$dataUserDrink = $data['user_drink'];
$dataUserBodyType = $data['user_body_type'];
$dataUserHairColor = $data['user_hair_color'];
$dataUserEyeColor = $data['user_eye_color'];
$dataUserSexuality = $data['user_sexuality'];
$dataUserRelationShip = $data['user_relationship'];
$dataUserJobTitle = $data['user_job_title'];
$dataUserNotificationCount = $data['notification_count'];
$dataEventNotificationCount = $data['notification_event_count'];
$dataUserCampanyName = $data['user_job_company_name'];
$dataUserSchoolUniversity = $data['user_school_university'];
$dataUserPhoneNumber = $data['user_phone_number'];
$dataPostLikeNotification = $data['post_like_notification'];
$dataPostCommentNotification = $data['post_comment_notification'];
$dataCommentLikeNotification = $data['comment_like_notification'];
$dataFollowNotification = $data['follow_notification'];
$dataVisitedProfileNotification = $data['visited_profile_notification'];
$dataPrivateAccount = $data['private_account'];
$dataUserType = $data['user_type'];
$dataEmailVerification = $data['email_verification'];
$dataUserAccountEmail = $data['user_email'];
$dataPageStyleMode = $data['style_mode'];
$datasuggestedHashTagsNumber = $data['show_suggest_hashTags'];
$datasuggestedUsersNumber  = $data['show_suggest_users'];
$dataAdvertisementNumber = $data['show_advertisement'];
$datagoogleAdvertisementsNumber = $data['show_google_ads'];
$dataUserCanSendMessage = $data['message_available'];
$dataprofileBackgroundImage = isset($data['profile_bg']) ? $data['profile_bg'] : NULL;
$dataCountry = isset($data['country']) ? $data['country'] : 'Not Yet';
$dataCountryPhone = $data['country'];
$dataCity = isset($data['city']) ? $data['city'] : 'Not Yet';
$dataCitySetting = $data['city'];
$dataState = isset($data['state']) ? $data['state'] : 'Not Yet'; 
$dataStateSetting = $data['state'];
$dataUserPostCode = isset($data['postcode']) ? $data['postcode'] : NULL;
$dataUserPassportCodeOrIdNumber = isset($data['idorpssportnumber']) ? $data['idorpssportnumber'] : NULL;
$dataprofileBackgroundImageType = $data['profile_bg_type'];
$dataUserTotalEarnings = $data['total_earnings'];
$dataLastCalculatedEarning = $data['last_earn_calculate'];
$dataPontEarnings = $data['point_earning'];
$dataUserProType = $data['pro_user_type'];
$thisisProMember = '';
$thisisVerifiedMember = '';

$dataVerifiedUserStatus = $data['verified_user'];
if($dataVerifiedUserStatus == 1){
   $thisisVerifiedMember = '<span class="mrEK_ Szr5J coreSpriteVerifiedBadge icons" style="width:18px;height:18px; display:inline-block;" title="verified"></span>';
}
$profileBackgroundColor = isset($data['pbg_color']) ? $data['pbg_color'] : NULL ;
$dataUserOneSignalKey = isset($data['device_key']) ? $data['device_key'] : NULL ; 
$dataUserLatitude = isset($data['ulat']) ? $data['ulat'] : '0' ;
$dataUserLongitude = isset($data['ulong']) ? $data['ulong'] : '0' ; 
$getBgColor = $Dot->Dot_GetColorFromID($profileBackgroundColor);
$profileHeaderBackgroundColor = isset($data['pha_color']) ? $data['pha_color'] : NULL;
$profileTextColor = isset($data['pt_color']) ? $data['pt_color'] : NULL;
$getTextColor = $Dot->Dot_GetColorFromID($profileTextColor);
$profileHoverColor = isset($data['phv_color']) ? $data['phv_color'] : NULL;
$profilebuttonColors = isset($data['pp_icon']) ? $data['pp_icon'] : NULL; 
$profileHeaderSecondColors = isset($data['pshb_color']) ? $data['pshb_color'] : NULL; 
$getSecondHeaderColor = $Dot->Dot_GetColorFromID($profileHeaderSecondColors);
$profileSelectedFont = isset($data['pfont_font']) ? $data['pfont_font'] : NULL; 
$getfon = $Dot->Dot_GetFontFromID($profileSelectedFont); 
$profileHeaderSecondicons = isset($data['pshb_icon']) ? $data['pshb_icon'] : NULL; 
$profileShoppingFullName = isset($data['shopping_fullname']) ? $data['shopping_fullname'] : $dataUserFullName ; 
$profileShoppingPhoneNumber = isset($data['shopping_phone_number']) ? $data['shopping_phone_number'] : NULL ; 
$profileShoppingFullAddress = isset($data['shopping_full_address']) ? $data['shopping_full_address'] : 'Not specified' ; 
$showOnlineOfflineStatus = $data['show_online_offline_status'];
$iconColorProfile = '8a99a4';  
$dataUserCredit = $data['user_credit'];
$ModeSandBox = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
if($dataprofileBackgroundImageType == '1'){ $display = 'none'; }else{ $display = 'block';}
$dataprofileBackgroundMusicName = isset($data['bg_music_name']) ? $data['bg_music_name'] : NULL;
$dataprofileBackgroundMusic = $data['bg_music'];
$dataprofileBackgroundMusicType = $data['bg_music_type'];
if($dataprofileBackgroundMusicType == '1'){ $displaya = 'none'; }else{ $displaya = 'block';}
$dataUserAvatar = $Dot->Dot_UserAvatar($uid, $base_url);
$dataUserCover = $Dot->Dot_UserCover($uid, $base_url);
$dataSumUserPost = $Dot->Dot_UserPostCount($uid);
$dataSumFriends = $Dot->Dot_UserFriendsCount($uid);
$dataSumFollowers = $Dot->Dot_UserFollowersCount($uid);
$page_Lang =  $Dot->Dot_Languages();
$allColorList = $Dot->Dot_DataColors();
$allFonts = $Dot->Dot_DataFonts();
$allMarketThemes = $Dot->Dot_AllMarketThemes();
$watermarkBg = $Dot->Dot_WatermarkPatterns();
$whichCategories = $Dot->Dot_ListOfWhichCategories();
$allEventCovers = $Dot->Dot_EventCovers();
$CreatedEvents = $Dot->Dot_CreatedEvents($uid);
$going_InterestedEvents = $Dot->Dot_GoingInterestedEvents($uid);
$allEventCategories = $Dot->Dot_EventCategories();
$allFeelingList = $Dot->Dot_GetAllFeelings();
$EventCategories = $Dot->Dot_EventCategories();
$EditLangKeys = $Dot->Dot_LangKeysValues();
$allIconsList = $Dot->Dot_ShowSVGIcons();
$MarketPlaceCategories = $Dot->Dot_MarketPlaceProductCategories(); 
$DotCountries = $Dot->Dot_Countries();
$Cargos = $Dot->Dot_CargoExpressList();
$DotCities = $Dot->Dot_UserCities($dataCountry, $uid);
$DotStates = $Dot->Dot_GetCityStates($dataCity, $uid);
$marketUser = $Dot->Dot_CheckUserMarketPlaceExist($uid);
$logedinUserdailyTotalPoint = $Dot->Dot_TotalEarningPointsInaDay($uid);
$checkHasBoostedBefore = $Dot->Dot_CheckHasBoostedProduct($uid);
$checkUserPurchasedMarketThemeBefore = $Dot->Dot_CheckUserPurchasedMarketTheme($uid);
$userPurchasedMarketThemeList = $Dot->Dot_ShowUserPurchasedMarketThemes($uid);
$userWithdrawalPayouts = $Dot->Dot_UserPayoutList($uid);
$userRequestedWithdrawalPayouts = $Dot->Dot_UserRequestedPayoutList($uid);

//GetExtension
function getExtension($str) {
	$i = strrpos($str,".");
    if (!$i) { 
	   return ""; 
	} 
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}
function url_slug($str) {   
    $str = mb_strtolower(trim($str), 'UTF-8');
    $str = preg_replace('/[^\pL\pN]+/u', ' ', $str);
    $str = trim($str);
    $str = preg_replace('/\h+/', '-', $str);
    return $str;
}
$url404 = $base_url.'404.php';
$pageRequestType = 'normal';
$Dot->Dot_UpdateOnlineTime($uid);
$pageMenu = '';
$hashtagNumber = $duhovit['show_hashtag_when']; 
$usersNumber = $duhovit['show_users_when']; 
$advertisementsNumber = $duhovit['show_advertisement_when'];
$googleAdvertisementsNumber = $duhovit['show_google_ads_when']; 
$loginTheme = $duhovit['wellcome_theme'];
$dot_logo = $duhovit['script_logo'];
$dot_logo_mini = $duhovit['script_logo_mini'];
$dot_title = $duhovit['script_title'];
$dot_description = $duhovit['site_description'];
$dot_googleMapApi = $duhovit['google_map_api'];
$dot_googleAnalyticsCode = $duhovit['google_analytics_code'];
$dot_SMTPorMAIL = $duhovit['smtp_or_mail_server'];
$dot_TLSorSSL  = $duhovit['tls_or_ssl'];
$dot_smtpHost  = $duhovit['smtp_host'];
$dot_smtpUsername  = $duhovit['smtp_username'];
$dot_smtpPassword  = $duhovit['smtp_password'];
$dot_smtpPort  = $duhovit['smtp_port'];
$dot_siteKeywords= $duhovit['site_keywords'];
$dot_siteName = $duhovit['script_name'];
$dot_maintenance = $duhovit['maintenance_mode'];
$adsPerClick = $duhovit['ads_per_click'];
$adsPerimpression = $duhovit['ads_per_impression'];
$minMonth = $duhovit['min_amonth'];
$weatherAPi = $duhovit['weather_api'];
$weatherAPi_Status = $duhovit['weather_api_status'];
$creditCurrency = $duhovit['credit_currency'];
$paypalMode = $duhovit['paypal_mode']; 
$client_ID = $duhovit['paypal_cliend_id'];
$client_Secret = $duhovit['paypal_secret_id'];   
if($creditCurrency == 'US'){$scurrency = '$';}
if($creditCurrency == 'GBP'){$scurrency = '£';}
if($creditCurrency == 'TL'){$scurrency = '₺';} 
$postTypePosition = $duhovit['post_types_position'];
$menuTypePosition = $duhovit['menu_position'];
$postType_Text = $duhovit['post_text'];
$postType_Image = $duhovit['post_image'];
$postType_Video = $duhovit['post_video'];
$postType_Audio = $duhovit['post_audio'];
$postType_Link = $duhovit['post_link'];
$postType_Filter = $duhovit['post_filter'];
$postType_Watermark = $duhovit['enable_disable_watermark_post'];
$postType_Which = $duhovit['enable_disable_which_post'];
$postType_Giphy = $duhovit['post_type_giphy'];
$giphyapiKey = $duhovit['giphy_key'];
$postType_Location = $duhovit['post_type_location'];
$showHideProfileCard = $duhovit['enable_disable_profile_card'];
$showHideYouMayKnowPeople = $duhovit['enable_disable_youmayknow'];
$showHideRadar =  $duhovit['enable_disable_radar'];
$showHideTrendTags = $duhovit['enable_disable_trend_tags'];
$showHideChooseLang = $duhovit['enable_disable_user_choose_lang'];
$showHideCreatedAdsPage = $duhovit['enable_disable_advertisement_pages'];
$showHideEventFeature = $duhovit['enable_disable_event_feature'];
$scriptVersion = $duhovit['version'];
$googleFonts = $duhovit['google_font_import'];
$newRegister = $duhovit['enable_disable_register'];
$ipRegisterEnableDisable = $duhovit['enable_disable_register_ip'];
$ipRegisterLimit = $duhovit['ip_register_limit'];
$yandexAPI = $duhovit['yandex_translate_api_key'];
$headerAdsOpenClose = $duhovit['header_ads'];
$headerAdsCode = $duhovit['header_ads_code'];
$sidebarAdsOpenClose = $duhovit['sidebar_ads'];
$sidebarAdsCode = $duhovit['sidebar_ads_code'];
$AdsBetweenPostOpenClose = $duhovit['post_between_ads'];
$AdsBetweenCode = $duhovit['post_between_ads_code']; 
$sidebarWeather = $duhovit['weather_widget'];
$defaultWeatherLocation = $duhovit['weather_default_location'];
$unlikeFeature = $duhovit['enable_disable_unlike_button'];
$productCurrency = $duhovit['money_currencys'];
$searchProductEnableDisable = $duhovit['search_product'];
$marketPlaceProductMenuEnableDisable = $duhovit['market_menu'];
$marketPlaceSliderEnableDisable = $duhovit['market_slider'];
$marketPost = $duhovit['market_post'];
$beforeAfterPost = $duhovit['before_after_post'];
$oneSignalApi = $duhovit['ons_api'];
$oneSignalRestApi = $duhovit['ons_rest_api'];
$oneSignalStatus = $duhovit['ons_status'];
$proSystemStatus = $duhovit['pro_system'];
if($dataUserProType == 1){
   $thisisProMember = '<span class="prmem">'.$Dot->Dot_SelectedMenuIcon('pro_member').'</span>';
}
$twilioAccountSid = $duhovit['twilio_account_sid'];
$apiKeySid = $duhovit['twilio_key_sid'];
$apiKeySecret = $duhovit['twilo_api_key_secret'];
$twillioCallTime = $duhovit['video_call_call_time'];
$twilloDialTime = $duhovit['video_call_dial_time'];
$twilioMode = $duhovit['twilio_mode'];

$defaultSearchGender = $duhovit['default_search_gender'];
$defaultSearchOnlineOfflineStatus = $duhovit['default_search_onlineoffline'];
$defaultSearchAvatarStatus = $duhovit['default_search_avatarstatus'];
$defaultSearchAgeStartStatus = $duhovit['default_search_agestart'];
$defaultSearchAgeEndStatus = $duhovit['default_search_ageend'];
$defaultSearchDistanceStatus = $duhovit['default_search_distance'];
$defaultSearchRelationShip = $duhovit['default_search_relationship'];
$defaultSearchSexuality = $duhovit['default_search_sexuality'];
$defaultSearchHeight = $duhovit['default_search_height'];
$defaultSearchWeight = $duhovit['default_search_weight'];
$defaultSearchLifeStyle = $duhovit['default_search_lifestyle'];
$defaultSearchChildren = $duhovit['default_search_children'];
$defaultSearchSmokingHabit = $duhovit['default_search_smokinghabit'];
$defaultSearchDrinkingHabit = $duhovit['default_search_drinkinghabit'];
$defaultSearchBodyType = $duhovit['default_search_bodytype'];
$defaultSearchHairColor = $duhovit['default_search_haircolor'];
$defaultSearchEyeColor = $duhovit['default_search_eyecolor'];  

$userOldSearchOnlineOfflineStatus = isset($data['search_onofstatus']) ? $data['search_onofstatus'] : NULL; 
$userOldSearchAvatarStatus = isset($data['search_avatarstatus']) ? $data['search_avatarstatus'] : NULL; 
$userOldSearchAgeStart = isset($data['search_agestart']) ? $data['search_agestart'] : NULL; 
$userOldSearchAgeEnd = isset($data['search_ageend']) ? $data['search_ageend'] : NULL; 
$userOldSearchDistance = isset($data['search_distance']) ? $data['search_distance'] : NULL; 
$userOldSearchGender = isset($data['search_gender']) ? $data['search_gender'] : NULL; 
$userOldSearchRelationShipStatus  = isset($data['search_relationshipstatus']) ? $data['search_relationshipstatus'] : NULL; 
$userOldSearchSexuality = isset($data['search_sexuality']) ? $data['search_sexuality'] : NULL; 
$userOldSearchHeight  = isset($data['search_height']) ? $data['search_height'] : NULL; 
$userOldSearchWeight  = isset($data['search_weight']) ? $data['search_weight'] : NULL; 
$userOldSearchLifeStyle  = isset($data['search_lifestyle']) ? $data['search_lifestyle'] : NULL; 
$userOldSearchChildren  = isset($data['search_children']) ? $data['search_children'] : NULL; 
$userOldSearchSmokingHabit  = isset($data['search_smokinghabit']) ? $data['search_smokinghabit'] : NULL;  
$userOldSearchDrinkingHabit  = isset($data['search_drinkinghabit']) ? $data['search_drinkinghabit'] : NULL; 
$userOldSearchHairColor  = isset($data['search_haircolor']) ? $data['search_haircolor'] : NULL; 
$userOldSearchEyeColor  = isset($data['search_eyecolor']) ? $data['search_eyecolor'] : NULL; 
$userOldSearchBodyType  = isset($data['search_bodytype']) ? $data['search_bodytype'] : NULL;  

$mostSponsoredPostDailyWidget = $duhovit['most_sponsored_posts_daily_widget'];
$earningDolarThisMonth = $Dot->Dot_TotalEarningThisMonthDolar($uid);
$earningTLThisMonth = $Dot->Dot_TotalEarningThisMonthTL($uid);
$earningNGNThisMonth = $Dot->Dot_TotalEarningThisMonthNGN($uid);
$earningINRThisMonth = $Dot->Dot_TotalEarningThisMonthINR($uid); 
//PayPal
$paymentUSD = $duhovit['payment_usd'];
$payomentineer = $duhovit['paymentiner'];
$paymentNGN = $duhovit['payment_ngn'];
$paymentTRY = $duhovit['payment_try'];
$paymentFEE = $duhovit['payment_fee'];
$paypalPaymentMode = $duhovit['paypal_payment_mode'];
$paypalActivePasive = $duhovit['paypal_active_pasive'];
$paypalSendBoxBusinessEmail = $duhovit['paypal_sendbox_business_email'];
$paypalProductBusinessEmail = $duhovit['paypal_product_business_email'];
//Bitpay
$bitpayPaymentMode = $duhovit['bitpay_payment_mode'];
$bitpayActivePasive = $duhovit['bitpay_active_pasive'];
$bitpayNotificationEmail = $duhovit['bitpay_notification_email'];
$bitpayPassword = $duhovit['bitpay_password'];
$bitpayPairingCode = $duhovit['bitpay_pairing_code'];
$bitpayLabel = $duhovit['bitpay_label'];
//Stripe
$stripePaymentMode = $duhovit['stripe_payment_mode'];
$stripePaymentActivePasive = $duhovit['stripe_active_pasive'];
$stripePaymentTestSecretKey = $duhovit['stripe_test_secret_key'];
$stripePaymentTestPublicKey = $duhovit['stripe_test_public_key'];
$stripePaymentLiveSecretKey = $duhovit['stripe_live_secret_key'];
$stripePaymentLivePublicKey = $duhovit['stripe_live_public_key'];
// AuthorizeNet
$authorizePaymentMode = $duhovit['authorize_payment_mode'];
$authorizeActivePasive = $duhovit['authorizenet_active_pasive'];
$authorizeTestApiID = $duhovit['authorizenet_test_ap_id'];
$authorizeTestTransactionKey = $duhovit['authorizenet_test_transaction_key'];
$authorizeLiveApiID = $duhovit['authorizenet_live_api_id'];
$authorizeLiveTransactionKey = $duhovit['authorizenet_live_transaction_key'];
//IyziCo
$iyzicoPaymentMode = $duhovit['iyzico_payment_mode'];
$iyzicoActivePasive = $duhovit['iyzico_active_pasive'];
$iyzicoTestingSecretKey = $duhovit['iyzico_testing_secret_key'];
$iyzicoTestingApiKey = $duhovit['iyzico_testing_api_key'];
$iyzicoLiveApiKey = $duhovit['iyzico_live_api_key'];
$iyzicoLiveSecretKey = $duhovit['iyzico_live_secret_key'];
// RazorPay
$razorPayPaymentMode = $duhovit['razorpay_payment_mode'];
$razorPayActivePasive = $duhovit['razorpay_active_pasive'];
$razorPayTestkingKeyID= $duhovit['razorpay_testing_key_id'];
$razorPayTestingSecretKey = $duhovit['razorpay_testing_secret_key'];
$razorPayLiveKeyID = $duhovit['razorpay_live_key_id'];
$razorPayLiveSecretKey = $duhovit['razorpay_live_secret_key'];
//PayScak
$payStackActivePasive = $duhovit['paystack_active_pasive'];
$payStackPaymentMode = $duhovit['paystack_payment_mode'];
$payStackTestSecretKey = $duhovit['paystack_testing_secret_key'];
$payStackTestPublicKey = $duhovit['paystack_testing_public_key']; 
$payStackLiveSecretKey = $duhovit['paystack_live_secret_key'];
$payStackLivePublicKey = $duhovit['pay_stack_liive_public_key'];

$dataOneSignalAppID = $duhovit['one_signal_app_id'];
$dataOneSignalAppStatus = $duhovit['one_signal_status'];
// Points and Point Status
$pointSystemStatus = $duhovit['point_system_status'];
$pointLike = $duhovit['point_like'];
$pointComment = $duhovit['point_comment'];
$pointPost = $duhovit['point_post'];
$pointStories = $duhovit['point_stories'];
$pointLikeStatus = $duhovit['point_like_status'];
$pointCommentStatus = $duhovit['point_comment_status'];
$pointPostStatus = $duhovit['point_post_status'];
$pointStoriesStatus = $duhovit['point_stories_status'];
$pointVote = $duhovit['point_vote'];
$pointVoteStatus = $duhovit['point_vote_status'];
$pointEqualDollar = $duhovit['point_equal_dolar'];
$maxPointDaily = $duhovit['point_daily'];
//Point Sum
$userCanCustomizeProfile = $duhovit['customize_profile_feature'];
$userCanChangeBackground = $duhovit['change_background'];
$userCanChangeBackgroundSound = $duhovit['change_background_sound'];
$verificationMailStatus = $duhovit['verification_mail'];
/*Currencies*/
$paypalCurrency = $duhovit['paypal_crncy'];
$iyziCoCurrency = $duhovit['iyzico_crncy'];
$bitPayCurrency = $duhovit['bitpay_crncy'];
$authorizeNetCurrency = $duhovit['authorize_crncy'];
$paystackCurrency = $duhovit['paystack_crncy'];
$stripeCurrency = $duhovit['stripe_crncy'];
$razorPayCurrency = $duhovit['razorpay_crncy'];

$currencys = array(
  "USD" => '$',
  "AUD" => '$',
  "EUR" => '€',
  "BRL" => 'R$',
  "CAD" => '$',
  "CZK" => 'Kč',
  "DKK" => 'kr',
  "HKD" => '$',
  "HUF" => 'Ft',
  "INR" => '₹',
  "ILS" => '₪',
  "JPY" => '¥',
  "MYR" => 'RM',
  "MXN" => '$',
  "TWD" => 'NT$',
  "NZD" => '$',
  "NOK" => 'kr',
  "PHP" => ' ₱',
  "PLN" => 'zł',
  "GBP" => '£',
  "RUB" => 'руб',
  "SGD" => '$', 
  "CHF" => 'CHF',
  "THB" => '฿',
  "TRY" => '₺',
  "ZAR" => 'R',
  "NGN" => '₦'
);

$videoAutoPlayStatus = $duhovit['video_autoplay'];
$videoSoundOpenStatus = $duhovit['video_play_sound'];
$defaultSiteStyle = $duhovit['default_style']; 

$styleMode = 'style';
$day_night_icon ='night'; 
$DayNigtMode = $page_Lang['night_mode'][$dataUserPageLanguage];
if($dataPageStyleMode == 2){
    $styleMode = 'night_style';
    $DayNigtMode = $page_Lang['day_mode'][$dataUserPageLanguage];
    $day_night_icon ='day';
}

$TotalEarningPostPoint = $Dot->Dot_CalculateNewPointsPost($uid);
$TotalEarningCommentPoint = $Dot->Dot_CalculateNewPointsComment($uid);
$TotalEarningLikePoint = $Dot->Dot_CalculateNewPointsLike($uid);
$TotalEarningStoriesPoint = $Dot->Dot_CalculateNewPointsStoriesPost($uid);
$checkProStatus = $Dot->Dot_CheckProStatus($uid);
$checkChecked = $duhovit['chtime'];
$AllTotalPoints = $TotalEarningPostPoint + $TotalEarningCommentPoint + $TotalEarningLikePoint + $TotalEarningStoriesPoint;
$dolarEarningFromPoints =  $AllTotalPoints/$pointEqualDollar;
$showLimit = '3';
$blocked = '';
$maintenanceMode = $base_url.'sources/maintenance';  
if($dot_maintenance == '1'){ if(!$dataUserType == '1'){ $blocked = $maintenanceMode; 	} }
$activatedType = $duhovit['activated']; 
$enpur = isset($duhovit['pr_cod']) ? $duhovit['pr_cod'] : NULL; 
$enactiva = $base_url.'sources/activate';      
$youBlocked = $base_url.'account/blocked';
$yourAccountDeleted = $base_url.'account.php'; 
$CheckUserStatus = $Dot->Dot_CheckUserBlocked($uid);
if($CheckUserStatus == '2'){ $blocked = $youBlocked;  }
$CheckUserDeleteStatus = $Dot->Dot_CheckUserDeleted($uid);
if($CheckUserDeleteStatus == '3'){  $deleteKey = $Dot->Dot_GetDeleteKey($uid);  $blocked = $yourAccountDeleted.'?delete='.$deleteKey; }   
$CheckUserCookie = $Dot->Dot_CheckCookieHash($hash); 
//if($CheckUserCookie){ $blocked = $base_url.'logout.php'; } 
?>