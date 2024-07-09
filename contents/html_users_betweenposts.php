<?php 
   $SuggestedUserList = $Dot->Dot_SuggestionUserList($uid);
   if($SuggestedUserList){ 
   $youmyKnowTour = $Dot->Dot_CheckTourSawBefore($uid, 1725) ? '<div style="position:absolute;width:100%;height:100%;z-index:2;" class="tooltipster-punk-preview tooltipstered rmvt" id="tooltipstered1725" data-tip="1725"></div>' : '';
   echo '<div class="bet_youmaynowusers"> '.$youmyKnowTour.'<div class="ymnyt">'.$page_Lang['you_may_know_persons'][$dataUserPageLanguage].'</div><span class="showUsersHere"><span class="swiper-container"><span class="swiper-wrapper">';
   foreach($SuggestedUserList as $betweenpu){
	   $betweenproUserID = $betweenpu['user_id'];
	   $betweenproUserUsername = $betweenpu['user_name'];
	   $betweenproUserFullName = $betweenpu['user_fullname'];
	   $betweenproUserAvatar = $Dot->Dot_UserAvatar($betweenproUserID, $base_url);
?>

                   <!--USER STARTED-->
                   <!---->
                      <span class="myNowUserWrp swiper-slide" style="background-image:url('<?php echo $betweenproUserAvatar;?>');">
                          <div class="user_in">
                            <!---->
                            <div class="user_inf">
                               <div class="see_profile hvr-underline-from-left sep" data-type="userfirstinfo" data-id="44">
                                 <div class="sp_i">
                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,40.72596c-33.20613,0 -64.24158,16.51262 -82.89904,44.03365c-3.48858,5.16827 -2.04147,12.01622 3.10096,15.50481c1.9381,1.31791 4.03125,2.06731 6.20192,2.06731c3.61779,0 7.33894,-1.75721 9.50962,-4.96154c0.69772,-1.03365 1.55048,-1.91226 2.27404,-2.89423c8.86358,25.66046 33.12861,44.03365 61.8125,44.03365c28.6839,0 52.94892,-18.3732 61.8125,-44.03365c0.72356,0.98197 1.57632,1.86058 2.27404,2.89423c3.46274,5.14243 10.54327,6.38281 15.71154,2.89423c5.14243,-3.48858 6.58954,-10.36238 3.10096,-15.50481c-18.63161,-27.54687 -49.69291,-44.03365 -82.89904,-44.03365zM112.25481,67.80769c11.03426,3.95372 20.87981,10.51743 29.14904,19.01923c-6.17608,24.85938 -28.65805,43.41346 -55.40385,43.41346c-26.74579,0 -49.22776,-18.55408 -55.40385,-43.41346c8.21755,-8.45012 18.19231,-14.83293 29.14904,-18.8125c-3.54026,5.11659 -5.58173,11.29267 -5.58173,17.98558c0,17.57212 14.26442,31.83654 31.83654,31.83654c17.57212,0 31.83654,-14.26442 31.83654,-31.83654c0,-6.74459 -1.98978,-13.04988 -5.58173,-18.19231z"></path></g></g></svg> 
                                 </div>
                                 See Profile
                               </div>
                               <div class="user_in_nm truncate"><?php echo $betweenproUserFullName;?><span class="verifiedUser_blue Szr5J  coreSpriteVerifiedBadgeSmall icons" title="Verified Profile"></span></div> 
                            </div>
                            <!---->
                          </div>
                       </span>
                   <!---->
                   <!--USER FINISHED-->
              
<?php }
echo '</span>
<!-- If we need navigation buttons -->
    <span class="swiper-button-prev"></span>
    <span class="swiper-button-next"></span>
</span>
</span>';
if($dataUserProType == 0){
echo '<div class="ymnytpr becomepro">'.$page_Lang['putmehere'][$dataUserPageLanguage].'<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#d62127"><path d="M93.6755,86l-27.38383,-27.38383c-2.967,-2.967 -2.967,-7.783 0,-10.75v0c2.967,-2.967 7.783,-2.967 10.75,0l33.067,33.067c2.80217,2.80217 2.80217,7.33867 0,10.13367l-33.067,33.067c-2.967,2.967 -7.783,2.967 -10.75,0v0c-2.967,-2.967 -2.967,-7.783 0,-10.75z"></path></g></g></svg></div>';
}
echo '</div>';
 }?> 