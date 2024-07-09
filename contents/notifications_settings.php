<div class="settings_form_container">
  <h1 class="settings_header">
    <?php echo $page_Lang['notifications_settings'][$dataUserPageLanguage];?>
  </h1>
  <div class="HgNB_"> 
  <!--Setting Imput Item STARTED-->
  <div class="set_box_not">
      <label for="post_like">
        <input type="checkbox" class="notChange" post-type="notification" post-not="post_like" id="post_like" value="<?php echo $dataPostLikeNotification == '1' ? "0":"1"; ?>"  <?php echo $dataPostLikeNotification == '1' ? "checked='checked'":""; ?>/>
        <span><?php echo $page_Lang['liked_my_post'][$dataUserPageLanguage];?></span>
      </label>
  </div>
  <p class="_7LpC8" id="post_likea"><?php echo $page_Lang['notification_liked_post'][$dataUserPageLanguage];?></p>
 <!--Setting Imput Item FINISHED-->
 <!--Setting Imput Item STARTED-->
  <div class="set_box_not">
      <label for="comment_like">
        <input type="checkbox" class="notChange" id="comment_like" post-type="notification" post-not="comment_like" value="<?php echo $dataCommentLikeNotification == '1' ? "0":"1"; ?>"  <?php echo $dataCommentLikeNotification == '1' ? "checked='checked'":""; ?>/>
        <span><?php echo $page_Lang['liked_my_comment'][$dataUserPageLanguage];?></span>
      </label>
  </div>
  <p class="_7LpC8" post-not="comment_likea"><?php echo $page_Lang['notification_liked_comment'][$dataUserPageLanguage];?></p>
 <!--Setting Imput Item FINISHED-->
 <!--Setting Imput Item STARTED-->
  <div class="set_box_not">
      <label for="post_comment">
        <input type="checkbox" class="notChange" id="post_comment" post-type="notification" post-not="post_comment"  value="<?php echo $dataPostCommentNotification == '1' ? "0":"1"; ?>"  <?php echo $dataPostCommentNotification == '1' ? "checked='checked'":""; ?>/>
        <span><?php echo $page_Lang['notification_commented_post'][$dataUserPageLanguage];?></span>
      </label>
  </div>
  <p class="_7LpC8" id="post_commenta"><?php echo $page_Lang['notification_commented_on_post'][$dataUserPageLanguage];?></p>
 <!--Setting Imput Item FINISHED-->
 <!--Setting Imput Item STARTED-->
  <div class="set_box_not">
      <label for="profile_follow">
        <input type="checkbox" class="notChange" id="profile_follow" post-type="notification" post-not="profile_follow"  value="<?php echo $dataFollowNotification == '1' ? "0":"1"; ?>"  <?php echo $dataFollowNotification == '1' ? "checked='checked'":""; ?>/>
        <span><?php echo $page_Lang['notification_followed_me'][$dataUserPageLanguage];?></span>
      </label>
  </div>
  <p class="_7LpC8" id="profile_followa"><?php echo $page_Lang['notification_friend_request'][$dataUserPageLanguage];?></p>
 <!--Setting Imput Item FINISHED-->
 <!--Setting Imput Item STARTED-->
  <div class="set_box_not">
      <label for="profile_visit">
        <input type="checkbox" class="notChange" id="profile_visit" post-type="notification" post-not="profile_visit"  value="<?php echo $dataVisitedProfileNotification == '1' ? "0":"1"; ?>"  <?php echo $dataVisitedProfileNotification == '1' ? "checked='checked'":""; ?>/>
        <span><?php echo $page_Lang['notification_visited_profile'][$dataUserPageLanguage];?></span>
      </label>
  </div>
  <p class="_7LpC8" id="profile_visita"><?php echo $page_Lang['notification_when_visited_profile'][$dataUserPageLanguage];?></p>
 <!--Setting Imput Item FINISHED-->
 </div> 
</div> 