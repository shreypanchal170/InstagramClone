<?php 
include("../functions/config.php");
if(isset($_POST['getPurchase']) && isset($_POST['getPurchase']) !== ''){
	$purchaseCode = mysqli_real_escape_string($db, $_POST['getPurchase']);
    $ActivateScript = mysqli_query($db,"UPDATE dot_configuration SET pr_cod ='$purchaseCode', activated = '1' WHERE configuration_id = '1'") or die(mysqli_error($db));
	if($ActivateScript == '1'){
	   echo 'activated';
	}
}
?>