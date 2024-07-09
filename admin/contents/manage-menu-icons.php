<div class="page_title bold"><?php echo $page_Lang['manage_menu_icons'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title_second"><?php echo $page_Lang['manage_menu_icons'][$dataUserPageLanguage];?></div>
       <!---->
       <div class="row-box-container" id="new_fontimport"> 
            <!---->
             <span class="setting-box"> 
               <span class="setSettingBoxInfoNoteBold"><?php echo $page_Lang['manage_menu_position'][$dataUserPageLanguage];?></span>
               <span class="setSettingBox"> 
               <!---->
                   <div class="PositionBoxMenu" id="pb1" data-val="1">
                         <?php echo $menuTypePosition == '1' ? "<div class='selectedPosition'  id='ps1'></div>":""; ?>
                         <div class="postPositionBoxHeader"></div>
                         
                              <div class="leftSidebarMenuBoxC blueColorize"></div>
                         <div class="postPositionBoxContainerMenu">
                              <div class="postPositionBox_items_left"> 
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem"></div>
                              </div>
                              <div class="postPositionBox_items_right">
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem"></div>
                              </div> 
                         </div> 
                   </div>
               <!---->
               <!---->
                   <div class="PositionBoxMenu" id="pb0" data-val="0">
                      <?php echo $menuTypePosition == '0' ? "<div class='selectedPosition'  id='ps0'></div>":""; ?>
                         <div class="postPositionBoxHeader"></div>
                         <div class="postPositionBoxContainer">
                              <div class="postPositionBox_items_left"> 
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem"></div>
                              </div>
                              <div class="postPositionBox_items_right">
                                   <div class="postPositionBoxitem"></div>
                                   <div class="postPositionBoxitem blueColorize"></div> 
                              </div> 
                         </div>
                   </div>
               <!---->
               </span> 
                <span class="setSettingBoxInfoNote"><?php echo $page_Lang['post_buttons_position_note'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
            <!---->
            <div class="iconDataWrapper">
                <!---->
                <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['keyword_for_icon'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng kkey" id="i_key" placeholder="<?php echo $page_Lang['keyword_for_icon_info'][$dataUserPageLanguage];?>"></div>
               </span>
                <!---->
                <!---->
                <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['write_or_paste_new_icon_svg_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea chng" id="i_svg"  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;"></textarea></div>
               </span>
                <!---->
                <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_svg" data-type="svNewSvg"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
            </div>
            <!---->
            <div class="iconDataWrapper">
              <?php 
			     $ali = $Dot->Dot_IconGroupList();
			     if($ali){
			         foreach($ali as $iconData){ 
						   $iconNameData = $iconData['icon_name'];  
						   $myi = $Dot->Dot_SVGIconsList($iconNameData);
						   echo '<div class="i_groupContainer">';
						   foreach($myi as $my) { 
							    $myIconID = $my['icon_id'];
							    $theIcon = $Dot->Dot_IconG($myIconID);
								$theIconCode = $theIcon['icon_code'];
								$theIconName = $theIcon['icon_name'];
								$theIconType = $theIcon['icon_type'];
								$theIconID = $theIcon['icon_id'];
								$iconActive = '';
								$ched ='';
								if($theIconType == 1){
								    $iconActive = 'active_icon_svg';
									$ched= 'checked=""';
								}
						   ?> 
                                   <label>
                                       <input name="<?php echo $theIconName;?>" type="radio" class="iconcUs" data-id="<?php echo $theIconID;?>" data-name="<?php echo $theIconName;?>"  <?php echo $ched;?> />
                                       <div class="c_iconEdit icon_wr <?php echo $theIconName;?> <?php echo $iconActive;?>" id="iu_<?php echo $theIconID;?>" style="width: auto !important; height: auto !important;"><?php echo $theIconCode;?></div>
                                   </label>
							<?php   }
							echo '
							<div class="c_iconEdit icon_wr waves-effect waves-light btn blue drpdwn" data-id="'.$iconNameData.'"  data-target="'.$iconNameData.'">'.$page_Lang['edit_me'][$dataUserPageLanguage].'</div>
							<div id="'.$iconNameData.'" class="dropdown-content">
							    <div class="dropd_wrapper">
								    <div class="post_menu_item hvr-underline-from-center add_new_icon" data-type="addNewIcon" data-id="'.$iconNameData.'"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('add_complete').'</span> '.$page_Lang['ad_new_icon'][$dataUserPageLanguage].'</div>
								    <div class="post_menu_item hvr-underline-from-center editIcon" data-id="'.$iconNameData.'"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('edit_icon').'</span> '.$page_Lang['edit_this_icon'][$dataUserPageLanguage].'</div>
									<div class="post_menu_item hvr-underline-from-center delete_this_icon"><span class="postMenuicon">'.$Dot->Dot_SelectedMenuIcon('delete_icon').'</span> '.$page_Lang['delete_this_icon'][$dataUserPageLanguage].'</div>
								</div>
							</div>
							';
							echo '<div class="cici"></div>';
							echo '</div>';
						    /*echo '
							   <div class="iconData">
							        <div class="icon_wr">'.$iconCodeData.'</div>
									<div class="icon_sl">
									     <label>
											<input name="'.$iconNameData.'" type="radio" class="iconUs" data-id="'.$iconIDData.'" data-name="'.$iconNameData.'" '.$ched.' />
											 <span>'.$iconNameData.'</span> 
										  </label>
									</div>
							   </div>
							';*/
					 }
				  }
			  ?> 
              
              </div>
       </div>
        
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $('.drpdwn').dropdown();
   $("body").on("click",".editIcon",function(){
	    var type = 'editIcon';
		var icon = $(this).attr("data-id");
		var data = 'f='+type+'&this='+icon;
		$.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: data,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				$("body").append(response);
			}
		 }); 
	});
	$("body").on("click",".add_new_icon",function(){
	    var type = 'addNewIcon';
		var icon = $(this).attr("data-id");
		var data = 'f='+type+'&this='+icon;
		$.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: data,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				$("body").append(response);
			}
		 }); 
	});
	$("body").on("click",".save_icon_settings", function(){
	      var type = 'saveIconUpdadte';
		  var iconID = $(this).attr("data-id");
		  var iconCode = $("#iconCode_"+iconID).val();
		  var data = 'f='+type+'&iconID='+iconID+'&iconc='+encodeURIComponent(iconCode);
		  $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: data,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				 
			}
		 });
    });
	$("body").on("click",".save_icon_new", function(){
	      var type = 'saveNewIcon';
		  var iconID = $(this).attr("data-id");
		  var iconCode = $("#i_"+iconID).val();
		  var data = 'f='+type+'&iconID='+iconID+'&iconc='+encodeURIComponent(iconCode);
		  $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: data,
			cache: false,
			beforeSend: function() { 
			       $("#new_fontimport").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); 
			 },
			success: function(response) {  
			     $(".preloadCom").remove();   
				 location.reload();
			}
		 });
    });
	// Change Active Icon
	$("body").on("click", ".iconcUs", function(){
	    var type = 'change_active_icon';
		var ID = $(this).attr("data-id");
		var name = $(this).attr("data-name");
		var data = 'f='+type+'&iconID='+ID+'&iconName='+name;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#new_fontimport").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();   
				$("."+name).removeClass("active_icon_svg");
			    $("#iu_"+ID).addClass("active_icon_svg");
			}
		 });
	});
	$("body").on("click",".save_svg", function(){
	      var type = 'svNewSvg';
		  var iconkey = $("#i_key").val();
		  var iconCode = $("#i_svg").val();
		  var data = 'f='+type+'&key='+iconkey+'&iconc='+encodeURIComponent(iconCode);
		  $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: data,
			cache: false,
			beforeSend: function() { 
			    $("#new_fontimport").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
			 },
			success: function(response) {  
			     $(".preloadCom").remove();   
				 location.reload();
			}
		 });
    });
});
</script>