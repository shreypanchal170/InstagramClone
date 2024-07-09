<div class="poStListmEnUBox">
    <div class="drawer peepr-drawer-container open">
        <div class="peepr-drawer">
             <div class="peepr-body">
                  <div class="indash_blog">
                       <div class="userProfileRightHeader"><?php echo $page_Lang['edit_this_icon'][$dataUserPageLanguage];?> <div class="closeProfileRight"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div></div>
                       <div class="not_new_not">
                             <?php 
							     $editThisIcon = $Dot->Dot_SVGIconsList($eThisIcon);
								 if($editThisIcon){
								     foreach($editThisIcon as $this_icon){
										   $ThisIconID = $this_icon['icon_id'];
									       $thisIcon = $Dot->Dot_IconG($ThisIconID);
								           $thisIconCode = $thisIcon['icon_code'];
								           $thisIconName = $thisIcon['icon_name'];
								           $thisIconType = $thisIcon['icon_type'];
								           $thisIconID = $thisIcon['icon_id'];
							  ?>
									<div class="editIconHere"><?php echo $thisIconCode;?></div>	   
                                    <div class="editIconCode"><textarea class="column_textarea chng" id="iconCode_<?php echo $thisIconID;?>" placeholder="Write Website Description" style="overflow: hidden; overflow-wrap: break-word;"><?php echo $thisIconCode;?></textarea></div> 
                                       <div class="setting-box" style="padding-left:15px;">
                                           <div class="column-set_input_box">
                                               <div class="saveTheSettings btn waves-effect waves-light blue save_icon_settings" data-id="<?php echo $thisIconID;?>"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                                           </div>
                                       </div>
							  <?php }
								 } 
							 ?>
                       </div>
                  </div>
             </div>
        </div>
    </div> 
</div>