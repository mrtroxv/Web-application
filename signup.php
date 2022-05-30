<?php
$css_files_to_include = ["./../css/signup.css", "./../css/global-styles.css"];
include_once("./constants.php");
require("./header.php");
include_once('./process_signup.php');
?>

<div class="tit">
    <h1 style=" text-align: center"> Signup</h1>
    <form method="POST" action="./../php/signup.php" enctype="multipart/form-data">
        <div class="in1">
            <label class="l1">First Name:</label><br />
            <input type="text" name="f_name" value="<?php if (isset($f_name)) {
                                                        echo $f_name;
                                                    } ?>" required />
        </div>
        <?php if (isset($f_name_error_msg)) {
            echo `<span class="text-warning">$f_name_error_msg</span>`;
        } ?>
        <div class="in1">
            <label class="l1">Last Name :</label>
            <br />
            <input type="text" name="l_name" value="<?php if (isset($l_name)) {
                                                        echo $l_name;
                                                    } ?>" required />
        </div>
        <div class="in1">
            <label class="l1">Password:</label>
            <br />
            <input type="password" name="password" required />
        </div>
        <div class="in1">
            <label class="l1">Email:</label>
            <br />
            <input type="text" name="email" value="<?php if (isset($email)) {
                                                        echo $email;
                                                    } ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required />
            <?php if (isset($email_error_msgs)) : ?>
                <?php foreach ($email_error_msgs as $value) : ?>
                    <div class="text-warning"><?php echo $value; ?></div>
                <?php endforeach ?>
            <?php endif ?>
        </div>

        <div class="in1">
            <label class="l1">Birth Date :</label><br />
            <input type="date" name="b_date" value="<?php if (isset($b_date)) {
                                                        echo $b_date;
                                                    } ?>" max="<?php echo date('Y-m-d'); ?>" required />
        </div>

        <div class="in1">
            <label class="l1">Image :</label><br />
            <input type="file" accept="image/png, image/jpeg" name="image" required />
        </div>

        <input class="in1" type="submit" name="signup" value="signup" style="height: 50px; color:white ;background-color: blue;">
    </form>

</div>

</body>

</html>