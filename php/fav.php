<?php
$css_files_to_include = ["./../css/home.css", "./../css/global-styles.css"];
include_once("./constants.php");

include("./header.php");

$con = OpenCon();
$email = $_COOKIE['email'];
$user_id = $con->query("SELECT id FROM user WHERE email='$email'")->fetch_assoc()['id'];

if (isset($_POST["delete"])) {
    $mon_id = $_POST["mon_id"];
    $con->query("DELETE FROM fav WHERE user_id='$user_id' AND mon_id='$mon_id'");
}

$all_mons = [];
$all_faved_mons = [];
$res = $con->query("SELECT mon_id FROM fav WHERE user_id='$user_id'");

while ($row = $res->fetch_assoc()) {
    array_push($all_faved_mons, $row["mon_id"]);
}

if (count($all_faved_mons)) {
    $res = $con->query("SELECT * FROM mon WHERE id IN (" . join(",", $all_faved_mons) . ")");
    while ($row = $res->fetch_assoc()) {
        array_push($all_mons, [$row['name'], $row['img'], $row['des'], $row["id"], in_array($row["id"], $all_faved_mons)]);
    }
}
?>

<h3 style="color: white;margin: 25px;">About the Faved monuments:</h3>
<?php foreach ($all_mons as $mon) : ?>
    <?php if ($mon[4]) : ?>
        <form style="margin: 25px;" action="./fav.php" method="POST">
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

            <input type="text" name="mon_id" value="<?php echo $mon[3] ?>" style="display: none;">
            <input type="submit" name="delete" style="width: 100%; height: 50px;background-color: blue;color: white;border-radius: 100px;font-size: 30px;" value="Delete">
        </form>
    <?php endif ?>

<?php endforeach ?>


</body>

</html>