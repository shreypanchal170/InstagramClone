<div class="page_title bold"><?php echo $page_Lang['post_reports'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_users">
        <!---->
        <div class="divTable blueTable">
            <div class="divTableHeading">
                <div class="divTableRow first_row">
                    <div class="divTableHead">ID</div>
                    <div class="divTableHead"><?php echo $page_Lang['post_reporter'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead"><?php echo $page_Lang['post_reported'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead"><?php echo $page_Lang['post_report_type'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead"><?php echo $page_Lang['post_report_time'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead"><?php echo $page_Lang['report_checked'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead centered"><?php echo $page_Lang['post_admin_action'][$dataUserPageLanguage];?></div>
                </div>
            </div>
        <!---->
        <div class="divTableBody" id="moreType" data-type="user_posts">
               
                <?php 
				   $lastReport = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
				   $GetUserReportPosts = $Dot->Dot_AllReportedPostList($lastReport);
				   if($GetUserReportPosts){
					  foreach($GetUserReportPosts as $userReportData){
						  $reportID = $userReportData['report_id'];
						  $reportedPostID = $userReportData['reported_post_id_fk'];
						  $reporterUserID = $userReportData['reporter_user_id_fk'];
						  $reportType = $userReportData['reported_type']; 
						  $time = $userReportData['reported_time'];
                          $message_time=date("c", $time);
						  $reportCheckedType = $userReportData['report_checked']; 
						  $checked = '<span class="report_control not" id="rep_type'.$reportID.'">'.$page_Lang['report_not_checked'][$dataUserPageLanguage].'</span>';
						  $textColor = '';
						  $colors = array(
						  '76' => "color:#5d4037; font-weight:600;",
						  '77' => "color:#d84315; font-weight:600;",
						  '78' => "color:#2e7d32; font-weight:600;",
						  '79' => "color:#0277bd; font-weight:600;",
						  '80' => "color:#6a1b9a; font-weight:600;"	);  
						  if($reportCheckedType == '1'){
						      $checked = '<span class="report_control yes">'.$page_Lang['report_checked_yes'][$dataUserPageLanguage].'</span>';
						  }
						  $reporterUserFullName = $Dot->Dot_UserFullName($reporterUserID);
						  $CardDataUserAvatar = $Dot->Dot_UserAvatar($reporterUserID, $base_url);   
						  include("html_reported_data.php");
					   }
				   }
			   ?>  
            </div>
            </div>  
        
   </div>
</div>