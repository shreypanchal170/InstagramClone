<div class="_81kxQ"><?php echo $page_Lang['user_stories'][$dataUserPageLanguage];?>
<form id="storiesform" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
      <label class="label_storyUpload show_this" data-id="stories" data-position="left" data-tooltip="<?php echo $page_Lang['share_your_new_story'][$dataUserPageLanguage];?>" for="storie_img"></label>
      <input type="file" name="storieimg" id="storie_img" data-id="stories">
<span class="plus_new_story icons_two"></span>
</form>
</div>
<?php 
	    $checkStories=$Dot->Dot_AllStoryPost($uid);
		if(empty($checkStories)){
			 echo '
			 <div class="story_container_empty white_bg">
                  <div class="no-stories_yet">'.$page_Lang['no_stories_yet'][$dataUserPageLanguage].'</div>
             </div>
			 ';
		}else{
		  echo '
			 <div class="story_container white_bg _5q_tv" id="stories"> 
             </div>
			 ';
		}
	?>
