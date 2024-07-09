<div class="popupBack"></div>
<div class="anm">
  <div class="modalNewMarket">
    <div class="payment_method_header">
      <div class="spm" style="display: block;"><span class="it" style="margin-right:5px;"><?php echo $Dot->Dot_SelectedMenuIcon('marketplace');?></span><?php echo $page_Lang['create_online_marketplace'][$dataUserPageLanguage];?></div>
      <div class="methods_close"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div>
    </div>
    <div class="c_market_wrapper">
           <span class="how_to_first" style="display:none;">
               <span class="explamationMark"><?php echo $Dot->Dot_SelectedMenuIcon('report_icon');?></span>
               <span class="alrtt"></span>
           </span>
           <!---->
           <div class="newp_itemBox"> 
               <span class="input_title"><?php echo $base_url;?>mymarket/<strong class="mrnm"></strong></span>
               <div class="set_the_input"><input type="text" class="column_input_in cmname" id="mrkt_name" placeholder="<?php echo $page_Lang['url_name_for_market'][$dataUserPageLanguage];?>"></div>
           </div>
           <!---->
           <!---->
           <div class="newp_itemBox"> 
               <span class="input_title"><?php echo $page_Lang['your_online_market_campany_name'][$dataUserPageLanguage];?></span>
               <div class="set_the_input"><input type="text" class="column_input_in" id="mrkt_campn_name"></div>
           </div>
           <!---->
           <!---->
           <div class="newp_itemBox">
               <span class="input_title"><?php echo $page_Lang['your_online_campany_information'][$dataUserPageLanguage];?></span>
               <div class="set_the_input"><textarea class="event_column_textarea" id="about_market_store" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;"></textarea></div>
           </div>
           <!---->
           <!---->
           <div class="newp_itemBox"> 
               <div class="set_the_input right_float"><div class="btn waves-effect waves-light blue createNew_marketStore" data-type="createMyStore"><?php echo $page_Lang['create_my_online_store'][$dataUserPageLanguage];?></div></div>
           </div>
           <!---->
    </div>
  </div>
</div>