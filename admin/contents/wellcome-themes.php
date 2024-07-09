<div class="page_title bold"><?php echo $page_Lang['wellcome_themes'][$dataUserPageLanguage];?></div>
<div class="global_right_wrapper">
        <?php
			  $i = 1;
		  foreach (glob($LoginRegiserThemeFolder . "/*", GLOB_ONLYDIR) as $theme_url) {
			  
            include($theme_url . '/info.php');
            $theme = str_replace('wellcome_themes/', '', $theme_url);
			$activeTheme ='';
			if($loginTheme == $themeFolder){
		      $activeTheme = '<div class="activeTheme t_icon" id="typ'.$i.'" data-acType="Activated">Activated </div>';
			}else{
			  $activeTheme = '<div class="UserThisTheme t_icon" id="typ'.$i.'" data-acType="Active">Use this theme</div>';
			}
         ?>
         <div class="theme_wrap wellcome_theme" id="<?php echo $i;?>" data-theme="<?php echo $themeFolder;?>" data-type="wellcomeTheme">
            <div class="theme_container" id="on<?php echo $i;?>">
              <div class="theme-screen"><img src="<?php echo $themeImg;?>" /></div>
              <div class="theme-name"><?php echo $themeName;?></div>
              <div class="author">Author: <span><a href="<?php echo $themeAuthorUrl;?>"><?php echo $themeAuthor;?></a></span></div>
              <?php echo $activeTheme;?>
            </div>
         </div>
		 
		 <?php   $i++; }?>
</div>