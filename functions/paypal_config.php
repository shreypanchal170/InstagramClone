<?php
// +------------------------------------------------------------------------+
// | @author mstfoztrk
// | @author_url 1: http://www.duhovit.com
// | @author_url 2: http://codecanyon.net/user/mstfoztrk
// | @author_email: socialmaterial@hotmail.com   
// +------------------------------------------------------------------------+
// | oobenn Instagram Style Social Networking Platform
// | Copyright (c) 2019 duhovit. All rights reserved.
// +------------------------------------------------------------------------+   
require __DIR__ . '/PayPal/vendor/autoload.php'; 
  
$apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            $client_ID,     // ClientID
            $client_Secret      // ClientSecret
        )
);

$apiContext->setConfig([
 'mode'=>$paypalMode,
 'http.ConnectionTimeOut'=>30,
 'log.LogEnabled'=>false,
 'log.FileName'=>'',
 'log.LogLevel'=>'FINE',
 'validation.level'=>'log'
]);

?>