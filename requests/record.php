<?php 
 include_once '../functions/inc.php';  
 include_once '../functions/smart_resize_image.php';  
 include_once '../functions/alphaNumericID.php';        
 
if(isset($_FILES['file'])){
  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	  $name = $_FILES['file']['name'];
	  $size = $_FILES['file']['size'];
	  if(strlen($name)) {
		  
			  if($size<(50024*50024)) { // Check the image size 
				  $getAudioName = time().$uid.".mp3";
				  // Change the image ame
				  $tmp = $_FILES['file']['tmp_name'];
				  if(move_uploaded_file($tmp,$audioPath.$getAudioName)) {
					  // Upload an image from the uploads file
					  $type = 'wall';
					  $data=$Dot->Dot_AudioUpload($uid,$getAudioName, $type);
					  // Create new image data 
					  $NewAudio=$Dot->GetDot_Audio($uid,$getAudioName,$type);
					  if($NewAudio){ 
						echo '<audio controls id="audio" class="mes_record n_aud_'.$NewAudio['id'].'" data-id="'.$NewAudio['id'].'" src="'.$base_url.'uploads/audio/'.$getAudioName.'"></audio>';
					  }
					} else {
						echo "Fail upload folder with read access.";
				  }
				  } else
					echo "Wrong Music Size, music size must be 50MB";					
		 
	   } else
		   echo "Please select music..!";
		  exit;
   } 
}

?>