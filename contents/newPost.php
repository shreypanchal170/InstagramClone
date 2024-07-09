<?php 
//include_once '../functions/control.php';
include_once '../functions/inc.php';
if(isset($_GET['newPost'])){
    $NewPostType = mysqli_real_escape_string($db, $_GET['newPost']);
	// Wall Post Widgets 
	if($NewPostType == 'textPost'){
	    include("newTextPost.php");
	} 
	if($NewPostType == 'imagePost'){
	    include("newImagePost.php");
	} 
	if($NewPostType == 'linkPost'){
	    include("newLinkPost.php");
	} 
	if($NewPostType == 'videoPost'){
	    include("newVideoPost.php");
	} 
	if($NewPostType == 'musicPost'){
	    include("newMusicPost.php");
	} 
	if($NewPostType == 'filterPost'){
	   include("newFilterImagePost.php");
	}
	if($NewPostType == 'Quotes'){
	   include("newQuotePost.php");
	} 
	if($NewPostType == 'giphy'){
	   include("newGiphyPost.php");
	} 
	if($NewPostType == 'ulocation'){
	   include("newLocationPost.php");
	} 
	if($NewPostType == 'watermark'){
	   include("newWatermarkPost.php");
	} 
	if($NewPostType == 'which'){
	   include("newWhichPost.php");
	}
	if($NewPostType == 'marketPlace'){
	   include("newMarketProduct.php");
	}
	if($NewPostType == 'beforeAfter'){
	   include("newbeforeAfter.php");
	}  
	// Event Post Widgets
	if($NewPostType == 'event_textPost'){
	    include("newEventTextPost.php");
	}
	if($NewPostType == 'event_imagePost'){
	    include("newEventImagePost.php");
	}
	if($NewPostType == 'event_videoPost'){
	    include("newEventVideoPost.php");
	}
	if($NewPostType == 'event_musicPost'){
	    include("newEventMusicPost.php");
	}
	if($NewPostType == 'event_linkPost'){
	    include("newEventLinkPost.php");
	}  
	if($NewPostType == 'event_filterPost'){
	   include("newEventFilterImagePost.php");
	}
	if($NewPostType == 'event_giphy'){
	   include("newEventGiphyPost.php");
	}
	if($NewPostType == 'event_ulocation'){
	   include("newEventLocationPost.php");
	} 
	if($NewPostType == 'event_watermark'){
	   include("newEventWatermarkPost.php");
	}
	if($NewPostType == 'event_which'){
	   include("newEventWhichPost.php");
	}  
} else{echo '200';}
 
?>


	
	
	