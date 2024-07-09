<div class="page_title bold"><?php echo $page_Lang['manage_cargos'][$dataUserPageLanguage];?></div>
<!--Total Statiscit STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['add_new_cargo'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_lang"> 
               <span class="setting-box"> 
                     <div class="input-field col s6">
                      <input placeholder="<?php echo $page_Lang['add_cargo_name'][$dataUserPageLanguage];?>"  id="new_cargoName" type="text" class="validate">
                      <label for="new_lang"><?php echo $page_Lang['add_cargo_name_info'][$dataUserPageLanguage];?></label> 
                    </div> 
               </span>
               <span class="setting-box"> 
                     <div class="input-field col s6">
                      <input placeholder="<?php echo $page_Lang['add_cargo_website_address'][$dataUserPageLanguage];?>"  id="new_cargoUrl" type="text" class="validate">
                      <label for="new_lang"><?php echo $page_Lang['add_cargo_website_address_info'][$dataUserPageLanguage];?></label> 
                    </div> 
               </span>
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="btn waves-effect waves-light blue save_newCargo" data-type="saveNewCargo"><?php echo $page_Lang['add_this_cargo'][$dataUserPageLanguage];?> </div>
                   </div>
               </div>
               <!----> 
        </div> 
        <div class="general_settings_header_title_second"><?php echo $page_Lang['edit_delete_cargos'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_del_lang">
              <span id="actionDelLang" class="elaction"></span>
              
<!---->
<div class="declined_paymnt_table">
                 
 <?php  
$limit = '10';
$countSql = "SELECT COUNT(cargo_id) FROM dot_cargos WHERE cargo_id";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  
if($total_pages < $pagep){
   header("Location: $base_url/dashboard/user-management");
   exit();
}
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_cargos WHERE cargo_id ORDER BY cargo_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
          <th>Cargo Campany Name</th>
          <th>Cargo Campany Website</th> 
          <th>Action</th>
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
	 $cargoID = $row['cargo_id'];
	 $cargoName = $row['cargo_name'];
	 $cargoUrl = $row['cargo_url']; 
?>  
<tr id="crg_<?php echo $cargoID;?>">
   <td><input type="text" class="column_inputField chng" id="cargoname<?php echo $cargoID;?>" value="<?php echo $cargoName;?>"></td>
   <td><input type="text" class="column_inputField chng" id="cargoUrl<?php echo $cargoID;?>" value="<?php echo $cargoUrl;?>"></td>
   <td>
       <div class="btn waves-effect waves-light blue cargoDetail" id="<?php echo $cargoID;?>" data-type="cargoDetail"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div></div>
       <div class="btn waves-effect waves-light red deleteCargo" data-type="deleteCargo" id="<?php echo $cargoID;?>"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div>
   </td> 
</tr>
<?php  }; ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cargos?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
<!---->             
        </div>
    </div>
 </div>
<script type="text/javascript">
$(document).ready(function(){
	$("body").on("click",".cargoDetail", function(){
        var type = 'cargoDetail';
		var cargoID = $(this).attr("id");
		var cargoName = $("#cargoname"+cargoID).val();
		var cargourl = $("#cargoUrl"+cargoID).val();
		var data = 'f='+type+'&cargoname='+cargoName+'&cargoid='+cargoID+'&cargoUrl='+cargourl;
		$.ajax({
		  type: 'POST',
		  url: requestUrl+'admin/requests/request',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 $("#crg_"+cargoID).append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(response) {
			   $(".preloadCom").remove(); 
			   M.toast({html: response}); 
		  }
		}); 
	});
$("body").on("click",".save_newCargo", function(){
        var type = 'saveNewCargo'; 
		var ncargoName = $("#new_cargoName").val();
		var ncargourl = $("#new_cargoUrl").val();
		var data = 'f='+type+'&ncargoname='+ncargoName+'&ncargoUrl='+ncargourl;
		$.ajax({
		  type: 'POST',
		  url: requestUrl+'admin/requests/request',
		  data: data,
		  cache: false,
		  beforeSend: function(){
			 $("#set_lang").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(response) {
			   $(".preloadCom").remove(); 
			   M.toast({html: response}); 
			      setTimeout(function(){ 
					   location.reload(); 
				  }, 500);
		  }
		}); 
});
$("body").on("click", ".deleteCargo", function(){
      var cargoID = $(this).attr("id");//Get Comment id
	  var thePopUpType = $(this).attr("data-type"); 
	  var popUpComment = 'popUp='+thePopUpType+'&cargoID='+cargoID;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + 'requests/popups',
		  data: popUpComment,
		  cache: false,
		  beforeSend: function(){ 
		  },
		  success: function(html) {
			  $("body").append(html);
		  }
		});
 }); 
 $("body").on("click", ".delete_this_crg", function(){
      var cargoID = $(this).attr("id");//Get Comment id
	  var type = $(this).attr("data-type"); 
	  var deleteCArgo = 'f='+type+'&cargoID='+cargoID;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + 'admin/requests/request',
		  data: deleteCArgo,
		  cache: false,
		  beforeSend: function(){
			 $("#set_lang").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>');
		  },
		  success: function(html) {
			   setTimeout(function(){ 
			       $("#crg_"+cargoID).remove();
			   }, 500);
			  $(".preloadCom").remove();  
			  $(".confirmBoxContainer").remove();
			   M.toast({html: response}); 
		  }
		});
 }); 
});
 </script>