<div class="page_title bold"><?php echo $page_Lang['generate_fake_users'][$dataUserPageLanguage]; ?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['generate_fake_users'][$dataUserPageLanguage];?></div>
       
        <div class="row-box-container" id="set_profile">
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['generate_unlimited_fake_user'][$dataUserPageLanguage];?></span> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['how_many_user_you_want_to_generate'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="number" class="column_inputField chng" id="fake_users_number" placeholder="<?php echo $page_Lang['type_fake_user_number'][$dataUserPageLanguage];?>" value="5"></div>
                   <span class="setSettingBoxInfoNote" id="fnum" style="display:none; color:#e53935;"><?php echo $page_Lang['type_fake_user_number'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!---->
               <span class="setting-box">  
                   <span class="setSettinginputTitle"><?php echo $page_Lang['password_for_fake_users'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="fake_users_password" placeholder="<?php echo $page_Lang['type_fake_user_password'][$dataUserPageLanguage];?>"></div>
                   <span class="setSettingBoxInfoNote" id="fpass" style="display:none; color:#e53935;"><?php echo $page_Lang['type_fake_user_password'][$dataUserPageLanguage];?></span>
               </span>
               <!---->
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue create_fake_users"  data-type="fake_generaator"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!---->
        </div>
        
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $("body").on("click",".create_fake_users", function(){
       var type = $(this).attr("data-type");
	   var fakeUserNumber = $("#fake_users_number").val();
	   var fakeUsersPassword = $("#fake_users_password").val();
	   var data = 'f='+type+'&n='+fakeUserNumber+'&p='+fakeUsersPassword;
	   if(fakeUserNumber.length === 0){
		   $("#fnum").show();
	      return false;
	   }else{
	       $("#fnum").hide();
	   }
	   if(fakeUsersPassword.length === 0){
		   $("#fpass").show();
	      return false;
	   }else{
	       $("#fpass").hide();
	   }
	   $.ajax({
		  type: "POST",
		  url: requestUrl + 'admin/requests/request',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 $("#set_profile").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(response) {
			  $(".preloadCom").remove(); 
			  M.toast({html: response}); 
		  }
		});
   });
});
</script>