<div class="page_title bold"><?php echo $page_Lang['manage_cities'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 <!---->
 <?php  
$limit = '10';
$countSql = "SELECT COUNT(id) FROM dot_cities";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_cities WHERE id ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>City Name</th>  
        <th>State</th> 
        <th  style="text-align:center !important;">Action</th> 
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
      $citiesID = $row['id'];
	  $cityName = $row['name'];
	  $stateID = $row['state_id'];
	  $stateName = $Dot->Dot_GetStateNameFromID($stateID);
?>  
<tr class="langCur olds body<?php echo $citiesID;?>" id="post_<?php echo $citiesID;?>" data-last="<?php echo $citiesID;?>">  
  <td class="bold_td"><?php echo $citiesID; ?></td>  
  <td id="user<?php echo $citiesID; ?>" data-id="<?php echo $citiesID;?>">
       <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="cityID_<?php echo $citiesID;?>" placeholder="<?php echo $cityName;?>" value="<?php echo $cityName;?>"></div>
  </td>  
  <td>
      <div class="see_post" data-id="<?php echo $citiesID;?>" data-ui="<?php echo $citiesID;?>"><?php echo $stateName;?></div>
  </td> 
  <td> 
   <div class="btn waves-effect waves-light blue saveCityChange" id="<?php echo $citiesID;?>" data-type="updateGCity"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['save_changes'][$dataUserPageLanguage];?></div></div> 
   <div class="btn waves-effect waves-light red deletet_city" style="margin-left:10px;" id="<?php echo $citiesID;?>" data-type="deleteCity"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div></div>
  </td>
</tr>     
<?php  }; ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/manage_cities?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                      
                 <!---->
                 </div>
                 </div>
            </div>
        </div>   
</div> 
<script type="text/javascript">
$(document).ready(function(){
   $("body").on("click",".saveCityChange", function(){
	     var type = $(this).attr("data-type");
		 var cityID = $(this).attr("id");
		 var cityValue = $("#cityID_"+cityID).val();
		 var data = 'f='+type+'&cityID='+cityID+'&city='+cityValue;
		 $.ajax({
				   type: 'POST',
				   url: requestUrl + 'admin/requests/request',
				   data: data,
	               cache: false,
				   beforeSend: function(){
					  $("#target-content").before('<span class="progress_blue" id="ccm"><span class="indeterminate"></span></span>');
				   },
				   success: function(response){ 
						$('#ccm').remove(); 
						M.toast({html: response }); 	    
				   }
	    });
    });
$("body").on("click", ".deletet_city", function(){
      var langID = $(this).attr("id");
	  var announce = $(this).attr("data-type"); 
	  var popUpComment = 'popUp='+announce+'&anid='+langID;
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
$("body").on("click", ".delete_this_city", function(){
      var type = $(this).attr("data-type"); 
	  var cityID = $(this).attr("id"); 
	  var data = 'f='+type+'&cityID='+cityID;
	  $.ajax({
		  type: "POST",
		  url: requestUrl + "admin/requests/request",
		  dataType: "json", 
	      data: data, 
		  beforeSend: function(){ 
		  },
		  success: function(response) { 
			  var status = response.deleted;
			  var note = response.delete_not;
			  if(status == 1){
			      $("#post_"+announce).remove(); 
				   M.toast({html: note, classes: 'green_not'});
			  }else{
			       M.toast({html: note}); 
			  } 
			  $(".confirmBoxContainer").remove();
		  }
		});
  });
});
</script>