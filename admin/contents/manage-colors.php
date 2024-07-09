<div class="page_title bold"><?php echo $page_Lang['manage_colors'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
       <div class="general_settings_header_title"><?php echo $page_Lang['add_new_color'][$dataUserPageLanguage];?></div>
       <!---->
       <div class="row-box-container" id="new_color">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['new_color_code'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="color" placeholder="<?php echo $page_Lang['add_new_color_here'][$dataUserPageLanguage];?>"></div>
               </span>
               <!---->
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="btn waves-effect waves-light blue save_newColor"  data-type="addNewColor"><?php echo $page_Lang['save_new_color'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!---->
       </div>
       <!---->
       <div class="general_settings_header_title_second"><?php echo $page_Lang['all_color_list'][$dataUserPageLanguage];?></div>
       <!---->
       <div class="row-box-container">
                <!---->
               <span class="setting-box max-size nclr"> 
                    <?php 
					   if($allColorList){
						    echo '<table><thead><tr>
											  <th>Color ID</th>
											  <th>Color Code</th> 
											  <th>Action</th>
										  </tr>
										</thead>
										';
					        foreach($allColorList as $hexColor){
								 $colorID = $hexColor['id'];
								 $colorCode  = $hexColor['colors'];
								 $colorClass = $hexColor['color_name'];
							    echo '<tr id="color_'.$colorID.'">
											<td>'.$colorID.'</td>
											<td style="background-color:#'.$colorCode.';">'.$colorCode.'</td> 
											<td><div class="waves-effect waves-light btn red deleteColor" id="'.$colorID.'">'.$page_Lang['delete'][$dataUserPageLanguage].'</div></td>
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