<div class="popupBack"></div>
<div class="anm">
  <div class="modalCheckout">
    <div class="payment_method_header">
      <div class="spm"><?php echo $page_Lang['donate_amount'][$dataUserPageLanguage];?></div>
      <div class="methods_close"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div>
    </div>
    <div class="methods_wrapper">
      <div class="reqir">
          <?php echo $Dot->Dot_SelectedMenuIcon('payment_hand_icon');?>
      </div>
      <div class="reqirtex"><?php echo $page_Lang['damount'][$dataUserPageLanguage];?>($)</div> 
      <div class="methods_con"> 
        <div class="method_box_item"> 
                <div class="_9404J_carg"><input type="text" class="amountinpt" id="ydamnt" onkeyup="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="2" value="2"></div>
        </div>
        <div class="method_box_item"><span class="btn green waves-effect waves-purple donate_post_amnt" data-donateid="<?php echo $donateThisPost;?>" data-u="<?php echo $donateThisUser;?>" data-type="donate"><?php echo $page_Lang['donate_tpost'][$dataUserPageLanguage];?></span></div>
      </div>
    </div>
  </div>
</div>