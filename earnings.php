<?php  
include_once 'functions/inc.php';  
if(empty($uid)){
   header("Location: $base_url");   
}
$page ='earnings';  
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
$earning = '';
$payout ='';
$withdrawal = ''; 
if(isset($_GET['u'])){ 
    $getp = isset($_GET['u']) ? $_GET['u'] : '';	
if($getp == 'payouts'){
   $payout = 'earning_menu_active';
}else if($getp == 'withdrawals'){ 
   $withdrawal = 'earning_menu_active';
}else if($getp == 'points'){
   $points = 'earning_menu_active';
}else if($getp == 'market_earnings'){
   $marketearning = 'earning_menu_active';
}
}else{
$earning = 'earning_menu_active';
}
?>
<div class="section">
    <div class="main"> 
        <div class="container_earn">
               <?php include("contents/income_expense_menu.php");?>
              <!---->
              <div class="earning_graph_box">
                    <?php  
							switch($getp) { 
								case 'earnings': 
									include('contents/html_earnings.php');
								break;
								case 'market_earnings': 
									include('contents/html_market_earnings.php');
								break;
								case 'withdrawals': 
									include('contents/html_withdrawal.php');
								break;
								case 'payouts': 
									include('contents/html_payouts.php');
								break;
								case 'points': 
									include('contents/html_points.php');
								break;
								default:
				                include('contents/html_earnings.php');
							}   
                    ?>
                    
              </div>
              <!---->
        </div>
    </div>
</div> 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");
?>
</body>
</html>