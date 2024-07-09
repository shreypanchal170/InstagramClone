<?php 
include_once '../../../functions/inc.php';  
include_once "../../../functions/clear.php"; 
include_once  "../functions/marketFunctions.php";
include_once "../../../api/send_push_notification.php"; 
$DotMarket = new DOT_MARKET($db);   
if(isset($_POST['f'])){
	 $theType = mysqli_real_escape_string($db, $_POST['f']);
	 if($theType == 'editMarket'){ 
	    $GetMarketData = $DotMarket->Market_EditMarketDetails($uid);
	    if($GetMarketData){
			$e_MarketOwnerID= $GetMarketData['market_place_owner_id'];
			$e_MarketPlaceName = isset($GetMarketData['market_place_name']) ? $GetMarketData['market_place_name'] : NULL;
			$e_MarketUsageTheme = $GetMarketData['market_theme'];
			$e_MarketTemPoraryName = $GetMarketData['market_temporary_name'];
			$e_MarketAbout = isset($GetMarketData['market_about']) ? $GetMarketData['market_about'] : NULL;
			$e_MarketPhone = isset($GetMarketData['market_phone']) ? $GetMarketData['market_phone'] : NULL;
			$e_MarketEmail = isset($GetMarketData['market_email']) ? $GetMarketData['market_email'] : NULL;
			$e_MarketAddress = isset($GetMarketData['market_address']) ? $GetMarketData['market_address'] : NULL;
			$e_MarketSlogan = isset($GetMarketData['market_slogan']) ? $GetMarketData['market_slogan'] : NULL;
			$e_MarketID = $GetMarketData['market_id'];
			$e_marketPageUrlName =  isset($GetMarketData['market_page_name']) ? $GetMarketData['market_page_name'] : NULL; 
			$e_MarketFacebook = isset($GetMarketData['market_facebook']) ? $GetMarketData['market_facebook'] : NULL;
			$e_MarketTwitter = isset($GetMarketData['market_twitter']) ? $GetMarketData['market_twitter'] : NULL;
			$e_MarketInstagram = isset($GetMarketData['market_instagram']) ? $GetMarketData['market_instagram'] : NULL;
			$e_MarketTumblr = isset($GetMarketData['market_tumblr']) ? $GetMarketData['market_tumblr'] : NULL;
			$e_MarketYouTube = isset($GetMarketData['market_youtube']) ? $GetMarketData['market_youtube'] : NULL;
			 $marketCover = $DotMarket->Market_Cover($e_MarketID,$e_MarketUsageTheme, $base_url);
			 $marketLogo = $DotMarket->Market_Logo($e_MarketID,$e_MarketUsageTheme, $base_url) ;
?>
<div class="market_edit_popUp_wrapper">
    <div class="market_edit_popUp_container scrl">
         <div class="edit_market_wr">
              <!---->
              <div class="product_header">
               <div class="product_header_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M34.4,17.2c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v5.73333l-17.2,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667l11.46667,-22.93333h17.2l-5.73333,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-22.93333h22.93333v22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c0.79192,0 1.56015,-0.08247 2.30677,-0.23516c5.22635,-1.06879 9.15989,-5.68809 9.15989,-11.23151l-5.73333,-22.93333h17.2l11.46667,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667l-17.2,-22.93333v-5.73333c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667zM74.53333,77.07526c-3.3884,1.97227 -7.26987,3.19141 -11.46667,3.19141c-4.18533,0 -8.05041,-1.21368 -11.43307,-3.18021c-3.3884,1.98374 -7.29773,3.18021 -11.50026,3.18021c-4.16813,0 -8.02828,-1.20848 -11.39948,-3.15781c-3.39413,1.98947 -7.32559,3.15781 -11.53385,3.15781v63.06667c0,6.33533 5.13133,11.46667 11.46667,11.46667h68.8v-57.33333h34.4v57.33333h11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-63.06667c-4.20827,0 -8.13972,-1.16834 -11.53386,-3.15781c-3.3712,1.94933 -7.23134,3.15781 -11.39948,3.15781c-4.20253,0 -8.11186,-1.19648 -11.50026,-3.18021c-3.38267,1.96653 -7.24774,3.18021 -11.43308,3.18021c-4.1968,0 -8.07827,-1.21914 -11.46667,-3.19141c-3.3884,1.97227 -7.26987,3.19141 -11.46667,3.19141c-4.1968,0 -8.07827,-1.21914 -11.46667,-3.19141zM40.13333,97.46667h34.4v34.4h-34.4z"></path></g></g></svg></div>
               <div class="product_name_short"><?php echo $page_Lang['edit_your_marketplace'][$dataUserPageLanguage];?></div>
               <div class="closeProductDetails"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
           </div>
              <!---->
              <!---->
              <div class="out_market_edit_details_container_one">
                   <div class="change_shopPro_header">
                        <div class="shopPro_header" style="background-image:url(<?php echo $marketCover;?>);">
                          <!---->
                           <div class="editCover">
                           <form id="shopProCover" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>market/<?php echo $e_MarketUsageTheme;?>/ajax/upload.php">
                              <label class="shopProCoverChng" for="shopProCoverchange">  
                                 <input type="file" name="shopprocoverimage" id="shopProCoverchange" data-id="cover" class="chose-image-btn" accept="image"/>
                           <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M63.10457,6.61538c-9.71635,0 -17.98558,7.00301 -19.58774,16.59015l-1.65385,9.87139h-22.01683c-10.98257,0 -19.84615,8.86358 -19.84615,19.84615v86c0,10.98257 8.86358,19.84615 19.84615,19.84615h132.30769c10.98257,0 19.84615,-8.86358 19.84615,-19.84615v-86c0,-10.98257 -8.86358,-19.84615 -19.84615,-19.84615h-22.01683l-1.65385,-9.87139c-1.60216,-9.58714 -9.87139,-16.59015 -19.58774,-16.59015zM86,52.92308c21.88762,0 39.69231,17.80469 39.69231,39.69231c0,21.88762 -17.80469,39.69231 -39.69231,39.69231c-21.88762,0 -39.69231,-17.80469 -39.69231,-39.69231c0,-21.88762 17.80469,-39.69231 39.69231,-39.69231zM86,66.15385c-14.6262,0 -26.46154,11.83534 -26.46154,26.46154c0,14.62621 11.83534,26.46154 26.46154,26.46154c14.62621,0 26.46154,-11.83533 26.46154,-26.46154c0,-14.6262 -11.83533,-26.46154 -26.46154,-26.46154z"></path></g></g></g></svg>
                                </label>
                           </form>
                           </div>
                           <!---->
                           <!---->
                           <div class="editLogo">
                           <form id="shopProLogo" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>market/<?php echo $e_MarketUsageTheme;?>/ajax/upload.php">
                              <label class="shopProCoverChng" for="shopProLogochange">  
                                 <input type="file" name="shopprologoimage" id="shopProLogochange" data-id="logo" class="chose-image-btn" accept="image"/>
                           <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M63.10457,6.61538c-9.71635,0 -17.98558,7.00301 -19.58774,16.59015l-1.65385,9.87139h-22.01683c-10.98257,0 -19.84615,8.86358 -19.84615,19.84615v86c0,10.98257 8.86358,19.84615 19.84615,19.84615h132.30769c10.98257,0 19.84615,-8.86358 19.84615,-19.84615v-86c0,-10.98257 -8.86358,-19.84615 -19.84615,-19.84615h-22.01683l-1.65385,-9.87139c-1.60216,-9.58714 -9.87139,-16.59015 -19.58774,-16.59015zM86,52.92308c21.88762,0 39.69231,17.80469 39.69231,39.69231c0,21.88762 -17.80469,39.69231 -39.69231,39.69231c-21.88762,0 -39.69231,-17.80469 -39.69231,-39.69231c0,-21.88762 17.80469,-39.69231 39.69231,-39.69231zM86,66.15385c-14.6262,0 -26.46154,11.83534 -26.46154,26.46154c0,14.62621 11.83534,26.46154 26.46154,26.46154c14.62621,0 26.46154,-11.83533 26.46154,-26.46154c0,-14.6262 -11.83533,-26.46154 -26.46154,-26.46154z"></path></g></g></g></svg>
                               </label>
                           </form>
                           </div>
                           <!---->
                           
                           <div class="shopPro_header_in">
                                   <div class="shopPro_logo"><img src="<?php echo $marketLogo;?>"></div> 
                             </div>
                        </div>
                   </div>
              </div>
              <!---->
              <!---->
              <div class="out_market_edit_details_container">
                    <?php if(!$e_marketPageUrlName){ ?>
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['marketplace_username'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <input type="text" class="set_mar_in" id="market_u" value="<?php echo $Dot->Dot_MarketUrlName($e_MarketID);?>"/>
                     </div>
                     <div class="note_market_"><?php echo $page_Lang['this_is_your_market_url_name'][$dataUserPageLanguage];?> </div>
                     <?php } ?>
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['market_name_'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <input type="text" class="set_mar_in" id="market_p_u" value="<?php echo $Dot->Dot_MarketName($e_MarketID);?>"/>
                     </div>
                     <div class="note_market_"><?php echo $page_Lang['this_is_your_marketname'][$dataUserPageLanguage];?></div>
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['market_phone_number'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <input type="text" class="set_mar_in" id="market_phone" value="<?php echo $e_MarketPhone;?>"/>
                     </div>
                     <div class="note_market_"><?php echo $page_Lang['write_your_market_name'][$dataUserPageLanguage];?></div>
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['market_email_address'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <input type="text" class="set_mar_in" id="market_email" value="<?php echo $e_MarketEmail;?>"/>
                     </div>
                     <div class="edit_about_market_box">
                         <?php echo $page_Lang['your_market_social_accounts'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <div class="social_account">
                             <div class="social_account_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M86,14.33333c-39.58041,0 -71.66667,32.08626 -71.66667,71.66667c0,39.58041 32.08626,71.66667 71.66667,71.66667c39.58041,0 71.66667,-32.08626 71.66667,-71.66667c0,-39.58041 -32.08626,-71.66667 -71.66667,-71.66667z" fill="#3f51b5"></path><path d="M105.23533,86h-12.06867v43h-17.91667v-43h-10.75v-14.33333h10.75v-8.63583c0.00717,-12.57033 5.22808,-20.03083 20.038,-20.03083h12.212v14.33333h-8.19508c-5.76558,0 -6.13825,2.15 -6.13825,6.17408v8.15925h14.33333z" fill="#ffffff"></path></g></g></svg></div>
                             <input type="text" class="set_mar_in_shopPro" id="market_fc" value="<?php echo $e_MarketFacebook;?>"/>
                         </div>
                         <div class="social_account">
                             <div class="social_account_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M86,14.33333c-39.58041,0 -71.66667,32.08626 -71.66667,71.66667c0,39.58041 32.08626,71.66667 71.66667,71.66667c39.58041,0 71.66667,-32.08626 71.66667,-71.66667c0,-39.58041 -32.08626,-71.66667 -71.66667,-71.66667z" fill="#03a9f4"></path><path d="M129,61.34667c-3.1605,1.40108 -7.16308,2.71617 -10.75,3.15333c3.64783,-2.16433 9.43492,-6.67217 10.75,-10.75c-3.40775,2.00308 -9.57108,4.14233 -13.59158,4.91633c-3.21067,-3.40417 -7.79017,-4.91633 -12.86417,-4.91633c-9.74667,0 -16.54425,8.25958 -16.54425,17.91667v7.16667c-14.33333,0 -28.30833,-10.91842 -37.00508,-21.5c-1.53008,2.58358 -2.39008,5.60792 -2.39008,8.80425c0,6.51808 5.98775,13.13292 10.7285,16.27908c-2.89175,-0.08958 -8.36708,-2.29692 -10.75,-3.58333c0,0.05733 0,0.129 0,0.20425c0,8.48175 5.95192,14.24017 14.018,15.8455c-1.47275,0.40492 -3.268,1.86692 -10.17667,1.86692c2.24317,6.93375 13.51992,10.5995 21.242,10.75c-6.0415,4.68342 -16.813,7.16667 -25.08333,7.16667c-1.42975,0 -2.20375,0.07883 -3.58333,-0.08242c7.8045,4.945 18.705,7.24908 28.66667,7.24908c32.45425,0 50.16667,-24.7895 50.16667,-47.90917c0,-0.75967 -0.02508,-3.30383 -0.0645,-4.04917c3.46867,-2.44383 4.87333,-5.00233 7.23117,-8.52833" fill="#ffffff"></path></g></g></svg></div>
                             <input type="text" class="set_mar_in_shopPro" id="market_tw" value="<?php echo $e_MarketTwitter;?>"/>
                         </div>
                         <div class="social_account">
                             <div class="social_account_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M150.5,132.58333c0,9.89717 -8.0195,17.91667 -17.91667,17.91667h-93.16667c-9.89358,0 -17.91667,-8.0195 -17.91667,-17.91667v-93.16667c0,-9.89717 8.02308,-17.91667 17.91667,-17.91667h93.16667c9.89717,0 17.91667,8.0195 17.91667,17.91667z" fill="#01579b"></path><path d="M114.66667,125.02608c0,0.34042 -0.13258,0.65933 -0.39058,0.88508c-0.31533,0.27592 -7.76867,6.67217 -24.88267,6.67217c-20.51817,0 -21.11658,-22.96558 -21.11658,-25.58858l-0.1935,-28.16142h-9.57467c-0.65217,0 -1.17533,-0.52675 -1.17533,-1.17892v-11.11192c0,-0.48375 0.29742,-0.92808 0.74533,-1.10725c0.18633,-0.07167 18.52942,-7.46408 18.52942,-24.84325c0,-0.65575 0.52317,-1.17892 1.17175,-1.17892h10.62817c0.65217,0.00358 1.17533,0.52675 1.17533,1.1825v23.90442h20.3175c0.65217,0 1.1825,0.52317 1.1825,1.17533v11.98625c0,0.65575 -0.53033,1.17175 -1.1825,1.17175h-20.3175v27.63108c0,0.36192 1.13233,9.02642 9.89,9.02642c7.24908,0 13.33358,-3.741 13.40167,-3.78042c0.35833,-0.22933 0.81342,-0.2365 1.19325,-0.03225c0.36908,0.20425 0.59842,0.602 0.59842,1.03558v12.31233z" fill="#ffffff"></path></g></g></svg></div>
                             <input type="text" class="set_mar_in_shopPro" id="market_tb" value="<?php echo $e_MarketTumblr;?>"/>
                         </div>
                         <div class="social_account">
                             <div class="social_account_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M114.66667,150.5h-57.33333c-19.70833,0 -35.83333,-16.125 -35.83333,-35.83333v-57.33333c0,-19.70833 16.125,-35.83333 35.83333,-35.83333h57.33333c19.70833,0 35.83333,16.125 35.83333,35.83333v57.33333c0,19.70833 -16.125,35.83333 -35.83333,35.83333z" fill="#304ffe"></path><path d="M21.5,57.33333v57.33333c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c19.70833,0 35.83333,-16.125 35.83333,-35.83333v-57.33333c0,-3.58333 -0.35833,-6.80833 -1.43333,-10.03333c-20.06667,-16.125 -45.86667,-25.8 -73.81667,-25.8c-13.25833,0 -26.15833,2.15 -38.34167,6.45c-9.31667,6.45 -15.40833,17.2 -15.40833,29.38333z" fill="#304ffe"></path><path d="M75.25,28.66667c-17.91667,0 -34.4,4.3 -49.45,11.46667c-2.86667,5.375 -4.3,11.10833 -4.3,17.2v57.33333c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c19.70833,0 35.83333,-16.125 35.83333,-35.83333v-56.61667c-19.70833,-18.275 -46.225,-29.38333 -75.25,-29.38333z" fill="#6200ea"></path><path d="M150.5,68.08333c-18.99167,-19.70833 -45.50833,-32.25 -75.25,-32.25c-19.35,0 -37.625,5.375 -53.03333,14.69167c-0.35833,2.15 -0.71667,4.3 -0.71667,6.80833v57.33333c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c19.70833,0 35.83333,-16.125 35.83333,-35.83333z" fill="#673ab7"></path><path d="M150.5,78.83333c-17.55833,-21.85833 -44.79167,-35.83333 -75.25,-35.83333c-20.06667,0 -38.34167,6.09167 -53.75,16.48333v55.18333c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c19.70833,0 35.83333,-16.125 35.83333,-35.83333z" fill="#8e24aa"></path><path d="M150.5,114.66667v-23.65c-16.125,-24.36667 -43.71667,-40.85 -75.25,-40.85c-20.06667,0 -38.7,6.80833 -53.75,17.91667v46.58333c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c19.70833,0 35.83333,-16.125 35.83333,-35.83333z" fill="#c2185b"></path><path d="M150.5,114.66667v-8.6c-12.9,-28.66667 -41.56667,-48.73333 -75.25,-48.73333c-20.425,0 -39.41667,7.525 -53.75,20.06667v37.26667c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c19.70833,0 35.83333,-16.125 35.83333,-35.83333z" fill="#d81b60"></path><path d="M149.06667,124.7c-6.80833,-34.4 -37.26667,-60.2 -73.81667,-60.2c-21.14167,0 -40.13333,8.6 -53.75,22.575v27.59167c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c16.125,0 30.1,-10.75 34.4,-25.8z" fill="#f50057"></path><path d="M142.975,136.16667c-1.79167,-35.83333 -31.175,-64.5 -67.725,-64.5c-21.85833,0 -41.20833,10.39167 -53.75,26.51667v16.48333c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c11.46667,0 21.85833,-5.73333 28.30833,-14.33333z" fill="#ff1744"></path><path d="M75.25,78.83333c-23.29167,0 -43.35833,12.9 -53.75,32.25v3.58333c0,19.70833 16.125,35.83333 35.83333,35.83333h57.33333c7.88333,0 15.40833,-2.50833 21.14167,-7.16667c0,-1.075 0.35833,-2.50833 0.35833,-3.58333c0,-33.68333 -27.23333,-60.91667 -60.91667,-60.91667z" fill="#ff5722"></path><path d="M75.25,86c-25.08333,0 -45.86667,16.84167 -51.95833,40.13333c4.65833,14.33333 18.275,24.36667 34.04167,24.36667h57.33333c5.01667,0 9.31667,-1.075 13.61667,-2.86667c0.35833,-2.50833 0.71667,-5.375 0.71667,-7.88333c0,-29.74167 -24.00833,-53.75 -53.75,-53.75z" fill="#ff6f00"></path><path d="M75.25,93.16667c-24.725,0 -44.79167,18.99167 -46.225,43c6.45,8.6 16.84167,14.33333 28.30833,14.33333h57.33333c2.15,0 3.94167,-0.35833 6.09167,-0.71667c0.71667,-3.225 1.075,-6.45 1.075,-10.03333c0,-25.8 -20.78333,-46.58333 -46.58333,-46.58333z" fill="#ff9800"></path><path d="M113.23333,150.5c1.075,-3.58333 1.43333,-7.16667 1.43333,-10.75c0,-21.85833 -17.55833,-39.41667 -39.41667,-39.41667c-21.85833,0 -39.41667,17.55833 -39.41667,39.41667c0,1.075 0,2.50833 0.35833,3.58333c6.09167,4.3 13.25833,7.16667 21.14167,7.16667z" fill="#ffc107"></path><path d="M75.25,107.5c-17.91667,0 -32.25,14.33333 -32.25,32.25c0,2.86667 0.35833,5.73333 1.075,8.24167c3.94167,1.79167 8.6,2.50833 13.25833,2.50833h48.375c1.075,-3.225 1.79167,-6.80833 1.79167,-10.75c0,-17.91667 -14.33333,-32.25 -32.25,-32.25z" fill="#ffd54f"></path><path d="M75.25,115.025c-13.975,0 -25.08333,11.10833 -25.08333,25.08333c0,3.58333 0.71667,6.80833 2.15,10.03333c1.79167,0.35833 3.225,0.35833 5.01667,0.35833h40.85c1.43333,-3.225 2.15,-6.80833 2.15,-10.39167c0,-13.975 -11.10833,-25.08333 -25.08333,-25.08333z" fill="#ffe082"></path><path d="M75.25,122.19167c-10.03333,0 -17.91667,7.88333 -17.91667,17.91667c0,3.94167 1.43333,7.525 3.58333,10.39167h28.66667c2.15,-2.86667 3.58333,-6.45 3.58333,-10.39167c0,-10.03333 -7.88333,-17.91667 -17.91667,-17.91667z" fill="#ffecb3"></path><path d="M107.5,136.16667h-43c-15.76667,0 -28.66667,-12.9 -28.66667,-28.66667v-43c0,-15.76667 12.9,-28.66667 28.66667,-28.66667h43c15.76667,0 28.66667,12.9 28.66667,28.66667v43c0,15.76667 -12.9,28.66667 -28.66667,28.66667zM64.5,43c-11.825,0 -21.5,9.675 -21.5,21.5v43c0,11.825 9.675,21.5 21.5,21.5h43c11.825,0 21.5,-9.675 21.5,-21.5v-43c0,-11.825 -9.675,-21.5 -21.5,-21.5z" fill="#ffffff"></path><path d="M86,111.08333c-13.975,0 -25.08333,-11.10833 -25.08333,-25.08333c0,-13.975 11.10833,-25.08333 25.08333,-25.08333c13.975,0 25.08333,11.10833 25.08333,25.08333c0,13.975 -11.10833,25.08333 -25.08333,25.08333zM86,68.08333c-10.03333,0 -17.91667,7.88333 -17.91667,17.91667c0,10.03333 7.88333,17.91667 17.91667,17.91667c10.03333,0 17.91667,-7.88333 17.91667,-17.91667c0,-10.03333 -7.88333,-17.91667 -17.91667,-17.91667zM114.66667,57.33333c0,2.15 -1.43333,3.58333 -3.58333,3.58333c-2.15,0 -3.58333,-1.43333 -3.58333,-3.58333c0,-2.15 1.43333,-3.58333 3.58333,-3.58333c2.15,0 3.58333,1.43333 3.58333,3.58333z" fill="#ffffff"></path></g></g></svg></div>
                             <input type="text" class="set_mar_in_shopPro" id="market_ins" value="<?php echo $e_MarketInstagram;?>"/>
                         </div>
                         <div class="social_account">
                             <div class="social_account_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M150.5,132.58333c0,9.89717 -8.0195,17.91667 -17.91667,17.91667h-93.16667c-9.89358,0 -17.91667,-8.0195 -17.91667,-17.91667v-93.16667c0,-9.89717 8.02308,-17.91667 17.91667,-17.91667h93.16667c9.89717,0 17.91667,8.0195 17.91667,17.91667z" fill="#f44336"></path><path d="M130.78808,91.36783c-0.989,-3.52242 -3.90225,-6.2995 -7.60383,-7.24192c-6.70442,-1.70925 -37.18425,-1.70925 -37.18425,-1.70925c0,0 -30.47983,0 -37.18425,1.71283c-3.698,0.94242 -6.61483,3.71592 -7.60383,7.24192c-1.79525,6.3855 -1.79525,19.71192 -1.79525,19.71192c0,0 0,13.32642 1.79525,19.7155c0.989,3.52242 3.90225,6.2995 7.60383,7.24192c6.70442,1.70925 37.18425,1.70925 37.18425,1.70925c0,0 30.47625,0 37.18425,-1.71283c3.698,-0.94242 6.61483,-3.71592 7.60383,-7.24192c1.79525,-6.3855 1.79525,-19.71192 1.79525,-19.71192c0,0 0,-13.32642 -1.79525,-19.7155z" fill="#ffffff"></path><path d="M58.52658,132.58333h-5.96983v-37.06958h-5.97342v-5.93042h17.91667v5.93042h-5.97342zM82.41667,132.58333h-5.375l-0.59842,-4.05633c-2.35783,2.54775 -5.16358,4.05633 -7.34583,4.05633c-1.90992,0 -3.25367,-0.82775 -3.913,-2.33992c-0.387,-0.946 -0.68442,-2.365 -0.68442,-4.49708v-27.20467h5.97342v27.79592c0.1505,0.86 0.77758,1.1825 1.55158,1.1825c1.19325,0 3.10675,-1.30075 4.41825,-3.02075v-25.95767h5.97342zM125.41667,117.04242v-9.67858c0,-2.78425 -0.688,-4.7945 -1.90992,-6.09883c-1.64117,-1.77733 -4.00258,-2.72333 -6.95883,-2.72333c-3.01717,0 -5.34633,0.946 -7.04842,2.72333c-1.28283,1.30075 -1.9995,3.43283 -1.9995,6.21708v16.45825c0,2.752 0.80625,4.70492 2.06042,5.98058c1.70208,1.77375 4.03125,2.66242 7.138,2.66242c3.0745,0 5.49325,-0.91733 7.10575,-2.81292c0.71667,-0.82775 1.19325,-1.77733 1.40467,-2.81292c0.02867,-0.473 0.20783,-1.74508 0.20783,-3.25367h-5.97342v2.36858c0,1.36167 -1.34375,2.48683 -2.98492,2.48683c-1.64117,0 -2.98492,-1.12517 -2.98492,-2.48683v-9.03zM113.47342,105.32133c0,-1.39033 1.34375,-2.48683 2.98492,-2.48683c1.64117,0 2.98492,1.0965 2.98492,2.48683v7.60742h-5.97342v-7.60742zM103.13908,102.09633c-0.74533,-2.31483 -2.56925,-3.58692 -4.8375,-3.61917c-2.89533,-0.02867 -4.09217,1.4835 -6.33175,4.09217v-12.986h-5.96983v43h5.375l0.59842,-3.70517c1.88125,2.31125 4.32867,3.70517 6.32817,3.70517c2.26825,0 4.21042,-1.18608 4.95575,-3.50092c0.35833,-1.247 0.62708,-2.40083 0.65575,-5.01308v-15.566c0.00358,-2.93475 -0.38342,-5.16 -0.774,-6.407zM97.94325,123.3025c0,3.11392 -0.71667,4.18175 -2.32917,4.18175c-0.9245,0 -2.6875,-0.6235 -3.64425,-1.57308v-20.37483c0.95675,-0.94958 2.71617,-1.86692 3.64425,-1.86692c1.6125,0 2.32917,0.97825 2.32917,4.09217z" fill="#f44336"></path><path d="M53.75,32.25l6.57542,0.00358l4.25342,20.468h0.41208l4.042,-20.46442l6.65067,-0.00358l-7.60025,28.27967v14.71675h-6.53242l-0.01075,-13.92125zM75.74808,50.4605c0,-2.408 0.78475,-4.33225 2.35425,-5.75483c1.56592,-1.42975 3.66933,-2.15 6.321,-2.15358c2.41875,0 4.38958,0.74892 5.93042,2.2575c1.53725,1.49783 2.31125,3.44 2.31125,5.81217l0.01075,16.07125c0,2.65883 -0.74892,4.7515 -2.2575,6.278c-1.50858,1.51933 -3.57975,2.279 -6.235,2.279c-2.5585,0 -4.59025,-0.79192 -6.13467,-2.35067c-1.53367,-1.55875 -2.29333,-3.66575 -2.29692,-6.30667l-0.01075,-16.13575l0.00717,0.00358zM81.75375,67.17317c0,0.84567 0.20425,1.51575 0.63783,1.98158c0.41208,0.45867 0.99975,0.69158 1.77375,0.69158c0.79192,0 1.41183,-0.2365 1.87767,-0.72025c0.46225,-0.46225 0.70233,-1.12517 0.70233,-1.96008l-0.01075,-16.95275c0,-0.67367 -0.24725,-1.2255 -0.72025,-1.64475c-0.46942,-0.41567 -1.09292,-0.62708 -1.85975,-0.62708c-0.71308,0 -1.29358,0.215 -1.7415,0.63067c-0.44433,0.41925 -0.6665,0.97108 -0.6665,1.64475zM114.66667,43v32.25h-5.10625l-0.81342,-3.94167c-1.09292,1.28283 -2.22883,2.2575 -3.41492,2.92042c-1.17533,0.6665 -2.322,1.02125 -3.43283,1.02125c-1.376,0 -2.40442,-0.473 -3.10317,-1.41183c-0.69875,-0.92808 -1.04275,-2.32917 -1.04275,-4.20683l-0.01433,-26.63133h5.92325l0.01433,24.45625c0,0.731 0.129,1.27208 0.37983,1.60892c0.2365,0.3225 0.65575,0.50167 1.20042,0.50167c0.44433,0 0.99617,-0.22217 1.64833,-0.6665c0.67367,-0.43717 1.28283,-1.00692 1.83467,-1.68775l-0.00717,-24.21258z" fill="#ffffff"></path></g></g></svg></div>
                             <input type="text" class="set_mar_in_shopPro" id="market_yt" value="<?php echo $e_MarketYouTube;?>"/>
                         </div>
                     </div>
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['market_address'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <input type="text" class="set_mar_in" id="market_address" value="<?php echo $e_MarketAddress;?>"/>
                     </div> 
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['market_slogan'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <input type="text" class="set_mar_in" id="market_slogan" value="<?php echo $e_MarketSlogan;?>"/>
                     </div>
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['about_market'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <textarea class="description_edit description" id="about_market"><?php echo strip_tags($e_MarketAbout);?></textarea>
                     </div>
                     <div class="edit_about_market_box">
                          <?php echo $page_Lang['your_market_themes'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                       <?php 
					      if($checkUserPurchasedMarketThemeBefore){ 
							   if($userPurchasedMarketThemeList){ 
							      echo '<div class="y_theme_list">';
									foreach($userPurchasedMarketThemeList as $tdata){
										$p_themeID = $tdata['id'];
										$p_theme_purchaserID = $tdata['uid_fk'];
										$p_purchased_theme_id = $tdata['market_theme_id'];
										$p_purchased_time = $tdata['purchase_time'];
										$p_purchased_price = $tdata['amounth'];
										$CheckUserAlreadyPurchasedTheme = $Dot->Dot_CheckThemePurchased($uid, $marketPlaceThemeID);
						?>
						   <div class="y_theme_body">
                               <div class="y_theme_wrap">
                                   <div class="y_theme_image">
                                       <img src="<?php echo $base_url.'market/'.$Dot->Dot_GetMarketThemeName($p_purchased_theme_id).'/'.$Dot->Dot_GetMarketThemeName($p_purchased_theme_id);?>.png" />
                                   </div>
                                   <div class="y_theme_name_time">
                                       <div class="y_theme_name"><?php echo $Dot->Dot_GetMarketThemeName($p_purchased_theme_id);?></div>
                                       <div class="y_theme_use"><div class="waves-effect waves-light btn blue usemytemp" data-id="<?php echo $p_themeID;?>"><?php echo $page_Lang['use_this_market_theme'][$dataUserPageLanguage];?></div></div>
                                   </div>
                               </div>
                           </div>
					   <?php } echo '</div>'; } }else{ ?>
                         <div class="no_theme_purchased"><?php echo $page_Lang['you_do_not_have_market_theme'][$dataUserPageLanguage];?> <a href="<?php echo $base_url;?>marketThemes"><span class="buyTheme waves-effect waves-light btn blue"><?php echo $page_Lang['click_buy_theme'][$dataUserPageLanguage];?></span></a></div>
                         <?php }?>
                     </div>
              </div>
              <!---->
              <!---->
              <div class="post_box_footer">
                  <input type="hidden" id="f_val">
                  <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3" id="closePost"><?php echo $page_Lang['cancel'][$dataUserPageLanguage];?></div></div>
                  <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue  sav_set" id="thisup" data-type="editMarketInfo"><?php echo $page_Lang['savethis'][$dataUserPageLanguage];?></div></div>
             </div>
              <!---->
         </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() { 
	function sizeDescription(){
     autosize(document.querySelectorAll('textarea'));
   }
   sizeDescription(); 
}); 
</script>
<?php  } } }?>
