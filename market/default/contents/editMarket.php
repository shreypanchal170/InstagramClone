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
			$e_MarketPlaceName = $GetMarketData['market_place_name'];
			$e_MarketUsageTheme = $GetMarketData['market_theme'];
			$e_MarketTemPoraryName = $GetMarketData['market_temporary_name'];
			$e_MarketAbout = $GetMarketData['market_about'];
			$e_MarketPhone = $GetMarketData['market_phone'];
			$e_MarketEmail = $GetMarketData['market_email'];
			$e_MarketAddress = $GetMarketData['market_address'];
			$e_MarketID = $GetMarketData['market_id']; 
			$e_marketPageUrlName =  isset($GetMarketData['market_page_name']) ? $GetMarketData['market_page_name'] : NULL; 
?>
<div class="market_edit_popUp_wrapper">
    <div class="market_edit_popUp_container scrl">
         <div class="edit_market_wr">
              <!---->
              <div class="product_header">
               <div class="product_header_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M34.4,17.2c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v5.73333l-17.2,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667l11.46667,-22.93333h17.2l-5.73333,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-22.93333h22.93333v22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c0.79192,0 1.56015,-0.08247 2.30677,-0.23516c5.22635,-1.06879 9.15989,-5.68809 9.15989,-11.23151l-5.73333,-22.93333h17.2l11.46667,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667l-17.2,-22.93333v-5.73333c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667zM74.53333,77.07526c-3.3884,1.97227 -7.26987,3.19141 -11.46667,3.19141c-4.18533,0 -8.05041,-1.21368 -11.43307,-3.18021c-3.3884,1.98374 -7.29773,3.18021 -11.50026,3.18021c-4.16813,0 -8.02828,-1.20848 -11.39948,-3.15781c-3.39413,1.98947 -7.32559,3.15781 -11.53385,3.15781v63.06667c0,6.33533 5.13133,11.46667 11.46667,11.46667h68.8v-57.33333h34.4v57.33333h11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-63.06667c-4.20827,0 -8.13972,-1.16834 -11.53386,-3.15781c-3.3712,1.94933 -7.23134,3.15781 -11.39948,3.15781c-4.20253,0 -8.11186,-1.19648 -11.50026,-3.18021c-3.38267,1.96653 -7.24774,3.18021 -11.43308,3.18021c-4.1968,0 -8.07827,-1.21914 -11.46667,-3.19141c-3.3884,1.97227 -7.26987,3.19141 -11.46667,3.19141c-4.1968,0 -8.07827,-1.21914 -11.46667,-3.19141zM40.13333,97.46667h34.4v34.4h-34.4z"></path></g></g></svg></div>
               <div class="product_name_short">Edit MarketPlace</div>
               <div class="closeProductDetails"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
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
                          <?php echo $page_Lang['market_address'][$dataUserPageLanguage];?>
                     </div>
                     <div class="editor_box">
                         <input type="text" class="set_mar_in" id="market_address" value="<?php echo $e_MarketAddress;?>"/>
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
                                       <div class="y_theme_use"><div class="waves-effect waves-light btn blue usemytemp" data-id="<?php echo $p_purchased_theme_id;?>"><?php echo $page_Lang['use_this_market_theme'][$dataUserPageLanguage];?></div></div>
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
                  <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3" id="closePost"><?php echo $page_Lang['post_cancel'][$dataUserPageLanguage];?></div></div>
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
