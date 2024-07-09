<?php 
$AllMarketProducts = $Dot->Dot_UserMarketProducts($marketOwner_id);
if($AllMarketProducts){
	foreach($AllMarketProducts as $m_d){
		$ProductcolorText = substr(md5(rand()), 0, 6);
		$productDiscount = $m_d['product_discount_price'];
		$productCategory = $m_d['product_category'];
		$productNormalPrice = $m_d['product_normal_price'];
		$productImage = $m_d['product_images'];
		$product_Name = $m_d['m_product_name'];
		$product_Currency = $m_d['product_currency']; 
		$product_Descript = $m_d['m_product_description'];
		$product_owner_user_id = $m_d['user_id_fk'];
		$product_id = $m_d['user_post_id'];
		$dataPostSlug = isset($m_d['slug']) ? $m_d['slug'] : NULL;
		$ExplodeImage = explode(",", $productImage);
		$newdata= $Dot->Dot_GetUploadImageID($productImage);
		$final_image = $base_url."uploads/tumbnails/".$newdata['uploaded_image']; 
		$hasDiscount =  '';
		$p_editButton = ''; 
		$moneyFormat = number_format($productNormalPrice, 0, '.', ',');
		if($uid == $product_owner_user_id){
		    $p_editButton = '<div class="shopPro_product_edit" id="'.$product_id.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#fc5a6d"><path d="M131.96744,14.33333c-1.83376,0 -3.66956,0.69853 -5.06706,2.09961l-12.23372,12.23372l28.66667,28.66667l12.23372,-12.23372c2.80217,-2.80217 2.80217,-7.33911 0,-10.13412l-18.53255,-18.53255c-1.40108,-1.40108 -3.23329,-2.09961 -5.06706,-2.09961zM103.91667,39.41667l-82.41667,82.41667v28.66667h28.66667l82.41667,-82.41667z"></path></g></g></svg></div>';
		}
	 
		if($productDiscount){
				  $differencePrice = $productNormalPrice - $productDiscount; 
				  $percentage = (100 * $differencePrice ) / $productNormalPrice; 
				  $dis_Percentage = '<div class="shopPro_percentage"><div class="shopPro_percentage_co"><div class="shopPro_arrow_percentage">'.bcdiv($percentage, 1).'%</div></div></div>'; 
				  $theCurrentPrice = $Dot->Dot_restyle_text($productNormalPrice). ' ' .$product_Currency;
				  $theOldOne = '<div class="price_old"><s>'.$Dot->Dot_restyle_text($productNormalPrice). ' ' .$product_Currency.'</s></div>';
		  }else{
			  $theCurrentPrice = $Dot->Dot_restyle_text($productNormalPrice). ' ' .$product_Currency;
			  $theOldOne='';
			  $dis_Percentage ='';
		  } 
		echo ' 	
		<div class="shopPro_product_container">
			 <div class="shopPro_product_tumbnail">'.$p_editButton.' '.$dis_Percentage.'
			 <a href="'.$dataPostSlug.'" class="prduct">
				<img src="'.$final_image.'" /> 
				</a>
			 </div>
			 
			 <a href="'.$dataPostSlug.'" class="prduct">
			 <div class="shopPro_product_details">
				 <div class="shopPro_product_title truncate">'.$product_Name.'</div>
				 <div class="shopPro_product_description truncate">'.$Dot->strip_tags_content($product_Descript).'</div>
				 <div class="shopPro_product_price">'.$theCurrentPrice.' </div>
			 </div>
			 </a>
		 </div>
		';
	}
}
?>