<?php  
 include_once '../functions/inc.php';  
 include_once '../functions/smart_resize_image.php';  
 include_once '../functions/newSizeImage.php';
 include_once('../functions/class.ImageFilter.php');
 include_once '../functions/alphaNumericID.php';     
 function correctImageOrientation($filename) {
  $exif = exif_read_data($filename);
    if (!empty($exif['Orientation'])) {
        $image = imagecreatefromjpeg($filename);
        switch ($exif['Orientation']) {
        case 1: // nothing
            break;
        case 2: // horizontal flip
            imageflip($image, IMG_FLIP_HORIZONTAL);
            break;
        case 3: // 180 rotate left
            $image = imagerotate($image, 180, 0);
            break;
        case 4: // vertical flip
            imageflip($image, IMG_FLIP_VERTICAL);
            break;
        case 5: // vertical flip + 90 rotate right
            imageflip($image, IMG_FLIP_VERTICAL);
            $image = imagerotate($image, -90, 0);
            break;
        case 6: // 90 rotate right
            $image = imagerotate($image, -90, 0);
            break;
        case 7: // horizontal flip + 90 rotate right
            imageflip($image, IMG_FLIP_HORIZONTAL);
            $image = imagerotate($image, -90, 0);
            break;
        case 8:    // 90 rotate left
            $image = imagerotate($image, 90, 0);
            break;
    }

        imagejpeg($image, $filename, 90);
    }  
} 
function random_code($length)
{
  return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
}
 if(isset($_POST['t'])) {
     $uploadType = mysqli_real_escape_string($db, $_POST['t']); 
	   //Upload Music
	   if($uploadType == 'music'){
		  $valid_formats = array("mp3", "mp4","wma","wav");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['uploading']['name'];
				$size = $_FILES['uploading']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$getAudioName = time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['uploading']['tmp_name'];
							if(move_uploaded_file($tmp,$audioPath.$getAudioName)) {
								// Upload an image from the uploads file
								$type = 'wall';
								$data=$Dot->Dot_AudioUpload($uid,$getAudioName, $type);
								// Create new image data 
								$NewAudio=$Dot->GetDot_Audio($uid,$getAudioName,$type);
								if($NewAudio){
								  echo '<div class="media-wrapper UploadedItemNew" id="'.$NewAudio['id'].'"><audio id="player2" preload="none" controls style="max-width:100%;"><source src="'.$base_url.'uploads/audio/'.$getAudioName.'" type="audio/mp3"></audio></div>';
								}
							  } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Wrong Music Size, music size must be 50MB";					
				   } else
					  echo "invalidmusic";
				 } else
					 echo "Please select music..!";
					exit;
			 } 
	  }
	  // Upload Video
	  if($uploadType == 'video'){
	        $valid_formats = array("mp4", "MP4","mp3","MP3","mpg","mov","m4v","avi","flv");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
			   $name = $_FILES['uploading']['name'];
			   $size = $_FILES['uploading']['size'];
			   if(strlen($name)) {
				   $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION)); 
				   $name = alphaID(microtime(true) * 10000).'_video';
				   if(in_array($ext,$valid_formats)) {
				   if($size<(50024*50024)) {
					  $GetVideoName = $name;
					  $video_ext=$ext;
					   $tmp = $_FILES['uploading']['tmp_name'];
					   if(move_uploaded_file($tmp, $videoPath.$GetVideoName.'.'.$video_ext)) { 
						  shell_exec("ffmpeg -i uploads/video/$GetVideoName.flv -f flv -s 650x390 uploads/video/$GetVideoName.mp4");
						  shell_exec("ffmpeg -i uploads/video/$GetVideoName.mp4 -vcodec png -ss 00:00:5 -s 650x390 -vframes 1 -an -f rawvideo uploads/video/$GetVideoName.png");
						  $data=$Dot->Dot_VideoUpload($uid,$GetVideoName,$video_ext);
						  $newVideo=$Dot->Dot_GetVideo($uid,$GetVideoName);
						  $videoTumbnail ='';
						  if(file_exists($base_url.$videoPath.$GetVideoName.'.png')){
							  $videoTumbnail = $base_url.'uploads/video/'.$GetVideoName.'.png';   
						  }else{
							  $videoTumbnail = $base_url.'uploads/video/safe_video.png';
						  }
						  if($newVideo) { 
							 echo '<div class="media-wrapper videoNew UploadedItemNew" id="'.$newVideo['id'].'"><video id="player-video" width="100%" height="360" style="max-width:100%;" poster="'.$videoTumbnail.'"  controls><source src="'.$base_url.'uploads/video/'.$GetVideoName.'.'.$video_ext.'" type="video/mp4"></video></div></div>';
						  }
						} else {
							echo "Fail upload folder with read access.";
						}
					 } else
						echo "Image file size max 1 MB";					
					 } else
						echo "invalidvieo";	
				 } else
					echo "Please select image..!";
				 exit;
			  }
	  }
	  //Upload Image
	  if($uploadType == 'image'){
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				
				foreach ($_FILES['uploading']['name'] as $iname => $value) {
				$name = stripslashes($_FILES['uploading']['name'][$iname]);
				$size = filesize($_FILES['uploading']['size'][$iname]); 
					$ext = getExtension($name);
					$ext = strtolower($ext);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
						    $microtime = microtime(); 
                            $removeMicrotimeDot = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime); 
							$getImageNameU = "image_".$removeMicrotimeDot.'_'.$uid.".".$ext; 
							// Change the image ame 							
							$tmp = $_FILES['uploading']['tmp_name'][$iname];  
							correctImageOrientation($tmp);  
							if($ext != 'gif'){
								$NudeImagefilter = new ImageFilter;
                                $Nudescore = $NudeImagefilter->GetScore($tmp);
							   ////////////////////////
								   if(move_uploaded_file($tmp, $imagePathOld.$getImageNameU)) {   
										$image = new SimpleImage();
										$image->load($imagePathOld.$getImageNameU);
										$image->resizeToWidth(850);
										$image->save($imagePath.$getImageNameU); 
									// Upload an image from the uploads file 
									$width=500;
									$height=500;
									 $file = $imagePath.$getImageNameU;
									//indicate the path and name for the new resized file
									$resizedFile = $tumbnails.$getImageNameU;
									//call the function (when passing path to pic)
									smart_resize_image($file , null, $width , $height , false , $resizedFile , false , false ,100 );
									//call the function (when passing pic as string)
									smart_resize_image(null , file_get_contents($resizedFile), $width , $height , false , $resizedFile , false , false ,100 );  
									unlink($imagePathOld.$getImageNameU);
									$data=$Dot->Dot_ImageUpload($uid,$getImageNameU,$Nudescore);
									// Create new image data 
									$newdata=$Dot->Dot_GetUploadedImage($uid,$getImageNameU);  
									echo '
									<div class="post-image-preview preview_screen_image UploadedItemNew" id="'.$newdata['image_id'].'">
									  <div class="preview-body" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');" id="new'.$newdata['image_id'].'"><img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="'.$newdata['image_id'].'" class="img_post_uploaded pimg">
										<div class="delete-image delete_this_image tooltipster-punk-preview tooltipsteredOn sep tooltipstered" title="'.$page_Lang['delete_this_image'][$dataUserPageLanguage].'" id="'.$newdata['image_id'].'" data-type="deleteImage"></div>
									 </div>
								    </div>
									'; 
								  } else {
									  echo "Fail upload folder with read access.";
								}
							   ////////////////////////
							}else {
							    ////////////////////////
								if(move_uploaded_file($tmp, $imagePath.$getImageNameU)) {  
										  $image = new SimpleImage();
										  $image->load($imagePath.$getImageNameU);
										  $image->resizeToWidth(850); 
										  $image->save($imagePathOld.$getImageNameU); 
								    $NudeImagefilter = new ImageFilter;
                                    $Nudescore = $NudeImagefilter->GetScore($imagePathOld.$getImageNameU); 
									// Upload an image from the uploads file 
									$width=500;
									$height=500;
									 $file = $imagePath.$getImageNameU;
									//indicate the path and name for the new resized file
									$resizedFile = $tumbnails.$getImageNameU; 
									//call the function (when passing path to pic)
									smart_resize_image($file , null, $width , $height , false , $resizedFile , false , false ,100 );
									//call the function (when passing pic as string)
									smart_resize_image(null , file_get_contents($resizedFile), $width , $height , false , $resizedFile , false , false ,100 );   
									$data=$Dot->Dot_ImageUpload($uid,$getImageNameU,$Nudescore);
									// Create new image data 
									$newdata=$Dot->Dot_GetUploadedImage($uid,$getImageNameU);  
									unlink($imagePathOld.$getImageNameU); 
									echo '
									<div class="post-image-preview preview_screen_image UploadedItemNew" id="'.$newdata['image_id'].'">
									  <div class="preview-body" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');" id="new'.$newdata['image_id'].'"><img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="'.$newdata['image_id'].'" class="img_post_uploaded pimg">
										<div class="delete-image delete_this_image tooltipster-punk-preview tooltipsteredOn sep tooltipstered" title="'.$page_Lang['delete_this_image'][$dataUserPageLanguage].'" id="'.$newdata['image_id'].'" data-type="deleteImage"></div>
									 </div>
								   </div>
									'; 
								  } else {
									  echo "Fail upload folder with read access.";
								}
							   ////////////////////////
							} 
							
							} else
							  echo "Image file size max 1 MB";					
				   } else
					 echo $page_Lang['image_format'][$dataUserPageLanguage];
				 
				}
				
			 }
	  }
	  // Upload a New Profile Avatar
	  if($uploadType == 'avatar'){
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['avatarimage']['name'];
				$size = $_FILES['avatarimage']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'avatar_'.time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['avatarimage']['tmp_name'];
							correctImageOrientation($tmp); 
							if($ext != 'gif'){
							     if(move_uploaded_file($tmp,$imagePathOld.$actual_image_name)) { 
								 $image = new SimpleImage();
								$image->load($imagePathOld.$actual_image_name);
								$image->resizeToWidth(850);
								$image->save($avatarPath.$actual_image_name);
								// Upload an image from the uploads file
								$newdata=$Dot->Dot_AvatarUpload($uid,$actual_image_name);
								$getAvatarID = $Dot->Dot_GetAvatarID($uid, $actual_image_name);
								$getID = $getAvatarID['id'];
								$slug = 'p_'.random_code(8);
								$insertChangedCover = $Dot->Dot_PostAvatarChanged($uid, $getID,$slug);
								unlink($imagePathOld.$actual_image_name);
								 if($newdata) { 
									echo '<div class="profile_avatar_image_container" style="background-image: url('.$base_url.'uploads/avatar/'.$actual_image_name.'); "></div>';
								 }
								 } else {
								  echo "Fail upload folder with read access.";
							    }
							}else{
							   if(move_uploaded_file($tmp,$avatarPath.$actual_image_name)) { 
								// Upload an image from the uploads file
								$newdata=$Dot->Dot_AvatarUpload($uid,$actual_image_name);
								$getAvatarID = $Dot->Dot_GetAvatarID($uid, $actual_image_name);
								$getID = $getAvatarID['id'];
								$slug = 'p_'.random_code(8);
								$insertChangedCover = $Dot->Dot_PostAvatarChanged($uid, $getID,$slug);
								 if($newdata) { 
									echo '<div class="profile_avatar_image_container" style="background-image: url('.$base_url.'uploads/avatar/'.$actual_image_name.'); "></div>';
								 }
								 } else {
								  echo "Fail upload folder with read access.";
							     }
							}
							
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo $page_Lang['image_format'][$dataUserPageLanguage];
				 } else
					 echo "Please select image..!";
					exit;
			 }
	   } 
	     // Upload a New Profile Background Music
	  if($uploadType == 'bgmusic'){
	      $valid_formats = array("mp3", "mp4","wma","wav");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['bgmusic']['name'];
				$size = $_FILES['bgmusic']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'audio_'.time().$uid.".".$ext;
							$actual_audiobgname = 'audio_'.time().$uid;
							// Change the image ame
							$tmp = $_FILES['bgmusic']['tmp_name'];
							if(move_uploaded_file($tmp,$audioPath.$actual_image_name)) { 
								// Upload an image from the uploads file
								$newdata=$Dot->Dot_ProfileBackgroundMusicUpload($uid,$actual_image_name,$actual_audiobgname);   
								 if($newdata) {  
									echo '
									<script type="text/javascript">$(document).ready(function() {  function playProfileBg(){   ion.sound({sounds: [	{name: "'.$actual_audiobgname.'"} ], path: requestUrl+"uploads/audio/",	preload: true,  volume: 1.0}); ion.sound.play("'.$actual_audiobgname.'");}playProfileBg();$("body").on("click", ".manage", function(){    ion.sound.pause("'.$actual_audiobgname.'");	if ($(".manage").hasClass("pause")) {   $(".manage").removeClass("pause").addClass("play");   } else {   $(".manage").removeClass("play").addClass("pause");   }}); });  </script>
									';
								 }
								 } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo $page_Lang['image_format'][$dataUserPageLanguage];
				 } else
					 echo "Please select image..!";
					exit;
			 }
	   } 
	   // Upload a New Profile Background
	  if($uploadType == 'backgrnd'){
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['backimage']['name'];
				$size = $_FILES['backimage']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'bg_'.time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['backimage']['tmp_name'];
							if(move_uploaded_file($tmp,$avatarPath.$actual_image_name)) { 
								// Upload an image from the uploads file
								$newdata=$Dot->Dot_ProfileBackgroundUpload($uid,$actual_image_name);
								$getBgID = $Dot->Dot_GetProfileBackgroundID($uid, $actual_image_name);
								$getID = $getBgID['id']; 
								 if($newdata) { 
									echo $base_url.'uploads/avatar/'.$actual_image_name;
								 }
								 } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo $page_Lang['image_format'][$dataUserPageLanguage];
				 } else
					 echo "Please select image..!";
					exit;
			 }
	   }
	  // Upload a New Profile Cover
	  if($uploadType == 'cover'){
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['coverimage']['name'];
				$size = $_FILES['coverimage']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'cover_'.time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['coverimage']['tmp_name']; 
							correctImageOrientation($tmp); 
							if($ext != 'gif'){
							    if(move_uploaded_file($tmp,$imagePathOld.$actual_image_name)) { 
							    $image = new SimpleImage();
								$image->load($imagePathOld.$actual_image_name);
								$image->resizeToWidth(850);
								$image->save($coverPath.$actual_image_name);
								// Upload an image from the uploads file
								$newdata=$Dot->Dot_CoverUpload($uid,$actual_image_name);
								$getAvatarID = $Dot->Dot_GetCoverID($uid, $actual_image_name);
								$getID = $getAvatarID['id'];
								$slug = 'p_'.random_code(8);
								$insertChangedCover = $Dot->Dot_PostCoverChanged($uid, $getID,$slug);
								unlink($imagePathOld.$actual_image_name);
								 if($newdata) {  
									echo '<div class="CoverImage img-thumbnail" style="background-image:url('.$base_url.'uploads/cover/'.$actual_image_name.');"></div>';
								 }
								 } else {
								  echo "Fail upload folder with read access.";
							    }
							}else{
							    if(move_uploaded_file($tmp,$coverPath.$actual_image_name)) {  
									// Upload an image from the uploads file
									$newdata=$Dot->Dot_CoverUpload($uid,$actual_image_name);
									$getAvatarID = $Dot->Dot_GetCoverID($uid, $actual_image_name);
									$getID = $getAvatarID['id'];
									$slug = 'p_'.random_code(8);
									$insertChangedCover = $Dot->Dot_PostCoverChanged($uid, $getID,$slug); 
									 if($newdata) {  
										echo '<div class="CoverImage img-thumbnail" style="background-image:url('.$base_url.'uploads/cover/'.$actual_image_name.');"></div>';
									 }
									 } else {
									  echo "Fail upload folder with read access.";
									}
							}
							
							
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo $page_Lang['image_format'][$dataUserPageLanguage];
				 } else
					 echo "Please select image..!";
					exit;
			 }
	   } 
	   // Upload a New Stori Post
	   if($uploadType == 'stories'){
		   $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP","mp4", "MP4");
				if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
					$name = $_FILES['storieimg']['name'];
					$size = $_FILES['storieimg']['size'];
					if(strlen($name)) {
						$ext = getExtension($name);
						if(in_array($ext,$valid_formats)) {
							if($size<(50024*50024)) { // Check the image size 
								$getSotryName = time().$uid.".".$ext;
								// Change the image ame
								$tmp = $_FILES['storieimg']['tmp_name'];
								correctImageOrientation($tmp); 
								if(move_uploaded_file($tmp,$sotryPath.$getSotryName)) { 
									// Upload an image from the uploads file 
									$newdata = $Dot->Dot_InsertNewStories($uid, $getSotryName);  
									if($newdata){  
									     echo $page_Lang['story_added_success'][$dataUserPageLanguage];
									}
								     } else {
									  echo "Fail upload folder with read access.";
								}
								} else
								  echo "Wrong Image Size, music size must be 50MB";					
					   } else
						  echo $page_Lang['image_format'][$dataUserPageLanguage];
					 } else
						 echo "Please select image..!";
						exit;
			 } 
	   }
	   // Upload Image For Filter
	   if($uploadType == 'filter'){
		  $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['filtering']['name'];
				$size = $_FILES['filtering']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$getImageNameU = "filter_".time().$uid.".".$ext;
							// Change the image ame 							
							$tmp = $_FILES['filtering']['tmp_name']; 
							correctImageOrientation($tmp); 
							if(move_uploaded_file($tmp, $imagePathOld.$getImageNameU)) {
							    	$image = new SimpleImage();
								    $image->load($imagePathOld.$getImageNameU);
								    $image->resizeToWidth(850);
								    $image->save($imagePath.$getImageNameU);
								// Upload an image from the uploads file 
								$width=500;
				                $height=500;
								 $file = $imagePath.$getImageNameU;
								//indicate the path and name for the new resized file
								$resizedFile = $tumbnails.$getImageNameU;
								//call the function (when passing path to pic)
								smart_resize_image($file , null, $width , $height , false , $resizedFile , false , false ,100 );
								//call the function (when passing pic as string)
								smart_resize_image(null , file_get_contents($resizedFile), $width , $height , false , $resizedFile , false , false ,100 ); 
								// Upload an image from the uploads file 
								$data=$Dot->Dot_ImageUpload($uid,$getImageNameU);
								// Create new image data 
								$newdata=$Dot->Dot_GetUploadedImage($uid,$getImageNameU); 
								unlink($imagePathOld.$getImageNameU);
								if($newdata){ 
								    echo ' 
											  <div class="filter_original_image UploadedItemNew"  id="'.$newdata['image_id'].'">
												<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="first">
											  </div>
											  <div class="filters_container">
												<div class="filter_item_wrap">
												  <div class="filtered_image_item first" data-style="first" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item second" data-style="second" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item third" data-style="third" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item fourth" data-style="fourth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item fifth" data-style="fifth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item sixth" data-style="sixth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item seventh" data-style="seventh" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item eighth" data-style="eighth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item ninth" data-style="ninth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item tenth" data-style="tenth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item eleventh" data-style="eleventh" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item thirteenth" data-style="thirteenth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item fourteenth" data-style="fourteenth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
												<div class="filter_item_wrap">
												  <div class="filtered_image_item fifteenth" data-style="fifteenth" style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.');">
													<img src="'.$base_url.'uploads/images/'.$getImageNameU.'" id="image_filtered" class="image_filtered">
												  </div>
												</div>
										
											  </div> 
									';  
								 }
							  } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo "invalidFilterimage";
				 } else
					 echo "Lütfen Resim Seç..!";
					exit;
			 }
	   }
	   // Upload Advertisement Image
	   if($uploadType == 'advertisementImage'){ 
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['uploadadsing']['name'];
				$size = $_FILES['uploadadsing']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$getImageNameU = "ads_".time().$uid.".".$ext;
							// Change the image ame 							
							$tmp = $_FILES['uploadadsing']['tmp_name']; 
							if(move_uploaded_file($tmp, $adsPath.$getImageNameU)) {
								// Upload an image from the uploads file 
								$data=$Dot->Dot_AdsImageUpload($uid,$getImageNameU);
								// Create new image data 
								$newdata=$Dot->Dot_GetUploadedAdsImage($uid,$getImageNameU); 
								if($newdata){ 
							    echo '
								<div class="post-image-preview preview_screen_image UploadedItemNew" id="'.$newdata['s_ads_img_id'].'">
								  <div class="preview-body" style="background-image:url('.$base_url.'supponsoreduploads/'.$getImageNameU.');" id="new'.$newdata['s_ads_img_id'].'"><img src="'.$base_url.'supponsoreduploads/'.$getImageNameU.'" id="'.$newdata['s_ads_img_id'].'" class="img_post_uploaded pimg">
									<div class="delete-image delete_this_ads_image show_this" data-position="top" data-delay="50" data-tooltip="'.$page_Lang['delete_this_image'][$dataUserPageLanguage].'" id="'.$newdata['s_ads_img_id'].'" data-type="deleteIadsmage"></div>
								 </div>
							   </div>
								';
									}
							  } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo "invalidimage";
				 } else
					 echo "Please select image..!";
					exit;
			 } 
	   }
	   //Upload Conversation Image
	  if($uploadType == 'cimage'){
	      $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['cuploading']['name'];
				$size = $_FILES['cuploading']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
						    $microtime = microtime(); 
                            $removeMicrotimeDot = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime); 
							$getImageNameU = "conversation_i_".$removeMicrotimeDot.'_'.$uid.".".$ext;  
							// Change the image ame 							
							$tmp = $_FILES['cuploading']['tmp_name']; 
							if(move_uploaded_file($tmp, $imagePath.$getImageNameU)) {
								    $image = new SimpleImage();
								    $image->load($imagePathOld.$getImageNameU);
								    $image->resizeToWidth(850);
								    $image->save($imagePath.$getImageNameU);
								// Upload an image from the uploads file 
								$data=$Dot->Dot_ConversationImageUpload($uid,$getImageNameU,$ext);
								// Create new image data 
								$newdata=$Dot->Dot_GetConversationUploadedImage($uid,$getImageNameU); 
								unlink($imagePathOld.$getImageNameU);
								if($newdata){ 
							    echo '<div class="_2azv _6ddc UploadedItemNew" id="'.$newdata['image_id'].'"><div style="background-image:url('.$base_url.'uploads/images/'.$getImageNameU.'); background-position: 50% 50%; background-repeat: no-repeat; height: 108px; width: 108px; background-size: cover;"></div></div>';
									}
							  } else {
								  echo "Fail upload folder with read access.";
							}
							} else
							  echo "Image file size max 1 MB";					
				   } else
					  echo $page_Lang['image_format'][$dataUserPageLanguage];
				 } else
					 echo "Please select image..!";
					exit;
			 }
	  }
	   // Upload Conversation Video
	  if($uploadType == 'vvideo'){   
	        $valid_formats = array("mp4", "MP4","mp3","MP3","mpg","mov","m4v","avi","flv");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
			   $name = $_FILES['vuploading']['name'];
			   $size = $_FILES['vuploading']['size'];
			   if(strlen($name)) {
				   $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION)); 
				   $name = alphaID(microtime(true) * 10000).'_video_conversation'; 
				   if(in_array($ext,$valid_formats)) {
				   if($size<(50024*50024)) {
					  $GetVideoName = $name;
					  $video_ext=$ext;
					   $tmp = $_FILES['vuploading']['tmp_name'];
					   if(move_uploaded_file($tmp, $videoPath.$GetVideoName.'.'.$video_ext)) {
						    //shell_exec("ffmpeg -i uploads/video/$GetVideoName.flv -f flv -s 650x390 uploads/video/$GetVideoName.mp4");
						    //shell_exec("ffmpeg -i uploads/video/$GetVideoName.mp4 -vcodec png -ss 00:00:5 -s 650x390 -vframes 1 -an -f rawvideo uploads/video/$GetVideoName.png");
						  
						  $data=$Dot->Dot_ConversationVideoUpload($uid,$GetVideoName,$video_ext);
						  $newVideo=$Dot->Dot_GetConversationUploadedvideo($uid,$GetVideoName);
						  $videoTumbnail ='';
						  if(file_exists($base_url.$videoPath.$GetVideoName.'.png')){
							  $videoTumbnail = $base_url.'uploads/video/'.$GetVideoName.'.png';   
						  }else{
							  $videoTumbnail = $base_url.'uploads/video/safe_video.png';
						  }
						  if($newVideo) { 
							 echo '<div class="media-wrapper videoNew uploadedvid" id="'.$newVideo['video_id'].'"><video id="player1" width="100%" height="300" style="max-width:100%;" poster="'.$videoTumbnail.'" preload="none" controls playsinline webkit-playsinline><source src="'.$base_url.'/uploads/video/'.$GetVideoName.'.'.$video_ext.'" type="video/mp4"></video></div>';
						  }
						} else {
							echo "Fail upload folder with read access.";
						}
					 } else
						echo "Image file size max 1 MB";					
					 } else
						echo $page_Lang['video_format'][$dataUserPageLanguage];
				 } else
					echo "Please select image..!";
				 exit;
			  }
	  }
	  // File Upload
	  if($uploadType == 'fileUpload'){
	      $valid_formats = array("ai", "pdf","eps","tif","doc","docx","zip","rar","psd","txt");
		  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
		        $name = $_FILES['fuploading']['name'];
				$size = $_FILES['fuploading']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
						    $getIFileNameU = "file_".time().$uid.".".$ext;
							// Change the image ame 							
							$tmp = $_FILES['fuploading']['tmp_name']; 
							if(move_uploaded_file($tmp, $filePath.$getIFileNameU)) {
							     // Upload an image from the uploads file 
								$data=$Dot->Dot_ConversationFileUpload($uid,$getIFileNameU,$ext);
								// Create new image data 
								$newFile=$Dot->Dot_GetConversationUploadedFile($uid,$getIFileNameU); 
								$extensionArray = array(
								   'ai' => "file_ai",
								   'pdf' => "file_pdf",
								   'eps' => "file_eps",
								   'tif' => "file_tif",
								   'doc' => "file_doc",
								   'docx' => "file_doc",
								   'zip' => "file_zip",
								   'rar' => "file_rar",
								   'psd' => "file_psd",
								   'txt' => "file_txt"
								);
								if($newFile){
								     echo '<div class="file_item thisfilenam" id="'.$newFile['file_id'].'" data-fname="'.basename($name, ".".$ext).'" data-nfile="'.$name.'"><div class="file_extensions_icon '.$extensionArray[$ext].'"></div><div class="file_name_ex truncate">'.$name.'</div></div>';
								}
							}else{
							   echo "Fail upload folder with read access.";
							}
						}else{
						    echo 'You can upload files up to 50 MB.';
						}
					}else{
					    echo 'Invalid File Format.';
					}
				}
		  }
	  }
	  // Upload New Which Image
	  if($uploadType == 'which_one' || $uploadType == 'which_two'){
	        if(isset($_POST['image'])){ 
			     $face = mysqli_real_escape_string($db, $_POST['f']);
	             $data =  mysqli_real_escape_string($db, $_POST["image"]);
				 /***********************************/
				 $dataImage = mysqli_real_escape_string($db, $_POST['image']);
				  $image_array_1 = explode(";", $dataImage); 
				  $image_array_2 = explode(",", $image_array_1[1]); 
				  $data = base64_decode($image_array_2[1]);
				  $imageName = 'which_'.time() .$uid. '.png';  
				  $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP"); 
				  if(strlen($imageName)) {
					   $ext = getExtension($imageName);
					   if(in_array($ext,$valid_formats)) { 
							if($size<(50024*50024)) { // Check the image size   
								 // Change the image ame   		  
								 if(file_put_contents($imagePath.$imageName, $data)) {  
									  // Upload an image from the uploads file
									  // Upload an image from the uploads file 
										$dataSave=$Dot->Dot_ImageUpload($uid,$imageName, '0');
										// Create new image data 
										$newdata=$Dot->Dot_GetUploadedImage($uid,$imageName);  
									  if($newdata) { 
										  echo '<div class="whichimg-item-box img-thumbnail '.$uploadType.'" style="background-image: url('.$base_url.'uploads/images/'.$imageName.');"  id="'.$newdata['image_id'].'"><div class="removeThis" data-replace="'.$face.'" data-rm="'.$uploadType.'" id="'.$newdata['image_id'].'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g transform="translate(9.504,9.504) scale(0.901,0.901)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="none" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g fill="#e74c3c" stroke="#ffffff" stroke-width="21" stroke-linejoin="round"><path d="M172.8,96c0,42.4128 -34.3872,76.8 -76.8,76.8c-42.4128,0 -76.8,-34.3872 -76.8,-76.8c0,-42.4128 34.3872,-76.8 76.8,-76.8c42.4128,0 76.8,34.3872 76.8,76.8zM126.1248,74.9248c2.5024,-2.496 2.5024,-6.5472 0,-9.0496c-2.496,-2.5024 -6.5472,-2.5024 -9.0496,0c-0.9856,0.9856 -21.0752,21.0752 -21.0752,21.0752c0,0 -20.0896,-20.096 -21.0752,-21.0752c-2.496,-2.5024 -6.5472,-2.5024 -9.0496,0c-2.5024,2.496 -2.5024,6.5472 0,9.0496c0.9856,0.9856 21.0752,21.0752 21.0752,21.0752c0,0 -20.096,20.0896 -21.0752,21.0752c-2.5024,2.496 -2.5024,6.5472 0,9.0496c2.496,2.5024 6.5472,2.5024 9.0496,0c0.9856,-0.9856 21.0752,-21.0752 21.0752,-21.0752c0,0 20.0896,20.096 21.0752,21.0752c2.496,2.5024 6.5472,2.5024 9.0496,0c2.5024,-2.496 2.5024,-6.5472 0,-9.0496c-0.9856,-0.9856 -21.0752,-21.0752 -21.0752,-21.0752c0,0 20.096,-20.0896 21.0752,-21.0752z"></path></g><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1" stroke-linejoin="miter"></path><g fill="#e74c3c" stroke="none" stroke-width="1" stroke-linejoin="miter"><path d="M96,19.2c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8c0,-42.4128 -34.3872,-76.8 -76.8,-76.8zM105.0496,96c0,0 20.0896,20.0896 21.0752,21.0752c2.5024,2.5024 2.5024,6.5536 0,9.0496c-2.5024,2.5024 -6.5536,2.5024 -9.0496,0c-0.9856,-0.9792 -21.0752,-21.0752 -21.0752,-21.0752c0,0 -20.0896,20.0896 -21.0752,21.0752c-2.5024,2.5024 -6.5536,2.5024 -9.0496,0c-2.5024,-2.5024 -2.5024,-6.5536 0,-9.0496c0.9792,-0.9856 21.0752,-21.0752 21.0752,-21.0752c0,0 -20.0896,-20.0896 -21.0752,-21.0752c-2.5024,-2.5024 -2.5024,-6.5536 0,-9.0496c2.5024,-2.5024 6.5536,-2.5024 9.0496,0c0.9856,0.9792 21.0752,21.0752 21.0752,21.0752c0,0 20.0896,-20.0896 21.0752,-21.0752c2.5024,-2.5024 6.5536,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5536 0,9.0496c-0.9792,0.9856 -21.0752,21.0752 -21.0752,21.0752z"></path></g><path d="" fill="none" stroke="none" stroke-width="1" stroke-linejoin="miter"></path></g></g></svg></div><img src="'.$base_url.'uploads/images/'.$imageName.'" class="whichimg-item-img"></div>';
									  }
								 } else {
									  echo "Fail upload folder with read access.";
								 }
							} else {
								 echo "Image file size max 1 MB";		
							}
					   } else {
							echo "invalidimage";
					   }
				  } else {
					echo "Please select image..!";
					exit;
				  }
				 /***********************************/
			}
	   }
// Upload New Which Image
	  if($uploadType == 'before_image' || $uploadType == 'after_image'){
	        if(isset($_POST['image'])){
			     $face = mysqli_real_escape_string($db, $_POST['f']);
	             $data =  mysqli_real_escape_string($db, $_POST["image"]);
				 /***********************************/
				 $dataImage = mysqli_real_escape_string($db, $_POST['image']);
				  $image_array_1 = explode(";", $dataImage); 
				  $image_array_2 = explode(",", $image_array_1[1]); 
				  $data = base64_decode($image_array_2[1]);
				  $imageName = 'bfaf_'.time() .$uid. '.png';  
				  $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
				  if(strlen($imageName)) {
					   $ext = getExtension($imageName);
					   if(in_array($ext,$valid_formats)) {
							if($size<(50024*50024)) { // Check the image size   
								 // Change the image ame   							
								 if(file_put_contents($imagePathOld.$imageName, $data)) { 
								       $image = new SimpleImage();
								       $image->load($imagePathOld.$imageName);
								       $image->resizeToWidth(650);
								       $image->save($imagePath.$imageName);
									  // Upload an image from the uploads file
									  // Upload an image from the uploads file 
										$dataSave=$Dot->Dot_ImageUpload($uid,$imageName, '0');
										// Create new image data 
										$newdata=$Dot->Dot_GetUploadedImage($uid,$imageName); 
										unlink($imagePathOld.$imageName);
									  if($newdata) { 
										  echo '<div class="whichimg-item-box img-thumbnail '.$uploadType.'" style="background-image: url('.$base_url.'uploads/images/'.$imageName.');"  id="'.$newdata['image_id'].'" data-imagename="'.$imageName.'"><div class="removeThis" data-replace="'.$face.'" data-rm="'.$uploadType.'" id="'.$newdata['image_id'].'" ><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g transform="translate(9.504,9.504) scale(0.901,0.901)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="none" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g fill="#e74c3c" stroke="#ffffff" stroke-width="21" stroke-linejoin="round"><path d="M172.8,96c0,42.4128 -34.3872,76.8 -76.8,76.8c-42.4128,0 -76.8,-34.3872 -76.8,-76.8c0,-42.4128 34.3872,-76.8 76.8,-76.8c42.4128,0 76.8,34.3872 76.8,76.8zM126.1248,74.9248c2.5024,-2.496 2.5024,-6.5472 0,-9.0496c-2.496,-2.5024 -6.5472,-2.5024 -9.0496,0c-0.9856,0.9856 -21.0752,21.0752 -21.0752,21.0752c0,0 -20.0896,-20.096 -21.0752,-21.0752c-2.496,-2.5024 -6.5472,-2.5024 -9.0496,0c-2.5024,2.496 -2.5024,6.5472 0,9.0496c0.9856,0.9856 21.0752,21.0752 21.0752,21.0752c0,0 -20.096,20.0896 -21.0752,21.0752c-2.5024,2.496 -2.5024,6.5472 0,9.0496c2.496,2.5024 6.5472,2.5024 9.0496,0c0.9856,-0.9856 21.0752,-21.0752 21.0752,-21.0752c0,0 20.0896,20.096 21.0752,21.0752c2.496,2.5024 6.5472,2.5024 9.0496,0c2.5024,-2.496 2.5024,-6.5472 0,-9.0496c-0.9856,-0.9856 -21.0752,-21.0752 -21.0752,-21.0752c0,0 20.096,-20.0896 21.0752,-21.0752z"></path></g><path d="M0,192v-192h192v192z" fill="none" stroke="none" stroke-width="1" stroke-linejoin="miter"></path><g fill="#e74c3c" stroke="none" stroke-width="1" stroke-linejoin="miter"><path d="M96,19.2c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8c0,-42.4128 -34.3872,-76.8 -76.8,-76.8zM105.0496,96c0,0 20.0896,20.0896 21.0752,21.0752c2.5024,2.5024 2.5024,6.5536 0,9.0496c-2.5024,2.5024 -6.5536,2.5024 -9.0496,0c-0.9856,-0.9792 -21.0752,-21.0752 -21.0752,-21.0752c0,0 -20.0896,20.0896 -21.0752,21.0752c-2.5024,2.5024 -6.5536,2.5024 -9.0496,0c-2.5024,-2.5024 -2.5024,-6.5536 0,-9.0496c0.9792,-0.9856 21.0752,-21.0752 21.0752,-21.0752c0,0 -20.0896,-20.0896 -21.0752,-21.0752c-2.5024,-2.5024 -2.5024,-6.5536 0,-9.0496c2.5024,-2.5024 6.5536,-2.5024 9.0496,0c0.9856,0.9792 21.0752,21.0752 21.0752,21.0752c0,0 20.0896,-20.0896 21.0752,-21.0752c2.5024,-2.5024 6.5536,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5536 0,9.0496c-0.9792,0.9856 -21.0752,21.0752 -21.0752,21.0752z"></path></g><path d="" fill="none" stroke="none" stroke-width="1" stroke-linejoin="miter"></path></g></g></svg></div><img src="'.$base_url.'uploads/images/'.$imageName.'" class="whichimg-item-img"></div>';
									  }
								 } else {
									  echo "Fail upload folder with read access.";
								 }
							} else {
								 echo "Image file size max 1 MB";		
							}
					   } else {
							echo "invalidimage";
					   }
				  } else {
					echo "Please select image..!";
					exit;
				  }
				 /***********************************/
			}
	   }
 }else{
	 echo 'Something went Wrong! Please try again later.';
}
?>