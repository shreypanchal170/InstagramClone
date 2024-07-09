<?php
    include_once("../functions/config.php");
    define(client_url,  $base_url);
    // echo "hio";exit;
  // echo $_COOKIE[$cookie_name] . "cookie";exit;

    //for IOS device cookie will set so bellow condition will call
    if (isset($_COOKIE[$cookie_name])) {
        $hashCookie = mysqli_real_escape_string($db, $_COOKIE[$cookie_name]);
        $checkSession = mysqli_query($db, "SELECT userid,auth FROM dot_session WHERE auth = '$hashCookie'") or die(mysqli_error($db));
        if (mysqli_num_rows($checkSession) > 0) {
            mysqli_query($db, "DELETE FROM dot_session WHERE auth='$hashCookie'") or die(mysqli_error($db));
            setcookie($cookie_name, '', time() - 31556926, '/');
            unset($_COOKIE[$cookie_name]);

            $userdetail = mysqli_fetch_array($checkSession, MYSQLI_ASSOC);
            $userid = $userdetail['userid'];
            $removeDeviceToken = mysqli_query($db,"UPDATE dot_users SET device_id = null, device_type = null WHERE user_id= '$userid' ");           

            $status = 1;
            $message = "logout successfully";
            $result_url = "";
            
            //header("Location: index.php");
        } else {
            setcookie($cookie_name, '', time() - 31556926, '/');
            unset($_COOKIE[$cookie_name]);
            //header("Location: index.php");
            $status = 1;
            $message = "logout successfully";
            $result_url = "";
        }
       
    }
    //for android device cookie will not match so else part will call
    else
    {

        $hashCookie = isset($_POST['token']) ? $_POST['token'] : "";

        $checkSession = mysqli_query($db, "SELECT userid,auth FROM dot_session WHERE auth = '$hashCookie'") or die(mysqli_error($db));
        if (mysqli_num_rows($checkSession) > 0)
        {
            mysqli_query($db, "DELETE FROM dot_session WHERE auth='$hashCookie'") or die(mysqli_error($db));
            setcookie($cookie_name, '', time() - 31556926, '/');
            unset($_COOKIE[$cookie_name]);

            $userdetail = mysqli_fetch_array($checkSession, MYSQLI_ASSOC);
            $userid = $userdetail['userid'];
            $removeDeviceToken = mysqli_query($db, "UPDATE dot_users SET device_id = null, device_type = null WHERE user_id= '$userid' ");

            $status = 1;
            $message = "logout successfully";
            $result_url = "";          
            //header("Location: index.php");
        }
    }

    $response = array("status" => $status, "message" => $message, "result" => $result_url);
    
    echo json_encode($response);

?>    
    
