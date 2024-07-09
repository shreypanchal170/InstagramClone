<div class="page_title bold"><?php echo $page_Lang['manage_marketplace_features'][$dataUserPageLanguage];?></div>

<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['general_manage_market_place_features'][$dataUserPageLanguage];?></div>
        <div class="row-box-container">
              <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="searchproductf" class="gstf" name="searchproductf" <?php echo $searchProductEnableDisable == '1' ? "checked='checked'":""; echo $searchProductEnableDisable == '0' ? "value='1'":"value='0'";?>><label for="searchproductf"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['search_product_'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['search_product_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="marketmenum" class="gstf" name="marketmenum" <?php echo $marketPlaceProductMenuEnableDisable == '1' ? "checked='checked'":""; echo $marketPlaceProductMenuEnableDisable == '0' ? "value='1'":"value='0'";?>><label for="marketmenum"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['enable_disable_market_menu'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['enable_disable_market_menu_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="marketsliderm" class="gstf" name="marketsliderm" <?php echo $marketPlaceSliderEnableDisable == '1' ? "checked='checked'":""; echo $marketPlaceSliderEnableDisable == '0' ? "value='1'":"value='0'";?>><label for="marketsliderm"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['enable_disable_market_slider'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['enable_disable_market_slider_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
        </div>
   </div>
</div>