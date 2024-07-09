<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">  
 <title><?php echo $metaTitle;?></title>  
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $postMetaImage;?>" />
<meta property="og:image:secure_url" content="<?php echo $postMetaImage;?>" />
<meta property="og:description" content="<?php echo $postMetaDescription;?>" />
<meta property="og:title" content="<?php echo $metaTitle;?>" />
<meta property="og:url" content="<?php echo $base_url;?>status/<?php echo $GetMessageID;?>" />
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $metaTitle;?>" />
<meta name="twitter:description" content="<?php echo $postMetaDescription;?>" />
<meta name="twitter:image" content="<?php echo $postMetaImage;?>" />
<link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">  
<link rel="stylesheet" id="style_mode" href="<?php echo $base_url;?>css/style.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/materialize.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/animate.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/hover.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/zuck.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/snapssenger.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/mediaelementplayer.css">
<link rel="stylesheet" href="<?php echo $base_url;?>css/lightGallery/lightgallery.css">
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>   
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery-migrate-3.0.1.js"></script>   
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>   
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.form.js"></script>    
<script type="text/javascript" src="<?php echo $base_url;?>js/ion.sound.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/timeago/<?php echo $page_Lang['timeagojs'][$dataUserPageLanguage];?>"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/linkify.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/linkify-jquery.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/linkify-html.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/autosize.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/osocial.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/mediaelement-and-player.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/xregexp-all.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/materialize.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/slick.js"></script>  
<script type="text/javascript" src="<?php echo $base_url;?>js/visible.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/lightGallery/lightgallery-all.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>js/lightGallery/jquery.mousewheel.min.js"></script> 
<?php //if($dot_googleAnalyticsCode){  echo $dot_googleAnalyticsCode; }?>
<script type="text/javascript">
$(document).ready(function(){
$(".gallery").livequery(function() { 
    $(this).lightGallery({
        selector: '.sldimg',  
		share: false
    });   
  }); 
   $(".single-image").livequery(function() { 
     $(this).lightGallery({
        selector: 'this',
		share: false
     }); 
  }); 
  //MediaElementPlayer
  $("video").livequery(function() {
    $(this).mediaelementplayer({
      audioWidth: "100%",
      audioHeight: 30,
      autoplay: true
    });  
  }); 
  $("audio").livequery(function() { 
    $(this).mediaelementplayer({
      mode: 'shim',
      autoplay: true,
      success: function(player, node) {
        $("#" + node.id + "-mode").html("mode: " + player.pluginType);
      }
    });
  });   
  // Post Slider
  $(".column-1 , .theImages").livequery(function() {
    $(this).slick({
      arrows: true,
      dots: true,
      auto: true,
      speed: 300,
      autoSpeed: 8000,
      prev: "#prev",
      next: "#next"
    });
  });
});
</script>
</head> 
<body>

<!--HEADER STARTED-->
<div class="header_container pageResType">
  <div class="header_in">
    <div class="oJZym">
      <div class="aU2HW"><a class="logos _7mese insta_font Szr5J" href="<?php echo $base_url;?>" style="height: 35px;width: 176px;display: inherit;"><img src="<?php echo $base_url.'uploads/logo/'.$dot_logo;?>" /></a></div>
    </div>  
      <div class="ctQZg">
        <div class="_47KiJ"> 
            
          <div class="XrOey" id="fastHeaderMenu">
              
              <div class="headerMenu"> 
                   fdsfasdfds
              </div>
          </div> 
          
        </div>
      </div> 
  </div>
</div>
<!--HEADER FINISHED-->