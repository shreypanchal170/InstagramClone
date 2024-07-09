<!--User Profile STARTED-->
<div class="m0NAq">
<?php echo $Dot->Dot_CheckTourSawBefore($uid, 1720) ? '<div style="position:absolute;width:100%;height:100%;z-index:1;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1720" data-tip="1720"></div>' : '';?>
  <!--Cover STARTED-->
  <div class="_pbwg8U_">
    <div class="_jjzlbU_" style="background-image: url('<?php echo $dataUserCover;?>');">
      <img src="<?php echo $dataUserCover;?>" class="_exPexU">
    </div>
  </div>
  <!--Cover FINISHED-->
  <!--Avatar STARTED-->
  <div class="a4Ce_"> 
    <div class="infoProfileAvatar_Out"> <?php echo $thisisProMember;?>
        <div class="infoProfileAvatar"> 
           <img src="<?php echo $dataUserAvatar;?>" />
        </div>
    </div>
  </div>
  <!--Avatar FINISHED-->
  <!--UserName and User Mention STARTED-->
  <div class="userNameMention">
    <a href="<?php echo $base_url.'profile/'.$dataUsername;?>"><div class="userName" style="display:inline-block;"><?php echo $dataUserFullName.$thisisVerifiedMember;?></div></a>
    <a href="<?php echo $base_url.'profile/'.$dataUsername;?>"><div class="userMention">@<?php echo $dataUsername;?></div></a>
    <?php 
	if($dataUserWord){ echo '<p class="profileCarddescription">'.htmlentities($dataUserWord).'</p>'; }?>
  </div>
  <!--UserName and User Mention FINISHED-->
  <!--Tree Menu STARTED-->
  <div class="cardMenuContainer">
    <div class="carProfileLink hvr-underline-from-center">
      <a href="<?php echo $base_url.'profile/'.$dataUsername;?>">
      <div class="carHeaderSum"><?php echo $dataSumUserPost;?></div>
      <div class="carHeaderText"><?php echo $page_Lang['user_posts'][$dataUserPageLanguage];?></div>
      </a>
    </div>
    <div class="carProfileLink hvr-underline-from-center">
      <a href="<?php echo $base_url.'profile/followers/'.$dataUsername;?>">
      <div class="carHeaderSum"><?php echo $dataSumFollowers;?></div>
      <div class="carHeaderText"><?php echo $page_Lang['user_followers'][$dataUserPageLanguage];?></div>
      </a>
    </div>
    <div class="carProfileLink hvr-underline-from-center">
      <a href="<?php echo $base_url.'profile/friends/'.$dataUsername;?>">
      <div class="carHeaderSum"><?php echo $dataSumFriends;?></div>
      <div class="carHeaderText"><?php echo $page_Lang['user_friends'][$dataUserPageLanguage];?></div>
      </a>
    </div>
  </div>
  <!--Tree Menu FINISHED-->
  <?php 
  if($proSystemStatus == 1){?>
  <div class="pro_item_box_lsttime">
  <div class="pro_item_box_lsttime_in">
  <div class="onofinnf" style="padding-bottom:15px;"><?php echo $page_Lang['show_hide_your_last_seen_note'][$dataUserPageLanguage];?></div> 
  <div class="cardMenuContainer" style="display:block; height:40px;">
      <div class="lastSeenOpenClose">
          <div class="lastSeenItem textAlignRight"><?php echo $page_Lang['off_on_last_seen'][$dataUserPageLanguage];?></div>
          <div class="lastSeenItem">
              <div class="lastSeenCheck">
                 <div class="ckbx-style-8 ckbx-medium <?php echo $dataUserProType == '1' ? "":"becomepro";?>">
                     <input type="checkbox" name="ckbx-square-1" class="onofprru" id="o_f_o_n" data-type="o_f_o_n" <?php echo $showOnlineOfflineStatus == '1' ? "checked='checked'":""; echo $showOnlineOfflineStatus == '1' ? "value='0'":"value='1'"; echo $dataUserProType == '0' ? "disabled":"";?> >
                    <label for="o_f_o_n"></label>
                 </div>
              </div>
          </div>
          <div class="lastSeenItem textAlignLeft"><?php echo $page_Lang['on_off_last_seen'][$dataUserPageLanguage];?></div>
      </div> 
  </div>
  </div>
  </div>
  <?php } else{ ?>
   <div class="pro_item_box_lsttime">
  <div class="pro_item_box_lsttime_in">
  <div class="onofinnf" style="padding-bottom:15px;"><?php echo $page_Lang['show_hide_your_last_seen_p'][$dataUserPageLanguage];?></div> 
  <div class="cardMenuContainer" style="display:block; height:40px;">
      <div class="lastSeenOpenClose">
          <div class="lastSeenItem textAlignRight"><?php echo $page_Lang['off_on_last_seen'][$dataUserPageLanguage];?></div>
          <div class="lastSeenItem">
              <div class="lastSeenCheck">
                 <div class="ckbx-style-8 ckbx-medium">
                     <input type="checkbox" name="ckbx-square-1" class="onofprru" id="o_f_o_n" data-type="o_f_o_n" <?php echo $showOnlineOfflineStatus == '1' ? "checked='checked'":""; echo $showOnlineOfflineStatus == '1' ? "value='0'":"value='1'"; ?> >
                    <label for="o_f_o_n"></label>
                 </div>
              </div>
          </div>
          <div class="lastSeenItem textAlignLeft"><?php echo $page_Lang['on_off_last_seen'][$dataUserPageLanguage];?></div>
      </div> 
  </div>
  </div>
  </div>
  <?php } ?>
</div>
<!--User Profile FINISHED--> 