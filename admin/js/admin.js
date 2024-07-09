// JavaScript Document 
 $(document).ready(function() {
	 var preLoaderPopUp = '<div class="popUpPreLoaderWrap initial" id="postPopUpBox"><div class="popUpPreLoaderContainer initial"><div class="popUpPreLoaderMiddle initial"><div class="preloader-wrapper small active  initial"><div class="spinner-layer spinner-blue initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-red initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-yellow initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div><div class="spinner-layer spinner-green initial"><div class="circle-clipper left initial"><div class="circle initial"></div></div><div class="gap-patch initial"><div class="circle initial"></div></div><div class="circle-clipper right initial"><div class="circle initial"></div></div></div></div></div></div></div>';
 
 //Active page link from settings page
   var pathname = (window.location.pathname.match(/[^\/]+$/)[0]); 
   $(".admin_menu_item").removeClass("activeSetting");
   $("#_"+pathname).addClass("activeSetting active");
   $("#__"+pathname).addClass("active_icon"); 
   $("#___"+pathname).addClass("activeIconBold");  
   $("body").on("change keyup", ".chng", function(){
    $("#set_website").show();
  }); 
  $(".lang_value , .thevalue").livequery(function() { 
	$(this).autoResize({minRows: 3});
  }); 
  $(".selecDefaultLang , .selectTheOption , .selectTheColor , .afterscroll , .selecDefaultFeeling, .selectTheOptionDayWeekMonthYear , .changeCurrency, .selectDefaultTheme").livequery(function() { 
	$(this).formSelect();
  });
  $(".dash_input_item , .kkey , .categor").livequery(function() {
    $(this).alphanum({
      allow: "_",
      disallow: "!@$%^&*()+=[]\\';,/{}|\":<>?~`.- ",
      allowSpace: false,
      allowNumeric: false,
	  allowOtherCharSets : false
    });
  });
    $(".adsViewFee, .adsClickFee").livequery(function() {
    $(this).alphanum({
      allow: ".",
      disallow: "!@$%^&*()+=[]\\';,/{}|\":<>?~`- _",
      allowSpace: false,
      allowNumeric: true,
	  allowOtherCharSets : false,
	  allowLatin: false,  // a-z A-Z
      allowOtherCharSets : false,
    });
  });
  $('.collapsible').collapsible();   
  /*Save Website Settings*/
  $("body").on("click", ".save_websitesettings", function(){
    var type = $(this).attr("data-type"); 
	var webname = $("#website_name").val(); 
	var webkeywords = $("#write_site_keywords").val();
	var webtitle = $("#website_title").val();
	var webinfo = $("#write_site_information").val(); 
	var datawebdetails = 'f='+type+'&wn='+webname+'&ww='+webkeywords+'&wi='+webinfo+'&wt='+webtitle;
	var nonempty = $('.chng').filter(function() { return this.value != ''});
	//Check url is valid
	if(nonempty.length == 0){
	    $('.note_14').show();
		setTimeout(function() {
               $(".note_14").hide(); 
       }, 5000); 
	}else{
	    $.ajax({
		type: 'POST',
		url: requestUrl + "admin/requests/request",
		data: datawebdetails,
		cache: false,
		beforeSend: function() { $("#set_profile").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
		success: function(response) {  
		    setTimeout(function() {
               $(".preloadCom").remove(); 
            }, 2000); 
		}
	 }); 
	}
  });
  /*SAVE APIs*/
  $("body").on("click",".save_websiteapis", function(){
        var type = $(this).attr("data-type"); 
		var googleMapApi = $("#google_map_api").val();
		var googleAnalyticsCode = $("#google_analytics_code").val();
		var giphyApi = $("#giphy_api_key").val();
		var weatherApi = $("#weather_api_key").val();
		var yandexTranslateApi = $('#yandex_translate_api').val();
		var weatherDefaultLocation = $("#weather_default_location").val();
		var onesignalappid = $('#onesignalappid').val();
		var onesignalrestid = $('#onesignalrestid').val();
		var data = 'f='+type+'&map='+googleMapApi+'&analytics='+googleAnalyticsCode+'&giphyKey='+giphyApi+'&weatherapi='+weatherApi+'&weatherLocation='+weatherDefaultLocation+'&yandex_api='+encodeURIComponent(yandexTranslateApi)+'&onesignalappid='+onesignalappid+'&onesignalrestid='+onesignalrestid;
			$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#setapi").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
					setTimeout(function() {
					   $(".preloadCom").remove(); 
					}, 2000); 
				}
		 }); 
   });
 
   // Scroll to Show Data
   function showMoreData(){
	/*Show More posts From Explore Page*/
	 var scrollLoad = true;
     $(window).scroll(function() {
      if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height()) { 
	    var PageType = $("#moreType").attr("data-type"); 
        var ID = $('#moreType').children().last().attr('data-last');    
        var dataString = "lastUserID=" + ID + '&f=' + PageType;
          $.ajax({
            type: "POST",
            url:requestUrl + 'admin/requests/request',
            data: dataString,
            cache: false,
            beforeSend: function() { 
			  $('body').addClass('disableScroll'); 
			  // Do Something
            },
            success: function(html) {
				  if(html){
					  $("#moreType").append(html);
					  $('body').removeClass('disableScroll'); 
				  }
				  if(html.trim()==''){
				  $('body').removeClass('disableScroll'); 
			      M.toast({html: youseeAll , classes: 'green_not'}); 
				  scrollLoad = false; 
			   }
            }
          }); 
        } else {
          //$('#newsfeed').append(nomorecontent);
        } 
     return false;
    });
	}
	showMoreData();
	// Show User Profile From Right Sidebar 
	$("body").on("click",".datauser", function(){
       var type = $(this).attr("data-type");
	   var userID = $(this).attr("id");
	   var data = 'f='+type+'&user='+userID;
	   $.ajax({
		type: 'POST',
		url: requestUrl + 'admin/requests/request', 
		data: data,
		cache: false,
		beforeSend: function() { 
		
		 },
		success: function(response) {  
		    $("body").append(response);
		}
	 }); 
	});
	//Confirm Dialog  for Block User
  $("body").on("click", ".block_u", function(){
	  var type = $(this).attr("data-type");
      var UserID = $(this).attr("id");//Get Comment id
	  var UserUserName = $(this).attr("data-u");//Get Comment UserName
	  var UserIP = $(this).attr("data-ip"); // Get Commented User ID
	  var dataAppendBlockPanel = 'f='+type+'&uid='+UserID+'&username='+UserUserName+'&ip='+UserIP;
	  $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: dataAppendBlockPanel,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				$("body").append(response);
			}
		 }); 
  }); 
  // Block User
  $("body").on("click",".block_user_Button" , function(){
	  var type = $(this).attr("data-type");
	  var u_id = $(this).attr("data-ui");
	  var u_name = $(this).attr("data-un");
	  var u_ip = $(this).attr("data-p"); 
	  var report_note = $("input[name='report']:checked").val();
	  if($.trim(type).length == 0 || $.trim(u_id).length == 0 || $.trim(u_name).length == 0 || $.trim(u_ip).length == 0 || $.trim(report_note).length == 0){
	      $('.note_14').show();
			setTimeout(function() {
				   $(".note_14").hide(); 
		   }, 5000);
	  }else{
		  var dataBlockUser = 'f='+type+'&user='+u_id+'&u_nam='+u_name+'&ip='+u_ip+'&because='+report_note;
		  $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: dataBlockUser,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
			    if(response == 1){
			        $(".body"+u_id).addClass("removeCom");
				    $(".reportPostContainer").remove();
				      setTimeout(function() {
						 $(".body"+u_id).fadeOut("normal", function() {
								$(this).remove();
						 });  
				     }, 500);
				}else{
				   $('.note_14').show();
					setTimeout(function() {
						   $(".note_14").hide(); 
				   }, 5000);
				} 
			}
		 }); 
	  }
   });
   $("body").on("click", ".del_data_user", function(){
      var userID = $(this).attr("id");//Get Comment id
	  var thePopUpType = $(this).attr("data-type"); 
	  var popUpComment = 'popUp='+thePopUpType+'&userID='+userID;
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
   $("body").on("click", ".remove_block_data_user", function(){
      var userID = $(this).attr("id");//Get Comment id
	  var thePopUpType = $(this).attr("data-type"); 
	  var popUpComment = 'popUp='+thePopUpType+'&userID='+userID;
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
   $("body").on("click", ".delete_user_post_alert", function(){ 
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
  $("body").on("click", ".rep_del", function(){ 
	  var thePopUpType = $(this).attr("data-type");
	  var postrID = $(this).attr("id");//Get Comment id
	  var postID = $(this).attr("data-post");//Get Comment UserName  
	  var popUpComment = 'popUp='+thePopUpType+'&pid='+postrID+'&punm='+postID;
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
   
  $("body").on("click", ".deleteAdvertise", function(){
       var postID = $(this).attr("data-post");//Get Comment id
	  var thePopUpType = $(this).attr("data-type"); 
	  var popUpComment = 'popUp='+thePopUpType+'&postID='+postID;
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
  
  // Delete User 
  $("body").on("click", ".delete_this_user", function(){
	   var type = $(this).attr("data-type");
	   var deleteUserID = $(this).attr("data-user");
	   var deleteData = 'f='+type+'&user='+deleteUserID;
	   $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: deleteData,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				  if(response == 1){
						$(".body"+deleteUserID).addClass("removeCom");
						$(".confirmBoxContainer").remove();
						  setTimeout(function() {
							 $(".body"+deleteUserID).fadeOut("normal", function() {
									$(this).remove();
							 });  
						 }, 500);
					}else{
					   $('.note_14').show();
						setTimeout(function() {
							   $(".note_14").hide(); 
					   }, 5000);
					} 
			}
		 }); 
   });
   // Remove Block From Data
   $("body").on("click",".remove_blocked_user_list",  function(){
       var type = $(this).attr("data-type");
	   var blockedUserID = $(this).attr("data-user");
	   var removeBlockedData = 'f='+type+'&user='+blockedUserID;
	   $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: removeBlockedData,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				  if(response == 1){
						$(".body"+blockedUserID).addClass("removeCom");
						$(".confirmBoxContainer").remove(); 
							 $(".body"+blockedUserID).fadeOut("normal", function() {
									$(this).remove();
							 });   
					}else{
					    $('.note_14').show();
						setTimeout(function() {
							   $(".note_14").hide(); 
					   }, 5000);
					} 
			}
		 }); 
   });
   //  Delete Post
   $("body").on("click",".delete_this_post_now",  function(){
       var type = $(this).attr("data-type");
	   var postID = $(this).attr("data-post");
	   var postUserID = $(this).attr("data-user");
	   var deleteThisPost = 'f='+type+'&user='+postUserID+ '&postID='+postID;
	   $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: deleteThisPost,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				  if(response == 1){
						$("#post_"+postID).addClass("removeCom");
						$(".confirmBoxContainer").remove(); 
							 $("#post_"+postID).fadeOut("normal", function() {
									$(this).remove();
							 });   
					}else{
					   $('.note_14').show();
						setTimeout(function() {
							   $(".note_14").hide(); 
					   }, 5000);
					} 
			}
		 }); 
   });
   //Report Menu Append
   $("body").on("click", ".look_at_report", function(){
         var id = $(this).attr("id");
		 var reportedPOSTID = $(this).attr("data-post");
		 var menu = '<div class="report_check_menu_container border-radius"><div class="header_menu_item hvr-underline-from-center rep_checked" id="'+id+'" data-type="report_checked" style="line-height:27px;"><span class="checked_icon"></span>'+been_checked+'</div><div class="header_menu_item hvr-underline-from-center rep_del" id="'+id+'" data-post="'+reportedPOSTID+'" data-type="report_delete" style="line-height:27px;"><span class="delete__icon"></span>'+delete_text+'</div></div>';
		 var childNodes = $(".look_at_report").children();
		  if (childNodes.length) {
			 childNodes.remove();
			 $("#menu_" + id).append(menu);
		  } else {
			 $("#menu_" + id).append(menu);
		  }
   });
   $(document).bind( "mouseup touchend", function(e){
     var container = $('.report_check_menu_container');
       if (!container.is(e.target) && container.has(e.target).length === 0) {
         container.remove();
        }
    });
	
	/*Update Report Checked */
	$("body").on("click", ".rep_checked", function(){
        var type = $(this).attr("data-type");
		var id = $(this).attr("id");
		var dataChecked = 'f='+type+'&reportID='+id;
		$.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: dataChecked,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				  if(response == 1){  
						$("#rep_type"+id).removeClass("no").addClass("yes").text(reportChecked);
					}else{
					   $('.note_14').show();
						setTimeout(function() {
							   $(".note_14").hide(); 
					   }, 5000);
					} 
			}
		 }); 
	});
	
	/*Delete Report*/
	$("body").on("click", ".delete_this_reported_post_now", function(){
	   var type = $(this).attr("data-type");
	   var id = $(this).attr("id");
	   var reportedPostid = $(this).attr("data-post");
	   var dataDeleteReportedPost = 'f='+type+'&rep_id='+id+'&postid='+reportedPostid;
	   $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: dataDeleteReportedPost,
			cache: false,
			beforeSend: function() { 
			
			 },
			success: function(response) {  
				 if(response == 1){
						$("#post_"+id).addClass("removeCom"); 
						$(".confirmBoxContainer").remove();
						  setTimeout(function() {
							 $("#post_"+id).fadeOut("normal", function() {
									$(this).remove();
							 });  
						 }, 500);
					}else{
					    $('.note_14').show();
						setTimeout(function() {
							   $(".note_14").hide(); 
					   }, 5000);
					} 
			}
		 }); 
	});
	/*Get Edit Language Right SideBar*/
	$("body").on("click", ".edit_lang_values", function(){
	   var type = $(this).attr("data-type");
	   var languageID = $(this).attr("id");
	   var lang_key = $(this).attr("data-key");
	   var getvalues = 'f='+type+'&getvalue='+languageID+'&key='+lang_key;
	    $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: getvalues,
			cache: false,
			beforeSend: function() {  
			 },
			success: function(response) {  
				 $("body").append(response);
			}
		 }); 
	});
	$("body").on("change keyup", ".lang_value", function(){
		var thisID = $(this).attr("id");
		if(!$('#_'+thisID).hasClass('change_langeage_keys')){
		    $("#"+thisID+'_').after('<div class="change_langeage_keys" id="_'+thisID+'" data-ln="'+thisID+'" data-type="langkeys"><div class="control left_btn"></div><div class="control right_btn"><div class="btn waves-effect waves-light blue">Save</div></div></div>'); 
		}
		
    });
	/*Save New Language Key From Data*/
	$("body").on("click", ".change_langeage_keys", function(){
		 var type = $(this).attr("data-type");
		 var id = $(this).attr("data-ln");
		 var language = $("#"+id).attr("id");
		 var language_id = $("#"+id).attr("data-id");
		 var language_key = $("#"+id).attr("data-key");
		 var new_word = $("#"+id).val();
		 var dataLangChange = 'f='+type+'&this_lng='+language+'&lang_id='+language_id+'&word='+new_word+'&thisky='+language_key;
	     $.ajax({
			type: 'POST',
			url: requestUrl + 'admin/requests/request', 
			data: dataLangChange,
			cache: false,
			beforeSend: function() { 
			    $("#"+language+'_').append('<span class="prld"><span class="preloader-wrapper small active"> <span class="spinner-layer spinner-green-only"> <span class="circle-clipper left"> <span class="circle"></span></span><span class="gap-patch"> <span class="circle"></span></span><span class="circle-clipper right"> <span class="circle"></span></span></span></span></span>');
			 },
			success: function(response) {  
			    $(".prld").remove(); 
				 setTimeout(function() { 
					$("#word_"+language_id).html(new_word);
			     }, 900);
			    M.toast({html: response});  
			}
		 }); 
	});
	//Change Default Language
  $("body").on("click", ".wellcome_theme", function() {
    var page = $(this).attr("data-theme");
	var type = $(this).attr("data-type");
    var ID = $(this).attr("id");
	var acType = $("#typ"+ID).attr("data-acType");
    var data = "well_theme=" + page + '&f='+type;
	if(acType == 'Activated'){
		 console.log('You are currently using this theme');
	}else{ 
    $.ajax({
      type: "POST",
      data: data,
      url: requestUrl + "admin/requests/request",
      cache: false,
      beforeSend: function() {
         $(".t_icon").text(UseThisTheme);
		 $(".t_icon").attr("data-acType", 'Active');
		 $(".t_icon").removeClass("activeTheme").addClass("UserThisTheme");
		 $("#on"+ID).append('<div class="spinnerUploadG"></div>');
      },
      success: function(response) {
         $("#typ"+ID).text(activeTheme);
		 $("#typ"+ID).attr("data-acType", 'Activated');
		 $("#typ"+ID).removeClass("UserThisTheme").addClass("activeTheme");
		 $(".spinnerUploadG").remove(); 
      }
    });
	}
  });

  // Show Hide Action
  $("body").on("click", ".manageThisAds", function(){
       var ID = $(this).attr("id");
	   if (!$(".post_menu_"+ID).hasClass("opened_")) {
		  $(".post_menu_"+ID).addClass("opened_");
		} else {
		  $(".post_menu_"+ID).removeClass("opened_");
		}
  });
  // See Advertisement
  $("body").on("click", ".see_adsa", function(){
       var f = $(this).attr("data-type");
	   var ID = $(this).attr("data-post");
	   var data = 'f='+f+'&ads='+ID;
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
   // Show Admin Need Approve Note
   $("body").on("change",".with-gap", function() { 
    if ($(this).val() == "adsinactive") {
      $(".adsBoxItemWrapperEdit").show();
	  $("#whyNot").focus();
    } else {
      $(".adsBoxItemWrapperEdit").hide();
    }
  });
  // Save Ads Changes
  $("body").on("click", ".saveAdsChanges", function(){
	   
	    var type = $(this).attr("data-type");
		var thisID = $(this).attr("data-id");
		var user = $(this).attr("data-u");
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
		var agreeStatus = $('input[type="radio"][name="approvalstatus"]:checked').val(); // Ads Approval Status 
		// Insert DAta
		var data = 'f='+type+'&advertiseTitle='+adsTitle+'&advertiseDescription='+adsDescription+'&advertiseRedirectUrl='+adsRedirectUrl+'&advertisecampanyname='+adsCampanyName+'&advertisebudget='+adsBudget+'&advertisewhocansee='+adswhoCanSeeAds+'&advertiseareadisplay='+adsAreaDisplay+'&advertisecategory='+adsCategory+'&advertisestaylive='+advertisementStayLive+'&advertiseoffer='+advertisementOffer+'&adminapproveStatus='+agreeStatus+'&thisAdvertisement='+thisID+'&user='+user;
		
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
   //Delete Advertisement
   $("body").on("click",".delete_this_ads_now", function(){
        var type = $(this).attr("data-type");
		var thisID = $(this).attr("data-post");
        var data = 'f='+type+'&dthisAds='+thisID;
		$.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response){
			      $("#adsBody"+thisID).remove();   
				  $(".confirmBoxContainer").remove(); 
			  }
		 } 
	  });
   });
     // Create Advertisement
  $("body").on("click",".adminAdsC", function(){   
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
	  url_validate = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
	  
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
	  if(!url_validate.test(campanyURL)){
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
	  var data =  'f='+type+'&campany='+campanyName+'&web='+campanyURL+'&show='+whoCanSeeAds+'&areadisplay='+adsAreaDisplay+'&adsTitle='+advertisementTitle+'&offer='+advertisementOffer+'&live='+advertisementStayLive+'&description='+advertisementDescription+'&adsfile='+advertisementImages + '&adscategory='+advertisementCategory+'&budget='+userBudget; 
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
			  if(response == 2){
			         $('.note_14').show();
						setTimeout(function() {
							   $(".note_14").hide(); 
					   }, 5000);
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
  // Change sandbox value 
  $("body").on("click","#paymodestats", function(){
	     var paymode = $(this).val();
		 if(paymode == 'sendbox'){
		     $("#paymodestats").val("live");
		 }else {
		 $("#paymodestats").val("sendbox");
		 } 
   });
  // Save Advertisement Settings
  $("body").on("click",".paypalsetting", function(){
	   var type = $(this).attr("data-type");
       var paymode = $("#paymodestats").val(); 
	   var cliend = $("#cliend").val();
	   var secret = $("#secret").val();
	   var data = 'f='+type+'&client='+cliend+'&secret='+secret+'&paymode='+paymode;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){$("#sedpay").append('<span class="preloadCom_2"><span class="progress"><span class="indeterminate"></span></span></span>');},
		 success: function(response){
		      if(response){ 
				  setTimeout(function() {
							 $(".preloadCom_2").remove(); 
				  },2000); 
			  }
		 } 
	  });
   });
   // Save Amounts 
  $("body").on("click",".feeamount", function(){
	   var type = $(this).attr("data-type"); 
	   var adsViewFee = $("#adsViewFee").val();
	   var adsClickFee = $("#adsClickFee").val();
	   var data = 'f='+type+'&adsViewFee='+adsViewFee+'&adsClickFee='+adsClickFee;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){$("#sedfee").append('<span class="preloadCom_2"><span class="progress"><span class="indeterminate"></span></span></span>');},
		 success: function(response){
		      if(response){ 
				   setTimeout(function() {
							 $(".preloadCom_2").remove(); 
				  },2000); 
			  }
		 } 
	  });
   });
    // After Scroll
  $("body").on("change",".afterscroll", function(){
	   var type = $(this).attr("data-type"); 
	   var afterscrolll = $(this).val();  
	   var data = 'f='+type+'&here='+afterscrolll;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){$("#aftersc").append('<span class="preloadCom_2"><span class="progress"><span class="indeterminate"></span></span></span>');},
		 success: function(response){
		      if(response){ 
				   setTimeout(function() {
							 $(".preloadCom_2").remove(); 
				  },2000); 
			  }
		 } 
	  });
   }); 
   // Add New Sticker   
 $("body").on("click",".make_new_sticker, .make_new_gif", function(){  
	  if(!$('.form_sticker').hasClass('display_blck')){
		    $(".form_sticker").addClass("display_blck");
	 }else{ 
	       $(".sticker_form").addClass("close_form");
			setTimeout(function() {
				$(".form_sticker").removeClass("display_blck");
				$(".sticker_form").removeClass("close_form");
		   },800); 
	 }
 }); 
 // Close Add New Sticker Box
$("body").on("click",".close_a_box", function(){
    $(".sticker_form").addClass("close_form");
	setTimeout(function() {
		$(".form_sticker").removeClass("display_blck");
		$(".sticker_form").removeClass("close_form");
   },800); 
}); 
 
  $("form#myform").on("submit", function(e) { 
      e.preventDefault(); 
	   var title = $("#stickername").val();
	   var type = $("#newsticker").val(); 
	   var file=new FormData($("form#myform")[0]); 
       var form = new FormData(); 
	   
       form.append("stickerFile", $('input[type=file]')[0].files[0]);
       form.append("f", type);
	   form.append("title", title); 
  $.ajax({
        type: 'POST',
        url:  requestUrl + 'requests/activity',
        data: form,			 
        cache: false,
		contentType: false,
        processData: false,
        beforeSend: function(){},
        success: function(response){
           $(".adivTableBody").prepend(response);
		   $("#stickername").val(''); 
		   $('#sticker__').val('');
		   $(".previewNew").hide();
		   $(".sticker__").show();
        } 
     }); 
	 return false;
});

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader(); 
            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            } 
            reader.readAsDataURL(input.files[0]);
        }
    } 
    $("body").on("change","#sticker__",function () {
        readURL(this);
		$(".previewNew").show();
		$(".sticker__").hide();
    });
	$("body").on("click",".delete-preview", function(){
	     $(".previewNew").hide();
		 $(".sticker__").show();
	});
  $("form#mygform").on("submit", function(e) { 
      e.preventDefault(); 
	   var title = $("#stickername").val();
	   var type = $("#newsticker").val(); 
	   var file=new FormData($("form#mygform")[0]); 
       var form = new FormData(); 
	   
       form.append("stickerFile", $('input[type=file]')[0].files[0]);
       form.append("f", type);
	   form.append("title", title); 
  $.ajax({
        type: 'POST',
        url:  requestUrl + 'requests/activity',
        data: form,			 
        cache: false,
		contentType: false,
        processData: false,
        beforeSend: function(){},
        success: function(response){
           $(".adivTableBody").prepend(response);
		   $("#stickername").val(''); 
		   $('#sticker__').val('');
		   $(".previewNew").hide();
		   $(".sticker__").show();
        } 
     }); 
	 return false;
});
// Delete Sticker
$("body").on("click", ".deleteSticker", function(){
    var type = $(this).attr("data-type");
	var stickerID = $(this).attr("data-post");
	var data = 'f='+ type+'&st='+stickerID;
	$.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response){
			      $("#stickersBody"+stickerID).remove();   
				  //$(".confirmBoxContainer").remove(); 
			  }
		 } 
	  });
});
// Delete Gif
$("body").on("click", ".deleteGif", function(){
    var type = $(this).attr("data-type");
	var gifID = $(this).attr("data-post");
	var data = 'f='+ type+'&gf='+gifID;
	$.ajax({
	     type: 'POST',
		 url: requestUrl + 'requests/activity',
		 data: data,
		 cache: false,
		 beforeSend: function(){},
		 success: function(response){
		      if(response){
			      $("#gifsBody"+gifID).remove();   
				  //$(".confirmBoxContainer").remove(); 
			  }
		 } 
	  });
});
// Search Key
$("body").on("keyup",".search_key_edit", function(){
	var key = $(this).val();
	var searchkey = 'lang_key';
	var data = 'f='+searchkey+'&translateKey='+key;
	if(key === ''){
		 $(".old_Key").show();
		 $(".newboys").hide().html("");
	     return false;
	}else{
	     $.ajax({
		     type: 'POST',
			 url: requestUrl + 'admin/requests/request', 
			 data: data,
			 cache: false,
			 beforeSend: function(){},
			 success: function(response){
			       if(response){
					   $(".old_Key").hide();
					   $(".newboys").show();
					   $(".newboys").html(response);
				   }else{
				       $(".old_Key").show();
					   $(".newboys").hide().html("");
				   }
			 }
		 });
	}
});
// Change Feature Open/Close
  $("body").on("click", ".gstf", function() {
    var value = $(this).val();
    var id = $(this).attr("id");
    var data = "f=" + id + "&mode=" + value;
    $.ajax({
      type: "POST",
      data: data,
      url: requestUrl + "admin/requests/request",
      cache: false,
      beforeSend: function() {},
      success: function(response) {
        if (value == "0") {
          $("#" + id).val("1");
		  M.toast({html: ''+response+'<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,21.5c-35.55872,0 -64.5,28.9413 -64.5,64.5c0,35.55869 28.94128,64.5 64.5,64.5c35.55872,0 64.5,-28.94131 64.5,-64.5c0,-35.5587 -28.94128,-64.5 -64.5,-64.5zM86,32.25c29.749,0 53.75,24.00103 53.75,53.75c0,29.74897 -24.001,53.75 -53.75,53.75c-29.749,0 -53.75,-24.00103 -53.75,-53.75c0,-29.74897 24.001,-53.75 53.75,-53.75zM112.60205,64.5l-33.59375,33.59375l-17.46875,-17.46875l-7.5166,7.5271l24.98535,24.99585l41.12085,-41.12085z"></path></g></g></svg>', classes: 'rounded'});
        } else if (value == "1") {
          $("#" + id).val("0");
		  M.toast({html: ''+response+' <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,21.5c-35.55872,0 -64.5,28.9413 -64.5,64.5c0,35.55869 28.94128,64.5 64.5,64.5c35.55872,0 64.5,-28.94131 64.5,-64.5c0,-35.5587 -28.94128,-64.5 -64.5,-64.5zM86,32.25c29.749,0 53.75,24.00103 53.75,53.75c0,29.74897 -24.001,53.75 -53.75,53.75c-29.749,0 -53.75,-24.00103 -53.75,-53.75c0,-29.74897 24.001,-53.75 53.75,-53.75zM112.60205,64.5l-33.59375,33.59375l-17.46875,-17.46875l-7.5166,7.5271l24.98535,24.99585l41.12085,-41.12085z"></path></g></g></svg>', classes: 'rounded'});
        }
      }
    });
  });
   
 // Post Type List Position Change
 $("body").on("click", ".postPositionBox", function(){
       var type = 'postPosition';
	   var val = $(this).attr("data-val");
	   var data = 'f='+type+'&position='+val;
	   $.ajax({
		  type: "POST",
		  data: data,
		  url: requestUrl + "admin/requests/request",
		  cache: false,
		  beforeSend: function() {},
		  success: function(response) {
			if (val == "0") { 
			     $(".selectedPosition").remove();
			     setTimeout(function() {
					 $("#pb"+val).append('<div class="selectedPosition" id="ps'+val+'"></div>');
				  },200); 
			} else if (val == "1") { 
			     $(".selectedPosition").remove();
			     setTimeout(function() {
					 $("#pb"+val).append('<div class="selectedPosition" id="ps'+val+'"></div>');
				  },200);  
			}
		  }
	   });
  });
 // Smtp Mail
 $("body").on("click", ".smtpmail", function(){
       var type = 'servertype';
	   var val = $(this).attr("data-val");
	   var data = 'f='+type+'&smtp='+val;
	   $.ajax({
		  type: "POST",
		  data: data,
		  url: requestUrl + "admin/requests/request",
		  cache: false,
		  beforeSend: function() {$("#smtpormail").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');},
		  success: function(response) {
			if (val == "smtp") { 
			     $(".usingtype").remove();
			     setTimeout(function() {
					 $("#psl_"+val).append('<div class="usingtype" id="pst_'+val+'"></div>');
				  },200); 
				  setTimeout(function() {
					  $(".preloadCom").remove();
				  },500);
			} else if (val == "mail") { 
			     $(".usingtype").remove();
			     setTimeout(function() {
					 $("#psl_"+val).append('<div class="usingtype" id="pst_'+val+'"></div>');
				  },200);  
				  setTimeout(function() {
					 $(".preloadCom").remove();
				  },500);
			}
		  }
	   });
  });
  // TLS SSL
 $("body").on("click", ".tlslss", function(){
       var type = 'tlsl';
	   var val = $(this).attr("data-val");
	   var data = 'f='+type+'&tlslssl='+val;
	   $.ajax({
		  type: "POST",
		  data: data,
		  url: requestUrl + "admin/requests/request",
		  cache: false,
		  beforeSend: function() {$("#smtpormail").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');},
		  success: function(response) {
			if (val == "ssl") { 
			     $(".usingtypetlsssl").remove();
			     setTimeout(function() {
					 $("#tlsssl_"+val).append('<div class="usingtypetlsssl" id="tlsss_'+val+'"></div>');
				  },200); 
				  setTimeout(function() {
					  $(".preloadCom").remove();
				  },500);
			} else if (val == "tls") { 
			     $(".usingtypetlsssl").remove();
			     setTimeout(function() {
					 $("#tlsssl_"+val).append('<div class="usingtypetlsssl" id="tlsss_'+val+'"></div>');
				  },200);  
				  setTimeout(function() {
					  $(".preloadCom").remove();
				  },500);
			}
		  }
	   });
  });
  // SMTP UPDATE
  $("body").on("click", ".savesSmtp", function(){
      var type = 'updateSmtp'; 
	  var smtpHost = $("#smtp_host").val();
      var smtpUsername = $("#smtp_username").val();
	  var smtppassword = $("#smtp_password").val();
	  var smtpport = $("#smtp_port").val();
	  var data = 'f='+type+'&smtphost='+smtpHost+'&smtpusername='+smtpUsername+'&smtppassword='+smtppassword+'&smtpport='+smtpport;
	  $.ajax({
		  type: "POST",
		  data: data,
		  url: requestUrl + "admin/requests/request",
		  cache: false,
		  beforeSend: function() {$("#smtpste").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');},
		  success: function(response) {
			    setTimeout(function() {
					  $(".preloadCom").remove();
				  },500);
		  }
	   });
   });
   // Save New Language
  $("body").on("click",".save_newLang", function(){
        var type = $(this).attr("data-type"); 
		var newLanguageName = $("#new_lang").val(); 
		var data = 'f='+type+'&langName='+newLanguageName;
			$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#set_lang").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#actionNewLang").append(response);
					$(".preloadCom").remove(); 
					location.reload();
					setTimeout(function() {
					   $(".error_ , .success_").remove(); 
					}, 5000); 
				}
		 }); 
    });
  // Save New Language Key
  $("body").on("click",".save_newKey", function(){
        var type = $(this).attr("data-type"); 
		var newLanguageKey = $("#new_key").val(); 
		var data = 'f='+type+'&langKey='+newLanguageKey;
			$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#set_key").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#actionNewKey").append(response);
					$(".preloadCom").remove(); 
					$("#new_key").val('');
					setTimeout(function() {
					   $(".error_ , .success_").remove(); 
					}, 5000); 
				}
		 }); 
    });
	// Delete Language
  $("body").on("click",".deletelanguage", function(){
        var type = $(this).attr("data-type"); 
		var deleteLang = $(this).attr("data-lang"); 
		var data = 'f='+type+'&deleteThisLang='+deleteLang;
			$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#set_del_lang").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#actionDelLang").append(response);
					$(".preloadCom").remove();  
					$("#"+deleteLang).remove();
					setTimeout(function() {
					   $(".error_ , .success_").remove(); 
					}, 5000); 
				}
		 }); 
    });
	//Change Main Language
	$("body").on('change', ".selecDefaultLang", function() { 
	    var type = $(this).attr("data-type");
		var defLang = $(this).val();
		var data = 'f='+type+'&dlanguage='+defLang;
		$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#actionDefLang").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#actionDefLang").append(response);
					$(".preloadCom").remove();   
					setTimeout(function() {
					   $(".error_ , .success_").remove(); 
					}, 5000); 
				}
		 }); 
	});
	// Delete color 
	$("body").on("click", ".deleteColor", function(){
	    var type = 'deleteColor';
		var colorID = $(this).attr("id");
		var data = 'f='+type+'&color='+colorID;
		$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#color_"+colorID).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove(); 
					M.toast({html: response}); 
					 
				}
		 }); 
	});
	// Add New Color
	$("body").on("click", ".save_newColor", function(){
	    var type = 'addNewColor';
		var colorCode = $("#color").val();
		var data = 'f='+type+'&color='+colorCode; 
		$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#new_color").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove();  
					M.toast({html: response}); 
					 
				}
		 }); 
	});
	// Add New google Import Font Link
	$("body").on("click",".save_newImportFonts", function(){
	   var type = 'addGoogleFontLink';	
	   var importFont = $("#googleFontImports").val();
	   var data = 'f='+type+'&importLink='+encodeURIComponent(importFont);
	   if(importFont == ''){
		   $("#googleFontImports").focus().css({'background-color':'rgb(197, 70, 71)'});  
	      return false;
	   }
	   $.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#new_fontimport").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove();  
					M.toast({html: response});  
				}
		 }); 
	});
	// Add New Font
	$("body").on("click",".save_newFont", function(){
       var type = 'addNewFont';	
	   var fontName = $("#font_name").val();
	   var fullFontCode = $("#full_fontcode").val();
	   var fontCode = $("#font_code").val();
	   var data = 'f='+type+'&font_name='+encodeURIComponent(fontName)+'&fontfullcode='+encodeURIComponent(fullFontCode)+'&fontcode='+encodeURIComponent(fontCode);
	   if(fontName === ''){
		   $("#font_name").focus().css({'background-color':'rgb(197, 70, 71)'});  
	      return false;
	   }
	   if(fullFontCode === ''){
		   $("#full_fontcode").focus().css({'background-color':'rgb(197, 70, 71)'});  
	      return false;
	   }
	   if(fontCode === ''){
		   $("#font_code").focus().css({'background-color':'rgb(197, 70, 71)'});  
	      return false;
	   }
	   $.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#new_fontimport").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove();  
					M.toast({html: response});  
				}
		 }); 
	});
	// Delete Font
	$("body").on("click",".delete_font", function(){
		var type = 'deleteFont';	
	    var fontid = $(this).attr("id");
		var data = 'f='+type+'&fontID='+fontid;
		$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#font_"+fontid).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove(); 
					M.toast({html: response});  
				}
		 }); 
	});
	// Edit Font 
	$("body").on("click",".edit_font", function(){
       var type = 'editFont';
	   var id = $(this).attr("id");	 
	   var fontNameEdit = $("#font_name_"+id).val();
	   var fullFontCodeEdit = $("#font_h"+id).val();
	   var fontCodeEdit = $("#font_code_"+id).val();
	   var data = 'f='+type+'&font_name='+encodeURIComponent(fontNameEdit)+'&fontfullcode='+encodeURIComponent(fullFontCodeEdit)+'&fontcode='+encodeURIComponent(fontCodeEdit)+'&fontid='+id; 
	   if($.trim($('#font_name_'+id).val()) == ''){  
		   $("#font_name_"+id).focus().css({'background-color':'rgb(197, 70, 71)'});  
	      return false;
	   }
	   if($.trim($('#font_h'+id).val()) == ''){  
		   $("#font_h"+id).focus().css({'background-color':'rgb(197, 70, 71)'});  
	      return false;
	   }
	   if($.trim($('#font_code_'+id).val()) == ''){ 
		   $("#font_code_"+id).focus().css({'background-color':'rgb(197, 70, 71)'});  
	      return false;
	   }
	   $.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#new_fontimport").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove();  
					M.toast({html: response});  
				}
		 }); 
	});
	//Edit and Update User Profile Details
	$("body").on("click",".save_profile_details", function(){
	    var type = $(this).attr("data-type");
		var userFullname = $("#user_full_name").val();
		var userName = $("#user_profile_name").val();
		var userWebsiteAddress = $("#user_profile_website_address").val();
		var userBiography = $("#user_profile_biography").val();
		var userLikedWord = $("#user_profile_liked_word").val();
		var userEmail = $("#user_pemail").val();
		var userID = $(this).attr("data-id");
		var data = 'f='+type+'&userfullname='+userFullname+'&username='+userName+'&userWebsite='+userWebsiteAddress+'&userbio='+userBiography+'&userWord='+userLikedWord+'&email='+userEmail+'&userID='+userID;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#psaving").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();  
				M.toast({html: response});  
			}
		 }); 
	});
	// Update personal Information
	$("body").on('change',".selectTheOption", function(){
	    var type = $(this).attr("data-type");
		var thisVal = $(this).val(); 
		var userID = $(this).attr("data-user");
		var data = 'f='+type+'&thisDetail='+thisVal+'&thisUser='+userID;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#urel").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();  
				M.toast({html: response});  
			}
		 }); 
	});	
	//Edit and Update User University and Education details
	$("body").on("click",".save_profile_business_education", function(){
	    var type = $(this).attr("data-type");
		var userJob = $("#user_job").val();
		var userworkCampanyName = $("#campany_name").val();
		var userschollUniversity = $("#scholl_university").val(); 
		var userID = $(this).attr("data-id");
		var data = 'f='+type+'&userjob='+userJob+'&workcampanyname='+userworkCampanyName+'&scholluniversity='+userschollUniversity+'&thisUser='+userID;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#psaving").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();  
				M.toast({html: response});  
			}
		 }); 
	});
	//Edit and Update New Password
	$("body").on("click",".save_new_profile_password", function(){
	    var type = $(this).attr("data-type");
		var userPass = $("#user_new_password").val(); 
		var userID = $(this).attr("data-id");
		var data = 'f='+type+'&pss='+userPass+'&thisUser='+userID;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#psaving").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();  
				M.toast({html: response});  
			}
		 }); 
	});
	// Add new Watermark
	 $("form#mywform").on("submit", function(e) { 
      e.preventDefault(); 
	   var title = $("#watermarkName").val();
	   var color = $("#textColor").val();
	   var type = 'newWatermark';
	   var file=new FormData($("form#mywform")[0]); 
       var form = new FormData(); 
	   
       form.append("stickerFile", $('input[type=file]')[0].files[0]);
       form.append("f", type);
	   form.append("title", title); 
	   form.append("textColor", color);
	  $.ajax({
			type: 'POST',
			url:  requestUrl + 'admin/requests/request',
			data: form,			 
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){},
			success: function(response){
			   $(".global_box_container_users").prepend(response);
			   $("#stickername").val(''); 
			   $('#sticker__').val(''); 
			   $(".sticker__").show();
			} 
		 }); 
		 return false;
	   });
	// Delete WaterMark
	$("body").on("click",".deleteWatermark", function(){
		  var type = 'delete_watermark';
		  var deleteThisWaterMarkID = $(this).attr("id");
		  var data = 'f='+type+'&wid='+deleteThisWaterMarkID;
		  $.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#_"+deleteThisWaterMarkID).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();   
				if(response != '200'){
				   M.toast({html: response});  
				   $("#_"+deleteThisWaterMarkID).fadeOut("normal", function() {  $(this).remove(); });
				} 
			}
		 });
	});
	//Change Profile Cover Submit
	$('body').on('change', '#logoBig', function(e) {
		e.preventDefault(); 
	    var id = $("#changebiglogo").attr("data-id");
		var data = { f: id  };
		$("#logoBig").ajaxForm({
			type: "POST",
			data: data, 
			cache: false,
		    beforeSubmit: function() {
			   $("#lgbg").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); 
			},
		    success: function(response) {
			   $(".preloadCom").remove();   
			   M.toast({html: response});  
		    },
		    error: function() {
	
		    }
		}).submit();
    }); 
	//Change Profile Cover Submit
	$('body').on('change', '#logoMini', function(e) {
		e.preventDefault(); 
	    var id = $("#changeminilogo").attr("data-id");
		var data = { f: id  };
		$("#logoMini").ajaxForm({
			type: "POST",
			data: data, 
			cache: false,
		    beforeSubmit: function() {
			   $("#lgbg").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); 
			},
		    success: function(response) {
			   $(".preloadCom").remove();   
			   M.toast({html: response});  
		    },
		    error: function() {
	
		    }
		}).submit();
    });  
	// Delete WaterMark
	$("body").on("click",".deleteEventCover", function(){
		  var type = 'delete_eventcover';
		  var deleteThisEventCoverID = $(this).attr("id");
		  var data = 'f='+type+'&wid='+deleteThisEventCoverID;
		  $.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#_"+deleteThisEventCoverID).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();   
				if(response != '200'){
				   M.toast({html: response});  
				   $("#_"+deleteThisEventCoverID).fadeOut("normal", function() {  $(this).remove(); });
				} 
			}
		 });
	});
	// Save How Many times can register one IP 
	$("body").on("click",".save_canregisterip", function(){
          var type = 'reg_ip_num';
		  var perIPAdress = $('#number_of_per_ip').val();
		  var data = 'f='+type+'&pip='+perIPAdress;
		  $.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#"+type).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();   
				if(response != '200'){
				   M.toast({html: response});  
				   $("#_"+type).fadeOut("normal", function() {  $(this).remove(); });
				} 
			}
		 });
	});
	// Save Advertisement Code
	$("body").on("click",".save_adscode", function(){
	    var type = $(this).attr("data-type");
		var code = $("#"+type).val();
		var data = 'f='+type+'&code='+code;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#"+type).after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();   
				if(response != '200'){
				   M.toast({html: response});  
				   $("#_"+type).fadeOut("normal", function() {  $(this).remove(); });
				} 
			}
		 });
	});
	// Change Active Icon
	$("body").on("click", ".iconUs", function(){
	    var type = 'change_active_icon';
		var ID = $(this).attr("data-id");
		var name = $(this).attr("data-name");
		var data = 'f='+type+'&iconID='+ID+'&iconName='+name;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#new_fontimport").after('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();   
				 
			}
		 });
	});
	 // Post Type List Position Change
 $("body").on("click", ".PositionBoxMenu", function(){
       var type = 'menuPosition';
	   var val = $(this).attr("data-val");
	   var data = 'f='+type+'&position='+val;
	   $.ajax({
		  type: "POST",
		  data: data,
		  url: requestUrl + "admin/requests/request",
		  cache: false,
		  beforeSend: function() {},
		  success: function(response) {
			if (val == "0") { 
			     $(".selectedPosition").remove();
			     setTimeout(function() {
					 $("#pb"+val).append('<div class="selectedPosition" id="ps'+val+'"></div>');
				  },200); 
			} else if (val == "1") { 
			     $(".selectedPosition").remove();
			     setTimeout(function() {
					 $("#pb"+val).append('<div class="selectedPosition" id="ps'+val+'"></div>');
				  },200);  
			}
		  }
	   });
  });
  // Add new Slider Image
	 $("form#mywSlider").on("submit", function(e) { 
      e.preventDefault(); 
	   var title = $("#slider_redirect_url").val();
	   var color = $("#marketCategory").val();
	   var type = 'newSlider';
	   var file=new FormData($("form#mywSlider")[0]); 
       var form = new FormData(); 
	   
       form.append("sliderImage", $('input[type=file]')[0].files[0]);
       form.append("f", type);
	   form.append("sliderURL", title); 
	   form.append("marketCategory", color);
	  $.ajax({
			type: 'POST',
			url:  requestUrl + 'admin/requests/request',
			data: form,			 
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){},
			success: function(response){
			   $(".global_box_container_users").prepend(response);
			   $("#stickername").val(''); 
			   $('#sticker__').val(''); 
			   $(".sticker__").show();
			} 
		 }); 
		 return false;
	   });
	   // Delete WaterMark
	$("body").on("click",".deleteadslid", function(){
		  var type = 'delete_slidads';
		  var deleteThisWaterMarkID = $(this).attr("id");
		  var data = 'f='+type+'&wid='+deleteThisWaterMarkID;
		  $.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#_"+deleteThisWaterMarkID).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				$(".preloadCom").remove();   
				if(response != '200'){
				   M.toast({html: response});  
				   $("#_"+deleteThisWaterMarkID).fadeOut("normal", function() {  $(this).remove(); });
				} 
			}
		 });
	});
	// Edit Font 
	$("body").on("click",".edit_market_t", function(){
       var type = 'editMarketThemeDescription';
	   var id = $(this).attr("id");	 
	   var themeType = $("#marketThemeType"+id).val(); 
	   var themeName = $("#them_name_"+id).val();
	   var themePrice = $("#theme_pric_"+id).val();
	   var data = 'f='+type+'&themeType='+themeType+'&themename='+themeName+'&themePrice='+themePrice+'&themeID='+id;
	    $.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#new_fontimport").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove();  
					M.toast({html: response});  
				}
		 });
	});
	// Save New Market Theme
	$("body").on("click",".save_newmtm", function(){
	    var type = 'newMarketThemeadd';
		var marketThemeName = $("#marketThemeName_").val();
		var marketThemeType = $("#marketThemeType").val();
		var marketThemeCategory = $("#marketThemeCategory").val();
		var marketThemePrice = $("#theemprie").val();
		var data = 'f='+type+'&tName='+marketThemeName+'&ttype='+marketThemeType+'&tprice='+marketThemePrice+'&marketThemeCategory='+marketThemeCategory;
		 $.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { 
				     $("#new_fontimport").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); 
				},
				success: function(response) {   
					 $(".preloadCom").remove();  
					 M.toast({html: response});  
				}
		 });
	});
	// Delete Market Theme
	$("body").on("click",".delete_mar_them", function(){
		var type = 'deleteMarketTheme';	
	    var fontid = $(this).attr("id");
		var data = 'f='+type+'&fontID='+fontid;
		$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#font_"+fontid).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				    $("#color_").remove();
					$(".preloadCom").remove(); 
					M.toast({html: response});  
				}
		 }); 
	});
	$("body").on("click", ".delete_lng", function(){
      var langID = $(this).attr("id");//Get Comment id
	  var thePopUpType = $(this).attr("data-type"); 
	  var popUpComment = 'popUp='+thePopUpType+'&langID='+langID;
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
	// Delete Declined Stripe Subscribtion
	$("body").on("click",".delete_this_lang_key", function(){
	    var type = $(this).attr("data-type");
		var ID = $(this).attr("id"); 
		var data = 'f='+type+'&key='+ID;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#post"+ID).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$("#post_"+ID).remove();
				$(".confirmBoxContainer").remove();
			}
		 });
	});
	// PayPal Emails
	$("body").on("click",".save_paypal_emails", function(){
	    var mode = 'paypal_email';
		var sendbox_mail = $("#paypal_sendbox_e").val();
		var business_email = $("#paypal_business_e").val();
		var data = 'f='+mode+'&sm='+sendbox_mail+'&bm='+business_email;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#set_paypal").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
	});
	// Save IyziCo Keys
	$("body").on("click",".save_iyzico_keys", function(){
	    var mode = 'iyzicokeys';
		var itestingsecretkey = $("#iyzico_tsk").val();
		var itestingapikey = $("#iyzico_tapk").val();
		var iliveapikey = $("#iyzico_lapk").val();
		var ilivesecretkey = $("#iyzico_lsk").val();
		var data = 'f='+mode+'&tsk='+itestingsecretkey+'&tapk='+itestingapikey+'&lapk='+iliveapikey+'&lsk='+ilivesecretkey;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#setapi").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
	});
	// Save BitPay Infos
	$("body").on("click",".save_bitpay_infos", function(){
	    var mode = 'bitpay_update';
		var bitpay_notification_email = $("#bitpayemail").val();
		var bitpay_password = $("#bitpypass").val();
		var bitpay_pairing_code = $("#bitpaypairingcode").val();
		var bitpay_pairing_label = $("#bitpaylabel").val();
		var data = 'f='+mode+'&bitemail='+encodeURIComponent(bitpay_notification_email)+'&bitpass='+encodeURIComponent(bitpay_password)+'&bitpairing='+bitpay_pairing_code+'&bitlabel='+bitpay_pairing_label;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#setapi").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
	});
	// Save AuthorizeNet Infos
	$("body").on("click",".save_authorize_infos", function(){
	    var mode = 'authorize_update';
		var authorizetestapiid = $("#authorizetestapiid").val();
		var authorizetesttransactionkey = $("#authorizetesttransactionkey").val();
		var authorizeliveapiid = $("#authorizeliveapiid").val();
		var authorizelivetransactionkey = $("#authorizelivetransactionkey").val();
		var data = 'f='+mode+'&atestapiid='+authorizetestapiid+'&atesttransactionkey='+authorizetesttransactionkey+'&aliveapiid='+authorizeliveapiid+'&alivetransactionkey='+authorizelivetransactionkey;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#setapi").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
	});
	// Save PayStack Infos
	$("body").on("click",".save_paystack_infos", function(){
	    var mode = 'paystack_update';
		var paystacktestsecretkey = $("#paystacktestsecretkey").val();
		var paystacktestpublickey = $("#paystacktestpublickey").val();
		var paystacklivesecretkey = $("#paystacklivesecretkey").val();
		var paystacklivepublickey = $("#paystacklivepublickey").val();
		var data = 'f='+mode+'&ptestsecretkey='+paystacktestsecretkey+'&ptestpublickey='+paystacktestpublickey+'&plivesecretkey='+paystacklivesecretkey+'&plivepublickey='+paystacklivepublickey;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#setapi").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
	});
	// Save Stripe Infos
	$("body").on("click",".save_stripe_infos", function(){
	    var mode = 'stripe_update';
		var stripetestsecretkey = $("#stripetestsecretkey").val();
		var stripetestpublickey = $("#stripetestpublickey").val();
		var stripelivesecretkey = $("#stripelivesecretkey").val();
		var stripelivepublickey = $("#stripelivepublickey").val();
		var data = 'f='+mode+'&stestsecretkey='+stripetestsecretkey+'&stestpublickey='+stripetestpublickey+'&slivesecretkey='+stripelivesecretkey+'&slivepublickey='+stripelivepublickey;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#setapi").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
	});
	// Save RazorPay Infos
	$("body").on("click",".save_razorpay_infos", function(){
	    var mode = 'razorpay_update';
		var razortestkeyid = $("#razortestkeyid").val();
		var razortestsecretkey = $("#razortestsecretkey").val();
		var razorlivekeyid = $("#razorlivekeyid").val();
		var razorlivesecretkey = $("#razorlivesecretkey").val();
		var data = 'f='+mode+'&ratestid='+razortestkeyid+'&ratestsecret='+razortestsecretkey+'&ralivekey='+razorlivekeyid+'&ralivesecret='+razorlivesecretkey;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#setapi").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {   
				//$(".preloadCom").remove(); 
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
	});
	// Updae Page
$("body").on("click",".update_page", function(){
    var type = $(this).attr("data-type");
	var pageCodes = $("#pageCodes").val();
	var sattus = $(this).attr('data-status');
	var data = 'f='+type+'&pageCode='+encodeURIComponent(pageCodes)+'&sttype='+sattus;
	$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#updateLoad").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');  },
			success: function(response) {    
				M.toast({html: response});  
				$(".preloadCom").remove(); 
			}
		 });
 });
 /*Save New Pro Package*/
 $("body").on("click",".save_newProPackage", function(){
	   var type = 'newpropackage';
	   var propackagetitle = $("#newpackageTitle").val();
	   var propackageDescription = $("#newpackageDescription").val();
	   var propackageAmount = $("#newpackageAmount").val();
	   var propackageIcon = $("#newpackageIcon").val();
	   var propaidevery = $("#newpaidevery").val();
	   var prodayweekmonthyear = $("select#dwmy option").filter(":selected").val();
	   var data = 'f='+type+'&prtitle='+propackagetitle+'&prdesc='+propackageDescription+'&popackamount='+propackageAmount+'&propacicon='+encodeURIComponent(propackageIcon)+'&proevery='+propaidevery+'&prodwmy='+prodayweekmonthyear;
	   $.ajax({
	   type: 'POST',
	   url: requestUrl + "admin/requests/request",
	   data: data,
	   cache: false,
	   beforeSend: function(){
	        $("#pronew").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
	   },
	   success: function(response){
		   if(response == 200){
		       location.reload();
		   }else{
		      $("body").append(response);
		   }
		   $(".preloadCom").remove(); 
	   }
	   });
  });
// Change Feature Open/Close
  $("body").on("click", ".prav", function() {
    var value = $(this).val();
    var id = $(this).attr("data-type");
    var aID = $(this).attr("data-id");
    var data = "f=" + id + "&mode=" + value+ "&thisid=" + aID;
    $.ajax({
      type: "POST",
      data: data,
      url: requestUrl + "admin/requests/request",
      cache: false,
      beforeSend: function() {},
      success: function(response) {
        if (value == "0") {
          $("#avantage_status" + aID).val("1");
        } else if (value == "1") {
          $("#avantage_status" + aID).val("0");
        }
      }
    });
  });
    //Confirm Dialog  for Delete comment
  $("body").on("click", ".delproty", function(){ 
	  var thePopUpType = $(this).attr("data-type");
	  var theid = $(this).attr("id");//Get Comment id 
	  var data = 'popUp='+thePopUpType+'&prid='+theid;
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
$("body").on("click",".delete_this_protype", function(){
    var type = $(this).attr("data-type");
	var id = $(this).attr("id");
	var data = 'f='+type+'&prid='+id;
	$.ajax({
		  type: "POST",
		  url: requestUrl + 'admin/requests/request',
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
/*Update Max Points*/
$("body").on("click",".save_point_maxs", function(){
    var type = $(this).attr("data-type");
	var hmpetod = $("#hmpetod").val(); /*How much point equal to one dolar*/
	var tmnopucgpd = $("#tmnopucgpd").val(); /*The maximum number oof points user can get per day*/
	var data = 'f='+type+'&hmpetod='+hmpetod+'&tmnopucgpd='+tmnopucgpd;
	$.ajax({
		  type: "POST",
		  url: requestUrl + 'admin/requests/request',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 $("#newmaxpoints").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(response) {
			  $("#preloadCom").remove(); 
			  M.toast({html: response}); 
		  }
		});
}); 
/*How Point*/
$("body").on("click",".savePointSystemPoints", function(){
      var type = $(this).attr("data-type");
	  var howmanypointonelike = $("#how_many_point_one_like").val();
	  var howmnypointonecomment = $("#how_many_point_one_comment").val();
	  var howmanypointonepost = $("#how_many_point_one_post").val();
	  var howmanypointonestorie = $("#how_many_point_one_storie").val();
	  var howmanypointonevote = $("#how_many_point_one_vote").val(); 
	  var data = 'f='+type+'&hmpol='+howmanypointonelike+'&hmpoc='+howmnypointonecomment+'&hmpop='+howmanypointonepost+'&hmpos='+howmanypointonestorie+'&hmpov='+howmanypointonevote;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + 'admin/requests/request',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 $("#newmaxpoints").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(response) {
			  $("#preloadCom").remove(); 
			  M.toast({html: response}); 
		  }
		});
});
/**/
$("body").on("change",".changeCurrency", function(){
	   var type = $(this).attr("data-type"); 
	   var currency = $(this).val();  
	   var data = 'f='+type+'&crncy='+currency;
	   $.ajax({
	     type: 'POST',
		 url: requestUrl + 'admin/requests/request',
		 data: data,
		 cache: false,
		 beforeSend: function(){$("#set_paypal").append('<span class="preloadCom_2"><span class="progress"><span class="indeterminate"></span></span></span>');},
		 success: function(response){
		      if(response){ 
				   setTimeout(function() {
					  $(".preloadCom_2").remove();  
				  },2000); 
			  }
			  M.toast({html: response}); 
		 } 
	  });
   });
   //Change Main Language
	$("body").on('change', ".selectDefaultTheme", function() { 
	    var type = $(this).attr("data-type");
		var defThem = $(this).val();
		var data = 'f='+type+'&dthm='+defThem;
		$.ajax({
				type: 'POST',
				url: requestUrl + "admin/requests/request",
				data: data,
				cache: false,
				beforeSend: function() { $("#dflng").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
				success: function(response) {  
				     
					$(".preloadCom").remove();   
					M.toast({html: response});  
				}
		 }); 
	});
}); 
 