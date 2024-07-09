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
   
  <div class="categoryResults" id="moreProduct">
    <?php 
		     $CateGory = $Dot->Dot_MarketCategoryProductResult($categoryExist);
			   if($CateGory){
			       foreach($CateGory as $results){
				      $sg_ProductName = $results['m_product_name'];
					  $sg_ProductImages = $results['product_images'];
					  $sg_ProductPrice = $results['product_normal_price'];
					  $sg_ProductDiscountPrice = $results['product_discount_price'];
					  $sg_ProductCurrency = $results['product_currency'];
					  $sg_ProductUserID = $results['user_id_fk'];
					  $sg_ProductDescription = $results['m_product_description'];
					  $sg_ProductPostID = $results['user_post_id'];
					  $sg_ProductSlug = $results['slug'];
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
				   }
			   }else {
				    echo '<div class="no_product_found"><div class="not_found_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M86,31.71197c-4.97187,0 -9.27292,2.55313 -11.82605,6.71875l-48.50885,81.02918c-2.55313,4.3 -2.68697,9.53905 -0.13385,13.83905c2.41875,4.3 6.85417,6.98907 11.82605,6.98907h97.15155c4.97188,0 9.54115,-2.5547 11.9599,-6.98907c2.41875,-4.3 2.41927,-9.53905 -0.13385,-13.83905l-48.50885,-81.02918c-2.55313,-4.16562 -6.85417,-6.71875 -11.82605,-6.71875zM86,39.77447c2.01563,0 3.76197,0.9401 4.83697,2.82135l48.64532,81.02917c1.075,1.74688 1.07448,3.89792 0.13385,5.77917c-1.075,1.74687 -2.82345,2.82135 -4.97345,2.82135h-97.2854c-2.01562,0 -3.89845,-1.07448 -4.97345,-2.82135c-1.075,-1.74687 -0.94115,-4.0323 0.13385,-5.77917l48.64532,-81.02917c1.075,-1.74688 2.82135,-2.82135 4.83697,-2.82135zM86,66.24792c-2.28437,0 -4.03125,1.74688 -4.03125,4.03125v28.21875c0,2.28438 1.74688,4.03125 4.03125,4.03125c2.28437,0 4.03125,-1.74687 4.03125,-4.03125v-28.21875c0,-2.28437 -1.74688,-4.03125 -4.03125,-4.03125zM86,108.17188c-2.2264,0 -4.03125,1.80485 -4.03125,4.03125c0,2.2264 1.80485,4.03125 4.03125,4.03125c2.2264,0 4.03125,-1.80485 4.03125,-4.03125c0,-2.2264 -1.80485,-4.03125 -4.03125,-4.03125z"></path></g></g></svg></div><div class="no_product">'.$page_Lang['no_product_found_in_this_category'][$dataUserPageLanguage].'</div></div>';  
			   } 
		   ?>
  </div>
</div>
<!--MIDDLE FINISHED-->

<script type="text/javascript">
$(document).ready(function(){  
scrollLoad = false;
var loadingMini = '<div class="preloader-wrapper small active initial loadingUrl"><div class="spinner-layer spinner-blue initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-red initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-yellow initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-green initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div></div>'; 
    var sload = true;
	$(document.body).on('touchmove', GetMore); // for mobile
	$(window).on('scroll', GetMore);
		function GetMore(){
		/*Show More posts From Explore Page*/  
		  if (sload && $(window).scrollTop() + window.innerHeight >= document.body.scrollHeight) { 
			var PageType = 'more_product';
			var category = '<?php echo $categoryExist;?>';
			var ID = $('#moreProduct').children('.zMhqul').last().attr('data-last'); 
			var dataString = "lastmid=" + ID + '&f=' + PageType + '&c=' + category;
			  $.ajax({
				type: "POST",
				url: requestUrl + 'requests/activity',
				data: dataString,
				cache: false,
				beforeSend: function() {
				  $(".body"+ID).after('<div class="post_explore_box" id="preloadMore"><div class="post_explore_box_in"><div class="noMorePost">'+loadingMini+'</div></div></div>');
				  $('body').addClass('disableScroll'); 
				},
				success: function(response) {
					if(response){
					   $('body').removeClass('disableScroll'); 
					  $("#moreProduct").append(response);
					  $("#preloadMore").remove();
					} 
				   if(response.trim()==''){
					  $('body').removeClass('disableScroll'); 
					  $(".body"+ID).after('<div class="post_explore_box yepnoPost"><div class="post_explore_box_in"><div class="noMorePost">'+seenItAll+'<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg></div></div></div>');
					  sload = false;
					  $("#preloadMore").remove(); 
					   
				   }
				}
			  }); 
			} else {
			  //$('#newsfeed').append(nomorecontent);
			} 
			
		 return false; 
		}
		GetMore();
        var swiper = new Swiper('.swiper-container', {
            pagination: {
               el: '.swiper-pagination',
               dynamicBullets: true,
            },
         });
	
});
</script>
 