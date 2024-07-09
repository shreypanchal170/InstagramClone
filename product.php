<?php 
session_start(); 
include_once("functions/config.php");  
$page = 'product';
if(isset($_COOKIE[$cookie_name])){   
   include_once("functions/inc.php");
}else{ 
	include_once("functions/inc.php");
}
if(isset($_GET['productid'])) {
		 $productSlug = mysqli_real_escape_string($db, $_GET['productid']);
		 $productData = $Dot->Dot_GetProductDetails($productSlug);
		 $postMetaTitle = $productData['m_product_name'];
		 $postMetaDescription = $productData['m_product_description']; 
}
include("contents/header.php");
?> 
</body>
</html>