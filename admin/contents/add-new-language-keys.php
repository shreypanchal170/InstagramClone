<div class="page_title bold"><?php echo $page_Lang['add_new_language_and_keys'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['add_new_language'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_lang">
               <span id="actionNewLang" class="elaction"></span>
               <span class="setting-box"> 
                     <div class="input-field col s6">
                      <input placeholder="<?php echo $page_Lang['add_new_lang_here'][$dataUserPageLanguage];?>"  id="new_lang" type="text" class="validate">
                      <label for="new_lang"><?php echo $page_Lang['add_new_lang_attantion'][$dataUserPageLanguage];?></label> 
                    </div>
                    <span class="setSettingBoxInfoNote"><?php echo $page_Lang['this_may_take_a_five_minutes'][$dataUserPageLanguage];?></span>
               </span>
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="btn waves-effect waves-light blue save_newLang" data-type="saveNewLang"><?php echo $page_Lang['add_language'][$dataUserPageLanguage];?> </div>
                   </div>
               </div>
               <!----> 
        </div>
        <div class="general_settings_header_title_second"><?php echo $page_Lang['add_key'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_key">
            <span id="actionNewKey" class="elaction"></span>
                <span class="setting-box"> 
                     <div class="input-field col s6">
                      <input  placeholder="<?php echo $page_Lang['add_new_key_here'][$dataUserPageLanguage];?>" id="new_key" type="text" class="validate kkey">
                      <label for="new_key"><?php echo $page_Lang['add_new_key_attantion'][$dataUserPageLanguage];?></label>
                    </div>
               </span>
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="btn waves-effect waves-light blue save_newKey" data-type="saveNewKey"><?php echo $page_Lang['add_key'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
        </div>
        <div class="general_settings_header_title_second"><?php echo $page_Lang['all_languages'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_del_lang">
              <span id="actionDelLang" class="elaction"></span>
             <span class="setting-box fixWith nclr">
             <table class="striped highlight">
                    <thead>
                      <tr>
                          <th>Language Name</th>
                          <th>Action</th> 
                      </tr>
                    </thead> 
                    <tbody>
                    <?php
					     $langs = $Dot->Dot_Langs();
						 if($langs){
							  foreach($langs as $column){
								  $lang_name = $column['Field'];
								  $flag = array(
								   $lang_name => $base_url.'uploads/flags/'.$lang_name.'.png'
								   );
								   echo '
								      <tr id="'.$lang_name.'">
										<td>'.$lang_name.'</td>
										<td><div class="btn waves-effect waves-light red deletelanguage" data-type="deleteLang" data-lang="'.$lang_name.'">Delete</div></td> 
									  </tr>';
							  }
						 } 
					 ?> 
                       
                    </tbody>
           </table>

             </span>
             
        </div>
    </div>
 </div>