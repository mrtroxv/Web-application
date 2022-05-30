<?php
include("./utils.php");
include_once("./cookie_utils.php");

$con = OpenCon();

if (isset($_POST['delete'])) {
    $user_id = $_POST["id"];
    $con->query("DELETE FROM user Where id='$user_id'");
} else if (isset($_POST['save'])) {
    $user_id = $_POST["id"];
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $b_date = $_POST["b_date"];
    $is_admin = isset($_POST["is_admin"]);

    if($con -> query("SELECT * FROM user WHERE email='$email' AND id!='$user_id'") -> num_rows) {
        echo "<script>alert('email already used, changes won\'t be done.');</script>";
        return;
    }

    $con->query("UPDATE user SET f_name='$f_name', l_name='$l_name', email='$email', password='$password', birth='$b_date', is_admin='$is_admin'  Where id='$user_id'");
    // update cookies if admin changed his account details.
    if($email == $_COOKIE["email"]) {
        store_cookies($email, $password, $f_name . ' ' . $l_name);
    }
} else if(isset($_POST['create'])) {
    include_once "./process_signup.php";
}
