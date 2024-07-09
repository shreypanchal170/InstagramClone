<div class="poStListmEnUBox">
    <div class="drawer peepr-drawer-container open">
        <div class="peepr-drawer">
             <div class="peepr-body">
                  <div class="indash_blog">
                       <div class="userProfileRightHeader"><?php echo $page_Lang['edit_announcement'][$dataUserPageLanguage];?> <div class="closeProfileRight"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div></div>
                       <div class="not_new_not" style="padding: 20px 20px 20px 20px;">
                              <!--S-->
                              <!---->
                                <div class="setting-box-global">
                                     <span class="input-field col s12">
                                        <select class="selecDefaultLang" id="anEditType">
                                          <option value="" disabled><?php echo $page_Lang['select_announcement_type'][$dataUserPageLanguage];?></option>
                                          <option value="success" <?php echo $editAnnouncementType == 'success' ? "selected":""; ?>><?php echo $page_Lang['announce_success'][$dataUserPageLanguage];?></option>
                                          <option value="warning" <?php echo $editAnnouncementType == 'warning' ? "selected":""; ?>><?php echo $page_Lang['announce_warning'][$dataUserPageLanguage];?></option>
                                          <option value="danger" <?php echo $editAnnouncementType == 'danger' ? "selected":""; ?>><?php echo $page_Lang['announce_danger'][$dataUserPageLanguage];?></option>
                                          <option value="info" <?php echo $editAnnouncementType == 'info' ? "selected":""; ?>><?php echo $page_Lang['announce_info'][$dataUserPageLanguage];?></option>
                                        </select>
                                        <label><?php echo $page_Lang['select_announcement_type'][$dataUserPageLanguage];?></label>
                                      </span>
                                </div>
                                <!----> 
                               <!---->
                               <span class="setting-box"> 
                                   <span class="setSettinginputTitle"><?php echo $page_Lang['new_announce_title'][$dataUserPageLanguage];?></span>  
                                   <div class="column_set_input_box"><input type="text" class="column_inputField chng thevalue" id="announceEditTitle" placeholder="<?php echo $page_Lang['new_announce_title_placeholder'][$dataUserPageLanguage];?>" value="<?php echo $editAnnouncementTitle;?>"></div>
                               </span>
                               <!----> 
                               <!---->
                               <span class="setting-box"> 
                                   <span class="setSettinginputTitle"><?php echo $page_Lang['write_a_announcement_here'][$dataUserPageLanguage];?></span>  
                                   <div class="column_set_input_box"><textarea class="column_textarea chng thevalue" id="announcementEdittext" placeholder="<?php echo $page_Lang['write_a_announcement_here_placeholder'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; resize: none; height: 86px;"><?php echo $editAnnouncementText;?></textarea></div>
                               </span>
                               <!----> 
                               <!---->
                               <span class="setting-box"> 
                                   <span class="setSettinginputTitle"><?php echo $page_Lang['some_html_magic'][$dataUserPageLanguage];?></span>  
                                   <span class="column_set_input_box" style="display: inline-block;">
                                        <p>*<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>* => <strong><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></strong></p>
                                        <p>_<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>_ => <i><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></i></p>
                                        <p>~<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>~ => <strike><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></strike></p>
                                        <p>!<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>! => <mark><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></mark></p>
                                        <p>|<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>| => <code><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></code></p>
                                        <p>:<?php echo $page_Lang['magic_creating_a_new_paragraph'][$dataUserPageLanguage];?>: => <?php echo $page_Lang['magic_creating_a_new_paragraph'][$dataUserPageLanguage];?></p>
                                   </span>
                               </span>
                               <!----> 
                               <!----> 
                               <div class="setting-box">
                                   <div class="column-set_input_box">
                                       <div class="saveTheSettings btn waves-effect waves-light blue save_announcementedits" id="<?php echo $editAnnouncementID;?>"  data-type="shareEditedAnnouncement"><?php echo $page_Lang['finish_editing'][$dataUserPageLanguage];?></div>
                                   </div>
                               </div>
                               <!----> 
                              <!--F-->
							  
                       </div>
                  </div>
             </div>
        </div>
    </div> 
</div>