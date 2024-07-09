<div class="adivTableRow sorm" id="adsBody<?php echo $dataAdsID;?>">
  <div class="adivTableCell"><?php echo $dataAdsID;?></div>
  <span class="adivTableCell block">
  <div class="tableincontainer">
       <span class="ckbx-style-8 ckbx-medium">
          <input type="checkbox" id="adminActivated<?php echo $dataAdsID;?>" data-id="<?php echo $dataAdsID;?>" class="gst" data-type="adacu" name="ckbx-style-8-1"  <?php echo $dataAdsActivated == '1' ? "checked='checked'":""; echo $dataAdsActivated == '0' ? "value='1'":"value='0'"; ?>> 
          <label for="adminActivated<?php echo $dataAdsID;?>"></label>
       </span>
       </div>
  </span>
  <div class="adivTableCell block datauser"  id="<?php echo $dataAdsUidFk;?>" data-last="<?php echo $dataAdsUidFk;?>" data-type="profile">
      <div class="tableincontainer">
          <div class="publicher_avatar">
              <img src="<?php echo $dataAdsUserAvatar;?>" class="a0uk">
          </div>
          <div class="publicher_name"><?php echo $dataAdsUserFullName;?></div>
      </div>
  </div>
  <div class="adivTableCell"><?php echo $dataAdsClickCount;?></div>
  <div class="adivTableCell"><?php echo $dataAdsViewCount;?></div>
  <div class="adivTableCell"><span class="<?php echo $dataAdsApprovalStatus;?> border-radius"><?php echo $page_Lang[$dataAdsApprovalStatus][$dataUserPageLanguage];?></span></div>
  <div class="adivTableCell">
      <div class="manageThisAds icons_two" id="<?php echo $dataAdsID;?>">
      <div class="ads_menu_container post_menu_<?php echo $dataAdsID;?>" id="post_menu_<?php echo $dataAdsID;?>" style="display: none;">
          <div class="post_menu_item hvr-underline-from-center see_adsa" data-post="<?php echo $dataAdsID;?>" data-type="showAdsAd"><span class="icons_admin see_ads"></span> See Advertise</div> 
          <div class="post_menu_item hvr-underline-from-center see_adsa" data-post="<?php echo $dataAdsID;?>" data-type="editAdsAd"><span class="icons edit_post_icon"></span> Edit Advertise</div> 
          <div class="post_menu_item hvr-underline-from-center deleteAdvertise" data-post="<?php echo $dataAdsID;?>" data-type="deleteAdsAd"><span class="icons delete_icon"></span> Delete Advertise</div> 
      </div>
      </div>
      
  </div> 
</div>  
 