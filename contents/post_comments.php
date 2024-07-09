<?php 
$UserCommentID = $UserCommentsData['comment_id'];
$UserCommentUID = $UserCommentsData['uid_fk'];
$UserCommentText = $UserCommentsData['comment_text'];
$UserCommentedPostID = $UserCommentsData['post_id_fk']; 
$UserSticker = isset($UserCommentsData['sticker']) ? $UserCommentsData['sticker'] : NULL;
$UserGif = isset($UserCommentsData['gif']) ? $UserCommentsData['gif'] : NULL;
$UserCommentTime=$UserCommentsData['comment_created_time']; // Commented time 
$CommentTime=date("c", $UserCommentTime);
$UserCommentedUserName = $UserCommentsData['user_name'];
$recordedVoice = $UserCommentsData['voice'];
$UserCommentedFullName = $UserCommentsData['user_fullname'];
$UserCommentedAvatar = $Dot->Dot_UserAvatar($UserCommentUID, $base_url);
/*Check User Liked the Uniq Comment Before*/ 
$CheckUserLikedTheCommendBefore = $Dot->Dot_CheckCommentLiked($uid,$UserCommentID);
$commentLikeButtonClass = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 192 192" style=" fill:#000000;" class="cln_'.$UserCommentID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8A99A4"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg>'; 
$commentLikeType = 'c_like';
if($CheckUserLikedTheCommendBefore) {
   $commentLikeButtonClass = '<span class="likedBefore glyphsSpriteHeart__outline__24__grey_12_ok" class="clnb_'. $UserCommentID.'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 192 192" style=" fill:#000000;" class="cln_'.$UserCommentID.'"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e74c3c"><path d="M61.0875,25.6c-23.136,0 -41.8875,18.7515 -41.8875,41.8875c0,40.5824 47.5,79.4031 69.1,96.3375c0,0 3.8216,2.575 7.7,2.575c3.8784,0 7.7,-2.575 7.7,-2.575c1.44531,-1.13386 3.45164,-2.82026 5.1125,-4.15c1.98344,0.39912 3.4,0.25 3.4,0.25l0.2375,-0.0125l0.225,-0.025c7.25507,-0.7881 19.20999,-2.22473 31.1125,-5.9375c11.9025,-3.71277 24.16774,-9.6527 31.1125,-20.81251c8.14553,-13.08318 4.21276,-30.3863 -8.65,-38.75c4.00211,-8.73272 6.55,-17.75324 6.55,-26.9c0,-23.136 -18.7515,-41.8875 -41.8875,-41.8875c-22.112,0 -34.9125,19.2 -34.9125,19.2c0,0 -12.8005,-19.2 -34.9125,-19.2zM119.1125,83.175c2.99183,-0.10881 6.05948,0.6549 8.825,2.375c7.68777,4.78549 9.725,12.19999 9.725,12.2l1.7375,6.4l6.3375,-1.9625c0,0 5.61374,-2.05956 13.3,2.725h0.0125c7.37307,4.58585 9.57917,14.08746 4.9875,21.4625c-4.30644,6.92019 -13.6114,12.08997 -24.0625,15.35c-10.35985,3.23156 -21.36672,4.61597 -28.4375,5.3875c-0.1049,-0.03286 -0.21381,-0.06888 -0.3125,-0.1c-0.05914,-0.05914 -0.10781,-0.1163 -0.1625,-0.175c-2.43117,-6.68689 -6.05891,-17.18198 -7.7375,-27.9125c-1.69212,-10.81703 -1.15629,-21.45506 3.15,-28.375c2.29292,-3.68654 5.81665,-6.07368 9.6875,-6.975c0.96771,-0.22533 1.95272,-0.36373 2.95,-0.4z"></path></g></g></svg></span>';
   $commentLikeType = 'c_unlike';
    
}
 $cVerifiedBadge ='';
$CheckUserVerifiedFromData = $Dot->Dot_CheckUserVerified($UserCommentUID);
if($CheckUserVerifiedFromData){
   $cVerifiedBadge = '<span class="CmewfM Szr5J  coreSpriteVerifiedBadgeSmall icons" title="Doğrulanmış"></span>';
}
/*Show hide Total Comment Like*/
$TotalUniqCommentLike = $Dot->Dot_UniqCommentLikeCount($UserCommentID);
$totalCSum = 'display:none;';
if($TotalUniqCommentLike){
	$totalCSum = 'display:block;';
}
/*Check the Commented User is Loged in user id*/
$commented ='';
$commentDeleteButton = '';
$EditComment ='';
if($UserCommentUID == $uid){
	$commented = 'style="border-left:2px solid #3E99ED;"';
	$commentDeleteButton = '<span class="_15y0l"><div class="cKrt9 del_com" id="'.$UserCommentID.'" data-u="'.$UserCommentedUserName.'" data-ui="'.$UserCommentUID.'" data-type="deleteComment"><span class="glyphsSpriteDelete__outline__24__grey_13 Szr5J"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><g id="surface1"><path d="M90,-0.23077c-12.66346,0 -22.81731,9.92308 -23.53846,22.38462h-29.53846c-4.4423,0 -7.38462,2.94231 -7.38462,7.38462h-3c-6.63461,0 -11.76923,5.13462 -11.76923,11.76923v3h162.46154v-3c0,-6.63461 -5.13461,-11.76923 -11.76923,-11.76923h-3c0,-4.4423 -2.9423,-7.38462 -7.38462,-7.38462h-29.53846c-0.72115,-12.46154 -10.875,-22.38462 -23.53846,-22.38462zM90,15h12c4.09616,0 7.58654,3.20192 8.30769,7.15385h-28.61538c0.72115,-3.95192 4.21154,-7.15385 8.30769,-7.15385zM22.84615,51.69231l21.46154,140.30769h103.38462l21.46154,-140.30769zM43.61538,73.84615h8.07692l12.46154,96h-7.38462zM75.23077,73.84615h8.30769l5.07692,96h-8.76923zM108.46154,73.84615h8.30769l-4.61538,96h-8.07692zM140.30769,73.84615h7.38462l-12.46154,96h-7.38462z"></path></g></g></g></svg></span></div></span>';
	$EditComment ='<span class="_15y0l"><div class="cKrt9 editc_" id="'.$UserCommentID.'" data-post="'.$UserCommentedPostID.'" data-userprofile="'.$base_url.$UserCommentedUserName.'" data-name="'.$UserCommentedFullName.'"><span class="glyphsSpriteEdit__outline__24__grey_14 Szr5J"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M153.375,16c-5.79,0 -11.58,2.205 -16,6.625l-9.375,9.375l32,32l9.375,-9.375c8.832,-8.832 8.832,-23.16 0,-32c-4.42,-4.42 -10.21,-6.625 -16,-6.625zM116,44l-92,92v32h32l92,-92z"></path></g></g></svg></span></div></span>';
} 
$emoji = $Dot->Dot_ReplaceEmoji($UserCommentText, $base_url);
$fastEmoji = '';
if($emoji){
   foreach($emoji as $emo){
       $emojiKey = $emo['emoji_key'];
	   $emojiImage = $emo['image'];
	    $fastEmoji = str_replace($emojiKey, "<img src=\"{$base_url}uploads/fastEmojis/{$emojiImage}\" class='comment_emoji'>", htmlcode($UserCommentText));
   }
}
$upostComment = $Dot->GetTheMentions($UserCommentText,$base_url);
$sticker = $Dot->Dot_ReplaceSticker($UserSticker, $base_url);
$stiEmoji ='';
if($sticker){
   foreach($sticker as $sti){
       $stiKey = $sti['emoji_key'];
	   $stiImage = $sti['image'];
	   $stiEmoji = str_replace($stiKey, "<div class='stickerBody'><img src=\"{$base_url}uploads/emoticons/F_Sticker/{$stiImage}\" class='comment_sticker'></div>", htmlcode($UserSticker));
   }
}
$cGif = $Dot->Dot_ReplaceGif($UserGif, $base_url);
$giEmoji ='';
if($cGif){
   foreach($cGif as $sti){
       $giKey = $sti['emoji_key'];
	   $giImage = $sti['image'];
	   $giEmoji = str_replace($giKey, "<div class='stickerBody'><div class='gifContainer'><img src=\"{$base_url}uploads/gifs/{$giImage}\"></div></div>", htmlcode($UserGif));
   }
}
?>

<!--User Comment STARTED-->
<div class="gElp9 eo2As hov cUq_<?php echo $UserCommentID;?>" id="cUq_<?php echo $UserCommentID;?>" <?php echo $commented;?>>
  <div class="commentBody_w">  
  <!--Commented User Avatar STARTED-->
  <div class="comment_avatar show_card" id="<?php echo $UserCommentUID;?>" data-user="<?php echo $UserCommentedUserName;?>" data-type="userCard">
    <a href="<?php echo $base_url.'profile/'.$UserCommentedUserName;?>"><img class="_6q-tv" src="<?php echo $UserCommentedAvatar;?>" alt="<?php echo $UserCommentedFullName;?>"></a> 
  </div>
  <!--Commented User Avatar FINISHED-->
  <!--Comment and Username STARTED-->
  <div class="o-MQd simg" id="ed_com_<?php echo $UserCommentID;?>" data-comment="<?php echo htmlcode($UserCommentText);?>" data-this="<?php echo $UserCommentID;?>">  
     <a class="FPmhX" title="<?php echo $UserCommentedFullName;?>" href="<?php echo $base_url.'profile/'.$UserCommentedUserName;?>"><?php echo $UserCommentedFullName;?></a> <?php echo $cVerifiedBadge;?>
     <div class="commentitem_" data-linkify="this" data-linkify-target="_target">
     <?php 
		    if($emoji){
			    echo $fastEmoji;
			}else{
			   echo strip_unsafe(styletext(congract($upostComment))); 
			} 
			if($UserSticker){
		       echo $stiEmoji;
			}
			if($UserGif){
		       echo $giEmoji;
			}
		?>
     </div>
     <?php 
	     if($recordedVoice){
		        $getRecord = $Dot->Dot_GetUploadedAudioID($recordedVoice);
				$recordedaudioPath = $getRecord['audio_path'];  
				echo '
				<audio class="player_aud" preload="none" controls style="max-width:100%;">
					  <source src="'.$base_url.'uploads/audio/'.$recordedaudioPath.'" type="audio/mp3">
				   </audio>
				';
		 }
	 ?>
     <div class="uv">
     
     </div>
     <div class="commentitem_time timeago" title="<?php echo $CommentTime;?>"></div>
   </div>
  <!--Comment and Username FINISHED-->
  </div>
  <!--Edit delete like comment buttons STARTED-->
  <div class="UserCommentButtons">
    <div class="krLrw">
      <span class="fr66n clike" id="c_c<?php echo $UserCommentID;?>" data-post="<?php echo $UserCommentID;?>"  data-type="likeComment" data-lt="<?php echo $commentLikeType;?>"><div class="coreSpriteHeartOpen cKrt9"><span class="Szr5J cliked" id="cl<?php echo $UserCommentID;?>"><?php echo $commentLikeButtonClass;?></span></div></span><span class="fr66n cl2s" id="c_c_sum<?php echo $UserCommentID;?>" style="<?php echo $totalCSum;?>"><?php echo $TotalUniqCommentLike;?></span>
      <?php echo $commentDeleteButton; echo $EditComment;?>
      
    </div>
 </div>
<!--Edit delete like comment buttons FINISHED-->
</div>
<!--User Comment FINISHED-->