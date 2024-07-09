<div class="page_title bold">
  <?php echo $page_Lang['manage_event_covers'][$dataUserPageLanguage];?>
</div>
<div class="global_right_wrapper">
  <div class="global_box_container_w bgc">
    <div class="general_settings_header_title">
      <?php echo $page_Lang['add_new_event_cover'][$dataUserPageLanguage];?>
    </div>
    <div class="row-box-container" id="set_lang">
      <span id="actionNewLang" class="elaction"></span>
      <form name="myForm" id="myevform" action="" method="POST" enctype="multipart/form-datam">
        <span class="setting-box">
                    <!---->
                    <span class="file-field input-field">
                      <div class="btn">
                        <span><?php echo $page_Lang['select_image'][$dataUserPageLanguage];?></span>
        <input type="file" name="eventCoverName">
    </div>
    </span>
    <!---->
    <span class="setSettingBoxInfoNote"><?php echo $page_Lang['most_suitable_size'][$dataUserPageLanguage];?></span>
    </span> 
  <!---->
  <div class="setting-box">
    <div class="column-set_input_box">
      <button class="btn waves-effect waves-light blue"><?php echo $page_Lang['save_news'][$dataUserPageLanguage];?> </button>
    </div>
  </div>
  <!---->
  </form>

</div>
</div>
<div class="global_box_container">
  <div class="global_box_container_users" id="moreType" data-type="moreEventCovers">
    <?php 
					     $LastEventCoverID = isset($_POST['eventCoverID']) ? $_POST['eventCoverID'] : ''; 
					     $allEventCovers = $Dot->Dot_AdminEventCoverLists($LastEventCoverID); 
						 if($allEventCovers){
						     foreach($allEventCovers as $eventCoverData){
							       $eventCover_id = $eventCoverData['e_cover_id'];
								   $eventCover_image = $eventCoverData['e_cover_image']; 
							       $ec_Image = $base_url.'uploads/event__type_covers/'.$eventCover_image;	 
					              include("html_event_covers.php");
					     }
						 } 
				 ?>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    // Add new Watermark
	 $("form#myevform").on("submit", function(e) { 
      e.preventDefault();  
	   var type = 'newEventCover';
	   var file=new FormData($("form#myevform")[0]); 
       var form = new FormData(); 
	   
       form.append("eventCoverName", $('input[type=file]')[0].files[0]);
       form.append("f", type);  
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
			   $('#myevform').trigger("reset");
			} 
		 }); 
		 return false;
	   });
  });
</script>