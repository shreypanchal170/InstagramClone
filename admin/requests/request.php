<?php 
include_once '../../functions/control.php';
include_once '../../functions/inc.php'; 
$arrayRequest = array("websiteSettings","maintencance","websiteApis","users","profile","blockuser","blockUserPopUp","deleteUser","unblockUserPopUp","deletePost_data","user_posts","report_checked","report_delete","user_langs","get_lang","langkeys","wellcomeTheme","lang_key","text_post_feature","image_post_feature","video_post_feature","audio_post_feature","link_post_feature","filter_post_feature","giphy_post_feature","location_post_feature","postPosition","menuPosition","servertype","tlsl","updateSmtp","enable_disable_proflie_card","youmayknowpeople","popularradar","trendtags","saveNewLang","saveNewKey","deleteLang","selectdlang","deleteColor","addNewColor","deleteFont","addNewFont","addGoogleFontLink","editFont","watermark_post_feature","user_can_choose_lang","benchmark_post_feature","user_profile_details","update_user_relationship","update_user_sexuality","update_user_gender","update_user_height","update_user_weight","update_user_life_style","update_user_children","update_user_smoke_habit","update_user_drinking_habit","update_user_body_type","update_user_hair_colour","update_user_eye_color","user_business_and_education","user_new_password","update_user_verify","newWatermark","delete_watermark","moreWatermarks","moreGifs","can_create_ads","biglogo","minilogo","can_create_event","newEventCategory","deleteeventcat","newEventCover","delete_eventcover","user_posts_text","user_posts_image","user_posts_video","user_posts_audio","user_posts_link","user_posts_gif","user_posts_location","user_posts_watermark","user_posts_which","canregister","ipregister","reg_ip_num","header_ads","the_header_ads_code","sidebar_ads","the_sidebar_ads_code","between_post_ads","the_between_post_ads","weather_widget","enable_disable_unlike","newFeelingCategory","deletefeeling","change_active_icon","searchproductf","marketmenum","marketsliderm","newMarketCategory","deletemarketcat","newSlider","delete_slidads","editMarketThemeDescription","newMarketThemeadd","deleteMarketTheme","market_post_feature","before_after_feature","newMarketThemeCategory","ln_id_delete","paypal_mode","paypal_ap","paypal_email","iyzicokeys","bitpay_mode","bitpay_ap","bitpay_update","authorize_update","paystack_mode","paystack_ap","paystack_update","stripe_mode","stripe_update","razorpay_mode","razorpay_ap","razorpay_update","createahowto","aboutusupdate","paid_withdraw","decline_withdraw","delete_withdraw","delete_point","delete_boost","update_user_email_verify","newpropackage","editpackage","editthispackage","avantage_status","delete_this_protype","pro_system_status","updatedefaultsearch","point_system_status","pointSystemMax","pointSystemPoint","point_votes", "point_strs", "point_post_status", "point_comment_status", "point_like_system_status","canonesignal","verificationmail","enable_disable_profiledesign","enable_disable_profilebackground","enable_disable_profilebackgroundSound","cargoDetail","saveNewCargo","delete_this_crg","editIcon","saveIconUpdadte","addNewIcon","saveNewIcon","svNewSvg","shareAnnouncement","editAnnounce","shareEditedAnnouncement","delete_this_announce","announcementstatus","twilioSet","twiliomode","updateGCity","updateGCountry","updateGState","delete_this_city","delete_this_country","delete_this_state","iyzico_mode","iyzico_ap","authorizenet_mode","authorize_ap","fake_generaator","sf_status","razor","strip","paystack","authorize","bitpay","iyzico","payp","video_auto_play_sound","video_auto_play","selectDefaultTheme","stripe_ap");
if(isset($_POST['f']) && in_array($_POST['f'], $arrayRequest)){
    $requestType = mysqli_real_escape_string($db, $_POST['f']);
	/*Fake User Generator*/
	if($requestType == 'fake_generaator') {
		if(isset($_POST['n']) && isset($_POST['p'])){
	       $fakeUserNumber = mysqli_real_escape_string($db, $_POST['n']);
		   $fakeUserPasswords = mysqli_real_escape_string($db, $_POST['p']);	
			require "../../functions/fake-users/vendor/autoload.php";
			$faker = Faker\Factory::create(); 
			$count_users = $fakeUserNumber;
			$password = $fakeUserPasswords; 
		
        for ($i=0; $i < $count_users; $i++) { 
            $genders = array("male", "female");
            $random_keys = array_rand($genders, 1);
            $gender = array_rand(array("male", "female"), 1);
            $gender = $genders[$random_keys];
			
			$fakeUserEmail = $faker->userName . '_' . rand(111, 999) . "@yahoo.com";
			$fakeUserUsername =  $faker->userName . '_' . rand(111, 999);
			$fakeUserPassword = sha1(md5(trim($password)));
			$fakeUserGender = $gender;
			$fakeUserRegisterTime = time();
			$fakeUserLastSeen = time();
			$fakeUserFullName =  $faker->firstName($gender). ' ' .$faker->lastName;
			$fakeuserBithYear = $faker->year($max = 'now');
            $fakeUserBirthMonth = $faker->month($max = 'now');
			$fakeUserBirthDay = ltrim($faker->dayOfMonth($max = 'now'), '0'); 
			$fakeUserCountry = $faker->countryCode;
			$fakeUserLatitude = $faker->latitude($min = -90, $max = 90);
			$fakeUserLongitude = $faker->longitude($min = -180, $max = 180);
			    $GenerateFakeUser = $Dot->Dot_GenerateFakeUsers($uid, $fakeUserEmail,$fakeUserUsername,$fakeUserFullName,$fakeUserGender,$fakeUserPassword,$fakeUserBirthDay,$fakeUserBirthMonth,$fakeuserBithYear,$fakeUserRegisterTime,$fakeUserCountry,$fakeUserLatitude,$fakeUserLongitude); 
	   	  }
		   if($GenerateFakeUser){
		         echo $page_Lang['generated_fake_users'][$dataUserPageLanguage];
			 }else{
			    echo $page_Lang['fake_users_can_not_generated'][$dataUserPageLanguage];
			 }
		}
	}
	// Show More User
	if($requestType == 'users'){
         if(isset($_POST['lastUserID'])){
	         $lastuID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
	         $GetUsers = $Dot->Dot_AllUsers($lastuID );
		     if($GetUsers){
		      foreach($GetUsers as $userData){
			      $dataUserID = $userData['user_id'];
				  $dataUserUserName = $userData['user_name'];
				  $dataUserFullName = $userData['user_fullname'];
				  $dataUserUserIP =  isset($userData['user_ip']) ? $userData['user_ip'] : NULL;
				  $CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserID, $base_url);
				  $CardDataUserCover = $Dot->Dot_UserCover($dataUserID, $base_url); 
				  $CheckFriendStatus = $Dot->Dot_FriendStatus($uid,$dataUserID);
				  $CalculateTheUserPost = $Dot->Dot_UserPostCount($dataUserID);
				  $CalculateTheFriends = $Dot->Dot_UserFriendsCount($dataUserID);
				  $CalculateTheFollowers = $Dot->Dot_UserFollowersCount($dataUserID);
				  $blockedNotBlocked ='<div class="button_general  border-radius block_u" id="'.$dataUserID.'" data-u="'.$dataUserUserName.'" data-ip="'.$dataUserUserIP.'" data-type="blockUserPopUp">'.$page_Lang['block_user_text'][$dataUserPageLanguage].'</div>'; 
				  include("../contents/html_users.php");
			   }
		   } 
		 }
	}
	// Update User Login Password
	if($requestType == 'update_user_verify'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateVerify = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateVerifyStatus($uid, $updateThisUserDetail, $updateVerify);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Login Password
	if($requestType == 'update_user_email_verify'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateVerify = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateEmailVerifyStatus($uid, $updateThisUserDetail, $updateVerify);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Login Password
	if($requestType == 'user_new_password'){
	    if(isset($_POST['pss']) && isset($_POST['thisUser'])){
		    $updateUserPass = mysqli_real_escape_string($db, $_POST['pss']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserPassCode($uid, $updateThisUserDetail, $updateUserPass);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Eye Color
	if($requestType == 'user_business_and_education'){
	    if(isset($_POST['thisUser']) && isset($_POST['userjob']) && isset($_POST['workcampanyname'])&& isset($_POST['scholluniversity'])){
		    $updateUserJob = mysqli_real_escape_string($db, $_POST['userjob']);
			$updateUserWorkCampanyName = mysqli_real_escape_string($db, $_POST['workcampanyname']);
			$updateUserSchollOrUniversity = mysqli_real_escape_string($db, $_POST['scholluniversity']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserSchollandEducations($uid, $updateThisUserDetail, $updateUserJob,$updateUserWorkCampanyName,$updateUserSchollOrUniversity);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Eye Color
	if($requestType == 'update_user_eye_color'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserEyeColorStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Hair Color
	if($requestType == 'update_user_hair_colour'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserHairColorStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Body Type
	if($requestType == 'update_user_body_type'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserBodyTypeStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Smoke Habit
	if($requestType == 'update_user_drinking_habit'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserDrinkHabitStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Smoke Habit
	if($requestType == 'update_user_smoke_habit'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserSmokeHabitStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Have a Children 
	if($requestType == 'update_user_children'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserChildrenStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Life Style 
	if($requestType == 'update_user_life_style'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserLifeStyleStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Weight 
	if($requestType == 'update_user_weight'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserWeightStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Height 
	if($requestType == 'update_user_height'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserHeightStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Gender 
	if($requestType == 'update_user_gender'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserGenderStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User RelationShip 
	if($requestType == 'update_user_relationship'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserRelationShipStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Sexuality 
	if($requestType == 'update_user_sexuality'){
	    if(isset($_POST['thisDetail']) && isset($_POST['thisUser'])){
		    $updateUserRelationShipStatus = mysqli_real_escape_string($db, $_POST['thisDetail']);
			$updateThisUserDetail = mysqli_real_escape_string($db, $_POST['thisUser']);
			$update = $Dot->Dot_UpdateUserSexualityStatus($uid, $updateThisUserDetail, $updateUserRelationShipStatus);
			if($update){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Update User Profile Details
	if($requestType == 'user_profile_details'){ 
	    if(isset($_POST['userfullname']) && isset($_POST['username']) && isset($_POST['userWebsite']) && isset($_POST['userbio']) && isset($_POST['userWord']) && isset($_POST['email']) && isset($_POST['userID'])){
	        $updateUserFullname = mysqli_real_escape_string($db, $_POST['userfullname']);
			$updateUserName = mysqli_real_escape_string($db, $_POST['username']);
			$updateUserWebsite = mysqli_real_escape_string($db, $_POST['userWebsite']);
			$updateUserBio = htmlcode(mysqli_real_escape_string($db, $_POST['userbio']));
			$updateUserLikedWord = htmlcode(mysqli_real_escape_string($db, $_POST['userWord']));
			$updateUserEmail = mysqli_real_escape_string($db, $_POST['email']);
			$updateThisUserID = mysqli_real_escape_string($db, $_POST['userID']);
			$upbi = htmlcode($updateUserBio);
			$updateUserDetails = $Dot->Dot_UpdateUserProfileInformations($uid, $updateThisUserID, $updateUserFullname, $updateUserName, $updateUserWebsite, $upbi, $updateUserLikedWord, $updateUserEmail);
			if($updateUserDetails){
			     echo $page_Lang['information_changed_success'][$dataUserPageLanguage];
			}else{
			    echo $page_Lang['information_not_changed'][$dataUserPageLanguage];
			}
		}
	}
	// Show More User Posts
	if($requestType == 'user_posts'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						  'p_text' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg>',
												  'p_image' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#d65039"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg>',
												  'p_link' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#4ab37c"><path d="M96,16c-29.536,0 -55.31588,16.128 -69.17188,40h19.53125c7.2,-8.896 16.59525,-15.93638 27.53125,-19.98438c-2.504,5.824 -4.51087,12.62438 -6.04687,19.98438h16.45312c3.832,-15.816 9.19913,-24 11.70313,-24c2.504,0 7.87113,8.184 11.70313,24h16.45312c-1.536,-7.36 -3.55087,-14.16038 -6.04687,-19.98438c10.928,4.048 20.33125,11.08838 27.53125,19.98438h19.53125c-13.856,-23.872 -39.63587,-40 -69.17187,-40zM8,72l9.9375,48h10.46875l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM68.82812,72l9.9375,48h10.46875l6.79687,-27.76562l6.78125,27.76562h10.42188l9.9375,-48h-12.01562l-4.3125,26.92187l-6.375,-26.92187h-8.92188l-6.39062,26.96875l-4.26562,-26.96875zM129.65625,72l9.9375,48h10.46874l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM26.82812,136c13.856,23.872 39.63588,40 69.17188,40c29.536,0 55.31587,-16.128 69.17187,-40h-19.53125c-7.2,8.896 -16.59525,15.93638 -27.53125,19.98438c2.496,-5.824 4.49525,-12.62438 6.03125,-19.98438h-16.45312c-3.832,15.816 -9.19913,24 -11.70313,24c-2.504,0 -7.8555,-8.184 -11.6875,-24h-16.45312c1.536,7.36 3.55087,14.16038 6.04687,19.98438c-10.928,-4.048 -20.33125,-11.08838 -27.53125,-19.98438z"></path></g></g></svg>',
												  'p_avatar' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'p_cover' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#f1c40f"><path d="M48,16c-8.8,0 -16,7.2 -16,16v128c0,8.8 7.2,16 16,16h96c8.84,0 16,-7.16 16,-16v-128c0,-8.84 -7.16,-16 -16,-16zM48,32h96v128h-96zM64,48v16h64v-16zM64,80v8v56h64v-64zM80,96h32v32h-32z"></path></g></g></svg>',
												  'p_video' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="21" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M102.4,19.2c-14.1376,0 -25.6,11.4624 -25.6,25.6c0,14.1376 11.4624,25.6 25.6,25.6c14.1376,0 25.6,-11.4624 25.6,-25.6c0,-14.1376 -11.4624,-25.6 -25.6,-25.6zM38.4,32c-10.6048,0 -19.2,8.5952 -19.2,19.2c0,10.6048 8.5952,19.2 19.2,19.2c10.6048,0 19.2,-8.5952 19.2,-19.2c0,-10.6048 -8.5952,-19.2 -19.2,-19.2zM25.6,83.2c-7.072,0 -12.8,5.728 -12.8,12.8v64c0,7.072 5.728,12.8 12.8,12.8h89.6c7.072,0 12.8,-5.728 12.8,-12.8v-64c0,-7.072 -5.728,-12.8 -12.8,-12.8zM172.8,89.6c-1.26906,0.00128 -2.50909,0.37981 -3.5625,1.0875l-28.4375,18.1125v19.2v19.2l28.35,18.0625c0.10237,0.06545 0.20657,0.12798 0.3125,0.18749c1.00378,0.61798 2.15874,0.94673 3.3375,0.95c3.53462,0 6.4,-2.86538 6.4,-6.4v-32v-32c0,-3.53462 -2.86538,-6.4 -6.4,-6.4z"></path></g></g></svg>',
												  'p_audio' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#a073ac"><path d="M96,16c-39.696,0 -72,32.304 -72,72v64c0,8.84 7.16,16 16,16h24v-56h-24v-24c0,-30.88 25.12,-56 56,-56c30.88,0 56,25.12 56,56v24h-24v56h24c8.84,0 16,-7.16 16,-16v-64c0,-39.696 -32.304,-72 -72,-72z"></path></g></g></svg>',
												  'p_gif' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8e24aa"><path d="M54,24c-9.87038,0 -18,8.12962 -18,18v54h12v-54c0,-3.37762 2.62238,-6 6,-6h54v36h36v24h12v-32.48437l-39.51563,-39.51563zM120,44.48437l15.51563,15.51563h-15.51563zM54,108c-9.87038,0 -18,8.12962 -18,18v12v12c0,9.87037 8.12962,18 18,18c9.87038,0 18,-8.12963 18,-18v-6h-18v12c-3.37762,0 -6,-2.62237 -6,-6v-12v-12c0,-3.37763 2.62238,-6 6,-6c3.37762,0 6,2.62237 6,6h12c0,-9.87038 -8.12962,-18 -18,-18zM84,108v60h12v-60zM108,108v60h12v-24h12v-12h-12v-12h24v-12z"></path></g></g></svg>',
												  'u_following' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3b8ede"><path d="M131.2,19.2c-13.6064,0 -16,9.6 -16,9.6c-4.7552,0 -8.5557,1.7804 -11.5125,4.75c3.2768,7.0528 5.1125,15.1796 5.1125,24.05c0,4.4544 -0.883,8.7754 -1.875,12.225c1.3248,3.1296 1.9754,6.8922 1.425,11.225c-0.6656,5.216 -2.2404,9.2378 -4.25,12.425c1.2224,3.5264 3.4664,7.1392 5.7,10c10.0736,-8.6272 23.128,-13.875 37.4,-13.875c4.0384,0 7.9795,0.4314 11.7875,1.225c0.0576,-0.3008 0.1555,-0.6242 0.1875,-0.925c2.2656,-0.1728 5.8254,-2.2513 6.875,-10.4625c0.56321,-4.4032 -1.6682,-6.8817 -3.025,-7.6625c0,0 3.375,-7.1094 3.375,-14.175c0,-20.9856 -12.8768,-38.4 -35.2,-38.4zM60.8,19.2125c-13.6064,0 -16,9.6 -16,9.6c-13.1008,0 -19.2,13.2608 -19.2,28.8c0,7.7504 3.375,14.1625 3.375,14.1625c-1.3568,0.7808 -3.5882,3.2529 -3.025,7.6625c1.0496,8.2112 4.6094,10.3022 6.875,10.475c0.864,7.6608 9.095,17.4603 11.975,18.8875v12.8c-6.4,19.2 -44.8,6.4 -44.8,51.2h95.675c-3.8592,-7.7248 -6.075,-16.3968 -6.075,-25.6c0,-4.7424 0.6434,-9.3279 1.725,-13.7375c-6.656,-2.6112 -12.3874,-5.4497 -14.525,-11.8625v-12.8c2.88,-1.4272 11.111,-11.2328 11.975,-18.9c2.2656,-0.1728 5.8254,-2.2513 6.875,-10.4625c0.5632,-4.4032 -1.6682,-6.8817 -3.025,-7.6625c0,0 3.375,-7.1094 3.375,-14.175c0,-20.9856 -12.8768,-38.3939 -35.2,-38.3875zM147.2,102.4c-24.7424,0 -44.8,20.0576 -44.8,44.8c0,24.7424 20.0576,44.8 44.8,44.8c24.7424,0 44.8,-20.0576 44.8,-44.8c0,-24.7424 -20.0576,-44.8 -44.8,-44.8zM147.2,121.6c3.5328,0 6.4,2.8608 6.4,6.4v12.8h12.8c3.5328,0 6.4,2.8608 6.4,6.4c0,3.5392 -2.8672,6.4 -6.4,6.4h-12.8v12.8c0,3.5392 -2.8672,6.4 -6.4,6.4c-3.5328,0 -6.4,-2.8608 -6.4,-6.4v-12.8h-12.8c-3.5328,0 -6.4,-2.8608 -6.4,-6.4c0,-3.5392 2.8672,-6.4 6.4,-6.4h12.8v-12.8c0,-3.5392 2.8672,-6.4 6.4,-6.4z"></path></g></g></svg>',
												  'p_location' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#1E88E5"><path d="M133.5,3c-22.8,0 -41.25,18.45059 -42,41.85059c-0.6,21.75 20.25117,50.39941 32.70117,65.39941c2.4,2.85 5.69883,4.35059 9.29883,4.35059c3.6,0 6.89883,-1.65059 9.29883,-4.35059c12.45,-15.15 33.45117,-43.64941 32.70117,-65.39941c-0.75,-23.4 -19.2,-41.85059 -42,-41.85059zM79.0957,11.42871c-0.31055,0.00762 -0.62754,0.04512 -0.94629,0.12012c-27,5.85 -49.19941,23.40117 -60.89941,48.45117c-9.75,21 -10.80059,44.70117 -2.85059,66.45117c7.95,21.75 23.85,39.29883 45,49.04883c11.7,5.4 24.15,8.25 36.75,8.25c10.05,0 20.10059,-1.8 29.85059,-5.25c21.9,-7.95 39.29883,-23.85 49.04883,-45c4.2,-9 6.75176,-18.45117 7.80175,-28.20117c0.3,-2.4 -1.50176,-4.64824 -4.05175,-4.94824c-2.4,-0.3 -4.64825,1.49883 -4.94825,4.04883c-0.9,8.7 -3.14942,17.25059 -6.89942,25.35059c-8.85,18.9 -24.45117,33.15059 -43.95117,40.35058c-19.5,7.05 -40.79883,6.14825 -59.54883,-2.55175c-2.85,-1.35 -5.55,-2.85 -8.25,-4.5c2.55,-0.15 5.24941,-0.9 7.64941,-2.25c2.7,-1.5 5.54824,-3.29942 8.69824,-5.39942c2.1,-1.5 3.9,-3.44825 5.25,-5.69824c1.5,-2.7 3.30117,-5.55058 4.20117,-8.85058c5.85,-22.5 -13.65,-23.40059 -14.25,-28.35059c-0.6,-5.55 6.60117,-9.75059 10.95117,-14.10059c4.35,-4.35 5.69824,-11.1 3.44824,-15c-7.2,-12.9 -24.29824,-6.15059 -25.94824,7.64941c-0.9,8.25 -5.85176,16.65 -10.05176,21c-4.2,4.2 -12.44824,1.95176 -14.69824,-4.19824c-2.55,-6.9 6.29824,-9.45176 4.94824,-18.30176c-0.3,-2.4 -2.85,-3.59883 -6,-4.04883l-10.35059,0.29883c1.05,-7.5 3.30059,-14.85 6.60059,-21.75c10.2,-22.65 30.15117,-38.39941 54.45117,-43.64942c2.4,-0.45 4.04824,-2.84941 3.44824,-5.39941c-0.39375,-2.1 -2.2793,-3.62461 -4.45312,-3.57129zM133.5,30c8.25,0 15,6.75 15,15c0,8.25 -6.75,15 -15,15c-8.25,0 -15,-6.75 -15,-15c0,-8.25 6.75,-15 15,-15z"></path></g></g></svg>', 
												  'p_watermark' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1"></path><g id="Layer_1" stroke="none" stroke-width="1"><g id="surface1_121_"><path d="M96,16v80l-40,-69.276z" fill="#e91e63"></path><path d="M136,26.724l29.276,29.276l-69.276,40z" fill="#ff5722"></path><path d="M96,16l40,10.724l-40,69.276z" fill="#f44336"></path><path d="M96,176v-80l40,69.276z" fill="#8bc34a"></path><path d="M56,165.276l-29.276,-29.276l69.276,-40z" fill="#03a9f4"></path><path d="M96,176l-40,-10.724l40,-69.276z" fill="#4caf50"></path><path d="M176,96h-80l69.276,-40z" fill="#ff9800"></path><path d="M165.276,136l-29.276,29.276l-40,-69.276z" fill="#ffeb3b"></path><path d="M176,96l-10.724,40l-69.276,-40z" fill="#ffc107"></path><path d="M16,96h80l-69.276,40z" fill="#3f51b5"></path><path d="M26.724,56l29.276,-29.276l40,69.276z" fill="#9c27b0"></path><path d="M16,96l10.724,-40l69.276,40z" fill="#673ab7"></path></g></g><g fill="#ffffff" stroke="none" stroke-width="1"><path d="M90.825,117.19l-2.63,-10.04h-13.51l-2.63,10.04h-10.48l15.33,-49.05h9.06l15.43,49.05zM81.425,81.41l-4.59,17.49h9.17zM132.425,117.19h-9.6c-0.26667,-0.56 -0.53667,-1.50333 -0.81,-2.83v0c-1.70667,2.33333 -4.02,3.5 -6.94,3.5v0c-3.05333,0 -5.58333,-1.01 -7.59,-3.03c-2.01333,-2.02 -3.02,-4.63667 -3.02,-7.85v0c0,-3.82 1.22,-6.77333 3.66,-8.86c2.43333,-2.08667 5.94,-3.15333 10.52,-3.2v0h2.9v-2.93c0,-1.64 -0.28,-2.79667 -0.84,-3.47c-0.56,-0.67333 -1.38,-1.01 -2.46,-1.01v0c-2.38,0 -3.57,1.39333 -3.57,4.18v0h-9.54c0,-3.37333 1.26333,-6.15333 3.79,-8.34c2.52667,-2.19333 5.72333,-3.29 9.59,-3.29v0c4,0 7.09333,1.04 9.28,3.12c2.19333,2.07333 3.29,5.04333 3.29,8.91v0v17.15c0.04,3.14667 0.48667,5.60667 1.34,7.38v0zM117.205,110.38v0c1.05333,0 1.95,-0.21333 2.69,-0.64c0.74,-0.42667 1.29,-0.93 1.65,-1.51v0v-7.58h-2.29c-1.61333,0 -2.88667,0.51667 -3.82,1.55c-0.93333,1.03333 -1.4,2.41333 -1.4,4.14v0c0,2.69333 1.05667,4.04 3.17,4.04z"></path></g><path d="M51.575,127.86v-69.72h90.85v69.72z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0"></path></g></svg>', 
												  'p_which' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#B71C1C"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>'
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show User Profile From Right Sidebar with PopUp
	if($requestType == 'profile'){ 
	    if(isset($_POST['user'])){
		 	$showUser = mysqli_real_escape_string($db, $_POST['user']);
			$userQuery = $Dot->Dot_ShowThisUser($showUser); 
			if($userQuery){
		        foreach($userQuery as $dataProfile){
				   $userProfileID = $dataProfile['user_id'];
				   $userProfileGender = $dataProfile['user_gender'];
				   $userRealationShipStatus = $dataProfile['user_relationship'];
				   $userProfileUserUserName = $dataProfile['user_name'];
				   $userProfileWebsite = $dataProfile['user_website'];
				   $userProfileBio = $dataProfile['user_bio'];
				   $userProfileUserFullName = $dataProfile['user_fullname'];
				   $userProfileWordRight= $dataProfile['user_profile_word'];
				   $userProfileUserEmail = $dataProfile['user_email'];
				   $userProfileUserSexuality = $dataProfile['user_sexuality'];
				   $userProfileUserHeight = $dataProfile['user_height'];
				   $userProfileUserWeight = $dataProfile['user_weight'];
				   $userProfileBodyType = $dataProfile['user_body_type'];
				   $userProfileUserHair = $dataProfile['user_hair_color'];
				   $userProfileUserEyeColor = $dataProfile['user_eye_color'];
				   $userProfileUserLifeSyle = $dataProfile['user_life_style'];
				   $userProfileUserChildren = $dataProfile['user_children'];
				   $userProfileSmoking = $dataProfile['user_smoke'];
				   $userProfileUserDrinking = $dataProfile['user_drink'];
				   $userProfileJobTitle = $dataProfile['user_job_title']; 
				   $userProfileVerified = $dataProfile['verified_user'];
				   $userProfileVerifiedEmail = $dataProfile['email_verification'];
				   $userBadge = '';
					if($userProfileVerified == '1'){
					   $userBadge = '<span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="'.$page_Lang['verified'][$dataUserPageLanguage].'"></span>';
					}
				   $userProfileUserIP =  isset($dataProfile['user_ip']) ? $dataProfile['user_ip'] : NULL;
				   $userProfileCampanyWorkingName = $dataProfile['user_job_company_name'];
				   $userProfileUserUniversity = $dataProfile['user_school_university'];
				   $userProfileDataUserAvatar = $Dot->Dot_UserAvatar($userProfileID, $base_url);
				   $userProfileDataUserCover = $Dot->Dot_UserCover($userProfileID, $base_url); 
				   $userProfileCheckFriendStatus = $Dot->Dot_FriendStatus($uid,$userProfileID);
				   $userProfileCalculateTheUserPost = $Dot->Dot_UserPostCount($userProfileID);
				   $userProfileCalculateTheFriends = $Dot->Dot_UserFriendsCount($userProfileID);
				   $userProfileCalculateTheFollowers = $Dot->Dot_UserFollowersCount($userProfileID);
				   include("../contents/html_user_profile.php");
				}
			}
	    }
	}
	// More Language Key
	if($requestType == 'user_langs'){
		if(isset($_POST['lastUserID'])){
				 $lastLangID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
				 $getLanguages = $Dot->Dot_AllLanguagesData($lastLangID);
				   if($getLanguages){
					  foreach($getLanguages as $pageLangData){
						  $dataLangID = $pageLangData['lang_id'];
						  $dataLangKey = $pageLangData['lang_key'];
						  $dataLangDefault = $pageLangData['english'];
						  include("../contents/html_langs_data.php");
					   }
				   }
			 }
	}
	// More Watermarks Key
	if($requestType == 'moreWatermarks'){
		if(isset($_POST['lastUserID'])){
			 $LastWaterMarkID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $AllWaterMarks = $Dot->Dot_AdminWatermarkLists($LastWaterMarkID); 
			 if($AllWaterMarks){
				 foreach($AllWaterMarks as $WaterMarkData){
					   $WaterMarkID = $WaterMarkData['watermark_id'];
					   $WaterMarkKey = $WaterMarkData['watermark_name'];
					   $WaterMarkStyle = $WaterMarkData['watermark_text_color'];
					   $WaterMarkImage = $WaterMarkData['watermark_image'];
					   $WaterMark_Image = $base_url.'uploads/watermarkbg/'.$WaterMarkImage;	 
					  include("../contents/html_watermarks.php");
				}
			 } 
		 }
	}
	// More Watermarks Key
	if($requestType == 'moreGifs'){
		if(isset($_POST['lastUserID'])){
			 $lastStickerID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $AllStickers = $Dot->Dot_AdminGifLists($lastStickerID); 
			 if($AllStickers){
				 foreach($AllStickers as $stickerData){
					   $stickerID = $stickerData['emoji_id'];
					   $stickerKey = $stickerData['emoji_key'];
					   $stickerStyle = $stickerData['emoji_style'];
					   $stickerImage = $stickerData['image'];
					   $sticker = $base_url.'uploads/gifs/'.$stickerImage;	 
					  include("../contents/html_gifs_data.php");
			 }
			 } 
		 }
	}
	//Block PopUp Append
	if($requestType == 'blockUserPopUp'){ 
        if(isset($_POST['uid']) && isset($_POST['username']) && isset($_POST['ip'])){
		      $blockUserID = mysqli_real_escape_string($db, $_POST['uid']);
			  $blockUserName = mysqli_real_escape_string($db, $_POST['username']);
			  $reportedUserIP = mysqli_real_escape_string($db, $_POST['ip']);
			  $CheckUserExistFromData = $Dot->Dot_CheckUserExist($blockUserID, $blockUserName);
			  if($CheckUserExistFromData){
			      echo '
					    <div class="reportPostContainer">
						    <div class="closeReport"></div>
							<div class="reportPos_Wrap">
							   <div class="reportPos-modal-middle">
									<div class="reportTextTitle">'. $page_Lang['block_this_user_from_website'][$dataUserPageLanguage].'</div>
									<div class="reporTextInfo">'. $page_Lang['block_user_note'][$dataUserPageLanguage].' </div>
									<div class="reportQuestion">'. $page_Lang['what_is_wrong'][$dataUserPageLanguage].'</div>
									<div class="repor_item_List">
									   <div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-1" value="76" name="report"><label for="ckbx-circle-2-1"></label></div>
											  <label for="ckbx-circle-2-1"><div class="rptype">'. $page_Lang['report_one'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-2" value="77" name="report"><label for="ckbx-circle-2-2"></label></div>
											  <label for="ckbx-circle-2-2"><div class="rptype">'. $page_Lang['report_two'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-3" value="78" name="report"><label for="ckbx-circle-2-3"></label></div>
											  <label for="ckbx-circle-2-3"><div class="rptype">'. $page_Lang['report_tree'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-4" value="79" name="report"><label for="ckbx-circle-2-4"></label></div>
											  <label for="ckbx-circle-2-4"><div class="rptype">'. $page_Lang['report_four'][$dataUserPageLanguage].'</div></label>
											</div>
											<div class="report-section">
											  <div class="ckbx-circle-2"><input type="radio" id="ckbx-circle-2-5" value="80" name="report"><label for="ckbx-circle-2-5"></label></div>
											  <label for="ckbx-circle-2-5"><div class="rptype">'. $page_Lang['report_five'][$dataUserPageLanguage].'</div></label>
											</div>  
									</div>
									<div class="block_user_Button" data-un="'.$blockUserName.'" data-ui="'.$blockUserID.'" data-p="'.$reportedUserIP.'" data-type="blockuser"><span class="flag">'. $page_Lang['block_user_text'][$dataUserPageLanguage].'</span></div>
							   </div>
							</div>
						</div>
					 ';
			  }
		}
	}
	if($requestType == 'unblockUserPopUp'){
	    if(isset($_POST['user'])){
	         $removeBlockUserID = mysqli_real_escape_string($db, $_POST['user']);
			 $removeBlockUserQuery = $Dot->Dot_removeFromBlockList($uid,$removeBlockUserID);
			 if($removeBlockUserQuery){
		         echo '1';
			 }
		 }
	}
	//Block User From Data
	if($requestType == 'blockuser'){ 
	   if(isset($_POST['user']) && isset($_POST['u_nam']) && isset($_POST['ip']) && isset($_POST['because'])){
	         $blockThisUserID = mysqli_real_escape_string($db, $_POST['user']);
			 $blockThisUserName = mysqli_real_escape_string($db, $_POST['u_nam']);
			 $blockThisUserIP = mysqli_real_escape_string($db, $_POST['ip']);
			 $blockThisUserBecause = mysqli_real_escape_string($db, $_POST['because']);
			 $blockUserIP =  $Dot->Dot_BlockUserIP($uid, $blockThisUserID, $blockThisUserName, $blockThisUserIP,$blockThisUserBecause);
			 if($blockUserIP){
		         echo '1';
			 }
	   }
	}
	// Delete User From Data
	if($requestType == 'deleteUser'){
         if(isset($_POST['user'])){
	         $deleteUserID = mysqli_real_escape_string($db, $_POST['user']);
			 $deleteUserQuery = $Dot->Dot_BecomeDeleteUserAccount($uid,$deleteUserID);
			 if($deleteUserQuery){
		         echo '1';
			 }
		 }
	}
	// Delete Post From Database
	if($requestType == 'deletePost_data'){
		if(isset($_POST['user']) && isset($_POST['postID'])){
				 $deleteThisUserID = mysqli_real_escape_string($db, $_POST['user']);
				 $deleteThisPostID = mysqli_real_escape_string($db, $_POST['postID']); 
				 $deleteUserPostFromData =  $Dot->Dot_DeletePostAdmin($uid, $deleteThisUserID, $deleteThisPostID);
				 if($deleteUserPostFromData){
					 echo '1';
				 }
		   }
	} 
	// Update Reported Post Status 
	if($requestType == 'report_checked'){
	      if(isset($_POST['reportID'])){ 
				 $reportID = mysqli_real_escape_string($db, $_POST['reportID']); 
				 $UpdateBeenCheckedReportedPost =  $Dot->Dot_UpdateReportChecked($uid,$reportID);
				 if($UpdateBeenCheckedReportedPost){
					 echo '1';
				 }
		   }  
	} 
	// Report Delete with Post
	if($requestType == 'report_delete'){
	    if(isset($_POST['rep_id']) && isset($_POST['postid'])){ 
				 $reportID = mysqli_real_escape_string($db, $_POST['rep_id']); 
				 $reporPosttID = mysqli_real_escape_string($db, $_POST['postid']); 
				 $deleteReportedPostwithReport =  $Dot->Dot_DeleteReportedPost($uid,$reportID,$reporPosttID);
				 if($deleteReportedPostwithReport){
					 echo '1';
				 }
		   }  
	}
	// Get Wanted to Change Language Key
	if($requestType == 'get_lang'){
	     if(isset($_POST['getvalue']) && isset($_POST['key'])) {
		     echo ' 
				<div class="poStListmEnUBox">
					<div class="drawer peepr-drawer-container open">
						<div class="peepr-drawer">
							 <div class="peepr-body">
								  <div class="indash_blog">
									   <div class="userProfileRightHeader">Edit Langauge<div class="closeProfileRight">'.$Dot->Dot_SelectedMenuIcon('close_icons').'</div></div>
									   <div class="not_new_not_lang"> ';
									          $languageID = mysqli_real_escape_string($db, $_POST['getvalue']);
											  $languageKey = mysqli_real_escape_string($db, $_POST['key']);
											  $EditLangKey = $Dot->Dot_LangKeysValues();
											  if($EditLangKey){
												  echo '<div class="editKey border-radius">Edit Key: '.$languageKey.'</div>';
												  foreach($EditLangKey as $keyColumn){
													  $lang_name = $keyColumn['Field'];
													  $flag = array($lang_name => $base_url.'uploads/flags/'.$lang_name.'.png');
													  $languageKeysValuesIDs = $Dot->Dot_AllLangKeysValues($languageID);
													  echo '<div class="this_language"><div class="this_lang_flag"><img src="'.$flag[$lang_name].'"></div>'.$lang_name.'</div>';
													  if($languageKeysValuesIDs){
														  foreach($languageKeysValuesIDs as $datLan){
															   $key = $datLan[$lang_name];
															   echo '<div class="this_key" id="'.$lang_name.'_"><textarea type="text" class="lang_value" id="'.$lang_name.'" data-id="'.$languageID.'" data-key="'.$languageKey.'" rows="3">'.$key.'</textarea></div>';
														  } 
													  } 
												  }
											 } 
						  echo '   
						             </div> 
								  </div> 
							 </div>
						</div>
					</div>
				</div>';
 		 }
	} 
	// Update Language Key
	if($requestType == 'langkeys'){  
	    if(isset($_POST['this_lng']) && isset($_POST['lang_id']) && isset($_POST['word']) && isset($_POST['thisky'])){
		     $thisLang = mysqli_real_escape_string($db, $_POST['this_lng']);
		     $updateID = mysqli_real_escape_string($db, $_POST['lang_id']);
			 $updateWord = mysqli_real_escape_string($db, $_POST['word']);
			 $updateKey = mysqli_real_escape_string($db, $_POST['thisky']);   
			 $updateValues = $Dot->Dot_UpdateLanguageKeyValue($uid,$thisLang, $updateID, $updateWord,$updateKey);   
			 if($updateValues){
				 echo $page_Lang['changed_word'][$dataUserPageLanguage];
		     }
		}
	}
	// Change Wellcome Theme
	if($requestType == 'wellcomeTheme'){
	  if(isset($_POST['well_theme'])){
	      $themeName = mysqli_real_escape_string($db, $_POST['well_theme']);
		  if($themeName !== ''){
		      $changeWellcomeTheme = $Dot->Dot_ChangeWellcomePageTheme($uid, $themeName);
			  if($changeWellcomeTheme){
			      echo 'ok';
			  } 
		  } 
	  }
	}
	// Search Language Key
	if($requestType == 'lang_key'){
	     if(isset($_POST['translateKey'])){
			$transLateKey = mysqli_real_escape_string($db, $_POST['translateKey']);
			$searchKeyT =  $Dot->Dot_SearchTranslateKey($uid, $transLateKey);   
		    if($searchKeyT){ 
			    foreach($searchKeyT as $tkey){
				     $languageID = $tkey['lang_id'];
					 $languageKey = $tkey['lang_key'];
					 $languageEnglish = $tkey['english'];
					 echo '
					  <div class="divTableRow news body'.$languageID.'" id="post_'.$languageID.'" data-last="'.$languageID.'"> 
							<div class="divTableCell bold">'.$languageID.'</div>
							<div class="divTableCell"><div class="tableincontainer"><div class="publicher_name">'.$languageKey.'</div></div></div>
							<div class="divTableCell"><div class="tableincontainer"><div class="see_post" id="word_'.$languageID.'">'.$languageEnglish.'</div></div></div> 
							<div class="divTableCell hvr-sweep-to-right-orange block edit_lang_values" id="'.$languageID.'" data-type="get_lang" data-key="'.$languageKey.'"><div class="tableincontainer bold" style="text-align:center;font-size:14px;">Edit</div></div> 
					 </div>
					 ';
				} 
			}
		 }
	}
	// Features Settings 
	if($requestType == 'text_post_feature'){
	    if(isset($_POST['mode'])){
		    $textPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_TextPostMode($uid, $textPostMode);
			if($saveMode){
			   if($textPostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'image_post_feature'){
	    if(isset($_POST['mode'])){
		    $ImagePostMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_ImagePostMode($uid, $ImagePostMode);
			if($saveMode){
			   if($ImagePostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'video_post_feature'){
	    if(isset($_POST['mode'])){
		    $VideoPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_VideoPostMode($uid, $VideoPostMode);
			if($saveMode){
			   if($VideoPostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'paypal_mode'){
	    if(isset($_POST['mode'])){
		    $paypalMod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PayPal_Mode($uid, $paypalMod);
			if($saveMode){
			   if($paypalMod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'iyzico_mode'){
	    if(isset($_POST['mode'])){
		    $iyziCoMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_IyziCoMode($uid, $iyziCoMode);
			if($saveMode){
			   if($iyziCoMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else { 
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'iyzico_ap'){
	    if(isset($_POST['mode'])){
		    $iyziCoMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_IyziCoOnOf($uid, $iyziCoMode);
			if($saveMode){
			   if($iyziCoMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else { 
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'paypal_ap'){
	    if(isset($_POST['mode'])){
		    $paypalAp = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PayPal_AP($uid, $paypalAp);
			if($saveMode){
			   if($paypalAp == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'bitpay_mode'){
	    if(isset($_POST['mode'])){
		    $paypalMod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_BitPay_Mode($uid, $paypalMod);
			if($saveMode){
			   if($paypalMod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'bitpay_ap'){
	    if(isset($_POST['mode'])){
		    $BitPayAp = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_BitPay_AP($uid, $BitPayAp);
			if($saveMode){
			   if($BitPayAp == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'paystack_mode'){
	    if(isset($_POST['mode'])){
		    $payStackMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PayStack_Mode($uid, $payStackMode);
			if($saveMode){
			   if($payStackMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'paystack_ap'){
	    if(isset($_POST['mode'])){
		    $PayStackAp = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PayStack_AP($uid, $PayStackAp);
			if($saveMode){
			  if($PayStackAp == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'stripe_mode'){
	    if(isset($_POST['mode'])){
		    $StripeMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_Stripe_Mode($uid, $StripeMode);
			if($saveMode){
			   if($StripeMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	
	if($requestType == 'audio_post_feature'){
	    if(isset($_POST['mode'])){
		    $AudioPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_AudioPostMode($uid, $AudioPostMode);
			if($saveMode){
			   if($AudioPostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'link_post_feature'){
	    if(isset($_POST['mode'])){
		     $LinkPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_LinkPostMode($uid, $LinkPostMode);
			 if($saveMode){
			   if($LinkPostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	if($requestType == 'filter_post_feature'){
	     if(isset($_POST['mode'])){
		     $FilterImagePostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_FilterImagePostMode($uid, $FilterImagePostMode);
			 if($saveMode){
			   if($FilterImagePostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'before_after_feature'){
	     if(isset($_POST['mode'])){
		     $FilterImagePostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_BeforeAfterPostMode($uid, $FilterImagePostMode);
			 if($saveMode){
			   if($FilterImagePostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	
	if($requestType == 'giphy_post_feature'){
	     if(isset($_POST['mode'])){
		     $GifPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_GiphyPostMode($uid, $GifPostMode);
			 if($saveMode){
			   if($GifPostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'header_ads'){
	     if(isset($_POST['mode'])){
		     $featureMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_HeaderAdsCode($uid, $featureMode);
			 if($saveMode){
			   if($featureMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'sidebar_ads'){
	     if(isset($_POST['mode'])){
		     $featureMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_SidebarAdsCode($uid, $featureMode);
			 if($saveMode){
			   if($featureMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'between_post_ads'){
	     if(isset($_POST['mode'])){
		     $featureMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_BetwenPostAdsCode($uid, $featureMode);
			 if($saveMode){
			   if($featureMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'location_post_feature'){
	     if(isset($_POST['mode'])){
		     $LocationPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_LocationPostMode($uid, $LocationPostMode);
			 if($saveMode){
			   if($LocationPostMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'watermark_post_feature'){
	     if(isset($_POST['mode'])){
		     $WatPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_WaterMarkPostMode($uid, $WatPostMode);
			 if($saveMode){
			   if($WatPostMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'benchmark_post_feature'){
	     if(isset($_POST['mode'])){
		     $BenchmarkPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_BenchmarkPostMode($uid, $BenchmarkPostMode);
			 if($saveMode){
			   if($BenchmarkPostMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'market_post_feature'){
	     if(isset($_POST['mode'])){
		     $BenchmarkPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_MarketPostMode($uid, $BenchmarkPostMode);
			 if($saveMode){
			    if($BenchmarkPostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
					 echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'enable_disable_proflie_card'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_ShowHideProfileCardFeature($uid, $showHideCard);
			 if($saveMode){
			    if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'youmayknowpeople'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_ShowHideYouMayKnowFeature($uid, $showHideCard);
			 if($saveMode){
			    if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'popularradar'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_ShowHideRadarFeature($uid, $showHideCard);
			 if($saveMode){
			    if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'trendtags'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_ShowHideHashTagsFeature($uid, $showHideCard);
			 if($saveMode){
			    if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'can_create_ads'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_ShowHideHashUserCreateAdvertisementPageFeature($uid, $showHideCard);
			 if($saveMode){
			   if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'can_create_event'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_IsUserCanCreateAnEvent($uid, $showHideCard);
			 if($saveMode){
			    if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'weather_widget'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_EnableDisableWeather($uid, $showHideCard);
			 if($saveMode){
			    if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'enable_disable_unlike'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_EnableDisableUnlikeButton($uid, $showHideCard);
			 if($saveMode){
			   if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'postPosition'){
	     if(isset($_POST['position'])){
		     $positionPost = mysqli_real_escape_string($db, $_POST['position']);
			 $savePosition = $Dot->Dot_PostListPosition($uid, $positionPost);
			 if($savePosition){
			   echo '1';
			}
		 }
	}
	if($requestType == 'menuPosition'){
	     if(isset($_POST['position'])){
		     $positionPost = mysqli_real_escape_string($db, $_POST['position']);
			 $savePosition = $Dot->Dot_MenuPostiion($uid, $positionPost);
			 if($savePosition){
			   echo '1';
			}
		 }
	}
	
	/*Save Website Settings*/
	if($requestType == 'websiteSettings'){  
	     if(isset($_POST['wn']) && isset($_POST['ww']) && isset($_POST['wi']) && isset($_POST['wt'])){
			 $websiteName = mysqli_real_escape_string($db, $_POST['wn']);
			 $websiteKeyword = mysqli_real_escape_string($db, $_POST['ww']);
			 $websiteInformation = mysqli_real_escape_string($db, $_POST['wi']);
			 $websiteTitle = mysqli_real_escape_string($db, $_POST['wt']);
			 $saveWebsiteSettings = $Dot->Dot_UpdateWebsiteSetting($uid,$websiteName,$websiteKeyword,$websiteInformation,$websiteTitle);
			 if($saveWebsiteSettings){
				 echo '1';
			 }else{
			    echo '2';
			 }
		 }
	}
	/*Maintenance Mode*/
	if($requestType == 'maintencance'){
	    if(isset($_POST['mode'])){
		    $maintenanceMode = mysqli_real_escape_string($db, $_POST['mode']);
			$GetMaintenanceMode = $Dot->Dot_MaintenanceModeUpdate($uid, $maintenanceMode);
			if($GetMaintenanceMode){
			    if($maintenanceMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	/*Maintenance Mode*/
	if($requestType == 'twiliomode'){
	    if(isset($_POST['mode'])){
		    $twilioMode = mysqli_real_escape_string($db, $_POST['mode']);
			$GettwilioMode = $Dot->Dot_TwilioModeUpdate($uid, $twilioMode);
			if($GettwilioMode){
			    if($maintenanceMode == 1){
				     echo $page_Lang['twilio_activated'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['twilio_deactivated'][$dataUserPageLanguage];
				}
			}
		}
	}
	/*Product Search Mode*/
	if($requestType == 'searchproductf'){
	    if(isset($_POST['mode'])){
		    $Mode = mysqli_real_escape_string($db, $_POST['mode']);
			$UpdateMode = $Dot->Dot_ProductSearchModeUpdate($uid, $Mode);
			if($UpdateMode){
			    if($Mode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	/*Product Menu Mode*/
	if($requestType == 'marketmenum'){
	    if(isset($_POST['mode'])){
		    $Mode = mysqli_real_escape_string($db, $_POST['mode']);
			$UpdateMode = $Dot->Dot_ProductMenuModeUpdate($uid, $Mode);
			if($UpdateMode){
			   if($Mode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	/*Market Slider Mode*/
	if($requestType == 'marketsliderm'){
	    if(isset($_POST['mode'])){
		    $Mode = mysqli_real_escape_string($db, $_POST['mode']);
			$UpdateMode = $Dot->Dot_ProductSliderModeUpdate($uid, $Mode);
			if($UpdateMode){
			    if($Mode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	
	/*Register Mode*/
	if($requestType == 'canregister'){
	    if(isset($_POST['mode'])){
		    $registerMode = mysqli_real_escape_string($db, $_POST['mode']);
			$GetRegisterMode = $Dot->Dot_CanRegisterModeUpdate($uid, $registerMode);
			if($GetRegisterMode){
			   if($registerMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	/*Ip Mode*/
	if($requestType == 'ipregister'){
	    if(isset($_POST['mode'])){
		    $ipMode = mysqli_real_escape_string($db, $_POST['mode']);
			$GetipMode = $Dot->Dot_IpEnableDisableModeUpdate($uid, $ipMode);
			if($GetipMode){
			    if($ipMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	// Language Select
	if($requestType == 'user_can_choose_lang'){
	    if(isset($_POST['mode'])){
		    $chLangMode = mysqli_real_escape_string($db, $_POST['mode']);
			$GetchLangMode = $Dot->Dot_UpdateChooseLangMode($uid, $chLangMode);
			if($GetchLangMode){
			     if($chLangMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	
   // Website Apis
   if($requestType == 'websiteApis'){
	    if(isset($_POST['map']) && isset($_POST['analytics']) && isset($_POST['giphyKey']) && isset($_POST['weatherapi']) && isset($_POST['weatherLocation']) && isset($_POST['yandex_api']) && isset($_POST['onesignalappid']) && isset($_POST['onesignalrestid'])){
			 $googleMapAPI = mysqli_real_escape_string($db, $_POST['map']);
			 $googleAnalyticsCode = mysqli_real_escape_string($db, $_POST['analytics']); 
			 $apiGiphy = mysqli_real_escape_string($db, $_POST['giphyKey']); 
			 $apiWeather = mysqli_real_escape_string($db, $_POST['weatherapi']);
			 $DefaultLocationWeather = mysqli_real_escape_string($db, $_POST['weatherLocation']);
			 $yandexTranslateAPI = mysqli_real_escape_string($db, $_POST['yandex_api']);
			 $oneSignalAppID = mysqli_real_escape_string($db, $_POST['onesignalappid']);
			 $oneSignalRestAPI = mysqli_real_escape_string($db, $_POST['onesignalrestid']);
			 $saveWebsiteApis = $Dot->Dot_UpdateWebsiteAPIs($uid,$googleMapAPI,$googleAnalyticsCode,$apiGiphy,$apiWeather,$DefaultLocationWeather,$yandexTranslateAPI,$oneSignalAppID,$oneSignalRestAPI);
			 if($saveWebsiteApis){ 
				echo $page_Lang['api_changes_updated_success'][$dataUserPageLanguage];
			 }else{
				echo $page_Lang['api_changes_could_not_updated'][$dataUserPageLanguage];
			 }
		 }
   }
   // ServerType
   if($requestType == 'servertype'){
	    if(isset($_POST['smtp'])){
			 $smtporssl = mysqli_real_escape_string($db, $_POST['smtp']); 
			 $saveServerType = $Dot->Dot_UpdateSmtpOrMailServer($uid,$smtporssl);
			 if($saveServerType){
				 echo '1';
			 }else{
			    echo '2';
			 }
		 }
   }
   // TLS SSL
   if($requestType == 'tlsl'){
	    if(isset($_POST['tlslssl'])){
			 $tlsormailserver = mysqli_real_escape_string($db, $_POST['tlslssl']); 
			 $tlsorssl = $Dot->Dot_UpdateTLSorSSLServer($uid,$tlsormailserver);
			 if($tlsorssl){
				 echo '1';
			 }else{
			    echo '2';
			 }
		 }
   }
   // Update SMTP 
   if($requestType == 'updateSmtp'){
	    if(isset($_POST['smtphost']) && isset($_POST['smtpusername']) && isset($_POST['smtppassword']) && isset($_POST['smtpport'])){
			$smtpHost = mysqli_real_escape_string($db, $_POST['smtphost']);
			$smtpUsername = mysqli_real_escape_string($db, $_POST['smtpusername']);
			$smtpPassword = mysqli_real_escape_string($db, $_POST['smtppassword']);
			$smtpPort = mysqli_real_escape_string($db, $_POST['smtpport']);
		     $updateSmtp = $Dot->Dot_UpdateSMTP($uid, $smtpHost, $smtpUsername,$smtpPassword,$smtpPort);
			 if($updateSmtp){
			     echo '1';
			 }else{
		         echo '2';
			 }
		}
    }
   // Add New Language 
   if($requestType == 'saveNewLang'){
       if(isset($_POST['langName'])){
		   $addThisLanguageName = mysqli_real_escape_string($db, $_POST['langName']);
		   $change = preg_replace('/\s+/', '', $addThisLanguageName);  
		   if(!empty($change)){
			   $addNew = $Dot->Dot_NewLanguage($uid, $change);
		   if($addNew){
			   echo '<div class="success_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['added_lang_successfully'][$dataUserPageLanguage].'</div></div>';
		   }else{
			  echo '<div class="error_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['there_was_an_error_new_language'][$dataUserPageLanguage].'</div></div>';
		   }
		   }else{
		       echo '<div class="error_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['can_not_use_special_character'][$dataUserPageLanguage].'</div></div>';
		   }
	   }
   }
   // Add New Language Key
   if($requestType == 'saveNewKey'){
	   if(isset($_POST['langKey'])){
		   $addThisLanguageKey = mysqli_real_escape_string($db, $_POST['langKey']);  
		   if(!empty($addThisLanguageKey)){
			   $addNewKey = $Dot->Dot_NewLanguageKey($uid, $addThisLanguageKey); 
		   if($addNewKey){
			   echo '<div class="success_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['add_languagekey_successfully'][$dataUserPageLanguage].'</div></div>';
		   }else{
			  echo '<div class="error_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['there_was_an_error_new_key'][$dataUserPageLanguage].'</div></div>';
		   }
		   }else{
		       echo '<div class="error_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['should_not_empty'][$dataUserPageLanguage].'</div></div>';
		   }
	   }
   }
   // Delete Language
   if($requestType == 'deleteLang'){
       if(isset($_POST['deleteThisLang'])){
		   $deleteLang = mysqli_real_escape_string($db, $_POST['deleteThisLang']);  
		   $deleteLanguage = $Dot->Dot_DeleteLanguage($uid, $deleteLang);
		   if($deleteLanguage){
		        echo '<div class="success_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['lang_deleted_success'][$dataUserPageLanguage].'</div></div>';
		   }else{
			  echo '<div class="error_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['lang_not_deleted'][$dataUserPageLanguage].'</div></div>';
		   }
	   }
   }
   // Update Default Language 
  if($requestType == 'selectdlang'){
	   if(isset($_POST['dlanguage'])){
		   $defaUltLanguage = mysqli_real_escape_string($db, $_POST['dlanguage']);  
		   $defLng = $Dot->Dot_UpdateDefaultLanguage($uid, $defaUltLanguage);
		   if($defLng){
		        echo '<div class="success_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['main_lang_selected_success'][$dataUserPageLanguage].'</div></div>';
		   }else{
			  echo '<div class="error_"><div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['there_was_a_problem_selecting_main_lang'][$dataUserPageLanguage].'</div></div>';
		   }
	   }
  }
  // Delete Color
  if($requestType == 'deleteColor'){
	 if(isset($_POST['color'])){
	      $DeleteThiscolorID = mysqli_real_escape_string($db, $_POST['color']);
		  $deleteColor = $Dot->Dot_DeleteColor($uid, $DeleteThiscolorID);
		  if($deleteColor){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['color_deleted_success'][$dataUserPageLanguage].'</div>';
		   }else{
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['color_not_deleted'][$dataUserPageLanguage].'</div>';
		   }
	 }
  }
  // Add New Color 
   if($requestType == 'addNewColor'){
	 if(isset($_POST['color'])){
	      $AddThiscolorCode = mysqli_real_escape_string($db, $_POST['color']);
		  $AddColor = $Dot->Dot_AddNewColor($uid, $AddThiscolorCode);
		  if($AddColor){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['color_added_success'][$dataUserPageLanguage].'</div>';
		   }else{
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['color_not_added'][$dataUserPageLanguage].'</div>';
		   }
	 }
  }
  // Add New google Import Link
  if($requestType == 'addGoogleFontLink'){
      if(isset($_POST['importLink'])){
	      $newImportLink = mysqli_real_escape_string($db, $_POST['importLink']);
		  $newLink = $Dot->Dot_AddNewGoogleImportLink($uid, $newImportLink);
		  if($newLink){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['newGoogleImportFontSuccess'][$dataUserPageLanguage].'</div>';
		   }else{
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['newGoogleImportFontWrong'][$dataUserPageLanguage].'</div>';
		   }
	  }
  }
  // Add New Font
  if($requestType == 'addNewFont'){
     if(isset($_POST['font_name']) && isset($_POST['fontfullcode']) && isset($_POST['fontcode'])){
		   $newFontName = mysqli_real_escape_string($db, $_POST['font_name']);
		   $newFontFullCode = mysqli_real_escape_string($db, $_POST['fontfullcode']);
		   $newFontCode = mysqli_real_escape_string($db, $_POST['fontcode']);
		   $saveNewFont = $Dot->Dot_SaveNewFont($uid, $newFontName, $newFontFullCode, $newFontCode);
		   if($saveNewFont){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['new_font_added_success'][$dataUserPageLanguage].'</div>';
		   }else{
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['new_font_not_added'][$dataUserPageLanguage].'</div>';
		   }
	 }
  }
  // Delete Font
  if($requestType == 'deleteFont'){
      if(isset($_POST['fontID'])){
          $deleteFontID = mysqli_real_escape_string($db, $_POST['fontID']);
		  $deleteThisFontID = $Dot->Dot_DeleteFont($uid, $deleteFontID);
		  if($deleteThisFontID){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['font_deleted_successfully'][$dataUserPageLanguage].'</div>';
		   }else{
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['font_not_deleted'][$dataUserPageLanguage].'</div>';
		   }
	  }
  }
  // Edit Font
  if($requestType == 'editFont'){
      if(isset($_POST['font_name']) && isset($_POST['fontfullcode']) && isset($_POST['fontcode']) && isset($_POST['fontid'])){
		   $EditFontName = mysqli_real_escape_string($db, $_POST['font_name']);
		   $EditFontFullCode = mysqli_real_escape_string($db, $_POST['fontfullcode']);
		   $EditFontCode = mysqli_real_escape_string($db, $_POST['fontcode']);
		   $EditFontID = mysqli_real_escape_string($db, $_POST['fontid']);
		   $EditThisFont = $Dot->Dot_EditFont($uid, $EditFontName, $EditFontFullCode, $EditFontCode, $EditFontID);
		   if($EditThisFont){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['font_edited_success'][$dataUserPageLanguage].'</div>';
		   }else{ 
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['font_not_edited'][$dataUserPageLanguage].'</div>';
		   }
	 }
  }
  // Edit Font
  if($requestType == 'editMarketThemeDescription'){
      if(isset($_POST['themeType']) && isset($_POST['themename']) && isset($_POST['themePrice']) && isset($_POST['themeID'])){
		   $themeType = mysqli_real_escape_string($db, $_POST['themeType']);
		   $themeName = mysqli_real_escape_string($db, $_POST['themename']);
		   $themePrce = mysqli_real_escape_string($db, $_POST['themePrice']);
		   $themeID = mysqli_real_escape_string($db, $_POST['themeID']);
		   $EditThisFont = $Dot->Dot_EditMarketTheme($uid, $themeType, $themeName, $themePrce, $themeID);
		   if($EditThisFont){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['theme_edited_successfully'][$dataUserPageLanguage].'</div>';
		   }else{ 
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['theme_not_edited'][$dataUserPageLanguage].'</div>';
		   }
	 }
  }
  
  // Add New Watermark
	if($requestType == 'newWatermark'){  
	   if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['textColor']) && !empty($_POST['textColor'])){
		   if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
				$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
				$WaterMarkName = mysqli_real_escape_string($db, $_POST['title']);
				$waterMarkTextColor = mysqli_real_escape_string($db, $_POST['textColor']); 
				$watermark = $_FILES['stickerFile']['name'];
				$watermark_tmp= $_FILES['stickerFile']['tmp_name'];
				$ext = getExtension($watermark);
					if(in_array($ext,$valid_formats)) { 
						$watermark_tmp= $_FILES['stickerFile']['tmp_name'];
						$actual_image_name = time().'.'.$ext; 
						if(move_uploaded_file($watermark_tmp,$watermarksPath.$actual_image_name)){
						       $newwatermark = $Dot->Dot_AddNewWaterMark($uid, $WaterMarkName, $actual_image_name, $waterMarkTextColor);   
							   $watermarkID = $newwatermark['watermark_id'];
							   $watermarkKey = $newwatermark['watermark_name'];
						       $watermarkStyle = $newwatermark['watermark_text_color'];
							   $watermarkImage = $newwatermark['watermark_image'];
							   $watermark_imateURL = $base_url.'uploads/watermarkbg/'.$watermarkImage;	 
							  if($newwatermark){ 
                                    echo '
									<div class="watermark_container"  id="_'.$watermarkID.'" data-last="'.$watermarkID.'">
										 <div class="watermark_wrap"> 
										 <div class="deleteWatermark" id="'.$watermarkID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><g><path d="M96,184.8c-48.9648,0 -88.8,-39.8352 -88.8,-88.8c0,-48.9648 39.8352,-88.8 88.8,-88.8c48.9648,0 88.8,39.8352 88.8,88.8c0,48.9648 -39.8352,88.8 -88.8,88.8z" fill="#cccccc"></path><path d="M96,9.6c47.64,0 86.4,38.76 86.4,86.4c0,47.64 -38.76,86.4 -86.4,86.4c-47.64,0 -86.4,-38.76 -86.4,-86.4c0,-47.64 38.76,-86.4 86.4,-86.4M96,4.8c-50.3664,0 -91.2,40.8336 -91.2,91.2c0,50.3664 40.8336,91.2 91.2,91.2c50.3664,0 91.2,-40.8336 91.2,-91.2c0,-50.3664 -40.8336,-91.2 -91.2,-91.2z" fill="#666666"></path></g><rect x="-29.78475" y="-10.00021" transform="rotate(-135) scale(4.79995,4.79995)" width="3" height="20" fill="#ffffff"></rect><rect x="-1.50021" y="18.28433" transform="rotate(-45) scale(4.79995,4.79995)" width="3" height="20" fill="#ffffff"></rect></g></g></svg></div>
											  <div class="watermark-item-box" style="background-image: url('.$watermark_imateURL.');">
												<img src="'.$watermark_imateURL.'" class="watermark-item-img"> 
											 </div> 
										 </div>
									</div>
									';
                               }
						}
					}
				}
	   } 
  	}
	// Delete WaterMark
	if($requestType == 'delete_watermark'){
	    if(isset($_POST['wid'])){
		     $deleteThisID = mysqli_real_escape_string($db, $_POST['wid']);
			 $DeleteID = $Dot->Dot_DeleteWaterMark($uid, $deleteThisID);
			 if($DeleteID){
			     echo $page_Lang['deleted_watermark'][$dataUserPageLanguage];
			 }else{
				 echo '200';
			 }
		}
	}
	// Upload New Big Logo
	if($requestType == 'biglogo'){
	     // Upload a New Profile Avatar 
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['logobig']['name'];
				$size = $_FILES['logobig']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'logo_'.time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['logobig']['tmp_name']; 
							if(move_uploaded_file($tmp,$logoPath.$actual_image_name)) { 
								// Upload an image from the uploads file
								$newdata=$Dot->Dot_UpdateWebsiteLogo($uid,$actual_image_name); 
								 if($newdata) { 
									echo $page_Lang['the_big_logo_added_success'][$dataUserPageLanguage];
								 } else {
								    echo $page_Lang['something_wrong_about_changing_logo'][$dataUserPageLanguage];
								 }
								 } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo "invalidimage";
				 } else
					 echo "Please select image..!";
					exit;
			 } 
	}
	// Upload New Big Logo
	if($requestType == 'minilogo'){
	     // Upload a New Profile Avatar 
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['logomini']['name'];
				$size = $_FILES['logomini']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'logo_'.time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['logomini']['tmp_name']; 
							if(move_uploaded_file($tmp,$logoPath.$actual_image_name)) { 
								// Upload an image from the uploads file
								$newdata=$Dot->Dot_UpdateWebsiteLogoMini($uid,$actual_image_name); 
								 if($newdata) { 
									echo $page_Lang['the_big_logo_added_success'][$dataUserPageLanguage];
								 } else {
								    echo $page_Lang['something_wrong_about_changing_logo'][$dataUserPageLanguage];
								 }
								 } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo "invalidimage";
				 } else
					 echo "Please select image..!";
					exit;
			 } 
	}
	// Add New Event Categories
	 if($requestType == 'newEventCategory'){  
	     if(isset($_POST['event_key'])){
		   if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){ 
				$keyas =  mysqli_real_escape_string($db,$_POST['event_key']); 
				function seoUrl($string) {
					//Lower case everything
					$string = strtolower($string);
					//Make alphanumeric (removes all other characters)
					$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
					//Clean up multiple dashes or whitespaces
					$string = preg_replace("/[\s-]+/", " ", $string);
					//Convert whitespaces and underscore to dash
					$string = preg_replace("/[\s_]/", "_", $string);
					return $string;
				}
				$keya = seoUrl($keyas);
				$watermark = $_FILES['imageFile']['name'];
				$watermark_tmp= $_FILES['imageFile']['tmp_name'];
				$valid_format = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP"); 
				$ext = getExtension($watermark); 
						if(in_array($ext,$valid_format)) { 
							$watermark_tmp= $_FILES['imageFile']['tmp_name'];
							$actual_image_name = time().'.'.$ext; 
							if(move_uploaded_file($watermark_tmp,$eventCategoriesIcon.$actual_image_name)){ 
							 if($EditLangKeys){ 
							      $col = array();
								  foreach($EditLangKeys as $keyColumn){ 
											 $langaa = $keyColumn['Field']; 
											 $col[] = $keyColumn['Field'];
											 $thePostKey = mysqli_real_escape_string($db, $_POST[$langaa]);  
											 $theKeys.= ',\''.$thePostKey.'\''; 
											 if(empty($thePostKey)){
												  echo $page_Lang['you_can_not_live_translates'][$dataUserPageLanguage];  exit();
											 }
								   }     
								    $colums = mysqli_real_escape_string($db, implode(",",$col)); 
									$theIconUrl = '<img src="'.$base_url.'uploads/event_categories_icon/'.$actual_image_name.'">';
								    $checkKeyExist = mysqli_query($db,"SELECT ev_key FROM dot_event_categories WHERE ev_key = '$keya'") or die(mysqli_error($db));
									$checkKeyExistFromLang = mysqli_query($db,"SELECT lang_key FROM dot_languages WHERE lang_key = '$keya'") or die(mysqli_error($db));
									$checkUserisAdmin = mysqli_query($db,"SELECT user_id FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($db));
									  if(mysqli_num_rows($checkKeyExist) == 0 && mysqli_num_rows($checkKeyExistFromLang) == 0 && mysqli_num_rows($checkUserisAdmin) == 1){
										  $query = mysqli_query($db,"INSERT INTO `dot_languages`( lang_key, ".$colums." )  VALUES ('$keya'  ".$theKeys.")") or die(mysqli_error($db)); 
										  $query_category = mysqli_query($db, "INSERT INTO `dot_event_categories`(ev_key, ev_icon, src)VALUES('$keya','$theIconUrl','$actual_image_name')") or die(mysqli_error($db));
										  echo  $page_Lang['event_category_added_success'][$dataUserPageLanguage];
									  }else{
										   echo $page_Lang['this_key_already_exist'][$dataUserPageLanguage]; 
									  }
						     } 		 
					   }
					}
				}
	   } 
	}   
	// Delete Event and Lang Key
	if($requestType == 'deleteeventcat'){
	    if(isset($_POST['category_id']) && isset($_POST['langKey'])){
	          $categoryID =  mysqli_real_escape_string($db,$_POST['category_id']); 
			  $categoryKey =  mysqli_real_escape_string($db,$_POST['langKey']); 
			  $DeleteKeyLang = $Dot->Dot_DeleteEventCategory($uid,$categoryID, $categoryKey);
			  if($DeleteKeyLang){
			      echo $page_Lang['deleted_success'][$dataUserPageLanguage];
			  }else{
			      echo '200';
			  }
	    }
	}
   // Add New Watermark
	if($requestType == 'newEventCover'){  
	   
		   if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
				$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP"); 
				$ecname = $_FILES['eventCoverName']['name'];
				$ec_tmp= $_FILES['eventCoverName']['tmp_name'];
				$ext = getExtension($ecname);
					if(in_array($ext,$valid_formats)) { 
						$ec_tmp= $_FILES['eventCoverName']['tmp_name'];
						$actual_image_name = time().'.'.$ext; 
						if(move_uploaded_file($ec_tmp,$eventCoverPath.$actual_image_name)){
						       $newEventCover = $Dot->Dot_AddNewEventCover($uid, $actual_image_name);   
							   $watermarkID = $newEventCover['e_cover_id']; 
							   $watermarkImage = $newEventCover['e_cover_image'];
							   $watermark_imateURL = $base_url.'uploads/event__type_covers/'.$watermarkImage;	 
							  if($newEventCover){ 
                                    echo '
									<div class="watermark_container"  id="_'.$watermarkID.'" data-last="'.$watermarkID.'">
										 <div class="watermark_wrap"> 
										 <div class="deleteEventCover" id="'.$watermarkID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><g><path d="M96,184.8c-48.9648,0 -88.8,-39.8352 -88.8,-88.8c0,-48.9648 39.8352,-88.8 88.8,-88.8c48.9648,0 88.8,39.8352 88.8,88.8c0,48.9648 -39.8352,88.8 -88.8,88.8z" fill="#cccccc"></path><path d="M96,9.6c47.64,0 86.4,38.76 86.4,86.4c0,47.64 -38.76,86.4 -86.4,86.4c-47.64,0 -86.4,-38.76 -86.4,-86.4c0,-47.64 38.76,-86.4 86.4,-86.4M96,4.8c-50.3664,0 -91.2,40.8336 -91.2,91.2c0,50.3664 40.8336,91.2 91.2,91.2c50.3664,0 91.2,-40.8336 91.2,-91.2c0,-50.3664 -40.8336,-91.2 -91.2,-91.2z" fill="#666666"></path></g><rect x="-29.78475" y="-10.00021" transform="rotate(-135) scale(4.79995,4.79995)" width="3" height="20" fill="#ffffff"></rect><rect x="-1.50021" y="18.28433" transform="rotate(-45) scale(4.79995,4.79995)" width="3" height="20" fill="#ffffff"></rect></g></g></svg></div>
											  <div class="watermark-item-box" style="background-image: url('.$watermark_imateURL.');">
												<img src="'.$watermark_imateURL.'" class="watermark-item-img"> 
											 </div> 
										 </div>
									</div>
									';
                               }
						}
					}
				} 
  	}	 
	// Delete WaterMark
	if($requestType == 'delete_eventcover'){
	    if(isset($_POST['wid'])){
		     $deleteThisID = mysqli_real_escape_string($db, $_POST['wid']);
			 $DeleteID = $Dot->Dot_DeleteEventCover($uid, $deleteThisID);
			 if($DeleteID){
			     echo $page_Lang['deleted_watermark'][$dataUserPageLanguage];
			 }else{
				 echo '200';
			 }
		}
	}
	// Show More User Posts
	if($requestType == 'user_posts_text'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserTextPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						  'p_text' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M57.7875,38.4c-2.78085,-0.08304 -5.29688,1.63979 -6.225,4.2625l-34.825,98.1375h-3.9375c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-1.6625l6.8125,-19.2h40.9l6.81251,19.2h-1.6625c-2.30807,-0.03264 -4.45492,1.18 -5.61848,3.17359c-1.16356,1.99358 -1.16356,4.45924 0,6.45283c1.16356,1.99358 3.31041,3.20623 5.61848,3.17359h19.2c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359h-3.9375l-34.825,-98.1375c-0.88227,-2.49286 -3.20671,-4.18653 -5.85,-4.2625zM57.6,63.95l15.9125,44.85h-31.825zM147.2,76.8c-0.91701,0.01196 -1.82074,0.22084 -2.65,0.6125c-11.58579,1.04371 -20.375,7.05 -20.375,7.05c-1.83603,1.36633 -2.80351,3.6085 -2.53791,5.88168c0.2656,2.27318 1.72393,4.23191 3.82549,5.13816c2.10157,0.90626 4.527,0.62231 6.36241,-0.74484c0,0.00002 7.34514,-5.1375 15.375,-5.1375c6.76867,0 12.13213,5.09197 12.6875,11.7c-0.37218,0.21226 -0.93667,0.54087 -2.2625,0.925c-3.41215,0.98855 -9.03615,1.78377 -14.95,3.0375c-5.91384,1.25373 -12.28305,2.93251 -17.775,6.825c-5.49196,3.89249 -9.7,10.71284 -9.7,19.1125c0,6.52936 3.42513,12.5548 8.6625,16.45c5.23737,3.89521 12.19005,5.95 20.1375,5.95c9.71455,0 16.53551,-2.819 21.05,-6.375c3.52394,3.88056 8.55084,6.375 14.15,6.375c2.30807,0.03264 4.45492,-1.18 5.61848,-3.17359c1.16356,-1.99358 1.16356,-4.45924 0,-6.45283c-1.16356,-1.99358 -3.31041,-3.20623 -5.61848,-3.17359c-3.61619,0 -6.4,-2.78381 -6.4,-6.4c0.00197,-0.09166 0.00197,-0.18334 0,-0.275v-31.725c0.00574,-0.4703 -0.04037,-0.9398 -0.1375,-1.4c-0.74883,-13.40786 -11.8784,-24.2 -25.4625,-24.2zM160,114.775v18.8625c-0.04431,0.27361 -0.24126,1.12913 -1.7875,2.75c-1.82547,1.91349 -5.36373,4.4125 -14.2125,4.4125c-5.71015,0 -9.95177,-1.5298 -12.5,-3.425c-2.54823,-1.8952 -3.5,-3.86596 -3.5,-6.175c0,-4.77154 1.39196,-6.60139 4.3,-8.6625c2.90804,-2.06111 7.73884,-3.64183 13.025,-4.7625c4.88869,-1.0364 9.98499,-1.76154 14.675,-3z"></path></g></g></svg>'							 
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_image'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserImagePostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						 'p_image' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="22" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#d65039"><g id="surface1"><path d="M70.44231,7.38462c-10.84615,0 -20.07692,7.81731 -21.86539,18.51923l-1.84615,11.01923h-24.57692c-12.25961,0 -22.15385,9.89423 -22.15385,22.15385v96c0,12.25961 9.89423,22.15385 22.15385,22.15385h147.69231c12.25961,0 22.15385,-9.89423 22.15385,-22.15385v-96c0,-12.25961 -9.89423,-22.15385 -22.15385,-22.15385h-24.57692l-1.84615,-11.01923c-1.78846,-10.70192 -11.01923,-18.51923 -21.86538,-18.51923zM96,59.07692c24.43269,0 44.30769,19.875 44.30769,44.30769c0,24.43269 -19.875,44.30769 -44.30769,44.30769c-24.43269,0 -44.30769,-19.875 -44.30769,-44.30769c0,-24.43269 19.875,-44.30769 44.30769,-44.30769zM96,73.84615c-16.32692,0 -29.53846,13.21154 -29.53846,29.53846c0,16.32693 13.21154,29.53846 29.53846,29.53846c16.32693,0 29.53846,-13.21153 29.53846,-29.53846c0,-16.32692 -13.21153,-29.53846 -29.53846,-29.53846z"></path></g></g></g></svg>'
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_video'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserImagePostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						 'p_video' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="21" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M102.4,19.2c-14.1376,0 -25.6,11.4624 -25.6,25.6c0,14.1376 11.4624,25.6 25.6,25.6c14.1376,0 25.6,-11.4624 25.6,-25.6c0,-14.1376 -11.4624,-25.6 -25.6,-25.6zM38.4,32c-10.6048,0 -19.2,8.5952 -19.2,19.2c0,10.6048 8.5952,19.2 19.2,19.2c10.6048,0 19.2,-8.5952 19.2,-19.2c0,-10.6048 -8.5952,-19.2 -19.2,-19.2zM25.6,83.2c-7.072,0 -12.8,5.728 -12.8,12.8v64c0,7.072 5.728,12.8 12.8,12.8h89.6c7.072,0 12.8,-5.728 12.8,-12.8v-64c0,-7.072 -5.728,-12.8 -12.8,-12.8zM172.8,89.6c-1.26906,0.00128 -2.50909,0.37981 -3.5625,1.0875l-28.4375,18.1125v19.2v19.2l28.35,18.0625c0.10237,0.06545 0.20657,0.12798 0.3125,0.18749c1.00378,0.61798 2.15874,0.94673 3.3375,0.95c3.53462,0 6.4,-2.86538 6.4,-6.4v-32v-32c0,-3.53462 -2.86538,-6.4 -6.4,-6.4z"></path></g></g></svg>'												 
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_audio'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserAudioPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
					    'p_audio' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#a073ac"><path d="M96,16c-39.696,0 -72,32.304 -72,72v64c0,8.84 7.16,16 16,16h24v-56h-24v-24c0,-30.88 25.12,-56 56,-56c30.88,0 56,25.12 56,56v24h-24v56h24c8.84,0 16,-7.16 16,-16v-64c0,-39.696 -32.304,-72 -72,-72z"></path></g></g></svg>'
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_link'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserLinkPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						  'p_link' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#4ab37c"><path d="M96,16c-29.536,0 -55.31588,16.128 -69.17188,40h19.53125c7.2,-8.896 16.59525,-15.93638 27.53125,-19.98438c-2.504,5.824 -4.51087,12.62438 -6.04687,19.98438h16.45312c3.832,-15.816 9.19913,-24 11.70313,-24c2.504,0 7.87113,8.184 11.70313,24h16.45312c-1.536,-7.36 -3.55087,-14.16038 -6.04687,-19.98438c10.928,4.048 20.33125,11.08838 27.53125,19.98438h19.53125c-13.856,-23.872 -39.63587,-40 -69.17187,-40zM8,72l9.9375,48h10.46875l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM68.82812,72l9.9375,48h10.46875l6.79687,-27.76562l6.78125,27.76562h10.42188l9.9375,-48h-12.01562l-4.3125,26.92187l-6.375,-26.92187h-8.92188l-6.39062,26.96875l-4.26562,-26.96875zM129.65625,72l9.9375,48h10.46874l6.79688,-27.76562l6.78125,27.76562h10.42187l9.9375,-48h-12.03125l-4.29688,26.92187l-6.39062,-26.92187h-8.90625l-6.40625,26.96875l-4.25,-26.96875zM26.82812,136c13.856,23.872 39.63588,40 69.17188,40c29.536,0 55.31587,-16.128 69.17187,-40h-19.53125c-7.2,8.896 -16.59525,15.93638 -27.53125,19.98438c2.496,-5.824 4.49525,-12.62438 6.03125,-19.98438h-16.45312c-3.832,15.816 -9.19913,24 -11.70313,24c-2.504,0 -7.8555,-8.184 -11.6875,-24h-16.45312c1.536,7.36 3.55087,14.16038 6.04687,19.98438c-10.928,-4.048 -20.33125,-11.08838 -27.53125,-19.98438z"></path></g></g></svg>'
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_gif'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserGifPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						   'p_gif' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8e24aa"><path d="M54,24c-9.87038,0 -18,8.12962 -18,18v54h12v-54c0,-3.37762 2.62238,-6 6,-6h54v36h36v24h12v-32.48437l-39.51563,-39.51563zM120,44.48437l15.51563,15.51563h-15.51563zM54,108c-9.87038,0 -18,8.12962 -18,18v12v12c0,9.87037 8.12962,18 18,18c9.87038,0 18,-8.12963 18,-18v-6h-18v12c-3.37762,0 -6,-2.62237 -6,-6v-12v-12c0,-3.37763 2.62238,-6 6,-6c3.37762,0 6,2.62237 6,6h12c0,-9.87038 -8.12962,-18 -18,-18zM84,108v60h12v-60zM108,108v60h12v-24h12v-12h-12v-12h24v-12z"></path></g></g></svg>' 
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_location'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserLocationPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						  'p_location' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#1E88E5"><path d="M133.5,3c-22.8,0 -41.25,18.45059 -42,41.85059c-0.6,21.75 20.25117,50.39941 32.70117,65.39941c2.4,2.85 5.69883,4.35059 9.29883,4.35059c3.6,0 6.89883,-1.65059 9.29883,-4.35059c12.45,-15.15 33.45117,-43.64941 32.70117,-65.39941c-0.75,-23.4 -19.2,-41.85059 -42,-41.85059zM79.0957,11.42871c-0.31055,0.00762 -0.62754,0.04512 -0.94629,0.12012c-27,5.85 -49.19941,23.40117 -60.89941,48.45117c-9.75,21 -10.80059,44.70117 -2.85059,66.45117c7.95,21.75 23.85,39.29883 45,49.04883c11.7,5.4 24.15,8.25 36.75,8.25c10.05,0 20.10059,-1.8 29.85059,-5.25c21.9,-7.95 39.29883,-23.85 49.04883,-45c4.2,-9 6.75176,-18.45117 7.80175,-28.20117c0.3,-2.4 -1.50176,-4.64824 -4.05175,-4.94824c-2.4,-0.3 -4.64825,1.49883 -4.94825,4.04883c-0.9,8.7 -3.14942,17.25059 -6.89942,25.35059c-8.85,18.9 -24.45117,33.15059 -43.95117,40.35058c-19.5,7.05 -40.79883,6.14825 -59.54883,-2.55175c-2.85,-1.35 -5.55,-2.85 -8.25,-4.5c2.55,-0.15 5.24941,-0.9 7.64941,-2.25c2.7,-1.5 5.54824,-3.29942 8.69824,-5.39942c2.1,-1.5 3.9,-3.44825 5.25,-5.69824c1.5,-2.7 3.30117,-5.55058 4.20117,-8.85058c5.85,-22.5 -13.65,-23.40059 -14.25,-28.35059c-0.6,-5.55 6.60117,-9.75059 10.95117,-14.10059c4.35,-4.35 5.69824,-11.1 3.44824,-15c-7.2,-12.9 -24.29824,-6.15059 -25.94824,7.64941c-0.9,8.25 -5.85176,16.65 -10.05176,21c-4.2,4.2 -12.44824,1.95176 -14.69824,-4.19824c-2.55,-6.9 6.29824,-9.45176 4.94824,-18.30176c-0.3,-2.4 -2.85,-3.59883 -6,-4.04883l-10.35059,0.29883c1.05,-7.5 3.30059,-14.85 6.60059,-21.75c10.2,-22.65 30.15117,-38.39941 54.45117,-43.64942c2.4,-0.45 4.04824,-2.84941 3.44824,-5.39941c-0.39375,-2.1 -2.2793,-3.62461 -4.45312,-3.57129zM133.5,30c8.25,0 15,6.75 15,15c0,8.25 -6.75,15 -15,15c-8.25,0 -15,-6.75 -15,-15c0,-8.25 6.75,-15 15,-15z"></path></g></g></svg>' 
												 
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_watermark'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserWatermarkPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
						   'p_watermark' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1"></path><g id="Layer_1" stroke="none" stroke-width="1"><g id="surface1_121_"><path d="M96,16v80l-40,-69.276z" fill="#e91e63"></path><path d="M136,26.724l29.276,29.276l-69.276,40z" fill="#ff5722"></path><path d="M96,16l40,10.724l-40,69.276z" fill="#f44336"></path><path d="M96,176v-80l40,69.276z" fill="#8bc34a"></path><path d="M56,165.276l-29.276,-29.276l69.276,-40z" fill="#03a9f4"></path><path d="M96,176l-40,-10.724l40,-69.276z" fill="#4caf50"></path><path d="M176,96h-80l69.276,-40z" fill="#ff9800"></path><path d="M165.276,136l-29.276,29.276l-40,-69.276z" fill="#ffeb3b"></path><path d="M176,96l-10.724,40l-69.276,-40z" fill="#ffc107"></path><path d="M16,96h80l-69.276,40z" fill="#3f51b5"></path><path d="M26.724,56l29.276,-29.276l40,69.276z" fill="#9c27b0"></path><path d="M16,96l10.724,-40l69.276,40z" fill="#673ab7"></path></g></g><g fill="#ffffff" stroke="none" stroke-width="1"><path d="M90.825,117.19l-2.63,-10.04h-13.51l-2.63,10.04h-10.48l15.33,-49.05h9.06l15.43,49.05zM81.425,81.41l-4.59,17.49h9.17zM132.425,117.19h-9.6c-0.26667,-0.56 -0.53667,-1.50333 -0.81,-2.83v0c-1.70667,2.33333 -4.02,3.5 -6.94,3.5v0c-3.05333,0 -5.58333,-1.01 -7.59,-3.03c-2.01333,-2.02 -3.02,-4.63667 -3.02,-7.85v0c0,-3.82 1.22,-6.77333 3.66,-8.86c2.43333,-2.08667 5.94,-3.15333 10.52,-3.2v0h2.9v-2.93c0,-1.64 -0.28,-2.79667 -0.84,-3.47c-0.56,-0.67333 -1.38,-1.01 -2.46,-1.01v0c-2.38,0 -3.57,1.39333 -3.57,4.18v0h-9.54c0,-3.37333 1.26333,-6.15333 3.79,-8.34c2.52667,-2.19333 5.72333,-3.29 9.59,-3.29v0c4,0 7.09333,1.04 9.28,3.12c2.19333,2.07333 3.29,5.04333 3.29,8.91v0v17.15c0.04,3.14667 0.48667,5.60667 1.34,7.38v0zM117.205,110.38v0c1.05333,0 1.95,-0.21333 2.69,-0.64c0.74,-0.42667 1.29,-0.93 1.65,-1.51v0v-7.58h-2.29c-1.61333,0 -2.88667,0.51667 -3.82,1.55c-0.93333,1.03333 -1.4,2.41333 -1.4,4.14v0c0,2.69333 1.05667,4.04 3.17,4.04z"></path></g><path d="M51.575,127.86v-69.72h90.85v69.72z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0"></path></g></svg>' 
											 
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
	// Show More User Posts
	if($requestType == 'user_posts_which'){
         if(isset($_POST['lastUserID'])){
	         $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
			 $GetUserPosts = $Dot->Dot_AllUserWhichPostsManagement($lastPID);
			 if($GetUserPosts){
				foreach($GetUserPosts as $userPostData){
					$dataUserPostUserID = $userPostData['user_id'];
					$dataUserPostID = $userPostData['user_post_id'];
					$dataUserPostType = $userPostData['post_type'];
					$time = $userPostData['post_created_time']; 
					$message_time=date("c", $time);
					$dataPostUserUserName = $userPostData['user_name'];
					$dataPostUserFullName = $userPostData['user_fullname'];
					$dataPostUserProfileStatus = $userPostData['user_status']; 
					$postType_icon = array(
					      'p_which' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#B71C1C"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>'
					);
					$CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
					include("../contents/html_user_posts.php");
				 }
			 }
		 }
	}
  // Delete WaterMark
	if($requestType == 'reg_ip_num'){
	    if(isset($_POST['pip'])){
		     $perIP = mysqli_real_escape_string($db, $_POST['pip']);
			 $perIPNumberID = $Dot->Dot_SavedNumberIP($uid, $perIP);
			 if($perIPNumberID){
			     echo $page_Lang['saved_ip_number'][$dataUserPageLanguage];
			 }else{
				 echo '200';
			 }
		}
	}
	// Update Header Advertisement code
	if($requestType == 'the_header_ads_code'){
	    if(isset($_POST['code'])){
		     $adsCode = mysqli_real_escape_string($db, $_POST['code']);
			 $advertisementCode = $Dot->Dot_AdvertisementCode($uid, $adsCode);
			 if($advertisementCode){
			     echo $page_Lang['code_saved_success'][$dataUserPageLanguage];
			 }else{
				 echo '200';
			 }
		}
	}
	// Update Sidebar Advertisement code
	if($requestType == 'the_sidebar_ads_code'){
	    if(isset($_POST['code'])){
		     $adsCode = mysqli_real_escape_string($db, $_POST['code']);
			 $advertisementCode = $Dot->Dot_SidebarAdvertisementCode($uid, $adsCode);
			 if($advertisementCode){
			     echo $page_Lang['code_saved_success'][$dataUserPageLanguage];
			 }else{
				 echo '200';
			 }
		}
	}
	// Update Sidebar Advertisement code
	if($requestType == 'the_between_post_ads'){
	    if(isset($_POST['code'])){
		     $adsCode = mysqli_real_escape_string($db, $_POST['code']);
			 $advertisementCode = $Dot->Dot_BetweenPostAdvertisementCode($uid, $adsCode);
			 if($advertisementCode){
			     echo $page_Lang['code_saved_success'][$dataUserPageLanguage];
			 }else{
				 echo '200';
			 }
		}
	}
	// Add New Feeling Categories
	 if($requestType == 'newFeelingCategory'){  
	     if(isset($_POST['event_key']) && isset($_POST['feeling_category'])){
		   if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){ 
				$keyas =  mysqli_real_escape_string($db,$_POST['event_key']); 
				$feelingCategory =  mysqli_real_escape_string($db,$_POST['feeling_category']); 
				function seoUrl($string) {
					//Lower case everything
					$string = strtolower($string);
					//Make alphanumeric (removes all other characters)
					$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
					//Clean up multiple dashes or whitespaces
					$string = preg_replace("/[\s-]+/", " ", $string);
					//Convert whitespaces and underscore to dash
					$string = preg_replace("/[\s_]/", "_", $string);
					return $string;
				}
				$keya = seoUrl($keyas);
				$watermark = $_FILES['imageFile']['name'];
				$watermark_tmp= $_FILES['imageFile']['tmp_name'];
				$valid_format = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP"); 
				$ext = getExtension($watermark); 
						if(in_array($ext,$valid_format)) { 
							$watermark_tmp= $_FILES['imageFile']['tmp_name'];
							$actual_image_name = time().'.'.$ext; 
							if(move_uploaded_file($watermark_tmp,$feelingCategoriesIcon.$feelingCategory.'/'.$actual_image_name)){ 
							 if($EditLangKeys){ 
							      $col = array();
								  foreach($EditLangKeys as $keyColumn){ 
											 $langaa = $keyColumn['Field']; 
											 $col[] = $keyColumn['Field'];
											 $thePostKey = mysqli_real_escape_string($db, $_POST[$langaa]);  
											 $theKeys.= ',\''.$thePostKey.'\''; 
											 if(empty($thePostKey)){
												  echo $page_Lang['you_can_not_live_translates'][$dataUserPageLanguage];  exit();
											 }
								   }     
								    $colums = mysqli_real_escape_string($db, implode(",",$col)); 
									$theIconUrl = '<img src="'.$base_url.'uploads/feelings/'.$feelingCategory.'/'.$actual_image_name.'">';
								    $checkKeyExist = mysqli_query($db,"SELECT f_key FROM dot_feelings_activity WHERE f_key = '$keya'") or die(mysqli_error($db));
									$checkKeyExistFromLang = mysqli_query($db,"SELECT lang_key FROM dot_languages WHERE lang_key = '$keya'") or die(mysqli_error($db));
									$checkUserisAdmin = mysqli_query($db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($db)); 
									  if(mysqli_num_rows($checkKeyExist) == 0 && mysqli_num_rows($checkKeyExistFromLang) == 0 && mysqli_num_rows($checkUserisAdmin) == 1){
										  $query = mysqli_query($db,"INSERT INTO `dot_languages`( lang_key, ".$colums." )  VALUES ('$keya'  ".$theKeys.")") or die(mysqli_error($db)); 
										  $query_category = mysqli_query($db, "INSERT INTO `dot_feelings_activity`(f_key, f_img, f_name)VALUES('$keya','$actual_image_name','$feelingCategory')") or die(mysqli_error($db));
										  echo  $page_Lang['feeling_added_success'][$dataUserPageLanguage];
									  }else{
										   echo $page_Lang['this_key_already_exist'][$dataUserPageLanguage]; 
									  }
						     } 		 
					   }
					}
				}
	   } 
	}	
	// Delete Event and Lang Key
	if($requestType == 'deletefeeling'){
	    if(isset($_POST['category_id']) && isset($_POST['langKey'])){
	          $categoryID =  mysqli_real_escape_string($db,$_POST['category_id']); 
			  $categoryKey =  mysqli_real_escape_string($db,$_POST['langKey']); 
			  $DeleteKeyLang = $Dot->Dot_DeleteFeeling($uid,$categoryID, $categoryKey);
			  if($DeleteKeyLang){
			      echo $page_Lang['deleted_success'][$dataUserPageLanguage];
			  }else{
			      echo '200';
			  }
	    }
	}	
	// Change Active Icon
	if($requestType == 'change_active_icon'){
	     if(isset($_POST['iconID']) && isset($_POST['iconName']) ){
	          $iconID = mysqli_real_escape_string($db, $_POST['iconID']);
			  $iconName = mysqli_real_escape_string($db, $_POST['iconName']);
			  $UpdateActiveIcon = $Dot->Dot_UpdateActiveIcon($uid, $iconName, $iconID);
			  if($UpdateActiveIcon){
		          echo 'ok';
			  }
		 }
	}	
	 // Add New Event Categories
	 if($requestType == 'newMarketCategory'){  
	     if(isset($_POST['market_key'])){
		   
				$keyas =  mysqli_real_escape_string($db,$_POST['market_key']); 
				function seoUrl($string) {
					//Lower case everything
					$string = strtolower($string);
					//Make alphanumeric (removes all other characters)
					$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
					//Clean up multiple dashes or whitespaces
					$string = preg_replace("/[\s-]+/", " ", $string);
					//Convert whitespaces and underscore to dash
					$string = preg_replace("/[\s_]/", "_", $string);
					return $string;
				}
				$keya = seoUrl($keyas); 
				 
				 if($EditLangKeys){ 
					  $col = array();
					  foreach($EditLangKeys as $keyColumn){ 
								 $langaa = $keyColumn['Field']; 
								 $col[] = $keyColumn['Field'];
								 $thePostKey = mysqli_real_escape_string($db, $_POST[$langaa]);  
								 $theKeys.= ',\''.$thePostKey.'\''; 
								 if(empty($thePostKey)){
									  echo $page_Lang['you_can_not_live_translates'][$dataUserPageLanguage];  exit();
								 }
					   }     
						$colums = mysqli_real_escape_string($db, implode(",",$col));  
						$checkKeyExist = mysqli_query($db,"SELECT m_category_key FROM dot_market_categories WHERE m_category_key = '$keya'") or die(mysqli_error($db));
						$checkKeyExistFromLang = mysqli_query($db,"SELECT lang_key FROM dot_languages WHERE lang_key = '$keya'") or die(mysqli_error($db));
						$checkUserisAdmin = mysqli_query($db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($db)); 
						  if(mysqli_num_rows($checkKeyExist) == 0 && mysqli_num_rows($checkKeyExistFromLang) == 0 && mysqli_num_rows($checkUserisAdmin) == 1){
							  $query = mysqli_query($db,"INSERT INTO `dot_languages`( lang_key, ".$colums." )  VALUES ('$keya'  ".$theKeys.")") or die(mysqli_error($db)); 
							  $query_category = mysqli_query($db, "INSERT INTO `dot_market_categories`(m_category_key)VALUES('$keya')") or die(mysqli_error($db));
							  echo  $page_Lang['event_category_added_success'][$dataUserPageLanguage];
						  }else{
							   echo $page_Lang['this_key_already_exist'][$dataUserPageLanguage]; 
						  }
				 } 		 
				} 
	} 
	// Delete Event and Lang Key
	if($requestType == 'deletemarketcat'){
	    if(isset($_POST['category_id']) && isset($_POST['langKey'])){
	          $categoryID =  mysqli_real_escape_string($db,$_POST['category_id']); 
			  $categoryKey =  mysqli_real_escape_string($db,$_POST['langKey']); 
			  $DeleteKeyLang = $Dot->Dot_DeleteMarketCategory($uid,$categoryID, $categoryKey);
			  if($DeleteKeyLang){
			      echo $page_Lang['deleted_success'][$dataUserPageLanguage];
			  }else{
			      echo '200';
			  }
	    }
	}
	// Add New Watermark
	if($requestType == 'newSlider'){  
	   if(isset($_POST['sliderURL']) && !empty($_POST['sliderURL']) && isset($_POST['marketCategory']) && !empty($_POST['marketCategory'])){
		   if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
				$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
				$WaterMarkName = mysqli_real_escape_string($db, $_POST['sliderURL']);
				$waterMarkTextColor = mysqli_real_escape_string($db, $_POST['marketCategory']); 
				$watermark = $_FILES['sliderImage']['name'];
				$watermark_tmp= $_FILES['sliderImage']['tmp_name'];
				$ext = getExtension($watermark);
					if(in_array($ext,$valid_formats)) { 
						$watermark_tmp= $_FILES['sliderImage']['tmp_name'];
						$actual_image_name = time().'.'.$ext; 
						if(move_uploaded_file($watermark_tmp,$marketSliderPath.$actual_image_name)){
						       $newMarketS = $Dot->Dot_AddNewMarketAdsSlider($uid, $WaterMarkName, $actual_image_name, $waterMarkTextColor);   
							   if($newMarketS){
							           $sl_ID = $newMarketS['ads_slider_id'];
									   $sl_image = $newMarketS['ads_slider_image'];
									   $sl_url = $newMarketS['ads_slider_redirect_url'];
									   $sl_category = $newMarketS['ads_slider_category'];
									   $sl_status = $newMarketS['ads_slider_status'];
									   $sl_image_url = $base_url.'uploads/market_slider/'.$sl_image;	  
									  if($newMarketS){ 
											echo '
											 
											';
									   }
							   } 
						}
					}
				}
	   } 
  	}
	// Delete WaterMark
	if($requestType == 'delete_slidads'){
	    if(isset($_POST['wid'])){
		     $deleteThisID = mysqli_real_escape_string($db, $_POST['wid']);
			 $DeleteID = $Dot->Dot_DeleteSlidAd($uid, $deleteThisID);
			 if($DeleteID){
			     echo $page_Lang['slider_deleted_success'][$dataUserPageLanguage];
			 }else{
				 echo '200';
			 }
		}
	}
	// Add New Market Theem
	if($requestType == 'newMarketThemeadd'){
	   if(isset($_POST['tName']) && isset($_POST['ttype']) && isset($_POST['tprice']) && isset($_POST['marketThemeCategory'])){
		     $themeName = mysqli_real_escape_string($db , $_POST['tName']);
			 $themeType = mysqli_real_escape_string($db , $_POST['ttype']);
			 $themePriec = mysqli_real_escape_string($db , $_POST['tprice']);
			 $themeCat = mysqli_real_escape_string($db , $_POST['marketThemeCategory']);
			 $addTheem = $Dot->Dot_AddNewMarketTheme($uid, $themeName, $themeType,$themePriec,$themeCat);
			 if($addTheem){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['new_theme_added_success'][$dataUserPageLanguage].'</div>';
		   }else{
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['new_theme_not_added'][$dataUserPageLanguage].'</div>';
		   }
		}
	}
	// Delete Font
  if($requestType == 'deleteMarketTheme'){
      if(isset($_POST['fontID'])){
          $deleteFontID = mysqli_real_escape_string($db, $_POST['fontID']);
		  $deleteThisFontID = $Dot->Dot_MarketTheme($uid, $deleteFontID);
		  if($deleteThisFontID){
		        echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM80,139.312l-37.656,-37.656l11.312,-11.312l26.344,26.344l58.344,-58.344l11.312,11.312z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['market_theme_deleted_success'][$dataUserPageLanguage].'</div>';
		   }else{
			  echo '<div class="icon_style"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ffffff"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM100,136h-8c-2.208,0 -4,-1.792 -4,-4v-8c0,-2.208 1.792,-4 4,-4h8c2.208,0 4,1.792 4,4v8c0,2.208 -1.792,4 -4,4zM96,104v0c-4.416,0 -8,-3.584 -8,-8v-32c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v32c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></div><div class="alert_note">'.$page_Lang['market_theme_not_deleted'][$dataUserPageLanguage].'</div>';
		   }
	  }
  }
  // Add New Event Categories
	 if($requestType == 'newMarketThemeCategory'){  
	     if(isset($_POST['market_key'])){ 
				$keyas =  mysqli_real_escape_string($db,$_POST['market_key']); 
				function seoUrl($string) {
					//Lower case everything
					$string = strtolower($string);
					//Make alphanumeric (removes all other characters)
					$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
					//Clean up multiple dashes or whitespaces
					$string = preg_replace("/[\s-]+/", " ", $string);
					//Convert whitespaces and underscore to dash
					$string = preg_replace("/[\s_]/", "_", $string);
					return $string;
				}
				$keya = seoUrl($keyas); 
				 
				 if($EditLangKeys){ 
					  $col = array();
					  foreach($EditLangKeys as $keyColumn){ 
								 $langaa = $keyColumn['Field']; 
								 $col[] = $keyColumn['Field'];
								 $thePostKey = mysqli_real_escape_string($db, $_POST[$langaa]);  
								 $theKeys.= ',\''.$thePostKey.'\''; 
								 if(empty($thePostKey)){
									  echo $page_Lang['you_can_not_live_translates'][$dataUserPageLanguage];  exit();
								 }
					   }     
						$colums = mysqli_real_escape_string($db, implode(",",$col));  
						$checkKeyExist = mysqli_query($db,"SELECT market_theme_category_key FROM dot_market_theme_categories WHERE market_theme_category_key = '$keya'") or die(mysqli_error($db));
						$checkKeyExistFromLang = mysqli_query($db,"SELECT lang_key FROM dot_languages WHERE lang_key = '$keya'") or die(mysqli_error($db));
						$checkUserisAdmin = mysqli_query($db,"SELECT user_id, user_type FROM dot_users WHERE user_id = '$uid' AND user_type= '1'") or die(mysqli_error($db)); 
						  if(mysqli_num_rows($checkKeyExist) == 0 && mysqli_num_rows($checkKeyExistFromLang) == 0 && mysqli_num_rows($checkUserisAdmin) == 1){
							  $query = mysqli_query($db,"INSERT INTO `dot_languages`( lang_key, ".$colums." )  VALUES ('$keya'  ".$theKeys.")") or die(mysqli_error($db)); 
							  $query_category = mysqli_query($db, "INSERT INTO `dot_market_theme_categories`(market_theme_category_key)VALUES('$keya')") or die(mysqli_error($db));
							  echo  $page_Lang['theme_category_added_successfullly'][$dataUserPageLanguage];
						  }else{
							   echo $page_Lang['this_key_already_exist'][$dataUserPageLanguage]; 
						  }
				 } 		 
				} 
	} 
  // mysqli_query($db,"UPDATE dot_configuration SET version = '3.5' WHERE configuration_id = '1'") or die(mysqli_error($this->db));
  // Report Delete with Post
	if($requestType == 'ln_id_delete'){
	    if(isset($_POST['key'])){ 
				 $lKey = mysqli_real_escape_string($db, $_POST['key']);  
				 $deleteLanguageKey =  $Dot->Dot_DeleteLangKey($uid,$lKey);
				 if($deleteLanguageKey){
					 echo  $page_Lang['key_deleted_successfully'][$dataUserPageLanguage];
				 }
		   }  
	}
	// PayPal Emails
	if($requestType == 'paypal_email'){
	    if(isset($_POST['sm']) && isset($_POST['bm'])){
		     $paypalSendBoxBusinessEmail = mysqli_real_escape_string($db, $_POST['sm']);
			 $payPalBusinessEmail = mysqli_real_escape_string($db, $_POST['bm']);
			 $savePayPalEmails = $Dot->Dot_SavePayPalEmails($paypalSendBoxBusinessEmail, $payPalBusinessEmail, $uid);
			 if($savePayPalEmails){
			     echo $page_Lang['paypal_emails_updated'][$dataUserPageLanguage];
			 }
		}
	}
	// Iyzico Keys
	if($requestType == 'iyzicokeys'){ 
	    if(isset($_POST['tsk']) && isset($_POST['tapk']) && isset($_POST['lapk']) && isset($_POST['lsk'])){
		     $iyzicoTestingSecretKey = mysqli_real_escape_string($db, $_POST['tsk']);
			 $iyzicoTestingApiKey = mysqli_real_escape_string($db, $_POST['tapk']);
			 $iyzicoLiveApiKey = mysqli_real_escape_string($db, $_POST['lapk']);
			 $iyzicoLiveSecretKey = mysqli_real_escape_string($db, $_POST['lsk']);
			 $savePayPalEmails = $Dot->Dot_SaveIyziCoKeys($uid, $iyzicoTestingSecretKey, $iyzicoTestingApiKey, $iyzicoLiveApiKey, $iyzicoLiveSecretKey);
			 if($savePayPalEmails){
			     echo $page_Lang['iyzico_infos_updated'][$dataUserPageLanguage];
			 }
		}
	}
	// BitPay Details
	if($requestType == 'bitpay_update'){ 
	   if(isset($_POST['bitemail']) && isset($_POST['bitpass']) && isset($_POST['bitpairing']) && isset($_POST['bitlabel'])){
		     $bitpayEmail = mysqli_real_escape_string($db, $_POST['bitemail']);
			 $bitpayPass = mysqli_real_escape_string($db, $_POST['bitpass']);
			 $bitpayPairing = mysqli_real_escape_string($db, $_POST['bitpairing']);
			 $bitpayLabel = mysqli_real_escape_string($db, $_POST['bitlabel']);
			 $savePayPalEmails = $Dot->Dot_UpdateBitPayInfo($uid, $bitpayEmail, $bitpayPass, $bitpayPairing, $bitpayLabel);
			 if($savePayPalEmails){
			     echo $page_Lang['bitpay_infos_updated'][$dataUserPageLanguage];
			 }
		}
	}
	// Update AuthorizeNet Infos
	if($requestType == 'authorize_update'){ 
	     if(isset($_POST['atestapiid']) && isset($_POST['atesttransactionkey']) && isset($_POST['aliveapiid']) && isset($_POST['alivetransactionkey'])){
			 $authorizeTestApiID = mysqli_real_escape_string($db, $_POST['atestapiid']);
			 $authorizeTestTransactionKey = mysqli_real_escape_string($db, $_POST['atesttransactionkey']);
			 $authorizeLiveApiID = mysqli_real_escape_string($db, $_POST['aliveapiid']);
			 $authorizeLiveTransactionKey = mysqli_real_escape_string($db, $_POST['alivetransactionkey']);
			 $savePayPalEmails = $Dot->Dot_UpdateAuthorizeNetInfo($uid, $authorizeTestApiID, $authorizeTestTransactionKey, $authorizeLiveApiID, $authorizeLiveTransactionKey);
			 if($savePayPalEmails){
			     echo $page_Lang['authorizenet_updated_success'][$dataUserPageLanguage];
			 }
		  }
	}
	// Update PayStack Infos
	if($requestType == 'paystack_update'){  
	     if(isset($_POST['ptestsecretkey']) && isset($_POST['ptestpublickey']) && isset($_POST['plivesecretkey']) && isset($_POST['plivepublickey'])){
			 $payStackSecret_Key = mysqli_real_escape_string($db, $_POST['ptestsecretkey']);
			 $payStackPublic_Key = mysqli_real_escape_string($db, $_POST['ptestpublickey']);
			 $payStackLive_Key = mysqli_real_escape_string($db, $_POST['plivesecretkey']);
			 $payStackLivePublic_Key = mysqli_real_escape_string($db, $_POST['plivepublickey']);
			 $savePayPalEmails = $Dot->Dot_UpdatePayStackInfo($uid, $payStackSecret_Key, $payStackPublic_Key, $payStackLive_Key, $payStackLivePublic_Key);
			 if($savePayPalEmails){
			     echo $page_Lang['paystack_infos_updated_success'][$dataUserPageLanguage];
			 }
		  }
	} 
	// Update Stripe Infos
	if($requestType == 'stripe_update'){  
	     if(isset($_POST['stestsecretkey']) && isset($_POST['stestpublickey']) && isset($_POST['slivesecretkey']) && isset($_POST['slivepublickey'])){
			 $stripeTestSecret_Key = mysqli_real_escape_string($db, $_POST['stestsecretkey']);
			 $stripeTestPublic_Key = mysqli_real_escape_string($db, $_POST['stestpublickey']);
			 $striipeLiveSecret_Key = mysqli_real_escape_string($db, $_POST['slivesecretkey']);
			 $stripeLivePublic_Key = mysqli_real_escape_string($db, $_POST['slivepublickey']);
			 $savePayPalEmails = $Dot->Dot_UpdateStripeInfo($uid, $stripeTestSecret_Key, $stripeTestPublic_Key, $striipeLiveSecret_Key, $stripeLivePublic_Key);
			 if($savePayPalEmails){
			     echo $page_Lang['stripe_infos_updated_success'][$dataUserPageLanguage];
			 }
		  }
	}
	// RazorPay Mode
	if($requestType == 'razorpay_mode'){
	    if(isset($_POST['mode'])){
		    $razorPayMod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_RazorPay_Mode($uid, $razorPayMod);
			if($saveMode){
			   if($razorPayMod == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	// RazorPay Active Pasive
	if($requestType == 'razorpay_ap'){
	    if(isset($_POST['mode'])){
		    $razorPayAp = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_RazorPay_AP($uid, $razorPayAp);
			if($saveMode){
			   if($razorPayAp == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
	
	// RazorPay Update
	if($requestType == 'razorpay_update'){  
	     if(isset($_POST['ratestid']) && isset($_POST['ratestsecret']) && isset($_POST['ralivekey']) && isset($_POST['ralivesecret'])){
			 $razorPayTest_ID = mysqli_real_escape_string($db, $_POST['ratestid']);
			 $razorPayTest_Secret = mysqli_real_escape_string($db, $_POST['ratestsecret']);
			 $razorPayLive_Key = mysqli_real_escape_string($db, $_POST['ralivekey']);
			 $rarzorPayLive_secret = mysqli_real_escape_string($db, $_POST['ralivesecret']);
			 $savePayPalEmails = $Dot->Dot_UpdateRazorPayInfo($uid, $razorPayTest_ID, $razorPayTest_Secret, $razorPayLive_Key, $rarzorPayLive_secret);
			 if($savePayPalEmails){
			     echo $page_Lang['razorpay_infos_updated_success'][$dataUserPageLanguage];
			 }
		  }
	}
	
	// Update Pages
	if($requestType == 'aboutusupdate'){
		
	    if(isset($_POST['pageCode']) && isset($_POST['sttype'])){
		    $pageCode = mysqli_real_escape_string($db, $_POST['pageCode']);
			$type = mysqli_real_escape_string($db, $_POST['sttype']);
			$updatePageCode = $Dot->Dot_UpdatePageCodes($uid, $pageCode,$type); 
			if($updatePageCode){
				 echo 'Success';
		    }else{echo 'Note UPdated';}
		}
	} 
	
// Paid Withdrawal
if($requestType == 'paid_withdraw'){
    if(isset($_POST['wiid']) && isset($_POST['amount']) && isset($_POST['user'])){
	    $withdrawalID = mysqli_real_escape_string($db, $_POST['wiid']);
		$withdrawalAmount = mysqli_real_escape_string($db, $_POST['amount']);
		$withdrawalUserID = mysqli_real_escape_string($db, $_POST['user']);
		$Pay = $Dot->Dot_WithdrawalPaid($uid,$withdrawalUserID,$withdrawalID);
		if($Pay){
		      $data = array(  
					  'pay_success' => 1,
					  'pay_ok' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#2ecc71"><path d="M86,14.33333c-39.49552,0 -71.66667,32.17115 -71.66667,71.66667c0,39.49552 32.17115,71.66667 71.66667,71.66667c39.49552,0 71.66667,-32.17115 71.66667,-71.66667c0,-39.49552 -32.17115,-71.66667 -71.66667,-71.66667zM86,28.66667c31.74921,0 57.33333,25.58412 57.33333,57.33333c0,31.74921 -25.58412,57.33333 -57.33333,57.33333c-31.74921,0 -57.33333,-25.58412 -57.33333,-57.33333c0,-31.74921 25.58412,-57.33333 57.33333,-57.33333zM84.58626,43.014c-1.93016,0.06167 -3.88601,0.24871 -5.86491,0.57389c-18.23917,3.00283 -32.83576,18.07523 -35.31543,36.39323c-3.9775,29.35467 21.70145,53.99154 51.32845,48.16504c15.609,-3.0745 28.44876,-15.16366 32.66992,-30.50032c2.6875,-9.761 1.81709,-19.07643 -1.35775,-27.22493l-34.9795,34.97949c-2.795,2.78783 -7.33911,2.795 -10.13411,0l-16.43294,-16.43294c-2.795,-2.795 -2.795,-7.33911 0,-10.13411c2.795,-2.795 7.33911,-2.795 10.13411,0l11.36589,11.36589l32.40397,-32.40398c-8.1709,-9.3749 -20.30661,-15.21296 -33.81771,-14.78125z"></path></g></g></svg> Paid'
					 );
			 $result =  json_encode( $data );	
			 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		}else{
		    $data = array(  
					  'pay_success' => 2,
					  'pay_notok' => 'Something went wrong.'
					 );
			 $result =  json_encode( $data );	
			 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		}
	}
}
// Decline Withdrawal
if($requestType == 'decline_withdraw'){
if(isset($_POST['wiid']) && isset($_POST['amount']) && isset($_POST['user'])){
	    $withdrawalID = mysqli_real_escape_string($db, $_POST['wiid']);
		$withdrawalAmount = mysqli_real_escape_string($db, $_POST['amount']);
		$withdrawalUserID = mysqli_real_escape_string($db, $_POST['user']);
		$Pay = $Dot->Dot_WithdrawalDeclined($uid,$withdrawalUserID,$withdrawalID,$withdrawalAmount);
		if($Pay){
		      $data = array(  
					  'pay_success' => 1,
					  'pay_ok' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M44.69313,10.32c-1.84975,0.06887 -3.31344,1.58897 -3.31235,3.44v75.68h-6.98078c-7.58864,0 -13.65922,6.17136 -13.65922,13.76v55.04c0,1.90232 1.4369,3.44 3.33922,3.44h13.76v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88h6.88v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88h6.88v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88h13.76c1.90232,0 3.44,-1.53768 3.44,-3.44v-55.04c0,-7.58864 -6.17136,-13.76 -13.76,-13.76h-6.77922v-75.68c-0.00004,-1.19226 -0.61737,-2.29951 -1.63154,-2.92636c-1.01418,-0.62685 -2.2806,-0.68392 -3.34705,-0.15083l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.51617,-0.25885 -1.08918,-0.38363 -1.66625,-0.36281zM58.58078,17.60312l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l1.90141,-0.95406v97.63687h-75.68v-97.63687l1.9014,0.95406c0.96856,0.48429 2.10862,0.48429 3.07719,0zM103.3411,47.98531c-0.90737,0.02145 -1.76951,0.4006 -2.3986,1.05484l-14.76781,14.76781l-14.76781,-14.76781c-0.64765,-0.66575 -1.53697,-1.04135 -2.46578,-1.0414c-1.39982,0.00037 -2.65984,0.84884 -3.18658,2.14577c-0.52674,1.29693 -0.21516,2.7837 0.78799,3.76001l14.76781,14.76781l-14.76781,14.76781c-0.89864,0.86281 -1.26063,2.14403 -0.94636,3.34954c0.31427,1.20551 1.25569,2.14693 2.4612,2.4612c1.2055,0.31427 2.48672,-0.04772 3.34954,-0.94636l14.76781,-14.76781l14.76781,14.76781c0.86282,0.89864 2.14403,1.26063 3.34954,0.94636c1.2055,-0.31427 2.14693,-1.25569 2.4612,-2.4612c0.31427,-1.20551 -0.04772,-2.48672 -0.94636,-3.34954l-14.76781,-14.76781l14.76781,-14.76781c1.02251,-0.98325 1.33669,-2.4933 0.79119,-3.80278c-0.54549,-1.30949 -1.8388,-2.1499 -3.25697,-2.11643zM41.28,103.2h0.10078v13.76h-0.10078c-3.8012,0 -6.88,-3.0788 -6.88,-6.88c0,-3.8012 3.0788,-6.88 6.88,-6.88zM130.82078,103.21344c3.75323,0.05552 6.77922,3.10007 6.77922,6.86656c0,3.76649 -3.02599,6.81105 -6.77922,6.86656zM41.28,130.72h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88c0,1.89888 -1.54112,3.44 -3.44,3.44h-20.64c-1.89888,0 -3.44,-1.54112 -3.44,-3.44v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44zM75.68,130.72h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88c0,1.89888 -1.54112,3.44 -3.44,3.44h-20.64c-1.89888,0 -3.44,-1.54112 -3.44,-3.44v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44zM110.08,130.72h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88c0,1.89888 -1.54112,3.44 -3.44,3.44h-20.64c-1.89888,0 -3.44,-1.54112 -3.44,-3.44v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44z"></path></g></g></svg>Declined'
					 );
			 $result =  json_encode( $data );	
			 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		}else{
		    $data = array(  
					  'pay_success' => 2,
					  'pay_notok' => 'Already declined this withdrawal.'
					 );
			 $result =  json_encode( $data );	
			 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		}
	}
}
// Delete Withdrawal
if($requestType == 'delete_withdraw'){
		if(isset($_POST['wiid']) && isset($_POST['amount']) && isset($_POST['user'])){
				$withdrawalID = mysqli_real_escape_string($db, $_POST['wiid']);
				$withdrawalAmount = mysqli_real_escape_string($db, $_POST['amount']);
				$withdrawalUserID = mysqli_real_escape_string($db, $_POST['user']);
				$Pay = $Dot->Dot_WithdrawalDelete($uid,$withdrawalUserID,$withdrawalID);
				if($Pay){
					  $data = array(  
							  'pay_success' => 1,
							  'pay_ok' => ''
							 );
					 $result =  json_encode( $data );	
					 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
				}else{
					$data = array(  
							  'pay_success' => 2,
							  'pay_notok' => 'At this stage, you can only decline this withdrawal.'
							 );
					 $result =  json_encode( $data );	
					 echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
				}
		 }
}
// Delete Point
if($requestType == 'delete_point'){
   if(isset($_POST['pointid'])){
       $pointID = mysqli_real_escape_string($db, $_POST['pointid']);
	   $deletePointID = $Dot->Dot_DeletePointFromData($uid, $pointID);
	   if($deletePointID){
			$data = array(  
					'point_deleted' => 1,
					'pay_ok' => 'Point Successfully Deleted'
				   );
		   $result =  json_encode( $data );	
		   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
	   }else {
		   $data = array(  
					'point_deleted' => 2,
					'pay_ok' => 'You cannot delete this score because it has not been calculated yet.'
				   );
		   $result =  json_encode( $data );	
		   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
	   }
   }
}
// Delete Boost
if($requestType == 'delete_boost'){
	if(isset($_POST['boostid'])){
		   $pointID = mysqli_real_escape_string($db, $_POST['boostid']);
		   $deletePointID = $Dot->Dot_DeleteBoostFromData($uid, $pointID); 
		   if($deletePointID){
				$data = array(  
						'point_deleted' => 1,
						'pay_ok' => 'Boosted Posts Delete Successfully!'
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		   }else {
			   $data = array(  
						'point_deleted' => 2,
						'pay_ok' => $deletePointID 
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
		   }
	   }
}
/*Create New Pro Package*/ 
if($requestType == 'newpropackage'){
    if(isset($_POST['prtitle']) && isset($_POST['prdesc']) && isset($_POST['popackamount']) && isset($_POST['propacicon']) && isset($_POST['proevery']) && isset($_POST['prodwmy'])){
		function unique_id($l = 9) {
			return substr(uniqid(mt_rand(), true), 0, $l);
		}
	     $newproPackageTitle = mysqli_real_escape_string($db, $_POST['prtitle']);
		 $newproPackageDescription = mysqli_real_escape_string($db, $_POST['prdesc']);
		 $newproPackageAmount = mysqli_real_escape_string($db, $_POST['popackamount']);
		 $newproPackageIcon = mysqli_real_escape_string($db, $_POST['propacicon']);
		 $newproPackageEvery = mysqli_real_escape_string($db, $_POST['proevery']);
		 $newproPackageDwMy = mysqli_real_escape_string($db, $_POST['prodwmy']);
		 $uniqKey = unique_id();
		 $CreateNewProPackage = $Dot->Dot_AddNewProPackage($uid, $newproPackageTitle,$newproPackageDescription,$newproPackageAmount,$newproPackageIcon,$newproPackageEvery,$newproPackageDwMy,$uniqKey);
		 if($CreateNewProPackage){
		    echo 200;
		 }else{
		    echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure" style="color:#d71a1a;">'.$page_Lang['note_for_all_field_required'][$dataUserPageLanguage].'</div><div class="confirmButtons">
			<div class="tab_frame" style="margin: 0 auto !important;">
			    <button class="ui_button btn_0 blue chrome " data-btn-id="0">
				    <span>'.$page_Lang['ok_understood'][$dataUserPageLanguage].'</span>
		       </button>
			</div> 
			</div></div></div></div>';
		 }
	}
}
/*Edit Pro Package*/
if($requestType == 'editpackage'){
   if(isset($_POST['packageID'])){
	      $editPackageID = mysqli_real_escape_string($db, $_POST['packageID']);
		  $getPackageItem = $Dot->Dot_GetProPackageItemFromID($uid, $editPackageID);
		  $ItemPriceType = $getPackageItem['price_type'];
		  $ItemAmounth = $getPackageItem['price_amounth'];
		  $ItemPriceInfo = $getPackageItem['price_info']; 
		  $ItemPriceIcon = $getPackageItem['price_icon'];
		  $ItemPriceTime = $getPackageItem['pro_price_time'];
		  $ItemYdmW = $getPackageItem['pro_price_year_day_month_week'];
		  include("../contents/html_edit_pro_packege.php");
   }
}
/*Edit This Package*/
if($requestType == 'editthispackage'){
   if(isset($_POST['prtitle']) && isset($_POST['prdesc']) && isset($_POST['popackamount']) && isset($_POST['propacicon']) && isset($_POST['proevery']) && isset($_POST['prodwmy']) && isset($_POST['pacID'])){
		 
	     $updateproPackageTitle = mysqli_real_escape_string($db, $_POST['prtitle']);
		 $updateproPackageDescription = mysqli_real_escape_string($db, $_POST['prdesc']);
		 $updateproPackageAmount = mysqli_real_escape_string($db, $_POST['popackamount']);
		 $updateproPackageIcon = mysqli_real_escape_string($db, $_POST['propacicon']);
		 $updateproPackageEvery = mysqli_real_escape_string($db, $_POST['proevery']);
		 $updateproPackageDwMy = mysqli_real_escape_string($db, $_POST['prodwmy']); 
		 $updatepackageID = mysqli_real_escape_string($db, $_POST['pacID']); 
		 $UpdateProPackage = $Dot->Dot_UpdateProPackage($uid, $updateproPackageTitle,$updateproPackageDescription,$updateproPackageAmount,$updateproPackageIcon,$updateproPackageEvery,$updateproPackageDwMy,$updatepackageID);
		 if($UpdateProPackage){
		    echo 200;
		 }
	}
}
// Features Settings 
	if($requestType == 'avantage_status'){
	    if(isset($_POST['mode']) && isset($_POST['thisid'])){
		    $textPostMode = mysqli_real_escape_string($db, $_POST['mode']);
			$thisAvantageID = mysqli_real_escape_string($db, $_POST['thisid']);
			$saveMode = $Dot->Dot_ProAvantageStatus($uid, $textPostMode,$thisAvantageID);
			if($saveMode){
			   if($textPostMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
/*Delete Pro Package*/
if($requestType == 'delete_this_protype'){ 
       if(isset($_POST['prid'])){ 
	         $prPackageID = mysqli_real_escape_string($db, $_POST['prid']); 
			 $packageDelete = $Dot->Dot_DeleteEvent($uid,$prPackageID);
			 if($packageDelete){
			      echo $packageDelete;
			 }else{
			    echo '200';	 
			 }
	   } 
}
if($requestType == 'pro_system_status'){
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_ProSystemMode($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
}
if($requestType == 'point_system_status'){
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PointSystemMode($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
}
if($requestType == 'updatedefaultsearch'){
	if(isset($_POST['miAge']) && isset($_POST['maxAge']) && isset($_POST['dist']) && isset($_POST['gen']) && isset($_POST['onof']) && isset($_POST['av']) && isset($_POST['relstat']) && isset($_POST['sexlity']) && isset($_POST['heght']) && isset($_POST['weght']) && isset($_POST['lfstyl']) && isset($_POST['chldrn']) && isset($_POST['smkhbt']) && isset($_POST['drnkhbt']) && isset($_POST['hrclr']) && isset($_POST['eyclr']) && isset($_POST['bdyType'])){ 
	
	    $defaultGender = mysqli_real_escape_string($db, $_POST['gen']);
		$defaultOnlineOfflineStatus = mysqli_real_escape_string($db, $_POST['onof']);
		$defaultAvatarStatus = mysqli_real_escape_string($db, $_POST['av']);
		$defaultAgeStart = mysqli_real_escape_string($db, $_POST['miAge']);
		$defaultAgeEnd = mysqli_real_escape_string($db, $_POST['maxAge']);
		$defaultDistance = mysqli_real_escape_string($db, $_POST['dist']);
		$defaultRelationShip = mysqli_real_escape_string($db, $_POST['relstat']);
		$defaultSexuality = mysqli_real_escape_string($db, $_POST['sexlity']);
		$defaultHeight = mysqli_real_escape_string($db, $_POST['heght']);
		$defaultWeight = mysqli_real_escape_string($db, $_POST['weght']);
		$defaultLifeStyle = mysqli_real_escape_string($db, $_POST['lfstyl']);
		$defaultChildren = mysqli_real_escape_string($db, $_POST['chldrn']);
		$defaultSmokingHabit = mysqli_real_escape_string($db, $_POST['smkhbt']);
		$defaultDrinkingHabit = mysqli_real_escape_string($db, $_POST['drnkhbt']);
		$defaultBodyType = mysqli_real_escape_string($db, $_POST['hrclr']);
		$defaultHairColor = mysqli_real_escape_string($db, $_POST['eyclr']);
		$defaultEyeColor = mysqli_real_escape_string($db, $_POST['bdyType']);
		
		$UpdateDefaultSearchFilters = $Dot->Dot_UpdateDefaultSearchFilter($uid, $defaultGender, $defaultOnlineOfflineStatus, $defaultAvatarStatus, $defaultAgeStart, $defaultAgeEnd, $defaultDistance, $defaultRelationShip, $defaultSexuality, $defaultHeight, $defaultWeight, $defaultLifeStyle , $defaultChildren , $defaultSmokingHabit, $defaultDrinkingHabit, $defaultBodyType, $defaultHairColor, $defaultEyeColor);
	} 
}
if($requestType == 'pointSystemMax'){
   if(isset($_POST['hmpetod']) && isset($_POST['tmnopucgpd'])){
	    $hmpetod = mysqli_real_escape_string($db, $_POST['hmpetod']);
		$tmnopucgpd = mysqli_real_escape_string($db, $_POST['tmnopucgpd']);
		$updateMaximumPoint = $Dot->Dot_UpdateMaxPoint($uid, $hmpetod, $tmnopucgpd);
		if($updateMaximumPoint){
		   echo $page_Lang['points_updated_successfully'][$dataUserPageLanguage];
		}
   }
}
/*pointSystemPoint*/
if($requestType == 'pointSystemPoint'){ 
    if(isset($_POST['hmpol']) && isset($_POST['hmpoc']) && isset($_POST['hmpop']) && isset($_POST['hmpos']) && isset($_POST['hmpov'])){
		  $updateHowManyPointOneLike = mysqli_real_escape_string($db, $_POST['hmpol']);
		  $updateHowManyPointOneComment = mysqli_real_escape_string($db, $_POST['hmpoc']);
		  $updateHowManyPointOnePost = mysqli_real_escape_string($db, $_POST['hmpop']);
		  $updateHowManyPointOneStorie = mysqli_real_escape_string($db, $_POST['hmpos']);
		  $updateHowManyPointOneVote = mysqli_real_escape_string($db, $_POST['hmpov']);
		  $updateMaximumPoint = $Dot->Dot_UpdatePointsForOnePost($uid, $updateHowManyPointOneLike, $updateHowManyPointOneComment, $updateHowManyPointOnePost, $updateHowManyPointOneStorie, $updateHowManyPointOneVote);
		  if($updateMaximumPoint){
			  echo $page_Lang['points_updated_successfully'][$dataUserPageLanguage];
		  }
	}
}
///////////////////////////////////////////////////////
if($requestType == 'point_like_system_status'){
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PointSystemModeForLike($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
}
if($requestType == 'point_comment_status'){
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PointSystemModeForComment($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
} 
if($requestType == 'point_post_status'){ 
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PointSystemModeForPost($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
}
if($requestType == 'point_strs'){ 
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PointSystemModeForStories($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
}
if($requestType == 'point_votes'){
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_PointSystemModeForVote($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
}
if($requestType == 'canonesignal'){
	    if(isset($_POST['mode'])){
		    $prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_OneSignalStatusMode($uid, $prosystmmod);
			if($saveMode){
			    if($prosystmmod == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
}
if($requestType == 'verificationmail'){
   if(isset($_POST['mode'])){
		$prosystmmod = mysqli_real_escape_string($db, $_POST['mode']);
		$saveMode = $Dot->Dot_VerificationMailStatusMode($uid, $prosystmmod);
		if($saveMode){
			if($prosystmmod == 0){
				 echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
			}else {
				 echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
			}
		}
	}
}
if($requestType == 'enable_disable_profiledesign'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_EnableDisableProfileDesign($uid, $showHideCard);
			 if($saveMode){
			   if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
}
if($requestType == 'enable_disable_profilebackground'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_EnableDisableProfileBackgroundImage($uid, $showHideCard);
			 if($saveMode){
			   if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
}
if($requestType == 'enable_disable_profilebackgroundSound'){
	     if(isset($_POST['mode'])){
		     $showHideCard = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_EnableDisableProfileBackgroundSound($uid, $showHideCard);
			 if($saveMode){
			   if($showHideCard == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
}
/*Edit Cargo Details*/
if($requestType == 'cargoDetail'){
    if(isset($_POST['cargoname']) && isset($_POST['cargoid']) && isset($_POST['cargoUrl'])){
	        $cargoName = mysqli_real_escape_string($db, $_POST['cargoname']);
			$cargoId = mysqli_real_escape_string($db, $_POST['cargoid']);
			$cargoUrl = mysqli_real_escape_string($db, $_POST['cargoUrl']);
			$UpdateCargoDetails = $Dot->Dot_UpdateCargoDetails($uid, $cargoName, $cargoId, $cargoUrl);
			if($UpdateCargoDetails){
			     echo $page_Lang['cargo_information_updated'][$dataUserPageLanguage]; 
			}
	}
}
/*ADD New Cargo*/
if($requestType == 'saveNewCargo'){
    if(isset($_POST['ncargoname']) && isset($_POST['ncargoUrl'])){
	        $cargoName = mysqli_real_escape_string($db, $_POST['ncargoname']); 
			$cargoUrl = mysqli_real_escape_string($db, $_POST['ncargoUrl']);
			$UpdateCargoDetails = $Dot->Dot_SaveNewCargo($uid, $cargoName, $cargoUrl);
			if($UpdateCargoDetails){
			     echo $page_Lang['new_cargo_added_success'][$dataUserPageLanguage]; 
			}
	}
}
/*Delete Cargo*/
if($requestType == 'delete_this_crg'){
    if(isset($_POST['cargoID'])){
		$cargoId = mysqli_real_escape_string($db, $_POST['cargoID']);
	    $UpdateCargoDetails = $Dot->Dot_DeleteCargo($uid, $cargoId);
		 if($UpdateCargoDetails){
		     echo $page_Lang['cargo_deleted'][$dataUserPageLanguage]; 
	     }
	}
}
/*Edit Icon*/
if($requestType == 'editIcon'){
    if(isset($_POST['this'])){
		 $eThisIcon = mysqli_real_escape_string($db, $_POST['this']);
		 $checkIconExist = $Dot->Dot_CheckIconExist($eThisIcon);
		 if($checkIconExist){
		     include("../contents/html_edit_icon.php");
		 } 
	}
}
/*Edit Icon Codes*/
if($requestType == 'saveIconUpdadte'){
    if(isset($_POST['iconID']) && isset($_POST['iconc'])){
	    $thisIconID = mysqli_real_escape_string($db, $_POST['iconID']);
	    $thisIconCode = mysqli_real_escape_string($db, $_POST['iconc']);
		$updateThisIcon = $Dot->Dot_UpdateIcon($uid, $thisIconID, $thisIconCode);
	}
}
/*Add New Icon*/
if($requestType == 'addNewIcon'){
    if(isset($_POST['this'])){
		 $eThisIcon = mysqli_real_escape_string($db, $_POST['this']);
		 $checkIconExist = $Dot->Dot_CheckIconExist($eThisIcon);
		 if($checkIconExist){
		     include("../contents/html_add_new_icon.php");
		 } 
	}
}
/*Edit Icon Codes*/
if($requestType == 'saveNewIcon'){
    if(isset($_POST['iconID']) && isset($_POST['iconc'])){
	    $thisIconID = mysqli_real_escape_string($db, $_POST['iconID']);
	    $thisIconCode = mysqli_real_escape_string($db, $_POST['iconc']);
		$updateThisIcon = $Dot->Dot_SaveNewIcon($uid, $thisIconID, $thisIconCode);
	}
}
/*Edit Icon Codes*/
if($requestType == 'svNewSvg'){
    if(isset($_POST['key']) && isset($_POST['iconc'])){
	    $thisIconID = mysqli_real_escape_string($db, $_POST['key']);
	    $thisIconCode = mysqli_real_escape_string($db, $_POST['iconc']);
		$updateThisIcon = $Dot->Dot_SaveNewSVGIcon($uid, $thisIconID, $thisIconCode);
	}
}
/*Share Announcement*/
if($requestType == 'shareAnnouncement'){
    if(isset($_POST['announce_type']) && isset($_POST['announce_title']) && isset($_POST['announce'])){
	      $announceType = mysqli_real_escape_string($db, $_POST['announce_type']);
		  $announceTitle = mysqli_real_escape_string($db, $_POST['announce_title']);
		  $announcement = mysqli_real_escape_string($db, $_POST['announce']);
		  $saveAnnouncement = $Dot->Dot_InsertNewAnnouncement($uid, $announceType,$announceTitle,$announcement);
		  if($saveAnnouncement){
		       echo $page_Lang['announce_shared_with_users'][$dataUserPageLanguage];
		  }
	}
}
/*Edit Announcement*/
if($requestType == 'editAnnounce'){
    if(isset($_POST['announceID'])){
		 $anID = mysqli_real_escape_string($db, $_POST['announceID']);
		 $checkAnnouncementID = $Dot->Dot_GetAnnouncementDetailsFromID($anID);
		 if($checkAnnouncementID){
			 $editAnnouncementID = $checkAnnouncementID['an_id'];
			 $editAnnouncementType = $checkAnnouncementID['an_type'];
			 $editAnnouncementText = $checkAnnouncementID['annnouncement_text'];
			 $editAnnouncementTitle = $checkAnnouncementID['announcement_title'];
		     include("../contents/html_edit_announcement.php");
		 } 
	}
}
/*Save Edited Announcement*/
if($requestType == 'shareEditedAnnouncement'){ 
   if(isset($_POST['anID']) && isset($_POST['anTitle']) && isset($_POST['anText']) && isset($_POST['aType'])){
          $editedAnnounceID = mysqli_real_escape_string($db, $_POST['anID']);
		  $editedAnnounceTitle = mysqli_real_escape_string($db, $_POST['anTitle']);
		  $editedAnnounceText = mysqli_real_escape_string($db, $_POST['anText']);
		  $editedAnnounceType = mysqli_real_escape_string($db, $_POST['aType']);
		  $saveeditedAnnounceDetails = $Dot->Dot_SaveEditedAnnounceDetails($uid, $editedAnnounceID, $editedAnnounceText,$editedAnnounceTitle,$editedAnnounceType);
		  if($saveeditedAnnounceDetails){
		       echo $page_Lang['announce_edited_success'][$dataUserPageLanguage];
		  }else{
		       echo $page_Lang['announce_not_edited'][$dataUserPageLanguage];
		  }
   }
}
/*Delete Announcement*/
if($requestType ==  'delete_this_announce'){
    if(isset($_POST['aid'])){
	     $AnnounceID = mysqli_real_escape_string($db, $_POST['aid']);
		 $deleteAnnounce = $Dot->Dot_DeleteAnnouncement($uid, $AnnounceID);
		 if($deleteAnnounce){
			   $data = array(  
						'deleted' => 1,
						'delete_not' => $page_Lang['announcement_deleted_success'][$dataUserPageLanguage]
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
	     }else{
			 $data = array(  
						'deleted' => 0,
						'delete_not' => $page_Lang['announcement_can_not_deleted'][$dataUserPageLanguage]
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);  
	     }
	}
}  
/*Update Announcement Status*/
if($requestType == 'announcementstatus'){ 
   if(isset($_POST['announce']) && isset($_POST['val'])){
	  $modeAnnouncementID = mysqli_real_escape_string($db, $_POST['announce']);
	  $modeVal = mysqli_real_escape_string($db, $_POST['val']);
	  $updateAnnouncementStatus = $Dot->Dot_UpdateAnnouncementStatus($uid, $modeAnnouncementID, $modeVal);
	  if($updateAnnouncementStatus){
			   $data = array(  
						'deleted' => 1,
						'delete_not' => $page_Lang['announcement_status_changed_successfully'][$dataUserPageLanguage]
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
	     }else{
			 $data = array(  
						'deleted' => 0,
						'delete_not' => $page_Lang['announcement_not_status_changed'][$dataUserPageLanguage]
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);  
	     }
   }
}
if($requestType == 'twilioSet'){ 
	 if(isset($_POST['twilioSID']) && isset($_POST['twilioKeySID']) && isset($_POST['twilioAKeyID']) && isset($_POST['twilioVideoCallTime']) && isset($_POST['twilioVideoCallDialTime'])){
		  $updateTwilioSID = mysqli_real_escape_string($db, $_POST['twilioSID']);
		  $twilioKeySID = mysqli_real_escape_string($db, $_POST['twilioKeySID']);
		  $twilioAKeyID = mysqli_real_escape_string($db, $_POST['twilioAKeyID']);
		  $twilioVideoCallTime = mysqli_real_escape_string($db, $_POST['twilioVideoCallTime']);
		  $twilioVideoCallDialTime = mysqli_real_escape_string($db, $_POST['twilioVideoCallDialTime']);
		  $dataUpdateTwilio = $Dot->Dot_UpdateTwilio($uid, $updateTwilioSID,$twilioKeySID, $twilioAKeyID,$twilioVideoCallTime,$twilioVideoCallDialTime);
		  if($dataUpdateTwilio){
			  echo $page_Lang['twilio_settings_saved'][$dataUserPageLanguage];
	      }else{
			  echo $page_Lang['twilio_settings_not_saved'][$dataUserPageLanguage]; 
		   }
	 }
} 
/*Update City*/ 
if($requestType == 'updateGCity'){
   if(isset($_POST['cityID']) && isset($_POST['city'])){
        $cityID = mysqli_real_escape_string($db, $_POST['cityID']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$updateCity = $Dot->Dot_UpdateCityNameFromID($uid, $cityID, $city);
		if($updateCity){
			  echo $page_Lang['city_name_updated'][$dataUserPageLanguage];
	      }else{
			  echo $page_Lang['city_name_not_updated'][$dataUserPageLanguage]; 
	   } 
   }
}
/*Delete This City*/
if($requestType == 'delete_this_city'){
    if(isset($_POST['cityID'])){
	   $cityID = mysqli_real_escape_string($db, $_POST['cityID']);
	   $DeleteThisCity = $Dot->Dot_DeleteThisCityFomData($uid, $cityID); 
		if($DeleteThisCity){
			   $data = array(  
						'deleted' => 1,
						'delete_not' => $page_Lang['city_deleted_success'][$dataUserPageLanguage]
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
	     }else{
			 $data = array(  
						'deleted' => 0,
						'delete_not' => $page_Lang['city_cannot_deleted'][$dataUserPageLanguage]
					   );
			   $result =  json_encode( $data );	
			   echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);  
	     } 
		
	}
}
/*Update Country*/ 
if($requestType == 'updateGCountry'){
   if(isset($_POST['countID']) && isset($_POST['count'])){
        $countID = mysqli_real_escape_string($db, $_POST['countID']);
		$count = mysqli_real_escape_string($db, $_POST['count']);
		$updateCountry = $Dot->Dot_UpdateCountryNameFromID($uid, $countID, $count);
		if($updateCountry){
			  echo $page_Lang['country_name_updated'][$dataUserPageLanguage];
	      }else{
			  echo $page_Lang['country_name_not_updated'][$dataUserPageLanguage]; 
		   }
   }
}
/*Delete This Country*/
if($requestType == 'delete_this_country'){
    if(isset($_POST['countryID'])){
	   $countryID = mysqli_real_escape_string($db, $_POST['countryID']);
	   $DeleteThiscountryID = $Dot->Dot_DeleteThisCountryFomData($uid, $countryID);
	   if($DeleteThiscountryID){
	       echo $page_Lang['country_deleted_successfully'][$dataUserPageLanguage];
	      }else{
			  echo $page_Lang['country_cannot_deleted'][$dataUserPageLanguage]; 
		}
	}
}
/*Update State*/ 
if($requestType == 'updateGState'){
   if(isset($_POST['stateID']) && isset($_POST['state'])){
        $stateID = mysqli_real_escape_string($db, $_POST['stateID']);
		$state = mysqli_real_escape_string($db, $_POST['state']);
		$updateState = $Dot->Dot_UpdateStateNameFromID($uid, $stateID, $state);
		if($updateState){
			  echo $page_Lang['state_name_updated'][$dataUserPageLanguage];
	      }else{
			  echo $page_Lang['state_name_not_updated'][$dataUserPageLanguage]; 
		   }
   }
}   
/*Delete This Country*/
if($requestType == 'delete_this_state'){
    if(isset($_POST['stateID'])){
	   $stateID = mysqli_real_escape_string($db, $_POST['stateD']);
	   $DeleteThisstate = $Dot->Dot_DeleteThisStateFomData($uid, $stateID);
	   if($DeleteThisstate){
	       echo $page_Lang['statee_deleted_successfully'][$dataUserPageLanguage];
	      }else{
			  echo $page_Lang['statee_cannot_deleted'][$dataUserPageLanguage]; 
		}
	}
} 

if($requestType == 'authorizenet_mode'){
	    if(isset($_POST['mode'])){
		    $iyziCoMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_AutHorizeMode($uid, $iyziCoMode);
			if($saveMode){
			   if($iyziCoMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
if($requestType == 'authorize_ap'){
	    if(isset($_POST['mode'])){
		    $iyziCoMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_AutHorizeOnOf($uid, $iyziCoMode);
			if($saveMode){
			   if($iyziCoMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else { 
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
 if($requestType == 'sf_status'){
     if(isset($_POST['mode']) && isset($_POST['thisid'])){
          $mode = mysqli_real_escape_string($db, $_POST['mode']);
		  $thisID = mysqli_real_escape_string($db, $_POST['thisid']);
		  $change = $Dot->Dot_UpdateSearchFilterStatus($uid, $thisID, $mode);
		  if($change){
		      if($mode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
		  }
	 }
 }
 /*Change Payment Currnecies  "razor","strip","paystack","authorize","bitpay","iyzico","payp" */
 $PayPalCurrencies = array("USD","AUD","EUR","BRL","CAD","CZK","DKK","HKD","HUF","INR","ILS","JPY","MYR","MXN","TWD","NZD","NOK","PHP","PLN","GBP","RUB","SGD","CHF","THB");
 $iyzicoCurrencies = array("USD","EUR","GBP","RUB","NOK","CHF","TRY");
 $bitpayCurrencies = array("USD","AUD","EUR","GBP","MXN","NZD","ZAR");
 $authorizeCurrencies = array("USD");
 $paystackCurrencies = array("NGN");
 $stripCurrencies = array("USD","AUD","EUR","BRL","CAD","CZK","DKK","HKD","HUF","INR","ILS","JPY","MYR","MXN","TWD","NZD","NOK","PHP","PLN","GBP","RUB","SGD","CHF","THB");
 $razorCurrencies = array("USD","EUR","GBP","SGD","AUD","AED","CAD","CNY","SEK","NZD","MXN","HKD","NOK","RUB","INR","PHP","UYU","NPR","ZAR");
 if($requestType == 'payp'){ 
     if(in_array(isset($_POST['crncy']), $PayPalCurrencies)){
	     $crncy = mysqli_real_escape_string($db, $_POST['crncy']);
		 $updateCurrency = $Dot->Dot_UpdatePayPalCurrency($uid, $crncy);
		 if($updateCurrency){
		      echo $page_Lang['currency_updated_successfully'][$dataUserPageLanguage];
		 }else{
		     echo $page_Lang['currency_not_could_not_updated'][$dataUserPageLanguage];
		 }
	 }
 }
 if($requestType == 'iyzico'){ 
     if(in_array(isset($_POST['crncy']), $iyzicoCurrencies)){
	     $crncy = mysqli_real_escape_string($db, $_POST['crncy']);
		 $updateCurrency = $Dot->Dot_UpdateIyzicoCurrency($uid, $crncy);
		 if($updateCurrency){
		      echo $page_Lang['currency_updated_successfully'][$dataUserPageLanguage];
		 }else{
		     echo $page_Lang['currency_not_could_not_updated'][$dataUserPageLanguage];
		 }
	 }
 }
 if($requestType == 'bitpay'){ 
     if(in_array(isset($_POST['crncy']), $bitpayCurrencies)){
	     $crncy = mysqli_real_escape_string($db, $_POST['crncy']);
		 $updateCurrency = $Dot->Dot_UpdateBitpayCurrency($uid, $crncy);
		 if($updateCurrency){
		      echo $page_Lang['currency_updated_successfully'][$dataUserPageLanguage];
		 }else{
		     echo $page_Lang['currency_not_could_not_updated'][$dataUserPageLanguage];
		 }
	 }
 }
 if($requestType == 'authorize'){ 
     if(in_array(isset($_POST['crncy']), $authorizeCurrencies)){
	     $crncy = mysqli_real_escape_string($db, $_POST['crncy']);
		 $updateCurrency = $Dot->Dot_UpdateAuthorizeCurrency($uid, $crncy);
		 if($updateCurrency){
		      echo $page_Lang['currency_updated_successfully'][$dataUserPageLanguage];
		 }else{
		     echo $page_Lang['currency_not_could_not_updated'][$dataUserPageLanguage];
		 }
	 }
 }
 if($requestType == 'paystack'){ 
     if(in_array(isset($_POST['crncy']), $paystackCurrencies)){
	     $crncy = mysqli_real_escape_string($db, $_POST['crncy']);
		 $updateCurrency = $Dot->Dot_UpdatePayStackCurrency($uid, $crncy);
		 if($updateCurrency){
		      echo $page_Lang['currency_updated_successfully'][$dataUserPageLanguage];
		 }else{
		     echo $page_Lang['currency_not_could_not_updated'][$dataUserPageLanguage];
		 }
	 }
 }
 if($requestType == 'strip'){ 
     if(in_array(isset($_POST['crncy']), $stripCurrencies)){
	     $crncy = mysqli_real_escape_string($db, $_POST['crncy']);
		 $updateCurrency = $Dot->Dot_UpdateStripeCurrency($uid, $crncy);
		 if($updateCurrency){
		      echo $page_Lang['currency_updated_successfully'][$dataUserPageLanguage];
		 }else{
		     echo $page_Lang['currency_not_could_not_updated'][$dataUserPageLanguage];
		 }
	 }
 }
 if($requestType == 'razor'){ 
     if(in_array(isset($_POST['crncy']), $razorCurrencies)){
	     $crncy = mysqli_real_escape_string($db, $_POST['crncy']);
		 $updateCurrency = $Dot->Dot_UpdateRazorPayCurrency($uid, $crncy);
		 if($updateCurrency){
		      echo $page_Lang['currency_updated_successfully'][$dataUserPageLanguage];
		 }else{
		     echo $page_Lang['currency_not_could_not_updated'][$dataUserPageLanguage];
		 }
	 }
 }
 if($requestType == 'video_auto_play'){
	     if(isset($_POST['mode'])){
		     $FilterImagePostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_VideoAutoPlayMode($uid, $FilterImagePostMode);
			 if($saveMode){
			   if($FilterImagePostMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	if($requestType == 'video_auto_play_sound'){
	     if(isset($_POST['mode'])){
		     $FilterImagePostMode = mysqli_real_escape_string($db, $_POST['mode']);
			 $saveMode = $Dot->Dot_VideoAutoMuteMode($uid, $FilterImagePostMode);
			 if($saveMode){
			   if($FilterImagePostMode == 0){
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}
			}
		 }
	}
	// Update Default Language 
  if($requestType == 'selectDefaultTheme'){
	   if(isset($_POST['dthm'])){
		   $defaUltTheme = mysqli_real_escape_string($db, $_POST['dthm']);  
		   $defLng = $Dot->Dot_UpdateDefaultTheme($uid, $defaUltTheme);
		   if($defLng){
		        echo $page_Lang['default_theme_changed_success'][$dataUserPageLanguage];
		   }else{
			  echo $page_Lang['default_theme_not_changed'][$dataUserPageLanguage];
		   }
	   }
  }
  if($requestType == 'stripe_ap'){
	    if(isset($_POST['mode'])){
		    $StripeMode = mysqli_real_escape_string($db, $_POST['mode']);
			$saveMode = $Dot->Dot_Stripe_ActivePasive($uid, $StripeMode);
			if($saveMode){
			   if($StripeMode == 0){
				     echo $page_Lang['closed_successfully'][$dataUserPageLanguage];
				}else {
				     echo $page_Lang['opened_successfully'][$dataUserPageLanguage];
				}
			}
		}
	}
} 
?>