<?php  
include_once 'functions/inc.php';  
if(empty($uid)){
   header("Location: $base_url");   
}
$page ='events';  
if(isset(
$_GET['p'])){ $getp = isset($_GET['p']) ? $_GET['p'] : 'events';	
$getEventKeyID = $Dot->Dot_EventTypeID($getp);
}
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
?> 

<div class="section">
   <div class="main_event">
        <div class="event_type_container">
               <div class="event_all_types">
                   <!---->
                    <?php 
					   if($allEventCategories){
						   echo '<ul id="autoWidth" class="cs-hidden">'; 
					       foreach($allEventCategories as $event_item){
						       $eventiID = $event_item['ev_id'];
							   $eventiKey = $event_item['ev_key'];
						       $eventiIcon = $event_item['ev_icon'];
							   echo '<li class="item-a theModern"><a href="'.$base_url.'events/'.$eventiKey.'"><div class="chip">'.$eventiIcon.' '.$page_Lang[$eventiKey][$dataUserPageLanguage].'</div></a></li>  ';
						   }
						   echo '</ul>';
					   }
					?>  
                   <!---->
               </div>
        </div>
        <!--Events-->
        <div class="created_events_container">
            <div class="event_results" id="morePostType" data-type="more_ev" data-mev="<?php echo $getEventKeyID;?>">
                <?php 
				    $eventID = isset($_POST['eventID']) ? $_POST['eventID'] : '';
					$eventType = isset($_POST['eventType']) ? $_POST['eventType'] : '';
				    $allEventsa = $Dot->Dot_UpComingEventsResult($uid,$getEventKeyID);  
					if($allEventsa){ 
				        foreach($allEventsa as $resultEvent){
						     $resultEventID = $resultEvent['event_id'];
							 $resultEvent_user_id = $resultEvent['uid_fk'];
							 $resultEvent_title = $resultEvent['event_title']; 
							 $resultEvent_Location = $resultEvent['event_location'];
							 $resultEvent_StartDate = $resultEvent['event_start'];
							 $resultEvent_StartTime = $resultEvent['event_start_time']; 
							 $resultEvent_Type = $resultEvent['event_typ'];
							 $resultEvent_Cover = $resultEvent['event_cover'];
							 $post_event_start_day_number = date('d', strtotime($resultEvent_StartDate));
							 $post_event_start_month_number = date('m', strtotime($resultEvent_StartDate));
							 $eventCoverImage = $base_url.'uploads/event__type_covers/'.$resultEvent_Cover;
							 $monthsa = array('01' => $page_Lang['jan'][$dataUserPageLanguage], '02' => $page_Lang['feb'][$dataUserPageLanguage], '03' => $page_Lang['mar'][$dataUserPageLanguage], '04' => $page_Lang['apr'][$dataUserPageLanguage], '05' => $page_Lang['may'][$dataUserPageLanguage], '06' => $page_Lang['jun'][$dataUserPageLanguage], '07' => $page_Lang['jul'][$dataUserPageLanguage], '08' => $page_Lang['aug'][$dataUserPageLanguage], '09' => $page_Lang['sep'][$dataUserPageLanguage], '10' => $page_Lang['oct'][$dataUserPageLanguage], '11' => $page_Lang['nov'][$dataUserPageLanguage], '12' => $page_Lang['dec'][$dataUserPageLanguage]);
							  echo ' 
								<div class="box_event_wrapper i_event" data-last = "'.$resultEventID.'" id="goin'.$resultEventID.'">
									<div class="box_event_cover" style="background-image:url('.$eventCoverImage.');"></div> 
									<div class="box_event_information_wrapper"> 
										  <div class="box_event_time_wrapper"> 
												  <span class="box_event_month">'.$monthsa[$post_event_start_month_number].'</span>
												  <span class="box_event_day">'.$post_event_start_day_number.'</span> 
										  </div> 
										  <div class="box_event_inf_wrapper">
											   <div class="box_event_name truncate"><a href="'.$base_url.'event/'.$resultEventID.'">'.stripslashes($resultEvent_title).'</a></div>
											   <div class="box_event_other">'.date( 'G:i', strtotime($resultEvent_StartTime)).'  ·  '.$resultEvent_Location.' </div>
										  </div>  
									<div class="event_going_intersted">
										<div class="egi"><div class="btn waves-effect waves-light blue-grey the_g_'.$resultEventID.' i_i_going" data-ev="'.$resultEventID.'" data-type="ugoing">'.$page_Lang['go'][$dataUserPageLanguage].'</div></div>
										<div class="egi"><div class="btn waves-effect waves-light blue-grey the_i_'.$resultEventID.' i_i_going" data-ev="'.$resultEventID.'" data-type="uinterested">'.$page_Lang['interest'][$dataUserPageLanguage].'</div></div>
									</div> 
									</div> 
								  </div> 
							   ';
						}
					}else{
					   echo '
					   <div class="no_event_founded">
					         <div class="no_found_wrap">
							     <div class="no_found_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="200" height="200" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1_1_"><circle cx="24" cy="24" transform="scale(4,4)" r="20" fill="#ffca28"></circle><ellipse cx="17" cy="22.5" transform="scale(4,4)" rx="4" ry="4.5" fill="#6d4c41"></ellipse><circle cx="15.5" cy="21.5" transform="scale(4,4)" r="1.5" fill="#ffffff"></circle><path d="M140,92.8v3.2c0,4.4 -3.6,8 -8,8h-16c-4.4,0 -8,-3.6 -8,-8v-4c0,-8.8 7.2,-16 16,-16c0.4,0 1.2,0 1.6,0c8.4,0.8 14.4,8.4 14.4,16.8z" fill="#6d4c41"></path><circle cx="29.5" cy="21.5" transform="scale(4,4)" r="1.5" fill="#ffffff"></circle><path d="M72,144v-8c10.4,0 16,-2.4 21.2,-4.4c4.4,-2 8.4,-3.6 14.4,-3.6c9.2,0 15.2,5.2 15.6,5.6l-5.2,6c0,0 -4,-3.6 -10,-3.6c-4.4,0 -7.2,1.2 -11.2,2.8c-6,2.4 -12.8,5.2 -24.8,5.2z" fill="#b76c09"></path></g></g></svg></div>
								 <div class="no_found_text">'.$page_Lang['no_upcoming_event'][$dataUserPageLanguage].'</div>
							 </div>    
					   </div>';
				    }
				?> 
                
            </div>
        </div>
        <!--Events-->
   </div>
</div>
<?php include("contents/javascripts_vars.php");?>   

<div class="div_fixed_wrap">
    <div class="auto blue-grey">
        
    </div>
</div>
</body>
</html>