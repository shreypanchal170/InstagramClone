<div class="lang_page_title bold"><?php echo $page_Lang['manage_languages'][$dataUserPageLanguage];?></div> 
<div class="key_search_box">
    <input type="text" id="search_key" class="search_key_edit" placeholder="Search Key" />
</div>
<div class="global_right_wrapper">
   <div class="global_box_container_users">
         
        <div class="divTableBody newboys" style="display:none;"></div>
           <div class="divTableBody old_Key" id="moreType" data-type="user_langs"> 
                 <div class="earnings_statistics">
                 <div class="declined_paymnt_table">
                 
 <?php  
$limit = '13';
$countSql = "SELECT COUNT(lang_id) FROM dot_languages";  
$tot_result = mysqli_query($db, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page-id"])) { $pagep  = $_GET["page-id"]; } else { $pagep=1; };  
$start_from = ($pagep-1) * $limit;  
$sql = "SELECT * FROM dot_languages WHERE lang_id ORDER BY lang_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql); 
?>
<table class="striped highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th><?php echo $page_Lang['lang_key_name'][$dataUserPageLanguage];?></th> 
        <th><?php echo $page_Lang['lang_key_value'][$dataUserPageLanguage];?></th>
        <th><?php echo $page_Lang['post_admin_action'][$dataUserPageLanguage];?></th> 
      </tr>
    </thead>  

<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {

      $dataLangID = $row['lang_id'];
	  $dataLangKey = $row['lang_key'];
	  $dataLangDefault = $row['english'];
?>  
<tr class="langCur olds body<?php echo $dataLangID;?>" id="post_<?php echo $dataLangID;?>" data-last="<?php echo $dataLangID;?>">  
  <td class="bold_td"><?php echo $dataLangID; ?></td>  
  <td>
     <div class="publicher_name" style="text-transform:none;font-weight:400;"><?php echo $dataLangKey;?></div>
  </td>  
  <td>
     <div class="see_post" id="word_<?php echo $dataLangID;?>"><?php echo strip_tags($dataLangDefault);?></div>
  </td>
   
  <td class="copyUrl froz">
  <div class="btn waves-effect waves-light blue edit_lang_values" id="<?php echo $dataLangID;?>" data-type="get_lang" data-key="<?php echo $dataLangKey;?>"><div class="tableincontainer bold" style="text-align:center;font-size:14px;"><?php echo $page_Lang['edit_btn'][$dataUserPageLanguage];?></div></div>
  <div class="btn waves-effect waves-light red delete_lng" style="margin-left:10px;" id="<?php echo $dataLangID;?>" data-type="del_lang"><div class="tableincontainer bold" style="text-align:center;font-size:14px;"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div></div> 
  </td>
</tr>     
<?php  }; ?>
</tbody> 
</table>  
<?php if (ceil($total_records / $limit) > 0): ?>
<ul class="pagination">
	<?php if ($pagep > 1): ?>
	<li class="prev waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo $pagep-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($pagep > 3): ?>
	<li class="start waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($pagep-2 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo $pagep-2; ?>"><?php echo $pagep-2; ?></a></li><?php endif; ?>
	<?php if ($pagep-1 > 0): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo $pagep-1; ?>"><?php echo $pagep-1; ?></a></li><?php endif; ?>

	<li class="currentpage active waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo $pagep; ?>"><?php echo $pagep; ?></a></li>

	<?php if ($pagep+1 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo $pagep+1; ?>"><?php echo $pagep+1; ?></a></li><?php endif; ?>
	<?php if ($pagep+2 < ceil($total_records / $limit)+1): ?><li class="page waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo $pagep+2; ?>"><?php echo $pagep+2; ?></a></li><?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)-2): ?>
	<li class="dots">...</li>
	<li class="end waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo ceil($total_records / $limit); ?>"><?php echo ceil($total_records / $limit); ?></a></li>
	<?php endif; ?>

	<?php if ($pagep < ceil($total_records / $limit)): ?>
	<li class="next waves-effect"><a href="<?php echo $base_url;?>dashboard/page-langauges?page-id=<?php echo $pagep+1; ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>                
                 
                 </div>
                 </div>
            </div>
        </div>   
</div> 