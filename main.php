<?php  
$page ='newsfeed'; 
//This file is displayed on all pages, all the changes you make can be displayed on all pages.   
include_once 'functions/inc.php';   
$pageMenu = 'menuhere';
function getCurrentOrParentDirectory($type='current')
{
    if ($type == 'current') {
        $path = dirname(__FILE__);  
    } else {
        $path = dirname(dirname(__FILE__));
    }
    $position = strrpos($path, '/') + 1;
    return substr($path, $position);
}  
include("contents/header.php");      
if(!empty($_COOKIE['lat']) && !empty($_COOKIE['lon'])) {
	 $latituu = $_COOKIE['lat'];
	 $longituu = $_COOKIE['lon'];  
	 $Dot->Dot_InsertOrUpdateLatitudeLongitude($uid, $latituu, $longituu); 
}
?>  
<?php if(isset($_GET['productid'])){ $pUrl = mysqli_real_escape_string($db, $_GET['productid']);?>  
<script type="text/javascript">
$(document).ready(function(){
function GetProduct(){ 
var pUrl = '<?php echo $pUrl;?>';
var type = 'productDetails';
var data = 'f='+type+'&prdct='+pUrl;
$.ajax({
	type: "POST",
	url: requestUrl + "requests/out",
	data: data, 
	beforeSend: function(){ 
	    $('body').addClass('disableScroll'); 
	},
	success: function(html) { 
		  if(html){
			  $("body").append(html);  
		     setTimeout(function() {
				 $('.product_popUp_container').removeClass('prdct_in');
			  }, 900);  
		  }else{
			  $('body').removeClass('disableScroll'); 
		  }
	}
}); 
}
GetProduct();  
});
</script>
<?php }?> 
<div class="section">
<div class="main"> 
<?php if($menuTypePosition == '1'){?>
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
<!---->
<div class="mobile_bottomMenuContainer">
  <div class="mobile_bottomMenuIn">
    <div class="mobile_bottomMenuMain">
      <div class="mobile_bottomMenuWrapper">
        <div class="mobile_bottomMenuItemWrapper">
          <div class="mobile_itemIcon mobile_rotateHorizontal leftMenuBtn">
            <?php echo $Dot->Dot_SelectedMenuIcon('mobile_item_right_icon');?>
          </div>
        </div>
        <div class="mobile_bottomMenuItemWrapper">
          <!---->
          <div class="mobile_itemIcon" id="new_post_create" data-type="new_post_create"> 
            <?php echo $Dot->Dot_SelectedMenuIcon('share_post_plus_icon');?>
          </div>
          <!---->
        </div>
        <div class="mobile_bottomMenuItemWrapper" id="openRightSidebarContainer">
          <div class="mobile_itemIcon">
            <?php echo $Dot->Dot_SelectedMenuIcon('mobile_item_left_icon');?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!---->
<?php 
include("contents/leftSideBarMenu.php"); } 
include("contents/chatRightSidebarWidget.php");    
?>
 
 <div class="container">   
      <!--MIDDLE STARTED-->
      <div class="cGcGK" id="choosPayments">  
      <?php if($dataEmailVerification == 1 || $verificationMailStatus == 0){ ?>
      <?php   
		if(!$headerAdsOpenClose == '1' && !empty($headerAdsCode)){
		?>
		<span class="headerAdsArea"><?php echo $headerAdsCode;?></span>
		<?php } ?>
	  <?php include("contents/share_stories.php");?> 
     <?php if($postTypePosition == '1'){?>
<div class="news_post_box_container"> 
          <?php echo $Dot->Dot_CheckTourSawBefore($uid, 1719) ? '<div style="position:absolute;width:100%;height:100%;z-index:1;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1719" data-tip="1719"></div>' : '';?>
          <div class="createNewPost_two"><div class="news_post_create">
             <?php echo $Dot->Dot_SelectedMenuIcon('share_post_plus_icon');?>
             </div><?php echo $page_Lang['what_is_your_mined_'][$dataUserPageLanguage];?> <?php echo $dataUserFullName;?> ? </div> 
          <div class="ppos_modal">
              <div class="postTypesButtons">
                   <?php echo $postType_Text == '0' ? '<div class="postButtonItem postButtoniconText" id="quickPost" data-category="textPost" style="padding:8px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg></div>':"";
				   echo $postType_Image == '0' ? '<div class="postButtonItem postButtoniconImage" id="quickPost" data-category="imagePost" style="padding:11px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg></div>':""; 
				   echo $postType_Video == '0' ? '<div class="postButtonItem postButtoniconVideo" id="quickPost" data-category="videoPost" style="padding-left:12px; padding-top:8px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M102.4,19.2c-14.1376,0 -25.6,11.4624 -25.6,25.6c0,14.1376 11.4624,25.6 25.6,25.6c14.1376,0 25.6,-11.4624 25.6,-25.6c0,-14.1376 -11.4624,-25.6 -25.6,-25.6zM38.4,32c-10.6048,0 -19.2,8.5952 -19.2,19.2c0,10.6048 8.5952,19.2 19.2,19.2c10.6048,0 19.2,-8.5952 19.2,-19.2c0,-10.6048 -8.5952,-19.2 -19.2,-19.2zM25.6,83.2c-7.072,0 -12.8,5.728 -12.8,12.8v64c0,7.072 5.728,12.8 12.8,12.8h89.6c7.072,0 12.8,-5.728 12.8,-12.8v-64c0,-7.072 -5.728,-12.8 -12.8,-12.8zM172.8,89.6c-1.26906,0.00128 -2.50909,0.37981 -3.5625,1.0875l-28.4375,18.1125v19.2v19.2l28.35,18.0625c0.10237,0.06545 0.20657,0.12798 0.3125,0.18749c1.00378,0.61798 2.15874,0.94673 3.3375,0.95c3.53462,0 6.4,-2.86538 6.4,-6.4v-32v-32c0,-3.53462 -2.86538,-6.4 -6.4,-6.4z"></path></g></g></svg></div>':"";
				   echo $postType_Audio == '0' ? '<div class="postButtonItem postButtoniconAudio" id="quickPost" data-category="musicPost" style="padding-left:10px; padding-top:8px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-39.696,0 -72,32.304 -72,72v64c0,8.84 7.16,16 16,16h24v-56h-24v-24c0,-30.88 25.12,-56 56,-56c30.88,0 56,25.12 56,56v24h-24v56h24c8.84,0 16,-7.16 16,-16v-64c0,-39.696 -32.304,-72 -72,-72z"></path></g></g></svg></div>':"";
				   echo $postType_Link == '0' ? '<div class="postButtonItem postButtoniconLink" id="quickPost" data-category="linkPost" style="padding-left:10px; padding-top:10px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-29.536,0 -55.31588,16.128 -69.17188,40h19.53125c7.2,-8.896 16.59525,-15.93638 27.53125,-19.98438c-2.504,5.824 -4.51087,12.62438 -6.04687,19.98438h16.45312c3.832,-15.816 9.19913,-24 11.70313,-24c2.504,0 7.87113,8.184 11.70313,24h16.45312c-1.536,-7.36 -3.55087,-14.16038 -6.04687,-19.98438c10.928,4.048 20.33125,11.08838 27.53125,19.98438h19.53125c-13.856,-23.872 -39.63587,-40 -69.17187,-40zM8,72l9.9375,48h10.46875l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM68.82812,72l9.9375,48h10.46875l6.79687,-27.76562l6.78125,27.76562h10.42188l9.9375,-48h-12.01562l-4.3125,26.92187l-6.375,-26.92187h-8.92188l-6.39062,26.96875l-4.26562,-26.96875zM129.65625,72l9.9375,48h10.46874l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM26.82812,136c13.856,23.872 39.63588,40 69.17188,40c29.536,0 55.31587,-16.128 69.17187,-40h-19.53125c-7.2,8.896 -16.59525,15.93638 -27.53125,19.98438c2.496,-5.824 4.49525,-12.62438 6.03125,-19.98438h-16.45312c-3.832,15.816 -9.19913,24 -11.70313,24c-2.504,0 -7.8555,-8.184 -11.6875,-24h-16.45312c1.536,7.36 3.55087,14.16038 6.04687,19.98438c-10.928,-4.048 -20.33125,-11.08838 -27.53125,-19.98438z"></path></g></g></svg></div>':"";
				   echo $postType_Filter == '0' ? '<div class="postButtonItem postButtoniconFilter" id="quickPost" data-category="filterPost" style="padding-left:10px; padding-top:10px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M80,16c-10.41288,0 -19.21711,6.70999 -22.53125,16h-33.46875c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h33.46875c3.31414,9.29001 12.11837,16 22.53125,16c13.232,0 24,-10.768 24,-24c0,-13.232 -10.768,-24 -24,-24zM128,32c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h40c2.88509,0.0408 5.56865,-1.475 7.0231,-3.96698c1.45445,-2.49198 1.45445,-5.57405 0,-8.06603c-1.45445,-2.49198 -4.13801,-4.00779 -7.0231,-3.96698zM120,72c-10.41287,0 -19.21711,6.70999 -22.53125,16h-73.46875c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h73.46875c3.31414,9.29001 12.11838,16 22.53125,16c13.232,0 24,-10.768 24,-24c0,-13.232 -10.768,-24 -24,-24zM168,88c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698c2.88509,0.0408 5.56865,-1.475 7.0231,-3.96698c1.45445,-2.49198 1.45445,-5.57405 0,-8.06603c-1.45445,-2.49198 -4.13801,-4.00779 -7.0231,-3.96698zM56,128c-10.41288,0 -19.21711,6.70999 -22.53125,16h-9.46875c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h9.46875c3.31414,9.29001 12.11837,16 22.53125,16c13.232,0 24,-10.768 24,-24c0,-13.232 -10.768,-24 -24,-24zM104,144c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h64c2.88509,0.0408 5.56865,-1.475 7.0231,-3.96698c1.45445,-2.49198 1.45445,-5.57405 0,-8.06603c-1.45445,-2.49198 -4.13801,-4.00779 -7.0231,-3.96698z"></path></g></g></svg></div>':"";
				   echo $postType_Giphy == '0' ? '<div class="postButtonItem purple darken-1" id="quickPost" data-category="giphy" style="padding-left:10px; padding-top:10px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M54,24c-9.87038,0 -18,8.12962 -18,18v54h12v-54c0,-3.37762 2.62238,-6 6,-6h54v36h36v24h12v-32.48437l-39.51563,-39.51563zM120,44.48437l15.51563,15.51563h-15.51563zM54,108c-9.87038,0 -18,8.12962 -18,18v12v12c0,9.87037 8.12962,18 18,18c9.87038,0 18,-8.12963 18,-18v-6h-18v12c-3.37762,0 -6,-2.62237 -6,-6v-12v-12c0,-3.37763 2.62238,-6 6,-6c3.37762,0 6,2.62237 6,6h12c0,-9.87038 -8.12962,-18 -18,-18zM84,108v60h12v-60zM108,108v60h12v-24h12v-12h-12v-12h24v-12z"></path></g></g></svg></div>':"";
				   echo $postType_Location == '0' ? '<div class="postButtonItem blue darken-1" id="quickPost" data-category="ulocation" style="padding-left:10px; padding-top:10px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M133.5,3c-22.8,0 -41.25,18.45059 -42,41.85059c-0.6,21.75 20.25117,50.39941 32.70117,65.39941c2.4,2.85 5.69883,4.35059 9.29883,4.35059c3.6,0 6.89883,-1.65059 9.29883,-4.35059c12.45,-15.15 33.45117,-43.64941 32.70117,-65.39941c-0.75,-23.4 -19.2,-41.85059 -42,-41.85059zM79.0957,11.42871c-0.31055,0.00762 -0.62754,0.04512 -0.94629,0.12012c-27,5.85 -49.19941,23.40117 -60.89941,48.45117c-9.75,21 -10.80059,44.70117 -2.85059,66.45117c7.95,21.75 23.85,39.29883 45,49.04883c11.7,5.4 24.15,8.25 36.75,8.25c10.05,0 20.10059,-1.8 29.85059,-5.25c21.9,-7.95 39.29883,-23.85 49.04883,-45c4.2,-9 6.75176,-18.45117 7.80175,-28.20117c0.3,-2.4 -1.50176,-4.64824 -4.05175,-4.94824c-2.4,-0.3 -4.64825,1.49883 -4.94825,4.04883c-0.9,8.7 -3.14942,17.25059 -6.89942,25.35059c-8.85,18.9 -24.45117,33.15059 -43.95117,40.35058c-19.5,7.05 -40.79883,6.14825 -59.54883,-2.55175c-2.85,-1.35 -5.55,-2.85 -8.25,-4.5c2.55,-0.15 5.24941,-0.9 7.64941,-2.25c2.7,-1.5 5.54824,-3.29942 8.69824,-5.39942c2.1,-1.5 3.9,-3.44825 5.25,-5.69824c1.5,-2.7 3.30117,-5.55058 4.20117,-8.85058c5.85,-22.5 -13.65,-23.40059 -14.25,-28.35059c-0.6,-5.55 6.60117,-9.75059 10.95117,-14.10059c4.35,-4.35 5.69824,-11.1 3.44824,-15c-7.2,-12.9 -24.29824,-6.15059 -25.94824,7.64941c-0.9,8.25 -5.85176,16.65 -10.05176,21c-4.2,4.2 -12.44824,1.95176 -14.69824,-4.19824c-2.55,-6.9 6.29824,-9.45176 4.94824,-18.30176c-0.3,-2.4 -2.85,-3.59883 -6,-4.04883l-10.35059,0.29883c1.05,-7.5 3.30059,-14.85 6.60059,-21.75c10.2,-22.65 30.15117,-38.39941 54.45117,-43.64942c2.4,-0.45 4.04824,-2.84941 3.44824,-5.39941c-0.39375,-2.1 -2.2793,-3.62461 -4.45312,-3.57129zM133.5,30c8.25,0 15,6.75 15,15c0,8.25 -6.75,15 -15,15c-8.25,0 -15,-6.75 -15,-15c0,-8.25 6.75,-15 15,-15z"></path></g></g></svg></div>':"";
				   echo $postType_Watermark == '0' ? '<div class="postButtonItem purple accent-4" id="quickPost" data-category="watermark"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1"></path><g id="Layer_1" stroke="none" stroke-width="1"><g id="surface1_121_"><path d="M96,16v80l-40,-69.276z" fill="#e91e63"></path><path d="M136,26.724l29.276,29.276l-69.276,40z" fill="#ff5722"></path><path d="M96,16l40,10.724l-40,69.276z" fill="#f44336"></path><path d="M96,176v-80l40,69.276z" fill="#8bc34a"></path><path d="M56,165.276l-29.276,-29.276l69.276,-40z" fill="#03a9f4"></path><path d="M96,176l-40,-10.724l40,-69.276z" fill="#4caf50"></path><path d="M176,96h-80l69.276,-40z" fill="#ff9800"></path><path d="M165.276,136l-29.276,29.276l-40,-69.276z" fill="#ffeb3b"></path><path d="M176,96l-10.724,40l-69.276,-40z" fill="#ffc107"></path><path d="M16,96h80l-69.276,40z" fill="#3f51b5"></path><path d="M26.724,56l29.276,-29.276l40,69.276z" fill="#9c27b0"></path><path d="M16,96l10.724,-40l69.276,40z" fill="#673ab7"></path></g></g><g fill="#ffffff" stroke="none" stroke-width="1"><path d="M90.825,117.19l-2.63,-10.04h-13.51l-2.63,10.04h-10.48l15.33,-49.05h9.06l15.43,49.05zM81.425,81.41l-4.59,17.49h9.17zM132.425,117.19h-9.6c-0.26667,-0.56 -0.53667,-1.50333 -0.81,-2.83v0c-1.70667,2.33333 -4.02,3.5 -6.94,3.5v0c-3.05333,0 -5.58333,-1.01 -7.59,-3.03c-2.01333,-2.02 -3.02,-4.63667 -3.02,-7.85v0c0,-3.82 1.22,-6.77333 3.66,-8.86c2.43333,-2.08667 5.94,-3.15333 10.52,-3.2v0h2.9v-2.93c0,-1.64 -0.28,-2.79667 -0.84,-3.47c-0.56,-0.67333 -1.38,-1.01 -2.46,-1.01v0c-2.38,0 -3.57,1.39333 -3.57,4.18v0h-9.54c0,-3.37333 1.26333,-6.15333 3.79,-8.34c2.52667,-2.19333 5.72333,-3.29 9.59,-3.29v0c4,0 7.09333,1.04 9.28,3.12c2.19333,2.07333 3.29,5.04333 3.29,8.91v0v17.15c0.04,3.14667 0.48667,5.60667 1.34,7.38v0zM117.205,110.38v0c1.05333,0 1.95,-0.21333 2.69,-0.64c0.74,-0.42667 1.29,-0.93 1.65,-1.51v0v-7.58h-2.29c-1.61333,0 -2.88667,0.51667 -3.82,1.55c-0.93333,1.03333 -1.4,2.41333 -1.4,4.14v0c0,2.69333 1.05667,4.04 3.17,4.04z"></path></g><path d="M51.575,127.86v-69.72h90.85v69.72z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0"></path></g></svg></div>':"";
				   echo $postType_Which == '0' ? '<div class="postButtonItem red darken-4" id="quickPost" data-category="which" style="padding-left:5px;padding-top:6px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg></div>':"";
				   echo $marketPost == '0' ? '<div class="postButtonItem yellow darken-3" id="quickPost" data-category="marketPlace" style="padding-left:5px;padding-top:6px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,5.73333c-1.4663,0 -2.93278,0.55882 -4.05364,1.67969l-38.45365,38.45365h16.21458l26.29271,-26.29271l26.29271,26.29271h16.21458l-38.45364,-38.45365c-1.12087,-1.12087 -2.58734,-1.67969 -4.05364,-1.67969zM17.2,57.33333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v11.46667c0,3.1648 2.56853,5.73333 5.73333,5.73333h0.95182l8.91354,53.48125c0.92307,5.52693 5.70843,9.58542 11.3099,9.58542h95.23828c5.6072,0 10.38683,-4.05848 11.30989,-9.58542l8.92474,-53.48125h0.95183c3.1648,0 5.73333,-2.56853 5.73333,-5.73333v-11.46667c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333zM63.06667,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM86,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM108.93333,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333z"></path></g></g></svg></div>':"";
				   echo $beforeAfterPost == '0' ? '<div class="postButtonItem teal darken-3" id="quickPost" data-category="beforeAfter" style="padding-left:10px;padding-top:9px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M17.2,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v137.6c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-58.48h-17.24703c-3.18888,4.24496 -8.24337,6.88 -13.71297,6.88c-9.48408,0 -17.2,-7.71592 -17.2,-17.2c0,-9.48408 7.71592,-17.2 17.2,-17.2c5.47304,0 10.52753,2.63504 13.71297,6.88h17.24703v-58.48c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM96.32,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v58.48h19.80687l-7.88781,-7.88781l14.59312,-14.59312l25.50438,25.50437c4.0248,4.0248 4.0248,10.56833 0,14.59313l-25.50438,25.50437l-14.59312,-14.59312l7.88781,-7.88781h-19.80687v58.48c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-137.6c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM119.39219,62.92781l-4.86437,4.86437l14.76781,14.76781h-71.40688c-1.45769,-4.12296 -5.35569,-6.87956 -9.72875,-6.88c-5.69958,0 -10.32,4.62042 -10.32,10.32c0,5.69958 4.62042,10.32 10.32,10.32c4.37059,-0.00329 8.26517,-2.75936 9.72203,-6.88h71.4136l-14.76781,14.76781l4.86437,4.86437l20.64,-20.64c1.34287,-1.34342 1.34287,-3.52095 0,-4.86437z"></path></g></g></svg></div>':"";
				   ?> 
              </div>
          </div>
      </div>
<?php } 
	  include("contents/announcements.php"); ?>   
      <div id="new_posts">
      
	   <?php  
			if($datasuggestedHashTagsNumber > $hashtagNumber){ 
				$Dot->Dot_UpdateShowSuggestedHashTags($uid); 
			}
			if($datasuggestedUsersNumber  > $usersNumber){ 
			   $Dot->Dot_UpdateShowSuggestedUsers($uid); 
			   $files = array(
					1=>'html_youmayknowusers_betweenposts',
					2=>'html_users_betweenposts');
				
				shuffle($files);
				
				for($i=0;$i<1;$i++) { 
					include("contents/$files[$i].php");
				} 
			}
			if($dataAdvertisementNumber  > $advertisementsNumber){  
			   $Dot->Dot_UpdateShowSuggestedAdvertisements($uid); 
			    include("contents/html_between_ads.php"); 
			}
			if($datagoogleAdvertisementsNumber  > $googleAdvertisementsNumber){ 
			   $Dot->Dot_UpdateShowSuggestedGoogleAdvertisements($uid); 
			    include("contents/html_between_ads_code.php"); 
			}
       // It is a page where all pictures, videos, texts and similar things shared by people are displayed.
       //The change you make here can be instantly viewed by everyone.
       include("contents/posts.php"); 
       ?>
        </div>    
        <?php }else{?> 
        <div class="verify_email_container"> 
    <div class="verify_header"></div>
    <div class="verify_ic"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M42.86563,128.4625c-10.75,-10.88438 -17.33438,-25.93438 -17.33438,-42.4625c0,-33.45937 27.00938,-60.46875 60.46875,-60.46875c33.45938,0 60.46875,27.00938 60.46875,60.46875c0,33.45938 -27.00937,60.46875 -60.46875,60.46875h-60.46875z" fill="#ffffff"></path><path d="M114.02647,19.96598c-10.49516,10.49552 -10.49486,27.51183 0.00066,38.00699c10.49552,10.49516 27.51183,10.49486 38.00699,-0.00066c10.49516,-10.49552 10.49486,-27.51183 -0.00066,-38.00699c-10.49552,-10.49516 -27.51183,-10.49486 -38.00699,0.00066z" fill="#71c2ff"></path><path d="M150.76875,42.19375v0c-8.86875,11.825 -26.60625,11.825 -35.475,0v0c-1.47812,-1.88125 -1.47812,-4.56875 0,-6.45v0c8.86875,-11.825 26.60625,-11.825 35.475,0v0c1.47812,1.88125 1.47812,4.56875 0,6.45z" fill="#ffffff"></path><path d="M128.27934,34.21835c-2.62379,2.62388 -2.62372,6.87796 0.00017,9.50175c2.62388,2.62379 6.87796,2.62372 9.50175,-0.00017c2.62379,-2.62388 2.62372,-6.87796 -0.00017,-9.50175c-2.62388,-2.62379 -6.87796,-2.62372 -9.50175,0.00017z" fill="#71c2ff"></path><path d="M86,150.5h-60.46875c-1.6125,0 -3.09062,-0.94063 -3.7625,-2.41875c-0.67187,-1.47813 -0.26875,-3.225 0.80625,-4.43438l14.78125,-15.31875c-10.2125,-11.69062 -15.85625,-26.60625 -15.85625,-42.32812c0,-35.60937 28.89063,-64.5 64.5,-64.5c1.74688,0 3.35938,0 5.10625,0.13438c2.28437,0.13438 3.89687,2.15 3.7625,4.3c-0.13437,2.28438 -2.15,3.89688 -4.3,3.7625c-1.6125,-0.13438 -3.09063,-0.13438 -4.56875,-0.13438c-31.175,0 -56.4375,25.2625 -56.4375,56.4375c0,14.91562 5.77813,29.025 16.25937,39.64063c1.47813,1.6125 1.6125,4.03125 0,5.64375l-10.75,11.15312h50.92813c31.175,0 56.4375,-25.2625 56.4375,-56.4375c0,-1.47813 0,-2.95625 -0.13438,-4.43438c-0.13437,-2.28437 1.47813,-4.16562 3.7625,-4.3c2.15,-0.13438 4.16562,1.47813 4.3,3.7625c0.13438,1.6125 0.13438,3.35938 0.13438,4.97187c0,35.60938 -28.89062,64.5 -64.5,64.5z" fill="#444b54"></path><path d="M108.84375,77.9375h-45.6875c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74687,-4.03125 4.03125,-4.03125h45.6875c2.28437,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125z" fill="#444b54"></path><g fill="#444b54"><path d="M88.6875,102.125h-25.53125c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74687,-4.03125 4.03125,-4.03125h25.53125c2.28437,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125z"></path></g><g fill="#444b54"><path d="M110.1875,102.125h-1.34375c-2.28437,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74688,-4.03125 4.03125,-4.03125h1.34375c2.28437,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125z"></path></g></g></g></svg></div>
    <div class="verify_email_title">Verify Your Email Address!</div>
    <div class="verification_note">
             Hello, your registration was successfully completed. There's only one step left. We have sent you an email to activate your membership. Please click on the link at the email address and activate your membership.
    </div>
    <div class="verification_not_yet_con">
        <div class="verification_not_yet_note">Didn't receive an activation email?</div>
        <div class="verification_send_again waves-effect waves-light btn blue vc">Send again.</div>
    </div>
  </div>
        <?php }?>
      </div>
      <!--MIDDLE FINISHED--> 
      
      <!--RIGHT SIDEBAR STARTED-->
      <?php  
         // These areas are the integrated states of all the boxes on the right side.
          include("contents/right_sidebar.php"); 
      ?>
      <!--RIGHT SIDEBAR FINISHED-->
 </div>
</div>
</div> 


      
<?php 
if($postTypePosition == '0'){?>
<div class="bottom_posts_button showZoomIn" id="">
   <div class="bottom_posts_button_in"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,7.68c-48.73231,0 -88.32,39.58769 -88.32,88.32c0,48.73231 39.58769,88.32 88.32,88.32c48.73231,0 88.32,-39.58769 88.32,-88.32c0,-48.73231 -39.58769,-88.32 -88.32,-88.32zM96,15.36c44.58172,0 80.64,36.05828 80.64,80.64c0,44.58172 -36.05828,80.64 -80.64,80.64c-44.58172,0 -80.64,-36.05828 -80.64,-80.64c0,-44.58172 36.05828,-80.64 80.64,-80.64zM92.16,49.92v42.24h-42.24v7.68h42.24v42.24h7.68v-42.24h42.24v-7.68h-42.24v-42.24z"></path></g></g></svg></div>
   <div class="bottom_menu_list_container"> 
                   <?php echo $postType_Text == '0' ? '<div class="postSendButton postSendButtonText" id="quickPost" data-category="textPost" style="padding-left:8px;padding-top:5px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg></div>':"";
				   echo $postType_Image == '0' ? '<div class="postSendButton postSendButtonImage" id="quickPost" data-category="imagePost" style="padding-left:9px;padding-top:8px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg></div>':""; 
				   echo $postType_Video == '0' ? '<div class="postSendButton postSendButtonVideo" id="quickPost" data-category="videoPost" style="padding-left:9px; padding-top:6px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M102.4,19.2c-14.1376,0 -25.6,11.4624 -25.6,25.6c0,14.1376 11.4624,25.6 25.6,25.6c14.1376,0 25.6,-11.4624 25.6,-25.6c0,-14.1376 -11.4624,-25.6 -25.6,-25.6zM38.4,32c-10.6048,0 -19.2,8.5952 -19.2,19.2c0,10.6048 8.5952,19.2 19.2,19.2c10.6048,0 19.2,-8.5952 19.2,-19.2c0,-10.6048 -8.5952,-19.2 -19.2,-19.2zM25.6,83.2c-7.072,0 -12.8,5.728 -12.8,12.8v64c0,7.072 5.728,12.8 12.8,12.8h89.6c7.072,0 12.8,-5.728 12.8,-12.8v-64c0,-7.072 -5.728,-12.8 -12.8,-12.8zM172.8,89.6c-1.26906,0.00128 -2.50909,0.37981 -3.5625,1.0875l-28.4375,18.1125v19.2v19.2l28.35,18.0625c0.10237,0.06545 0.20657,0.12798 0.3125,0.18749c1.00378,0.61798 2.15874,0.94673 3.3375,0.95c3.53462,0 6.4,-2.86538 6.4,-6.4v-32v-32c0,-3.53462 -2.86538,-6.4 -6.4,-6.4z"></path></g></g></svg></div>':"";
				   echo $postType_Audio == '0' ? '<div class="postSendButton postSendButtonMusic" id="quickPost" data-category="musicPost" style="padding-left:8px; padding-top:6px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-39.696,0 -72,32.304 -72,72v64c0,8.84 7.16,16 16,16h24v-56h-24v-24c0,-30.88 25.12,-56 56,-56c30.88,0 56,25.12 56,56v24h-24v56h24c8.84,0 16,-7.16 16,-16v-64c0,-39.696 -32.304,-72 -72,-72z"></path></g></g></svg></div>':""; 
				    echo $postType_Link == '0' ? '<div class="postSendButton postSendButtonLink" id="quickPost" data-category="linkPost" style="padding-left:8px; padding-top:8px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-29.536,0 -55.31588,16.128 -69.17188,40h19.53125c7.2,-8.896 16.59525,-15.93638 27.53125,-19.98438c-2.504,5.824 -4.51087,12.62438 -6.04687,19.98438h16.45312c3.832,-15.816 9.19913,-24 11.70313,-24c2.504,0 7.87113,8.184 11.70313,24h16.45312c-1.536,-7.36 -3.55087,-14.16038 -6.04687,-19.98438c10.928,4.048 20.33125,11.08838 27.53125,19.98438h19.53125c-13.856,-23.872 -39.63587,-40 -69.17187,-40zM8,72l9.9375,48h10.46875l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM68.82812,72l9.9375,48h10.46875l6.79687,-27.76562l6.78125,27.76562h10.42188l9.9375,-48h-12.01562l-4.3125,26.92187l-6.375,-26.92187h-8.92188l-6.39062,26.96875l-4.26562,-26.96875zM129.65625,72l9.9375,48h10.46874l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM26.82812,136c13.856,23.872 39.63588,40 69.17188,40c29.536,0 55.31587,-16.128 69.17187,-40h-19.53125c-7.2,8.896 -16.59525,15.93638 -27.53125,19.98438c2.496,-5.824 4.49525,-12.62438 6.03125,-19.98438h-16.45312c-3.832,15.816 -9.19913,24 -11.70313,24c-2.504,0 -7.8555,-8.184 -11.6875,-24h-16.45312c1.536,7.36 3.55087,14.16038 6.04687,19.98438c-10.928,-4.048 -20.33125,-11.08838 -27.53125,-19.98438z"></path></g></g></svg></div>':""; 
				    echo $postType_Filter == '0' ? '<div class="postSendButton postSendButtonFilters" id="quickPost" data-category="filterPost" style="padding-left:8px; padding-top:8px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M80,16c-10.41288,0 -19.21711,6.70999 -22.53125,16h-33.46875c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h33.46875c3.31414,9.29001 12.11837,16 22.53125,16c13.232,0 24,-10.768 24,-24c0,-13.232 -10.768,-24 -24,-24zM128,32c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h40c2.88509,0.0408 5.56865,-1.475 7.0231,-3.96698c1.45445,-2.49198 1.45445,-5.57405 0,-8.06603c-1.45445,-2.49198 -4.13801,-4.00779 -7.0231,-3.96698zM120,72c-10.41287,0 -19.21711,6.70999 -22.53125,16h-73.46875c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h73.46875c3.31414,9.29001 12.11838,16 22.53125,16c13.232,0 24,-10.768 24,-24c0,-13.232 -10.768,-24 -24,-24zM168,88c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698c2.88509,0.0408 5.56865,-1.475 7.0231,-3.96698c1.45445,-2.49198 1.45445,-5.57405 0,-8.06603c-1.45445,-2.49198 -4.13801,-4.00779 -7.0231,-3.96698zM56,128c-10.41288,0 -19.21711,6.70999 -22.53125,16h-9.46875c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h9.46875c3.31414,9.29001 12.11837,16 22.53125,16c13.232,0 24,-10.768 24,-24c0,-13.232 -10.768,-24 -24,-24zM104,144c-2.88509,-0.0408 -5.56865,1.475 -7.0231,3.96698c-1.45445,2.49198 -1.45445,5.57405 0,8.06603c1.45445,2.49198 4.13801,4.00779 7.0231,3.96698h64c2.88509,0.0408 5.56865,-1.475 7.0231,-3.96698c1.45445,-2.49198 1.45445,-5.57405 0,-8.06603c-1.45445,-2.49198 -4.13801,-4.00779 -7.0231,-3.96698z"></path></g></g></svg></div>':"";
				    echo $postType_Giphy == '0' ? '<div class="postSendButton purple darken-1" id="quickPost" data-category="giphy" style="padding-left:8px; padding-top:7px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M54,24c-9.87038,0 -18,8.12962 -18,18v54h12v-54c0,-3.37762 2.62238,-6 6,-6h54v36h36v24h12v-32.48437l-39.51563,-39.51563zM120,44.48437l15.51563,15.51563h-15.51563zM54,108c-9.87038,0 -18,8.12962 -18,18v12v12c0,9.87037 8.12962,18 18,18c9.87038,0 18,-8.12963 18,-18v-6h-18v12c-3.37762,0 -6,-2.62237 -6,-6v-12v-12c0,-3.37763 2.62238,-6 6,-6c3.37762,0 6,2.62237 6,6h12c0,-9.87038 -8.12962,-18 -18,-18zM84,108v60h12v-60zM108,108v60h12v-24h12v-12h-12v-12h24v-12z"></path></g></g></svg></div>':"";
				  echo $postType_Location == '0' ? '<div class="postSendButton blue darken-1" id="quickPost" data-category="ulocation" style="padding-left:8px; padding-top:8px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M133.5,3c-22.8,0 -41.25,18.45059 -42,41.85059c-0.6,21.75 20.25117,50.39941 32.70117,65.39941c2.4,2.85 5.69883,4.35059 9.29883,4.35059c3.6,0 6.89883,-1.65059 9.29883,-4.35059c12.45,-15.15 33.45117,-43.64941 32.70117,-65.39941c-0.75,-23.4 -19.2,-41.85059 -42,-41.85059zM79.0957,11.42871c-0.31055,0.00762 -0.62754,0.04512 -0.94629,0.12012c-27,5.85 -49.19941,23.40117 -60.89941,48.45117c-9.75,21 -10.80059,44.70117 -2.85059,66.45117c7.95,21.75 23.85,39.29883 45,49.04883c11.7,5.4 24.15,8.25 36.75,8.25c10.05,0 20.10059,-1.8 29.85059,-5.25c21.9,-7.95 39.29883,-23.85 49.04883,-45c4.2,-9 6.75176,-18.45117 7.80175,-28.20117c0.3,-2.4 -1.50176,-4.64824 -4.05175,-4.94824c-2.4,-0.3 -4.64825,1.49883 -4.94825,4.04883c-0.9,8.7 -3.14942,17.25059 -6.89942,25.35059c-8.85,18.9 -24.45117,33.15059 -43.95117,40.35058c-19.5,7.05 -40.79883,6.14825 -59.54883,-2.55175c-2.85,-1.35 -5.55,-2.85 -8.25,-4.5c2.55,-0.15 5.24941,-0.9 7.64941,-2.25c2.7,-1.5 5.54824,-3.29942 8.69824,-5.39942c2.1,-1.5 3.9,-3.44825 5.25,-5.69824c1.5,-2.7 3.30117,-5.55058 4.20117,-8.85058c5.85,-22.5 -13.65,-23.40059 -14.25,-28.35059c-0.6,-5.55 6.60117,-9.75059 10.95117,-14.10059c4.35,-4.35 5.69824,-11.1 3.44824,-15c-7.2,-12.9 -24.29824,-6.15059 -25.94824,7.64941c-0.9,8.25 -5.85176,16.65 -10.05176,21c-4.2,4.2 -12.44824,1.95176 -14.69824,-4.19824c-2.55,-6.9 6.29824,-9.45176 4.94824,-18.30176c-0.3,-2.4 -2.85,-3.59883 -6,-4.04883l-10.35059,0.29883c1.05,-7.5 3.30059,-14.85 6.60059,-21.75c10.2,-22.65 30.15117,-38.39941 54.45117,-43.64942c2.4,-0.45 4.04824,-2.84941 3.44824,-5.39941c-0.39375,-2.1 -2.2793,-3.62461 -4.45312,-3.57129zM133.5,30c8.25,0 15,6.75 15,15c0,8.25 -6.75,15 -15,15c-8.25,0 -15,-6.75 -15,-15c0,-8.25 6.75,-15 15,-15z"></path></g></g></svg></div>':""; 
				   echo $postType_Watermark == '0' ? '<div class="postSendButton purple accent-4" id="quickPost" data-category="watermark"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1"></path><g id="Layer_1" stroke="none" stroke-width="1"><g id="surface1_121_"><path d="M96,16v80l-40,-69.276z" fill="#e91e63"></path><path d="M136,26.724l29.276,29.276l-69.276,40z" fill="#ff5722"></path><path d="M96,16l40,10.724l-40,69.276z" fill="#f44336"></path><path d="M96,176v-80l40,69.276z" fill="#8bc34a"></path><path d="M56,165.276l-29.276,-29.276l69.276,-40z" fill="#03a9f4"></path><path d="M96,176l-40,-10.724l40,-69.276z" fill="#4caf50"></path><path d="M176,96h-80l69.276,-40z" fill="#ff9800"></path><path d="M165.276,136l-29.276,29.276l-40,-69.276z" fill="#ffeb3b"></path><path d="M176,96l-10.724,40l-69.276,-40z" fill="#ffc107"></path><path d="M16,96h80l-69.276,40z" fill="#3f51b5"></path><path d="M26.724,56l29.276,-29.276l40,69.276z" fill="#9c27b0"></path><path d="M16,96l10.724,-40l69.276,40z" fill="#673ab7"></path></g></g><g fill="#ffffff" stroke="none" stroke-width="1"><path d="M90.825,117.19l-2.63,-10.04h-13.51l-2.63,10.04h-10.48l15.33,-49.05h9.06l15.43,49.05zM81.425,81.41l-4.59,17.49h9.17zM132.425,117.19h-9.6c-0.26667,-0.56 -0.53667,-1.50333 -0.81,-2.83v0c-1.70667,2.33333 -4.02,3.5 -6.94,3.5v0c-3.05333,0 -5.58333,-1.01 -7.59,-3.03c-2.01333,-2.02 -3.02,-4.63667 -3.02,-7.85v0c0,-3.82 1.22,-6.77333 3.66,-8.86c2.43333,-2.08667 5.94,-3.15333 10.52,-3.2v0h2.9v-2.93c0,-1.64 -0.28,-2.79667 -0.84,-3.47c-0.56,-0.67333 -1.38,-1.01 -2.46,-1.01v0c-2.38,0 -3.57,1.39333 -3.57,4.18v0h-9.54c0,-3.37333 1.26333,-6.15333 3.79,-8.34c2.52667,-2.19333 5.72333,-3.29 9.59,-3.29v0c4,0 7.09333,1.04 9.28,3.12c2.19333,2.07333 3.29,5.04333 3.29,8.91v0v17.15c0.04,3.14667 0.48667,5.60667 1.34,7.38v0zM117.205,110.38v0c1.05333,0 1.95,-0.21333 2.69,-0.64c0.74,-0.42667 1.29,-0.93 1.65,-1.51v0v-7.58h-2.29c-1.61333,0 -2.88667,0.51667 -3.82,1.55c-0.93333,1.03333 -1.4,2.41333 -1.4,4.14v0c0,2.69333 1.05667,4.04 3.17,4.04z"></path></g><path d="M51.575,127.86v-69.72h90.85v69.72z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0"></path></g></svg></div>':""; 
               echo $postType_Which == '0' ? '<div class="postSendButton red darken-4" id="quickPost" data-category="which" style="padding-left:3px;padding-top:3px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg></div>':"";
			   echo $marketPost == '0' ? '<div class="postSendButton yellow darken-3" id="quickPost" data-category="marketPlace" style="padding-left:5px;padding-top:6px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,5.73333c-1.4663,0 -2.93278,0.55882 -4.05364,1.67969l-38.45365,38.45365h16.21458l26.29271,-26.29271l26.29271,26.29271h16.21458l-38.45364,-38.45365c-1.12087,-1.12087 -2.58734,-1.67969 -4.05364,-1.67969zM17.2,57.33333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v11.46667c0,3.1648 2.56853,5.73333 5.73333,5.73333h0.95182l8.91354,53.48125c0.92307,5.52693 5.70843,9.58542 11.3099,9.58542h95.23828c5.6072,0 10.38683,-4.05848 11.30989,-9.58542l8.92474,-53.48125h0.95183c3.1648,0 5.73333,-2.56853 5.73333,-5.73333v-11.46667c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333zM63.06667,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM86,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM108.93333,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333z"></path></g></g></svg></div>':"";
			   echo $beforeAfterPost == '0' ? '<div class="postSendButton teal darken-3" id="quickPost" data-category="beforeAfter" style="padding-left:10px;padding-top:9px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M17.2,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v137.6c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-58.48h-17.24703c-3.18888,4.24496 -8.24337,6.88 -13.71297,6.88c-9.48408,0 -17.2,-7.71592 -17.2,-17.2c0,-9.48408 7.71592,-17.2 17.2,-17.2c5.47304,0 10.52753,2.63504 13.71297,6.88h17.24703v-58.48c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM96.32,13.76c-1.90232,0 -3.44,1.53768 -3.44,3.44v58.48h19.80687l-7.88781,-7.88781l14.59312,-14.59312l25.50438,25.50437c4.0248,4.0248 4.0248,10.56833 0,14.59313l-25.50438,25.50437l-14.59312,-14.59312l7.88781,-7.88781h-19.80687v58.48c0,1.90232 1.53768,3.44 3.44,3.44h58.48c1.90232,0 3.44,-1.53768 3.44,-3.44v-137.6c0,-1.90232 -1.53768,-3.44 -3.44,-3.44zM119.39219,62.92781l-4.86437,4.86437l14.76781,14.76781h-71.40688c-1.45769,-4.12296 -5.35569,-6.87956 -9.72875,-6.88c-5.69958,0 -10.32,4.62042 -10.32,10.32c0,5.69958 4.62042,10.32 10.32,10.32c4.37059,-0.00329 8.26517,-2.75936 9.72203,-6.88h71.4136l-14.76781,14.76781l4.86437,4.86437l20.64,-20.64c1.34287,-1.34342 1.34287,-3.52095 0,-4.86437z"></path></g></g></svg></div>':"";
			   ?>
               
   </div>
</div>  
<?php } ?>
 
 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");    
$FriendStories=$Dot->Dot_FriendStoryPost($uid);
if($FriendStories){?> 
<script type="text/javascript" src="<?php echo $base_url;?>js/zuck.js"></script>   
<script> 
function buildItem(id, type, length, src, preview, link, seen, time, img){ return { "id": id, "type": type, "length": 10, "src": src, "preview": preview, "link": link, "seen": seen, "time": time, "img": img}; }
  var initDemo = function(){
  var header = document.getElementById("header");
  var skin = location.href.split('skin=')[1];
  if(!skin) { skin = 'Snapssenger'; } 
  if(skin.indexOf('#')!==-1){ skin = skin.split('#')[0]; }
  //var skins = { 'Snapgram': { 'avatars': false, 'list': false, 'autoFullScreen': false, 'cubeEffect': true } };
  var skins = { 'Snapssenger': {'avatars': false,	'list': false,	'autoFullScreen': false, 'cubeEffect': false } };
  var timeIndex = 0;
  var shifts = [35, 60, 60*3, 60*60*2, 60*60*25, 60*60*24*4, 60*60*24*10];
  var timestamp = function() {
  var now = new Date();
  var shift = shifts[timeIndex++] || 0;
  var date = new Date( now - shift*1000);
  return date.getTime() / 1000;
  };

  var stories = new Zuck('stories', {
	  backNative: false,
	  autoFullScreen: skins[skin]['autoFullScreen'],
	  skin: skin, 
	  avatars: skins[skin]['avatars'],
	  list: skins[skin]['list'],
	  cubeEffect: skins[skin]['cubeEffect'],
	  localStorage: false,
	  stories: [
		   <?php foreach($FriendStories as $storyData) {
              //If updates valid database columns
				$SotryUploaded = isset($storyData['pics']) ? $storyData['pics'] : NULL;
				$SotrySharedUserFullName = $storyData['user_fullname']; 
				$final_image=$base_url."uploads/stories/".$SotryUploaded;
				$StorySharedUserName = $storyData['user_name'];
				$StoryCreatedTime = $storyData['created']; 
				$storyID = $storyData['s_id'];
				$StorySharedUserID = $storyData['uid_fk'];
				$StorySharedUserAvatar = $Dot->Dot_UserAvatar($StorySharedUserID,$base_url); 
				$up = explode(",", $SotryUploaded);   
                ?>{
				  id: "<?php echo $storyID;?>",
				  photo: "<?php echo $StorySharedUserAvatar;?>",
				  name: "<?php echo $StorySharedUserName;?>", 
				  link: "<?php echo $base_url.'profile/stories/'.$StorySharedUserName;?>",
				  lastUpdated: <?php echo $StoryCreatedTime;?>,
				  items: [ 
				  <?php
				  foreach ($up as $item) {    
				  $extensionStory ='';
				  $imageExtensions = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
				  $videoExtensions = array("mp4", "MP4");
				  $exts = pathinfo($item, PATHINFO_EXTENSION); 
				  if(in_array($exts, $imageExtensions)){
					   $extensionStory = 'photo';
				  }
				  if(in_array($exts, $videoExtensions)){
				       $extensionStory = 'video';
				  } 
				  ?>  
				  buildItem("<?php echo $StorySharedUserName;?>", "<?php echo $extensionStory;?>", <?php echo $storyID;?>, "<?php echo $base_url."uploads/stories/".$item;?>", "<?php echo $base_url."uploads/stories/".$item;?>", '<?php echo $base_url.'profile/stories/'.$StorySharedUserName;?>', false, "<?php echo $StoryCreatedTime;?>", '<?php echo $item;?>'),
				  <?php }echo ']},'; } ?>
                  ] 
    });  
}; 
initDemo();  
</script>  
<?php }?>
<script type="text/javascript">
$(document).ready(function(){
$(".datepicker").livequery(function() { 
    $(this).datepicker({
	    format: 'yyyy-mm-dd',
		showClearBtn: true,
		i18n: {
		   clear: 'Temizle',
		   done: 'Bitti'
		} 
	});    
  }); 
  $(".timepicker").livequery(function() { 
    $(this).timepicker({ 
	  twelveHour: false
		 
		});  
  }); 
 
});
</script> 
</body>
</html>

