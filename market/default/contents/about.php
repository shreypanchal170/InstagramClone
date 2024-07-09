<?php 
$m_editButton  ='';
if($uid == $marketOwner_id){
		    $m_editButton = '<div class="editMarketInformation"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M131.96744,14.33333c-1.83376,0 -3.66956,0.69853 -5.06706,2.09961l-12.23372,12.23372l28.66667,28.66667l12.23372,-12.23372c2.80217,-2.80217 2.80217,-7.33911 0,-10.13412l-18.53255,-18.53255c-1.40108,-1.40108 -3.23329,-2.09961 -5.06706,-2.09961zM103.91667,39.41667l-82.41667,82.41667v28.66667h28.66667l82.41667,-82.41667z"></path></g></g></svg></div>';
		}
?>
<div class="market_info">
   <div class="market_info_header">About Market <?php echo $m_editButton;?></div>
   <div class="market_info_box">
         <div class="box_header">About</div>
         <div class="market_global_box"><?php echo strip_unsafe(styletext($marketAbout));?></div>
         <div class="box_header">Phone</div>
         <div class="market_global_box"><?php echo format_phone_us($marketPhone);?></div>
         <div class="box_header">E-Mail</div>
         <div class="market_global_box"><?php echo $marketEmail;?></div>
         <div class="box_header">Address</div>
         <div class="market_global_box"><?php echo $marketAddress;?></div>
         <div class="market_global_box_map">
             
         </div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){ 
  var place = '<?php echo  $marketAddress;?>';
  var embed ="<iframe width='100%' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( place ) +"&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed'></iframe>";
  $(".market_global_box_map").html(embed); 
});
</script>