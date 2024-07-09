<?php 
// Trending Hashtags Box 
	$GetTrendingHashTags = $Dot->Dot_TrendingHashTags();
	if($GetTrendingHashTags){
	    echo '<div class="hAstHit"><div class="globalBoxHeader">'.$page_Lang['trending_now'][$dataUserPageLanguage].'</div><div class="boxitemscont">';
		  // Count the array values and filter out the blank spaces
		  $perpage_page=5;
		  $i = 0;
		  // Make one string
		  $GetTrendingHashTags = implode(',', $GetTrendingHashTags);
		  // Then explode() it
		  $GetTrendingHashTags = explode(',', $GetTrendingHashTags);
		  $count = array_count_values(array_filter($GetTrendingHashTags));
		  // Sort them by hashtags
		  arsort($count);
		  foreach($count as $data => $value) {
			 $trendtag = $data;
			 //$count= array_flip($count);
			 if($i == $perpage_page) break; // Display and break when limited hit hashtags
				if($data) {
				    include("trending_hashtags.php"); 
				  } else {
					include("trending_hashtags.php"); 
				  }
			  $i++;
		   } 
	    echo '</div></div>'; 
	} 
?>