<div class="page_title bold"><?php echo $page_Lang['manage_fonts'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
          <div class="general_settings_header_title"><?php echo $page_Lang['google_fonts_import'][$dataUserPageLanguage];?></div>
          <!---->
       <div class="row-box-container" id="new_fontimport">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['google_imports'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea type="text" class="column_textarea chng" id="googleFontImports" placeholder="<?php echo $page_Lang['add_new_google_font_import'][$dataUserPageLanguage];?>" ><?php echo $googleFonts;?></textarea></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['add_new_font_info'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="btn waves-effect waves-light blue save_newImportFonts"  data-type="addNewFonts"><?php echo $page_Lang['import_new_font_url'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!----> 
      </div>
      <!---->
      <div class="general_settings_header_title_second"><?php echo $page_Lang['add_new_font_title'][$dataUserPageLanguage];?></div>
       <!---->
       <div class="row-box-container" id="new_fontimport"> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['write_font_name'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="font_name" placeholder="<?php echo $page_Lang['write_font_name'][$dataUserPageLanguage];?>"></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['for_example_font_name'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['add_new_font_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="full_fontcode"></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['for_example_font_code'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['write_new_font_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="font_code" ></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['for_example_font_family_code'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="btn waves-effect waves-light blue save_newFont"  data-type="addNewFont"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!---->   
       </div>
       <!---->
       <div class="general_settings_header_title_second"><?php echo $page_Lang['add_added_fonts'][$dataUserPageLanguage];?></div>
               <!---->
               <div class="row-box-container">
                        <!---->
                       <span class="setting-box"> 
                            <?php 
                               if($allFonts){
                                    echo '<table><thead><tr>
                                                      <th>Font ID</th>
                                                      <th>Font Name</th> 
                                                      <th>Font</th>
													  <th>Font Code</th>
                                                  </tr>
                                                </thead>
                                                ';
                                    foreach($allFonts as $fontC){ 
                                         $fontID = $fontC['font_id'];
                                         $fontName  = $fontC['font_name'];
                                         $fontFont = $fontC['font'];
										 $fontCode = $fontC['font_code'];
                                        echo '<tr id="font_'.$fontID.'">
                                                    <td class="nclr">'.$fontID.'</td>
                                                    <td><input type="text" class="column_inputField chng" id="font_name_'.$fontID.'" placeholder="'.$page_Lang['write_font_name'][$dataUserPageLanguage].'" value="'.$fontName.'"></td> 
													<td><input type="text" class="column_inputField chng" id="font_h'.$fontID.'" value="'.$fontFont.'"></td>
													<td><input type="text" class="column_inputField chng" id="font_code_'.$fontID.'" value="'.$fontCode.'"></td>
                                                    <td><div class="waves-effect waves-light btn red delete_font" id="'.$fontID.'">'.$page_Lang['delete'][$dataUserPageLanguage].'</div> - <div class="waves-effect waves-light btn blue edit_font" id="'.$fontID.'">'.$page_Lang['save_changes'][$dataUserPageLanguage].'</div></td>
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