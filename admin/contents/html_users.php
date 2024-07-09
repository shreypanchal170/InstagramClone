<div class="UserCardContainer body<?php echo $dataUserID;?>" id="<?php echo $dataUserID;?>" data-last="<?php echo $dataUserID;?>" data-type="profile">
<div class="m0NAq_friend">
  <!--Cover STARTED-->
  <div class="_pbwg8U_">
    <div class="_jjzlbU_" style="background-image: url(<?php echo $CardDataUserCover;?>);">
      <img src="<?php echo $CardDataUserCover;?>" class="_exPexU">
    </div>
  </div>
  <!--Cover FINISHED-->
  <!--Avatar STARTED-->
  <div class="a4Ce_">
    <div class="infoProfileAvatar">
      <img src="<?php echo $CardDataUserAvatar;?>">
    </div>
  </div>
  <!--Avatar FINISHED-->
  <!--UserName and User Mention STARTED-->
  <div class="userNameMention">
    <div class="userName"><?php echo $dataUserFullName;?></div>
    <div class="userMention">@<?php echo $dataUserUserName;?></div>
  </div>
  <!--UserName and User Mention FINISHED-->
  <!--Tree Menu STARTED-->
  <div class="cardMenuContainer">
    <div class="carProfileLink hvr-underline-from-center">
      <a href="<?php echo $base_url.'profile/'.$dataUserUserName;?>">
        <div class="carHeaderSum"><?php echo $CalculateTheUserPost;?></div>
        <div class="carHeaderText"><?php echo $page_Lang['user_posts'][$dataUserPageLanguage];?></div>
      </a>
    </div>
    <div class="carProfileLink hvr-underline-from-center">
      <a href="<?php echo $base_url.'profile/followers/'.$dataUserUserName;?>">
        <div class="carHeaderSum"><?php echo $CalculateTheFollowers;?></div>
        <div class="carHeaderText"><?php echo $page_Lang['user_followers'][$dataUserPageLanguage];?></div>
      </a>
    </div>
    <div class="carProfileLink hvr-underline-from-center">
      <a href="<?php echo $base_url.'profile/friends/'.$dataUserUserName;?>">
        <div class="carHeaderSum"><?php echo $CalculateTheFriends;?></div>
        <div class="carHeaderText"><?php echo $page_Lang['user_friends'][$dataUserPageLanguage];?></div>
      </a>
    </div>
  </div>
  <!--Tree Menu FINISHED-->
  <!---->
  <div class="cardMenuContainer_admin">
    <div class="carProfileLink hvr-underline-from-center">
           <div class="button_general  border-radius datauser" id="<?php echo $dataUserID;?>" data-last="<?php echo $dataUserID;?>" data-type="profile"><?php echo $page_Lang['profile'][$dataUserPageLanguage];?></div>
    </div>
    <div class="carProfileLink hvr-underline-from-center">
           <?php echo $blockedNotBlocked;?>
    </div>
    <div class="carProfileLink hvr-underline-from-center">
           <div class="button_general border-radius del_data_user" data-type="deleteThisUser" id="<?php echo $dataUserID;?>"><?php echo $page_Lang['delete'][$dataUserPageLanguage];?></div>
    </div>
  </div>
  <!---->
</div>
</div>