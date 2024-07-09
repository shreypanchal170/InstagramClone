<?php 
//include_once 'functions/control.php';
include("functions/inc.php");
if(empty($uid)){
   header("Location: $base_url");   
}
$page = 'boosted';
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
$getp ='';  
if(isset($_GET['cr'])){ $getp = isset($_GET['cr']) ? $_GET['cr'] : '';	}   
?>  
<div class="section">
<div class="main">
 <div class="container"> 
      <!--MIDDLE STARTED-->
      <div class="buyCreditContainer">  
           <div class="ofadsHeader"><?php echo $page_Lang['boosted_posts'][$dataUserPageLanguage];?></div>
           <div class="ofadsContainer">
                 <?php include("contents/boosted_posts.php"); ?>
           </div>
      </div>
      <!--MIDDLE FINISHED-->
      
 </div>
</div>
</div> 
<?php 
// Here is some javascript codes
include("contents/javascripts_vars.php");   
?>    
<script type="text/javascript">
$(document).ready(function() {
	$('.currency').livequery(function() { 
       $(this).formSelect(); 
    }); 
}); 
</script>
</body>
</html>