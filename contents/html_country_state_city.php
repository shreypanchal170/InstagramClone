<div class="popupBack"></div>
<div class="search_user_filter_container openSocial">
    <div class="shareonSocial">
         <div class="search_user_filter_Header"><?php echo $selectText;?> <div class="search_user_filter_close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div></div>
         <div class="search_user_filter_wrap"> 
               <?php 
			      // $DotCountries
			      if($theLocType == 'county'){
				      if($DotCountries){
					      foreach($DotCountries as $country){ 
								$countrySortName = $country['sortname'];
								$countryName = $country['name'];
								$countryPhoneCode = $country['phonecode']; 
								$selectedClass = '';
								if($dataCountry == $countrySortName){ $selectedClass = 'selected-already';}
								   echo '<div class="app-countri-option this-country" data-sortname="'.$countrySortName.'" data-get="thiscountry" data-on="'.$theLocType.'"><div class="select-this '.$selectedClass.'" id="here'.$countrySortName.'"></div>'.$countryName.'</div>';
						        }
					  }
				  }else if($theLocType == 'ustate'){
				      if($DotStates){
					      foreach($DotStates as $stat){ 
								$state_name = $stat['name'];
								$state_id = $stat['id']; 
								$selectedClass = '';
								if($dataState == $state_id){ $selectedClass = 'selected-already';}
								echo '<div class="app-countri-option this-state" data-stateid="'.$state_id.'" data-get="thisstates" data-on="'.$theLocType.'"><div class="select-this '.$selectedClass.'" id="here'.$state_id.'"></div>'.$state_name.'</div>';
						   }
					     }
				  }else if($theLocType == 'ucitty'){
				      if($DotCities){
					      foreach($DotCities as $cty){ 
								$city_name = $cty['name'];
								$city_id = $cty['id']; 
								$selectedClass = '';
								if($dataCity == $city_id){ $selectedClass = 'selected-already';}
								echo '<div class="app-countri-option this-city" data-cityid="'.$city_id.'" data-get="thiscity" data-on="'.$theLocType.'"><div class="select-this '.$selectedClass.'" id="here'.$city_id.'"></div>'.$city_name.'</div>';
							    }
					     }
				  }
			   ?>
         </div>
    </div> 
</div>
