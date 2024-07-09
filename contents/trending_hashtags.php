<?php 
$TrendingTag = $trendtag;
$TotalUniqTag = $value;
?>
<!--Hashtag STARTED-->
<a href="<?php echo $base_url.'hashtag/'.$TrendingTag;?>">
<div class="hitHash  hvr-underline-from-center">
  <span class="iconHitHash icons"></span>
  <div class="hitHashnSum">
    <div class="hitHashn">#<?php echo $TrendingTag;?></div>
    <div class="hashSum"><?php echo $TotalUniqTag;?> <?php echo $page_Lang['public_tag'][$dataUserPageLanguage];?></div>
  </div>
</div>
</a>
<!--Hashtag FINISHED-->
