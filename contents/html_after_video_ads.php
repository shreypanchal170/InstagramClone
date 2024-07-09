<?php
function remove_http($url) {
   $disallowed = array('http://', 'https://');
   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }
   return $url;
}
$aGetSupponsoredAds = $Dot->Dot_GetSupponsoredAdvertisement($dataUserGender, $adsPerClick, $adsPerimpression);
if($aGetSupponsoredAds){
	foreach($aGetSupponsoredAds as $asupponsoredAds){ 
		    $asupponsoredAdsIDBetween = $asupponsoredAds['s_ads_id'];
			$asupponsoredAdsCreatedUserIDBetween = $asupponsoredAds['ads_created_uid_fk'];
			$asupponsoredAdsTitleBetween = $asupponsoredAds['s_ads_title'];
			$asupponsoredAdsDescriptionBetween = $asupponsoredAds['s_ads_description'];
			$asupponsoredAdsImgBetween = $asupponsoredAds['s_ads_img'];
			$asupponsoredAdsTimeBetween = $asupponsoredAds['s_ads_time'];
			$asupponsoredAdsWebsiteBetween = $asupponsoredAds['s_ads_website'];
			$asupponsoredAdsOfferTypeBetween = $asupponsoredAds['ads_offer'];
			$aspType = '';
			if($asupponsoredAdsOfferTypeBetween == '1'){$aspType = 'spt';}
			if($asupponsoredAdsOfferTypeBetween == '2'){$asubtractAdsOffer = $Dot->Dot_SubtractAdsOfferImpression($asupponsoredAdsIDBetween, $asupponsoredAdsCreatedUserIDBetween,$adsPerimpression);}
			$absmnewdata=$Dot->Dot_GetUploadAdsImageID($asupponsoredAdsImgBetween);
		  ?>
 <div class="afterVideoAds afterVideoAds<?php echo $afterVideoID;?>" id="afterVideoAds<?php echo $afterVideoID;?>">
     <a href="<?php echo $asupponsoredAdsWebsiteBetween;?>">
       <div class="afterVideoAdsImage">
            <?php 
			if($absmnewdata) { 
			    $sbsmfinal_image=$base_url."supponsoreduploads/".$absmnewdata['s_ads_img_img']; 
				echo '
				<div class="aproposed">
				  <div class="aproposed-item">
					 <div class="aproposed-item-box" style="background-image: url('.$sbsmfinal_image.');"></div>
				  </div> 
			   </div>
				';
			}
			?>
       </div>
       <div class="afterVideoAdsDescriptions">
           <div class="afterVideoAdsWebsiteAddress truncate"><?php echo remove_http($asupponsoredAdsWebsiteBetween);?></div>
           <div class="afterVideoAdsTitle truncate"><?php echo $asupponsoredAdsTitleBetween;?></div>
           <div class="afterVideoAdsDescription"><?php echo $asupponsoredAdsDescriptionBetween;?></div>
       </div>
       </a>
 </div>
<?php }
}
?>