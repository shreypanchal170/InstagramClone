<div class="search_user_filter_container openSocial">
  <div class="shareonSocial">
    <div class="search_user_filter_Header"><?php echo $page_Lang['edit_pro_package'][$dataUserPageLanguage];?>
      <div class="search_user_filter_close_icon_sv closethisBox"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
    </div>
    <div class="search_user_filter_wrap">
      <!--STARTED-->
      <!---->
      <span class="setting-box"> 
             <span class="setSettinginputTitle"><?php echo $page_Lang['newpackagetitle'][$dataUserPageLanguage];?></span>
      <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="updatepackageTitle" value="<?php echo $ItemPriceType;?>" placeholder="<?php echo $page_Lang['propackagetitlelanguagekeyhere'][$dataUserPageLanguage];?>"></div>
      </span>
      <!---->
      <!---->
      <span class="setting-box"> 
             <span class="setSettinginputTitle"><?php echo $page_Lang['newpackagedescription'][$dataUserPageLanguage];?></span>
      <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="updatepackageDescription" value="<?php echo $ItemPriceInfo;?>" placeholder="<?php echo $page_Lang['newpropackagedescription'][$dataUserPageLanguage];?>"></div>
      </span>
      <!---->
      <!---->
      <span class="setting-box"> 
             <span class="setSettinginputTitle"><?php echo $page_Lang['paid_every_title'][$dataUserPageLanguage];?> (<span style="font-size:12px;font-weight:300;color:#e53935;"><?php echo $page_Lang['paid_every_note'][$dataUserPageLanguage];?></span>)</span>
      <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="updatepaidevery" value="<?php echo $ItemPriceTime;?>" placeholder="<?php echo $page_Lang['newpropackagedescription'][$dataUserPageLanguage];?>"></div>
      </span>
      <!---->
      <!---->
      <div class="setting-box">
        <div class="info_item_answer globalSelectBox" style="max-width:600px;">
          <span class="input-field col s12">
                 <select class="selectTheOptionDayWeekMonthYear" id="updatedwmy">            
                     <option value="" disabled selected><?php echo $page_Lang['choose_day_year_week_month'][$dataUserPageLanguage];?></option>
                       <option value="day" <?php echo $ItemYdmW == 'day' ? "selected='selected'":""; ?>><?php echo $page_Lang['pro_day'][$dataUserPageLanguage];?></option>
                       <option value="week" <?php echo $ItemYdmW == 'week' ? "selected='selected'":""; ?>><?php echo $page_Lang['pro_week'][$dataUserPageLanguage];?></option>
                       <option value="month" <?php echo $ItemYdmW == 'month' ? "selected='selected'":""; ?>><?php echo $page_Lang['pro_month'][$dataUserPageLanguage];?></option>
                       <option value="year" <?php echo $ItemYdmW == 'year' ? "selected='selected'":""; ?>><?php echo $page_Lang['pro_year'][$dataUserPageLanguage];?></option> 
                    </select> 
                  </span>
        </div>
      </div>
      <!---->
      <!---->
      <span class="setting-box"> 
             <span class="setSettinginputTitle"> <?php echo $page_Lang['newpropackagefee'][$dataUserPageLanguage];?><span style="font-size:12px;font-weight:300;color:#e53935;">(<?php echo $page_Lang['propackagefeeshoulddolar'][$dataUserPageLanguage];?>)</span></span>
      <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="updatepackageAmount" value="<?php echo $ItemAmounth;?>" placeholder="Ex: 200"></div>
      </span>
      <!---->
      <!---->
      <span class="setting-box"> 
               <span class="setSettinginputTitle"><?php echo $page_Lang['newpropackageicon'][$dataUserPageLanguage];?> <span style="font-size:12px;font-weight:300;color:#e53935;">(<?php echo $page_Lang['newpropackageiconshouldbesvg'][$dataUserPageLanguage];?>)</span></span>
      <div class="column_set_input_box"><textarea class="column_textarea chng" id="updatepackageIcon" placeholder="<?php echo $page_Lang['pasteprosvgiconcodehere'][$dataUserPageLanguage];?>" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;"><?php echo $ItemPriceIcon;?></textarea></div>
      </span>
      <!---->
      <!----> 
              <div class="search_user_filter_item"> 
                  <div class="u_pac waves-effect waves-light btn blue" id="<?php echo $editPackageID;?>"><?php echo $page_Lang['update_pro'][$dataUserPageLanguage];?></div>
              </div>
              <!----> 
      <!--FINISHED-->
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $("body").on("click",".u_pac", function(){
	   var type = 'editthispackage';
	   var ID = $(this).attr("id");
	   var propackagetitle = $("#updatepackageTitle").val();
	   var propackageDescription = $("#updatepackageDescription").val();
	   var propackageAmount = $("#updatepackageAmount").val();
	   var propackageIcon = $("#updatepackageIcon").val();
	   var propaidevery = $("#updatepaidevery").val();
	   var prodayweekmonthyear = $("select#updatedwmy option").filter(":selected").val();
	   var data = 'f='+type+'&prtitle='+propackagetitle+'&prdesc='+propackageDescription+'&popackamount='+propackageAmount+'&propacicon='+encodeURIComponent(propackageIcon)+'&proevery='+propaidevery+'&prodwmy='+prodayweekmonthyear+'&pacID='+ID;
	   $.ajax({
	   type: 'POST',
	   url: requestUrl + "admin/requests/request",
	   data: data,
	   cache: false,
	   beforeSend: function(){
	        $("#pronew").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
	   },
	   success: function(response){
		   if(response){
		       location.reload();
		   }
		   $(".preloadCom").remove(); 
	   }
	   });
  }); 
});
</script>