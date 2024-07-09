<div class="page_title bold"><?php echo $page_Lang['advertisement_settings_a'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc"> 
            <div class="general_settings_header_title"><?php echo $page_Lang['the_paypal_mode'][$dataUserPageLanguage];?></div> 
            <div class="create_ads_box_container_admin" id="sedpay">
                    <span class="setting-box">
                    <div class="setSettingBoxText"><?php echo $page_Lang['p_live'][$dataUserPageLanguage];?></div>
                     <div class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="paymodestats" class="statAds" name="paymode" <?php echo $paypalMode == 'live' ? "checked='checked'":""; echo $paypalMode == 'sandbox' ? "value='live'":"value='sendbox'"; ?>><label for="paymodestats"></label></div></div>
                     <div class="setSettingBoxText"><?php echo $page_Lang['p_sendbox'][$dataUserPageLanguage];?></div> 
                     <!----> 
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['paypal_cliend_id'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField send_livebox" id="cliend" style="padding-left:30px;" placeholder="<?php echo $page_Lang['paypal_cliend_id'][$dataUserPageLanguage];?>" value="<?php echo $client_ID;?>"></div>
                       </span>
                     <!----> 
                     <!----> 
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['paypal_secret_id'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField send_livebox" id="secret" style="padding-left:30px;" placeholder="<?php echo $page_Lang['paypal_secret_id'][$dataUserPageLanguage];?>" value="<?php echo $client_Secret;?>"></div>
                       </span>
                     <!---->
                   </span>
                   <div class="setting-box"><div class="generalBtn_save btn waves-effect waves-light blue  paypalsetting" data-type="paypalid"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div></div>
            </div>
            <div class="general_settings_header_title_second"><?php echo $page_Lang['fees_tobecut'][$dataUserPageLanguage];?></div> 
            <div class="create_ads_box_container_admin" id="sedfee"> 
                 <!----> 
                   <span class="setting-box"> 
                       <span class="setSettinginputTitle"><?php echo $page_Lang['ads_per_impression'][$dataUserPageLanguage];?></span>  
                       <div class="column_set_input_box"><input type="text" class="column_inputField adsViewFee" id="adsViewFee" style="padding-left:30px;" placeholder="e.g: 0.01" value="<?php echo $adsPerimpression;?>"></div>
                   </span>
                 <!---->  
                 <!----> 
                   <span class="setting-box"> 
                       <span class="setSettinginputTitle"><?php echo $page_Lang['ads_per_click'][$dataUserPageLanguage];?></span>  
                       <div class="column_set_input_box"><input type="text" class="column_inputField adsClickFee" id="adsClickFee" style="padding-left:30px;" placeholder="e.g: 0.05" value="<?php echo $adsPerClick;?>"></div>
                   </span>
                 <!---->
               <div class="setting-box"><div class="generalBtn_save btn waves-effect waves-light blue feeamount" data-type="moneyfee"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div></div>
            </div>
            <div class="general_settings_header_title_second"><?php echo $page_Lang['how_you_show_suponsored'][$dataUserPageLanguage];?></div>  
            <div class="create_ads_box_container_admin" id="aftersc">
                   <div class="setSettingBoxInfo"><?php echo $page_Lang['the_number_of_show_ads'][$dataUserPageLanguage];?></div>
                   
                   <!---->
                      <div class="setting-box-global">
                             <span class="input-field col s12">
                                <select class="afterscroll" data-type="afterscroll">
                                  <option value="1"<?php echo $advertisementsNumber == '1' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_one_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="3"<?php echo $advertisementsNumber == '3' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_tree_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="5"<?php echo $advertisementsNumber == '5' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_five_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="7"<?php echo $advertisementsNumber == '7' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_seven_scroll'][$dataUserPageLanguage];?></option>
                                         <option value="9"<?php echo $advertisementsNumber == '9' ? "selected='selected'":""; ?>><?php echo $page_Lang['after_nine_scroll'][$dataUserPageLanguage];?></option> 
                                </select> 
                              </span>
                        </div>
                    <!----> 
            </div> 
             
   </div>
</div>