<?php

include_once("../functions/config.php");

// $device_token = "d167O8S5AqU:APA91bGYVDIRfojqJbhAVNksWbG1aDPQcr2fX5R28tdEbCaQVz_xaqezG2Z0c0uQecmVcJtm8ARb34luz4NJWBmDpCiyai3iVguLuw8LO5-7QqbVZQjWFdTkcvxl5RbmxISX3eSZvYDp";
// $test = "this is for testing";
// $title= "NHPub";

// sendNotification($device_token,$test,$title);



// function for sending push notification
function sendPushNotification($device_token=NULL,$device_type='a',$body=NULL,$title='Oobenn',$url=NULL)
{
    // echo $url;exit;
   // echo "d " . $device_type;
    $json_data = "";
    if($device_type == 'a')
    {
      // echo " aaaaa";exit;  
        $json_data = [
            "to" => $device_token,
            "data" => [
                "message" => $body,
                "title" => $title,
                "icon" => "ic_launcher",
                 "url" => $url
            ]
        
        ];
    }
    else if($device_type == 'i')
    {
         $notification = array('title' =>$title , 'text' => $body, 'sound' => 'default', 'badge' => '1','url' => $url);
         
           $json_data = array('to' => $device_token, 'notification' => $notification,'priority'=>'high');
    }
    
    $data = json_encode($json_data);
    //echo $data;exit;
    //FCM API end-point
    $url = 'https://fcm.googleapis.com/fcm/send';
    
    //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
    
   // $server_key = 'AAAAeY9hREw:APA91bELyHnsseEJNryMzfiJuan_ps8AshA091TyPOefCaCkAgGsPmCKjXpdlF2Si4BEGnvxhA_AFGTZ7aYHTx88lZ69ikjMLRBeZ2cdwjZhfOvNP35EAoJEBinrpSRGhly9fPMAq1_-';

    //itechgen
    $server_key = 'AAAA37ffzS8:APA91bGlXC55yp8cQ1WjjwaP1x51boTcEmyHAFKV50exg-8DV4DY6kjgsbtV_WoHtOI5rw7-AaTRQuNlz8uqnYZfhB513Z-S4Xb4BEZ6AsHiT2NLLUCyL_F7zYWiVqDHy7GtHA8SWu1-';


    //header with content_type api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$server_key
    );
    //CURL request to route notification to FCM connection server (provided by Google)
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    if ($result === FALSE) {
        //echo "failed";
        //die('Oops! FCM Send Error: ' . curl_error($ch));
    }
    else
    {
        //echo "notification send";
    }
    curl_close($ch);
   // return $result;

}
