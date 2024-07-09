<div class="poSBoxContainer">
   <div class="post-modal-Wrap">
       <div class="post-modal-middle">
           <!--header started-->
           <div class="post-modal-header">
               <div class="poster_avatar"><img src="<?php echo $dataUserAvatar;?>" class="a0uk"/></div> 
               <div class="poster_Name"><?php echo $dataUserFullName;?></div>
               <div class="posting_arrow"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#8a99a4"><path d="M104.568,96l-30.568,-30.568c-3.312,-3.312 -3.312,-8.688 0,-12v0c3.312,-3.312 8.688,-3.312 12,0l36.912,36.912c3.128,3.128 3.128,8.192 0,11.312l-36.912,36.912c-3.312,3.312 -8.688,3.312 -12,0v0c-3.312,-3.312 -3.312,-8.688 0,-12z"></path></g></g></svg></div>
               <div class="post_icons"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#f9a825"><path d="M86,5.73333c-1.4663,0 -2.93278,0.55882 -4.05364,1.67969l-38.45365,38.45365h16.21458l26.29271,-26.29271l26.29271,26.29271h16.21458l-38.45364,-38.45365c-1.12087,-1.12087 -2.58734,-1.67969 -4.05364,-1.67969zM17.2,57.33333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v11.46667c0,3.1648 2.56853,5.73333 5.73333,5.73333h0.95182l8.91354,53.48125c0.92307,5.52693 5.70843,9.58542 11.3099,9.58542h95.23828c5.6072,0 10.38683,-4.05848 11.30989,-9.58542l8.92474,-53.48125h0.95183c3.1648,0 5.73333,-2.56853 5.73333,-5.73333v-11.46667c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333zM63.06667,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM86,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333zM108.93333,80.26667c3.17053,0 5.73333,2.5628 5.73333,5.73333v34.4c0,3.17053 -2.5628,5.73333 -5.73333,5.73333c-3.17053,0 -5.73333,-2.5628 -5.73333,-5.73333v-34.4c0,-3.17053 2.5628,-5.73333 5.73333,-5.73333z"></path></g></g></svg></div>  
           </div>
           <!--header finished-->
           <!--Input and textarea STARTED-->
           <div class="write_post_information">
               <!--Upload Product Image STARTED-->
               <div class="product_Image_btn">
                    <div class="pr_btn">
                        <form id="uploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/upload.php">  
                             <label class="labelImageUpload" for="uploadBtn"><div class="svg_btn"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M143.33333,28.66667h-114.66667c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v86c0,7.91917 6.41417,14.33333 14.33333,14.33333h114.66667c7.91917,0 14.33333,-6.41417 14.33333,-14.33333v-86c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM71.66667,57.33333c3.956,0 7.16667,3.21067 7.16667,7.16667c0,3.956 -3.21067,7.16667 -7.16667,7.16667c-3.956,0 -7.16667,-3.21067 -7.16667,-7.16667c0,-3.956 3.21067,-7.16667 7.16667,-7.16667zM129,121.83333h-85.84233c-2.98133,0 -4.65833,-3.43283 -2.82367,-5.7835l17.845,-22.94767c1.40467,-1.806 4.12083,-1.849 5.58283,-0.086l15.0715,18.13883l22.20233,-28.60933c1.44767,-1.8705 4.2785,-1.84183 5.6975,0.05017l25.1335,33.50417c1.77017,2.365 0.086,5.73333 -2.86667,5.73333z"></path></g></g></svg></div></label><input type="file" name="uploading[]" id="uploadBtn" data-id="image" class="upload_image_button" multiple="true">
                           </form>
                    </div> 
               </div>
               <!--Upload Product Image FINISHED-->
               <div class="global_post_box">
                   <div class="warningNote w__category"><?php echo $page_Lang['note_please_select_product_category'][$dataUserPageLanguage];?></div>
                   <div class="select_product_category categories" data-type="productCategories"><?php echo $page_Lang['select_your_product_category'][$dataUserPageLanguage];?></div>
               </div>
               <!--Input STARTED-->
               <div class="global_post_box">
                   <div class="warningNote w__price"><?php echo $page_Lang['note_please_write_product_price'][$dataUserPageLanguage];?></div>
                   <div class="price_input_box">
                        <input type="text" class="price_title" id="p_price" onkeyup="this.value = this.value.replace(/[A-Za-z!@#$%^&*()]/g, '').replace(/(\..*)\./g, '$1');" placeholder="<?php echo $page_Lang['product_price'][$dataUserPageLanguage];?>" >
                   </div> 
               </div>
               <!--Input FINISHED-->
               <!--Input STARTED-->
               <div class="global_post_box">
                   <div class="warningNote w__title"><?php echo $page_Lang['note_please_write_product_title'][$dataUserPageLanguage];?></div>
                   <input type="text" class="title_prod" id="product_title" placeholder="<?php echo $page_Lang['product_title_placeholder'][$dataUserPageLanguage];?>" >
               </div>
               <!--Input FINISHED--> 
               <!--Textarea STARTED-->
               <div class="global_post_box">
                  <div class="warningNote w__description"><?php echo $page_Lang['note_please_write_product_description'][$dataUserPageLanguage];?></div>
                  <textarea class="description" id="product_description" placeholder="<?php echo $page_Lang['product_description_placeholder'][$dataUserPageLanguage];?>"></textarea>
                  <input type="hidden" id="uploadvalues">
               </div>
               <!--Textarea FINISHED--> 
                <!--Input STARTED-->
               <div class="global_post_box">
                   <input type="text" class="title_prod" id="place" placeholder="<?php echo $page_Lang['write_place_address'][$dataUserPageLanguage];?>" value="" >
               </div>
               <!--Input FINISHED-->
               <div class="global_post_box">
                  <div class="set_the_input set_padding-left">
                    <label>
                      <input type="checkbox" class="ccev" id="ms" checked="checked" value="1">
                      <span><?php echo $page_Lang['can_send_product_message'][$dataUserPageLanguage];?></span>
                    </label>
                  </div>
                </div> 
               <div id="progr"></div>   
           </div>
           <!--Input and Textarea FINISHED-->
           <div class="global_post_box newImagesHere" style="display:none;">
            <!--Uploaded Image Preview STARTED-->
               <div class="imagepreview" id="uploadedNew" style="display:none;">
                       
                </div>
               <!--Uploaded Image Preview FINISHED--> 
           </div>
           <!--Post Footer STARTED-->
             <div class="post_box_footer"> 
                  <input type="hidden" id="prcat" />
                  <div class="control left_btn"><div class="close_post_box waves-effect waves-light btn blue-grey lighten-3" id="closePost"><?php echo $page_Lang['post_cancel'][$dataUserPageLanguage];?></div></div>
                  <div class="control right_btn"><div class="share_post_box waves-effect waves-light btn blue share_product" id="thisup" data-type="newProduct"><?php echo $page_Lang['post_share'][$dataUserPageLanguage];?></div></div>
             </div>  
           <!--Post Footer FINISHED-->
       </div>
   </div>
</div>
<!---->
<script type="text/javascript">
$(document).ready(function() {
	$('.currency').formSelect();
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }
  getLocation();
  function showPosition(position) {
    $(".mapif").html(
      '<iframe src="https://maps.google.com/maps?q=' +
        position.coords.latitude +
        "," +
        position.coords.longitude +
        '&z=12&output=embed" width="100%" height="270" frameborder="0" style="border:0"></iframe>'
    );
	$("#lati").val(position.coords.latitude);
	$("#longi").val(position.coords.longitude);
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var url =
      "https://maps.googleapis.com/maps/api/geocode/json?latlng=" +
      latitude +
      "," +
      longitude +
      "&sensor=true&key=<?php echo $dot_googleMapApi;?>";
    $.ajax({
      url: url,
      success: function(data) {
        $("#place").val(data.results[0].formatted_address);
        /*or you could iterate the components for only the city and state*/
      }
    });
  }
}); 
</script>