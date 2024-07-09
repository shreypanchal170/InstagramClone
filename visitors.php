<?php 
include_once 'functions/inc.php';  
if(empty($uid)){
   header("Location: $base_url");   
}
$page ='visitors';
//This file is displayed on all pages, all the changes you make can be displayed on all pages. 
$pageMenu = 'menuhere';  
function getCurrentOrParentDirectory($type='current')
{
    if ($type == 'current') {
        $path = dirname(__FILE__);  
    } else {
        $path = dirname(dirname(__FILE__));
    }
    $position = strrpos($path, '/') + 1;
    return substr($path, $position);
}  
include("contents/header.php");   
?> 
<div class="section">
<div class="main">
<?php if($menuTypePosition == '1'){?>
<script type="text/javascript"> 
		var senseSpeed = 5;
		var previousScroll = 0;
		$(window).scroll(function(event){
		   var scroller = $(this).scrollTop();
		   if (scroller-senseSpeed > previousScroll){
			  $("div.leftMenuBtn").filter(':not(:animated)').slideUp();
		   } else if (scroller+senseSpeed < previousScroll) {
			  $("div.leftMenuBtn").filter(':not(:animated)').slideDown();
		   }
		   previousScroll = scroller;
		});
</script>
  <div class="leftMenuBtn"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFFFFF"><g id="surface1"><path d="M86,32.25c-5.9419,0 -10.75,4.8081 -10.75,10.75c0,5.9419 4.8081,10.75 10.75,10.75c5.9419,0 10.75,-4.8081 10.75,-10.75c0,-5.9419 -4.8081,-10.75 -10.75,-10.75zM86,75.25c-5.9419,0 -10.75,4.8081 -10.75,10.75c0,5.9419 4.8081,10.75 10.75,10.75c5.9419,0 10.75,-4.8081 10.75,-10.75c0,-5.9419 -4.8081,-10.75 -10.75,-10.75zM86,118.25c-5.9419,0 -10.75,4.8081 -10.75,10.75c0,5.9419 4.8081,10.75 10.75,10.75c5.9419,0 10.75,-4.8081 10.75,-10.75c0,-5.9419 -4.8081,-10.75 -10.75,-10.75z"></path></g></g></g></svg></div>
<?php include("contents/leftSideBarMenu.php"); }?>
 <div class="container">
      <!--MIDDLE STARTED-->
      <div class="cGcGK"> 
      <div class="_81kxQ"><?php echo $page_Lang['who_visited_your_profile'][$dataUserPageLanguage];?></div>
      <div class="theVisitors" id="morePostType" data-type="more_visitors">
	   <?php 
		   // It is a page where all pictures, videos, texts and similar things shared by people are displayed.
		   //The change you make here can be instantly viewed by everyone.
		  if($proSystemStatus == '1'){
	         if($dataUserProType == '1'){
			  $Dot->Dot_UpdateProfileVisitCount($uid); 
			  include("contents/thevisitorslist.php");
		     } else{ echo '<div class="youarenopro">'.$page_Lang['mustbepromember'][$dataUserPageLanguage].'</div>'; }
		  }else{
		      $Dot->Dot_UpdateProfileVisitCount($uid); 
			  include("contents/thevisitorslist.php");
		  } 
       ?>
        </div>    
      </div>
      <!--MIDDLE FINISHED-->
      <!--RIGHT SIDEBAR STARTED-->
      <?php 
         // These areas are the integrated states of all the boxes on the right side.
          include("contents/right_sidebar.php");
      ?>
      <!--RIGHT SIDEBAR FINISHED-->
 </div>
</div>
</div> 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");   
?>   
<script type="text/javascript"> 
$(document).ready(function(){   
$("body").on("click",".makeFavourite", function(){
   var type = $(this).attr("data-f");
   var id = $(this).attr("id"); 
   var data = 'f='+type+'&i='+id;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      $(".no"+id).append('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
	   },
	   success: function(response){ 
	        $('#ccm').remove();
		   if(response){
			    var addedFavouriteList = response.addFavourite;
				var theIcon = response.addedIcon;
				var favNote = response.addnote;
				var iconType = response.itype;
				$("#f_v_"+id).html('').append(theIcon);
				$(".mf_"+id).attr("data-f",iconType);
				M.toast({html: favNote});  
		   }
		    
	   }
   });
}); 
});        
</script>

</body>
</html>