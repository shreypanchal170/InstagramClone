<div class="marketPlace_body">
  <div class="marketPlace_main">
    <!--HEADER STARTED-->
    <div class="marketPlace_header">
      <div class="marketPlace_Owner_Informations">
        <div class="marketPlace_Owner_avatar">
          <div id="user_profile_avatar">
            <div class="marketPlace_Page_avatar_image_container" style="background-image: url('<?php echo $mo_profileAvatar;?>'); "></div>
          </div>
        </div>
        <div class="marketPlace_Owner_Item">
          <a href="<?php echo $base_url.'mymarket/'.$Dot->Dot_MarketUrlName($marketID);?>">
            <?php echo $Dot->Dot_MarketName($marketID);?>
          </a>
        </div>
      </div>
    </div>
    <!--HEADER FINISHED-->
    <!--MENU STARTED-->
    <div class="fx7hk">
      <div class="pUmA">
        <!---->
        <div class="marketMenuItem hvr-underline-from-center <?php echo $mmain;?>" data-feed="sale">
          <a href="<?php echo $base_url.'mymarket/'.$Dot->Dot_MarketUrlName($marketID);?>">
            <div class="menu_view">
              <?php echo $page_Lang['product_sales'][$dataUserPageLanguage];?>
            </div>
          </a>
        </div>
        <div class="marketMenuItem hvr-underline-from-center <?php echo $mpsold;?>" data-feed="sold">
          <a href="<?php echo $base_url.'mymarket/sold/'.$Dot->Dot_MarketUrlName($marketID);?>">
            <div class="menu_view">
              <?php echo $page_Lang['product_sold'][$dataUserPageLanguage];?>
            </div>
          </a>
        </div>
        <div class="marketMenuItem hvr-underline-from-center <?php echo $mabout;?>" data-feed="about">
          <a href="<?php echo $base_url.'mymarket/about/'.$Dot->Dot_MarketUrlName($marketID);?>">
            <div class="menu_view">
              <?php echo $page_Lang['market_about'][$dataUserPageLanguage];?>
            </div>
          </a>
        </div>
        <!---->
      </div>
    </div>
    <!--MENU FINISHED-->
    <!--PRODUCTS CONTAINER STARTED-->
    <div class="marketplace_products_container">
      <div class="product_wrapper">
        <?php      
			   if($last_folder == 'mymarket'){ 
				  include_once("contents/products.php");
			   }else  if($last_folder == 'sold'){  
				  include_once("contents/sold.php");
			   }else if($last_folder == 'about'){
				  include_once("contents/about.php");
			   }
		?>

      </div>
    </div>
    <!--PRODUCTS CONTAINER FINISHED-->
  </div>
</div>
<script type="text/javascript">
  var requestMarket = '<?php echo $base_url.'market/'.$marketTheme;?>';
</script>