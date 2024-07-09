$(document).ready(function(){    
var Loading = '<div class="page-loading-container in"><div class="page-loading-animation-box"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>';
var success = '<div class="page-loading-container-two in"><div class="page-loading-animation-box"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg></div></div>';
/*Open Register Modal*/ 
$("body").on("click",".column_right_header_button", function(){
	$(".popUp__Wrapper").addClass("modal-open");
	$(".modal-middle").addClass("middle_open");
});
/*Close Register Modal*/ 
$("body").on("click",".close_register", function(){
	$(".popUp__Wrapper").removeClass("modal-open");
	$(".modal-middle").removeClass("middle_open");
});
/*Close Register Modal*/ 
$("body").on("click",".close_register", function(){
	$(".popUp__Wrapper").removeClass("modal-open");
	$(".modal-middle").removeClass("middle_open");
});

/*Open Langauge Modal*/ 
$("body").on("click","#languages", function(){
	$(".languagePopUpContainer").addClass("modal-open");
	$(".register-modal-middle").addClass("middle_open");
});
/*Close Langauge Modal*/ 
$("body").on("click",".close_languages", function(){
	$(".languagePopUpContainer").removeClass("modal-open");
	$(".register-modal-middle").removeClass("middle_open");
});
$("body").on("click",".close_maintenance", function(){ 
   $(".maintenance_note_container").removeClass("fadeInMaintenance").addClass("fadeOutMaintenance");
});
/*Change Language From WellCome Page*/ 
$("body").on("click",".lang_name_box", function(){
	  var lang = $(this).attr("data-lang");
	  var change = 'lang='+lang; 
	  $.ajax({
      type: 'GET',
      url: siteurl + "wellcome.php",
      data: change,
      cache: false,
      beforeSend: function() {
        /*Do Something*/ 
      },
      success: function(response) {
        $('body').html(response);  
      }
    });
});
/*Declare Variables from Login Form*/
var formLogin = $('#loginform');
var login_Btn = $('#login_submit');
 
var email = $('input[name="login_username"]');
var pass = $('input[name="login_password"]'); 
var login_error = $('#error_notification');
formLogin.on('submit', function(e) { 
    e.preventDefault();
	if(email.val() === ''){  
		 email.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)','background-color':'rgba(0,0,0,.5)', 'transition': 'all 0.15s ease-out;'}); 
		 return false;
    }
	if(pass.val() === '' ){ 
	     pass.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background-color':'rgba(0,0,0,.5)', 'transition': 'all 0.15s ease-out;'});
		 return false;
	}
	/*Login*/
	 jQuery.ajax({
		 type: "POST",
             url: siteurl+"requests/do_login.php", 
             data: formLogin.serialize(),
		     beforeSend: function(){  
				 $("#login_form_container").addClass("hideForProgress");
				 setTimeout(function() {
					$('<div class="progressme"><div class="indeterminate"></div></div>').insertBefore('#login_form_container');
				 }, 370); 
			 },
			 success:function(data){
				 if($.trim(data) === 'login_ok'){   
					    window.location.href = siteurl; 
			     } else {  
					 setTimeout(function() {
						 $("#login_form_container").removeClass("hideForProgress"); 
						 $(".progressme").remove(); 
						 $(".attantion_container").show();
						 setTimeout(function() { $(".attantion_container").hide(); }, 5000);	   
				     }, 2000);	
				 }
			 }
	 });
});
/*Declare Variables from Register Form */
var formRegister = $('#registerform');
var submit_register = $('#register');

var reg_username = $('#register_username');
var reg_fullname = $("#reg_fullname");
var reg_email = $('#reg_email');
var reg_password = $('#reg_password');
var reg_gender = $("input[type='radio'][name='gender']:checked");
var reg_birthday = $("select[name='birth_day']");
var reg_birthmonth = $("select[name='birth_month']");
var reg_birthyear = $("select[name='birth_year']");
formRegister.on('submit', function(e) { 
    e.preventDefault(); 
	if ($.trim(reg_username.val() ) === '' ){
		 reg_username.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});  
		 return false;
	}else{
	    reg_username.css({'border':'2px solid rgba(231, 231, 231)', 'background':'rgba(255,255,255, 0)', 'transition': 'all 0.15s ease-out;'});  
	}
	if ($.trim(reg_fullname.val() ) === '' ){
		 reg_fullname.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});  
		 return false;
	}else{
	    reg_fullname.css({'border':'2px solid rgba(231, 231, 231)', 'background':'rgba(255,255,255, 0)', 'transition': 'all 0.15s ease-out;'});  
	}
	if ($.trim(reg_email.val() ) === '' ){
		 reg_email.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
		 return false;
	}else{
	    reg_email.css({'border':'2px solid rgba(255, 255, 255)', 'background':'rgba(231,231,231)', 'transition': 'all 0.15s ease-out;'});  
	}
	if(reg_password.val().length < 8 ){
		 $(".passwordNotValid").fadeIn(); 
		 reg_password.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
		 return false;
    }else{
		 reg_password.css({'border':'2px solid rgba(255, 255, 255)', 'background':'rgba(231,231,231)', 'transition': 'all 0.15s ease-out;'});   
	     $(".passwordNotValid").fadeOut(); 
	}
	if($.trim(reg_birthday.val()) === ''){
		$("#subscription_day").css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
	    return false;
	}else{
	    $("#subscription_day").css({'border':'2px solid rgba(231, 231, 231)', 'transition': 'all 0.15s ease-out;'}); 
	}
	if($.trim(reg_birthmonth.val()) === ''){
		$("#subscription_month").css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
	    return false;
	}else{
	    $("#subscription_month").css({'border':'2px solid rgba(231, 231, 231)', 'transition': 'all 0.15s ease-out;'}); 
	}
	if($.trim(reg_birthyear.val()) === ''){
		$("#subscription_year").css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
	    return false;
	}else{
	    $("#subscription_year").css({'border':'2px solid rgba(231, 231, 231)', 'transition': 'all 0.15s ease-out;'}); 
	}
	if(!$(".with-gap:checked").val()){
		$(".choseGender").fadeIn(); 
	    return false;
	}else{
	    $(".choseGender").fadeOut(); 
	}
	jQuery.ajax({
			type: "POST",
			url: siteurl+"requests/register.php",
			data: formRegister.serialize(),
			beforeSend: function(){
				$(".modal-middle").append(Loading);
			},success:function(data){ 
			     setTimeout(function() {
					 $(".page-loading-container").removeClass("in").addClass("out"); 
				 }, 600);
			     if($.trim(data) === '1'){
				        $('.usernameUsed').fadeIn();
				 }
				 if($.trim(data) === '2'){
				      $('.emailAlreadyUsed').fadeIn();
				 }
				 if($.trim(data) === '3'){
				       $('.emailNotValid').fadeIn();
				 }
				 if($.trim(data) === '4'){
				       $('.justEnglishCharacter').fadeIn();
				 }
				 if($.trim(data) === '5'){
				       $('.ipNot').fadeIn(); 
				 }
				 if($.trim(data) === '6'){
				      window.location.href = siteurl + "sources/blocked.php";
				 }
				 if($.trim(data) === 'ok'){ 
				      $(".modal-middle").append(success);
				      window.location.href = siteurl;
				 }   
			}
	});
});
/*Check Username Exist*/
var timer = null; 
$('body').delegate('#register_username', 'keyup', function() {
  clearTimeout(timer);
  timer = setTimeout(function() {
	 var userCheck = $("#register_username").val();
	 var data = 'username='+ userCheck;
	 if( userCheck.length < 3 ) {
		//Do something 
	 }else{
		$.ajax({
		  type: 'POST',
		  url: siteurl + "requests/checkusername.php",
		  data: data,
		  cache: false,
		  success: function(response) {
			if(response == 1){
				$(".usernameUsed").show(); 
			}
			if(response == 2){ 
			    $(".justEnglishCharacter , .usernameUsed").fadeOut(); 
			}
			if(response == 4){ 
				$(".justEnglishCharacter").show(); 
			}
		  } 
		}); 
		} 
  }, 500); 
});
var timer = null; 
$('body').delegate('#reg_email', 'keyup', function() {
  clearTimeout(timer);
  timer = setTimeout(function() {
	 var emailCheck = $("#reg_email").val();
	 var data = 'email='+ emailCheck;
	 if( emailCheck.length < 3 ) {
		 //Do something
	 }else{
		$.ajax({
		  type: 'POST',
		  url: siteurl + "requests/checkemail.php",
		  data: data,
		  cache: false,
		  success: function(response) {
			if(response == 1){
				$(".emailAlreadyUsed").show(); 
				$(".emailNotValid").hide(); 
			}
			if(response == 2){
			   $(".emailAlreadyUsed , .emailNotValid").fadeOut();
			}
			if(response == 3){
			   $(".emailAlreadyUsed").hide(); 
			   $(".emailNotValid").show();  
			}
		  } 
		}); 
		} 
  }, 500); 
});
/*Reset Forgot Password*/ 
$("body").on("click","#resetPassword", function(){
	 var r_email = $("#r_email").val();
	 var data = 'reset_mail=' + r_email;
	 $.ajax({
		  type: 'POST',
			  url: siteurl + "requests/reset_password.php",
			  data: data,
			  cache: false,
			  beforeSend: function() {
				 $(".nin").hide(); 
				 $("#show_what").append('<div class="progress"><div class="indeterminate"></div></div>'); 
			  },
			  success: function(response) {
				 if(response == 'sended'){
					 $(".sendedMail").fadeIn();
					 $("#reset_p").remove(); 
					$(".progress").remove(); 
				 }
				 if(response == 'No') {
					 $(".nin").show(); 
				    $("#reset_p").show();
				   $(".progress").remove(); 
				   $('.notsendedMail').fadeIn();
				 }
			  }
     });
});
/*Change The Password*/
$("body").on("click","#ChangePassword", function(){
  var newPassword = $("#new_password").val();
  var newPasswordAgain = $("#re_new_password").val();
  var get = $("#code").val();
  var  data = 'new_password=' +newPassword+ '&new_password_again=' +newPasswordAgain+ '&activeid=' +get ;
  $.ajax({
	type: 'POST',
	url:  siteurl + "requests/change_password.php",
	data: data,
	cache: false,
	beforeSend: function() {
	   $(".nin").hide(); 
	   $("#show_what").append('<div class="progress"><div class="indeterminate"></div></div>'); 
	},
	success: function(response) {
	   if(response == 'changed'){
		  $("#reset_p").remove(); 
		  $(".progress").remove(); 
		  $('.changeSuccess , .lgnnews').fadeIn();
		  $("#error_l").remove(); 
	   }
	   if(response == 'notSame'){
		  $("#reset_p").show(); 
		  $(".progress").remove(); 
		  $('.notsendedMail').fadeIn();
		  $(".nin").show(); 
		}
	   if(response == 'wrong'){
		  $("#reset_p").show(); 
		  $(".progress").remove(); 
		  $('.notsendedMail').fadeIn();
		  $(".nin").show(); 
		}
		if(response == 'short'){
		  $("#reset_p").show(); 
		  $(".progress").remove();  
		  $(".nin").show(); 
		  $('.ShouldBeEightChar').fadeIn();
		}
	}
  });  
});  
$("body").on("click",".close_attantion", function(){
   $(".attantion_container").removeClass("in").addClass("out");
   setTimeout(function() {
	  $(".attantion_container").remove();
   }, 1500);
});
$(".numeric").livequery(function() {
  $(this).alphanum({
	allow: "_-",
	disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.",
	allowSpace: false,
	allowNumeric: true
  });
});
});