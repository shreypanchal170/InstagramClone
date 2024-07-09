<?php if($dataUserType == '1'){?>
     <a href="<?php echo $base_url;?>">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span  style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('home');?></span><span class="lt"><?php echo $page_Lang['home_page'][$dataUserPageLanguage];?></span></div>
    </a> 
    <a href="<?php echo $base_url;?>dashboard/dashboard">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span  style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('admin');?></span><span class="lt"><?php echo $page_Lang['dashboard_admin'][$dataUserPageLanguage];?></span></div>
    </a>
    <?php if($Dot->Dot_GetMarketUrlName($uid)){?>
    <a href="<?php echo $base_url;?>mymarket/<?php echo $Dot->Dot_GetMarketUrlName($uid);?>">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('my_store');?></span><span class="lt"><?php echo $page_Lang['my_stores'][$dataUserPageLanguage];?></span></div>
    </a> 
    <?php }?>  
    <a href="<?php echo $base_url;?>profile/stories/<?php echo $dataUsername;?>">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('story');?></span><span class="lt"><?php echo $page_Lang['my_stories'][$dataUserPageLanguage];?></span></div>
    </a>  
    <a href="<?php echo $base_url;?>saved">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('saved');?></span><span class="lt"><?php echo $page_Lang['saved_posts'][$dataUserPageLanguage];?></span></div>
    </a> 
    <a href="<?php echo $base_url;?>chat">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('messenger');?></span><span class="lt"><?php echo $page_Lang['messages_text'][$dataUserPageLanguage];?></span></div>
    </a>
    <a href="<?php echo $base_url;?>visitors">
    <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('visited_your_profile');?></span><span class="lt"><?php echo $page_Lang['u_profile_visitors'][$dataUserPageLanguage];?></span></div>
    </a>
    <a href="<?php echo $base_url;?>favourites">
    <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('addFavourite');?></span><span class="lt"><?php echo $page_Lang['favourite_list'][$dataUserPageLanguage];?></span></div>
    </a>  
    <div class="menu-arrow"></div>
    <a href="<?php echo $base_url;?>marketplace">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('marketplace');?></span><span class="lt"><?php echo $page_Lang['market_place'][$dataUserPageLanguage];?></span></div>
    </a>
    <a href="<?php echo $base_url;?>cart">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('shopping_cart');?></span><span class="lt"><?php echo $page_Lang['your_shopping_card'][$dataUserPageLanguage];?></span><span class="cart_count"><?php echo $Dot->Dot_CalculateUserShoppingCartProducts($uid);?></span></div>
    </a>
    <a href="<?php echo $base_url;?>myorders">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('your_orders');?></span><span class="lt"><?php echo $page_Lang['my_orders'][$dataUserPageLanguage];?></span><span class="cart_count_ord"><?php echo $Dot->Dot_CalculateUserOrderedProducts($uid);?></span></div>
    </a>
    <a href="<?php echo $base_url;?>incomingorders">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('incoming_orders');?></span><span class="lt"><?php echo $page_Lang['your_incoming_orders'][$dataUserPageLanguage];?></span><span class="cart_count_ord"><?php echo $Dot->Dot_CalculateUserInComingOrdersProducts($uid);?></span></div>
    </a>  
     <div class="menu-arrow"></div>
      <a href="<?php echo $base_url;?>people">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('global_users');?></span><span class="lt"><?php echo $page_Lang['global_users'][$dataUserPageLanguage];?></span></div>
      </a>
      <a href="<?php echo $base_url;?>people?pu=nearby">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('newbyuser');?></span><span class="lt"><?php echo $page_Lang['near_by_users'][$dataUserPageLanguage];?></span></div>
      </a>
      <a href="<?php echo $base_url;?>people?pu=favorite">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('your_user_favourites');?></span><span class="lt"><?php echo $page_Lang['your_favourite_users'][$dataUserPageLanguage];?></span></div>
      </a>
      <a href="<?php echo $base_url;?>people?pu=search">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('search_user_with_filter');?></span><span class="lt"><?php echo $page_Lang['search_near_by_user'][$dataUserPageLanguage];?></span></div>
      </a>  
    <div class="menu-arrow"></div>
    <a href="<?php echo $base_url;?>earnings">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('earnings');?></span><span class="lt"><?php echo $page_Lang['your_earnings'][$dataUserPageLanguage];?></span></div>
    </a>  
    <a href="<?php echo $base_url;?>earnings?u=market_earnings">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('marketing_earnings');?></span><span class="lt"><?php echo $page_Lang['your_market_earnings'][$dataUserPageLanguage];?></span></div>
    </a> 
    <a href="<?php echo $base_url;?>earnings?u=payouts">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('payout');?></span><span class="lt"><?php echo $page_Lang['your_payouts'][$dataUserPageLanguage];?></span></div>
    </a>
    <a href="<?php echo $base_url;?>earnings?u=withdrawals">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('withdrawal');?></span><span class="lt"><?php echo $page_Lang['your_withdrawal'][$dataUserPageLanguage];?></span></div>
    </a> 
     <a href="<?php echo $base_url;?>earnings?u=points">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('points');?></span><span class="lt"><?php echo $page_Lang['my_points'][$dataUserPageLanguage];?></span></div>
    </a>
    <div class="menu-arrow"></div>  
    <a href="<?php echo $base_url;?>marketThemes">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('marketthemes');?></span><span class="lt"><?php echo $page_Lang['market_templates'][$dataUserPageLanguage];?></span></div>
    </a>
     <a href="<?php echo $base_url;?>boosted">
        <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('boosted_posts');?></span><span class="lt"><?php echo $page_Lang['boosted_posts'][$dataUserPageLanguage];?></span></div>
    </a>
    <a href="<?php echo $base_url;?>credit/buyCredit">
        <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('create_advertisement');?></span><span class="lt">Advertisement</span></div>
    </a>  
    <a href="<?php echo $base_url;?>your-ads/of-ads">
        <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('your_ads');?></span><span class="lt">Your ads</span></div>
    </a> 
    <?php if($showHideEventFeature != '1'){?>
        <a href="<?php echo $base_url;?>events/events">
            <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('event');?></span><span class="lt"><?php echo $page_Lang['all_events'][$dataUserPageLanguage];?></span></div>
        </a> 
    <?php } ?>  
<?php }else if($dataUserType == '0'){?>
         <a href="<?php echo $base_url;?>">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span  style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('home');?></span><span class="lt"><?php echo $page_Lang['home_page'][$dataUserPageLanguage];?></span></div>
         </a>
         <?php if($Dot->Dot_GetMarketUrlName($uid)){?>
        <a href="<?php echo $base_url;?>mymarket/<?php echo $Dot->Dot_GetMarketUrlName($uid);?>">
             <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('my_store');?></span><span class="lt"><?php echo $page_Lang['my_stores'][$dataUserPageLanguage];?></span></div>
        </a> 
        <?php }?>
         <a href="<?php echo $base_url;?>profile/stories/<?php echo $dataUsername;?>">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('story');?></span><span class="lt"><?php echo $page_Lang['my_stories'][$dataUserPageLanguage];?></span></div>
       </a> 
        <a href="<?php echo $base_url;?>saved">
             <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('saved');?></span><span class="lt"><?php echo $page_Lang['saved_posts'][$dataUserPageLanguage];?></span></div>
        </a> 
        <a href="<?php echo $base_url;?>chat">
              <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('messenger');?></span><span class="lt"><?php echo $page_Lang['messages_text'][$dataUserPageLanguage];?></span></div>
        </a> 
				 <?php if($Dot->Dot_ProPriceTableAvantagesStatus(2) == '1'){?>
                 <a href="<?php echo $base_url;?>visitors">
                    <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('visited_your_profile');?></span><span class="lt"><?php echo $page_Lang['u_profile_visitors'][$dataUserPageLanguage];?></span></div>
                 </a>
                 <?php } ?>
                 <?php if($Dot->Dot_ProPriceTableAvantagesStatus(6) == '1'){?>
                 <a href="<?php echo $base_url;?>favourites">
                    <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('addFavourite');?></span><span class="lt"><?php echo $page_Lang['favourite_list'][$dataUserPageLanguage];?></span></div>
                 </a> 
                 <?php } ?> 
         <?php if($showHideEventFeature != '1'){?>
            <a href="<?php echo $base_url;?>events/events">
                 <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('event');?></span><span class="lt"><?php echo $page_Lang['all_events'][$dataUserPageLanguage];?></span></div>
            </a> 
         <?php } ?>   
        <?php if($marketPost == 0){?> 
        <div class="menu-arrow"></div>
        <a href="<?php echo $base_url;?>marketplace">
               <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('marketplace');?></span><span class="lt"><?php echo $page_Lang['market_place'][$dataUserPageLanguage];?></span></div>
        </a>
        <a href="<?php echo $base_url;?>cart">
               <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('shopping_cart');?></span><span class="lt"><?php echo $page_Lang['your_shopping_card'][$dataUserPageLanguage];?></span><span class="cart_count"><?php echo $Dot->Dot_CalculateUserShoppingCartProducts($uid);?></span></div>
        </a>
        <a href="<?php echo $base_url;?>myorders">
               <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('your_orders');?></span><span class="lt"><?php echo $page_Lang['my_orders'][$dataUserPageLanguage];?></span><span class="cart_count_ord"><?php echo $Dot->Dot_CalculateUserOrderedProducts($uid);?></span></div>
        </a>
        <a href="<?php echo $base_url;?>incomingorders">
               <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('incoming_orders');?></span><span class="lt"><?php echo $page_Lang['your_incoming_orders'][$dataUserPageLanguage];?></span><span class="cart_count_ord"><?php echo $Dot->Dot_CalculateUserInComingOrdersProducts($uid);?></span></div>
        </a>
        <?php }?>  
        <div class="menu-arrow"></div>
            <a href="<?php echo $base_url;?>people">
                   <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('global_users');?></span><span class="lt"><?php echo $page_Lang['global_users'][$dataUserPageLanguage];?></span></div>
              </a>
              <a href="<?php echo $base_url;?>people?pu=nearby">
                   <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('newbyuser');?></span><span class="lt"><?php echo $page_Lang['near_by_users'][$dataUserPageLanguage];?></span></div>
              </a>
              <a href="<?php echo $base_url;?>people?pu=favorite">
                   <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('your_user_favourites');?></span><span class="lt"><?php echo $page_Lang['your_favourite_users'][$dataUserPageLanguage];?></span></div>
              </a>
              <a href="<?php echo $base_url;?>people?pu=search">
                   <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('search_user_with_filter');?></span><span class="lt"><?php echo $page_Lang['search_near_by_user'][$dataUserPageLanguage];?></span></div>
              </a>
        
        <div class="menu-arrow"></div>
       <a href="<?php echo $base_url;?>earnings">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('earnings');?></span><span class="lt"><?php echo $page_Lang['your_earnings'][$dataUserPageLanguage];?></span></div>
       </a>
       <?php if($marketPost == 0){?>
       <a href="<?php echo $base_url;?>earnings?u=market_earnings">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('marketing_earnings');?></span><span class="lt"><?php echo $page_Lang['your_market_earnings'][$dataUserPageLanguage];?></span></div>
        </a>
        <?php }?>
       <a href="<?php echo $base_url;?>earnings?u=payouts">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('payout');?></span><span class="lt"><?php echo $page_Lang['your_payouts'][$dataUserPageLanguage];?></span></div>
       </a>
       <a href="<?php echo $base_url;?>earnings?u=withdrawals">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('withdrawal');?></span><span class="lt"><?php echo $page_Lang['your_withdrawal'][$dataUserPageLanguage];?></span></div>
       </a>
       <?php if($pointSystemStatus == 1){?>
       <a href="<?php echo $base_url;?>earnings?u=points">
           <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('points');?></span><span class="lt"><?php echo $page_Lang['my_points'][$dataUserPageLanguage];?></span></div>
        </a> 
        <?php }?>  
        <div class="menu-arrow"></div>
        <?php if($marketUser){?>
        <a href="<?php echo $base_url;?>marketThemes">
             <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('marketthemes');?></span><span class="lt"><?php echo $page_Lang['market_templates'][$dataUserPageLanguage];?></span></div>
        </a>
        <?php }?>
        <?php if($checkHasBoostedBefore){?>
		   <a href="<?php echo $base_url;?>boosted">
             <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('boosted_posts');?></span><span class="lt"><?php echo $page_Lang['boosted_posts'][$dataUserPageLanguage];?></span></div>
           </a>
		<?php }?> 
<?php if($showHideCreatedAdsPage == '0') {?>
    <a href="<?php echo $base_url;?>credit/buyCredit"><div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('create_advertisement');?></span><span class="lt">Advertisement</span></div>
    </a>  
    <a href="<?php echo $base_url;?>of-ads">
         <div class="global-sidebar-menu-box hvr-underline-from-center"><span style="float: left;margin-right: 10px;"><?php echo $Dot->Dot_SelectedMenuIcon('your_ads');?></span><span class="lt">Your ads</span></div>
    </a> 
    <?php } ?>   
<?php }?>