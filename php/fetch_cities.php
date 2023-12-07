<?php 
    include_once "cos.php";

    $con = OpenCon();
    $select_all_cities_query = "SELECT name, img, des FROM city";

    $all_cites = [];
    $res = $con -> query($select_all_cities_query);

    while($row = $res -> fetch_assoc()) {
        array_push($all_cites, [$row["name"], $row["img"], $row["des"]]);
    }

    CloseCon($con);