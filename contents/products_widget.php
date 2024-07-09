<?php 
	       $suggestedProducts = $Dot->Dot_SuggestedProducts(5);
		   if($suggestedProducts){
			   $boostTour = $Dot->Dot_CheckTourSawBefore($uid, 1723) ? '<div style="position:absolute;width:100%;height:100%;z-index:2;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1723" data-tip="1723"></div>' : '';
			   echo '
			   <div class="uMnUsrS b_prod">
			   '.$boostTour.'
   <div class="globalBoxHeader"><span class="hsvg"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M34.4,17.2c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v5.73333l-17.2,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667l11.46667,-22.93333h17.2l-5.73333,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-22.93333h22.93333v22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c0.79192,0 1.56015,-0.08247 2.30677,-0.23516c5.22635,-1.06879 9.15989,-5.68809 9.15989,-11.23151l-5.73333,-22.93333h17.2l11.46667,22.93333c0,6.33533 5.13133,11.46667 11.46667,11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667l-17.2,-22.93333v-5.73333c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667zM74.53333,77.07526c-3.3884,1.97227 -7.26987,3.19141 -11.46667,3.19141c-4.18533,0 -8.05041,-1.21368 -11.43307,-3.18021c-3.3884,1.98374 -7.29773,3.18021 -11.50026,3.18021c-4.16813,0 -8.02828,-1.20848 -11.39948,-3.15781c-3.39413,1.98947 -7.32559,3.15781 -11.53385,3.15781v63.06667c0,6.33533 5.13133,11.46667 11.46667,11.46667h68.8v-57.33333h34.4v57.33333h11.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-63.06667c-4.20827,0 -8.13972,-1.16834 -11.53386,-3.15781c-3.3712,1.94933 -7.23134,3.15781 -11.39948,3.15781c-4.20253,0 -8.11186,-1.19648 -11.50026,-3.18021c-3.38267,1.96653 -7.24774,3.18021 -11.43308,3.18021c-4.1968,0 -8.07827,-1.21914 -11.46667,-3.19141c-3.3884,1.97227 -7.26987,3.19141 -11.46667,3.19141c-4.1968,0 -8.07827,-1.21914 -11.46667,-3.19141zM40.13333,97.46667h34.4v34.4h-34.4z"></path></g></g></svg></span> <span class="hm_t">'.$page_Lang['featured_products'][$dataUserPageLanguage].'</span></div>
   <div class="product_sug">
			   <div class="item products-column">';
			    foreach($suggestedProducts as $sgp){
				    $sg_ProductName = $sgp['m_product_name'];
					$sg_ProductImages = $sgp['product_images'];
					$sg_ProductPrice = $sgp['product_normal_price'];
					$sg_ProductDiscountPrice = $sgp['product_discount_price'];
					$sg_ProductCurrency = $sgp['product_currency'];
					$sg_ProductUserID = $sgp['user_id_fk'];
					$sg_ProductPostID = $sgp['user_post_id'];
					$sg_ProductSlug = $sgp['slug'];
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
						  <div class="sldimg">
						   <a href="'.$sg_ProductSlug.'" class="prduct">
							   <div class="sld_jjzlbU " style="background-image:url('.$final_image.');">
							     <img src="'.$final_image.'" class="sld-exPexU">
								 '.$dis_Percentage.'
							   </div>
							</a>
							<div class="pw_infos">
							   <div class="product_s_name">'.$sg_ProductName.'</div>
							   '.$theOldOne.'
							   <div class="product_pr" style="color:#'.$color_sg.';">'.$theCurrentPrice.'</div> 
							</div>
							
						  </div>
						  '; 
					   }   
				}
				echo '</div>
				</div>
   <div class="see_all_btn"><a href="'.$base_url.'marketplace">'.$page_Lang['see_more_products'][$dataUserPageLanguage].'</a></div>
</div>
				';
		   }
	   ?>
   