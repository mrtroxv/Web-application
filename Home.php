<?php
$css_files_to_include = ["./css/home.css", "./css/global-styles.css"];
$home_page_path = "./Home.php";
$city_page_path = "./php/city.php";
$fav_page_path = "./php/fav.php";
$backgorund_image_path = "./images/ahmad.jpg";
$login_page_path = "./php/login.php";
$fetch_image_path = "./php/fetch_image.php";
$admin_page_path = "./php/admin_page.php";
$js_logout_script_path = "./js/logout.js";
require("./php/header.php");
include "./php/fetch_cities.php"
?>

<h3 style="color: white;margin: 25px;">About the cities:</h3>
<?php foreach ($all_cites as $city) : ?>
    <div style="margin: 25px;">
        <img src="<?php echo $city[1] ?>" style="height: 250px;width: 250px;float:right; border:solid 2px;border-radius:25px;">
        <h4><?php echo $city[0] ?></h4>
        <p>
        <pre>
            <b>
                <?php echo $city[2] ?>
            </b>
            </pre>
        </p>
    </div>
<?php endforeach ?>

</body>
</html>