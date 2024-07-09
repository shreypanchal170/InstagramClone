<div class="settings_form_container" id="down">
  <h1 class="settings_header">
    <?php echo $page_Lang['delete_my_account'][$dataUserPageLanguage];?>
  </h1>
  <div class="HgNB_dow">   
     <!---->
     <div class="set_box_not">
      <div class="download_note">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M156.34015,33.25781c-1.31791,-1.4988 -3.17849,-2.35156 -5.14243,-2.42909c-15.16887,-0.38762 -34.39483,-16.61598 -47.08294,-22.99879c-7.85577,-3.90204 -13.02404,-6.51202 -16.92608,-7.1839c-0.41346,-0.05168 -0.80108,-0.07752 -1.18871,-0.07752c-0.38762,0 -0.77524,0.02584 -1.1887,0.07752c-3.90204,0.69772 -9.07031,3.28185 -16.90024,7.20974c-12.71394,6.35697 -31.91406,22.58534 -47.10878,22.97296c-1.96394,0.07753 -3.82452,0.93029 -5.14242,2.42909c-1.34375,1.49879 -2.01563,3.48858 -1.9381,5.53004c3.28185,66.3089 27.05589,107.34496 68.78966,131.17067c1.08534,0.62019 2.27404,0.95613 3.48858,0.95613c1.18871,0 2.40324,-0.33594 3.48858,-0.95613c41.73378,-23.82572 65.50781,-64.86178 68.76382,-131.17067c0.10337,-2.04146 -0.56851,-4.03125 -1.91226,-5.53004zM78.22176,41.91467c0.15504,-0.15505 0.38762,-0.25842 0.59435,-0.25842h13.67007c0.20673,0 0.4393,0.10337 0.59435,0.25842c0.15504,0.15504 0.23257,0.36178 0.23257,0.59435l-1.11118,58.84075c0,0.4393 -0.38762,0.80108 -0.82692,0.80108h-11.0601c-0.4393,0 -0.80108,-0.33594 -0.82692,-0.80108l-1.49879,-58.84075c0,-0.20673 0.07752,-0.4393 0.23257,-0.59435zM92.43449,125.40805c-1.80889,1.62801 -3.95372,2.45493 -6.40865,2.45493c-2.53245,0 -4.70312,-0.82692 -6.48617,-2.45493c-1.78306,-1.65385 -2.71335,-3.69531 -2.71335,-6.04687c0,-2.42909 0.93029,-4.54808 2.71335,-6.25361c1.78305,-1.67969 3.95372,-2.53245 6.48617,-2.53245c2.45493,0 4.59976,0.85276 6.40865,2.53245c1.8089,1.70553 2.73919,3.82452 2.73919,6.25361c0,2.35156 -0.93029,4.39303 -2.73919,6.04687z"></path></g></g></svg><?php echo $page_Lang['after_delete_note'][$dataUserPageLanguage];?>
      </div> 
  </div>
     <!----> 
      <div class="set_box_new">
        <div class="set_box_title_new"><?php echo $page_Lang['current_password'][$dataUserPageLanguage];?></div>
        <div class="set_input_box_new"><input type="password" class="inputField_news" id="upass" placeholder="<?php echo $page_Lang['current_password'][$dataUserPageLanguage];?>"></div>
      </div>
 <!---->
 <div class="set_box prin" id="del_profile" style="">
    <div class="settings_box_footer_delete"> 
      <div class="control">
        <div class="btn waves-effect waves-light red deleteaccount" data-type="deletemyaccount"><?php echo $page_Lang['delete_my_account'][$dataUserPageLanguage];?></div>
      </div>
    </div>
  </div>
 <!---->    
     
 </div> 
</div>  
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".deleteaccount", function(){
	    var f = 'deletemyaccount';
		var userPass = $("#upass").val();
		$.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/activity',
		  dataType: "json", 
		  data: 'f='+f+'&pass='+encodeURIComponent(userPass),
		  cache: false,
		  beforeSend: function(){
			 // Do Something
		  },
		  success: function(response) { 
		       var edeleted = response.deleted;
			   var byby = response.byebye;
			   var nodeleted = response.deletedno; 
			   if(edeleted ==  1 ){
				     $("body").append(byby);
				   setTimeout(function() {
					  window.location.href = requestUrl+'logout.php';  
				    }, 5000);  
			   }else{
			        $("#del_profile").after(nodeleted);
					setTimeout(function() {
					  $('.delalert').remove();
				    }, 5000); 
			   } 
		  }
		});
	});
});
</script>  

 