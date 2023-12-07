<?php
include 'cos.php';

if (isset($_COOKIE['is_loged']) && $_COOKIE['is_loged']) {
    $con = OpenCon();
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    $select_image_query = "SELECT img FROM user WHERE email='$email' AND password='$password'";
    $res = $con->query($select_image_query);

    $row = $res->fetch_assoc();
    $fetched_image = $row["img"];
    CloseCon($con);
}
