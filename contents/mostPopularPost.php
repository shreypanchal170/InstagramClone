<?php 
$getPop = $Dot->Dot_MostPopularPost(); 
	$MostPopularImagePost = $Dot->Dot_MostPopularImagePostID($getPop); 
	if($MostPopularImagePost){ 
	  $mostPopularTour = $Dot->Dot_CheckTourSawBefore($uid, 1726) ? '<div style="position:absolute;width:100%;height:100%;z-index:2;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1726" data-tip="1726"></div>' : '';
	  echo '<div class="popularPost">'.$mostPopularTour.'<div class="mostPopularRadar">Radar</div>';
	   foreach($MostPopularImagePost as $mp){ 
		  include("html_mostPopularPost.php");
	   }
	   echo '</div>';
	}
?>