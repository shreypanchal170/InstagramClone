<?php 
    $u_AdsID = $u_ad['s_ads_id'];
	$u_AdsUID = $u_ad['ads_created_uid_fk'];
	$u_AdsCampanyName = $u_ad['ads_campany_name'];
	$u_AdsWebSite = $u_ad['s_ads_website'];
	$u_AdsShowGender = $u_ad['ads_show_gender'];
	$u_AdsDisplayArea = $u_ad['ads_display_area'];
	$u_AdsTitle = $u_ad['s_ads_title'];
	$u_AdsOffer = $u_ad['ads_offer'];
	$u_AdsCateGory = $u_ad['ads_category'];
	$u_AdsLastTime = $u_ad['ads_last_time'];
	$u_AdsDescription = $u_ad['s_ads_description'];
	$u_AdsImage = $u_ad['s_ads_img'];
	$u_AdsStatus = $u_ad['s_ads_status'];
	$u_AdsActivated = $u_ad['admin_activated'];
	$u_AdsStartedTime = $u_ad['s_ads_time'];
	$u_AdsCredit = $u_ad['credit'];
	$u_AdsDisPlayDay = $u_ad['s_ads_display_day'];  
	$uAdsCreditA = $u_ad['a_credit']; 
	$waiting = '';
	if($u_AdsActivated == 'adswaiting_approval'){
	    $waiting = '<div class="waitingApprove">'.$page_Lang['not_accepted_yet'][$dataUserPageLanguage].'</div>';
	}
?>

<!--Advertisement STARTED-->
<div class="zMhqu white_bg">
  <?php echo $waiting;?>
  <!--Ads Header STARTED-->
  <div class="ads_u_header">
    <div class="campanyName"><?php echo $u_AdsCampanyName;?></div>
    <div class="activePasive">
      <div class="ckbx-style-8 ckbx-medium">
        <input type="checkbox" name="ckbx-square-1" class="gst" id="ckbx-size-<?php echo $u_AdsID;?>" data-id="<?php echo $u_AdsID;?>" data-type="adacu" <?php echo $u_AdsStatus == '1' ? "checked='checked'":""; echo $u_AdsStatus == '0' ? "value='1'":"value='0'"; ?>>
        <label for="ckbx-size-<?php echo $u_AdsID;?>"></label>
      </div>
    </div>
  </div>
  <!--Ads Header FINISHED-->
  <!--Advertisement Details STARTED-->
  <div class="global_post_info_container">
     <div class="showHideImage" id="<?php echo $u_AdsID;?>"><div id="sh<?php echo $u_AdsID;?>"><?php echo $page_Lang['show_hide_image'][$dataUserPageLanguage];?></div><div class="icons_new eye_open" id="sha<?php echo $u_AdsID;?>"></div></div>
    <!--Ads Images STARTED-->
    <div class="attang aclosed" id="adsBody<?php echo $u_AdsID;?>">
    <div class="item column-1">
    <?php 
	if($u_AdsImage) { 
	  $ams = explode(",", $u_AdsImage); // Explode the images string value
	  $amr=1;
	  $amf=count($ams);
	  $amTotalImage = $amf-1;  
		  // Get the uploaded image ids
		 $smnewdata=$Dot->Dot_GetUploadAdsImageID($u_AdsImage);
		 if($smnewdata) { 
			// The path to be parsed
			$smfinal_image=$base_url."supponsoreduploads/".$smnewdata['s_ads_img_img']; 
			echo '
		  	 <div class="sldimg">
				<div class="sld_jjzlbU " style="background-image:url('.$smfinal_image.');">
				  <img src="'.$smfinal_image.'" class="sld-exPexU ">
				</div>
			  </div>
			';
	   } 
	}
	?> 
    </div>
    </div>
    <!--Ads Images FINISHED-->
    <!--Ads Text Details STARTED-->
    <div class="post_text_container">
      <div class="post_title"><?php echo $u_AdsTitle;?></div>
      <div class="post_text_info"><?php echo $u_AdsDescription;?></div>
      <div class="ads__url"><?php echo get_domain_from_url($u_AdsWebSite);?></div>
    </div>
    <!--Ads Text Details FINISHED-->
    <!--Other Details STARTED-->
    <span class="otherDetails__a">
       <div class="yourBudget_a rightArrow">
            <div class="yourBudget_o"><?php echo $page_Lang['your_ads_budget'][$dataUserPageLanguage];?></div>
            <div class="uu_udget"><?php echo $uAdsCreditA;?>$</div>
       </div>
       <div class="yourBudget_a">
           <div class="yourBudget_o"><?php echo $page_Lang['your_remaining_budget'][$dataUserPageLanguage];?></div>
           <div class="uu_udget"><?php echo $u_AdsCredit;?>$</div>
       </div>
    </span>
    <!--Other Details FINISHED-->
    <div class="see_full_details" data-type="advertisementDetails" data-post="<?php echo $u_AdsID;?>"><?php echo $page_Lang['click_to_see_more_details_about_this_ad'][$dataUserPageLanguage];?></div>
  </div>
  <!--Advertisement Details FINISHED-->
</div>
<!--Advertisement FINISHED-->