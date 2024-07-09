<?php include("chart.php");?>
<div class="page_title bold"><?php echo $page_Lang['manage_pro_earnings'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper"> 
   <div class="global_box_container_w"> 
       <!--S-->
           <div class="total_statistics">
                  <!---->
                  <div class="total_earnings_sum_item_news"> 
                      <div class="total_statistic_box border-radius hvr-shutter-out-vertical">
                            <div class="pro_earning_money_currency"><div class="paypemtnGatewayIcons iconStripe"></div></div>
                            <div class="pro_earning_money"><?php echo $Dot->Dot_TotalProSystemGatewayEarnings('stripe');?>$</div>
                      </div>
                  </div>
                  <!---->
                  <!---->
                  <div class="total_earnings_sum_item_news"> 
                      <div class="total_statistic_box border-radius hvr-shutter-out-vertical">
                            <div class="pro_earning_money_currency"><div class="paypemtnGatewayIcons iconRazorPay"></div></div>
                            <div class="pro_earning_money"><?php echo $Dot->Dot_TotalProSystemGatewayEarnings('razorpay');?>₦</div>
                      </div>
                  </div>
                  <!---->
                  <!---->
                  <div class="total_earnings_sum_item_news"> 
                      <div class="total_statistic_box border-radius hvr-shutter-out-vertical">
                            <div class="pro_earning_money_currency"><div class="paypemtnGatewayIcons iconPayPal"></div></div>
                            <div class="pro_earning_money"><?php echo $Dot->Dot_TotalProSystemGatewayEarnings('paypal');?>$</div>
                      </div>
                  </div>
                  <!---->
                  <!---->
                  <div class="total_earnings_sum_item_news"> 
                      <div class="total_statistic_box border-radius hvr-shutter-out-vertical">
                            <div class="pro_earning_money_currency"><div class="paypemtnGatewayIcons iconiyziCo"></div></div>
                            <div class="pro_earning_money"><?php echo $Dot->Dot_TotalProSystemGatewayEarnings('iyzico');?>₺</div>
                      </div>
                  </div>
                  <!---->
                  <!---->
                  <div class="total_earnings_sum_item_news"> 
                      <div class="total_statistic_box border-radius hvr-shutter-out-vertical">
                            <div class="pro_earning_money_currency"><div class="paypemtnGatewayIcons iconbitPay"></div></div>
                            <div class="pro_earning_money"><?php echo $Dot->Dot_TotalProSystemGatewayEarnings('bitpay');?>$</div>
                      </div>
                  </div>
                  <!---->
                  <!---->
                  <div class="total_earnings_sum_item_news"> 
                      <div class="total_statistic_box border-radius hvr-shutter-out-vertical">
                            <div class="pro_earning_money_currency"><div class="paypemtnGatewayIcons iconautohorizenet"></div></div>
                            <div class="pro_earning_money"><?php echo $Dot->Dot_TotalProSystemGatewayEarnings('authorize-net');?>$</div>
                      </div>
                  </div>
                  <!---->
                  <!---->
                  <div class="total_earnings_sum_item_news"> 
                      <div class="total_statistic_box border-radius hvr-shutter-out-vertical">
                            <div class="pro_earning_money_currency"><div class="paypemtnGatewayIcons iconpaystack"></div></div>
                            <div class="pro_earning_money"><?php echo $Dot->Dot_TotalProSystemGatewayEarnings('paystack');?>₹</div>
                      </div>
                  </div>
                  <!---->
           </div>
       <!--F-->
   </div>
   <!--S-->
     <div class="global_box_container">
      <div class="earnings_graphic_chart">
            <div class="chartBox-in">
              <div class="chartBox-header">
                <div class="chartBox-Title">
                  <div class="cb-title"><?php echo $page_Lang['monthly_pro_earnings_graph'][$dataUserPageLanguage];?></div>
                </div>
              </div>
              <div class="graphBox">
                <canvas id="myLineChart" class="chart"></canvas>
              </div>
              <div class="sumTextReg"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M18.92,76.82667l-3.44,-4.58667l35.54667,-29.81333l34.4,17.2l28.09333,-34.4l41.85333,12.04l-1.14667,5.73333l-38.41333,-10.89333l-29.24,34.4l-34.4,-17.2z" fill="#5e9c76"></path><path d="M17.2,65.93333c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#bae0bd"></path><path d="M17.2,68.8c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M17.2,63.06667c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#5e9c76"></path><path d="M154.8,31.53333c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#bae0bd"></path><path d="M154.8,34.4c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M154.8,28.66667c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#5e9c76"></path><path d="M86,54.46667c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#bae0bd"></path><path d="M86,57.33333c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M86,51.6c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#5e9c76"></path><path d="M114.66667,20.06667c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#bae0bd"></path><path d="M114.66667,22.93333c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M114.66667,17.2c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#5e9c76"></path><path d="M51.6,37.26667c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#bae0bd"></path><path d="M51.6,40.13333c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M51.6,34.4c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#5e9c76"></path><path d="M18.92,139.89333l-3.44,-4.58667l35.54667,-24.08l34.4,11.46667l28.09333,-28.09333l40.70667,-5.73333l1.14667,5.73333l-39.56,5.73333l-29.24,29.24l-34.4,-11.46667z" fill="#4e7ab5"></path><g><path d="M17.2,129c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#8bb7f0"></path><path d="M17.2,131.86667c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M17.2,126.13333c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#4e7ab5"></path></g><g><path d="M154.8,83.13333c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#8bb7f0"></path><path d="M154.8,86c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M154.8,80.26667c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#4e7ab5"></path></g><g><path d="M86,117.53333c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#8bb7f0"></path><path d="M86,120.4c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M86,114.66667c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#4e7ab5"></path></g><g><path d="M114.66667,88.86667c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#8bb7f0"></path><path d="M114.66667,91.73333c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M114.66667,86c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#4e7ab5"></path></g><g><path d="M51.6,106.06667c-4.74965,0 -8.6,3.85035 -8.6,8.6c0,4.74965 3.85035,8.6 8.6,8.6c4.74965,0 8.6,-3.85035 8.6,-8.6c0,-4.74965 -3.85035,-8.6 -8.6,-8.6z" fill="#8bb7f0"></path><path d="M51.6,108.93333c3.44,0 5.73333,2.29333 5.73333,5.73333c0,3.44 -2.29333,5.73333 -5.73333,5.73333c-3.44,0 -5.73333,-2.29333 -5.73333,-5.73333c0,-3.44 2.29333,-5.73333 5.73333,-5.73333M51.6,103.2c-6.30667,0 -11.46667,5.16 -11.46667,11.46667c0,6.30667 5.16,11.46667 11.46667,11.46667c6.30667,0 11.46667,-5.16 11.46667,-11.46667c0,-6.30667 -5.16,-11.46667 -11.46667,-11.46667z" fill="#4e7ab5"></path></g></g></g></svg><?php echo $page_Lang['monthly_pro_earnings_graph'][$dataUserPageLanguage];?></div>
            </div>
          </div>
     </div> 
   <!--F-->
</div> 

<script type="text/javascript">  
// Data
var data = {
	
  labels: <?php echo json_encode($months);?>,
  datasets: [{
    label: "<?php echo $page_Lang['admin_stripe_earnings'][$dataUserPageLanguage];?> ($)",
    fillColor: "rgb(104, 117, 226, 0.1)",
    strokeColor: "rgb(104, 117, 226)",
    pointColor: "rgb(104, 117, 226)",
    pointStrokeColor: "rgba(104, 117, 226)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(104, 117, 226)",fill: false,
    data: <?php echo json_encode(array_values($YearMonthTotalStripeEarning));?>,
  },{
    label: "<?php echo $page_Lang['admin_razorpay_earnings'][$dataUserPageLanguage];?> (₦)",
    fillColor: "rgb(9, 39, 83, 0.1)",
    strokeColor: "rgb(9, 39, 83)",
    pointColor: "rgb(9, 39, 83)",
    pointStrokeColor: "rgba(9, 39, 83)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(9, 39, 83)",fill: false,
    data: <?php echo json_encode(array_values($YearMonthTotalRazorPayEarning));?>,
  },{
    label: "<?php echo $page_Lang['admin_paypal_earnings'][$dataUserPageLanguage];?> ($)",
    fillColor: "rgb(25, 157, 219, 0.1)",
    strokeColor: "rgb(25, 157, 219)",
    pointColor: "rgb(25, 157, 219)",
    pointStrokeColor: "rgba(25, 157, 219)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(25, 157, 219)",fill: false,
    data: <?php echo json_encode(array_values($YearMonthTotalPayPalEarning));?>,
  },{
    label: "<?php echo $page_Lang['admin_iyzico_earnings'][$dataUserPageLanguage];?> (₺)",
    fillColor: "rgb(84, 189, 208, 0.1)",
    strokeColor: "rgb(84, 189, 208)",
    pointColor: "rgb(84, 189, 208)",
    pointStrokeColor: "rgba(84, 189, 208)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(84, 189, 208)",fill: false,
    data: <?php echo json_encode(array_values($YearMonthTotalIyziCoEarning));?>,
  },{
    label: "<?php echo $page_Lang['admin_bitpay_earnings'][$dataUserPageLanguage];?> ($)",
    fillColor: "rgb(45, 196, 40, 0.1)",
    strokeColor: "rgb(45, 196, 40)",
    pointColor: "rgb(45, 196, 40)",
    pointStrokeColor: "rgba(45, 196, 40)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(45, 196, 40)",fill: false,
    data: <?php echo json_encode(array_values($YearMonthTotalBitPayEarning));?>,
  },{
    label: "<?php echo $page_Lang['admin_paystack_earnings'][$dataUserPageLanguage];?> (₹)",
    fillColor: "rgb(137, 66, 223, 0.1)",
    strokeColor: "rgb(137, 66, 223)",
    pointColor: "rgb(137, 66, 223)",
    pointStrokeColor: "rgba(137, 66, 223)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(137, 66, 223)",fill: false,
    data: <?php echo json_encode(array_values($YearMonthTotalPayStackEarning));?>,
  },{
    label: "<?php echo $page_Lang['admin_authorizenet_earnings'][$dataUserPageLanguage];?> ($)",
    fillColor: "rgb(37, 49, 36, 0.1)",
    strokeColor: "rgb(37, 49, 36)",
    pointColor: "rgb(37, 49, 36)",
    pointStrokeColor: "rgba(37, 49, 36)",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(37, 49, 36)",fill: false,
    data: <?php echo json_encode(array_values($YearMonthTotalAutHorizeNetEarning));?>,
  }]
};
var options = {
  bezierCurve: true,
  animation: true,
  animationEasing: "easeOutQuart",
  showScale: true,
  tooltipEvents: ["mousemove", "touchstart", "touchmove"],
  tooltipTitleFontSize: 16,
  tooltipCornerRadius: 3,
  tooltipFillColor: "rgba(0, 0, 0, .5)",
  tooltipYPadding: 16, 
  tooltipXPadding: 16,
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
  multiTooltipTemplate: "<%= datasetLabel %> : <%= value %>", 
  tooltipCaretSize: 2,
  scaleLabel: function(label){return  label.value+ ''},
  
};

var ctx1 = document.getElementById("myLineChart").getContext("2d"); 
var myLineChart = new Chart(ctx1).Line(data, options); 
</script>
