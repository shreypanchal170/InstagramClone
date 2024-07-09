<div class="page_title bold"><?php echo $page_Lang['point_settings'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper"> 
   <div class="global_box_container_w bgc"> 
       <!--S-->
          <!---->
             <div class="general_settings_header_title"><?php echo $page_Lang['pro_system_status'][$dataUserPageLanguage];?></div>
             <div class="row-box-container" id="newmaxpoints">
                 <div class="withdrawal_note" style="box-shadow:none !important;font-weight:400 !important;"><?php echo $page_Lang['point_system_note_for_close'][$dataUserPageLanguage];?></div>
                     <span class="setting-box">
                       <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="point_system_status" class="gstf" name="point_system_status" <?php echo $pointSystemStatus == '1' ? "checked='checked'":"";   echo $pointSystemStatus == '0' ? "value='1'":"value='0'";?>><label for="point_system_status"></label></div></span>
                       <span class="setSettingBoxText"><?php echo $page_Lang['point_system_s'][$dataUserPageLanguage];?></span>
                       <span class="setSettingBoxInfoNote"><?php echo $page_Lang['on_off_ponint_system_info'][$dataUserPageLanguage];?></span>
                     </span>  
                     <!---->
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['how_much_point_equal_to_one_dolar'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="hmpetod" value="<?php echo $pointEqualDollar;?>"></div>
                       </span>
                     <!---->
                     <!---->
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['the_maximum_number_of_points_user_can_get_per_day'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="tmnopucgpd" value="<?php echo $maxPointDaily;?>"></div>
                       </span>
                     <!----> 
                     <!----> 
                       <div class="setting-box">
                           <div class="column-set_input_box">
                               <div class="saveTheSettings btn waves-effect waves-light blue save_point_maxs"  data-type="pointSystemMax"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                           </div>
                       </div>
                       <!---->
             </div>
          <!---->
          <!---->
             <div class="general_settings_header_title"><?php echo $page_Lang['points_giving_features'][$dataUserPageLanguage];?></div>
             <div class="row-box-container"> 
                  <!--SP-->
                     <span class="setting-box">
                       <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="point_like_system_status" class="gstf" name="point_like_system_status" <?php echo $pointLikeStatus == '1' ? "checked='checked'":"";   echo $pointLikeStatus == '0' ? "value='1'":"value='0'";?>><label for="point_like_system_status"></label></div></span>
                       <span class="setSettingBoxText"><?php echo $page_Lang['add_point_from_like_status'][$dataUserPageLanguage];?></span>
                       <span class="setSettingBoxInfoNote"><?php echo $page_Lang['point_like_system'][$dataUserPageLanguage];?></span>
                     </span> 
                     <!---->
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['how_many_point_when_they_like_a_post'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="how_many_point_one_like" value="<?php echo $pointLike;?>"></div>
                       </span>
                    <!---->
                  <!--FP-->
                  <!--SP-->
                     <span class="setting-box">
                       <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="point_comment_status" class="gstf" name="point_comment_status" <?php echo $pointCommentStatus == '1' ? "checked='checked'":"";   echo $pointCommentStatus == '0' ? "value='1'":"value='0'";?>><label for="point_comment_status"></label></div></span>
                       <span class="setSettingBoxText"><?php echo $page_Lang['add_point_from_comment_status'][$dataUserPageLanguage];?></span>
                       <span class="setSettingBoxInfoNote"><?php echo $page_Lang['comment_point_system'][$dataUserPageLanguage];?></span>
                     </span> 
                     <!---->
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['add_point_from_comment_status_title'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="how_many_point_one_comment" value="<?php echo $pointComment;?>"></div>
                       </span>
                    <!---->
                  <!--FP-->  
                  <!--SP-->
                     <span class="setting-box">
                       <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="point_post_status" class="gstf" name="point_post_status" <?php echo $pointCommentStatus == '1' ? "checked='checked'":"";   echo $pointPostStatus == '0' ? "value='1'":"value='0'";?>><label for="point_post_status"></label></div></span>
                       <span class="setSettingBoxText"><?php echo $page_Lang['add_point_from_created_post_status'][$dataUserPageLanguage];?></span>
                       <span class="setSettingBoxInfoNote"><?php echo $page_Lang['post_point_system'][$dataUserPageLanguage];?></span>
                     </span> 
                     <!---->
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['add_point_from_post_status_title'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="how_many_point_one_post" value="<?php echo $pointPost;?>"></div>
                       </span>
                    <!---->
                  <!--FP-->
                  <!--SP-->
                     <span class="setting-box">
                       <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="point_strs" class="gstf" name="point_strs" <?php echo $pointStoriesStatus == '1' ? "checked='checked'":"";   echo $pointStoriesStatus == '0' ? "value='1'":"value='0'";?>><label for="point_strs"></label></div></span>
                       <span class="setSettingBoxText"><?php echo $page_Lang['add_point_when_created_stories'][$dataUserPageLanguage];?></span>
                       <span class="setSettingBoxInfoNote"><?php echo $page_Lang['ponint_stories_status'][$dataUserPageLanguage];?></span>
                     </span> 
                     <!---->
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['post_stories_system'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="how_many_point_one_storie" value="<?php echo $pointStories;?>"></div>
                       </span>
                    <!---->
                  <!--FP-->
                  <!--SP-->
                     <span class="setting-box">
                       <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="point_votes" class="gstf" name="point_votes" <?php echo $pointVoteStatus == '1' ? "checked='checked'":"";   echo $pointVoteStatus == '0' ? "value='1'":"value='0'";?>><label for="point_votes"></label></div></span>
                       <span class="setSettingBoxText"><?php echo $page_Lang['add_a_point_when_voted_post'][$dataUserPageLanguage];?></span>
                       <span class="setSettingBoxInfoNote"><?php echo $page_Lang['point_vote_status'][$dataUserPageLanguage];?></span>
                     </span> 
                     <!---->
                       <span class="setting-box"> 
                           <span class="setSettinginputTitle"><?php echo $page_Lang['post_vote_system_title'][$dataUserPageLanguage];?></span>  
                           <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="how_many_point_one_vote" value="<?php echo $pointVote;?>"></div>
                       </span>
                    <!---->
                  <!--FP-->
                  <!----> 
                   <div class="setting-box">
                       <div class="column-set_input_box">
                           <div class="saveTheSettings btn waves-effect waves-light blue savePointSystemPoints"  data-type="pointSystemPoint"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                       </div>
                   </div>
                   <!---->
             </div>
          <!---->
       <!--F-->
   </div>
    
</div> 
 