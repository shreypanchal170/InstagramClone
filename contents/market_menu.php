<?php if(!$marketPlaceProductMenuEnableDisable == 0){?>
<div class="marketPlace_h_l">
      <div class="marginPlace_h_l_in">
        <!---->
        <div class="showMoreCategories" data-more="<?php echo $page_Lang['show_all_market_categories'][$dataUserPageLanguage]; ?>" data-less="<?php echo $page_Lang['less_all_market_categories'][$dataUserPageLanguage]; ?>" title="more"><span class="iconra"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#8a99a4"><path d="M21.5,35.83333c-2.58456,-0.03655 -4.98858,1.32136 -6.29153,3.55376c-1.30295,2.2324 -1.30295,4.99342 0,7.22582c1.30295,2.2324 3.70697,3.59031 6.29153,3.55376h129c2.58456,0.03655 4.98858,-1.32136 6.29153,-3.55376c1.30295,-2.2324 1.30295,-4.99342 0,-7.22582c-1.30295,-2.2324 -3.70697,-3.59031 -6.29153,-3.55376zM21.5,78.83333c-2.58456,-0.03655 -4.98858,1.32136 -6.29153,3.55376c-1.30295,2.2324 -1.30295,4.99342 0,7.22582c1.30295,2.2324 3.70697,3.59031 6.29153,3.55376h129c2.58456,0.03655 4.98858,-1.32136 6.29153,-3.55376c1.30295,-2.2324 1.30295,-4.99342 0,-7.22582c-1.30295,-2.2324 -3.70697,-3.59031 -6.29153,-3.55376zM21.5,121.83333c-2.58456,-0.03655 -4.98858,1.32136 -6.29153,3.55376c-1.30295,2.2324 -1.30295,4.99342 0,7.22582c1.30295,2.2324 3.70697,3.59031 6.29153,3.55376h129c2.58456,0.03655 4.98858,-1.32136 6.29153,-3.55376c1.30295,-2.2324 1.30295,-4.99342 0,-7.22582c-1.30295,-2.2324 -3.70697,-3.59031 -6.29153,-3.55376z"></path></g></g></svg></span>
          <span class="cht_m"><?php echo $page_Lang['show_all_market_categories'][$dataUserPageLanguage]; ?></span><span class="iconre icls_m"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#292929"><path d="M172.8,96c0,-42.4128 -34.3872,-76.8 -76.8,-76.8c-42.4128,0 -76.8,34.3872 -76.8,76.8c0,42.4128 34.3872,76.8 76.8,76.8c42.4128,0 76.8,-34.3872 76.8,-76.8zM91.4752,126.1248l-38.4,-38.4c-1.248,-1.248 -1.8752,-2.8864 -1.8752,-4.5248c0,-1.6384 0.6272,-3.2768 1.8752,-4.5248c2.5024,-2.5024 6.5472,-2.5024 9.0496,0l33.8752,33.8752l33.8752,-33.8752c2.5024,-2.5024 6.5472,-2.5024 9.0496,0c2.5024,2.5024 2.5024,6.5472 0,9.0496l-38.4,38.4c-2.5024,2.5024 -6.5472,2.5024 -9.0496,0z"></path></g></g></svg></span></div>
        <!---->
        <?php 
		   if($MarketPlaceCategories){
				foreach($MarketPlaceCategories as $mCategori){
					 $cateGoryID  = $mCategori['m_category_id'];
					 $cateGoryKey = $mCategori['m_category_key'];
					 echo '
						<a href="'.$base_url.'marketplace/category/'.$cateGoryID.'"><div class="mProductCategoryWrapper">'.$page_Lang[$cateGoryKey][$dataUserPageLanguage].'</div></a>
					 ';
				}
		   }
		?>
      </div>
    </div>
<?php  } ?>