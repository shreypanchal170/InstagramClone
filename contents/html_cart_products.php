<?php 
$cartProducts = $Dot->Dot_MyCartProduccts($uid);
if($cartProducts){
   foreach($cartProducts as $cp){
        include("html_cart_product_list.php");
   }
}
?> 