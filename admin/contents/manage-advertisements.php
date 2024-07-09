<div class="page_title bold">
  <?php echo $page_Lang['manage_advertisements'][$dataUserPageLanguage];?>
</div>
<div class="global_right_wrapper">
   <div class="global_box_container_white_Ads border-radius">
       <div class="create_avertisementBox">
           <!---->
             
                 
                     <?php 
					   $lastAdsID = isset($_POST['lastAdsID']) ? $_POST['lastAdsID'] : ''; 
					   $getAdvertisements = $Dot->Dot_AllAdvertisementData($lastAdsID);
					   if($getAdvertisements){
						   echo '<div class="adivTable blueTable">
                  <div class="adivTableHeading">
                    <div class="adivTableRow">
                      <div class="adivTableHead">ID</div>
                      <div class="adivTableHead">STATUS</div>
                      <div class="adivTableHead">USER</div>
                      <div class="adivTableHead">CLICK</div>
                      <div class="adivTableHead">VIEWS</div> 
                      <div class="adivTableHead">'.$page_Lang['approval_status'][$dataUserPageLanguage].'</div>
                      <div class="adivTableHead">ACTION</div>
                    </div>
                  </div><div class="adivTableBody"> ';
						  foreach($getAdvertisements as $userAdsData){
							  $dataAdsID = $userAdsData['s_ads_id'];
							  $dataAdsUidFk = $userAdsData['ads_created_uid_fk'];
							  $dataAdsActivated = $userAdsData['s_ads_status'];
							  $dataAdsOffer = $userAdsData['ads_offer'];
							  $dataAdsApprovalStatus = $userAdsData['admin_activated']; 
							  $dataAdsViewCount = $Dot->Dot_UniqAdsViewCount($dataAdsID);
							  $dataAdsClickCount = $Dot->Dot_UniqAdsClickCount($dataAdsID);
							  $dataAdsUserFullName = $Dot->Dot_UserFullName($dataAdsUidFk);
							  $dataAdsUserAvatar = $Dot->Dot_UserAvatar($dataAdsUidFk, $base_url);
							  include("html_ads_data.php");
						   }
						   echo '</div></div> ';
					   }else{
					        echo '<div class="noAdsHere">No will be shown</div>';
					   }
				   ?>  
                  
            
           <!---->
       </div>
   </div>
</div>