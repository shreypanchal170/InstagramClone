<?php include_once("functions/o_expand.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php  
$link = 'https://www.facebook.com/highlightswave/videos/930297320637104/?__xts__[0]=68.ARDsrJehHpMYDTMyqDKUDQsTJATsQBkbWEi3jZnGXpBJElZesGVy2vQ7istNN1XMDlSNzMTpxA0eREFlp1J5UXzoanRVs3T1tXDp1tRhwx0X3hUuZMjSpfhXj7i9WU9NMXM9Am4mI205hC18-3FGNS7VBpv6sok4G-M48FkYS4HkmviWlqjdN-93RfFPotLq-dZoz8Sxbr75u-qATMRVNmi4UFMFv2WdlFychn08Uy1FNrQtSc2IXYwbMkEE4WHWItClPoNKRTKfuYISv18ULOVXRGaI367rsEsx-f8ppe48t7f27LERno2AystjjeeiCKbz4N-6PWkAOKQDo5xZ8TjDAE8zoRbS1fXEB0X0vjGEm9wGxc3xVfOvBN_-IzAEzQ&__tn__=-R';
	$codesrc='';
    $code=''; 
    $em = new Mat_Expand($link);
	// Get the link size
    $site = $em->get_site();
	
	if($site){
	   echo '1';
	}else{
	   echo '2';
	}
    /*if($site != ""){
		// If code is iframe then show the link in iframe
       $code = $em->get_iframe();
       if($code == ""){
		   // If code is embed then show the link in embed
          $code = $em->get_embed();
          if($code == "") {
			  // If code is thumb then show the link medium
             $codesrc=$em->get_thumb("medium");
           }
       }
        if($codesrc) {
			// Get the codesrc medium thumb (image)
           echo '<div class="img_container"><img src='.$codesrc.' class="imgpreview" /></div>';
        } else if($code)
                   echo $code;
       } */
?>
</body>
</html>