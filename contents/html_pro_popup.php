<div class="popupBack"></div>
<div class="pro_member_ss uinfSlideInUp">
  <div class="inf_con_box">
       <div class="pro_radar_top">
            <div class="pro_radar" style="background-image:url('<?php echo $dataUserAvatar;?>');"><div class="promemicon"><?php echo $Dot->Dot_SelectedMenuIcon('pro_member');?></div></div>
            <div class="pro_mem_title"><?php echo $page_Lang['become_a_pro_member'][$dataUserPageLanguage];?></div>
            <div class="pro_mem_desc"><?php echo $page_Lang['get_many_features_for_you'][$dataUserPageLanguage];?></div>
       </div>
       <div class="pro_member_main">
            <div class="pro_member_main_title"><?php echo $Dot->Dot_ProPriceTableTotal();?> <?php echo $page_Lang['select_one_plan_foryourself'][$dataUserPageLanguage];?></div>
            <div class="pro_member_plains">
                <?php 
				    $PlainTableDetails = $Dot->Dot_ProPriceTable();
					if($PlainTableDetails){
					    foreach($PlainTableDetails as $PlainTable){
						     $plainTableID = $PlainTable['price_id'];
							 $plainTableType = $PlainTable['price_type'];
							 $plainTableAmount = $PlainTable['price_amounth'];
							 $lainTableDiscount = $PlainTable['price_discount'];
							 $plainTableInfo = $PlainTable['price_info'];
							 $plainTableKeyNumber = $PlainTable['price_key_number'];
							 $plainTableIcon = $PlainTable['price_icon'];
              ?> 
                  <div class="pro_member_plain_box hvr-shutter-out-vertical donate_post" data-donateid="<?php echo $plainTableKeyNumber;?>" data-type="pm" data-u="<?php echo $plainTableKeyNumber;?>"> 
                         <div class="proplain">
                           <div class="plainSelect">
                             <?php echo $plainTableIcon;?>
                           </div>
                           <div class="plainPriceTime"><?php echo $page_Lang[$plainTableType][$dataUserPageLanguage];?></div>
                           <div class="plainPricecDescription"><?php echo $page_Lang[$plainTableInfo][$dataUserPageLanguage];?></div>
                           <div class="plainPrice"><?php echo $plainTableAmount;?>$</div>
                        </div> 
                  </div> 
              <?php }}	?> 
            </div>
            <!---->
            <div class="pro_plain_why_text"><?php echo $page_Lang['why_choose_pro'][$dataUserPageLanguage];?></div>
            <div class="pro_member_plains_second">
                <?php 
				  $proAvantages = $Dot->Dot_ProPriceTableAvantages();
				  if($proAvantages){
				      foreach($proAvantages as $prAvantage){
					       $proAvantageID = $prAvantage['avantage_id'];
						   $proAvantageIcon = $prAvantage['avantage_icon'];
						   $proAvantageTitle = $prAvantage['avantage_title'];
						   $proAvantageDescription = $prAvantage['avantage_desc'];
			    ?>			 
                   <div class="pro_item_box">
                         <div class="pro_item_box_i_t">
                             <div class="pro_item_icon"><?php echo $proAvantageIcon;?></div>
                             <div class="pro_item_title"><?php echo $page_Lang[$proAvantageTitle][$dataUserPageLanguage];?></div>
                         </div>
                         <div class="pro_item_box_desc"><?php echo $page_Lang[$proAvantageDescription][$dataUserPageLanguage];?></div>
                   </div> 
				<?php }}?> 
            </div>
            <!---->
       </div>
  </div>
</div> 