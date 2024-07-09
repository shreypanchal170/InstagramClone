// JavaScript Document
$(document).ready(function() {
 //Active page link from settings page
   var pathname = (window.location.pathname.match(/[^\/]+$/)[0]); 
   $(".admin_menu_item").removeClass("activeSetting");
   $("#_"+pathname).addClass("activeSetting active");
   $("#__"+pathname).addClass("active_icon"); 
   $("#___"+pathname).addClass("activeIconBold");  
   $("body").on("change keyup", ".chng", function(){
    $("#set_website").show();
  });
  $(".lang_value").livequery(function() { 
	$(this).autoResize({minRows: 3});
  });
  $('.collapsible').collapsible();   
  /*Save Website Settings*/
  $("body").on("click", ".save_websitesettings", function(){
    var type = $(this).attr("data-type"); 
	var webname = $("#website_name").val(); 
	var webkeywords = $("#write_site_keywords").val();
	var webinfo = $("#write_site_information").val(); 
	var datawebdetails = 'f='+type+'&wn='+webname+'&ww='+webkeywords+'&wi='+webinfo;
	var nonempty = $('.chng').filter(function() { return this.value != ''});
	//Check url is valid
	if(nonempty.length == 0){
	    M.toast({html: SomethingWrong , classes: 'warning'});
	}else{
		 $("#set_profile").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
	     setTimeout(function() {
               $(".preloadCom").remove();
			   $("#set_website").hide();
         }, 2000); 
	}
  });  
  /*Get Maintenance Mode*/
  $("body").on("click","#maintenance", function(){
      var type= $(this).attr("data-type");
	  var changeto = $(this).attr("data-maintenance");
	  var dataMaintenance = 'f='+type+'&change='+changeto;
	  if($.trim(changeto).length == 0){
	      M.toast({html: SomethingWrong , classes: 'warning'}); 
	  }else{
		  $("#set_site_setting").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
	     if(changeto == 0){
			   $(this).attr("data-maintenance", '1')
		   }
		   if(changeto == 1){
			   $(this).attr("data-maintenance", '0')
		   }
		    setTimeout(function() {
               $(".preloadCom").remove(); 
            }, 2000); 
	}
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
	      M.toast({html: SomethingWrong , classes: 'warning'});
	  }else{ 
		  $(".body"+u_id).addClass("removeCom");
		  $(".reportPostContainer").remove();
			setTimeout(function() {
			   $(".body"+u_id).fadeOut("normal", function() {
					  $(this).remove();
			   });  
		   }, 500); 
	  }
   }); 
   //Confirm Dialog  for Post Delete
  $("body").on("click", ".del_data_user", function(){
      var userID = $(this).attr("id");//Get Comment id 
	  $("body").append('<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'+ sureWanttoDeleteThisUser +'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'+cancel+'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_user" data-user="'+userID+'"  data-type="deleteUser"><span>'+sure+'</span></button></div></div></div></div></div>');
  });
   //Confirm Dialog  for Remove User Block
  $("body").on("click", ".remove_block_data_user", function(){
      var userID = $(this).attr("id");//Get Comment id 
	  $("body").append('<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'+ sureWanttoRemoveBlock +'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'+cancel+'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue remove_blocked_user_list" data-user="'+userID+'"  data-type="unblockUserPopUp"><span>'+sure+'</span></button></div></div></div></div></div>');
  });
  //Confirm Dialog  for Post Delete
  $("body").on("click", ".delete_user_post_alert", function(){
      var postID = $(this).attr("data-post");//Get Comment id
	  var postUserID = $(this).attr("data-u");//Get Comment UserName 
	  $("body").append('<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'+ sureWanttoDeleteThisPost +'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'+cancel+'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_post_now" data-post="'+postID+'" data-user="'+postUserID+'" data-type="deletePost_data"><span>'+sure+'</span></button></div></div></div></div></div>');
  });
  // Delete User 
  $("body").on("click", ".delete_this_user", function(){
	   var type = $(this).attr("data-type");
	   var deleteUserID = $(this).attr("data-user");
	   var deleteData = 'f='+type+'&user='+deleteUserID;
	   $(".body"+deleteUserID).addClass("removeCom");
		$(".confirmBoxContainer").remove();
		  setTimeout(function() {
			 $(".body"+deleteUserID).fadeOut("normal", function() {
					$(this).remove();
			 });  
		 }, 500);
   });  
   // Remove Block From Data
   $("body").on("click",".remove_blocked_user_list",  function(){
       var type = $(this).attr("data-type");
	   var blockedUserID = $(this).attr("data-user");
	   var removeBlockedData = 'f='+type+'&user='+blockedUserID;
	    $(".body"+blockedUserID).addClass("removeCom");
		$(".confirmBoxContainer").remove();
		  setTimeout(function() {
			 $(".body"+blockedUserID).fadeOut("normal", function() {
					$(this).remove();
			 });  
		 }, 500);
   });  
   //  Delete Post
   $("body").on("click",".delete_this_post_now",  function(){
       var type = $(this).attr("data-type");
	   var postID = $(this).attr("data-post");
	   var postUserID = $(this).attr("data-user");
	   var deleteThisPost = 'f='+type+'&user='+postUserID+ '&postID='+postID;
	    $("#post_"+postID).addClass("removeCom");
		$(".confirmBoxContainer").remove();
		  setTimeout(function() {
			 $("#post_"+postID).fadeOut("normal", function() {
					$(this).remove();
			 });  
		 }, 5000); 
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
		$("#rep_type"+id).removeClass("no").addClass("yes").text(reportChecked);
	});
	//Confirm Dialog  for Post Delete
  $("body").on("click", ".rep_del", function(){
      var postrID = $(this).attr("id");//Get Comment id
	  var postID = $(this).attr("data-post");//Get Comment UserName 
	  $("body").append('<div class="confirmBoxContainer"><div class="ConfirmBoxWrapper"><div class="ConfirmBoxMiddle"><div class="are_you_sure">'+ sureWanttoDeleteThisPost +'</div><div class="confirmButtons"><div class="tab_frame"><button class="ui_button btn_0 chrome " data-btn-id="0"><span>'+cancel+'</span></button></div><div class="tab_frame focus init_focus"><button class="ui_button btn_1 chrome blue delete_this_reported_post_now" id="'+postrID+'" data-post="'+postID+'" data-type="report_delete"><span>'+sure+'</span></button></div></div></div></div></div>');
  });
/*Delete Report*/
  $("body").on("click", ".delete_this_reported_post_now", function(){
	 var type = $(this).attr("data-type");
	 var id = $(this).attr("id");
	 var reportedPostid = $(this).attr("data-post"); 
	 $("#post_"+id).addClass("removeCom"); 
	 $(".confirmBoxContainer").remove();
	  setTimeout(function() {
		 $("#post_"+id).fadeOut("normal", function() {
				$(this).remove();
		 });  
	 }, 500);
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
		    $("#"+thisID+'_').after('<div class="change_langeage_keys" id="_'+thisID+'" data-ln="'+thisID+'" data-type="langkeys"><div class="control left_btn"></div><div class="control right_btn"><div class="share_post_box">Save</div></div></div>'); 
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
		  $(".peepr-drawer-container").addClass("drawer_close");
		  $(".poStListmEnUBox").addClass("closeBoxFix");
			 setTimeout(function() {
				$(".poStListmEnUBox").remove();
				$("#word_"+language_id).html(new_word);
				M.toast({html: wordChanged , classes: 'green_not'});
		  }, 900); 
	});
});