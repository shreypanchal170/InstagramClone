<?php 
if($going_InterestedEvents){
	echo '<div class="uMnUsrS"><div class="globalBoxHeader">'.$page_Lang['events_interested_in'][$dataUserPageLanguage].'</div><div class="suggestedBoxRight">';
  foreach($going_InterestedEvents as $gie){
    $goingEventID =  $gie['event_id'];
	$goingEventAnswer =  $gie['event_title'];
	$goingEventType = $gie['event_typ'];
	$goingEventIcon = $Dot->Dot_GetEventIconFromID($goingEventType);
	echo '
		    <a href="'.$base_url.'event/'.$goingEventID.'" target="_self"><div class="global-sidebar-menu-box hvr-underline-from-center"><span class="ev_i">'.$goingEventIcon.'</span>'.stripslashes($goingEventAnswer).'</div></a>
		 ';
  }
  echo '</div></div>';
}

?>