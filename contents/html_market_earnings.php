<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$list=array();
$month = date('m');
$year = date('y'); 
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
        $list[]=date('d', $time);
} 

$days = array(); 
$weekday = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 
$dayday = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 

//$resulta = mysqli_query($db,"SELECT DAY(FROM_UNIXTIME(payment_time)) - 1 , count(*) ,  SUM(user_earning) AS price FROM dot_payments WHERE MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_status = '1' AND payment_user_id = '$uid' GROUP BY DAY(FROM_UNIXTIME(payment_time)) ORDER BY DAY(FROM_UNIXTIME(payment_time))") or die(mysqli_error($db));  
$resulta = mysqli_query($db,"SELECT DAY(FROM_UNIXTIME(payment_time)) - 1 , SUM(user_earning) AS daily_total, COUNT(*) AS ssm FROM `dot_payments` WHERE MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_status = '1' AND payment_user_id = '$uid' AND payment_type = 'pb' GROUP BY DAY(FROM_UNIXTIME(payment_time)) ORDER BY DAY(FROM_UNIXTIME(payment_time))") or die(mysqli_error($db)); 

while ($row = mysqli_fetch_array($resulta, MYSQLI_NUM)) {   
	$dayday[$row[0]] = $row[2];  
}  
?>

<div class="earning_monthly_graph">
  <div class="earnings_graphic_chart">
    <div class="chartBox-in">
      <div class="chartBox-header">
        <div class="chartBox-Title">
          <div class="cb-title"><?php echo $page_Lang['your_daily_sels_for_this_month'][$dataUserPageLanguage];?></div>
        </div>
      </div>
      <div class="graphBox">
        <canvas id="myLineChart" class="chart"></canvas>
      </div>
      <div class="sumTextReg"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#1E88E5"><g id="surface1"><path d="M142.64746,11.00196l-31.24219,31.24219l-32.37597,-10.83399l-32.16602,34.85352l-32.16601,-12.26172l-3.82129,10.03612l39.01074,14.82325l32.33399,-35.02149l32.12402,10.66602l35.94531,-35.94531zM75.25,86v64.5h10.75v-64.5zM139.75,86v64.5h10.75v-64.5zM53.75,96.75v53.75h10.75v-53.75zM96.75,96.75v53.75h10.75v-53.75zM10.75,107.5v43h10.75v-43zM32.25,107.5v43h10.75v-43zM118.25,107.5v43h10.75v-43z"></path></g></g></g></svg><?php echo $page_Lang['your_daily_sels_for_this_month'][$dataUserPageLanguage];?></div>
    </div>
  </div> 
  <div class="earning_monthly_table">
      <!---->
      <table class="table-general -striped -highlight-row -has-footer">
          <thead>
            <tr>
              <th>Date</th>
              <th>Post</th>
              <th>Earnings</th>
            </tr>
          </thead>

          <tbody>
             
             <?php 
					 $tdolarEarning ='';$ttlEarning ='';$tngnEarning ='';$tinrEarning ='';
					 if($earningDolarThisMonth){
						  $tdolarEarning = '<span class="dl_e">'.$earningDolarThisMonth.'$</span>';
					 }
					 if($earningTLThisMonth){
						  $ttlEarning = '<span class="tl_e">'.$earningTLThisMonth.'₺</span>';
					 }
					 if($earningNGNThisMonth){
						$tngnEarning = '<span class="ng_e">'.$earningNGNThisMonth.'₦</span>';
					 }
					 if($earningINRThisMonth){
						$tinrEarning = '<span class="in_e">'.$earningINRThisMonth.'₹</span>';
					 }
					 $query="SELECT payment_time,payment_post_id,payment_type,customer_user_id,product_owner_id, month(FROM_UNIXTIME(payment_time)) as month ,year(FROM_UNIXTIME(payment_time)) as year, COUNT(*) AS ssm FROM `dot_payments` WHERE payment_status = '1' AND payment_type = 'pb' AND product_owner_id = '$uid' AND FROM_UNIXTIME(payment_time) > DATE_SUB(NOW(), INTERVAL 1 MONTH) GROUP BY payment_id ORDER BY payment_time DESC";
					 //$query="SELECT payment_time,payment_post_id,payment_type , month(FROM_UNIXTIME(payment_time)) as month ,year(FROM_UNIXTIME(payment_time)) as year, COUNT(*) AS ssm FROM `dot_payments` WHERE payment_status = '1' AND payment_user_id = '$uid' AND FROM_UNIXTIME(payment_time) > DATE_SUB(NOW(), INTERVAL 1 MONTH) GROUP BY DAY(FROM_UNIXTIME(payment_time)) ORDER BY payment_time";
								$qt=mysqli_query($db, $query);
								$month_total=0;
								$last_month_year='';
								while($nt=mysqli_fetch_array($qt,MYSQLI_ASSOC)) {
									 $earningPostID = $nt['payment_post_id']; 
									 $theTime = $nt['payment_time'];
									 $TotalDolarEarnings = $Dot->Dot_MarketSumOfEarningsByCurrencyDolar($theTime);
									 $TotalTurkishLiraEarnings = $Dot->Dot_MarketSumOfEarningsByCurrencyTL($theTime);
									 $TotalNigerianEarnings = $Dot->Dot_MarketSumOfEarningsByCurrencyNGN($theTime);
									 $TotalINREarnings = $Dot->Dot_MarketSumOfEarningsByCurrencyINR($theTime);
									 $dolarEarning = '';$tlearning = '';$ngnearning = '';$inrearning = '';
									  if($TotalDolarEarnings){
									      $dolarEarning = '<span class="dl_e">'.$TotalDolarEarnings.'$</span>';
									  }
									  if($TotalTurkishLiraEarnings){
									      $tlearning = '<span class="tl_e">'.$TotalTurkishLiraEarnings.'₺</span>';
									  }
									  if($TotalNigerianEarnings){
									      $ngnearning = '<span class="ng_e">'.$TotalNigerianEarnings.'₦</span>';
									  }
									  if($TotalINREarnings){
									      $inrearning = '<span class="in_e">'.$TotalINREarnings.'₹</span>';
									  }
									echo '
									 <tr>
										<td>'.gmdate("Y", $nt['payment_time'])."-".gmdate("m", $nt['payment_time'])."-".gmdate("d", $nt['payment_time']).'</td>
										<td><a class="showThisPost_" data-type="showPostSingle" data-id="'.$nt['payment_post_id'].'" data-ui="'.$nt['product_owner_id'].'">'.$page_Lang['view_this_post'][$dataUserPageLanguage].'</a></td>
										<td>'.$dolarEarning.$tlearning.$ngnearning.$inrearning.'</td>
									 </tr>
									';
								}
					 ?>  
          </tbody>

          <tfoot>
            <tr>
              <td>Total</td>
              <td><?php echo $Dot->Dot_MarketTotalSalesThisMonth($uid);?></td>
              <td><?php echo $tdolarEarning.$ttlEarning.$tngnEarning.$tinrEarning;?></td>
            </tr>
          </tfoot>
    </table>
      <!---->
  </div>
  <!--F-->
</div>  
<script type="text/javascript" src="<?php echo $base_url;?>js/chart/Chart.min.js"></script>   
<script type="text/javascript"> 
// Data
var data = {
  labels: <?=json_encode($list);?>,
  datasets: [{
    label: "My Second dataset",
    fillColor: "rgb(30, 136, 229, 0.1)",
    strokeColor: "rgb(144, 202, 249)",
    pointColor: "rgb(30, 136, 229)",
    pointStrokeColor: "rgba(30, 136, 229)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(30, 136, 229)",
    data: <?=json_encode(array_values($dayday));?>,
  }]
};
var options = {
  bezierCurve: true,
  animation: true,
  animationEasing: "easeOutQuart",
  showScale: true,
  tooltipEvents: ["mousemove", "touchstart", "touchmove"],
  tooltipCornerRadius: 3,
  tooltipFillColor: "rgba(0, 0, 0, 1)",
  pointDot : true,
  pointDotRadius : 4,
  datasetFill : true,
  scaleShowLine : true,
  animationEasing : "easeInQuad",
  animateRotate : true,
  animateScale : true,
  responsive: true,
  scaleFontColor: "rgb(105, 112, 120)",
  scaleFontSize: 13,
  fontFamily: "'Helvetica Neue', helvetica, arial, sans-serif",
  tooltipTemplate: "<%= value %> <?php echo $page_Lang['sales'][$dataUserPageLanguage];?>",  
  tooltipCaretSize: 2,
  scaleLabel: function(label){return  's' + label.value}
  
};
var ctx1 = document.getElementById("myLineChart").getContext("2d"); 
var myLineChart = new Chart(ctx1).Line(data, options); 
</script>