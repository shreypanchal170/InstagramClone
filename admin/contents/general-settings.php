<div class="page_title bold"><?php echo $page_Lang['website_general_settings'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['website_general_settings'][$dataUserPageLanguage];?></div>
        <div class="row-box-container">
              
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="maintencance" class="gstf" name="maintencance" <?php echo $dot_maintenance == '1' ? "checked='checked'":""; echo $dot_maintenance == '0' ? "value='1'":"value='0'";?>><label for="maintencance"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['maintenance_mode'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['maintenance_admin_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="verificationmail" class="gstf" name="verificationmail" <?php echo $verificationMailStatus == '1' ? "checked='checked'":""; echo $verificationMailStatus == '0' ? "value='1'":"value='0'";?>><label for="verificationmail"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['email_verification_status_on_off'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['email_verification_status_info'][$dataUserPageLanguage];?></span>
             </span>
            <!----> 
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="canregister" class="gstf" name="canregister" <?php echo $newRegister == '0' ? "checked='checked'":""; echo $newRegister == '1' ? "value='0'":"value='1'";?>><label for="canregister"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['user_can_register'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['user_can_reigster_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="canonesignal" class="gstf" name="canonesignal" <?php echo $dataOneSignalAppStatus == '1' ? "checked='checked'":""; echo $dataOneSignalAppStatus == '1' ? "value='0'":"value='1'";?>><label for="canonesignal"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['onesignal_status'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['onesignal_status_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="ipregister" class="gstf" name="ipregister" <?php echo $ipRegisterEnableDisable == '0' ? "checked='checked'":""; echo $ipRegisterEnableDisable == '1' ? "value='0'":"value='1'";?>><label for="ipregister"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['ip_limit'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['user_register_ip_limit_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->  
            <!---->
            <span class="setting-box" style="margin-bottom:15px;"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['how_many_times_per_user_ip_can_register'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box" id="reg_ip_num"><input type="text" class="column_inputField chng" id="number_of_per_ip" placeholder="5" value="<?php echo $ipRegisterLimit;?>"></div>
            </span>
            <!---->
            <!---->
            <div class="setting-box-global" id="dflng">
                 <span class="input-field col s12">
                    <select class="selectDefaultTheme" data-type="selectDefaultTheme">
                      <option value="1" <?php echo $defaultSiteStyle == '1' ? "selected='selected'":"";?>><?php echo $page_Lang['use_light_theme'][$dataUserPageLanguage];?></option>
                      <option value="2" <?php echo $defaultSiteStyle == '2' ? "selected='selected'":"";?>><?php echo $page_Lang['use_dark_theme'][$dataUserPageLanguage];?></option> 
                    </select>
                    <label><?php echo $page_Lang['choose_main_theme'][$dataUserPageLanguage];?></label>
                  </span>
            </div>
            <!----> 
            <!---->
            <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_canregisterip"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
            <!---->
        </div>
        <div class="general_settings_header_title_next"><?php echo $page_Lang['default_language'][$dataUserPageLanguage];?></div>
        <span id="actionDefLang" class="elaction"></span>
        <div class="row-box-container"> 
            <!---->
            <div class="setting-box-global">
                 <span class="input-field col s12">
                    <select class="selecDefaultLang" data-type="selectdlang">
                      <option value="" disabled selected><?php echo $page_Lang['select_default_lang'][$dataUserPageLanguage];?></option>
                      <?php 
							$langs = $Dot->Dot_Langs();
							if($langs){
								foreach($langs as $column){
									$lang_name = $column['Field'];
									$flag = array($lang_name => $base_url.'uploads/flags/'.$lang_name.'.png'); 
								?>
								 <option value="<?php echo $lang_name;?>" <?php echo $lang_name == $pagesDefaultLanguage ? "selected='selected'":"";?>><?php echo $lang_name;?></option> 
								<?php }
							} 
						 ?>
                    </select>
                    <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                  </span>
            </div>
            <!----> 
            <!---->
            <span class="setting-box">
               <span class="setSettingBox">
                  <div class="ckbx-style-14">
                      <input type="checkbox" id="user_can_choose_lang" class="gstf" name="user_can_choose_lang" <?php echo $showHideChooseLang == '0' ? "checked='checked'":""; echo $showHideChooseLang == '1' ? "value='0'":"value='1'";?>><label for="user_can_choose_lang"></label>
                  </div>
               </span>
               <span class="setSettingBoxText"><?php echo $page_Lang['user_can_choose_language'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['user_can_select_language_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
        </div>
         <!--S-->
         <div class="general_settings_header_title_second"><?php echo $page_Lang['show_features_after_scroll_down_between_posts'][$dataUserPageLanguage];?></div>  
            <div class="create_ads_box_container_admin" id="aftersc">
                   <div class="setSettingBoxInfo"><?php echo $page_Lang['show_supponsored_ads_after_scroll'][$dataUserPageLanguage];?></div> 
                   <!---->
                      <div class="setting-box-global">
                             <span class="input-field col s12">
                                <select class="afterscroll" data-type="afterscroll">
                                  <option value="1" <?php echo $advertisementsNumber == '1' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_one_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="3" <?php echo $advertisementsNumber == '3' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_tree_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="5" <?php echo $advertisementsNumber == '5' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_five_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="7" <?php echo $advertisementsNumber == '7' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_seven_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="9" <?php echo $advertisementsNumber == '9' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_nine_scroll'][$dataUserPageLanguage];?></option> 
                                </select> 
                              </span>
                        </div>
                    <!----> 
                    <div class="setSettingBoxInfo"><?php echo $page_Lang['show_trend_tags_after_scroll'][$dataUserPageLanguage];?></div> 
                   <!---->
                      <div class="setting-box-global">
                             <span class="input-field col s12">
                                <select class="afterscroll" data-type="afterscrolltrendtags">
                                  <option value="2"<?php echo $hashtagNumber == '2' ? "selected='selected'":""; ?>>After 2 Scroll</option>
                                         <option value="4"<?php echo $hashtagNumber == '4' ? "selected='selected'":""; ?>>After 4 Scroll</option>
                                         <option value="6"<?php echo $hashtagNumber == '6' ? "selected='selected'":""; ?>>After 6 Scroll</option>
                                         <option value="8"<?php echo $hashtagNumber == '8' ? "selected='selected'":""; ?>>After 8 Scroll</option>
                                         <option value="10"<?php echo $hashtagNumber == '10' ? "selected='selected'":""; ?>>After 10 Scroll</option> 
                                </select> 
                              </span>
                        </div>
                    <!----> 
                    <div class="setSettingBoxInfo"><?php echo $page_Lang['show_google_ads_after_scroll'][$dataUserPageLanguage];?></div> 
                   <!---->
                      <div class="setting-box-global">
                             <span class="input-field col s12">
                                <select class="afterscroll" data-type="afterscrollGoogleAds">
                                         <option value="1"<?php echo $googleAdvertisementsNumber == '1' ? "selected='selected'":""; ?>>After 1 Scroll</option>
                                         <option value="2"<?php echo $googleAdvertisementsNumber == '2' ? "selected='selected'":""; ?>>After 2 Scroll</option>
                                         <option value="3"<?php echo $googleAdvertisementsNumber == '3' ? "selected='selected'":""; ?>>After 3 Scroll</option>
                                         <option value="4"<?php echo $googleAdvertisementsNumber == '4' ? "selected='selected'":""; ?>>After 4 Scroll</option>
                                         <option value="5"<?php echo $googleAdvertisementsNumber == '5' ? "selected='selected'":""; ?>>After 5 Scroll</option> 
                                </select> 
                              </span>
                        </div>
                    <!---->
                    <div class="setSettingBoxInfo"><?php echo $page_Lang['show_mayknowuser_after_scroll'][$dataUserPageLanguage];?></div> 
                   <!---->
                      <div class="setting-box-global">
                             <span class="input-field col s12">
                                <select class="afterscroll" data-type="afterscrollmyKnowuser">
                                  <option value="4"<?php echo $usersNumber == '4' ? "selected='selected'":""; ?>>After 4 Scroll</option>
                                         <option value="6"<?php echo $usersNumber == '6' ? "selected='selected'":""; ?>>After 6 Scroll</option>
                                         <option value="8"<?php echo $usersNumber == '8' ? "selected='selected'":""; ?>>After 8 Scroll</option>
                                         <option value="10"<?php echo $usersNumber == '10' ? "selected='selected'":""; ?>>After 10 Scroll</option>
                                         <option value="12"<?php echo $usersNumber == '12' ? "selected='selected'":""; ?>>After 12 Scroll</option> 
                                </select> 
                              </span>
                        </div>
                    <!---->  
            </div>
         <!--F-->
   </div>
</div> 