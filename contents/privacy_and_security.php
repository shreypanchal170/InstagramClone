<div class="settings_form_container">
  <h1 class="settings_header">
    <?php echo $page_Lang['security_and_privacy'][$dataUserPageLanguage];?>
  </h1>
  <div class="HgNB_"> 
  <!--Setting Imput Item STARTED-->
  <div class="set_box_not">
      <label for="securityProfile">
        <input type="checkbox" class="notChange" post-type="security" post-not="securityProfile" id="securityProfile" value="<?php echo $dataPrivateAccount == '1' ? "0":"1"; ?>"  <?php echo $dataPrivateAccount == '1' ? "checked='checked'":""; ?>/>
        <span><?php echo $page_Lang['private_account'][$dataUserPageLanguage];?></span>
      </label>
  </div>
  <p class="_7LpC8" id="securityProfilea"><?php echo $page_Lang['privated_account_info'][$dataUserPageLanguage];?></p>
 <!--Setting Imput Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box_not">
      <label for="securityProfileMessage">
        <input type="checkbox" class="notChangePrivateMessage" post-type="securityMessage" post-not="securityProfileMessage" id="securityProfileMessage" value="<?php echo $dataUserCanSendMessage == '1' ? "0":"1"; ?>"  <?php echo $dataUserCanSendMessage == '1' ? "checked='checked'":""; ?>/>
        <span><?php echo $page_Lang['message_available_for_visitors'][$dataUserPageLanguage];?></span>
      </label>
  </div>
  <p class="_7LpC8" id="securityProfileMessagea"><?php echo $page_Lang['message_available_for_visitors_info'][$dataUserPageLanguage];?></p>
 <!--Setting Imput Item FINISHED-->
 </div> 
</div> 