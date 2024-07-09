<?php 
 include_once '../functions/control.php';
 include_once '../functions/inc.php';  
 if(isset($_POST['t'])){
     $type = mysqli_real_escape_string($db, $_POST['t']);
	 // Crop and Upload Avatar
     if($type == 'avatar'){
          $dataImage = mysqli_real_escape_string($db, $_POST['image']);
          $image_array_1 = explode(";", $dataImage); 
          $image_array_2 = explode(",", $image_array_1[1]); 
          $data = base64_decode($image_array_2[1]);
          $imageName = 'avatar_'.time() .$uid. '.png';  
          $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
          if(strlen($imageName)) {
               $ext = getExtension($imageName);
               if(in_array($ext,$valid_formats)) {
                    if($size<(50024*50024)) { // Check the image size   
                         // Change the image ame   							
                         if(file_put_contents($avatarPath.$imageName, $data)) { 
                              // Upload an image from the uploads file
                              $newdata=$Dot->Dot_AvatarUpload($uid,$imageName);
                              $getAvatarID = $Dot->Dot_GetAvatarID($uid, $imageName); 
                              if($newdata) { 
                                   echo '<div class="profile_avatar_image_container" style="background-image: url('.$base_url.'uploads/avatar/'.$imageName.'); "></div>';
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
     }
	 // Upload Croped Cover
     if($type == 'cover'){
          $dataImage = mysqli_real_escape_string($db, $_POST['image']);
          $image_array_1 = explode(";", $dataImage); 
          $image_array_2 = explode(",", $image_array_1[1]); 
          $data = base64_decode($image_array_2[1]);
          $imageName = 'cover_'.time() .$uid. '.png';  
          $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
          if(strlen($imageName)) {
               $ext = getExtension($imageName);
               if(in_array($ext,$valid_formats)) {
                    if($size<(50024*50024)) { // Check the image size   
                         // Change the image ame   							
                         if(file_put_contents($coverPath.$imageName, $data)) { 
                              // Upload an image from the uploads file
                              $newdata=$Dot->Dot_CoverUpload($uid,$imageName);
                              $getAvatarID = $Dot->Dot_GetCoverID($uid, $imageName); 
                              if($newdata) { 
                                   echo '<div class="CoverImage img-thumbnail" style="background-image: url('.$base_url.'uploads/cover/'.$imageName.'); "></div>';
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
     }	   
	 // Crop and Upload Event Cover
     if($type == 'e_cover'){
		  $eventID = mysqli_real_escape_string($db, $_POST['e']);
          $dataImage = mysqli_real_escape_string($db, $_POST['image']);
          $image_array_1 = explode(";", $dataImage); 
          $image_array_2 = explode(",", $image_array_1[1]); 
          $data = base64_decode($image_array_2[1]);
          $imageName = 'event_cover_'.time() .$eventID. '.png';  
          $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
          if(strlen($imageName)) {
               $ext = getExtension($imageName);
               if(in_array($ext,$valid_formats)) {
                    if($size<(50024*50024)) { // Check the image size   
                         // Change the image ame   							
                         if(file_put_contents($eventCoverPath.$imageName, $data)) { 
                              // Upload an image from the uploads file
                              $newdata=$Dot->Dot_EventCoverUpdate($eventID,$uid,$imageName); 
                              if($newdata) { 
                                   echo $base_url.'uploads/event__type_covers/'.$imageName;
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
     }
 }
?>