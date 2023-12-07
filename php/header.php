<?php
if (isset($_COOKIE['is_loged']) && $_COOKIE['is_loged'] && !isset($fetched_image) && isset($fetch_image_path)) {
    include_once "cos.php";

    $con = OpenCon();
    $email = $_COOKIE['email'];
    $user_details_query = "SELECT * FROM user WHERE email='$email'";
    $res = $con->query($user_details_query);
    $row = $res->fetch_assoc();
    $full_name = $row['f_name'] . ' ' . $row['l_name'];
    $fetched_image = $row['img'];
    $is_admin = $row['is_admin'];
    CloseCon($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php foreach ($css_files_to_include as $filename) : ?>
        <link rel="stylesheet" href="<?php echo $filename ?>">
    <?php endforeach ?>

    <script src="<?php echo $js_logout_script_path ?>"></script>
    <script src="./../js/onCityCardClick.js"></script>
</head>

<body style="background-image: url(<?php echo $backgorund_image_path; ?>)" onload="setupLogoutBtnLogic()">
    <ul class="header">
        <li><a href="<?php echo $home_page_path ?>">Home</a></li>
        <li><a href="<?php echo $city_page_path ?>">City</a></li>
        <?php if (isset($_COOKIE['is_loged']) && $_COOKIE['is_loged']) : ?>
            <li><a href="<?php echo $fav_page_path ?>">Favorite</a></li>
            <?php if ($is_admin) : ?>
                <li>
                    <a href="<?php echo $admin_page_path ?>">
                        Admin Page
                    </a>
                </li>
            <?php endif ?>
        <?php endif ?>

        <li id="logBtn" class="l1 user_creds" style="float: right;">
            <?php if (isset($_COOKIE['is_loged']) && $_COOKIE['is_loged']) : ?>
                <img src="<?php echo $fetched_image; ?>" alt="">
                <span><?php echo $full_name; ?></span>
            <?php else : ?>
                <a class="center-text" href="<?php echo $login_page_path ?>">Login</a>
            <?php endif ?>
        </li>
    </ul>
    <br />
    <br />