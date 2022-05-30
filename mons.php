<?php
$css_files_to_include = ["./../css/home.css", "./../css/global-styles.css"];
include_once("./constants.php");

include("./promons.php");
include("./header.php");
include("./fetch_mons.php");

if (isset($_POST['city_name'])) {
    $city_name = $_POST['city_name'];
}
?>

<h3 style="color: white;margin: 25px;">About the monuments in <?php echo $city_name ?>:</h3>
<?php foreach ($all_mons as $mon) : ?>
    <form style="margin: 25px;" action="./mons.php" method="POST">
        <div style="background-color:transparent;">
            <img src="<?php echo $mon[1] ?>" style="height: 250px;width: 250px;float:right; border:solid 2px;border-radius:25px;">
            <h4><?php echo $mon[0] ?></h4>
            <p>
            <p>
        <b>
    <?php echo $mon[2] ?>
        </b>
</p>
            </p>
        </div>

        <input type="text" name="city_name" value="<?php echo $city_name ?>" style="display: none;" />
        <input type="text" name="mon_id" value="<?php echo $mon[3] ?>" style="display: none;">
        <?php if (isset($_COOKIE['is_loged']) && !$mon[4]) : ?>
            <input type="submit" name="add" style="width: 100%; height: 50px;background-color: blue;color: white;border-radius: 100px;font-size: 30px;" value="Add">
        <?php endif ?>
    </form>

<?php endforeach ?>


</body>

</html>