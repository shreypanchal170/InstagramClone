 <div class="divTableRow body<?php echo $reportID;?>" id="post_<?php echo $reportID;?>" data-last="<?php echo $reportID;?>"> 
<div class="divTableCell bold"><?php echo $reportID;?></div>
<div class="divTableCell hvr-sweep-to-right block datauser"  id="<?php echo $reporterUserID;?>" data-last="<?php echo $reporterUserID;?>" data-type="profile"><div class="tableincontainer"><div class="publicher_avatar"><img src="<?php echo $CardDataUserAvatar;?>" class="a0uk"></div><div class="publicher_name"><?php echo $reporterUserFullName;?></div></div></div>
<div class="divTableCell hvr-sweep-to-right block showThisReportedPost_" data-type="showReportedPostSingle" data-id="<?php echo $reportedPostID;?>"><div class="tableincontainer"><div class="see_post">See Post</div></div></div>
<div class="divTableCell"><div class="tableincontainer" style="<?php echo $colors[rand(76,80)];?>"><?php echo $page_Lang[$reportType][$dataUserPageLanguage];?></div></div>
<div class="divTableCell"><div class="tableincontainer timeago" title="<?php echo $message_time;?>"></div></div>
<div class="divTableCell"><div class="tableincontainer"><?php echo $checked;?></div></div>
<div class="divTableCell block" data-post="<?php echo $reportedPostID;?>"><div class="tableincontainer" id="menu_<?php echo $reportID;?>" style="vertical-align: middle;"><div class="look_at_report border-radius" id="<?php echo $reportID;?>" data-post="<?php echo $reportedPostID;?>"></div></div></div> 
</div>