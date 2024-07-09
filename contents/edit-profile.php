<div class="settings_form_container">
  <h1 class="settings_header">
    <?php echo $page_Lang['profile_information'][$dataUserPageLanguage];?>
  </h1>
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['full_name'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font chng" id="fullname" placeholder="<?php echo $page_Lang['full_name'][$dataUserPageLanguage];?>" value="<?php echo $dataUserFullName;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['username'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font us" value="<?php echo $dataUsername;?>" disabled="disabled" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['website_address'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font chng" id="websiteAddress" placeholder="<?php echo $page_Lang['website_address'][$dataUserPageLanguage];?>" value="<?php echo $dataUserWebsite;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['biography'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><textarea class="biog_textarea chng" id="pepBio" placeholder="<?php echo $page_Lang['biography'][$dataUserPageLanguage];?>"><?php echo $dataUserBio;?></textarea></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box" id="profileinfo">
    <div class="set_box_title">
      <?php echo $page_Lang['loved_word'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><textarea class="biog_textarea chng" id="popLovedWord" placeholder="<?php echo $page_Lang['loved_word'][$dataUserPageLanguage];?>"><?php echo $dataUserWord;?></textarea></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Save Settings for Personal Information button STARTED-->
  <div class="set_box prin" id="set_profile" style="display:none;">
    <div class="settings_box_footer">
      <div class="control left_btn"></div>
      <div class="control right_btn">
        <div class="share_post_box save_profile_info" data-type="profileInformation">
          <?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?>
        </div>
      </div>
    </div>
  </div>
  <!--Save Settings for Personal Information button FINISHED-->
  <h1 class="settings_header" id="shoppingaddress">
    Address Information <span style="font-weight:300;font-size:12px;width:100%;padding-top:5px;">(This is necessary for your grocery shopping.)</span>
  </h1>
  <!--OOOOOOOOOOOOOOOOOOOOO-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
        Your Full Name
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font mad" id="shpfullname" placeholder="<?php echo $page_Lang['full_name'][$dataUserPageLanguage];?>" value="<?php echo $profileShoppingFullName;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      Your Phone Number (Necessary to inform.)
    </div>
    <div class="set_input_box"><input type="tel" class="inputField insta_font mad"  id="spphone" style="text-align:left !important;" value="<?php echo $profileShoppingPhoneNumber;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      Personal ID Number or Passport Number (Necessary to inform.)
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font mad"  id="pidpsp" style="text-align:left !important;" value="<?php echo $dataUserPassportCodeOrIdNumber;?>"/></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      Post Code (Necessary to inform.)
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font mad"  id="spstcd" style="text-align:left !important;" value="<?php echo $dataUserPostCode;?>"/></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      Your full address (Your order will be delivered to this address).
    </div>
    <div class="set_input_box"><textarea class="biog_textarea mad" id="shpfulladdress" placeholder="<?php echo $page_Lang['loved_word'][$dataUserPageLanguage];?>"><?php echo $profileShoppingFullAddress;?></textarea></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      Country
    </div>
    <div class="set_input_box">
      <!---->  
            <div class="theselcll thloc" data-type="county">
                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                 <span  id="county"><?php echo isset($dataCountryPhone) ? $Dot->Dot_CountryName($dataCountryPhone) : $page_Lang['select_country'][$dataUserPageLanguage] ; ?></span> 
            </div>
      <!---->
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      City
    </div>
    <div class="set_input_box">
      <!---->  
            <div class="theselcll thloc" data-type="ucitty">
                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                <span  id="ucitty"><?php echo isset($dataCitySetting) ? $Dot->Dot_UserCity($dataCitySetting) : $page_Lang['select_city'][$dataUserPageLanguage] ; ?></span>
              </div>
      <!---->
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      State
    </div>
    <div class="set_input_box">
      <!---->  
            <div class="theselcll thloc" data-type="ustate">
                <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
                 <span  id="ustate"><?php echo isset($dataCitySetting) ? $Dot->Dot_UserState($dataCitySetting) : $page_Lang['select_state'][$dataUserPageLanguage] ; ?></span>
              </div>
      <!---->
    </div>
  </div>
  <!--Setting Input Item FINISHED--> 
  
  <!--Save Settings for Personal Information button STARTED-->
  <div class="set_box prin" id="set_market_ad_ifo" style="display:none;">
    <div class="settings_box_footer">
      <div class="control left_btn"></div>
      <div class="control right_btn">
        <div class="share_post_box shpin" data-type="shoppingInformation">
          <?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?>
        </div>
      </div>
    </div>
  </div>
  <!--Save Settings for Personal Information button FINISHED-->
  <!--OOOOOOOOOOOOOOOOOOOOO-->
  <h1 class="settings_header">
    <?php echo $page_Lang['personal_information'][$dataUserPageLanguage];?>
  </h1>
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['relationship'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="relationshipu" class="zOJg- ">            
           <option value="relationship_status_single" <?php echo $dataUserRelationShip == 'relationship_status_single' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_single'][$dataUserPageLanguage];?></option>
           <option value="relationship_in_relationship" <?php echo $dataUserRelationShip == 'relationship_in_relationship' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_in_relationship'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_engaged" <?php echo $dataUserRelationShip == 'relationship_status_engaged' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_engaged'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_married" <?php echo $dataUserRelationShip == 'relationship_status_married' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_married'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_civil_union" <?php echo $dataUserRelationShip == 'relationship_status_civil_union' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_civil_union'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_open" <?php echo $dataUserRelationShip == 'relationship_status_open' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_open'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_complicated" <?php echo $dataUserRelationShip == 'relationship_status_complicated' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_complicated'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_separated" <?php echo $dataUserRelationShip == 'relationship_status_separated' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_separated'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_divorced" <?php echo $dataUserRelationShip == 'relationship_status_divorced' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_divorced'][$dataUserPageLanguage];?></option>
           <option value="relationship_status_widoved" <?php echo $dataUserRelationShip == 'relationship_status_widoved' ? "selected='selected'":""; ?>><?php echo $page_Lang['relationship_status_widoved'][$dataUserPageLanguage];?></option>
           <option value="unspecified" <?php echo $dataUserRelationShip == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>    
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['gender'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="gender" class="zOJg- ">
           <option value="male" <?php echo $dataUserGender == 'male' ? "selected='selected'":""; ?>><?php echo $page_Lang['male'][$dataUserPageLanguage];?></option>
           <option value="female" <?php echo $dataUserGender == 'female' ? "selected='selected'":""; ?>><?php echo $page_Lang['female'][$dataUserPageLanguage];?></option>
           <option value="0" <?php echo $dataUserGender == '0' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>    
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['sexuality'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="sexuality" class="zOJg- ">
           <option value="unspecified" <?php echo $dataUserSexuality == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
           <option value="bisexual" <?php echo $dataUserSexuality == 'bisexual' ? "selected='selected'":""; ?>><?php echo $page_Lang['bisexual'][$dataUserPageLanguage];?></option>
           <option value="gay" <?php echo $dataUserSexuality == 'gay' ? "selected='selected'":""; ?>><?php echo $page_Lang['gay'][$dataUserPageLanguage];?></option>
           <option value="open_minded" <?php echo $dataUserSexuality == 'open_minded' ? "selected='selected'":""; ?>><?php echo $page_Lang['open_minded'][$dataUserPageLanguage];?></option>   
           <option value="heterosexual" <?php echo $dataUserSexuality == 'heterosexual' ? "selected='selected'":""; ?>><?php echo $page_Lang['heterosexual'][$dataUserPageLanguage];?></option>   
         </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['height'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="height" class="zOJg- ">
			<?php  for($y=139;$y<=220;$y++){ ?>      
            <option value='<?php echo $y;?>'  <?php echo $dataUserHeight == ''.$y.'' ? "selected='selected'":""; ?>><?php echo $y;?> cm</option>     
            <?php }?> 
        </select>
     </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['weight'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="weight" class="zOJg- ">
			<?php 	for($y=39;$y<=150;$y++){     ?> 
               <option value='<?php echo $y;?>'  <?php echo $dataUserWeight == ''.$y.'' ? "selected='selected'":""; ?>><?php echo $y;?> kg</option>    
            <?php }  ?> 
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['life_style'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="life_style" class="zOJg- ">
            <option value="unspecified" <?php echo $dataUserLifeStyle == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
            <option value="myself" <?php echo $dataUserLifeStyle == 'myself' ? "selected='selected'":""; ?>><?php echo $page_Lang['myself'][$dataUserPageLanguage];?></option>
            <option value="with_my_family" <?php echo $dataUserLifeStyle == 'with_my_family' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_family'][$dataUserPageLanguage];?></option>
            <option value="student_residence" <?php echo $dataUserLifeStyle == 'student_residence' ? "selected='selected'":""; ?>><?php echo $page_Lang['student_residence'][$dataUserPageLanguage];?></option>   
            <option value="with_my_darling" <?php echo $dataUserLifeStyle == 'with_my_darling' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_darling'][$dataUserPageLanguage];?></option>
            <option value="with_my_roommate" <?php echo $dataUserLifeStyle == 'with_my_roommate' ? "selected='selected'":""; ?>><?php echo $page_Lang['with_my_roommate'][$dataUserPageLanguage];?></option>   
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['children'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="children" class="zOJg- ">
          <option value="unspecified" <?php echo $dataUserChildren == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
          <option value="has_grown" <?php echo $dataUserChildren == 'has_grown' ? "selected='selected'":""; ?>><?php echo $page_Lang['has_grown'][$dataUserPageLanguage];?></option>
          <option value="already_have" <?php echo $dataUserChildren == 'already_have' ? "selected='selected'":""; ?>><?php echo $page_Lang['already_have'][$dataUserPageLanguage];?></option>
          <option value="no_never" <?php echo $dataUserChildren == 'no_never' ? "selected='selected'":""; ?>><?php echo $page_Lang['no_never'][$dataUserPageLanguage];?></option>   
          <option value="one_day" <?php echo $dataUserChildren == 'one_day' ? "selected='selected'":""; ?>><?php echo $page_Lang['one_day'][$dataUserPageLanguage];?></option> 
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['smoke_habit'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="smoke_habit" class="zOJg- ">
          <option value="unspecified" <?php echo $dataUserSmoke == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
          <option value="i_smoke_a_lot" <?php echo $dataUserSmoke == 'i_smoke_a_lot' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_smoke_a_lot'][$dataUserPageLanguage];?></option>
          <option value="i_hate_smoking" <?php echo $dataUserSmoke == 'i_hate_smoking' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_hate_smoking'][$dataUserPageLanguage];?></option>
          <option value="i_do_not_like" <?php echo $dataUserSmoke == 'i_do_not_like' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_do_not_like'][$dataUserPageLanguage];?></option>   
          <option value="i_am_a_social_drinker" <?php echo $dataUserSmoke == 'i_am_a_social_drinker' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_am_a_social_drinker'][$dataUserPageLanguage];?></option> 
          <option value="i_smoke_occasionally" <?php echo $dataUserSmoke == 'i_smoke_occasionally' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_smoke_occasionally'][$dataUserPageLanguage];?></option> 
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['drinking_habit'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="drinking_habit" class="zOJg- ">
          <option value="unspecified" <?php echo $dataUserDrink == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
          <option value="i_drink_socially" <?php echo $dataUserDrink == 'i_drink_socially' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_drink_socially'][$dataUserPageLanguage];?></option>
          <option value="i_do_not_drink" <?php echo $dataUserDrink == 'i_do_not_drink' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_do_not_drink'][$dataUserPageLanguage];?></option>
          <option value="i_am_against_drink" <?php echo $dataUserDrink == 'i_am_against_drink' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_am_against_drink'][$dataUserPageLanguage];?></option>   
          <option value="i_drink_alot" <?php echo $dataUserDrink == 'i_drink_alot' ? "selected='selected'":""; ?>><?php echo $page_Lang['i_drink_alot'][$dataUserPageLanguage];?></option>  
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['body_type'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="body_type" class="zOJg- ">
          <option value="unspecified" <?php echo $dataUserBodyType == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
          <option value="athletic" <?php echo $dataUserBodyType == 'athletic' ? "selected='selected'":""; ?>><?php echo $page_Lang['athletic'][$dataUserPageLanguage];?></option>
          <option value="average_body" <?php echo $dataUserBodyType == 'average_body' ? "selected='selected'":""; ?>><?php echo $page_Lang['average_body'][$dataUserPageLanguage];?></option>
          <option value="chubby" <?php echo $dataUserBodyType == 'chubby' ? "selected='selected'":""; ?>><?php echo $page_Lang['chubby'][$dataUserPageLanguage];?></option>   
          <option value="muscle" <?php echo $dataUserBodyType == 'muscle' ? "selected='selected'":""; ?>><?php echo $page_Lang['muscle'][$dataUserPageLanguage];?></option> 
          <option value="big_and_built" <?php echo $dataUserBodyType == 'big_and_built' ? "selected='selected'":""; ?>><?php echo $page_Lang['big_and_built'][$dataUserPageLanguage];?></option> 
          <option value="rickety" <?php echo $dataUserBodyType == 'rickety' ? "selected='selected'":""; ?>><?php echo $page_Lang['rickety'][$dataUserPageLanguage];?></option> 
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['hair_colour'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="hair_color" class="zOJg- ">
          <option value="unspecified" <?php echo $dataUserHairColor == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
          <option value="bald" <?php echo $dataUserHairColor == 'bald' ? "selected='selected'":""; ?>><?php echo $page_Lang['bald'][$dataUserPageLanguage];?></option>
          <option value="black_hair" <?php echo $dataUserHairColor == 'black_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['black_hair'][$dataUserPageLanguage];?></option>
          <option value="blonde_hair" <?php echo $dataUserHairColor == 'blonde_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['blonde_hair'][$dataUserPageLanguage];?></option>   
          <option value="brown_hair" <?php echo $dataUserHairColor == 'brown_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['brown_hair'][$dataUserPageLanguage];?></option> 
          <option value="painted_hair" <?php echo $dataUserHairColor == 'painted_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['painted_hair'][$dataUserPageLanguage];?></option> 
          <option value="red_hair" <?php echo $dataUserHairColor == 'red_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['red_hair'][$dataUserPageLanguage];?></option>
          <option value="been_shaved" <?php echo $dataUserHairColor == 'been_shaved' ? "selected='selected'":""; ?>><?php echo $page_Lang['been_shaved'][$dataUserPageLanguage];?></option>
          <option value="white_hair" <?php echo $dataUserHairColor == 'white_hair' ? "selected='selected'":""; ?>><?php echo $page_Lang['white_hair'][$dataUserPageLanguage];?></option>  
        </select>
      </div>
    </div>
  </div>
  <!--Setting Imput Item STARTED-->
  <div class="set_box" id="personalinfo">
    <div class="set_box_title">
      <?php echo $page_Lang['eye_color'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box">
      <div class="_9404J">
        <span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span>
        <select id="eye_color" class="zOJg- ">
          <option value="unspecified" <?php echo $dataUserEyeColor == 'unspecified' ? "selected='selected'":""; ?>><?php echo $page_Lang['unspecified'][$dataUserPageLanguage];?></option>
          <option value="black_eye" <?php echo $dataUserEyeColor == 'black_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['black_eye'][$dataUserPageLanguage];?></option>
          <option value="blue_eye" <?php echo $dataUserEyeColor == 'blue_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['blue_eye'][$dataUserPageLanguage];?></option>
          <option value="brown_eye" <?php echo $dataUserEyeColor == 'brown_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['brown_eye'][$dataUserPageLanguage];?></option>   
          <option value="green_eye" <?php echo $dataUserEyeColor == 'green_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['green_eye'][$dataUserPageLanguage];?></option> 
          <option value="hazel_eye" <?php echo $dataUserEyeColor == 'hazel_eye' ? "selected='selected'":""; ?>><?php echo $page_Lang['hazel_eye'][$dataUserPageLanguage];?></option> 
          <option value="other_eye_color" <?php echo $dataUserEyeColor == 'other_eye_color' ? "selected='selected'":""; ?>><?php echo $page_Lang['other_eye_color'][$dataUserPageLanguage];?></option> 
        </select>
      </div>
    </div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Save Settings for Personal Information button STARTED-->
  <div class="set_box editedpp" id="set_button" style="display:none;">
    <div class="settings_box_footer">
      <div class="control left_btn"></div>
      <div class="control right_btn">
        <div class="share_post_box save_personal_info" data-type="personalInformation">
          <?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?>
        </div>
      </div>
    </div>
  </div>
  <!--Save Settings for Personal Information button FINISHED-->
  <!--Setting Input Item FINISHED-->
  <h1 class="settings_header">
    <?php echo $page_Lang['business_and_education'][$dataUserPageLanguage];?>
  </h1>
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['job_title'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font ujob" id="jobTitle" placeholder="<?php echo $page_Lang['job_title'][$dataUserPageLanguage];?>" value="<?php echo $dataUserJobTitle;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['company_name'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font ujob" id="campanyName" placeholder="<?php echo $page_Lang['company_name'][$dataUserPageLanguage];?>" value="<?php echo $dataUserCampanyName;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Setting Imput Item STARTED-->
  <div class="set_box" id="jobinfo">
    <div class="set_box_title">
      <?php echo $page_Lang['scholl_or_university'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font ujob" id="schollUniversity" placeholder="<?php echo $page_Lang['scholl_or_university'][$dataUserPageLanguage];?>" value="<?php echo $dataUserSchoolUniversity;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Save Settings for Personal Information button STARTED-->
  <div class="set_box prbus" id="set_business" style="display:none;">
    <div class="settings_box_footer">
      <div class="control left_btn"></div>
      <div class="control right_btn">
        <div class="share_post_box save_business" data-type="userbusiness">
          <?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?>
        </div>
      </div>
    </div>
  </div>
  <!--Save Settings for Personal Information button FINISHED-->
  <h1 class="settings_header">
    <?php echo $page_Lang['areas_of_interest'][$dataUserPageLanguage];?>
  </h1>
  <!--Setting Imput Item STARTED-->
  <div class="set_box">
    <div class="set_box_title">
      <?php echo $page_Lang['choose_interest'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><span class="interBtn" data-type="interested"><?php echo $page_Lang['select_from_list'][$dataUserPageLanguage];?></span></div>
  </div>
  <div class="info_form_items_settings" id="intereset_items">
    <?php 
	   $GetAllUserInterstedItems = $Dot->Dot_GetUserInterestedList($uid);
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
				echo '
				   <span class="intr js-intr js-intr-ids-'.$InterestedIDdata.'" id="'.$UserInterestedTypeValue.'"><span class="icons_tree '.$typesArray[$UserInterestedType].'"></span><span class="intr-txt">'.$page_Lang[$UserInterestedTypeValue][$dataUserPageLanguage].'</span></span>
				'; 
			}
		}
	 ?>
  </div>
  <!--Setting Input Item FINISHED-->
  <h1 class="settings_header">
    <?php echo $page_Lang['secret_information'][$dataUserPageLanguage];?>
  </h1>
  <!--Setting Imput Item STARTED-->
  <div class="set_box prpho" id="userphonenumber">
    <div class="set_box_title">
      <?php echo $page_Lang['phone_number'][$dataUserPageLanguage];?>
    </div>
    <div class="set_input_box"><input type="text" class="inputField insta_font phn" id="phoneNumber" placeholder="<?php echo $page_Lang['phone_number'][$dataUserPageLanguage];?>" value="<?php echo $dataUserPhoneNumber;?>" /></div>
  </div>
  <!--Setting Input Item FINISHED-->
  <!--Save Settings for Personal Information button STARTED-->
  <div class="set_box" id="set_phone" style="display:none;">
    <div class="settings_box_footer">
      <div class="control left_btn"></div>
      <div class="control right_btn">
        <div class="share_post_box save_phone" data-type="usernumber">
          <?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?>
        </div>
      </div>
    </div>
  </div>
  <!--Save Settings for Personal Information button FINISHED-->
</div>  
<script type="text/javascript" src="<?php echo $base_url;?>js/phone/intlTelInput.js"></script>
<script type="text/javascript"> 
var input = document.querySelector("#spphone");
    window.intlTelInput(input, {  
      initialCountry: "auto", 
      utilsScript: "<?php echo $baseurl;?>js/phone/utils.js",
    });
	var iti = intlTelInput(input); 
	iti.setCountry("<?php echo isset($dataCountryPhone) ? strtolower($dataCountryPhone) : 'tr'; ?>"); 
$(document).ready(function(){ 
	
	$("body").on("click",".iti__country", function(){
	    var code = $(this).attr('data-dial-code');
		$('#spphone').val('+'+code+ ' ');
	});
    $("body").on("click",".thloc", function(){
	   var type= $(this).attr("data-type");
	   var f = 'userCountryStateCity';
	   var data = 'f='+f+'&ttip='+type;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() {
			   $("body").append('<span style="position:absolute;bottom:0px;left:0px;width:100%;" class="sls"><span class="progress_blue" id="ccm"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(response) {
			    $("body").append(response);
				 $(".sls").remove();
				 setTimeout(function() {
						$(".social_share_buttons_container").removeClass('openSocial');
					  }, 500);
		  }
		});
	});
   // Select Country
  $("body").on("click",".this-country", function(){
       var get = $(this).attr("data-get");
	   var countrycode = $(this).attr("data-sortname");
	   var on = $(this).attr('data-on');
	   var data = 'f='+get+'&countrycode='+countrycode;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() {
			//$("body").append(preLoaderPopUp);
		  },
		  success: function(response) {
			   if(response !== '1'){   
			       $("#"+on).text(response);
				   $(".search_user_filter_container").addClass("closeSocial");
				   setTimeout(function() {
							$(".search_user_filter_container").remove();
							$(".popupBack").remove();
					}, 500);
			   }
		  }
		});
  });
  // Select Country
  $("body").on("click",".this-city", function(){
       var get = $(this).attr("data-get");
	   var countrycode = $(this).attr("data-cityid");
	   var on = $(this).attr('data-on');
	   var data = 'f='+get+'&city='+countrycode;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() {
			//$("body").append(preLoaderPopUp);
		  },
		  success: function(response) {
			   if(response !== '1'){   
			       $("#"+on).text(response);
				   $(".search_user_filter_container").addClass("closeSocial");
				   setTimeout(function() {
							$(".search_user_filter_container").remove();
							$(".popupBack").remove();
					}, 500);
			   }
		  }
		});
  });
  // Select Country
  $("body").on("click",".this-state", function(){
       var get = $(this).attr("data-get");
	   var countrycode = $(this).attr("data-stateid");
	   var on = $(this).attr('data-on');
	   var data = 'f='+get+'&sta='+countrycode;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() {
			//$("body").append(preLoaderPopUp);
		  },
		  success: function(response) {
			   if(response !== '1'){   
			       $("#"+on).text(response);
				   $(".search_user_filter_container").addClass("closeSocial");
				   setTimeout(function() {
							$(".search_user_filter_container").remove();
							$(".popupBack").remove();
					}, 500);
			   }
		  }
		});
  });
});  
</script>