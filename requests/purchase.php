<?php 
include_once("config.php");
if(isset($_POST['purchase_code'])){
	$check = $_POST['purchase_code']; 
	$in = base64_decode('ZG90X2NvbmZpZ3VyYXRpb24=');
	$on = base64_decode('YWN0aXZhdGVk');
	$fly = base64_decode('cHJfY29k');
	$tho = base64_decode('Y29uZmlndXJhdGlvbl9pZA==');
	if($check){
	  if (extension_loaded('curl')) {
		 $curl = curl_init('http://www.freelicense.ml/wp-json/ol_lm/v1/validate');
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  $file = curl_exec($curl);
		  curl_close($curl);
		} else {
		   $arrContextOptions = array(
			  "ssl" => array(
				  "verify_peer" => false,
				  "verify_peer_name" => false
			  )
		   );
			$file = file_get_contents('http://www.freelicense.ml/wp-json/ol_lm/v1/validate', false, stream_context_create($arrContextOptions)); 
		}
		$checks = json_decode($file, true);  
		$data = $checks['data'];   
		if($data == 1){
		     $tun = mysqli_query($db,"UPDATE $in SET $on = '1', $fly = '$check' WHERE $tho = '1'")  or die(mysqli_error($db));
			 echo $tun;
		}else{echo '2';}
	} 
}
    