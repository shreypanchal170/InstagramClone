<div class="withdrawal_note"><?php echo $page_Lang['you_must_earn_fifty_dolar'][$dataUserPageLanguage];?></div>
<div class="currentExchanges">
     <div class="exchange_item_two">
          <div class="exchange_box">
                <div class="exchange_note truncate"><?php echo $page_Lang['turkish_lira_donation'][$dataUserPageLanguage];?></div> 
                <div class="exchange_now" style="color:#d32f2f;"><?php echo $earningTLThisMonth;?>₺</div> 
                <!---->
                <div class="cclod">
                <div class="calculate_currency" style="background-color:#d32f2f;">
                     <div class="calcula"  id="try_one_usd"></div> 
                     <div class="calcul_amount"  id="try_one_usd_earning"></div>
                </div>
                </div>
                <!---->
          </div>
     </div>
     <div class="exchange_item_two">
        <div class="exchange_box">
               <div class="exchange_note truncate"><?php echo $page_Lang['nigerian_donations'][$dataUserPageLanguage];?></div> 
               <div class="exchange_now" style="color:#fb8c00;"><?php echo $earningNGNThisMonth;?>₦</div> 
               <!---->
               <div class="cclod">
                <div class="calculate_currency" style="background-color:#fb8c00;">
                     <div class="calcula" id="ngn_one_usd"></div> 
                     <div class="calcul_amount" id="ngn_one_usd_earning"></div>
                </div>
                </div>
                <!---->
       </div>
     </div>
     <div class="exchange_item_two">
         <div class="exchange_box">
               <div class="exchange_note truncate"><?php echo $page_Lang['indian_rupee_earnings'][$dataUserPageLanguage];?></div> 
               <div class="exchange_now" style="color:#9e9d24;"><?php echo $earningINRThisMonth;?>₹</div> 
               <!---->
               <div class="cclod">
                <div class="calculate_currency" style="background-color:#9e9d24;">
                     <div class="calcula"  id="inr_one_usd"></div> 
                     <div class="calcul_amount" id="inr_one_usd_earning"></div>
                </div>
                </div>
                <!---->
         </div>
     </div>
     <div class="exchange_item_two">
         <div class="exchange_box">
               <div class="exchange_note truncate"><?php echo $page_Lang['donation_dolar_this_month'][$dataUserPageLanguage];?></div> 
               <div class="exchange_now" style="color:#00897b;"><?php echo $earningDolarThisMonth;?>$</div> 
               <!---->
               <div class="cclod">
                <div class="calculate_currency" style="background-color:#00897b;">
                     <div class="calcula" id="usd_one_usd"></div> 
                     <div class="calcul_amount" id="usd_one_usd_earning"></div>
                </div>
                </div>
                <!---->
         </div>
     </div>  
</div> 
<div class="withdrawal_box">
   <div class="make_withdrawal"><?php echo $page_Lang['request_a_payment'][$dataUserPageLanguage];?></div>
   <div class="withdrawal_wrp">
       <div class="total_earnings_for_withdrawal total_e" id="total_e"><?php echo $dataUserTotalEarnings;?>$</div>
       <div class="withdrawal_icon">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,-0.00525c-0.69203,0 -1.38658,0.25804 -1.91065,0.7821l-32.25,32.25c-1.04812,1.04813 -1.04812,2.77316 0,3.82129l10.75,10.75c1.04813,1.04812 2.77317,1.04812 3.82129,0l8.83935,-8.87085v16.58167c-15.53375,4.64937 -26.875,19.05417 -26.875,36.06604c0,15.04462 8.89659,28.01211 21.68371,34.02942c-0.10213,0.28488 -0.18371,0.58558 -0.18371,0.90808v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-4.27271c2.58269,0.77131 5.28363,1.24986 8.0625,1.44873v2.82397c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-2.82397c2.77887,-0.19887 5.47981,-0.67742 8.0625,-1.44873v4.27271c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-0.3225 -0.08159,-0.62321 -0.18371,-0.90808c12.78713,-6.01731 21.68371,-18.98479 21.68371,-34.02942c0,-17.01187 -11.34125,-31.41667 -26.875,-36.06604v-16.58167l8.83935,8.87085c1.04813,1.04812 2.77317,1.04812 3.82129,0l10.75,-10.75c1.04812,-1.04813 1.04812,-2.77316 0,-3.82129l-32.25,-32.25c-0.52407,-0.52406 -1.21861,-0.7821 -1.91065,-0.7821zM86,6.47729l28.46021,28.46021l-6.96021,6.96021l-11.52685,-11.55835c-0.77938,-0.7525 -1.93983,-0.99164 -2.9342,-0.56164c-1.02125,0.40313 -1.66394,1.39729 -1.66394,2.47229v21.87793c-1.74688,-0.24188 -3.5475,-0.37793 -5.375,-0.37793c-1.8275,0 -3.62812,0.13605 -5.375,0.37793v-21.87793c0,-1.075 -0.64269,-2.06917 -1.66394,-2.47229c-0.99438,-0.43 -2.15483,-0.19086 -2.9342,0.56164l-11.52685,11.55835l-6.96021,-6.96021zM86,59.125c1.8275,0 3.62812,0.16104 5.375,0.45667c1.85437,0.29563 3.655,0.77811 5.375,1.39624c12.52375,4.43438 21.5,16.36835 21.5,30.3971c0,17.79125 -14.45875,32.25 -32.25,32.25c-17.79125,0 -32.25,-14.45875 -32.25,-32.25c0,-14.02875 8.97625,-25.96272 21.5,-30.3971c1.72,-0.61812 3.52062,-1.10061 5.375,-1.39624c1.74688,-0.29563 3.5475,-0.45667 5.375,-0.45667zM5.375,64.5c-2.96431,0 -5.375,2.41069 -5.375,5.375v5.375c0,2.96431 2.41069,5.375 5.375,5.375h5.375v61.8125c0,7.40944 6.02806,13.4375 13.4375,13.4375h123.625c7.40944,0 13.4375,-6.02806 13.4375,-13.4375v-61.8125h5.375c2.96431,0 5.375,-2.41069 5.375,-5.375v-5.375c0,-2.96431 -2.41069,-5.375 -5.375,-5.375h-8.0625c-7.40944,0 -13.4375,6.02806 -13.4375,13.4375v61.8125h-118.25v-61.8125c0,-7.40944 -6.02806,-13.4375 -13.4375,-13.4375zM86,67.1875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v2.6875c-5.92862,0 -10.75,4.82138 -10.75,10.75c0,5.92863 4.82138,10.75 10.75,10.75h5.375c2.96431,0 5.375,2.41069 5.375,5.375c0,2.96431 -2.41069,5.375 -5.375,5.375v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c-2.96431,0 -5.375,-2.41069 -5.375,-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875c0,5.92863 4.82138,10.75 10.75,10.75v2.6875c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-2.6875c5.92863,0 10.75,-4.82137 10.75,-10.75c0,-5.92863 -4.82137,-10.75 -10.75,-10.75v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c-2.96431,0 -5.375,-2.41069 -5.375,-5.375c0,-2.96431 2.41069,-5.375 5.375,-5.375h5.375c2.96431,0 5.375,2.41069 5.375,5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875c0,-5.92862 -4.82137,-10.75 -10.75,-10.75v-2.6875c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875zM5.375,69.875h8.0625c4.44513,0 8.0625,3.61737 8.0625,8.0625v61.8125c0,2.96431 2.41069,5.375 5.375,5.375h118.25c2.96431,0 5.375,-2.41069 5.375,-5.375v-61.8125c0,-4.44513 3.61737,-8.0625 8.0625,-8.0625h8.0625v5.375h-8.0625c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v64.5c0,4.44513 -3.61737,8.0625 -8.0625,8.0625h-123.625c-4.44513,0 -8.0625,-3.61737 -8.0625,-8.0625v-64.5c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875h-8.0625zM32.25,123.625c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875zM45.6875,123.625c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875zM59.125,123.625c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875zM112.875,123.625c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875zM126.3125,123.625c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875zM139.75,123.625c-1.48619,0 -2.6875,1.204 -2.6875,2.6875v5.375c0,1.4835 1.20131,2.6875 2.6875,2.6875c1.48619,0 2.6875,-1.204 2.6875,-2.6875v-5.375c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875z"></path></g></g></svg></div> 
        <?php echo $page_Lang['available_balance'][$dataUserPageLanguage];?>
        <div class="calculate_earnings"><a class="waves-effect waves-light btn blue calcul"><?php echo $page_Lang['calculate_your_earnings'][$dataUserPageLanguage];?></a></div>
   </div>
   <div class="withdrawal_frm">
        <!--s-->
        <div class="row inob">
          <div class="col s12 ort">
            <ul class="tabs">
              <li class="tab col s3"><a class="active" href="#test1"><?php echo $page_Lang['with_paypal'][$dataUserPageLanguage];?></a></li>
              <li class="tab col s3"><a href="#test2"><?php echo $page_Lang['with_iban'][$dataUserPageLanguage];?></a></li> 
            </ul>
          </div>
          <div id="test1" class="col s12 active">
            <!--ps-->
            <div class="payout_form_am">
              <div class="payout_items">
                <div class="payout_item_box_title err_email succe"><?php echo $page_Lang['paypal_email_address'][$dataUserPageLanguage];?></div>
                <div class="payout_item_box"><input type="text" class="item_p_in" id="paypal_email" placeholder="<?php echo $page_Lang['write_your_paypal_email_address'][$dataUserPageLanguage];?>"></div>
                <div class="payout_item_box_title err_amount"><?php echo $page_Lang['requested_amount'][$dataUserPageLanguage];?></div>
                <div class="payout_item_box"><input type="text" class="item_p_in paypalamount" id="paypalamount" placeholder="<?php echo $page_Lang['minimum_amount_fifty_dolar'][$dataUserPageLanguage];?>"></div>
                <div class="payout_item_box">
                  <div class="waves-effect waves-light btn blue darken-1 left makeWithdrawAm">Save</div>
                </div>
                <div class="note_before_withdraw"><?php echo $page_Lang['remember_calculate_earning_before_request'][$dataUserPageLanguage];?></div>
              </div>
            </div>
            <!--pf-->
          </div>
          <div id="test2" class="col s12" style="display: none;">
            <!--ps-->
            <div class="payout_form_am">
              <div class="payout_items">
                <div class="payout_item_box_title err_iban succei"><?php echo $page_Lang['your_iban_number'][$dataUserPageLanguage];?></div>
                <div class="payout_item_box"><input type="text" class="item_p_in" id="ibanNumber" placeholder="<?php echo $page_Lang['write_your_iban_number'][$dataUserPageLanguage];?>"></div>
                <div class="payout_item_box_title err_iamount"><?php echo $page_Lang['requested_amount'][$dataUserPageLanguage];?></div>
                <div class="payout_item_box"><input type="text" class="item_p_in" id="payiban_amount" placeholder="<?php echo $page_Lang['minimum_amount_fifty_dolar'][$dataUserPageLanguage];?>"></div>
                <div class="payout_item_box missinginfosi">
                  <div class="waves-effect waves-light btn blue darken-1 left makeWithdrawIban">Save</div>
                </div>
                <div class="note_before_withdraw"><?php echo $page_Lang['remember_calculate_earning_before_request'][$dataUserPageLanguage];?></div>
              </div>
            </div>
            <!--pf-->
          </div>
        </div>
        <!--f-->
   </div>
</div>   
<?php include("html_payout_withdrawal.php");?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>