<!--<div class="backgroundAudioUploadContainer">
     <div class="closeSoundUpload"></div>
     <div class="post-modal-Wrap">
          <div class="post-audio-middle">
             <div class="animationgooey">
              <div class="gooey"></div>
              </div>
              <div class="bgAudioUploadForm">
                   <div class="bgaudioUploadFormHeader"><?php echo $page_Lang['change_profile_background_audio'][$dataUserPageLanguage];?></div>
                   <div class="onofaudiocontainer">
                        <div class="on_off_audio">
                            <span>
                                   <input type="radio" name="bag" id="default"  data-type="bg_aoc" value="0" <?php echo $dataprofileBackgroundMusicType == '0' ? "checked='checked'":""; ?>>
                                   <label for="default" id="default"><?php echo $page_Lang['music_inactive'][$dataUserPageLanguage];?></label>
                              </span> 
                              <span>
                                   <input type="radio" name="bag" id="back"  data-type="bg_aoc" value="1" <?php echo $dataprofileBackgroundMusicType == '1' ? "checked='checked'":""; ?>>
                                   <label for="back" id="back"><?php echo $page_Lang['music_active'][$dataUserPageLanguage];?></label>
                              </span>
                          </div>
                   </div>
                   <div class="bgaudiunote" <?php echo $displaya;?>><?php echo $page_Lang['background_music_note'][$dataUserPageLanguage];?></div>
                   <div class="changeBgAudioButtonForms">
                        <form id="audForm" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
                              <label class="chng-bg" for="changeAud">  
                                 <input type="file" name="bgmusic" id="changeAud" data-id="bgmusic" class="chose-image-btn" />
                                 <div class="upladNewBgAuDio"><?php echo $page_Lang['upload_background_music'][$dataUserPageLanguage];?></div> 
                             </label>
                         </form> 
                   </div>
              </div>
          </div>
     </div>
</div>-->
<div class="fixedBackground_two"></div>
<div class="app-customization-container">
    <div class="app-customization-wrapper">
          <div class="post-modal-middle">
                  <div class="customize_profile_header"><?php echo $page_Lang['change_profile_background_audio'][$dataUserPageLanguage];?><div class="closeDesign"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
                  <div class="customization_container">
                        <!---->
                        <div class="changeProfileBackgroundImageSelectWrapper">
                           <div class="on_off_audio">
                            <span>
                                   <input type="radio" name="bag" id="default"  data-type="bg_aoc" value="0" <?php echo $dataprofileBackgroundMusicType == '0' ? "checked='checked'":""; ?>>
                                   <label for="default" id="default"><?php echo $page_Lang['music_inactive'][$dataUserPageLanguage];?></label>
                              </span> 
                              <span>
                                   <input type="radio" name="bag" id="back"  data-type="bg_aoc" value="1" <?php echo $dataprofileBackgroundMusicType == '1' ? "checked='checked'":""; ?>>
                                   <label for="back" id="back"><?php echo $page_Lang['music_active'][$dataUserPageLanguage];?></label>
                              </span>
                          </div>
                      </div>
                      <div class="changeBackgroundImageButton">  
                          <div class="bgaudiunote" <?php echo $displaya;?>><?php echo $page_Lang['background_music_note'][$dataUserPageLanguage];?></div>
                           <div class="changeBgAudioButtonForms">
                                <form id="audForm" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
                                      <label class="chng-bg" for="changeAud">  
                                         <input type="file" name="bgmusic" id="changeAud" data-id="bgmusic" class="chose-image-btn" />
                                         <div class="upladNewBgAuDio"><?php echo $page_Lang['upload_background_music'][$dataUserPageLanguage];?></div> 
                                     </label>
                                 </form> 
                           </div>
                      </div>
                        <!---->
                  </div>
                  <!---->
                  <div class="post_box_footer">
                      <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3 savebgi">Cancel</div></div>
                      <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue savebgi">save</div></div>
                   </div>
                  <!---->
          </div>
    </div>
</div>