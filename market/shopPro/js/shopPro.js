// JavaScript Document
$(document).ready(function(){
	// Just allow Some Characters
  $("#market_u").livequery(function() {
    $(this).alphanum({
     allow: "-_",
	 disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.",
     allowNumeric  : true,
	 allowLatin         : true,  
     allowOtherCharSets : false,
    });
  });
  // Just allow Number
  $("#p_price , #discount_price").livequery(function() {
    $(this).alphanum({
	 disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.- _",
     allowNumeric  : true,
	 allowLatin         : false,  
     allowOtherCharSets : false,
    });
  });
	//Show About Me Box
   $("body").on("click",".aboutmarket", function(){
	    var type = 'aboutmarket';
		var id = $(this).attr("id");
		var data = 'm='+id;
		$.ajax({
			type: "POST",
			url: requestMarket + "/contents/aboutme",
			data: data, 
			beforeSend: function(){ 
			   $('body').addClass('disableScroll'); 
			},
			success: function(html) {
				 $("body").append(html);
			}
		});
   });
   // Close About Me
   $("body").on("click",".shopPro_aboutme_close , .closeProductDetails , #closePost", function(){
	    $(".shopPro_aboutme_container , .market_edit_popUp_container").addClass("shopPro_aboutmecls");
		setTimeout(function() {
            $(".shopPro_aboutme , .market_edit_popUp_wrapper").remove();
			$('body').removeClass('disableScroll');  
          }, 900);
    });
	// Call Edit Product
   $("body").on("click",".shopPro_product_edit", function(){
        var productID = $(this).attr("id"); 
		var data = 'product='+productID;
		$.ajax({
			type: "POST",
			url: requestMarket + "/ajax/edit_product",
			data: data, 
			beforeSend: function(){ 
			   $('body').addClass('disableScroll'); 
			},
			success: function(html) {
				 $("body").append(html);
			}
		});
   });
   // Edit Product Save
   $("body").on("click", ".save_edit_product", function(){
        var type = 'saveProductEdit';
		var editedProductTitle = $("#product_title").val();
		var editedProductPrice = $("#p_price").val();
		var editedProductCurrency = $("#crncy").val();
		var editedProductDescription = $("#product_description").val();
		var editedProductMessageStatus = $('#ms').val();
		var editedProductCategory = $("#prcat").val(); 
		var editedProductDiscount = $("#discount_price").val();
		var editedProductPlace = $('#place').val();
		var editProductID = $("#product_e").attr("data-id");
		var data = 'f='+type+'&p_title='+encodeURIComponent(editedProductTitle)+'&p_price='+encodeURIComponent(editedProductPrice)+'&p_currency='+editedProductCurrency+'&p_descripiton='+encodeURIComponent(editedProductDescription)+'&p_mstatus='+editedProductMessageStatus+'&p_category='+editedProductCategory+'&p_discount='+editedProductDiscount+'&p_place='+encodeURIComponent(editedProductPlace) + '&p_id='+editProductID;
		$.ajax({
			type: "POST",
			url: requestMarket + "/ajax/editMarket",
			data: data, 
			beforeSend: function(){ 
			   $('body').addClass('disableScroll'); 
			},
			success: function(html) {
				 $(".product_popUp_container_edit").addClass("prduct_close");  
				 setTimeout(function() {
					$(".product_popUp_wrapper").remove();
					$('body').removeClass('disableScroll');  
				  }, 900);   
			}
		});
   });
  // Open Edit Market Information Box
  $("body").on("click",".shopPro_edit", function(){
      var type = 'editMarket';
	  var data  =  'f='+type;
	  $.ajax({
			type: "POST",
			url: requestMarket + "/contents/editMarket",
			data: data, 
			beforeSend: function(){ 
			   $('body').addClass('disableScroll'); 
			},
			success: function(html) {
				 $("body").append(html);
				 if(!html){
				    $('body').removeClass('disableScroll'); 
				 }
			}
		});
  });
  // Edit MarketPlace Page Information
  $("body").on("click",".sav_set", function(){ 
		var type =  $(this).attr("data-type");
		var market_place_name = $("#market_p_u").val();
		var market_place_url_name = $("#market_u").val();
		var market_place_about = $("#about_market").val();
		var market_place_phone = $("#market_phone").val();
		var market_place_mail = $("#market_email").val();
		var market_place_address = $("#market_address").val(); 
		var market_slogan = $("#market_slogan").val();
		var market_facebook  = $("#market_fc").val();
		var market_twitter  = $("#market_tw").val();
		var market_tumblr  = $("#market_tb").val();
		var market_youtube  = $("#market_yt").val();
		var market_instagram  = $("#market_ins").val();
		
		var data = 'f='+ type +'&place_name='+encodeURIComponent(market_place_name)+'&place_url_name='+encodeURIComponent(market_place_url_name)+'&place_about='+encodeURIComponent(market_place_about)+'&place_phone='+encodeURIComponent(market_place_phone)+'&place_mail='+encodeURIComponent(market_place_mail)+'&place_address='+encodeURIComponent(market_place_address)+ '&slogan='+encodeURIComponent(market_slogan)+'&m_fc='+encodeURIComponent(market_facebook)+'&m_tw='+encodeURIComponent(market_twitter)+'&m_tb='+encodeURIComponent(market_tumblr)+'&m_yt='+encodeURIComponent(market_youtube)+'&m_ins='+encodeURIComponent(market_instagram);
		$.ajax({
			type: "POST",
			url: requestMarket + "/ajax/editMarket",
			data: data, 
			beforeSend: function(){ 
			   $('body').addClass('disableScroll'); 
			},
			success: function(html) {
				  $(".shopPro_aboutme_container , .market_edit_popUp_container").addClass("shopPro_aboutmecls");
					setTimeout(function() {
						$(".shopPro_aboutme , .market_edit_popUp_wrapper").remove();
						$('body').removeClass('disableScroll');  
					  }, 900);  
			}
		});
  });
  //Change Profile Avatar Submit
	$('body').on('change', '#shopProCoverchange', function(e) {
		e.preventDefault(); 
	    var id = $("#shopProCoverchange").attr("data-id");
		var data = { t: id  };
		$("#shopProCover").ajaxForm({
			type: "POST",
			data: data, 
			cache: false,
		    beforeSubmit: function() {
			   $(".shopPro_header").append("<div class='avatarUploadingAnimation'></div>");
			},
		    success: function(html) {
			  $('.shopPro_header').css("background-image", "url("+html+")");
			  $('.avatarUploadingAnimation').remove();
		    },
		    error: function() {
	
		    }
		}).submit();
    });
	//Change Profile Avatar Submit
	$('body').on('change', '#shopProLogochange', function(e) {
		e.preventDefault(); 
	    var id = $("#shopProLogochange").attr("data-id");
		var data = { t: id  };
		$("#shopProLogo").ajaxForm({
			type: "POST",
			data: data, 
			cache: false,
		    beforeSubmit: function() {
			   $(".shopPro_header_in").append("<div class='avatarUploadingAnimation'></div>");
			},
		    success: function(html) {
			  $('.shopPro_logo').html(html);
			  $('.avatarUploadingAnimation').remove();
		    },
		    error: function() {
	
		    }
		}).submit();
    });
	// Change Theme
	$("body").on("click",".usemytemp", function(){
		      var ID = $(this).attr("data-id");
			  var data = 'id='+ID;
	     $.ajax({
			type: "POST",
			url: requestMarket + "/ajax/changetheme",
			data: data, 
			beforeSend: function(){ 
			   $('body').addClass('disableScroll'); 
			},
			success: function(html) {
				   location.reload();   
			}
		});
	});
});