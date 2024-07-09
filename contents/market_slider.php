<?php if(!$marketPlaceSliderEnableDisable == 0){?>
<div class="marketPlace_h_r">
      <div class="marketPlace_h_r_in">
          <div class="marketPlace_h_slider_wpr">
            <!---->
            <div class="swiper-container ads_h_s">
                <div class="swiper-wrapper swiper-wrapper-ads"> 
<?php   
   $marketSliderAds = $Dot->Dot_AdvertisementMarketPlaceSlider($categoryExist);
   if($marketSliderAds){
	   foreach($marketSliderAds as $sads){
		   $sadsID = $sads['ads_slider_id'];
		   $sadsImage = $sads['ads_slider_image'];
		   $sadsURL = $sads['ads_slider_redirect_url']; 
		   echo '
			   <div class="swiper-slide"><div class="sld_jjzlbU_market_ads"  style="background-image:url('.$base_url.'uploads/market_slider/'.$sadsImage.');"><a href="'.$sadsURL.'" target="blank_"><img src="'.$base_url.'uploads/market_slider/'.$sadsImage.'" class="sld-exPexU_market_ads" /></a></div></div>
		   ';
	   }
   }else{
	  echo '<div class="swiper-slide"><a href="'.$base_url.'" target="blank_"><img src="'.$base_url.'uploads/market_slider/default.png" /></a></div>';
   }
?>
                  </div>
                <!-- Add Pagination -->
                <span class="swiper-pagination pagina"></span>
              </div>
            <!---->
            </div>
      </div>
    </div>
<?php } ?>