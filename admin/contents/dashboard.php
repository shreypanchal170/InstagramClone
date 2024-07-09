<?php include("chart.php");?>
<div class="page_title bold"><?php echo $page_Lang['dashboard_admin'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="total_statistics">
   <div class="total_statistic_item">
      <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_user"><?php echo $Dot->Dot_SelectedMenuIcon('admin_users_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_users'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_CountRegisteredUsers();?></div>
          </div>
      </div> 
   </div>
   <div class="total_statistic_item">
     <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_post"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_post_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_posts_'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalUserPosts();?></div>
          </div>
      </div>  
   </div>
   <div class="total_statistic_item">
     <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_comment"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_comment_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_comments'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalPostComments();?></div>
          </div>
      </div> 
   </div>
   <div class="total_statistic_item">
     <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_online"><?php echo $Dot->Dot_SelectedMenuIcon('admin_online_users_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['online_users'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalOnlineUser();?></div>
          </div>
      </div>  
   </div>
   <div class="total_statistic_item">
      <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_messages"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_user_messages_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_messages'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalMessages();?></div>
          </div>
      </div> 
   </div>
   <div class="total_statistic_item">
     <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_videos"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_videos_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_videos'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalVideos();?></div>
          </div>
      </div>
    </div>
   <div class="total_statistic_item">
   <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_text"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_text_post_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_text_post'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalTextPost();?></div>
          </div>
      </div>
   </div>
   <div class="total_statistic_item">
     <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_image"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_image_post_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_photos'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalPhotosPost();?></div>
          </div>
      </div>
    </div>
   <div class="total_statistic_item">
     <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_link"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_link_post_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_link'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalLinksPost();?></div>
          </div>
      </div>   
   </div>
   <div class="total_statistic_item">
    <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_music"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_audio_post_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_audio'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalMusicsPost();?></div>
          </div>
      </div> 
   </div>
   <div class="total_statistic_item">
   <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_likes"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_like_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_like_post'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalLikedPosts();?></div>
          </div>
      </div>  
   </div>
   <div class="total_statistic_item">
    <div class="total_statistic_box border-radius flex_row hvr-shutter-out-vertical">
          <div class="total_statistic_icon_likes_comment"><?php echo $Dot->Dot_SelectedMenuIcon('admin_total_comment_like_icon');?></div>
          <div class="total_statistic_info">
               <div class="total_statistic_title"><?php echo $page_Lang['total_comment_like'][$dataUserPageLanguage];?></div>
               <div class="total_statistic_sum bold"><?php echo $Dot->Dot_TotalCommentLiked();?></div>
          </div>
      </div> 
   </div>
</div>
<!--Total Statistic FINISHED-->
<!--Chart STARTED-->
<div class="global_box_container">
   <div class="global_box_container_left border-radius"><canvas id="allChart" class="chart" style="width:100% !important; height:100% !important;"></canvas></div>
   <div class="global_box_container_right border-radius">
       <div class="global_box_container_right_in">
           <div class="maleFemale_title bold"><?php echo $page_Lang['male_female_proportion'][$dataUserPageLanguage];?></div>
           <div class="canvasHere">
               <canvas id="canPie" width="300" height="200" data-values='<?php echo $Dot->Dot_CountMaleUser();?>, <?php echo $Dot->Dot_CountFemaleUser();?>, <?php echo $Dot->Dot_CountDontUser();?>'></canvas>
           </div>
           <div class="maleFemaleColors">
               <div class="mf_box"><div class="mf_item border-radius male_sum bold"><?php echo $page_Lang['male'][$dataUserPageLanguage];?> <?php echo '%'.round((100* $Dot->Dot_CountMaleUser()) / $Dot->Dot_CountRegisteredUsers(), 2);?></div></div>
               <div class="mf_box"><div class="mf_item border-radius female_sum bold"><?php echo $page_Lang['female'][$dataUserPageLanguage];?> <?php echo '%'.round((100* $Dot->Dot_CountFemaleUser()) / $Dot->Dot_CountRegisteredUsers(), 2);?></div></div>
               <div class="mf_box"><div class="mf_item border-radius null_sum bold"><?php echo $page_Lang['no_say'][$dataUserPageLanguage];?> <?php echo  '%'.round((100* $Dot->Dot_CountDontUser()) / $Dot->Dot_CountRegisteredUsers(), 2);?></div></div> 
           </div> 
       </div>
   </div>
</div>
<!--Chart FINISHED-->
<!--Reported Post and Profile-->
<!---->
<script type="text/javascript"> 
var optionsAll = {
  bezierCurve: true,
  animation: true,
  propagate: true,
  showLine:false, 
  animationEasing: "easeOutQuart",
  showScale: true,
  tooltipEvents: ["mousemove", "touchstart", "touchmove"],
  tooltipCornerRadius: 3,
  tooltipFillColor: "rgba(53, 53, 53, 0.85)",
  pointDot : true,
  pointDotRadius : 4,
  datasetFill : true,
  scaleShowLine : true,
  animationEasing : "easeInOutCirc",
  animateRotate : false,
  animateScale : false,
  responsive: true,
  scaleFontColor: "rgba(105, 112, 120, 1)",
  scaleFontSize: 13,
  fontFamily: "'Helvetica Neue', helvetica, arial, sans-serif",
};
var dataAll = {
  labels: <?php echo json_encode($months);?>,
  datasets: [{
    label: "My Second dataset",
    fillColor: "rgba(41, 133, 251, 1)",
    strokeColor: "rgba(41, 133, 251, 1)",
    pointColor: "rgba(41, 133, 251, 1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(151,187,205,1)",
    data: <?php echo json_encode(array_values($yearMonthTotalyUsers));?>
  }, {
    label: "My Second dataset",
    fillColor: "rgba(202, 24, 166 ,1)",
    strokeColor: "rgba(202, 24, 166 ,1)",
    pointColor: "rgba(202, 24, 166 ,1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(151,187,205,1)",
    data: <?php echo json_encode(array_values($yearMonthTotalPosts));?>
  }]
};
var ctx3 = document.getElementById("allChart").getContext("2d"); 
var allChart = new Chart(ctx3).Bar(dataAll, optionsAll); 

//
var pieColors = ['rgb(30, 136, 229)', 'rgba(236, 239, 241,1)', 'rgba(216, 27, 96,1)', 'rgba(84, 36, 55, 0.7)', 'rgba(83, 119, 122, 0.7)', 'rgba(119, 146, 174, 0.7)'];

function getTotal( arr ){
    var j,
        myTotal = 0;
    
    for( j = 0; j < arr.length; j++) {
        myTotal += ( typeof arr[j] === 'number' ) ? arr[j] : 0;
    }
    
    return myTotal;
}

function drawPieChart( canvasId ) {
    var i,
        canvas = document.getElementById( canvasId ),
        pieData = canvas.dataset.values.split(',').map( function(x){ return parseInt( x, 10 )}),
        halfWidth = canvas.width * .5,
        halfHeight = canvas.height * .5,
        ctx = canvas.getContext( '2d' ),
        lastend = 0,
        myTotal = getTotal(pieData);

    ctx.clearRect( 0, 0, canvas.width, canvas.height );

    for( i = 0; i < pieData.length; i++) {
        ctx.fillStyle = pieColors[i];
        ctx.beginPath();
        ctx.moveTo( halfWidth, halfHeight );
        ctx.arc( halfWidth, halfHeight, halfHeight, lastend, lastend + ( Math.PI * 2 * ( pieData[i] / myTotal )), false );
        ctx.lineTo( halfWidth, halfHeight );
        ctx.fill();
        lastend += Math.PI * 2 * ( pieData[i] / myTotal );
    }
}

drawPieChart('canPie');
</script>