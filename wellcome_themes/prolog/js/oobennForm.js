// JavaScript Document
$(document).ready(function(){ 
// REGISTER FORM STARTED
var form = $('#registerform');
var registerBton = $('#register');

// Form Validates
var firstname = $('#register_username');
var fullnamereg = $("#reg_fullname");
var regemail = $('#reg_email');
var regpassword = $('#reg_password');  
var ugender = $('#gender');
var validated = true;
form.on('submit', function(e) {
    // prevent default action
    e.preventDefault(); 
	//Styles
	firstname.attr( "style", "" );
	fullnamereg.attr( "style", "" );
	regemail.attr( "style", "" );
	if ($.trim(firstname.val() ) === '' ){ // Check if name is not empty
			firstname.focus().css({'background-color':'rgb(197, 70, 71)'});  
			return false;
	 }
	if ($.trim( fullnamereg.val() ) === '' ){ // Check if name is not empty
			fullnamereg.focus().css({'background-color':'rgb(197, 70, 71)'});  
			return false;
	 } 
	if (regemail.val() === ''){  // Check if email is not empty
		  regemail.focus().css({'background-color':'rgb(197, 70, 71)'});  
		  return false;
	  } 
	  if(regpassword.val().length <= 8 ){ // Check if the password is longer than 5 chars.
		  regpassword.focus().css({'background-color':'rgb(197, 70, 71)'});  
		  return false;
	  } 	
	  var validated = true;
		// choose an appropriate selector to select only the selects you need
		$( 'select' ).each( function() {
		  // all selects you are looping through will be referred as this
		  if ( $( this ).find( 'option:selected').val() === '' ) {
			validated = false;
		  // Check if birthday is selected
			$(this).focus().css({ 
			  background: "rgb(197, 70, 71)"
			}); 
		  }
		} );    
	  if(!$("input:radio[name=gender]").is(":checked")){
          ugender.focus().css({'background-color':'rgb(197, 70, 71)'});   
		  return false;
      } 
	  if(!validateEmail(regemail.val())){
          regemail.focus().css({'background-color':'rgb(197, 70, 71)'});  
          return false;
      }   
	jQuery.ajax({
		  type: "POST",
		  url: siteurl + "requests/register.php",
		  data: form.serialize(),
		  beforeSend: function() {
			$("#register").attr("disabled", true); 
	        $("#register").addClass("ld-blur").html("Loading..."); 
	     },  success: function(data) {
			 if($.trim(data) === 'blocked'){
				  window.location.href = siteurl+'sources/blocked.php';
			 }
			 // If something was missing
			 if($.trim(data) === '404'){
				   $("body").append('<div class="somethingEmpty">Please check the required fields during registration.</div>');
			       $("#register").attr("disabled", false); 
	               $("#register").removeClass("ld-blur").html("Register");
			 } 
			 // If username is exist
			 if($.trim(data) === '1'){
			       $(".unot").show();
			       $("#register").attr("disabled", false); 
	               $("#register").removeClass("ld-blur").html("Register");
			 }
			 // If email is exist
			 if($.trim(data) === '2'){
			       $(".enot").show();
			       $("#register").attr("disabled", false); 
	               $("#register").removeClass("ld-blur").html("Register");
			 }
			 // If email is not valid
			 if($.trim(data) === '3'){
			       regemail.focus().css({'background-color':'rgb(197, 70, 71)'});  
			       $("#register").attr("disabled", false); 
	               $("#register").removeClass("ld-blur").html("Register");
			 }
			 // If email is not valid
			 if($.trim(data) === '404'){
			       regemail.focus().css({'background-color':'rgb(197, 70, 71)'});  
			       $("#register").attr("disabled", false); 
	               $("#register").removeClass("ld-blur").html("Register");
			 }
		     // If Register Success
		     if($.trim(data) === 'ok'){
			   setTimeout(function() {
                  $("#register").attr("disabled", false); 
	              $("#register").removeClass("ld-blur").html("Register");
		          $("#registerBoxes").addClass('outWellForm');
		          $("#rap").append("<div class='wellcome__register__wrapper'><div class='hi_user'> "+hi_user + "  "+fullnamereg.val() +"</div><div class='wellcome_succes'>"+welcome_registerSuccess+"</div><div class='redirectiong'>"+redirection+"</div></div>");
              }, 5000);  
		      setTimeout(function() {
			     window.location.href = siteurl;
		      }, 8000);  
	       }
		  
		  
	 }, error: function(data) {
			$("#form_error").html("Error, intenta de nuevo.");
	 }
    });  
});
// REGISTER FORM FINISHED
  function validateEmail(email) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(email);
  }
// LOGIN FORM STARTED

var formLogin = $('#loginform');
var loginBton = $('#login_submit');

var email = $('input[name="login_username"]');
var password = $('input[name="login_password"]'); 
var login_error = $('#error_notification');
formLogin.on('submit', function(e) {
    // prevent default action
    e.preventDefault(); 
	 
	 if (email.val() === ''){  // Check if email is not empty
			email.focus().css({'background-color':'rgb(26, 143, 127)'});  
			return false;
	 }
		
	 if(password.val().length === '' ){ // Check if the password is longer than 5 chars.
			password.focus().css({'background-color':'rgb(26, 143, 127)'});  
			return false;
	 }
	 
	 jQuery.ajax({
		type: "POST",
		url: siteurl+"requests/do_login.php", 
		data: formLogin.serialize(),
		beforeSend: function(){
			 $("#login_submit").attr("disabled", true); 
	         $("#login_submit").addClass("ld-blur").html("Loading..."); 
		 },
		
		success:function(data){
			// If Login have a Problem then
			if($.trim(data) === 'user_error'){
				$("#login_submit").attr("disabled", false); 
	            $("#login_submit").removeClass("ld-blur").html("Login"); 
				$("#username").val('');
				$("#password").val('');
				$("body").append('<div class="attantion_container in"> <div class="attantion_container_in border-radius"> <div class="attantion_container_note"> <div class="attantion_icon"></div> '+incorrectusernameorpass+' </div><div class="close_attantion"></div></div></div>');
				setTimeout(function() { $(".attantion_container").remove(); }, 5000);	
			}
		   // If Login Success
		   if($.trim(data) === 'login_ok'){ 
			  //setTimeout function added to see results.
			  setTimeout(function() {
				  $("#loginBoxes").addClass('outWellForm');
				  $("#lap").append("<div class='wellcome__register__wrapper'><div class='hi_user'> "+hi_user + "  "+email.val() +"</div><div class='wellcome_succes'>"+goodToSeeYou+"</div><div class='redirectiong'>"+transfering+"</div></div>"); 
			  }, 2000);
		      setTimeout(function() {
			      window.location.href = siteurl;
			  }, 8000); 
		   }
		}
	 }); 
	
});
// LOGIN FORM FINISHED
$("body").on("click",".close_attantion", function(){
	 $(".attantion_container").removeClass("in").addClass("out");
	 setTimeout(function() {
		$(".attantion_container").remove();
	  }, 1500);
});
// CHECK USERNAME EXIST OR NOT STARTED
  var x_timer; 
  $('body').delegate('#register_username', 'keyup', function() {
	  clearTimeout(x_timer);
       x_timer = setTimeout(function(){
		   var userCheck = $("#register_username").val();
	       var data = 'username='+ userCheck;
		   $.ajax({
            type: 'POST',
            url: siteurl + "requests/checkusername.php",
            data: data,
            cache: false,
            success: function(response) {
              if(response == 1){
				  $(".unot").show();
				  setTimeout(function(){
					 $(".unot").fadeOut();
				 },8000); 
			  }else{
			      $(".unot").fadeOut();
			  }
			  if(response == 4){
			       $(".unote").show();
				  setTimeout(function(){
					 $(".unote").fadeOut();
				 },8000); 
			  }
            } 
          }); 
	   },1000);
  });
// CHECK USERNAME EXIST OR NOT FINISHED
// CHECK EMAIL EXIST OR NOT STARTED
  var x_timer; 
  $('body').delegate('#reg_email', 'keyup', function() {
	  clearTimeout(x_timer);
       x_timer = setTimeout(function(){
		   var emailCheck = $("#reg_email").val();
	       var data = 'email='+ emailCheck;
		   $.ajax({
            type: 'POST',
            url: siteurl + "requests/checkemail.php",
            data: data,
            cache: false,
            success: function(response) {
              if(response == 1){
				  $(".enot").show();
				  setTimeout(function(){
					 $(".enot").fadeOut();
				 },8000); 
			  }else{
			      $(".enot").fadeOut();
			  }
            } 
          }); 
	   },1000);
  });
// CHECK EMAIL EXIST OR NOT FINISHED 
$(".numeric").livequery(function() {
    $(this).alphanum({
      allow: "_-",
      disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.",
      allowSpace: false,
      allowNumeric: true
    });
  }); 
  $(".space").livequery(function() {
    $(this).alphanum({ 
	  allow: "_-.@",
      allowSpace: false,
      allowNumeric: true
    });
  });
});