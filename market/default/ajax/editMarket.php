<?php 
include_once '../../../functions/inc.php';  
include_once "../../../functions/clear.php"; 
include_once  "../functions/marketFunctions.php";
include_once "../../../api/send_push_notification.php"; 
$DotMarket = new DOT_MARKET($db);   
if(isset($_POST['f'])){
    $type = mysqli_real_escape_string($db, $_POST['f']);
	if($type == 'saveProductEdit'){   	
		if(isset($_POST['p_title']) && isset($_POST['p_price']) && isset($_POST['p_currency']) && isset($_POST['p_descripiton']) && isset($_POST['p_mstatus']) && isset($_POST['p_category']) && isset($_POST['p_discount']) && isset($_POST['p_place']) && isset($_POST['p_id'])){
			 
		     $editproductTitle = mysqli_real_escape_string($db, $_POST['p_title']);
			 $editproductID = mysqli_real_escape_string($db, $_POST['p_id']);
			 $editproductPrice  = mysqli_real_escape_string($db, $_POST['p_price']);
			 $editproductCurrency  = mysqli_real_escape_string($db, $_POST['p_currency']);
			 $editproductDescription  = mysqli_real_escape_string($db, $_POST['p_descripiton']);
			 $editProductMessageStatus  = mysqli_real_escape_string($db, $_POST['p_mstatus']);
			 $editProductCategory  = mysqli_real_escape_string($db, $_POST['p_category']);
			 $editProductDiscount  = mysqli_real_escape_string($db, $_POST['p_discount']);
			 $editProductPlace  = mysqli_real_escape_string($db, $_POST['p_place']);
			 $productDescriptionHtml = htmlcode($editproductDescription);
				if(!empty($editproductTitle)){
				    $slug = 'p_'.time().'_'.url_slug($editproductTitle);
				}elseif(!empty($productDescription)){
				    $slug = 'p_'.time().'_'.url_slug($editproductDescription);
				}elseif (empty($editproductTitle) && empty($editproductDescription)){
				    $slug = 'p_'.time();
				}
				if(!is_numeric($editproductPrice)){
				    echo '300';
					exit();
				}
				if(empty($editproductTitle) || empty($editproductDescription) || empty($editProductCategory) || empty($editproductPrice) || empty($editProductMessageStatus) || empty($editProductPlace) || empty($editproductCurrency)){ 
					  echo '300'; 
				      exit(); 
				}
			 $saveProductEdit = $DotMarket->Market_EditProduct($uid, $editproductTitle, $editproductPrice,$editproductCurrency, $editproductDescription, $editProductMessageStatus, $editProductCategory, $editProductPlace, $editProductDiscount, $slug,$editproductID);
			  if($saveProductEdit){
			      echo $saveProductEdit;
			  }
		}
	}
	if($type == 'editMarketInfo'){ 
		      $marketPlace_name = mysqli_real_escape_string($db, !empty($_POST['place_name']) ? $_POST['place_name'] : NULL);
			  $marketPlace_Url = mysqli_real_escape_string($db, !empty($_POST['place_url_name']) ? $_POST['place_url_name'] : NULL);
			  $marketPlace_about = mysqli_real_escape_string($db, !empty($_POST['place_about']) ? $_POST['place_about'] : NULL);
			  $marketPlace_phone = mysqli_real_escape_string($db, !empty($_POST['place_phone']) ? $_POST['place_phone'] : NULL);
			  $marketPlace_mail  = mysqli_real_escape_string($db, !empty($_POST['place_mail']) ? $_POST['place_mail'] : NULL);
			  $marketPlace_Address  = mysqli_real_escape_string($db, !empty($_POST['place_address']) ? $_POST['place_address'] : NULL);
			  $saveNews = $DotMarket->Market_EditMarketPlaceInformations($uid, $marketPlace_name, $marketPlace_Url, $marketPlace_about, $marketPlace_phone, $marketPlace_mail, $marketPlace_Address);
			  if($saveNews){
				     echo 'SAved';
			  }
		 
	}
}
?>