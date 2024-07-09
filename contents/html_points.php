<div class="withdrawal_note"><?php echo $page_Lang['create_point_note_top'][$dataUserPageLanguage];?></div>
<!---->
<div class="currentExchanges">
<!---->
<div class="exchange_item_two">
    <div class="exchange_box">
           <div class="point_icon"><?php echo $Dot->Dot_SelectedMenuIcon('post_point');?></div>
           <div class="exchange_note_point"><?php echo $page_Lang['point_earning_for_post'][$dataUserPageLanguage].' <strong>'.$pointPost.'</strong>';?></div> 
           <!---->
           <div class="cclod">
                  <div class="calculate_points">
                       <div class="calcul_a_point_text" id="try_one_usd"><?php echo $page_Lang['earning_point_from_create_post'][$dataUserPageLanguage];?></div> 
                       <div class="calcul_pointt" id="postPoint"><?php echo $TotalEarningPostPoint;?></div>
                  </div>
           </div>
           <!---->
    </div>
</div>
<!---->
<!---->
<div class="exchange_item_two">
    <div class="exchange_box">
           <div class="point_icon"><?php echo $Dot->Dot_SelectedMenuIcon('comment_point');?></div>
           <div class="exchange_note_point"><?php echo $page_Lang['point_earning_for_commentt'][$dataUserPageLanguage].' <strong>'.$pointComment.'</strong>';?></div> 
           <!---->
           <div class="cclod">
                  <div class="calculate_points">
                       <div class="calcul_a_point_text" id="try_one_usd"><?php echo $page_Lang['earning_point_from_comment'][$dataUserPageLanguage];?></div> 
                       <div class="calcul_pointt" id="commentPoint"><?php echo $TotalEarningCommentPoint;?></div>
                  </div>
           </div>
           <!---->
    </div>
</div>
<!---->
<!---->
<div class="exchange_item_two">
    <div class="exchange_box">
           <div class="point_icon"><?php echo $Dot->Dot_SelectedMenuIcon('post_like_point');?></div>
           <div class="exchange_note_point"><?php echo $page_Lang['point_earning_for_like'][$dataUserPageLanguage].' <strong>'.$pointLike.'</strong>';?></div> 
           <!---->
           <div class="cclod">
                  <div class="calculate_points">
                       <div class="calcul_a_point_text" id="try_one_usd"><?php echo $page_Lang['earning_point_from_like'][$dataUserPageLanguage];?></div> 
                       <div class="calcul_pointt" id="likePoint"><?php echo $TotalEarningLikePoint;?></div>
                  </div>
           </div>
           <!---->
    </div>
</div>
<!---->
<!---->
<div class="exchange_item_two">
    <div class="exchange_box">
           <div class="point_icon"><?php echo $Dot->Dot_SelectedMenuIcon('point_stories');?></div>
           <div class="exchange_note_point"><?php echo $page_Lang['point_earning_for_stories'][$dataUserPageLanguage].' <strong>'.$pointStories.'</strong>';?></div> 
           <!---->
           <div class="cclod">
                  <div class="calculate_points">
                       <div class="calcul_a_point_text" id="try_one_usd"><?php echo $page_Lang['earning_point_from_shared_stories'][$dataUserPageLanguage];?></div> 
                       <div class="calcul_pointt" id="storyPoint"><?php echo $TotalEarningStoriesPoint?></div>
                  </div>
           </div>
           <!---->
    </div>
</div>
<!---->
</div>
<!---->
</div>
<!---->
<!---->
<div class="currentExchanges">
<!---->
<div class="calculated_points_box">
<div class="point_boxx boxx_bg_one">
      <div class="point_sum_title"><?php echo $page_Lang['toptal_point_you_have_earned'][$dataUserPageLanguage];?></div>
      <div class="point_sum" id="totpoint"><?php echo $AllTotalPoints;?><span class="poo">points</span></div>
      <div class="point_sum_note"><?php echo $page_Lang['total_point_note'][$dataUserPageLanguage];?></div>
</div>
</div>
<!---->
<!---->
<div class="calculated_points_box">
<div class="point_boxx boxx_bg_two">
    <div class="point_sum_title"><?php echo $page_Lang['turn_your_points_to_cash'][$dataUserPageLanguage];?></div>
    <div class="availablebb"><?php echo $page_Lang['available_balance'][$dataUserPageLanguage];?></div>
    <div class="point_sum" id="point_sum"><?php echo $dataPontEarnings;?>$</div>
    <div class="point_to_dolar"><a class="waves-effect waves-light btn blue convertpoint"><?php echo $page_Lang['calculate_point_to_money'][$dataUserPageLanguage];?></a></div>
    <div class="point_sum_note"><?php echo $page_Lang['varning_calculate_button'][$dataUserPageLanguage];?></div>
    
</div>
</div>
<!---->
</div>
<!---->
<!---->
<div class="current_withdrawal">
<div class="next_payouts inob"><?php echo $page_Lang['transfer_your_money_title'][$dataUserPageLanguage];?></div>
<div class="n_payouts">
<?php if($dataPontEarnings >= 50){?>
<div class="pay_day"><?php echo $page_Lang['you_can_transfer_your_pointed_money'][$dataUserPageLanguage];?></div>
<?php }else{?>
<div class="pay_day"><?php echo $page_Lang['can_not_transfer_your_pointed_money'][$dataUserPageLanguage];?> 50$.</div>
<?php }?>
<div class="vpymnt" id="remmon"><?php echo $dataPontEarnings;?>$</div>  
<div class="may_pay"><?php echo $page_Lang['warning_transfer_money_button'][$dataUserPageLanguage];?></div>
<div class="may_pay" style="padding-top:10px;"><a class="waves-effect waves-light btn blue transfermoneyfrombalance"><?php echo $page_Lang['transfer_my_balance_to'][$dataUserPageLanguage];?></a></div>
</div>
</div>
<!---->