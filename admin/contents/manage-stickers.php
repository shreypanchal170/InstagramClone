<div class="page_title bold"><?php echo $page_Lang['manage_stickers'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
   <div class="global_box_container_white_Ads border-radius">
       <div class="create_avertisementBox">
           <!---->
             <div class="adivTable blueTable">
                  <div class="adivTableHeading">
                    <div class="adivTableRow">
                      <div class="adivTableHead">ID</div>
                      <div class="adivTableHead">STICKER</div>
                      <div class="adivTableHead">KEY</div>
                      <div class="adivTableHead">TYPE</div> 
                      <div class="adivTableHead">ACTION</div>
                    </div>
                  </div>
                  <div class="adivTableBody">
                     <?php 
					     $lastStickerID = isset($_POST['lastStickerID']) ? $_POST['lastStickerID'] : ''; 
					     $AllStickers = $Dot->Dot_AdminStickerLists($lastStickerID); 
						 if($AllStickers){
						     foreach($AllStickers as $stickerData){
							       $stickerID = $stickerData['emoji_id'];
								   $stickerKey = $stickerData['emoji_key'];
								   $stickerStyle = $stickerData['emoji_style'];
								   $stickerImage = $stickerData['image'];
							       $sticker = $base_url.'uploads/emoticons/F_Sticker/'.$stickerImage;	 
					              include("html_stickers_data.php");
					     }
						 } 
						 ?> 
            </div> 
           <!---->
       </div>
   </div> 
</div>
<!--Make a new Sticker form STARTED-->
<div class="form_sticker">
   <div class="sticker_form">
       <div class="sticker_form_header">Create New Sticker <div class="close_a_box"></div></div>
       <form name="myForm" id ="myform" action="" method="POST" enctype="multipart/form-datam">
       <div class="sticker_form_body">
           <div class="new_sticker">
                <label for="sticker__" class="icons_dash sticker__"><input type="file" class="sticker_file" name="stickerFile" id="sticker__" /></label> 
                <div class="previewNew"><div class="delete-preview "></div><img id="image_upload_preview" src="" /></div>
           </div> 
           <div class="dash_input">
           <div class="create_ads_div_in_title" id="showthis__">Sticker Name</div>
           <input type="text" name="stickername"  class="dash_input_item" id="stickername" placeholder="Sticker Name" />
           </div>
           <input type="hidden" name="newsticker" id="newsticker" value="stickerNew" />
           <div class="dash_input"><button type="submit" class="add_new_sticker">Add Sticker</button></div>
       </div>
       </form>
   </div>
</div>
<!--Make a new Sticker Form FINISHED-->
<!--Make a New Sticker STARTED-->
<div class="icons_dash make_new_sticker">

</div>
<!--Make a New Sticker FINISHED--> 