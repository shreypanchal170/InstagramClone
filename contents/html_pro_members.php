<?php 
  $ProUsers = $Dot->Dot_ProUsersWidget();
if($ProUsers){?>
<div class="uMnUsrS">
<?php echo $Dot->Dot_CheckTourSawBefore($uid, 1721) ? '<div style="position:absolute;width:100%;height:100%;z-index:1;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1721" data-tip="1721"></div>' : '';?>
    <div class="globalBoxHeader">
        <div class="hsvg_pp"><?php echo $Dot->Dot_SelectedMenuIcon('pro_member');?></div>
        <div class="hm_t"><?php echo $page_Lang['pro_members_title'][$dataUserPageLanguage];?></div>
    </div>
    <div class="proBoxRight">
          
<?php   foreach($ProUsers as $pu){
				     $proUserID = $pu['user_id'];
					 $proUserUsername = $pu['user_name'];
					 $proUserFullName = $pu['user_fullname'];
					 $proUserAvatar = $Dot->Dot_UserAvatar($proUserID, $base_url);
			?>		
              <!---->
               <div class="pro_pbwg8U tooltipster-punk-preview tooltipsteredOn sep" data-type="userfirstinfo" data-id="<?php echo $proUserID;?>" title="<?php echo $proUserFullName;?>">
                  <div class="pro_jjzlbU" style="background-image: url('<?php echo $proUserAvatar;?>');">
                     <img src="<?php echo $proUserAvatar;?>" class="proexPexU"> 
                  </div>
               </div>
             <!---->  
			<?php } ?> 
    </div> 
    <?php if($dataUserProType == 0){?>
          <div class="becomeproo becomepro"><?php echo $page_Lang['putmehere'][$dataUserPageLanguage];?><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#d62127"><path d="M93.6755,86l-27.38383,-27.38383c-2.967,-2.967 -2.967,-7.783 0,-10.75v0c2.967,-2.967 7.783,-2.967 10.75,0l33.067,33.067c2.80217,2.80217 2.80217,7.33867 0,10.13367l-33.067,33.067c-2.967,2.967 -7.783,2.967 -10.75,0v0c-2.967,-2.967 -2.967,-7.783 0,-10.75z"></path></g></g></svg></div>
   <?php }?>
</div>
<?php }?>