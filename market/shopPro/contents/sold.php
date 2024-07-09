<?php 
$AllMarketProducts = $Dot->Dot_UserMarketProductsSold($marketOwner_id);
if($AllMarketProducts){
	foreach($AllMarketProducts as $m_d){
		$ProductcolorText = substr(md5(rand()), 0, 6);
		$productDiscount = $m_d['product_discount_price'];
		$productCategory = $m_d['product_category'];
		$productNormalPrice = $m_d['product_normal_price'];
		$productImage = $m_d['product_images'];
		$product_Name = $m_d['m_product_name'];
		$product_Currency = $m_d['product_currency'];  
		$product_owner_user_id = $m_d['user_id_fk'];
		$product_id = $m_d['user_post_id'];
		$dataPostSlug = isset($m_d['slug']) ? $m_d['slug'] : NULL;
		$ExplodeImage = explode(",", $productImage);
		$newdata= $Dot->Dot_GetUploadImageID($productImage);
		$final_image = $base_url."uploads/tumbnails/".$newdata['uploaded_image']; 
		$hasDiscount =  ''; 
		$moneyFormat = number_format($productNormalPrice, 0, '.', ',');
		if($uid == $product_owner_user_id){
		    $p_editButton = '<div class="product_edit" id="'.$product_id.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M131.96744,14.33333c-1.83376,0 -3.66956,0.69853 -5.06706,2.09961l-12.23372,12.23372l28.66667,28.66667l12.23372,-12.23372c2.80217,-2.80217 2.80217,-7.33911 0,-10.13412l-18.53255,-18.53255c-1.40108,-1.40108 -3.23329,-2.09961 -5.06706,-2.09961zM103.91667,39.41667l-82.41667,82.41667v28.66667h28.66667l82.41667,-82.41667z"></path></g></g></svg></div>';
		}
		if($productDiscount){$moneyFormatDiscount = number_format($productDiscount, 0, '.', ','); $hasDiscount = '<div class="produc_discount">'.$moneyFormatDiscount.' '.$product_Currency.'</div>';} 
		echo '
		<!--Product STARTED-->
				 <div class="product_container">'.$p_editButton.'
				  <a href="'.$dataPostSlug.'" class="prduct">
				  <div class="product_main">
					 <div class="product_image">
						 <img src="'.$final_image.'" />
						 '.$hasDiscount.'
					 </div>
					 <div class="product_information">
						 <div class="product_name truncate">'.$product_Name.'</div> 
						 <div class="product_pices" style="color:#'.$ProductcolorText.';">'.$moneyFormat.' '.$product_Currency.'</div>
					 </div>
					 </div>
					 </a>
				 </div>
		<!--PRODUCT FINISHED-->
		';
	}
}
?>