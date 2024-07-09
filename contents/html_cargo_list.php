<div class="popupBack"></div>
<div class="anm">
  <div class="modalCheckout">
    <div class="payment_method_header">
      <div class="spm"><?php echo $page_Lang['informtherecipient'][$dataUserPageLanguage];?></div>
      <div class="methods_close"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M42.93001,35.76335c-2.91628,0.00077 -5.54133,1.76841 -6.63871,4.47035c-1.09737,2.70194 -0.44825,5.79937 1.64164,7.83336l37.93295,37.93294l-37.93295,37.93294c-1.8722,1.79752 -2.62637,4.46674 -1.97164,6.97823c0.65473,2.51149 2.61604,4.4728 5.12753,5.12753c2.51149,0.65473 5.18071,-0.09944 6.97823,-1.97165l37.93294,-37.93294l37.93294,37.93294c1.79752,1.87223 4.46675,2.62641 6.97825,1.97168c2.5115,-0.65472 4.47282,-2.61605 5.12755,-5.12755c0.65472,-2.5115 -0.09946,-5.18073 -1.97168,-6.97825l-37.93294,-37.93294l37.93294,-37.93294c2.11962,-2.06035 2.75694,-5.21064 1.60486,-7.93287c-1.15207,-2.72224 -3.85719,-4.45797 -6.81189,-4.37084c-1.86189,0.05548 -3.62905,0.83363 -4.92708,2.1696l-37.93294,37.93295l-37.93294,-37.93295c-1.34928,-1.38698 -3.20203,-2.16948 -5.13704,-2.1696z"></path></g></g></svg></div>
    </div>
    <div class="methods_wrapper">
      <div class="reqir"><div class="required_note"><?php echo $page_Lang['all_feald_are_required'][$dataUserPageLanguage];?></div></div>
      <div class="methods_con"> 
        <div class="method_box_item">
              <div class="carg_title"><?php echo $page_Lang['which_cargo_did_you_send'][$dataUserPageLanguage];?></div>
                <?php 
				    if($Cargos){
						echo '<div class="_9404J_carg"><span class="Kaij6 Szr5J coreSpriteChevronDownGrey icons"></span><select id="cargolti" class="zOJg-carg"><option value="" disabled selected>'.$page_Lang['choose_shipping_company'][$dataUserPageLanguage].'</option>';
					   foreach($Cargos as $cargoa){
						     $cargoaID = $cargoa['cargo_id'];
							 $cargoaName = $cargoa['cargo_name'];
							 $cargoaUrl = $cargoa['cargo_url'];
							 echo '<option value="'.$cargoaID.'">'.$cargoaName.'</option>';
					   }
					  echo '</select></div>';
					}
				?> 
                <div class="_9404J_carg"><input type="text" class="title_carg" id="track_number" placeholder="<?php echo $page_Lang['tracking_number'][$dataUserPageLanguage];?>"></div>
        </div>
        <div class="method_box_item"><span class="btn blue waves-effect waves-purple inform_th_receipient" data-id="<?php echo $customerID;?>" id="<?php echo $cartID;?>"><?php echo $page_Lang['inform_recipient'][$dataUserPageLanguage];?></span></div>
      </div>
    </div>
  </div>
</div>