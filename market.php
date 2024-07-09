<?php   
$page = 'market'; 
//include_once 'functions/control.php';
include_once 'functions/inc.php'; 
if(isset($_GET['marketid'])) { 
  $getID= mysqli_real_escape_string($db,$_GET['marketid']); 
  include_once 'functions/get_market_info.php';
  if(empty($getID)){	   
      header("Location:".$base_url."sources/not-found.php");
	  exit();
   } 
   if(empty($marketOwner_id)){
      header("Location:".$base_url."sources/not-found.php");
	  exit();
   } 
} 
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include_once("contents/header.php"); 
$url = pathinfo($actual_link, PATHINFO_DIRNAME); 
$url_var = explode('/' , $url); 
$last_folder = end($url_var); 
$mmain = ''; 
$mpsold =''; 
$mabout = ''; 
if($last_folder == 'mymarket'){ 
	$mmain = 'actives'; 
}else  if($last_folder == 'sold'){ 
	$mpsold = 'actives'; 
}else if($last_folder == 'about'){ 
	$mabout = 'actives'; 
}
include_once "market/$marketTheme/$marketTheme.php";
include("contents/javascripts_vars.php"); 
if(isset($_GET['marketid'])){ 
   $pUrl = mysqli_real_escape_string($db, $_GET['marketid']);?>  
<script type="text/javascript">
$(document).ready(function(){
function GetProduct(){ 
var pUrl = '<?php echo $pUrl;?>';
var type = 'productDetails';
var data = 'f='+type+'&prdct='+pUrl;
$.ajax({
	type: "POST",
	url: requestUrl + "requests/out",
	data: data, 
	beforeSend: function(){ 
	    $('body').addClass('disableScroll'); 
	},
	success: function(html) { 
		  if(html){
			  $("body").append(html);  
		     setTimeout(function() {
				 $('.product_popUp_container').removeClass('prdct_in');
			  }, 900);  
		  }else{
			  $('body').removeClass('disableScroll'); 
		  }
	}
}); 
}
GetProduct();  
});
</script>
<?php }?>
<!--Full With Footer STARTED-->
            <div class="market_out_footer">
               <div class="market_footer_helper market_footer_in">
                    <?php include("market/$marketTheme/contents/footer_menu.php");?>
               </div>
           </div>
        <!--Full With Footer FINISHED-->
</body>
</html>