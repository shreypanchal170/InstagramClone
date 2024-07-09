<?php  
$urlarray=explode('/', $_SERVER["REQUEST_URI"]);
$pageActive = end($urlarray); 
$dashClass ='';  
$userClass = '';
$settingClass = '';
$postClass ='';
$reportClass ='';
$langClass ='';
$themeClass = '';
$adsClass = '';
$emoticonsClass = '';
$featuresClass = '';
$productClass = '';
$marketClass = '';
$pageClass = '';
$earnClass = '';
$proClass = '';
$pointClass = '';
$announce = '';
$cityCountryStateClass = '';
$activePage = array(
	"dashboard",
	"site-settings",
	"user-management",
	"blocked-users",
	"user-posts",
	"user-text-posts",
	"user-image-posts",
	"user-video-posts",
	"user-audio-posts",
	"user-beforeafter-posts",
	"user-link-posts",
	"user-filter-posts",
	"user-gif-posts",
	"user-location-posts",
	"user-watermark-posts",
	"user-benchmark-posts",
	"post-reports",
	"page-langauges",
	"wellcome-themes",
	"createads",
	"manage-advertisements",
	"advertisement-settings",
	"manage-stickers",
	"manage-feelings",
	"manage-gifs",
	"manage-watermarks",
	"general-settings",
	"site-features",
	"add-new-language-keys",
	"manage-fonts",
	"manage-colors",
	"manage-event-categories",
	"manage-event-covers",
	"ads-code-management",
	"manage-menu-icons",
	"manage_products",
	"manage_boosted_products",
	"manage_market_features",
	"manage_market_categories",
	"manage_market_slider_advertisements",
	"market-themes",
	"payment-method-settings",
	"how_to_use",
	"manage_about_us",
	"manage_privacy_policies", 
	"manage_earnings", 
	"manage_withdrawals", 
	"manage_points",
	"manage_boosts",
	"manage_theme_earnings",
	"pro_user_management",
	"verified_user_management",
	"pro_list_packages",
	"create_new_pro_package",
	"manage_pro_features",
	"manage_pro_earnings",
	"point_settings",
	"manage_cargos",
	"create_announcement",
	"manage_cities",
	"manage_countries",
	"manage_states",
	"generate-fake-users"
);
 
if(in_array($pageActive, $activePage)) { 
    if($pageActive == 'manage_cities'){
	    $cityCountryStateClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_countries'){
	    $cityCountryStateClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_states'){
	    $cityCountryStateClass = 'class="active activeSetting"';
	}
    if($pageActive == 'manage_earnings'){
	    $earnClass = 'class="active activeSetting"';
	}
	if($pageActive == 'create_announcement'){
	    $announce = 'class="active activeSetting"';
	}
	if($pageActive == 'pro_list_packages'){
	    $proClass = 'class="active activeSetting"';
	}
	if($pageActive == 'point_settings'){
	    $pointClass = 'class="active activeSetting"';
	}
	if($pageActive == 'create_new_pro_package'){
	    $proClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_pro_features'){
	    $proClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_pro_earnings'){
	    $proClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_withdrawals'){
	    $earnClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_points'){
	    $earnClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_boosts'){
	    $earnClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_theme_earnings'){
	    $earnClass = 'class="active activeSetting"';
	}
    if($pageActive == 'manage_market_features'){
	    $marketClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_cargos'){
	    $marketClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_market_categories'){
	    $marketClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_market_slider_advertisements'){
	    $marketClass = 'class="active activeSetting"';
	} 
    if($pageActive == 'user-management'){
	    $userClass = 'class="active activeSetting"';
	}
	if($pageActive == 'pro_user_management'){
	    $userClass = 'class="active activeSetting"';
	}
	if($pageActive == 'verified_user_management'){
	    $userClass = 'class="active activeSetting"';
	}
	if($pageActive == 'generate-fake-users'){
	    $userClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'manage_products'){
	    $productClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_boosted_products'){
	    $productClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'manage-colors'){
	    $featuresClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage-fonts'){
	    $featuresClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage-event-categories'){
	    $featuresClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage-event-covers'){
	    $featuresClass = 'class="active activeSetting"';
	}
	if($pageActive == 'dashboard'){
	    $dashClass = 'class="active activeSetting"';
	}  
	if($pageActive == 'site-settings'){
	    $settingClass = 'class="active activeSetting"';
	}
	if($pageActive == 'payment-method-settings'){
	    $settingClass = 'class="active activeSetting"';
	}
	if($pageActive == 'general-settings'){
	    $settingClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage-menu-icons'){
	    $settingClass = 'class="active activeSetting"';
	}
	if($pageActive == 'site-features'){
	    $settingClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'blocked-users'){
	    $userClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'post-reports'){
	    $reportClass = 'class="active activeSetting"';
	}
	if($pageActive == 'page-langauges'){
	    $langClass = 'class="active activeSetting"';
	}
	if($pageActive == 'add-new-language-keys'){
	   $langClass = 'class="active activeSetting"';
	}
	if($pageActive == 'wellcome-themes'){
	    $themeClass = 'class="active activeSetting"';
	}
	if($pageActive == 'market-themes'){
	    $themeClass = 'class="active activeSetting"';
	}
	if($pageActive == 'createads'){
	    $adsClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage-advertisements'){
	    $adsClass = 'class="active activeSetting"';
	}
	if($pageActive == 'ads-code-management'){
	    $adsClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'advertisement-settings'){
	    $adsClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage-stickers'){
	    $emoticonsClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage-feelings'){
	    $emoticonsClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'manage-gifs'){
	    $emoticonsClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'manage-watermarks'){
	    $emoticonsClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'user-text-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-image-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-video-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-audio-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-link-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-filter-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-gif-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-location-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-watermark-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-benchmark-posts'){
	    $postClass = 'class="active activeSetting"';
	}
	if($pageActive == 'user-beforeafter-posts'){
	    $postClass = 'class="active activeSetting"';
	} 
	if($pageActive == 'how_to_use'){
	    $pageClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_about_us'){
	    $pageClass = 'class="active activeSetting"';
	}
	if($pageActive == 'manage_privacy_policies'){
	    $pageClass = 'class="active activeSetting"';
	} 
} 
?>