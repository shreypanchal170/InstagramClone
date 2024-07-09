<?php  
include_once 'functions/inc.php';  
if(empty($uid)){
   header("Location: $base_url");   
}
$page ='explore'; 
$pmore = 'more_explore';
if(isset($_GET['ex'])){ 
    $getp = isset($_GET['ex']) ? $_GET['ex'] : '';	
	$exploreClass = 'explores';
	if($getp == 'text'){
	     $pmore = 'more_explore_text';
	}else if($getp == 'img'){
	     $pmore = 'more_explore_img';
	}else if($getp == 'vid'){
	     $pmore = 'more_explore_vid';
	}else if($getp == 'aud'){
	     $pmore = 'more_explore_aud';
	}else if($getp == 'filter'){
	     $pmore = 'more_explore_fil';
	}else if($getp == 'gifs'){
	     $pmore = 'more_explore_gif';
	}else if($getp == 'watermarks'){
	     $pmore = 'more_explore_watermarks';
	}else if($getp == 'which'){
	     $pmore = 'more_explore_which';
		 $exploreClass = 'explores_which';
	}else if($getp == 'bfaf'){
	     $pmore = 'more_explore_bfaf';
		 $exploreClass = 'explores_which';
	}
	
}  

//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
?> 

<div class="section">
   <div class="main">
       <div class="container">
            <!--MIDDLE STARTED-->
            <div class="exploreWrapper">
                <?php 
				// The daily view of people is shown here.
				//This file is displayed on some pages. 
				//So please make sure that there are no problems on the current pages after making changes.
				include("contents/stories_explore.php");
				?>
                <main class="<?php echo $exploreClass;?>" id="morePostType" data-type="<?php echo $pmore;?>"> 
                    <?php  
					switch($getp) { 
						case 'text': 
							include('contents/post_text_explore.php');
							break;
					    case 'img': 
							include('contents/post_img_explore.php');
							break;
					   case 'vid': 
							include('contents/post_video_explore.php');
							break;
					   case 'aud': 
							include('contents/post_audio_explore.php');
							break; 
					  case 'filter': 
							include('contents/post_filter_explore.php');
							break;
			          case 'gifs': 
							include('contents/post_gif_explore.php');
							break;   
					  case 'watermarks': 
							include('contents/post_watermark_explore.php');
							break;
					  case 'which': 
							include('contents/post_whichs_explore.php');
							break;
					  case 'bfaf': 
							include('contents/post_bfaf_explore.php');
							break;
					  default:
				      include('contents/post_explore.php');
					 }
					?>  
                  </main>    
            </div>
            <!--MIDDLE FINISHED--> 
       </div>
   </div>
</div> 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php"); 
  $FriendStories=$Dot->Dot_AllStoryPost($uid);
  if($FriendStories){?> 
<script type="text/javascript" src="<?php echo $base_url;?>js/zuck.js"></script>  
 <script>  
function buildItem(id, type, length, src, preview, link, seen, time, img){ return { "id": id, "type": type, "length": 10, "src": src, "preview": preview, "link": link, "seen": seen, "time": time, "img": img}; }
  var initDemo = function(){
  var header = document.getElementById("header");
  var skin = location.href.split('skin=')[1];
  if(!skin) { skin = 'Snapssenger'; } 
  if(skin.indexOf('#')!==-1){ skin = skin.split('#')[0]; }
  //var skins = { 'Snapgram': { 'avatars': false, 'list': false, 'autoFullScreen': false, 'cubeEffect': true } };
  var skins = { 'Snapssenger': {'avatars': false,	'list': false,	'autoFullScreen': false, 'cubeEffect': false } };
  var timeIndex = 0;
  var shifts = [35, 60, 60*3, 60*60*2, 60*60*25, 60*60*24*4, 60*60*24*10];
  var timestamp = function() {
  var now = new Date();
  var shift = shifts[timeIndex++] || 0;
  var date = new Date( now - shift*1000);
  return date.getTime() / 1000;
  };

  var stories = new Zuck('stories', {
	  backNative: false,
	  autoFullScreen: skins[skin]['autoFullScreen'],
	  skin: skin, 
	  avatars: skins[skin]['avatars'],
	  list: skins[skin]['list'],
	  cubeEffect: skins[skin]['cubeEffect'],
	  localStorage: false,
	  stories: [
		   <?php foreach($FriendStories as $storyData) {
              //If updates valid database columns
				$SotryUploaded = isset($storyData['pics']) ? $storyData['pics'] : NULL;
				$SotrySharedUserFullName = $storyData['user_fullname']; 
				$final_image=$base_url."uploads/stories/".$SotryUploaded;
				$StorySharedUserName = $storyData['user_name'];
				$StoryCreatedTime = $storyData['created']; 
				$storyID = $storyData['s_id'];
				$StorySharedUserID = $storyData['uid_fk'];
				$StorySharedUserAvatar = $Dot->Dot_UserAvatar($StorySharedUserID,$base_url); 
				$up = explode(",", $SotryUploaded);   
                ?>{
				  id: "<?php echo $storyID;?>",
				  photo: "<?php echo $StorySharedUserAvatar;?>",
				  name: "<?php echo $StorySharedUserName;?>", 
				  link: "<?php echo $base_url.'profile/stories/'.$StorySharedUserName;?>",
				  lastUpdated: <?php echo $StoryCreatedTime;?>,
				  items: [ 
				  <?php
				  foreach ($up as $item) {  
				  $extensionStory ='';
				  $imageExtensions = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
				  $videoExtensions = array("mp4", "MP4");
				  $exts = pathinfo($item, PATHINFO_EXTENSION); 
				  if(in_array($exts, $imageExtensions)){
					   $extensionStory = 'photo';
				  }
				  if(in_array($exts, $videoExtensions)){
				       $extensionStory = 'video';
				  } 
				  ?>  
				  buildItem("<?php echo $StorySharedUserName;?>", "<?php echo $extensionStory;?>", <?php echo $storyID;?>, "<?php echo $base_url."uploads/stories/".$item;?>", "<?php echo $base_url."uploads/stories/".$item;?>", '<?php echo $base_url.'profile/stories/'.$StorySharedUserName;?>', false, "<?php echo $StoryCreatedTime;?>", '<?php echo $item;?>'),
				  <?php }echo ']},'; }?>
                  ] 
    }); 
}; 
initDemo();
</script>
<?php  }?>
<?php include("contents/explore_menu.php");?> 
</body>
</html>