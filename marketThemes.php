<?php  
include_once 'functions/inc.php';  
if(empty($uid)){
   header("Location: $base_url");   
}
$page ='market_themes';  
$pmore = 'more_market_theme'; 
$getp = isset($_GET['theme']) ? $_GET['theme'] : '';	  
   
include("contents/header.php"); 
?>
<div class="section">
   <div class="main">
       <div class="container">
            <!--MIDDLE STARTED-->
            <div class="exploreWrapper">
                    <div class="_81kxQ_Market"><?php echo $page_Lang['all_market_place_themes'][$dataUserPageLanguage];?></div>
                    <!--Market THEMES STARTED-->
                    <div class="marketplace_themes_container" id="morePostType" data-type="more_mt" data-c="<?php echo $getp;?>" style="height:1000px;">
                    <?php include("contents/market_themes.php");?>
                    </div>
                    <!--Market THEMES FINISHED-->
            </div>
            <!--MIDDLE FINISHED-->
       </div>
   </div>
</div>

<!--POPUP IFRAME STARTED-->
<div class="popup_iframe_container">
   <div class="popupiframe_header"><?php echo $page_Lang['theme_preview_mode'][$dataUserPageLanguage];?><div class="closeNew_Iframe"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
   <div class="popup_iframe_container_in"></div>
</div>
<script type="text/javascript">
 $(document).ready(function(){ 
	var requestURL = '<?php echo $base_url;?>';
    $("body").on("click",".themeSee",function(){
		var t = $(this).attr("data-id");
		$(".popup_iframe_container_in").html("");
		$(".popup_iframe_container").show();
        $(".popup_iframe_container_in").append('<iframe src="<?php echo $base_url;?>market/themeTest.php?tm='+t+'" height="100%" width="100%"></iframe> ');
    });
	$("body").on("click",".closeNew_Iframe", function(){
	    $(".popup_iframe_container_in").html("");
		$(".popup_iframe_container").hide();
	}); 
  $("body").on("click",".buy_this_theme", function(){
      var type = 'buyMarketTheme';
	  var id = $(this).attr("id");
	  var data = 'f='+type+'&theme='+id; 
	  $.ajax({
			   type: "POST",
			   url: requestURL+ "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   $("body").append('<div class="popUpPreLoaderWrap initial" id="postPopUpBox"><div class="popUpPreLoaderContainer initial"><div class="popUpPreLoaderMiddle initial"><div class="preloader-wrapper small active  initial"><div class="spinner-layer spinner-blue initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-red initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-yellow initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-green initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div></div></div></div></div>');
			   },
			   success: function(response) {  
				 if(response){
					window.location.href = response;
				 } 
			   }
		   }); 
});
});
 </script>  
<!--POPUP IFRAME FINISHED-->
<?php include("contents/javascripts_vars.php"); ?>
</body>
</html>