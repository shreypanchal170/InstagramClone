<?php
    include_once("../functions/config.php");
    define(client_url,  $base_url);

    $valid = true;
    
    //for API resonse
    $message = "";
    $status = 0;
    $result_url = "";

    if ($_POST['username'] != "" && $_POST['fullname'] != "" && $_POST['password'] != "" && $_POST['regemail'] != "" && $_POST['gender'] != "" && $_POST['birth_day'] != "" && $_POST['birth_month'] != "" && $_POST['birth_year'] != "")
    {
        //get all request parameters
        
        $firstname = mysqli_real_escape_string($db, $_POST["username"]);
        $fullname = mysqli_real_escape_string($db, ucfirst(strtolower($_POST["fullname"])));
        $password = mysqli_real_escape_string($db, sha1(md5(trim($_POST["password"]))));
        $thisEmail = mysqli_real_escape_string($db, $_POST['regemail']);
        $gender = mysqli_real_escape_string($db, $_POST["gender"]);
        $birth_day = mysqli_real_escape_string($db, $_POST["birth_day"]);
        $birth_month = mysqli_real_escape_string($db, $_POST["birth_month"]);
        $birth_year = mysqli_real_escape_string($db, $_POST["birth_year"]);

        //Check with database if username and email exists.
        if ($firstname != '') {
            $checkUsernameExist = mysqli_query($db, "SELECT user_name FROM dot_users WHERE user_name = '$firstname'") or die(mysqli_error($db));
            if (mysqli_num_rows($checkUsernameExist) > 0) {
                $status = 0;
                $message = "username already exists";
                
                $valid = false;
            }
        }

        if ($thisEmail != '') {
            $checkUsernameExist = mysqli_query($db, "SELECT user_email FROM dot_users WHERE user_email = '$thisEmail'") or die(mysqli_error($db));
            if (mysqli_num_rows($checkUsernameExist) > 0) {
                $status = 0;
                $message .= " email already registered";
                
                $valid = false;

            }
        }

        // If Everything is All Right then Register User
        if($valid)
        {
            $regTime = time();
            mysqli_query($db, "SET character_set_client=utf8") or die(mysqli_error($db));
            mysqli_query($db, "SET character_set_connection=utf8") or die(mysqli_error($db));
            $ip = $_SERVER['REMOTE_ADDR']; // user ip
            $checkIPisBlocked = mysqli_query($db, "SELECT blocked_user_ip FROM dot_admin_blocked WHERE blocked_user_ip = '$ip'") or die(mysqli_error($db));
            if (mysqli_num_rows($checkIPisBlocked) > 0) {
                $status = 0;
                $message = "your ip is blocked";
            }

            $saveUser = mysqli_query($db, "INSERT INTO `dot_users` (user_email,user_name,user_fullname,user_gender,user_password,user_birthday,user_birthmonth,user_birthyear,user_status,user_registered,user_ip) VALUES('$thisEmail','$firstname','$fullname','$gender','$password','$birth_day','$birth_month','$birth_year','1','$regTime','$ip')") or die(mysqli_error($db));

            if ($saveUser)
            {
                $login_ok = true;
                $getUserID = mysqli_query($db, "SELECT user_id,user_name FROM dot_users WHERE user_email = '$thisEmail' AND user_name = '$firstname'") or die(mysqli_error($db));
                $row = mysqli_fetch_array($getUserID, MYSQLI_ASSOC);
                $uid = $row['user_id'];
                $dbunm = $row['user_name'];
                $_SESSION['user_id'] = $uid;

                //Hash and token will have to match these values on next login for automatic login.
                $password_hash = sha1($email . $password);    //Create a hash
                $tkn = sha1($email . time());        //Create a token
                $friend_query = mysqli_query($db, "INSERT INTO `dot_friends` (user_one,user_two,role,created_time)VALUES('$uid','$uid','me', '$regTime')");

                if (setcookie($cookie_name, 'u=' . $uid . '&h=' . $password_hash . '&t=' . $tkn . '&n=' . $dbunm, time() + (86400 * 30), "/")) {
                        //Check if a session exists in database for this user
                        $result = mysqli_query($db, "SELECT * FROM `dot_session` WHERE userid='$uid'");
                        $r = mysqli_num_rows($result);
                        echo $_COOKIE[$cookie_name];
                        //If a previous sessions exists, delete old session and set new cookie, hash and token, for this user.
                        if ($result > 0) {
                            mysqli_query($db, "DELETE FROM `dot_session` WHERE userid='$uid'");
                            mysqli_query($db, "INSERT INTO `dot_session` (userid, auth, tkn) VALUES ('$uid', '$password_hash', '$tkn')");
                        }

                        $status = 1;
                        $message =  "registered successfully.";
                        //$result_ulr = client_url;
                    }
            }
            else
            {
                $status = 0;
                $message = "something went wrong! try again";
            }
        }
         
    }
    else
    {
        $status = 0;
        $message = "all fields required";
    }

    $response = array("status" => $status, "message" => $message, "result" => $result_url);
    echo json_encode($response);
