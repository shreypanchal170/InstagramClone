<div class="page_title bold"><?php echo $page_Lang['manage_withdrawals'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '15';
$countSql = "SELECT COUNT(withdraw_id) FROM dot_withdrawals";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; }; 
if($total_pages < $pagep){
   header("Location: $base_url/dashboard/manage_withdrawals");
   exit();
} 
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_withdrawals WHERE withdraw_id ORDER BY withdraw_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>  
        <th>Amout</th>
        <th>Time</th>
        <th  style="text-align:center !important;">Payment Type</th>
        <th  style="text-align:center !important;">Payment Status</th>
        <th  style="text-align:center !important;">Action</th> 
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {

      $dataWithdrawalID = $row['withdraw_id'];
	  $dataWithdrawalCreatorUserID = $row['withdraw_uid_fk'];
	  $dataWithdrawalPayPalEmail = $row['withdraw_paypal_email'];
	  $dataWithdrawalUserAvatar = $Dot->Dot_UserAvatar($dataWithdrawalCreatorUserID, $base_url);
	  $dataWithdrawalAmount = $row['withdraw_amounth'];
	  $dataWithdrawStatus = $row['withdraw_status'];
	  $datawithdrawalIbanNumber = $row['withdrawal_iban_number'];
	  $time = $row['withdraw_time']; 
      $message_time=date("c", $time);
	  $theDrawStatus = '';
	  if($dataWithdrawStatus == '1'){
	     $theDrawStatus = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#2ecc71"><path d="M86,14.33333c-39.49552,0 -71.66667,32.17115 -71.66667,71.66667c0,39.49552 32.17115,71.66667 71.66667,71.66667c39.49552,0 71.66667,-32.17115 71.66667,-71.66667c0,-39.49552 -32.17115,-71.66667 -71.66667,-71.66667zM86,28.66667c31.74921,0 57.33333,25.58412 57.33333,57.33333c0,31.74921 -25.58412,57.33333 -57.33333,57.33333c-31.74921,0 -57.33333,-25.58412 -57.33333,-57.33333c0,-31.74921 25.58412,-57.33333 57.33333,-57.33333zM84.58626,43.014c-1.93016,0.06167 -3.88601,0.24871 -5.86491,0.57389c-18.23917,3.00283 -32.83576,18.07523 -35.31543,36.39323c-3.9775,29.35467 21.70145,53.99154 51.32845,48.16504c15.609,-3.0745 28.44876,-15.16366 32.66992,-30.50032c2.6875,-9.761 1.81709,-19.07643 -1.35775,-27.22493l-34.9795,34.97949c-2.795,2.78783 -7.33911,2.795 -10.13411,0l-16.43294,-16.43294c-2.795,-2.795 -2.795,-7.33911 0,-10.13411c2.795,-2.795 7.33911,-2.795 10.13411,0l11.36589,11.36589l32.40397,-32.40398c-8.1709,-9.3749 -20.30661,-15.21296 -33.81771,-14.78125z"></path></g></g></svg> Paid';
	  } else if($dataWithdrawStatus == '2'){
	     $theDrawStatus = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M44.69313,10.32c-1.84975,0.06887 -3.31344,1.58897 -3.31235,3.44v75.68h-6.98078c-7.58864,0 -13.65922,6.17136 -13.65922,13.76v55.04c0,1.90232 1.4369,3.44 3.33922,3.44h13.76v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88h6.88v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88h6.88v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88h13.76c1.90232,0 3.44,-1.53768 3.44,-3.44v-55.04c0,-7.58864 -6.17136,-13.76 -13.76,-13.76h-6.77922v-75.68c-0.00004,-1.19226 -0.61737,-2.29951 -1.63154,-2.92636c-1.01418,-0.62685 -2.2806,-0.68392 -3.34705,-0.15083l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.96856,-0.48429 -2.10862,-0.48429 -3.07719,0l-5.3414,2.67406l-5.34141,-2.67406c-0.51617,-0.25885 -1.08918,-0.38363 -1.66625,-0.36281zM58.58078,17.60312l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l5.34141,-2.67406l5.3414,2.67406c0.96856,0.48429 2.10862,0.48429 3.07719,0l1.90141,-0.95406v97.63687h-75.68v-97.63687l1.9014,0.95406c0.96856,0.48429 2.10862,0.48429 3.07719,0zM103.3411,47.98531c-0.90737,0.02145 -1.76951,0.4006 -2.3986,1.05484l-14.76781,14.76781l-14.76781,-14.76781c-0.64765,-0.66575 -1.53697,-1.04135 -2.46578,-1.0414c-1.39982,0.00037 -2.65984,0.84884 -3.18658,2.14577c-0.52674,1.29693 -0.21516,2.7837 0.78799,3.76001l14.76781,14.76781l-14.76781,14.76781c-0.89864,0.86281 -1.26063,2.14403 -0.94636,3.34954c0.31427,1.20551 1.25569,2.14693 2.4612,2.4612c1.2055,0.31427 2.48672,-0.04772 3.34954,-0.94636l14.76781,-14.76781l14.76781,14.76781c0.86282,0.89864 2.14403,1.26063 3.34954,0.94636c1.2055,-0.31427 2.14693,-1.25569 2.4612,-2.4612c0.31427,-1.20551 -0.04772,-2.48672 -0.94636,-3.34954l-14.76781,-14.76781l14.76781,-14.76781c1.02251,-0.98325 1.33669,-2.4933 0.79119,-3.80278c-0.54549,-1.30949 -1.8388,-2.1499 -3.25697,-2.11643zM41.28,103.2h0.10078v13.76h-0.10078c-3.8012,0 -6.88,-3.0788 -6.88,-6.88c0,-3.8012 3.0788,-6.88 6.88,-6.88zM130.82078,103.21344c3.75323,0.05552 6.77922,3.10007 6.77922,6.86656c0,3.76649 -3.02599,6.81105 -6.77922,6.86656zM41.28,130.72h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88c0,1.89888 -1.54112,3.44 -3.44,3.44h-20.64c-1.89888,0 -3.44,-1.54112 -3.44,-3.44v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44zM75.68,130.72h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88c0,1.89888 -1.54112,3.44 -3.44,3.44h-20.64c-1.89888,0 -3.44,-1.54112 -3.44,-3.44v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44zM110.08,130.72h20.64c1.89888,0 3.44,1.54112 3.44,3.44v6.88c0,1.89888 -1.54112,3.44 -3.44,3.44h-20.64c-1.89888,0 -3.44,-1.54112 -3.44,-3.44v-6.88c0,-1.89888 1.54112,-3.44 3.44,-3.44z"></path></g></g></svg>Declined';
	  }else if($dataWithdrawStatus == '0'){
	     $theDrawStatus = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M132.58333,17.91667h-93.16667l-17.91667,25.08333v100.33333c0,5.93758 4.81242,10.75 10.75,10.75h107.5c5.934,0 10.75,-4.81242 10.75,-10.75v-17.91667v-82.41667z" fill="#ffc107"></path><path d="M118.25,107.5c0,17.81275 -14.43725,32.25 -32.25,32.25c-17.81275,0 -32.25,-14.43725 -32.25,-32.25c0,-17.81275 14.43725,-32.25 32.25,-32.25c17.81275,0 32.25,14.43725 32.25,32.25" fill="#0097a7"></path><path d="M109.76108,107.5c0,13.12933 -10.63892,23.76467 -23.76108,23.76467c-13.12575,0 -23.76467,-10.63533 -23.76467,-23.76467c0,-13.12575 10.63892,-23.76108 23.76467,-23.76108c13.12217,0 23.76108,10.63533 23.76108,23.76108" fill="#eeeeee"></path><path d="M89.58333,105.93408v-16.35075h-7.16667v16.51558v2.97058l2.18583,2.01383l8.54983,7.59308l4.859,-5.27108z" fill="#000000"></path><path d="M43.10392,25.08333l-12.79608,17.91667h34.19217c0,11.87517 9.62842,21.5 21.5,21.5c11.87158,0 21.5,-9.62483 21.5,-21.5h34.19217l-12.79608,-17.91667z" fill="#db8509"></path></g></g></svg>Pending';
	  }
	  if($datawithdrawalIbanNumber){
		  $paymentAccount = $datawithdrawalIbanNumber;
	     $withdrawalPaymentType = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M117.41236,63.46972l34.91084,13.57768c4.64916,1.80772 6.9746,7.09156 5.16688,11.74072l-15.781,40.57824c-1.80772,4.64916 -7.09156,6.9746 -11.74072,5.16688l-57.8522,-22.49932l-16.254,-6.12492l49.88,-44.505l2.15,-1.935z" fill="#fefdef"></path><path d="M146.6644,91.30448l-40.49224,-16.71496l4.80224,14.47724l31.89224,12.97224z" fill="#a3a3cd"></path><path d="M101.87216,105.909h-72.24c-4.73,0 -8.6,-3.87 -8.6,-8.6v-43c0,-4.73 3.87,-8.6 8.6,-8.6h72.24c4.73,0 8.6,3.87 8.6,8.6v43c0,4.73 -3.87,8.6 -8.6,8.6z" fill="#a9dde3"></path><path d="M101.87216,107.629h-72.24c-5.69148,0 -10.32,-4.62852 -10.32,-10.32v-43c0,-5.69148 4.62852,-10.32 10.32,-10.32h72.24c5.69148,0 10.32,4.62852 10.32,10.32v43c0,5.68976 -4.62852,10.32 -10.32,10.32zM29.63216,47.429c-3.79432,0 -6.88,3.08568 -6.88,6.88v43c0,3.79432 3.08568,6.88 6.88,6.88h72.24c3.79432,0 6.88,-3.08568 6.88,-6.88v-43c0,-3.79432 -3.08568,-6.88 -6.88,-6.88z" fill="#1f212b"></path><path d="M133.24152,136.869c-1.2986,0 -2.61612,-0.23564 -3.89752,-0.73444l-57.8522,-22.49932c-0.8858,-0.344 -1.3244,-1.33988 -0.97868,-2.22568c0.34228,-0.8858 1.3416,-1.32784 2.22568,-0.97868l57.8522,22.49932c3.77712,1.46372 8.04788,-0.4128 9.51676,-4.1882l15.781,-40.57824c1.46888,-3.77712 -0.40936,-8.04616 -4.1882,-9.51504l-34.91084,-13.57768c-0.8858,-0.344 -1.3244,-1.33988 -0.97868,-2.22568c0.34228,-0.88752 1.34332,-1.32612 2.22568,-0.97868l34.91084,13.57768c5.54528,2.15516 8.30244,8.42112 6.14556,13.9664l-15.781,40.57824c-1.65808,4.26388 -5.74824,6.88 -10.0706,6.88z" fill="#1f212b"></path><path d="M141.90344,102.36924c-0.10664,0 -0.215,-0.02064 -0.32164,-0.06192l-25.94964,-10.43352c-0.44032,-0.17716 -0.65532,-0.6794 -0.47644,-1.118c0.17716,-0.44204 0.67768,-0.65532 1.118,-0.47644l25.94964,10.43352c0.44032,0.17716 0.65532,0.6794 0.47644,1.118c-0.13244,0.3354 -0.4558,0.53836 -0.79636,0.53836z" fill="#1f212b"></path><path d="M128.699,126.19984c-0.81012,0 -1.63228,-0.14792 -2.43208,-0.45924l-33.42304,-13.03072c-0.44204,-0.17372 -0.6622,-0.67252 -0.48848,-1.11284c0.17372,-0.44032 0.67252,-0.66564 1.11284,-0.48848l33.42304,13.03072c2.57828,1.00276 5.48336,-0.28036 6.48612,-2.85348l12.52848,-31.47944c0.47988,-1.23496 0.44892,-2.59548 -0.09288,-3.82528c-0.5418,-1.2298 -1.5222,-2.17236 -2.7606,-2.65396l-26.55336,-10.32516c-0.44204,-0.172 -0.6622,-0.6708 -0.48848,-1.11284c0.17372,-0.44204 0.6708,-0.6622 1.11284,-0.48848l26.55164,10.32516c3.4572,1.34332 5.1772,5.25116 3.83216,8.70836l-12.5302,31.47944c-1.032,2.65568 -3.58276,4.28624 -6.278,4.28624z" fill="#1f212b"></path><path d="M145.83364,91.63644c-0.10664,0 -0.215,-0.02064 -0.32164,-0.06192l-29.02672,-11.63752c-0.44032,-0.17716 -0.6536,-0.67768 -0.47644,-1.118c0.17716,-0.44032 0.67596,-0.6536 1.118,-0.47644l29.02672,11.63752c0.44032,0.17716 0.6536,0.67768 0.47644,1.118c-0.13244,0.3354 -0.4558,0.53836 -0.79636,0.53836z" fill="#1f212b"></path><path d="M137.3678,100.405c-0.46096,0 -0.84108,-0.36292 -0.86,-0.8256l-0.45408,-11.7906c-0.0172,-0.47472 0.3526,-0.87548 0.8256,-0.8944c0.01204,0 0.02408,0 0.0344,0c0.46096,0 0.84108,0.36292 0.86,0.8256l0.45408,11.7906c0.0172,0.47472 -0.3526,0.87548 -0.8256,0.8944c-0.01204,0 -0.02408,0 -0.0344,0zM131.15516,97.53948c-0.46096,0 -0.84108,-0.36292 -0.86,-0.8256l-0.45408,-11.7906c-0.0172,-0.47472 0.3526,-0.87548 0.8256,-0.8944c0.01204,0 0.02408,0 0.0344,0c0.46096,0 0.84108,0.36292 0.86,0.8256l0.45408,11.7906c0.0172,0.47472 -0.3526,0.87548 -0.8256,0.8944c-0.01376,0 -0.02408,0 -0.0344,0zM124.81524,95.05408c-0.46096,0 -0.84108,-0.36292 -0.86,-0.8256l-0.45408,-11.7906c-0.0172,-0.47472 0.3526,-0.87548 0.8256,-0.8944c0.01204,0 0.02408,0 0.0344,0c0.46096,0 0.84108,0.36292 0.86,0.8256l0.45408,11.7906c0.0172,0.47472 -0.3526,0.87548 -0.8256,0.8944c-0.01204,0 -0.02408,0 -0.0344,0z" fill="#1f212b"></path><path d="M76.07216,77.529c-3.32475,0 -6.02,3.08028 -6.02,6.88c0,3.79972 2.69525,6.88 6.02,6.88c3.32475,0 6.02,-3.08028 6.02,-6.88c0,-3.79972 -2.69525,-6.88 -6.02,-6.88z" fill="#f37e98"></path><path d="M76.07216,92.149c-3.79432,0 -6.88,-3.47268 -6.88,-7.74c0,-4.26732 3.08568,-7.74 6.88,-7.74c3.79432,0 6.88,3.47268 6.88,7.74c0,4.26732 -3.08568,7.74 -6.88,7.74zM76.07216,78.389c-2.84488,0 -5.16,2.7004 -5.16,6.02c0,3.3196 2.31512,6.02 5.16,6.02c2.84488,0 5.16,-2.7004 5.16,-6.02c0,-3.3196 -2.3134,-6.02 -5.16,-6.02z" fill="#1f212b"></path><path d="M84.6756,80.43924c1.161,-1.29172 2.82768,-2.10184 4.68012,-2.10184c3.50708,0 6.34852,2.90336 6.34852,6.4844c0,3.58104 -2.84316,6.4844 -6.34852,6.4844c-1.91608,0 -3.63436,-0.86688 -4.7988,-2.23944" fill="#f9e65c"></path><path d="M89.35572,92.16448c-2.09668,0 -4.08328,-0.92708 -5.45412,-2.54388c-0.30788,-0.3612 -0.26316,-0.90472 0.09976,-1.21088c0.3612,-0.30788 0.90472,-0.26316 1.21088,0.09976c1.04404,1.2298 2.5542,1.935 4.14348,1.935c3.0272,0 5.48852,-2.52324 5.48852,-5.6244c0,-3.10116 -2.46304,-5.6244 -5.48852,-5.6244c-1.5308,0 -3.00312,0.6622 -4.04028,1.81804c-0.31648,0.35604 -0.86,0.38356 -1.21432,0.06536c-0.3526,-0.3182 -0.38356,-0.86172 -0.06536,-1.21432c1.36224,-1.51876 3.30068,-2.38908 5.31996,-2.38908c3.97664,0 7.20852,3.2938 7.20852,7.3444c0,4.0506 -3.23188,7.3444 -7.20852,7.3444zM47.69216,54.309h-8.6c-0.47472,0 -0.86,-0.38528 -0.86,-0.86c0,-0.47472 0.38528,-0.86 0.86,-0.86h8.6c0.47472,0 0.86,0.38528 0.86,0.86c0,0.47472 -0.38356,0.86 -0.86,0.86z" fill="#1f212b"></path><path d="M96.8618,99.029h-62.221c-3.71004,0 -6.72864,-3.02032 -6.72864,-6.73036v-33.68964c0,-0.47472 0.38528,-0.86 0.86,-0.86c0.47472,0 0.86,0.38528 0.86,0.86v33.68964c0,2.76232 2.24804,5.01036 5.00864,5.01036h62.221c2.76232,0 5.01036,-2.24804 5.01036,-5.01036v-32.981c0,-2.7606 -2.24804,-5.00864 -5.01036,-5.00864h-44.00964c-0.47472,0 -0.86,-0.38528 -0.86,-0.86c0,-0.47472 0.38528,-0.86 0.86,-0.86h44.00964c3.71004,0 6.73036,3.0186 6.73036,6.72864v32.981c0,3.71004 -3.02032,6.73036 -6.73036,6.73036zM35.65216,54.309h-1.72c-0.47472,0 -0.86,-0.38528 -0.86,-0.86c0,-0.47472 0.38528,-0.86 0.86,-0.86h1.72c0.47472,0 0.86,0.38528 0.86,0.86c0,0.47472 -0.38356,0.86 -0.86,0.86z" fill="#1f212b"></path><path d="M90.69216,64.629h-53.32c-0.47472,0 -0.86,-0.38528 -0.86,-0.86c0,-0.47472 0.38528,-0.86 0.86,-0.86h53.32c0.47472,0 0.86,0.38528 0.86,0.86c0,0.47472 -0.38356,0.86 -0.86,0.86zM54.57216,71.509h-17.2c-0.47472,0 -0.86,-0.38528 -0.86,-0.86c0,-0.47472 0.38528,-0.86 0.86,-0.86h17.2c0.47472,0 0.86,0.38528 0.86,0.86c0,0.47472 -0.38356,0.86 -0.86,0.86z" fill="#1f212b"></path></g></g></svg>';
	  }else{
		  $paymentAccount = $dataWithdrawalPayPalEmail;
	      $withdrawalPaymentType = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M67.00833,49.33175l0.01792,0.00717c0.37267,-1.58742 1.72717,-2.75558 3.42208,-2.75558h48.27467c0.06092,0 0.12183,-0.02508 0.18275,-0.0215c-1.02842,-17.12475 -15.394,-25.06183 -28.06825,-25.06183h-48.27467c-1.6985,0 -3.053,1.20042 -3.42208,2.78425l-0.01792,-0.00717l-21.10225,96.88617l0.04658,0.00358c-0.05017,0.22933 -0.13975,0.44792 -0.13975,0.69517c0,1.98158 1.60175,3.55108 3.58333,3.55108h28.92108z" fill="#1565c0"></path><path d="M118.90575,46.56183c0.18992,3.139 -0.01792,6.55392 -0.82058,10.32717c-4.59025,21.48208 -21.18467,32.66208 -41.69208,32.66208c0,0 -12.43417,0 -15.45492,0c-1.86692,0 -2.74842,1.0965 -3.15333,1.935l-6.235,28.84225l-1.09292,5.12058h-0.0215l-4.52575,20.769l0.04658,0.00358c-0.05017,0.22933 -0.13975,0.44792 -0.13975,0.69517c0,1.98158 1.60175,3.58333 3.58333,3.58333h26.27658l0.04658,-0.03583c1.69133,-0.02508 3.03508,-1.23267 3.38625,-2.82367l0.0645,-0.05375l6.493,-30.15733c0,0 0.4515,-2.87742 3.47583,-2.87742c3.02433,0 14.97117,0 14.97117,0c20.50742,0 37.27025,-11.12983 41.86408,-32.6155c5.16717,-24.22333 -12.11167,-35.28508 -27.07208,-35.37467z" fill="#039be5"></path><path d="M70.44833,46.58333c-1.6985,0 -3.053,1.16817 -3.42208,2.75558l-0.01792,-0.00717l-9.22708,42.15792c0.40492,-0.8385 1.28642,-1.935 3.15333,-1.935c3.02433,0 15.17542,0 15.17542,0c20.50742,0 37.38133,-11.18 41.97158,-32.66208c0.80625,-3.77325 1.0105,-7.18817 0.82058,-10.32717c-0.05733,-0.00717 -0.12183,0.01792 -0.17917,0.01792z" fill="#283593"></path></g></g></svg>';
	  }
?>  
<tr class="langCur olds body<?php echo $dataWithdrawalID;?>" id="post_<?php echo $dataWithdrawalID;?>" data-last="<?php echo $dataWithdrawalID;?>">  
  <td class="bold_td"><?php echo $dataWithdrawalID; ?></td>  
  <td id="user<?php echo $dataWithdrawalID; ?>" data-id="<?php echo $dataWithdrawalCreatorUserID;?>">
     <div class="tableincontainer">
          <div class="publicher_avatar">
              <img src="<?php echo $dataWithdrawalUserAvatar;?>" class="a0uk">
          </div>
          <div class="publicher_name truncate"><a href="<?php echo $base_url.'profile/'.$Dot->Dot_GetUserName($dataWithdrawalCreatorUserID);?>"><?php echo $Dot->Dot_UserFullName($dataWithdrawalCreatorUserID);?></a></div>
      </div>
  </td>  
  <td>
     <div class="see_post" id="amount_<?php echo $dataWithdrawalID;?>" data-amount = "<?php echo $dataWithdrawalAmount;?>"><?php echo $dataWithdrawalAmount;?>$</div>
  </td>
  <td>
     <div class="see_time timeago" title="<?php echo $message_time;?>"></div>
  </td>
  <td style="padding:5px 0px !important;">
     <div class="see_post" id="word_<?php echo $dataWithdrawalID;?>">
         <div class="copy_account copyUrl" data-clipboard-text="<?php echo $paymentAccount;?>" onclick="M.toast({html: 'Account Copied!'})">Copy</div>
	     <div class="witdrawIcon"><?php echo $withdrawalPaymentType;?></div>
         <div class="withdrawAccount truncate"><?php echo $paymentAccount;?></div>
     </div>
  </td> 
  <td>
     <div class="see_post" style="text-align:center;display: inline-block;width: 100%; line-height:24px;" id="drawstat_<?php echo $dataWithdrawalID;?>"><?php echo $theDrawStatus;?></div>
  </td>   
  <td class="copyUrl froz">
  <div class="btn waves-effect waves-light green withdraw" id="<?php echo $dataWithdrawalID;?>" data-type="paid_withdraw"><div class="tableincontainer" style="text-align:center;font-size:13px;">Paid</div></div>
  <div class="btn waves-effect waves-light orange withdraw" style="margin-left:10px;" id="<?php echo $dataWithdrawalID;?>" data-type="decline_withdraw"><div class="tableincontainer" style="text-align:center;font-size:13px;">Decline</div></div>
  <div class="btn waves-effect waves-light red withdraw" style="margin-left:10px;" id="<?php echo $dataWithdrawalID;?>" data-type="delete_withdraw"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div></div> 
  </td>
</tr>     
<?php  }; ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_withdrawals?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 
<script type="text/javascript">
  $(document).ready(function(){
       $("body").on("click",".withdraw", function(){
	        var type = $(this).attr("data-type");
			var withdrawalID = $(this).attr("id");
			var amount = $("#amount_"+withdrawalID).attr("data-amount");
			var user = $("#user"+withdrawalID).attr("data-id");
			var data = 'f='+type+'&wiid='+withdrawalID+'&amount='+encodeURIComponent(amount)+'&user='+user;
			$.ajax({
				   type: 'POST',
				   url: requestUrl + 'admin/requests/request',
				   dataType: "json", 
				   data: data, 
				   beforeSend: function(){
					  $("#target-content").before('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
				   },
				   success: function(response){ 
						$('#ccm').remove();
						   if(type == 'paid_withdraw'){
							    if(response){
								     var success = response.pay_success;
									 var paymenticon = response.pay_ok;
									 var paymentNotOk = response.pay_notok;
									 if(success == 1){
								          $("#drawstat_"+withdrawalID).html(paymenticon);
									 }else {
										   M.toast({html: paymentNotOk, classes: 'warning'});   
									 }
								} 
						   }  else if(type == 'decline_withdraw'){
							    if(response){
								     var success = response.pay_success;
									 var paymenticon = response.pay_ok;
									 var paymentNotOk = response.pay_notok;
									 if(success == 1){
										  $("#drawstat_"+withdrawalID).html(paymenticon);
								          //$("#post_"+withdrawalID).slideUp("normal").promise().done(function() { $(this).remove(); });
									 }else {
										   M.toast({html: paymentNotOk, classes: 'warning'});   
									 }
								} 
						   } else if(type == 'delete_withdraw'){
							    if(response){
								     var success = response.pay_success;
									 var paymenticon = response.pay_ok;
									 var paymentNotOk = response.pay_notok;
									 if(success == 1){ 
								           $("#post_"+withdrawalID).slideUp("normal").promise().done(function() { $(this).remove(); });
									 }else {
										   M.toast({html: paymentNotOk, classes: 'warning',displayLength : 6000});   
									 }
								} 
						   }
				   }
			   });
	   });
   });
</script>