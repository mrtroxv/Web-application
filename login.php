<?php
$css_files_to_include = ["./../css/style.css", "./../css/global-styles.css"];
include_once("./constants.php");
require("./header.php");
include './process_login.php';
?>

<div class="center">
    <h1>login</h1>
    <form method="post" action="./../php/login.php">
        <div class="textf">
            <label>Email:</label>
            <input type="text" name="email"   required >
        </div>
        <div class="textf">
            <label id="aq">Password:</label>
            <input type="password" id="ah" name="password" required>
        </div>

        <div>
            <?php if (isset($login_error_msgs)) : ?>
                <?php foreach ($login_error_msgs as $value) : ?>
                    <div class="text-warning"><?php echo $value; ?></div>
                <?php endforeach ?>
            <?php endif ?>
        </div>

        <div class="bottom-form">
            <div class="pass">Did you forget password ?</div>
            <div class="sub">
                <input type="submit" value="login" name="login">
            </div>
            <div class="signup">
                not a member ? <a href="./../php/signup.php">signup</a></div>
        </div>

    </form>
</div>
</body>

</html>