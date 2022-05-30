<?php 
    include_once './cos.php';
    include_once './constants.php';
    include_once './utils.php';
    include_once './cookie_utils.php';

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login_error_msgs = [];
        
        $con = OpenCon();
        $select_current_user_query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $res = $con -> query($select_current_user_query);

        js_log($res-> num_rows);
        if($res-> num_rows != 0) {
            $row = $res->fetch_assoc();
            $full_name = $row["f_name"] . " " . $row["l_name"];
            $image = $row["img"];

            store_cookies($email, $password, $full_name);
            CloseCon($con);
            redirect($home_php_url);
        } else {
            array_push($login_error_msgs, $invalid_login_credentials_err_msg);
        }
        
        CloseCon($con);
    }
?>