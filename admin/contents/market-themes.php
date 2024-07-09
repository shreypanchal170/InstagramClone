<div class="page_title bold"><?php echo $page_Lang['all_market_place_themes'][$dataUserPageLanguage];?></div>

<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['add_edit_market_theme_categories'][$dataUserPageLanguage];?></div> 
        <div class="row-box-container">
              <!---->
              <form name="myForm" id="myeform" action="" method="POST" enctype="multipart/form-datam">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['category_key_'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng categor" id="category_key" placeholder="<?php echo $page_Lang['write_category_key'][$dataUserPageLanguage];?>"></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['example_category_key'][$dataUserPageLanguage];?></span>
               </span>
               <!----> 
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
              <!---->
        </div>
        <div class="general_settings_header_title_second"><?php echo $page_Lang['add_new_market_theme'][$dataUserPageLanguage];?></div> 
        <div class="row-box-container">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['market_theme_name'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng categor" id="marketThemeName_" placeholder="<?php echo $page_Lang['write_market_theme_name'][$dataUserPageLanguage];?>"></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['market_theme_name_should_be'][$dataUserPageLanguage];?></span>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['market_theme_price'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="theemprie" placeholder="E.g. :40$"></div> 
               </span>
               <!----> 
               <!---->
               <div class="setting-box">
                   <div class="info_item_answer globalSelectBox">
                       <span class="input-field col s12">
                       <select class="selectTheColor" id="marketThemeType" name="marketThemeType"> 
                          <option value="" disabled selected>Select Theme Type</option>           
                              <option value="free">free</option> 
                             <option value="pro">pro</option> 
                        </select>
                        </span>
                    </div>
               </div>
               <!---->
               <!---->
               <div class="setting-box">
                   <div class="info_item_answer globalSelectBox">
                       <span class="input-field col s12">
                       <select class="selectTheColor" id="marketThemeCategory" name="marketThemeCategory"> 
                          <option value="" disabled selected><?php echo $page_Lang['choose_market_theme_category'][$dataUserPageLanguage];?></option>           
                              <?php 
							$mtcategory = $Dot->Dot_MarketPlaceThemeCategories();
							if($mtcategory){
								foreach($mtcategory as $mtc){
									$marketCategoryID = $mtc['market_theme_category_id'];
									$marketCategoryKey = $mtc['market_theme_category_key']; 
								?>
								 <option value="<?php echo $marketCategoryKey;?>"><?php echo $page_Lang[$marketCategoryKey][$dataUserPageLanguage];?></option> 
								<?php }
							} 
						 ?> 
                        </select>
                        </span>
                    </div>
               </div>
               <!---->
              
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="btn waves-effect waves-light blue save_newmtm"  data-type="addNewmTheme"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!---->   
        </div>
        <div class="general_settings_header_title_second"><?php echo $page_Lang['edit_market_themes'][$dataUserPageLanguage];?></div>
        <div class="row-box-container">
            <!---->
             <span class="setting-box"> 
                  <?php 
                     if($allMarketThemes){
                          echo '<table><thead id="thead"><tr>
                                            <th>Theme ID</th>
                                            <th>Theme Name</th> 
                                            <th>Theme Status</th>
                                            <th>Theme Type</th>
											<th>Theme Price</th>
											<th>Action</th>
                                        </tr>
                                      </thead>
                                      ';
                          foreach($allMarketThemes as $mt){ 
                                 $marketThemeID = $mt['market_theme_id'];
								 $marketThemeName = $mt['market_theme_name'];
								 $marketThemeStatus = $mt['market_theme_status'];
								 $marketThemeType = $mt['market_theme_type'];
								 $marketThemePrice = $mt['market_theme_price'];?>
                               <tr id="font_<?php echo $marketThemeID;?>">
                                          <td><?php echo $marketThemeID;?></td>
                                          <td><input type="text" class="column_inputField chng" id="them_name_<?php echo $marketThemeID;?>" value="<?php echo $marketThemeName;?>"></td> 
                                          <td>
										  <span class="ckbx-style-8 ckbx-medium">
                                                      <input type="checkbox" id="adminActivated<?php echo $marketThemeID;?>" data-id="<?php echo $marketThemeID;?>" class="gst" data-type="mtMode" name="ckbx-style-8-1"  <?php echo $marketThemeStatus == '1' ? "checked='checked'":""; echo $marketThemeStatus == '0' ? "value='1'":"value='0'"; ?>> 
                                                      <label for="adminActivated<?php echo $marketThemeID;?>"></label>
                                           </span>
										  </td>
                                          <td>
                                          <div class="info_item_answer globalSelectBox">
                                             <span class="input-field col s12">
                                             <select class="selectTheColor" id="marketThemeType<?php echo $marketThemeID;?>" name="marketThemeType"> 
                                                <option value="" disabled selected>Select Theme Type</option>           
                                                    <option <?php echo $marketThemeType == 'free' ? "selected='selected'":""; echo $marketThemeType == 'free' ? "value='free'":"value='free'"; ?>>free</option> 
                                                    <option <?php echo $marketThemeType == 'pro' ? "selected='selected'":""; echo $marketThemeType == 'pro' ? "value='pro'":"value='pro'"; ?>>pro</option> 
                                              </select>
                                              </span>
                                          </div>
                                          </td>
										  <td><input type="text" class="column_inputField chng" id="theme_pric_<?php echo $marketThemeID;?>" value="<?php echo $marketThemePrice;?>"></td>
                                          <td><div class="waves-effect waves-light btn red delete_mar_them" id="<?php echo $marketThemeID;?>"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div> - <div class="waves-effect waves-light btn blue edit_market_t" id="<?php echo $marketThemeID;?>"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div></td>
                                        </tr> 
                          <?php }
                          echo ' <tbody></table>';
                     }
                  ?> 

             </span>
             <!---->
        </div> 
         
   </div>
</div> 
<script type="text/javascript">
  $(document).ready(function(){
     // Add new Event Categories
	 $("form#myeform").on("submit", function(e) { 
      e.preventDefault();  
	   var key = $("#category_key").val();
	   var type = 'newMarketThemeCategory'; 
       var form = new FormData();   
       form.append("f", type); 
	   form.append("market_key", key); 
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
	   $("body").on("click",".delete_market_categorie", function(){
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