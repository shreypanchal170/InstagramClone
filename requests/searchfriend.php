<?php   
include_once '../functions/inc.php'; 
if(isset($_POST['keys']) && isset($_POST['id'])){
   $searchKey = mysqli_real_escape_string($db, $_POST['keys']);
   $the_eventID = mysqli_real_escape_string($db, $_POST['id']);
   if($searchKey != ''){
	    $keyRestuls = $Dot->Dot_SearchFriendWid($uid,$searchKey);
		if($keyRestuls){ 
		   foreach($keyRestuls as $foundedUser){
		        $dataUsername = $foundedUser['user_name'];
	            $dataUserID = $foundedUser['user_fullname'];
	            $dataUserUid = $foundedUser['user_id'];
	            $sAvatar = $Dot->Dot_UserAvatar($dataUserUid, $base_url); 
				 //Check UserID invited Before
				$checkUserIDFromInvitedTable = $Dot->Dot_CheckUserIDInvititedBefore($dataUserUid,$the_eventID);  
				if($checkUserIDFromInvitedTable == '1'){ 
					$inviteButton = '<div class="inviteu waves-effect waves-light btn blue-grey" id="in_e_'.$dataUserUid.'" data-id="'.$dataUserUid.'" data-event="'.$the_eventID.'" title="invited">Invited</div>';
				} elseif($checkUserIDFromInvitedTable == '2') { 
					$inviteButton = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000; margin-top:10px;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#2ecc71"><path d="M174.7392,88.1152l-5.8176,-3.488c-2.4768,-1.4848 -4.1536,-3.936 -4.9088,-6.72c-0.0128,-0.0512 -0.0256,-0.1024 -0.0448,-0.1536c-0.7744,-2.8096 -0.544,-5.8048 0.8704,-8.3584l3.296,-5.9328c3.3664,-6.0672 -0.9472,-13.536 -7.8848,-13.6512l-6.848,-0.1152c-2.8992,-0.0512 -5.5872,-1.3376 -7.6352,-3.3856c-0.0192,-0.0192 -0.0448,-0.0448 -0.064,-0.064c-2.0544,-2.048 -3.3408,-4.736 -3.3856,-7.6352l-0.1152,-6.848c-0.1216,-6.9504 -7.5904,-11.264 -13.6576,-7.8912l-5.9328,3.296c-2.5472,1.4144 -5.5424,1.6448 -8.3584,0.8704c-0.0512,-0.0128 -0.1024,-0.0256 -0.1536,-0.0448c-2.784,-0.7616 -5.2352,-2.432 -6.72,-4.9088l-3.488,-5.8176c-3.5712,-5.952 -12.192,-5.952 -15.7632,0l-3.4752,5.792c-1.4976,2.496 -3.968,4.1792 -6.7712,4.9472c-0.032,0.0064 -0.0576,0.0192 -0.0896,0.0256c-2.8352,0.7808 -5.8496,0.5504 -8.4224,-0.8768l-5.9136,-3.2832c-6.0672,-3.3728 -13.536,0.9408 -13.6512,7.8784l-0.1152,6.848c-0.0512,2.8992 -1.3376,5.5872 -3.3856,7.6352c-0.0192,0.0192 -0.0448,0.0448 -0.064,0.064c-2.048,2.0544 -4.736,3.3408 -7.6352,3.3856l-6.848,0.1152c-6.944,0.1216 -11.2576,7.5904 -7.8848,13.6576l3.296,5.9328c1.4144,2.5536 1.6448,5.5424 0.8704,8.3584c-0.0128,0.0512 -0.0256,0.1024 -0.0448,0.1536c-0.7616,2.784 -2.432,5.2352 -4.9088,6.72l-5.8176,3.488c-5.952,3.5712 -5.952,12.1984 0,15.7632l5.8176,3.4944c2.4768,1.4848 4.1536,3.936 4.9088,6.72c0.0128,0.0512 0.0256,0.1024 0.0448,0.1536c0.7744,2.816 0.544,5.8048 -0.8704,8.3584l-3.296,5.9456c-3.3664,6.0672 0.9472,13.536 7.8848,13.6512l6.848,0.1152c2.8992,0.0512 5.5872,1.3376 7.6352,3.3856c0.0192,0.0192 0.0448,0.0448 0.064,0.064c2.0544,2.048 3.3408,4.736 3.3856,7.6352l0.1152,6.8416c0.1152,6.9376 7.584,11.2512 13.6512,7.8848l5.9328,-3.296c2.5472,-1.4144 5.5424,-1.6448 8.3584,-0.8704c0.0512,0.0128 0.1024,0.0256 0.1536,0.0448c2.784,0.7616 5.2352,2.432 6.72,4.9088l3.488,5.8176c3.5712,5.952 12.192,5.952 15.7632,0l3.488,-5.8176c1.4848,-2.4768 3.936,-4.1536 6.72,-4.9088c0.0512,-0.0128 0.1024,-0.0256 0.1536,-0.0448c2.8096,-0.7744 5.8048,-0.544 8.3584,0.8704l5.9328,3.296c6.0672,3.3664 13.536,-0.9472 13.6512,-7.8848l0.1152,-6.8416c0.0512,-2.8992 1.3376,-5.5872 3.3856,-7.6352c0.0192,-0.0192 0.0448,-0.0448 0.064,-0.064c2.048,-2.0544 4.736,-3.3408 7.6352,-3.3856l6.848,-0.1152c6.9376,-0.1152 11.2512,-7.584 7.8848,-13.6512l-3.296,-5.9328c-1.4144,-2.5536 -1.6448,-5.5424 -0.8704,-8.3584c0.0128,-0.0512 0.0256,-0.1024 0.0448,-0.1536c0.7616,-2.784 2.432,-5.2352 4.9088,-6.72l5.8176,-3.4944c5.9712,-3.5712 5.9712,-12.1984 0.0256,-15.7696zM132.5248,81.3248l-41.984,41.984c-1.2032,1.2032 -2.8288,1.8752 -4.5248,1.8752c-1.696,0 -3.328,-0.672 -4.5248,-1.8752l-22.0992,-22.0992c-2.5024,-2.5024 -2.5024,-6.5472 0,-9.0496c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l17.5744,17.5744l37.4592,-37.4592c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496z"></path></g></g></svg>';
				}elseif($checkUserIDFromInvitedTable == '3'){
					$inviteButton = '<div class="waves-effect waves-light btn orange">Interested</div>';
				}else{
					$inviteButton = '<div class="inviteu waves-effect waves-light btn blue" id="in_e_'.$dataUserUid.'" data-id="'.$dataUserUid.'" data-event="'.$the_eventID.'" title="invite">Invite</div>';
				}
			    echo '
				<div class="result_friend_user"> 
				   <div class="result_user_avatar"><img src="'.$sAvatar.'" class="a0uk" /></div>
				   <div class="result_user_name">'.$dataUserID.'</div> 
				   <div class="invitebtnfr">
					   '.$inviteButton.'
					</div>
				</div>
				';
		   } 
		}
	} 
}
?>