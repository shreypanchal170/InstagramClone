<?php 
  $GetSupponsoredAds = $Dot->Dot_GetSupponsoredAdvertisement($dataUserGender, $adsPerClick, $adsPerimpression);
  if($GetSupponsoredAds){
	  echo '<div class="uMnUsrS">   
	        <div class="globalBoxHeader">Supponsored <div class="sponsored_post_sprite_new"></div><div class="sponsored_post_sprite_new_dolar"></div></div>
	  ';
      foreach($GetSupponsoredAds as $supponsoredAds){
	        $supponsoredAdsID = $supponsoredAds['s_ads_id'];
			$supponsoredAdsCreatedUserID = $supponsoredAds['ads_created_uid_fk'];
			$supponsoredAdsTitle = $supponsoredAds['s_ads_title'];
			$supponsoredAdsDescription = $supponsoredAds['s_ads_description'];
			$supponsoredAdsImg = $supponsoredAds['s_ads_img'];
			$supponsoredAdsTime = $supponsoredAds['s_ads_time'];
			$supponsoredAdsWebsite = $supponsoredAds['s_ads_website'];
			$supponsoredAdsOfferType = $supponsoredAds['ads_offer']; 
			$spTypes = '';
			if($supponsoredAdsOfferType == '1'){$spTypes = 'spt';}
			if($supponsoredAdsOfferType == '2'){$subtractAdsOffer = $Dot->Dot_SubtractAdsOfferImpression($supponsoredAdsID, $supponsoredAdsCreatedUserID,$adsPerimpression);}
			 echo '<a href="'.$supponsoredAdsWebsite.'" target="_blank"><div class="'.$spTypes.'"  id="'.$supponsoredAdsID.'" data-type="ads"><div class="support_ads_container">';
				     if($supponsoredAdsImg) { 
							$ams = explode(",", $supponsoredAdsImg); // Explode the images string value
							$amr=1;
							$amf=count($ams);
							$amTotalImage = $amf-1; 
							 
							// Add to array the available images
							echo '<div class="mostPopularImageContainer">';
							 
								// Get the uploaded image ids
							   $smnewdata=$Dot->Dot_GetUploadAdsImageID($supponsoredAdsImg);
							   if($smnewdata) { 
								  // The path to be parsed
								  $smfinal_image=$base_url."supponsoreduploads/".$smnewdata['s_ads_img_img']; 
								  echo '
								  <div class="sldimg">
									<div class="sld_jjzlbU_mostPopular">
									  <img src="'.$smfinal_image.'">
									</div>
								  </div>
								  ';
							 } 
					 echo '</div>';
					}   
		      echo '</div>';
			  echo '<div class="sadsTitle">'.$supponsoredAdsTitle.'</div>';
			  echo '<div class="sadsDescription">'.$supponsoredAdsDescription.'</div>';
			  echo '<div class="sadsWebsite">'.$supponsoredAdsWebsite.'</div>';
			 echo '</div></a>';
	  }
	  echo '</div>';
  }
?>