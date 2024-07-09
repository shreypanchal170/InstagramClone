<?php 
//include_once 'functions/control.php';
include_once 'functions/inc.php';  
$page ='marketplace';   
if(isset($_GET['category']) ? $_GET['category'] : ''){ 
    $getp = isset($_GET['category']) ? $_GET['category'] : '';	 
	$getSecury = $Dot->Dot_ProductCategorySecurity($getp);
	if($getSecury){
	    $categoryExist = $getp;
	}else{$categoryExist = '';} 
}
if(isset($_GET['sproduct']) ? $_GET['sproduct'] : ''){ 
    $searchedKeySlug = isset($_GET['sproduct']) ? $_GET['sproduct'] : '';	 
	$searchedKey = str_replace("-", " ", $searchedKeySlug); 
	$lastProductID = isset($_POST['lastmid']) ? $_POST['lastmid'] : ''; 
}
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
?> 
<div class="section">
   <div class="main">
       <div class="marketplace_container">
           <?php    
				 if(!empty($categoryExist)){
			          include('contents/market_category_results.php');
				 }else if(!empty($searchedKey)){
				     include('contents/marketplace_product_search.php');
				 }else{
				     include('contents/marketplace_main.php');
				 }
		   ?>
       </div> 
   </div>
</div> 
<!--Full With Footer STARTED-->
        <div class="settings_out_footer_market">
           <div class="VWk7Y iseBh">
                <?php include("contents/footer_menu.php");?>
           </div>
       </div>
    <!--Full With Footer FINISHED-->
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");  
?>
<script type="text/javascript">
$(document).ready(function(){ 
	 //$(".parallax").parallax(); 
	  var swiper = new Swiper('.product_swiper', {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
		  breakpoints: {
			1024: {
			  slidesPerView: 3,
			  spaceBetween: 40,
			},
			768: {
			  slidesPerView: 2,
			  spaceBetween: 30,
			},
			450: {
			  slidesPerView: 1,
			  spaceBetween: 10,
			}  
		  }
    });
	var swiper = new Swiper('.product_category_swiper', {
      slidesPerView: 4,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
		  breakpoints: {
			1024: {
			  slidesPerView: 3,
			  spaceBetween: 40,
			},
			768: {
			  slidesPerView: 2,
			  spaceBetween: 30,
			} ,
			450: {
			  slidesPerView: 1,
			  spaceBetween: 10,
			} 
		  }
    }); 
	var swiper = new Swiper('.ads_h_s', {
		lazy: true,
		  pagination: {
			 el: '.pagina',
			 dynamicBullets: true,
		  }
	   }); 
  });
</script>  
</body>
</html>