<div class="page_title bold">
  <?php echo $page_Lang['create_new_pro_package'][$dataUserPageLanguage];?>
</div>
<div class="global_right_wrapper">
  <div class="global_box_container_w bgc">
      <div class="general_settings_header_title"><?php echo $page_Lang['add_new_pro_packages'][$dataUserPageLanguage];?></div>
     <div class="row-box-container" id="pronew">
        <div class="withdrawal_note"><?php echo $page_Lang['howtocreatepropackagetext'][$dataUserPageLanguage];?> <a href="#">Need Help?</a></div>
         <!---->
         <span class="setting-box"> 
             <span class="setSettinginputTitle"><?php echo $page_Lang['newpackagetitle'][$dataUserPageLanguage];?></span>
             <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="newpackageTitle" placeholder="<?php echo $page_Lang['propackagetitlelanguagekeyhere'][$dataUserPageLanguage];?>"></div>
         </span>
         <!---->
         <!---->
         <span class="setting-box"> 
             <span class="setSettinginputTitle"><?php echo $page_Lang['newpackagedescription'][$dataUserPageLanguage];?></span>
             <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="newpackageDescription" placeholder="<?php echo $page_Lang['newpropackagedescription'][$dataUserPageLanguage];?>"></div>
         </span>
         <!---->
         <!---->
         <span class="setting-box"> 
             <span class="setSettinginputTitle"><?php echo $page_Lang['paid_every_title'][$dataUserPageLanguage];?> (<span style="font-size:12px;font-weight:300;color:#e53935;"><?php echo $page_Lang['paid_every_note'][$dataUserPageLanguage];?></span>)</span>
             <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="newpaidevery" placeholder="<?php echo $page_Lang['newpropackagedescription'][$dataUserPageLanguage];?>"></div>
         </span>
         <!---->
         <!----> 
            <div class="setting-box">
            <div class="info_item_answer globalSelectBox" style="max-width:600px;">
                <span class="input-field col s12">
                 <select class="selectTheOptionDayWeekMonthYear" id="dwmy">            
                     <option value="" disabled selected><?php echo $page_Lang['choose_day_year_week_month'][$dataUserPageLanguage];?></option>
                       <option value="day"><?php echo $page_Lang['pro_day'][$dataUserPageLanguage];?></option>
                       <option value="week"><?php echo $page_Lang['pro_week'][$dataUserPageLanguage];?></option>
                       <option value="month"><?php echo $page_Lang['pro_month'][$dataUserPageLanguage];?></option>
                       <option value="year"><?php echo $page_Lang['pro_year'][$dataUserPageLanguage];?></option>
                    </select> 
                  </span>
              </div>
            </div>
         <!----> 
         <!---->
         <span class="setting-box"> 
             <span class="setSettinginputTitle"> <?php echo $page_Lang['newpropackagefee'][$dataUserPageLanguage];?><span style="font-size:12px;font-weight:300;color:#e53935;">(<?php echo $page_Lang['propackagefeeshoulddolar'][$dataUserPageLanguage];?>)</span></span>
             <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="newpackageAmount" placeholder="Ex: 200"></div>
         </span>
         <!---->
         <!---->
         <span class="setting-box"> 
               <span class="setSettinginputTitle"><?php echo $page_Lang['newpropackageicon'][$dataUserPageLanguage];?> <span style="font-size:12px;font-weight:300;color:#e53935;">(<?php echo $page_Lang['newpropackageiconshouldbesvg'][$dataUserPageLanguage];?>)</span></span>
            <div class="column_set_input_box"><textarea class="column_textarea chng" id="newpackageIcon" placeholder="<?php echo $page_Lang['pasteprosvgiconcodehere'][$dataUserPageLanguage];?>" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;"></textarea></div>
         </span>
         <!---->
         <!---->
         <div class="setting-box">
             <div class="column-set_input_box">
                 <div class="saveTheSettings btn waves-effect waves-light blue save_newProPackage"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div>
             </div>
         </div>
         <!---->
     </div>
     <div class="general_settings_header_title_second"><?php echo $page_Lang['existing_pro_packages'][$dataUserPageLanguage];?></div>
    <div class="row-box-container"> 
            <div class="pricingTableCenter">
               <?php 
			      $pricingTables = $Dot->Dot_ProPriceTable();
				  if($pricingTables){
				     foreach($pricingTables as $prTableItem){
					      $pricingTableID = $prTableItem['price_id'];
						  $pricingType = $prTableItem['price_type'];
						  $pricingAmount = $prTableItem['price_amounth'];
						  $pricingDiscount = $prTableItem['price_discount'];
						  $pricingInfo = $prTableItem['price_info'];
						  $pricingKeyNumber = $prTableItem['price_key_number'];
						  $pricingIcon = $prTableItem['price_icon'];
				?>	
                  <div class="pro_member_plain_box hvr-shutter-out-vertical"> 
                         <div class="pro_member_plain_box_hover_menu">
                               <div class="deleteProType delproty" id="<?php echo $pricingTableID;?>" data-type="delProType"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M47.92188,39.92188c-3.25538,0.00085 -6.18567,1.97404 -7.41065,4.99016c-1.22498,3.01612 -0.50037,6.47372 1.83252,8.74421l42.34375,42.34375l-42.34375,42.34375c-2.0899,2.00654 -2.93176,4.98613 -2.2009,7.78965c0.73086,2.80352 2.92023,4.99289 5.72375,5.72375c2.80352,0.73086 5.78311,-0.111 7.78965,-2.20091l42.34375,-42.34375l42.34375,42.34375c2.00653,2.08993 4.98614,2.93181 7.78967,2.20095c2.80354,-0.73085 4.99292,-2.92024 5.72377,-5.72377c0.73085,-2.80354 -0.11102,-5.78314 -2.20095,-7.78967l-42.34375,-42.34375l42.34375,-42.34375c2.36608,-2.29993 3.07751,-5.81653 1.79148,-8.8553c-1.28603,-3.03877 -4.3057,-4.97634 -7.60397,-4.87907c-2.07839,0.06193 -4.05103,0.93056 -5.5,2.42188l-42.34375,42.34375l-42.34375,-42.34375c-1.50617,-1.54826 -3.57436,-2.42175 -5.73437,-2.42188z"></path></g></g></svg></div>
                               <div class="editProType" id="<?php echo $pricingTableID;?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M131.96744,14.33333c-1.83376,0 -3.66956,0.69853 -5.06706,2.09961l-12.23372,12.23372l28.66667,28.66667l12.23372,-12.23372c2.80217,-2.80217 2.80217,-7.33911 0,-10.13412l-18.53255,-18.53255c-1.40108,-1.40108 -3.23329,-2.09961 -5.06706,-2.09961zM103.91667,39.41667l-82.41667,82.41667v28.66667h28.66667l82.41667,-82.41667z"></path></g></g></svg></div>
                         </div>
                         <div class="proplain">
                           <div class="plainSelect">
                             <?php echo $pricingIcon;?>
                           </div>
                           <div class="plainPriceTime"><?php echo $page_Lang[$pricingType][$dataUserPageLanguage];?></div>
                           <div class="plainPricecDescription"><?php echo $page_Lang[$pricingInfo][$dataUserPageLanguage];?></div>
                           <div class="plainPrice"><?php echo $pricingAmount;?>$</div>
                        </div> 
                  </div> 	  
				<?php }
				  }
			   ?>
               </div>  
    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".editProType", function(){
	    var type = 'editpackage';
		var ID = $(this).attr("id");
		var data = 'f='+type+'&packageID='+ID;
		if ($('div.search_user_filter_container').length === 0) {
		$.ajax({
		   type: 'POST',
		   url: requestUrl + "admin/requests/request",
		   data: data,
		   cache: false,
		   beforeSend: function(){
			   $("body").append('<div style="position:absolute;bottom:0px;left:0px;width:100%;" class="sls"><span class="progress_blue" id="ccm"><span class="indeterminate"></span></span></div>');
		   },
		   success: function(response){
			    $(".sls").remove();
				$("body").append(response);
		   }
		   });
		}
	});
});
</script>