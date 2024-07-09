<div class="page_title bold"><?php echo $page_Lang['manage_feelings'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
          <div class="general_settings_header_title"><?php echo $page_Lang['add_new_feeling'][$dataUserPageLanguage];?></div>
        
       <div class="row-box-container" id="new_fontimport"> 
       <form name="myForm" id="myeform" action="" method="POST" enctype="multipart/form-datam">
               <!---->
                <div class="setting-box-global">
                     <span class="input-field col s12">
                        <select class="selecDefaultFeeling">
                          <option value="" disabled selected><?php echo $page_Lang['choose_feeling_category'][$dataUserPageLanguage];?></option>
                          <?php 
                                $feelingCategories = $Dot->Dot_FeelingCategories();
                                if($feelingCategories){
                                    foreach($feelingCategories as $feelCat){
                                        $feelingName = $feelCat['f_c_name']; 
                                    ?>
                                     <option value="<?php echo $feelingName;?>"><?php echo $feelingName;?></option> 
                                    <?php }
                                } 
                             ?>
                        </select>
                        <label><?php echo $page_Lang['select_feeling_category'][$dataUserPageLanguage];?></label>
                      </span>
                </div>
                <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['feeling_key'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng categor" id="category_key" placeholder="<?php echo $page_Lang['write_feeling_key'][$dataUserPageLanguage];?>"></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['example_feeling_key'][$dataUserPageLanguage];?></span>
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
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['recommended_feeling_size'][$dataUserPageLanguage];?></span>
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
       <div class="general_settings_header_title_second"><?php echo $page_Lang['edit_feeling'][$dataUserPageLanguage];?></div>
               <!---->
               <div class="row-box-container">
                        <!---->
                       <span class="setting-box nclr"> 
                            <?php 
                               if($allFeelingList){
                                    echo '<table><thead><tr>
                                                      <th>Feeling ID</th>
                                                      <th>Feeling Name</th> 
                                                      <th>Feeling Key</th>
													  <th>Feeling Icon</th>
													  <th>Feeling Category</th>
													  <th>Action</th>
                                                  </tr>
                                                </thead>
                                                ';
                                    foreach($allFeelingList as $feel){ 
                                          $feelID = $feel['f_id'];
										  $feelKey = $feel['f_key'];
										  $feelIcon = $feel['f_img'];
										  $feelingCategory = $feel['f_name'];
                                        echo '<tr id="category_'.$feelID.'">
                                                    <td>'.$feelID.'</td>
                                                    <td>'.$page_Lang[$feelKey][$dataUserPageLanguage].'</td> 
													<td class="theky">'.$feelKey.'</td> 
													<td class="thecicon"><img src="'.$base_url.'uploads/feelings/'.$feelingCategory.'/'.$feelIcon.'" style="width:30px;height:30px;"></td>
													<td class="thecicon">'.$feelingCategory.'</td>
                                                    <td><div class="waves-effect waves-light btn red delete_feeling" id="'.$feelID.'" data-lang="'.$Dot->Dot_LanguagesID($feelKey).'" data-type="deletefeeling">'.$page_Lang['delete'][$dataUserPageLanguage].'</div></td>
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
	   var f_category = $(".selecDefaultFeeling").val();
	   var type = 'newFeelingCategory';
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
	   form.append("feeling_category",f_category); 
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
	   $("body").on("click",".delete_feeling", function(){
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