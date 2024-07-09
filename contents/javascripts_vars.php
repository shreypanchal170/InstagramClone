<script type="text/javascript" src="<?php echo $base_url;?>js/readmore.js "></script>  
<script type="text/javascript">
var requestUrl =   "<?php echo $base_url;?>"; 
var token_id = '<?php echo $_SESSION['token_id'];?>';
var sureWanttoDeleteThisComment =  "<?php echo $page_Lang['delete_comment_sure'][$dataUserPageLanguage];?>";
var sureWanttoDeleteThisPost = "<?php echo $page_Lang['sure_want_to_delete_this_post'][$dataUserPageLanguage];?>"; 
var roger =  "<?php echo $page_Lang['roger_ok'][$dataUserPageLanguage];?>";
var reportSendedText =  "<?php echo $page_Lang['report_already_sended'][$dataUserPageLanguage];?>";
var cancel =  "<?php echo $page_Lang['cancel'][$dataUserPageLanguage];?>";
var sure =  "<?php echo $page_Lang['sure_delete'][$dataUserPageLanguage];?>"; 
var ForgotChooseReportType =  "<?php echo $page_Lang['forgot_report_type'][$dataUserPageLanguage];?>"; 
var selectedNightMode =  "<?php echo $page_Lang['night_mode'][$dataUserPageLanguage];?>";
var selectedDayMode =  "<?php echo $page_Lang['day_mode'][$dataUserPageLanguage];?>";
var visitLinkText =  "<?php echo $page_Lang['visit_story_profile'][$dataUserPageLanguage];?>"; 
var disableComment =  "<?php echo $page_Lang['disable_comment_feature'][$dataUserPageLanguage];?>";
var enableComment =  "<?php echo $page_Lang['enable_comment_feature'][$dataUserPageLanguage];?>";
var minAmonth =  "<?php echo $page_Lang['amonth_least'][$dataUserPageLanguage];?> <?php echo $minMonth.$scurrency;?>";
var wrongfe =  "<?php echo $page_Lang['wrong_fee'][$dataUserPageLanguage];?>";
var adsSuccess =  "<?php echo $page_Lang['ad_created_success_wait_mail'][$dataUserPageLanguage];?>";
var noenoughCredit =  "<?php echo $page_Lang['no_credit_enough'][$dataUserPageLanguage];?>";
var noenoughbudget =  "<?php echo $page_Lang['no_credit_budget'][$dataUserPageLanguage];?>";
var ShowImagesA =  "<?php echo $page_Lang['show_hide_image'][$dataUserPageLanguage];?>";
var HideImagesA =  "<?php echo $page_Lang['show_hide_image_hide'][$dataUserPageLanguage];?>";
var ChoseSelfTime =  "<?php echo $page_Lang['choose_self_destruct_time'][$dataUserPageLanguage];?>";
var selfSecond =  "<?php echo $page_Lang['self_second'][$dataUserPageLanguage];?>";
var selfMinute =  "<?php echo $page_Lang['self_minute'][$dataUserPageLanguage];?>";   
var seenItAll = "<?php echo $page_Lang['seen_it_all'][$dataUserPageLanguage];?>";
var seeProduct = "<?php echo $page_Lang['show_product'][$dataUserPageLanguage];?>";
var hideProduct = "<?php echo $page_Lang['hide_product'][$dataUserPageLanguage];?>"; 

 
$(function() {
    //caches a jQuery object containing the header element
    var headera = $(".header_container");
	var headerIn = $(".header_in");
	var headerLogo = $(".aU2HW");
	var headerMenu = $(".headerMenu");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 77) {  
            headera.addClass("aUCRo");
			headerIn.addClass("buoMu");
			headerLogo.addClass("topico");
			headerMenu.addClass("top_menu");
        } else {
            headera.removeClass("aUCRo");
			headerIn.removeClass("buoMu");
			headerLogo.removeClass("topico");
			headerMenu.removeClass("top_menu");   
        }
    });
}); 
$(document).ready(function(){
$(".swiper-container").livequery(function() {
    var swiper = new Swiper(this, {
      slidesPerView: 4,
      spaceBetween: 5,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 3,
          spaceBetween: 5,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 5,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 5,
        },
      }
    });
 });
 
});
</script>
<script type="text/javascript">
function testTheiaStickySidebars() {
    var me = {};
    me.scrollTopStep = 1;
    me.currentScrollTop = 0;
    me.values = null;

    window.scrollTo(0, 1);
    window.scrollTo(0, 0);

    $(window).scroll(function(me) {
        return function(event) {
            var newValues = [];
            
            // Get sidebar offsets.
            $('.theiaStickySidebar').each(function() {
                newValues.push($(this).offset().top);
            });
            
            if (me.values != null) {
                var ok = true;
                
                for (var j = 0; j < newValues.length; j++) {
                    var diff = Math.abs(newValues[j] - me.values[j]);
                    if (diff > 1) {
                        ok = false;
                        
                        console.log('Offset difference for sidebar #' + (j + 1) + ' is ' + diff + 'px');
                        
                        // Highlight sidebar.
                        $($('.theiaStickySidebar')[j]).css('background', 'yellow');
                    }
                }
                
                if (ok == false) {                    
                    // Stop test.
                    $(this).unbind(event);
                    
                    alert('Bummer. Offset difference is bigger than 1px for some sidebars, which will be highlighted in yellow. Check the logs. Aborting.');
                    
                    return;
                }
            }
            
            me.values = newValues;
            
            // Scroll to bottom. We don't cache ($(document).height() - $(window).height()) since it may change (e.g. after images are loaded).
            if (me.currentScrollTop < ($(document).height() - $(window).height()) && me.scrollTopStep == 1) {
                me.currentScrollTop += me.scrollTopStep;
                window.scrollTo(0, me.currentScrollTop);
            }
            // Then back up.
            else if (me.currentScrollTop > 0) {
                me.scrollTopStep = -1;
                me.currentScrollTop += me.scrollTopStep;
                window.scrollTo(0, me.currentScrollTop);
            }
            // Then stop.
            else {                    
                $(this).unbind(event);
                
                alert("Great success!");
            }
        };
    }(me));
}
	$(document).ready(function() {
		if($(window).width() > 915){
		  $('.theiaSidebar')
			.theiaStickySidebar({
				additionalMarginTop: 30
	      });
		}
	});
$(window).resize(function() {
  if($(window).width() < 915){
      $(".COOzN").removeClass('theiaSidebar');
	  $(".COOzN , .theiaStickySidebar").removeAttr('style');
  }else{
      $(".COOzN").addClass('theiaSidebar');
  } 
});
</script>
<?php if($page == 'newsfeed' || $page = 'profile'){?>
<!--<script type="text/javascript" src="<?php echo $base_url;?>js/bfaf.js"></script> 
<script type="text/javascript">    
   var MyComparison = new OBFAF();   
</script>-->
<script type="text/javascript" src="<?php echo $base_url;?>js/bfaf/images-compare.js"></script> 
<script type="text/javascript" src="<?php echo $base_url;?>js/bfaf/hammer.min.js"></script> 
<script type="text/javascript">     
   $(document).ready(function(){
	 $(".js-img-compare").livequery(function() {
		var imagesCompareElement = $(this).imagesCompare();  
	  });  
   });
</script>
<?php }?>
<?php if($videoAutoPlayStatus == true){?>
<script type="text/javascript">
$(document).ready(function(){
   //
$(".vidchaVideo").prop("checked", true); // Initially set to autoplay on
	var videos = $('video'), // All videos element
		allVidoesVisenseObj = [];
	var monitorVideo = function(video){ //Handler for each video element
		var visibility = VisSense(video, { fullyvisible: 0.75 }),
			visibility_monitor = visibility.monitor({
				fullyvisible: function(e) {  
					video.play(); 
				    videos.prop('muted',<?php if($videoSoundOpenStatus == true){echo 'false';}else{echo 'true';}?>);
						 var videoid = $(video).attr('data-id');   
						 var type = 'afterads'; 
						 if($("#afterVideoAds" + videoid).length == 0) {
							 var data = 'f='+type+'&afID='+videoid; 
							 $.ajax({
								   type: 'POST',
								   url: requestUrl + 'requests/activity',
								   data: data, 
								   beforeSend: function(){},
								   success: function(html){ 
									   if($("#afterVideoAds" + videoid).length == 0) {
										    var videoDuration = video.duration;
											var ShowAdsAfter = (videoDuration / 2)*1000; 
										    var num = (ShowAdsAfter).toFixed(0);
											setTimeout(function() {
												$('#videoPlayer'+videoid).after('<div class="progress-bar-ads-time theBari"><span class="progress-ads-time progress-prog-ads-time"></span></div>'); 
												//video.pause(); 
											 }, num-3000);
											 setTimeout(function() { 
												$('#videobox'+videoid).append(html);   
											 }, num);    
									  }
								   }
							   }); 
							} else {
							    $('.afterVideoAds'+videoid).remove();
								$('.theBari').remove();
							}
					  
				}, 
				hidden: function(e) {
					video.pause(); 
				}
			}).start();
		return {
			visMonitor : visibility_monitor,
			monitorStop : function(){
				this.visMonitor.stop();
			},
			monitorStart : function(){
				this.visMonitor.start();  
			}
		};
	};
	videos.each(function( index ) {
		var monitorVids = monitorVideo(this);  
		allVidoesVisenseObj.push(monitorVids); 
	}); 
	$(".vidchaVideo").change(function(){ // On change element for on/off autoplay Videos
		var checkedCond = $(this).is(":checked");
		if(checkedCond){
			$.each(allVidoesVisenseObj, function(index, value){
				value.monitorStart(); 
			});
		}else{
			$.each(allVidoesVisenseObj, function(index, value){
				value.monitorStop();
			});
		}
	});  
	$("body").on("click",".mute_btn_ob", function(){
		var id = $(this).attr("id");
		var thisvideo = $(".el_"+id);
		thisvideo.prop('muted', false);
		thisvideo.prop("volume", 1);
		$(this).removeClass("mute_btn_ob").addClass("unmute_btn_ob"); 
	}); 
	$("body").on("click",".unmute_btn_ob", function(){
		var id = $(this).attr("id");
		var thisvideo = $(".el_"+id);
		thisvideo.prop('muted', true);
		thisvideo.prop("volume", 0);
		$(this).removeClass("unmute_btn_ob").addClass("mute_btn_ob");
	});  
});
</script>
<?php }?>