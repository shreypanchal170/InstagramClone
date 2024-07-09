<div class="page_title bold"><?php echo $page_Lang['ads_codes_managements'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc"> 
        <div class="general_settings_header_title"><?php echo $page_Lang['manage_ads_area_open_close'][$dataUserPageLanguage];?></div> 
        <div class="create_ads_box_container_admin" id="sedpay">
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14"> 
                      <input type="checkbox" id="header_ads" class="gstf" name="header_ads" <?php echo $headerAdsOpenClose == '0' ? "checked='checked'":"";   echo $headerAdsOpenClose == '0' ? "value='1'":"value='0'";?>><label for="header_ads"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['headera_ads_code'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['header_ads_code_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['ads_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea chng" id="the_header_ads_code" placeholder="<?php echo $page_Lang['paste_your_ads_code_here'][$dataUserPageLanguage];?>" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 181px;"><?php echo stripslashes($headerAdsCode);?></textarea></div>
               </span>
            <!---->
             <!---->
            <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_adscode" data-type="the_header_ads_code"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
            <!--s-->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14"> 
                      <input type="checkbox" id="sidebar_ads" class="gstf" name="sidebar_ads" <?php echo $sidebarAdsOpenClose == '0' ? "checked='checked'":"";   echo $sidebarAdsOpenClose == '0' ? "value='1'":"value='0'";?>><label for="sidebar_ads"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['sidebar_ads_code'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['sidebar_ads_code_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['right_ads_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea chng" id="the_sidebar_ads_code" placeholder="<?php echo $page_Lang['paste_your_ads_code_here'][$dataUserPageLanguage];?>" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 181px;"><?php echo stripslashes($sidebarAdsCode);?></textarea></div>
               </span>
            <!---->
             <!---->
            <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_adscode" data-type="the_sidebar_ads_code"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
            <!--2-->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14"> 
                      <input type="checkbox" id="between_post_ads" class="gstf" name="between_post_ads" <?php echo $AdsBetweenPostOpenClose == '0' ? "checked='checked'":"";   echo $AdsBetweenPostOpenClose == '0' ? "value='1'":"value='0'";?>><label for="between_post_ads"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['post_between_ads'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['post_between_ads_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['right_ads_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea chng" id="the_between_post_ads" placeholder="<?php echo $page_Lang['paste_your_ads_code_here'][$dataUserPageLanguage];?>" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 181px;"><?php echo stripslashes($AdsBetweenCode);?></textarea></div>
               </span>
            <!---->
             <!---->
            <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_adscode" data-type="the_between_post_ads"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
            <!---->
        </div>
             
             
   </div>
</div>