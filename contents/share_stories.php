<div class="_81kxQ"><?php echo $page_Lang['user_stories'][$dataUserPageLanguage];?>
<form id="storiesform" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">
      <label class="label_storyUpload show_this" data-id="stories" data-position="left" data-tooltip="<?php echo $page_Lang['share_your_new_story'][$dataUserPageLanguage];?>" for="storie_img"></label>
      <input type="file" name="storieimg" id="storie_img" data-id="stories">
<span class="plus_new_story"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M96,16c-44.184,0 -80,35.816 -80,80c0,44.184 35.816,80 80,80c44.184,0 80,-35.816 80,-80c0,-44.184 -35.816,-80 -80,-80zM128,104h-24v24c0,4.416 -3.584,8 -8,8v0c-4.416,0 -8,-3.584 -8,-8v-24h-24c-4.416,0 -8,-3.584 -8,-8v0c0,-4.416 3.584,-8 8,-8h24v-24c0,-4.416 3.584,-8 8,-8v0c4.416,0 8,3.584 8,8v24h24c4.416,0 8,3.584 8,8v0c0,4.416 -3.584,8 -8,8z"></path></g></g></svg></span>
</form>
</div>
<?php 
	    $checkStories=$Dot->Dot_FriendStoryPost($uid);
		if(empty($checkStories)){
			$storiesTour = $Dot->Dot_CheckTourSawBefore($uid, 1718) ? '<div style="position:absolute;width:100%;height:100%;z-index:1;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1718" data-tip="1718"></div>' : '';
			 echo '
			 <div class="story_container_empty white_bg">
			      '.$storiesTour.'
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
