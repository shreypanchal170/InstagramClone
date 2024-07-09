<?php   
$page = 'terms';
$phpVersionNote ='';
$MySQLVersionNote = '';
$htaccessFile = '';
$fopen = '';
$conf = '';
$required = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><g id="surface1"><path d="M161.86589,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#388e3c"></path><path d="M126.03255,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#66bb6a"></path></g></g></g></svg> Installed';
$requirede = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><g id="surface1"><path d="M161.86589,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#388e3c"></path><path d="M126.03255,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#66bb6a"></path></g></g></g></svg> Enabled';
$requiredu = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><g id="surface1"><path d="M161.86589,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#388e3c"></path><path d="M126.03255,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#66bb6a"></path></g></g></g></svg> Uploaded';
$requiredh = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><g id="surface1"><path d="M161.86589,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#388e3c"></path><path d="M126.03255,32.25l-83.03255,83.64844l-32.85189,-33.48177l-10.14811,10.2321l43,43.5179l93.16667,-93.90853z" fill="#66bb6a"></path></g></g></g></svg> Uploaded';
$notrequired = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="Layer_1"><g><g fill="#e04f5f"><g><g><g><g><g><g><path d="M169.34609,86c0,-46.02344 -37.32266,-83.34609 -83.34609,-83.34609c-46.02344,0 -83.34609,37.32266 -83.34609,83.34609c0,46.02344 37.32266,83.34609 83.34609,83.34609c46.02344,0 83.34609,-37.32266 83.34609,-83.34609z"></path></g></g></g></g></g></g></g><g fill="#ffffff"><path d="M95.74219,86l24.35547,-28.28594c2.65391,-3.09062 2.31797,-7.72656 -0.77266,-10.41406c-3.09063,-2.65391 -7.72656,-2.31797 -10.38047,0.77266l-22.94453,26.63984l-22.91094,-26.60625c-2.65391,-3.09062 -7.32344,-3.42656 -10.41406,-0.77266c-3.09062,2.65391 -3.42656,7.32344 -0.77266,10.41406l24.35547,28.25234l-24.35547,28.28594c-2.65391,3.09062 -2.31797,7.72656 0.77266,10.41406c1.37734,1.20937 3.09062,1.78047 4.80391,1.78047c2.08281,0 4.13203,-0.87344 5.57656,-2.55313l22.91094,-26.60625l22.91094,26.60625c1.44453,1.67969 3.52734,2.55313 5.57656,2.55313c1.71328,0 3.42656,-0.57109 4.80391,-1.78047c3.09063,-2.65391 3.42656,-7.32344 0.77266,-10.41406z"></path></g></g></g></g></svg> Not Installed';
$notrequiredd = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="Layer_1"><g><g fill="#e04f5f"><g><g><g><g><g><g><path d="M169.34609,86c0,-46.02344 -37.32266,-83.34609 -83.34609,-83.34609c-46.02344,0 -83.34609,37.32266 -83.34609,83.34609c0,46.02344 37.32266,83.34609 83.34609,83.34609c46.02344,0 83.34609,-37.32266 83.34609,-83.34609z"></path></g></g></g></g></g></g></g><g fill="#ffffff"><path d="M95.74219,86l24.35547,-28.28594c2.65391,-3.09062 2.31797,-7.72656 -0.77266,-10.41406c-3.09063,-2.65391 -7.72656,-2.31797 -10.38047,0.77266l-22.94453,26.63984l-22.91094,-26.60625c-2.65391,-3.09062 -7.32344,-3.42656 -10.41406,-0.77266c-3.09062,2.65391 -3.42656,7.32344 -0.77266,10.41406l24.35547,28.25234l-24.35547,28.28594c-2.65391,3.09062 -2.31797,7.72656 0.77266,10.41406c1.37734,1.20937 3.09062,1.78047 4.80391,1.78047c2.08281,0 4.13203,-0.87344 5.57656,-2.55313l22.91094,-26.60625l22.91094,26.60625c1.44453,1.67969 3.52734,2.55313 5.57656,2.55313c1.71328,0 3.42656,-0.57109 4.80391,-1.78047c3.09063,-2.65391 3.42656,-7.32344 0.77266,-10.41406z"></path></g></g></g></g></svg> Disabled';
$notrequiredn = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="Layer_1"><g><g fill="#e04f5f"><g><g><g><g><g><g><path d="M169.34609,86c0,-46.02344 -37.32266,-83.34609 -83.34609,-83.34609c-46.02344,0 -83.34609,37.32266 -83.34609,83.34609c0,46.02344 37.32266,83.34609 83.34609,83.34609c46.02344,0 83.34609,-37.32266 83.34609,-83.34609z"></path></g></g></g></g></g></g></g><g fill="#ffffff"><path d="M95.74219,86l24.35547,-28.28594c2.65391,-3.09062 2.31797,-7.72656 -0.77266,-10.41406c-3.09063,-2.65391 -7.72656,-2.31797 -10.38047,0.77266l-22.94453,26.63984l-22.91094,-26.60625c-2.65391,-3.09062 -7.32344,-3.42656 -10.41406,-0.77266c-3.09062,2.65391 -3.42656,7.32344 -0.77266,10.41406l24.35547,28.25234l-24.35547,28.28594c-2.65391,3.09062 -2.31797,7.72656 0.77266,10.41406c1.37734,1.20937 3.09062,1.78047 4.80391,1.78047c2.08281,0 4.13203,-0.87344 5.57656,-2.55313l22.91094,-26.60625l22.91094,26.60625c1.44453,1.67969 3.52734,2.55313 5.57656,2.55313c1.71328,0 3.42656,-0.57109 4.80391,-1.78047c3.09063,-2.65391 3.42656,-7.32344 0.77266,-10.41406z"></path></g></g></g></g></svg> Not Uploaded';
$notrequiredh = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="Layer_1"><g><g fill="#e04f5f"><g><g><g><g><g><g><path d="M169.34609,86c0,-46.02344 -37.32266,-83.34609 -83.34609,-83.34609c-46.02344,0 -83.34609,37.32266 -83.34609,83.34609c0,46.02344 37.32266,83.34609 83.34609,83.34609c46.02344,0 83.34609,-37.32266 83.34609,-83.34609z"></path></g></g></g></g></g></g></g><g fill="#ffffff"><path d="M95.74219,86l24.35547,-28.28594c2.65391,-3.09062 2.31797,-7.72656 -0.77266,-10.41406c-3.09063,-2.65391 -7.72656,-2.31797 -10.38047,0.77266l-22.94453,26.63984l-22.91094,-26.60625c-2.65391,-3.09062 -7.32344,-3.42656 -10.41406,-0.77266c-3.09062,2.65391 -3.42656,7.32344 -0.77266,10.41406l24.35547,28.25234l-24.35547,28.28594c-2.65391,3.09062 -2.31797,7.72656 0.77266,10.41406c1.37734,1.20937 3.09062,1.78047 4.80391,1.78047c2.08281,0 4.13203,-0.87344 5.57656,-2.55313l22.91094,-26.60625l22.91094,26.60625c1.44453,1.67969 3.52734,2.55313 5.57656,2.55313c1.71328,0 3.42656,-0.57109 4.80391,-1.78047c3.09063,-2.65391 3.42656,-7.32344 0.77266,-10.41406z"></path></g></g></g></g></svg> Not Uploaded';
if (!version_compare(PHP_VERSION, '5.5.0', '>=')) {
     $phpVersionNote = $notrequired;
} else{
    $phpVersionNote = $required;
}
if (!function_exists('mysqli_connect')) {
    $MySQLVersionNote = $notrequired;
} else{
    $MySQLVersionNote = $required;
}  
if(!ini_get('allow_url_fopen') ) {
   $fopen = $notrequiredd;
} else{
    $fopen = $requirede;
}
if (!is_writable('../functions/config.php')) {
   $conf = $notrequiredn;
}else{
    $conf = $requiredu;
}
if (!file_exists('../.htaccess')) {
   $is_htaccess = $notrequiredh; 
}else{
    $is_htaccess = $requiredh;
}
$pages_array = array(
   'req',
   'terms',
   'install',
   'create_admin',
   'finish'
);
if (!empty($_GET['page_in'])) {
   if (in_array($_GET['page_in'], $pages_array)) {
	  $page = $_GET['page_in'];
   }
}

$page_name = '';
if ($page == 'terms') {
	$page_name = 'Terms of use';
}else if($page == 'install'){
	 $page_name = 'Install';
} else if ($page == 'create_admin') {
	$page_name = 'Create Admin';
}else if ($page == 'finish') {
	$page_name = 'Your Website is Ready!';
}
function random($length, $chars = '')
{
	if (!$chars) {
		$chars = implode(range('a','f'));
		$chars .= implode(range('0','9'));
	}
	$shuffled = str_shuffle($chars);
	return substr($shuffled, 0, $length);
}
function serialkey()
{
	return random(8).'-'.random(4).'-'.random(4).'-'.random(4).'-'.random(12);

}
$key = serialkey();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title>oobenn Installation || <?php echo $page_name;?></title>
<link rel="stylesheet" type="text/css" href="css/installation.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery.livequery.js"></script>
<script type="text/javascript" src="js/jquery.alphanum.js"></script>

<script>
$(function() {
        $('#agree').change(function() {
            if($(this).is(":checked")) {
                $('#next-steps').attr('disabled', false);
            } else {
            	$('#next-steps').attr('disabled', true);
            }       
        });
    });
var cd = '#code';
</script>
<style type="text/css">.canNotInstall{width:100%;display:inline-block;border-radius:3px;-webkit-border-radius:3px;padding:10px;background-color:#F00;color:#ffffff;font-weight:500;font-size:14px;}</style>
</head>

<body>
<!---->
<div class="container">
      <!---->
     <div class="header">oobenn <?php echo $page_name;?></div>
     <!---->
     <?php if($page == 'terms') {?>
     <!---->
     <div class="installation_container">
          <!---->
          <div class="installation_box_global">
               <!---->
               <div class="installation_title">You Can</div>
               <!---->
               <!---->
               <div class="installation_box_middle">
                     <ol class="_3oE3H">
                         <li class="_2eNdO">
                            Use on one (1) domain only, additional license purchase required for each additional domain.
                         </li>
                         <li class="_2eNdO">
                           Modify or edit as you see fit
                         </li>
                         <li class="_2eNdO">
                           Delete sections as you see fit
                         </li>
                         <li class="_2eNdO">
                           Translate to your choice of language.
                         </li>
                     </ol>
               </div>
               <!---->
                <!---->
               <div class="installation_title">You Can Not</div>
               <!---->
               <!---->
               <div class="installation_box_middle">
                     <ol class="_3oE3H">
                         <li class="_2eNdO">
                           Resell, distribute, give away or trade by any means to any third party or individual without permission.
                         </li>
                         <li class="_2eNdO">
                           Use on more than one (1) domain.
                         </li>
                         <li class="_2eNdO">
                           On-demand products/services <strong>(e.g. "made to order" or "create your own" apps and sites)</strong>
                         </li> 
                         <li class="_2eNdO">
                           Use in stock items/templates
                         </li>
                     </ol>
               </div>
               <!---->
               <hr>
               <!---->
               <div class="nextSteps">
                     <form action="?page_in=install" method="post">
                        <div class="agreeTerms">
                            <input type="checkbox" name="agree" id="agree">
                            <label for="agree"> I agree to the terms of use and privacy policy</label>
                        </div> 
                        <button type="submit" class="btn btn-main" id="next-steps" disabled>Continue</button> 
                    </form>
               </div>
              <!---->
          </div>
          <!---->
     </div>
     <!---->
     <?php } else if($page == 'install') {?>
     <!---->
     <div class="installation_container">
          <!---->
          <div class="installation_box_purchase">
               <!---->
               <div class="installation_title_purchase">System Required</div>
               <!----> 
               <!---->
               <div class="installation_box_middle" id="afterpurc">
                    <!---->
                     <div class="data_box">
                          <div class="required">PHP 5.5+</div>
                          <div class="required">Required PHP version 5.5 or more</div>
                          <div class="required"><?php echo $phpVersionNote;?></div>
                     </div>
                     <!---->
                     <!---->
                     <div class="data_box">
                          <div class="required">MySQLi</div>
                          <div class="required">Required MySQLi PHP extension</div>
                          <div class="required"><?php echo $MySQLVersionNote;?></div>
                     </div>
                     <!----> 
                     <!---->
                     <div class="data_box">
                          <div class="required">allow_url_fopen</div>
                          <div class="required">Required allow_url_fopen</div>
                          <div class="required"><?php echo $fopen;?></div>
                     </div>
                     <!---->
                     <!---->
                     <div class="data_box">
                          <div class="required">config.php</div>
                          <div class="required">Required config.php to be writable for the installation <small>(Located in ./functions/)</small></div>
                          <div class="required"><?php echo $conf;?></div>
                     </div>
                     <!---->
                     <!---->
                     <div class="data_box">
                          <div class="required">.htaccess<</div>
                          <div class="required">Required .htaccess file for script security <small>(Located in ./script)</small></div>
                          <div class="required"><?php echo $is_htaccess;?></div>
                     </div>
                     <!---->
               </div>
               <!---->
               
               <!---->
               <div class="installation_title_purchase">Purchase Code</div>
               <!----> 
               <!---->
               <div class="installation_box_middle" id="afterpurc">
                       <input type="text" id="purchaseCode" class="purchaseCode" value="<?php echo $key; ?>" autofocus/>
                       <span class="help-block">Your Envato purchase code, you can get it from <a href="https://help.market.envato.com/hc/en-us/articles/202822600" class="main" target="_blank">here</a>.</span>
               </div>
               <!----> 
               <!---->
               <div class="installation_title_purchase">Fill Your Database Information</div>
               <!----> 
               <div class="installation_box_middle" id="afterpurc">
                     <!---->
                     <div class="data_box" id="afterhost"><input type="text" class="fieldinput"  id="data_server" name="mysql_db_host" placeholder="DB_SERVER" /></div>
                     <!---->
                      <!---->
                     <div class="data_box" id="afterusername"><input type="text" class="fieldinput" id="data_username" name="mysql_db_user" placeholder="DB_USERNAME"/></div>
                     <!---->
                      <!---->
                     <div class="data_box" id="afterpassword"><input type="text" class="fieldinput" id="data_password" name="mysql_db_pass" placeholder="DB_PASSWORD" /></div> 
                     <!---->
                      <!---->
                     <div class="data_box" id="afterdbname"><input type="text" class="fieldinput" id="data_name" name="mysql_db_name" placeholder="DB_NAME" /></div>
                     <!---->
                     <!---->
                     <div class="data-box" style="margin-top:15px;"><input type="checkbox" name="subfolderselect" id="subfolderselect"><label for="subfolderselect">If you are installing oobenn in subfolder please select!</label></div>
                      <!---->
                      <!---->
                     <div class="data_box" id="subfold" style="display:none;">
                     <input type="text" class="fieldinput" id="subfolder" name="subfolder" placeholder="Subfolder Name" /> 
                     </div>
                     <!---->
                      <!---->
                     <div class="data_box" id="afterwebdomain">
                     <input type="text" class="fieldinput" id="website_domain" name="website_domain" placeholder="https://www.website.com/" />
                     <span class="help-block-urls">Examples: <br>http://websiteurl.com <br>http://www.websiteurl.com<br>http://subdomain.websiteurl.com<br> You can use https:// too.</span>
                     </div>
                     <!----> 
               </div>
               <!---->
               <div class="nextStepsCode"  id="loadPurchase">
                   <div class="btn" id="purchase" data-type="purchase">Next</div>
               </div>
               <!---->  
          </div>
          <!---->
     </div>
     <!---->
     <script type="text/javascript">
         $(document).ready(function(){
			 $(function() {
				$('#subfolderselect').change(function() {
					if($(this).is(":checked")) {
						  $("#subfold").show();
					} else {
						  $("#subfold").hide();
						  $("#subfolder").val('');
					}       
				});
			});
			   $("#purchaseCode").focus();    
					$('#purchaseCode').keyup(function() {
						$(".error").remove(); 
					});  
			   $("body").on("click", "#purchase", function(){
				    var type = $(this).attr("data-type");
					var code = $("#purchaseCode").val();
					var dbhost = $("#data_server").val();
					var dbuser  = $("#data_username").val();
					var dbpassword  = $("#data_password").val();
					var subfolder = $("#subfolder").val();
					var dbname  = $("#data_name").val();  
	                var domain = $("#website_domain").val();
					var data = 'f=' +type +'&code='+code+'&mysql_db_host='+dbhost+'&mysql_db_user='+dbuser+'&mysql_db_pass='+encodeURIComponent(dbpassword)+'&mysql_db_name='+dbname+'&website_domain='+domain+'&subfolder='+subfolder;
					$.ajax({
						  type: 'POST',
						  url: "req/install.php",
						  data: data,
						  beforeSend: function() { 
						      $("#loadPurchase").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
							  $("#loadPurchase").after('<div class="waitaminute">The installation process may take several minutes. Please wait.</div>');
							  $('.errors, .error, .errordata ').remove();
							  $("#data_server").attr( "style", "" );
							  $("#data_username").attr( "style", "" );
							  $("#data_password").attr( "style", "" );
							  $("#data_name").attr( "style", "" );
							  $("#purchaseCode").attr( "style", "" );
						  },
						  success: function(response) {
							  if(response !== '1'){
							         var URL = '?page_in=create_admin';
								     var delay = 1000;  
							         setTimeout(function(){ window.location = URL; }, delay);
							  }
						 }
					  });
				});
		  });
     </script> 
     <?php }  else if($page == 'create_admin') { include_once '../functions/config.php';?>
     <!---->
     <div class="installation_container">
          <!---->
          <div class="installation_box_global">
               <!---->
               <div class="installation_title">Create Your Admin Account</div>
               <!----> 
               <!---->
               <div class="installation_box_middle" id="prcode">
                     <!---->
                     <div class="data_box" id="afteradmin_username"><input type="text" class="fieldinput"  id="admin_username" name="admin_username" placeholder="Admin Username" /></div>
                     <!---->
                     <!---->
                     <div class="data_box" id="afteradmin_fullname"><input type="text" class="fieldinput"  id="admin_fullname" name="admin_fullname" placeholder="Admin Full Name" /></div>
                     <!---->
                     <!---->
                     <div class="data_box" id="afteradmin_email"><input type="text" class="fieldinput"  id="admin_email" name="admin_email" placeholder="Admin E-Mail" /></div>
                     <!---->
                     <!---->
                     <div class="data_box" id="afteradmin_password"><input type="text" class="fieldinput"  id="admin_password" name="admin_password" placeholder="Admin Password" /></div>
                     <!----> 
               </div> 
               <!---->
               <div class="nextStepsCode"  id="loadAdmin">
                   <div class="btn" id="adminceo" data-type="createadmin">Create</div>
               </div>
               <!---->
              <!---->
          </div>
          <!---->
     </div>
     <!---->
      <input type="hidden" id="code" value="<?php echo $purchase;?>"/>
     <script type="text/javascript">
         $(document).ready(function(){
		      var xcode = $(cd).val();
			 if(xcode == ''){
			      var URL = '?page_in=install';
				  var delay = 0;  
				  window.location = URL; 
			  }
			  $("#admin_username").livequery(function() {
				$(this).alphanum({
				  allow: "-_",
				  disallow: "!@$%^&*()+=[]\\';,/{}|\":<>?~`. ",
				  allowSpace: false,
				  allowNumeric: true
				});
			  });
			  $("body").on("click","#adminceo", function(){
			       var type = $(this).attr("data-type");
				   var thecode = $("#code").val();
				   var adminusername = $("#admin_username").val();
			       var adminfullname = $("#admin_fullname").val();
				   var adminemail = $("#admin_email").val();
				   var adminpass = $("#admin_password").val();
				   var data = 'f='+type+'&admin_username='+adminusername+'&admin_fullname='+adminfullname+'&admin_email='+encodeURIComponent(adminemail)+'&admin_password='+encodeURIComponent(adminpass)+'&code='+thecode; 
				  $("#admin_username").attr( "style", "" );
				  $("#admin_fullname").attr( "style", "" );
				  $("#admin_email").attr( "style", "" );
				  $("#admin_password").attr( "style", "" ); 
				   if(adminusername == ''){
					   $("#admin_username").focus().css({'background-color':'rgb(255, 220, 175)'}); 
					   return false; 
				   }
				   if(adminfullname == ''){
					   $("#admin_fullname").focus().css({'background-color':'rgb(255, 220, 175)'}); 
					   return false; 
				   }
				   if(adminemail == ''){
					   $("#admin_email").focus().css({'background-color':'rgb(255, 220, 175)'});  
					   return false;
				   }
				   if(adminpass == ''){
					   $("#admin_password").focus().css({'background-color':'rgb(255, 220, 175)'});  
					   return false;
				   }
				   if(thecode == ''){
				       $("#prcode").after('<div class="errors">You cannot leave the purchase code blank.</div>'); 
				   }
				   $.ajax({
						  type: 'POST',
						  url: "req/install.php",
						  data: data,
						  beforeSend: function() { 
						      $("#loadAdmin").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');  
						  },
						  success: function(response) {
							  if(response == 'is_ok'){
							         var URL = '?page_in=finish';
								     var delay = 1000;  
							         setTimeout(function(){ window.location = URL; }, delay);
							  }
							  if(response == '404'){ 
								   $("#loadAdmin").after('<div class="errordata">There was a problem during installation. Please <a href="https://codecanyon.net/item/oobenn-instagram-style-social-networking-script/17048549/support/contact" target="blank_">CONTACT ME</a>.</div>');	  
							  }
						  }
				   });
			  });
		 });
     </script> 
    
     <?php }else if($page == 'contact'){ ?>
     
     <?php }else if($page == 'finish'){ 
	 include_once '../functions/config.php'; 
	 $delete_file = $base_url.'install/install.lock'; 
	 $note = ''; 
	 if(file_exists($delete_file)) { 
		      unlink($delete_file);
	 }else { 
		   $note = '<div class="errordata">Please delete the "install" folder.</div>'; 
		} 
	  ?>
     <div id="startConfetti" style="display:none;"></div>
     <div id="stopConfetti" style="display:none;"></div>
       <!---->
     <div class="installation_container">
          <!---->
          <div class="installation_box_global"> 
                <div class="congratulation_bg"><img src="icons/hurray.png" /></div>
               <!---->
               <div class="installation_box_middle">
                     <div class="congratulation">Congratulations!</div>
                     <div class="congratulation_title">oobenn script has been successfully installed and your website is ready.</div>
                     <div class="congratulation_info">
                         Login to your admin panel to make changes and modify any default content according to your needs.
                     </div>
               </div> 
               <!---->
               <div class="nextStepsCodeFinish">
                   <div class="finishButtons">
                        <a href="https://codecanyon.net/item/oobenn-instagram-style-social-networking-script/17048549/support/contact"><div class="button_one">Have any question?</div></a>
                   </div>
                   <div class="finishButtons">
                      <a href="<?php echo $base_url;?>"><div class="button_two">Let's Start!</div></a>
                   </div>
               </div>
               <!---->
               <?php echo $note;?>
              <!---->
          </div>
          <!---->
     </div>
     <!---->
     <script type="text/javascript" src="js/jquery.confetti.js"></script>
     <script type="text/javascript"> 
         $(document).ready(function(){ 
             var delay = 5000;
		    jQuery(function(){
		        jQuery('#startConfetti').click();
				setTimeout(
					function(){
					   jQuery('#stopConfetti').click();
					},
			    delay); 
		    }); 
		});
     </script>
     <?php } ?>
</div>
<!----> 
</body>
</html>
