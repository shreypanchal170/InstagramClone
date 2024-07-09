<?php  
include("functions/inc.php");
if(empty($uid)){
   header("Location: $base_url");   
}
$page = 'buycredit';
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
$getp ='';  
if(isset($_GET['cr'])){ $getp = isset($_GET['cr']) ? $_GET['cr'] : '';	}   
?>  
<div class="section">
<div class="main">
 <div class="container"> 
      <!--MIDDLE STARTED-->
      <div class="buyCreditContainer">  
      <div class="AdvertiseSuccess"></div>
      <div id="buycredit" data-c="<?php echo $dataUserCredit;?>"> 
        <div class="CreditModuleHeader">
            <div class="creditModuleHeaderItem">
                <div class="creditModuleHeaderItem_in">
                     <div class="y_credit wallet_icon">
                          <div class="y_credit_header"><?php echo $dataUserCredit;?></div>
                          <span>$</span>
                     </div>
                     <div class="y_footer">
                          <div class="footer_middle wallet_mini"></div>
                          <div class="footer_footer"><?php echo $page_Lang['grow_business'][$dataUserPageLanguage];?></div>
                          <div class="create_ads_button  crads"><?php echo $page_Lang['create_advertisements'][$dataUserPageLanguage];?></div>
                     </div>
                </div>
            </div>
            <div class="creditModuleHeaderItem">
                <div class="creditModuleHeaderItem_in" id="creditNote">
                     
                     <div class="y_credit paypal_icon">
                         <div class="y_credit_header"><input type="text" class="makeCredit" id="amount"  name="amount" data-currency="USD" data-description="fdsafasdf" placeholder="0.00" /></div>
                         <span>$</span>
                     </div>
                     <div class="y_footer">
                          <div class="footer_bg_middle paypal_mini"></div>
                          <div class="footer_footer"><?php echo $page_Lang['need_to_share_ads'][$dataUserPageLanguage];?></div>
                          <div class="buy_credit__button" id="buyCreditNow" data-type="buycredit"><?php echo $page_Lang['buy_this_credit'][$dataUserPageLanguage];?></div>
                     </div>
                </div>
            </div>
        </div>
		  <?php  
           switch($getp) { 
              case 'buyCredit': 
                  include('contents/html_buy_credit.php');
                  break; 
              default:
              include('contents/html_buy_credit.php');
           }
           ?>
            
        </div>    
      </div>
      <!--MIDDLE FINISHED-->
      
 </div>
</div>
</div> 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");   
?>    
</body>
</html>