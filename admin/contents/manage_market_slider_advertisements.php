<div class="page_title bold"><?php echo $page_Lang['manage_marketplace_slider_advertisements'][$dataUserPageLanguage];?></div>

<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['add_new_market_ads'][$dataUserPageLanguage];?></div>
        <div class="row-box-container">
        <form name="myForm" id="mywSlider" action="" method="POST" enctype="multipart/form-datam">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['slide_advertisement_redirect_url'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" name="sliderURL" id="slider_redirect_url" placeholder="<?php echo $page_Lang['write_redirect_url_here'][$dataUserPageLanguage];?>"></div>
                   <span class="setSettingBoxInfoNote"><?php echo $page_Lang['rediret_url_description'][$dataUserPageLanguage];?></span>
               </span>
               <!----> 
               <!---->
               <span class="setting-box">
                    <!---->
                    <span class="file-field input-field">
                      <div class="btn">
                        <span><?php echo $page_Lang['select_image'][$dataUserPageLanguage];?></span>
                        <input type="file" name="sliderImage">
                    </div>
                    </span>
                    <!---->
                    <span class="setSettingBoxInfoNote"><?php echo $page_Lang['the_most_appropriatead_ads_size'][$dataUserPageLanguage];?></span>
              </span>
               <!---->
               <!---->
               <span class="setting-box"> 
                     <div class="info_item_answer globalSelectBox">
                         <span class="input-field col s12">
                         <select class="selectTheColor" id="marketCategory" name="marketCategory"> 
                            <option value="" disabled selected><?php echo $page_Lang['select_marketplace_category_for_slider'][$dataUserPageLanguage];?></option>           
                               <?php 
								   if($MarketPlaceCategories){
										foreach($MarketPlaceCategories as $mCategori){
											 $cateGoryID  = $mCategori['m_category_id'];
											 $cateGoryKey = $mCategori['m_category_key'];
											  echo '<option value="'.$cateGoryID.'">'.$page_Lang[$cateGoryKey][$dataUserPageLanguage].'</option>';
										}
								   }
								?>
                          </select>
                          </span>
                      </div>
              </span>
               <!---->
               <!---->
              <div class="setting-box">
                <div class="column-set_input_box">
                  <button class="btn waves-effect waves-light blue"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?> </button>
                </div>
              </div>
              <!----> 
         </form>       
               
        </div>
        <div class="general_settings_header_title_second"><?php echo $page_Lang['edit_slider_advertisements'][$dataUserPageLanguage];?></div>
        <!---->
       <div class="row-box-container" id="new_fontimport"> 
             <div class="edit_slider_container">
                <?php 
				         $LastAID = isset($_POST['lastIDS']) ? $_POST['lastIDS'] : ''; 
					     $AllAdsSliders = $Dot->Dot_AdvertisementsSliderDisplay($LastAID); 
						 if($AllAdsSliders){
							 foreach($AllAdsSliders as $adss){
								  $theAdsSID = $adss['ads_slider_id'];
								  $theAdsSimage = $adss['ads_slider_image'];
								  $theAdsSRedirectURL = $adss['ads_slider_redirect_url'];
								  $theAdsSCategory = $adss['ads_slider_category'];
								  $theAdsSStatus = $adss['ads_slider_status'];
				?>
							  <!--SS-->
                                 <div class="es_container" id="_<?php echo $theAdsSID;?>">
                                    <div class="es_wr">
                                        <!---->
                                        <div class="deleteadslid" id="<?php echo $theAdsSID;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><g><path d="M96,184.8c-48.9648,0 -88.8,-39.8352 -88.8,-88.8c0,-48.9648 39.8352,-88.8 88.8,-88.8c48.9648,0 88.8,39.8352 88.8,88.8c0,48.9648 -39.8352,88.8 -88.8,88.8z" fill="#cccccc"></path><path d="M96,9.6c47.64,0 86.4,38.76 86.4,86.4c0,47.64 -38.76,86.4 -86.4,86.4c-47.64,0 -86.4,-38.76 -86.4,-86.4c0,-47.64 38.76,-86.4 86.4,-86.4M96,4.8c-50.3664,0 -91.2,40.8336 -91.2,91.2c0,50.3664 40.8336,91.2 91.2,91.2c50.3664,0 91.2,-40.8336 91.2,-91.2c0,-50.3664 -40.8336,-91.2 -91.2,-91.2z" fill="#666666"></path></g><rect x="-29.78475" y="-10.00021" transform="rotate(-135) scale(4.79995,4.79995)" width="3" height="20" fill="#ffffff"></rect><rect x="-1.50021" y="18.28433" transform="rotate(-45) scale(4.79995,4.79995)" width="3" height="20" fill="#ffffff"></rect></g></g></svg></div>
                                        <!---->
                                        <div class="es_img"><img src="<?php echo $base_url;?>uploads/market_slider/<?php echo $theAdsSimage;?>" /></div>
                                        <div class="es_in">
                                              <div class="es_re truncate"><?php echo $theAdsSRedirectURL;?></div>
                                              <div class="es_cat truncate"><?php echo $page_Lang[$Dot->Dot_MarketProductPostCategory($theAdsSCategory)][$dataUserPageLanguage];?></div>
                                              <div class="es_stat ">
                                                   <span class="ckbx-style-8 ckbx-medium">
                                                      <input type="checkbox" id="adminActivated<?php echo $theAdsSID;?>" data-id="<?php echo $theAdsSID;?>" class="gst" data-type="modeSlider" name="ckbx-style-8-1"  <?php echo $theAdsSStatus == '1' ? "checked='checked'":""; echo $theAdsSStatus == '0' ? "value='1'":"value='0'"; ?>> 
                                                      <label for="adminActivated<?php echo $theAdsSID;?>"></label>
                                                   </span>
                                              </div>
                                              
                                        </div>
                                    </div>
                                 </div>
                                 <!--SF-->
				<?php } }else{echo $page_Lang['no_slider_ads_result_yet'][$dataUserPageLanguage];}?>
                 
             </div>
       </div>
       <!---->
   </div>
</div> 