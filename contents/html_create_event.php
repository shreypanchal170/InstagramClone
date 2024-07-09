<div class="poStListmEnUBox">
  <div class="drawer peepr-drawer-container open">
    <div class="peepr-drawer">
      <div class="peepr-body"> 
      
        <div class="indash_blog">
          <div class="notificationBoxHeader"><?php echo $page_Lang['create_event'][$dataUserPageLanguage];?>
            <div class="closeNews"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div>
          </div>
          <div class="singlePostHere">
               <!---->
               <div class="newp_itemBox ev_ctgry" data-type="eventCategories">
                   <div class="event_type"><img class="selected_event" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAH1SURBVEiJ3ZO/a1NRFMe/39vYkhREB0UtCLWh6FrsokOlkzg4BuTVJ0L1NpWiFF6K4vCkQ39Bhg6lxIJoQNBJ/4Imo6MWBFHoUlFa1ApWkeTd42DB90JuucFOOds55/s9n3vfPQ9ol6CLqFh8njaZ2qDQnDGiDpEiilhTPzork5O5X/8FEREulJ6OARICONpE8pVA8SB25rXWNducjr0g3SeySwBCAN0WSRrA8G90Dp4/O/GsUnlsmomUDTBXKl8GmG8orwNSBfC9oX4xfezjqG2WFULDG4kcvB3c9PoK+uoFpk0PiJfJPq61DAExEMveBtpbJCkAEPj+jiKnG/T9tlEpW0PAEcW/bxYZs9XYj+roYPKI2y1DprS3auuF4WqKauN+fDkJVluG2GLh4ZNeMRuPAA7FytsimLF57G/SJOaXyz6MehMHCPCJoi4Vxrz3Np/THw8As6XyOSWsInF7vqCJdJD3N/fyOn8uJczH9QJ5MKVHQievK4TAqX+ZbPUe7pq2q5PhfBMhP0Ckaxf5LpfLRa7e9gnn7ZpZKWdVxAmCGSJaCbT/al8hYRiqzPHsOoCTu6WfqNf6Creuf3bxO23XgZ7+IzEAAGSoUqddvM6Qe6NXNgGsxUpf6qJe7yuEpEQRhwCOg3LHwAzcHfe+uULaJ/4AYKuQrwcRwN8AAAAASUVORK5CYII="></div><div class="event_name hvr-underline-from-center"><?php echo $page_Lang['select_event_type'][$dataUserPageLanguage];?></div>
               </div>
               <!---->
               <!---->
               <div class="newp_itemBox chooseEventCover">
                   <span class="input_title ev_ctgry" data-type="evetCovers"><?php echo $page_Lang['select_cover_photo_for_your_event'][$dataUserPageLanguage];?></span> 
               </div> 
               <!---->
               <!---->
               <div class="event_selected">
                    <div class="selected_event_cover" style="background-image:url(<?php echo $base_url;?>uploads/event__type_covers/barbeque.jpg);">
                         <div class="removeThiseventCover"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M39.92188,31.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l50.34375,50.34375l-50.34375,50.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l50.34375,-50.34375l50.34375,50.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-50.34375,-50.34375l50.34375,-50.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-50.34375,50.34375l-50.34375,-50.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
                    </div> 
               </div> 
               <!---->
               <!---->
               <div class="newp_itemBox">
                   <span class="input_title"><?php echo $page_Lang['event_name'][$dataUserPageLanguage];?></span>
                   <div class="set_the_input"><input type="text" class="column_input_in" id="event_name" placeholder="<?php echo $page_Lang['write_event_name'][$dataUserPageLanguage];?>"></div>
               </div> 
               <!---->
              <!---->
               <div class="newp_itemBox">
                   <span class="input_title"><?php echo $page_Lang['event_location'][$dataUserPageLanguage];?></span>
                   <div class="set_the_input"><input type="text" class="column_input_in" id="event_location" placeholder="<?php echo $page_Lang['write_event_location'][$dataUserPageLanguage];?>"></div>
               </div> 
               <!---->
               <!---->
               <div class="newp_itemBox row">
                   <div class="input-field col s6"> 
                      <span class="input_title"><?php echo $page_Lang['event_starting_date'][$dataUserPageLanguage];?></span>
                      <div class="set_the_input"><input type="text" class="column_input_in datepicker" id="event_startday"></div>
                   </div>
                   <div class="input-field col s6"> 
                      <span class="input_title"><?php echo $page_Lang['event_starting_time'][$dataUserPageLanguage];?></span>
                      <div class="set_the_input"><input type="text" class="column_input_in timepicker" id="event_starttime"></div>
                   </div>
               </div> 
               <!---->
               <!---->
               <div class="newp_itemBox row">
                   <div class="input-field col s6"> 
                      <span class="input_title"><?php echo $page_Lang['event_ending_date'][$dataUserPageLanguage];?></span>
                      <div class="set_the_input"><input type="text" class="column_input_in datepicker" id="event_endday"></div>
                   </div>
                   <div class="input-field col s6"> 
                      <span class="input_title"><?php echo $page_Lang['event_ending_time'][$dataUserPageLanguage];?></span>
                      <div class="set_the_input"><input type="text" class="column_input_in timepicker" id="event_endtime"></div>
                   </div>
               </div> 
               <!----> 
               <!---->
               <div class="newp_itemBox">
                   <span class="input_title"><?php echo $page_Lang['event_description'][$dataUserPageLanguage];?></span>
                   <div class="set_the_input"><textarea class="event_column_textarea" id="event_desciption" placeholder="<?php echo $page_Lang['write_someting_about_event'][$dataUserPageLanguage];?>" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;"></textarea></div>
               </div> 
               <!---->
               <!---->
               <div class="newp_itemBox"> 
                   <div class="set_the_input set_padding-left">
                   <label>
                    <input type="checkbox" class="ccev" id="share_on_wall" checked="checked" value="1"/>
                    <span><?php echo $page_Lang['share_this_event_from_profile'][$dataUserPageLanguage];?></span>
                  </label>
                   </div>
               </div> 
               <!---->
               <!---->
               <div class="newp_itemBox"> 
                   <div class="set_the_input set_padding-left">
                   <label>
                    <input type="checkbox" class="ccev" id="guest_post"  checked="checked" value="1"/>
                    <span><?php echo $page_Lang['guest_can_share_something'][$dataUserPageLanguage];?></span>
                  </label>
                   </div>
               </div> 
               <!---->
               <!---->
               <div class="newp_itemBox"> 
                   <div class="set_the_input set_padding-left">
                   <label>
                    <input type="checkbox" class="ccev" id="guest_invite"  checked="checked" value="1"/>
                    <span><?php echo $page_Lang['peoples_can_invite_friends'][$dataUserPageLanguage];?></span>
                  </label>
                   </div>
               </div> 
               <!---->
               <input type="hidden" id="myeventtype" value="" />
               <input type="hidden" id="myeventcover" value="" />
               <!---->
               <div class="newp_itemBox"> 
                   <div class="set_the_input right_float"><div class="btn waves-effect waves-light blue createNew_e" data-type="createEvent"><?php echo $page_Lang['create_my_event'][$dataUserPageLanguage];?></div></div>
               </div> 
               <!---->
          </div>
        </div>
      </div>
    </div>
  </div>
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