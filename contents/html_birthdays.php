<?php
$birthDays = $Dot->UserBirthDay($uid);
if($birthDays){
	echo '<div class="uMnUsrS"><div class="birthDayBoxHeader">Friends Birthdays</div><div class="suggestedBoxRight">';
   foreach($birthDays as $births){
      $birthdayUserFullname = $births['user_fullname'];
	  $birthdayUserName = $births['user_name'];
	  $birthdayUserID = $births['user_id'];
?>
<div class="birthday_boxText hvr-underline-from-center getminib" id="miniuser_<?php echo $birthdayUserID;?>" data-page="minibox" data-id="<?php echo $birthdayUserID;?>" data-user="<?php echo $birthdayUserName;?>"><span class="completedIcon"><?php echo $Dot->Dot_SelectedMenuIcon('birthday_icon');?></span><span class="completeText truncate"><?php echo $birthdayUserFullname;?></span></div>
<?php   }
echo '</div></div>';
}
?>

