// JavaScript Document
$(document).ready(function() { 
	$("body").on("click",".post_modal_wral_close_co", function(){
         $(".postButtonItem").addClass('postButtonItemOut');
		 setTimeout(function() {
			// $('.poSBoxContainer').remove();
			 $(".poSBoxContainer").fadeOut("normal", function() {
					$(this).remove();
				});
		 }, 1100);
	});
	// Read more
$("body").on("click",".showMoreCategories", function(){
	   var title = $(this).attr("title"); 
	   var more = $(this).attr("data-more");
	   var less = $(this).attr("data-less");
	   if(title == 'more'){
		     $(".marginPlace_h_l_in").addClass("showAllMenu"); 
			 $(this).attr("title",'less');
			 $(".cht_m").html(less);
			 $(".icls_m").html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#292929"><path d="M19.2,96c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8zM100.5248,65.8752l38.4,38.4c1.248,1.248 1.8752,2.8864 1.8752,4.5248c0,1.6384 -0.6272,3.2768 -1.8752,4.5248c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0l-33.8752,-33.8752l-33.8752,33.8752c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0c-2.5024,-2.5024 -2.5024,-6.5472 0,-9.0496l38.4,-38.4c2.5024,-2.5024 6.5472,-2.5024 9.0496,0z"></path></g></g></svg>');
	   }else{
	         $(".marginPlace_h_l_in").removeClass("showAllMenu");
			 $(this).attr("title",'more');
			 $(".cht_m").html(more);
			 $(".icls_m").html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#292929"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg>');
	   }
});  
$("body").on("click",".prduct", function(){  
     window.history.replaceState({},requestUrl, requestUrl+'mymarket/'+$(this).attr("href")); 
	    var href = $(this).attr("href");  
		var type = 'productDetails';
		var data = 'f='+type+'&prdct='+href;
		$.ajax({
			type: "POST",
			url: requestUrl + "requests/out",
			data: data, 
			beforeSend: function(){ 
			   $('body').addClass('disableScroll'); 
			},
			success: function(html) {
				if(html){ 
				  $("body").append(html);  
				  setTimeout(function() {
					$('.product_popUp_container , .product_popUp_container_edit').removeClass('prdct_in');
				  }, 900); 
				  
				}else{
				   $('body').removeClass('disableScroll');  
				}
			}
		}); 
    return false;
}); 
  /*Close Product Box*/
  $("body").on("click", ".closeProductDetails", function(){  
      $(".product_popUp_container , .product_popUp_container_edit").addClass("prduct_close");  
	    urlBase = $('#the_page').attr('data-current');
	    window.history.replaceState({},requestUrl, urlBase); 
	     setTimeout(function() {
            $(".product_popUp_wrapper").remove();
			$('body').removeClass('disableScroll');  
          }, 900);   
  });
$("body").on("focus",".addComment", function(){
    var ID = $(this).attr("id");
	$(".h_body"+ID).show();  
 });
$('.collapsible').livequery(function() { 
  $(this).collapsible();
  }); 
    // Replace Feeling
  $("body").on("click", ".feeling-box", function() {
    var ID = $(this).attr("id");
    var f_activity = $(this).attr("data-alt");
	var f_status = $(this).attr("data-status");
	var valuef= $("#f_val").val(ID);
    $(".feeling-activity").html('<div class="u-feeling" id="fus"><img src="'+ f_activity +'" class="emoji"> '+f_status+'<div class="remove_fus"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M37.625,21.5c-8.86035,0 -16.125,7.26465 -16.125,16.125v96.75c0,8.86035 7.26465,16.125 16.125,16.125h96.75c8.86035,0 16.125,-7.26465 16.125,-16.125v-96.75c0,-8.86035 -7.26465,-16.125 -16.125,-16.125zM37.625,32.25h96.75c3.02344,0 5.375,2.35156 5.375,5.375v96.75c0,3.02344 -2.35156,5.375 -5.375,5.375h-96.75c-3.02344,0 -5.375,-2.35156 -5.375,-5.375v-96.75c0,-3.02344 2.35156,-5.375 5.375,-5.375zM61.56055,54.00196l-7.55859,7.55859l24.39746,24.43945l-24.39746,24.39746l7.55859,7.64258l24.43945,-24.43946l24.39746,24.43946l7.64258,-7.64258l-24.43946,-24.39746l24.43946,-24.43945l-7.64258,-7.55859l-24.39746,24.39746z"></path></g></g></g></svg></div></div>');
	setTimeout(function() {
        $(".social_share_buttons_container").remove();
	     $(".fixedBackground").remove();
    }, 500);
  });
  //Remove Selected Feeling Activity
  $("body").on("click",".remove_fus",function(){
	$("#fus").remove(); 
	$("#f_val").val('');  
  });
  
$("body").on("click",".show_hide_other_days", function(){
     if (!$(".show_hide_other_days").hasClass("degree")) {
      $(".show_hide_other_days").addClass("degree");
	  $(".otherWeathers").addClass("wso");
    } else {
      $(".show_hide_other_days").removeClass("degree");
	  $(".otherWeathers").removeClass("wso");
    }
}); 
//////// 
var clipboard = new ClipboardJS('.copyUrl');  
// Read more
$("body").on("click",".showMoreText", function(){
	   var title = $(this).attr("title");
	   var ID = $(this).attr("id");
	   var more = $(this).attr("data-more");
	   var less = $(this).attr("data-less");
	   if(title == 'more'){
		     $(".post_info"+ID).removeClass("readmore").addClass("all_text"); 
			 $(this).attr("title",'less');
			 $(".cht_"+ID).html(more);
			 $(".icls_"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M19.2,96c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8zM100.5248,65.8752l38.4,38.4c1.248,1.248 1.8752,2.8864 1.8752,4.5248c0,1.6384 -0.6272,3.2768 -1.8752,4.5248c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0l-33.8752,-33.8752l-33.8752,33.8752c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0c-2.5024,-2.5024 -2.5024,-6.5472 0,-9.0496l38.4,-38.4c2.5024,-2.5024 6.5472,-2.5024 9.0496,0z"></path></g></g></svg>');
	   }else{
	         $(".post_info"+ID).addClass("readmore").removeClass("all_text");
			 $(this).attr("title",'more');
			 $(".cht_"+ID).html(less);
			 $(".icls_"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg>');
	   }
});
// Read more
$("body").on("click",".showMoreTexts", function(){
	   var title = $(this).attr("title");
	   var ID = $(this).attr("id");
	   var more = $(this).attr("data-more");
	   var less = $(this).attr("data-less");
	   if(title == 'more'){
		     $(".post_infos"+ID).removeClass("readmore").addClass("all_text"); 
			 $(this).attr("title",'less');
			 $(".cht_"+ID).html(more);
			 $(".icls_"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M19.2,96c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8zM100.5248,65.8752l38.4,38.4c1.248,1.248 1.8752,2.8864 1.8752,4.5248c0,1.6384 -0.6272,3.2768 -1.8752,4.5248c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0l-33.8752,-33.8752l-33.8752,33.8752c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0c-2.5024,-2.5024 -2.5024,-6.5472 0,-9.0496l38.4,-38.4c2.5024,-2.5024 6.5472,-2.5024 9.0496,0z"></path></g></g></svg>');
	   }else{
	         $(".post_infos"+ID).addClass("readmore").removeClass("all_text");
			 $(this).attr("title",'more');
			 $(".cht_"+ID).html(less);
			 $(".icls_"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#db3481"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg>');
	   }
});
 
$("#watermarktext").livequery(function() { 
    $(this).charCounter();   
  });  
$(".tooltipsteredOn").livequery(function() { 
    $(this).tooltipster();  
});
$(".tooltipstered").livequery(function() { 
    $(this).tooltipster({  
	    content: '...',
		'maxWidth': 380,
		contentCloning: false,
		contentAsHTML: true,
		interactive: true,  
		functionBefore: function(instance, helper) {  
		     var mai = $(helper.origin).attr("data-tip");
			 var type = 'howtouse';
			 var data = 'f='+type+'&help='+mai;  
			 $.ajax({
				type: 'POST',
				url: requestUrl+'requests/activity',
				data: data,
				success: function(html) {
					 instance.content(html);  
				}
			  });  
        } 
   });   
  });

$(".gallery").livequery(function() { 
    $(this).lightGallery({
        selector: '.sldimg , .whichImage',  
		share: false
    });   
  }); 
   $(".single-image").livequery(function() { 
     $(this).lightGallery({
        selector: 'this',
		share: false
     }); 
  });    
  $('.bottom_posts_button').floatingActionButton();
/*Scroll Hide Bottom Menu*/
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    $('#fastMenu').removeClass('hideZoomOut').addClass('showZoomIn');
  } else {
    $('#fastMenu').removeClass('showZoomIn').addClass('hideZoomOut');
  }
  prevScrollpos = currentScrollPos;
} 
/*Notification Sounds*/
	ion.sound({
		sounds: [
			{name: "whatsapp"},
			{name: "click"},
			{name: "alert"},
			{name: "liked"},
			{name: "profilefollow"}, 
			{name: "notification"},
			{name: "fastClicked"},
			{name: "fastanswer"} ,
			{name: "camera_flashing_2"},
			{name:"glass_breaking"},
			{name:"return"},
			{name:"ex"},
			{name:"water_droplet_3"}
		], 
		// main config
		path: requestUrl+"sounds/",
		preload: true, 
		volume: 1.0
	}); 
	function ScrollBottomChat(){
	   var logDown = $('.all_messages');
	   logDown.animate({ scrollTop: logDown.prop('scrollHeight')}, 0);
	}
	
  //PopUp Loading Animation
  var preLoaderPopUp = '<div class="popUpPreLoaderWrap initial" id="postPopUpBox"><div class="popUpPreLoaderContainer initial"><div class="popUpPreLoaderMiddle initial"><div class="preloader-wrapper small active  initial"><div class="spinner-layer spinner-blue initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-red initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-yellow initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-green initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div></div></div></div></div>';
  var preLoaderUploadImageBig = '<div class="preview-screen preLoaderPreviewImage"><div class="preloader-wrapper big active  initial"><div class="spinner-layer spinner-blue initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-red initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-yellow initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-green initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div></div></div>';
  var loadingMini = '<div class="preloader-wrapper small active initial loadingUrl"><div class="spinner-layer spinner-blue initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-red initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-yellow initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-green initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div></div>'; 
  var TumblrStyleLoaderCss = '<span class="Knight-Rider-loader animate"><span class="Knight-Rider-bar"></span><span class="Knight-Rider-bar"></span><span class="Knight-Rider-bar"></span></span>';
  var reportSended = '<div class="reportPos-modal-middle-finish"><div class="reportTextTitle">'+roger+'</div><div class="reporTextInfo">'+reportSendedText+'</div></div>';
  //MediaElementPlayer
  $("video.vidchaVideo").livequery(function() {
    $(this).mediaelementplayer({
      audioWidth: "100%",
      audioHeight: 30,
      autoplay: true
    });  
  });
 $("audio.player_aud").livequery(function() { 
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
  
   // Post Slider
  $(".products-column").livequery(function() {
    $(this).slick({
      arrows: true,
      dots: false,
      auto: true,
	  autoplay: true,
      speed: 300,
      autoSpeed: 8000 
    }); 
  });
  // Which Caregory Slider
  $(".categorieslistBox").livequery(function() {
    $(this).slick({
      dots: false,
      infinite: false,
      speed: 300,
      arrows: false,
      slidesToShow: 5,
      slidesToScroll: 5,
      variableWidth: true
    });
  }); 
  function AutoTiseTextArea(){
     autosize(document.querySelectorAll('textarea'));
   }
   AutoTiseTextArea();
  $(".timeago , .postCreatedTime , .comti , .profileRegisteredTime , .ltime , .announceTime").livequery(function() {
    $(this).timeago();
  });
 
  $(".commentitem_ .post_title , .post_title_info, .postTextNot").livequery(function() {
    $(this).linkify();
  });
  $(".giphyClass").livequery(function() {
    $(this).freezeframe({overlay: true});
  });
  $(".selectOpi").livequery(function() { 
	$(this).formSelect();
  });
  // Post between suggested trending tags
  $(".column-tag").livequery(function() {
    $(this).slick({
      dots: false,
      infinite: false,
      speed: 300,
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 3,
      variableWidth: true
    });
  });  
  //Post Hashtags
  /*$(".hashtags").livequery(function() {
    $(this).slick({
      dots: false,
      infinite: false,
      speed: 300,
      arrows: false,
      slidesToShow: 5,
      slidesToScroll: 5,
      variableWidth: true
    });
  });*/
  //Post Hashtags
  $(".filters_container").livequery(function() {
    $(this).slick({
      dots: false,
      infinite: false,
      speed: 900,
      arrows: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      variableWidth: true
    });
  });
  $(".stories").livequery(function() {
    $(this).slick({
      dots: false,
      infinite: false,
      speed: 300,
      arrows: false,
      slidesToShow: 5,
      slidesToScroll: 5,
      variableWidth: true
    });
  });
  // Hover Tool Tips from Material Design
  $(".show_this").livequery(function() {
    $(this).tooltip();
  });
  $(".materialboxed").livequery(function() {
    $(this).materialbox(); 
  });
  $(".c_btn").livequery(function() {
   $(this).confettiButton({
	  hoverOnly: true
	});
  });
 
  // Auto add Diez Tag
  $("body").on("cut copy paste", "#hashTag", function(e) {
    e.preventDefault();
  });
  $("body").on("keyup", "#hashTag", function(event) {
    var keyCode = event.keyCode;
    // Allow: backspace, delete, tab, escape et enter
    if (
      $.inArray(keyCode, [46, 8, 27]) !== -1 ||
      // Allow: Ctrl+A, Command+A
      (keyCode == 65 && (event.ctrlKey === true || event.metaKey === true)) ||
      // Allow: Ctrl+Z, Command+Z
      (keyCode == 90 && (event.ctrlKey === true || event.metaKey === true)) ||
      // Allow: home, end, left, right, down, up
      (keyCode >= 35 && keyCode <= 40)
    ) {
      // let it happen, don't do anything
      return;
    }

    if ($.inArray(keyCode, [32, 9, 13]) !== -1) {
      var $textarea = $(this);
      var text = $textarea.val();
      text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [
          XRegExp(
            "(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))",
            "gi"
          ),
          ""
        ],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);

      $textarea.val(text);
      event.preventDefault();
      event.stopPropagation();
      event.stopImmediatePropagation();
    }
  });

  $("#hashTag").livequery(function() {
    $(this).alphanum({
      allow: "#",
      disallow: "!@$%^&*()+=[]\\';,/{}|\":<>?~`.- _",
      allowSpace: true,
      allowNumeric: false
    });
  }); 
  // Just allow Number
  $(".makeCredit , .writeadsbudget").livequery(function() {
    $(this).alphanum({
	 disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.- _",
     allowNumeric  : true,
	 allowLatin         : false,  
     allowOtherCharSets : false,
    });
  });
  // Just allow Number
  $(".boost_budget").livequery(function() {
    $(this).alphanum({
	 disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.- _",
     allowNumeric  : true,
	 allowLatin         : false,  
     allowOtherCharSets : false,
    });
  });
  // Post Menu Open
  var quickMenu =
    '<div class="poStListmEnU"><div class="menu-modal-Wrap"><div class="menu-modal-middle"><div class="postBoxCategoryItem"><div class="iconQuitck post_icon quickTextPost" id="quickPost" data-category="textPost"></div></div><div class="postBoxCategoryItem"><div class="iconQuitck post_icon quickImagePost" data-category="imagePost" id="quickPost"></div></div><div class="postBoxCategoryItem"><div class="iconQuitck post_icon quickVideoPost" data-category="linkPost" id="quickPost"></div></div><div class="postBoxCategoryItem"><div class="iconQuitck post_icon quickLinkPost" data-category="videoPost" id="quickPost"></div></div><div class="postBoxCategoryItem"><div class="iconQuitck post_icon quickmusicPost" data-category="musicPost" id="quickPost"></div></div><div class="postBoxCategoryItem"><div class="iconQuitck post_icon quickfilterPost" data-category="filterPost" id="quickPost"></div></div></div></div></div>';
  $("body").on("click", "#fastMenu", function() {
    $("body").append(quickMenu);
  });
  $("body").on("click", ".poStListmEnU", function() {
    $(".poStListmEnU").remove();
  });
  //User Profile About Box OPEN CLOSE
  $("body").on("click", ".about_info", function() {
    if (!$(".pUsrFlpsM_p_info").hasClass("opened")) {
      $(".pUsrFlpsM_p_info").addClass("opened");
    } else {
      $(".pUsrFlpsM_p_info").removeClass("opened");
    }
  });
  // Header Menu Open Close
  $("body").on("click", "#fastHeaderMenu", function(e) {
    e.stopPropagation();
    if (!$(".headerMenu").hasClass("show_header_menu")) {
      $(".headerMenu").addClass("show_header_menu");
    } else {
      $(".headerMenu").removeClass("show_header_menu");
    }
  });
  $(document).click(function() {
    $(".headerMenu").removeClass("show_header_menu");
  });
  //Click to scroll User About Box
  $("body").on("click", ".about_info", function() {
    $("html, body").animate(
      {
        scrollTop: $(".pUsrFlpsM_p_info").offset().top - 51
      },
      500
    );
  });
  $("body").on("click", ".interBtn", function(){
       var type = $(this).attr("data-type");
	   var dataType = 'f='+type;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: dataType,
		  beforeSend: function() {
			 $("body").append(preLoaderPopUp);
		  },
		  success: function(response) {
			setTimeout(function() { 
			  $(".settings_right").append(response);
			  setTimeout(function() {
				$(".popUpPreLoaderWrap").remove();
				$("html, body").animate( {
					scrollTop: $(".BvMHM").offset().top - 53
				  }, 300);
			  }, 300);
			}, 600);
		  }
		});
  });

  // Open Who Can See Box
  $("body").on("click", "#who", function(event) {
    event.stopPropagation();
    $(".who_see_list_box").addClass("open_box");
  });
  // Select Who Can See Item
  $("body").on("click",".who_see_item", function(){
    var names = ["1", "2", "3"];
    var ID = $(this).attr("id");
    var style = $(this).attr("data-ic"); 
    var ip = $(this).attr("id");
    if (jQuery.inArray(ip, names) != "-1") {
      
      $("#who").attr("data-who", ip);
	    $("#who").attr("data-see", style);
      
      if(ID == '1'){
         $(".who_see").html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M96,1.15385c-52.32692,0 -94.84615,42.51923 -94.84615,94.84615c0,52.32693 42.51923,94.84615 94.84615,94.84615c52.32693,0 94.84615,-42.51923 94.84615,-94.84615c0,-52.32692 -42.51923,-94.84615 -94.84615,-94.84615zM96,13.15385c15.63462,0 30.23077,4.26923 42.69231,11.76923c0.08654,0.0577 0.14423,0.17308 0.23077,0.23077c0.14423,0.14423 0.31731,0.31731 0.46154,0.46154c0.14423,0.17308 0.20192,0.11538 0.46154,0.23077c0.08654,0.40385 0.25961,0.69231 0.46154,0.92308c0.08654,0.08654 0.11538,0.28847 0.23077,0.46154c0.17308,0.23077 0.40385,0.49038 3,1.84615c-0.31731,-0.14423 -0.69231,-0.02884 -0.92308,0.23077c-0.11538,0.14423 -0.23077,0.28847 -0.23077,0.46154c-0.28846,-0.14423 -0.63461,-0.31731 -0.92308,-0.46154c-0.375,-0.14423 -0.54808,-0.28846 -0.92308,-0.46154c-0.05769,-0.02884 -0.17307,0.02884 -0.23077,0l-1.61538,-0.23077c-0.11538,-0.02884 -0.34615,-0.05769 -0.46154,0c-0.05769,0.02884 -0.17307,-0.02884 -0.23077,0l-0.92308,-0.23077l-0.92308,-0.46154c-0.05769,-0.02884 -0.40384,-0.23077 -0.46154,-0.23077l-1.38462,-0.23077c-0.05769,0 -0.17307,0 -0.23077,0h-0.92308c-0.14423,0 -0.34615,0.17308 -0.46154,0.23077c-0.14423,0.08654 -0.17307,0.08654 -0.23077,0.23077l-0.23077,0.46154l-0.69231,0.23077c-0.17307,0.02884 -0.34615,0.08654 -0.46154,0.23077c-0.05769,0.08654 -0.20192,0.34615 -0.23077,0.46154l-0.23077,0.23077c-0.11538,0.11538 -0.20192,0.31731 -0.23077,0.46154l-0.23077,0.46154c-0.08654,0.08654 -0.20192,0.34615 -0.23077,0.46154c-0.02884,0.08654 -0.02884,0.14423 0,0.23077v0.46154l-0.23077,2.76923c0,0.0577 -0.02884,0.14423 0,0.23077c-0.05769,0.02884 -0.17307,0.17308 -0.23077,0.23077l-1.38462,2.07692c-0.20192,0.23077 -0.40384,0.43269 -0.23077,0.69231l2.30769,3.46154l0.23077,0.69231c0.0577,0.11538 0.14423,0.14423 0.23077,0.23077c0.51923,0.43269 1.24039,0.57692 1.84615,0.69231c0.08654,0 0.14423,-0.02884 0.23077,0v1.15385c-0.02884,0.20192 0.08654,0.54808 0.23077,0.69231l0.46154,0.69231c0.02884,0.08654 0.17308,0.14423 0.23077,0.23077l-1.15385,0.46154c-0.08654,0.02884 -0.14423,-0.05769 -0.23077,0c-0.02884,0.02884 -0.20192,0.20192 -0.23077,0.23077l-0.46154,0.69231c-0.14423,0 -0.31731,0.11538 -0.46154,0.23077l-0.46154,0.46154c-0.05769,0.0577 -0.20192,0.17308 -0.23077,0.23077c-0.02884,0.02884 0.02884,0.20192 0,0.23077l-0.23077,0.46154v-0.69231c0,-0.02884 0,-0.20192 0,-0.23077c-0.05769,-0.34615 -0.02884,-0.34615 -4.15385,-4.15385v-0.92308c0,-0.05769 0,-0.40384 0,-0.46154l-0.23077,-0.23077c-0.02884,-0.05769 0.02884,-0.17307 0,-0.23077c-0.17307,-0.28846 -0.25961,-0.28846 -1.61538,-0.92308v-0.46154c-0.20192,-0.375 -0.66346,-0.43269 -1.15385,-0.46154h-0.92308c-0.72115,0.0577 -0.77885,0.17308 -1.38462,3.23077c0,0.11538 -0.05769,0.375 0,0.46154c0.02884,0.0577 -0.02884,0.17308 0,0.23077c-0.05769,0 -0.40384,0.20192 -0.46154,0.23077c-0.17307,0.02884 -0.31731,0.08654 -0.46154,0.23077c-0.05769,0.02884 -0.17307,-0.02884 -0.23077,0c-0.08654,0.0577 -0.02884,0.14423 -0.23077,0.23077c-0.05769,0.02884 -0.20192,-0.02884 -0.23077,0c-0.43269,0 -0.77885,0.28847 -1.38462,0.92308c-0.11538,0.17308 -0.05769,0.49038 0,0.69231l0.23077,0.92308c0.08654,0.23077 0.17308,0.25961 0.46154,0.46154c-0.05769,0.0577 -0.20192,0.20192 -0.23077,0.23077c-0.05769,0.08654 0.02884,0.14423 0,0.23077l-0.23077,1.15385c-0.02884,0.25961 0.0577,0.72115 0.23077,0.92308c0.14423,0.17308 0.43269,0.31731 0.92308,0.23077l2.07692,-0.46154c0.0577,-0.02884 0.20192,0.02884 0.23077,0l1.61538,-0.69231c0.02884,-0.02884 0.20192,0.02884 0.23077,0c0.02884,0.02884 -0.02884,0.20192 0,0.23077h-0.23077c-0.05769,0.0577 -0.17307,0.14423 -0.23077,0.23077c-0.02884,0.02884 0.02884,0.17308 0,0.23077l-0.46154,0.92308c-0.05769,0.25961 0.0577,0.69231 0.23077,0.92308c0.17308,0.23077 0.51923,0.43269 0.92308,0.46154h0.69231l-0.23077,0.69231c-0.02884,0.08654 0,0.14423 0,0.23077c0,0.0577 0,0.17308 0,0.23077c0.0577,0.28847 -0.05769,0.63462 0,0.92308c0.0577,0.11538 0.375,0.60577 0.46154,0.69231c0.14423,0.14423 0.25961,0.23077 0.46154,0.23077c0.46154,0.02884 0.77885,0 1.15385,0l1.61538,1.15385l-0.23077,0.46154c0,0.0577 0,0.40385 0,0.46154l0.23077,0.92308c-0.66346,-0.11538 -0.77885,-0.34615 -3.46154,-0.69231c-0.23077,-0.05769 -0.46154,-0.05769 -1.38462,-0.23077c-0.11538,-0.02884 -0.14423,-0.02884 -0.23077,0l-0.46154,0.23077c-0.20192,0.0577 -0.375,0.23077 -0.46154,0.46154c-0.05769,0.08654 0.0577,0.11538 0,0.23077h-0.46154c-0.17307,0.02884 -0.34615,0.31731 -0.46154,0.46154c-0.02884,0.02884 -0.17307,-0.05769 -0.23077,0c-0.14423,0.14423 -0.25961,0.49038 -0.23077,0.69231c0.14423,0.92308 0.31731,2.27885 0.46154,3.23077l-0.46154,2.53846c0,0.0577 0,0.17308 0,0.23077c0.02884,0.08654 -0.02884,0.23077 0,0.46154c0.02884,0.17308 0.08654,0.34615 0.23077,0.46154l0.46154,0.46154l0.69231,1.84615c0.17308,0.46154 0.66346,0.77885 1.15385,0.69231l1.38462,-0.23077l0.69231,0.46154l-4.61538,3.92308c-0.08654,0.0577 -0.20192,0.375 -0.23077,0.46154l-0.69231,3.23077l-3.23077,2.07692l-1.38462,0.69231c-0.17307,0.08654 -0.375,0.28847 -0.46154,0.46154c-0.60577,1.35577 -1.67307,2.94231 -2.53846,4.38462c-0.375,0.63462 -0.54808,1.18269 -0.92308,1.84615l-1.84615,3.69231c-0.05769,0.11538 -0.02884,0.34615 0,0.46154c0.02884,0.43269 0,0.46154 0,0.69231c0,0.11538 -0.05769,0.375 0,0.46154c0,0.02884 0.20192,0.20192 0.23077,0.23077l0.46154,0.69231l0.46154,3.46154l-2.30769,4.38462c-0.14423,0.25961 0,0.69231 0.23077,0.92308l0.92308,0.92308c0,0.43269 0.02884,0.92308 0,1.38462c-0.02884,0.08654 0,0.14423 0,0.23077v0.23077c0,0.14423 -0.08654,0.34615 0,0.46154l0.69231,1.15385l1.15385,1.15385l2.30769,3.23077c0.0577,0.08654 0.17308,0.17308 0.23077,0.23077l1.38462,1.15385l0.92308,1.38462c0.02884,0.02884 0.20192,-0.02884 0.23077,0l0.46154,0.23077c0.02884,0.02884 -0.02884,0.20192 0,0.23077l0.23077,0.23077c0.0577,0.0577 0.14423,-0.02884 0.23077,0l3.23077,1.84615l1.15385,0.92308c0.11538,0.08654 0.08654,0.20192 0.23077,0.23077c0.02884,0 0.17308,0 0.23077,0c0.51923,0 1.21154,-0.25961 1.61538,-0.46154l2.30769,-0.23077h3.69231c0.02884,0 0.20192,-0.23077 0.23077,-0.23077l3.46154,-0.23077c0.08654,0.02884 0.14423,0.02884 0.23077,0h0.46154c0.08654,-0.02884 0.17308,-0.17307 0.23077,-0.23077l1.38462,-0.69231h1.38462l0.92308,-0.23077l0.69231,2.07692c0.11538,0.31731 0.60577,0.51923 0.92308,0.46154h2.53846l0.92308,1.38462l0.23077,0.46154l-2.07692,4.15385c-0.08654,0.17308 -0.08654,0.28847 0,0.46154l1.84615,4.38462l0.23077,0.92308v0.92308c0,0.02884 0,0.23077 0,0.23077c0,0.11538 0.17308,0.14423 0.23077,0.23077c0.02884,0.11538 0.20192,0.34615 0.23077,0.46154c0.0577,0.11538 -0.02884,0.28847 0,0.46154l0.23077,0.46154l-0.46154,1.38462l-0.92308,5.07692l-1.61538,1.38462l-0.69231,1.84615l-0.46154,0.23077c-0.05769,0.02884 -0.40384,0.17308 -0.46154,0.23077c-0.11538,0.08654 -0.17307,0.11538 -0.23077,0.23077c-0.40384,0.98077 -0.80769,1.90385 -1.15385,2.76923c-0.02884,0.08654 0,0.375 0,0.46154c-0.02884,0.08654 -0.02884,0.14423 0,0.23077l0.46154,1.84615c-0.80769,3 -1.73077,6.23077 -2.53846,8.53846c-0.02884,0.02884 -0.23077,0.20192 -0.23077,0.23077v0.69231l-0.69231,1.61538c-0.28846,0.60577 -0.40384,0.83654 -0.92308,1.84615l-0.69231,0.69231c-0.43269,0.49038 -0.86538,1.24039 -1.15385,1.84615l-0.23077,0.46154c-0.11538,0.17308 -0.08654,0.25961 0,0.46154c0.08654,0.20192 0.25961,0.375 0.46154,0.46154c0.46154,0.17308 0.83654,0.23077 1.15385,0.23077c0.08654,0 0.14423,0.02884 0.23077,0c0.25961,-0.11538 0.63462,-0.28846 0.92308,-0.46154v-0.23077c1.21154,-0.23077 2.79808,-0.40384 4.15385,-0.69231l2.53846,-1.15385c0.0577,-0.02884 0.20192,-0.20192 0.23077,-0.23077l3.69231,-2.53846c0.02884,-0.02884 0.20192,0.02884 0.23077,0v-0.23077c0.46154,-0.31731 1.5577,-0.92308 1.84615,-1.15385l1.84615,-2.07692l0.92308,-0.92308l0.46154,-0.23077h0.46154c0.08654,0 0.14423,0.02884 0.23077,0c0.40385,-0.17307 0.66346,-0.66346 0.92308,-0.92308l2.30769,-2.30769c0.0577,-0.05769 0.20192,-0.17307 0.23077,-0.23077l1.38462,-2.53846l0.23077,-0.23077h0.23077c0.11538,0 0.14423,-0.17307 0.23077,-0.23077c0.40385,-0.17307 0.69231,-0.40384 0.92308,-0.69231l0.46154,-0.46154c1.03846,-0.72115 2.27885,-1.75961 3,-2.30769h0.23077c-0.11538,0.14423 -0.11538,0.28847 -0.23077,0.46154c-0.05769,0.0577 -0.20192,0.40385 -0.23077,0.46154l-0.92308,1.61538l-1.84615,1.61538c-0.14423,0.17308 -0.14423,0.17308 -2.53846,3.69231c-0.17307,0.31731 -0.20192,0.72115 -0.23077,1.15385c-0.02884,0.28847 0,0.54808 0.23077,0.69231c-15.02884,15.40385 -36.02884,24.92308 -59.30769,24.92308c-3.92308,0 -7.75961,-0.40384 -11.53846,-0.92308c0.08654,-0.17307 0.0577,-0.51923 0,-0.69231c0.11538,0.02884 0.34615,0.02884 0.46154,0c0.11538,-0.02884 0.14423,-0.17307 0.23077,-0.23077c0.14423,-0.11538 0.43269,-0.25961 0.46154,-0.46154c0.02884,-0.20192 -0.08654,-0.51923 -0.23077,-0.69231l-0.69231,-0.69231c-0.14423,-0.14423 -0.11538,-0.31731 -0.92308,-0.69231c-0.08654,-0.02884 -0.14423,0 -0.23077,0c-0.11538,-0.02884 -0.34615,0.17308 -0.46154,0.23077c-0.14423,0.0577 -0.34615,-0.05769 -0.46154,0c-0.28846,0.17308 -0.34615,0.60577 -0.23077,0.92308c0.02884,0.14423 0.11538,0.23077 0.23077,0.46154l-1.15385,-0.23077c-0.05769,-0.02884 -0.14423,-0.20192 -0.23077,-0.23077c-0.05769,-0.02884 -0.17307,0 -0.23077,0l-0.23077,-0.23077c-0.05769,-0.05769 -0.17307,-0.20192 -0.23077,-0.23077l-0.92308,-0.46154l-0.92308,-1.38462c-0.02884,-0.02884 -0.20192,-0.23077 -0.23077,-0.23077c-0.17307,-0.17307 -0.28846,-0.25961 -0.46154,-0.46154c-0.08654,-0.08654 -0.11538,-0.17307 -0.23077,-0.23077l-0.92308,-0.23077c0,-0.17307 -0.11538,-0.31731 -0.23077,-0.46154c-0.72115,-0.83654 -1.41346,-1.73077 -2.07692,-2.53846c-0.05769,-0.08654 -0.14423,-0.20192 -0.23077,-0.23077h-0.23077c0.17308,-0.23077 0.375,-0.66346 0.23077,-0.92308c-0.05769,-0.11538 -0.17307,-0.17307 -0.23077,-0.23077l0.92308,-0.69231c0.14423,-0.11538 0.20192,-0.28846 0.23077,-0.46154c0.02884,-0.08654 0.02884,-0.14423 0,-0.23077l-0.23077,-1.61538c-0.02884,-0.14423 0.11538,-0.34615 0,-0.46154c-0.11538,-0.11538 -0.34615,-0.14423 -0.46154,-0.23077c0.14423,-0.05769 0.375,-0.31731 0.46154,-0.46154c0.0577,-0.05769 0.20192,-0.14423 0.23077,-0.23077l0.23077,-1.15385l0.23077,-0.23077c0.08654,-0.08654 -0.02884,-0.11538 0,-0.23077l0.46154,-1.61538c0.0577,-0.08654 0.20192,-0.375 0.23077,-0.46154c0.02884,-0.08654 0,-0.14423 0,-0.23077v-0.69231c0.20192,-0.20192 0.34615,-0.66346 0.23077,-0.92308l-1.38462,-3.69231c1.67308,-0.92308 3.72115,-1.93269 5.30769,-2.76923c0.20192,-0.11538 0.20192,-0.23077 0.23077,-0.46154l0.23077,-1.15385c0.25961,-1.70192 0.43269,-3.75 0.69231,-5.30769c0.02884,-0.08654 0.02884,-0.14423 0,-0.23077l-0.92308,-4.38462l0.46154,-0.46154l0.69231,-0.23077c0.08654,-0.02884 0.14423,-0.17307 0.23077,-0.23077l0.23077,-0.23077l2.76923,-5.07692c0.0577,-0.08654 0.20192,-0.375 0.23077,-0.46154c0,-0.08654 0.02884,-0.17307 0,-0.23077l-0.92308,-3.92308c-0.05769,-0.20192 -0.25961,-0.375 -0.46154,-0.46154c-2.07692,-1.06731 -4.67307,-2.36538 -6.92308,-3.46154c-0.02884,-0.02884 -0.20192,-0.20192 -0.23077,-0.23077l-5.76923,-0.69231l-1.84615,-0.69231l-2.30769,-1.61538c-0.02884,-0.02884 -0.17307,-0.20192 -0.23077,-0.23077l-0.46154,-0.23077c0.11538,-0.20192 0.11538,-0.49038 0,-0.69231c-0.05769,-0.11538 -0.17307,-0.375 -0.23077,-0.46154c-0.14423,-0.17307 -0.25961,-0.28846 -0.46154,-0.23077h-0.23077l-1.61538,-1.38462l-2.07692,-3c-0.02884,-0.11538 -0.14423,-0.14423 -0.23077,-0.23077l-0.23077,-0.23077c-0.08654,-0.08654 -0.11538,-0.20192 -0.23077,-0.23077l-3.46154,-1.61538l-1.15385,-0.92308c-0.14423,-0.11538 -0.25961,-0.02884 -0.46154,0l-2.30769,0.23077l-2.30769,-2.53846l0.23077,-0.23077c0.25961,-0.11538 0.43269,-0.20192 0.46154,-0.46154c0.0577,-0.54808 0.02884,-1.03846 0,-1.38462l0.69231,-0.69231c0.14423,-0.14423 0.23077,-0.25961 0.23077,-0.46154v-0.46154c0,-0.40384 -0.31731,-0.66346 -0.69231,-0.69231c-0.95192,-0.05769 -1.75961,0 -2.53846,0c0,-0.05769 0,-0.20192 0,-0.23077c0,-0.14423 0.0577,-0.28846 -0.23077,-1.15385c0.28847,-0.17307 0.46154,-0.34615 0.46154,-0.69231c0,-0.14423 -0.02884,-0.17307 -0.46154,-1.38462c-0.02884,-0.20192 -0.05769,-0.60577 -0.23077,-1.15385c0.11538,-0.05769 0.14423,-0.08654 0.23077,-0.23077c0.23077,-0.40384 0.17308,-0.63461 -0.23077,-1.84615c-0.02884,-0.05769 0.02884,-0.17307 0,-0.23077c0.0577,-0.17307 0.0577,-0.28846 0,-0.46154c0.375,-0.14423 0.66346,-0.49038 0.69231,-0.92308c0,-0.14423 -0.05769,-0.11538 -0.46154,-1.38462c-0.17307,-0.31731 -0.46154,-0.60577 -0.69231,-0.69231c0.02884,-0.28846 -0.05769,-0.49038 -0.23077,-0.69231c-0.17307,-0.20192 -0.375,-0.43269 -0.69231,-0.46154h-0.23077c-0.08654,-0.34615 -0.46154,-0.57692 -0.92308,-0.69231c-0.63461,-0.17307 -1.32692,-0.31731 -2.07692,-0.46154c-0.375,-0.05769 -0.72115,-0.20192 -0.92308,-0.23077c-0.11538,-0.02884 -0.34615,-0.02884 -0.46154,0c-0.25961,0.0577 -0.54808,0.25961 -0.69231,0.46154c-0.28846,-0.20192 -0.43269,-0.49038 -0.69231,-0.69231l-0.69231,-0.46154c-0.14423,-0.14423 -0.49038,-0.28846 -0.69231,-0.23077c-0.31731,0.02884 -0.75,0.17308 -0.92308,0.46154l-2.07692,-1.15385l-0.92308,-0.46154c-0.11538,-0.08654 -0.20192,-0.17307 -0.46154,-0.23077c-0.11538,-0.02884 -0.34615,-0.02884 -0.46154,0c0.40385,-0.11538 0.66346,-0.40384 0.69231,-0.69231c0.0577,-0.31731 -0.05769,-0.49038 -0.69231,-2.07692c-0.17307,-0.43269 -0.51923,-0.57692 -0.92308,-0.46154c-0.17307,0.0577 -0.46154,0.11538 -0.69231,0.46154c-0.14423,0.25961 -0.31731,0.60577 -0.46154,0.92308l-0.23077,0.23077c-0.77885,-0.54808 -1.47116,-1.03846 -2.30769,-1.61538c-1.18269,-0.80769 -2.45192,-1.81731 -3.46154,-2.53846c-0.11538,-0.08654 -0.34615,0 -0.46154,0c-0.08654,0 -0.17307,-0.02884 -0.23077,0l-2.07692,0.46154c-0.05769,0.02884 -0.17307,-0.02884 -0.23077,0c-0.375,0.14423 -0.375,0.25961 -1.38462,2.53846c-0.11538,-0.11538 -0.34615,-0.17307 -0.46154,-0.23077c-0.11538,-0.02884 -0.11538,-0.25961 -0.23077,-0.23077l-3.46154,0.69231c-0.28846,0.02884 -0.375,0.17308 -0.46154,0.46154l-0.92308,2.76923l-0.92308,0.23077l-0.92308,-2.53846l0.92308,-5.07692l0.69231,-2.30769l0.69231,-1.15385c0.83654,-1.29808 1.73077,-2.76923 2.53846,-3.92308h1.15385l1.61538,1.61538c0.23077,0.23077 0.63462,0.17308 0.92308,0c0.66346,-0.375 0.98077,-1.18269 1.15385,-1.84615l2.07692,0.69231l-0.23077,6c-0.02884,0.28847 0,0.57692 0.23077,0.69231c0.63462,0.31731 1.06731,0.23077 1.38462,0.23077c0.17308,0 0.57692,-0.11538 0.69231,-0.23077h0.23077l0.23077,0.92308c0.08654,0.25961 0.28847,0.57692 0.92308,0.69231h0.92308c0.02884,0 0.20192,0 0.23077,0c0.43269,-0.05769 0.60577,-0.31731 0.69231,-0.69231c0.08654,-0.25961 0.11538,-0.23077 -0.23077,-2.07692c-0.11538,-0.46154 -0.46154,-0.92308 -0.92308,-0.92308h-0.69231l0.69231,-1.84615c0.17308,-1.24039 0.23077,-2.48077 0.46154,-3.69231l1.84615,-3h0.23077c0.11538,0 0.11538,0.0577 0.23077,0l2.07692,-1.38462c1.24039,-0.86538 2.59616,-1.78846 3.69231,-2.53846c0.08654,-0.05769 0.17308,-0.14423 0.23077,-0.23077c0.20192,-0.28846 0.20192,-0.51923 0.23077,-0.69231c0.17308,-0.83654 0.49038,-1.5 0.69231,-2.30769c0.0577,0.02884 0.17308,-0.05769 0.23077,0c0.28847,0.23077 0.66346,0.25961 0.92308,0l3,-3.23077c0.0577,-0.05769 0.20192,0.0577 0.23077,0l0.46154,-0.69231l3.23077,-0.46154c0.17308,-0.02884 0.57692,-0.08654 0.69231,-0.23077l0.92308,-0.92308c0.17308,-0.20192 0.08654,-0.66346 0,-0.92308l0.69231,-0.92308h0.69231c0.08654,0 0.17308,-0.20192 0.23077,-0.23077c0.02884,0 0.20192,0.02884 0.23077,0l2.30769,-1.15385v0.69231c-0.05769,0.20192 -0.14423,0.28847 0,0.46154l0.23077,0.23077c0.20192,0.23077 0.66346,0.34615 0.92308,0.23077c1.18269,-0.46154 2.56731,-0.86538 3.92308,-1.38462l1.38462,-0.69231c0.11538,-0.02884 0.375,-0.14423 0.46154,-0.23077l0.23077,-0.23077h0.92308c0.34615,-0.02884 0.40385,-0.20192 1.38462,-0.92308c0.08654,-0.08654 0.20192,-0.14423 0.23077,-0.23077c0.20192,-0.43269 0.0577,-0.83654 -0.23077,-1.15385l0.23077,-0.92308c0.02884,-0.20192 -0.08654,-0.51923 -0.23077,-0.69231c-0.17307,-0.20192 -0.51923,-0.43269 -0.92308,-0.46154c-0.43269,0.02884 -0.375,0.02884 -2.53846,2.30769l-0.46154,-0.46154c0.08654,-0.28846 0.17308,-0.63461 0.23077,-0.92308c0.17308,0 0.34615,-0.11538 0.46154,-0.23077l0.92308,-0.92308c0.17308,-0.14423 0.25961,-0.69231 0.23077,-0.92308c-0.02884,-0.17307 -0.11538,-0.34615 -0.23077,-0.46154h3.46154c-0.14423,0.08654 -0.43269,0.28847 -0.46154,0.69231c-0.02884,0.23077 -0.11538,0.28847 0,0.46154l-0.23077,0.69231c-0.11538,0.20192 -0.11538,0.72115 0,0.92308c0.20192,0.43269 0.17308,0.31731 2.30769,0.69231l0.23077,0.46154c0.08654,0.11538 0.375,0.43269 0.92308,0.46154h0.69231c0.20192,-0.02884 0.25961,-0.08654 0.46154,-0.23077c0.14423,0.11538 0.43269,0.17308 0.69231,0.23077h0.69231c0.31731,-0.05769 0.40385,-0.14423 1.84615,-1.15385c0.08654,-0.08654 0.17308,-0.17307 0.23077,-0.46154c0.02884,-0.17307 0.20192,-0.43269 0.23077,-0.69231c0,-0.40384 -0.14423,-0.51923 -0.46154,-0.69231v-0.23077c0.08654,-0.20192 0.28847,-0.51923 0.23077,-0.69231c-0.11538,-0.25961 -0.34615,-0.43269 -0.92308,-0.69231l1.15385,-1.15385c0.28847,-0.25961 0.375,-0.54808 0.23077,-0.92308c-0.08654,-0.20192 -0.23077,-0.375 -0.46154,-0.46154l0.92308,-1.15385c0.11538,-0.17307 0.0577,-0.49038 0,-0.69231c-0.08654,-0.23077 -0.20192,-0.40384 -0.46154,-0.46154l-1.61538,-0.23077c0.0577,-0.05769 0.20192,-0.17307 0.23077,-0.23077c0.20192,-0.57692 0.34615,-1.21153 0.46154,-1.61538c0.0577,-0.31731 -0.20192,-0.75 -0.46154,-0.92308l-0.23077,-0.23077l0.23077,-0.69231c0.34615,-2.19231 0.66346,-3.14423 0.69231,-3.23077c0.0577,-0.31731 -0.20192,-0.75 -0.46154,-0.92308c0.28847,-0.11538 0.28847,-0.25961 0.92308,-1.38462c0.0577,0.02884 0.17308,-0.02884 0.23077,0c0.0577,0 0.17308,0.23077 0.23077,0.23077h0.46154c0.43269,-0.02884 0.49038,-0.17307 2.30769,-2.07692c0.14423,0.08654 0.34615,0.23077 0.46154,0.23077c0.375,0 0.49038,-0.02884 3.46154,-1.61538c0.0577,-0.02884 0.20192,-0.20192 0.23077,-0.23077c0.14423,-0.11538 0.20192,-0.28846 0.23077,-0.46154c0.0577,-0.375 0.02884,-0.31731 -1.61538,-2.30769l0.92308,-0.92308c0.25961,-0.49038 0.20192,-0.72115 -1.38462,-3c-0.05769,-0.08654 -0.17307,0.0577 -0.23077,0c-0.05769,-0.05769 -0.17307,-0.20192 -0.23077,-0.23077c0.20192,-0.14423 0.40385,-0.34615 0.92308,-0.92308c0.02884,-0.02884 -0.02884,-0.20192 0,-0.23077c0.11538,0.0577 0.34615,0.02884 0.46154,0c0.72115,-0.14423 1.44231,-0.49038 2.07692,-0.92308c0.17308,-0.11538 0.31731,-0.375 0.46154,-0.46154h0.23077c0.0577,0 0.17308,0.02884 0.23077,0l1.15385,-0.23077c0.11538,-0.05769 0.34615,-0.08654 0.46154,-0.23077c0,0.11538 0.17308,0.11538 0.23077,0.23077c-0.05769,0.17308 -0.17307,0.28847 -0.23077,0.46154c-0.02884,0.08654 0,0.375 0,0.46154c0,0.08654 -0.02884,0.17308 0,0.23077l0.23077,0.46154c0.0577,0.17308 0.31731,0.375 0.46154,0.46154c0.11538,0.0577 0.31731,0 0.46154,0c0.69231,0.02884 1.32693,0.02884 1.84615,0l0.69231,0.23077v0.46154l-0.46154,1.38462c-0.05769,0.11538 -0.02884,0.57692 0,0.69231c0.02884,0.14423 0.11538,0.11538 0.23077,0.23077c-0.08654,0.17308 -0.08654,0.49038 0,0.69231c0.0577,0.14423 0.14423,0.31731 0.23077,0.46154v0.23077c0.0577,0.08654 0.17308,0.17308 0.23077,0.23077h-1.15385c-0.375,0.0577 -0.23077,0.02884 -1.84615,1.38462c-0.08654,0.08654 -0.17307,0.34615 -0.23077,0.46154c-0.02884,0.0577 -0.23077,-0.05769 -0.23077,0l-0.23077,1.61538c-0.02884,0.11538 -0.02884,0.11538 0,0.23077c0.0577,0.14423 0.375,0.34615 0.46154,0.46154c0,0.02884 -0.23077,0.20192 -0.23077,0.23077h-0.23077c-0.05769,0.02884 -0.17307,0.20192 -0.23077,0.23077c-0.08654,0.08654 -0.375,0.17308 -0.46154,0.46154c-0.02884,0.14423 -0.02884,0.31731 0,0.46154l0.92308,3.23077c0.02884,0.14423 0.11538,0.11538 0.23077,0.23077c0.14423,0.11538 0.34615,0.17308 0.46154,0.23077c0.08654,0.02884 0.14423,0.23077 0.23077,0.23077h0.69231l0.46154,0.69231c0.0577,0.08654 0.14423,0.17308 0.23077,0.23077c0.23077,0.17308 0.57692,0.31731 0.92308,0.23077l1.61538,-0.23077c0.08654,-0.02884 0.14423,-0.17307 0.23077,-0.23077l1.15385,-0.92308c1.03846,-1.06731 2.04808,-2.45192 3,-3.46154l2.30769,-0.69231c0.0577,0 0.20192,-0.20192 0.23077,-0.23077l0.46154,-0.23077l0.23077,0.23077c0.0577,0.02884 0.17308,0 0.23077,0c0.375,0 0.60577,-0.23077 1.84615,-1.15385l2.30769,-1.15385l1.15385,0.23077c0.0577,0.02884 0.17308,0.02884 0.23077,0h0.23077c1.41346,-0.51923 3.43269,-1.29808 4.84615,-1.84615c0.28847,0 0.57692,-0.20192 0.69231,-0.46154l0.23077,-0.46154c0.17308,-0.34615 0.31731,-0.86538 0.46154,-1.15385c0.0577,-0.11538 0.25961,-0.08654 0.23077,-0.23077c-0.02884,-0.20192 -0.08654,-0.31731 -0.23077,-0.46154c0.17308,-0.11538 0.20192,-0.49038 0.23077,-0.69231l0.46154,-2.30769c0.02884,-0.11538 0.0577,-0.31731 0,-0.46154c0.08654,-0.17307 0.08654,-0.25961 0,-0.46154c-0.23077,-0.49038 -0.46154,-1.18269 -0.69231,-1.61538c0.14423,-0.05769 0.14423,-0.08654 0.23077,-0.23077l0.46154,0.23077c0.23077,0.08654 0.49038,-0.05769 0.69231,-0.23077l0.46154,-0.46154c0.14423,-0.14423 0.23077,-0.25961 0.23077,-0.46154v-0.23077c0,-0.14423 0.08654,-0.34615 0,-0.46154c-0.43269,-0.60577 -1.21153,-0.77885 -1.84615,-0.92308c-0.20192,-0.05769 -0.40384,0.08654 -0.69231,0c-0.02884,0 -0.20192,0 -0.23077,0c-0.25961,0 -0.43269,-0.08654 -0.69231,0c-0.02884,-0.14423 -0.11538,-0.11538 -0.23077,-0.23077c-0.14423,-0.14423 -0.31731,-0.49038 -0.46154,-0.69231c-0.14423,-0.28846 -0.31731,-0.63461 -0.69231,-0.92308c-0.63461,-0.51923 -1.35577,-0.57692 -2.07692,-0.69231c-1.24039,-0.14423 -2.71153,-0.11538 -3.92308,0c-0.46154,0.02884 -0.95192,0.02884 -1.38462,0c-0.49038,-0.02884 -0.98077,-0.05769 -1.38462,0c-0.25961,0.02884 -0.49038,0.14423 -0.69231,0.23077c-0.17307,-0.08654 -0.63461,-0.05769 -0.92308,0c-0.83654,0.20192 -1.52884,0.77885 -2.30769,1.38462c-0.17307,0.14423 -0.51923,0.31731 -0.69231,0.46154c-0.11538,-0.23077 -0.43269,-0.46154 -0.69231,-0.46154c-0.69231,-0.02884 -0.72115,0 -0.92308,-0.23077c-0.05769,-0.08654 0.02884,-0.34615 0,-0.46154c-0.11538,-0.375 -0.49038,-0.98077 -1.38462,-1.15385c-0.02884,0 -0.17307,0 -0.23077,0c-0.23077,0 -0.51923,0.17308 -0.69231,0.23077c0.02884,0 0,-0.20192 0,-0.23077c0,-0.34615 0,-1.06731 -1.15385,-1.38462c-0.14423,-0.02884 -0.28846,0 -0.46154,0c-0.17307,0 -0.95192,-0.05769 -1.38462,0.23077c-0.40384,0.25961 -0.46154,0.57692 -0.46154,0.69231c-0.11538,0.08654 -0.05769,0.17308 -0.23077,0.23077c-0.14423,0.0577 -0.54808,0.11538 -0.69231,0.23077c-0.25961,0.17308 -0.49038,0.49038 -0.69231,0.69231c-0.20192,0.23077 -0.375,0.51923 -0.69231,0.46154c-0.20192,-0.08654 -0.28846,-0.08654 -0.46154,0c-0.57692,0.25961 -0.86538,0.57692 -0.92308,0.92308c-0.25961,0.25961 -0.60577,0.75 -0.69231,1.15385c-0.11538,0.08654 -0.46154,0.08654 -0.69231,0.23077v-0.92308c-0.08654,-0.375 -0.60577,-0.72115 -0.92308,-0.69231c-0.31731,0.02884 -0.43269,0.34615 -0.69231,0.69231l-1.38462,0.69231c-0.05769,0.02884 -0.17307,0.17308 -0.23077,0.23077l-1.15385,1.38462c-0.17307,0.20192 -0.34615,0.43269 -0.23077,0.69231v0.23077c-0.14423,-0.20192 -0.20192,-0.28846 -0.92308,-0.46154v-0.23077l0.69231,-0.92308c0.11538,-0.20192 0.11538,-0.46154 0,-0.69231c-0.11538,-0.25961 -0.40384,-0.43269 -0.69231,-0.46154c-0.31731,0.02884 -0.43269,-0.14423 -1.61538,0.69231c-0.05769,0.02884 -0.20192,0.20192 -0.23077,0.23077l-0.46154,1.15385c-0.08654,-0.05769 -0.14423,-0.20192 -0.23077,-0.23077c0.08654,-0.14423 0,-0.31731 0,-0.46154c-0.02884,-0.375 -0.20192,-0.54808 -0.69231,-0.92308c-0.14423,-0.08654 -0.28846,-0.05769 -0.46154,0c-0.14423,0.02884 -0.34615,-0.02884 -0.92308,0.23077c-0.43269,-0.20192 -0.98077,0.08654 -1.15385,0.23077c-0.14423,0.14423 -0.34615,0.31731 -0.46154,0.46154c-0.14423,-0.28846 -0.375,-0.49038 -0.69231,-0.46154l-2.53846,0.23077c-0.02884,0 -0.20192,-0.02884 -0.23077,0l-1.61538,0.69231c-0.40384,0.17308 -0.49038,0.25961 -0.92308,0.92308c-0.08654,0 -0.14423,0 -0.23077,0h-1.38462c-0.05769,0 -0.17307,-0.02884 -0.23077,0c-0.02884,0 -0.20192,0.23077 -0.23077,0.23077l-2.76923,1.15385c-0.05769,0.02884 -0.17307,-0.02884 -0.23077,0l-1.61538,1.15385c-0.25961,0.17308 -0.375,0.46154 -0.46154,0.69231c-0.08654,0.28847 0,0.51923 0.23077,0.69231c-0.08654,0.08654 -0.17307,0.11538 -0.23077,0.23077l-0.23077,-0.46154c-0.05769,-0.20192 -0.25961,-0.375 -0.46154,-0.46154c-0.02884,-0.08654 0.0577,-0.14423 0,-0.23077c-0.17307,-0.23077 -0.63461,-0.34615 -0.92308,-0.23077h-0.46154c12.34615,-7.26923 26.59616,-11.53846 42,-11.53846zM124.15385,19.84615l-0.92308,0.23077c-0.08654,0.02884 -0.14423,-0.05769 -0.23077,0l-0.46154,0.23077c-0.08654,-0.02884 -0.34615,-0.02884 -0.46154,0c-0.20192,0.02884 -0.34615,0.14423 -0.46154,0.23077h-1.15385c-0.28846,0 -0.57692,-0.02884 -0.69231,0.23077c-0.05769,0.11538 0,0.34615 0,0.46154c0,0.49038 0.02884,0.66346 1.15385,1.38462c0.02884,0.02884 0.20192,-0.02884 0.23077,0l0.92308,0.46154c0.17308,0.08654 0.51923,0.02884 0.69231,0l0.46154,0.69231c0.23077,0.28847 0.20192,0.46154 2.30769,1.15385c0.08654,0 0.17308,0.02884 0.23077,0c0.23077,-0.02884 0.375,-0.25961 0.46154,-0.46154c0.11538,-0.20192 0.31731,-0.49038 0.23077,-0.69231h0.69231c0.25961,-0.05769 0.60577,-0.20192 0.69231,-0.46154c0.11538,-0.28846 0,-0.72115 -0.23077,-0.92308c-0.08654,-0.05769 -0.14423,-0.08654 -0.92308,-0.46154c0.11538,-0.31731 -0.17307,-0.51923 -0.69231,-1.38462c-0.02884,-0.05769 0.0577,-0.17307 0,-0.23077c-0.23077,-0.20192 -0.40384,-0.17307 -1.38462,-0.46154c-0.05769,-0.02884 -0.17307,0 -0.23077,0c-0.05769,0 -0.17307,0 -0.23077,0zM71.07692,29.07692c0.28847,0.11538 0.77885,0.11538 1.15385,0.23077l-1.15385,0.92308c-0.02884,0.02884 0.02884,0.20192 0,0.23077l-0.69231,0.69231h-1.38462zM143.76923,29.07692c0.08654,0.02884 0.375,0 0.46154,0c0.08654,0 0.14423,0.02884 0.23077,0h0.23077c0.14423,0.08654 0.31731,0.14423 0.46154,0.23077c-0.05769,0.11538 -0.23077,0.11538 -0.23077,0.23077v0.46154zM68.30769,31.38462c-0.11538,0.08654 -0.25961,0.11538 -0.46154,0.23077c-0.02884,0.02884 -0.20192,0.20192 -0.23077,0.23077l-0.92308,0.92308c-0.08654,0.14423 -0.46154,0.51923 -0.23077,0.92308l-0.69231,-0.23077c-0.05769,-0.02884 -0.17307,0.02884 -0.23077,0l0.23077,-1.38462c0.02884,-0.08654 0.02884,-0.14423 0,-0.23077zM108,31.61538c-0.23077,0 -0.54808,0.14423 -2.07692,0.46154c-0.31731,0.11538 -0.375,0.17308 -0.46154,0.46154c-0.08654,0.25961 0.02884,0.75 0.23077,0.92308c0.25961,0.23077 0.60577,0.51923 0.92308,0.69231l-0.23077,0.46154c-0.05769,0.17308 -0.08654,0.51923 0,0.69231c0.20192,0.43269 0.08654,0.54808 3.69231,1.61538c0.0577,0.02884 0.17308,0 0.23077,0c0.25961,0 0.25961,0.08654 4.15385,-1.61538c0.43269,-0.28846 0.51923,-0.89423 0.46154,-1.15385c-0.05769,-0.20192 -0.14423,-0.40384 -0.23077,-0.69231c-0.05769,-0.11538 -0.14423,-0.14423 -0.23077,-0.23077c-0.02884,-0.02884 0.02884,-0.20192 0,-0.23077l-1.61538,-1.15385c-0.14423,-0.11538 -0.54808,-0.20192 -0.92308,-0.23077l-2.76923,0.46154l-0.69231,-0.23077c-0.11538,-0.05769 -0.34615,-0.23077 -0.46154,-0.23077zM59.53846,33.69231h1.38462l-0.23077,0.23077c-0.05769,0.375 0.34615,0.60577 0.69231,0.69231c0.46154,0.14423 0.66346,0.23077 0.92308,0.23077c0.08654,0 0.375,-0.20192 0.46154,-0.23077h0.69231c-0.51923,0.49038 -0.95192,1.03846 -1.38462,1.61538c-0.28846,0.375 -0.66346,0.86539 -0.92308,1.15385l-1.61538,0.46154c-0.14423,0.0577 -0.14423,0.08654 -0.23077,0.23077l-1.84615,2.76923l-3.46154,1.15385c-0.17307,0.0577 -0.375,0.28847 -0.46154,0.46154c-0.05769,0.11538 0.0577,0.11538 0,0.23077h-0.23077l-0.92308,-1.61538l-0.46154,-1.84615c-0.05769,-0.20192 -0.25961,-0.375 -0.46154,-0.46154c0.14423,-0.11538 0.20192,-0.25961 0.23077,-0.46154l0.23077,-0.46154l2.30769,-1.61538c0.80769,-0.31731 1.61538,-0.77885 2.53846,-1.15385l2.07692,-0.69231c0.08654,-0.02884 0.14423,-0.17307 0.23077,-0.23077c0.0577,-0.05769 0.17308,-0.17307 0.23077,-0.23077c0.14423,-0.11538 0.20192,-0.05769 0.23077,-0.23077zM69.23077,33.92308l0.23077,0.23077l-0.23077,0.23077c-0.46154,0.75 -0.11538,0.89423 2.30769,2.53846l-2.53846,1.15385l0.46154,-0.69231c0.25961,-0.25961 0.25961,-0.63461 0,-0.92308l-1.61538,-1.84615c-0.05769,-0.02884 -0.17307,-0.20192 -0.23077,-0.23077l-0.69231,-0.23077c0.43269,0.20192 0.69231,0.02884 2.30769,-0.23077zM140.53846,39.46154l1.15385,0.46154c0.14423,0.0577 0.31731,0.28847 0.46154,0.23077c0.14423,0.46154 0.25961,0.60577 0.46154,0.92308c0.02884,0.08654 0.17308,0.17308 0.23077,0.23077c0.08654,0.0577 0.14423,0.17308 0.23077,0.23077c-0.05769,0.14423 -0.05769,0.31731 0,0.46154l0.46154,1.38462c-0.54808,-0.14423 -1.26923,0.08654 -1.84615,0.23077c-0.14423,0.0577 -0.31731,0.20192 -0.46154,0.23077c-0.05769,0 -0.20192,-0.02884 -0.23077,0l-1.61538,0.69231v-0.23077c0.31731,-0.11538 0.49038,-0.34615 0.46154,-0.69231v-1.61538l0.23077,-0.69231l0.23077,-1.61538c0.02884,-0.08654 0.23077,-0.17307 0.23077,-0.23077zM157.84615,56.53846c0.0577,0.08654 0.14423,0.14423 0.23077,0.23077c1.52884,1.38462 1.47116,1.38462 1.84615,1.38462c0.14423,0 0.11538,0.08654 0.23077,0c0.14423,-0.05769 0.375,-0.11538 0.46154,-0.23077c0.11538,-0.17307 0.375,-0.31731 0.46154,-0.46154l2.53846,1.61538l0.92308,0.69231l-0.92308,0.23077c-1.03846,-0.72115 -1.09615,-0.69231 -1.38462,-0.69231c-0.08654,0 -0.375,-0.02884 -0.46154,0c-0.49038,0.17308 -1.06731,0.49038 -1.61538,0.69231c-0.46154,0.17308 -0.95192,0.31731 -1.38462,0.46154h-0.46154l-0.92308,-0.92308c-0.02884,-0.02884 0.02884,-0.17307 0,-0.23077c0.0577,-0.11538 0.23077,-0.25961 0.23077,-0.46154l-0.23077,-0.46154c0.11538,-0.11538 0.20192,-0.31731 0.23077,-0.46154c0.0577,-0.14423 0,-0.31731 0,-0.46154zM138.69231,59.76923c-0.02884,0.02884 0.02884,0.20192 0,0.23077c-0.08654,0.11538 0.02884,0.08654 0,0.23077c-0.02884,0.0577 -0.08654,0.23077 0,0.69231c0.08654,0.25961 0.17308,0.66346 0.23077,0.92308c0.0577,0.14423 0.14423,0.375 0.23077,0.46154c-0.02884,0.14423 -0.02884,0.23077 0,0.46154v0.46154c0.11538,0.46154 0.34615,0.89423 0.46154,1.38462c0.14423,0.60577 0.49038,0.86539 0.69231,0.92308c0.11538,0.02884 0.34615,0.02884 0.46154,0c0.02884,0 0.20192,-0.20192 0.23077,-0.23077l0.92308,-0.23077c0.375,-0.11538 0.69231,-0.51923 0.69231,-0.92308c0,-0.14423 0.0577,-0.23077 -0.46154,-1.84615c-0.11538,-0.28846 -0.375,-0.57692 -0.69231,-0.69231c0.0577,-0.17307 0.17308,-0.20192 0.23077,-0.46154l1.15385,1.15385c0.0577,0.0577 0.40385,0.20192 0.46154,0.23077l2.53846,1.38462l0.46154,0.23077l0.23077,0.69231l-1.84615,-0.46154c-0.14423,-0.02884 -0.54808,0.17308 -0.69231,0.23077c-0.28846,0.14423 -0.49038,0.375 -0.46154,0.69231c0.02884,0.23077 0.17308,0.60577 0.23077,0.92308c0.02884,0.11538 -0.08654,0.14423 0,0.23077c0.51923,0.66346 1.35577,1.15385 2.07692,1.61538c0.08654,0.0577 0.17308,0.17308 0.23077,0.23077c-0.46154,0.08654 -0.69231,0.40385 -0.69231,0.92308c-0.08654,-0.34615 -0.17307,-0.63461 -0.23077,-0.92308c-0.02884,-0.17307 -0.11538,-0.34615 -0.23077,-0.46154l-0.69231,-0.46154l-1.15385,-0.69231c-0.17307,-0.08654 -0.28846,-0.23077 -0.46154,-0.23077c-0.08654,0 -0.375,-0.02884 -0.46154,0l-1.15385,0.46154l-6.69231,0.46154c-0.05769,0 -0.17307,-0.02884 -0.23077,0l-4.38462,1.61538h-1.61538c0.0577,-0.05769 -0.02884,-0.17307 0,-0.23077l1.61538,-0.23077c0.08654,0 0.17308,0.02884 0.23077,0h0.23077c0.08654,-0.02884 0.17308,-0.17307 0.23077,-0.23077l1.38462,-1.15385l0.23077,-0.23077c0.20192,-0.23077 0.46154,-0.49038 0.69231,-0.69231c0.20192,-0.20192 0.31731,-0.63461 0.23077,-0.92308l-0.69231,-1.61538l0.23077,-0.46154l0.69231,-0.23077h0.23077c0.08654,0 0.14423,0.02884 0.23077,0c0.02884,0 0.20192,-0.23077 0.23077,-0.23077l0.69231,-0.46154c0.23077,-0.11538 0.43269,-0.23077 0.46154,-0.46154l0.23077,-1.38462v-0.23077l2.07692,0.46154c0.14423,0 0.34615,-0.14423 0.46154,-0.23077zM149.76923,64.15385h0.23077c0.17308,0 0.34615,0.08654 0.46154,0l0.23077,0.23077c0.0577,0.08654 -0.05769,0.17308 0,0.23077c0.0577,0.0577 0.11538,0.14423 0.23077,0.23077c0.11538,0.08654 0.31731,0.20192 0.46154,0.23077l0.92308,1.15385c0.11538,0.14423 0.28847,0.20192 0.46154,0.23077c0.08654,0.02884 0.14423,-0.02884 0.23077,0c0,0.02884 -0.02884,0.20192 0,0.23077c0.17308,0.28847 0.49038,0.57692 0.69231,0.92308l0.23077,0.46154c0.0577,0.11538 0.11538,0.375 0.23077,0.46154h0.23077c0.11538,0.08654 0.31731,0.23077 0.46154,0.23077h0.69231c-0.02884,0.08654 0,0.11538 0,0.23077c0.0577,0.17308 0.02884,0.08654 0.46154,0.92308c0.25961,0.43269 0.20192,0.54808 3.23077,1.15385c0.86539,-0.08654 1.00962,-0.80769 0.92308,-2.07692l0.23077,0.23077c0.17308,0.17308 0.43269,0.28847 0.69231,0.23077l1.38462,-0.46154c0.11538,-0.02884 0.14423,0.0577 0.23077,0h0.23077c-0.11538,0.11538 -0.20192,0.34615 -0.23077,0.46154c-0.05769,0.34615 -0.05769,0.66346 0.23077,0.92308c0.08654,0.0577 0.28847,0.0577 1.38462,0.69231c0.0577,0.02884 -0.05769,0.20192 0,0.23077h0.23077c0.14423,0.02884 0.31731,-0.17307 0.46154,-0.23077c0.11538,-0.05769 0.14423,-0.14423 0.23077,-0.23077l0.46154,-0.46154c0.08654,0.28847 0.14423,0.63462 0.23077,0.92308l-0.23077,3l-1.84615,-0.69231c-0.31731,-0.08654 -0.51923,0.20192 -0.69231,0.46154l-0.69231,0.69231l-2.76923,-1.15385c-0.08654,-0.02884 -0.14423,-0.02884 -0.23077,0c-0.43269,0.02884 -0.80769,0 -1.15385,0l-0.23077,-0.23077c-0.11538,-0.17307 -0.25961,-0.43269 -0.46154,-0.46154c-0.95192,-0.14423 -1.58654,0 -2.30769,0c-0.08654,0 -0.14423,-0.02884 -0.23077,0c-0.05769,0.02884 -0.20192,-0.02884 -0.23077,0l-0.69231,0.46154c-0.17307,0.11538 -0.43269,0.25961 -0.46154,0.46154l-0.23077,1.38462l-3.23077,-1.84615c-0.02884,-0.02884 -0.20192,0.02884 -0.23077,0l-3.46154,-0.92308l-0.92308,-0.46154c0.08654,-0.14423 0,-0.28846 0,-0.46154c-0.05769,-0.72115 -0.14423,-1.24039 -0.23077,-1.84615c0.08654,0.25961 0.31731,0.40385 0.46154,0.69231c0.08654,0.14423 0.14423,0.46154 0.23077,0.69231c0.25961,0.46154 0.57692,0.43269 0.69231,0.46154c0.08654,0.02884 0.14423,0.02884 0.23077,0c0.46154,-0.05769 0.63462,-0.23077 1.38462,-1.38462c0.0577,-0.08654 -0.02884,-0.14423 0,-0.23077c0.02884,-0.11538 0.02884,-0.11538 0,-0.23077c-0.02884,-0.17307 0.08654,-0.34615 0,-0.46154c0.34615,-0.14423 0.43269,-0.51923 0.46154,-0.92308v-1.15385c0.20192,-0.05769 0.375,-0.25961 0.46154,-0.46154l0.69231,-1.38462c0.11538,-0.20192 0.11538,-0.49038 0,-0.69231zM157.15385,66.23077c0.11538,0.14423 0.40385,0.20192 0.46154,0.23077l0.92308,1.61538c-0.40384,-0.02884 -0.98077,-0.20192 -1.38462,-0.23077v-0.23077c0.14423,-0.14423 0.23077,-0.25961 0.23077,-0.46154c0,-0.40384 -0.17307,-0.66346 -0.23077,-0.92308zM23.07692,88.84615c0.0577,0.0577 0.14423,0.17308 0.23077,0.23077v0.23077c-0.08654,0.28847 -0.14423,0.57692 0,1.38462c0.11538,0.34615 0.17308,0.28847 0.46154,0.46154c0.17308,0.11538 0.49038,0.0577 0.69231,0c0.0577,-0.02884 0.17308,0.02884 0.23077,0c-0.08654,0.83654 0.28847,1.64423 0.92308,2.07692c0.28847,0.20192 0.57692,0.46154 0.92308,0.46154c1.00962,0 1.70192,-0.92308 1.84615,-2.07692c0.0577,-0.40384 0.11538,-0.80769 0,-1.15385l0.46154,0.46154c0,0.14423 -0.20192,0.08654 -0.23077,0.23077v0.69231c0.0577,0.40385 0.34615,0.75 0.69231,0.92308h-0.46154c-0.11538,-0.02884 -0.14423,0 -0.23077,0c-0.34615,0.08654 -0.49038,0.08654 -1.15385,0.92308c-0.17307,0.23077 -0.28846,0.63462 -0.23077,0.92308c0.0577,0.25961 0.28847,0.34615 0.46154,0.46154c0.375,0.31731 0.72115,0.69231 1.15385,0.92308l0.46154,0.23077c0.08654,0.0577 0.375,-0.02884 0.46154,0v0.23077c0.08654,0.02884 0.14423,0 0.23077,0c0.0577,-0.02884 0.17308,-0.20192 0.23077,-0.23077l1.38462,-0.46154c0.25961,-0.17307 0.43269,-0.51923 0.46154,-0.92308v-0.46154c0.34615,0.23077 1.125,0.34615 3.23077,0.69231c0.0577,0 0.17308,0 0.23077,0c0.02884,0 0.20192,0 0.23077,0c0.0577,0 0.17308,0 0.23077,0h3.46154c0.17308,0.25961 0.54808,0.43269 0.92308,0.46154h2.30769c0.25961,-0.02884 0.51923,-0.08654 0.69231,-0.23077c0.14423,0.11538 0.28847,0.28847 0.46154,0.46154c0.20192,0.14423 0.46154,0.23077 0.69231,0.23077c0.0577,0 0.17308,0.02884 0.23077,0l0.46154,-0.23077v0.23077c0.0577,0.375 0.31731,0.77885 0.69231,0.92308c-0.08654,0.14423 -0.20192,0.25961 -0.23077,0.46154c0,0.46154 0.23077,0.92308 0.23077,1.38462v0.46154c0.08654,0.54808 0.46154,0.83654 0.69231,0.92308v0.46154c-0.08654,0.14423 -0.23077,0.25961 -0.23077,0.46154c0,0.40385 -0.02884,0.95192 0,1.38462c0.02884,0.28847 0.23077,0.51923 0.46154,0.69231c0,0.23077 -0.02884,0.46154 0,0.69231c-0.11538,0.17308 -0.20192,0.43269 -0.23077,0.69231c0.02884,0.31731 -0.02884,0.60577 0,0.92308v0.23077c0.0577,0.40385 0.40385,0.83654 0.92308,0.92308v0.46154l-1.38462,-1.15385c-0.05769,-0.05769 -0.17307,-0.20192 -0.23077,-0.23077l-2.53846,-0.46154c-0.11538,-0.02884 -0.34615,-0.02884 -0.46154,0h-0.23077l-0.46154,0.23077l-3,-0.69231l-1.61538,-2.07692c-0.05769,-0.08654 -0.14423,-0.20192 -0.23077,-0.23077h-0.23077c-0.25961,-0.14423 -0.69231,-0.23077 -0.92308,0l-0.46154,0.69231l-0.46154,-0.23077c-0.20192,-0.11538 -0.28846,-0.34615 -0.46154,-0.46154c-0.23077,-0.11538 -0.46154,-0.11538 -0.69231,0l-3.46154,1.84615c-0.05769,0.02884 -0.17307,0.17308 -0.23077,0.23077c-0.05769,0.0577 -0.20192,0.14423 -0.23077,0.23077l-0.92308,2.53846l-1.15385,-0.69231c-0.08654,-0.05769 -0.11538,-0.20192 -0.23077,-0.23077h-0.23077c-0.05769,0 -0.20192,0 -0.23077,0l-2.07692,0.46154l-0.69231,-1.38462l0.23077,-6.23077c0.02884,-0.14423 0,-0.31731 0,-0.46154c0,-0.14423 0.0577,-0.11538 0,-0.23077c-0.34615,-0.60577 -0.92308,-1.29808 -1.38462,-1.84615l-0.23077,-0.23077c-0.05769,-0.05769 -0.17307,-0.17307 -0.23077,-0.23077c-0.08654,-0.05769 -0.14423,-0.20192 -0.23077,-0.23077l-1.84615,-0.23077v-1.61538zM32.07692,92.53846c0,0.0577 0,0.20192 0,0.23077c-0.17307,0.23077 -0.23077,0.43269 -0.23077,0.69231c-0.11538,-0.14423 -0.31731,-0.20192 -0.46154,-0.23077c-0.51923,-0.14423 -1.00962,-0.34615 -1.61538,-0.46154zM173.76923,94.38462c0.40385,0.89423 0.80769,1.73077 1.15385,2.53846v1.84615c-0.08654,-0.14423 -0.28846,-0.17307 -0.46154,-0.23077l-0.46154,-3v-0.23077zM13.15385,97.61538l0.46154,0.46154c0.23077,0.23077 0.63462,0.375 0.92308,0.23077l0.92308,-0.69231l0.69231,1.84615c0,0.02884 0,0.20192 0,0.23077c0.02884,0.08654 0.17308,0.17308 0.23077,0.23077l0.46154,0.69231c0.02884,0.0577 -0.05769,0.20192 0,0.23077l0.92308,0.92308c0.0577,0.02884 0.40385,0.20192 0.46154,0.23077l1.15385,0.69231l1.84615,5.53846c0.02884,0.02884 -0.02884,0.20192 0,0.23077l0.46154,0.46154c0.20192,0.23077 0.63462,0.375 0.92308,0.23077l0.23077,-0.23077l0.69231,0.92308c0.0577,0.17308 0.0577,0.375 0.23077,0.46154c0.14423,0.08654 0.34615,0.17308 0.46154,0.23077c0.08654,0.02884 0.17308,-0.02884 0.23077,0l0.92308,1.38462c0.17308,0.25961 0.60577,0.375 0.92308,0.23077l0.92308,-0.46154c0.14423,-0.05769 0.375,-0.31731 0.46154,-0.46154l0.23077,0.69231c0.28847,2.01923 0.75,3.98077 1.15385,6l-0.23077,1.38462l-0.46154,1.38462l-0.46154,3c-0.02884,0.08654 -0.02884,0.14423 0,0.23077c0,0.02884 0,0.20192 0,0.23077c0.17308,0.69231 0.25961,1.41346 0.46154,2.07692l0.23077,0.23077c0.02884,0.11538 -0.08654,0.14423 0,0.23077c0.0577,0.0577 0.28847,0.08654 0.46154,0.23077l-0.23077,0.23077c-0.08654,0.14423 -0.02884,0.28847 0,0.46154c0,0.0577 0.20192,0.17308 0.23077,0.23077l1.38462,3.23077c0.02884,0.0577 -0.05769,0.17308 0,0.23077l3,2.53846l1.38462,2.07692c0.02884,0.0577 0.20192,0.20192 0.23077,0.23077c0.0577,0.08654 0,0.23077 0,0.23077c2.19231,2.88462 5.42308,6.75 6,7.15385l4.15385,2.07692c0.375,0.23077 0.77885,0.40385 2.07692,1.15385l0.46154,0.46154c1.58654,2.42308 3.86539,5.91346 5.76923,8.53846c4.21154,5.33654 5.25,6.86539 10.61538,12.23077c0.02884,0.02884 0.20192,-0.02884 0.23077,0l1.38462,1.15385c0.20192,0.20192 0.49038,0.25961 0.69231,0.46154l0.23077,0.46154c0.0577,0.0577 0.17308,-0.02884 0.23077,0c0.28847,0.17308 0.60577,0.375 0.92308,0.46154c0.0577,0.25961 0.20192,0.31731 1.38462,1.15385c0.20192,0.14423 0.46154,0.23077 0.69231,0.23077l0.46154,0.69231c0.08654,0.11538 0.08654,0.17308 0.23077,0.23077l0.92308,0.46154l0.23077,0.23077c0.0577,0.08654 0.14423,0.17308 0.23077,0.23077c0.40385,0.25961 0.92308,0.31731 1.38462,0.46154l0.23077,0.23077c0.0577,0.23077 0.28847,0.34615 0.46154,0.46154c0.08654,0.08654 0.17308,0.20192 0.23077,0.23077c0.14423,0.08654 0.25961,0.17308 0.46154,0.23077l0.69231,0.46154c0.11538,0.0577 0.34615,0.23077 0.46154,0.23077h0.46154c0.02884,0.02884 0.20192,0.20192 0.23077,0.23077h0.46154c0.08654,0.17308 0.28847,0.375 0.46154,0.46154c-36.375,-8.27885 -63.63461,-40.41346 -64.38462,-79.15385zM178.38462,102.69231c-0.02884,0.28847 0.02884,0.63462 0,0.92308l-0.23077,0.23077c-0.375,0.25961 -0.77885,0.43269 -1.15385,0.69231l-0.23077,-0.23077v-0.46154c0.08654,-0.02884 0.17308,-0.20192 0.23077,-0.23077c0.0577,-0.02884 0.20192,0.02884 0.23077,0zM138.69231,119.07692c-1.06731,0.14423 -1.875,0.89423 -2.07692,1.84615c-0.17307,0.77885 0.0577,1.41346 0.69231,1.84615c0.34615,0.23077 0.72115,0.46154 1.15385,0.46154c1.06731,0 2.04808,-0.86538 2.30769,-1.84615c0.17308,-0.54808 0.11538,-1.15385 -0.23077,-1.61538c-0.34615,-0.49038 -0.89423,-0.69231 -1.61538,-0.69231c-0.02884,0 -0.20192,0 -0.23077,0zM175.38462,119.53846c-1.78846,6.08654 -4.09615,11.88462 -7.15385,17.30769c-0.11538,0.08654 -0.02884,0.11538 -0.69231,0.92308c0.11538,-0.46154 -0.25961,-0.80769 -0.46154,-0.92308c-0.05769,-0.02884 -0.17307,-0.20192 -0.23077,-0.23077c-0.23077,-0.05769 -0.46154,0 -0.69231,0h-0.23077l0.23077,-0.46154c0.11538,-0.23077 0.11538,-0.43269 0.23077,-0.69231l0.23077,-0.46154c0.0577,-0.08654 0.23077,-0.11538 0.23077,-0.23077v-0.46154l0.92308,-3l0.23077,-0.92308l0.92308,-1.61538l0.46154,-0.46154c0.0577,-0.05769 0.20192,-0.14423 0.23077,-0.23077c0.31731,-0.75 0.34615,-1.21153 0.46154,-1.61538l0.92308,-1.61538l0.69231,-0.69231c0.11538,-0.05769 0.14423,-0.11538 0.23077,-0.23077l2.76923,-4.15385zM164.76923,139.61538c0.17308,0.11538 0.28847,-0.02884 0.46154,0c0.0577,0.02884 0.17308,0 0.23077,0c0.11538,-0.02884 0.375,0.08654 0.46154,0c-0.34615,0.43269 -0.92308,0.80769 -1.38462,1.38462l-1.15385,0.69231z"></path></g></g></g></svg>');
      }
      if(ID == '2'){
         $(".who_see").html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M96,16c-44.112,0 -80,35.888 -80,80c0,44.112 35.888,80 80,80c44.112,0 80,-35.888 80,-80c0,-44.112 -35.888,-80 -80,-80zM96,48c13.6,0 24,10.4 24,24v8c4.8,0 8,3.2 8,8v32c0,4.8 -3.2,8 -8,8h-48c-4.8,0 -8,-3.2 -8,-8v-32c0,-4.8 3.2,-8 8,-8v-8c0,-13.6 10.4,-24 24,-24zM96,60c-6.4,0 -12,5.6 -12,12v8h12h12v-8c0,-6.4 -5.6,-12 -12,-12zM96,96c-4.41828,0 -8,3.58172 -8,8c0,4.41828 3.58172,8 8,8c4.41828,0 8,-3.58172 8,-8c0,-4.41828 -3.58172,-8 -8,-8z"></path></g></g></svg>');
      }
      if(ID == '3'){
         $(".who_see").html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M60.425,19.2c-34.8864,0.6016 -38.4516,24.7926 -31.45,52.575c-1.3568,0.7808 -3.5882,3.2593 -3.025,7.6625c1.0496,8.2112 4.6094,10.2897 6.875,10.4625c0.864,7.6672 9.095,17.4728 11.975,18.9v12.8c-6.4,19.2 -44.8,0 -44.8,51.2h76.8c0,-22.7072 12.7324,-32.4869 23.35,-38.1125c-9.9712,-3.4944 -20.2972,-3.9291 -23.35,-13.0875v-12.8c2.88,-1.4272 11.1046,-11.2267 11.975,-18.8875c0.512,-1.8112 0.9125,-8.2908 0.9125,-9.75c0,-7.9936 -0.1173,-24.5156 4.8875,-37.45c-1.7472,-8.6912 -6.3144,-16.0211 -16.1,-16.9875c-2.6176,-4.3328 -9.3268,-6.525 -18.05,-6.525zM141.5875,25.6c-7.1936,0 -12.75,6.4 -12.75,6.4c-41.2288,0 -18.3412,70.1014 -30.45,80.175c0,0 6.4381,9.5375 29.6125,9.5375v8.1625c-6.4,17.3248 -38.4,10.925 -38.4,42.925h102.4c0,-32 -32,-25.6002 -38.4,-42.925v-8.2375c23.2896,0 28.6875,-9.225 28.6875,-9.225c-13.0368,-10.7008 9.7064,-86.8125 -40.7,-86.8125z"></path></g></g></svg>');
      }
    } else {
      //Materialize.toast(SomethingWentWrongHere, 8000);
    } 
  });

  // Open Post Box
  $("body").on("click", "#quickPost", function() {
    var category = $(this).attr("data-category");
    var data = "newPost=" + category;
    $.ajax({
      type: "GET",
      url: requestUrl + "contents/newPost",
      data: data,
      beforeSend: function() {
        $("body").append(preLoaderPopUp);
		$('body').addClass('disableScroll'); 
      },
      success: function(response) {
		  if(response != '200'){ 
				  $("body").append(response);
				  setTimeout(function() {
					  //$("#postPopUpBox").addClass("poSBoxContainerHide"); 
					 AutoTiseTextArea();
				  }, 500);
			     $(".popUpPreLoaderWrap").remove();
				 $(".news_post_create").removeClass("changeTheSize");
				 $(".createNewPost_two").removeClass("createNewPost_two_change");
				 $(".ppos_modal").hide(); 
		  }else {
		      $('body').removeClass('disableScroll'); 
			  $(".ppos_modal").hide(); 
			  $(".popUpPreLoaderWrap").remove();
		  }
        
      }
    });
  });
 
  // URL Extractor
  function extractHostname(url) {
    var hostname;
    //find & remove protocol (http, ftp, etc.) and get hostname

    if (url.indexOf("//") > -1) {
      hostname = url.split("/")[2];
    } else {
      hostname = url.split("/")[0];
    }

    //find & remove port number
    hostname = hostname.split(":")[0];
    //find & remove "?"
    hostname = hostname.split("?")[0];

    return hostname;
  }

  // To address those who want the "root domain," use this function:
  function extractRootDomain(url) {
    var domain = extractHostname(url),
      splitArr = domain.split("."),
      arrLen = splitArr.length;

    //extracting the root domain here
    //if there is a subdomain
    if (arrLen > 2) {
      domain = splitArr[arrLen - 2] + "." + splitArr[arrLen - 1];
      //check to see if it's using a Country Code Top Level Domain (ccTLD) (i.e. ".me.uk")
      if (
        splitArr[arrLen - 2].length == 2 &&
        splitArr[arrLen - 1].length == 2
      ) {
        //this is using a ccTLD
        domain = splitArr[arrLen - 3] + "." + domain;
      }
    }
    return domain;
  }
  var timer = null;
  var images = new Array();
  var curImage = 0;
  var noimage = requestUrl + "uploads/images/safe_img.png";
  $("body").delegate("#link_url", "keyup keypress paste", function() {
	  document.getElementById('slnk').style.pointerEvents = 'none';
    clearTimeout(timer);
    timer = setTimeout(function() {
      var contents = $("#link_url").val();
      contents = $.trim(contents);
      if (contents !== "") {
        geturl = new RegExp(
          "(^|[ \t\r\n])((http|https):(([A-Za-z0-9$_.+!*(),;/?:@&~=-])|%[A-Fa-f0-9]{2}){2,}(#([a-zA-Z0-9][a-zA-Z0-9$_.+!*(),;/?:@&~=%-]*))?([A-Za-z0-9$_+!*();/?:~-]))",
          "g"
        );
        url = contents.match(geturl);
        var dataVV = "url=" + contents; 
        if ($.trim(url).length != 0) { 
          $.ajax({
            type: "POST",
            url: requestUrl + "requests/urlinfo",
            dataType: "json",
            data: dataVV,
            cache: false,
            beforeSend: function() {
              $(".post-modal-header").append(loadingMini); 
			  $('.share_this_link').attr('disabled', true);
            },
            success: function(response) {
				AutoTiseTextArea();
			    document.getElementById('slnk').style.pointerEvents = 'auto';
              $(".loadingUrl").remove();
              if (response !== null) {
                $("#hostname").html('<a href="' + contents + '" >' + extractRootDomain(contents) + "</a>");
                $("#hostname").attr("data-host", extractRootDomain(contents));
                $("#link_title").val(response.title);

                $("#link_summary").val(response.content);
                if ($.trim(response.images[0])) {
					if ($.trim(response.images[0]) && !$.trim(response.images[0]).match(/^.+:\/\/.*/)) {
						$("#images_div").append('<img src="' + noimage + '" class="a0uk">'); 
					}else{ 
					$("#images_div").append('<img src="' + response.images[0] + '" class="a0uk">');
					} 
                } else {
                  $("#images_div").append('<img src="' + noimage + '" class="a0uk">');
                }

                $(".write_post_information, .link_details_box").show();
                $(".write_post_link").hide();
              }

              $(".write_post_information, .link_details_box").show();
              $(".write_post_link").hide();
			  
            }
          });
        }
      }
    }, 500);
  });
  //Remove Link
  $("body").on("click", ".removeLink", function() {
    $("#link_title , #link_summary , #link_url").val("");
    $("#link_title , #images_div").html("");
    $(".write_post_information, .link_details_box").hide();
    $(".write_post_link").show();
  });
  //Close Post Box
  $("body").on("click", "#closePost", function() {
    $(".poSBoxContainer , .share-modal-overlay , .share-modal , .product_popUp_wrapper , .fixedBackground , .crop-avatar-container").remove();
	
	$('body').removeClass('disableScroll'); 
  }); 
  // Capture Video ScreenShot
  function CaptureVideoScreenShot(){ 
        var UniqVideoName = '_' + (new Date().getUTCMilliseconds().toString() + new Date().getTime().toString()).toString();
		var frame = captureVideoFrame('player-video', 'png');
		 
		// Show the image
		var img = document.getElementById('player-video');
		img.setAttribute('poster', frame.dataUri); 
		// Upload the image...
		var formData = new FormData();
		formData.append('fileshot', frame.blob, UniqVideoName+'.' + frame.format); 
		 $('#vs').val(UniqVideoName); 
		// ...with plain JS
		var request = new XMLHttpRequest();
		request.open('POST', requestUrl+'uploads/videos', true);
		request.setRequestHeader('Content-Type', 'application/multipart/form-data; charset=UTF-8');
		request.send(formData);
		 
		// ...or with jQuery
		$.ajax({
			url: requestUrl + "requests/screenshot.php",
			method: 'POST',
			data: formData,
			processData: false,
			contentType: false 
		});   
}
  
  // Uploading Music, Video and Image
  $("body").on("change", "#uploadBtn", function(e) {
    e.preventDefault();
    var values = $("#uploadvalues").val();
	var id = $("#uploadBtn").attr("data-id");
	var data = { t: id  };
    $("#uploadform").ajaxForm({
		 type: "POST",
         data: data,
		 delegation: true,
        //target: '#uploadedNew',
		cache: false,
        beforeSubmit: function() {  
		  $(".file_label").addClass('disabled');
		  $('#progr').append('<div class="cssProgress"><div class="progress3"><div class="cssProgress-bar cssProgress-warning cssProgress-active"  style="" role="progressbar"></div></div><div class="cssProgress-label2 cssProgress-label2-right"></div></div>'); 
        }, uploadProgress: function(e, position, total, percentageComplete)  {
		  $('.cssProgress-bar').width(percentageComplete + '%' );
		  $('.cssProgress-label2-right').html(percentageComplete + '%'); 
		},
        success: function(response) {  
		 var codes = ["invalidmusic", "invalidvideo", "invalidimage"]; 
				 $(".cssProgress").remove(); 
			      $(".music_details_box , .write_post_information, .newImagesHere, .imagepreview").show();
				  $(".newUpload").hide();  
				  $('#uploadedNew').append(response);
				  //var K = $(".UploadedItemNew:last-child").attr("id");
				  var K = $('.UploadedItemNew').map(function(){ return this.id }).toArray();
				  var T = K + "," + values;
					  if (T != "undefined,") {
						$("#uploadvalues").val(T); 
						$('.vdShr').show();
					  }
					 if ($("#uploadBtn").hasClass("upload_image_button")) { 
						$(".file_label").removeClass('disabled');
					 }  
					 if(id == 'video'){
						 setTimeout(function() {
					        CaptureVideoScreenShot();    
                        },  2000);
				     } 
        },
        error: function() {}
      }).submit();
  });
  
 // Save Text Post from Data
 $("body").on("click", ".share_text", function(){
	   var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var data = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&myFeeling='+feeling;
	   
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
		                $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					        $("#new_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   });
	     
  });
  // Save Text Post from Data
 $("body").on("click", ".share_event_text", function(){
	   var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var eventID = $('#e_posts').attr('data-ev');
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var data = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&eventID='+eventID+'&myFeeling='+feeling;
	    
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
		          $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					    $("#e_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   });
	 
  });
   // Save Gif Post from Data
 $("body").on("click", ".share_event_gif", function(){
	   var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var eventID = $('#e_posts').attr('data-ev');
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text); 
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var giphy = $('.urlgif').val();
	   var data = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&animateImage='+giphy+'&eventID='+eventID+'&myFeeling='+feeling;
	  
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
		           $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove(); 
					    $("#e_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  });
 // Save Gif Post from Data
 $("body").on("click", ".share_gif", function(){
	   var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text); 
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var giphy = $('.urlgif').val();
	   var data = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&animateImage='+giphy+'&myFeeling='+feeling;
	    
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
		           $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove(); 
					    $("#new_posts").prepend(response); 
						  if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
				  
			   }
		   }); 
  });
  // Save Location Post from Data
 $("body").on("click", ".share_location", function(){
	   var postTitle = $("#place").val();
	   var postDetails = $("#aboutplace").val();
	   var latitude = $("#lati").val();
	   var longitude = $("#longi").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text); 
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var giphy = $('.urlgif').val();
	   var data = 'place=' + encodeURIComponent(postTitle) + '&aboutplace='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&lat='+latitude+'&long='+longitude+'&myFeeling='+feeling;
	    
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
		           $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					    $("#new_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  });
    // Save Location Post from Data
 $("body").on("click", ".share_event_location", function(){
	   var postTitle = $("#place").val();
	   var postDetails = $("#aboutplace").val();
	   var latitude = $("#lati").val();
	   var longitude = $("#longi").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var eventID = $('#e_posts').attr('data-ev');
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text); 
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var giphy = $('.urlgif').val();
	   var data = 'place=' + encodeURIComponent(postTitle) + '&aboutplace='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&lat='+latitude+'&long='+longitude+'&eventID='+eventID+'&myFeeling='+feeling;
	   
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
		           $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove(); 
					     $("#e_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  });
  // Save Image Post from Data
  $("body").on("click",".share_image", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#uploadvalues").val(); 
	      var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&uploads='+UploadedImageValues+'&myFeeling='+feeling;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){
			      $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(html){ 
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					   
					  $("#new_posts").prepend(html); 
					   if ($(".noPost").length > 0) {
						   $(".noPost").remove();
					   }   
			   }
		   }); 
  });
    // Save Image Post from Data
  $("body").on("click",".share_event_image", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   var eventID = $('#e_posts').attr('data-ev');
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#uploadvalues").val(); 
	      var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&uploads='+UploadedImageValues+'&eventID='+eventID+'&myFeeling='+feeling;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){
			       $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(html){
			            $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					     $("#e_posts").prepend(html); 
						  if ($(".noPost").length > 0) {
						 	 $(".noPost").remove();
					     }  
				   
			   }
		   }); 
  });
 // Like the Post
 $("body").on("click",".like_p", function(){
    var PostID = $(this).attr("data-post");
	var LikeType = $(this).attr("data-liked");
	var type = $(this).attr("data-type");
	var postType = $(this).attr("data-pt");
	var dataLike = 'post='+ PostID + '&t='+ LikeType + '&f=' + type + '&pt='+postType;
	$.ajax({
        type:'POST',
		url: requestUrl + 'requests/activity',
		data: dataLike,
		beforeSend: function(){ $("#after_p"+PostID).after('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');},
		success: function(html){
			$('.progress_blue').remove();
			if(html == '200'){ 
				 ion.sound.play("alert"); 
			} else {
				if(LikeType == 'p_like') {
				  $(".p_"+PostID).attr("data-liked", "p_unlike"); 
				  if(html == 1){
			          $(".pl_sum"+PostID).show();
			      }
				  if($(".unli_"+PostID).attr("data-unliked") == 'unliked'){
					  $(".bunli_"+PostID).remove();
					  $(".unli_"+PostID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" tyle=" fill:#000000;" class="punli bunli_'+PostID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M120.4,24.08c-6.59781,0 -12.85969,1.42438 -18.705,4.07156l-5.375,23.44844h12.72531l-12.37594,30.96h8.93594l-28.20531,45.40531l8.6,-38.52531h-11.35469l10.66937,-30.96h-14.44531l5.17344,-27.06312c-7.05469,-4.78375 -15.45313,-7.33688 -24.44281,-7.33688c-24.65781,0 -44.72,20.06219 -44.72,44.72c0,39.90938 34.97781,63.3175 60.5225,80.42344c6.5575,4.38063 12.21469,8.17 16.39375,11.66375c0.645,0.52406 1.42438,0.79281 2.20375,0.79281c0.77938,0 1.55875,-0.26875 2.20375,-0.79281c4.1925,-3.49375 9.83625,-7.26969 16.39375,-11.66375c25.54469,-17.10594 60.5225,-40.51406 60.5225,-80.42344c0,-24.65781 -20.06219,-44.72 -44.72,-44.72z"></path></g></g></g></svg>');
					  $(".unli_"+PostID).attr("data-unliked","unlike");
				  }
				  $(".ln_"+PostID).remove();
				  $("#p_a"+PostID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="ly_'+PostID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>'); 
				  //$(".l_"+PostID).removeClass("glyphsSpriteHeart__outline_ok__24__grey_9").addClass("glyphsSpriteHeart__outline__24__grey_9");
				  $(".p_a"+PostID).addClass("l_animation");
				  $(".u_p"+PostID).append('<div class="_6jUvg l_h'+PostID+'" id="l_h'+PostID+'"><span class="Y9j-N icons_tree coreSpriteLikeAnimationHeart"></span></div>');
				  $(".l_sum"+PostID).html(html); 
				  ion.sound.play("liked");
				  setTimeout(function() {
					$(".p_a"+PostID).removeClass("l_animation");
					$(".l_h"+PostID).remove();
				  },1000);
				}
				if(LikeType == 'p_unlike'){
				  $(".p_"+PostID).attr("data-liked", "p_like");
				  if(html == 0){
			          $(".pl_sum"+PostID).hide();
			      } 
				  ion.sound.play("liked");
				  //$(".l_"+PostID).removeClass("glyphsSpriteHeart__outline__24__grey_9").addClass("glyphsSpriteHeart__outline_ok__24__grey_9");
				  $(".ly_"+PostID).remove();
				  $("#p_a"+PostID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="ln_'+PostID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>'); 
				  $(".u_p"+PostID).append('<div class="_6jUvg l_h'+PostID+'" id="l_h'+PostID+'"><span class="Y9j-N icons_tree coreSpriteUnLikeAnimationHeart"></span></div>');
				  $(".p_a"+PostID).addClass("ul_animation");
				  $(".l_sum"+PostID).html(html);
				   setTimeout(function() {
					$(".p_a"+PostID).removeClass("ul_animation");
					$(".l_h"+PostID).remove();
				  }, 1000);
				}
			}
			 
		}
	});
 });
 // Unlike Post
 $("body").on("click",".dCJp8sh", function() {
    var ID = $(this).attr('id');
	var type = $(this).attr('data-type'); 
    var UnlikeIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" tyle=" fill:#000000;" class="punli bunli_'+ID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M120.4,24.08c-6.59781,0 -12.85969,1.42438 -18.705,4.07156l-5.375,23.44844h12.72531l-12.37594,30.96h8.93594l-28.20531,45.40531l8.6,-38.52531h-11.35469l10.66937,-30.96h-14.44531l5.17344,-27.06312c-7.05469,-4.78375 -15.45313,-7.33688 -24.44281,-7.33688c-24.65781,0 -44.72,20.06219 -44.72,44.72c0,39.90938 34.97781,63.3175 60.5225,80.42344c6.5575,4.38063 12.21469,8.17 16.39375,11.66375c0.645,0.52406 1.42438,0.79281 2.20375,0.79281c0.77938,0 1.55875,-0.26875 2.20375,-0.79281c4.1925,-3.49375 9.83625,-7.26969 16.39375,-11.66375c25.54469,-17.10594 60.5225,-40.51406 60.5225,-80.42344c0,-24.65781 -20.06219,-44.72 -44.72,-44.72z"></path></g></g></g></svg>';
	var UnlikedIcon = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" tyle=" fill:#000000;" class="punli bunli_'+ID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8e24aa"><g id="surface1"><path d="M120.4,24.08c-6.59781,0 -12.85969,1.42438 -18.705,4.07156l-5.375,23.44844h12.72531l-12.37594,30.96h8.93594l-28.20531,45.40531l8.6,-38.52531h-11.35469l10.66937,-30.96h-14.44531l5.17344,-27.06312c-7.05469,-4.78375 -15.45313,-7.33688 -24.44281,-7.33688c-24.65781,0 -44.72,20.06219 -44.72,44.72c0,39.90938 34.97781,63.3175 60.5225,80.42344c6.5575,4.38063 12.21469,8.17 16.39375,11.66375c0.645,0.52406 1.42438,0.79281 2.20375,0.79281c0.77938,0 1.55875,-0.26875 2.20375,-0.79281c4.1925,-3.49375 9.83625,-7.26969 16.39375,-11.66375c25.54469,-17.10594 60.5225,-40.51406 60.5225,-80.42344c0,-24.65781 -20.06219,-44.72 -44.72,-44.72z"></path></g></g></g></svg>';
	 
	var LikeType = $(this).attr("data-unliked"); 
	var postType = $(this).attr("data-pot");
	var dataLike = 'post='+ ID + '&t='+ LikeType + '&f=' + type + '&pt='+postType;
	$.ajax({
        type:'POST',
		url: requestUrl + 'requests/activity',
		data: dataLike,
		beforeSend: function(){ $("#after_p"+ID).after('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');},
		success: function(response){
			if(LikeType == 'unlike'){
				$(".bunli_"+ID).remove();
				$(".unli_"+ID).append(UnlikedIcon);
				$(".unli_"+ID).attr("data-unliked","unliked");
				ion.sound.play("glass_breaking");
				if($("#p_"+ID).attr("data-liked") == 'p_unlike'){
					$(".ly_"+ID).remove();
				    $("#p_a"+ID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="ln_'+ID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>'); 
					 $(".p_"+ID).attr("data-liked", "p_like"); 
				}
				$(".dis_"+ID).text(response); 
			}
			if(LikeType == 'unliked'){
				$(".bunli_"+ID).remove();
				$(".unli_"+ID).append(UnlikeIcon);
				$(".unli_"+ID).attr("data-unliked","unlike");
				$(".dis_"+ID).text(response);
			}
			$('.progress_blue').remove(); 
			if(response == 0){
			   $(".dis"+ID).hide();
		    }else{
			   $(".dis"+ID).show();
			   $(".pl_sum"+ID).show();
			}
		}
	});
  });
 // Add post from Favourite List
 $("body").on("click", ".fav_p", function(){
	 var PostID = $(this).attr("data-post");
	 var type = $(this).attr("data-type");
	 var FavType = $(this).attr("data-fav");
	 var dataFav = 'post='+ PostID + '&f_t='+ FavType + '&f=' + type;
	 $.ajax({
         type:'POST',
		url: requestUrl + 'requests/activity',
		data: dataFav,
		beforeSend: function(){},
		success: function(html){ 
			    if(FavType == 'ad_fav') {
				     $(".f_a"+PostID).addClass("f_animation");
					 $(".f_"+PostID).attr("data-fav","rem_fav");
					 //$(".f_i"+PostID).removeClass("glyphsSpriteSave__outline__24__grey_9").addClass("glyphsSpriteFavourite_outline_added");
					 $('.fav_n_'+PostID).remove();
					 $(".f_i"+PostID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_y_'+PostID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3e99ed"><path d="M48,16c-1.105,0 -2.17695,0.11508 -3.21875,0.32812c-7.29258,1.49133 -12.78125,7.93688 -12.78125,15.67188v144l64,-24l64,24v-144c0,-1.1 -0.11406,-2.17969 -0.32813,-3.21875c-1.27828,-6.25078 -6.20234,-11.17484 -12.45312,-12.45312c-1.0418,-0.21305 -2.11375,-0.32812 -3.21875,-0.32812z"></path></g></g></svg>');
					 setTimeout(function() {
					   $(".f_a"+PostID).removeClass("f_animation"); 
				     }, 1000);
				}
				if(FavType == 'rem_fav') {
				     $(".f_a"+PostID).addClass("f_animation");
					 $(".f_"+PostID).attr("data-fav","ad_fav");
					 $('.fav_y_'+PostID).remove();
					 $(".f_i"+PostID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;" class="fav_n_'+PostID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M48,16c-1.105,0 -2.17695,0.11508 -3.21875,0.32812c-7.29258,1.49133 -12.78125,7.93688 -12.78125,15.67188v144l64,-24l64,24v-144c0,-1.1 -0.11406,-2.17969 -0.32813,-3.21875c-1.27828,-6.25078 -6.20234,-11.17484 -12.45312,-12.45312c-1.0418,-0.21305 -2.11375,-0.32812 -3.21875,-0.32812z"></path></g></g></svg>');
					 //$(".f_i"+PostID).removeClass("glyphsSpriteFavourite_outline_added").addClass("glyphsSpriteSave__outline__24__grey_9");
					 setTimeout(function() {
					   $(".f_a"+PostID).removeClass("f_animation"); 
				     }, 1000);
				}
			} 
	 });
 });
 
 var timeoutId;
 // Append User Profile Card
 $("body").on("mouseenter", ".show_card", function() {
     var card = $(this).offset();
	 var cardY = card.top - $(window).scrollTop() + $(this).height();
     var cardX = card.left - $(window).scrollLeft();
     var available = $(window).width() - cardX;
	 cardY = cardY - 60;
	 var dataUserID = $(this).attr("id");
	 var dataUserUsername = $(this).attr("data-user");
	 var dataType = $(this).attr("data-type");
	 var dataCard = 'card='+dataUserID+'&user='+dataUserUsername + '&f='+dataType;
	 var CardLoading = '<div class="HoverCardLoadingContainer" style="position: fixed; top: ' + cardY + 'px; left:' + cardX + 'px"><div class="HoverCardLoading"><div class="HoverCardLoadingCover animationHoverCard"></div><div class="HoverCardLoadingAvatar animationHoverCard"></div><div class="HoverCardLoadingInfo"><div class="HoverCardLoadingInfoUserName animationHoverCard"></div><div class="HoverCardLoadingInfoUserMention animationHoverCard" style="margin-bottom:15px;"></div><div class="HoverCardLoadingInfoUserNote_1 animationHoverCard"></div><div class="HoverCardLoadingInfoUserNote_2 animationHoverCard"></div><div class="HoverCardLoadingInfoUserNote_3 animationHoverCard"></div></div></div></div>'; 
	 if (!timeoutId) {
        timeoutId = window.setTimeout(function() {
	 if ($(window).width() > 800) {
	 $.ajax({
         type:'POST',
		url: requestUrl + 'requests/activity',
		data: dataCard,
		beforeSend: function(){
		     $("body").append(CardLoading); 
		},
		success: function(html){
			$("body").append('<div class="userCardWrapp" style="position: fixed; top: ' + cardY + 'px; left:' + cardX + 'px"><div class="profile_hover_card">'+html+'</div></div>');
			 setTimeout(function() { 
				  $(".HoverCardLoadingContainer").fadeOut("normal", function() {
					  $(this).remove();
				 });
				}, 500); 
		}
		});
	 }
	 }, 600);
    }
 });
 // Remove When user Mouselive the show_card
 $('body').on('mouseleave', '.show_card', function(e) {
      var to = e.toElement || e.relatedTarget;
      if (!$(to).is(".userCardWrapp , .HoverCardLoadingContainer")) { 
	   window.clearTimeout(timeoutId);
              timeoutId = null;
        setTimeout(function() { 
		  $(".userCardWrapp , .HoverCardLoadingContainer").fadeOut("normal", function() {
              $(this).remove();
         });
        }, 1000);
      }
  });
 $('body').on('mouseleave', '.userCardWrapp , .HoverCardLoadingContainer', function() {
    $(".userCardWrapp , .HoverCardLoadingContainer").fadeOut("normal", function() {
		      window.clearTimeout(timeoutId);
              timeoutId = null;
              $(this).remove(); 
    });
  });
  //Insert a New Comment
  function AddNewComment(){
      $('.addComment').bind('keydown', function(e) {
		  var key = e.which || e.keyCode || 0; 
           if (key == 13) {
		   var dataType = $(this).attr("data-type");
		   var ID = $(this).attr("data-id");
		   var comment = $(this).val();
		   var postType = $(this).attr("data-post");
		   var voice = $(".voice_r_"+ID).val();
		   var dataComment = 'f='+dataType+'&post='+ID+'&comment='+encodeURIComponent(comment)+ '&dp='+postType+'&rec='+voice;
		   if ($.trim(comment).length == 0) {
               if($.trim(voice).length == 0){ 
			       return false;
			   }
           } 
				$.ajax({
					type: "POST",
					url: requestUrl + "requests/activity",
					data: dataComment, 
					beforeSend: function(){ $(".all_c_for"+ID).after('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');},
					success: function(html) {
						 $(".all_c_for" + ID).append(html);
						 $(".vals"+ID).val('');
						 $('.progress_blue , .mes_record').remove();
						 $('.voice_r').val('');
					}
				});
			} 
	  });
  }
  AddNewComment();
  //Like a Comment
  $("body").on("click", ".clike", function(){
	   var type = $(this).attr("data-type");
	   var LikeType = $(this).attr("data-lt");
	   var commentID = $(this).attr("data-post"); 
	   var dataLike = 'f='+type+'&t='+LikeType+'&comment='+commentID;
	   $.ajax({
        type:'POST',
		url: requestUrl + 'requests/activity',
		data: dataLike,
		beforeSend: function(){ $(".cUq_"+commentID).before('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');},
		success: function(html){
			$('.progress_blue').remove();
			if(html == '200'){
			     //M.toast({html: canNotSendEmptyPost , classes: 'warning'});
			} else {
				if(LikeType == 'c_like'){
				   //$("#cl"+commentID).removeClass("glyphsSpriteHeart__outline__24__grey_12").addClass("glyphsSpriteHeart__outline__24__grey_12_ok");
				   $(".cln_"+commentID).remove();
				   $("#cl"+commentID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 192 192" style=" fill:#000000;" class="clnb_'+commentID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>');
				   $("#c_c"+commentID).attr("data-lt","c_unlike");
				   if(html == 1){
			          $("#c_c_sum"+commentID).show(); 
			       } 
				  $("#c_c_sum"+commentID).html(html); 
				  $("#cl"+commentID).addClass("c_animation");
				  setTimeout(function() {
					$("#cl"+commentID).removeClass("c_animation");
				  }, 1000);
				}
				if(LikeType == 'c_unlike'){
				   //$("#cl"+commentID).removeClass("glyphsSpriteHeart__outline__24__grey_12_ok").addClass("glyphsSpriteHeart__outline__24__grey_12");
				   $(".clnb_"+commentID).remove();
				   $("#cl"+commentID).append('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 192 192" style=" fill:#000000;" class="cln_'+commentID+'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>');
				   $("#c_c"+commentID).attr("data-lt","c_like");
				    if(html == 0){
			          $("#c_c_sum"+commentID).hide(); 
			       } 
				   $("#c_c_sum"+commentID).html(html);
				   $("#before_"+commentID).remove();
				   $("#cl"+commentID).addClass("cr_animation");
				   setTimeout(function() {
					$("#cl"+commentID).removeClass("cr_animation");
				  }, 1000);
				   
				}
			}
		}
	   });
  });
  //See Other Comments
  $('body').on("click", '.moreComment', function() {
    var ID = $(this).attr("data-com");
    var Type = $(this).attr("data-type");
    var dataMoreComment = 'id=' + ID + '&f='+ Type;
    $.ajax({
      type: "POST",
      url: requestUrl + 'requests/activity',
      data: dataMoreComment,
      cache: false,
	  beforeSend: function(){
	     $("#after_p"+ID).after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
	  },
      success: function(html) {
        $(".all_c_for" + ID).html(html); 
		 $("#hd"+ID).remove();
		 $(".preloadCom").remove();
      }
    });
    return false;
  });
  //Confirm Dialog  for Delete comment
  $("body").on("click", ".del_com", function(){
      var commentID = $(this).attr("id");//Get Comment id
	  var thePopUpType = $(this).attr("data-type");
	  var commentedUserName = $(this).attr("data-u");//Get Comment UserName
	  var commentedUserID = $(this).attr("data-ui"); // Get Commented User ID 
	  var popUpComment = 'popUp='+thePopUpType+'&com_id='+commentID+'&cuid='+commentedUserID+'&cunm='+commentedUserName;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/popups',
		  data: popUpComment,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  $("body").append(html);
		  }
		});
  });
  //Confirm Dialog Close
  $("body").on("click",".btn_0", function(){
	   $(".confirmBoxContainer , .setTimeContainer").remove(); 
  });
  //Delete the Comment
  $("body").on("click",".delete_this_comment", function(){
	   var commentID = $(this).attr("data-comment");//Get Comment id
	   var commentedUserName = $(this).attr("commentedUserName");//Get Comment UserName
	   var commentedUserID = $(this).attr("data-comUid"); // Get Commented User ID
	   var type = $(this).attr("data-type");
	   var removeComment = 'f='+type+'&comment='+commentID+'&ui='+commentedUserID;
		   $.ajax({
			  type: "POST",
			  url: requestUrl + 'requests/activity',
			  data: removeComment,
			  cache: false,
			  beforeSend: function(){ $(".cUq_"+commentID).before('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');},
			  success: function(response) { 
			    $(".confirmBoxContainer").remove(); 
				$(".progress_blue").remove();  
				 if(response ==  1){   
					$(".cUq_"+commentID).addClass("removeCom");
					 setTimeout(function() {
						 $(".cUq_"+commentID).fadeOut("normal", function() {
								$(this).remove();
						 });  
				     }, 500);
				 }
			  }
			});
		return false;
  });
  //Edit Comment Box 
  $("body").on("click", ".editc_", function(){
     var ID  = $(this).attr("id");
	 var PostID = $(this).attr("data-post");
	 var UserProfile = $(this).attr("data-userprofile");
	 var UserFullName = $(this).attr("data-name");
	 var commentText = $("#ed_com_"+ID).attr("data-comment");
	 
	 $("#all_c_for"+PostID).append('<div class="editCommentContainer"></div>');
	 $("#cUq_"+ID).after('<span class="editCommentBox upDiv"><div class="overflow_edit"><textarea class="editThisComment" id="edit_value'+ID+'" placeholder="" data-comment="'+ID+'" data-postID="'+PostID+'" data-link="'+UserProfile+'" data-name="'+UserFullName+'" data-type="editComment">'+commentText+'</textarea></div><span class="cancelEdit icons" id="'+ID+'"></span></span>');
     $("#cUq_"+ID).hide();
	 AutoTiseTextArea();
	 EditNewComment();
   });
   //Cancel Edit 
   $("body").on("click", ".cancelEdit", function(){
	   var ID  = $(this).attr("id"); 
	   $(".editCommentContainer").remove();
	   $(".editCommentBox").remove();
	   $("#cUq_"+ID).show();
	});
	//Send Edited Comment
	 function EditNewComment(){
      $('.editThisComment').bind('keydown', function(e) {
		  var key = e.which || e.keyCode || 0;
           if (key == 13) {
		   var ID  = $(this).attr("data-comment");
		   var dataType = $(this).attr("data-type");// Post Type editComment =>f
		   var PostID = $(this).attr("data-postID"); // Edited comment post_id_fk 
	       var UserProfile = $(this).attr("data-link"); // User profile link
	       var UserFullName = $(this).attr("data-name"); // User full name
		   var editcomment = $("#edit_value"+ID).val();
		   var dataEditComment = 'f='+dataType+'&post='+ID+'&comment='+encodeURIComponent(editcomment)+'&c_id='+PostID;
		   if ($.trim(editcomment).length == 0) {
              
            } else {
				$.ajax({
					type: "POST",
					url: requestUrl + "requests/activity",
					data: dataEditComment,
					cache: false,
					success: function(html) { 
					        if(html == 1){
								$("#ed_com_"+ID).attr("data-comment", editcomment);
						        $("#ed_com_"+ID).html('<a class="FPmhX" title="'+UserFullName+'" href="'+UserProfile+'">'+UserFullName+'</a> '+editcomment+'');
							} 
						   $(".editCommentContainer").remove();
						   $(".editCommentBox").remove();
						   $("#cUq_"+ID).show(); 
					}
				});
			}
			return false;
		   }
	  });
  }
  EditNewComment();
  //Open Post Menu 
  $("body").on("click", ".post_menu", function(){
       var ID = $(this).attr("id");
	   if (!$(".post_menu_"+ID).hasClass("opened_")) {
		  $(".post_menu_"+ID).addClass("opened_");
		} else {
		  $(".post_menu_"+ID).removeClass("opened_");
		}
  }); 
  
  //Confirm Dialog  for Delete comment
  $("body").on("click", ".del_post", function(){ 
	  var thePopUpType = $(this).attr("data-type");
	  var postID = $(this).attr("data-post");//Get Comment id
	  var postUserName = $(this).attr("data-u");//Get Comment UserName 
	  var popUpComment = 'popUp='+thePopUpType+'&pid='+postID+'&punm='+postUserName;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/popups',
		  data: popUpComment,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  $("body").append(html);
		  }
		});
  });

  //Delete Post
  $("body").on("click",".delete_this_post", function(){
      var ID = $(this).attr("data-post");
	  var dataUser = $(this).attr("data-user");
	  var type = $(this).attr("data-type");
	  var deletePost = 'f='+type+'&this='+ID+'&u='+dataUser;
	  $.ajax({
			  type: "POST",
			  url: requestUrl + 'requests/activity',
			  data: deletePost,
			  cache: false,
			  beforeSend: function(){
				 //Do something 
			  },
			  success: function(html) { 
			       if(html == 1){
					   $("#u_p"+ID).addClass("removePost");
					 setTimeout(function() {
						 $("#u_p"+ID).fadeOut("normal", function() {
								$(this).remove();
						 });  
				     }, 750);
				      
				   }
				   $(".confirmBoxContainer").remove(); 
			  }
			});
		return false;
  });
  // Append Report Post Modal Box
  $("body").on("click", ".rep_post", function(){
      var post = $(this).attr("data-post");
	  var user = $(this).attr("data-u");
	  var block = $(this).attr("data-block");
	  var type = $(this).attr("data-type");
	  var GetBlockPopUp = 'f='+type+'&post='+post+'&u='+user+'&id='+block;
	  $.ajax({
      type: "POST",
      url: requestUrl + 'requests/activity',
      data: GetBlockPopUp,
      beforeSend: function() {
        //
      },
      success: function(response) {
          $("body").append(response);
      }
    });
  });
  $("body").on("click",".closeReport", function(){
      $(".reportPostContainer").remove();
  });
  //Send Post Report
  $("body").on("click", ".report_Button", function(){
	   var report_note = $("input[name='report']:checked").val();
	   var type = $(this).attr("data-type");
	   var username = $(this).attr("data-un");
	   var userid = $(this).attr("data-ui");
	   var postid = $(this).attr("data-p");
	   if(!$("input[name='block_user']").is(":checked")) {  var block = 0; }else{ var block = 1;} 
	   if(!$("input[name='report']").is(":checked")) {
           M.toast({html: ForgotChooseReportType , classes: 'warning'});
       }else{
	       var dataReport = 'f='+type+'&note='+report_note+'&user='+username+'&i='+userid+'&pi='+postid+'&q='+block;
			 $.ajax({
				  type: "POST",
				  url: requestUrl + 'requests/activity',
				  data: dataReport,
				  cache: false,
				  beforeSend: function(){
					  $(".flag").hide();
					 $(".report_Button").append(TumblrStyleLoaderCss);
					 
				  },
				  success: function(html) { 
					    if(html == 1){
						   $(".reportPos-modal-middle").remove();
						   $(".reportPos_Wrap").append(reportSended);
						   setTimeout(function() {
								 $(".reportPostContainer").fadeOut("normal", function() {
										$(this).remove();
								 });  
							 }, 5000);
						}
						 
				  }
			});
		return false;  
	   } 
   });
   // Delete Image before post Wall
	$("body").on("click",".delete_this_image", function(){
		var ID = $(this).attr("id");
		var input = $('#uploadvalues');
		var type = $(this).attr("data-type");
		var data = 'image=' + ID + '&f='+type;
		$.ajax({
		  type: 'POST',
		  url: requestUrl + 'requests/activity', 
		  data: data,
		  cache: false,
		  beforeSend: function() {  },
		  success: function(response) {  
				 // After Delete
				input.val(function(_, value){
				   return value.split(',').filter(function(val){ // split the value
					 return val !== ID; // filter to return other values
				   }).join(','); // join them to create a new string.
				});
				$("#new"+ID).remove(); 
		  }
		}); 
	}); 
	// Get All Images From Data within PopUP
	$("body").on("click", "#openPopUp", function(){
	    var postID = $(this).attr("data-id");
		var PostUn = $(this).attr("data-u");
		var postUd = $(this).attr("data-ui");
		var type = $(this).attr("data-type");
		var getImages = 'f='+ type + '&p='+postID+'&u='+PostUn+'&d='+postUd;
		$.ajax({
		  type: 'POST',
		  url: requestUrl + 'requests/activity', 
		  data: getImages,
		  cache: false,
		  beforeSend: function() {  },
		  success: function(response) { 
			    $("body").append(response);
		  }
		}); 
	});
	// Save the Link From Data
	$("body").on("click", ".share_this_link", function(){
	   var type = $(this).attr("data-type");
	   var titleLink = $("#link_title").val();
	   var linkSummary = $("#link_summary").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var linkUrl = $("#link_url").val();
	   var img = $('#images_div img').attr('src');
	   var hostname = $("#hostname").attr("data-host"); 
	   var sendLink = 'f='+type+'&l_title='+encodeURIComponent(titleLink)+'&l_summary='+encodeURIComponent(linkSummary)+'&p_d='+encodeURIComponent(postDetails)+'&show='+whois+'&tag='+tags+'&ln='+encodeURIComponent(linkUrl)+'&tumb='+encodeURIComponent(img)+'&min='+hostname+'&myFeeling='+feeling;
		  $.ajax({
		  type: 'POST',
		  url: requestUrl + 'requests/event', 
		  data: sendLink,
		  cache: false,
		  beforeSend: function() {  },
		  success: function(response) {  
		      $('body').removeClass('disableScroll');  
			  $(".poSBoxContainer").remove();  
			  $(".prog-colm").remove(); 
			   if(response == 200){
				   $('.note_1').show();
			  }else if(response == 400){
				   $('.note_5').show();
			  }else {
					$("#new_posts").prepend(response); 
					 if ($(".noPost").length > 0) {
						 $(".noPost").remove();
					 } 
			   }
				  setTimeout(function() {
					   $('.note_5').hide();
                  }, 8000); 	
			
		      }
		});  
	});
	// Save the Video and Music From Data
	$("body").on("click", ".share_this_video, .share_this_music", function(){
	   var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   var videoScreen = $("#vs").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	    var UploadedVMValues = $("#uploadvalues").val(); 
		 var sendVMPost = 'f='+type+'&title='+encodeURIComponent(postTitle)+'&description='+ encodeURIComponent(postDetails) +'&show='+whois+'&tag='+tags+'&vm='+UploadedVMValues+'&myFeeling='+feeling+'&vis='+videoScreen;
		 $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/event', 
			  data: sendVMPost,
			  cache: false,
			  beforeSend: function(){ 
			        $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 		   
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();   
					        $("#new_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }   
			   }
		   }); 
  });
	// Save the Video and Music From Data
	$("body").on("click", ".share_this_event_video, .share_this_event_music", function(){
	   var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var eventID = $('#e_posts').attr('data-ev');
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	    var UploadedVMValues = $("#uploadvalues").val(); 
		   var sendVMPost = 'f='+type+'&title='+encodeURIComponent(postTitle)+'&description='+ encodeURIComponent(postDetails) +'&show='+whois+'&tag='+tags+'&vm='+UploadedVMValues+'&eventID='+eventID+'&myFeeling='+feeling;
		   $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/event', 
			  data: sendVMPost,
			  cache: false,
			  beforeSend: function(){
			        $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
		      $('body').removeClass('disableScroll'); 
				   $(".poSBoxContainer").remove();  
					   $(".prog-colm").remove();
					   $("#e_posts").prepend(response); 
					   if ($(".noPost").length > 0) {
						   $(".noPost").remove();
					   } 
				  setTimeout(function() {
					   $('.newWarning').remove();
                   }, 3000);	
			   }
		   }); 
  });
	// Save the Link From Data
	$("body").on("click", ".share_this_event_link", function(){
	   var type = $(this).attr("data-type");
	   var titleLink = $("#link_title").val();
	   var linkSummary = $("#link_summary").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var eventID = $('#e_posts').attr('data-ev');
	   var text = $("#hashTag").val();
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var linkUrl = $("#link_url").val();
	   var img = $('#images_div img').attr('src');
	   var hostname = $("#hostname").attr("data-host");
		   var sendLink = 'f='+type+'&l_title='+encodeURIComponent(titleLink)+'&l_summary='+encodeURIComponent(linkSummary)+'&p_d='+encodeURIComponent(postDetails)+'&show='+whois+'&tag='+tags+'&ln='+encodeURIComponent(linkUrl)+'&tumb='+encodeURIComponent(img)+'&min='+hostname+'&eventID='+eventID+'&myFeeling='+feeling;
		  $.ajax({
		  type: 'POST',
		  url: requestUrl + 'requests/event', 
		  data: sendLink,
		  cache: false,
		  beforeSend: function() {
			  $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><div class='indeterminates'></dv></div></div></div>");  
		  },
		  success: function(response) {  
		   	  $('body').removeClass('disableScroll');  
			  $(".poSBoxContainer").remove();  
			  $(".prog-colm").remove();  
			  $("#e_posts").prepend(response); 
			   if ($(".noPost").length > 0) {
						 $(".noPost").remove();
					 }  
		  }
		}); 
	});
	/*Close LightBox*/
	$("body").on("click",".closeLightBox", function(){
        $(".lightBoxContainer").addClass("Out");
		setTimeout(function() { 
		      $(".lightBoxContainer").remove(); 
	    }, 3000);
	});
	/*Select UnSelect Areas of interest */
	$("body").on("click", ".interested", function(){
	    var ID = $(this).attr("id");
        var Name = $(this).attr("data-name");
        var CateGoryClass = $(this).attr("data-category");
	    var type = $(this).attr("data-type");
		var dataSelected = $(this).attr("data-selected");
	    var interestType = $(this).attr("data-ctype");
	    var interestValue = $(this).attr("data-value");  
		   var insertInterest = 'f='+type+'&this='+interestType+'&with='+interestValue+ '&ty='+dataSelected;
		   $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: insertInterest,
			  cache: false,
			  beforeSend: function() {  },
			  success: function(response) { 
				   if(dataSelected == 'select'){
				       $(".js-intr-id-" + ID).removeClass("intr").addClass("intr_selected");
                       $("#intereset_items").append('<span class="intr js-intr js-intr-id-" id="el' + ID +'"><span class="' + CateGoryClass +'"></span><span class="intr-txt">' + Name +"</span></span>");
					   $(".js-intr-id-" + ID).attr("data-selected", 'unselect');
				   }
				   if(dataSelected == 'unselect'){
				       $(".js-intr-id-" + ID).removeClass("intr_selected").addClass("intr");
                       $("#el" + ID).remove();
					   $("#" + interestValue).remove();
					   $(".js-intr-id-" + ID).attr("data-selected", 'select');
				   }
			  }
			});  
	});
 
  // Close Interested Body
  $("body").on("click", ".selectFinished", function() {
    $("#interestedContainer")
      .removeClass("interestedListContainer")
      .addClass("interestedListContainerClose");
    setTimeout(function() {
      $("#interestedContainer").remove();
    }, 10000);
  });
  /*Avtivate the save settings button after changed the option selected*/ 
  $("body").on("change", ".zOJg-", function(){
    $("#set_button").show();
  });
  $("body").on("change keyup", ".chng", function(){
    $("#set_profile").show();
  });
  $("body").on("change keyup", ".ujob", function(){
    $("#set_business").show();
  });
  $("body").on("change keyup", ".mad", function(){
    $("#set_market_ad_ifo").show();
  });
  $("body").on("change keyup", ".phn", function(){
    $("#set_phone").show();
  });
  $("body").on("change keyup", ".chpas", function(){
    $("#set_pas").show();
  });
  
  // Save Personal Information Change
  $("body").on("click", ".save_personal_info", function(){
     var type = $(this).attr("data-type");
	 var selectedGender = $("select#gender option").filter(":selected").val();
	 var selectedRelationShip =  $("select#relationshipu option").filter(":selected").val();
	 var selectedSexuality = $("select#sexuality option").filter(":selected").val();
	 var selectedHeight = $("select#height option").filter(":selected").val();
	 var selectedWeight = $("select#weight option").filter(":selected").val();
	 var selectedLifeStyle = $("select#life_style option").filter(":selected").val();
	 var selectedChildren = $("select#children option").filter(":selected").val();
	 var selectedSmokeHabit = $("select#smoke_habit option").filter(":selected").val();
	 var selectedDrinkingHabit = $("select#drinking_habit option").filter(":selected").val();
	 var selectedBodyType = $("select#body_type option").filter(":selected").val();
	 var selectedHairColor = $("select#hair_color option").filter(":selected").val();
	 var selectedEyeColor = $("select#eye_color option").filter(":selected").val();
	 var savePersonalInformation = 'f='+type+'&gen='+selectedGender+'&sex='+selectedSexuality+'&height='+selectedHeight+'&weight='+selectedWeight+'&life='+selectedLifeStyle+'&child='+selectedChildren+'&smoke='+selectedSmokeHabit+'&drink='+selectedDrinkingHabit+'&body='+selectedBodyType+'&hair='+selectedHairColor+'&eye='+selectedEyeColor+'&relation='+selectedRelationShip;
	 if(selectedHeight >= 139 && selectedHeight <= 220 || selectedWeight >= 39 && selectedWeight <= 150) { 
	 $.ajax({
		type: 'POST',
		url: requestUrl + 'requests/activity', 
		data: savePersonalInformation,
		cache: false,
		beforeSend: function() { $("#personalinfo").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
		success: function(response) { 
		    setTimeout(function() {
               $(".preloadCom").remove();
			   $("#set_button").hide();
           }, 500);
		   $('.editedpp').after(response);
		    setTimeout(function() {
               $('.newOk, .newWarning').remove();
           }, 2000);
		}
	 }); 
	 } 
  });
  function validateURL(textval) {
  var urlregex = new RegExp( "^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
  return urlregex.test(textval);
}
  $("#username").livequery(function() {
    $(this).alphanum({
      allow: "_",
      disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.-",
      allowSpace: false,
      allowNumeric: false
    });
  });
  /*Save User Profile Information*/
  $("body").on("click", ".save_profile_info", function(){
    var type = $(this).attr("data-type"); 
	var ful_name = $("#fullname").val(); 
	var webAd = $("#websiteAddress").val();
	var u_bio = $("#pepBio").val();
	var l_word = $("#popLovedWord").val();
	var dataProfileInfo = 'f='+type+'&fn='+ful_name+'&web='+webAd+'&ub='+encodeURIComponent(u_bio)+'&lw='+encodeURIComponent(l_word);
	//Check url is valid
	if(!$.trim(webAd).length == 0){
		if(!validateURL(webAd)){ 
			return false;
		} 
	} 
	    $.ajax({
		type: 'POST',
		url: requestUrl + 'requests/activity', 
		data: dataProfileInfo,
		cache: false,
		beforeSend: function() { $("#profileinfo").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
		success: function(response) { 
		    setTimeout(function() {
               $(".preloadCom").remove();
			   $("#set_profile").hide();
            }, 2000);
		    $("#username").removeClass("wrongInput"); 
			$('.prin').after(response);  
			setTimeout(function() {
               $('.newOk, .newWarning').remove();
           }, 2000);	 
		}
	 }); 
	
  });
  /*Save User Job Information*/
  $("body").on("click", ".save_business", function(){
      var type = $(this).attr("data-type"); 
	  var job_title = $("#jobTitle").val();
	  var campany_name = $("#campanyName").val();
	  var scholl_university = $("#schollUniversity").val();
	  var jobData = 'f='+type+'&jt='+encodeURIComponent(job_title)+'&cn='+encodeURIComponent(campany_name)+'&su='+encodeURIComponent(scholl_university); 
	  $.ajax({
			type: 'POST',
			url: requestUrl + 'requests/activity', 
			data: jobData,
			cache: false,
			beforeSend: function() { $("#jobinfo").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');  },
			success: function(response) { 
				 setTimeout(function() {
					   $(".preloadCom").remove();
					   $("#set_business").hide();
					}, 2000);
				   $('.prbus').after(response);  
			        setTimeout(function() {
                        $('.newOk, .newWarning').remove();
                     }, 2000);	 
				}
	  });  
   });
   $("#phoneNumber").livequery(function() {
    $(this).alphanum({ 
      disallow: "#!@$%^&*()_=[]\\';,/{}|\":<>?~`.-", 
      allowSpace: false,
      allowNumeric: true,
	  allowLatin: false,  // a-z A-Z
      allowOtherCharSets : false,
    });
  });
   /*Save User Phone Number*/
     $("body").on("click", ".save_phone", function(){
      var type = $(this).attr("data-type"); 
	  var phone_number = $("#phoneNumber").val(); 
	  var phoneData = 'f='+type+'&ph='+phone_number; 
	  $.ajax({
			type: 'POST',
			url: requestUrl + 'requests/activity', 
			data: phoneData,
			cache: false,
			beforeSend: function() { $("#userphonenumber").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');  },
			success: function(response) { 
				 setTimeout(function() {
					   $(".preloadCom").remove();
					   $("#set_phone").hide();
					}, 2000);
				   $('.prpho').after(response);  
			        setTimeout(function() {
                        $('.newOk, .newWarning').remove();
                     }, 2000);	 
					}
	  });  
   });
	/*Change password*/
	$("body").on("click", ".save_new_pass", function(){
	     var type = $(this).attr("data-type");
		 var oldPass = $("#oldPassword").val(); 
		 var newPass = $("#newPassword").val(); 
		 var renewPass = $("#reNewPassword").val();  
		  
		   var dataPas = 'f='+type+'&old='+encodeURIComponent(oldPass)+'&new='+encodeURIComponent(newPass)+'&renew='+encodeURIComponent(renewPass);
		   $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: dataPas,
			  cache: false,
			  beforeSend: function() { $("#afpas").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');  },
			  success: function(response) { 
				  setTimeout(function() {
					   $(".preloadCom").remove();
					   $("#set_pas").hide();
					}, 500); 
					$('#afpas').after(response);
					 setTimeout(function() {
					     $('.newWarning , .newOk').remove();
					}, 2000);
			  }
			});  
	}); 
	
   // Change Notifications
   $("body").on("click",".notChange", function(){
	   var type = $(this).attr("post-type");
	   var type_two = $(this).attr("post-not");
	   var notChange = $(this).val();   
		   var dataNot = 'f='+type+'&not='+type_two+'&notit='+encodeURIComponent(notChange);
		   $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: dataNot,
			  cache: false,
			  beforeSend: function() {
				  $("#"+type_two+"a").after('<span class="preloadCom" style="margin-top: -40px;"><span class="progress"><span class="indeterminate"></span></span></span>');
				  $('.notChange').attr('disabled', true);
			  },
			  success: function(response) { 
				  setTimeout(function() {
					   $(".preloadCom").remove(); 
					   $('.notChange').attr('disabled', false);
					}, 500); 
						 setTimeout(function() {
							if(notChange == '0'){
							   $("#"+type_two).val('1');
							}
							if(notChange == '1'){
							   $("#"+type_two).val('0');
							} 
						}, 600); 
				   $('#'+type_two+'a').before(response);
				   setTimeout(function() {
					    $('.newOk , .newWarning').remove();
					}, 2000); 
			  }
			});  
	});
	/*Show Selected Feed*/
	$("body").on("click",".iconWrp", function(){
	    var type = $(this).attr("data-feed");
		var feed = $("#which_user_profile").attr("data-type");
		var who = $("#which_user_profile").attr("data-who");
		var id = $("#which_user_profile").attr("data-id");
	    var data = 'feed='+type+'&type='+feed+'&who='+who+'&id='+id;
		$.ajax({
			  type: "GET",
			  url: requestUrl + "requests/feed",
			  data: data,
			  beforeSend: function() {
				$(".postNewsFeed").remove();
			  },
			  success: function(response) {
				 $("html, body").animate({ scrollTop: $(".profile_posts_container").offset().top - 241  },  800 );
				 if(response == '400'){
					  // Do Something 
				 }else{
				    $("#feed").append(response);
					showMoreData();
				 }
			  }
		 });
	});
	/*Make a friend Request*/
	$("body").on("click",".friend_user", function(){
       var type = $(this).attr("data-type");
	   var get = $(this).attr("data-get");
	   var userID = $(this).attr("data-id");
	   var rel = $(this).attr("data-rel");
	   var pageType = $(this).attr("data-page");
	   var dataFriend = 'f='+get+'&ref='+type+'&ut='+userID;
	   $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: dataFriend,
			  cache: false,
			  beforeSend: function() {
				  //BeforeSend
			  },
			  success: function(response) {   
			    if(pageType == 'profile'){
					   if(type == 'udf'){
							$("#friend_user"+userID).removeClass("button_blue").addClass("button_yellow");
							$("#friend_user_"+userID).removeClass("sendFicon").addClass("alreadyFriend");
							$("#friend__user_"+userID).attr("data-type","uun"); 
					   }
					   if(type == 'uun'){ 
							if(rel == 'udf'){
								$("#friend_user"+userID).removeClass("button_yellow").addClass("button_blue");
								$("#friend_user_"+userID).removeClass("alreadyFriend").addClass("sendFicon");
								$("#friend__user_"+userID).attr("data-type", rel); 
							}
							if(rel == 'wait'){
								$("#friend_user"+userID).removeClass("button_orange").addClass("button_blue");
								$("#friend_user_"+userID).removeClass("friendWaiting").addClass("sendFicon");
								$("#friend__user_"+userID).attr("data-type", "uf"); 
							} 
							if(rel == 'uun'){
								$("#friend_user"+userID).removeClass("button_yellow").addClass("button_blue");
								$("#friend_user_"+userID).removeClass("alreadyFriend").addClass("sendFicon");
								$("#friend__user_"+userID).attr("data-type", rel); 
								$("#friend__user_"+userID).attr("data-rel", rel); 
							} 
					   }
						if(type == 'uf'){
							$("#friend_user"+userID).removeClass("button_blue").addClass("button_orange");
							$("#friend_user_"+userID).removeClass("sendFicon").addClass("friendWaiting");
							$("#friend__user_"+userID).attr("data-type","uun"); 
							$("#friend__user_"+userID).attr("data-rel", 'wait'); 
					   }
				}
				if(pageType == 'suggestion'){
					   if(type == 'udf'){
							$(".friend_user_sug"+userID).removeClass("iconFollow").addClass("iconFollowSended"); 
							$(".friend_user_sug"+userID).attr("data-type","uun"); 
					   }
					   if(type == 'uf'){
							$(".friend_user_sug"+userID).removeClass("iconFollow").addClass("iconFollowSended"); 
							$(".friend_user_sug"+userID).attr("data-type","uun"); 
					   }
					    if(type == 'uun'){ 
						   if(rel == 'udf'){
								$(".friend_user_sug"+userID).removeClass("iconFollowSended").addClass("iconFollow");  
								$(".friend_user_sug"+userID).attr("data-type", rel); 
							} 
						   if(rel == 'uf'){
							   $(".friend_user_sug"+userID).removeClass("iconFollowSended").addClass("iconFollow");  
							   $(".friend_user_sug"+userID).attr("data-type", rel);  
					       }
						   if(rel == 'uun'){
								$(".friend_user_sug"+userID).removeClass("iconFollowSended").addClass("iconFollow");  
								$(".friend_user_sug"+userID).attr("data-type", rel); 
							} 
				       }
				}
			       
			  }
	   });
	});
	//Change Profile Avatar Submit
	$('body').on('change', '#change', function(e) {
		e.preventDefault(); 
	    var id = $("#change").attr("data-id");
		var data = { t: id  };
		$("#avatarForm").ajaxForm({
			type: "POST",
			data: data,
		    target: '#user_profile_avatar',
			cache: false,
		    beforeSubmit: function() {
			   $("#user_profile_avatar").append("<div class='avatarUploadingAnimation'></div>");
			},
		    success: function() {
			  $('#user_profile_avatar >.profile_avatar_image_container:gt(0)').remove();
			  $(".avatarUploadingAnimation").remove();
		    },
		    error: function() {
	
		    }
		}).submit();
    });
	//Change Profile Cover Submit
	$('body').on('change', '#changeCover', function(e) {
		e.preventDefault(); 
	    var id = $("#changeCover").attr("data-id");
		var data = { t: id  };
		$("#coverForm").ajaxForm({
			type: "POST",
			data: data,
		    target: '#profile_cover_container',
			cache: false,
		    beforeSubmit: function() {
			   $(".profile_cover_container").append("<div class='coverUploadingAnimation'></div>");
			},
		    success: function() {
			  $('#profile_cover_container > .CoverImage:gt(0)').remove();
			  $(".coverUploadingAnimation").remove();
		    },
		    error: function() {
	
		    }
		}).submit();
    }); 
	 
	//Get User Chat
	$("body").on("click", ".getuse", function(){
		var type = $("#chatBox").attr("data-type");
		var page = $(".pageResType").attr("data-page");
        var userID = $(this).attr("data-id");
		var userName = $(this).attr("data-user"); 
	    var chat = 'f='+type+'&user='+userName+'&id='+userID + '&ct=' +page;
		$.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: chat,
			  cache: false,
			  beforeSend: function() {
				   $("body").append(preLoaderPopUp);
				   $("#getMessage").remove();
			  },
			  success: function(response) {
				     if(page == 'chat'){
					    $("#conversations").append(response);
					    SendMessage();   
					 } 
				    if(page == 'normal'){
					    $("body").append(response);
					    SendMessage(); 
					 }  
					 setTimeout(function() {
					    $("#postPopUpBox").remove();  
						ScrollBottomChat(); 
				    }, 600);
					$(".peepr-drawer-container").addClass("drawer_close");
					$(".poStListmEnUBox").addClass("closeBoxFix");
					   setTimeout(function() {
						  $(".poStListmEnUBox").remove();
						}, 900);
			  }
			}); 
	}); 
	
	//Send Message to user 
  function SendMessage(){
      $('#send_message').bind('keydown', function(e) {
		  var key = e.which || e.keyCode || 0;
           if (key == 13) {
		   var type = $("#getMessage").attr("data-message");
		   var sendedToName = $("#getMessage").attr("data-user");
		   var sendedToID = $("#getMessage").attr("data-userid");
		   var sendText = $("#send_message").val(); 
		   var sendImage = $("#cuploadvalues").val();
		   var sendVideo = $("#vuploadvalues").val();
		   var sendFile = $("#fuploadvalues").val();
		   var sendFileName = $(".thisfilenam").attr("data-fname"); 
		   var fileExtension = $(".thisfilenam").attr("data-nfile"); 
		   if (sendFileName == null || fileExtension == null){
				var sendFileName = '';
				var fileExtension = '';
			}
		   var selfPost = $("#selfdestructtime").val();
		   if ($.trim(type).length == 0 || $.trim(sendedToName).length == 0 || $.trim(sendedToID).length == 0) {
             // M.toast({html: canNotSendEmptyComment , classes: 'warning'});
            } else {
				var dataMessage = 'f='+type+'&message='+encodeURIComponent(sendText)+'&u_n='+sendedToName+'&u_i='+sendedToID+'&upload='+sendImage+'&video='+sendVideo+'&file='+sendFile+'&filename='+encodeURIComponent(sendFileName)+'&exten='+fileExtension+'&self='+selfPost;
				$.ajax({
					type: "POST",
					url: requestUrl + "requests/activity",
					data: dataMessage,
					dataType: "json",
					cache: false,
					success: function(response) {
						if(response.empty == 'empty'){
						   // M.toast({html: canNotSendEmptyComment , classes: 'warning'});
							return false;
						}
						var messageText = response.message;
					    var messageFromID = response.user_two;
					    var messageToID = response.user_one;
					    var messageID = response.id;
					    var messageTime = response.time;
						var messageImage = response.image;   
						var messageVideo = response.video; 
						var messageFile = response.file; 
						var messageDestructTime = response.destruct;
						var messageSelfDestruct = response.selfdestruct;  
						if(messageSelfDestruct){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageSelfDestruct+' </div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
						} else{
							if(messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div><div class="theImages image_you">'+messageImage.join(" ")+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageText && !messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageVideo){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div><div class="theImages video_you">'+messageVideo+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageFile){
							   var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div>'+messageFile+'<div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
						}
						  $("#getMessages").append(messagewithImage);
						  $("#msg"+messageToID).html(messageText);
					      $("#time"+messageToID).attr("title", messageTime).html(messageTime);
						  setTimeout(function() {
					        jQuery(".timeago").timeago();
							ScrollBottomChat();
							$("._2a-p").html('');
							$("#cuploadvalues").val('');
							$("#fuploadvalues").val('');
							$("#vuploadvalues").val('');
							$("#selfdestructtime").val('');
					      }, 100);  
						$("#send_message").val('');
					}
				});
			}
			return false;
		   }
	  });
	  $('#send_message_mini').bind('keydown', function(e) {
		  var key = e.which || e.keyCode || 0;
           if (key == 13) {
		   var type = $("#getMessage").attr("data-message");
		   var sendedToName = $("#getMessage").attr("data-user");
		   var sendedToID = $("#getMessage").attr("data-userid");
		   var sendText = $("#send_message_mini").val(); 
		   var sendImage = $("#cuploadvalues").val();
		   var sendVideo = $("#vuploadvalues").val();
		   var sendFile = $("#fuploadvalues").val();
		   var sendFileName = $(".thisfilenam").attr("data-fname"); 
		   var fileExtension = $(".thisfilenam").attr("data-nfile"); 
		   if (sendFileName == null || fileExtension == null){
				var sendFileName = '';
				var fileExtension = '';
			}
		   var selfPost = $("#selfdestructtime").val();
		   if ($.trim(type).length == 0 || $.trim(sendedToName).length == 0 || $.trim(sendedToID).length == 0) {
             // M.toast({html: canNotSendEmptyComment , classes: 'warning'});
            } else {
				var dataMessage = 'f='+type+'&message='+encodeURIComponent(sendText)+'&u_n='+sendedToName+'&u_i='+sendedToID+'&upload='+sendImage+'&video='+sendVideo+'&file='+sendFile+'&filename='+encodeURIComponent(sendFileName)+'&exten='+fileExtension+'&self='+selfPost;
				$.ajax({
					type: "POST",
					url: requestUrl + "requests/activity",
					data: dataMessage,
					dataType: "json",
					cache: false,
					success: function(response) {
						if(response.empty == 'empty'){
						   // M.toast({html: canNotSendEmptyComment , classes: 'warning'});
							return false;
						}
						var messageText = response.message;
					    var messageFromID = response.user_two;
					    var messageToID = response.user_one;
					    var messageID = response.id;
					    var messageTime = response.time;
						var messageImage = response.image;   
						var messageVideo = response.video; 
						var messageFile = response.file; 
						var messageDestructTime = response.destruct;
						var messageSelfDestruct = response.selfdestruct;  
						if(messageSelfDestruct){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageSelfDestruct+' </div></div>';
						} else{
							if(messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+' </div><div class="theImages image_you_mini">'+messageImage.join(" ")+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageText && !messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+'</div>';
							}
							if(messageVideo){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+' </div><div class="theImages video_you_mini">'+messageVideo+'</div></div>';
							}
							if(messageFile){
							   var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+' </div>'+messageFile+'</div>';
							}
						}
						  $(".o_chat_conversations").append(messagewithImage);
						  $("#msg"+messageToID).html(messageText);
					      $("#time"+messageToID).attr("title", messageTime).html(messageTime);
						  setTimeout(function() { 
							ScrollBottomChatMini();
							$("._2a-p").html('');
							$("#cuploadvalues").val('');
							$("#fuploadvalues").val('');
							$("#vuploadvalues").val('');
							$("#selfdestructtime").val('');
					      }, 100);  
						$("#send_message_mini").val('');
					}
				});
			}
			return false;
		   }
	  });
  }
  SendMessage();
  $("body").on("click",".sendmymes", function(e){
	       var key = $("#send_message").val().length; 
		   var type = $("#getMessage").attr("data-message");
		   var sendedToName = $("#getMessage").attr("data-user");
		   var sendedToID = $("#getMessage").attr("data-userid");
		   var sendText = $("#send_message").val(); 
		   var sendImage = $("#cuploadvalues").val();
		   var sendVideo = $("#vuploadvalues").val();
		   var sendFile = $("#fuploadvalues").val();
		  var sendFileName = $(".thisfilenam").attr("data-fname"); 
		   var fileExtension = $(".thisfilenam").attr("data-nfile"); 
		   if (sendFileName == null || fileExtension == null){
				var sendFileName = '';
				var fileExtension = '';
			}
		   var selfPost = $("#selfdestructtime").val();
		   if ($.trim(type).length == 0 || $.trim(sendedToName).length == 0 || $.trim(sendedToID).length == 0) {
             // M.toast({html: canNotSendEmptyComment , classes: 'warning'});
            } else {
				var dataMessage = 'f='+type+'&message='+encodeURIComponent(sendText)+'&u_n='+sendedToName+'&u_i='+sendedToID+'&upload='+sendImage+'&video='+sendVideo+'&file='+sendFile+'&filename='+encodeURIComponent(sendFileName)+'&exten='+fileExtension+'&self='+selfPost;
				$.ajax({
					type: "POST",
					url: requestUrl + "requests/activity",
					data: dataMessage,
					dataType: "json",
					cache: false,
					success: function(response) {
						if(response.empty == 'empty'){
						    //M.toast({html: canNotSendEmptyComment , classes: 'warning'});
							return false;
						}
						var messageText = response.message;
					    var messageFromID = response.user_two;
					    var messageToID = response.user_one;
					    var messageID = response.id;
					    var messageTime = response.time;
						var messageImage = response.image;   
						var messageVideo = response.video; 
						var messageFile = response.file; 
						var messageDestructTime = response.destruct;
						var messageSelfDestruct = response.selfdestruct;   
						if(messageSelfDestruct){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you selfDestructMessage">'+messageSelfDestruct+' </div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
						} else{ 
							if(messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div><div class="theImages image_you">'+messageImage.join(" ")+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageText && !messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageVideo){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div><div class="theImages video_you">'+messageVideo+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageFile){
							   var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you">'+messageText+' </div>'+messageFile+'<div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
						}
						  $("#getMessages").append(messagewithImage);
						  $("#msg"+messageToID).html(messageText);
					      $("#time"+messageToID).attr("title", messageTime).html(messageTime);
						  setTimeout(function() {
					        jQuery(".timeago").timeago();
							ScrollBottomChat();
							$("._2a-p").html('');
							$("#cuploadvalues").val('');
							$("#fuploadvalues").val('');
							$("#vuploadvalues").val('');
							$("#selfdestructtime").val('');
					      }, 100);  
						$("#send_message").val('');
					}
				});
			}
			return false;
		   
  });
  x='';
function getNewMessage(x){ 
   var type = $("#view").attr("data-type");
   var DataGetID = $("#getMessage").attr("data-userid"); 
   var last_message = ($('.child'+DataGetID+':last').length && $('.child'+DataGetID+':last').attr('data-id')) ? $('.child'+DataGetID+':last').attr('data-id') : "";
    var who = ($('.child'+DataGetID+':last').length && $('.child'+DataGetID+':last').attr('data-get')) ? $('.child'+DataGetID+':last').attr('data-get') : ""; 
    
   if($.trim(type).length == 0){
	   setTimeout(getNewMessage, 3000);
   }else{
	    var chatData = 'f='+type+'&old='+last_message+'&u='+who;
		 $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/check', 
			  data: chatData,
			  dataType: "json",
			  cache: false,
			  beforeSend: function() {   },
			  success: function(response) { 
			       var windowsize = $(window).width();  
				   var newMessage = response.newmessage;
				   var newNotification = response.newnotification;
				   var newMention = response.newmention; 
				   var sumMessage = $("#new_m").attr("data-newmessage");
				   var sumNotification = $("#new_n").attr("data-newnotification");
				   var sumMention = $("#new_n").attr("data-newmention"); 
				   var messageText = response.message;
				   var messageFromID = response.user_two;
				   var messageToID = response.user_one;
				   var messageID = response.id;
				   var checkBlock = response.check;
				   var messageTime = response.time;
				   var messageImage = response.image;   
				   var messageVideo = response.video; 
				   var messageFile = response.file;
				   var messageDestructTime = response.destruct;
				   var messageSelfDestruct = response.selfdestruct;
				   var messageProduct = response.productmessage; 
				   var visitNotification = response.vistNotification;
				   var favouriteNotification = response.fvcnt;
				   var withText = ''; 
				   if(messageSelfDestruct){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="friend selfDestructMessage">'+messageSelfDestruct+' </div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
						} else{  
						if(messageText){
							var withText = '<div class="friend">'+messageText+' </div>';
						}
					if(messageImage){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'">'+withText+'<div class="theImages image_friend">'+messageImage.join(" ")+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
				    }
					
				   if(messageText && !messageImage){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'">'+withText+'<div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
				   }
				   if(messageVideo){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'">'+withText+'<div class="theImages video_friend">'+messageVideo+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
				  }	
				 if(messageFile){
				   var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'">'+withText+''+messageFile+'<div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
				 }
				 if(messageProduct){
				      var messagewithImage = messageProduct;
				   }
			    }
				if(visitNotification){
					if(!$('div').hasClass('visitNotification')){
					    $('body').append(visitNotification);
					    ion.sound.play("return");
					}
					if($('div').hasClass('fvNotification')){
					     $('.fvNotification').css('bottom','75px');
					}  
				}
				if(favouriteNotification){
					if(!$('div').hasClass('fvNotification')){
					    $('body').append(favouriteNotification);
					    ion.sound.play("return");
					} 
					if($('div').hasClass('visitNotification')){
						if(windowsize < 755){
						     $('.fvNotification').css('bottom','50px');
						} 
					}
				}
			       if(messageText || messageImage || messageVideo || messageFile || messageSelfDestruct || messageProduct){ 
					   $(".all_messages , .o_chat_conversations").append(messagewithImage);
					   var logDown = $(".all_messages , .o_chat_posts");
                        logDown.animate({ scrollTop: logDown.prop("scrollHeight") }, 0);
					   $("#msg"+messageFromID).html(messageText);
					   $("#time"+messageFromID).attr("title", messageTime).html(messageTime);
					   if (!$('.o_chat_box_container').length) {
					        ion.sound.play("whatsapp");
					   }
					   setTimeout(function() {
					    jQuery("div.timeago").timeago();
					   }, 3000);
				   }
				   if(newMessage < sumMessage){
				      $("#new_m").attr("data-newmessage", newMessage);
				   }
			        if(newMessage != '' && newMessage !== null && newMessage !== '0' && sumMessage < newMessage && newMessage !== sumMessage){
					   $(".msgnot").addClass("H9zXO"); 
					   $("#new_m").addClass("newbe");
					   if (!$('.o_chat_box_container').length) {
					        ion.sound.play("whatsapp");
							$(".Szr5J_not_c_m").show().html(newMessage);
					   }
					   $("#new_m").attr("data-newmessage", newMessage); 
					} 
				   if(!$.trim(newMessage)){
				       $(".msgnot").removeClass("H9zXO"); 
					   $("#new_m").removeClass("newbe");
					   $("#new_m").attr("data-newmessage", '');
					   $(".Szr5J_not_c_m").hide().html('');
				   }
				   if(newNotification !== sumNotification && newNotification !== '0' && sumNotification < newNotification){
				       $(".newnot").addClass("H9zXO"); 
					   $("#new_n").addClass("newbe");
					   ion.sound.play("profilefollow");
					   $("#new_n").attr("data-newnotification", newNotification);
					   $(".Szr5J_not_c").show().html(newNotification);
				   }
				   if(newNotification == '0'){
				       $(".newnot").removeClass("H9zXO"); 
					   $("#new_n").removeClass("newbe");
					   $("#new_n").attr("data-newnotification", '');  
					   $(".Szr5J_not_c").hide().html('');
				   } 
				   if(newMention !== sumMention && newMention !== '0' && sumMention < newMention){
				       $(".newnot").addClass("H9zXO"); 
					   $("#new_n").addClass("newbe");
					   ion.sound.play("profilefollow");
					   $("#new_n").attr("data-newmention", newMention);
				   }
				   if(newMention == '0'){
				       $(".newnot").removeClass("H9zXO"); 
					   $("#new_n").removeClass("newbe");
					   $("#new_n").attr("data-newmention", '');
				   }  
				   if(checkBlock){ 
					   window.location.href = checkBlock; 
					}
				    if (!x) {
                       setTimeout(getNewMessage, 3000); 
                    }
			  }
			});  
   }
} 
getNewMessage();
function getNewRight(){
   setInterval(function(){
        //$('.chatSidebar').load(requestUrl +'contents/req');
   },8000);
}
getNewRight();
 // Update notification Count
 $("body").on("click","#new_n", function(){
	 var type = 'updatenot';
	 var data = 'f='+type;
	 $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {},
      success: function(response) {
		  if(response){
		    $('body').addClass('disableScroll'); 
		  }
         $(".newnot").removeClass("H9zXO"); 
		 $("#new_n").removeClass("newbe");
		 $(".Szr5J_not_c").hide().html('');
      }
    });
  });
 /*Get notification Messages Sidebar Box*/
 $("body").on("click", "#new_m , #new_n", function(){  
     var type = $(this).attr("data-type");
	 var data = 'f='+type;
	 $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
        $("body").append(preLoaderPopUp);
      },
      success: function(response) { 
          $("#postPopUpBox").addClass("poSBoxContainerHide");
          $("body").append(response); 
			   if(response){
					$('body').addClass('disableScroll'); 
				  }
            $(".popUpPreLoaderWrap").remove(); 
      }
    });
  });
  /*Close Notification Box*/
  $("body").on("click", ".closeNews , ._1ht32 , .closeProfileRight", function(){
      $(".peepr-drawer-container").addClass("drawer_close");
	  $(".poStListmEnUBox").addClass("closeBoxFix");
	     setTimeout(function() {
            $(".poStListmEnUBox").remove();
			$('body').removeClass('disableScroll');  
          }, 900);  
  });
  /*Close Chat Box*/
  $("body").on("click", ".closeChat", function(){
      $(".chatRight-drawer").addClass("drawer_close"); 
	     setTimeout(function() {
            $(".chatRight-drawer").remove();
			$('body').removeClass('disableScroll');  
          }, 900);
  });
  /*Update Notification Read Status*/
  $("body").on("click", ".makeread", function(){
      var type = $(this).attr("data-type");
	  var notID = $(this).attr("data-id");
	  var notRel = $(this).attr("data-rel");
	  var updateReadStatus = 'f='+type+'&not_id='+notID+'&not_rel='+notRel;
	  $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: updateReadStatus,
      beforeSend: function() {},
      success: function(response) {
         
		 if(response != '200'){
			 if(notRel == 'not_readed'){
			  $("#not_id_"+notID).removeClass("ic_noReaded").addClass("ic_readed").attr("data-rel", 'readed');
			  $("#answered"+notID).removeClass("notReadedColor");
		    }
		    if(notRel == 'readed'){
			  $("#not_id_"+notID).removeClass("ic_readed").addClass("ic_noReaded").attr("data-rel", 'not_readed');
			  $("#answered"+notID).addClass("notReadedColor");
		    }
	     } 
      }
    });
   });
   /*Accept remove Friend Request*/
   $("body").on("click", ".answerFol", function(){
	     var type = $(this).attr("data-type");
		 var get = $(this).attr("data-get");
		 var acceptID = $(this).attr("id");
		 var data = 'f='+type+'&user='+acceptID+'&t='+get;
		 $.ajax({
			  type: "POST",
			  url: requestUrl + "requests/activity",
			  data: data,
			  beforeSend: function() {},
			  success: function(response) {
				 
				 if(response != '200'){
					  if(get =='accept'){
					      $("#flanswered"+acceptID).html(response);
					  }
					  if(get =='remove'){
					      $("#newFlw"+acceptID).remove();
					  }
				 } 
			  }
			});
	});
var scrollLoad = true;
$(document.body).on('touchmove', showMoreData); // for mobile
$(window).on('scroll', showMoreData);
	function showMoreData(){
	/*Show More posts From Explore Page*/  
      if (scrollLoad && $(window).scrollTop() + window.innerHeight >= document.body.scrollHeight) { 
	    var PageType = $("#morePostType").attr("data-type");
		var profile = '';
		var hashtag =''; 
		var story = '';
		var eventType = '';
		var eventID = '';
		var tem = '';
	    if(PageType == 'more_feeds'){ var ID = $('#morePostType').children('.zMhqu').last().attr('data-last');}
		if(PageType == 'more_visitors'){ var ID = $('#morePostType').children('.visitor_user_container').last().attr('data-last');}
		if(PageType == 'more_whofavourite'){ var ID = $('#morePostType').children('.visitor_user_container').last().attr('data-last');}
		if(PageType == 'more_favourites'){ var ID = $('#morePostType').children('.zMhqu').last().attr('data-last');}
		if(PageType == 'more_friends'){ var ID = $('#morePostType').children('.zMhqu').last().attr('data-last'); var profile = $("#morePostType").attr("data-profile");}
        if(PageType == 'more_explore'){ var ID = $('#morePostType').children('.post_explore_box').last().attr('data-last'); }
		if(PageType == 'more_explore_text'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_img'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_fil'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_gif'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_vid'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_aud'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_watermarks'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_which'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_explore_bfaf'){ var ID = $('#morePostType').children('.ex_text_post_container').last().attr('data-last'); }
		if(PageType == 'more_mt'){ var ID = $('#morePostType').children('.t_c_mar').last().attr('data-last'); var tem = $('#morePostType').attr('data-c'); }
		if(PageType == 'more_followers'){ var ID = $('#morePostType').children('.UserCardContainer').last().attr('data-last');    var profile = $("#morePostType").attr("data-profile");}
		if(PageType == 'more_profilePosts'){ var ID = $('#morePostType').children('.zMhqu').last().attr('data-last');   var profile = $("#which_user_profile").attr("data-id");}
		if(PageType == 'more_tags'){ var ID = $('#morePostType').children('.zMhqu').last().attr('data-last'); var hashtag = $("#morePostType").attr("data-tag");}
		if(PageType == 'more_stories'){ var ID = $('#morePostType').children('.zMhqu').last().attr('data-last'); var story = $('#u_story').attr('data-pui');}
		if(PageType == 'more_events'){ var ID = $('#morePostType').children('.zMhqu').last().attr('data-last'); var eventID = $('#e_posts').attr('data-ev');}
		if(PageType == 'more_ev'){var ID = $('#morePostType').children('.i_event').last().attr('data-last'); var eventType = $('#morePostType').attr('data-mev');}
		if(PageType == 'more_boosted'){var ID = $('#morePostType').children('.zMhqu').last().attr('data-last');}
		if ($('#preloadMore').length === 0) {
        var dataString = "lastmid=" + ID + '&f=' + PageType + '&p=' + profile + '&tag=' + hashtag + '&story=' + story+'&event='+eventID+'&e_ty='+eventType+'&theme='+tem;  
          $.ajax({
            type: "POST",
            url: requestUrl + 'requests/activity',
            data: dataString,
            cache: false,
            beforeSend: function() {
               if ($('#preloadMore').length === 0) {
                $(".body"+ID).after('<div class="post_explore_box" id="preloadMore"><div class="post_explore_box_in"><div class="noMorePost">'+loadingMini+'</div></div></div>');
			   }   
              $('body').addClass('disableScroll'); 
            },
            success: function(response) {
				if(response){
				   $('body').removeClass('disableScroll'); 
			      $("#morePostType").append(response);
				  $("#preloadMore").remove();
				}    
			   if(response.trim()==''){
				  $('body').removeClass('disableScroll');
				  if ($('div.mydivclass').length === 0) {
                    $(".body"+ID).after('<div class="post_explore_box yepnoPost"><div class="post_explore_box_in"><div class="noMorePost">'+seenItAll+'<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg></div></div></div>');
                  } 
				  scrollLoad = false;
				  $("#preloadMore").remove(); 
				   
			   }
            }
          }); 
		}
        } else {
          //$('#newsfeed').append(nomorecontent);
        } 
		
     return false; 
	}
	showMoreData();
 
function byScroll(){
$('.viewserListContainer').bind('scroll', function(){ 
   if(scrollLoad && $(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight){
        var scrollType = $("#moreUseri").attr("data-type"); // moreLikedUser
		if(scrollType == 'moreLikedUser'){var ID = $('.viewerItems ').children('.theluser').last().attr('data-last'); var postid = $("#likedpp").attr("data-id");}
		var data = 'lastid='+ID+ '&feed='+scrollType+'&pid='+postid;
		 $.ajax({
            type: "POST",
            url: requestUrl + 'requests/morefeed',
            data: data,
            cache: false,
            beforeSend: function() {
              $("#moreUseri").after('<div class="post_explore_box" id="preloadMore"><div class="post_explore_box_in"><div class="noMorePost">'+loadingMini+'</div></div></div>'); 
            },
            success: function(html) {
				if(html){
				    $(".viewerItems").append(html);
					$("#preloadMore").remove();
				}else{
				    $("#preloadMore").remove();
					scrollLoad = false;
				}
		    }
          }); 
   }else{
       // Do Something
   }
   return false;
});
}
	//Show the post From Right Sidebar 
	$("body").on("click", ".showThisPost_ , .showNot", function(){
	    var type = $(this).attr("data-type");
		var thisPost = $(this).attr("data-id");
		var fromThisU = $(this).attr("data-ui");
		var data = 'f='+type + '&this=' + thisPost + '&ud=' +fromThisU;
		$.ajax({
			  type: "POST",
			  url: requestUrl + "requests/activity",
			  data: data,
			  beforeSend: function() {},
			  success: function(response) { 
				 if(response !=  200 ){
					 $("body").append(response); 
					 AddNewComment();
				 } else {
				    $('.no_post_can_show').show();
					setTimeout(function(){
						$('.no_post_can_show').hide();
					 },5000 );
				 }
			  }
			});
	});
	//Show SearchBox From RightSidebar
	$("body").on("click", "#searchFriend", function(){
	    var type = $(this).attr("data-type"); 
		var data = 'f='+type;
		$.ajax({
			  type: "POST",
			  url: requestUrl + "requests/activity",
			  data: data,
			  beforeSend: function() {},
			  success: function(response) { 
				 if(response != '200'){
					 $("body").append(response);  
					 $("#search_u").focus();
				 } 
			  }
			});
	});	
  // Search User 
  $('body').delegate('#search_u', 'keyup', function() {
    var box = $('#search_u').val();
    contentbox = $.trim(box);
    var dataString = 'keys=' + contentbox;
    if (contentbox !== '') {
      $.ajax({
        type: "POST",
        url: requestUrl + "requests/search",
        data: dataString, 
        cache: false,
        beforeSend: function() {},
        success: function(data) {
          $("#searchResults").html(data); 
        }
      });
    }
  });
  // Save User Search activity
  $("body").on("click",".result_user", function(){
        var type = $(this).attr("data-type");
		var thisUID = $(this).attr("data-id"); 
		var username = $(this).attr("data-username");
		var data = 'f='+type + '&sid=' + thisUID;
		$.ajax({
			  type: "POST",
			  url: requestUrl + "requests/activity",
			  data: data,
			  beforeSend: function() {},
			  success: function(response) { 
					   window.location.href = requestUrl+'profile/'+username; 
			  }
	   });
   });
   
	//Show the post From Right Sidebar 
	$("body").on("click", ".showThisReportedPost_", function(){
	    var type = $(this).attr("data-type");
		var thisPost = $(this).attr("data-id"); 
		var data = 'f='+type + '&this=' + thisPost;
		$.ajax({
			  type: "POST",
			  url: requestUrl + "requests/activity",
			  data: data,
			  beforeSend: function() {},
			  success: function(response) { 
				 if(response != '200'){
					 $("body").append(response); 
					 AddNewComment();
				 } 
			  }
			});
	});
	/*Search Chat User*/
	$('body').on('keyup', '#search_u_chat', function() {
		var name = $(this).val(); 
		var type = $(this).attr("data-type");
		var showData = 'f='+type+'&name=' + name; 
		if (name !== '') { 
		  $.ajax({
			type: "POST",
			url: requestUrl + "requests/activity",
			data: showData, 
			cache: false,
			beforeSend: function() {},
			success: function(response) {
			  $(".searchListChat").html(response).show(); 
			}
		  });
		}else{
		  $(".searchListChat").hide().empty();
		}
	  });
	 /*Show User List From Chat Page*/
	 $("body").on("click", "#friends_u", function(){
		 var type = $(this).attr("data-type");
		 var data = 'f='+type;
		 $.ajax({
			type: "POST",
			url: requestUrl + "requests/activity",
			data: data, 
			cache: false,
			beforeSend: function() {},
			success: function(response) {
			  $("#friend_u_list").append(response); 
		 }
	   });
     });
	 /*Upload Story Image*/
	  // Uploading Music, Video and Image
  $("body").on("change", "#storie_img", function(e) {
    e.preventDefault(); 
	var id = $("#storie_img").attr("data-id");
	var data = { t: id  };
    $("#storiesform").ajaxForm({
		 type: "POST",
         data: data, 
		 cache: false,
         beforeSubmit: function() {
          $(".add_story").append(loadingMini); 
        },
        success: function(response) { 
		  if(response){
            M.toast({html: response , classes: 'rounded', displayLength: 8000});   
		  }
        },
        error: function() {}
      }).submit();
  });
  /*Change User Language*/
  $("body").on("click",".langs", function(){
     var lang = $(this).attr("data-lang");
     var type = $(this).attr("data-type");
	 var data = 'f='+type + '&use='+lang;
	 $.ajax({
			type: "POST",
			url: requestUrl + "requests/activity",
			data: data, 
			cache: false,
			beforeSend: function() {},
			success: function(response) {
			  if(response == 1){window.location.href=window.location.href;}
		 }
	   });
   });
   /*Open Langauge List*/
   $("body").on("click","#openLangs", function(){ 
     var type = $(this).attr("data-type");
	 var data = 'f='+type;
	 if (!$('div.chooseLangContainer').length) {
	 $.ajax({
			type: "POST",
			url: requestUrl + "requests/activity",
			data: data, 
			cache: false,
			beforeSend: function() {},
			success: function(response) {
			  $("body").append(response);
		    }
	   });
	 }
   });
   // Close LangPopUp
   $("body").on("click",".closeLangs", function(){
	   $(".chooseLangContainer").remove();
   });
	/*Close The Friend Chat List Box*/
	$("body").on("click", "#closeChatUserList", function(){
	  $(".friend_user_chat_list_container").removeClass("inChatList").addClass("close_friend_user_chat_list");
	  setTimeout(function() {  
          $(".friend_user_chat_list_container").remove(); 
        }, 800);
	});
	$("body").on("click","#hiddeIt", function(){ 
	      if (!$("._4_j5").hasClass("hidden_elem")) {
		      $("._4_j5").addClass("hidden_elem");
		  } else {
		     $("._4_j5").removeClass("hidden_elem");
		  }
    });
	/*Open Right Sidebar Menu From Main Page*/
	$("body").on("click","#openRightSidebarContainer , .closeRightSideBarContainer", function(){ 
	      if (!$(".COOzN").hasClass("openRightSidebarContainer")) {
		      $(".COOzN").addClass("openRightSidebarContainer");
		  } else {
		     $(".COOzN").removeClass("openRightSidebarContainer").addClass("closeRightSidebarContainer_btn");
			 setTimeout(function() {  
               $(".COOzN").removeClass("closeRightSidebarContainer_btn"); 
            }, 710);
		  }
    });
	/*Open Settings Menu*/
	$("body").on("click", ".menuMobileSettings , .settings_menu_item", function(){
	   if (!$(".settings_menu_container").hasClass("opensettingmenu")) {
		      $(".settings_menu_container").addClass("opensettingmenu");
		  } else {
		     $(".settings_menu_container").removeClass("opensettingmenu"); 
		  }
	}); 
	/******************/
	$("body").on("click", ".getuse", function(){
       $(".mobile_1enh").addClass("closeLeft");
	   $(".conversationCurrentBox").removeClass("conversationCurrentBox").addClass("openLeft");
	   if (!$(".mobile_1enh").hasClass("openLeftConversationMenu")) {
		      $(".mobile_1enh").removeClass("closeLeft").addClass("openLeftConversationMenu");
		  } else {
		     $(".mobile_1enh").removeClass("openLeftConversationMenu").addClass("closeLeft");
		 }
		if (!$(".conversationCurrentBox").hasClass("hideConversationUserFromRight")) { 
			  $(".conversationCurrentBox").removeClass("openLeft").addClass("openLeftConversationMenu");
		  } else { 
			 $(".conversationCurrentBox").removeClass("openLeftConversationMenu").addClass("openLeft");
		 }
		  if (!$(".back_to").hasClass("back_to_show")) { 
			  $(".back_to").addClass("back_to_show");
		  } 
	});
	$("body").on("click", ".openChatListLeft , .back_to", function(){  
	   if (!$(".mobile_1enh").hasClass("openLeftConversationMenu")) {
		      $(".mobile_1enh").removeClass("closeLeft").addClass("openLeftConversationMenu");
		  } else {
		     $(".mobile_1enh").removeClass("openLeftConversationMenu").addClass("closeLeft");
		 }
		 if (!$(".conversationCurrentBox").hasClass("hideConversationUserFromRight")) { 
			  $(".conversationCurrentBox").removeClass("openLeft").addClass("openLeftConversationMenu");
		  } else { 
			 $(".conversationCurrentBox").removeClass("openLeftConversationMenu").addClass("openLeft");
		 }
	 }); 
	/*****************/
 
   /*FAST ANSWER WITH EMOJI*/
  $("body").on("click", ".fast_answericons", function(e) {
     var ID = $(this).attr("data-id");
	 var postType = $(this).attr("data-post");
	 var type = $(this).attr("data-type");
     var dataFast =  'f='+type+'&c='+ID+'&pt='+postType; 
	 $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: dataFast,
		  beforeSend: function() { 
		  },
		  success: function(response) {
			 $(".ic" + ID).append(response);
			 setTimeout(function() {
               $(".ic" + ID).addClass("is-active"); 
             }, 50);
			 setTimeout(function(){
				 ion.sound.play("fastanswer");
			 },300 );
		  }
		});
  });
 
  /*Fast Answer SEND*/
  $("body").on("click","#fast_answer_with_emoji", function(event){
	  event.preventDefault();
	   var type = $(this).attr("data-type");
	   var fastIconKey = $(this).attr("data-fastkey");
	   var commented = $(this).attr("data-id"); 
	   var postType = $(this).attr('data-post');
       var data = 'f='+type+'&fastAnswer='+fastIconKey+'&this='+commented+ '&dp='+postType;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() { 
		  },
		  success: function(response) { 
				 $(".all_c_for" + commented).append(response); 
				 $(".fast_icon_answer").removeClass("is-active");
                 $(".fast_icon").remove(); 
				  ion.sound.play("fastClicked");
		  }
		});
   });
    $("body").on("click",".ex_fix_menu", function(){
     $(".ex_menu_container").addClass("ex_menu_container_active");
     $(".ex_me_con").addClass("ex_me_con_active");
     $(".ex_mm").addClass("ex_mm_active"); 
	 $(".ex_men_ic").addClass("ex_men_ic_active");
	 ion.sound.play("water_droplet_3");
	 setTimeout(function(){ 
	     $(".ex_men_ic").removeClass("ex_men_ic_active");
	 },1500 );
  });
   /*Close The Boxes*/
  $(document).bind("mouseup touchend", function(e) { 
    var container = $(".com-cont , .emotion_box , .gif_box , #drpt , .post_menu_container, .ads_menu_container");
	var emoji =  $(".is-active");
	var chatButtons = $('.Szr5JChC');
	var exm = $(".ex_menu_container"); 
    var exc = $(".ex_me_con");
    var excm = $(".ex_mm");
	if (!chatButtons.is(e.target) && chatButtons.has(e.target).length === 0) { 
	  $(".Szr5JChC").addClass("dnone").removeClass('dblock');
    }
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.hide();
      $("#drpt").remove();  
	  container.removeClass("opened_"); 
    }
   if (!emoji.is(e.target) && emoji.has(e.target).length === 0) { 
        $(".fast_icon").remove(); 
	    $(".fast_icon_answer").removeClass("is-active");  
    }
    var scrt = $(".open_box");
    if (!scrt.is(e.target) && scrt.has(e.target).length === 0) {  
        $(".who_see_list_box").removeClass("open_box");  
    }
	var whse = $(".open_box");
	if (!whse.is(e.target) && whse.has(e.target).length === 0) { 
        $(".whoSeeList").html('');
        $(".whoSeeList").removeClass("whls");  
    }
	var postBoxes = $(".createNewPost_two , .ppos_modal"); 
	if (!postBoxes.is(e.target) && postBoxes.has(e.target).length === 0) { 
	  $(".news_post_create").removeClass("changeTheSize");
	  $(".createNewPost_two").removeClass("createNewPost_two_change");  
	  $(".ppos_modal").fadeOut(); 
    }
	 if (!exm.is(e.target) && exm.has(e.target).length === 0) { 
	        exm.removeClass("ex_menu_container_active"); 
    }
    if (!exc.is(e.target) && exc.has(e.target).length === 0) { 
	        exc.removeClass("ex_me_con_active"); 
    }
    if (!excm.is(e.target) && excm.has(e.target).length === 0) { 
	        excm.removeClass("ex_mm_active"); 
    }
    $(document).unbind("keydown keypress", disableArrowKeys);
    var ar = new Array(37, 38, 39, 40);
    var disableArrowKeys = function(e) {
      if ($.inArray(e.keyCode, ar) >= 0) {
        e.preventDefault();
      }
    };
  }); 
	 $(window).resize(function() {
         $("#mobileboxCh").livequery(function() {
			 var width = $(window).width();  
		  if ((width > 1000 )) {
			 $(this).removeClass("hidden_elem"); 
		   }else {
			$(this).addClass("hidden_elem"); 
		  }
		}); 
     });
	 $("#mobileboxCh").livequery(function() {
			 var width = $(window).width();  
		  if ((width > 1000 )) {
			 $(this).removeClass("hidden_elem"); 
		   }else {
			$(this).addClass("hidden_elem"); 
		  }
		}); 
	/*Move Night and Light Mode*/
	$("body").on("click", ".changeStyleMode", function(e){
		 e.preventDefault();
		 var day = 'style';
	     var night = 'night_style';
		 var type = $(this).attr("data-type");
		 var mode = $(this).attr("data-mode"); 
		 var mode_night = $(this).attr("data-light");
		 var mode_light = $(this).attr("data-night");
		   if(mode == 'night_style'){ 
			  var data = 'f='+type + '&mode='+day;
		   }
		   if(mode == 'style'){ 
			  var data = 'f='+type + '&mode='+night;
		   } 
			 $.ajax({
					type: "POST",
					url: requestUrl + "requests/activity",
					data: data, 
					cache: false,
					beforeSend: function() {$("body").append(preLoaderPopUp);},
					success: function(response) {
					  if(response == 1){
						  $("#getNight").attr("data-mode", day);
						  $('.day_night_icon').removeClass('day').addClass('night');
						  $("#style_mode").attr("href", requestUrl+'css/'+day+".css");
						  $("#dy_text").html(mode_night); 
						  setTimeout(function() {  
							  $(".popUpPreLoaderWrap").remove();
							}, 1000); 
					   }
					   if(response  == 2){
						  $("#getNight").attr("data-mode", night);
						  $("#style_mode").attr("href", requestUrl+'css/'+night+".css"); 
						  $('.day_night_icon').removeClass('night').addClass('day');
						  $("#dy_text").html(mode_light); 
						   setTimeout(function() {  
							  $(".popUpPreLoaderWrap").remove();
							}, 1000);
					   }  
				 }
			   });
	 });
	 // Click To Activate TextArea
	 $("body").on("click",".dCJp8", function(){
		 var ID = $(this).attr("id");
		 $(".vals"+ID).focus();
	 });
  // Upload Image For Filter
  $("body").on("change", "#uploadFilter", function(e) {
    e.preventDefault();
    var values = $("#uploadvalues").val();
	var id = $("#uploadFilter").attr("data-id");
	var data = { t: id  };
    $("#uploadfilterform").ajaxForm({
		 type: "POST",
         data: data,
        target: "#uploadedNew",
		cache: false,
        beforeSubmit: function() {
		  $(".poSBoxContainer").hide();
          $("body").append(preLoaderPopUp);
		  document.getElementById("uploadFilter").disabled = true;
		  $(".file_label").addClass('disabled');
        },
        success: function(response) {   
		   /**/
		   var codes = ["invalidFilterimage"];
		  if(response == '1'){
		     $(".popUpPreLoaderWrap").remove();
			 $(".poSBoxContainer").show();
		  }else{
			  if(response == 'invalidFilterimage'){ 
					   $('.note_11').show(); 
				       setTimeout(function() {
						   $('.note_11').hide();
					   }, 8000); 
				 $(".popUpPreLoaderWrap").remove();
				 $(".poSBoxContainer").show();
			  } 
			  if($.inArray(response, codes) > -1){
				        document.getElementById("uploadBtn").disabled = false;
						$(".file_label").removeClass('disabled');
			  }else{ 
			      $(".music_details_box , .write_post_information, .newImagesHere, .imagepreview").show();
				  $(".newUpload").hide();
				  $(".loadingUrl").remove();
				  $(".popUpPreLoaderWrap").remove();
			      $(".poSBoxContainer").show();
				  var K = $(".UploadedItemNew").attr("id");
				  var T = K + "," + values;
					  if (T != "undefined,") {
						$("#uploadvalues").val(T);
					  }
					  $(".uploadImageButton").hide();
					 if ($("#uploadFilter").hasClass("upload_image_button")) {
					   document.getElementById("uploadFilter").disabled = false;
						$(".file_label").removeClass('disabled');
					 } 
			  }
			  
		  }
		   /**/ 
        },
        error: function() {}
      }).submit();
  });	 
  // Filter Selected
  $("body").on("click",".filtered_image_item", function(){
    var dataStyle = $(this).attr("data-style");
    $("#image_filtered").attr("class", dataStyle);
	$("#selectedfilter").val(dataStyle);
  });
    // Save Image Post from Data
  $("body").on("click",".share_filter", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var filtered = $('#selectedfilter').val();
	   var feeling = $('#f_val').val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#uploadvalues").val(); 
	      var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&uploads='+UploadedImageValues+ '&fil='+filtered+'&myFeeling='+feeling;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){},
			   success: function(response){
				  $('body').removeClass('disableScroll');  
				  $(".poSBoxContainer").remove();  
				  $(".prog-colm").remove(); 
				   if(response == 200){
					   $('.note_1').show();
				  }else if(response == 400){
					   $('.note_6').show();
				  }else {
						$("#new_posts").prepend(response); 
						 if ($(".noPost").length > 0) {
							 $(".noPost").remove();
						 } 
				   }
					  setTimeout(function() {
						   $('.note_6').hide();
					  }, 8000); 
			   }
		   }); 
  });
      // Save Image Post from Data
  $("body").on("click",".share_event_filter", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var filtered = $('#selectedfilter').val();
	   var eventID = $('#e_posts').attr('data-ev');
	   var feeling = $('#f_val').val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#uploadvalues").val(); 
	      var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&uploads='+UploadedImageValues+ '&fil='+filtered+'&eventID='+eventID+'&myFeeling='+feeling;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){
				   $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
				   },
			   success: function(html){
				   $('body').removeClass('disableScroll');  
				  $(".poSBoxContainer").remove();  
				  $(".prog-colm").remove(); 
				   if(response == 200){
					   $('.note_1').show();
				  }else if(response == 400){
					   $('.note_6').show();
				  }else {
						$("#e_posts").prepend(response); 
						 if ($(".noPost").length > 0) {
							 $(".noPost").remove();
						 } 
				   }
					  setTimeout(function() {
						   $('.note_6').hide();
					  }, 8000); 
			   }
			        
		   }); 
  });
     
    //Confirm Dialog  for Delete comment
  $("body").on("click", ".del_story", function(){ 
	  var thePopUpType = $(this).attr("data-type");
	  var postID = $(this).attr("data-story");//Get Story id
	  var postUserName = $(this).attr("data-u");//Get Story UserName 
	  var popUpComment = 'popUp='+thePopUpType+'&pid='+postID+'&punm='+postUserName;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/popups',
		  data: popUpComment,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  $("body").append(html);
		  }
		});
  });
   //Delete Post
  $("body").on("click",".delete_this_story", function(){
      var ID = $(this).attr("data-post");
	  var dataUser = $(this).attr("data-user");
	  var type = $(this).attr("data-type");
	  var deletePost = 'f='+type+'&story='+ID+'&u='+dataUser;
	  $.ajax({
			  type: "POST",
			  url: requestUrl + 'requests/activity',
			  data: deletePost,
			  cache: false,
			  beforeSend: function(){
				 //Do something 
			  },
			  success: function(html) { 
			       if(html == 1){
					   $("#u_p"+ID).addClass("removePost");
					 setTimeout(function() {
						 $("#u_p"+ID).fadeOut("normal", function() {
								$(this).remove();
								$('.note_12').show();
								setTimeout(function() {
						             $('.note_12').hide();
						        }, 8000);
						 });  
				     }, 750);
				      
				   }
				   $(".confirmBoxContainer").remove(); 
			  }
			});
		return false;
  });
  // Get Storyi Viewers
  $("body").on("click", ".seeViewers", function(){
       var type = $(this).attr("data-type");
	   var story = $(this).attr("data-id");
	   var story_u = $(this).attr("data-u");
	   var data = 'f='+type+'&storyPostID='+story+'&storyOwner='+story_u;
	   $.ajax({
			  type: "POST",
			  url: requestUrl + 'requests/activity',
			  data: data,
			  cache: false,
			  beforeSend: function(){
				 $("body").append(preLoaderPopUp);
				 $("body").css({"overflow":"hidden", "padding-right":"15px"});
			  },
			  success: function(html) { 
			        if(html == 200){ 
					   setTimeout(function() {
						    $("body").css({"overflow":"auto", "padding-right":"0px"});
					        $('.note_13').show();
								setTimeout(function() {
						             $('.note_13').hide();
						        }, 8000);
							$(".popUpPreLoaderWrap").remove();
							$(".backBox").remove();
						}, 2000);
					}else{ 
					setTimeout(function() {
						    $(".popUpPreLoaderWrap").remove();
							$(".backBox").remove();
							$("body").append(html);
						}, 750);
					} 			
					
			  }
			});
		return false;
  });
  $("body").on("click", ".closeViewers", function(){
	    $("body").css({"overflow":"auto", "padding-right":"0px"});
		$(".backBox").addClass("closeViewver_back");
		$(".viewersWrap").addClass("closeViewver_list");
		setTimeout(function() {
		    $(".backBox").remove();
			 $(".viewersWrap").remove();
		}, 750);
   });
   //Autocomplete Friend Tag Started
   var timer = null;
   var tagword = /@(\w+)(?!.*@\w)/;

   $("body").delegate(".addComment", "keyup", function(e) {
    var value = e.target.value;
    var ID = e.target.id; 
    clearTimeout(timer);
    timer = setTimeout(function() {
      var contents = value;  
      var goname = contents.match(tagword); 
      var type = 'smen'; 
	  if(goname !== null){
      if (goname.length > 0) { 
	      
         var data = 'f=' +type+ '&menFriend=' +goname[1] +'&posti='+ID;
         $.ajax({
             type: "POST",
             url: requestUrl + "requests/activity", 
             data: data,
             cache: false,
             beforeSend: function() {
                // Do Something
             },
             success: function(response) { 
                if(response){
                   $(".menlist"+ID).show().html(response);
                }else{
                   $(".menlist"+ID).hide().empty();
                }
             }
         });
      }  
	  }else{
	      $(".mentionUserList").hide().empty();
	  }
    }, 500); 
  });
  /*Click To Add Mentioned User*/      
	  $("body").on("click", ".mres_u", function() {
		    var textArea = "." + $(this).closest("[data-textarea]").data("textarea");
            var words = $(textArea).val().split(' ');
            if (words.length > 0) {
                var username = $(this).attr("data-user");
                if (words[words.length - 1].startsWith('@')) {
                    words[words.length - 1] = "@" + username+ ' ';
                    $(textArea).val(words.join(' ')).focus();
					$(".mentionUserList").hide().empty();
                }

            }
	  });
	 
	  $(document).bind("mouseup touchend", function(e) {
		var emoji = $(".pop");
		if (!emoji.is(e.target) && emoji.has(e.target).length === 0) {
		  $(".pop").remove();
		}
	  });
	  // Show Stickers
	  $("body").on("click",".stickers", function(){
	      var width = $(window).width();
		  var height = $(window).height(); 
	      var ID = $(this).attr('data-id');
		  var childNodes = $(".pop_sticker");
		  var type = $(this).attr("data-type");
		  var postType = $(this).attr("data-post");
		   var data = 'f=' +type+ '&pmid=' +ID+'&post='+postType;
		   if (childNodes.length) {
		       childNodes.remove();
		  } else {
			   if (width >= 600) {
			        $(".u_p"+ID).append('<div class="pop pop_sticker" style="position:absolute; right:20px; bottom:50px;"></div>');
		        }
			  if (width <= 600) {
				$(".u_p"+ID).after('<div class="popMobile pop_sticker"></div>');
			  }
		  $.ajax({
             type: "POST",
             url: requestUrl + "requests/activity", 
             data: data,
             cache: false,
             beforeSend: function() {
                $(".pop_sticker").append(TumblrStyleLoaderCss);
             },
             success: function(response) { 
               if(response){
				   setTimeout(function() {
					  $(".Knight-Rider-loader").remove();
		              $(".pop_sticker").html(response);
		            },1050);
			      
			   }
             }
         });
		}
	  });
	  // Send Sticker
	  $("body").on("click", ".sticker_body", function(){ 
		    var textArea = "." + $(this).closest("[data-textarea]").data("textarea");
			 var comment = $(textArea).val();
		    var type = $(this).attr("data-post");
			var skey = $(this).attr("data-fastkey");
			var compid = $(this).attr("data-id");
			var pType =  $(this).attr("data-type");
			if(comment == ''){
			    var data = 'f='+pType+'&dp='+type+'&cp='+compid+'&stickerk='+skey;
				
			}else{
			    var data = 'f='+pType+'&dp='+type+'&cp='+compid+'&stickerk='+skey+'&comment='+comment; 
			}
			$.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				  //$(".pop").append(TumblrStyleLoaderCss);
			   },
			   success: function(response) { 
				 if(response){
					  $(".pop_sticker").remove();
					  $(".all_c_for" + compid).append(response); 
					  $(".vals"+compid).val('');
				 }
			   }
		   });
	  }); 
	  //Disable Enable Comment 
	  $("body").on("click",".disable_comment", function(){
	        var disablePostID = $(this).attr("data-cmid");
            var dataEditType = $(this).attr("data-type");
			var status = 'comstatus';
			var data = 'f='+status+'&postid='+disablePostID+'&postType='+dataEditType;
			$.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				  $(".here"+disablePostID).append('<div class="appendPreLoader"><span class="preloadCom" style=""><span class="progress"><span class="indeterminate"></span></span></span></div>');
			   },
			   success: function(response) { 
				  if(dataEditType == 'disable'){
					 $("#cm-ed"+disablePostID).attr("data-type", 'enable');
				     $(".cmc"+disablePostID).text(enableComment);
					 if ($(".tag_"+disablePostID).length > 0) {
							$(".tag_"+disablePostID).hide();
					 }
					 if ($(".comi_"+disablePostID).length > 0) {
							$(".comi_"+disablePostID).show();
					 }
				  }
				  if(dataEditType == 'enable'){
				     $("#cm-ed"+disablePostID).attr("data-type", 'disable');
				     $(".cmc"+disablePostID).text(disableComment);
					  if ($(".tag_"+disablePostID).length > 0) {
							$(".tag_"+disablePostID).show();
					 }
					  if ($(".comi_"+disablePostID).length > 0) {
							$(".comi_"+disablePostID).hide();
					 }
				   }
				   $(".appendPreLoader").remove();
			   }
		   });
	   });
  // Show Edit Post PopUp
  $("body").on("click", ".edit_post", function(){
	    var type = $(this).attr("data-type");
		var thisPost = $(this).attr("data-post"); 
		var data = 'f='+type + '&this=' + thisPost;
		$.ajax({
			  type: "POST",
			  url: requestUrl + "requests/activity",
			  data: data,
			  beforeSend: function() {},
			  success: function(response) { 
				 if(response != '200'){
					 $("body").append(response);  
				 } 
			  }
			});
	});
	// Update Post
	$("body").on("click",".updatethispost", function(){
	    var ID = $(this).attr("id");
		var updateTitle = $("#title"+ID).val();
		var updatedetails = $("#details"+ID).val(); 
		var text = $(".hashTag"+ID).val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text); 
	   var updateHash = $(".hashTag"+ID).val();
		var type = $(this).attr("data-type");
		var data = 'f='+type+'&updatethis='+ID+'&updateTitle='+encodeURIComponent(updateTitle)+'&updateDetails='+encodeURIComponent(updatedetails)+'&updateHashtags='+updateHash;
		 $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: data,
			  dataType: "json",
			  cache: false,
			  beforeSend: function() {   },
			  success: function(response) {   
				   var title = response.title;
				   var info = response.info;
				   var hash = response.hash;
				   
				    $('#post_title'+ID).html(title);
					$('#post_info'+ID).html(info);
					$('#ht-i'+ID).html(hash);
				     $(".peepr-drawer-container").addClass("drawer_close");
					  $(".poStListmEnUBox").addClass("closeBoxFix");
						 setTimeout(function() {
							$(".poStListmEnUBox").remove();
						  }, 900);
			  }
			});  
	});
	 // Open Change Background Box
  $("body").on("click", ".changeProfileBg", function() {
    var category = $(this).attr("data-type");
    var data = "f=" + category;
    $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
         
      },
      success: function(response) {
         $("body").append(response); 
      }
    });
  });
	 	//Change Profile Background
	$('body').on('change', '#changeBg', function(e) {
		e.preventDefault(); 
	    var id = $("#changeBg").attr("data-id");
		var data = { t: id  };
		$("#bgForm").ajaxForm({
			type: "POST",
			data: data, 
			cache: false,
		    beforeSubmit: function() {
			   $(".changebgform").append(TumblrStyleLoaderCss);
			},
		    success: function(response) { 
			     $('.bgNew').css('background-image', 'url(' + response + ')');
				 $(".Knight-Rider-loader").remove();
				 if(response){
			         M.toast({html: '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><g><g fill="#32bea6"><g><g><g><g><g><g><path d="M189.0375,96c0,-51.375 -41.6625,-93.0375 -93.0375,-93.0375c-51.375,0 -93.0375,41.6625 -93.0375,93.0375c0,51.375 41.6625,93.0375 93.0375,93.0375c51.375,0 93.0375,-41.6625 93.0375,-93.0375z"></path></g></g></g></g></g></g></g><g fill="#ffffff"><g><path d="M147.225,64.8375c-2.175,-5.6625 -6.6375,-4.7625 -11.475,-3.7875c-2.8875,0.6 -15.75,4.35 -36.0375,25.8c-8.4375,8.8875 -13.9875,15.975 -17.6625,21.375c-2.25,-2.7375 -4.8,-5.7 -7.5,-8.3625c-8.2875,-8.2875 -17.55,-13.9875 -17.925,-14.2125c-3.8625,-2.3625 -8.925,-1.1625 -11.325,2.7375c-2.3625,3.8625 -1.1625,8.925 2.7,11.325c0.075,0.0375 8.025,4.95 14.85,11.8125c6.975,6.975 13.3125,16.425 13.3875,16.5375c1.5375,2.325 4.125,3.675 6.8625,3.675c0.45,0 0.9375,-0.0375 1.425,-0.1125c3.225,-0.5625 5.775,-2.9625 6.5625,-6.1125c0.0375,-0.075 3.3,-9.1125 20.5125,-27.2625c13.875,-14.6625 23.1375,-19.3125 26.3625,-20.5875c0.0375,0 0.0375,0 0.1125,0c0,0 0.1125,-0.0375 0.3,-0.15c0.5625,-0.225 0.8625,-0.3 0.8625,-0.3c-0.15,0.0375 -0.225,0.0375 -0.225,0.0375v-0.0375c1.5,-0.6375 4.275,-1.8375 4.3125,-1.875c4.1625,-1.8 5.55,-6.3 3.9,-10.5z"></path></g></g></g></g></g></svg>' , classes: 'rounded'});
				 }else{
				 M.toast({html: '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M168,148c0,11.04688 -8.95312,20 -20,20h-104c-11.04688,0 -20,-8.95312 -20,-20v-104c0,-11.04688 8.95312,-20 20,-20h104c11.04688,0 20,8.95312 20,20z" fill="#f44336"></path><path d="M67.3125,136l-11.3125,-11.3125l68,-68l11.3125,11.3125z" fill="#ffebee"></path><path d="M136.09375,123.78125l-11.3125,11.3125l-68.35938,-68.375l11.3125,-11.3125z" fill="#ffebee"></path></g></g></g></svg>' , classes: 'warning'});
				 }
				  
		    },
		    error: function() {
	
		    }
		}).submit();
    });
	// Open Close Background 
	$("body").on("click","input[name='bbg']", function(){
		  var t = $(this).attr("data-type");
	      var bgType = $(this).val(); 
		  if(bgType !== ''){
		      var data = 'f='+t+'&oc='+bgType;
			  $.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   $(".changebgform").append(TumblrStyleLoaderCss);
			   },
			   success: function(response) { 
				    if(response){
					    if(bgType == '0'){
						   $(".changeBgNote").removeClass("none").addClass("block");
						   $(".Knight-Rider-loader").remove(); 
						}
						if(bgType == '1'){
						   $(".changeBgNote").removeClass("block").addClass("none");
						   $(".Knight-Rider-loader").remove();
						}
					}
			   }
		   });
		  }
	});
	// Open Change Background Audio Box
  $("body").on("click", ".changeProfileBgAudio", function() {
    var category = $(this).attr("data-type");
    var data = "f=" + category;
    $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
         
      },
      success: function(response) {
         $("body").append(response); 
      }
    });
  });
	 	//Change Profile Background Audio
	$('body').on('change', '#changeAud', function(e) {
		e.preventDefault(); 
	    var id = $("#changeAud").attr("data-id");
		var data = { t: id  };
		$("#audForm").ajaxForm({
			type: "POST",
			data: data, 
			cache: false,
		    beforeSubmit: function() {
			   $(".changebgform").append(TumblrStyleLoaderCss);
			},
		    success: function(response) {
			     $('.bgSound').html(response);
				 $(".Knight-Rider-loader").remove();
				 setTimeout(function() {
					  $(".backgroundAudioUploadContainer").remove();
		         },1050);
		    },
		    error: function() {
	
		    }
		}).submit();
    });
	// Open Close Background Audio
	$("body").on("click","input[name='bag']", function(){
		  var t = $(this).attr("data-type");
	      var bgType = $(this).val(); 
		  if(bgType !== ''){
		      var data = 'f='+t+'&oac='+bgType;
			  $.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   $(".changeBgAudioButtonForms").append(TumblrStyleLoaderCss);
			   },
			   success: function(response) { 
				    if(response){
					    if(bgType == '0'){
						   $(".bgaudiunote").removeClass("none").addClass("block");
						   $(".Knight-Rider-loader").remove(); 
						}
						if(bgType == '1'){
						   $(".bgaudiunote").removeClass("block").addClass("none");
						   $(".Knight-Rider-loader").remove();
						}
					}
			   }
		   });
		  }
	});
	// Close Audio
	$("body").on("click",".closeSoundUpload", function(){
	      $(".backgroundAudioUploadContainer").remove();
	});
	// Show Liked Users
	$("body").on("click","#likedusers", function(){
	          var t = $(this).attr("data-type");
	          var likeid = $(this).attr("data-id"); 
		 
		      var data = 'f='+t+'&i='+likeid;
			  $.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   //$(".changeBgAudioButtonForms").append(TumblrStyleLoaderCss);
			   },
			   success: function(response) { 
				    if(response){
					     $("body").append(response); 
						 byScroll();
					}
			   }
		   }); 
	});
	 // Show Gifs
	  $("body").on("click",".gifs", function(){
	      var width = $(window).width();
		  var height = $(window).height(); 
	      var ID = $(this).attr('data-id');
		  var childNodes = $(".pop_sticker");
		  var type = $(this).attr("data-type");
		  var postType = $(this).attr("data-post");
		   var data = 'f=' +type+ '&pmid=' +ID+'&post='+postType;
		   if (childNodes.length) {
		       childNodes.remove();
		  } else {
			   if (width >= 600) {
			        $(".u_p"+ID).append('<div class="pop pop_sticker" style="position:absolute; right:20px; bottom:50px;"></div>');
		        }
			  if (width <= 600) {
				$(".u_p"+ID).after('<div class="popMobile pop_sticker"></div>');
			  }
		  $.ajax({
             type: "POST",
             url: requestUrl + "requests/activity", 
             data: data,
             cache: false,
             beforeSend: function() {
                $(".pop_sticker").append(TumblrStyleLoaderCss);
             },
             success: function(response) { 
               if(response){
				   setTimeout(function() {
					  $(".Knight-Rider-loader").remove();
		              $(".pop_sticker").html(response);
		            },1050);
			      
			   }
             }
         });
		}
	  });
	  // Send Sticker
	  $("body").on("click", ".gif_body", function(){ 
		    var textArea = "." + $(this).closest("[data-textarea]").data("textarea");
			 var comment = $(textArea).val();
		    var type = $(this).attr("data-post");
			var skey = $(this).attr("data-fastkey");
			var compid = $(this).attr("data-id");
			var pType =  $(this).attr("data-type");
			if(comment == ''){
			    var data = 'f='+pType+'&dp='+type+'&cp='+compid+'&gifk='+skey;
				
			}else{
			    var data = 'f='+pType+'&dp='+type+'&cp='+compid+'&gifk='+skey+'&comment='+comment; 
			}
			$.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				  //$(".pop").append(TumblrStyleLoaderCss);
			   },
			   success: function(response) { 
				 if(response){
					  $(".pop_sticker").remove();
					  $(".all_c_for" + compid).append(response); 
					  $(".vals"+compid).val('');
					  ion.sound.play("camera_flashing_2");
				 }
			   }
		   });
	  }); 
$(window).scroll(function() {
  var theta = ($(window).scrollTop() / 10) % Math.PI;
  $(".sponsored_post_sprite_new , .sponsor_rot").css({ transform: "rotate(" + theta + "rad)" });
});	  
 //Paypal Payment 
 $("body").on("click", "#buyCreditNow", function(){
       var amount = $("#amount").val();
	   var type = $(this).attr("data-type");
	   var data = 'f='+type+'&amount=' + amount;
	   if(amount.length === 0){ 
			$(".makeCredit").focus().val('');
	        return false;
	   }
	   $.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   $("body").append(preLoaderPopUp);
			   },
			   success: function(response) { 
			     if(response == 2){
					 $("#creditNote").append("<div class='minamonth'>"+minAmonth+"</div>");
					 $("#postPopUpBox").remove();
					 setTimeout(function() {
					  $(".minamonth").remove(); 
					  $("#amount").focus();
		            },5050);
				     return false;
				 }
				 if(response == 200){
					 $("#creditNote").append("<div class='minamonth'>"+wrongfe+"</div>");
					 $("#postPopUpBox").remove();
					 setTimeout(function() {
					  $(".minamonth").remove(); 
					  $("#amount").focus();
		            },5050);
				     return false;
				 }
				 if(response){
					window.location.href = response;
				 } 
			   }
		   });
  }); 
  // Open Close Ads Panel
  $("body").on("click", ".crads", function(){
        if ($(".create_ads_box_container").hasClass("closedad")) {
			  $(".create_ads_box_container").removeClass("closedad").addClass("openad");
	    }else{
		      $(".create_ads_box_container").removeClass("openad").addClass("closedad");
		}
  });
  // Change Credit Real Time Calculate
  $("body").on("keyup",".writeadsbudget", function(){
      var originalCredit = $("#buycredit").attr("data-c");
	  var userBudget = $(this).val();
	  var calculate = originalCredit - userBudget;
	  if(userBudget == '0'){ 
		  M.toast({html: noenoughCredit , classes: 'warning'});
		  $("#yourbudget").val('');
		  return false;
	  }
	  if(calculate < 0){
	      M.toast({html: noenoughbudget , classes: 'warning'}); 
		  $("#yourbudget").val('');
		  return false;
	  } 
  });
    // Uploading Advertisement Image
  $('body').on('change', '#adsimg', function(e) {
    e.preventDefault();
    var values = $("#uploadvalues").val();
    var id = $("#adsimg").attr("data-id");
	var data = { t: id  };
    $("#adsform").ajaxForm({
		 type: "POST",
         data: data,
		 delegation: true,
        //target: '#uploadedNew',
		cache: false,
        beforeSubmit: function() {   
		   // Do Something
        }, uploadProgress: function(e, position, total, percentageComplete)  {
		 // $('.cssProgress-bar').width(percentageComplete + '%' );
		 // $('.cssProgress-label2-right').html(percentageComplete + '%'); 
		},
      success: function(response) {
	    $('#previewAdsImg').append(response);
         var R = $('.pimg').attr('id');
         var  A = R + ',' + values;
         if (A!= 'undefined,') {
           $("#uploadvalues").val(A);
         }
      },
      error: function() {}
    }).submit();
  });
     // Delete Image before post Wall
	$("body").on("click",".delete_this_ads_image", function(){
		var ID = $(this).attr("id");
		var input = $('#uploadvalues');
		var type = $(this).attr("data-type");
		var data = 'image=' + ID + '&f='+type;
		$.ajax({
		  type: 'POST',
		  url: requestUrl + 'requests/activity', 
		  data: data,
		  cache: false,
		  beforeSend: function() {  },
		  success: function(response) {  
				 // After Delete
				input.val(function(_, value){
				   return value.split(',').filter(function(val){ // split the value
					 return val !== ID; // filter to return other values
				   }).join(','); // join them to create a new string.
				});
				$("#new"+ID).remove(); 
		  }
		}); 
	}); 
	function checkUrlt(url){
    return url.match(/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-\@?^=%&amp;/~\+#])?/);
   }
  // Create Advertisement
  $("body").on("click","#sendads", function(){   
      var type = $(this).attr("data-type");
      var campanyName = $("#campany_name").val();
	  var campanyURL = $("#a_url").val();
	  var whoCanSeeAds = $("input:radio[name=showthis]:checked").val();
	  var adsAreaDisplay = $("#ads_area_display").val();
	  var advertisementTitle = $("#a_title").val();
	  var advertisementOffer = $("#ads_offer").val(); 
	  var advertisementStayLive = $("#ads_stay_live").val();
	  var advertisementDescription = $("#ads_description_info").val();
	  var advertisementImages = $("#uploadvalues").val();
	  var advertisementCategory = $("#advertisement_category").val();
	  var userBudget = $("#yourbudget").val(); 
	  
	  //Check Campany Name
	  if($.trim(campanyName) === ''){
	       $("#campanyname").css({'color': '#cc0909'});
			return false;
	  }
	  if(campanyName.length < 5){
	        $("#campanyname").css({'color': '#cc0909'});
			return false;
	  }
	  if($.trim(campanyURL) === ''){
	        $("#redirecturl").css({'color': '#cc0909'});
			return false;
	  }
	  if(!checkUrlt(campanyURL)){
	        $("#redirecturl").css({'color': '#cc0909'}); 
			return false;
	  } 
	  if(!whoCanSeeAds){
		  $("#showthis__").css({'color': '#cc0909'});
		   return false;
	   }
	  if(!$('#ads_area_display').find(":selected").val()){
		  $("#ads_display_title").css({'color': '#cc0909'});
	      return false;
	  } 
	   if($.trim(advertisementTitle) === ''){
	       $("#advertisement__title").css({'color': '#cc0909'});
			return false;
	  }
	  if(advertisementTitle.length < 10){
	        $("#advertisement__title").css({'color': '#cc0909'});
			return false;
	  } 
	   if(!$('#ads_offer').find(":selected").val()){
		  $("#adsoffer__").css({'color': '#cc0909'});
	      return false;
	  } 
	   if(!$('#advertisement_category').find(":selected").val()){
		  $("#adscat").css({'color': '#cc0909'});
	      return false;
	  }
	  if(!$('#ads_stay_live').find(":selected").val()){
		  $("#ads__staylive").css({'color': '#cc0909'});
	      return false;
	  }
	  if(!$('#ads_description_info').val()){
		  $("#advertisement__description").css({'color': '#cc0909'});
	      return false;
	  }
	  if($.trim(advertisementImages) === ''){
		  $("#ads__image").css({'color': '#cc0909'});
		  return false;
	  } 
	  var data =  'f='+type+'&campany='+encodeURIComponent(campanyName)+'&web='+encodeURIComponent(campanyURL)+'&show='+whoCanSeeAds+'&areadisplay='+adsAreaDisplay+'&adsTitle='+encodeURIComponent(advertisementTitle)+'&offer='+advertisementOffer+'&live='+advertisementStayLive+'&description='+encodeURIComponent(advertisementDescription)+'&adsfile='+advertisementImages + '&adscategory='+advertisementCategory+'&budget='+userBudget;
	  $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){
		     $("body").append(preLoaderPopUp);
		 },
		 success: function(response){
		      if(response == 3){
			      $("#yourbudget").focus().css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'background':'rgba(255, 0, 0,.05)', 'transition': 'all 0.15s ease-out;'});
			  } 
			  if(response == 1){
					 $(".AdvertiseSuccess").show().html(adsSuccess); 
					 $("#yourbudget").val('');
					 $("#campany_name").val('');
					 $("#a_url").val('');
					 $("#a_title").val('');
					 $("#advertisement_category").val('');
					 $("#ads_stay_live").val('');
					 $("#ads_description_info").val('');
					 $("#uploadvalues").val('');
					 $("#previewAdsImg").html('');
					 $(".create_ads_box_container").removeClass("openad").addClass("closedad");
					 setTimeout(function() {
					     $("#postPopUpBox").remove();
		             },5050);
			   }
		 } 
	  });
  });
  // Show Hide Advertisement Image
   $("body").on("click", ".showHideImage", function(){
        var ID = $(this).attr("id");
		if ($("#adsBody"+ID).hasClass("aclosed")) {
			  $("#adsBody"+ID).removeClass("aclosed").addClass("aopened");
			  $("#sha"+ID).removeClass("eye_open").addClass("eye_close");
			  $("#sh"+ID).html(HideImagesA);
	    }else{
		      $("#adsBody"+ID).removeClass("aopened").addClass("aclosed");
			  $("#sha"+ID).removeClass("eye_close").addClass("eye_open");
			  $("#sh"+ID).html(ShowImagesA);
		}
  });
  // Show Hide Advertisement Image
   $("body").on("click", ".showHideProduct", function(){
        var ID = $(this).attr("id");
		if ($("#adsBody"+ID).hasClass("aclosed")) {
			  $("#adsBody"+ID).removeClass("aclosed").addClass("aopened");
			  $("#sha"+ID).removeClass("eye_open").addClass("eye_close");
			  $("#sh"+ID).html(hideProduct);
	    }else{
		      $("#adsBody"+ID).removeClass("aopened").addClass("aclosed");
			  $("#sha"+ID).removeClass("eye_close").addClass("eye_open");
			  $("#sh"+ID).html(seeProduct);
		}
  });
  // Change Product Disable Status
  $("body").on("change",".dis_status", function(){
       var type = 'display_status';
	   var status = $(this).val();
	   var id = $(this).attr("data-id");
		var data = 'f='+type+"&id=" + id + "&status=" + status;
		$.ajax({
		  type: "POST",
		  data: data,
		  url: requestUrl + 'requests/activity',
		  cache: false,
		  beforeSend: function() {},
		  success: function(response) {
			if (value == "0") {
			  $("#ckbx-size-" + id).val("1");
			} else if (value == "1") {
			  $("#ckbx-size-" + id).val("0");
			}
		  }
		});
   });
   // Open Close Advertisement
   $("body").on("click", ".gst", function() { 
    var type = $(this).attr("data-type");
    var value = $(this).val();
    var id = $(this).attr("data-id");
    var data = 'f='+type+"&id=" + id + "&status=" + value;
    $.ajax({
      type: "POST",
      data: data,
      url: requestUrl + 'requests/activity',
      cache: false,
      beforeSend: function() {},
      success: function(response) {
        if (value == "0") {
          $("#ckbx-size-" + id).val("1");
        } else if (value == "1") {
          $("#ckbx-size-" + id).val("0");
        }
      }
    });
  });
  // See Advertisement
  $("body").on("click", ".see_full_details", function(){
       var f = $(this).attr("data-type");
	   var ID = $(this).attr("data-post");
	   var data = 'f='+f+'&advertise='+ID;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response){
			     $("body").append(response);
			  }
		 } 
	  });
   });
    // Save Ads Changes
  $("body").on("click", ".saveMyChangeAd", function(){
	   
	    var type = $(this).attr("data-type");
		var thisID = $(this).attr("data-id"); 
        var adsTitle = $(".edit_adstitle").val(); // Advertisement Title
		var adsDescription = $(".edit_description").val(); // Advertisement Description 
		var adsRedirectUrl = $(".adsLink").val();  // Advertisement Redirect Website Link 
		var adsCampanyName = $(".edit_campanyName").val(); // Advertisement Campany Name 
		var adsBudget = $(".adsBudget").val(); // Advertisement Budget 
		var adswhoCanSeeAds = $("input:radio[name=showthis]:checked").val(); // Show Advertisment All, Male or Female 
		var adsAreaDisplay = $("#ads_area_display").val(); //Where will this ad appear? 
		var adsCategory = $("#advertisement_category").val(); // Which Category  
		var advertisementStayLive = $("#ads_stay_live").val(); // How long will be displayed 
		var advertisementOffer = $("#ads_offer").val(); // Let's bring in what way your costs. 
		var agreeStatus = $('input[type="radio"][name="ads_ads"]:checked').val(); // Ads Approval Status 
		// Insert DAta
		var data = 'f='+type+'&advertiseTitle='+encodeURIComponent(adsTitle)+'&advertiseDescription='+encodeURIComponent(adsDescription)+'&advertiseRedirectUrl='+encodeURIComponent(adsRedirectUrl)+'&advertisecampanyname='+encodeURIComponent(adsCampanyName)+'&advertisebudget='+adsBudget+'&advertisewhocansee='+adswhoCanSeeAds+'&advertiseareadisplay='+adsAreaDisplay+'&advertisecategory='+adsCategory+'&advertisestaylive='+advertisementStayLive+'&advertiseoffer='+advertisementOffer+'&thisAdvertisement='+thisID+'&agreStatus='+agreeStatus;
		
		$.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response){
			      
			  }
		 } 
	  });
   });
   // Show Admin Need Approve Note
   $("body").on("change",".with-gaps", function() { 
    if ($(this).val() == "1") {
      $(".adsBoxItemWrapperEditMain").show(); 
    } else {
      $(".adsBoxItemWrapperEditMain").hide();
    }
  });
  // Delete Old Searched User
  $("body").on("click", ".deleteSearched", function(){
	   var type = $(this).attr("data-type");
	   var ID = $(this).attr("data-id");
	   var data = 'f='+type+'&oldID='+ID;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response == 1){
			       $("#olds"+ID).remove();
			  } 
		 } 
	  });
  });
  // Delete Conversation
  $("body").on("click", ".reson", function(){
       var type = $(this).attr("data-type");
	   var from = $(this).attr("data-from");
	   var toid = $(this).attr("data-to");
	   var con = $(this).attr("data-con");
	   var data = 'f='+type+'&conID='+con+'&conIDFrom='+from+'&conIDto='+toid;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response == 1){
			       $("#conme"+con).remove();
			  } 
		 } 
	  });
   });
   // Perclick Advertise
   $("body").on("click", ".spt", function(){
	    var type = $(this).attr("data-type");
		var ids = $(this).attr("id");
		var data = 'f='+type+'&ad='+ids;
		$.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){} 
	  });
	});
	$("body").on("click", ".selectablebgColor", function(){
	     var changeType = $(this).attr("data-type");
		 var ID = $(this).attr("id");  
		 $('.selectablebgColor').removeClass('beforeSelectedBgColor');
		 $(this).addClass('beforeSelectedBgColor'); 
		 
		 if(changeType == 'background_color'){   
		     $(".theCustoms").attr("data-pbgcolor", ID);
		 }
		 if(changeType == 'icon_color'){
			 $(".theCustoms").attr("data-pheadericon", ID);
		 } 
		 if(changeType == 'text_color'){
		     $(".theCustoms").attr("data-ptcolor", ID);
		 } 
	});
	$("body").on("click", ".fontBox", function(){
	     var changeType = $(this).attr("data-type");
		 var ID = $(this).attr("id");  
		 $('.fontBox').removeClass('beforeSelectedFont');  
		 $(this).addClass('beforeSelectedFont');
	     $(".theCustoms").attr("data-fonts", ID);
		 
	});
 
	// Open Profile Design Panel
   $("body").on("click", ".changeProfileDesign", function(){
	    var type = $(this).attr("data-type"); 
		var data = 'f='+type;
		$.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){$("body").append(response);} 
	  });
	});
	// Save New Profile Design
	$("body").on("click", ".theCustoms", function(){  
			var type = $(this).attr("data-type");
			var profileBackgroundColor = $(this).attr("data-pbgcolor");
			var profileHeaderTopIcon = $(this).attr("data-pheadericon");
			var profileTextColor = $(this).attr("data-ptcolor");
			var profileFont = $(this).attr("data-fonts"); 
			var data = 'f='+type+'&pbgall='+profileBackgroundColor+'&phicon='+profileHeaderTopIcon+'&phtc='+profileTextColor+'&pfnt='+profileFont;
			$.ajax({
				 type: 'POST',
				 url: requestUrl + 'requests/activity',
				 data: data,
				 cache: false,
				 beforeSend: function(){$("body").append(preLoaderPopUp);},
				 success: function(response){
					 if(response == 1){
						 $(".app-customization-container").addClass("closeDesign_anim");  
						 $(".app-customization-container , .fixedBackground_two").remove(); 
						 location.reload();
				     }else{
						 M.toast({html: response , classes: 'error'});
						 $("#postPopUpBox").remove();
						 $(".app-customization-container").addClass("closeDesign_anim");  
						 $(".app-customization-container , .fixedBackground_two").remove(); 
					 }
				   
				 } 
			  });
	}); 
	/*Close Notification Box*/
  $("body").on("click", ".closeDesign , .savebgi", function(){
      $(".app-customization-container").addClass("closeDesign_anim"); 
	     setTimeout(function() {
            $(".app-customization-container , .fixedBackground_two").remove(); 
          }, 900);
  });
  //Chat Open close Menu
  $("body").on("click", ".cfil", function() {  
    if (!$(".Szr5JChC").hasClass("dblock")) {
      $(".Szr5JChC").addClass("dblock"); 
    } else {
      $(".Szr5JChC").addClass("dnone"); 
    }
  });
  // Uploading Music, Video and Image
  $("body").on("change", "#cuploadBtn", function(e) {
    e.preventDefault();
    var values = $("#cuploadvalues").val();
	var id = $("#cuploadBtn").attr("data-id");
	var data = { t: id  };
    $("#cuploadform").ajaxForm({
		 type: "POST",
         data: data,
		 delegation: true,
        //target: '#uploadedNew',
		cache: false,
        beforeSubmit: function() { 
		  
		},
        success: function(response) {  
		   $('._2a-p').append(response);
		   var K = $("._2a-p  > div:last").attr("id");
		   var T = K + "," + values;
		   if (T != "undefined,") {
			   $("#cuploadvalues").val(T);
		   }
        },
        error: function() {}
      }).submit();
  });
  // Uploading Music, Video and Image
  $("body").on("change", "#vuploadBtn", function(e) {
    e.preventDefault();
    var values = $("#vuploadvalues").val();
	var id = $("#vuploadBtn").attr("data-id");
	var data = { t: id  };   
    $("#vuploadform").ajaxForm({
		 type: "POST",
         data: data,
		 delegation: true,
        //target: '#uploadedNew',
		cache: false,
        beforeSubmit: function() { 
		  
		},
        success: function(response) {  
		   $('._2a-p').append(response); 
		   var K = $(".uploadedvid").attr("id"); 
		   var T = K + "," + values;
		   if (T != "undefined,") {
			   $("#vuploadvalues").val(T);
		   }
        },
        error: function() {}
      }).submit();
  });
  // Uploading Music, Video and Image
  $("body").on("change", "#fuploadBtn", function(e) {
    e.preventDefault();
    var values = $("#fuploadvalues").val();
	var id = $("#fuploadBtn").attr("data-id");
	var data = { t: id  };   
    $("#fuploadform").ajaxForm({
		 type: "POST",
         data: data,
		 delegation: true,
        //target: '#uploadedNew',
		cache: false,
        beforeSubmit: function() { 
		  
		},
        success: function(response) {  
		   $('._2a-p').append(response); 
		   var K = $(".thisfilenam").attr("id"); 
		   var T = K + "," + values;
		   if (T != "undefined,") {
			   $("#fuploadvalues").val(T);
		   }
        },
        error: function() {}
      }).submit();
  });
  // Timer PopUp
  var TimerPopUp = '<div class="setTimeContainer"> <div class="setTimeWrapper"> <div class="time-modal-middle"> <div class="timeheader">'+ChoseSelfTime+'</div><div class="timerContainer"> <p> <label> <input name="group1" type="radio" value="5" checked/> <span>5 '+selfSecond+'</span> </label> </p><p> <label> <input name="group1" type="radio" value="30"/> <span>30 '+selfSecond+'</span> </label> </p><p> <label> <input class="with-gap" name="group1" type="radio" value="60"/> <span>1 '+selfMinute+'</span> </label> </p></div><div class="acceptButton"> <div class="confirmButtons"> <div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'+cancel+'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue yesThisTime"><span>'+sure+'</span></button></div></div></div></div></div></div>';
  //Append Timer
  $("body").on("click",".timesendicon , .desttimeSend", function(){
	  $("body").append(TimerPopUp);
  });
  //Set Time
  $("body").on("click",".yesThisTime", function(){
    var user_cat = $("input[name='group1']:checked").val(); 
    $("#selfdestructtime").val(user_cat);
	$(".setTimeContainer").remove();
  });
  // Get Self Destruction Chat Message
  $("body").on("click", ".seldDestruct", function(){
	   var type = $(this).attr("data-type");
	   var chatID = $(this).attr("data-id");
	   var destTime = $(this).attr("data-destTime");
	   var data  = 'f='+type+'&chatID='+chatID+'&time='+destTime;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response == '1'){
				  alert('1');
			      return false;
			  }else{
			    $("body").append(response);
				/***/ 
					var timeleft = destTime;
					var downloadTimer = setInterval(function(){
					  document.getElementById("downtime").innerHTML = timeleft;
					  timeleft -= 1;
					  if(timeleft <= -2){
						 $(".setTimeContainer").remove();
						 clearInterval(downloadTimer);
						 var self = 'setIt';
	                     var data  = 'f='+self+'&chatID='+chatID+'&time='+destTime;
						 $.ajax({
							 type: 'POST',
							 url: requestUrl + 'requests/activity',
							 data: data,
							 cache: false,
							 beforeSend: function(){},
								 success: function(response){
									 $("#selfDest"+chatID).html('This message was self destruction');
								 }
						  }); 
					  }
					}, 1000); 
			  /***/
			 }
		 } 
	  });
  });  
  // Social Share
   $("body").on("click",".dCJp9", function(){
       var type = $(this).attr("data-type");
	   var postID = $(this).attr("id");
	   var data = 'f='+type+'&postNumber='+postID;
	   $.ajax({
				type: 'POST',
				url: requestUrl +  'requests/activity',
				data: data,
				cache: false,
				beforeSend: function() { $("body").append('<div class="fixedBackground"></div>'); },
				success: function(response) {  
				     $("body").append(response);
					 setTimeout(function() {
						$(".social_share_buttons_container").removeClass('openSocial');
					  }, 500);
				}
		 }); 
   });
  // Re-Share Post
  $("body").on("click",".dCJpS",  function(){
        var type = $(this).attr("data-type");
		var postID = $(this).attr("data-id");  
		var data = 'f='+type+'&postNumber='+postID;
	    $.ajax({
				type: 'POST',
				url: requestUrl +  'requests/activity',
				data: data,
				cache: false,
				beforeSend: function() { },
				success: function(response) {  
				     $("body").append(response); 
					 if(response){
					     $('body').addClass('disableScroll');
					 }else{$('body').removeClass('disableScroll');}
				}
		 });
  });
   // Re-Share Post
  $("body").on("click",".boost_post",  function(){
        var type = $(this).attr("data-type");
		var postID = $(this).attr("data-boost");  
		var data = 'f='+type+'&productNumber='+postID;
	    $.ajax({
				type: 'POST',
				url: requestUrl +  'requests/activity',
				data: data,
				cache: false,
				beforeSend: function() { },
				success: function(response) {  
				     $("body").append(response); 
					 if(response){
					     $('body').addClass('disableScroll');
					 }else{$('body').removeClass('disableScroll');}
				}
		 });
  });
  $("body").on("click",".boostaccept", function(){
      var type = 'buyProductBoost';
	  var id = $(this).attr("data-id");
	  var  boostPrice = $("#budget").val();
	  var disType = $("#crncy").val();
	  var data = 'f='+type+'&boostID='+id+'&boost_price='+boostPrice+'&disType='+disType; 
	  if(!$.trim(boostPrice).length) { // zero-length string AFTER a trim
            $("#budget").css("border", "1px solid red");
			return false;
     }
	 if(!$.trim(disType).length) { // zero-length string AFTER a trim
            $("#stb").css("color", "red");
			return false;
     }
	  $.ajax({
			   type: "POST",
			   url: requestUrl+ "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   $("body").append('<div class="popUpPreLoaderWrap initial" id="postPopUpBox" style="z-index:999999;""><div class="popUpPreLoaderContainer initial"><div class="popUpPreLoaderMiddle initial"><div class="preloader-wrapper small active  initial"><div class="spinner-layer spinner-blue initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-red initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-yellow initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-green initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div></div></div></div></div>');
			   },
			   success: function(response) {  
				 if(response){
					 window.location.href = response;
				 } 
			   }
		   }); 
});
    // Social Share
   $("body").on("click",".selectedBgColor", function(){
       var type = $(this).attr("data-type"); 
	   var data = 'f='+type;
	   $.ajax({
				type: 'POST',
				url: requestUrl +  'requests/activity',
				data: data,
				cache: false,
				beforeSend: function() { $("body").append('<div class="fixedBackground"></div>'); },
				success: function(response) {  
				     $("body").append(response);
					 setTimeout(function() {
						$(".social_share_buttons_container").removeClass('openSocial');
					  }, 500);
				}
		 }); 
   });
   /*********************/
   
   $("body").on("click",".closethisBox , .fixedBackground , .fixedBackground_two , .finishSelectC", function(){
	   $(".social_share_buttons_container , .search_user_filter_container").addClass("closeSocial");
	   setTimeout(function() {
            $(".social_share_buttons_container , .search_user_filter_container , .popupBack").remove();
		    $(".fixedBackground").remove();
          }, 500);
	});
   /*********************/
    var timer;
	
   function pesquisar() {
	var type =  'searchGif'; 
    var box = $('#giphy_').val();
    contentbox = $.trim(box);
    var dataString = 'f='+type+'&gifKey=' + contentbox;
    if (contentbox !== '') {
      $.ajax({
        type: "POST",
        url: requestUrl + "requests/activity",
        data: dataString, 
        cache: false,
        beforeSend: function() {
		   $(".newgiphyImagesHere , .giphyimages").show().append(TumblrStyleLoaderCss);
		},
        success: function(response) { 
		  if(response){ 
			  $(".giphyimages").html(response);
			  $(".Knight-Rider-loader").remove();
		  } 
        }
      });
    }else{
	   $(".newgiphyImagesHere , .giphyimages").hide();
	   $("#uploadedNew").html('');
	}
   }  
$('body').delegate('#giphy_', 'keyup', function() {
   // clear prior timeout
   clearTimeout(timer);
   // create new one
   timer = setTimeout(pesquisar, 1000) 
});
// Click To Show Selected Gif
$("body").on("click",".imageGiphy", function(){
    var imageURL = $(this).attr("data-image");
	var id = $(this).attr("data-id");
	$(".urlgif").val(imageURL);
	$(".newgiphyImagesHere , .giphyimages , .giphin").hide();
	$("#uploadedNew").html('');
	$(".selectedGifImage").show().html('<img id="giphy_'+id+'" src="'+imageURL+'"/><div class="anotherOne" id="'+id+'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M96,19.2c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8c0,-42.4128 -34.3872,-76.8 -76.8,-76.8zM105.0496,96c0,0 20.0896,20.0896 21.0752,21.0752c2.5024,2.5024 2.5024,6.5536 0,9.0496c-2.5024,2.5024 -6.5536,2.5024 -9.0496,0c-0.9856,-0.9792 -21.0752,-21.0752 -21.0752,-21.0752c0,0 -20.0896,20.0896 -21.0752,21.0752c-2.5024,2.5024 -6.5536,2.5024 -9.0496,0c-2.5024,-2.5024 -2.5024,-6.5536 0,-9.0496c0.9792,-0.9856 21.0752,-21.0752 21.0752,-21.0752c0,0 -20.0896,-20.0896 -21.0752,-21.0752c-2.5024,-2.5024 -2.5024,-6.5536 0,-9.0496c2.5024,-2.5024 6.5536,-2.5024 9.0496,0c0.9856,0.9792 21.0752,21.0752 21.0752,21.0752c0,0 20.0896,-20.0896 21.0752,-21.0752c2.5024,-2.5024 6.5536,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5536 0,9.0496c-0.9792,0.9856 -21.0752,21.0752 -21.0752,21.0752z"></path></g></g></svg></div>');  
});

$("body").on("click",".anotherOne", function(){
	var ID = $(this).attr("id");
   $("#giphy_"+ID).remove();
   $(".giphin").show();
   $(".newgiphyImagesHere , .giphyimages").hide();
	$("#uploadedNew").html('');
	$(".selectedGifImage").html('').hide();
});
////////////////////// 
	
   function gifData() {
	var type =  'commentGif'; 
    var box = $('.postGif').val();
    contentbox = $.trim(box);
    var dataString = 'f='+type+'&gifKeyCo=' + box;
    if (contentbox !== '') {
      $.ajax({
        type: "POST",
        url: requestUrl + "requests/activity",
        data: dataString, 
        cache: false,
        beforeSend: function() {
		   $(".fastGifs").hide();
		   $(".resultsGifs").append(TumblrStyleLoaderCss);
		},
        success: function(response) { 
		  if(response){ 
			  $(".resultsGifs").html(response);
			  $(".Knight-Rider-loader").remove();
		  } 
        }
      });
    }else{
	  $(".fastGifs").show();
	  $(".resultsGifs").hide().html();
	}
   }  
$('body').delegate('.postGif', 'keyup', function() {
   // clear prior timeout
   clearTimeout(timer);
   // create new one
   timer = setTimeout(gifData, 1000) 
});
$("body").on("click",".closeGifBox", function(){
    $(".stickers_container , .popMobile").remove();
});
// Change Watermark Bg
$("body").on("click",".wmb", function(){
     var image = $(this).attr("data-wim");
     var col = $(this).attr("data-wic");
	 var id = $(this).attr("data-wi");
     var placeholderClass = $(this).attr("data-wcl");
     $(".watermarkbg").css({ "background-image": "url("+image+")", "color": "#"+col+"" });  
	 $(".share_watermark, .share_event_watermark").attr("data-wt",id);
	if (!$('.'+placeholderClass).length) {  
	   $('#watermarktext')[0].className = '';
	   $("#watermarktext").addClass(placeholderClass); 
     } 
});
 // Save Text Post from Data
 $("body").on("click", ".share_watermark", function(){ 
	   var postDetails = $("#watermarktext").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var wt = $(this).attr("data-wt");
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var data = 'details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&wt='+wt+'&myFeeling='+feeling; 
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove(); 
					    $("#new_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  }); 
   // Save Text Post from Data
 $("body").on("click", ".share_event_watermark", function(){ 
	   var postDetails = $("#watermarktext").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var wt = $(this).attr("data-wt");
	   var eventID = $('#e_posts').attr('data-ev');
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var data = 'details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&wt='+wt+'&eventID='+eventID+'&myFeeling='+feeling; 
		   $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: data, 
			   beforeSend: function(){
			        $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					    $("#e_posts").prepend(response); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  }); 
  // Vote Which Post
  $("body").on("click",".whichImageHeart", function(){ 
        var votePostID = $(this).attr("data-id");
		var votedImageID = $(this).attr("id");
		var voteTitle = $(this).attr("title");
		var type = 'vote_which';
		var data = 'f='+type+'&post='+votePostID+'&v_id='+votedImageID;
		$.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/activity',
			   dataType: "json", 
			   data: data, 
			    cache: false,
			   beforeSend: function(){
			        $("#wi_"+votedImageID).prepend("<div class='prog-colm-which panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){ 
			         $(".prog-colm-which").remove();   
					 var wrong = response.note; 
					 if(wrong){
					     M.toast({html: wrong , classes: 'warning'});
					 }else{
						 var firstID = response.id_one; 
						 var firstPercent = response.first_percent;
						 var secondPercent = response.second_percent;
						 var usum = response.usum;
						if(response){
							$(".heart_v_"+votePostID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>'); 
							    $(".heart_"+votedImageID).html('<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.21741 46.57606,78.62957 68.4375,95.8c2.32394,2.00696 5.2919,3.11163 8.3625,3.1125c2.77953,-0.00359 5.48235,-0.91185 7.7,-2.5875v0.0125c0.07557,-0.05927 0.1863,-0.14019 0.2625,-0.2c0.04191,-0.03723 0.08358,-0.07473 0.125,-0.1125c4.26661,-3.35007 9.60116,-7.7148 15.2625,-12.575c4.15752,3.83489 7.18749,6.3375 7.18749,6.3375c0.06166,0.04696 0.12417,0.0928 0.1875,0.1375c2.06993,1.55249 4.75604,2.5875 7.675,2.5875c2.91896,0 5.60506,-1.03504 7.675,-2.5875c0.05912,-0.04481 0.11746,-0.09065 0.175,-0.1375c0,0 8.97843,-7.21795 18,-17.1375c9.0216,-9.91957 18.95,-22.20737 18.95,-35.98749c0,-7.94552 -3.49508,-15.07613 -8.9625,-20.0875c1.61431,-5.45542 2.5625,-10.99578 2.5625,-16.575c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM116.95,89.6c7.34694,0 12.125,6.74999 12.125,6.75c1.1872,1.78008 3.18534,2.84922 5.325,2.84922c2.13966,0 4.1378,-1.06914 5.325,-2.84922c0,0 4.77805,-6.75 12.125,-6.75c8.11398,0 14.55,6.43603 14.55,14.55c0,6.51427 -7.35407,18.29455 -15.6125,27.375c-8.17225,8.98569 -16.21691,15.48697 -16.3875,15.625c-0.17059,-0.13807 -8.21508,-6.63837 -16.3875,-15.625c-8.2586,-9.0814 -15.6125,-20.86507 -15.6125,-27.375c0,-8.11398 6.43603,-14.55 14.55,-14.55z"></path></g></g></svg>'); 
							 
							 $(".voteCount").html(100 - firstPercent); 
							 $("#vtc_"+firstID).html(firstPercent);
							 $("#vs_"+votePostID).html(usum);
						}
				} 
			   }
		   });
  });
  // Select Which Category
  $("body").on("click",".categoryName", function(){
       var ID = $(this).attr("data-ctid");  
      $(".categoryName").removeClass("ct-selected");
      $(".ct_"+ID).addClass("ct-selected");
	  $(".share_which, .share_event_which").attr("data-sct",ID);
  });
   // Save Image Post from Data
  $("body").on("click",".share_which", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var category = $(this).attr("data-sct");
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#whUploads").val(); 
	      var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&uploads='+UploadedImageValues+'&category='+category+'&myFeeling='+feeling;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){},
			   success: function(html){
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					        $("#new_posts").prepend(html); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  });
    $("body").on("click",".share_event_which", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val();
	   var category = $(this).attr("data-sct");
	   var eventID = $('#e_posts').attr('data-ev');
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#whUploads").val(); 
	      var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&uploads='+UploadedImageValues+'&category='+category+'&eventID='+eventID+'&myFeeling='+feeling;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){
			        $("#e_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(html){
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					        $("#e_posts").prepend(html); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  });
  // Close Crop 
  $("body").on("click",".closeCrop", function(){
	    $(".fixedAvatarBackground , .fixedCoverBackground").hide();
		$(".crop-avatar-container , .crop-Cover-container").hide();
   });
   // Open Post Box
  $("body").on("click", ".createNew_", function() {
    var category = $(this).attr("data-type");
    var data = "f=" + category;
    $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
        $("body").append(preLoaderPopUp);
      },
      success: function(response) {
         
          $("#postPopUpBox").addClass("poSBoxContainerHide");
          $("body").append(response);
          setTimeout(function() { 
			 AutoTiseTextArea();
          }, 1000);
        $(".popUpPreLoaderWrap").remove();
		$(".news_post_create").removeClass("changeTheSize");
		 $(".createNewPost_two").removeClass("createNewPost_two_change");
		 $(".ppos_modal").hide(); 
      }
    });
  });
  // Create New Event      
  $("body").on("click", ".createNew_e", function() {
    var category = $(this).attr("data-type");
	var event_name = $("#event_name").val();
	var event_location = $("#event_location").val();
	var event_startday = $("#event_startday").val();
	var event_starttime = $("#event_starttime").val();
	var event_endday = $("#event_endday").val();
	var event_endtime = $("#event_endtime").val();
	var event_description = $("#event_desciption").val(); 
	var shareeventonwall = $("#share_on_wall").val();
	var guestcanpost = $("#guest_post").val();
	var guestcaninvite = $("#guest_invite").val();
	var eventtype = $("#myeventtype").val();
	var eventCover = $("#myeventcover").val();
    var data = "f=" + category +'&e_name='+encodeURIComponent(event_name)+'&e_loc='+encodeURIComponent(event_location)+'&e_start='+event_startday+'&e_end='+event_endday+'&e_st='+event_starttime+'&e_et='+event_endtime+'&e_desc='+encodeURIComponent(event_description)+'&e_sharewall='+shareeventonwall+'&e_gcanpost='+guestcanpost+'&e_caninvite='+guestcaninvite+'&e_type='+eventtype+'&e_co='+eventCover;
    $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
        $("body").append(preLoaderPopUp);
      },
      success: function(response) {
		  if(response != '200'){
		       window.location.href = requestUrl+'event/'+response;  
		  }else{ 
		      setTimeout(function() {
				  $("#postPopUpBox").addClass("poSBoxContainerHide"); 
			  }, 600);
			 $(".news_post_create").removeClass("changeTheSize");
			 $(".createNewPost_two").removeClass("createNewPost_two_change");
			 $(".ppos_modal").hide(); 
		  } 
      }
    });
  });
  $("body").on("click",".ccev", function(){
       var val = $(this).val();
	   if(val == '0'){
	       $(this).val("1");
	   }else{
	       $(this).val("0");
	   } 
  });
   // Open Event Lists
  $("body").on("click", ".ev_ctgry", function() {
    var category = $(this).attr("data-type");
    var data = "f=" + category;
    $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
        $(".peepr-drawer").append(preLoaderPopUp);
      },
      success: function(response) {
        setTimeout(function() {
          $("#postPopUpBox").addClass("poSBoxContainerHide");
          $(".peepr-body").append(response);
          setTimeout(function() {
            $(".popUpPreLoaderWrap").remove();
			 AutoTiseTextArea();
          }, 500);
        }, 600); 
      }
    });
  });
  $("body").on("click",".closeevList", function(){
      $(".event_list_container").addClass("closeSocial");
	   setTimeout(function() {
            $(".event_list_container").remove();
		    $(".event_list_back").remove();
          }, 500);
  });
  $("body").on("click",".event_item_details", function(){
     var ID = $(this).attr("id");
	 var key = $(this).attr("data-key");
     var src = $("#img_icon_"+ID).children('img').attr('src'); 
     $(".selected_event").attr("src", src);
	 $(".event_name").html(key);
     $("#myeventtype").val(ID);
  }); 
  // Select Event Cover and Show it 
   $("body").on("click", ".cover_jjzlbU", function(){ 
       var bgImage = $(this).css("background-image");
	   var ID = $(this).attr("id");
	   $(".selected_event_cover").css("background-image", bgImage);
	   $(".event_selected").show();
	   $("#myeventcover").val(ID);
	   $(".chooseEventCover").hide();
   });
   // Remove Event Cover and hide it 
   $("body").on("click", ".removeThiseventCover", function(){  
	   $(".selected_event_cover").css("background-image", '');
	   $(".event_selected").hide();
	   $("#myeventcover").val('');
	   $(".chooseEventCover").show();
   });
   // Show Liked Users
	$("body").on("click",".inviteyourfriends", function(){
	          var t = $(this).attr("data-type");  
			  var eventid = $(this).attr("data-id");
		      var data = 'f='+t+'&evid='+eventid;
			  $.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   //$(".changeBgAudioButtonForms").append(TumblrStyleLoaderCss);
			   },
			   success: function(response) { 
				    if(response){
					     $("body").append(response); 
						 byScroll();
					}
			   }
		   }); 
	});
    // Invite User
	$("body").on("click", ".inviteu", function(){ 
		  var type = 'inviteUserThisEvent';
		  var ID = $(this).attr("data-id"); // Event User ID
		  var eventID = $(this).attr("data-event"); // Event ID
		  var title = $(this).attr("title");
		  var data = 'f='+type+'&user='+ID+'&ev='+eventID;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/activity',
			   dataType: "json", 
			   data: data, 
			    cache: false,
			   beforeSend: function(){
			        $("#sgu"+ID).prepend("<div class='prog-colm-which panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response) { 
				     $(".prog-colm-which").remove();   
					 var wrong = response.error; 
					 if(wrong){
					     M.toast({html: wrong , classes: 'warning'});
					 }else{
						 var sum = response.totalinvitesUsers;
						 var evid = response.event_id;
						 var userid = response.id;
						 var inviteStatus = response.status;
						 $(".event__"+evid).html(sum); 
						 if(title == 'invite'){
						    $("#in_e_"+ID).removeClass("blue").addClass("blue-grey");
							$("#in_e_"+ID).attr("title", "invited");
						 }else if(title == 'invited'){
						    $("#in_e_"+ID).removeClass("blue-grey").addClass("blue");
							$("#in_e_"+ID).attr("title", "invite");
						 }
						 $("#in_e_"+ID).html(inviteStatus);
					 }
			   }
		   }); 
     }); 
	 
  $("body").on("click", ".devent", function(){
       var postID = $(this).attr("id");
	  var thePopUpType = $(this).attr("data-type");
	  var creator = $(this).attr("data-id");//Get Comment UserName  
	  var popUpComment = 'popUp='+thePopUpType+'&pid='+postID+'&punm='+creator;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/popups',
		  data: popUpComment,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  $("body").append(html);
		  }
		});
  });
	 $("body").on("click", ".deleteevent", function(){
		   var type = 'deleteThisEvent';
		   var dataCreatorID = $(this).attr('data-post');
		   var eventID = $(this).attr("id");
		   var data = 'f='+type+'&thisEvent='+eventID;
		   $.ajax({
			   type: "POST",
			   url: requestUrl + "requests/activity", 
			   data: data,
			   cache: false,
			   beforeSend: function() {
				   $("body").append(preLoaderPopUp);
			   },
			   success: function(response) { 
			        if(response != '200' || !$.trim(response)){ 
					    window.location.href = requestUrl;   
					}else{
					    $(".popUpPreLoaderWrap").remove(); 
					}
				    
			   }
		   }); 
     });
  // Search User 
  $('body').delegate('#invite_friends', 'keyup', function() {
    var box = $('#invite_friends').val();
	var id = $(this).attr("data-id");
    contentbox = $.trim(box);
    var dataString = 'keys=' + contentbox+'&id='+id;
    if (contentbox !== '') {
      $.ajax({
        type: "POST",
        url: requestUrl + "requests/searchfriend",
        data: dataString, 
        cache: false,
        beforeSend: function() {},
        success: function(data) {
			if(data){
			     $("#friends_box_").html(data).show(); 
			}else{
			     $("#friends_box_").html('').hide(); 
			} 
        }
      });
    }else{
	    $("#friends_box_").html('').hide(); 
	}
  }); 
     // Open EventID
  $("body").on("click", ".edit_event", function() {
    var category = $(this).attr("data-type");
	var eventID = $(this).attr('id');
    var data = "f=" + category+'&eventID='+eventID;
    $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
        $("body").append(preLoaderPopUp);
      },
      success: function(response) {
		  $('body').addClass('disableScroll'); 
        setTimeout(function() {
          $("#postPopUpBox").addClass("poSBoxContainerHide");
          $("body").append(response);
          setTimeout(function() {
            $(".popUpPreLoaderWrap").remove();
			 AutoTiseTextArea();
          }, 500);
        }, 600);  
		 $(".ppos_modal").hide(); 
      }
    });
  });
    // Create New Event      
  $("body").on("click", ".update_e", function() {
    var category = $(this).attr("data-type"); 
	var eventID = $('#e_posts').attr('data-ev');
	var event_name = $("#event_name").val();
	var event_location = $("#event_location").val();
	var event_startday = $("#event_startday").val();
	var event_starttime = $("#event_starttime").val();
	var event_endday = $("#event_endday").val();
	var event_endtime = $("#event_endtime").val();
	var event_description = $("#event_desciption").val();
	var userCanShareEvent = $('#share_on_wall').val();
	var userCanCreatePost = $('#can_create_post').val();
	var userCanInviteFriends = $('#guest_invite').val();
	var userCanCreateText = $('#can_share_text').val();
	var userCanCreateImage = $('#can_create_image').val();
	var userCanCreateVideo = $('#can_create_video').val();
	var userCanCreateAudio = $('#can_create_audio').val();
	var userCanCreateFilterImage = $('#can_create_filter_image').val();
	var userCanCreateLocation = $('#can_create_location').val();
	var userCanCreateGif = $('#can_create_gif').val();
	var userCanCreateLink = $('#can_create_link').val();
	var userCanCreateWaterMark = $('#can_create_watermark').val();
	var userCanCreateBenchMark = $('#can_create_benchmark').val();
	var eventtype = $("#myeventtype").val();
	var data = "f=" + category +'&e_name='+encodeURIComponent(event_name)+'&e_loc='+encodeURIComponent(event_location)+'&e_start='+event_startday+'&e_end='+event_endday+'&e_st='+event_starttime+'&e_et='+event_endtime+'&e_desc='+encodeURIComponent(event_description)+'&e_share='+userCanShareEvent+'&e_createPost='+userCanCreatePost+'&e_inviteUser='+userCanInviteFriends+'&e_createText='+userCanCreateText+'&e_createImage='+userCanCreateImage+'&e_createVideo='+userCanCreateVideo+'&e_createAudio='+userCanCreateAudio+'&e_createFilter='+userCanCreateFilterImage+'&e_createLocation='+userCanCreateLocation+'&e_createGif='+userCanCreateGif+'&e_createLink='+userCanCreateLink+'&e_createWatermark='+userCanCreateWaterMark+'&e_createBenchMark='+userCanCreateBenchMark+'&e_type='+eventtype+'&eventID='+eventID; 
    $.ajax({
      type: "POST",
      url: requestUrl + "requests/activity",
      data: data,
      beforeSend: function() {
        $("body").append(preLoaderPopUp);
      },
      success: function(response) {
		  $('body').removeClass('disableScroll'); 
		  if(response != '200'){
		    location.reload();  
		  }else{ 
		      setTimeout(function() {
				  $("#postPopUpBox").addClass("poSBoxContainerHide"); 
			  }, 600);
			 $(".news_post_create").removeClass("changeTheSize");
			 $(".createNewPost_two").removeClass("createNewPost_two_change");
			 $(".ppos_modal").hide(); 
		  } 
      }
    });
  });
  // User Going or Interested
   $("body").on("click", ".i_going", function(){
      var type = $(this).attr('data-type');
	  var eventID = $('#e_posts').attr('data-ev');
	  var data = 'f='+type+'&e_e='+eventID; 
	  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/activity',
			   dataType: "json", 
			   data: data, 
			    cache: false,
			   beforeSend: function(){
			        $("#goin").prepend("<div class='prog-colm-which panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
					$("#goin"+eventID).prepend("<div class='prog-colm-which panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){  
			       $('.prog-colm-which').remove();
				   var theStatus = response.status;
				   var error = response.error;
				   var totalGoingUser = response.totalGoing;
				   var totalInterested = response.totalInterested;
				   var userinterest = response.interest; 
				   var ugo = response.ugo;
				   if(theStatus){ 
				        $('.eventg__'+eventID).html(totalGoingUser);
						$('.eventi__'+eventID).html(totalInterested); 
						if(type == 'ugoing'){ 
						    $(".the_g_"+eventID).attr("data-type",'dgoing').html(theStatus);
							$(".the_i_"+eventID).attr("data-type",'uinterested').html(userinterest);  
						}else if(type == 'dgoing'){ 
						    $(".the_g_"+eventID).attr("data-type",'ugoing').html(theStatus);  
							$(".the_i_"+eventID).attr("data-type",'uinterested').html(userinterest);
						}
						if(type == 'uinterested'){
						   $(".the_i_"+eventID).attr("data-type",'duinterested').html(theStatus); 
						   $(".the_g_"+eventID).attr("data-type",'ugoing').html(ugo);  
						}
						if(type == 'duinterested'){
						    $(".the_i_"+eventID).attr("data-type",'uinterested').html(theStatus); 
						   $(".the_g_"+eventID).attr("data-type",'ugoing').html(ugo);  
						}
				   }else if(error){
				       alert(error);
				   }
			   }
	  });
   }); 
  // User Going or Interested
   $("body").on("click", ".i_i_going", function(){
      var type = $(this).attr('data-type');
	  var eventID = $(this).attr('data-ev');
	  var data = 'f='+type+'&e_e='+eventID; 
	  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/activity',
			   dataType: "json", 
			   data: data, 
			   cache: false,
			   beforeSend: function(){ 
					$("#goin"+eventID).prepend("<div class='prog-colm-which panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(response){  
			       $('.prog-colm-which').remove();
				   var theStatus = response.status;
				   var error = response.error; 
				   var userinterest = response.interest; 
				   var ugo = response.ugo;
				   if(theStatus){  
						if(type == 'ugoing'){ 
						    $(".the_g_"+eventID).attr("data-type",'dgoing').html(theStatus);
							$(".the_i_"+eventID).attr("data-type",'uinterested').html(userinterest);  
						}else if(type == 'dgoing'){ 
						    $(".the_g_"+eventID).attr("data-type",'ugoing').html(theStatus);  
							$(".the_i_"+eventID).attr("data-type",'uinterested').html(userinterest);
						}
						if(type == 'uinterested'){
						   $(".the_i_"+eventID).attr("data-type",'duinterested').html(theStatus); 
						   $(".the_g_"+eventID).attr("data-type",'ugoing').html(ugo);  
						}
						if(type == 'duinterested'){
						    $(".the_i_"+eventID).attr("data-type",'uinterested').html(theStatus); 
						   $(".the_g_"+eventID).attr("data-type",'ugoing').html(ugo);  
						}
				   }else if(error){
				       alert(error);
				   }
			   }
	  });
   }); 
   // Share Event From Profile
   $("body").on("click", ".shareonwall", function(){
	   var  type = $(this).attr('data-type');
	   var eventID = $(this).attr('data-id');   
	   var data = 'f='+type+'&event='+eventID;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() {
			$("#making").prepend("<div class='prog-colm-which panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
		  },
		  success: function(response) {
	           $('.prog-colm-which').remove(); 
			   if(response){
				   M.toast({html: '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g id="Layer_1"><g><g fill="#32bea6"><g><g><g><g><g><g><path d="M189.0375,96c0,-51.375 -41.6625,-93.0375 -93.0375,-93.0375c-51.375,0 -93.0375,41.6625 -93.0375,93.0375c0,51.375 41.6625,93.0375 93.0375,93.0375c51.375,0 93.0375,-41.6625 93.0375,-93.0375z"></path></g></g></g></g></g></g></g><g fill="#ffffff"><g><path d="M147.225,64.8375c-2.175,-5.6625 -6.6375,-4.7625 -11.475,-3.7875c-2.8875,0.6 -15.75,4.35 -36.0375,25.8c-8.4375,8.8875 -13.9875,15.975 -17.6625,21.375c-2.25,-2.7375 -4.8,-5.7 -7.5,-8.3625c-8.2875,-8.2875 -17.55,-13.9875 -17.925,-14.2125c-3.8625,-2.3625 -8.925,-1.1625 -11.325,2.7375c-2.3625,3.8625 -1.1625,8.925 2.7,11.325c0.075,0.0375 8.025,4.95 14.85,11.8125c6.975,6.975 13.3125,16.425 13.3875,16.5375c1.5375,2.325 4.125,3.675 6.8625,3.675c0.45,0 0.9375,-0.0375 1.425,-0.1125c3.225,-0.5625 5.775,-2.9625 6.5625,-6.1125c0.0375,-0.075 3.3,-9.1125 20.5125,-27.2625c13.875,-14.6625 23.1375,-19.3125 26.3625,-20.5875c0.0375,0 0.0375,0 0.1125,0c0,0 0.1125,-0.0375 0.3,-0.15c0.5625,-0.225 0.8625,-0.3 0.8625,-0.3c-0.15,0.0375 -0.225,0.0375 -0.225,0.0375v-0.0375c1.5,-0.6375 4.275,-1.8375 4.3125,-1.875c4.1625,-1.8 5.55,-6.3 3.9,-10.5z"></path></g></g></g></g></g></svg>' , classes: 'rounded'});
			   }
	      } 
	  });
   });
    // Make Default Custom Profile Color
   $("body").on("click", ".bmg", function(){
	   var  type = $(this).attr('data-type'); 
	   var data = 'f='+type;
	   $.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() {
			$("body").append(preLoaderPopUp);
		  },
		  success: function(response) { 
			    $("#postPopUpBox").remove(); 
				setTimeout(function() {
				  location.reload();  
			    }, 600);
	      } 
	  });
   });   
// Whatsapp Style Youtube Video Player Open 
$("body").on("click",".emyt", function(){
    var videoKey = $(this).attr("data-ytkey"); 
	var type = 'expanded';
	var data = 'f='+type+'&exid='+videoKey;
	$.ajax({
		  type: "POST",
		  url: requestUrl + "requests/activity",
		  data: data,
		  beforeSend: function() { 
			    if (!$('body').hasClass('embedVideo') ) {
				$(".embedVideo").addClass('closeVideoEmbed');
				setTimeout(function() {
				 $(".embedVideo").remove();
				}, 390);}
		  },
		  success: function(response) { 
		  $(".embedVideo").addClass('closeVideoEmbed');
		  setTimeout(function() {
			  if (!$('body').hasClass('embedVideo') ) {
				$("body").append(response);   
			  }
		 }, 390);  
		  if(!response){
		      $('.note_13').show();
			  setTimeout(function() {
				 $(".note_13").hide();
				}, 8000); 
		  }  
	      } 
	  }); 
});  
$("body").on("click",".close_frame", function(){
    $(".embedVideo").addClass('closeVideoEmbed');
	setTimeout(function() {
	 $(".embedVideo").remove();
	}, 500);
}); 
 
$("body").on("click",".resharepost", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val(); 
	   var text = $("#hashTag").val();  
	   var type = $(this).attr('data-type');
       var reSharePost = $("#resharep").attr("data-id");
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();  
	      var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&shi='+reSharePost;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/activity',
			   data: dataNewImage, 
			   beforeSubmit: function(){
				    $('body').addClass('disableScroll'); 
			        $(".postNewsFeed").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(html){
				   $('body').removeClass('disableScroll'); 
				   $(".prog-colm , .share-modal-overlay , .share-modal").remove();
			       $(".postNewsFeed").prepend(html);
				   $(".poSBoxContainer").remove(); 
				   if ($(".noPost").length > 0) {
                          $(".noPost").remove();
                   }
				    setTimeout(function() {
					   $('.newWarning').remove();
                  }, 3000); 
			   }
		   }); 
  });
$("body").on("click",".ch_feeling", function(){
   var type = 'feelings';
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: 'f='+type, 
	   beforeSubmit: function(){ 
	   },
	   success: function(response){
		    if(response){
			    $("body").append(response);
			}
	   }
   });
}); 
$("body").on("click",".categories", function(){
   var type = $(this).attr("data-type");
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: 'f='+type, 
	   beforeSubmit: function(){ 
	   },
	   success: function(response){
		    if(response){
			    $("body").append(response);
			}
	   }
   });
});
$("body").on("click",".mslct", function(){
   var ID = $(this).attr('data-id');
   var name = $(this).attr('data-category');
   $('.categories').html(name);
   $('#prcat').val(ID);
   $(".social_share_buttons_container").addClass("closeSocial");
   setTimeout(function() {
		$(".social_share_buttons_container").remove();
		$(".fixedBackground").remove();
    }, 500);
});
$("body").on("click",".dCJp8tr", function(){
   var type = 'translateme';
   var ID = $(this).attr("data-post"); 
   var translateText = $(".post_info"+ID).attr("data-trl");
   var translateTitle = $("#post_title"+ID).attr("data-trl");
   var data = 'f='+type+'&text='+translateText+'&text_title='+translateTitle;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){ 
	       $(".post_info"+ID).addClass("theTransLateAnimation");
		   $(".theTit_"+ID).addClass("theTransLateAnimation");
	   },
	   success: function(response){
		   var textDescription = response.text;
		   var textTitle = response.title;
		    if(response){
			    $(".post_info"+ID).html(textDescription);
				$(".theTit_"+ID).html(textTitle);
			}
			$(".post_info"+ID).removeClass("theTransLateAnimation");
		    $(".theTit_"+ID).removeClass("theTransLateAnimation");
	   }
   });
});
  // Save Image Post from Data
  $("body").on("click",".share_product", function(){
       var productPrice = $("#p_price").val(); // Product Price
	   var productTitle = $("#product_title").val();
	   var productDescription = $("#product_description").val(); 
	   var productCategory = $("#prcat").val();  
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#uploadvalues").val(); 
	   var productPlace = $('#place').val();
	   var productMessageStatus = $('#ms').val(); 
	   if(productCategory.length === 0){
		   $('.w__category').show();
	       return false;
	   }else{$('.w__category').hide();}
	   if(productPrice.length === 0){
		   $('.w__price').show();
	       return false;
	   }else{$('.w__price').hide();}
	   if(productTitle.length === 0){
		   $('.w__title').show();
	       return false;
	   }else{$('.w__title').hide();}
	   if(productDescription.length === 0){
		   $('.w__description').show();
	       return false;
	   }else{$('.w__description').hide();}
	   if(UploadedImageValues.length === 0){
	       $('.product_Image_btn').addClass('warning_photo_note');
	       return false;
	   }else{$('.product_Image_btn').removeClass('warning_photo_note');}
	   var dataNewImage = 'ppric=' + encodeURIComponent(productPrice) + '&pti='+ encodeURIComponent(productTitle) + '&prid=' + encodeURIComponent(productDescription) + '&prCat=' + productCategory +'&uploads='+UploadedImageValues+'&mpro='+type+'&mstatus='+productMessageStatus+'&place='+productPlace;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){
			      $("#new_posts").prepend("<div class='prog-colm panel-flex'><div class='prog-bar-colm'><div class='progressmi'><span class='indeterminatespost'></span></div></div></div>");
			   },
			   success: function(html){ 
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer").remove();  
					    $(".prog-colm").remove();  
					    $("#new_posts").prepend(html); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }  
			   }
		   }); 
  });
// Send Question To seller
$("body").on("click",".f_p_q", function(){
	var type = 'fastProductQuestion';
    var QuestionID = $(this).attr("data-question");
	var Product = $(this).attr("data-product");
	var ProductOwnerID = $(this).attr("data-poid");
	var data = 'f='+type+'&qid='+QuestionID+'&proID='+Product+'&own='+ProductOwnerID;
	$.ajax({
		 type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data, 
		 beforeSend: function(){
			 $(".fastQuestions").addClass("theTransLateAnimation");
		 },
		 success: function(html){ 
		    $(".fastQuestions").removeClass("theTransLateAnimation");
			 $("body").append(html);
			 setTimeout(function() {
				 $('.sndsucc').hide();
             }, 5000); 
		 }
   }); 
});
// Search Product  
  function searchProduct(){
      $('#search_product').bind('keydown', function(e) {
		  var key = e.which || e.keyCode || 0; 
           if (key == 13) {
		       var searchValue = $("#search_product").val();
			    var type = 'search_product';
	            var data = 'f='+type+'&title='+searchValue;
				$.ajax({
						 type: 'POST',
						 url: requestUrl + 'requests/activity',
						 data: data, 
						 beforeSend: function(){ 
						 },
						 success: function(html){ 
							  window.location.href = requestUrl + 'marketplace/search/'+html; 
						 }
				   }); 
			} 
	  });
  }
  searchProduct();
$("body").on("click","#searchproduct", function(){
	var searchValue = $("#search_product").val();
	var type = 'search_product';
    var data = 'f='+type+'&title='+searchValue;
				$.ajax({
						 type: 'POST',
						 url: requestUrl + 'requests/activity',
						 data: data, 
						 beforeSend: function(){ 
						 },
						 success: function(html){ 
							  window.location.href = requestUrl + 'marketplace/search/'+html; 
						 }
				   }); 
}); 
// Save Image Post from Data
  $("body").on("click",".share_bfaf", function(){
       var postTitle = $("#title").val();
	   var postDetails = $("#details").val();
	   var whois = $("#who").attr("data-see");
	   var text = $("#hashTag").val(); 
	   var feeling = $("#f_val").val();
	   //ReGex for HashTag
	   text = XRegExp.replaceEach(text, [
        [/#\s*/g, ""],
        [/\s{2,}/g, " "],
        [XRegExp("(?:\\s|^)([\\p{L}\\p{N}]+)(?=\\s|$)(?=.*\\s\\1(?=\\s|$))", "gi"), ""],
        [XRegExp("([\\p{N}\\p{L}]+)", "g"), "#$1"]
      ]);
	  $('#hashTag').val(text);
	   var tags = $("#hashTag").val();
	   var type = $(this).attr("data-type");
	   var UploadedImageValues = $("#whUploads").val(); 
	   var dataNewImage = 'title=' + encodeURIComponent(postTitle) + '&details='+ encodeURIComponent(postDetails) + '&tags=' + tags + '&f=' + type + '&show='+whois+'&uploads='+UploadedImageValues+'&myFeeling='+feeling;
		  $.ajax({
			   type: 'POST',
			   url: requestUrl + 'requests/event',
			   data: dataNewImage, 
			   beforeSubmit: function(){$("body").append(preLoaderPopUp);},
			   success: function(html){
				   $('body').removeClass('disableScroll'); 
				        $(".poSBoxContainer , .fixedBackground , .crop-avatar-container").remove();  
					    $(".prog-colm").remove();  
					        $("#new_posts").prepend(html); 
							 if ($(".noPost").length > 0) {
								 $(".noPost").remove();
							 }    
			   }
		   }); 
  }); 
/*Send Email Verification Again*/
$("body").on("click",".verification_send_again", function(){
    var f = 'v_mail';
	var data = 'f='+f;
	$.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){
	       $(".vc").append('<span style="position:absolute;width:100%;height:100%;left:0px;right:0px;top:0px;z-index:2;" class="blue skel"><span class="Knight-Rider-loader animate"><span class="Knight-Rider-bar"></span><span class="Knight-Rider-bar"></span><span class="Knight-Rider-bar"></span></span></span>');
	   },
	   success: function(html){
			setTimeout(function() {
               $(".skel").remove();
			   $(".vc , .verification_not_yet_note").hide();
			   $('.verification_not_yet_con').append(html);
            }, 3000); 
	   }
   }); 
});
/*Post Buttons Open*/
$("body").on("click","#new_post_create", function(){
   var f = 'new_post_create';
   var data = 'f='+f;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){ },
	   success: function(html){
			 $("body").append(html);
	   }
   }); 
});
/*Donate Amount Box*/
$("body").on("click",".mamount", function(){
    var type = 'donateFrm';
	var postID = $(this).attr('data-donateid');
    var post_o_i = $(this).attr('data-u');
    var data_type = $(this).attr('data-type');
    var data = 'f='+type+'&donateThis='+postID+'&donateThisu='+post_o_i+'&ty='+data_type;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){ },
	   success: function(html){
			 $("body").append(html); 
	   }
   }); 
});
/*Post Buttons Open*/
$("body").on("click",".donate_post_amnt", function(){
   var f = 'choosepament';
   var postID = $(this).attr('data-donateid');
   var post_o_i = $(this).attr('data-u');
   var data_type = $(this).attr('data-type');
   var donateAmount = $('#ydamnt').val();
   if(!donateAmount.length === 0){
        var vals = donateAmount.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');
		if(!vals){
			$('#ydamnt').val('');
		    return false;
		}
   }
   var data = 'f='+f+'&pd='+postID+'&u='+post_o_i+'&ty='+data_type+'&amnt='+donateAmount;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){ },
	   success: function(html){
			 $("body").append(html);
			 setTimeout(function() {
                $('.payment_gateway_list_box').removeClass('methods_open_animate');
             }, 900); 
	   }
   }); 
});
/*Post Buttons Open*/
$("body").on("click",".donate_post", function(){
   var f = 'choosepament';
   var postID = $(this).attr('data-donateid');
   var post_o_i = $(this).attr('data-u');
   var data_type = $(this).attr('data-type'); 
   var donateAmount = '';
   var data = 'f='+f+'&pd='+postID+'&u='+post_o_i+'&ty='+data_type+'&amnt='+donateAmount;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){ },
	   success: function(html){
			 $("body").append(html);
			 setTimeout(function() {
                $('.payment_gateway_list_box').removeClass('methods_open_animate');
             }, 900); 
	   }
   }); 
});
$("body").on("click",".methods_close", function(){ 
  $('.payment_gateway_list_box  , .anm').addClass('methods_close_animate');
   setTimeout(function() {
       $('.payment_gateways_fix , .popupBack , .anm').remove();
   }, 750); 
   $(".pro_member_ss , .uinfo_wrapper_ss").addClass("uinfSlideOutDown"); 
	setTimeout(function() {
		 $(".pro_member_ss , .popupBack  , .uinfo_wrapper_ss").remove();
   }, 900); 
});
/*$("body").on("click",".method_box", function(){ 
    var methodType = $(this).attr("data-type");
	var f = 'payment';
	var data = 'f='+f+'&met='+methodType;
	 $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){ },
	   success: function(html){
			 $("body").append(html); 
	   }
   }); 
});*/

///////////*****************//////////////
   $("body").on("click", ".float_video_c", function(){
	    var ID = $(this).attr("data-id");
		var width = $("#videobox"+ID).width();
        var height = $("#videobox"+ID).height(); 
		if ($(".floated_video_container").length > 0){
		  $(".videoPlayr").removeClass("floated_video_container"); 
		  $(".column-video").removeClass("put_it_Bag");
		  $(".putitbagtext").remove();
		} 
		setTimeout(function() {
        $("#videoPlayer"+ID).addClass("floated_video_container"); 
		   $("#videobox"+ID).css({  
			  width:width, 
			  height: height
		  }); 
		  $("#videobox"+ID).addClass("put_it_Bag").append('<div class="putitbagtext"><div class="icon_utuNew putitbackicon"></div><div class="putitbacktext">Put it back</div></div>');
		  setTimeout(function() {
            $(".floated_video_container").append('<div class="float_video_cl icon_utuNew" data-id="'+ID+'"></div>');
          }, 500);
		  }, 100);
   });
   $("body").on("click",".float_video_cl , .put_it_Bag", function(){
	    var ID = $(this).attr("data-id");
        $("#videoPlayer"+ID).removeClass("floated_video_container");
		$(".float_video_cl , .putitbagtext").remove();
		$(".column-video").removeClass("put_it_Bag");
		$(".putitbagtext").remove(); 
   });
 
$("body").on("click", ".leftMenuBtn , .menuPopUpBackBox , .backtoleftMini", function() {  
	if ($(".leftSidebarHide")[0]) {
        $('.leftSidebar').removeClass('leftSidebarHide');
		$("body").append("<div class='menuPopUpBackBox'></div>");
    }else{  
	     $('.leftSidebar').addClass('leftSidebarHide');
		 $(".menuPopUpBackBox").remove();
	}
  }); 
 
	//Open Post buttons
	$("body").on("click", ".createNewPost_two , .mdopcl",function(){
	     $(".news_post_create").addClass("changeTheSize");
		 $(".createNewPost_two").addClass("createNewPost_two_change");
		 $(".ppos_modal").fadeIn(); 
	});
	// CALCULATE EARNİNGS
	$("body").on("click",".calcul",function(){
		 var f = 'calculate_earning';
	   $.ajax({
			type: 'POST',
			   url: requestUrl + 'requests/activity',
			   dataType: "json", 
			   data: 'f='+f,
			    cache: false,
			   beforeSend: function(){
			        $(".cclod , .total_earnings_for_withdrawal").append('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
			   }, 
			success: function(response) {
				$('.progress_blue').remove();
				if(response){
				    $('.calculate_currency').show(); 
					//One to USD 
					var onetrytousd = response.one_try_usd;
					var totaltryusd = response.total_try_usd;
					var onengntousd = response.one_ngn_usd;
					var totalngnusd = response.total_ngn_usd;
					var oneinrtousd = response.one_inr_usd;
					var totalinrusd = response.total_inr_usd;
					var dolarearning = response.dolar_earning;
					var usdtouse = response.usd_to_usd;
					var calculatedTotalDolar = response.total_e;
					  if(onetrytousd){
					      $("#try_one_usd").html(onetrytousd);
					  }
					   if(totaltryusd){
					      $("#try_one_usd_earning").html(totaltryusd);
					  }
					  if(onengntousd){
					      $("#ngn_one_usd").html(onengntousd);
					  }
					   if(totalngnusd){
					      $("#ngn_one_usd_earning").html(totalngnusd);
					  }
					  if(oneinrtousd){
					      $("#inr_one_usd").html(oneinrtousd);
					  }
					   if(totalinrusd){
					      $("#inr_one_usd_earning").html(totalinrusd);
					  }
					   if(dolarearning){
					      $("#usd_one_usd").html(dolarearning);
					  } 
					  if(usdtouse){
					      $("#usd_one_usd_earning").html(usdtouse);
					  } 
					  if(calculatedTotalDolar){
					      $("#total_e").html(calculatedTotalDolar);
					  }
				}
			}
	   });
	}); 
// make a Withdrawal with PayPal Email
$("body").on("click",".makeWithdrawAm", function(){
   var f = 'paypalwithdrawal';
   var paypal_email = $("#paypal_email").val();
   var amountP =  $(".paypalamount").val(); 
   var data = 'f='+f+'&paypalEmail='+encodeURIComponent(paypal_email)+'&amountPaypal='+ amountP;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      $(".inob").prepend('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
	   },
	   success: function(response){
		     $('.progress_blue').remove();
			 if(response){
		         var notCorrectAmount = response.not_valid_amount;
				 var notCorrectEarningAmount = response.amount_les_then_earns;
				 var notvalidEmail = response.email_not_valid;
				 var success = response.success;
				 var missing = response.missing;
				 var minimum = response.minimum;
				 var remaininMoney = response.remaining;
				 if(notCorrectAmount){
				    $('.err_amount').after(notCorrectAmount);
				 }
				 if(notCorrectEarningAmount){
				    $('.err_amount').after(notCorrectEarningAmount);
				 }
				 if(notvalidEmail){
				    $('.err_email').after(notvalidEmail);
				 }
				 if(missing){
				    $('.missinginfos').after(missing);
				 }
				 if(minimum){
				    $('.err_amount').after(minimum);
				 }
				 if(success){
				    $('.succe').before(success);
				 }
				 if(remaininMoney){
				     $('.total_e').html(remaininMoney);
				 }
				 setTimeout(function() {
					$(".err_report, succ_report").remove();
				  }, 3000);
			 }
	   }
   }); 
});
// Make a Withdrawal with IBAN Number
$("body").on("click",".makeWithdrawIban", function(){
	var f = 'ibanwithdrawal';
   var iban = $("#ibanNumber").val();
   var amountP =  $("#payiban_amount").val(); 
   var data = 'f='+f+'&iban='+iban+'&payamount='+ amountP;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      $(".inob").prepend('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
	   },
	   success: function(response){
		     $('.progress_blue').remove();
			 if(response){
		         var notCorrectAmount = response.not_valid_amount;
				 var notCorrectEarningAmount = response.amount_les_then_earns;
				 var notvalidEmail = response.email_not_valid;
				 var success = response.success;
				 var missing = response.missing;
				 var minimum = response.minimum;
				 var remaininMoney = response.remaining;
				 if(notCorrectAmount){
				    $('.err_iamount').after(notCorrectAmount);
				 }
				 if(notCorrectEarningAmount){
				    $('.err_iamount').after(notCorrectEarningAmount);
				 }
				 if(notvalidEmail){
				    $('.err_iban').after(notvalidEmail);
				 }
				 if(missing){
				    $('.missinginfosi').after(missing);
				 }
				 if(minimum){
				    $('.err_iamount').after(minimum);
				 }
				 if(success){
				    $('.succei').before(success);
				 }
				 if(remaininMoney){
				     $('.total_e').html(remaininMoney);
				 }
				 setTimeout(function() {
					$(".err_report, succ_report").remove();
				  }, 3000);
			 }
	   }
   });
}); 
// Left Right
$("body").on("click", ".how_to_left", function(){
    $(".peepr-drawer-container").addClass("position_left");
	$(this).addClass("left_open");
	$('.how_to_right_close').hide();
	$('.how_to_left_close').show();
	$(".how_to_right").addClass("right_open");
});
// Left Right
$("body").on("click", ".how_to_right", function(){
    $(".peepr-drawer-container").removeClass("position_left");
	$(".how_to_left").removeClass("left_open");
	$(".how_to_right").removeClass("right_open");
	$('.how_to_right_close').show();
	$('.how_to_left_close').hide();
});
$("body").on("click",".clshowto", function(){
      $(".peepr-drawer-container").addClass("drawer_close"); 
	     setTimeout(function() {
            $(".drawer peepr-drawer-container").remove(); 
          }, 900);  
});
$("body").on("click",".how_to_title", function(){
    var ID = $(this).attr("id");
	$("#answ"+ID).slideToggle("slow").css('display', 'inline-block');
});
// Convert Point To Dolar
$("body").on("click",".convertpoint", function(){
   var f = 'convertpointtodolar'; 
   var data = 'f='+f;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      $(".inob").prepend('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
	   },
	   success: function(response){ 
	       $('#ccm').remove();
		   if(response){
		       var likeSum = response.likSum;
			   var comSum = response.comSum;
			   var postSum = response.posSum;
			   var storySum = response.storSum;
			   var dolarSum = response.dlSum; 
			   var totalpoint = response.totpoint;
			   $("#point_sum").html(dolarSum);
			   $("#likePoint").html(likeSum);
			   $("#commentPoint").html(comSum);
			   $("#postPoint").html(postSum);
			   $("#storyPoint").html(storySum);  
			   $("#totpoint").html(totalpoint);
		   }
		    
	   }
   });
});
// Convert Point To Dolar
$("body").on("click",".transfermoneyfrombalance", function(){
   var f = 'transferbalance'; 
   var data = 'f='+f;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      $(".inob").after('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
	   },
	   success: function(response){ 
	        $('#ccm').remove();
		   if(response){
		       var transferSuccess = response.trsuccess; 
			   var remmoney = response.dlSum;
			   var notransfermoney = response.dlSumno; 
			    $("#remmon").html(remmoney);
				$("#point_sum").html(remmoney);
				if(notransfermoney){
				    M.toast({html: notransfermoney, classes: 'warning'});   
				}
				if(transferSuccess){
			    	M.toast({html: transferSuccess});  
				} 
		   }
		    
	   }
   });
});
/*Open Pro PopUp*/
$("body").on("click",".becomepro", function(){
    var type = 'promem';
	var data = 'f='+type;
	$.ajax({
		   type: 'POST',
		   url: requestUrl + 'requests/activity',
		   data: data, 
		   beforeSend: function(){ 
		   },
		   success: function(html){ 
				$("body").append(html);
		   }
	 }); 
});
$("body").on("click",".sep", function(){
      var setType = $(this).attr("data-type");
	  var setUser = $(this).attr("data-id");
	  var data= 'f='+setType+'&u='+setUser;
	  $.ajax({
			type: "POST",
			url: requestUrl + "requests/activity",
			data: data, 
			beforeSend: function(){ 
			   $(".no"+setUser).append('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
			},
			success: function(html) {
				$('#ccm').remove();
				if(html){ 
				   	 $("body").append(html);  
					 setTimeout(function() {
						$(".uinfo_wrapper_ss").removeClass("uinfSlideInUp");
					  }, 900); 
				}else{
				    
				}
			}
		}); 
});

$("body").on("click",".popupBack , .closeNewsinf", function(){
	$(".pro_member_ss , .uinfo_wrapper_ss").addClass("uinfSlideOutDown"); 
	setTimeout(function() {
		 $(".pro_member_ss , .popupBack  , .uinfo_wrapper_ss").remove();
   }, 900); 
   $(".social_share_buttons_container , .search_user_filter_container").addClass("closeSocial");
   setTimeout(function() {
            $(".social_share_buttons_container , .search_user_filter_container").remove();
		    $(".fixedBackground").remove();
    }, 500);  
});
/*Insert Product From Shopping Card*/
$("body").on("click",".addttCart", function(){
   var type = 'addToCard';
   var product = $(this).attr("data-id");
   var data = 'f='+type+'&product='+product;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      $("#post_info"+product).after('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
	   },
	   success: function(response){ 
	       $('#ccm').remove();
		   if(response){
		       var productAdded = response.productAdded;
			   var count = response.productCount;
			   var note = response.addedNote;
			   if(productAdded){
			        M.toast({html: note});  
					$('.cart_count').text(count);
			   }else{
			        M.toast({html: note, classes: 'warning'});   
			   }
		   }
		    
	   }
   });
});
/*Product Delete*/
$("body").on("click",".p_delete", function(){
    var type = $(this).attr("data-type");
	var id = $(this).attr("data-id");
	var data = 'popUp='+type+'&prid='+id;
	$.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/popups',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  $("body").append(html);
		  }
		});
});
/*Delete Product From Shopping Cart*/
$("body").on("click",".delete_this_prop", function(){
    var type = $(this).attr("data-type");
	var id = $(this).attr("id");
	var data = 'f='+type+'&prid='+id;
	$.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/activity',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  if(html == 1){
			      $("#cart_"+id).addClass("removeCom");
					 setTimeout(function() {
						 $("#cart_"+id).fadeOut("normal", function() {
								$(this).remove();
						 });  
				     }, 500);
					 $(".confirmBoxContainer").remove(); 
			  }
		  }
		});
});
/*Select Pay Method*/
$("body").on("click",".orm", function(){
   var type = 'select_payment_method';
   var prid = $(this).attr("data-id");
   var cid = $(this).attr("data-c");
   var cuid = $(this).attr("data-u");
   var data = 'f='+type+'&cpid='+prid+'&cid='+cid+'&u='+cuid;
   $.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/activity',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  if(html ){
			       $("body").append(html);
			  }
		  }
		});
});
/*Save Profile Shpping Information   spfulnam  spphon   spaddress*/
$("body").on("click",".shpin", function(){
    var type = $(this).attr("data-type");
	var ufnm = $("#shpfullname").val();
	var uphnm = $("#spphone").val();
	var upadr = $("#shpfulladdress").val();
	var personalID = $('#pidpsp').val();
	var userPostCode = $('#spstcd').val();
	var data = 'f='+type+'&spfulnam='+ufnm+'&spphon='+encodeURIComponent(uphnm)+'&spaddress='+encodeURIComponent(upadr)+'&pscdid='+userPostCode+'&personalid='+personalID;
	$.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/activity',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  M.toast({html: html});  
		  }
		});
});
/*Post Buttons Open*/
$("body").on("click",".pay_at_door", function(){
   var f = 'patatdoor';
   var postID = $(this).attr('data-donateid');
   var post_o_i = $(this).attr('data-u');
   var data_type = $(this).attr('data-type');
   var dataid = $(this).attr('data-id');
   var data = 'f='+f+'&pd='+postID+'&u='+post_o_i+'&ty='+data_type;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      
	   },
	   success: function(response){ 
			 $('.payment_gateway_list_box  , .anm').addClass('methods_close_animate');
			   setTimeout(function() {
				   $('.payment_gateways_fix , .popupBack , .anm').remove();
			   }, 750); 
			 if(response){
			      var notes = response.note;
				  var statusa = response.status;
				  if(statusa ==  1 ){
				         M.toast({html: notes});  
						 $('#tc__'+dataid).remove();
				  }
				  if(statusa ==  2 ){
			              $('.shopping_address').before(notes);
				  }
			  }
	   }
   }); 
});
$("body").on("click",".card-close", function(){
	$(".withdrawal_note").addClass('methods_close_animate');
	setTimeout(function() {
		 $('.withdrawal_note').remove();
    }, 750);  
});
/*Open Send Cargo Status From Customer*/
$("body").on("click",".senscargostat", function(){
    var customer = $(this).attr("data-cus");
	var cart = $(this).attr("id");
	var type = 'sendCargoStatus';
	var data = 'f='+type+'&cus='+customer+'&cart='+cart;
	$.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/activity',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) {
			  $("body").append(html);  
		  }
		});
});
/*Send Cargo Status From Customer*/
$("body").on("click",".inform_th_receipient", function(){
   var type = 'cargostatusupdate';
   var customerID = $(this).attr("data-id");
   var cartID = $(this).attr("id");
   var trackingNumber = $('#track_number').val();
   var selectedCargo = $("select#cargolti option").filter(":selected").val();
   var data = 'f='+type+'&cus='+customerID+'&cart='+cartID+'&cargo='+selectedCargo+'&tracking='+trackingNumber;
	$.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/activity',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(html) { 
				   if(html == 1){
					       $('.payment_gateway_list_box  , .anm').addClass('methods_close_animate');
						   setTimeout(function() {
							   $('.payment_gateways_fix , .popupBack , .anm').remove();
						   }, 750); 
				         $(".senscargostat"+cartID).remove();
						 M.toast({html: html});
				   } else{ 
					     M.toast({html: html , classes: 'warning'});  
				   }
		  }
     });
});
/*Ask customer product status*/
$("body").on("click",".askDeliveryStatus", function(){
    var type = 'askdeliverystat';
    var product = $(this).attr("id");
	var data = 'f='+type+'&prd='+product;
	$.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      
	   },
	   success: function(response){ 
	      if(response){
			    var sendStatus = response.status;
				var sendNote = response.note;
				if(sendStatus == 1){
				      M.toast({html: sendNote});    
					  $('.askDeliveryStatus'+product).remove();
				}else {
				      M.toast({html: sendNote});    
				}
		  }  
		  }
     });
});
/*Got product*/
$("body").on("click",".igotit", function(){
    var type = 'yesigotit';
    var product = $(this).attr("id");
	var data = 'f='+type+'&prd='+product;
	$.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   dataType: "json", 
	   data: data, 
	   beforeSend: function(){
	      
	   },
	   success: function(response){ 
	      if(response){
			    var sendStatus = response.status;
				var sendNote = response.note;
				if(sendStatus == 1){
				      M.toast({html: sendNote});    
					  $('.yesgotit'+product).remove();
				}else {
				      M.toast({html: sendNote});    
				}
		  }  
		  }
     });
});
$("body").on("click",".addinfos", function(){
   var ID = $(this).attr("id");
   if (!$("#add_infos"+ID).hasClass("add_infos")) {
      $("#add_infos"+ID).addClass("add_infos"); 
    } else { 
	  $("#add_infos"+ID).removeClass("add_infos"); 
    }
});
   // Open Close Advertisement
   $("body").on("click", ".onofprru", function() { 
    var type = $(this).attr("data-type");
    var value = $(this).val(); 
    var data = 'f='+type+ "&status=" + value;
    $.ajax({
      type: "POST",
      data: data,
      url: requestUrl + 'requests/activity',
      cache: false,
      beforeSend: function() {},
      success: function(response) {
        if (value == "0") {
          $(".onofprru").val("1");
        } else if (value == "1") {
          $(".onofprru").val("0");
        }
		M.toast({html: response});    
      }
    });
  });
  /*Change Private message open close*/
   $("body").on("click",".notChangePrivateMessage", function(){
	   var type = $(this).attr("post-type");
	   var type_two = $(this).attr("post-not");
	   var notChange = $(this).val();   
		   var dataNot = 'f='+type+'&not='+type_two+'&notit='+encodeURIComponent(notChange);
		   $.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: dataNot,
			  cache: false,
			  beforeSend: function() {
				  $("#"+type_two+"a").after('<span class="preloadCom" style="margin-top: -40px;"><span class="progress"><span class="indeterminate"></span></span></span>');
				  $('.notChangePrivateMessage').attr('disabled', true);
			  },
			  success: function(response) { 
				  setTimeout(function() {
					   $(".preloadCom").remove(); 
					   $('.notChangePrivateMessage').attr('disabled', false);
					}, 500); 
						 setTimeout(function() {
							if(notChange == '0'){
							   $("#"+type_two).val('1');
							}
							if(notChange == '1'){
							   $("#"+type_two).val('0');
							} 
						}, 600); 
				   $('#'+type_two+'a').before(response);
				   setTimeout(function() {
					    $('.newOk , .newWarning').remove();
					}, 2000); 
			  }
			});  
	});
 // Open Close Advertisement
   $("body").on("click", ".newMarket", function() { 
    var type = $(this).attr("data-type"); 
    var data = 'f='+type;
    $.ajax({
      type: "POST",
      data: data,
      url: requestUrl + 'requests/activity',
      cache: false,
      beforeSend: function() {},
      success: function(response) {
          $("body").append(response);   
      }
    });
  });
/*Create Market Username*/
$("body").on("keyup", ".cmname", function(){
	   var marketName = $(this).val();
	   $(".mrnm").text(marketName);
});
 // Just allow Number
  $(".cmname").livequery(function() {
    $(this).alphanum({
      allow: "_-",
      disallow: "!@$%^&*()+=[]\\';,/{}|\":<>?~`.",
      allowSpace: false,
      allowNumeric: true
    });
  });
/*Create Online market */
$("body").on("click",".createNew_marketStore",function(){
   var type = $(this).attr("data-type");
   var marketUrlName = $("#mrkt_name").val();
   var marketFullName = $("#mrkt_campn_name").val();
   var marketInformations = $("#about_market_store").val();
   var data = 'f='+type+'&urlname='+marketUrlName+'&mrktflnam='+marketFullName+'&marketinfo='+marketInformations;
   $.ajax({
	   type: "POST",
       data: data,
       url: requestUrl + 'requests/activity',
       cache: false,
	   beforeSend: function(){
	      
	   },
	   success: function(response){ 
	         if(response == 1 ){
			      window.location.href = requestUrl+'mymarket/'+marketUrlName;  
			 }else{
			      $(".how_to_first").show();
				  $(".alrtt").text(response);
			 }
	   }
   });
});
$("body").on("click",".clsTour", function(){
    var type = $(this).attr("data-type");
	var tour = $(this).attr("id");
	var data = 'f='+type+'&thistour='+tour;
	$.ajax({
		type: "POST",
        data: data,
        url: requestUrl + 'requests/activity',
		cache: false,
		success: function(html) {
			 $("#tooltipstered"+tour).remove(); 
		}
	  }); 
});  
$("body").on("click",".rmvt", function(){ 
	var tour = $(this).attr("data-tip");
	$("#tooltipstered"+tour).remove(); 
});  
/*Close Alert*/
$("body").on("click",".noteeBox_alert_close", function(){
     $(".ev_alert").fadeOut(500);
	 setTimeout(function() {
		 $(".ev_alert").remove();
	 }, 501);
}); 

$("body").on("click",".newAnnouncement", function(){
     if (!$(".showAnnouncement").hasClass("showingAnnounce")) {
      $(".showAnnouncement").addClass("showingAnnounce");
	  $(".announceDetails").fadeOut();
    } else {
      $(".showAnnouncement").removeClass("showingAnnounce");
	  $(".announceDetails").fadeIn();
    }
});
function ScrollBottomChatMini(){
	   var logDown = $('.o_chat_posts');
	   logDown.animate({ scrollTop: logDown.prop('scrollHeight')}, 0);
	} 
  //Get User Chat
	$("body").on("click", ".getminib", function(){
		var type = $("#fchatBox").attr("data-type");
		var page = $(this).attr("data-page");
        var userID = $(this).attr("data-id");
		var userName = $(this).attr("data-user"); 
	    var chat = 'f='+type+'&user='+userName+'&id='+userID + '&ct=' +page;
		$.ajax({
			  type: 'POST',
			  url: requestUrl + 'requests/activity', 
			  data: chat,
			  cache: false,
			  beforeSend: function() {
				   if ($('div.o_chat_box_container').length) {
				       $(".o_chat_box_container").remove();
				   }
				   $("#miniuser_"+userID).append('<div class="prelo"><span class="progress"><span class="indeterminate"></span></span></div>');
			  },
			  success: function(response) { 
			        $('.prelo').remove();
					 if(page == 'minibox'){
					    $("body").append(response);   
						 setTimeout(function() { 
							ScrollBottomChatMini();    
						}, 600);
					 } 
					  
			  }
			}); 
	}); 
//Send Message to user 

  $("body").on("click",".sendmymes_mini", function(e){
	       var type = $("#getMessage").attr("data-message");
		   var sendedToName = $("#getMessage").attr("data-user");
		   var sendedToID = $("#getMessage").attr("data-userid");
		   var sendText = $("#send_message_mini").val(); 
		   var sendImage = $("#cuploadvalues").val();
		   var sendVideo = $("#vuploadvalues").val();
		   var sendFile = $("#fuploadvalues").val();
		   var sendFileName = $(".thisfilenam").attr("data-fname"); 
		   var fileExtension = $(".thisfilenam").attr("data-nfile"); 
		   if (sendFileName == null || fileExtension == null){
				var sendFileName = '';
				var fileExtension = '';
			}
		   var selfPost = $("#selfdestructtime").val();
		   if ($.trim(type).length == 0 || $.trim(sendedToName).length == 0 || $.trim(sendedToID).length == 0) {
             // M.toast({html: canNotSendEmptyComment , classes: 'warning'});
            } else {
				var dataMessage = 'f='+type+'&message='+encodeURIComponent(sendText)+'&u_n='+sendedToName+'&u_i='+sendedToID+'&upload='+sendImage+'&video='+sendVideo+'&file='+sendFile+'&filename='+encodeURIComponent(sendFileName)+'&exten='+fileExtension+'&self='+selfPost;
				$.ajax({
					type: "POST",
					url: requestUrl + "requests/activity",
					data: dataMessage,
					dataType: "json",
					cache: false,
					success: function(response) {
						if(response.empty == 'empty'){
						   // M.toast({html: canNotSendEmptyComment , classes: 'warning'});
							return false;
						}
						var messageText = response.message;
					    var messageFromID = response.user_two;
					    var messageToID = response.user_one;
					    var messageID = response.id;
					    var messageTime = response.time;
						var messageImage = response.image;   
						var messageVideo = response.video; 
						var messageFile = response.file; 
						var messageDestructTime = response.destruct;
						var messageSelfDestruct = response.selfdestruct;  
						if(messageSelfDestruct){
						    var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageSelfDestruct+' </div></div>';
						} else{
							if(messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+' </div><div class="theImages image_you_mini">'+messageImage.join(" ")+'</div><div class="message_time_set m_time_me"><div class="timeago" title="'+messageTime+'"></div></div></div>';
							}
							if(messageText && !messageImage){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+'</div>';
							}
							if(messageVideo){
								var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+' </div><div class="theImages video_you_mini">'+messageVideo+'</div></div>';
							}
							if(messageFile){
							   var messagewithImage = '<div class="messageBox_body child'+messageFromID+'" id="messageBox_body'+messageFromID+'" data-id="'+messageID+'" data-get="'+messageFromID+'"><div class="you_mini">'+messageText+' </div>'+messageFile+'</div>';
							}
						}
						  $(".o_chat_conversations").append(messagewithImage);
						  $("#msg"+messageToID).html(messageText);
					      $("#time"+messageToID).attr("title", messageTime).html(messageTime);
						  setTimeout(function() { 
							ScrollBottomChatMini();
							$("._2a-p").html('');
							$("#cuploadvalues").val('');
							$("#fuploadvalues").val('');
							$("#vuploadvalues").val('');
							$("#selfdestructtime").val('');
					      }, 100);  
						$("#send_message_mini").val('');
					}
				});
			}
  });
 $("body").on("focus",".o_chat_send_message",function() {
	var type = 'yres'; 
    var sendedToName = $("#getMessage").attr("data-user");
	var sendedToID = $("#getMessage").attr("data-userid");
	var data = 'f='+type+'&user='+sendedToName+'&id='+sendedToID;
	$.ajax({
		type: 'POST',
		url: requestUrl + 'requests/activity', 
		data: data,
		cache: false,
		beforeSend: function() { },
		success: function(response) { 
			   $("#unrm"+sendedToID).remove();
			   $(".Szr5J_not_c_m").hide();
		}
	 });
}); 
/*Close ChatBox*/ 
$("body").on("click",".closeminichat", function(){
    $(".o_chat_box_container").addClass("clsmini");
	setTimeout(function() { 
	     $(".o_chat_box_container").remove();
	}, 780);  
});
$("body").on("mouseenter", ".chatSidebar", function() {
	   if ($(window).width() < 1464 && $(window).width() > 755) {
		    $(".embedVideo").css({'right':'266px'});
	   }
 });
 $('body').on('mouseleave', '.chatSidebar', function(e) {
	 $(".embedVideo").css({'right':''});
 });
/*Open Who Can See Box*/
$("body").on("click",".whns", function(){
    var type = $(this).attr('data-type');
	var postID = $(this).attr('data-id');  
    var data = 'f='+type+'&post='+postID;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){ },
	   success: function(html){
			 $("body").append(html); 
	   }
   }); 
});
/*Open Who Can See Box*/
$("body").on("click",".methodCanSee", function(){
    var type = $(this).attr('data-type');
	var postID = $(this).attr('data-post');  
	var whos = $(this).attr("data-whs");
    var data = 'f='+type+'&post='+postID+'&whs='+whos;
   $.ajax({
	   type: 'POST',
	   url: requestUrl + 'requests/activity',
	   data: data, 
	   beforeSend: function(){ },
	   success: function(response){ 
			$('.payment_gateway_list_box  , .anm').addClass('methods_close_animate');
		    setTimeout(function() {
			   $('.payment_gateways_fix , .popupBack , .anm').remove();
			   M.toast({html: response});  
		    }, 750);   
	   }
   }); 
});
/*Show NudePhoto*/
$("body").on("click",".openNudePhoto", function(){
    var ID = $(this).attr("data-id");
	$(".tnp"+ID).removeClass('nsldimg').addClass('sldimg');
	$(".him"+ID).remove();
});
});
$(window).resize(function() {
  // This will execute whenever the window is resized  
  var windowWidth = $(window).width(); // New width 
});
