<?php 
if($CreatedEvents){
	echo '<div class="uMnUsrS"><div class="globalBoxHeader">'.$page_Lang['you_created_events'][$dataUserPageLanguage].'</div><div class="suggestedBoxRight">';
    foreach($CreatedEvents as $userEventitem){
	     $userEventID = $userEventitem['event_id'];
		 $userEventTitle = $userEventitem['event_title'];
		 $userEventDescription = $userEventitem['event_description']; 
		 $userEventStartDay = $userEventitem['event_start'];
		 $userEventStartTime = $userEventitem['event_start_time'];
		 $userEventEndDay = $userEventitem['event_end'];
		 $userEventEndTime = $userEventitem['event_end_time']; 
		 $userEventType = $userEventitem['event_typ'];
		 $getEventIcon = $Dot->Dot_GetEventIconFromID($userEventType);
		 echo '
		    <a href="'.$base_url.'event/'.$userEventID.'" target="_self"><div class="global-sidebar-menu-box hvr-underline-from-center"><span class="ev_i">'.$getEventIcon.'</span>'.stripslashes($userEventTitle).'</div></a>
		 ';
	}
	echo '</div></div>';
}
?>