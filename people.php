<?php 
include_once 'functions/inc.php';  
if(empty($uid)){
   header("Location: $base_url");   
}
$page ='explore'; 
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
$earning = '';
$payout ='';
$withdrawal = ''; 
$src = '';
if(isset($_GET['pu'])){ 
    $getp = isset($_GET['pu']) ? $_GET['pu'] : '';	
if($getp == 'people'){
   $payout = 'earning_menu_active';
}else if($getp == 'nearby'){ 
   $withdrawal = 'earning_menu_active';
}else if($getp == 'favorite'){
   $points = 'earning_menu_active';
}else if($getp == 'search'){
   $src = 'earning_menu_active';
}
}else{
$earning = 'earning_menu_active';
}
?>
<div class="section">
   <div class="main">
       <div class="container">
            <!--MIDDLE STARTED-->
            <div class="exploreWrapper">
                  <!----> 
              <div class="earning_menu">
                   <div class="earning_menu_item <?php echo $earning;?>"><a href="<?php echo $base_url;?>people">Global</a></div>
                   <div class="earning_menu_item <?php echo $withdrawal;?>"><a href="<?php echo $base_url;?>people?pu=nearby">Nearby</a></div>
                   <div class="earning_menu_item <?php echo $points;?>"><a href="<?php echo $base_url;?>people?pu=favorite">Favorite</a></div>
                   <div class="earning_menu_item <?php echo $src;?>"><a href="<?php echo $base_url;?>people?pu=search">Search</a></div>
              </div>
              <!----> 
                 <!----> 
                <div class="search_inbox_box"> 
                <?php  $Dot->Dot_ResetOldSearch($uid);?>
                     <div class="poeples">
				     <?php  
							switch($getp) { 
								case 'people': 
									include('contents/html_global_user.php');
								break;
								case 'nearby': 
									include('contents/html_nearby_users.php');
								break;
								case 'favorite': 
									include('contents/html_favourite_users.php');
								break;
								case 'search': 
									include('contents/html_src_users.php');
								break; 
								default:
				                include('contents/html_global_user.php');
							}   
                    ?>
                    </div>
                </div>
                <!----> 
            </div>
            <!--MIDDLE FINISHED-->
      </div>
    </div>
</div>
 

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
<?php include("contents/javascripts_vars.php"); ?> 

</body>
</html>