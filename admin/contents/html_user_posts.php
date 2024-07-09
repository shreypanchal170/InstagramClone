 <div class="divTableRow body<?php echo $dataUserPostID;?>" id="post_<?php echo $dataUserPostID;?>" data-last="<?php echo $dataUserPostID;?>"> 
<div class="divTableCell bold"><?php echo $dataUserPostID;?></div>
<div class="divTableCell hvr-sweep-to-right block datauser"  id="<?php echo $dataUserPostUserID;?>" data-last="<?php echo $dataUserPostUserID;?>" data-type="profile"><div class="tableincontainer"><div class="publicher_avatar"><img src="<?php echo $CardDataUserAvatar;?>" class="a0uk"></div><div class="publicher_name"><?php echo $dataPostUserFullName;?></div></div></div>
<div class="divTableCell hvr-sweep-to-right block showThisPost_" data-type="showPostSingle" data-id="<?php echo $dataUserPostID;?>" data-ui="<?php echo $dataUserPostUserID;?>"><div class="tableincontainer"><div class="see_post">See Post</div></div></div>
<div class="divTableCell"><div class="tableincontainer"><span class="user_ps_type"><?php echo $postType_icon[$dataUserPostType];?></span></div></div>
<div class="divTableCell"><div class="tableincontainer timeago" title="<?php echo $message_time;?>"></div></div>
<div class="divTableCell hvr-sweep-to-right-red block delete_user_post_alert" data-post="<?php echo $dataUserPostID;?>" data-u="<?php echo $dataUserPostUserID;?>" data-type="deletePosta"><div class="tableincontainer post_delete_button">Delete</div></div> 
</div>