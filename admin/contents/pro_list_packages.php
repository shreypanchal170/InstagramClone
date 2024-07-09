<div class="page_title bold">
  <?php echo $page_Lang['pro_packages_list'][$dataUserPageLanguage];?>
</div>
<div class="global_right_wrapper">
  <div class="global_box_container_w bgc">
     <div class="general_settings_header_title"><?php echo $page_Lang['pro_system_status'][$dataUserPageLanguage];?></div>
     <div class="row-box-container">
            <div class="withdrawal_note" style="box-shadow:none !important;font-weight:400 !important;"><?php echo $page_Lang['pro_package_disable_note'][$dataUserPageLanguage];?></div>
           
           <!---->
            <span class="setting-box">
               <span class="setSettingBox"><div class="ckbx-style-14"><input type="checkbox" id="pro_system_status" class="gstf" name="pro_system_status" <?php echo $proSystemStatus == '1' ? "checked='checked'":"";   echo $proSystemStatus == '0' ? "value='1'":"value='0'";?>><label for="pro_system_status"></label></div></span>
               <span class="setSettingBoxText"><?php echo $page_Lang['pro_system_status_onoff'][$dataUserPageLanguage];?></span>
               <span class="setSettingBoxInfoNote"><?php echo $page_Lang['pro_system_status_onoff_info'][$dataUserPageLanguage];?></span>
             </span>
            <!---->
     </div> 
     <!---->
     <div class="general_settings_header_title_second"><?php echo $page_Lang['manage_default_search_values'][$dataUserPageLanguage];?></div>
     <div class="row-box-container">
       <div class="pricingTableCenter">
         <!---->
         <div class="search_user_filter_item_box">
            <div class="search_user_filter_title"><?php echo $page_Lang['online_offline_user_status'][$dataUserPageLanguage];?></div>
            <div class="search_filter_in_in">
                  <div class="search_filter_bobox" style="margin-right:10px;">
                  <label>
                    <input class="with-gap" name="onlineoffline" type="radio" value="online" <?php echo $defaultSearchOnlineOfflineStatus == 'online' ? "checked='checked'":"";?>/>
                    <span><?php echo $page_Lang['online_us'][$dataUserPageLanguage];?></span>
                  </label>
                  </div>
                  <div class="search_filter_bobox">
                  <label>
                    <input class="with-gap" name="onlineoffline" type="radio" value="offline" <?php echo $defaultSearchOnlineOfflineStatus == 'offline' ? "checked='checked'":"";?>/>
                    <span><?php echo $page_Lang['offline_us'][$dataUserPageLanguage];?></span>
                  </label>
                  </div>
            </div> 
           </div>
         <!---->
         <!---->
         <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['user_avatar_status_s'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in">
                <div class="search_filter_bobox" style="margin-right:10px;">
                <label>
                  <input class="with-gap" name="withavatar" type="radio" value="1" <?php echo $defaultSearchAvatarStatus == '1' ? "checked='checked'":"";?>/>
                  <span><?php echo $page_Lang['u_with_avatar_s'][$dataUserPageLanguage];?></span>
                </label>
                </div>
                <div class="search_filter_bobox <?php echo $proButton;?>">
                <label>
                  <input class="with-gap" name="withavatar" type="radio" value="0" <?php echo $defaultSearchAvatarStatus == '0' ? "checked='checked'":"";?>/>
                  <span><?php echo $page_Lang['with_and_without_avatar_ss'][$dataUserPageLanguage];?></span>
                </label>
                </div>
          </div> 
         </div>
         <!---->
         <!---->
         <div class="search_user_filter_item_box">
              <div class="search_user_filter_title"><?php echo $page_Lang['us_gendder'][$dataUserPageLanguage];?></div>
              <div class="search_filter_in_in">
                    <div class="search_filter_bobox" style="margin-right:10px;">
                    <label>
                      <input class="with-gap" name="gender" type="radio" value="male" <?php echo $defaultSearchGender == 'male' ? "checked='checked'":"";?>/>
                      <span><?php echo $page_Lang['us_male'][$dataUserPageLanguage];?></span>
                    </label>
                    </div>
                    <div class="search_filter_bobox <?php echo $proButton;?>">
                    <label>
                      <input class="with-gap" name="gender" type="radio" value="female" <?php echo $defaultSearchGender == 'female' ? "checked='checked'":"";?>/>
                      <span><?php echo $page_Lang['us_female'][$dataUserPageLanguage];?></span>
                    </label>
                    </div>
              </div> 
          </div>
         <!---->
         <!---->
         <div class="search_user_filter_item_box">
                      <div class="search_user_filter_title"><?php echo $page_Lang['us_distance'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in">
                           <div id="range-input-distance"></div>
                           <span class="example-val" id="slider3-span"></span> 
                      </div> 
                  </div>
                  <script type="text/javascript">
                     $(document).ready(function(){ 
						var snapSlider = document.getElementById('range-input-distance');
						noUiSlider.create(snapSlider, {
							start: <?php echo $defaultSearchDistanceStatus;?>,
							behaviour: 'snap',
							connect: [true, false],
							range: {
								'min': 0,
								'max': 100
							},
						   format: wNumb({
							 decimals: 0
						   })
						});
						var nodesDistance = [
							document.getElementById('slider3-span'), // 0 
						];
						snapSlider.noUiSlider.on('update', function (values, handle, unencoded, isTap, positions) {
							nodesDistance[handle].innerHTML = values[handle] + 'km' ;
						});
					 });
                  </script>
         <!---->
         <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['us_age'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in">
               <div id="range-input"></div>
               <span class="example-val" id="slider1-span"></span>
               <span class="example-val" id="slider2-span"></span>
          </div> 
      </div> 
                  <script type="text/javascript">
                     $(document).ready(function(){
					   var slider = document.getElementById('range-input');
						  noUiSlider.create(slider, {
						   start: [<?php echo $defaultSearchAgeStartStatus;?>, <?php echo $defaultSearchAgeEndStatus;?>],
						   margin: 5,
						   connect: true,
						   step: 1,
						   orientation: 'horizontal', // 'horizontal' or 'vertical'
						   range: {
							 'min': 2,
							 'max': 100
						   },
						   format: wNumb({
							 decimals: 0
						   })
						  });
						var nodes = [
							document.getElementById('slider1-span'), // 0
							document.getElementById('slider2-span')  // 1  
						];
						slider.noUiSlider.on('update', function (values, handle, unencoded, isTap, positions) {
							nodes[handle].innerHTML = values[handle];  
						}); 
					 });
                  </script>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['relationship'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;">
                 <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                      <select id="srelationShip" class="zOJg-">      
                           <option value="relationship_status_single" <?php echo $defaultSearchRelationShip == 'relationship_status_single' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_single'][$dataUserPageLanguage];?></option>
                           <option value="relationship_in_relationship" <?php echo $defaultSearchRelationShip == 'relationship_in_relationship' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_in_relationship'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_engaged" <?php echo $defaultSearchRelationShip == 'relationship_status_engaged' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_engaged'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_married" <?php echo $defaultSearchRelationShip == 'relationship_status_married' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_married'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_civil_union" <?php echo $defaultSearchRelationShip == 'relationship_status_civil_union' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_civil_union'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_open" <?php echo $defaultSearchRelationShip == 'relationship_status_open' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_open'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_complicated" <?php echo $defaultSearchRelationShip == 'relationship_status_complicated' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_complicated'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_separated" <?php echo $defaultSearchRelationShip == 'relationship_status_separated' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_separated'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_divorced" <?php echo $defaultSearchRelationShip == 'relationship_status_divorced' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_divorced'][$dataUserPageLanguage];?></option>
                           <option value="relationship_status_widoved" <?php echo $defaultSearchRelationShip == 'relationship_status_widoved' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_widoved'][$dataUserPageLanguage];?></option>
                    </select> 
                 </div> 
              </div>
          </div> 
      </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['sexuality'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;">
                 <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                      <select id="sSexuality" class="zOJg-">     
                           <option value="bisexual" <?php echo $defaultSearchSexuality == 'bisexual' ? "selected='selected'":""; ?>><?php echo $page_Lang['bisexual'][$dataUserPageLanguage];?></option>
                           <option value="gay" <?php echo $defaultSearchSexuality == 'gay' ? "selected='selected'":""; ?>><?php echo $page_Lang['gay'][$dataUserPageLanguage];?></option>
                           <option value="open_minded" <?php echo $defaultSearchSexuality == 'open_minded' ? "selected='selected'":""; ?>><?php echo $page_Lang['open_minded'][$dataUserPageLanguage];?></option>   
                           <option value="heterosexual" <?php echo $defaultSearchSexuality == 'heterosexual' ? "selected='selected'":""; ?>><?php echo $page_Lang['heterosexual'][$dataUserPageLanguage];?></option>  
                    </select>   
                 </div>
                </div> 
          </div> 
      </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['height'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;"> 
               <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                    <select id="height" class="zOJg-">
                        <?php  for($y=139;$y<=220;$y++){ ?>      
                        <option value='<?php echo $y;?>' <?php echo $defaultSearchHeight == $y ? "selected='selected'":""; ?>><?php echo $y;?> cm</option>     
                        <?php }?> 
                    </select>   
                 </div>
                </div> 
          </div> 
      </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['weight'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;"> 
               <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                    <select id="weight" class="zOJg-">
                        <?php for($y=39;$y<=150;$y++){ ?> 
                           <option value='<?php echo $y;?>'  <?php echo $defaultSearchWeight == $y ? "selected='selected'":""; ?>><?php echo $y;?> kg</option>    
                        <?php }  ?> 
                    </select>   
                 </div>
                </div> 
          </div> 
      </div> 
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['life_style'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;"> 
               <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                    <select id="lifestyle" class="zOJg-">
                        <option value="myself" <?php echo $defaultSearchLifeStyle == 'myself' ? "selected='selected'":""; ?>><?php echo $page_Lang['myself'][$dataUserPageLanguage];?></option>
                        <option value="with_my_family" <?php echo $defaultSearchLifeStyle == 'with_my_family' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_family'][$dataUserPageLanguage];?></option>
                        <option value="student_residence" <?php echo $defaultSearchLifeStyle == 'student_residence' ? "selected='selected'":""; ?>><?php echo $page_Lang['student_residence'][$dataUserPageLanguage];?></option>   
                        <option value="with_my_darling" <?php echo $defaultSearchLifeStyle == 'with_my_darling' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_darling'][$dataUserPageLanguage];?></option>
                        <option value="with_my_roommate" <?php echo $defaultSearchLifeStyle == 'with_my_roommate' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_roommate'][$dataUserPageLanguage];?></option> 
                    </select>  
                 </div>
                </div> 
          </div> 
      </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
        <div class="search_user_filter_title"><?php echo $page_Lang['children'][$dataUserPageLanguage];?></div>
        <div class="search_filter_in_in" style="padding: 2px;"> 
             <div class="set_input_box">
                <div class="_9404J">
                  <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                  <select id="children" class="zOJg-">
                      <option value="has_grown" <?php echo $defaultSearchChildren == 'has_grown' ? "selected='selected'":""; ?>><?php echo $page_Lang['has_grown'][$dataUserPageLanguage];?></option>
                      <option value="already_have" <?php echo $defaultSearchChildren == 'already_have' ? "selected='selected'":""; ?>><?php echo $page_Lang['already_have'][$dataUserPageLanguage];?></option>
                      <option value="no_never" <?php echo $defaultSearchChildren == 'no_never' ? "selected='selected'":""; ?>><?php echo $page_Lang['no_never'][$dataUserPageLanguage];?></option>   
                      <option value="one_day" <?php echo $defaultSearchChildren == 'one_day' ? "selected='selected'":""; ?>><?php echo $page_Lang['one_day'][$dataUserPageLanguage];?></option> 
                  </select>   
               </div>
              </div> 
        </div> 
    </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['smoke_habit'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;"> 
               <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                    <select id="smokehabit" class="zOJg-">
                          <option value="i_smoke_a_lot" <?php echo $defaultSearchSmokingHabit == 'i_smoke_a_lot' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_smoke_a_lot'][$dataUserPageLanguage];?></option>
                          <option value="i_hate_smoking" <?php echo $defaultSearchSmokingHabit == 'i_hate_smoking' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_hate_smoking'][$dataUserPageLanguage];?></option>
                          <option value="i_do_not_like" <?php echo $defaultSearchSmokingHabit == 'i_do_not_like' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_do_not_like'][$dataUserPageLanguage];?></option>   
                          <option value="i_am_a_social_drinker" <?php echo $defaultSearchSmokingHabit == 'i_am_a_social_drinker' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_am_a_social_drinker'][$dataUserPageLanguage];?></option> 
                          <option value="i_smoke_occasionally" <?php echo $defaultSearchSmokingHabit == 'i_smoke_occasionally' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_smoke_occasionally'][$dataUserPageLanguage];?></option> 
                    </select>   
                 </div>
                </div> 
          </div> 
      </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box ">
          <div class="search_user_filter_title"><?php echo $page_Lang['drinking_habit'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;"> 
               <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                    <select id="drinkinghabit" class="zOJg-">
                          <option value="i_drink_socially" <?php echo $defaultSearchDrinkingHabit == 'i_drink_socially' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_drink_socially'][$dataUserPageLanguage];?></option>
                          <option value="i_do_not_drink" <?php echo $defaultSearchDrinkingHabit == 'i_do_not_drink' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_do_not_drink'][$dataUserPageLanguage];?></option>
                          <option value="i_am_against_drink" <?php echo $defaultSearchDrinkingHabit == 'i_am_against_drink' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_am_against_drink'][$dataUserPageLanguage];?></option>   
                          <option value="i_drink_alot" <?php echo $defaultSearchDrinkingHabit == 'i_drink_alot' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_drink_alot'][$dataUserPageLanguage];?></option>  
                    </select>
                 </div>
                </div> 
          </div> 
      </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
        <div class="search_user_filter_title"><?php echo $page_Lang['body_type'][$dataUserPageLanguage];?></div>
        <div class="search_filter_in_in" style="padding: 2px;"> 
             <div class="set_input_box">
                <div class="_9404J">
                  <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                  <select id="bodytype" class="zOJg-">
                        <option value="athletic" <?php echo $defaultSearchBodyType == 'athletic' ? "selected='selected'":""; ?>><?php echo $page_Lang['athletic'][$dataUserPageLanguage];?></option>
                        <option value="average_body" <?php echo $defaultSearchBodyType == 'average_body' ? "selected='selected'":""; ?>><?php echo $page_Lang['average_body'][$dataUserPageLanguage];?></option>
                        <option value="chubby" <?php echo $defaultSearchBodyType == 'chubby' ? "selected='selected'":""; ?>><?php echo $page_Lang['chubby'][$dataUserPageLanguage];?></option>   
                        <option value="muscle" <?php echo $defaultSearchBodyType == 'muscle' ? "selected='selected'":""; ?>><?php echo $page_Lang['muscle'][$dataUserPageLanguage];?></option> 
                        <option value="big_and_built" <?php echo $defaultSearchBodyType == 'big_and_built' ? "selected='selected'":""; ?>><?php echo $page_Lang['big_and_built'][$dataUserPageLanguage];?></option> 
                        <option value="rickety" <?php echo $defaultSearchBodyType == 'rickety' ? "selected='selected'":""; ?>><?php echo $page_Lang['rickety'][$dataUserPageLanguage];?></option>  
                  </select>
               </div>
              </div> 
        </div> 
    </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
          <div class="search_user_filter_title"><?php echo $page_Lang['hair_colour'][$dataUserPageLanguage];?></div>
          <div class="search_filter_in_in" style="padding: 2px;"> 
               <div class="set_input_box">
                  <div class="_9404J">
                    <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                    <select id="haircolour" class="zOJg-">
                          <option value="bald" <?php echo $defaultSearchHairColor == 'bald' ? "selected='selected'":""; ?>><?php echo $page_Lang['bald'][$dataUserPageLanguage];?></option>
                          <option value="black_hair" <?php echo $defaultSearchHairColor == 'black_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['black_hair'][$dataUserPageLanguage];?></option>
                          <option value="blonde_hair" <?php echo $defaultSearchHairColor == 'blonde_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['blonde_hair'][$dataUserPageLanguage];?></option>   
                          <option value="brown_hair" <?php echo $defaultSearchHairColor == 'brown_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['brown_hair'][$dataUserPageLanguage];?></option> 
                          <option value="painted_hair" <?php echo $defaultSearchHairColor == 'painted_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['painted_hair'][$dataUserPageLanguage];?></option> 
                          <option value="red_hair" <?php echo $defaultSearchHairColor == 'red_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['red_hair'][$dataUserPageLanguage];?></option>
                          <option value="been_shaved" <?php echo $defaultSearchHairColor == 'been_shaved' ? "selected='selected'":""; ?>><?php echo $page_Lang['been_shaved'][$dataUserPageLanguage];?></option>
                          <option value="white_hair" <?php echo $defaultSearchHairColor == 'white_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['white_hair'][$dataUserPageLanguage];?></option>  
                    </select>
                 </div>
                </div> 
          </div> 
      </div>
     <!---->
     <!---->
     <div class="search_user_filter_item_box">
        <div class="search_user_filter_title"><?php echo $page_Lang['eye_color'][$dataUserPageLanguage];?></div>
        <div class="search_filter_in_in" style="padding: 2px;"> 
             <div class="set_input_box">
                <div class="_9404J">
                  <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                  <select id="eyecolor" class="zOJg-">
                        <option value="black_eye" <?php echo $defaultSearchEyeColor == 'black_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['black_eye'][$dataUserPageLanguage];?></option>
                        <option value="blue_eye" <?php echo $defaultSearchEyeColor == 'blue_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['blue_eye'][$dataUserPageLanguage];?></option>
                        <option value="brown_eye" <?php echo $defaultSearchEyeColor == 'brown_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['brown_eye'][$dataUserPageLanguage];?></option>   
                        <option value="green_eye" <?php echo $defaultSearchEyeColor == 'green_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['green_eye'][$dataUserPageLanguage];?></option> 
                        <option value="hazel_eye" <?php echo $defaultSearchEyeColor == 'hazel_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['hazel_eye'][$dataUserPageLanguage];?></option> 
                        <option value="other_eye_color" <?php echo $defaultSearchEyeColor == 'other_eye_color' ? "selected='selected'":""; ?>><?php echo $page_Lang['other_eye_color'][$dataUserPageLanguage];?></option>  
                  </select>
               </div>
              </div> 
        </div> 
    </div>
     <!---->
     <!---->
     <!---->
     <!---->
     <div class="search_user_filter_item"> 
                  <div class="sm_filter waves-effect waves-light btn blue">Search</div>
              </div>
     </div>
     <!----> 
     
  </div>
  </div>
</div> 
<script type="text/javascript" src="<?php echo $base_url;?>js/nouslider/nouislider.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/range.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/wNumb.js"></script>
</div> 
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".sm_filter", function(){
	    /**/
		var type = 'updatedefaultsearch';
      var minimumAge = $("#range-input").find(".noUi-handle-lower").attr("aria-valuetext");
	  var maxmumAge =  $("#range-input").find(".noUi-handle-upper").attr("aria-valuetext");
	  var filterDistance =  $("#range-input-distance").find(".noUi-handle-lower").attr("aria-valuetext");
	  if ($("input[name='gender']:checked").val()) {
          var genderType = $("input[name='gender']:checked").val();
      }
	  if ($("input[name='onlineoffline']:checked").val()) {
          var onlineofflineType = $("input[name='onlineoffline']:checked").val();
      }
	  if ($("input[name='withavatar']:checked").val()) {
          var withavatarType = $("input[name='withavatar']:checked").val();
      } 
	  var relationShipStatus = $("#srelationShip").find(":selected").val(); 
	  var sexuality = $("#sSexuality").find(":selected").val(); 
	  var height = $("#height").find(":selected").val();  
	  var weight = $("#weight").find(":selected").val(); 
	  var lifestyle = $("#lifestyle").find(":selected").val(); 
	  var children = $("#children").find(":selected").val(); 
	  var smokehabit = $("#smokehabit").find(":selected").val(); 
	  var drinkinghabit = $("#drinkinghabit").find(":selected").val(); 
	  var bodytype = $("#bodytype").find(":selected").val(); 
	  var haircolour = $("#haircolour").find(":selected").val(); 
	  var eyecolor = $("#eyecolor").find(":selected").val();
	  
	  var data = 'f='+type+'&miAge='+minimumAge+'&maxAge='+maxmumAge+'&dist='+filterDistance+'&gen='+genderType+'&onof='+onlineofflineType+'&av='+withavatarType+'&relstat='+relationShipStatus+'&sexlity='+sexuality+'&heght='+height+'&weght='+weight+'&lfstyl='+lifestyle+'&chldrn='+children+'&smkhbt='+smokehabit+'&drnkhbt='+drinkinghabit+'&hrclr='+haircolour+'&eyclr='+eyecolor+'&bdyType='+bodytype;
	  $.ajax({
			type: "POST",
			url: requestUrl + "admin/requests/request",
			data: data, 
			beforeSend: function(){ 
			   $("body").append('<div style="position:absolute;bottom:0px;left:0px;width:100%;" class="sls"><span class="progress_blue" id="ccm"><span class="indeterminate"></span></span></div>');
			},
			success: function(html) { 
				 $(".sls").remove(); 
			}
		});  
		/**/
	});
});
</script>