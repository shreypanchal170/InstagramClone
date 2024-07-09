<?php 
$cartProducts = $Dot->Dot_MyOrderedProducts($uid);
if($cartProducts){
   foreach($cartProducts as $cp){
        include("html_ordered_product_list.php");
   }
}else{
?> 
<div class="no_prod_fnd">
   <div class="no_prod_fn"><?php echo $Dot->Dot_SelectedMenuIcon('no_product_found');?> </div>
   <div class="t_no_prod_fnd">No product Found</div>
</div>
<?php }?>