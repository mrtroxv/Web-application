<?php
$css_files_to_include = ["./../css/city.css", "./../css/global-styles.css"];
include_once("./constants.php");
include("./header.php");
include("./fetch_cities.php");
?>

<form class="cards-container" action="mons.php" method="GET">
    <?php foreach ($all_cites as $city) : ?>
        <div class="city-card">
            <img src="<?php echo $city[1] ?>"/>
            <p><?php echo $city[0] ?></p>
        </div>
    <?php endforeach ?>
    <input id="city_name_feild" type="text" name="city_name" />
    <input id="city_submit_btn" type="submit" name="city_btn" />
</form>

<?php echo "<script>handelOnCityCardClick()</script>" ?>

</body>
</html>