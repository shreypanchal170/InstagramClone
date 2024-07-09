<div class="page_title bold"><?php echo $page_Lang['create_a_new_announcement'][$dataUserPageLanguage]; ?></div>
<!--Create Announcement STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_w bgc">
        <div class="general_settings_header_title"><?php echo $page_Lang['new_announcement'][$dataUserPageLanguage];?></div>
        <div class="row-box-container" id="set_profile"> 
                <!---->
                <div class="setting-box-global">
                     <span class="input-field col s12">
                        <select class="selecDefaultLang" id="anType">
                          <option value="" disabled selected><?php echo $page_Lang['select_announcement_type'][$dataUserPageLanguage];?></option>
                          <option value="success"><?php echo $page_Lang['announce_success'][$dataUserPageLanguage];?></option>
                          <option value="warning"><?php echo $page_Lang['announce_warning'][$dataUserPageLanguage];?></option>
                          <option value="danger"><?php echo $page_Lang['announce_danger'][$dataUserPageLanguage];?></option>
                          <option value="info"><?php echo $page_Lang['announce_info'][$dataUserPageLanguage];?></option>
                        </select>
                        <label><?php echo $page_Lang['select_announcement_type'][$dataUserPageLanguage];?></label>
                      </span>
                </div>
                <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['new_announce_title'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><input type="text" class="column_inputField chng" id="announceTitle" placeholder="<?php echo $page_Lang['new_announce_title_placeholder'][$dataUserPageLanguage];?>"></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['write_a_announcement_here'][$dataUserPageLanguage];?></span>  
                   <div class="column_set_input_box"><textarea class="column_textarea chng" id="announcementtext" placeholder="<?php echo $page_Lang['write_a_announcement_here_placeholder'][$dataUserPageLanguage];?>" style="overflow: hidden; word-wrap: break-word; resize: none; height: 86px;"></textarea></div>
               </span>
               <!----> 
               <!---->
               <span class="setting-box"> 
                   <span class="setSettinginputTitle"><?php echo $page_Lang['some_html_magic'][$dataUserPageLanguage];?></span>  
                   <span class="column_set_input_box" style="display: inline-block;">
                        <p>*<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>* => <strong><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></strong></p>
                        <p>_<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>_ => <i><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></i></p>
                        <p>~<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>~ => <strike><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></strike></p>
                        <p>!<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>! => <mark><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></mark></p>
                        <p>|<?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?>| => <code><?php echo $page_Lang['magic_example_text'][$dataUserPageLanguage];?></code></p>
                        <p>:<?php echo $page_Lang['magic_creating_a_new_paragraph'][$dataUserPageLanguage];?>: => <?php echo $page_Lang['magic_creating_a_new_paragraph'][$dataUserPageLanguage];?></p>
                   </span>
               </span>
               <!----> 
               <!----> 
               <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue save_announcement"  data-type="shareAnnouncement"><?php echo $page_Lang['share_new_announcement'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
               <!----> 
        </div> 
   </div>
</div>
<!--Create announcement FINISSHED-->
<!--Announcement List STARTED-->
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '10';
$countSql = "SELECT COUNT(an_id) FROM dot_announcements";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  
if($total_pages < $pagep && $total_pages != 0){
   header("Location: ".$base_url."dashboard/create_announcement");
   exit();
}
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_announcements ORDER BY an_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>Announcement Title</th>   
        <th>Announcement Type</th> 
        <th style="text-align:center !important;">Status</th>
        <th style="text-align:center !important;">Action</th> 
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
	  //an_id,an_type, annnouncement_text,announcement_title,announce_time
	  $announcementID = $row['an_id'];
	  $announcementTitle = $row['announcement_title'];
	  $announcementType = $row['an_type'];
	  $announcementStatus = $row['announce_status'];
	  if($announcementType == 'info'){
		    $anTypeColor = '#35aaf8';
		}else if($announcementType == 'success'){
		    $anTypeColor = '#43a047';
		}else if($announcementType == 'warning'){
		    $anTypeColor = '#fb8c00';
		}else if($announcementType == 'danger'){
		    $anTypeColor = '#e53935';
		}
?>  
<tr class="langCur olds body<?php echo $announcementID;?>" id="post_<?php echo $announcementID;?>" data-last="<?php echo $announcementID;?>">  
  <td class="bold_td"><?php echo $announcementID; ?></td>  
  <td id="user<?php echo $announcementID; ?>">
     <div class="tableincontainer"> 
          <div class="publicher_name truncate"><?php echo $announcementTitle;?> </div>
      </div>
  </td>   
  <td > 
      <span class="prtacan" style="background-color:<?php echo $anTypeColor;?> !important;"><?php echo $announcementType;?></span>
  </td> 
  <td>
     <span class="ckbx-style-8 ckbx-medium">
          <input type="checkbox" id="announcementstatus<?php echo $announcementID;?>" data-id="<?php echo $announcementID;?>" class="modeChange" data-type="announcementstatus" name="ckbx-style-8-1"  <?php echo $announcementStatus == '1' ? "checked='checked'":""; echo $announcementStatus == '0' ? "value='1'":"value='0'"; ?>> 
          <label for="announcementstatus<?php echo $announcementID;?>"></label>
    </span>
  </td>   
  <td class="copyUrl froz"> 
      <div class="btn waves-effect waves-light bluue editAnnounce" id="<?php echo $announcementID;?>" data-type="editAnnounce"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['edit_btn'][$dataUserPageLanguage];?></div></div> 
      <div class="btn waves-effect waves-light red del_announce" style="margin-left:10px;" id="<?php echo $announcementID;?>" data-type="deleteAnnouncement"><div class="tableincontainer" style="text-align:center;font-size:13px;"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div></div> 
  </td>
</tr>     
<?php  }; ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/create_announcement?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 
<!--Announcement List FINISHED-->

<script type="text/javascript">
$(document).ready(function(){
	function AutoTiseTextArea(){
     autosize(document.querySelectorAll('textarea'));
   }
   AutoTiseTextArea();
   $("body").on("click",".save_announcement", function(){
	    var type = 'shareAnnouncement';
		var announcementType = $("#anType").val();
		var announceTitle = $("#announceTitle").val();
		var announceText = $("#announcementtext").val();
		var data = 'f='+type+'&announce_type='+announcementType+'&announce_title='+announceTitle+'&announce='+announceText;
		$.ajax({
			type: 'POST',
			url: requestUrl + "admin/requests/request",
			data: data,
			cache: false,
			beforeSend: function() { $("#set_profile").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
			success: function(response) {  
				$("#color_").remove();
				$(".preloadCom").remove();  
				M.toast({html: response});  
			}
		 });
    });
$("body").on("click",".editAnnounce", function(){
    var type = 'editAnnounce';
	var announceID = $(this).attr("id");
	var data = 'f='+type+'&announceID='+announceID;
	$.ajax({
		  type: 'POST',
		  url: requestUrl + "admin/requests/request",
		  data: data,
		  cache: false,
		  beforeSend: function() { $("#post_").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
		  success: function(response) {   
			  $(".preloadCom").remove();  
			  $("body").append(response);
			  setTimeout(function() { 
				 AutoTiseTextArea();
			  }, 1000);
		  }
	   });
});	 
$("body").on("click",".save_announcementedits", function(){
   var type = 'shareEditedAnnouncement';
   var editID = $(this).attr("id");
   var editTitle = $("#announceEditTitle").val();
   var an = $("#announcementEdittext").val();
   var announceType = $("#anEditType").val();
   var data = 'f='+type+'&anID='+editID+'&anTitle='+editTitle+'&anText='+an+'&aType='+announceType;
   $.ajax({
	  type: 'POST',
	  url: requestUrl + "admin/requests/request",
	  data: data,
	  cache: false,
	  beforeSend: function() { $("#post_").append('<span class="preloadCom"><span class="progress"><span class="indeterminate"></span></span></span>'); },
	  success: function(response) {   
		  $(".preloadCom").remove();  
		  M.toast({html: response});  
	  }
   });
});
$("body").on("click", ".del_announce", function(){
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
$("body").on("click", ".delete_this_announce", function(){
      var type = $(this).attr("data-type"); 
	  var announce = $(this).attr("id"); 
	  var data = 'f='+type+'&aid='+announce;
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
$("body").on("click", ".modeChange", function() {
    var value = $(this).val();
	var type = $(this).attr("data-type");
    var announceID = $(this).attr("data-id");
    var data = "f=" + type + "&announce=" + announceID+'&val='+value;
    $.ajax({
      type: "POST", 
      url: requestUrl + "admin/requests/request",
	  dataType: "json", 
	  data: data,  
      beforeSend: function() {},
      success: function(response) {
		  var status = response.deleted;
		  var note = response.delete_not;
		  if(status == 1){ 
			if (value == "0") {
			  $("#announcementstatus" + announceID).val("1");  
			  M.toast({html: note, classes: 'green_not'});
			} else if (value == "1") {
			  $("#announcementstatus" + announceID).val("0"); 
			  M.toast({html: note, classes: 'green_not'});
			}
		}else{
		     M.toast({html: note}); 
		}
      }
    });
  });  
});
</script>
 