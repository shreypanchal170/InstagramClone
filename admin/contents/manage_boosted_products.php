<div class="page_title bold"><?php echo $page_Lang['users_shared_posts'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_users">
        <!---->
        <div class="divTable blueTable">
            <div class="divTableHeading">
                <div class="divTableRow first_row">
                    <div class="divTableHead">ID</div>
                    <div class="divTableHead"><?php echo $page_Lang['publisher'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead"><?php echo $page_Lang['see_boosted_product'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead"><?php echo $page_Lang['boost_status'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead"><?php echo $page_Lang['remaining_budget'][$dataUserPageLanguage];?></div>
                    <div class="divTableHead centered"><?php echo $page_Lang['post_admin_action'][$dataUserPageLanguage];?></div>
                </div>
            </div>
        <!---->
        <div class="divTableBody" id="moreType" data-type="user_posts_text">
               
                <?php 
				   $lastPID = isset($_POST['lastUserID']) ? $_POST['lastUserID'] : ''; 
				   $GetUserPosts = $Dot->Dot_AllUserProductBoostedManagement($lastPID);
				   if($GetUserPosts){
					  foreach($GetUserPosts as $userPostData){
						  $dataUserPostUserID = $userPostData['user_id'];
						  $dataUserPostID = $userPostData['user_post_id'];
						  $dataUserPostType = $userPostData['post_type'];
						  $time = $userPostData['post_created_time']; 
						  $boostAdsStatus = $userPostData['ads_status'];
						  $boostAdsPrice = $userPostData['ads_price'];
                          $message_time=date("c", $time);
						  $dataPostUserUserName = $userPostData['user_name'];
						  $dataPostUserFullName = $userPostData['user_fullname'];
						  $dataPostUserProfileStatus = $userPostData['user_status']; 
						  $postType_icon = array(
								'p_product' => '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#abb0bb"><path d="M86,5.73333c-1.4663,0 -2.93278,0.55882 -4.05364,1.67969l-38.45365,38.45365h16.21458l26.29271,-26.29271l26.29271,26.29271h16.21458l-38.45364,-38.45365c-1.12087,-1.12087 -2.58734,-1.67969 -4.05364,-1.67969zM17.2,57.33333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v11.46667c0,3.1648 2.56853,5.73333 5.73333,5.73333h0.95182l8.91354,53.48125c0.92307,5.52693 5.70843,9.58542 11.3099,9.58542h95.23828c5.6072,0 10.38683,-4.05848 11.30989,-9.58542l8.92474,-53.48125h0.95183c3.1648,0 5.73333,-2.56853 5.73333,-5.73333v-11.46667c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333zM63.06667,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM86,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM108.93333,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333z"></path></g></g></svg>'
						  );
						  $CardDataUserAvatar = $Dot->Dot_UserAvatar($dataUserPostUserID, $base_url);   
						  include("html_user_boosted_product_posts.php");
					   }
				   }
			   ?>  
            </div>
            </div>  
        
   </div>
</div>