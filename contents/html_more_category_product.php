<?php 
$sg_ProductName = $PostFromData['m_product_name'];
$sg_ProductImages = $PostFromData['product_images'];
$sg_ProductPrice = $PostFromData['product_normal_price'];
$sg_ProductDiscountPrice = $PostFromData['product_discount_price'];
$sg_ProductCurrency = $PostFromData['product_currency'];
$sg_ProductUserID = $PostFromData['user_id_fk'];
$sg_ProductDescription = $PostFromData['m_product_description'];
$sg_ProductPostID = $PostFromData['user_post_id'];
$sg_ProductSlug = $PostFromData['slug'];
$dis_Percentage ='';
$color_sg = substr(md5(rand()), 0, 6); 
if($sg_ProductDiscountPrice){
		$differencePrice = $sg_ProductPrice - $sg_ProductDiscountPrice; 
		$percentage = (100 * $differencePrice ) / $sg_ProductPrice; 
		$dis_Percentage = '<div class="percentage"><div class="percentage_co"><div class="arrow_percentage">'.bcdiv($percentage, 1).'%</div></div></div>';
		$theCurrentPrice = number_format($sg_ProductDiscountPrice, 0, '.', ','). ' ' .$sg_ProductCurrency;
		$theOldOne = '<div class="price_old"><s>'.number_format($sg_ProductPrice, 0, '.', ','). ' ' .$sg_ProductCurrency.'</s></div>';
}else{
	$theCurrentPrice = number_format($sg_ProductPrice, 0, '.', ','). ' ' .$sg_ProductCurrency;
	$theOldOne='';
} 
   $newdata=$Dot->Dot_GetUploadImageID($sg_ProductImages);
   if($newdata) {
	  // The path to be parsed
	  $final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
	  echo '
		 <div class="categoryProductWrapper zMhqul" data-last="'.$sg_ProductPostID.'">
				  <div class="categoryPro hoverable">
					<a href="'.$sg_ProductSlug.'" class="prduct">
					  <div class="marketProduct_boost_tumbnail sld_jjzlbU" style="background-image:url('.$final_image.');">
					   '.$dis_Percentage.'
						<img src="'.$final_image.'" class="sld-exPexU">
					  </div>
					</a>
					<div class="marketProduct_category_boost_product_details">
					  <div class="marketProduct_boost_product_title truncate">'.$sg_ProductName.'</div>
					  <div class="marketProduct_boost_product_description truncate">'.strip_tags($sg_ProductDescription).'</div>
					  <div class="marketProduct_boost_product_price">'.$theCurrentPrice.'</div>
					</div>
					</div>
				  </div>
	  ';
   }
?>