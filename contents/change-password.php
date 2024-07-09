<div class="settings_form_container">
  <h1 class="settings_header">
    <?php echo $page_Lang['change_password'][$dataUserPageLanguage];?>
  </h1>
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['current_password'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="password" class="inputField insta_font chpas" id="oldPassword" placeholder="<?php echo $page_Lang['current_password'][$dataUserPageLanguage];?>" autocomplete="new-password" value="" /></div>
  </div>
 <!--Setting Imput Item FINISHED-->
 <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['new_password'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="password" class="inputField insta_font chpas" id="newPassword" placeholder="<?php echo $page_Lang['new_password'][$dataUserPageLanguage];?>" autocomplete="new-password" value="" /></div>
  </div>
 <!--Setting Imput Item FINISHED-->
 <!--Setting Imput Item STARTED-->
  <div class="set_box" id="afpas">
    <div class="set_box_title">
      <?php echo $page_Lang['new_password_again'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="password" class="inputField insta_font chpas" id="reNewPassword" placeholder="<?php echo $page_Lang['new_password_again'][$dataUserPageLanguage];?>" autocomplete="new-password" value="" /></div>
  </div>
 <!--Setting Imput Item FINISHED-->
   <!--Save Settings for Personal Information button STARTED-->
  <div class="set_box" id="set_pas" style="display:none;">
    <div class="settings_box_footer">
      <div class="control left_btn"></div>
      <div class="control right_btn">
        <div class="share_post_box save_new_pass" data-type="setNewPas">
          <?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?>
        </div>
      </div>
    </div>
  </div>
  <!--Save Settings for Personal Information button FINISHED-->
</div> 