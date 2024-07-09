<div class="page_title bold">
  <?php echo $page_Lang['manage_watermark'][$dataUserPageLanguage];?>
</div>
<div class="global_right_wrapper">
  <div class="global_box_container_w bgc">
    <div class="general_settings_header_title">
      <?php echo $page_Lang['add_new_watermark'][$dataUserPageLanguage];?>
    </div>
    <div class="row-box-container" id="set_lang">
      <span id="actionNewLang" class="elaction"></span>
      <form name="myForm" id="mywform" action="" method="POST" enctype="multipart/form-datam">
        <span class="setting-box">
                    <!---->
                    <span class="file-field input-field">
                      <div class="btn">
                        <span><?php echo $page_Lang['select_image'][$dataUserPageLanguage];?></span>
        <input type="file" name="stickerFile">
    </div>
    </span>
    <!---->
    <span class="setSettingBoxInfoNote"><?php echo $page_Lang['most_suitable_size'][$dataUserPageLanguage];?></span>
    </span>
    <span class="setting-box"> 
                     <div class="input-field col s6">
                      <input placeholder="<?php echo $page_Lang['add_watermark_name'][$dataUserPageLanguage];?>" id="watermarkName" name="title" type="text" class="validate"> 
                    </div> 
               </span>
    <span class="setting-box"> 
                     <div class="info_item_answer globalSelectBox">
                         <span class="input-field col s12">
                         <select class="selectTheColor" id="textColor" name="textColor"> 
                            <option value="" disabled selected><?php echo $page_Lang['select_text_color'][$dataUserPageLanguage];?></option>           
                             <option value="256"><?php echo $page_Lang['white_color_text'][$dataUserPageLanguage];?></option>
                             <option value="254"><?php echo $page_Lang['black_color_text'][$dataUserPageLanguage];?></option> 
                          </select>
                          </span>
  </div>
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
  <div class="global_box_container_users" id="moreType" data-type="moreWatermarks">
    <?php 
					     $LastWaterMarkID = isset($_POST['lastWaterMarkID']) ? $_POST['lastWaterMarkID'] : ''; 
					     $AllWaterMarks = $Dot->Dot_AdminWatermarkLists($LastWaterMarkID); 
						 if($AllWaterMarks){
						     foreach($AllWaterMarks as $WaterMarkData){
							       $WaterMarkID = $WaterMarkData['watermark_id'];
								   $WaterMarkKey = $WaterMarkData['watermark_name'];
								   $WaterMarkStyle = $WaterMarkData['watermark_text_color'];
								   $WaterMarkImage = $WaterMarkData['watermark_image'];
							       $WaterMark_Image = $base_url.'uploads/watermarkbg/'.$WaterMarkImage;	 
					              include("html_watermarks.php");
					     }
						 } 
				 ?>
  </div>
</div>
</div>