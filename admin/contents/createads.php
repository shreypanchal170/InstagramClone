<div class="page_title bold">
  <?php echo $page_Lang['advertisements'][$dataUserPageLanguage];?>
</div>
<div class="global_right_wrapper">
  <div class="global_box_container_white border-radius">
    <div class="create_avertisementBox">
      <div class="create_advertisement_header"><?php echo $page_Lang['create_new_advertise'][$dataUserPageLanguage];?> <div class="icons_two createNewAds_icon crads"></div></div>
      <div class="create_ads_container">
        <div class="create_ads_box_container closedad"> 
          <!---->
          <div class="create_ads_box_div">
              <div class="writeBudget">
                  <div class="create_ads_div_in_title" id="campanyname"><?php echo $page_Lang['type_your_budget'][$dataUserPageLanguage];?></div>
                  <div class="writeyourbalance"><input type="text" class="writeadsbudget" id="yourbudget" placeholder="0.00"></div>
              </div>
          </div>
          <!---->
          <!---->
          <div class="create_ads_box_div">
            <div class="create_ads_box_div_in" style="padding-right:10px;">
              <div class="create_ads_div_in_title" id="campanyname"><?php echo $page_Lang['ads_campany_name'][$dataUserPageLanguage];?></div>
              <div class="create_ads_div_in_input"><input type="text" class="ads_input_create" id="campany_name" placeholder="<?php echo $page_Lang['write_campany_name'][$dataUserPageLanguage];?>"></div>
            </div>
            <div class="create_ads_box_div_in">
              <div class="create_ads_div_in_title" id="redirecturl"><?php echo $page_Lang['ads_website'][$dataUserPageLanguage];?></div>
              <div class="create_ads_div_in_input"><input type="text" class="ads_input_create" id="a_url" placeholder="<?php echo $page_Lang['ads_redirect_url'][$dataUserPageLanguage];?>"></div>
            </div>
          </div>
          <!---->
          <!---->
          <div class="create_ads_box_div">
            <!---->
            <div class="create_ads_box_div_in">
              <div class="create_ads_div_in_title" id="showthis__"><?php echo $page_Lang['who_can_see_this_ads'][$dataUserPageLanguage];?></div>
              <div class="create_ads_div_in_input" style="margin-top:15px;">
                <span class="genders">
                    <input type="radio" id="radio1" name="showthis" value="all" checked="">
                    <label for="radio1" class="radio_one gend"><?php echo $page_Lang['ads_everyone'][$dataUserPageLanguage];?></label>
                    <input type="radio" id="radio2" name="showthis" value="male">
                    <label for="radio2" class="radio2 gend"><?php echo $page_Lang['ads_male'][$dataUserPageLanguage];?></label>
                    <input type="radio" id="radio3" name="showthis" value="female">
                    <label for="radio3" class="radio3 gend"><?php echo $page_Lang['ads_female'][$dataUserPageLanguage];?></label>
                </span>
              </div>
            </div>
            <!---->
            <!---->
            <div class="create_ads_box_div_in">
              <div class="create_ads_div_in_title" id="ads_display_title"><?php echo $page_Lang['ads_display_area'][$dataUserPageLanguage];?></div>
              <div class="create_ads_div_in_input">
                <div class="select-dropdown">
                   <select class="big" id="ads_area_display">
                      <option value="1"><?php echo $page_Lang['ads_between_posts'][$dataUserPageLanguage];?></option>
                      <option value="2"><?php echo $page_Lang['ads_right_sidebar'][$dataUserPageLanguage];?></option> 
                    </select>
                </div>
              </div>
            </div>
            <!---->
          </div>
          <!---->
          <!---->
          <div class="create_ads_box_div">
            <!---->
            <div class="create_ads_box_div_in" style="padding-right:10px;">
              <div class="create_ads_div_in_title" id="advertisement__title"><?php echo $page_Lang['ads_ttitle'][$dataUserPageLanguage];?></div>
              <div class="create_ads_div_in_input" style="padding-top:5px;"><input type="text" class="ads_input_create" id="a_title" placeholder="<?php echo $page_Lang['ads_crete_ads_title'][$dataUserPageLanguage];?>"></div>
            </div>
            <!---->
            <!---->
            <div class="create_ads_box_div_in">
              <div class="create_ads_div_in_title" id="adsoffer__"><?php echo $page_Lang['ads_offer'][$dataUserPageLanguage];?>:</div>
              <div class="create_ads_div_in_input">
                <div class="select-dropdown">
                  <select class="big" id="ads_offer">
                      <option value="1"><?php echo $page_Lang['ads_per_click'][$dataUserPageLanguage];?> (<?php echo $adsPerClick;?>$)</option>
                      <option value="2"><?php echo $page_Lang['ads_per_impression'][$dataUserPageLanguage];?> (<?php echo $adsPerimpression;?>$)</option> 
                  </select>
                </div>
              </div>
            </div>
            <!---->
          </div>
          <!---->
          <!---->
          <div class="create_ads_box_div">
            <!---->
            <div class="create_ads_box_div_in" style="padding-right:10px;">
              <div class="create_ads_div_in_title" id="adscat"><?php echo $page_Lang['ads_category'][$dataUserPageLanguage];?></div>
              <div class="create_ads_div_in_input">
                <div class="select-dropdown">
                  <select class="big" id="advertisement_category">
                      <option value=""><?php echo $page_Lang['select_advertisement_category'][$dataUserPageLanguage];?></option>
                      <option value="519"><?php echo $page_Lang['ads_cloting_shoes'][$dataUserPageLanguage];?></option>
                      <option value="520"><?php echo $page_Lang['ads_home_life'][$dataUserPageLanguage];?></option>
                      <option value="521"><?php echo $page_Lang['ads_mother_babby'][$dataUserPageLanguage];?></option>
                      <option value="522"><?php echo $page_Lang['ads_cosmetic_personal_care'][$dataUserPageLanguage];?></option>
                      <option value="523"><?php echo $page_Lang['ads_jewelery_watches'][$dataUserPageLanguage];?></option>
                      <option value="524"><?php echo $page_Lang['ads_sports_outdoor'][$dataUserPageLanguage];?></option>
                      <option value="525"><?php echo $page_Lang['ads_book_movies_music_games'][$dataUserPageLanguage];?></option>
                      <option value="526"><?php echo $page_Lang['ads_holiday_entertainment'][$dataUserPageLanguage];?></option>
                      <option value="527"><?php echo $page_Lang['ads_automative_motorcycle'][$dataUserPageLanguage];?></option>
                      <option value="528"><?php echo $page_Lang['ads_electronic'][$dataUserPageLanguage];?> </option> 
                    </select>
                </div>
              </div>
            </div>
            <!---->
            <!---->
            <div class="create_ads_box_div_in">
              <div class="create_ads_div_in_title" id="ads__staylive"><?php echo $page_Lang['ads_choose_how_long_ads_stay_live'][$dataUserPageLanguage];?></div>
              <div class="create_ads_div_in_input">
                <div class="select-dropdown">
                  <select class="big" id="ads_stay_live">
                      <option value=""><?php echo $page_Lang['ads_choose_how_long_ads_stay_live'][$dataUserPageLanguage];?></option>
                      <option value="1"><?php echo $page_Lang['ads_one_day'][$dataUserPageLanguage];?></option>
                      <option value="7"><?php echo $page_Lang['ads_seven_day'][$dataUserPageLanguage];?></option>
                      <option value="15"><?php echo $page_Lang['ads_fifteen_day'][$dataUserPageLanguage];?></option>
                      <option value="30"><?php echo $page_Lang['ads_one_month'][$dataUserPageLanguage];?></option>
                    </select>
                </div>
              </div>
            </div>
            <!---->
          </div>
          <!---->
          <!---->
          <div class="create_ads_box_div_TextArea">
            <div class="create_ads_div_in_title" id="advertisement__description"><?php echo $page_Lang['ads_ads_description'][$dataUserPageLanguage];?></div>
            <div class="create-ads_div_in_description">
              <textarea class="ads_texT_desc" id="ads_description_info" placeholder="<?php echo $page_Lang['ads_attract_descrpition'][$dataUserPageLanguage];?>"></textarea>
            </div>
          </div>
          <!---->
          <!---->
          <div class="create_ads_box_div_TextArea">
            <div class="create_ads_div_in_title" id="ads__image"><?php echo $page_Lang['ads_upload_image'][$dataUserPageLanguage];?></div>
            <div class="post-image-btn ibtn-ads-screen">
              <div class="attach-body-ads adsImageUploadBtn">
                <form id="adsform" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
                  <label class="attachImage-ads" for="adsimg"></label>
                  <input type="file" name="uploadadsing" id="adsimg" data-id="advertisementImage" class="chose-image-btn"> 
                </form>

              </div>
            </div>
          </div>
          <!---->
          <div class="create-ads-item-box" id="previewAdsImg"></div>
          <input type="hidden" id="uploadvalues">
          <div class="create-ads-item-box blue-button adminAdsC" id="csendads" data-type="createadadvertise">
           <?php echo $page_Lang['ads_publish'][$dataUserPageLanguage];?></div>
           
        </div>
      </div>
    </div>

  </div>
</div>