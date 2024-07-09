 <div class="divTableRow body<?php echo $dataUserPostID;?>" id="post_<?php echo $dataUserPostID;?>" data-last="<?php echo $dataUserPostID;?>"> 
<div class="divTableCell bold"><?php echo $dataUserPostID;?></div>
<div class="divTableCell hvr-sweep-to-right block datauser"  id="<?php echo $dataUserPostUserID;?>" data-last="<?php echo $dataUserPostUserID;?>" data-type="profile"><div class="tableincontainer"><div class="publicher_avatar"><img src="<?php echo $CardDataUserAvatar;?>" class="a0uk"></div><div class="publicher_name"><?php echo $dataPostUserFullName;?></div></div></div>
<div class="divTableCell hvr-sweep-to-right block showThisPost_" data-type="showPostSingle" data-id="<?php echo $dataUserPostID;?>" data-ui="<?php echo $dataUserPostUserID;?>"><div class="tableincontainer"><div class="see_post"><?php echo $page_Lang['see_boosted_product'][$dataUserPageLanguage];?></div></div></div>
<div class="divTableCell">
  <!---->
  <div class="tableincontainer">
       <span class="ckbx-style-8 ckbx-medium">
          <input type="checkbox" id="adminActivated<?php echo $dataUserPostID;?>" data-id="<?php echo $dataUserPostID;?>" class="gst" data-type="product_booststat" name="ckbx-style-8-1"  <?php echo $boostAdsStatus == '1' ? "checked='checked'":""; echo $boostAdsStatus == '0' ? "value='1'":"value='0'"; ?>> 
          <label for="adminActivated<?php echo $dataUserPostID;?>"></label>
       </span>
  </div>
  <!---->
</div>
<div class="divTableCell">
  <?php echo $boostAdsPrice;?>
</div>
<div class="divTableCell hvr-sweep-to-right-red block delete_user_post_alert" data-post="<?php echo $dataUserPostID;?>" data-u="<?php echo $dataUserPostUserID;?>" data-type="deletePosta"><div class="tableincontainer post_delete_button">Delete</div></div> 
</div>