<div class="poStListmEnUBox">
    <div class="drawer peepr-drawer-container open">
        <div class="peepr-drawer">
             <div class="peepr-body">
                  <div class="indash_blog">
                       <div class="userProfileRightHeader"><?php echo $page_Lang['profile'][$dataUserPageLanguage];?> <div class="closeProfileRight"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div></div>
                       <div class="not_new_not">
                             <div class="user_profile_right_cover" style="background-image:url(<?php echo $userProfileDataUserCover;?>);"></div>
                             <div class="xSlty_profile">
                                  <div class="profile_avatar_image_profile_user_profile">
                                      <div id="user_profile_avatar"><div class="profile_avatar_image_container_user_profile" style="background-image: url(<?php echo $userProfileDataUserAvatar;?>); "></div></div>
                                  </div>
                                  <div class="pUsrNm"><h1 class="AC5d8 notranslate" title="<?php echo $userProfileUserFullName;?>"><?php echo $userProfileUserFullName;?></h1><?php echo $userBadge;?></div>
                                  <div class="pUsrLTxt"><?php echo htmlentities($userProfileWordRight);?></div>
                                  <div class="pUsrFlpsM">
                                      <div class="pUPsms"><a href="<?php echo $base_url.'profile/'.$userProfileUserUserName;?>"><div class="puTp"><?php echo $userProfileCalculateTheUserPost;?></div><div class="putpx"><?php echo $page_Lang['user_posts'][$dataUserPageLanguage];?></div></a></div>
                                      <div class="pUPsms"><a href="<?php echo $base_url.'profile/followers/'.$userProfileUserUserName;?>"><div class="puTp"><?php echo $userProfileCalculateTheFollowers;?></div><div class="putpx"><?php echo $page_Lang['user_followers'][$dataUserPageLanguage];?></div></a></div>
                                      <div class="pUPsms"><a href="<?php echo $base_url.'profile/friends/'.$userProfileUserUserName;?>"><div class="puTp"><?php echo $userProfileCalculateTheFriends;?></div><div class="putpx"><?php echo $page_Lang['user_friends'][$dataUserPageLanguage];?></div></a></div>
                                  </div>
                                  <!---->
                                  <div class="profileDetailsContainerGlobal">
                                     <!--ssssss-->
                                      <div class="life_info_form">
                                         <h1 class="info_title"><?php echo $page_Lang['profile_information'][$dataUserPageLanguage];?></h1>
                                         <div class="info_form_items" id="urel">
                                             <!--Item STARTED-->
                                             <div class="info_item_box"> 
                                                <div class="info_item_answer globalSelectBox">
                                                  <span class="input-field col s12">
                                                   <select class="selectTheOption" data-type="update_user_verify" data-user="<?php echo $userProfileID;?>">            
                                                       <option value="1" <?php echo $userProfileVerified == '1' ? "selected='selected'":""; ?>><?php echo $page_Lang['verify_this_user'][$dataUserPageLanguage];?></option>
                                                       <option value="0" <?php echo $userProfileVerified == '0' ? "selected='selected'":""; ?>><?php echo $page_Lang['un_verify_this_user'][$dataUserPageLanguage];?></option> 
                                                    </select>
                                                    </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             </div> 
                                         <div class="info_form_items" id="urel">
                                             <!--Item STARTED-->
                                             <div class="info_item_box"> 
                                                <div class="info_item_answer globalSelectBox">
                                                  <span class="input-field col s12">
                                                   <select class="selectTheOption" data-type="update_user_email_verify" data-user="<?php echo $userProfileID;?>">            
                                                       <option value="1" <?php echo $userProfileVerifiedEmail == '1' ? "selected='selected'":""; ?>><?php echo $page_Lang['verify_email'][$dataUserPageLanguage];?></option>
                                                       <option value="0" <?php echo $userProfileVerifiedEmail == NULL ? "selected='selected'":""; ?>><?php echo $page_Lang['un_verify_email'][$dataUserPageLanguage];?></option> 
                                                    </select>
                                                    </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             </div>   
                                         <h1 class="info_title"><?php echo $page_Lang['profile_information'][$dataUserPageLanguage];?></h1>
                                         <div class="info_form_items">
                                             <div class="business_scholl_university">
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['full_name'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="user_full_name" placeholder="<?php echo $page_Lang['full_name'][$dataUserPageLanguage];?>" value="<?php echo $userProfileUserFullName;?>"></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['username'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="user_profile_name" value="<?php echo $userProfileUserUserName;?>"></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['website_address'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="user_profile_website_address" placeholder="<?php echo $page_Lang['website_address'][$dataUserPageLanguage];?>" value="<?php echo $userProfileWebsite;?>"></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['biography'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><textarea class="column_textarea chng" id="user_profile_biography" placeholder="<?php echo $page_Lang['biography'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; resize: none; height: 86px;"><?php echo $userProfileBio;?></textarea></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['loved_word'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><textarea class="column_textarea chng" id="user_profile_liked_word" placeholder="<?php echo $page_Lang['loved_word'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; resize: none; height: 86px;"><?php echo $userProfileWordRight;?></textarea></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['email'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="user_pemail" placeholder="<?php echo $page_Lang['email'][$dataUserPageLanguage];?>" value="<?php echo $userProfileUserEmail;?>"></div>
                                             </div>
                                              <!----> 
                                               <div class="setting-box" id="psaving">
                                                   <div class="column-set_input_box">
                                                       <div class="saveTheSettings btn waves-effect waves-light blue save_profile_details"  data-type="user_profile_details" data-id = '<?php echo $userProfileID;?>'><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                                                   </div>
                                               </div>
                                               <!---->   
                                         </div>
                                         <h1 class="info_title"><?php echo $page_Lang['personal_information'][$dataUserPageLanguage];?></h1>
                                         <div class="info_form_items" id="urel">
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['relationship'][$dataUserPageLanguage];?></span>
                                                <div class="info_item_answer globalSelectBox">
                                                  <span class="input-field col s12">
                                                   <select class="selectTheOption" data-type="update_user_relationship" data-user="<?php echo $userProfileID;?>">            
                                                       <option value="relationship_status_single" <?php echo $userRealationShipStatus == 'relationship_status_single' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_single'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_in_relationship" <?php echo $userRealationShipStatus == 'relationship_in_relationship' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_in_relationship'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_engaged" <?php echo $userRealationShipStatus == 'relationship_status_engaged' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_engaged'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_married" <?php echo $userRealationShipStatus == 'relationship_status_married' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_married'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_civil_union" <?php echo $userRealationShipStatus == 'relationship_status_civil_union' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_civil_union'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_open" <?php echo $userRealationShipStatus == 'relationship_status_open' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_open'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_complicated" <?php echo $userRealationShipStatus == 'relationship_status_complicated' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_complicated'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_separated" <?php echo $userRealationShipStatus == 'relationship_status_separated' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_separated'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_divorced" <?php echo $userRealationShipStatus == 'relationship_status_divorced' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_divorced'][$dataUserPageLanguage];?></option>
                                                       <option value="relationship_status_widoved" <?php echo $userRealationShipStatus == 'relationship_status_widoved' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_widoved'][$dataUserPageLanguage];?></option>
                                                       <option value="unspecified" <?php echo $userRealationShipStatus == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>    
                                                    </select>
                                                    </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['sexuality'][$dataUserPageLanguage];?></span>
                                                <div class="info_item_answer globalSelectBox">
												 <span class="input-field col s12">
                                                     <select class="selectTheOption" data-type="update_user_sexuality" data-user="<?php echo $userProfileID;?>">
                                                       <option value="unspecified" <?php echo $userProfileUserSexuality == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                       <option value="bisexual" <?php echo $userProfileUserSexuality == 'bisexual' ? "selected='selected'":""; ?>><?php echo $page_Lang['bisexual'][$dataUserPageLanguage];?></option>
                                                       <option value="gay" <?php echo $userProfileUserSexuality == 'gay' ? "selected='selected'":""; ?>><?php echo $page_Lang['gay'][$dataUserPageLanguage];?></option>
                                                       <option value="open_minded" <?php echo $userProfileUserSexuality == 'open_minded' ? "selected='selected'":""; ?>><?php echo $page_Lang['open_minded'][$dataUserPageLanguage];?></option>   
                                                       <option value="heterosexual" <?php echo $userProfileUserSexuality == 'heterosexual' ? "selected='selected'":""; ?>><?php echo $page_Lang['heterosexual'][$dataUserPageLanguage];?></option>   
                                                     </select>
                                                 </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['gender'][$dataUserPageLanguage];?></span>
                                                <div class="info_item_answer globalSelectBox">
												 <span class="input-field col s12">
                                                     <select class="selectTheOption" data-type="update_user_gender" data-user="<?php echo $userProfileID;?>">
                                                       <option value="male" <?php echo $userProfileGender == 'male' ? "selected='selected'":""; ?>><?php echo $page_Lang['male'][$dataUserPageLanguage];?></option>
                                                       <option value="female" <?php echo $userProfileGender == 'female' ? "selected='selected'":""; ?>><?php echo $page_Lang['female'][$dataUserPageLanguage];?></option>
                                                       <option value="0" <?php echo $userProfileGender == '0' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>    
                                                    </select>
                                                 </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['height'][$dataUserPageLanguage];?></span>
                                                <div class="info_item_answer globalSelectBox">
												   <span class="input-field col s12">
                                                       <select class="selectTheOption" data-type="update_user_height" data-user="<?php echo $userProfileID;?>">
															<?php  for($y=139;$y<=220;$y++){ ?>      
                                                            <option value='<?php echo $y;?>'  <?php echo $userProfileUserHeight == ''.$y.'' ? "selected='selected'":""; ?>><?php echo $y;?> cm</option>     
                                                            <?php }?> 
                                                        </select>
                                                   </span>
                                                </div>  
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['weight'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
												    <span class="input-field col s12">
                                                       <select class="selectTheOption" data-type="update_user_weight" data-user="<?php echo $userProfileID;?>">
															<?php 	for($y=39;$y<=150;$y++){     ?> 
                                                               <option value='<?php echo $y;?>'  <?php echo $userProfileUserWeight == ''.$y.'' ? "selected='selected'":""; ?>><?php echo $y;?> kg</option>    
                                                            <?php }  ?> 
                                                        </select>
                                                   </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['life_style'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
                                                     <span class="input-field col s12">
                                                           <select class="selectTheOption" data-type="update_user_life_style" data-user="<?php echo $userProfileID;?>">
                                                                <option value="unspecified" <?php echo $userProfileUserLifeSyle == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                                <option value="myself" <?php echo $userProfileUserLifeSyle == 'myself' ? "selected='selected'":""; ?>><?php echo $page_Lang['myself'][$dataUserPageLanguage];?></option>
                                                                <option value="with_my_family" <?php echo $userProfileUserLifeSyle == 'with_my_family' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_family'][$dataUserPageLanguage];?></option>
                                                                <option value="student_residence" <?php echo $userProfileUserLifeSyle == 'student_residence' ? "selected='selected'":""; ?>><?php echo $page_Lang['student_residence'][$dataUserPageLanguage];?></option>   
                                                                <option value="with_my_darling" <?php echo $userProfileUserLifeSyle == 'with_my_darling' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_darling'][$dataUserPageLanguage];?></option>
                                                                <option value="with_my_roommate" <?php echo $userProfileUserLifeSyle == 'with_my_roommate' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_roommate'][$dataUserPageLanguage];?></option>   
                                                            </select>
                                                       </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['children'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
												     <span class="input-field col s12">
                                                         <select class="selectTheOption" data-type="update_user_children" data-user="<?php echo $userProfileID;?>">
                                                          <option value="unspecified" <?php echo $userProfileUserChildren == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                          <option value="has_grown" <?php echo $userProfileUserChildren == 'has_grown' ? "selected='selected'":""; ?>><?php echo $page_Lang['has_grown'][$dataUserPageLanguage];?></option>
                                                          <option value="already_have" <?php echo $userProfileUserChildren == 'already_have' ? "selected='selected'":""; ?>><?php echo $page_Lang['already_have'][$dataUserPageLanguage];?></option>
                                                          <option value="no_never" <?php echo $userProfileUserChildren == 'no_never' ? "selected='selected'":""; ?>><?php echo $page_Lang['no_never'][$dataUserPageLanguage];?></option>   
                                                          <option value="one_day" <?php echo $userProfileUserChildren == 'one_day' ? "selected='selected'":""; ?>><?php echo $page_Lang['one_day'][$dataUserPageLanguage];?></option> 
                                                        </select>
                                                     </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['smoke_habit'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
												     <span class="input-field col s12">
                                                         <select class="selectTheOption" data-type="update_user_smoke_habit" data-user="<?php echo $userProfileID;?>">
                                                          <option value="unspecified" <?php echo $userProfileSmoking == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                          <option value="i_smoke_a_lot" <?php echo $userProfileSmoking == 'i_smoke_a_lot' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_smoke_a_lot'][$dataUserPageLanguage];?></option>
                                                          <option value="i_hate_smoking" <?php echo $userProfileSmoking == 'i_hate_smoking' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_hate_smoking'][$dataUserPageLanguage];?></option>
                                                          <option value="i_do_not_like" <?php echo $userProfileSmoking == 'i_do_not_like' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_do_not_like'][$dataUserPageLanguage];?></option>   
                                                          <option value="i_am_a_social_drinker" <?php echo $userProfileSmoking == 'i_am_a_social_drinker' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_am_a_social_drinker'][$dataUserPageLanguage];?></option> 
                                                          <option value="i_smoke_occasionally" <?php echo $userProfileSmoking == 'i_smoke_occasionally' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_smoke_occasionally'][$dataUserPageLanguage];?></option> 
                                                        </select>
                                                     </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['drinking_habit'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
												     <span class="input-field col s12">
                                                         <select class="selectTheOption" data-type="update_user_drinking_habit" data-user="<?php echo $userProfileID;?>">
                                                          <option value="unspecified" <?php echo $userProfileUserDrinking == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                          <option value="i_drink_socially" <?php echo $userProfileUserDrinking == 'i_drink_socially' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_drink_socially'][$dataUserPageLanguage];?></option>
                                                          <option value="i_do_not_drink" <?php echo $userProfileUserDrinking == 'i_do_not_drink' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_do_not_drink'][$dataUserPageLanguage];?></option>
                                                          <option value="i_am_against_drink" <?php echo $userProfileUserDrinking == 'i_am_against_drink' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_am_against_drink'][$dataUserPageLanguage];?></option>   
                                                          <option value="i_drink_alot" <?php echo $userProfileUserDrinking == 'i_drink_alot' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_drink_alot'][$dataUserPageLanguage];?></option>  
                                                        </select>
                                                     </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['body_type'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
												     <span class="input-field col s12">
                                                           <select class="selectTheOption" data-type="update_user_body_type" data-user="<?php echo $userProfileID;?>">
                                                              <option value="unspecified" <?php echo $userProfileBodyType == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                              <option value="athletic" <?php echo $userProfileBodyType == 'athletic' ? "selected='selected'":""; ?>><?php echo $page_Lang['athletic'][$dataUserPageLanguage];?></option>
                                                              <option value="average_body" <?php echo $userProfileBodyType == 'average_body' ? "selected='selected'":""; ?>><?php echo $page_Lang['average_body'][$dataUserPageLanguage];?></option>
                                                              <option value="chubby" <?php echo $userProfileBodyType == 'chubby' ? "selected='selected'":""; ?>><?php echo $page_Lang['chubby'][$dataUserPageLanguage];?></option>   
                                                              <option value="muscle" <?php echo $userProfileBodyType == 'muscle' ? "selected='selected'":""; ?>><?php echo $page_Lang['muscle'][$dataUserPageLanguage];?></option> 
                                                              <option value="big_and_built" <?php echo $userProfileBodyType == 'big_and_built' ? "selected='selected'":""; ?>><?php echo $page_Lang['big_and_built'][$dataUserPageLanguage];?></option> 
                                                              <option value="rickety" <?php echo $userProfileBodyType == 'rickety' ? "selected='selected'":""; ?>><?php echo $page_Lang['rickety'][$dataUserPageLanguage];?></option> 
                                                            </select>
                                                     </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['hair_colour'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
												     <span class="input-field col s12">
                                                           <select class="selectTheOption" data-type="update_user_hair_colour" data-user="<?php echo $userProfileID;?>">
                                                              <option value="unspecified" <?php echo $userProfileUserHair == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                              <option value="bald" <?php echo $userProfileUserHair == 'bald' ? "selected='selected'":""; ?>><?php echo $page_Lang['bald'][$dataUserPageLanguage];?></option>
                                                              <option value="black_hair" <?php echo $userProfileUserHair == 'black_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['black_hair'][$dataUserPageLanguage];?></option>
                                                              <option value="blonde_hair" <?php echo $userProfileUserHair == 'blonde_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['blonde_hair'][$dataUserPageLanguage];?></option>   
                                                              <option value="brown_hair" <?php echo $userProfileUserHair == 'brown_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['brown_hair'][$dataUserPageLanguage];?></option> 
                                                              <option value="painted_hair" <?php echo $userProfileUserHair == 'painted_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['painted_hair'][$dataUserPageLanguage];?></option> 
                                                              <option value="red_hair" <?php echo $userProfileUserHair == 'red_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['red_hair'][$dataUserPageLanguage];?></option>
                                                              <option value="been_shaved" <?php echo $userProfileUserHair == 'been_shaved' ? "selected='selected'":""; ?>><?php echo $page_Lang['been_shaved'][$dataUserPageLanguage];?></option>
                                                              <option value="white_hair" <?php echo $userProfileUserHair == 'white_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['white_hair'][$dataUserPageLanguage];?></option>  
                                                            </select>
                                                     </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                             <!--Item STARTED-->
                                             <div class="info_item_box">
                                                <span class="info_item_title valign-wrapper"><?php echo $page_Lang['eye_color'][$dataUserPageLanguage];?>:</span>
                                                <div class="info_item_answer globalSelectBox">
												     <span class="input-field col s12">
                                                           <select class="selectTheOption" data-type="update_user_eye_color" data-user="<?php echo $userProfileID;?>">
                                                              <option value="unspecified" <?php echo $userProfileUserEyeColor == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
                                                              <option value="black_eye" <?php echo $userProfileUserEyeColor == 'black_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['black_eye'][$dataUserPageLanguage];?></option>
                                                              <option value="blue_eye" <?php echo $userProfileUserEyeColor == 'blue_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['blue_eye'][$dataUserPageLanguage];?></option>
                                                              <option value="brown_eye" <?php echo $userProfileUserEyeColor == 'brown_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['brown_eye'][$dataUserPageLanguage];?></option>   
                                                              <option value="green_eye" <?php echo $userProfileUserEyeColor == 'green_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['green_eye'][$dataUserPageLanguage];?></option> 
                                                              <option value="hazel_eye" <?php echo $userProfileUserEyeColor == 'hazel_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['hazel_eye'][$dataUserPageLanguage];?></option> 
                                                              <option value="other_eye_color" <?php echo $userProfileUserEyeColor == 'other_eye_color' ? "selected='selected'":""; ?>><?php echo $page_Lang['other_eye_color'][$dataUserPageLanguage];?></option> 
                                                            </select>
                                                     </span>
                                                </div>
                                             </div>
                                             <!--Item FINISHED-->
                                         </div>
                                         <h1 class="info_title"><?php echo $page_Lang['business_and_education'][$dataUserPageLanguage];?></h1>
                                         <div class="info_form_items">
                                             <div class="business_scholl_university">
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['job_title'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="user_job" placeholder="<?php echo $page_Lang['job_title'][$dataUserPageLanguage];?>" value="<?php echo $userProfileJobTitle;?>"></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['company_name'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="campany_name" placeholder="<?php echo $page_Lang['company_name'][$dataUserPageLanguage];?>" value="<?php echo $userProfileCampanyWorkingName;?>"></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['scholl_or_university'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="scholl_university" placeholder="<?php echo $page_Lang['scholl_or_university'][$dataUserPageLanguage];?>" value="<?php echo $userProfileUserUniversity;?>"></div>
                                             </div>
                                         </div>
                                         <!----> 
                                               <div class="setting-box" id="psaving">
                                                   <div class="column-set_input_box">
                                                       <div class="saveTheSettings btn waves-effect waves-light blue save_profile_business_education"  data-type="user_business_and_education" data-id = '<?php echo $userProfileID;?>'><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                                                   </div>
                                               </div>
                                               <!---->
                                     </div>
                                     <h1 class="info_title"><?php echo $page_Lang['business_and_education'][$dataUserPageLanguage];?></h1>
                                     <div class="info_form_items"> 
                                                 <div class="info_item_box _item_answer_profile_edit"><?php echo $page_Lang['password'][$dataUserPageLanguage];?></div>
                                                 <div class="info_item_box _item_answer_profile_edit"><input type="text" class="column_inputField" id="user_new_password" placeholder="<?php echo $page_Lang['password'][$dataUserPageLanguage];?>"></div> 
                                         </div>
                                         <!----> 
                                               <div class="setting-box" id="psaving">
                                                   <div class="column-set_input_box">
                                                       <div class="saveTheSettings btn waves-effect waves-light blue save_new_profile_password"  data-type="user_new_password" data-id = '<?php echo $userProfileID;?>'><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                                                   </div>
                                               </div>
                                               <!---->
                                     </div>
                                     <!--ssssss-->
                                  </div>
                                  <!----> 
                                  <!---->
                                  <div class="profileDetailsContainerGlobal">
                                      <h1 class="info_title"><?php echo $page_Lang['areas_of_interest'][$dataUserPageLanguage];?></h1>
                                      <div class="info_form_items">
										<?php  
                                           $GetAllUserInterstedItems = $Dot->Dot_GetUserInterestedList($userProfileID);
                                           if($GetAllUserInterstedItems){
                                                foreach($GetAllUserInterstedItems as $GetUserInterest){
                                                    $InterestedIDdata = $GetUserInterest['user_interested_id'];
                                                    $InterestedUserID_fk = $GetUserInterest['interested_user_id_fk'];
                                                    $UserInterestedTypeValue = $GetUserInterest['interested_type_value'];
                                                    $UserInterestedType = $GetUserInterest['user_interested_type'];
                                                    $typesArray = array(
                                                       'type_eating' => "icons_tree eatingicon",
                                                       'type_music' => "icons_tree musicicon",
                                                       'type_film_tv' => "icons_tree filmicon",
                                                       'type_travel' => "icons_tree travelicon",
                                                       'type_expertise' => "icons_tree businessicon"
                                                    );
                                                    echo '<span class="intr js-intr js-intr-ids-'.$InterestedIDdata.'" id="'.$UserInterestedTypeValue.'"><span class="icons_tree '.$typesArray[$UserInterestedType].'"></span><span class="intr-txt">'.$page_Lang[$UserInterestedTypeValue][$dataUserPageLanguage].'</span></span>'; 
                                                }
                                            } else {
                                            echo '<div class="noResultf">'.$page_Lang['no_interested_inserted'][$dataUserPageLanguage].'</div>'; 
                                            }
                                         ?>
                                     </div>
                                  </div>
                                  <!---->
                             </div>
                             <!---->
                       </div>
                  </div>
             </div>
        </div>
    </div>
</div>