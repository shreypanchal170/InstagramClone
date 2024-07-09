<div class="page_title bold"><?php echo $page_Lang['manage_about_us_page'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
    <div class="global_box_container_w bgc">
         <div class="general_settings_header_title"><?php echo $page_Lang['update_about_us'][$dataUserPageLanguage];?></div>
         <div class="row-box-container" id="updateLoad">
             <?php 
				 $staticPage = $Dot->Dot_DisplayStaticPage('about_us');
				  if($staticPage){
					  foreach($staticPage as $pageCode){ 
						  $aboutUsDescription = $pageCode['static_page_code'];
						  $aboutUsUpdateTime = $pageCode['static_page_time'];
						 ?>
<textarea class="changePageTextArea_Page" id="pageCodes"><?php echo stripcslashes($aboutUsDescription);?></textarea>
					<?php   }
				  }		
			 ?> 
             <!---->
            <div class="setting-box">
                   <div class="column-set_input_box">
                       <div class="saveTheSettings btn waves-effect waves-light blue update_page" data-type="aboutusupdate" data-status="about_us"><?php echo $page_Lang['update_page'][$dataUserPageLanguage];?></div>
                   </div>
               </div>
            <!---->
         </div>
         
         
    </div>
</div>