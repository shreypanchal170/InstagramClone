<div class="social_share_buttons_container">
   <div class="shareonSocial">
         <div class="shareonSocialHeader">What are you feeling, <?php echo $dataUserFullName;?> ? <div class="close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="feeling_list_wrap">
               <!---->
               <ul class="collapsible" data-collapsible="accordion">
         <li>
            <span class="collapsible-header feeling-icon-feel">Feeling</span>
            <span class="collapsible-body">
               <?php 
			     $FeelingList = $Dot->Dot_Feelings_Activity('feeling');
				 if($FeelingList){
					 foreach($FeelingList as $data){
						 $feeling_id = $data['f_id'];
						 $feeling_key = $data['f_key'];
						 $feeling_name = $data['f_name'];
						 $feeling_img = $data['f_img']; 
						 echo '
						   <div class="feeling-box" id="'.$feeling_id.'" data-status="'.$page_Lang[$feeling_key][$dataUserPageLanguage].'" data-alt="'.$base_url.'uploads/feelings/feeling/'.$feeling_img.'"><img src="'.$base_url.'uploads/feelings/feeling/'.$feeling_img.'" class="emoji" /> '.$page_Lang[$feeling_key][$dataUserPageLanguage].'</div>
						 ';
				     }
				  }			   
			   ?> 
            </span>
         </li>
         <li>
            <span class="collapsible-header feeling-icon-getting">Getting</span>
            <span class="collapsible-body">
            <?php 
			     $FeelingList = $Dot->Dot_Feelings_Activity('getting');
				 if($FeelingList){
					 foreach($FeelingList as $data){
						 $feeling_id = $data['f_id'];
						 $feeling_key = $data['f_key'];
						 $feeling_name = $data['f_name'];
						 $feeling_img = $data['f_img'];
						 $feeling_enlgish = $data['english'];
						 $feeling_turkish = $data['turkish']; 
						 echo '
						   <div class="feeling-box" id="'.$feeling_id.'" data-status="'.$page_Lang[$feeling_key][$dataUserPageLanguage].'" data-alt="'.$base_url.'uploads/feelings/getting/'.$feeling_img.'"><img src="'.$base_url.'uploads/feelings/getting/'.$feeling_img.'" class="emoji" /> '.$page_Lang[$feeling_key][$dataUserPageLanguage].'</div>
						 ';
				     }
				  }			   
			   ?> 
            </span>
         </li>
         <li>
            <span class="collapsible-header feeling-icon-making">Making</span>
            <span class="collapsible-body"> 
            <?php 
			     $FeelingList = $Dot->Dot_Feelings_Activity('making');
				 if($FeelingList){
					 foreach($FeelingList as $data){
						 $feeling_id = $data['f_id'];
						 $feeling_key = $data['f_key'];
						 $feeling_name = $data['f_name'];
						 $feeling_img = $data['f_img'];
						 $feeling_enlgish = $data['english'];
						 $feeling_turkish = $data['turkish']; 
						 echo '
						   <div class="feeling-box" id="'.$feeling_id.'"  data-status="'.$page_Lang[$feeling_key][$dataUserPageLanguage].'" data-alt="'.$base_url.'uploads/feelings/making/'.$feeling_img.'"><img src="'.$base_url.'uploads/feelings/making/'.$feeling_img.'" class="emoji" /> '.$page_Lang[$feeling_key][$dataUserPageLanguage].'</div>
						 ';
				     }
				  }			   
			   ?>  
            </span>
         </li>
         <li>
            <div class="collapsible-header feeling-icon-celebrating">Celebrating</div>
            <span class="collapsible-body">
               <?php 
			     $FeelingList = $Dot->Dot_Feelings_Activity('celebrating');
				 if($FeelingList){
					 foreach($FeelingList as $data){
						 $feeling_id = $data['f_id'];
						 $feeling_key = $data['f_key'];
						 $feeling_name = $data['f_name'];
						 $feeling_img = $data['f_img'];
						 $feeling_enlgish = $data['english'];
						 $feeling_turkish = $data['turkish']; 
						 echo '
						   <div class="feeling-box" id="'.$feeling_id.'" data-status="'.$page_Lang[$feeling_key][$dataUserPageLanguage].'" data-alt="'.$base_url.'uploads/feelings/celebrating/'.$feeling_img.'"><img src="'.$base_url.'uploads/feelings/celebrating/'.$feeling_img.'" class="emoji" /> '.$page_Lang[$feeling_key][$dataUserPageLanguage].'</div>
						 ';
				     }
				  }			   
			   ?>  
            </span>
         </li>
         <li>
            <span class="collapsible-header feeling-icon-drinking">Drinking</span>
            <span class="collapsible-body">
               <?php 
			     $FeelingList = $Dot->Dot_Feelings_Activity('drinking');
				 if($FeelingList){
					 foreach($FeelingList as $data){
						 $feeling_id = $data['f_id'];
						 $feeling_key = $data['f_key'];
						 $feeling_name = $data['f_name'];
						 $feeling_img = $data['f_img'];
						 $feeling_enlgish = $data['english'];
						 $feeling_turkish = $data['turkish']; 
						 echo '
						   <div class="feeling-box" id="'.$feeling_id.'" data-status="'.$page_Lang[$feeling_key][$dataUserPageLanguage].'" data-alt="'.$base_url.'uploads/feelings/drinking/'.$feeling_img.'"><img src="'.$base_url.'uploads/feelings/drinking/'.$feeling_img.'" class="emoji" /> '.$page_Lang[$feeling_key][$dataUserPageLanguage].'</div>
						 ';
				     }
				  }			   
			   ?>
            </span>
         </li>
         <li>
            <span class="collapsible-header feeling-icon-eating">Eating</span>
            <span class="collapsible-body">
                <?php 
			     $FeelingList = $Dot->Dot_Feelings_Activity('eating');
				 if($FeelingList){
					 foreach($FeelingList as $data){
						 $feeling_id = $data['f_id'];
						 $feeling_key = $data['f_key'];
						 $feeling_name = $data['f_name'];
						 $feeling_img = $data['f_img'];
						 $feeling_enlgish = $data['english'];
						 $feeling_turkish = $data['turkish']; 
						 echo '
						   <div class="feeling-box" id="'.$feeling_id.'" data-status="'.$page_Lang[$feeling_key][$dataUserPageLanguage].'" data-alt="'.$base_url.'uploads/feelings/eating/'.$feeling_img.'"><img src="'.$base_url.'uploads/feelings/eating/'.$feeling_img.'" class="emoji" /> '.$page_Lang[$feeling_key][$dataUserPageLanguage].'</div>
						 ';
				     }
				  }			   
			   ?>
               </span>
         </li>
      </ul>
               <!---->
         </div>
   </div>
</div>