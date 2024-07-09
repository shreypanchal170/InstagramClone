<?php 
$getAnnouncement = $Dot->Dot_GetLastAnnouncement($uid);  
if($getAnnouncement){ 
    foreach($getAnnouncement as $an){
		$anID = $an['an_id'];
		$anType = $an['an_type'];
		$anText = $an['annnouncement_text'];
		$anTitle = $an['announcement_title'];
		$anTime = $an['announce_time'];
		$theAnnounceTime = date("c",$anTime);
		if($anType == 'info'){
		    $anColor = '#35aaf8';
		}else if($anType == 'success'){
		    $anColor = '#43a047';
		}else if($anType == 'warning'){
		    $anColor = '#fb8c00';
		}else if($anType == 'danger'){
		    $anColor = '#e53935';
		}
?>
<div class="announcement_container">
    <div class="newAnnouncement" style="background-color:<?php echo $anColor;?>;">
	     <div class="newAnnouncementicon"><?php echo $Dot->Dot_SelectedMenuIcon('important_announcement_icon');?></div>
         <div class="newAnnouncementTitle"><?php echo $page_Lang['you_have_a_new_announcement'][$dataUserPageLanguage];?></div>
         <div class="showAnnouncement showingAnnounce"><?php echo $Dot->Dot_SelectedMenuIcon('show_announcement');?></div>
    </div>
    <div class="announceDetails" style="display:none;border:3px solid <?php echo $anColor;?>">
          <div class="announceTime" style="color:<?php echo $anColor;?>" title="<?php echo $theAnnounceTime;?>"></div>
          <div class="announcet"><?php echo $anTitle;?></div>
          <div class="announcei"><?php echo strip_unsafe(styleAnnouncetext(congract($anText)));?></div>
          <div class="announceFooter">
              <div class="announceiSaw waves-effect waves-light isaw" data-type="sawa" id="<?php echo $anID;?>" style="background-color:<?php echo $anColor;?>;">Got it</div>
          </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$("body").on("click",".isaw", function(){
   var type = 'sawa';
   var id = $(this).attr("id");
   var data = 'f='+type+'&saw='+id;
   $.ajax({
		type: "POST",
        data: data,
        url: requestUrl + 'requests/activity',
		cache: false,
		success: function(html) {
			$(".announcement_container").fadeOut(500);
			 setTimeout(function() {
				 $(".announcement_container").remove();
			 }, 501); 
		}
	  });
});
});
</script>
<?php }}?>