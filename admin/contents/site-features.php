<div class="page_title bold"><?php echo $page_Lang['manage_website_features'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['post_settings'][$dataUserPageLanguage];?></div>
        <div class="row-box-container">
             <!---->
             <span class="setting-box"> 
               <span class="setSettingBoxInfoNoteBold"><?php echo $page_Lang['post_buttons_position'][$dataUserPageLanguage];?></span>
               <span class="setSettingBox">
               <!---->
                   <div class="postPositionBox" id="pb1" data-val="1">
                      <?php echo $postTypePosition == '1' ? "<div class='selectedPosition'  id='ps1'></div>":""; ?>
                         <div class="postPositionBoxHeader"></div>
                         <div class="postPositionBoxContainer">
                              <div class="postPositionBox_items_left">
                                   <div class="postsbSection"></div>
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem"></div>
                              </div>
                              <div class="postPositionBox_items_right">
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem"></div>
                              </div>
                         </div>
                   </div>
               <!---->
               <!---->
                   <div class="postPositionBox" id="pb0" data-val="0">
                         <?php echo $postTypePosition == '0' ? "<div class='selectedPosition'  id='ps0'></div>":""; ?>
                         <div class="postPositionBoxHeader"></div>
                         <div class="postPositionBoxContainer">
                              <div class="postPositionBox_items_left"> 
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem"></div>
                              </div>
                              <div class="postPositionBox_items_right">
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem"></div>
                              </div> 
                         </div>
                         <div class="postbuttonrightbottom"></div>
                   </div>
               <!---->
               </span> 
                <span class="setSettingBoxInfoNote"><?php echo $page_Lang['post_buttons_position_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="text_post_feature" class="gstf" name="text_post_feature" <?php echo $postType_Text == '0' ? "checked='checked'":""; echo $postType_Text == '0' ? "value='1'":"value='0'";?>><label for="text_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['text_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['text_post_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="image_post_feature" class="gstf" name="image_post_feature" <?php echo $postType_Image == '0' ? "checked='checked'":"";  echo $postType_Image == '0' ? "value='1'":"value='0'";?>><label for="image_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['image_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['image_post_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="video_post_feature" class="gstf" name="video_post_feature" <?php echo $postType_Video == '0' ? "checked='checked'":"";   echo $postType_Video == '0' ? "value='1'":"value='0'";?>><label for="video_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['video_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['video_post_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="audio_post_feature" class="gstf" name="audio_post_feature" <?php echo $postType_Audio == '0' ? "checked='checked'":"";   echo $postType_Audio == '0' ? "value='1'":"value='0'";?> ><label for="audio_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['audio_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['auido_post_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="link_post_feature" class="gstf" name="link_post_feature" <?php echo $postType_Link == '0' ? "checked='checked'":"";   echo $postType_Link == '0' ? "value='1'":"value='0'";?>><label for="link_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['link_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['link_post_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="filter_post_feature" class="gstf" name="filter_post_feature" <?php echo $postType_Filter == '0' ? "checked='checked'":"";   echo $postType_Filter == '0' ? "value='1'":"value='0'";?>><label for="filter_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['filtered_image_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['filtered_image_post_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="giphy_post_feature" class="gstf" name="giphy_post_feature" <?php echo $postType_Filter == '0' ? "checked='checked'":"";   echo $postType_Filter == '0' ? "value='1'":"value='0'";?>><label for="giphy_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['gif_post_feature'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['gif_post_feature_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="location_post_feature" class="gstf" name="location_post_feature" <?php echo $postType_Filter == '0' ? "checked='checked'":"";   echo $postType_Filter == '0' ? "value='1'":"value='0'";?>><label for="location_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['location_post_feature'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['location_post_feature_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="watermark_post_feature" class="gstf" name="watermark_post_feature" <?php echo $postType_Watermark == '0' ? "checked='checked'":"";   echo $postType_Watermark == '0' ? "value='1'":"value='0'";?>><label for="watermark_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['watermark_post_feature'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['watermark_post_feature_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="benchmark_post_feature" class="gstf" name="benchmark_post_feature" <?php echo $postType_Which == '0' ? "checked='checked'":"";   echo $postType_Which == '0' ? "value='1'":"value='0'";?>><label for="benchmark_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['benchmark_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['benchmark_post_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="market_post_feature" class="gstf" name="market_post_feature" <?php echo $marketPost == '0' ? "checked='checked'":"";   echo $marketPost == '0' ? "value='1'":"value='0'";?>><label for="market_post_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['market_post'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['market_post_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="before_after_feature" class="gstf" name="before_after_feature" <?php echo $beforeAfterPost== '0' ? "checked='checked'":"";   echo $beforeAfterPost == '0' ? "value='1'":"value='0'";?>><label for="before_after_feature"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['before_after'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['before_after_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="video_auto_play" class="gstf" name="video_auto_play" <?php echo $videoAutoPlayStatus== '1' ? "checked='checked'":"";   echo $videoAutoPlayStatus == '0' ? "value='1'":"value='0'";?>><label for="video_auto_play"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['video_auto_play_status'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['video_auto_play_status_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="video_auto_play_sound" class="gstf" name="video_auto_play_sound" <?php echo $videoSoundOpenStatus== '0' ? "checked='checked'":"";   echo $videoSoundOpenStatus == '0' ? "value='1'":"value='0'";?>><label for="video_auto_play_sound"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['video_auto_sound_open'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['video_auto_sound_open_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
        </div>
        <!--2 STARTED-->
        <div class="general_settings_header_title_next"><?php echo $page_Lang['right_sidebar_features_settings'][$dataUserPageLanguage];?></div>
        <div class="row-box-container">
             <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="enable_disable_proflie_card" class="gstf" name="enable_disable_proflie_card" <?php echo $showHideProfileCard == '0' ? "checked='checked'":"";   echo $showHideProfileCard == '0' ? "value='1'":"value='0'";?>><label for="enable_disable_proflie_card"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['user_profile_card'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['user_profile_card_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="youmayknowpeople" class="gstf" name="youmayknowpeople" <?php echo $showHideYouMayKnowPeople == '0' ? "checked='checked'":"";   echo $showHideYouMayKnowPeople == '0' ? "value='1'":"value='0'";?>><label for="youmayknowpeople"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['you_may_know_hide_show_button'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['you_may_know_hide_show_button_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="popularradar" class="gstf" name="popularradar" <?php echo $showHideRadar == '0' ? "checked='checked'":"";   echo $showHideRadar == '0' ? "value='1'":"value='0'";?>><label for="popularradar"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['radar_hide_show_button'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['radar_hide_show_button_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="trendtags" class="gstf" name="trendtags" <?php echo $showHideTrendTags == '0' ? "checked='checked'":"";   echo $showHideTrendTags == '0' ? "value='1'":"value='0'";?>><label for="trendtags"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['trend_hashtags_hide_show_button'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['trend_hashtags_hide_show_button_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="can_create_ads" class="gstf" name="can_create_ads" <?php echo $showHideCreatedAdsPage == '0' ? "checked='checked'":"";   echo $showHideCreatedAdsPage == '0' ? "value='1'":"value='0'";?>><label for="can_create_ads"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['user_can_create_advertisement'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['user_can_create_advertisement_inf'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="can_create_event" class="gstf" name="can_create_event" <?php echo $showHideEventFeature == '0' ? "checked='checked'":"";   echo $showHideEventFeature == '0' ? "value='1'":"value='0'";?>><label for="can_create_event"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['users_can_create_event'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['user_can_create_event_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="weather_widget" class="gstf" name="weather_widget" <?php echo $sidebarWeather == '0' ? "checked='checked'":"";   echo $sidebarWeather == '0' ? "value='1'":"value='0'";?>><label for="weather_widget"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['weather_enable_disable'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['weather_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="enable_disable_unlike" class="gstf" name="enable_disable_unlike" <?php echo $unlikeFeature == '0' ? "checked='checked'":"";   echo $unlikeFeature == '0' ? "value='1'":"value='0'";?>><label for="enable_disable_unlike"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['unlike_buton_enable_disable'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['unlike_button_enable_disable_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
        </div>
        <!--2 FINISHED-->
        <!--3 STARTED-->
        <div class="general_settings_header_title_next"><?php echo $page_Lang['profile_design_features'][$dataUserPageLanguage];?></div>
        <div class="row-box-container">
             <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="enable_disable_profiledesign" class="gstf" name="enable_disable_profiledesign" <?php echo $userCanCustomizeProfile == '1' ? "checked='checked'":"";   echo $userCanCustomizeProfile == '0' ? "value='1'":"value='0'";?>><label for="enable_disable_profiledesign"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['enable_disable_profile_design'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['enable_disable_profile_design_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="enable_disable_profilebackground" class="gstf" name="enable_disable_profilebackground" <?php echo $userCanChangeBackground == '1' ? "checked='checked'":"";   echo $userCanChangeBackground == '0' ? "value='1'":"value='0'";?>><label for="enable_disable_profilebackground"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['enable_disable_profile_background'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['enable_disable_profile_background_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="enable_disable_profilebackgroundSound" class="gstf" name="enable_disable_profilebackgroundSound" <?php echo $userCanChangeBackgroundSound == '1' ? "checked='checked'":"";   echo $userCanChangeBackgroundSound == '0' ? "value='1'":"value='0'";?>><label for="enable_disable_profilebackgroundSound"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['enable_disable_profile_background_sound'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['enable_disable_profile_background_sound_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
        </div>
        <!--3 FINISHED-->
   </div>
</div>
 