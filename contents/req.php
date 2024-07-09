<?php include_once("../functions/inc.php");?> 
<div class="chatSidebar" id="fchatBox" data-type="chat">
    <div class="chatSidebarWrapper">
        <div class="boxesContainer">
             <!--CHU S-->
             <div class="chu_box">
                  <div class="globalChatBoxHeader"><?php echo $page_Lang['peoples_header'][$dataUserPageLanguage];?></div>
                    <?php   
					        $shortYearAgo = $page_Lang['short_year'][$dataUserPageLanguage];
							$shortMonthAgo = $page_Lang['short_month'][$dataUserPageLanguage];
							$shortWeekAgo = $page_Lang['short_week'][$dataUserPageLanguage];
							$shortDayAgo = $page_Lang['short_day'][$dataUserPageLanguage];
							$shortHourAgo = $page_Lang['short_hour'][$dataUserPageLanguage];
							$shortMinutesAgo = $page_Lang['short_minute'][$dataUserPageLanguage];
							$shortSecondAgo = $page_Lang['short_second'][$dataUserPageLanguage];
							function time_elapsed_string($datetime, $shortYearAgo,$shortMonthAgo,$shortWeekAgo,$shortDayAgo,$shortHourAgo,$shortMinutesAgo,$shortSecondAgo, $full = false) {
								$now = new DateTime;
								$ago = new DateTime($datetime);
								$diff = $now->diff($ago);
							
								$diff->w = floor($diff->d / 7);
								$diff->d -= $diff->w * 7;
							
								$string = array(
									'y' => $shortYearAgo,
									'm' => $shortMonthAgo,
									'w' => $shortWeekAgo,
									'd' => $shortDayAgo,
									'h' => $shortHourAgo,
									'i' => $shortMinutesAgo,
									's' => $shortSecondAgo,
								);
								foreach ($string as $k => &$v) {
									if ($diff->$k) {
										$v = $diff->$k . '' . $v . ($diff->$k > 1 ? '' : '');
									} else {
										unset($string[$k]);
									}
								}
							
								if (!$full) $string = array_slice($string, 0, 1);
									return $string ? implode(', ', $string) . '' : 'now';
								}
					   $wChatUsers = $Dot->Dot_ChatUserList($uid);
					   if($wChatUsers){
					      foreach($wChatUsers as $chU){
							   $wcUserID = $chU['user_id'];   
							   $wcUserAvatar = $Dot->Dot_UserAvatar($wcUserID, $base_url);   
							   $wcUserFullName = $Dot->Dot_UserFullName($wcUserID);
							   $wcUserName = $Dot->Dot_GetUserName($wcUserID);
							   $wcLastLogin = $Dot->Dot_GetUserLastLoginForChat($wcUserID); 
							   $wcgetUnReadMessageCount = $Dot->Dot_CountUnReadMessage($uid, $wcUserID);
							   $msgUnReadCount = '';
							   if($wcgetUnReadMessageCount != '0'){
							       $msgUnReadCount = '<div class="unreadMessageCount" id="unrm'.$wcUserID.'">'.$wcgetUnReadMessageCount.'</div>';
							   }
									$chULastLogin = date("c",$wcLastLogin);
									$chTreeMinutesAgo = time()-120; // Tree minutes ago
									$wcLoginStatus = '';
									if($wcLastLogin > $chTreeMinutesAgo){
										$wcLoginStatus = '<div class="chu_box_user_last_seen"><div class="chu_on"></div></div>';
									}else{ 
										 $wcLoginStatus = '<div class="chu_box_user_last_seen"><div class="theLastSeenTime">'.time_elapsed_string($chULastLogin, $shortYearAgo,$shortMonthAgo,$shortWeekAgo,$shortDayAgo,$shortHourAgo,$shortMinutesAgo,$shortSecondAgo, $full = false).'</div></div>'; 
									} ?>
                           <div class="hvr-bounce-to-right" style="width: 100%;display: inline-block;">         
						   <span class="chu_box_user getminib" id="miniuser_<?php echo $wcUserID;?>" data-page="minibox" data-id="<?php echo $wcUserID;?>" data-user="<?php echo  $wcUserName;?>">  
                                 <div class="chu_box_user_avatar">
                                      <div class="chu_box_avatar" style="background-image: url('<?php echo $wcUserAvatar;?>'); "></div>
                                 </div>
                                 <div class="chu_box_user_name"><?php echo $wcUserFullName;?></div>
                                  <?php echo $wcLoginStatus; echo $msgUnReadCount;?>   
                            </span>    
                            </div>
						<?php  }
					   } else {
					       echo '<div class="noChatUserfoundHere">'.$page_Lang['no_chatted_user_before'][$dataUserPageLanguage].'</div>';
					   }
					?>
             </div>
             <!--CHU F-->
             
                    <?php    
					   $MyOnlineFriends = $Dot->Dot_OnlineFriends($uid);
						 if($MyOnlineFriends){
							 echo '<!--CHo S--><div class="chu_box"><div class="globalChatBoxHeader">'.$page_Lang['others_friends'][$dataUserPageLanguage].'</div>';
							foreach($MyOnlineFriends as $myonlineflwr){
								$MyonlineFriendUID = $myonlineflwr['user_id'];
								$MyonlineFriendAvatar = $Dot->Dot_UserAvatar($MyonlineFriendUID,$base_url); 
								$MyonlineFriendUserFullName = $Dot->Dot_UserFullName($MyonlineFriendUID);
								$MyonlineFriendUserName = $myonlineflwr['user_name'];
								$MyonlineFriendLastLogin = $myonlineflwr['last_login']; 
							    $MyLastLogin = $Dot->Dot_GetUserLastLoginForChat($MyonlineFriendUID);  
									$MychULastLogin = date("c",$MyLastLogin);
									$MychTreeMinutesAgo = time()-120; // Tree minutes ago
									$MywcLoginStatus = '';
									if($MyLastLogin > $MychTreeMinutesAgo){
										$MywcLoginStatus = '<div class="chu_box_user_last_seen"><div class="chu_on"></div></div>';
									}else{ 
										 $MywcLoginStatus = '<div class="chu_box_user_last_seen"><div class="theLastSeenTime">'.time_elapsed_string($MychULastLogin, $shortYearAgo,$shortMonthAgo,$shortWeekAgo,$shortDayAgo,$shortHourAgo,$shortMinutesAgo,$shortSecondAgo, $full = false).'</div></div>'; 
									} ?>
                                    <div class="hvr-bounce-to-right" style="width: 100%;display: inline-block;"> 
                                           <span class="chu_box_user getminib" data-page="minibox" data-id="<?php echo $MyonlineFriendUID;?>" data-user="<?php echo  $MyonlineFriendUserName;?>"> 
                                                 <div class="chu_box_user_avatar">
                                                      <div class="chu_box_avatar" style="background-image: url('<?php echo $MyonlineFriendAvatar;?>'); "></div>
                                                 </div>
                                                 <div class="chu_box_user_name"><?php echo $MyonlineFriendUserFullName;?></div>
                                                  <?php echo $MywcLoginStatus;?>  
                                            </span> 
                                     </div>   
						<?php  }echo '</div><!--CHo F-->';
					   } 
					?>
             
        </div>
    </div>
</div>