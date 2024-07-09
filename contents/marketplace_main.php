<!--MIDDLE STARTED-->
<div class="marpletPlace_wrapper">
  <?php include("contents/market_search.php");?>
  <!--MHS-->
  <div class="marketPlace_h">
     <?php 
	      include("contents/market_menu.php");
	      include("contents/market_slider.php");
	  ?>  
  </div> 
  <!--MHSF-->
  <!--IMPORTANT-->
  <div class="markatplace_products_section">
    <?php  
		 $suggestedProducts = $Dot->Dot_SuggestedProducts(12); 
		 if($suggestedProducts){
			 echo ' <div class="product_boosted">
			  <div class="globalMarketBoxHeader"><div class="sponsor_boost_wrap"><div class="sponsor_rel"><div class="sponsor_rot"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffa000"><path d="M85.91937,8.52609c-2.84715,0.04448 -5.12022,2.3867 -5.07937,5.23391v24.08c-0.02632,1.86088 0.95138,3.59178 2.5587,4.5299c1.60733,0.93812 3.59526,0.93812 5.20259,0c1.60733,-0.93812 2.58502,-2.66902 2.5587,-4.5299v-24.08c0.02002,-1.39533 -0.52591,-2.73928 -1.51329,-3.7254c-0.98738,-0.98611 -2.33203,-1.53032 -3.72734,-1.50851zM49.64485,18.21453c-1.81993,0.07025 -3.46807,1.09462 -4.33672,2.69541c-0.86865,1.6008 -0.82916,3.54093 0.10391,5.10506l12.04,20.855c0.8869,1.66261 2.60952,2.70962 4.49377,2.73132c1.88425,0.0217 3.63053,-0.98536 4.55548,-2.62711c0.92496,-1.64175 0.88152,-3.65713 -0.11332,-5.2575l-12.04,-20.86172c-0.9464,-1.69458 -2.7636,-2.7148 -4.70312,-2.64047zM122.20063,18.21453c-1.88461,-0.01648 -3.62832,0.99575 -4.5486,2.64047l-12.04,20.86172c-0.99483,1.60037 -1.03827,3.61575 -0.11332,5.2575c0.92496,1.64175 2.67123,2.64881 4.55548,2.62711c1.88425,-0.0217 3.60687,-1.06871 4.49377,-2.73132l12.04,-20.855c0.94532,-1.58762 0.96968,-3.55949 0.06387,-5.16998c-0.90581,-1.61049 -2.60355,-2.61378 -4.45121,-2.63049zM23.56938,44.6864c-2.38408,-0.09103 -4.51977,1.46408 -5.16507,3.76097c-0.6453,2.29689 0.36803,4.73671 2.4507,5.90059l20.86172,12.04c1.60037,0.99483 3.61575,1.03827 5.2575,0.11332c1.64175,-0.92496 2.64881,-2.67123 2.62711,-4.55548c-0.0217,-1.88425 -1.06871,-3.60687 -2.73132,-4.49377l-20.855,-12.04c-0.74164,-0.44273 -1.58254,-0.69223 -2.44562,-0.72563zM148.79344,44.6864c-0.98627,-0.03161 -1.96092,0.22022 -2.80844,0.72563l-20.855,12.04c-1.66261,0.8869 -2.70962,2.60952 -2.73132,4.49377c-0.0217,1.88425 0.98536,3.63053 2.62711,4.55548c1.64175,0.92496 3.65713,0.88152 5.2575,-0.11332l20.86172,-12.04c2.0226,-1.1314 3.04289,-3.47238 2.49482,-5.72418c-0.54807,-2.2518 -2.53007,-3.86205 -4.84638,-3.93738zM13.76,80.84c-1.86088,-0.02632 -3.59178,0.95138 -4.5299,2.5587c-0.93812,1.60733 -0.93812,3.59526 0,5.20259c0.93812,1.60733 2.66902,2.58502 4.5299,2.5587h24.08c1.86088,0.02632 3.59178,-0.95138 4.5299,-2.5587c0.93812,-1.60733 0.93812,-3.59526 0,-5.20259c-0.93812,-1.60733 -2.66902,-2.58502 -4.5299,-2.5587zM134.16,80.84c-1.86088,-0.02632 -3.59178,0.95138 -4.5299,2.5587c-0.93812,1.60733 -0.93812,3.59526 0,5.20259c0.93812,1.60733 2.66902,2.58502 4.5299,2.5587h24.08c1.86088,0.02632 3.59178,-0.95138 4.5299,-2.5587c0.93812,-1.60733 0.93812,-3.59526 0,-5.20259c-0.93812,-1.60733 -2.66902,-2.58502 -4.5299,-2.5587zM44.52515,104.8864c-0.98627,-0.03161 -1.96092,0.22022 -2.80844,0.72563l-20.86172,12.04c-1.63833,0.90063 -2.66142,2.61692 -2.6744,4.48643c-0.01298,1.86951 0.98619,3.59984 2.61185,4.52313c1.62566,0.92329 3.62356,0.89513 5.22255,-0.07362l20.855,-12.04c2.02174,-1.13069 3.04233,-3.47001 2.496,-5.7211c-0.54634,-2.25109 -2.52572,-3.86232 -4.84084,-3.94046zM127.83765,104.8864c-2.38276,-0.08765 -4.51534,1.46853 -5.15877,3.76445c-0.64343,2.29591 0.36983,4.73372 2.45112,5.89712l20.855,12.04c1.59899,0.96874 3.59689,0.9969 5.22255,0.07362c1.62566,-0.92329 2.62483,-2.65362 2.61185,-4.52313c-0.01298,-1.86951 -1.03607,-3.5858 -2.6744,-4.48643l-20.86172,-12.04c-0.74164,-0.44273 -1.58254,-0.69223 -2.44563,-0.72563zM62.00063,122.48281c-1.88603,-0.01513 -3.63007,0.99987 -4.5486,2.64719l-12.04,20.855c-0.96874,1.59899 -0.9969,3.59689 -0.07362,5.22255c0.92329,1.62566 2.65362,2.62483 4.52313,2.61185c1.86951,-0.01298 3.5858,-1.03607 4.48643,-2.6744l12.04,-20.86172c0.94532,-1.58762 0.96968,-3.55949 0.06387,-5.16998c-0.90581,-1.61049 -2.60355,-2.61378 -4.45121,-2.63049zM109.84485,122.48953c-1.81782,0.07154 -3.46368,1.09495 -4.33192,2.69362c-0.86824,1.59867 -0.83059,3.5364 0.09911,5.10013l12.04,20.86172c0.90063,1.63833 2.61692,2.66142 4.48643,2.6744c1.86951,0.01298 3.59984,-0.98619 4.52313,-2.61185c0.92329,-1.62566 0.89513,-3.62356 -0.07362,-5.22255l-12.04,-20.855c-0.9464,-1.69458 -2.7636,-2.7148 -4.70312,-2.64047zM85.91937,128.9261c-2.84715,0.04448 -5.12022,2.3867 -5.07937,5.2339v24.08c-0.02632,1.86088 0.95138,3.59178 2.5587,4.5299c1.60733,0.93812 3.59526,0.93812 5.20259,0c1.60733,-0.93812 2.58502,-2.66902 2.5587,-4.5299v-24.08c0.02002,-1.39533 -0.52591,-2.73928 -1.51329,-3.7254c-0.98738,-0.98611 -2.33203,-1.53032 -3.72734,-1.50851z"></path></g></g></svg></div>
<div class="sponsor_dolar"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffa000"><path d="M125.259,100.93533c-2.494,-4.3645 -6.37833,-8.19867 -11.63867,-11.48817c-5.2675,-3.29667 -12.599,-6.31383 -21.98733,-9.05867c-9.38833,-2.73767 -16.13217,-5.7835 -20.22433,-9.14467c-4.09933,-3.34683 -6.149,-7.85467 -6.149,-13.50917c0,-6.09167 1.94217,-10.85033 5.8265,-14.2545c3.87717,-3.41133 9.4815,-5.10983 16.80583,-5.10983c7.01617,0 12.599,2.3005 16.71983,6.90867c1.935,2.15717 3.41133,4.6655 4.44333,7.525c0.50883,1.42617 1.42617,4.72283 1.47633,4.86617c1.4405,4.31433 3.89867,6.82983 8.14133,6.82983c4.687,0 8.48533,-2.967 8.48533,-8.48533c0,-1.03917 -0.22217,-2.13567 -0.35833,-2.78067c-1.29,-6.42133 -3.83417,-11.78917 -7.64683,-16.11067c-5.762,-6.52167 -13.81017,-10.4275 -24.15883,-11.696l-0.03583,-0.00717v-11.08683c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v11.1155c-9.976,1.1825 -17.87367,4.5795 -23.6285,10.26267c-5.88383,5.81217 -8.82933,13.25117 -8.82933,22.32417c0,8.90817 3.00283,16.254 9.0085,22.0375c6.00567,5.77633 15.566,10.4705 28.681,14.06817c9.42417,2.82367 16.11783,5.977 20.09533,9.46c3.96317,3.49017 5.9555,7.77583 5.9555,12.86417c0,6.03433 -2.31483,10.793 -6.93017,14.276c-4.6225,3.483 -10.965,5.2245 -19.03467,5.2245c-8.24883,0 -15.51583,-2.07117 -20.00933,-6.22067c-3.02433,-2.78783 -5.02383,-6.37833 -6.01283,-10.7715c-0.03583,-0.16483 -0.559,-1.849 -0.93167,-2.54417c-1.40467,-2.65167 -4.26417,-4.43617 -7.482,-4.43617c-4.69417,-0.01433 -8.50683,3.79833 -8.50683,8.49967c0,2.064 1.032,4.988 1.34733,5.848c1.6125,4.4075 4.22833,8.41367 7.5035,11.64583c6.32817,6.22783 15.94583,9.81833 26.9825,10.87183v8.80783c0,3.956 3.2035,7.16667 7.1595,7.16667c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-8.67167l0.17917,-0.00717c11.266,-1.0535 20.03083,-4.42183 26.28017,-10.1265c6.24933,-5.6975 9.38117,-13.2225 9.38117,-22.56783c0,-5.86233 -1.25417,-10.9865 -3.741,-15.35817z"></path></g></g></svg>
</div>
</div>
</div> <span class="boosted_hm_t">'.$page_Lang['featured_products'][$dataUserPageLanguage].'</span></div>
   <!---->
		<div class="boosted_market_products">
			<!--PS-->
			   <div class="swiper-container product_swiper">
				  <div class="swiper-wrapper swiper-wrapper-sl">';
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
								<!--OPS-->
								  <div class="swiper-slide">
										 <!--PS-->
										 <div class="marketProduct_boost_cc hoverable">
											<a href="'.$sg_ProductSlug.'" class="prduct">
											 <div class="marketProduct_boost_tumbnail sld_jjzlbU" style="background-image:url('.$final_image.');"> 
												'.$dis_Percentage.'
												<img src="'.$final_image.'"  class="sld-exPexU"/>
											 </div>
											 </a>
											 <div class="marketProduct_boost_product_details">
												 <div class="marketProduct_boost_product_title truncate">'.$sg_ProductName.'</div>
												 <div class="marketProduct_boost_product_description truncate">lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</div>
												 <div class="marketProduct_boost_product_price">'.$theCurrentPrice.'</div>
											 </div>
										 </div>
										 <!--PF-->
								  </div> 
								  <!--OPF-->
								'; 
							 }   
					  } 
  echo ' </div>
				  <!-- Add Pagination -->
				  <span class="swiper-pagination"></span>
				</div>
			 <!--PF-->
		</div>
		<!---->
		</div> 
  </div>'; } ?>

    <!--IMPORTANT-->
    <!--IS-->
    <?php 
	 if($MarketPlaceCategories){
		  foreach($MarketPlaceCategories as $mCategori){
			   $cateGoryIDs  = $mCategori['m_category_id'];
			   $cateGoryKey = $mCategori['m_category_key']; 
			   $ListCategory = $Dot->Dot_MarketProductGroupList(5, $cateGoryIDs);
			   if($ListCategory){
				   $cateGoryIDs;
				   echo '<div class="markatplace_products_section">
								 <div class="marketPlace_Products">
								 <div class="globalMarketBoxCategoriesHeader">'.$page_Lang[$cateGoryKey][$dataUserPageLanguage].' <div class="see_all_about_this_category"><a href="'.$base_url.'marketplace/category/'.$cateGoryID.'">See All</a></div></div>
								 <div class="category_market_products">
									 <div class="swiper-container product_category_swiper">
									   <div class="swiper-wrapper swiper-wrapper-sl">
								 ';
									   foreach($ListCategory as $lc){
												$sg_ProductName = $lc['m_product_name'];
												$sg_ProductImages = $lc['product_images'];
												$sg_ProductPrice = $lc['product_normal_price'];
												$sg_ProductDiscountPrice = $lc['product_discount_price'];
												$sg_ProductCurrency = $lc['product_currency'];
												$sg_ProductUserID = $lc['user_id_fk'];
												$sg_ProductPostID = $lc['user_post_id'];
												$sg_ProductSlug = $lc['slug'];
												$dis_Percentage ='';
												$color_sg = substr(md5(rand()), 0, 6); 
												if($sg_ProductDiscountPrice){
														$differencePrice = $sg_ProductPrice - $sg_ProductDiscountPrice; 
														$percentage = (100 * $differencePrice ) / $sg_ProductPrice; 
														$dis_Percentage = '<div class="percentage"><div class="percentage_co"><div class="arrow_percentage">'.bcdiv($percentage, 1).'%</div></div></div>';
														$theCurrentPrice = $Dot->Dot_restyle_text($sg_ProductPrice). ' ' .$sg_ProductCurrency;
														$theOldOne = '<div class="price_old"><s>'.$Dot->Dot_restyle_text($sg_ProductPrice). ' ' .$sg_ProductCurrency.'</s></div>';
												}else{
													$theCurrentPrice = $Dot->Dot_restyle_text($sg_ProductPrice). ' ' .$sg_ProductCurrency;
													$theOldOne='';
												} 
												   $newdata=$Dot->Dot_GetUploadImageID($sg_ProductImages);
												   if($newdata) {
													  // The path to be parsed
													  $final_image=$base_url."uploads/images/".$newdata['uploaded_image']; 
													  
													  echo '
													  <!--OPS-->
														<div class="swiper-slide">
															   <!--PS-->
															   <div class="marketProduct_boost_cc hoverable">
																  <a href="'.$sg_ProductSlug.'" class="prduct">
																   <div class="marketProduct_boost_tumbnail sld_jjzlbU" style="background-image:url('.$final_image.');"> 
																	  '.$dis_Percentage.'
																	  <img src="'.$final_image.'"  class="sld-exPexU"/>
																   </div>
																   </a>
																   <div class="marketProduct_boost_product_details">
																	   <div class="marketProduct_boost_product_title truncate">'.$sg_ProductName.'</div>
																	   <div class="marketProduct_boost_product_description truncate">lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</div>
																	   <div class="marketProduct_boost_product_price">'.$theCurrentPrice.'</div>
																   </div>
															   </div>
															   <!--PF-->
														</div> 
														<!--OPF-->
													  '; 
												   }   
				   }
				   echo '</div>
						   </div>
						   </div>
						   </div>
						   </div>';
			   }
		  }
	 }
  ?>

    <!--IF-->
  </div>
  <!--MIDDLE FINISHED-->
