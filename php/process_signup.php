<?php
include_once './cos.php';
include_once './utils.php';
include_once './constants.php';
include_once './cookie_utils.php';

if (isset($_POST['signup']) || isset($_POST["create"])) {
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $b_date = $_POST["b_date"];
    $image_type =  explode("/", $_FILES["image"]["type"])[1];
    $temp_image_name = $_FILES["image"]["tmp_name"];
    $folder = "./../images/inputedImage." . $image_type;

    $email_error_msgs = [];
    $image_error_msgs = [];

    if (!move_uploaded_file($temp_image_name, $folder)) {
        array_push($image_error_msgs, "Image failed to upload");
    }

    $image_data = file_get_contents($folder);
    $base64_image = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);

    $insert_query = "INSERT INTO user (f_name, email, password, img, birth, l_name) VALUES ('$f_name', '$email', '$password', '$base64_image', '$b_date', '$l_name' )";

    $con = OpenCon();
    $is_email_used = is_unique_email($con, $email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
     array_push($email_error_msgs, $invalid_login_credentials_err_msg_1);
   }
     elseif (!$is_email_used) {
        array_push($email_error_msgs, $email_alredy_used_err_msg);
    } else {
        $res = $con->query($insert_query);
        if ($res === TRUE) {
            if (isset($_POST['signup'])) {
                store_cookies($email, $password, $f_name . " " . $l_name);
                redirect($home_php_url);
            }
        }
    }
    CloseCon($con);
}
