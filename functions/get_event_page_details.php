<?php 
$eventProfileID = $Dot->Dot_EventID($eventID);  
$eventProfileDetails = $Dot->Dot_EventProfilePageDetails($eventProfileID); 
$getEventOwnerUser_ID = $eventProfileDetails['uid_fk']; 
$eventTitle = isset($eventProfileDetails['event_title']) ? $eventProfileDetails['event_title'] : NULL;
$eventStartedDay = isset($eventProfileDetails['event_start']) ? $eventProfileDetails['event_start'] : NULL;
$eventDescriptions = isset($eventProfileDetails['event_description']) ? $eventProfileDetails['event_description'] : NULL;
$eventEndDay = isset($eventProfileDetails['event_end']) ? $eventProfileDetails['event_end'] : NULL;
$eventProfileCoverImage = $eventProfileDetails['event_cover'];
$eventImageC = $base_url.'uploads/event__type_covers/'.$eventProfileCoverImage;
$eventStartTime = isset($eventProfileDetails['event_start_time']) ? $eventProfileDetails['event_start_time'] : NULL; 
$eventEndTime = isset($eventProfileDetails['event_end_time']) ? $eventProfileDetails['event_end_time'] : NULL;
$eventArea = isset($eventProfileDetails['event_location']) ? $eventProfileDetails['event_location'] : NULL;
$eventUserCanInviteFriends =  isset($eventProfileDetails['event_usercaninvite']) ? $eventProfileDetails['event_usercaninvite'] : NULL;
$eventUserCanSharePost =  isset($eventProfileDetails['event_usercanpost']) ? $eventProfileDetails['event_usercanpost'] : NULL;
$eventUserCanShareEvent = isset($eventProfileDetails['user_canshareevent']) ? $eventProfileDetails['user_canshareevent'] : NULL;
$eventUserCanShareText = isset($eventProfileDetails['user_cansharetext']) ? $eventProfileDetails['user_cansharetext'] : NULL;
$eventUserCanShareimage = isset($eventProfileDetails['user_canshareimage']) ? $eventProfileDetails['user_canshareimage'] : NULL;
$eventUserCanShareVideo = isset($eventProfileDetails['user_cansharevideo']) ? $eventProfileDetails['user_cansharevideo'] : NULL;
$eventUserCanShareAudio = isset($eventProfileDetails['user_canshareaudio']) ? $eventProfileDetails['user_canshareaudio'] : NULL;
$eventUserCanShareFilterImage = isset($eventProfileDetails['user_cansharefilteredimage']) ? $eventProfileDetails['user_cansharefilteredimage'] : NULL;
$eventUserCanShareLocation = isset($eventProfileDetails['user_cansharelocation']) ? $eventProfileDetails['user_cansharelocation'] : NULL;
$eventUserCanShareLink = isset($eventProfileDetails['user_cansharelink']) ? $eventProfileDetails['user_cansharelink'] : NULL;
$eventUserCanShareGiphy = isset($eventProfileDetails['user_cansharegiphy']) ? $eventProfileDetails['user_cansharegiphy'] : NULL;
$eventUserCanShareWaterMark = isset($eventProfileDetails['user_cansharewatermark']) ? $eventProfileDetails['user_cansharewatermark'] : NULL;
$eventUserCanShareBenchMark = isset($eventProfileDetails['user_cansharebenchmark']) ? $eventProfileDetails['user_cansharebenchmark'] : NULL; 

$eventStartedDayNumber = date('d', strtotime($eventStartedDay));
$eventEndDayNumber = date('d', strtotime($eventEndDay));
$eventStartedMonthNumber = date('m', strtotime($eventStartedDay)); 
$eventEndedMonthNumber = date('m', strtotime($eventEndDay)); 
$datediff = strtotime($eventEndDay) - strtotime($eventStartedDay);
$yearStart= strtotime($eventStartedDay); 
$yearEnd= strtotime($eventEndDay);
$calculateDateBetween = round($datediff / (60 * 60 * 24)); 
$splaceHolder = array( "{DateBetween}"); 
$replaceThis  = array( "".$calculateDateBetween."");  
$typeNote = preg_replace($splaceHolder, $replaceThis,  $page_Lang['number_of_days_remaining'][$dataUserPageLanguage]);   
if($calculateDateBetween == '0'){
   $eventNote = 'Today';
} elseif($calculateDateBetween > 0){
    $eventNote = $typeNote;
} else {
   $eventNote = 'Bitti';
}
$monthsa = array('01' => $page_Lang['jan'][$dataUserPageLanguage], '02' => $page_Lang['feb'][$dataUserPageLanguage], '03' => $page_Lang['mar'][$dataUserPageLanguage], '04' => $page_Lang['apr'][$dataUserPageLanguage], '05' => $page_Lang['may'][$dataUserPageLanguage], '06' => $page_Lang['jun'][$dataUserPageLanguage], '07' => $page_Lang['jul'][$dataUserPageLanguage], '08' => $page_Lang['aug'][$dataUserPageLanguage], '09' => $page_Lang['sep'][$dataUserPageLanguage], '10' => $page_Lang['oct'][$dataUserPageLanguage], '11' => $page_Lang['nov'][$dataUserPageLanguage], '12' => $page_Lang['dec'][$dataUserPageLanguage]);

$goingUsers = $Dot->Dot_WidgetGoingUsers($eventID, $showLimit);
$howManyUserGoing = $Dot->Dot_CountHowManyUserGoing($eventID);
$howManyUserInterested = $Dot->Dot_CountHowManyUserInterested($eventID);
?>