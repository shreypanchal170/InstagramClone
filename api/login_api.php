<?php
    include_once("../functions/config.php");
    define(client_url,  $base_url);

    //for API resonse
    $message = "";
    $status = 0;
    $token = "";
    $result_url = "";

    if ($_POST['username'] != "" && $_POST['password'] != "")
    {
        $login_user_name = mysqli_real_escape_string($db, strtolower($_POST["username"]));
        $login_user_password = mysqli_real_escape_string($db, strtolower(sha1(md5(trim($_POST["password"])))));
        $device_id = $_POST['device_id'];
        $device_type = $_POST['device_type'];




        //Check with database if user exists.
        $result = mysqli_query($db, "SELECT * FROM `dot_users` WHERE user_name ='$login_user_name' AND user_password= '$login_user_password' AND user_status = '1'");
        $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(count($r) > 0)
        {
            //user details match
            $uname = $r['user_name'];
            $uemail = $r['user_email'];
            $pass = $r['user_password'];
            $userid = $r['user_id'];
            $_SESSION['user_id'] = $userid;

            $loginTime = time();
            $hash = sha1($uname) . $loginTime; //Create a token
            //$_SESSION['cookie_value'] = $hash;
            // define('cookie_value',$hash); 
            //Hash and token will have to match these values on next login for automatic login.
            if ($hash) {
                setcookie($cookie_name, $hash, time() + 31556926, '/');
                // $checkBeforeLogin = mysqli_query($db, "SELECT userid, auth FROM dot_session WHERE userid = '$userid'") or die(mysqli_error($db));
                // if (mysqli_num_rows($checkBeforeLogin) > 0) {
                //     $deleteOldHash = mysqli_query($db, "DELETE FROM dot_session WHERE userid = '$userid'") or die(mysqli_error($db));
                // }
                $updateDeviceId = mysqli_query($db, "UPDATE `dot_users` SET device_id = '$device_id',device_type = '$device_type' WHERE user_id = '$userid' ");

                $saveHash = mysqli_query($db, "INSERT INTO `dot_session`(userid, auth) VALUES ('$userid','$hash')") or die(mysqli_error($db));
                if ($saveHash) {
                    $status = 1;
                    $message = "login successfully";
                    $token = $hash;
                    $result_url = client_url . "?token=" . $hash ;            
                }
            }

            
        }
        else
        {
            $status = 0;
            $message = "username or password is wrong";
        }
         
    }
    else
    {
        $status = 0;
        $message = "all fields required";
    }

    $response = array("status" => $status, "message" => $message, "token" => $hash, "result" => $result_url);
    echo json_encode($response);


?>