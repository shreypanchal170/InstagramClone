<?php 
include_once("../functions/inc.php");
if(isset($_POST['popUp'])){
   $popUpType = mysqli_real_escape_string($db, $_POST['popUp']);
   if($popUpType == 'deleteComment'){
	     $commentID = mysqli_real_escape_string($db, $_POST['com_id']);
		 $commentUserID = mysqli_real_escape_string($db, $_POST['cuid']);
		 $commentUserName = mysqli_real_escape_string($db, $_POST['cunm']);
         echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['delete_comment_sure'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_comment" data-comment="'.$commentID.'" data-commentuser="'.$commentUserName.'" data-comUid="'.$commentUserID.'" data-type="deleteComment"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
   }
   if($popUpType == 'deletePost'){
	     $postID = mysqli_real_escape_string($db, $_POST['pid']);
		 $postUserName = mysqli_real_escape_string($db, $_POST['punm']); 
         echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_post'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_post" data-post="'.$postID.'" data-user="'.$postUserName.'" data-type="deletePost"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
   }
   if($popUpType == 'deleteStory'){
        $postID = mysqli_real_escape_string($db, $_POST['pid']);
	    $postUserName = mysqli_real_escape_string($db, $_POST['punm']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_post'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_story" data-post="'.$postID.'" data-user="'.$postUserName.'" data-type="deletestory"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
   }
   if($popUpType == 'deleteEvent'){
	   $postID = mysqli_real_escape_string($db, $_POST['pid']);
	    $creator = mysqli_real_escape_string($db, $_POST['punm']); 
      echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_event'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue deleteevent" data-post="'.$creator.'" id="'.$postID.'" data-type="deleteThisEvent"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
   }
   if($popUpType == 'deleteThisUser'){
       $thisUserID = mysqli_real_escape_string($db, $_POST['userID']);
	   echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_delete_this_user'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_user" data-user="'.$thisUserID.'"  data-type="deleteUser"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
   }
   if($popUpType == 'unblockUserPopUp'){
	   $thisUserID = mysqli_real_escape_string($db, $_POST['userID']);
       echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_unblock_this_user'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue remove_blocked_user_list" data-user="'.$thisUserID.'"  data-type="unblockUserPopUp"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
   } 
   if($popUpType == 'deletePosta'){
	     $postID = mysqli_real_escape_string($db, $_POST['pid']);
		 $postUserID = mysqli_real_escape_string($db, $_POST['punm']);
		 echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_post'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_post_now" data-post="'.$postID.'" data-user="'.$postUserID.'" data-type="deletePost_data"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
   }
   if($popUpType == 'deleteAdsAd'){
        $postID = mysqli_real_escape_string($db, $_POST['postID']);
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_ads'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_ads_now" data-post="'.$postID.'" data-type="deleteAdsAd"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	}
	if($popUpType == 'report_delete'){
         $postID = mysqli_real_escape_string($db, $_POST['pid']);
		 $postUserID = mysqli_real_escape_string($db, $_POST['punm']);
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_report'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_reported_post_now" id="'.$postID.'" data-post="'.$postUserID.'" data-type="report_delete"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'del_lang'){
         $lnid = mysqli_real_escape_string($db, $_POST['langID']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_lang_key'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_lang_key" id="'.$lnid.'" data-post="'.$lnid.'" data-type="ln_id_delete"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'delpro'){
         $lnid = mysqli_real_escape_string($db, $_POST['prid']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_remove_this_product'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_prop" id="'.$lnid.'" data-post="'.$lnid.'" data-type="delete_this_prop"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'delProType'){
         $lnid = mysqli_real_escape_string($db, $_POST['prid']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['sure_want_to_delete_this_package'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_protype" id="'.$lnid.'" data-post="'.$lnid.'" data-type="delete_this_protype"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'deleteCargo'){
         $lnid = mysqli_real_escape_string($db, $_POST['cargoID']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['you_want_to_sure_delete_this_cargo'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_crg" id="'.$lnid.'" data-post="'.$lnid.'" data-type="delete_this_crg"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'deleteAnnouncement'){
         $lnid = mysqli_real_escape_string($db, $_POST['anid']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['are_you_sure_want_to_delete_this_anounce'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_announce" id="'.$lnid.'" data-post="'.$lnid.'" data-type="delete_this_announce"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'deleteCity'){
         $lnid = mysqli_real_escape_string($db, $_POST['anid']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['are_you_sure_want_to_delete_this_city'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_city" id="'.$lnid.'" data-post="'.$lnid.'" data-type="delete_this_city"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'deleteCountry'){
         $lnid = mysqli_real_escape_string($db, $_POST['anid']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['are_you_sure_want_to_delete_this_country'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_country" id="'.$lnid.'" data-post="'.$lnid.'" data-type="delete_this_country"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
	 if($popUpType == 'deleteState'){
         $lnid = mysqli_real_escape_string($db, $_POST['anid']); 
		echo '<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'.$page_Lang['are_you_sure_want_to_delete_this_state'][$dataUserPageLanguage].'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'.$page_Lang['cancel'][$dataUserPageLanguage].'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_state" id="'.$lnid.'" data-post="'.$lnid.'" data-type="delete_this_state"><span>'.$page_Lang['sure_delete'][$dataUserPageLanguage].'</span></button></div></div></div></div></div>';
	 }
}
?>