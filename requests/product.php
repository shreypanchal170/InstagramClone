<?php 
$dataPost_ID = $PostFromDatas['user_post_id'];
$dataPost_UID = $PostFromDatas['user_id_fk'];
$Dot_Out->Dot_ProductSeen($dataPostID, $uid);
$countProductSeen = $Dot_Out->Dot_CountProductSeen($dataPost_ID);
$ownerLink = $Dot_Out->Dot_CheckUserMarketPlace($dataPost_UID);
if($ownerLink){
   $dataPostCreatedUserName = $Dot_Out->Dot_MarketPlaceFullName($ownerLink['market_temporary_name']);
}else{ 
   $dataPostCreatedUserName = $PostFromDatas['user_name'];
}
$dataPostType = $PostFromDatas['post_type'];
$dataUserVerified = $PostFromDatas['verified_user'];
$time = $PostFromDatas['post_created_time']; 
$ownerLanguage = $PostFromDatas['user_page_lang'];
$message_time=date("c", $time);
$dataProductOwnerRegisteredTime = $PostFromDatas['user_registered'];
$portime=date("c", $dataProductOwnerRegisteredTime);
$postPageType = isset($PostFromDatas['post_page_type']) ? $PostFromDatas['post_page_type'] : NULL;
$postPageEventID = isset($PostFromDatas['post_event_page_id']) ? $PostFromDatas['post_event_page_id'] : NULL;
$postLatitude =  isset($PostFromDatas['user_lat']) ? $PostFromDatas['user_lat'] : NULL;
$postLongitude =  isset($PostFromDatas['user_lang']) ? $PostFromDatas['user_lang'] : NULL;
$postLocationPlace =  isset($PostFromDatas['location_place']) ? $PostFromDatas['location_place'] : NULL;
$postAboutLocation =  isset($PostFromDatas['about_location']) ? $PostFromDatas['about_location'] : NULL;
$dataPostHashTagNormal = isset($PostFromDatas['hashtag_normal']) ? $PostFromDatas['hashtag_normal'] : NULL;
$dataPostHashTagDiez = isset($PostFromDatas['hashtag_diez']) ? $PostFromDatas['hashtag_diez'] : NULL;
$dataPostTitleText = isset($PostFromDatas['post_title_text']) ? $PostFromDatas['post_title_text'] : NULL;
$dataPostVideoScreenShot = isset($PostFromDatas['post_video_name']) ? $PostFromDatas['post_video_name'] : NULL;
$dataPostTitleTextDetails = isset($PostFromDatas['post_text_details']) ? $PostFromDatas['post_text_details'] : NULL;  
$daUserStyleMode = $PostFromDatas['style_mode']; 
$dataUserGifPost = isset($PostFromDatas['gif_url']) ? $PostFromDatas['gif_url'] : NULL;  
$dataCommentDisableStatus = $PostFromDatas['comment_status'];
$dataPostCreatedUser_FullName = $PostFromDatas['user_fullname'];
$dataPostCreatedLinkUrl =  isset($PostFromDatas['post_link_url']) ? $PostFromDatas['post_link_url'] : NULL;
$dataPostUserFeeling =  isset($PostFromDatas['user_feeling']) ? $PostFromDatas['user_feeling'] : NULL;
$dataPostCreatedLinkDescription = isset($PostFromDatas['post_link_description']) ? $PostFromDatas['post_link_description'] : NULL;
$dataPostCreatedLinkTitle = isset($PostFromDatas['post_link_title']) ? $PostFromDatas['post_link_title'] : NULL;
$dataPostCreatedLinkImg = isset($PostFromDatas['post_link_img']) ? $PostFromDatas['post_link_img'] : NULL;
$dataPostCreatedLinkMiniUrl = isset($PostFromDatas['post_link_mini_url']) ? $PostFromDatas['post_link_mini_url'] : NULL; 
$dataPostCreatedImages = isset($PostFromDatas['post_image_id']) ? $PostFromDatas['post_image_id'] : NULL;
$dataPostCreatedVideoID = isset($PostFromDatas['post_video_id']) ? $PostFromDatas['post_video_id'] : NULL;
$dataPostCreatedAudioID = isset($PostFromDatas['post_audio_id']) ? $PostFromDatas['post_audio_id'] : NULL;
$dataPostCreatedFilterName = isset($PostFromDatas['filter_name']) ? $PostFromDatas['filter_name'] : NULL;
$dataPostSlug = isset($PostFromDatas['slug']) ? $PostFromDatas['slug'] : NULL;
$dataSharedPost = isset($PostFromDatas['shared_post']) ? $PostFromDatas['shared_post'] : NULL;

$mpTitle = isset($PostFromDatas['m_product_name']) ? $PostFromDatas['m_product_name'] : NULL; 
$mpDescription = isset($PostFromDatas['m_product_description']) ? $PostFromDatas['m_product_description'] : NULL; 
$mpImages = isset($PostFromDatas['product_images']) ? $PostFromDatas['product_images'] : NULL; 
$mpPrice = isset($PostFromDatas['product_normal_price']) ? $PostFromDatas['product_normal_price'] : NULL; 
$mpCategories = isset($PostFromDatas['product_category']) ? $PostFromDatas['product_category'] : NULL; 
$mpStatus = isset($PostFromDatas['product_status']) ? $PostFromDatas['product_status'] : NULL; 
$mpDiscountPrice =  isset($PostFromDatas['product_discount_price']) ? $PostFromDatas['product_discount_price'] : NULL;
$mpPlace =  isset($PostFromDatas['product_place']) ? $PostFromDatas['product_place'] : NULL;
$mpProductMessageStatus = isset($PostFromDatas['product_message_status']) ? $PostFromDatas['product_message_status'] : NULL;
$mpProductCurrency = isset($PostFromDatas['product_currency']) ? $PostFromDatas['product_currency'] : NULL;

$dataMarketProductAdsDisplayStatus = isset($PostFromData['ads_display_type']) ? $PostFromData['ads_display_type'] : NULL;  
$dataMarketProductAdsStatus = isset($PostFromData['ads_status']) ? $PostFromData['ads_status'] : NULL;   
if($dataMarketProductAdsStatus == '2'){
     $Dot_Out->Dot_UpdateClickProductPrice($dataPost_ID, $uid, $adsPerClick);
} 
$Dot_Out->Dot_ProductClickedSingle($uid, $dataPost_ID); 
if($mpDiscountPrice){
  $mpdifferencePrice = $mpPrice - $mpDiscountPrice; 
  $mppercentage = (100 * $mpdifferencePrice ) / $mpPrice; 
  $mpdis_Percentage = '<div class="percentage"><div class="percentage_co"><div class="arrow_percentage">'.bcdiv($mppercentage, 1).'%</div></div></div>';
  $mptheCurrentPrice = $Dot_Out->Dot_restyle_text($mpDiscountPrice). ' ' .$mpProductCurrency;
  $mptheOldOne = '<div class="price_old"><s>'.$Dot_Out->Dot_restyle_text($mpPrice). ' ' .$mpProductCurrency.'</s></div>';
}else{
	$mpdis_Percentage ='';
    $mptheCurrentPrice = $Dot_Out->Dot_restyle_text($mpPrice). ' ' .$mpProductCurrency;
    $mptheOldOne='';
} 
 
 
$mpTitleColor = substr(md5(rand()), 0, 6); 
$mpcolorText = substr(md5(rand()), 0, 6); 
$dataPostedUserAvatar = $Dot_Out->Dot_UserAvatar($dataPost_UID, $base_url);
$dataProductOwnerFullName = $Dot_Out->Dot_UserFullName($dataPost_UID);
$CheckOnlineUserAddedThisPostFromFavouriteList = $Dot_Out->Dot_PostAddedFavouriteListBefore($uid, $dataPostI_D);
$FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_n_'.$dataPost_ID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M48.07812,16c-8.76364,0 -16,7.22079 -16,15.98438l-0.07812,144.01562l64,-24l64,24v-11.54687v-132.45313c0,-8.7445 -7.2555,-16 -16,-16zM48.07812,32h95.92188v120.90625l-48,-18l-47.98438,18z"></path></g></g></svg>';
$favType = 'ad_fav';
if($CheckOnlineUserAddedThisPostFromFavouriteList) {
   $FavouriteButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_y_'.$dataPost_ID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3e99ed"><path d="M48,16c-1.105,0 -2.17695,0.11508 -3.21875,0.32812c-7.29258,1.49133 -12.78125,7.93688 -12.78125,15.67188v144l64,-24l64,24v-144c0,-1.1 -0.11406,-2.17969 -0.32813,-3.21875c-1.27828,-6.25078 -6.20234,-11.17484 -12.45312,-12.45312c-1.0418,-0.21305 -2.11375,-0.32812 -3.21875,-0.32812z"></path></g></g></svg>'; 
   $favType = 'rem_fav';
}
?> 
<script type="text/javascript">
$(document).ready(function(){ 
  var place = '<?php echo  $mpPlace;?>';
  var embed ="<iframe width='100%' height='150' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( place ) +"&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed'></iframe>";
  $(".o_product_map").html(embed); 
});
</script>
<!--All Product Details STARTED-->
<div class="product_popUp_wrapper">
   <div class="product_popUp_container prdct_in" id="bir"> 
       <div class="product_wr" id="iki">
           <div class="product_header">
               <div class="product_header_icon"><?php echo $Dot_Out->Dot_SelectedMenuIcon('marketplace');?></div>
               <div class="product_name_short"><?php echo $page_Lang['product_details'][$dataUserPageLanguage];?></div>
               <div class="closeProductDetails"><?php echo $Dot_Out->Dot_SelectedMenuIcon('close_icons');?></div>
           </div>
           <!---->
           <div class="out_product_details_container"> 
                <div class="o_product_images">
                    <!--IMage STARTED-->
                    <?php  
		     if($mpImages){
			        $s = explode(",", $mpImages); // Explode the images string value
					$r=1;
					$f=count($s);
					$TotalImage = $f-1;
					$PopUpStart ='';
					$singleImage='';
					if($TotalImage == '1'){
						 $singleImage = 'class="single-image"';
					}
					if($TotalImage > 1){
						 $PopUpStart ='gallery';
					}
					// Add to array the available images
						echo '<div class="item column-1 '.$PopUpStart.'" data-u="'.$dataPostCreatedUserName.'" data-ui="'.$dataPost_UID.'" data-id="'.$dataPost_ID.'" data-type="allImages">';
						foreach($s as $a) {
							// Get the uploaded image ids
						   $newdata=$Dot_Out->Dot_GetUploadImageID($a);
						   if($newdata) {
							  // The path to be parsed
							  $final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
							  echo '
							  <div class="sldimg"  data-src="'.$final_image.'">
							  <a '.$singleImage.' href="'.$final_image.'">
								<div class="sld_jjzlbU '.$dataPostCreatedFilterName.'" style="background-image:url('.$final_image.');">
								  <img src="'.$final_image.'" class="sld-exPexU '.$dataPostCreatedFilterName.'">
								</div>
								</a>
							  </div>
							  ';
							}
							$r=$r+1;
						 } 
						 echo '</div>';
			 }   
					?>
                    <!--IMage FINISHED-->
                </div>
               <span class="sh_prod_wrap" id="after_p<?php echo $dataPost_ID;?>" data-id="<?php echo $dataPost_ID;?>">
                 <div class="o_product_seen">
                      <?php echo $Dot_Out->Dot_SelectedMenuIcon('product_seen_eye_icon');?>
                      <?php echo $countProductSeen;?>
                 </div>
                 <div class="sh_prod eo2As"><div class="dCJp9 iconColor" id="<?php echo $dataPost_ID;?>" data-type="socialshare"><?php echo $Dot_Out->Dot_SelectedMenuIcon('post_sh_icon');?></div></div>
                  <span class="prowmh fav_p f_<?php echo $dataPost_ID;?>" id="f_<?php echo $dataPost_ID;?>" data-post="<?php echo $dataPost_ID;?>" data-fav="<?php echo $favType;?>" data-type="favouritePost">
                        <div class="dCJp8 sh_prod f_a<?php echo $dataPost_ID;?>" id="f_a<?php echo $dataPost_ID;?>">
                            <span class="favw f_i<?php echo $dataPost_ID;?>" id="f_i<?php echo $dataPost_ID;?>"><?php echo $FavouriteButtonClass;?></span>
                        </div>
                    </span>
               </span>
                <div class="product_category" style="color:#<?php echo $mpcolorText;?>;"><?php echo $page_Lang[$Dot_Out->Dot_MarketProductPostCategory($mpCategories)][$dataUserPageLanguage]; ?></div> 
                <div class="o_product_price"><?php echo $mptheCurrentPrice; echo $mpdis_Percentage;?></div>
                <div class="o_product_detail_name" style="color:#<?php echo $mpTitleColor;?>"><?php echo $mpTitle;?></div>
                <div class="o_product_desc">
                    <?php echo strip_unsafe(styletext($mpDescription));?>
                </div>
                <div class="o_product_map"></div>
                <div class="o_product_owner_information">
                  <div class="o_product_owner_text"><?php echo $page_Lang['seller_information'][$dataUserPageLanguage];?></div>
                    <!--Header STARTED-->
                          <div class="Ppjfr">
                             <?php echo $MarketPlacePost;?>
                            <!--User Avatar STARTED-->
                            <div class="user_avatar show_card" id="<?php echo $dataPost_UID;?>" data-user="<?php echo $dataPostCreatedUserName;?>" data-type="userCard">
                              <a href="<?php echo $base_url.'mymarket/'.$dataPostCreatedUserName;?>" title="<?php echo $dataProductOwnerFullName;?>"><img class="_6q-tv" src="<?php echo $dataPostedUserAvatar;?>" alt="<?php echo $dataProductOwnerFullName;?> <?php echo $page_Lang['his_proflie_avatar'][$dataUserPageLanguage];?>"></a>
                            </div>
                            <!--User Avatar FINISHED-->
                            <div class="o_product_owner_box">
                                <!--User Name Started-->
                                <div class="o-UQd"><a class="nJAzx" title="<?php echo $dataProductOwnerFullName;?>" href="<?php echo $base_url.'mymarket/'.$dataPostCreatedUserName;?>"><?php echo $dataProductOwnerFullName;?></a><?php echo $verifiedBadge;?></div> 
                                <!--User Name FINISHED--> 
                                <div class="profileRegisteredTime" title="<?php echo $portime;?>"></div>
                            </div>
                          </div>
                          <!--Header FINISHED-->
                </div>
                <?php if($mpProductMessageStatus != '0' && $dataPost_UID != $uid){?>
                  <!--Ask Question to Seller STARTED-->
                  <div class="o_product_owner_text"><?php echo $page_Lang['ask_fast_question'][$dataUserPageLanguage];?></div>
                  <div class="o_product_fat_question"> 
                        <div class="fastQuestions">
                             <span class="f_p_q" data-question="<?php echo $Dot_Out->Dot_LanguagesID('i_want_to_talk_about_product');?>" data-product="<?php echo $dataPost_ID;?>" data-poid="<?php echo $dataPost_UID;?>"><span class="f_p_q-txt"><?php echo $page_Lang['i_want_to_talk_about_product'][$dataUserPageLanguage];?></span><?php echo $Dot_Out->Dot_SelectedMenuIcon('fast_send_mesage_icon');?></span>
                             <span class="f_p_q" data-question="<?php echo $Dot_Out->Dot_LanguagesID('is_it_still_available');?>" data-product="<?php echo $dataPost_ID;?>" data-poid="<?php echo $dataPost_UID;?>"><span class="f_p_q-txt"><?php echo $page_Lang['is_it_still_available'][$dataUserPageLanguage];?></span><?php echo $Dot_Out->Dot_SelectedMenuIcon('fast_send_mesage_icon');?></span>
                             <span class="f_p_q" data-question="<?php echo $Dot_Out->Dot_LanguagesID('ist_the_price_negotiable');?>" data-product="<?php echo $dataPost_ID;?>" data-poid="<?php echo $dataPost_UID;?>"><span class="f_p_q-txt"><?php echo $page_Lang['ist_the_price_negotiable'][$dataUserPageLanguage];?></span><?php echo $Dot_Out->Dot_SelectedMenuIcon('fast_send_mesage_icon');?></span>
                             <span class="f_p_q" data-question="<?php echo $Dot_Out->Dot_LanguagesID('what_condition_is_it_in');?>" data-product="<?php echo $dataPost_ID;?>" data-poid="<?php echo $dataPost_UID;?>"><span class="f_p_q-txt"><?php echo $page_Lang['what_condition_is_it_in'][$dataUserPageLanguage];?></span><?php echo $Dot_Out->Dot_SelectedMenuIcon('fast_send_mesage_icon');?></span>
                             <span class="f_p_q" data-question="<?php echo $Dot_Out->Dot_LanguagesID('is_it_possible_swap');?>" data-product="<?php echo $dataPost_ID;?>" data-poid="<?php echo $dataPost_UID;?>"><span class="f_p_q-txt"><?php echo $page_Lang['is_it_possible_swap'][$dataUserPageLanguage];?></span><?php echo $Dot_Out->Dot_SelectedMenuIcon('fast_send_mesage_icon');?></span> 
                        </div>
                  </div>
                  <!--Ask Question to Seller FINISHED-->
                  <?php }?>
           </div>
           <!---->
       </div>
   </div>
</div>
<!--All Product Details FINISHED-->