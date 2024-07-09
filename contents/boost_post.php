<?php 
$dataPostID = $PostFromData['user_post_id'];
$dataPostUID = $PostFromData['user_id_fk'];
$dataPostType = $PostFromData['post_type'];
$dataUserVerified = $PostFromData['verified_user'];
$time = $PostFromData['post_created_time']; 
$message_time=date("c", $time);
$postPageType = isset($PostFromData['post_page_type']) ? $PostFromData['post_page_type'] : NULL;      
$dataPostCreatedUserName = $PostFromData['user_name'];
$daUserStyleMode = $PostFromData['style_mode'];   
$dataPostCreatedUserFullName = $PostFromData['user_fullname'];      
$dataPostSlug = isset($PostFromData['slug']) ? $PostFromData['slug'] : NULL; 

//////////////////////////////////////////////////////
$dataMarketProductTitle = isset($PostFromData['m_product_name']) ? $PostFromData['m_product_name'] : NULL; 
$dataMarketProductDescription = isset($PostFromData['m_product_description']) ? $PostFromData['m_product_description'] : NULL; 
$dataMarketProductImages = isset($PostFromData['product_images']) ? $PostFromData['product_images'] : NULL; 
$dataMarketProductPrice = isset($PostFromData['product_normal_price']) ? $PostFromData['product_normal_price'] : NULL; 
$dataMarketProductCategory = isset($PostFromData['product_category']) ? $PostFromData['product_category'] : NULL; 
$dataMarketProductStatus = isset($PostFromData['product_status']) ? $PostFromData['product_status'] : NULL; 
$dataMarketProductDiscountPrice =  isset($PostFromData['product_discount_price']) ? $PostFromData['product_discount_price'] : NULL; 
$dataMarketProductCurrency =  isset($PostFromData['product_currency']) ? $PostFromData['product_currency'] : NULL;  

if($dataMarketProductDiscountPrice){
  $data_differencePrice = $dataMarketProductPrice - $dataMarketProductDiscountPrice; 
  $data_percentage = (100 * $data_differencePrice ) / $dataMarketProductPrice; 
  $data_dis_Percentage = '<div class="percentage"><div class="percentage_co"><div class="arrow_percentage">'.bcdiv($data_percentage, 1).'%</div></div></div>';
  $theCurrentPrice = number_format($dataMarketProductDiscountPrice, 0, '.', ','). ' ' .$dataMarketProductCurrency;
  $theOldOne = '<div class="price_old"><s>'.number_format($dataMarketProductPrice, 0, '.', ','). ' ' .$dataMarketProductCurrency.'</s></div>';
}else{
	$data_dis_Percentage ='';
  $theCurrentPrice = number_format($dataMarketProductPrice, 0, '.', ','). ' ' .$dataMarketProductCurrency;
  $theOldOne='';
}


$MarketPlacePost =''; 
if($dataMarketProductPrice){
   $MarketPlacePost = '<span class="m_pst"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,5.73333c-1.4663,0 -2.93278,0.55882 -4.05364,1.67969l-38.45365,38.45365h16.21458l26.29271,-26.29271l26.29271,26.29271h16.21458l-38.45364,-38.45365c-1.12087,-1.12087 -2.58734,-1.67969 -4.05364,-1.67969zM17.2,57.33333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v11.46667c0,3.1648 2.56853,5.73333 5.73333,5.73333h0.95182l8.91354,53.48125c0.92307,5.52693 5.70843,9.58542 11.3099,9.58542h95.23828c5.6072,0 10.38683,-4.05848 11.30989,-9.58542l8.92474,-53.48125h0.95183c3.1648,0 5.73333,-2.56853 5.73333,-5.73333v-11.46667c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333zM63.06667,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM86,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM108.93333,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333z"></path></g></g></svg></span>';
}
$str_lengthProductDescription = strlen($dataMarketProductDescription);
$showMoreProductDetailBtn ='';
$longProductDescription ='';
if($str_lengthProductDescription > 500) {
   $longProductDescription= 'readmore';
   $showMoreProductDetailBtn = '<div class="showMoreText" id="'.$dataPostID.'" data-more="'.$page_Lang['close_read_more'][$dataUserPageLanguage].'" data-less="'.$page_Lang['read_more_text'][$dataUserPageLanguage].'" title="more"><span class="cht_'.$dataPostID.'">'.$page_Lang['read_more_text'][$dataUserPageLanguage].'</span><span class="iconre icls_'.$dataPostID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>';
} 
 
//////////////////////////////////////////////////////



if($dataPostSlug){
   $slugSeo = $base_url.'status/'.$dataPostSlug;
}else{
   $slugSeo = $base_url.'status/'.$dataPostID;
}
$dataPostedUserAvatar = $Dot->Dot_UserAvatar($dataPostUID, $base_url); 
//Check loged in USER ID for buttons 
 
 
$verifiedBadge = '';
if($dataUserVerified == '1'){
   $verifiedBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
}
  
$longText = '';
$showMoreBtn = '';
$str_length = strlen($postTextDetails);
if($str_length > 500) {
   $longText= 'readmore';
   $showMoreBtn = '<div class="showMoreText" id="'.$dataPostID.'" data-more="'.$page_Lang['close_read_more'][$dataUserPageLanguage].'" data-less="'.$page_Lang['read_more_text'][$dataUserPageLanguage].'" title="more"><span class="cht_'.$dataPostID.'">'.$page_Lang['read_more_text'][$dataUserPageLanguage].'</span><span class="iconre icls_'.$dataPostID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>';
} 
 
 
?>  
  <!--Global POST CONTAINER STARTED-->
  <div class="global_post_info_container" id="resharep" data-id="<?php echo $dataPostID;?>">
    <div class="fast_icon_answer ic<?php echo $dataPostID;?>" id="ic<?php echo $dataPostID;?>"></div>
     <?php 
	 if($dataMarketProductPrice){ 
			   $color = substr(md5(rand()), 0, 6); 
			   $colorText = substr(md5(rand()), 0, 6);  
		     if($dataMarketProductImages){
			        $s = explode(",", $dataMarketProductImages); // Explode the images string value
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
						echo '<div class="item column-1 '.$PopUpStart.'" data-u="'.$dataPostCreatedUserName.'" data-ui="'.$dataPostUID.'" data-id="'.$dataPostID.'" data-type="allImages">';
						foreach($s as $a) {
							// Get the uploaded image ids
						   $newdata=$Dot->Dot_GetUploadImageID($a);
						   if($newdata) {
							  // The path to be parsed
							  $final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
							  echo '
							  <div class="sldimg"  data-src="'.$final_image.'">
							  <a '.$singleImage.' href="'.$final_image.'">
								<div class="sld_jjzlbU " style="background-image:url('.$final_image.');">
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
			 $explodeCurrency = explode(",", $productCurrency); 
			 echo '<div class="product_category" style="color:#'.$colorText.';">'.$page_Lang[$Dot->Dot_MarketProductPostCategory($dataMarketProductCategory)][$dataUserPageLanguage].' '.$data_dis_Percentage.'</div>';
			 echo '<div class="product_post_title">'.$dataMarketProductTitle.'</div>';
			 echo '<div class="product_post_description post_info'.$dataPostID.' '.$longProductDescription.'" id="post_info'.$dataPostID.'" data-linkify="this" data-linkify-target="_target" data-trl="'.$dataMarketProductDescription.'">'.strip_unsafe(styletext($dataMarketProductDescription)).' '.$showMoreProductDetailBtn.'</div>';
			 echo '
			    <div class="product_more" style="background-color:#'.$color.';">
				    <div class="product_price"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="19" height="19" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M165.10656,70.10344l0.01344,-51.18344c0,-6.63812 -5.40187,-12.04 -12.04,-12.04l-51.17,0.01344l-2.16344,-0.01344c-4.46125,0 -8.7075,0.25531 -11.77125,3.31906l-78.17938,78.16594c-1.88125,1.88125 -2.91594,4.38063 -2.91594,7.04125c0,2.64719 1.03469,5.14656 2.91594,7.02781l59.77,59.77c1.86781,1.88125 4.36719,2.91594 7.02781,2.91594c2.64719,0 5.16,-1.03469 7.02781,-2.91594l78.17937,-78.19281c3.35938,-3.34594 3.3325,-8.15656 3.31906,-12.80594zM109.73063,91.16l-4.81063,-4.81062c3.09063,-4.47469 3.78938,-9.98406 -1.37062,-15.14406c-7.22938,-7.21594 -13.07469,-3.09063 -15.14406,-1.03469c-4.81063,4.82406 -1.72,10.66937 2.41875,17.2c4.81062,7.91469 8.93594,16.86406 1.02125,24.77875c-9.28531,9.63469 -20.64,3.77594 -25.10125,0.68531l-4.47469,4.47469l-4.82406,-4.82406l4.82406,-4.81063c-3.44,-4.81062 -8.26406,-14.44531 1.37062,-25.8l4.81063,4.81063c-3.09063,3.09062 -6.88,11.00531 0.69875,18.57062c7.56531,7.57875 12.72531,5.85875 16.85062,1.72c11.69063,-11.69062 -18.92,-26.48531 -3.44,-41.96531c8.25063,-8.25063 18.57063,-4.47469 23.04531,-1.03469l5.50937,-5.49594l4.81063,4.81063l-5.49594,5.50937c5.84531,8.25063 3.09062,15.48 -0.69875,22.36zM134.16,48.16c-5.6975,0 -10.32,-4.6225 -10.32,-10.32c0,-5.6975 4.6225,-10.32 10.32,-10.32c5.6975,0 10.32,4.6225 10.32,10.32c0,5.6975 -4.6225,10.32 -10.32,10.32z"></path></g></g></g></svg> '.$theCurrentPrice.'</div>
					<a href="'.$dataPostSlug.'" class="prduct"><span class="go_product">'.$page_Lang['shop_now'][$dataUserPageLanguage].' <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M79.6145,21.5v0c-9.5245,0 -15.2005,10.61383 -9.91867,18.54017l30.6375,45.95983l-30.6375,45.95983c-5.28183,7.92633 0.39417,18.54017 9.91867,18.54017v0c3.98467,0 7.71133,-1.99233 9.92583,-5.3105l34.15633,-51.24167c3.21067,-4.816 3.21067,-11.08683 0,-15.90283l-34.15633,-51.24167c-2.2145,-3.311 -5.934,-5.30333 -9.92583,-5.30333z"></path></g></g></svg></span></a>
				</div>
			 ';
		 }
	 ?>
<!--Post FINISHED--> 
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('.currency').formSelect(); 
}); 
</script>
