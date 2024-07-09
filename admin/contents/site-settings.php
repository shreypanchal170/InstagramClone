<div class="page_title bold"><?php echo $page_Lang['site_settings'][$dataUserPageLanguage]; ?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['website_setttings'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_profile">
               <!---->
               <span class="setting-box" id="lgbg"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['add_new_long_logo'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box">
                   
                          <form id="logoBig" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>admin/requests/request.php">
                            <div class="file-field input-field">
                              <div class="btn">
                                <span><?php echo $page_Lang['select_big_logo'][$dataUserPageLanguage];?></span>
                                <input type="file" name="logobig" id="changebiglogo" data-id="biglogo">
                              </div> 
                            </div>
                          </form> 
                   </div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['best_big_logo_size'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['add_new_mini_logo'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box">
                   
                          <form id="logoMini" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>admin/requests/request.php">
                            <div class="file-field input-field">
                              <div class="btn">
                                <span><?php echo $page_Lang['select_mini_logo'][$dataUserPageLanguage];?></span>
                                <input type="file" name="logomini" id="changeminilogo" data-id="minilogo">
                              </div> 
                            </div>
                          </form> 
                   </div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['best_mini_logo_size'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['site_name'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="website_name" placeholder="<?php echo $page_Lang['write_site_name'][$dataUserPageLanguage];?>" value="<?php echo $dot_siteName;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['website_title'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="website_title" placeholder="<?php echo $page_Lang['write_website_title'][$dataUserPageLanguage];?>" value="<?php echo $dot_title;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['site_keywords'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="write_site_keywords" placeholder="<?php echo $page_Lang['write_site_keywords'][$dataUserPageLanguage];?>" value="<?php echo $dot_siteKeywords;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['write_site_information'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea chng" id="write_site_information" placeholder="<?php echo $page_Lang['write_site_information'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; resize: none; height: 86px;"><?php echo $dot_description;?></textarea></div>
               </span>
               <!----> 
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_websitesettings"  data-type="websiteSettings"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!----> 
        </div>
        <div class="general_settings_header_title_second"><?php echo $page_Lang['api_keys_settings'][$dataUserPageLanguage];?></div>
        <!---->
        <div class="row-box-container" id="setapi">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['google_map_api'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="google_map_api" placeholder="Google Map API" value="<?php echo $dot_googleMapApi;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['google_analytics_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea chng" id="google_analytics_code" placeholder="<?php echo $page_Lang['paste_google_analytics_code'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; resize: none; height: 86px;"><?php echo $dot_googleAnalyticsCode;?></textarea></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['giphy_api_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="giphy_api_key" placeholder="Giphy Api Key" value="<?php echo $giphyapiKey;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['yandex_translate_api_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="yandex_translate_api" placeholder="Yandex Translate API Key" value="<?php echo $yandexAPI;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['weather_api_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="weather_api_key" placeholder="Weather API Key" value="<?php echo $weatherAPi;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['weather_default_location'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="weather_default_location" placeholder="Weather Default Location" value="<?php echo $defaultWeatherLocation;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['one_signal_app_id'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="onesignalappid" placeholder="OneSignal App ID" value="<?php echo $dataOneSignalAppID;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['one_signal_rest_api'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="onesignalrestid" placeholder="OneSignal Rest API" value="<?php echo $oneSignalRestApi;?>"></div>
               </span>
               <!---->
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_websiteapis" data-type="websiteApis"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!----> 
        </div>
        <!---->
        <!---->
        <div class="general_settings_header_title_second"><?php echo $page_Lang['twilio_settings'][$dataUserPageLanguage];?></div>
        <!---->
        <!---->
        <div class="row-box-container" id="twil">
                <!---->
                <span class="setting-box">
                   <span class="setSettingBox">
                      <div class="ckbx-style-14">
                          <input type="checkbox" id="twiliomode" class="gstf" name="twiliomode" <?php echo $twilioMode == '1' ? "checked='checked'":""; echo $twilioMode == '0' ? "value='1'":"value='0'";?>><label for="twiliomode"></label>
                      </div>
                   </span>
                   <span class="setSettingBoxText"><?php echo $page_Lang['twilio_mode'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['twilio_mode_note'][$dataUserPageLanguage];?></span>
                 </span>
                <!---->
              <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['twilo_account_sid'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="twilioasid" placeholder="<?php echo $page_Lang['twilo_account_sid'][$dataUserPageLanguage];?>" value="<?php echo $twilioAccountSid;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['twilio_key_sid'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="twilioksid" placeholder="<?php echo $page_Lang['twilio_key_sid'][$dataUserPageLanguage];?>" value="<?php echo $apiKeySid;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['twilio_api_key_secret'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="twilioaks" placeholder="<?php echo $page_Lang['twilio_api_key_secret'][$dataUserPageLanguage];?>" value="<?php echo $apiKeySecret;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['video_call_time'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="twiliovideoctm" placeholder="<?php echo $page_Lang['video_call_time'][$dataUserPageLanguage];?>" value="<?php echo $twillioCallTime;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['video_call_dial_time'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="twiliovcdt" placeholder="<?php echo $page_Lang['video_call_dial_time'][$dataUserPageLanguage];?>" value="<?php echo $twilloDialTime;?>"></div>
               </span>
               <!---->
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_twilio" data-type="twilioSet"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!----> 
        </div>
        <!---->
        <div class="general_settings_header_title_second"><?php echo $page_Lang['email_settings'][$dataUserPageLanguage];?></div>
         <!---->
        <div class="row-box-container">
               <!---->
               <span class="setting-box" id="smtpormail"> 
                  <span class="setSettingBoxInfoNoteBold"><?php echo $page_Lang['server_type'][$dataUserPageLanguage];?></span>
                   <span class="setSettingBoxText">
                     <div class="column_set_input_box">
                         <div class="mailTypebox smtpmail" id="psl_smtp" data-val="smtp">
                            <?php echo $dot_SMTPorMAIL == 'smtp' ? "<div class='usingtype'  id='pst_smtp'></div>":""; ?> 
                              <span class="setSettinginputTitle">SMTP Server</span>
                              <div class="mailTypeBoxContainer smtpServer"></div>
                         </div>
                         <div class="mailTypebox smtpmail" id="psl_mail" data-val="mail">
                         <?php echo $dot_SMTPorMAIL == 'mail' ? "<div class='usingtype' id='pst_mail'></div>":""; ?> 
                             <span class="setSettinginputTitle">Server Mail (Default)</span>
                              <div class="mailTypeBoxContainer mailServer"></div>
                         </div>
                     </div>
                   </span>  
               </span>
               <!---->
                <!---->
               <span class="setting-box"> 
                  <span class="setSettingBoxInfoNoteBold">SMTP Encryption</span>
                   <span class="setSettingBoxText">
                     <div class="column_set_input_box">
                         <div class="mailTypebox tlslss"id="tlsssl_ssl" data-val="ssl">
                               <?php echo $dot_TLSorSSL == 'ssl' ? "<div class='usingtypetlsssl'  id='tlsss_ssl'></div>":""; ?> 
                              <span class="setSettinginputTitle">TLS</span>
                              <div class="mailTypeBoxContainer tls"></div>
                         </div> 
                         <div class="mailTypebox tlslss" id="tlsssl_tls" data-val="tls">
                         <?php echo $dot_TLSorSSL == 'tls' ? "<div class='usingtypetlsssl'  id='tlsss_tls'></div>":""; ?> 
                             <span class="setSettinginputTitle">SSL</span>
                              <div class="mailTypeBoxContainer ssl"></div>
                         </div>
                     </div>
                   </span>  
               </span>
               <!---->
               <span id="smtpste"></span>
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle">SMTP Host</span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="smtp_host" placeholder="Write your SMTP Host" value="<?php echo $dot_smtpHost;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle">SMTP Username</span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="smtp_username" placeholder="Write your SMTP Username" value="<?php echo $dot_smtpUsername;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle">SMTP Password</span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="smtp_password" placeholder="Write your SMTP Password" value="<?php echo $dot_smtpPassword;?>"></div>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle">SMTP Port</span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="smtp_port" placeholder="Write your SMTP Port" value="<?php echo $dot_smtpPort;?>"></div>
               </span>
               <!----> 
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue savesSmtp"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!----> 
        </div>
        <!---->
   </div>
</div>
 <script type="text/javascript">
$(document).ready(function(){
	$("body").on("click",".save_twilio", function(){
	   var type = $(this).attr("data-type");
	   var twilioaSID = $("#twilioasid").val();
	   var twiliokSID = $("#twilioksid").val();
	   var twilioaks = $("#twilioaks").val();
	   var twilioVCtime = $("#twiliovideoctm").val();
	   var twilioVCDtime = $("#twiliovcdt").val();
	   var data = 'f='+type+'&twilioSID='+twilioaSID+'&twilioKeySID='+twiliokSID+'&twilioAKeyID='+twilioaks+'&twilioVideoCallTime='+twilioVCtime+'&twilioVideoCallDialTime='+twilioVCDtime;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + 'admin/requests/request',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 $("#twil").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(response) {
			  $(".preloadCom").remove(); 
			  M.toast({html: response}); 
		  }
		});
	});
});
 </script>