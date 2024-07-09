<?php
 include_once '../functions/config.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Activate oobenn Instagram Style Social Networking Platform</title>
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
		$("#purchasecode").livequery(function() {
		$(this).alphanum({
		  allow: "-",
		  disallow: "!@$%^&*()+=[]\\';,/{}|\":<>?~`. _",
		  allowSpace: false,
		  allowNumeric: true
		});
	  });
		var timer = null;
	$("body").delegate("#purchasecode", "keyup", function() {
      clearTimeout(timer);
      timer = setTimeout(function() {
         var purchase_code = $("#purchasecode").val();
         $.ajax({
            type: "POST",
            url: '<?php echo $base_url;?>requests/'+"purchase.php",
            data: "purchase_code=" + purchase_code,
            dataType: "json",
            beforeSend: function() {
               $("#error").fadeOut();
               $("#result").css("display", "block");
               $("#result").html('<div class="alert alert-success" style="color:#f40707;"><strong>Checking!</strong>Please wait...</div>');
            },
            success: function(response) {
				 if(response == 1) {
				    $("#result").fadeIn();
                    $("#result").html('<div class="alert alert-success" style="color:#229047;"><strong>Wow!</strong>Item purchase code is valid. Your project is being activated. After a short time you will be redirected.</div>');
					$(".checkPurchase").fadeIn("fast");
					setTimeout(function() {
					    window.location = '../index.php';
					},1500);
				}
				
				if(response == 0){   
				   $("#result").fadeIn();
                   $("#result").html('<div class="alert alert-danger" style="color:#f40707;"><strong>Oops!</strong> Item purchase code is not valid.Or Internet connection is not working.</div>');
				   $(".checkPurchase").fadeOut("fast");
                } 
			}
         });
      },500);
   }); 
	});
  </script>
  <style type="text/css">
  html,
  body {
   width: 100%;
   height: 100%;
   padding: 0px;
   margin: 0px;
   background-image:url(img/bg.png);
   font-family: helvetica, arial, sans-serif;
   -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased;
   -ms-text-size-adjust: 100%;
   -webkit-texts-size-adjust: 100%;
   -webkit-backface-visibility: hidden;
   -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
}
  *{
	  box-sizing:border-box;
	  -webkit-box-sizing:border-box;
	  -moz-box-sizing:border-box;
	}
	.pref {
	-webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-align: stretch;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
	}
     .container {
	    position:relative;
		width:100%;
		margin:0px auto;
		max-width:700px;
		padding-top:100px;
	 }
	.nara_avtivate {
	   position:relative;
	   width:100%;
	   display:inline-block;	
	}
	.nara_avtivate img {
      position:relative;
	  width:100%;		
	}
	.nara_active_note {
		 position:relative;
		 width:100%;
		 display:inline-block;
		 text-align:center;
		 font-weight:600;
		 font-size:15px;
		 color:#444;
	}
	.nt {
	   position:relative;
	   width:100%;
	   overflow:hidden;
	   padding:10px 0px;	
	}
	.purchasecode {
	    position:relative;
		width:100%;
		padding:8px 12px;
		font-weight:300;
		font-size:15px;
		outline:none;
		border:1px solid #798192;
		-webkit-border-top-left-radius: 3px;
-webkit-border-bottom-left-radius: 3px;
-moz-border-radius-topleft: 3px;
-moz-border-radius-bottomleft: 3px;
border-top-left-radius: 3px;
border-bottom-left-radius: 3px;
	}
	.checkPurchase {
	    position: relative;
    width: 100%;
    text-align: center;
    color: #ffffff;
    background-color: #798192;
    background-image: url(img/ky.png);
    background-repeat: no-repeat;
    background-position-x: 10px;
    background-position-y: 11px;
    background-size: 10px;
    -webkit-border-top-right-radius: 3px;
    -webkit-border-bottom-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    -moz-border-radius-bottomright: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    max-width: 100px;
    line-height: 36px;
    font-weight: 300;
    text-indent: 13px;
	cursor:pointer;
	display:none;
	}
	.checkPurchase:focus {
	  	background-color:#555A67;
	}
	.checkPurchase:hover {
		background-image: url(img/ky.png);
    background-repeat: no-repeat;
    background-position-x: 10px;
    background-position-y: 11px;
		background-color:#6779A0;
	}
 #result {
	display:none;
	}
  .help_box {
	  position:relative;
	  float:left;
	  width:50%;
	   padding:10px;
	}
   .need_help {
	 position:relative;
	 width:100%;
	 border-radius:3px;
	 -webkit-border-radius:3px;
	 -moz-border-radius:3px;
	 background: #fff;
    border: 1px solid #bcbfc2;
	padding: 20px 10px; 
   }
   .team {
	position: relative;
    width: 100%;
    background-image: url(img/support.png);
    background-repeat: no-repeat;
    background-size: 60px;
    background-position: center center;
    padding-top: 75px;
	}
	.supportText {
	   position:relative;
	   width:100%;
	   padding:10px 10px;
	   font-weight:300;
	   font-size:18px;
	   color:#075EB5;
	   text-align:center;
	}
	.supportNote {
	 position:relative;
	   width:100%;
	   font-weight:300;
	   font-size:15px;
	   color:#454845;
	   text-align:center;
	   	
	}
	.moreInfo {
		
	   position:relative;
	   width:100%;
	   max-width:100px;
	   margin:0px auto;
	   margin-top:20px;
	   font-weight:300;
	   text-align:center;
	       -moz-border-radius: 4px!important;
    -webkit-border-radius: 4px!important;
    border-radius: 4px!important;
    background: #679175!important;
    font-size: 13px!important;
    color: #fff!important;
    border: 0!important;
    -webkit-box-shadow: 0 2px #3d5d47!important;
    -moz-box-shadow: 0 2px #3d5d47!important;
    box-shadow: 0 2px #3d5d47!important;
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
	padding:10px 0px;
	text-transform:uppercase;
	}
	.moreInfo a {
	   color:#ffffff;
	   font-weight:300;
	   text-decoration:none;	
	}
	.pcode {
	position: relative;
    width: 100%;
    background-image: url(img/cd.png);
    background-repeat: no-repeat;
    background-size: 200px;
    background-position: center center;
    padding-top: 75px;
	}
	.footer {
	   position:relative;
	   width:100%;
	   padding:20px 0px;
	   text-align:center;
	   color:#444;
	   font-weight:300;
	   font-size:15px;	
	}
	.fastLinks {
	   float:left;
	   position:relative;
	   width:100%;
	   margin-bottom:15px;
	}
	.fastLinks a {
	   text-decoration:none;
	   color:#229047;
	   margin-right:20px;
	   text-align:center;
	}
	.cop {
		 position:relative;
		 float:left;
		 width:100%;
	}
	.cop a {
	   text-decoration:none;
	   color:#229047;
	   text-align:center;
	}
  </style>
</head>

<body>
<?php 
$table = base64_encode('pr_cod');
echo $table;
//echo base64_decode($table);
?>
<div class="container">
   <div class="nara_avtivate">
       <img src="img/naraactive.png" />
   </div>
   <div class="nara_active_note">
       <div class="nt">It looks like your purchase code is now invalid. </div>
       <div class="nt">Enter your purchase code below to activate instantly.</div>
       <div class="nt pref"><input type="text" name="cusco" class="purchasecode" id="purchasecode" placeholder="Enter your valid Purchase code here..." /><div class="checkPurchase">Activate</div></div>
       <div class="nt" id="result"></div>
   </div>
   <div class="nara_active_note pref">
       <div class="help_box">
          <div class="need_help">
               <div class="team"></div>
               <div class="supportText">Need Support ?</div>
               <div class="supportNote">We care about your site just as much as you do, we love to help!</div>
               <div class="moreInfo"><a href="https://www.codecanyon.net/user/mstfoztrk" target="_new">More Info</a></div>
          </div>
       </div>
       <div class="help_box">
          <div class="need_help">
               <div class="pcode"></div>
               <div class="supportText">Get Code!</div>
               <div class="supportNote">Receive a purchase code and join us. Click here to link below ;)</div>
               <div class="moreInfo"><a href="http://codecanyon.net/item/oobenn-social-networking-platform-like-instagram/17048549?license=regular&open_purchase_for_item_id=17048549&purchasable=source" target="_new">buy now</a></div>
          </div>
       </div>
   </div>
</div>
<div class="footer"><div class="fastLinks"><a href="https://www.codecanyon.com/user/mstfoztrk" target="_new">About Me</a><a href="https://www.codecanyon.com/user/mstfoztrk">Policies</a><a href="https://codecanyon.net/item/oobenn-instagram-style-social-networking-script/17048549/support" target="_new">Contact Me</a><a href="https://www.codecanyon.com/user/mstfoztrk" target="_new">Support</a></div><div class="cop">Copyright © 2020 <a href="https://www.codecanyon.com/user/mstfoztrk" target="_new">duhovit</a>. Powered by <a href="https://www.codecanyon.com/user/mstfoztrk" target="_new">mstfoztrk</a></div> </div>
</body>
</html>