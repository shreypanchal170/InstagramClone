<!---->
<div class="earning_menu">
     <div class="earning_menu_item <?php echo $earning;?>"><a href="<?php echo $base_url;?>earnings"><?php echo $page_Lang['your_donate_earnings'][$dataUserPageLanguage];?></a></div>
     <?php if($marketPost == 0){?><div class="earning_menu_item <?php echo $marketearning;?>"><a href="<?php echo $base_url;?>earnings?u=market_earnings"><?php echo $page_Lang['your_market_earnings'][$dataUserPageLanguage];?></a></div><?php }?>
     <div class="earning_menu_item <?php echo $payout;?>"><a href="<?php echo $base_url;?>earnings?u=payouts"><?php echo $page_Lang['your_payouts'][$dataUserPageLanguage];?></a></div>
     <div class="earning_menu_item <?php echo $withdrawal;?>"><a href="<?php echo $base_url;?>earnings?u=withdrawals"><?php echo $page_Lang['your_withdrawal'][$dataUserPageLanguage];?></a></div>
     <?php if($pointSystemStatus == 1){?><div class="earning_menu_item <?php echo $points;?>"><a href="<?php echo $base_url;?>earnings?u=points"><?php echo $page_Lang['my_points'][$dataUserPageLanguage];?></a></div><?php }?>
</div>
<!---->