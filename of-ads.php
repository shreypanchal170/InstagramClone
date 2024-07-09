<?php  
include("functions/inc.php");
if(empty($uid)){
   header("Location: $base_url");   
}
$page = 'of-ads';
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
           <div class="ofadsHeader">Advertisements</div>
           <div class="ofadsContainer">
                 <?php 
				   include("contents/user_advertisement.php"); 
				 ?>
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
</body>
</html>