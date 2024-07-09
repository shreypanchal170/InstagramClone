<div class="singlePostHere">
  <!---->
  <div class="newp_itemBox ev_ctgry" data-type="eventCategories">
    <div class="event_type"><img class="selected_event" src="<?php echo $Dot->Dot_GetEventIconSrcFromID($thisEventType);?>"></div>
    <div
      class="event_name hvr-underline-from-center"><?php echo $page_Lang['change_event_type'][$dataUserPageLanguage];?></div>
</div>
<!---->  
<!---->
<div class="newp_itemBox">
  <span class="input_title"><?php echo $page_Lang['event_name'][$dataUserPageLanguage];?></span>
  <div class="set_the_input"><input type="text" class="column_input_in" id="event_name" placeholder="<?php echo $page_Lang['event_name'][$dataUserPageLanguage];?>" value="<?php echo stripslashes($thisEventTitle);?>"></div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <span class="input_title"><?php echo $page_Lang['event_location'][$dataUserPageLanguage];?></span>
  <div class="set_the_input"><input type="text" class="column_input_in" id="event_location" placeholder="<?php echo $page_Lang['write_event_location'][$dataUserPageLanguage];?>" value="<?php echo $thisEventLocation;?>"></div>
</div>
<!---->
<!---->
<div class="newp_itemBox row">
  <div class="input-field col s6">
    <span class="input_title"><?php echo $page_Lang['event_starting_date'][$dataUserPageLanguage];?></span>
    <div class="set_the_input"><input type="text" class="column_input_in datepicker" id="event_startday" value="<?php echo $thisEventStartMonthYearDay;?>"></div>
  </div>
  <div class="input-field col s6">
    <span class="input_title"><?php echo $page_Lang['event_starting_time'][$dataUserPageLanguage];?></span>
    <div class="set_the_input"><input type="text" class="column_input_in timepicker" id="event_starttime" value="<?php echo $thisEventStartTime;?>"></div>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox row">
  <div class="input-field col s6">
    <span class="input_title"><?php echo $page_Lang['event_ending_date'][$dataUserPageLanguage];?></span>
    <div class="set_the_input"><input type="text" class="column_input_in datepicker" id="event_endday" value="<?php echo $thisEventEndMonthYearDay;?>"></div>
  </div>
  <div class="input-field col s6">
    <span class="input_title"><?php echo $page_Lang['event_ending_time'][$dataUserPageLanguage];?></span>
    <div class="set_the_input"><input type="text" class="column_input_in timepicker" id="event_endtime" value="<?php echo $thisEventEndTime;?>"></div>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <span class="input_title"><?php echo $page_Lang['event_description'][$dataUserPageLanguage];?></span>
  <div class="set_the_input"><textarea class="event_column_textarea" id="event_desciption" placeholder="<?php echo $page_Lang['write_someting_about_event'][$dataUserPageLanguage];?>" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;"><?php echo stripslashes($thisEventDescription);?></textarea></div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
      <input type="checkbox" class="ccev" id="share_on_wall" <?php echo $thisEventUserCanShareEvent == '1' ? "checked='checked'":""; echo $thisEventUserCanShareEvent == '1' ? "value='1'":"value='0'";?>/>
      <span><?php echo $page_Lang['people_can_share_event'][$dataUserPageLanguage];?></span>
    </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
                    <input type="checkbox" class="ccev" id="can_create_post" <?php echo $thisEventUserCanShareEvent == '1' ? "checked='checked'":""; echo $thisEventUserCanShareEvent == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['guest_can_share_something'][$dataUserPageLanguage];?></span>
                  </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="guest_invite" <?php echo $thisEventUserCanInvite == '1' ? "checked='checked'":""; echo $thisEventUserCanInvite == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['peoples_can_invite_friends'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_share_text" <?php echo $thisEventUserCanShareText == '1' ? "checked='checked'":""; echo $thisEventUserCanShareText == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_text_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_image" <?php echo $thisEventUserCanShareImage == '1' ? "checked='checked'":""; echo $thisEventUserCanShareImage == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_image_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_video" <?php echo $thisEventUserCanShareVideo == '1' ? "checked='checked'":""; echo $thisEventUserCanShareVideo == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_video_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_audio" <?php echo $thisEventUserCanShareAudio == '1' ? "checked='checked'":""; echo $thisEventUserCanShareAudio == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_audio_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_filter_image" <?php echo $thisEventUserCanShareFilterImage == '1' ? "checked='checked'":""; echo $thisEventUserCanShareFilterImage == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_filtered_image_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_location" <?php echo $thisEventUserCanShareLocation == '1' ? "checked='checked'":""; echo $thisEventUserCanShareLocation == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_location_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_gif" <?php echo $thisEventUserCanShareGiphy == '1' ? "checked='checked'":""; echo $thisEventUserCanShareGiphy == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_gif_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_link" <?php echo $thisEventUserCanShareLink == '1' ? "checked='checked'":""; echo $thisEventUserCanShareLink == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_link_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_watermark" <?php echo $thisEventUserCanShareWatermark == '1' ? "checked='checked'":""; echo $thisEventUserCanShareWatermark == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_watermark_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<!---->
<div class="newp_itemBox">
  <div class="set_the_input set_padding-left">
    <label>
         <input type="checkbox" class="ccev" id="can_create_benchmark" <?php echo $thisEventUserCanShareBenchMark == '1' ? "checked='checked'":""; echo $thisEventUserCanShareBenchMark == '1' ? "value='1'":"value='0'";?>/>
                    <span><?php echo $page_Lang['people_can_share_benchmark_on_event_page'][$dataUserPageLanguage];?></span>
   </label>
  </div>
</div>
<!---->
<input type="hidden" id="myeventtype" value="<?php echo $thisEventType;?>" /> 
<!---->
<div class="newp_itemBox">
  <div class="set_the_input right_float">
    <div class="btn waves-effect waves-light blue update_e" data-type="updateEvent"><?php echo $page_Lang['finish_editing'][$dataUserPageLanguage];?></div>
  </div>
</div>
<!---->
<script type="text/javascript">
$(document).ready(function(){
$(".datepicker").livequery(function() { 
    $(this).datepicker({
	    format: 'yyyy-mm-dd', 
		i18n: { 
		   done: '<?php echo $page_Lang['t_finished'][$dataUserPageLanguage];?>'
		} 
	});    
  }); 
  $(".timepicker").livequery(function() { 
    $(this).timepicker({ 
	  twelveHour: false
		 
		});  
  }); 
 
});
</script>