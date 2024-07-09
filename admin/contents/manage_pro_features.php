<div class="page_title bold">
  <?php echo $page_Lang['create_new_pro_package'][$dataUserPageLanguage];?>
</div>
<div class="global_right_wrapper">
  <div class="global_box_container_w bgc"> 
    <div class="general_settings_header_title"><?php echo $page_Lang['pro_package_features'][$dataUserPageLanguage];?></div>
    <!---->
    <div class="row-box-container"> 
         <div class="pricingTableCenter">
         <div class="pro_member_plains_second">
                <?php 
				  $proAvantages = $Dot->Dot_ProPriceTableAvantagesList();
				  if($proAvantages){
				      foreach($proAvantages as $prAvantage){
					       $proAvantageID = $prAvantage['avantage_id'];
						   $proAvantageIcon = $prAvantage['avantage_icon'];
						   $proAvantageTitle = $prAvantage['avantage_title'];
						   $proAvantageDescription = $prAvantage['avantage_desc'];
						   $proAvantageStatus = $prAvantage['avantage_status'];
			    ?>			 
                   <div class="pro_item_box">
                         <div class="pro_item_box_i_t">
                             <div class="pro_item_icon"><?php echo $proAvantageIcon;?></div>
                             <div class="pro_item_title"><?php echo $page_Lang[$proAvantageTitle][$dataUserPageLanguage];?></div>
                         </div>
                         <div class="pro_item_box_desc"><?php echo $page_Lang[$proAvantageDescription][$dataUserPageLanguage];?></div>
                         <div class="pro_item_box_desc" style="padding-top:20px;">
                              <div class="avantageStatus">
                                     <div class="tableincontainer">
                                          <div class="ckbx-style-14">
                                              <input type="checkbox" id="avantage_status<?php echo $proAvantageID;?>" data-type="avantage_status" data-id="<?php echo $proAvantageID;?>" class="prav" name="avantage_status" <?php echo $proAvantageStatus == '1' ? "checked='checked'":"";   echo $proAvantageStatus == '1' ? "value='0'":"value='1'";?>><label for="avantage_status<?php echo $proAvantageID;?>"></label>
                                          </div>
                                     </div>
                              </div>  
                         </div>
                   </div> 
				<?php }}?>  
            </div>
         </div>
    </div>
    <!---->
    <div class="general_settings_header_title_second"><?php echo $page_Lang['manage_search_criteria'][$dataUserPageLanguage];?></div>
    <!---->
    <div class="row-box-container"> 
         <div class="pricingTableCenter">
         <div class="pro_member_plains_second">
                <?php 
				  $proSearchItems = $Dot->Dot_SearchItemFiltersList();
				  if($proSearchItems){
				      foreach($proSearchItems as $prSitem){
					       $proSID = $prSitem['search_filter_id'];
						   $proSStatus = $prSitem['search_filter_statuus'];  
						   $proSKey = $prSitem['search_filter_key'];
						   $proSIcon = $prSitem['search_filter_icon'];  
			    ?>			 
                   <div class="pro_item_box">
                         <span class="pro_item_box_i_t" style="display: flex;">
                             <div class="pro_item_icon"><?php echo $proSIcon;?></div>
                             <div class="pro_item_title"><?php echo $page_Lang[$proSKey][$dataUserPageLanguage];?></div>
                         </span> 
                         <div class="pro_item_box_desc" style="padding-top:0px;">
                              <div class="avantageStatus elbis">
                                     <div class="tableincontainer">
                                          <div class="ckbx-style-14">
                                              <input type="checkbox" id="sf_status<?php echo $proSID;?>" data-type="sf_status" data-id="<?php echo $proSID;?>" class="prav" name="sf_status" <?php echo $proSStatus == '1' ? "checked='checked'":"";   echo $proSStatus == '1' ? "value='0'":"value='1'";?>><label for="sf_status<?php echo $proSID;?>"></label>
                                          </div>
                                     </div>
                              </div>  
                         </div>
                   </div> 
				<?php }}?>  
            </div>
         </div>
    </div>
    <!---->
</div>
</div> 