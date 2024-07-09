<?php include_once("market/$marketTheme/functions/marketFunctions.php"); $DotShopPro = new DOT_MARKET($db);   ?>
<div class="shopPro_body">
   <div class="shopPro_main">
    <!--1S-->  
        <div class="shopPro_header" style="background-image:url(<?php echo $DotShopPro->Market_Cover($marketID,$marketTheme, $base_url);?>);">
             <div class="shopPro_edit"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#fc5a6d"><path d="M131.96744,14.33333c-1.83376,0 -3.66956,0.69853 -5.06706,2.09961l-12.23372,12.23372l28.66667,28.66667l12.23372,-12.23372c2.80217,-2.80217 2.80217,-7.33911 0,-10.13412l-18.53255,-18.53255c-1.40108,-1.40108 -3.23329,-2.09961 -5.06706,-2.09961zM103.91667,39.41667l-82.41667,82.41667v28.66667h28.66667l82.41667,-82.41667z"></path></g></g></svg></div>
             <div class="shopPro_header_in">
                   <div class="shopPro_logo"><img src="<?php echo $DotShopPro->Market_Logo($marketID,$marketTheme, $base_url) ;?>" /></div>
                   <div class="shopPro_title">
                       <h3><?php echo $marketSlogan;?></h3>
                       <h1><?php echo $marketName;?></h1>
                       <p><?php echo mb_strimwidth($marketAbout, 0, 200 , '...' );?></p>
                       <div class="shopPro_button_wrapper">
                           <div class="shopPro_button hvr-bounce-to-bottom aboutmarket" id="<?php echo $marketUserName;?>"> <?php echo $page_Lang['read_more_about_market'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
             </div>
        </div>
       <!--1F--> 
      <?php  include_once("contents/discountProducts.php");?> 
       <!--3S-->
       <div class="shopPro_section bg_light">  
               <div class="shopPro_products">
               <div class="shopPro_discount_title padding_helper"> <?php echo $page_Lang['our_market_products'][$dataUserPageLanguage]; ?></div>
                      <?php  include_once("contents/products.php");?>
              </div>
       </div>
       <!--3F--> 
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){ 
	 //$(".parallax").parallax(); 
	  var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      }
    });
  }); 
  var requestMarket = '<?php echo $base_url.'market/'.$marketTheme;?>';
</script> 