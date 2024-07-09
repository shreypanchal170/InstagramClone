<?php  
     $GetTrendingSuggestedHashTags = $Dot->Dot_TrendingHashTags();
	if($GetTrendingSuggestedHashTags){
	    echo '<div class="betweenTags">
    <div class="betweenTagsTitle">But etiketlere göz at</div>
    <div class="column-tag">';
		  // Count the array values and filter out the blank spaces
		  $perpage_page=10;
		  $i = 0;
		  // Make one string
		  $GetTrendingSuggestedHashTags = implode(',', $GetTrendingSuggestedHashTags);
		  // Then explode() it
		  $GetTrendingSuggestedHashTags = explode(',', $GetTrendingSuggestedHashTags);
		  $count = array_count_values(array_filter($GetTrendingSuggestedHashTags));
		  // Sort them by hashtags
		  arsort($count);
		  foreach($count as $data => $value) {
			 $trendtag = $data;
			 //$count= array_flip($count);
			 if($i == $perpage_page) break; // Display and break when limited hit hashtags
			    $TrendingTag = $trendtag;
                $TotalUniqTag = $value;
				if($data) { 
				    echo '<div class="scrollTag" id="socialTagContainer"><a href="'.$base_url.'hashtag/'.$TrendingTag.'"><div class="scrollTagItem">#'.$TrendingTag.'</div></a></div>';
				  } else {
					echo '<div class="scrollTag" id="socialTagContainer"><a href="'.$base_url.'hashtag/'.$TrendingTag.'"><div class="scrollTagItem">#'.$TrendingTag.'</div></a></div>';
				  }
			  $i++;     
		   }  
	    echo '</div></div>';  
	}      
?>