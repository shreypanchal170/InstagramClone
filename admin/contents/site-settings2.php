<div class="page_title bold"><?php echo $page_Lang['site_settings'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container">
      
        <div class="column-calc" id="website_settings" data-type="websiteSettings">
            <div class="column-calc-in border-radius">
                <div class="column-title bold"><?php echo $page_Lang['website_setttings'][$dataUserPageLanguage];?></div>
                <div class="column-2" id="set_profile"> 
                     <div class="column_set_box">
                        <div class="column_set_box_title"><?php echo $page_Lang['site_name'][$dataUserPageLanguage];?></div>
                        <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="website_name" placeholder="<?php echo $page_Lang['write_site_name'][$dataUserPageLanguage];?>" value="<?php echo $dot_siteName;?>"></div>
                      </div>
                      <div class="column_set_box">
                        <div class="column_set_box_title"><?php echo $page_Lang['site_keywords'][$dataUserPageLanguage];?></div>
                        <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="write_site_keywords" placeholder="<?php echo $page_Lang['write_site_keywords'][$dataUserPageLanguage];?>" value="<?php echo $dot_siteKeywords;?>"></div>
                      </div>
                      <div class="column_set_box" >
                        <div class="column_set_box_title"><?php echo $page_Lang['site_information'][$dataUserPageLanguage];?></div>
                        <div class="column_set_input_box"><textarea class="column_textarea chng" id="write_site_information" placeholder="<?php echo $page_Lang['write_site_information'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; resize: none; height: 86px;"><?php echo $dot_title;?></textarea></div>
                      </div>
                      <!--Save Settings for Personal Information button STARTED-->
                      <div class="column_set_box" id="set_website" style="display:none;">
                        <div class="settings_box_footer">
                          <div class="control left_btn"></div>
                          <div class="control right_btn">
                            <div class="share_post_box save_websitesettings" data-type="websiteSettings">
                              <?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--Save Settings for Personal Information button FINISHED-->
                </div>
            </div>
        </div>
        
        <div class="column-calc">
            <div class="column-calc-in border-radius">
                <div class="column-title bold"><?php echo $page_Lang['open_close_mods'][$dataUserPageLanguage];?></div>
                <div class="column-2" id="set_site_setting">
                   <div class="note_title"><?php echo $page_Lang['maintenance_mode'][$dataUserPageLanguage];?></div>
                   <div class="switch_container mod_padding"> 
                       <div class="set_box_not">  
                          <div class="switch">
                            <label for="maintenance"><?php echo $page_Lang['off_on'][$dataUserPageLanguage];?><input type="checkbox" id="maintenance" data-type="maintencance" data-maintenance="<?php echo $dot_maintenance == '1' ? "0":"1"; ?>" <?php echo $dot_maintenance == '1' ? "checked='checked'":""; ?>><span class="lever"></span><?php echo $page_Lang['on_off'][$dataUserPageLanguage];?></label>
                          </div> 
                      </div>
                   </div>
                   <p class="switch_note"><?php echo $page_Lang['maintenance_admin_note'][$dataUserPageLanguage];?></p>
                </div>
            </div>
        </div>
        
   </div>
</div>