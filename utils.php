<?php
    include_once './cos.php';
    include_once './constants.php';

    function redirect($url) {
        header("Location: $url");
        die();
    }

    function is_unique_email($con, $email) {
        $check_not_duplicated_email_query = "SELECT * FROM user WHERE email = '$email'";
        $res = $con -> query($check_not_duplicated_email_query);

        return $res -> num_rows === 0;
    }

    function js_log($msg) {
        echo "<script>console.log('$msg');</script>";
    }

?>