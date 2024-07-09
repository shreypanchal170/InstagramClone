<div class="uMnUsrS">
     <div class="globalBoxHeader"><?php echo $page_Lang['online_friends'][$dataUserPageLanguage];?> <div class="onlinefriendcount"><span style="float: left;margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M139.57813,31.95312c-2.157,0.377 -4.1695,1.63263 -5.4375,3.64063c-2.152,3.408 -1.43325,7.89425 1.71875,10.40625c14.696,11.728 24.14062,29.744 24.14062,50c0,20.256 -9.44462,38.26438 -24.14062,49.98438c-3.152,2.512 -3.87075,7.01387 -1.71875,10.42187c2.536,4.016 8.038,4.99925 11.75,2.03126c18.336,-14.64 30.10938,-37.1495 30.10938,-62.4375c0,-25.288 -11.77338,-47.7895 -30.10938,-62.4375c-1.856,-1.484 -4.1555,-1.98638 -6.3125,-1.60938zM52.42188,31.96875c-2.155,-0.378 -4.4565,0.11375 -6.3125,1.59375c-18.336,14.648 -30.10938,37.1495 -30.10938,62.4375c0,25.288 11.77338,47.7895 30.10938,62.4375c3.712,2.96799 9.214,1.98474 11.75,-2.03126c2.152,-3.408 1.43325,-7.89425 -1.71875,-10.40625c-14.696,-11.728 -24.14062,-29.744 -24.14062,-50c0,-20.256 9.44462,-38.26438 24.14062,-49.98438c3.152,-2.512 3.86313,-7.01387 1.70313,-10.42187c-1.268,-2.008 -3.26688,-3.247 -5.42188,-3.625zM69.45312,59.1875c-2.225,-0.351 -4.56375,0.24588 -6.34375,1.92188c-9.288,8.744 -15.10938,21.12262 -15.10938,34.89062c0,13.768 5.82138,26.14662 15.10938,34.89062c3.56,3.344 9.37638,2.34675 11.98438,-1.78125l0.03125,-0.04688c2.088,-3.304 1.33125,-7.50637 -1.46875,-10.23437c-5.952,-5.792 -9.65625,-13.86013 -9.65625,-22.82813c0,-8.968 3.70425,-17.03612 9.65625,-22.82812c2.8,-2.728 3.55675,-6.92238 1.46875,-10.23438l-0.03125,-0.04688c-1.304,-2.064 -3.41563,-3.35212 -5.64063,-3.70312zM122.54687,59.20312c-2.225,0.35 -4.33662,1.6235 -5.64062,3.6875l-0.03125,0.04688c-2.088,3.304 -1.33125,7.50638 1.46875,10.23438c5.952,5.792 9.65625,13.86012 9.65625,22.82812c0,8.968 -3.71187,17.03613 -9.67187,22.82813c-2.8,2.728 -3.54113,6.92238 -1.45313,10.23437l0.03125,0.04688c2.608,4.128 8.43238,5.13325 11.98438,1.78125c9.296,-8.744 15.10938,-21.12262 15.10938,-34.89062c0,-13.768 -5.82138,-26.14662 -15.10938,-34.89062c-1.78,-1.672 -4.11875,-2.25625 -6.34375,-1.90625zM96,80c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16z"></path></g></g></svg></span> <span id="online_friends"><?php echo $Dot->Dot_OnlineFriendsCount($uid);?></span></div></div>
     <div class="suggestedBoxRight">
      <?php 
	     $OnlineFriends = $Dot->Dot_OnlineFriends($uid);
		 if($OnlineFriends){
		    foreach($OnlineFriends as $online){
				$onlineFriendUID = $online['user_id'];
				$onlineFriendAvatar = $Dot->Dot_UserAvatar($onlineFriendUID,$base_url); 
				$onlineFriendUserFullName = $online['user_fullname'];
		        $onlineFriendUserName = $online['user_name'];
				$onlineFriendLastLogin = $online['last_login'];  
				echo '
				<div class="onlineUserBody">
			          <a href="'.$base_url.'profile/'.$onlineFriendUserName.'"><div class="onlineAvatar show_card" id="'.$onlineFriendUID.'" data-user="'.$onlineFriendUserName.'" data-type="userCard"><img src="'.$onlineFriendAvatar.'" class="a0uk"></div></a>
					  <div class="onlineNameFollower show-user-pro">
						<a href="'.$base_url.'profile/'.$onlineFriendUserName.'"><div class="suggestedName">'.$onlineFriendUserFullName.'</div></a> 
					  </div>
		       </div>
				'; 
			}
		 }else {
		     echo '
			    <div class="no-online">'.$page_Lang['no_online_friends_yet'][$dataUserPageLanguage].'</div>
			 '; 
		 }
	  ?>
        
     </div>
</div>