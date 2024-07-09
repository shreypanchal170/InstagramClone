<div class="page_title bold"><?php echo $page_Lang['payment_method_settings'][$dataUserPageLanguage]; ?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['paypal_settings'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_paypal">
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="paypal_mode" class="gstf" name="paypal_mode" <?php echo $paypalPaymentMode == '0' ? "checked='checked'":"";   echo $paypalPaymentMode == '0' ? "value='1'":"value='0'";?>><label for="paypal_mode"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['paypal_active'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['paypal_payment_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="paypal_ap" class="gstf" name="paypal_ap" <?php echo $paypalActivePasive == '1' ? "checked='checked'":"";   echo $paypalActivePasive == '1' ? "value='0'":"value='1'";?>><label for="paypal_ap"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['paypal_on_off'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['paypal_on_off_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!----> 
                <!---->
                <span class="setting-box">
                    <div class="setting-box-global">
                         <span class="input-field col s12">
                            <select class="changeCurrency" data-type="payp"> 
                               <option value="USD" <?php echo $paypalCurrency == 'USD' ? "selected='selected'":""; ?>>USD</option> 
                               <option value="AUD" <?php echo $paypalCurrency == 'AUD' ? "selected='selected'":""; ?>>AUD</option>
                               <option value="EUR" <?php echo $paypalCurrency == 'EUR' ? "selected='selected'":""; ?>>EUR</option>
                               <option value="BRL" <?php echo $paypalCurrency == 'BRL' ? "selected='selected'":""; ?>>BRL</option>
                               <option value="CAD" <?php echo $paypalCurrency == 'CAD' ? "selected='selected'":""; ?>>CAD</option>
                               <option value="CZK" <?php echo $paypalCurrency == 'CZK' ? "selected='selected'":""; ?>>CZK</option>
                               <option value="DKK" <?php echo $paypalCurrency == 'DKK' ? "selected='selected'":""; ?>>DKK</option>
                               <option value="HKD" <?php echo $paypalCurrency == 'HKD' ? "selected='selected'":""; ?>>HKD</option>
                               <option value="HUF" <?php echo $paypalCurrency == 'HUF' ? "selected='selected'":""; ?>>HUF</option>
                               <option value="INR" <?php echo $paypalCurrency == 'INR' ? "selected='selected'":""; ?>>INR</option>
                               <option value="ILS" <?php echo $paypalCurrency == 'ILS' ? "selected='selected'":""; ?>>ILS</option>
                               <option value="JPY" <?php echo $paypalCurrency == 'JPY' ? "selected='selected'":""; ?>>JPY</option>
                               <option value="MYR" <?php echo $paypalCurrency == 'MYR' ? "selected='selected'":""; ?>>MYR</option>
                               <option value="MXN" <?php echo $paypalCurrency == 'MXN' ? "selected='selected'":""; ?>>MXN</option>
                               <option value="TWD" <?php echo $paypalCurrency == 'TWD' ? "selected='selected'":""; ?>>TWD</option>
                               <option value="NZD" <?php echo $paypalCurrency == 'NZD' ? "selected='selected'":""; ?>>NZD</option>
                               <option value="NOK" <?php echo $paypalCurrency == 'NOK' ? "selected='selected'":""; ?>>NOK</option>
                               <option value="PHP" <?php echo $paypalCurrency == 'PHP' ? "selected='selected'":""; ?>>PHP</option>
                               <option value="PLN" <?php echo $paypalCurrency == 'PLN' ? "selected='selected'":""; ?>>PLN</option>
                               <option value="GBP" <?php echo $paypalCurrency == 'GBP' ? "selected='selected'":""; ?>>GBP</option>
                               <option value="RUB" <?php echo $paypalCurrency == 'RUB' ? "selected='selected'":""; ?>>RUB</option>
                               <option value="SGD" <?php echo $paypalCurrency == 'SGD' ? "selected='selected'":""; ?>>SGD</option> 
                               <option value="CHF" <?php echo $paypalCurrency == 'CHF' ? "selected='selected'":""; ?>>CHF</option>
                               <option value="THB" <?php echo $paypalCurrency == 'THB' ? "selected='selected'":""; ?>>THB</option>
                            </select>
                            <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                          </span>
                    </div>
                </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['paypal_sendbox_email'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="paypal_sendbox_e" placeholder="<?php echo $page_Lang['write_paypal_sendbox_email'][$dataUserPageLanguage];?>" value="<?php echo $paypalSendBoxBusinessEmail;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['paypal_business_email'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="paypal_business_e" placeholder="<?php echo $page_Lang['write_paypal_business_email'][$dataUserPageLanguage];?>" value="<?php echo $paypalProductBusinessEmail;?>"></div>
               </span>
               <!---->
               <!---->
                <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue save_paypal_emails"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                <!---->
        </div>
        <div class="general_settings_header_title_second"><?php echo $page_Lang['iyzico_settings'][$dataUserPageLanguage];?></div>
        <!---->
        <div class="row-box-container" id="setapi">
               
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="iyzico_mode" class="gstf" name="iyzico_mode" <?php echo $iyzicoPaymentMode == '0' ? "checked='checked'":"";   echo $iyzicoPaymentMode == '0' ? "value='1'":"value='0'";?>><label for="iyzico_mode"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['iyzico_active'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['iyzico_payment_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="iyzico_ap" class="gstf" name="iyzico_ap" <?php echo $iyzicoActivePasive == '1' ? "checked='checked'":"";   echo $iyzicoActivePasive == '1' ? "value='0'":"value='1'";?>><label for="iyzico_ap"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['iyzico_on_off'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['iyzico_on_off_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!----> 
                <!---->
                <span class="setting-box">
                    <div class="setting-box-global">
                         <span class="input-field col s12">
                            <select class="changeCurrency" data-type="iyzico">
                               <option value="USD" <?php echo $iyziCoCurrency == 'USD' ? "selected='selected'":""; ?>>USD</option>  
                               <option value="EUR" <?php echo $iyziCoCurrency == 'EUR' ? "selected='selected'":""; ?>>EUR</option> 
                               <option value="GBP" <?php echo $iyziCoCurrency == 'GBP' ? "selected='selected'":""; ?>>GBP</option>
                               <option value="RUB" <?php echo $iyziCoCurrency == 'RUB' ? "selected='selected'":""; ?>>RUB</option>
                               <option value="NOK" <?php echo $iyziCoCurrency == 'NOK' ? "selected='selected'":""; ?>>NOK</option>
                               <option value="CHF" <?php echo $iyziCoCurrency == 'CHF' ? "selected='selected'":""; ?>>CHF</option>
                               <option value="TRY" <?php echo $iyziCoCurrency == 'TRY' ? "selected='selected'":""; ?>>TRY</option>
                            </select>
                            <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                          </span>
                    </div>
                </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['iyzico_testing_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="iyzico_tsk" placeholder="<?php echo $page_Lang['iyzico_testing_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $iyzicoTestingSecretKey;?>"></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['iyzico_testing_api_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="iyzico_tapk" placeholder="<?php echo $page_Lang['iyzico_testing_api_key_note'][$dataUserPageLanguage];?>" value="<?php echo $iyzicoTestingApiKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['iyzico_live_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="iyzico_lapk" placeholder="<?php echo $page_Lang['iyzico_live_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $iyzicoLiveApiKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['iyzico_live_api_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="iyzico_lsk" placeholder="<?php echo $page_Lang['iyzico_live_api_key_note'][$dataUserPageLanguage];?>" value="<?php echo $iyzicoLiveSecretKey;?>"></div>
               </span>
               <!---->
               <!---->
                <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue save_iyzico_keys"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                <!---->
        </div>
        <!---->
        <div class="general_settings_header_title_second"><?php echo $page_Lang['bitpay_settings'][$dataUserPageLanguage];?></div>
         <!---->
        <div class="row-box-container">
              
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="bitpay_mode" class="gstf" name="bitpay_mode" <?php echo $bitpayPaymentMode == '0' ? "checked='checked'":"";   echo $bitpayPaymentMode == '0' ? "value='1'":"value='0'";?>><label for="bitpay_mode"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['bitpay_active'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['bitpay_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="bitpay_ap" class="gstf" name="bitpay_ap" <?php echo $bitpayActivePasive == '1' ? "checked='checked'":"";   echo $bitpayActivePasive == '1' ? "value='0'":"value='1'";?>><label for="bitpay_ap"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['bitpay_on_off'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['bitpay_on_off_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!----> 
                <!---->
                <span class="setting-box">
                    <div class="setting-box-global">
                         <span class="input-field col s12">
                            <select class="changeCurrency" data-type="bitpay"> 
                               <option value="USD" <?php echo $bitPayCurrency == 'USD' ? "selected='selected'":""; ?>>USD</option>
                               <option value="AUD" <?php echo $bitPayCurrency == 'AUD' ? "selected='selected'":""; ?>>AUD</option>  
                               <option value="EUR" <?php echo $bitPayCurrency == 'EUR' ? "selected='selected'":""; ?>>EUR</option> 
                               <option value="GBP" <?php echo $bitPayCurrency == 'GBP' ? "selected='selected'":""; ?>>GBP</option>
                               <option value="MXN" <?php echo $bitPayCurrency == 'MXN' ? "selected='selected'":""; ?>>MXN</option>
                               <option value="NZD" <?php echo $bitPayCurrency == 'NZD' ? "selected='selected'":""; ?>>NZD</option>
                               <option value="ZAR" <?php echo $bitPayCurrency == 'ZAR' ? "selected='selected'":""; ?>>ZAR</option>
                            </select>
                            <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                          </span>
                    </div>
                </span>
               <!---->
                 <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['bitpay_notification_email'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="bitpayemail" placeholder="<?php echo $page_Lang['write_bitpay_notification_email'][$dataUserPageLanguage];?>" value="<?php echo $bitpayNotificationEmail;?>"></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['bitpay_password'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="bitpypass" placeholder="<?php echo $page_Lang['write_bitpay_password'][$dataUserPageLanguage];?>" value="<?php echo $bitpayPassword;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['bitpay_pairing_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="bitpaypairingcode" placeholder="<?php echo $page_Lang['write_bitpay_pairing_code'][$dataUserPageLanguage];?>" value="<?php echo $bitpayPairingCode;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['bitpay_label'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="bitpaylabel" placeholder="<?php echo $page_Lang['write_bitpay_label'][$dataUserPageLanguage];?>" value="<?php echo $bitpayLabel;?>"></div>
               </span>
               <!---->
               <!---->
                <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue save_bitpay_infos"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                <!---->
        </div>
        <!---->
       <!---->
        <div class="general_settings_header_title_second"><?php echo $page_Lang['authorize_setting'][$dataUserPageLanguage];?></div>
         <!---->
        <div class="row-box-container" id="authorize">
              
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="authorizenet_mode" class="gstf" name="authorizenet_mode" <?php echo $authorizePaymentMode == '0' ? "checked='checked'":"";   echo $authorizePaymentMode == '0' ? "value='1'":"value='0'";?>><label for="authorizenet_mode"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['authorizenet_mode'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['authorizenet_mode_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="authorize_ap" class="gstf" name="authorize_ap" <?php echo $authorizeActivePasive == '1' ? "checked='checked'":"";   echo $authorizeActivePasive == '1' ? "value='0'":"value='1'";?>><label for="authorize_ap"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['authorize_on_off'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['authorize_on_off_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!----> 
                <!---->
                <span class="setting-box">
                    <div class="setting-box-global">
                         <span class="input-field col s12">
                            <select class="changeCurrency" data-type="authorize">
                               <option value="USD" <?php echo $authorizeNetCurrency == 'USD' ? "selected='selected'":""; ?>>USD</option> 
                            </select>
                            <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                          </span>
                    </div>
                </span>
               <!---->
                 <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['authorize_test_api_id'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="authorizetestapiid" placeholder="<?php echo $page_Lang['authorize_test_api_id_note'][$dataUserPageLanguage];?>" value="<?php echo $authorizeTestApiID;?>"></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['authorize_test_transaction_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="authorizetesttransactionkey" placeholder="<?php echo $page_Lang['authorize_test_transaction_key_note'][$dataUserPageLanguage];?>" value="<?php echo $authorizeTestTransactionKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['authorize_live_api_id'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="authorizeliveapiid" placeholder="<?php echo $page_Lang['authorize_live_api_id_note'][$dataUserPageLanguage];?>" value="<?php echo $authorizeLiveApiID;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['authorize_live_transaction_id'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="authorizelivetransactionkey" placeholder="<?php echo $page_Lang['authorize_live_transaction_id_note'][$dataUserPageLanguage];?>" value="<?php echo $authorizeLiveTransactionKey;?>"></div>
               </span>
               <!---->
               <!---->
                <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue save_authorize_infos"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                <!---->
        </div>
        <!---->
       <!---->
        <div class="general_settings_header_title_second"><?php echo $page_Lang['paystack_setting'][$dataUserPageLanguage];?></div>
         <!---->
        <div class="row-box-container" id="authorize">
              
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="paystack_mode" class="gstf" name="paystack_mode" <?php echo $payStackPaymentMode == '0' ? "checked='checked'":"";   echo $payStackPaymentMode == '0' ? "value='1'":"value='0'";?>><label for="paystack_mode"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['paystack_mode'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['paystack_mode_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="paystack_ap" class="gstf" name="paystack_ap" <?php echo $payStackActivePasive == '1' ? "checked='checked'":"";   echo $payStackActivePasive == '1' ? "value='0'":"value='1'";?>><label for="paystack_ap"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['paystack_on_off'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['paystack_on_off_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                    <div class="setting-box-global">
                         <span class="input-field col s12">
                            <select class="changeCurrency" data-type="paystack">
                               <option value="NGN" <?php echo $paystackCurrency == 'NGN' ? "selected='selected'":""; ?>>NGN</option> 
                            </select>
                            <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                          </span>
                    </div>
                </span>
               <!----> 
                 <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['paystack_test_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="paystacktestsecretkey" placeholder="<?php echo $page_Lang['paystack_test_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $payStackTestSecretKey;?>"></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['paystack_test_public_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="paystacktestpublickey" placeholder="<?php echo $page_Lang['paystack_test_public_key_note'][$dataUserPageLanguage];?>" value="<?php echo $payStackTestPublicKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['paystack_live_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="paystacklivesecretkey" placeholder="<?php echo $page_Lang['paystack_live_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $payStackLiveSecretKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['paystack_live_public_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="paystacklivepublickey" placeholder="<?php echo $page_Lang['paystack_live_public_key_note'][$dataUserPageLanguage];?>" value="<?php echo $payStackLivePublicKey;?>"></div>
               </span>
               <!---->
               <!---->
                <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue save_paystack_infos"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                <!---->
        </div>
        <!---->
       <!---->
        <div class="general_settings_header_title_second"><?php echo $page_Lang['stripe_settings'][$dataUserPageLanguage];?></div>
         <!---->
        <div class="row-box-container" id="authorize">
            
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="stripe_mode" class="gstf" name="stripe_mode" <?php echo $stripePaymentMode == '0' ? "checked='checked'":"";   echo $stripePaymentMode == '0' ? "value='1'":"value='0'";?>><label for="stripe_mode"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['stripe_mode'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['stripe_mode_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="stripe_ap" class="gstf" name="stripe_ap" <?php echo $stripePaymentActivePasive == '1' ? "checked='checked'":"";   echo $stripePaymentActivePasive == '1' ? "value='0'":"value='1'";?>><label for="stripe_ap"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['stripe_on_off'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['stripe_on_off_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!----> 
                <!---->
                <span class="setting-box">
                    <div class="setting-box-global">
                         <span class="input-field col s12">
                            <select class="changeCurrency" data-type="strip">
                               <option value="USD" <?php echo $stripeCurrency == 'USD' ? "selected='selected'":""; ?>>USD</option>   
                               <option value="AUD" <?php echo $stripeCurrency == 'AUD' ? "selected='selected'":""; ?>>AUD</option>
                               <option value="EUR" <?php echo $stripeCurrency == 'EUR' ? "selected='selected'":""; ?>>EUR</option>
                               <option value="BRL" <?php echo $stripeCurrency == 'BRL' ? "selected='selected'":""; ?>>BRL</option>
                               <option value="CAD" <?php echo $stripeCurrency == 'CAD' ? "selected='selected'":""; ?>>CAD</option>
                               <option value="CZK" <?php echo $stripeCurrency == 'CZK' ? "selected='selected'":""; ?>>CZK</option>
                               <option value="DKK" <?php echo $stripeCurrency == 'DKK' ? "selected='selected'":""; ?>>DKK</option>
                               <option value="HKD" <?php echo $stripeCurrency == 'HKD' ? "selected='selected'":""; ?>>HKD</option>
                               <option value="HUF" <?php echo $stripeCurrency == 'HUF' ? "selected='selected'":""; ?>>HUF</option>
                               <option value="INR" <?php echo $stripeCurrency == 'INR' ? "selected='selected'":""; ?>>INR</option>
                               <option value="ILS" <?php echo $stripeCurrency == 'ILS' ? "selected='selected'":""; ?>>ILS</option>
                               <option value="JPY" <?php echo $stripeCurrency == 'JPY' ? "selected='selected'":""; ?>>JPY</option>
                               <option value="MYR" <?php echo $stripeCurrency == 'MYR' ? "selected='selected'":""; ?>>MYR</option>
                               <option value="MXN" <?php echo $stripeCurrency == 'MXN' ? "selected='selected'":""; ?>>MXN</option>
                               <option value="TWD" <?php echo $stripeCurrency == 'TWD' ? "selected='selected'":""; ?>>TWD</option>
                               <option value="NZD" <?php echo $stripeCurrency == 'NZD' ? "selected='selected'":""; ?>>NZD</option>
                               <option value="NOK" <?php echo $stripeCurrency == 'NOK' ? "selected='selected'":""; ?>>NOK</option>
                               <option value="PHP" <?php echo $stripeCurrency == 'PHP' ? "selected='selected'":""; ?>>PHP</option>
                               <option value="PLN" <?php echo $stripeCurrency == 'PLN' ? "selected='selected'":""; ?>>PLN</option>
                               <option value="GBP" <?php echo $stripeCurrency == 'GBP' ? "selected='selected'":""; ?>>GBP</option>
                               <option value="RUB" <?php echo $stripeCurrency == 'RUB' ? "selected='selected'":""; ?>>RUB</option>
                               <option value="SGD" <?php echo $stripeCurrency == 'SGD' ? "selected='selected'":""; ?>>SGD</option> 
                               <option value="CHF" <?php echo $stripeCurrency == 'CHF' ? "selected='selected'":""; ?>>CHF</option>
                               <option value="THB" <?php echo $stripeCurrency == 'THB' ? "selected='selected'":""; ?>>THB</option>
                            </select>
                            <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                          </span>
                    </div>
                </span>
               <!----> 
                 <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['stripe_test_payment_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="stripetestsecretkey" placeholder="<?php echo $page_Lang['stripe_test_payment_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $stripePaymentTestSecretKey;?>"></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['stripe_test_payment_public_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="stripetestpublickey" placeholder="<?php echo $page_Lang['stripe_test_payment_public_key_note'][$dataUserPageLanguage];?>" value="<?php echo $stripePaymentTestPublicKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['stripe_live_payment_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="stripelivesecretkey" placeholder="<?php echo $page_Lang['stripe_live_payment_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $stripePaymentLiveSecretKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['stripe_live_payment_public_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="stripelivepublickey" placeholder="<?php echo $page_Lang['stripe_live_payment_public_key_note'][$dataUserPageLanguage];?>" value="<?php echo $stripePaymentLivePublicKey;?>"></div>
               </span>
               <!---->
               <!---->
                <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue save_stripe_infos"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                <!---->
        </div>
        <!---->
       <!---->
        <div class="general_settings_header_title_second"><?php echo $page_Lang['razorpay_setting'][$dataUserPageLanguage];?></div>
         <!---->
        <div class="row-box-container" id="authorize"> 
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="razorpay_mode" class="gstf" name="razorpay_mode" <?php echo $razorPayPaymentMode == '0' ? "checked='checked'":"";   echo $razorPayPaymentMode == '0' ? "value='1'":"value='0'";?>><label for="razorpay_mode"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['razorpay_mode'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['razorpay_mode_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="razorpay_ap" class="gstf" name="razorpay_ap" <?php echo $razorPayActivePasive == '1' ? "checked='checked'":"";   echo $razorPayActivePasive == '1' ? "value='0'":"value='1'";?>><label for="razorpay_ap"></label></div></span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['razorpay_on_off'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['razorpay_on_off_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!----> 
                <!---->
                <span class="setting-box">
                    <div class="setting-box-global">
                         <span class="input-field col s12">
                            <select class="changeCurrency" data-type="razor">
                               <option value="USD" <?php echo $razorPayCurrency == 'USD' ? "selected='selected'":""; ?>>USD</option>  
                               <option value="EUR" <?php echo $razorPayCurrency == 'EUR' ? "selected='selected'":""; ?>>EUR</option> 
                               <option value="GBP" <?php echo $razorPayCurrency == 'GBP' ? "selected='selected'":""; ?>>GBP</option>
                               <option value="SGD" <?php echo $razorPayCurrency == 'SGD' ? "selected='selected'":""; ?>>SGD</option>
                               <option value="AED" <?php echo $razorPayCurrency == 'AED' ? "selected='selected'":""; ?>>AED</option>
                               <option value="AUD" <?php echo $razorPayCurrency == 'AUD' ? "selected='selected'":""; ?>>AUD</option>
                               <option value="CAD" <?php echo $razorPayCurrency == 'CAD' ? "selected='selected'":""; ?>>CAD</option>
                               <option value="CNY" <?php echo $razorPayCurrency == 'CNY' ? "selected='selected'":""; ?>>CNY</option>
                               <option value="SEK" <?php echo $razorPayCurrency == 'SEK' ? "selected='selected'":""; ?>>SEK</option>
                               <option value="NZD" <?php echo $razorPayCurrency == 'NZD' ? "selected='selected'":""; ?>>NZD</option>
                               <option value="MXN" <?php echo $razorPayCurrency == 'MXN' ? "selected='selected'":""; ?>>MXN</option>
                               <option value="HKD" <?php echo $razorPayCurrency == 'HKD' ? "selected='selected'":""; ?>>HKD</option>
                               <option value="NOK" <?php echo $razorPayCurrency == 'NOK' ? "selected='selected'":""; ?>>NOK</option>
                               <option value="RUB" <?php echo $razorPayCurrency == 'RUB' ? "selected='selected'":""; ?>>RUB</option>
                               <option value="INR" <?php echo $razorPayCurrency == 'INR' ? "selected='selected'":""; ?>>INR</option>
                               <option value="PHP" <?php echo $razorPayCurrency == 'PHP' ? "selected='selected'":""; ?>>PHP</option>
                               <option value="UYU" <?php echo $razorPayCurrency == 'UYU' ? "selected='selected'":""; ?>>UYU</option>
                               <option value="NPR" <?php echo $razorPayCurrency == 'NPR' ? "selected='selected'":""; ?>>NPR</option>
                               <option value="ZAR" <?php echo $razorPayCurrency == 'ZAR' ? "selected='selected'":""; ?>>ZAR</option> 
                            </select>
                            <label><?php echo $page_Lang['select_main_language'][$dataUserPageLanguage];?></label>
                          </span>
                    </div>
                </span>
               <!---->
                 <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['razorpay_test_key_id'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="razortestkeyid" placeholder="<?php echo $page_Lang['razorpay_test_key_id_note'][$dataUserPageLanguage];?>" value="<?php echo $razorPayTestkingKeyID;?>"></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['razorpay_test_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="razortestsecretkey" placeholder="<?php echo $page_Lang['razorpay_test_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $razorPayTestingSecretKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['razorpay_live_key_id'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="razorlivekeyid" placeholder="<?php echo $page_Lang['razorpay_live_key_id_note'][$dataUserPageLanguage];?>" value="<?php echo $razorPayLiveKeyID;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['razorpay_live_secret_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="razorlivesecretkey" placeholder="<?php echo $page_Lang['razorpay_live_secret_key_note'][$dataUserPageLanguage];?>" value="<?php echo $razorPayLiveSecretKey;?>"></div>
               </span>
               <!---->
               <!---->
                <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue save_razorpay_infos"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                <!---->
        </div>
        <!---->
   </div>
</div>
 