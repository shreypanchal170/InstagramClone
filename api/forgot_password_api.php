<?php
    include_once("../functions/config.php");
    include_once '../functions/user.php';
    $Dot = new DOT_USER($db);
    include_once '../functions/sendMail.php';

    define(client_url,  $base_url);

    //for API resonse
    $message = "";
    $status = 0;
    $result_url = "";

    if ($_POST['email'] != "")
    {
        $user_email = mysqli_real_escape_string($db, strtolower($_POST["email"]));

        //Check with database if user exists.
        $result = mysqli_query($db, "SELECT * FROM `dot_users` WHERE user_email ='$user_email' AND user_status = '1'");
        $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(count($r) > 0)
        {
            //print_r($r);exit;
            //user details match
            $uname = $r['user_name'];
            $uemail = $r['user_email'];
            $pass = $r['user_password'];
            $userid = $r['user_id'];


            $ResetPassword = $Dot->Dot_ForGot_PassWord($uemail);
            if ($ResetPassword) {
                $GetForgotKey = $Dot->Dot_GetForgotID($uemail);
                $GetScriptInfo = $Dot->Dot_Configurations();
                $scriptName = $GetScriptInfo['script_title'];
                $scriptLogo = $GetScriptInfo['script_logo'];
                $newpassword_url = $base_url . 'reset?id=' . $GetForgotKey;
                $subject = '' . $scriptName . ' Password';
                $body = "<div style='width:100%; border-radius:3px; -webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;background-color:#fafafa; text-align:center; padding:50px 0px;overflow:hidden;'>
                <div style='width:100%;max-width:600px;border: 1px solid #e6e6e6;margin:0px auto;background-color:#ffffff;padding:30px;border-radius:3px;-webkit-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;'>
                    <div style='width:100%;max-width:100px;margin:0px auto;overflow:hidden;margin-bottom:30px;'><img src='" . $base_url . 'uploads/logo/' . $scriptLogo . "' style='width:100%;overflow:hidden;'/></div>
                <div style='width:100%;position:relative;display:inline-block;padding-bottom:10px;'> <strong>Forgot your Password ?</strong> reset it below:</div>
                <div style='width:100%;position:relative;padding:10px;background-color:#20B91A;max-width:350px;margin:0px auto; color:#ffffff !important;'>
                    <a href='" . $newpassword_url . "' style='text-decoration:none; color:#ffffff !important;font-weight:500;font-size:18px;position:relative;'>Reset Password</a> 
                </div>
                </div>
                </div>";
                sendMail($uemail, $subject, $body, $smtpHost, $smtpPort, $smtpUsername, $smtpPassword, $smtpFrom, $scriptName);
                //echo 'sended';
                $status = 1;
                $message = "password reset link sent to your email";

            } else {
                $status = 0;
                $message = "something went wrong! try again";
            }            
        }
        else
        {
            $status = 0;
            $message = "email not found";
        }
         
    }
    else
    {
        $status = 0;
        $message = "all fields required";
    }

    $response = array("status" => $status, "message" => $message, "result" => $result_url);
    echo json_encode($response);
