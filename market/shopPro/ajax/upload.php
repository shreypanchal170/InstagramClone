<?php  
 include_once '../../../functions/inc.php';     
include_once  "../functions/marketFunctions.php";     
$DotMarket = new DOT_MARKET($db);    
 if(isset($_POST['t'])) {
     $uploadType = mysqli_real_escape_string($db, $_POST['t']); 
	 if($uploadType == 'cover'){
	     $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['shopprocoverimage']['name'];
				$size = $_FILES['shopprocoverimage']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'shopPro_'.time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['shopprocoverimage']['tmp_name'];
							if(move_uploaded_file($tmp,$coverPath.$actual_image_name)) { 
								// Upload an image from the uploads file
								$newdata=$DotMarket->Market_UpdateCover($uid,$actual_image_name);  
								 if($newdata) { 
									echo $base_url.'uploads/cover/'.$actual_image_name;
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
	 
	 if($uploadType == 'logo'){
	     $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['shopprologoimage']['name'];
				$size = $_FILES['shopprologoimage']['size'];
				if(strlen($name)) {
					$ext = getExtension($name);
					if(in_array($ext,$valid_formats)) {
						if($size<(50024*50024)) { // Check the image size 
							$actual_image_name = 'shopLogo_'.time().$uid.".".$ext;
							// Change the image ame
							$tmp = $_FILES['shopprologoimage']['tmp_name'];
							if(move_uploaded_file($tmp,$avatarPath.$actual_image_name)) { 
								// Upload an image from the uploads file
								$newdata=$DotMarket->Market_UpdateLogo($uid,$actual_image_name);  
								 if($newdata) {  
									echo '<img src="'.$base_url.'uploads/avatar/'.$actual_image_name.'" />';
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
 }
?>