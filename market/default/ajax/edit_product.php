<?php 
include_once '../../../functions/inc.php';  
include_once "../../../functions/clear.php"; 
include_once "../../../api/send_push_notification.php"; 
// Product Edit  
if(isset($_POST['product'])){
	 $productID = mysqli_real_escape_string($db, $_POST['product']);
	 $editPDetails = $Dot->Dot_GetProductEditDetails($uid, $productID);  
	 if($editPDetails){
		  $eproductID = $editPDetails['user_post_id'];
	      $eProductName = $editPDetails['m_product_name'];
		  $eProductDescription = $editPDetails['m_product_description'];
		  $eProductNormalPrice = $editPDetails['product_normal_price'];
		  $eProductCategory = $editPDetails['product_category'];
		  $eProductStatus = $editPDetails['product_status']; 		  
          $eProductDiscount = isset($editPDetails['product_discount_price']) ? $editPDetails['product_discount_price'] : NULL;
		  $eProductPlace = $editPDetails['product_place'];
		  $eProductMessageStatus = $editPDetails['product_message_status'];
		  $eProductCurrency = $editPDetails['product_currency'];
		  
	 ?>
<div class="product_popUp_wrapper">
  <div class="product_popUp_container_edit" id="bir">
    <div class="product_wr_edit" id="iki">
      <div class="product_header">
        <div class="product_header_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8A99A4"><path d="M86,5.73333c-1.4663,0 -2.93278,0.55882 -4.05364,1.67969l-38.45365,38.45365h16.21458l26.29271,-26.29271l26.29271,26.29271h16.21458l-38.45364,-38.45365c-1.12087,-1.12087 -2.58734,-1.67969 -4.05364,-1.67969zM17.2,57.33333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v11.46667c0,3.1648 2.56853,5.73333 5.73333,5.73333h0.95182l8.91354,53.48125c0.92307,5.52693 5.70843,9.58542 11.3099,9.58542h95.23828c5.6072,0 10.38683,-4.05848 11.30989,-9.58542l8.92474,-53.48125h0.95183c3.1648,0 5.73333,-2.56853 5.73333,-5.73333v-11.46667c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333zM63.06667,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM86,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM108.93333,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333z"></path></g></g></svg></div>
        <div class="product_name_short"><?php echo $page_Lang['edit_product'][$dataUserPageLanguage];?></div>
        <div class="closeProductDetails"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
      </div>
      <!---->
      <div class="edit_product_details" id="product_e" data-id="<?php echo $eproductID;?>">
           <!---->
           <div class="global_post_box">
                   <div class="select_product_category categories" data-type="productCategories"><?php echo $page_Lang[$Dot->Dot_MarketProductPostCategory($eProductCategory)][$dataUserPageLanguage];?></div>
           </div>
           <!---->
           <!---->
           <div class="global_post_box">
                   <div class="price_input_box">
                        <input type="text" class="price_title_edit" id="p_price" placeholder="<?php echo $page_Lang['product_price'][$dataUserPageLanguage];?>" value="<?php echo $eProductNormalPrice;?>">
                   </div>
                   <div class="price_input_box">
                        <input type="text" class="price_title_edit" id="discount_price" placeholder="Discounted price" value="<?php echo $eProductDiscount;?>">
                   </div>
                   <div class="price_currency_edit">
                        <div class="input-field col s12">
                            <select id="crncy" class="currency">
                              <option value="" disabled selected>Currency</option>
                              <?php 
							    if($productCurrency){
								     $explodeCurrency = explode(",", $productCurrency);
									 foreach($explodeCurrency as $p_currecny){
										    $selected ='';
										    if($p_currecny == $eProductCurrency){
												 $selected = 'selected = "selected"';
											}
									        echo '<option value="'.$p_currecny.'" '.$selected.'>'.$p_currecny.'</option>';
									 }
								}
							  ?>  
                            </select> 
                        </div> 
                   </div>
               </div>
           <!---->
           <!--Input STARTED-->
               <div class="global_post_box">
                   <input type="text" class="title_prod_edit" id="product_title" placeholder="<?php echo $page_Lang['product_title_placeholder'][$dataUserPageLanguage];?>" value="<?php echo $eProductName;?>">
               </div>
            <!--Input FINISHED--> 
            <!--Textarea STARTED-->
               <div class="global_post_box">
                  <textarea class="description_edit description" id="product_description" placeholder="<?php echo $page_Lang['product_description_placeholder'][$dataUserPageLanguage];?>"><?php echo strip_tags($eProductDescription); ?></textarea> 
               </div>
               <!--Textarea FINISHED-->
               <!--Input STARTED-->
               <div class="global_post_box">
                   <input type="text" class="title_prod" id="place" placeholder="<?php echo $page_Lang['write_place_address'][$dataUserPageLanguage];?>" value="<?php echo $eProductPlace;?>" >
               </div>
               <!--Input FINISHED-->
               <!---->
               <div class="global_post_box">
                  <div class="set_the_input set_padding-left">
                    <label>
                      <input type="checkbox" class="ccev" id="ms" checked="checked" value="1">
                      <span><?php echo $page_Lang['can_send_product_message'][$dataUserPageLanguage];?></span>
                    </label>
                  </div>
                </div>
               <!---->
      </div>
      <!--Post Footer STARTED-->
             <div class="post_box_footer">  
                  <input type="hidden" id="prcat" value="<?php echo $eProductCategory;?>" />
                  <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3" id="closePost"><?php echo $page_Lang['post_cancel'][$dataUserPageLanguage];?></div></div>
                  <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue save_edit_product"><?php echo $page_Lang['savethis'][$dataUserPageLanguage];?></div></div>
             </div>  
           <!--Post Footer FINISHED-->
    <!---->
  </div>
</div>
</div>		     
<?php } } ?>
<script type="text/javascript">
$(document).ready(function() {
	$('.currency').formSelect(); 
	function sizeDescription(){
     autosize(document.querySelectorAll('textarea'));
   }
   sizeDescription(); 
}); 
</script>