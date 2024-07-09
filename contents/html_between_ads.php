<?php 
  $GetSupponsoredAdsBetween = $Dot->Dot_GetSupponsoredAdvertisement($dataUserGender, $adsPerClick, $adsPerimpression);
  if($GetSupponsoredAdsBetween){ 
       foreach($GetSupponsoredAdsBetween as $supponsoredAdsBetween){
	        $supponsoredAdsIDBetween = $supponsoredAdsBetween['s_ads_id'];
			$supponsoredAdsCreatedUserIDBetween = $supponsoredAdsBetween['ads_created_uid_fk'];
			$supponsoredAdsTitleBetween = $supponsoredAdsBetween['s_ads_title'];
			$supponsoredAdsDescriptionBetween = $supponsoredAdsBetween['s_ads_description'];
			$supponsoredAdsImgBetween = $supponsoredAdsBetween['s_ads_img'];
			$supponsoredAdsTimeBetween = $supponsoredAdsBetween['s_ads_time'];
			$supponsoredAdsWebsiteBetween = $supponsoredAdsBetween['s_ads_website'];
			$supponsoredAdsOfferTypeBetween = $supponsoredAdsBetween['ads_offer'];
			$spType = '';
			if($supponsoredAdsOfferTypeBetween == '1'){$spType = 'spt';}
			if($supponsoredAdsOfferTypeBetween == '2'){$subtractAdsOffer = $Dot->Dot_SubtractAdsOfferImpression($supponsoredAdsIDBetween, $supponsoredAdsCreatedUserIDBetween,$adsPerimpression);}
?>

<!--Advertisement STARTED-->
<div class="zMhqu_Ad white_bg"> 
      <div class="globalBoxHeader">Supponsored <div class="sponsored_post_sprite_new"></div><div class="sponsored_post_sprite_new_dolar"></div></div>
      <a href="<?php echo $supponsoredAdsWebsiteBetween;?>" target="_blank">
      <div class="global_post_info_container <?php echo $spType;?>" id="<?php echo $supponsoredAdsIDBetween;?>" data-type="ads">
       <!--Ads Images STARTED-->
            <div class="item column-1">
				<?php 
                if($supponsoredAdsImgBetween) { 
                  $bams = explode(",", $supponsoredAdsImgBetween); // Explode the images string value
                  $bamr=1;
                  $bamf=count($bams);
                  $bamTotalImage = $bamf-1;  
                      // Get the uploaded image ids
                     $bsmnewdata=$Dot->Dot_GetUploadAdsImageID($supponsoredAdsImgBetween);
                     if($bsmnewdata) { 
                        // The path to be parsed
                        $bsmfinal_image=$base_url."supponsoreduploads/".$bsmnewdata['s_ads_img_img']; 
                        echo '
                         <div class="proAds">
                            <div class="proAds">
                              <img src="'.$bsmfinal_image.'">
                            </div>
                          </div>
                        ';
                   } 
                }
                ?> 
        </div>
         <!--Ads Images FINISHED-->
          <!--Ads Text Details STARTED-->
            <div class="post_text_container">
              <div class="post_title"><?php echo $supponsoredAdsTitleBetween;?></div>
              <div class="post_text_info"><?php echo $supponsoredAdsDescriptionBetween;?></div>
              <div class="ads__url"><?php echo get_domain_from_url($supponsoredAdsWebsiteBetween);?></div>
            </div>
         <!--Ads Text Details FINISHED-->
      </div>
      </a>
      
</div>
<!--Advertisement FINISHED-->
<?php }}?>