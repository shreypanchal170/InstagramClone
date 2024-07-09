<?php 
include_once("../functions/inc_out.php"); 
$Activitytype = array("productDetails");
if(isset($_POST['f']) && in_array($_POST['f'], $Activitytype)){
	$activity = mysqli_real_escape_string($db, $_POST['f']);
	// Product Details 
	if($activity == 'productDetails'){ 
		  if(isset($_POST['prdct'])){
			  $productName = mysqli_real_escape_string($db, $_POST['prdct']); 
			  $PostFromDatas = $Dot_Out->Dot_GetProductDetailsOut($productName);
			  if($PostFromDatas){ 
			     include("product.php");
			  } 
		  }
	}
}
?>