<?php 
$searchIcon = $Dot->Dot_SelectedMenuIcon('search');
$exploreIcon = $Dot->Dot_SelectedMenuIcon('explore');
$likeNotificationButton = $Dot->Dot_SelectedMenuIcon('heart');
$messegernIcon =  $Dot->Dot_SelectedMenuIcon('messenger');
$userIcon = $Dot->Dot_SelectedMenuIcon('user'); 
$settingIcon = $Dot->Dot_SelectedMenuIcon('settings'); 
$eventIcon = $Dot->Dot_SelectedMenuIcon('event');
$dashboardIcon = $Dot->Dot_SelectedMenuIcon('admin');
$savedIcon = $Dot->Dot_SelectedMenuIcon('saved');
$storiesIcon = $Dot->Dot_SelectedMenuIcon('story');
$languagesIcon = $Dot->Dot_SelectedMenuIcon('langauges');
$logoutIcon = $Dot->Dot_SelectedMenuIcon('logout');
$customizeIcon = $Dot->Dot_SelectedMenuIcon('customize');
$backgroundImageIcon = $Dot->Dot_SelectedMenuIcon('background_image');
$backgroundMusicIcon =  $Dot->Dot_SelectedMenuIcon('bgaudio');   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> 
<?php if($page == 'status'){?>
 <title><?php echo $metaTitle;?></title>  
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $postMetaImage;?>" />
<meta property="og:image:secure_url" content="<?php echo $postMetaImage;?>" />
<meta property="og:description" content="<?php echo $dot_description;?>" />
<meta property="og:title" content="<?php echo $metaTitle;?>" />
<meta property="og:url" content="<?php echo $base_url;?>status/<?php echo $GetMessageID;?>" />
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $metaTitle;?>" />
<meta name="twitter:description" content="<?php echo $dot_description;?>" />
<meta name="twitter:image" content="<?php echo $postMetaImage;?>" />
<link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">  
<?php }else if($page == 'profile') {?>
<title><?php echo $ProfileUserFullName;?></title>
<meta property="og:site_name" content="<?php echo $dot_description;?>" />
<meta property="og:url" content="<?php echo $base_url;?>" />
<link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon"> 
<meta name="description" content="<?php echo $ProfileBio;?>" />
<meta name="keywords" content="<?php echo $dot_description;?>" />
<meta name="author" content="<?php echo $ProfileUserFullName;?>" />  
<?php }else if($page =='product'){?>
 <title><?php echo $dot_title;?></title>  
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php //echo $postMetaImage;?>" />
<meta property="og:image:secure_url" content="<?php //echo $postMetaImage;?>" />
<meta property="og:description" content="<?php echo $postMetaDescription;?>" />
<meta property="og:title" content="<?php //echo $metaTitle;?>" />
<meta property="og:url" content="<?php //echo $base_url;?>status/<?php echo $GetMessageID;?>" />
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $postMetaTitle;?>" />
<meta name="twitter:description" content="<?php echo $postMetaDescription;?>" />
<meta name="twitter:image" content="<?php //echo $postMetaImage;?>" />
<link rel="shortcut icon" href="<?php //echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php //echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">  
<?php }else if($page == 'market'){?>
  
<?php if($marketName){?><title><?php echo $marketName;?></title><meta property="og:site_name" content="<?php echo $marketName;?>" /><?php }else{?><title><?php echo $mo_UserFullName;?></title><meta property="og:site_name" content="oobenn Instagram Style Social Networking Platform Support" /><?php }?>
<meta property="og:url" content="<?php echo $base_url;?>" />
<?php include_once("market/$marketTheme/contents/css_files.php");?>
<?php } else{?> 
<title><?php echo $dot_title;?></title>
<meta property="og:site_name" content="oobenn Instagram Style Social Networking Platform Support" />
<meta property="og:url" content="<?php echo $base_url;?>" />
<link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon"> 
<meta name="description" content="<?php echo $dot_description;?>" />
<meta name="keywords" content="<?php echo $dot_description;?>" />
<meta name="author" content="<?php echo $dot_title;?>" />  
<?php }?>
<link rel="stylesheet" id="style_mode" href="<?php echo $base_url;?>css/<?php echo $styleMode;?>.css">
<?php if($dataUserType != '0' && $page  == 'admin'){?><link rel="stylesheet" href="<?php echo $base_url;?>admin/css/admin<?php echo $styleMode;?>.css" media="screen,projection"><?php }?>
<link rel="stylesheet" href="<?php echo $base_url;?>css/materialize.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/tooltip-master-css/tooltipster.bundle.min.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/animate.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/hover.css">
<link rel="stylesheet" href="<?php echo $base_url;?>requests/video_call/video_call.css"> 
<link rel="stylesheet" href="<?php echo $base_url;?>css/zuck.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/snapssenger.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/mediaelementplayer.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/lightGallery/lightgallery.css"> 
<link rel="stylesheet" href="<?php echo $base_url;?>css/croppie.css"> 
<link rel="stylesheet" href="<?php echo $base_url;?>css/weather.css"> 
<link rel="stylesheet" href="<?php echo $base_url;?>css/bfaf/images-compare.css"> 
<link rel="stylesheet" href="<?php echo $base_url;?>css/gif/freezeframe_styles.css"> 
<link rel="stylesheet" href="<?php echo $base_url;?>css/confettie/jquery.vnm.confettiButton.css"> 
<link rel="stylesheet" href="<?php echo $base_url;?>css/nouslider/nouislider.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/swiper/swiper.css">
<?php if($page == 'marketplace'){?>
<link rel="stylesheet" href="<?php echo $base_url;?>css/marketplace_<?php echo $styleMode;?>.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/swiper/swiper.css">
<?php }?>
<?php if($page == 'explore'){?>
<link rel="stylesheet" href="<?php echo $base_url;?>css/music/progres-bar.css"> 
<?php }?>
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>    
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-migrate-3.0.1.js"></script>   
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/tooltip-master-js/tooltipster.bundle.min.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.form.js"></script>    
<script type="text/javascript" src="<?php echo $base_url;?>js/ion.sound.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/voice/app.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/voice/Fr.voice.js"></script>    
<script type="text/javascript" src="<?php echo $base_url;?>js/voice/recorder.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/captureVideoFrame/capture-video-frame.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/timeago/<?php echo $page_Lang['timeagojs'][$dataUserPageLanguage];?>"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/linkify.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/linkify-jquery.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/linkify-html.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/autosize.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/osocial.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/mediaelement-and-player.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/xregexp-all.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/materialize.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/slick.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/visible.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/lightGallery/lightgallery-all.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/lightGallery/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/freezeframe.pkgd.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/music/player.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/swiper/swiper.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>requests/video_call/video_call.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/oobenn.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/annon.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/clipboard.min.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/charcounter.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/croppie.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/weather.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/theia-sticky-sidebar.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/confettie/jquery.vnm.confettiButton.js"></script> 

<?php  
if($dataOneSignalAppStatus == '1'){?>
<link rel="manifest" href="<?php echo $base_url;?>manifest.json">
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script> 
<script>

var push_user_id = ""; 
var my_id = "<?php echo $dataUserOneSignalKey;?>";
var OneSignal = window.OneSignal || [];
OneSignal.push([
  "init",
  {
    appId: "<?php echo $dataOneSignalAppID;?>",
    autoResubscribe: true,
    notifyButton: {
      enable: true /* Set to false to hide */
    },
    persistNotification: true
  }
]);

OneSignal.push(function() {
  OneSignal.getUserId(function(userId) {
    //alert(userId);
    push_user_id = userId;
    if (userId != my_id) {
      $.get("<?php echo $base_url.'requests/device';?>", {
        f: "device_key",
        id: push_user_id
      });
    }
  });
  OneSignal.on("subscriptionChange", function(isSubscribed) {
    if (isSubscribed == false) {
      $.get("<?php echo $base_url.'requests/device';?>", {
        f: "remove_device_key"
      }); 
    } else { 
      $.get("<?php echo $base_url.'requests/device';?>", {
        f: "device_key",
        id: push_user_id
      });
    }
  });
});
</script>
<?php }?>
<?php if($page == 'marketplace'){?>
<script type="text/javascript" src="<?php echo $base_url;?>js/swiper/swiper.js"></script> 
<?php }?>
<?php if($page == 'market'){  
   include_once("market/$marketTheme/contents/js_files.php");
 }?>
<?php if($page == 'events'){?>
<link rel="stylesheet" href="<?php echo $base_url;?>css/light-slider/lightslider.css">  
<script type="text/javascript" src="<?php echo $base_url;?>js/light-slider/lightslider.js"></script> 

<script>  
 $(document).ready(function() { 
  $("#autoWidth").livequery(function() {
    $(this).lightSlider({
            autoWidth:true,
            loop:true,
			controls: false,
            onSliderLoad: function() {
                //$('#autoWidth').removeClass('cS-hidden');
            } 
        }); 
  });    
  });
  </script>
<?php }?>
<?php if($dataUserType != '0' && $page  == 'admin'){?>
<script type="text/javascript" src="<?php echo $base_url;?>admin/js/admin.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>admin/js/Chart.min.js"></script> 
<script src="<?php echo $base_url;?>admin/js/jquery.autoresize.min.js"></script>
<?php } 

 if($page == 'profile'){
if($profilebuttonColors){
       $searchIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M83.2,19.2c-35.27042,0 -64,28.72958 -64,64c0,35.27042 28.72958,64 64,64c15.33765,0 29.42326,-5.44649 40.4625,-14.4875l38.2125,38.2125c1.60523,1.67194 3.98891,2.34544 6.23174,1.76076c2.24283,-0.58468 3.99434,-2.33619 4.57902,-4.57902c0.58468,-2.24283 -0.08882,-4.62651 -1.76076,-6.23174l-38.2125,-38.2125c9.04101,-11.03924 14.4875,-25.12485 14.4875,-40.4625c0,-35.27042 -28.72958,-64 -64,-64zM83.2,32c28.35279,0 51.2,22.84722 51.2,51.2c0,28.35279 -22.84721,51.2 -51.2,51.2c-28.35278,0 -51.2,-22.84721 -51.2,-51.2c0,-28.35278 22.84722,-51.2 51.2,-51.2z"></path></g></g></svg>';
	 $exploreIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM96,32c35.344,0 64,28.656 64,64c0,35.344 -28.656,64 -64,64c-35.344,0 -64,-28.656 -64,-64c0,-35.344 28.656,-64 64,-64zM136,56l-54.59375,25.40625l-25.40625,54.59375l54.59375,-25.40625zM96,87.20313c4.88,0 8.79687,3.91687 8.79687,8.79687c0,4.88 -3.91687,8.79687 -8.79687,8.79687c-4.88,0 -8.79687,-3.91687 -8.79687,-8.79687c0,-4.88 3.91687,-8.79687 8.79687,-8.79687z"></path></g></g></svg>';  
	 $likeNotificationButton = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><g id="surface1"><path d="M96,168.9375l-3,-1.75781c-3.07031,-1.75781 -75,-43.99219 -75,-89.17969c0,-23.15625 18.84375,-42 42,-42c15.25781,0 28.64063,8.17969 36,20.39063c7.35938,-12.21094 20.74219,-20.39063 36,-20.39063c23.15625,0 42,18.84375 42,42c0,45.1875 -71.92969,87.42188 -75,89.17969zM60,48c-16.54687,0 -30,13.45313 -30,30c0,33.63281 52.71094,68.67188 66,76.96875c13.28906,-8.29687 66,-43.33594 66,-76.96875c0,-16.54687 -13.45312,-30 -30,-30c-16.54687,0 -30,13.45313 -30,30h-12c0,-16.54687 -13.45312,-30 -30,-30z"></path></g></g></g></svg>';
	 $messegernIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><g id="surface1"><path d="M96,24c-39.53906,0 -72,30.82031 -72,69c0,20.34375 9.42188,38.41406 24,51v27.75l26.625,-13.3125c6.77344,2.03906 13.85156,3.5625 21.375,3.5625c39.53906,0 72,-30.82031 72,-69c0,-38.17969 -32.46094,-69 -72,-69zM96,36c33.35156,0 60,25.59375 60,57c0,31.40625 -26.64844,57 -60,57c-7.17187,0 -14.01562,-1.35937 -20.4375,-3.5625l-2.4375,-0.75l-13.125,6.5625v-13.5l-2.25,-1.875c-13.3125,-10.5 -21.75,-26.22656 -21.75,-43.875c0,-31.40625 26.64844,-57 60,-57zM89.25,74.0625l-36.1875,38.25l32.4375,-18l17.25,18.5625l35.8125,-38.8125l-31.6875,17.8125z"></path></g></g></g></svg>';
	 $userIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><g id="surface1"><path d="M96,24c-19.82813,0 -36,16.17187 -36,36c0,19.82813 16.17187,36 36,36c19.82813,0 36,-16.17187 36,-36c0,-19.82813 -16.17187,-36 -36,-36zM96,96c-33.04687,0 -60,26.95313 -60,60h12c0,-26.57813 21.42187,-48 48,-48c26.57813,0 48,21.42187 48,48h12c0,-33.04687 -26.95313,-60 -60,-60zM96,36c13.3125,0 24,10.6875 24,24c0,13.3125 -10.6875,24 -24,24c-13.3125,0 -24,-10.6875 -24,-24c0,-13.3125 10.6875,-24 24,-24z"></path></g></g></g></svg>';
	 $settingIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M83.92187,16c-3.832,0 -7.10775,2.70875 -7.84375,6.46875l-2.67188,13.71875c-6.56607,2.48291 -12.63742,5.95173 -17.96875,10.32812l-13.15625,-4.53125c-3.624,-1.248 -7.61125,0.2505 -9.53125,3.5625l-12.0625,20.90625c-1.912,3.32 -1.21612,7.53488 1.67188,10.04688l10.54687,9.17187c-0.5485,3.37082 -0.90625,6.8024 -0.90625,10.32813c0,3.52573 0.35774,6.9573 0.90625,10.32813l-10.54687,9.17187c-2.888,2.512 -3.58388,6.72687 -1.67188,10.04687l12.0625,20.90626c1.912,3.32 5.90725,4.81812 9.53125,3.57812l13.15625,-4.53125c5.32957,4.37365 11.40565,7.83071 17.96875,10.3125l2.67188,13.71875c0.736,3.76 4.01175,6.46875 7.84375,6.46875h24.15626c3.832,0 7.10774,-2.70875 7.84374,-6.46875l2.67188,-13.71875c6.56607,-2.4829 12.63742,-5.95173 17.96874,-10.32812l13.15626,4.53125c3.624,1.248 7.61125,-0.2425 9.53125,-3.5625l12.0625,-20.92188c1.91201,-3.32 1.21613,-7.51925 -1.67187,-10.03125l-10.54687,-9.17187c0.5485,-3.37082 0.90625,-6.8024 0.90625,-10.32813c0,-3.52573 -0.35774,-6.9573 -0.90625,-10.32813l10.54687,-9.17187c2.888,-2.512 3.58388,-6.72688 1.67187,-10.04688l-12.0625,-20.90625c-1.912,-3.32 -5.90725,-4.81813 -9.53125,-3.57812l-13.15626,4.53125c-5.32957,-4.37365 -11.40564,-7.83071 -17.96874,-10.3125l-2.67188,-13.71875c-0.736,-3.76 -4.01174,-6.46875 -7.84374,-6.46875zM96,64c17.672,0 32,14.328 32,32c0,17.672 -14.328,32 -32,32c-17.672,0 -32,-14.328 -32,-32c0,-17.672 14.328,-32 32,-32z"></path></g></g></svg>';
	 $eventIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="23" height="23" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><g id="surface1"><path d="M55.38462,0c-10.32692,0 -20.01923,2.94231 -28.15385,7.38462c2.94231,0 5.22115,1.52884 6.69231,3c1.47116,1.47116 2.25,3.54808 3,5.76923c5.91346,-2.9423 11.82693,-4.38462 18.46154,-4.38462c23.625,0 43.61538,19.24039 43.61538,43.61538c0,23.625 -19.24039,43.61538 -43.61538,43.61538c-23.625,0 -43.61538,-19.24039 -43.61538,-43.61538c0.25961,-0.05769 0.43269,0.08654 0.69231,0c0,-13.29808 6,-18.46154 6,-18.46154l6,5.07692c0.75,0.75 1.32693,0.92308 2.07692,0.92308c0.75,0 1.61538,-0.86538 1.61538,-1.61538c2.22115,-10.32692 1.38462,-23.48077 1.38462,-24.23077c0,-0.75 -0.69231,-1.61538 -0.69231,-1.61538c-0.75,-0.75 -0.86538,-0.69231 -1.61538,-0.69231c-0.75,0 -13.09615,-0.83654 -24.92308,1.38462c-0.75,0 -1.61538,0.86539 -1.61538,1.61538c0,0.75 -0.05769,2.07692 0.69231,2.07692l6.69231,6c0,0 -1.99038,3.0577 -3.92308,8.53846c-0.14423,0.31731 -0.31731,0.60577 -0.46154,0.92308c-0.28846,0.83654 -0.43269,1.61538 -0.69231,2.53846c-1.875,5.42308 -3,11.30769 -3,17.53846c0,30.28847 25.09616,55.38462 55.38462,55.38462c30.28847,0 55.38462,-25.09615 55.38462,-55.38462c0,-30.28846 -25.09615,-55.38462 -55.38462,-55.38462zM147.69231,14.76923c-4.4423,0 -7.38462,2.94231 -7.38462,7.38462v22.15385c0,4.44231 2.94231,7.38462 7.38462,7.38462c4.44231,0 7.38462,-2.9423 7.38462,-7.38462v-22.15385c0,-4.4423 -2.9423,-7.38462 -7.38462,-7.38462zM76.15385,29.53846c-0.75,0.08654 -1.24039,0.31731 -1.61538,0.69231l-18.46154,17.30769c-2.71153,-0.49038 -5.50962,-0.02884 -7.38462,1.84615c-2.9423,2.94231 -2.9423,8.30769 0,12c0.40385,0.40385 0.89423,0.63462 1.38462,0.92308l1.61538,18.23077c0,1.47116 0.75,3 3.69231,3c2.22115,0 3.69231,-2.25 3.69231,-3l1.15385,-18.92308c0.08654,-0.05769 0.14423,-0.17307 0.23077,-0.23077c1.875,-2.33654 2.56731,-5.25 2.07692,-7.84615l16.38462,-18.92308c0.75,-0.75 1.47116,-2.91346 0,-4.38462c-1.09615,-0.75 -2.01923,-0.77885 -2.76923,-0.69231zM112.15385,29.53846c3.69231,8.13462 6,16.99038 6,25.84615c0,6.63462 -0.77885,12.54808 -3,18.46154h62.07692v96c0,4.44231 -2.9423,7.38462 -7.38462,7.38462h-132.92308c-4.4423,0 -7.38462,-2.9423 -7.38462,-7.38462v-57.69231c-5.16346,-2.22115 -10.32692,-5.76923 -14.76923,-9.46154v66.46154c0,12.54808 9.60577,22.15385 22.15385,22.15385h132.92308c12.54808,0 22.15385,-9.60577 22.15385,-22.15385v-117.46154c0,-12.54808 -9.60577,-22.15385 -22.15385,-22.15385h-7.38462v14.76923c0,8.13462 -6.63461,14.76923 -14.76923,14.76923c-8.13461,0 -14.76923,-6.63461 -14.76923,-14.76923v-14.76923zM110.76923,88.61538v14.76923h14.76923v-14.76923zM140.30769,88.61538v14.76923h14.76923v-14.76923zM51.69231,118.15385v14.76923h14.76923v-14.76923zM81.23077,118.15385v14.76923h14.76923v-14.76923zM110.76923,118.15385v14.76923h14.76923v-14.76923zM140.30769,118.15385v14.76923h14.76923v-14.76923zM51.69231,147.69231v14.76923h14.76923v-14.76923zM81.23077,147.69231v14.76923h14.76923v-14.76923zM110.76923,147.69231v14.76923h14.76923v-14.76923zM140.30769,147.69231v14.76923h14.76923v-14.76923z"></path></g></g></g></svg>';
	 $dashboardIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M96,16c-48.6,0 -88,39.4 -88,88c0,21.272 7.552,40.784 20.12,56h135.768c12.56,-15.216 20.112,-34.728 20.112,-56c0,-48.6 -39.4,-88 -88,-88zM121.072,44.576c2.208,-3.824 7.104,-5.136 10.928,-2.928c3.824,2.208 5.136,7.104 2.928,10.928c-2.208,3.824 -7.104,5.136 -10.928,2.928c-3.824,-2.208 -5.136,-7.104 -2.928,-10.928zM96,32c4.416,0 8,3.584 8,8c0,4.416 -3.584,8 -8,8c-4.416,0 -8,-3.584 -8,-8c0,-4.416 3.584,-8 8,-8zM24,104c0,-4.416 3.584,-8 8,-8c4.416,0 8,3.584 8,8c0,4.416 -3.584,8 -8,8c-4.416,0 -8,-3.584 -8,-8zM44.576,142.928c-3.824,2.208 -8.72,0.896 -10.928,-2.928c-2.208,-3.824 -0.896,-8.72 2.928,-10.928c3.824,-2.208 8.72,-0.896 10.928,2.928c2.208,3.824 0.896,8.72 -2.928,10.928zM47.504,76c-2.208,3.824 -7.104,5.136 -10.928,2.928c-3.824,-2.208 -5.136,-7.104 -2.928,-10.928c2.208,-3.824 7.104,-5.136 10.928,-2.928c3.824,2.208 5.136,7.104 2.928,10.928zM68,55.504c-3.824,2.208 -8.72,0.896 -10.928,-2.928c-2.208,-3.824 -0.896,-8.72 2.928,-10.928c3.824,-2.208 8.72,-0.896 10.928,2.928c2.208,3.824 0.896,8.72 -2.928,10.928zM96,116c-6.624,0 -12,-5.376 -12,-12c0,-6.624 5.376,-12 12,-12c1.296,0 2.512,0.256 3.68,0.632l47.752,-27.568l8,13.856l-47.696,27.528c-1.128,5.456 -5.952,9.552 -11.736,9.552zM158.352,140c-2.208,3.824 -7.104,5.136 -10.928,2.928c-3.824,-2.208 -5.136,-7.104 -2.928,-10.928c2.208,-3.824 7.104,-5.136 10.928,-2.928c3.824,2.208 5.136,7.104 2.928,10.928zM160,112c-4.416,0 -8,-3.584 -8,-8c0,-4.416 3.584,-8 8,-8c4.416,0 8,3.584 8,8c0,4.416 -3.584,8 -8,8z"></path></g></g></svg>';
	 $savedIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M48,16c-1.105,0 -2.17695,0.11508 -3.21875,0.32812c-7.29258,1.49133 -12.78125,7.93688 -12.78125,15.67188v144l64,-24l64,24v-144c0,-1.1 -0.11406,-2.17969 -0.32813,-3.21875c-1.27828,-6.25078 -6.20234,-11.17484 -12.45312,-12.45312c-1.0418,-0.21305 -2.11375,-0.32812 -3.21875,-0.32812z"></path></g></g></svg>';
	 $storiesIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><g id="surface1"><path d="M96,0l-36.92308,22.15385l36.92308,22.15385v-14.76923c36.57692,0 66.46154,29.88462 66.46154,66.46154c0,36.57692 -29.88462,66.46154 -66.46154,66.46154c-36.57692,0 -66.46154,-29.88462 -66.46154,-66.46154c0,-18.11538 6.51923,-33.75 18.46154,-45.69231l-10.38462,-10.38462c-14.65385,14.65385 -22.84615,34.32693 -22.84615,56.07692c0,44.65385 36.57692,81.23077 81.23077,81.23077c44.65385,0 81.23077,-36.57692 81.23077,-81.23077c0,-44.65385 -36.57692,-81.23077 -81.23077,-81.23077zM80.53846,48.46154l-13.38462,6.46154l18.69231,36.92308c-0.51923,1.26923 -0.92308,2.71154 -0.92308,4.15385c0,0.14423 0,0.31731 0,0.46154l-23.76923,23.76923l10.61538,10.61538l23.76923,-23.76923c0.14423,0 0.31731,0 0.46154,0c6.11538,0 11.07692,-4.96154 11.07692,-11.07692c0,-5.10577 -3.375,-9.31731 -8.07692,-10.61538z"></path></g></g></g></svg>';
	 $languagesIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M32,24c-8.84,0 -16,7.16 -16,16v96c0,8.84 7.16,16 16,16h112l32,32v-144c0,-8.84 -7.16,-16 -16,-16zM57.496,56h13l25.504,64h-15l-4.752,-13.248h-24.496l-4.752,13.248h-15zM126.496,56h11v10.752h22.504v10.496c-1.624,13.872 -7.84,24.216 -18,31.248c2.752,0.44 5.624,0.752 8.752,0.752v10.752c-8.376,0 -16.184,-1.624 -22.752,-4.248c-7.56,2.84 -17.184,4.248 -24,4.248v-10.752c3.064,0 8.376,-0.312 11.752,-1c-6.064,-5.432 -11.752,-16.936 -11.752,-24.744h11.248c0,5.904 6.032,16.376 13.248,20.496c10.592,-5.064 17.44,-14.032 19.504,-26.752h-44v-10.496h22.496zM64,72.248l-8.504,24h17z"></path></g></g></svg>';
	 $logoutIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M96,0c-0.83446,0 -1.67157,0.276 -2.35096,0.80769c-0.66462,0.53169 -16.44335,15.33531 -26.55289,30.25962c-0.78277,1.15939 -0.84473,2.64692 -0.1875,3.86539c0.65723,1.22585 1.94308,1.99038 3.34615,1.99038h12.82212c0,0 2.17719,69.18484 3.12981,70.52884c1.41046,1.97908 5.96839,3.31731 9.77885,3.31731c3.80308,0 7.82769,-1.33823 9.23077,-3.31731c0.96,-1.33662 3.70673,-70.52884 3.70673,-70.52884h12.83654c1.39569,0 2.66712,-0.77192 3.33173,-1.99038c0.65723,-1.22585 0.58789,-2.71339 -0.1875,-3.86539c-10.10954,-14.92431 -25.88088,-29.73531 -26.55288,-30.25962c-0.69415,-0.54646 -1.52388,-0.80769 -2.35096,-0.80769zM138.57692,25.80288c1.02646,2.33354 1.73077,4.77115 1.73077,7.35577c0,3.04985 -0.759,6.08792 -2.22115,8.79808c-0.11815,0.22154 -0.30716,0.38423 -0.43269,0.60577c19.40677,13.29969 32.19231,35.56673 32.19231,60.82212c0,40.71877 -33.12738,73.84615 -73.84615,73.84615c-40.71877,0 -73.84615,-33.12738 -73.84615,-73.84615c0,-25.25538 12.79996,-47.508 32.20673,-60.80769c-0.13292,-0.22892 -0.336,-0.41273 -0.46154,-0.64904c-1.44738,-2.68062 -2.20673,-5.71938 -2.20673,-8.76923c0,-2.57723 0.71169,-5.01519 1.73077,-7.34135c-27.38954,15.07938 -45.96635,44.14454 -45.96635,77.56731c0,48.864 39.67927,88.61538 88.54327,88.61538c48.864,0 88.61538,-39.75138 88.61538,-88.61538c0,-33.42277 -18.64154,-62.50235 -46.03846,-77.58173z"></path></g></g></svg>';
	 $customizeIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><g id="surface1"><path d="M52.875,18l-4.125,4.3125l-26.4375,26.4375l-4.3125,4.125l43.125,43.125l-30,30l-0.375,1.875l-6.5625,33l-1.875,8.8125l8.8125,-1.875l33,-6.5625l1.875,-0.375l30,-30l42.9375,42.9375l4.125,-4.3125l26.4375,-26.4375l4.3125,-4.125l-42.9375,-42.9375l29.625,-29.625c9.65625,-9.65625 9.65625,-25.21875 0,-34.875c-4.82812,-4.82812 -11.13281,-7.3125 -17.4375,-7.3125c-6.30469,0 -12.60937,2.48438 -17.4375,7.3125l-29.625,29.625zM52.875,35.0625l11.625,11.8125l-8.8125,8.8125l8.625,8.625l8.8125,-8.8125l14.25,14.25l-17.8125,17.8125l-34.6875,-34.6875zM143.0625,35.8125c3.11719,0 6.28125,1.40625 9,4.125c5.41406,5.41406 5.41406,12.39844 0,17.8125l-3.9375,3.9375l-17.8125,-17.8125l3.9375,-3.9375c2.71875,-2.71875 5.69531,-4.125 8.8125,-4.125zM121.875,52.3125l17.8125,17.8125l-72.5625,72.5625c-3.96094,-7.61719 -10.19531,-13.85156 -17.8125,-17.8125zM122.4375,104.4375l14.25,14.25l-9,9l8.625,8.625l9,-9l11.4375,11.4375l-18,18l-34.3125,-34.3125zM41.625,134.4375c7.19531,3.02344 12.91406,8.74219 15.9375,15.9375l-19.875,3.9375z"></path></g></g></g></svg>';
	 $backgroundImageIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M65.65625,15.9375l-11.3125,11.3125l22.26562,22.26562l-46.21875,44.78125l-0.04687,0.04688c-9.22843,9.22842 -9.22843,24.49032 0,33.71874l40.79687,40.79688c9.22843,9.22842 24.08939,9.62935 32.92187,0.79687l40.79688,-40.79687c9.22842,-9.22843 9.22842,-24.49032 0,-33.71875l-16,-16zM87.90625,60.82812l29.64062,29.625l16,16c1.78579,1.78578 2.67188,3.66633 2.67188,5.54687h-97.04688c-0.28897,-2.1449 0.44549,-4.30486 2.48437,-6.34375zM160,128c0,0 -16,23.2 -16,32c0,8.8 7.2,16 16,16c8.8,0 16,-7.2 16,-16c0,-8.8 -16,-32 -16,-32z"></path></g></g></svg>';
	 $backgroundMusicIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><g id="surface1"><path d="M88,0v22.5c-0.0625,0.5 -0.0625,1 0,1.5v98.75c-6.65625,-2.6875 -14.875,-3.53125 -24,-1.25c-22.40625,5.59375 -40,25.8125 -40,45c0,19.1875 17.59375,30.34375 40,24.75c22.40625,-5.59375 40,-25.5625 40,-44.75c0,-0.4375 0.03125,-0.84375 0,-1.25c0.03125,-0.40625 0.03125,-0.84375 0,-1.25v-94.5c41.875,8.125 56,46.5 56,46.5v-28.75c0,-28 -31.1875,-67.25 -72,-67.25z"></path></g></g></g></svg>';
	 $logoutIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#'.$iconColorProfile.'"><path d="M96,0c-0.83446,0 -1.67157,0.276 -2.35096,0.80769c-0.66462,0.53169 -16.44335,15.33531 -26.55289,30.25962c-0.78277,1.15939 -0.84473,2.64692 -0.1875,3.86539c0.65723,1.22585 1.94308,1.99038 3.34615,1.99038h12.82212c0,0 2.17719,69.18484 3.12981,70.52884c1.41046,1.97908 5.96839,3.31731 9.77885,3.31731c3.80308,0 7.82769,-1.33823 9.23077,-3.31731c0.96,-1.33662 3.70673,-70.52884 3.70673,-70.52884h12.83654c1.39569,0 2.66712,-0.77192 3.33173,-1.99038c0.65723,-1.22585 0.58789,-2.71339 -0.1875,-3.86539c-10.10954,-14.92431 -25.88088,-29.73531 -26.55288,-30.25962c-0.69415,-0.54646 -1.52388,-0.80769 -2.35096,-0.80769zM138.57692,25.80288c1.02646,2.33354 1.73077,4.77115 1.73077,7.35577c0,3.04985 -0.759,6.08792 -2.22115,8.79808c-0.11815,0.22154 -0.30716,0.38423 -0.43269,0.60577c19.40677,13.29969 32.19231,35.56673 32.19231,60.82212c0,40.71877 -33.12738,73.84615 -73.84615,73.84615c-40.71877,0 -73.84615,-33.12738 -73.84615,-73.84615c0,-25.25538 12.79996,-47.508 32.20673,-60.80769c-0.13292,-0.22892 -0.336,-0.41273 -0.46154,-0.64904c-1.44738,-2.68062 -2.20673,-5.71938 -2.20673,-8.76923c0,-2.57723 0.71169,-5.01519 1.73077,-7.34135c-27.38954,15.07938 -45.96635,44.14454 -45.96635,77.56731c0,48.864 39.67927,88.61538 88.54327,88.61538c48.864,0 88.61538,-39.75138 88.61538,-88.61538c0,-33.42277 -18.64154,-62.50235 -46.03846,-77.58173z"></path></g></g></svg>';
 } 
 ?> 
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Aleo:300,300i,400,400i,700,700i|Bubbler+One|Charm:400,700|Coiny|Dancing+Script:400,700|Indie+Flower|Lobster|Montserrat:300i,400,400i,500,500i,600,600i,700,700i|Niconne|Parisienne|Quicksand:300,400,500,700|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Ranchers|ZCOOL+KuaiLe|ZCOOL+QingKe+HuangYou&subset=chinese-simplified,cyrillic,cyrillic-ext,latin-ext,tamil,thai,vietnamese');
  <?php  
     if($getBgColor){
		 
		 $split = str_split($iconColorProfile, 2);
         $r = hexdec($split[0]);
         $g = hexdec($split[1]);
         $b = hexdec($split[2]);  
	    echo '
		.main{background-color:#'.$getBgColor.';}
		.header_container , .headerMenu{background-color:#'.$getBgColor.';}
		.fx7hk {  border-top: 1px solid rgba('.$r.','.$g.','.$b.', .2) !important;  border-bottom: 1px solid rgba('.$r.','.$g.','.$b.', .2) !important; }
		.pUsrFlpsM_p_info{border: 1px solid rgba('.$r.','.$g.','.$b.', .2) !important; background-color: #'.$getBgColor.' !important;}
		.zMhqu .post_permalink { border-color: #'.$getBgColor.' #'.$getBgColor.' transparent transparent;  background: #d500f9; }';
	 } 
	 if($getTextColor){
		 echo '
		 .puTp{color:#'.$getTextColor.';}
		 .AC5d8{color:#'.$getTextColor.';}
		 .header_menu_item{color:#'.$getTextColor.';}
		 .fx7hk { background-color: #'.$getBgColor.';}
		 .XrOey:hover { background-color: transparent !important; border: 1px solid #'.$iconColorProfile.';}
		 .menu-arrow { border-bottom: 1px solid #'.$iconColorProfile.' !important;	}
		 .Ar2yR_{border:2px solid #'.$iconColorProfile.';background-color:#'.$getBgColor.';}
		 .Ar2yR_:hover { background-color: #'.$getBgColor.'; }
		 .info_title , .info_item_title , .info_item_answer , .info_item_box , .noResultf{color:#'.$getTextColor.';}
		 .info_title {border-bottom: 1px solid rgba('.$r.','.$g.','.$b.', .2) !important;}
		 .profile_avatar_image_container{border:2px solid #'.$iconColorProfile.';}
		 .iconWrp:hover { background-color: rgba('.$r.','.$g.','.$b.', .2) !important;}
		 .info_form_items{color:#'.$getTextColor.';}
		 ';
	 } 
	 if($iconColorProfile){
		 echo '
		 .hvr-underline-from-center::before {   background:  rgba('.$r.','.$g.','.$b.', .6) !important;}';
	 }
	  
	 if($getfon){
	    echo '.ttext_{ font-family : '.$getfon.';}.header_menu_item{font-family : '.$getfon.'; }.info_title, .info_item_title , .info_item_answer , .info_item_box , .noResultf{font-family : '.$getfon.';}.info_form_items{font-family : '.$getfon.';}';
	  } 
 
  ?> 
  
</style> 
<?php

} 
if($dot_googleAnalyticsCode){
   echo $dot_googleAnalyticsCode;
}?> 
<style>
.preloader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo $base_url;?>css/icons/output.svg') 50% 50% no-repeat rgb(249,249,249);
    opacity: 1;
} 
.button{
			display: inline-block;
			vertical-align: middle;
			margin: 0px 5px;
			padding: 5px 12px;
			cursor: pointer;
			outline: none;
			font-size: 13px;
			text-decoration: none !important;
			text-align: center;
			color:#fff;
			background-color: #4D90FE;
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			background-image: -ms-linear-gradient(top,#4D90FE, #4787ED);
			background-image: -o-linear-gradient(top,#4D90FE, #4787ED);
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			border: 1px solid #4787ED;
			box-shadow: 0 1px 3px #BFBFBF;
		}
		a.button{
			color: #fff;
		}
		.button:hover{
			box-shadow: inset 0px 1px 1px #8C8C8C;
		}
		.button.disabled{
			box-shadow:none;
			opacity:0.7;
		}
    canvas{
      display: block;
    }
</style>

<script type="text/javascript"> 
		var senseSpeed = 25;
		var previousScroll = 0;
		$(window).scroll(function(event){
		   var scroller = $(this).scrollTop();
		   if (scroller-senseSpeed > previousScroll){
			  $("div.mobile_bottomMenuContainer").fadeOut();
		   } else if (scroller+senseSpeed < previousScroll) {
			  $("div.mobile_bottomMenuContainer").fadeIn();
		   }
		   previousScroll = scroller;
		});

</script>
</head> 
<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
<body id="the_page" data-current="<?php echo $actual_link; ?>"> 
<div class="note_1"><div class="newWarningDisplay"><?php echo $page_Lang['please_try_again_later'][$dataUserPageLanguage];?></div></div> 
<div class="note_2"><div class="newWarningNoteDisplay"><?php echo $page_Lang['you_can_not_send_empty_text_post'][$dataUserPageLanguage];?></div></div> 
<div class="note_3"><div class="newnote_3"><?php echo $page_Lang['you_should_upload_photo'][$dataUserPageLanguage];?></div></div> 
<div class="note_4"><div class="newnote_4"><?php echo $page_Lang['yous_shoud_upload_vide_here'][$dataUserPageLanguage];?></div></div> 
<div class="note_5"><div class="newnote_4"><?php echo $page_Lang['you_should_write_a_link'][$dataUserPageLanguage];?></div></div>
<div class="note_6"><div class="newnote_4"><?php echo $page_Lang['you_should_upload_filter_image'][$dataUserPageLanguage];?></div></div>
<div class="note_7"><div class="newnote_4"><?php echo $page_Lang['you_should_select_gif'][$dataUserPageLanguage];?></div></div>
<div class="note_8"><div class="newnote_8"><?php echo $page_Lang['you_should_write_location'][$dataUserPageLanguage];?></div></div>
<div class="note_9"><div class="newnote_4"><?php echo $page_Lang['you_can_not_send_empty_watermark_post'][$dataUserPageLanguage];?></div></div>
<div class="note_10"><div class="newnote_9"><?php echo $page_Lang['you_can_not_send_empty_benchmark_post'][$dataUserPageLanguage];?></div></div>
<div class="note_11"><div class="newnote_4"><?php echo $page_Lang['music_format'][$dataUserPageLanguage];?></div></div>
<div class="note_12"><div class="newnote_3"><?php echo $page_Lang['successfully_deleted'][$dataUserPageLanguage];?></div></div>
<div class="note_12"><div class="newnote_3"><?php echo $page_Lang['nobody_see_this_story'][$dataUserPageLanguage];?></div></div>
<div class="note_13"><div class="newnote_3"><?php echo $page_Lang['an_error_embed'][$dataUserPageLanguage];?></div></div>
<div class="note_14"><div class="newnote_9"><?php echo $page_Lang['an_error_embed'][$dataUserPageLanguage];?></div></div> 
<div class="note_15"><div class="newnote_9"><?php echo $page_Lang['need_all_fields_filled'][$dataUserPageLanguage];?></div></div>
<!--HEADER STARTED-->
<div class="header_container pageResType" id="view" data-type="view" data-page="<?php echo $pageRequestType;?>">
  <div class="header_in">
    <div class="oJZym"> 
      <div class="aU2HW">  
          <a class="logos _7mese insta_font Szr5J is_big" href="<?php echo $base_url;?>" style="height: 35px;width: 176px;"><img src="<?php echo $base_url.'uploads/logo/'.$dot_logo;?>" /></a> 
          <a class="logos _7mese insta_font Szr5JMini" href="<?php echo $base_url;?>" style="height: 35px;width: 35px;"><img src="<?php echo $base_url.'uploads/logo/'.$dot_logo_mini;?>" /></a> 
      </div>
    </div> 
      <div class="ctQZg">
      <?php if($hash){?>
        <div class="_47KiJ">
          <?php if($page != 'newsfeed'){?><div class="XrOey" id="new_post_create" data-type="new_post_create"><a class="it"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M96,7.68c-48.70272,0 -88.32,39.61728 -88.32,88.32c0,48.70272 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.61728 88.32,-88.32c0,-48.70272 -39.61728,-88.32 -88.32,-88.32zM142.08,99.84h-42.24v42.24h-7.68v-42.24h-42.24v-7.68h42.24v-42.24h7.68v42.24h42.24z"></path></g></g></svg></a></div><?php } ?> 
         <div class="XrOey" id="searchFriend" data-type="searchPeople"><a class="it"><?php echo $searchIcon;?> </a></div>
          <div class="XrOey"><a class="iti" href="<?php echo $base_url;?>explore"><?php echo $exploreIcon;?></a></div>
          <div class="XrOey" id="new_n" data-type="getNewNotification" data-newnotification="0" data-newmention="0" data-newevent="0">
              <a class="iti newnot">
                  <span class="Szr5J Szr5J_not_c"></span> 
                   <?php echo $likeNotificationButton;?>
              </a>
          </div>
          <div class="XrOey" id="new_m" data-type="getNewMessage" data-newmessage="0">
              <a class="it msgnot" id="notificationMessage">
                  <span class="Szr5J Szr5J_not_c_m"></span>
                   <?php echo $messegernIcon;?>
              </a>
          </div>
          <div class="XrOey" id="fastHeaderMenu">
              <span class="iti"><?php echo $userIcon;?></span>
              <div class="headerMenu">
              	<a href="<?php echo $base_url.'profile/'.$dataUsername;?>"><div class="header_menu_item hvr-underline-from-center"><span class="avatarProfile"><img src="<?php echo $dataUserAvatar;?>" class="a0uk" /></span> <?php echo $page_Lang['profile'][$dataUserPageLanguage];?></div></a>
                 <a href="<?php echo $base_url;?>settings"><div class="header_menu_item hvr-underline-from-center"><span class="it"><?php echo $settingIcon;?></span> <?php echo $page_Lang['settings'][$dataUserPageLanguage];?></div></a> 
                 <?php if($showHideEventFeature != '1'){?>
                 <div class="menu-arrow"></div>
                 <div class="header_menu_item hvr-underline-from-center createNew_" data-type="newEvent"><span class="it"><?php echo $eventIcon;?></span> <?php echo $page_Lang['create_event'][$dataUserPageLanguage];?></div>
                 <?php }?>
				 <?php if($marketPost == 0){?>
                 
                 <div class="header_menu_item hvr-underline-from-center newMarket" data-type="newMarket"><span class="it"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M17.91667,68.08333h136.16667v68.08333h-136.16667z" fill="#cfd8dc"></path><path d="M17.91667,136.16667h136.16667v14.33333h-136.16667z" fill="#b0bec5"></path><path d="M96.75,86h43v64.5h-43z" fill="#455a64"></path><path d="M32.25,86h50.16667v39.41667h-50.16667z" fill="#e3f2fd"></path><path d="M35.83333,89.58333h43v32.25h-43z" fill="#1e88e5"></path><path d="M130.79167,120.04167c-1.075,0 -1.79167,0.71667 -1.79167,1.79167v7.16667c0,1.075 0.71667,1.79167 1.79167,1.79167c1.075,0 1.79167,-0.71667 1.79167,-1.79167v-7.16667c0,-1.075 -0.71667,-1.79167 -1.79167,-1.79167z" fill="#90a4ae"></path><path d="M86,57.33333c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM129,57.33333c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM43,57.33333c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z" fill="#558b2f"></path><path d="M143.33333,21.5h-114.66667c-3.94167,0 -7.16667,3.225 -7.16667,7.16667v10.75h129v-10.75c0,-3.94167 -3.225,-7.16667 -7.16667,-7.16667zM75.25,39.41667h21.5v28.66667h-21.5zM132.58333,39.41667h-17.91667l3.58333,28.66667h21.5zM39.41667,39.41667h17.91667l-3.58333,28.66667h-21.5z" fill="#7cb342"></path><g fill="#ffa000"><path d="M107.5,57.33333c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM161.25,68.08333c0,6.09167 -4.65833,10.75 -10.75,10.75c-6.09167,0 -10.75,-4.65833 -10.75,-10.75c0,-6.09167 4.65833,-10.75 10.75,-10.75zM64.5,57.33333c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM10.75,68.08333c0,6.09167 4.65833,10.75 10.75,10.75c6.09167,0 10.75,-4.65833 10.75,-10.75c0,-6.09167 -4.65833,-10.75 -10.75,-10.75z"></path></g><g fill="#ffc107"><path d="M114.66667,39.41667h-17.91667v28.66667h21.5zM150.5,39.41667h-17.91667l7.16667,28.66667h21.5zM57.33333,39.41667h17.91667v28.66667h-21.5zM21.5,39.41667h17.91667l-7.16667,28.66667h-21.5z"></path></g></g></g></svg></span> <?php echo $page_Lang['create_online_marketplace'][$dataUserPageLanguage];?></div>
                 <?php } ?>
                 <div class="menu-arrow"></div>  
                 <?php if($dataUserType == '1'){?>  
					<a href="<?php echo $base_url;?>dashboard/dashboard"><div class="header_menu_item hvr-underline-from-center"><span class="it"><?php echo $dashboardIcon;?></span> <?php echo $page_Lang['dashboard_admin'][$dataUserPageLanguage];?></div></a>
              	 <?php } ?>
                 <a href="<?php echo $base_url;?>saved"><div class="header_menu_item hvr-underline-from-center"><span class="it"><?php echo $savedIcon;?></span> <?php echo $page_Lang['saved_posts'][$dataUserPageLanguage];?></div></a>
                 <a href="<?php echo $base_url;?>chat"><div class="header_menu_item hvr-underline-from-center"><span class="it"><?php echo $messegernIcon;?></span> <?php echo $page_Lang['messages_text'][$dataUserPageLanguage];?></div></a>
                 <a href="<?php echo $base_url.'profile/stories/'.$dataUsername;?>"><div class="header_menu_item hvr-underline-from-center"><span class="it"><?php echo $storiesIcon;?></span> <?php echo $page_Lang['my_stories'][$dataUserPageLanguage];?></div></a>
                 <div class="menu-arrow"></div>
                 <?php  if($showHideChooseLang == '0'){?> 
                  <div class="header_menu_item hvr-underline-from-center" id="openLangs" data-type="openLangs"><span class="it"><?php echo $languagesIcon;?></span> <?php echo $page_Lang['change_your_language'][$dataUserPageLanguage];?></div> 
                 <?php }?>
                  <div class="header_menu_item hvr-underline-from-center changeStyleMode" id="getNight" data-type="dayNightMode" data-mode="<?php echo $styleMode;?>" data-light="<?php echo $page_Lang['night_mode'][$dataUserPageLanguage];?>" data-night="<?php echo $page_Lang['day_mode'][$dataUserPageLanguage];?>"><span class="it"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#<?php echo $iconColorProfile;?>"><path d="M76.74,7.6275c-2.11782,0.0331 -3.809,1.77462 -3.78,3.8925v19.2c-0.01959,1.38484 0.708,2.67295 1.90415,3.37109c1.19615,0.69814 2.67555,0.69814 3.8717,0c1.19615,-0.69814 1.92374,-1.98625 1.90415,-3.37109v-19.2c0.01421,-1.03795 -0.39236,-2.03745 -1.12708,-2.77076c-0.73472,-0.73331 -1.735,-1.13795 -2.77292,-1.12174zM176.565,11.4825c-0.99763,0.02973 -1.94449,0.44667 -2.64,1.1625l-161.28,161.28c-1.00315,0.96314 -1.40725,2.39334 -1.05643,3.73903c0.35081,1.34569 1.40171,2.39659 2.7474,2.7474c1.34569,0.35081 2.77589,-0.05328 3.73903,-1.05644l161.28,-161.28c1.13572,-1.10397 1.4772,-2.79193 0.85991,-4.25054c-0.6173,-1.45861 -2.06674,-2.38864 -3.64991,-2.34195zM30.6,26.76c-1.56258,0.00041 -2.96912,0.94754 -3.55711,2.39528c-0.58799,1.44774 -0.24018,3.10738 0.87961,4.19722l13.5825,13.5825c0.96314,1.00316 2.39335,1.40727 3.73904,1.05646c1.3457,-0.35081 2.3966,-1.40171 2.74741,-2.74741c0.35081,-1.3457 -0.05329,-2.77591 -1.05646,-3.73904l-13.5825,-13.5825c-0.72296,-0.74317 -1.71569,-1.16244 -2.7525,-1.1625zM122.8875,26.76c-0.99763,0.02973 -1.94449,0.44667 -2.64,1.1625l-13.5825,13.5825c-1.00316,0.96314 -1.40727,2.39335 -1.05646,3.73904c0.35081,1.3457 1.40171,2.3966 2.74741,2.74741c1.3457,0.35081 2.77591,-0.05329 3.73904,-1.05646l13.5825,-13.5825c1.13572,-1.10397 1.47721,-2.79193 0.85991,-4.25055c-0.6173,-1.45861 -2.06674,-2.38864 -3.64991,-2.34195zM76.8,42.27c-8.84976,0 -17.6958,3.3708 -24.435,10.11c-6.528,6.52416 -10.125,15.21114 -10.125,24.4425c0,9.22752 3.597,17.90334 10.125,24.4275c1.9392,1.9392 4.06128,3.55662 6.3,4.9275l47.505,-47.505c-1.38624,-2.25408 -3.01884,-4.37634 -4.935,-6.2925c-6.73728,-6.7392 -15.58524,-10.11 -24.435,-10.11zM172.74,61.3875c-2.11782,0.0331 -3.809,1.77462 -3.78,3.8925v3.84h-3.84c-1.38484,-0.01959 -2.67295,0.708 -3.37109,1.90415c-0.69814,1.19615 -0.69814,2.67555 0,3.8717c0.69814,1.19615 1.98625,1.92374 3.37109,1.90415h3.84v3.84c-0.01959,1.38484 0.708,2.67295 1.90415,3.37109c1.19615,0.69814 2.67555,0.69814 3.8717,0c1.19615,-0.69814 1.92374,-1.98625 1.90415,-3.37109v-3.84h3.84c1.38484,0.01959 2.67295,-0.708 3.37109,-1.90415c0.69814,-1.19615 0.69814,-2.67555 0,-3.8717c-0.69814,-1.19615 -1.98625,-1.92374 -3.37109,-1.90415h-3.84v-3.84c0.01421,-1.03795 -0.39236,-2.03745 -1.12708,-2.77076c-0.73472,-0.73331 -1.735,-1.13795 -2.77292,-1.12174zM11.52,72.96c-1.38484,-0.01959 -2.67295,0.708 -3.37109,1.90415c-0.69814,1.19615 -0.69814,2.67555 0,3.8717c0.69814,1.19615 1.98625,1.92374 3.37109,1.90415h19.2c1.38484,0.01959 2.67295,-0.708 3.37109,-1.90415c0.69814,-1.19615 0.69814,-2.67555 0,-3.8717c-0.69814,-1.19615 -1.98625,-1.92374 -3.37109,-1.90415zM144.2625,96c-4.55094,-0.0306 -9.30264,0.7443 -14.19,2.5875c-14.11968,5.32608 -24.50916,18.19212 -26.145,33.195c-2.81856,25.82784 18.78216,47.42856 44.61,44.61c15.00288,-1.63584 27.86892,-12.02532 33.195,-26.145c2.4576,-6.51648 3.0129,-12.79212 2.3025,-18.675c-0.12672,-1.04448 -1.54224,-1.23366 -1.98,-0.2775c-4.17792,9.18144 -13.73886,15.39096 -24.6675,14.55c-12.02304,-0.92544 -21.9909,-10.8933 -22.9125,-22.9125c-0.84096,-10.92864 5.36856,-20.48574 14.55,-24.6675c0.95616,-0.43776 0.76698,-1.85328 -0.2775,-1.98c-1.47072,-0.17856 -2.96802,-0.2748 -4.485,-0.285zM44.145,105.5025c-0.99763,0.02973 -1.94449,0.44667 -2.64,1.1625l-13.5825,13.5825c-1.00312,0.96315 -1.40719,2.39333 -1.05638,3.73901c0.35082,1.34567 1.4017,2.39656 2.74737,2.74737c1.34567,0.35082 2.77586,-0.05325 3.73901,-1.05637l13.5825,-13.5825c1.13572,-1.10397 1.47721,-2.79193 0.85991,-4.25055c-0.6173,-1.45861 -2.06674,-2.38864 -3.64991,-2.34196zM84.42,161.2275c-2.11782,0.0331 -3.809,1.77462 -3.78,3.8925v3.84h-3.84c-1.38484,-0.01959 -2.67295,0.708 -3.37109,1.90415c-0.69814,1.19615 -0.69814,2.67555 0,3.8717c0.69814,1.19615 1.98625,1.92374 3.37109,1.90415h3.84v3.84c-0.01959,1.38484 0.708,2.67295 1.90415,3.37109c1.19615,0.69814 2.67555,0.69814 3.8717,0c1.19615,-0.69814 1.92374,-1.98625 1.90415,-3.37109v-3.84h3.84c1.38484,0.01959 2.67295,-0.708 3.37109,-1.90415c0.69814,-1.19615 0.69814,-2.67555 0,-3.8717c-0.69814,-1.19615 -1.98625,-1.92374 -3.37109,-1.90415h-3.84v-3.84c0.01421,-1.03795 -0.39236,-2.03745 -1.12708,-2.77076c-0.73472,-0.73331 -1.735,-1.13795 -2.77292,-1.12174z"></path></g></g></svg></span> <span id="dy_text"><?php echo $DayNigtMode;?></span></div>
                  <?php if($page == 'profile'){ if($FriendStatus == 'me'){?>
                    <?php if($userCanCustomizeProfile == 1){?><div class="header_menu_item hvr-underline-from-center changeProfileDesign" data-type="chageProfileDesign"><span class="it"><?php echo $customizeIcon;?></span> <span id="dy_text"><?php echo $page_Lang['customize_profile'][$dataUserPageLanguage];?></span></div><?php }?>
				  <?php if($userCanChangeBackground == 1){?><div class="header_menu_item hvr-underline-from-center changeProfileBg" data-type="profileBackground"><span class="it"><?php echo $backgroundImageIcon;?></span> <span id="dy_text"><?php echo $page_Lang['change_profile_background'][$dataUserPageLanguage];?></span></div><?php }?>
                  <?php if($userCanChangeBackgroundSound == 1){?><div class="header_menu_item hvr-underline-from-center changeProfileBgAudio" data-type="bgAudio"><span class="it"><?php echo $backgroundMusicIcon;?></span> <span id="dy_text"><?php echo $page_Lang['change_profile_background_audio'][$dataUserPageLanguage];?></span></div><?php }?>
				  <?php }}?>
                  <div class="menu-arrow"></div>
                  <a href="<?php echo $base_url;?>logout"><div class="header_menu_item hvr-underline-from-center" id="logout-hide"><span class="iti"><?php echo $logoutIcon;?></span> <?php echo $page_Lang['logout'][$dataUserPageLanguage];?></div></a>
              </div>
          </div> 
        </div>
      <?php  }?>
      </div> 
  </div>
</div>
<!--HEADER FINISHED-->
