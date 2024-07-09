<!---->
<div class="poSBoxContainer">
   <div class="post-modal-Wrap">
       <div class="post-modal-middle">
           <!--header started-->
           <div class="post-modal-header">
               <div class="poster_avatar"><img src="<?php echo $dataUserAvatar;?>" class="a0uk"/></div> 
               <div class="poster_Name"><?php echo $dataUserFullName;?></div>
               <div class="posting_arrow"></div>
               <div class="post_icons text_post_icon"></div>
               <div class="who_see show_this everyone_icon" id="who" data-who="1" data-see="everyone" data-position="left" data-tooltip="<?php echo $page_Lang['show_post_everyone'][$dataUserPageLanguage];?>"></div>
               <div class="who_see_list_box">
                   <div class="who_see_item hvr-underline-from-center" id="1" data-ic="everyone" data-nm="<?php echo $page_Lang['show_post_everyone'][$dataUserPageLanguage];?>"><div class="w-see everyone_icon"></div> <?php echo $page_Lang['show_post_everyone'][$dataUserPageLanguage];?></div>
                   <div class="who_see_item hvr-underline-from-center" id="2" data-ic="onlyme" data-nm="<?php echo $page_Lang['show_just_me'][$dataUserPageLanguage];?>"><div class="w-see just_me_icon"></div> <?php echo $page_Lang['show_just_me'][$dataUserPageLanguage];?></div>
                   <div class="who_see_item hvr-underline-from-center" id="3" data-ic="friends" data-nm="<?php echo $page_Lang['show_just_friends'][$dataUserPageLanguage];?>"><div class="w-see just_friends_icon"></div> <?php echo $page_Lang['show_just_friends'][$dataUserPageLanguage];?></div>
               </div>
           </div>
           <!--header finished-->
           <!--Input and textarea STARTED-->
           <div class="write_post_information">
               <!--Input STARTED-->
               <div class="global_post_box">
                   <input type="text" class="title" id="title" placeholder="<?php echo $page_Lang['post_title'][$dataUserPageLanguage];?>" >
               </div>
               <!--Input FINISHED-->
               <!--Textarea STARTED-->
               <div class="global_post_box">
                  <textarea class="description" id="details" placeholder="<?php echo $page_Lang['post_text'][$dataUserPageLanguage];?>"></textarea>
               </div>
               <!--Textarea FINISHED-->
               <!--Hashtag STARTED-->
               <div class="global_post_box">
                  <input class="hashtag_" id="hashTag" placeholder="<?php echo $page_Lang['post_tag'][$dataUserPageLanguage];?>" >
               </div>
               <!--Hashtag FINISHED-->  
           </div>
           <!--Input and Textarea FINISHED-->
           <!--Post Footer STARTED-->
             <div class="post_box_footer">
                  <div class="control left_btn"><div class="close_post_box" id="closePost"><?php echo $page_Lang['post_cancel'][$dataUserPageLanguage];?></div></div>
                  <div class="control right_btn"><div class="share_post_box share_quotes " id="thisup" data-type="quotes"><?php echo $page_Lang['post_share'][$dataUserPageLanguage];?></div></div>
             </div>  
           <!--Post Footer FINISHED-->
       </div>
   </div>
</div>
<!---->