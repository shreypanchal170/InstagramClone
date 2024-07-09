// JavaScript Document
$(document).ready(function(){ 
var Loading = '<div class="page-loading-container in"><div class="page-loading-animation-box"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>';
var success = '<div class="page-loading-container-two in"><div class="page-loading-animation-box"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg></div></div>';     
// Open Register Modal 
$("body").on("click","#call_register", function(){
	$(".popUp__Wrapper").addClass("modal-open");
	$(".modal-middle").addClass("middle_open");
});
// Close Register Modal
$("body").on("click",".close_register", function(){
	$(".popUp__Wrapper").removeClass("modal-open");
	$(".modal-middle").removeClass("middle_open");
});

// Open Langauge Modal 
$("body").on("click","#languages", function(){
	$(".languagePopUpContainer").addClass("modal-open");
	$(".register-modal-middle").addClass("middle_open");
});
// Close Langauge Modal
$("body").on("click",".close_languages", function(){
	$(".languagePopUpContainer").removeClass("modal-open");
	$(".register-modal-middle").removeClass("middle_open");
});
$("body").on("click",".close_maintenance", function(){ 
   $(".maintenance_note_container").removeClass("fadeInMaintenance").addClass("fadeOutMaintenance");
});
// Change Language From WellCome Page
$("body").on("click",".lang_name_box", function(){
	  var lang = $(this).attr("data-lang");
	  var change = 'lang='+lang;
	  
	  $.ajax({
      type: 'GET',
      url: siteurl + "wellcome.php",
      data: change,
      cache: false,
      beforeSend: function() {
        // Do Something
      },
      success: function(response) {
        $('body').html(response);  
      }
    });
});
//Declare variables from Register Form.
var form = $('#registerform');
var submit_register = $('#register');

var firstname = $('#register_username');
var firstnameicon = $("#reg_user_icon");
var fullnamereg = $("#reg_fullname");
var fullnameregicon = $("#reg_fullname_icon");
var regemail = $('#reg_email');
var regemailicon = $('#email_icon');
var regpassword = $('#reg_password');
var regpassicon = $('#pass_icon');
var agree = $('input[type="radio"][name="gender"]:checked');
var birthday = $("select[name='birth_day']");
var birthmonth = $("select[name='birth_month']");
var birthyear = $("select[name='birth_year']");
var ugender = $('#gender');
var validated = true;

form.on('submit', function(e) {
    // prevent default action
    e.preventDefault();
	
	firstname.attr( "style", "" );
	firstnameicon.attr( "style", "" );
	fullnamereg.attr( "style", "" );
	fullnameregicon.attr( "style", "" );
	regemail.attr( "style", "" );
	regemailicon.attr( "style", "" );
	regpassword.attr( "style", "" );
	regpassicon.attr( "style", "" ); 
	birthday.attr( "style", "" );
	birthmonth.attr( "style", "" );
	birthyear.attr( "style", "" );
	$('#password_length').hide();
	$('#agree_terms').hide();
	$('#email_error').hide();
	$('#user_error').hide();
	$('#form_error').hide();
	
	if ($.trim( firstname.val() ) === '' ){ // Check if name is not empty
			firstname.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
			firstnameicon.focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
			return false;
	 }
	if ($.trim( fullnamereg.val() ) === '' ){ // Check if name is not empty
			fullnamereg.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
			fullnameregicon.focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
			return false;
	 }	
		
	  if (regemail.val() === ''){  // Check if email is not empty
		  regemail.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
		  regemailicon.focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
		  return false;
	  }
	  
	  if(regpassword.val().length <= 8 ){ // Check if the password is longer than 5 chars.
		  regpassword.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'});
		  regpassicon.focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
		  $('#password_length').show().html('Your password should be at least 8 characters');
		  return false;
	  } 
	  var validated = true;
    // choose an appropriate selector to select only the selects you need
    $( 'select' ).each( function() {
      // all selects you are looping through will be referred as this
      if ( $( this ).find( 'option:selected').val() === '' ) {
        validated = false;
      // Check if birthday is selected
        $( this ).focus().css({
          border: "2px solid rgba(255, 0, 0, 0.6)",
          background: "rgba(255, 0, 0,.05)",
          transition: "all 0.15s ease-out;"
        });
      }
    } );  
    // preventing default behavior if a field is empty 
	  if (agree.length < 0){ // Check if terms is checked 
		  ugender.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
		  return false;
	  }  
	  
	  jQuery.ajax({
                type: "POST",
                url: siteurl+"requests/register.php",
                data: form.serialize(),
				beforeSend: function(){
					$("#formRegister").append(Loading);
                    submit_register.attr("disabled", "disabled");
				}, 
                success:function(data){ 
				setTimeout(function() {
					$(".page-loading-container").removeClass("in").addClass("out");
				 }, 600);
                     if($.trim(data) === '0'){
						 regemail.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'});
					     $('#email_error').show().html('Not a valid email format');	
                         submit_register.html('Create').removeAttr('disabled');  
					}else
					if($.trim(data) === '1'){
					      $("#formRegister").after('<div class="alreadyexist"><div class="alreadyexist_in">'+u_alreadyinuse+'</div></div>'); 
						  $(".b_u").focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
						  $(".b_u").focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
						  submit_register.html('Create').removeAttr('disabled');  
						  setTimeout(function(){
							 $(".alreadyexist").fadeOut();
						 },2000); 
					}else
					if($.trim(data) === '4'){
						  if (!$(".alreadyexist")[0]){
							  $("#register__form").after('<div class="alreadyexist"><div class="alreadyexist_in">'+report_non_english_character+'</div></div>'); 
							  $(".b_u").focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
							  $(".b_u").focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
							  submit_register.html('Create').removeAttr('disabled');  
							  setTimeout(function(){
							   $(".alreadyexist").remove();
							  },2000);
						   } 
					  }
					else
					if($.trim(data) === '2'){
						regemail.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'});
					  $('#email_error').show().html('That email is already registered');	
                      submit_register.html('Create').removeAttr('disabled');  
					}
					else
					if($.trim(data) === 'error'){
					  $('#form_error').show().html('Error, try again');	
                      submit_register.html('Create').removeAttr('disabled');  
					}
					else
					if($.trim(data) === 'ok'){
					setTimeout(function() { 
						 $("#formRegister").append(success);
						 setTimeout(function() {
						    window.location.href = siteurl;
						 }, 2000);
						 
                    }, 2000);
				    }
					else
					if($.trim(data) === 'blocked'){
					     window.location.href = siteurl+'sources/blocked.php';
					}
			},
error: function(data){
$('#form_error').html('Error, intenta de nuevo.');		
},				
            })  
});
//Declare variables from Login Form.
var formLogin = $('#loginform');
var login_Btn = $('#login_submit');
 
var email = $('input[name="login_username"]');
var password = $('input[name="login_password"]'); 
var login_error = $('#error_notification');
formLogin.on('submit', function(e) {
    // prevent default action
    e.preventDefault();
	
	email.attr( "style", "" );
	password.attr( "style", "" );
	login_error.hide();
	
	
	
		if (email.val() === ''){  // Check if email is not empty
			email.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
			return false;
		}
		
		if(password.val().length === '' ){ // Check if the password is longer than 5 chars.
			password.focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'});
			return false;
		}
		

        jQuery.ajax({
                type: "POST",
                url: siteurl+"requests/do_login.php", 
                data: formLogin.serialize(),
				beforeSend: function(){
					$(".container-main").append(Loading);
					login_Btn.attr('disabled', 'disabled');	
				},
				
                success:function(data){
					setTimeout(function() {
					   $(".page-loading-container").removeClass("in").addClass("out");
				    }, 600);
                    if($.trim(data) === 'user_error'){
						setTimeout(function() {
					  		login_error.show().html('Email or password incorrect');
						 	login_Btn.html('Login').removeAttr('disabled');  
						}, 2000);	
                      
					}
					else
					if($.trim(data) === 'login_ok'){ 
					    $(".container-main").append(success);
						//setTimeout function added to see results.
						setTimeout(function() {
							
							setTimeout(function() {
								 window.location.href = siteurl;
							}, 1000);
						
							login_Btn.html('Register');
						}, 2000);
					
               		 }
			},
error: function(data){
login_error.show().html('Something went wrong, try again');		
},				
  })
    });
  // Reset Forgot Password
  $("body").on("click","#resetPassword", function(){
	   var r_email = $("#r_email").val();
	   var data = 'reset_mail=' + r_email;
	   $.ajax({
        type: 'POST',
        url: siteurl + "requests/reset_password.php",
        data: data,
        cache: false,
        beforeSend: function() {
	       $("#reset_p").hide();
		   $("#show_what").append("<div class='spinnerLoad'></div>");
	    },
        success: function(response) {
           if(response == 'sended'){
			  $("#show_what").append('<div class="n_in sendedMail"><p>'+sendedPasswordID+'</p><p>'+MakeSureJunkFile+'</p></div>');
			  $("#reset_p").remove(); 
			  $(".spinnerLoad").remove(); 
		   }
		   if(response == 'No') {
			 $("#reset_p").show();
			 $(".spinnerLoad").remove();
			 $("#show_what").append('<div class="n_in notsendedMail" id="error_l">'+sureEmail+'</div>'); 
		   }
        }
      });
  });
   // Change The Password
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
		   $("#reset_p").hide();
		   $("#show_what").append("<div class='spinnerLoad'></div>");
		},
        success: function(response) {
           if(response == 'changed'){
			  $("#reset_p").remove(); 
			  $(".spinnerLoad").remove(); 
			  $("#show_what").append('<div class="n_in changeSuccess">'+SuccessChange+'</div>'+LoginNewNow+'');
			  $("#error_l").remove(); 
		   }
		   if(response == 'notSame'){
		      $("#reset_p").show(); 
			  $(".spinnerLoad").remove(); 
			  $("#show_what").append('<div class="n_in notsendedMail" id="error_l">'+NotMatchPass+'</div>');
		    }
		   if(response == 'wrong'){
		      $("#reset_p").show(); 
			  $(".spinnerLoad").remove(); 
			  $("#show_what").append('<div class="n_in notsendedMail" id="error_l">'+SomethingWrong+'</div>');
		    }
			if(response == 'short'){
		      $("#reset_p").show(); 
			  $(".spinnerLoad").remove(); 
			  $("#show_what").append('<div class="n_in notsendedMail" id="error_l">'+ShouldBeEightChar+'</div>');
		    }
        }
      });  
  });  
// Check username is valid or not
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
				  $("#formRegister").after('<div class="alreadyexist"><div class="alreadyexist_in">'+u_alreadyinuse+'</div></div>'); 
				  $(".b_u").focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
			      $(".b_u").focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
				  setTimeout(function(){
					 $(".alreadyexist").fadeOut();
				 },2000); 
			  }
			  if(response == 4){
			      if (!$(".alreadyexist")[0]){
			          $("#formRegister").append('<div class="alreadyexist"><div class="alreadyexist_in">'+report_non_english_character+'</div></div>'); 
				      $(".b_u").focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
			          $(".b_u").focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
				      setTimeout(function(){
					   $(".alreadyexist").remove();
				      },2000);
			      } 
			  }
            } 
          }); 
		  } 
    }, 500); 
  });
// Check Email is valid or not
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
				 $("#formRegister").append('<div class="alreadyexist"><div class="alreadyexist_in">'+e_alreadyinuse+'</div></div>'); 
				 $(".icon_email").focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'}); 
			      $(".icon_email").focus().css({'border-right':'2px solid rgba(255, 0, 0, 0.6)'});
				  setTimeout(function(){
					 $(".alreadyexist").fadeOut();
				 },2000); 
			  }
            } 
          }); 
		  } 
    }, 500); 
  });
});