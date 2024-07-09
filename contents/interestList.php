<!--Interested List STARTED-->
<div class="interestedListContainer" id="interestedContainer">
  <div class="selectFinished"><?php echo $page_Lang['finish'][$dataUserPageLanguage];?></div>
  <span class="allinterestList">
   <h1 class="allinterestListHeader"><span class="icons_tree eatingicon"></span><?php echo $page_Lang['food_and_beverage'][$dataUserPageLanguage];?></h1>
  <div class="interestedItems">
     <?php 
	    $FoodAndBeverage = $Dot->Dot_FoodAndBeverageInterestList();
		if($FoodAndBeverage){
		    foreach($FoodAndBeverage as $fb){
			     $FoodBeverageID = $fb['interest_id'];
				 $FoodBeverageValue =$fb['interest_value'];
				 $FoodBeverageType = $fb['interest_type'];
				 $CheckSelectedBefore = $Dot->Dot_CheckSelectedInterestBefore($uid, $FoodBeverageValue, $FoodBeverageType);
				 $selectedInterest = 'select';
				 $selectedClass = '';
				 if($CheckSelectedBefore){
				     $selectedInterest = 'unselect';
					 $selectedClass = 'intr_selected';
				 } 
				 echo '<span class="intr interested js-intr js-intr-id-'.$FoodBeverageID.' '.$selectedClass.'" id="'.$FoodBeverageID.'" data-category="icons_tree eatingicon" data-value="'.$FoodBeverageValue.'" data-ctype="'.$FoodBeverageType.'" data-selected="'.$selectedInterest.'" data-name="'.$page_Lang[$FoodBeverageValue][$dataUserPageLanguage].'" data-type="newInterest"><span class="intr-txt">'.$page_Lang[$FoodBeverageValue][$dataUserPageLanguage].'</span></span>';
			}
		}
	 ?>
    
  </div>
  <h1 class="allinterestListHeader"><span class="icons_tree musicicon"></span><?php echo $page_Lang['music'][$dataUserPageLanguage];?></h1>
  <div class="interestedItems">
    <?php 
	    $InterestedMusicList = $Dot->Dot_MusicInterestList();
		if($InterestedMusicList){
		    foreach($InterestedMusicList as $im){
			     $InterestedMusicID = $im['interest_id'];
				 $InterestedMusicValue =$im['interest_value'];
				 $InterestedMusicType = $im['interest_type'];
				 $CheckSelectedBefore = $Dot->Dot_CheckSelectedInterestBefore($uid, $InterestedMusicValue, $InterestedMusicType);
				 $selectedInterest = 'select';
				 $selectedClass = '';
				 if($CheckSelectedBefore){
				     $selectedInterest = 'unselect';
					 $selectedClass = 'intr_selected';
				 } 
				 echo '<span class="intr interested js-intr js-intr-id-'.$InterestedMusicID.' '.$selectedClass.'" id="'.$InterestedMusicID.'" data-category="icons_tree musicicon" data-value="'.$InterestedMusicValue.'" data-ctype="'.$InterestedMusicType.'" data-selected="'.$selectedInterest.'" data-name="'.$page_Lang[$InterestedMusicValue][$dataUserPageLanguage].'" data-type="newInterest"><span class="intr-txt">'.$page_Lang[$InterestedMusicValue][$dataUserPageLanguage].'</span></span>';
			}
		}
	 ?> 
  </div>
  <h1 class="allinterestListHeader"><span class="icons_tree filmicon"></span><?php echo $page_Lang['film_and_tv_shows'][$dataUserPageLanguage];?></h1>
  <div class="interestedItems">
    <?php 
	    $FilmTvList = $Dot->Dot_FilmTvList();
		if($FilmTvList){
		    foreach($FilmTvList as $ftv){
			     $InterestedFilmTvID = $ftv['interest_id'];
				 $InterestedFilmTvValue =$ftv['interest_value'];
				 $InterestedFilmTvType = $ftv['interest_type'];
				 $CheckSelectedBefore = $Dot->Dot_CheckSelectedInterestBefore($uid, $InterestedFilmTvValue, $InterestedFilmTvType);
				 $selectedInterest = 'select';
				 $selectedClass = '';
				 if($CheckSelectedBefore){
				     $selectedInterest = 'unselect';
					 $selectedClass = 'intr_selected';
				 } 
				 echo '<span class="intr interested js-intr js-intr-id-'.$InterestedFilmTvID.' '.$selectedClass.'" id="'.$InterestedFilmTvID.'" data-category="icons_tree filmicon" data-value="'.$InterestedFilmTvValue.'" data-ctype="'.$InterestedFilmTvType.'" data-selected="'.$selectedInterest.'" data-name="'.$page_Lang[$InterestedFilmTvValue][$dataUserPageLanguage].'" data-type="newInterest"><span class="intr-txt">'.$page_Lang[$InterestedFilmTvValue][$dataUserPageLanguage].'</span></span>';
			}
		}
	 ?> 
  </div>
  <h1 class="allinterestListHeader"><span class="icons_tree travelicon"></span><?php echo $page_Lang['travel'][$dataUserPageLanguage];?></h1>
  <div class="interestedItems">
    <?php 
	    $TravelList = $Dot->Dot_TravelList();
		if($TravelList){
		    foreach($TravelList as $travel){
			     $InterestedTravelListID = $travel['interest_id'];
				 $InterestedTravelListValue =$travel['interest_value'];
				 $InterestedTravelListType = $travel['interest_type'];
				 $CheckSelectedBefore = $Dot->Dot_CheckSelectedInterestBefore($uid, $InterestedTravelListValue, $InterestedTravelListType);
				 $selectedInterest = 'select';
				 $selectedClass = '';
				 if($CheckSelectedBefore){
				     $selectedInterest = 'unselect';
					 $selectedClass = 'intr_selected';
				 } 
				 echo '<span class="intr interested js-intr js-intr-id-'.$InterestedTravelListID.' '.$selectedClass.'" id="'.$InterestedTravelListID.'" data-category="icons_tree travelicon" data-value="'.$InterestedTravelListValue.'" data-ctype="'.$InterestedTravelListType.'" data-selected="'.$selectedInterest.'" data-name="'.$page_Lang[$InterestedTravelListValue][$dataUserPageLanguage].'" data-type="newInterest"><span class="intr-txt">'.$page_Lang[$InterestedTravelListValue][$dataUserPageLanguage].'</span></span>';
			}
		}
	 ?>  
  </div>
  <h1 class="allinterestListHeader"><span class="icons_tree businessicon"></span><?php echo $page_Lang['expertise'][$dataUserPageLanguage];?></h1>
  <div class="interestedItems">
  <?php 
	    $ExpertiseList = $Dot->Dot_ExpertiseList();
		if($ExpertiseList){
		    foreach($ExpertiseList as $Expertise){
			     $InterestedExpertiseID = $Expertise['interest_id'];
				 $InterestedExpertiseValue =$Expertise['interest_value'];
				 $InterestedExpertiseType = $Expertise['interest_type'];
				 $CheckSelectedBefore = $Dot->Dot_CheckSelectedInterestBefore($uid, $InterestedExpertiseValue, $InterestedExpertiseType);
				 $selectedInterest = 'select';
				 $selectedClass = '';
				 if($CheckSelectedBefore){
				     $selectedInterest = 'unselect';
					 $selectedClass = 'intr_selected';
				 } 
				 echo '<span class="intr interested js-intr js-intr-id-'.$InterestedExpertiseID.' '.$selectedClass.'" id="'.$InterestedExpertiseID.'" data-category="icons_tree businessicon" data-value="'.$InterestedExpertiseValue.'" data-ctype="'.$InterestedExpertiseType.'" data-selected="'.$selectedInterest.'" data-name="'.$page_Lang[$InterestedExpertiseValue][$dataUserPageLanguage].'" data-type="newInterest"><span class="intr-txt">'.$page_Lang[$InterestedExpertiseValue][$dataUserPageLanguage].'</span></span>';
			}
		}
	 ?> 
  </div>
  </span>
</div>
<!--Interested List FINISHED-->