<div class="page_title bold"><?php echo $page_Lang['manage_event_categories'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
          <div class="general_settings_header_title"><?php echo $page_Lang['add_new_event_categories'][$dataUserPageLanguage];?></div>
        
       <div class="row-box-container" id="new_fontimport"> 
       <form name="myForm" id="myeform" action="" method="POST" enctype="multipart/form-datam">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['category_key_'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng categor" id="category_key" placeholder="<?php echo $page_Lang['write_category_key'][$dataUserPageLanguage];?>"></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['example_category_key'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <span class="setting-box">
                    <!---->
                    <span class="file-field input-field">
                      <div class="btn">
                        <span><?php echo $page_Lang['select_image'][$dataUserPageLanguage];?></span>
        <input type="file" name="imageFile">
    </div>
    </span>
    <!---->
    <span class="setSettingBoxInfoNote"><?php echo $page_Lang['recommended_icon_size'][$dataUserPageLanguage];?></span>
    </span>
               <?php  
			  if($EditLangKeys){
				  echo '<span class="setting-box"> ';
				  foreach($EditLangKeys as $keyColumn){
					  $lang_name = $keyColumn['Field'];
					  //$flag = array($lang_name => $base_url.'uploads/flags/'.$lang_name.'.png'); 
					   echo '
					   <span class="setSettinginputTitle">'.$lang_name.'</span>  
                       <div class="column_set_input_box"><input type="text" class="column_inputField chng" name="'.$lang_name.'" id="'.$lang_name.'"></div>
					   ';
				  }
				  echo '</span>';
			 } 
			   ?>
               <!---->
                  <div class="setting-box">
                    <div class="column-set_input_box">
                      <button class="btn waves-effect waves-light blue"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?> </button>
                    </div>
                  </div>
                  <!---->
         </form>        
       </div>
       <!---->
       <div class="general_settings_header_title_second"><?php echo $page_Lang['edit_event_categories'][$dataUserPageLanguage];?></div>
               <!---->
               <div class="row-box-container">
                        <!---->
                       <span class="setting-box nclr"> 
                            <?php 
                               if($EventCategories){
                                    echo '<table><thead><tr>
                                                      <th>Category ID</th>
                                                      <th>Category Name</th> 
                                                      <th>Category Key</th>
													  <th>Category Icon</th>
													  <th>Action</th>
                                                  </tr>
                                                </thead>
                                                ';
                                    foreach($EventCategories as $event){ 
                                          $eventcID = $event['ev_id'];
										  $eventcKey = $event['ev_key'];
										  $eventcIcon = $event['ev_icon'];
                                        echo '<tr id="category_'.$eventcID.'">
                                                    <td>'.$eventcID.'</td>
                                                    <td>'.$page_Lang[$eventcKey][$dataUserPageLanguage].'</td> 
													<td class="theky">'.$eventcKey.'</td> 
													<td class="thecicon">'.$eventcIcon.'</td>
                                                    <td><div class="waves-effect waves-light btn red delete_event_categorie" id="'.$eventcID.'" data-lang="'.$Dot->Dot_LanguagesID($eventcKey).'" data-type="deleteeventcat">'.$page_Lang['delete'][$dataUserPageLanguage].'</div></td>
                                                  </tr> ';
                                    }
                                    echo ' <tbody></table>';
                               }
                            ?> 
        
                       </span>
                       <!---->
               </div>
               <!---->
   </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
     // Add new Event Categories
	 $("form#myeform").on("submit", function(e) { 
      e.preventDefault();  
	   var key = $("#category_key").val();
	   var type = 'newEventCategory';
	   var file=new FormData($("form#myeform")[0]); 
       var form = new FormData(); 
	   var ffile = $('input[type=file]')[0].files[0];
	   if(!$.trim(ffile).length){
	       M.toast({html: 'Select icon' , classes: 'warning'}); 
		   return false;
	   } 
       form.append("imageFile", $('input[type=file]')[0].files[0]);
       form.append("f", type); 
	   form.append("event_key", key); 
	   <?php 
	   if($EditLangKeys){ 
				  foreach($EditLangKeys as $keyColumn){
					  $lang_name = $keyColumn['Field'];
	   ?>	
	         var <?php echo $lang_name;?> = $("#<?php echo $lang_name;?>").val(); 
	   		 form.append("<?php echo $lang_name;?>", <?php echo $lang_name;?>);	  
		<?php } 
			 } 
	   ?>
	   
	  $.ajax({
			type: 'POST',
			url:  requestUrl + 'admin/requests/request',
			data: form,			 
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){},
			success: function(response){
				M.toast({html: response}); 
				$('#myeform').trigger("reset");
			} 
		 }); 
		 return false;
	   });
	   $("body").on("click",".delete_event_categorie", function(){
	       var type = $(this).attr("data-type");
		   var cateGoryID = $(this).attr("id");
		   var dataLangID = $(this).attr("data-lang");
		   var data = 'f='+type+'&category_id='+cateGoryID+'&langKey='+ dataLangID;
		   $.ajax({
				type: 'POST',
				url: requestUrl + 'admin/requests/request', 
				data: data,
				cache: false,
				beforeSend: function() { 
				       
				 },
				success: function(response) { 
				  if(response != '200'){
				     M.toast({html: response});  
				     $("#category_"+cateGoryID).fadeOut("normal", function() {  $(this).remove(); }); 
				   } 
				}
			 }); 
	   });
  });
</script>