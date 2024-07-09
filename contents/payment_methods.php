<!--Payment Gateways PopUp STARTED-->
<div class="payment_gateways_fix">
     <div class="payment_gateways_list_wrapper">
           <div class="payment_gateway_list_box methods_open_animate">
                <div class="payment_method_header"><div class="icon_method"><?php echo $Dot->Dot_SelectedMenuIcon('donate_icon');?></div><div class="spm"><?php echo $page_Lang['choose_your_payment_method'][$dataUserPageLanguage];?></div>
                <div class="methods_close"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div>
                </div>
                <!--Methods Wrapper STARTED-->
                <div class="methods_wrapper">
                    <?php 
					     echo $bitpayActivePasive == '1' ? '<div class="method_box method_bitpay" data-type="bitpay"></div>'.$bitPayCalculate.'':"";
						 echo $iyzicoActivePasive == '1' ? '<div class="method_box_second method_iyzico" data-type="iyzico"></div>'.$iyziCoCalculate.'':"";
						 echo $authorizeActivePasive == '1' ? '<div class="method_box_second method_authorize" data-type="authorize-net"></div>'.$autHorizeNetCalculate.'':"";
						 echo $stripePaymentActivePasive == '1' ? '<div class="method_box method_stripe" data-type="stripe"></div>'.$stripeCalculate.'':"";
						 echo $payStackActivePasive == '1' ? '<div class="method_box method_paystack" data-type="paystack"></div>'.$paystackCalculate.'':"";
						 echo $paypalActivePasive == '1' ? '<div class="method_box method_paypal" data-type="paypal"></div>'.$paypalCalculate.'':"";
						 echo $razorPayActivePasive == '1' ? '<div class="method_box method_razorpay" data-type="razorpay"></div>'.$razorPayCalculate.'':"";
					?> 
                </div>
                <!--Methods Wrapper FINISHED-->
           </div>
     </div> 
<form method="post" id="lwPaymentForm">
 
<div class="method_credit_card_details_fixed">
<div class="method_credit_card_box">
<div class="method_credit_card_items">
<!-- Iyzico Merchant Form Start here -->
<div class="c_carrd" id="cardCheckoutForm">
<div class="cc_close"><?php echo $Dot->Dot_SelectedMenuIcon('close_icons');?></div>
    <!-- Iyzico payment method header -->
    <div class="card-header">
        <div class="card-title" ><?php echo $page_Lang['your_card_details'][$dataUserPageLanguage];?></div>
        <small class="text-danger"><?php echo $page_Lang['all_details_are_required'][$dataUserPageLanguage];?></small>
    </div>
    <!-- /Iyzico payment method header -->

    <!-- Card Body start here -->
    <div class="card-body">                                        
        <!-- name of card -->
        <div class="card-row">
            <label for="cname"><?php echo $page_Lang['name_on_card'][$dataUserPageLanguage];?></label>
            <input type="text" class="form-control" id="cname" name="cardname" placeholder="<?php echo $page_Lang['john_doe'][$dataUserPageLanguage];?>">
        </div>
        <!-- / name of card -->

        <!-- Card number -->
        <div class="card-row">
            <label for="cardNumber"><?php echo $page_Lang['card_number'][$dataUserPageLanguage];?></label>
            <div class="input-group">
                <input type="number" class="form-control" id="cardNumber" name="cardnumber">
            </div>
        </div>
        <!-- / Card number -->                                        

        <div class="card-row">
            <div class="col"> 
                <label for="expmonth"><?php echo $page_Lang['exp_month'][$dataUserPageLanguage];?></label>
                <input type="number" class="form-control" id="expmonth" name="expmonth"> 
            </div>
            <div class="col"> 
                <label for="expyear"><?php echo $page_Lang['exp_year'][$dataUserPageLanguage];?></label>
                <input type="number" class="form-control" id="expyear" name="expyear"> 
            </div>
            <div class="col"> 
                <label for="cvv"><?php echo $page_Lang['cvv'][$dataUserPageLanguage];?></label>
                <input type="number" class="form-control" id="cvv" name="cvv"> 
            </div>
        </div>
        <!-- Card number -->
        <div class="card-row">
              <div class="pay_with btn waves-effect waves-light blue" data-type="iyzico"><?php echo $page_Lang['pay'][$dataUserPageLanguage];?></div>
        </div>
        <!-- / Card number -->        
    </div>
    <!-- /Card Body start here -->
</div>
<!-- / Iyzico Merchant Form  -->
</div>
</div>
</div> 
</form>
<script type="text/javascript">
$(document).ready(function() {
    var pload = '<span class="theload"><span class="preloader-wrapper small active"><span class="spinner-layer spinner-green-only"><span class="circle-clipper left"><span class="circle"></span></span><span class="gap-patch"><span class="circle"></span></span><span class="circle-clipper right"><span class="circle"></span></span></span></span></span>';
    $("body").on("click", ".method_box_second", function() {
		$(this).append(pload);
        var type = $(this).attr('data-type');
        $('.method_credit_card_details_fixed').show();
        if (type == 'iyzico') {
            $('.pay_with').attr('data-type', type);
        } else if (type == 'authorize-net') {
            $('.pay_with').attr('data-type', type);
        }
    });
	$("body").on("click",".cc_close", function(){
	    $('.method_credit_card_details_fixed').hide();
		$('.theload').remove();
	});
    $("body").on("click", ".method_box , .pay_with", function(e) {  
        // Prevent form 
        e.preventDefault();
        var methodType = $(this).attr("data-type");
        var postID = <?php echo $postID; ?> ;
        var cid = <?php echo $postOwnerID; ?> ;
        var pty = '<?php echo $paymentPostType;?>';
        $(this).append(pload);
        if (methodType == 'paypal' || methodType == 'paytm' || methodType == 'instamojo' || methodType == 'iyzico' || methodType == 'authorize-net' || methodType == 'bitpay') {
            // PayPal, PayTM, InstaMojo, IyzCo, AuthoRize-Net and BitPay Ajax Request Here 
            //send ajax request with form data to server side processing
            $.ajax({
                type: 'post', //form method
                context: this,
                url: requestUrl + 'functions/payment-process.php', // post data url
                dataType: "JSON",
                data: 'paymentOption=' + methodType + '&' + $('#lwPaymentForm').serialize() + '&' + $.param(JSON.parse('<?php echo json_encode($DataUserDetails) ?>')), // form serialize data
                error: function(err) {
                    var error = err.responseText
                    string = ''; 
                    //on error show alert message
                    string += '<div class="alert alert-danger" role="alert">' + err.responseText + '</div>'; 
                    $('#lwValidationMessage').html(string);  
                    $(".lw-show-till-loading").hide();
                },
                success: function(response) { 
				    $('.theload').remove();
                    if (typeof(response.validationMessage)) { 
                        var messageData = [],
                            string = ''; 
                        //validation message
                        $.each(response.validationMessage, function(index, value) {
                            messageData = value;
                            string += '<div class="alert alert-danger" role="alert">' + messageData + '</div>';
                        }); 
                        //print error mesaages
                        $('#lwValidationMessage').html(string); 
                        //hide loader after ajax request complete
                        $(".lw-show-till-loading").hide();
                    } 
                    if (response.paymentOption == "paytm") { 
                        $('body').html(response.merchantForm); 
                    } else if (response.paymentOption == "instamojo") { 
                        //on success load instamojo long url page else show error message
                        if (response.message == 'success') {
                            //show loader before page load
                            $(".lw-show-till-loading").show(); 
                            window.location.href = response.longurl;
                        } else {
                            //error message
                            string += '<div class="alert alert-danger" role="alert">' + response.errorMessage + '</div>'; 
                            //print error mesaages
                            $('#lwValidationMessage').html(string);
                        } 
                    } else if (response.paymentOption == "iyzico") { 
                        //on success load html content page on iyzico else show error message
                        if (response.status == 'success') {
                            $('body').html(response.htmlContent); 
                        } else if (response.message == 'failed') { 
                            string += '<div class="alert alert-danger" role="alert">' + response.errorMessage + '</div>';
                        } else {
                            //error message
                            //validation message
                            $.each(response.validationMessage, function(index, value) {
                                messageData = value;
                                string += '<div class="alert alert-danger" role="alert">' + messageData + '</div>';
                            });
                        }
                        //print error mesaages
                        $('#lwValidationMessage').html(string); 
                    } else if (response.paymentOption == "paypal") { 
                        //show loader before page load
                        $(".lw-show-till-loading").show(); 
                        //on success load paypalUrl page
                        window.location.href = response.paypalUrl; 
                    } else if (response.paymentOption == 'bitpay') {
                        if (response.status == "success") {
                            window.location.href = response.invoiceUrl;
                        } else {
                            $('#lwValidationMessage').html('Something went wrong on server.');
                            $(".lw-show-till-loading").hide();
                        }
                    } else if (response.paymentOption == 'authorize-net') {
                        var authorizeNetCallbackUrl = <?php echo json_encode($authorizeNetCallbackUrl); ?> ;
                        if (response.status == "success") {
                            $('body').html("<form action='" + authorizeNetCallbackUrl + "' method='post'><input type='hidden' name='response' value='" + JSON.stringify(response) + "'><input type='hidden' name='paymentOption' value='authorize-net'></form>");
                            $('body form').submit();
                        } else if (response.status == "error") {
                            string = response.message;
                        } else {
                            $.each(response.validationMessage, function(index, value) {
                                messageData = value;
                                string += '<div class="alert alert-danger" role="alert">' + messageData + '</div>';
                            });
                        }
                        $('#lwValidationMessage').html(string);
                    } 
                }
            }); 
        } else if (methodType == 'stripe') {
            //config data For Stripe
            var configData = <?php echo json_encode($PublicConfigs); ?> ,
            configItem = configData['payments']['gateway_configuration']['stripe'],
                userDetails = <?php echo json_encode($DataUserDetails); ?> ,
            stripePublishKey = '';
            //check stripe test or production mode
            if (configItem['testMode']) {
                stripePublishKey = configItem['stripeTestingPublishKey'];
            } else {
                stripePublishKey = configItem['stripeLivePublishKey'];
            }

            userDetails['paymentOption'] = methodType;
            userDetails['post_id'] = postID;
            userDetails['customer_user_id'] = cid;
            userDetails['p_t'] = pty;
            // Stripe script for send ajax request to server side start
            $.ajax({
                type: 'post', //form method
                context: this,
                url: requestUrl + 'functions/payment-process.php', // post data url
                dataType: "JSON",
                data: userDetails, // form serialize data
                error: function(err) {
                    var error = err.responseText
                    string = '';
                    console.log(err);
                    //on error show alert message
                    string += '<div class="alert alert-danger" role="alert">' + err.responseText + '</div>';

                    $('#lwValidationMessage').html(string);
                    //alert("AJAX error in request: " + JSON.stringify(err.responseText, null, 2));

                    //hide loader after ajax request complete
                    $(".lw-show-till-loading").hide();
                },
                success: function(response) {

                    var stripe = Stripe(stripePublishKey);
                    stripe.redirectToCheckout({ 
                        sessionId: response.id,
                    }).then(function(result) { 
                        var string = ''; 
                        string += '<div class="alert alert-danger" role="alert">' + result.error.message + '</div>';

                        $('#lwValidationMessage').html(string);
                    }); 
                }
            });
        } else if (methodType == 'paystack') { 
            //config data
            var configData = <?php echo json_encode($PublicConfigs); ?> ,
            paymentPagePath = <?php echo json_encode($paymentPagePath); ?> ,
            configItem = configData['payments']['gateway_configuration']['paystack'],
                paystackCallbackUrl = configItem.callbackUrl,
                userDetails = <?php echo json_encode($DataUserDetails); ?> ;

            userDetails['paymentOption'] = methodType;
            userDetails['post_id'] = postID;
            userDetails['customer_user_id'] = cid;
            userDetails['p_t'] = pty;
            const amount = userDetails['amounts'][configItem['currency']];

            var paystackPublicKey = '';

            //check paystack test or production mode
            if (configItem['testMode']) {
                paystackPublicKey = configItem['paystackTestingPublicKey'];
            } else {
                paystackPublicKey = configItem['paystackLivePublicKey'];
            }

            var paystackAmount = amount * 100,
                handler = PaystackPop.setup({
                    key: paystackPublicKey, // add paystack public key
                    email: userDetails['payer_email'], // add customer email
                    amount: paystackAmount, // add order amount
                    currency: configItem['currency'], // add currency
                    callback: function(response) {
                        // after successful paid amount return paystack reference Id
                        var paystackReferenceId = response.reference;

                        //show loader before ajax request
                        $(".lw-show-till-loading").show();

                        var paystackData = {
                            'paystackReferenceId': paystackReferenceId,
                            'paystackAmount': paystackAmount
                        };

                        var paystackData = $('#lwPaymentForm').serialize() + '&' + $.param(userDetails) + '&' + $.param(paystackData);

                        $.ajax({
                            type: 'post', //form method
                            context: this,
                            url: requestUrl + 'functions/payment-process.php', // post data url
                            dataType: "JSON",
                            data: paystackData, // form serialize data
                            error: function(err) {
                                var error = err.responseText
                                string = ''; 
                                //on error show alert message
                                string += '<div class="alert alert-danger" role="alert">' + err.responseText + '</div>'; 
                                $('#lwValidationMessage').html(string); 
                                //hide loader after ajax request complete
                                $(".lw-show-till-loading").hide();
                            },
                            success: function(response) {
                                if (response.status == true) {
                                    $('body').html("<form action='" + paystackCallbackUrl + "' method='post'><input type='hidden' name='response' value='" + JSON.stringify(response) + "'><input type='hidden' name='paymentOption' value='paystack'></form>");
                                    $('body form').submit();
                                }
                            }
                        }); 
                    },
                    onClose: function() {
                        window.location.href = paymentPagePath;
                    }
                }); 
            //open paystack inline widen using iframe
            handler.openIframe();
            // Paystack script for send ajax request to server side end  
        } else if (methodType == 'razorpay') { 
            var configData = <?php echo json_encode($PublicConfigs); ?> ,
            razorpayCallbackUrl = <?php echo json_encode($razorpayCallbackUrl); ?> ,
            paymentPagePath = <?php echo json_encode($paymentPagePath); ?> ,
            configItem = configData['payments']['gateway_configuration']['razorpay'],
                userDetails = <?php echo json_encode($DataUserDetails); ?> ,
            razorpayKeyId = '';

            const amount = userDetails['amounts'][configItem['currency']]; 
            //check razorpay test or production mode
            if (configItem['testMode']) {
                razorpayKeyId = configItem['razorpayTestingkeyId'];
            } else {
                razorpayKeyId = configItem['razorpayLivekeyId'];
            }
            userDetails['paymentOption'] = methodType;
            userDetails['post_id'] = postID;
            userDetails['customer_user_id'] = cid;
            userDetails['p_t'] = pty;
            var razorpayAmount = amount * 100,
                razorpayPaymentId = null,
                options = {
                    "key": razorpayKeyId, // add razorpay Api Key Id
                    "amount": razorpayAmount, // 2000 paisa = INR 20
                    "currency": configItem['currency'], // add currency
                    "name": configItem['merchantname'], // add merchant user name
                    "handler": function(response) {
                        // after successful paid amount return razorpay payment Id
                        razorpayPaymentId = response.razorpay_payment_id;
                        var encodeRazorpayAmount = window.btoa(razorpayAmount);
                        //show loader before ajax request
                        $(".lw-show-till-loading").show();

                        var razorpayData = {
                            'razorpayPaymentId': razorpayPaymentId,
                            'razorpayAmount': encodeRazorpayAmount
                        };

                        var razorpayData = $('#lwPaymentForm').serialize() + '&' + $.param(userDetails) + '&' + $.param(razorpayData);

                        $.ajax({
                            type: 'post', //form method
                            context: this,
                            url: requestUrl + 'functions/payment-process.php', // post data url
                            dataType: "JSON",
                            data: razorpayData, // form serialize data
                            error: function(err) {
                                var error = err.responseText
                                string = ''; 
                                //on error show alert message
                                string += '<div class="alert alert-danger" role="alert">' + err.responseText + '</div>';

                                $('#lwValidationMessage').html(string);
                                //alert("AJAX error in request: " + JSON.stringify(err.responseText, null, 2));

                                //hide loader after ajax request complete
                                $(".lw-show-till-loading").hide();
                            },
                            success: function(response) {
                                if (response.status == "captured") {
                                    razorpayCallbackUrl = configData['payments']['gateway_configuration']['razorpay']['callbackUrl'] + '?orderId=' + userDetails['order_id'];
                                    $('body').html("<form action='" + razorpayCallbackUrl + "' method='post'><input type='hidden' name='response' value='" + JSON.stringify(response) + "'><input type='hidden' name='paymentOption' value='razorpay'></form>");
                                    $('body form').submit();
                                }
                            }
                        }); 
                    },
                    "prefill": {
                        "name": userDetails['payer_name'], // add user name
                        "email": userDetails['payer_email'], // add user email
                    },
                    "theme": {
                        "color": configItem['themeColor'], // add widget theme color
                    },
                    "modal": {
                        "ondismiss": function(e) { 
                            if (razorpayPaymentId == null) {
                                 window.location.href = paymentPagePath;
                            }
                        }
                    }
                };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    });
});
</script>
<?php    
  echo $stripePaymentActivePasive == '1' ? '<script src="https://js.stripe.com/v3"></script>':"";
  echo $payStackActivePasive == '1' ? '<script src="https://js.paystack.co/v1/inline.js"></script>':""; 
  echo $razorPayActivePasive == '1' ? '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>':"";
?> 
</div> 
</div>
