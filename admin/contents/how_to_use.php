<div class="page_title bold"><?php echo $page_Lang['how_to_main_page'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
    <div class="global_box_container_w bgc">
         <div class="general_settings_header_title"><?php echo $page_Lang['add__new_how_to_use_section'][$dataUserPageLanguage];?></div>
         <div class="row-box-container">
              <!---->
            <div class="setting-box-global">
                 <span class="input-field col s12">
                    <select class="selecDefaultLang" id="howtocategory" name="howtocategory">
                      <option value="" disabled selected><?php echo $page_Lang['choose_h_category'][$dataUserPageLanguage];?></option>
                      <option value="main_page">Main Page</option>
                      <option value="profile_page">Profile Page</option>
                      <option value="event_page">Event Page</option>
                      <option value="market_page">Market Page</option>
                      <option value="market_profile_page">Market Profile Page</option>
                    </select>
                    <label><?php echo $page_Lang['chose_how_to_category'][$dataUserPageLanguage];?></label>
                  </span>
            </div>
            <!----> 
            <!---->
            <span class="setting-box"> 
                     <div class="input-field col s6">
                      <input  placeholder="<?php echo $page_Lang['write_a_title_for_user'][$dataUserPageLanguage];?>" id="howtotitle" type="text" class="validate">
                      <label for="new_key"><?php echo $page_Lang['write_a_title_for_user'][$dataUserPageLanguage];?></label>
                    </div>
               </span>
            <!---->
            <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['write_a_description_about_title'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea_howto chng" id="howtodescription" placeholder="<?php echo $page_Lang['type_a_description_about_title'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; height: 86px;"><?php echo $dot_description;?></textarea></div>
               </span>
               <!----> 
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_howto"  data-type="createahowto"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!----> 
         </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".save_howto", function(){
		  var  type = 'createahowto';
	      var cat = $("#howtocategory").val();
		  var howtotitle = $("#howtotitle").val();
		  var howtodes = $("#howtodescription").val();
		  var data = 'f='+type+'&howtotitle='+howtotitle+'&howtodesc='+howtodes+'&category='+cat; 
		 $.ajax({
			   type: 'POST',
			   url:  requestUrl + 'admin/requests/request',
			   data: data, 
			   beforeSend: function(){ },
			   success: function(html){
					  
			   }
		   }); 
		 
		 
	});
});
</script>