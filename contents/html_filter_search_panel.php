<div class="search_user_filter_container openSocial">
    <div class="shareonSocial">
         <div class="search_user_filter_Header"><?php echo $page_Lang['specify_your_search_criteria'][$dataUserPageLanguage];?><div class="search_user_filter_close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="search_user_filter_wrap_list">
            <?php 
				  $proSearchItems = $Dot->Dot_SearchItemFiltersList();
				  if($proSearchItems){
				      foreach($proSearchItems as $prSitem){
					       $proSID = $prSitem['search_filter_id'];
						   $proSStatus = $prSitem['search_filter_statuus'];  
						   $proSKey = $prSitem['search_filter_key'];
						   $proSIcon = $prSitem['search_filter_icon']; 
						   $proBg = '';  
						   $disableSelectAndValue = '';
						   $proButton = '';
						   if($proSStatus == 1){
							   $proBg = 'panelsPro';
							   if($dataUserProType != 1){ 
						           $disableSelectAndValue = 'disabled';
							       $proButton = 'becomepro';
						       }
						   } 
		   ?> 
                <?php if($proSKey == 's_filter_online_offline'){?>
				 <div class="search_user_filter_item_box <?php echo $proBg;?>">
                  <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['online_offline_user_status'][$dataUserPageLanguage];?></div>
                  <div class="search_filter_in_in">
                        <div class="search_filter_bobox <?php echo $proButton;?>" style="margin-right:10px;">
                        <label>
                          <input class="with-gap" name="onlineoffline" type="radio" value="online" checked <?php echo $disableSelectAndValue;?>/>
                          <span><?php echo $page_Lang['online_us'][$dataUserPageLanguage];?></span>
                        </label>
                        </div>
                        <div class="search_filter_bobox <?php echo $proButton;?>">
                        <label>
                          <input class="with-gap" name="onlineoffline" type="radio" value="offline" <?php echo $disableSelectAndValue;?>/>
                          <span><?php echo $page_Lang['offline_us'][$dataUserPageLanguage];?></span>
                        </label>
                        </div>
                  </div> 
                 </div>  
			    <?php }?> 
                <?php if($proSKey == 's_filter_avatar'){?>
				 <div class="search_user_filter_item_box <?php echo $proBg;?>">
                  <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['user_avatar_status_s'][$dataUserPageLanguage];?></div>
                  <div class="search_filter_in_in">
                        <div class="search_filter_bobox <?php echo $proButton;?>" style="margin-right:10px;">
                        <label>
                          <input class="with-gap" name="withavatar" type="radio" value="1" checked <?php echo $disableSelectAndValue;?>/>
                          <span><?php echo $page_Lang['u_with_avatar_s'][$dataUserPageLanguage];?></span>
                        </label>
                        </div>
                        <div class="search_filter_bobox <?php echo $proButton;?>">
                        <label>
                          <input class="with-gap" name="withavatar" type="radio" value="0" <?php echo $disableSelectAndValue;?>/>
                          <span><?php echo $page_Lang['with_and_without_avatar_ss'][$dataUserPageLanguage];?></span>
                        </label>
                        </div>
                  </div> 
                 </div>  
			    <?php }?> 
                <?php if($proSKey == 's_filter_distance'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['us_distance'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in <?php echo $proButton;?>">
                           <div id="range-input-distance"></div>
                           <span class="example-val" id="slider3-span"></span> 
                      </div> 
                  </div>
                  <script type="text/javascript">
                     $(document).ready(function(){ 
						var snapSlider = document.getElementById('range-input-distance');
						noUiSlider.create(snapSlider, {
							start: 20,
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
			    <?php }?> 
                <?php if($proSKey == 's_filter_age'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['us_age'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in">
                           <div id="range-input"></div>
                           <span class="example-val <?php echo $proButton;?>" id="slider1-span"></span>
                           <span class="example-val <?php echo $proButton;?>" id="slider2-span"></span>
                      </div> 
                  </div> 
                  <script type="text/javascript">
                     $(document).ready(function(){
					   var slider = document.getElementById('range-input');
						  noUiSlider.create(slider, {
						   start: [20, 80],
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
			    <?php }?> 
                <?php if($proSKey == 's_filter_gender'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['us_gendder'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in">
                            <div class="search_filter_bobox <?php echo $proButton;?>" style="margin-right:10px;">
                            <label>
                              <input class="with-gap" name="gender" type="radio" value="male" checked <?php echo $disableSelectAndValue;?>/>
                              <span><?php echo $page_Lang['us_male'][$dataUserPageLanguage];?></span>
                            </label>
                            </div>
                            <div class="search_filter_bobox <?php echo $proButton;?>">
                            <label>
                              <input class="with-gap" name="gender" type="radio" value="female" <?php echo $disableSelectAndValue;?>/>
                              <span><?php echo $page_Lang['us_female'][$dataUserPageLanguage];?></span>
                            </label>
                            </div>
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_relationship'){?> 
                  <div class="search_user_filter_item_box  <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['relationship'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;">
                             <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                  <select id="srelationShip" class="zOJg-" <?php echo $disableSelectAndValue;?>>      
                                       <option value="relationship_status_single"><?php echo $page_Lang['relationship_status_single'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_in_relationship"><?php echo $page_Lang['relationship_in_relationship'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_engaged"><?php echo $page_Lang['relationship_status_engaged'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_married"><?php echo $page_Lang['relationship_status_married'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_civil_union"><?php echo $page_Lang['relationship_status_civil_union'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_open"><?php echo $page_Lang['relationship_status_open'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_complicated"><?php echo $page_Lang['relationship_status_complicated'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_separated"><?php echo $page_Lang['relationship_status_separated'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_divorced"><?php echo $page_Lang['relationship_status_divorced'][$dataUserPageLanguage];?></option>
                                       <option value="relationship_status_widoved"><?php echo $page_Lang['relationship_status_widoved'][$dataUserPageLanguage];?></option>
                                </select> 
                             </div> 
                          </div>
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_sexuality'){?> 
                  <div class="search_user_filter_item_box  <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['sexuality'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;">
                             <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                  <select id="sSexuality" class="zOJg-" <?php echo $disableSelectAndValue;?>>     
                                       <option value="bisexual"><?php echo $page_Lang['bisexual'][$dataUserPageLanguage];?></option>
                                       <option value="gay"><?php echo $page_Lang['gay'][$dataUserPageLanguage];?></option>
                                       <option value="open_minded"><?php echo $page_Lang['open_minded'][$dataUserPageLanguage];?></option>   
                                       <option value="heterosexual"><?php echo $page_Lang['heterosexual'][$dataUserPageLanguage];?></option>  
                                </select>   
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_height'){?> 
                  <div class="search_user_filter_item_box  <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['height'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="height" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                    <?php  for($y=139;$y<=220;$y++){ ?>      
                                    <option value='<?php echo $y;?>' ><?php echo $y;?> cm</option>     
                                    <?php }?> 
                                </select>   
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_weight'){?> 
                  <div class="search_user_filter_item_box  <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['weight'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="weight" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                    <?php for($y=39;$y<=150;$y++){ ?> 
                                       <option value='<?php echo $y;?>'><?php echo $y;?> kg</option>    
                                    <?php }  ?> 
                                </select>   
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_lifestyle'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['life_style'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="lifestyle" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                    <option value="myself"><?php echo $page_Lang['myself'][$dataUserPageLanguage];?></option>
                                    <option value="with_my_family"><?php echo $page_Lang['with_my_family'][$dataUserPageLanguage];?></option>
                                    <option value="student_residence"><?php echo $page_Lang['student_residence'][$dataUserPageLanguage];?></option>   
                                    <option value="with_my_darling"><?php echo $page_Lang['with_my_darling'][$dataUserPageLanguage];?></option>
                                    <option value="with_my_roommate"><?php echo $page_Lang['with_my_roommate'][$dataUserPageLanguage];?></option> 
                                </select>  
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_children'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['children'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="children" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                    <option value="has_grown"><?php echo $page_Lang['has_grown'][$dataUserPageLanguage];?></option>
                                    <option value="already_have"><?php echo $page_Lang['already_have'][$dataUserPageLanguage];?></option>
                                    <option value="no_never"><?php echo $page_Lang['no_never'][$dataUserPageLanguage];?></option>   
                                    <option value="one_day"><?php echo $page_Lang['one_day'][$dataUserPageLanguage];?></option> 
                                </select>   
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_smoking_habit'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['smoke_habit'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="smokehabit" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                      <option value="i_smoke_a_lot"><?php echo $page_Lang['i_smoke_a_lot'][$dataUserPageLanguage];?></option>
                                      <option value="i_hate_smoking"><?php echo $page_Lang['i_hate_smoking'][$dataUserPageLanguage];?></option>
                                      <option value="i_do_not_like"><?php echo $page_Lang['i_do_not_like'][$dataUserPageLanguage];?></option>   
                                      <option value="i_am_a_social_drinker"><?php echo $page_Lang['i_am_a_social_drinker'][$dataUserPageLanguage];?></option> 
                                      <option value="i_smoke_occasionally"><?php echo $page_Lang['i_smoke_occasionally'][$dataUserPageLanguage];?></option> 
                                </select>   
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_drinking_habit'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['drinking_habit'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="drinkinghabit" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                      <option value="i_drink_socially"><?php echo $page_Lang['i_drink_socially'][$dataUserPageLanguage];?></option>
                                      <option value="i_do_not_drink"><?php echo $page_Lang['i_do_not_drink'][$dataUserPageLanguage];?></option>
                                      <option value="i_am_against_drink"><?php echo $page_Lang['i_am_against_drink'][$dataUserPageLanguage];?></option>   
                                      <option value="i_drink_alot"><?php echo $page_Lang['i_drink_alot'][$dataUserPageLanguage];?></option>  
                                </select>
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_body_type'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['body_type'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="bodytype" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                      <option value="athletic"><?php echo $page_Lang['athletic'][$dataUserPageLanguage];?></option>
                                      <option value="average_body"><?php echo $page_Lang['average_body'][$dataUserPageLanguage];?></option>
                                      <option value="chubby"><?php echo $page_Lang['chubby'][$dataUserPageLanguage];?></option>   
                                      <option value="muscle"><?php echo $page_Lang['muscle'][$dataUserPageLanguage];?></option> 
                                      <option value="big_and_built"><?php echo $page_Lang['big_and_built'][$dataUserPageLanguage];?></option> 
                                      <option value="rickety"><?php echo $page_Lang['rickety'][$dataUserPageLanguage];?></option>  
                                </select>
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_hair_color'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?> <?php echo $proButton;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['hair_colour'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="haircolour" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                      <option value="bald"><?php echo $page_Lang['bald'][$dataUserPageLanguage];?></option>
                                      <option value="black_hair"><?php echo $page_Lang['black_hair'][$dataUserPageLanguage];?></option>
                                      <option value="blonde_hair"><?php echo $page_Lang['blonde_hair'][$dataUserPageLanguage];?></option>   
                                      <option value="brown_hair"><?php echo $page_Lang['brown_hair'][$dataUserPageLanguage];?></option> 
                                      <option value="painted_hair"><?php echo $page_Lang['painted_hair'][$dataUserPageLanguage];?></option> 
                                      <option value="red_hair"><?php echo $page_Lang['red_hair'][$dataUserPageLanguage];?></option>
                                      <option value="been_shaved"><?php echo $page_Lang['been_shaved'][$dataUserPageLanguage];?></option>
                                      <option value="white_hair"><?php echo $page_Lang['white_hair'][$dataUserPageLanguage];?></option>  
                                </select>
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
                <?php if($proSKey == 's_filter_eye_color'){?> 
                  <div class="search_user_filter_item_box <?php echo $proBg;?>">
                      <div class="search_user_filter_title"><?php echo $proSIcon;?><?php echo $page_Lang['eye_color'][$dataUserPageLanguage];?></div>
                      <div class="search_filter_in_in" style="padding: 2px;"> 
                           <div class="set_input_box">
                              <div class="_9404J <?php echo $proButton;?>">
                                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                                <select id="eyecolor" class="zOJg-" <?php echo $disableSelectAndValue;?>>
                                      <option value="black_eye"><?php echo $page_Lang['black_eye'][$dataUserPageLanguage];?></option>
                                      <option value="blue_eye"><?php echo $page_Lang['blue_eye'][$dataUserPageLanguage];?></option>
                                      <option value="brown_eye"><?php echo $page_Lang['brown_eye'][$dataUserPageLanguage];?></option>   
                                      <option value="green_eye"><?php echo $page_Lang['green_eye'][$dataUserPageLanguage];?></option> 
                                      <option value="hazel_eye"><?php echo $page_Lang['hazel_eye'][$dataUserPageLanguage];?></option> 
                                      <option value="other_eye_color"><?php echo $page_Lang['other_eye_color'][$dataUserPageLanguage];?></option>  
                                </select>
                             </div>
                            </div> 
                      </div> 
                  </div> 
			    <?php }?> 
           <?php }} ?> 
              <div class="search_user_filter_item"> 
                  <div class="s_filter waves-effect waves-light btn blue">Search</div>
              </div>
              <!---->
         </div>
    </div>
<script type="text/javascript" src="<?php echo $base_url;?>js/nouslider/nouislider.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/range.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/wNumb.js"></script>
<script type="text/javascript">
$(document).ready(function(){

$("body").on("click",".s_filter", function(){
	  var type = 'srcfltyp';
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
			url: requestUrl + "requests/activity",
			data: data, 
			beforeSend: function(){ 
			   $("body").append('<div style="position:absolute;bottom:0px;left:0px;width:100%;" class="sls"><span class="progress_blue" id="ccm"><span class="indeterminate"></span></span></div>');
			},
			success: function(html) {
				 $(".fltered_users_list").html(html);
				 $(".sls").remove();
				 $(".search_user_filter_container").addClass("closeSocial");
				 setTimeout(function() {
					 $(".search_user_filter_container").remove(); 
				 }, 500);
			}
		});  
});
  
});
  </script>    
</div>
