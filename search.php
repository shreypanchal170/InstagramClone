<?php 
//include_once 'functions/control.php';
include_once 'functions/inc.php';  
$page ='newsfeed'; 
//This file is displayed on all pages, all the changes you make can be displayed on all pages.
include("contents/header.php");
?> 
<div class="section">
   <div class="main">
       <div class="container">
            <div class="statusPostContainer">
                <!---->
                     <div class="searchBoxIputContainer">
                         <div class="searchicon__"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M83.2,19.2c-35.27042,0 -64,28.72958 -64,64c0,35.27042 28.72958,64 64,64c15.33765,0 29.42326,-5.44649 40.4625,-14.4875l38.2125,38.2125c1.60523,1.67194 3.98891,2.34544 6.23174,1.76076c2.24283,-0.58468 3.99434,-2.33619 4.57902,-4.57902c0.58468,-2.24283 -0.08882,-4.62651 -1.76076,-6.23174l-38.2125,-38.2125c9.04101,-11.03924 14.4875,-25.12485 14.4875,-40.4625c0,-35.27042 -28.72958,-64 -64,-64zM83.2,32c28.35279,0 51.2,22.84722 51.2,51.2c0,28.35279 -22.84721,51.2 -51.2,51.2c-28.35278,0 -51.2,-22.84721 -51.2,-51.2c0,-28.35278 22.84722,-51.2 51.2,-51.2z"></path></g></g></svg></div>
                         <input type="text" class="newSearch" id="search_u" data-type="search_explore" placeholder="<?php echo $page_Lang['serach_friends'][$dataUserPageLanguage];?>">
                     </div>
                       <div class="SearchResultHere">
                             <div class="searchResults" id="searchResults"></div>
                       </div> 
                        <?php 
					     $OldSearchList = $Dot->Dot_ShowSearchedUserList($uid);
                        if($OldSearchList){
                            echo '<div class="old_search__"><div class="old_search">'.$page_Lang['old_searches'][$dataUserPageLanguage].'</div>';
                            foreach($OldSearchList as $searhed){
                                 $oldSearchedUID = $searhed['searched_id'];
                                 $oldSearchID = $searhed['search_event_id'];
                                 $oldSearchedUserFullName = $Dot->Dot_UserFullName($oldSearchedUID);
                                 $oldSearchedUserUsername = $Dot->Dot_GetUserName($oldSearchedUID);
                                 $soAvatar = $Dot->Dot_UserAvatar($oldSearchedUID, $base_url); 
                                 echo '
                                        <div class="result_user"  id="olds'.$oldSearchID.'">
                                           <a href="'.$base_url.'profile/'.$oldSearchedUserUsername.'">
                                           <div class="result_user_avatar"><img src="'.$soAvatar.'" class="a0uk" /></div>
                                           <div class="result_user_name">'.$oldSearchedUserFullName.'</div>
                                           </a>
                                           <span class="deleteSearched" data-id="'.$oldSearchID.'" data-type="deletesearcho"><span class=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8899a6"><path d="M96,16c-44.24,0 -80,35.76 -80,80c0,44.24 35.76,80 80,80c44.24,0 80,-35.76 80,-80c0,-44.24 -35.76,-80 -80,-80zM136,124.72l-11.28,11.28l-28.72,-28.72l-28.72,28.72l-11.28,-11.28l28.72,-28.72l-28.72,-28.72l11.28,-11.28l28.72,28.72l28.72,-28.72l11.28,11.28l-28.72,28.72z"></path></g></g></svg></span> 
                                        </div>
                                        ';
                            }
							echo '</div>';
                        } 
						?>
                <!---->
            </div>
       </div>
   </div>
</div>
<?php include("contents/javascripts_vars.php"); ?>
</body>
</html>