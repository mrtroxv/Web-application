<?php
$css_files_to_include = ["./../css/admin-page.css", "./../css/global-styles.css"];
include_once("./constants.php");
include("./admin_handel_event.php");
include("./fetch_all_users.php");
include("./header.php");

$users_count = count($all_users);

function isEvenRow($index)
{
    if (($index + 1) % 2) {
        echo "class='second-row'";
    }
}

?>

<div class="users-container">
    <div class="user-row">
        <span>f_name</span>
        <span>l_name</span>
        <span><pre>            email</pre></span>
        <span><pre>            password</pre></span>
        <span><pre>                 img</pre></span>
        <span><pre>            birthdate</pre></span>
        <span><pre>         is_admin</pre></span>
        <span></span>
    </div>

    <?php foreach ($all_users as $key => $user) : ?>
        <br/>
        <form class="user-row" action="./admin_page.php" method="POST">
            <span <?php isEvenRow($key) ?>><input type="text" value="<?php echo $user[0] ?>" name="f_name"></span>
            <span <?php isEvenRow($key) ?>><input type="text" value="<?php echo $user[1] ?>" name="l_name"></span>
            <span <?php isEvenRow($key) ?>><input type="text" value="<?php echo $user[2] ?>" name="email"></span>
            <span <?php isEvenRow($key) ?>><input type="text" value="<?php echo $user[3] ?>" name="password"></span>
            <span <?php isEvenRow($key) ?>><img src="<?php echo $user[4] ?>" /></span>
            <span <?php isEvenRow($key) ?>><input type="date" value="<?php echo $user[5] ?>" max="<?php echo date('Y-m-d'); ?>" name="b_date"></span>
            <span <?php isEvenRow($key) ?>><input type="checkbox" <?php if ($user[6]) {echo "checked";} ?> name="is_admin"></span>
            <span <?php isEvenRow($key) ?>>
                <input type="submit" value="save" name="save">
                <input type="submit" value="delete" name="delete">
            </span>

            <input style="display: none;" type="text" name="id" value="<?php echo $user[7] ?>"/>
        </form>
        <br/>
        <br/>
    <?php endforeach ?>
    <div class="user-row" style="padding: left 30px ;">
        <span style="margin-left: 15px;">f_name</span>
        <span style="margin-left: 15px ;">l_name</span>
        <span  style="margin-left: 40px ;">email</span>
        <span  style="margin-left: 40px ;">password</span>
        <span>img</span>
        
        <span style="position: relative; left:125px;"> birthdate </span>
        <span style="position: relative; left:80px;" >is_admin</span>
        <span></span>
    </div>
    <br/>
    

    <form class="user-row" action="./admin_page.php" method="POST"  enctype="multipart/form-data">
            <span <?php isEvenRow($users_count) ?>><input type="text" name="f_name"></span>
            <span <?php isEvenRow($users_count) ?>><input type="text" name="l_name"></span>
            <span <?php isEvenRow($users_count) ?>><input type="text" name="email"></span>
            <span <?php isEvenRow($users_count) ?>><input type="text" name="password"></span>
            <span <?php isEvenRow($users_count) ?>><input type="file" accept="image/png, image/jpeg" name="image"></span>
            <span <?php isEvenRow($users_count) ?>><input type="date" max="<?php echo date('Y-m-d'); ?>" name="b_date"></span>
            <span <?php isEvenRow($users_count) ?>><input type="checkbox" name="is_admin"></span>
            <span <?php isEvenRow($users_count) ?>>
                <input type="submit" value="Create User" name="create">
            </span>

            <input style="display: none;" type="text" name="id" value="<?php echo $user[7] ?>"/>
        </form>
</div>
</body>

</html>