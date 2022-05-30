<?php 
    include_once "cos.php";

    if(isset($_GET['city_btn']) || isset($_POST["city_name"])) {
        $city_name = isset($_POST["city_name"])? $_POST["city_name"]: $_GET['city_name'];

        $all_mons = [];

        $con = OpenCon();
        $fetch_city_id = "SELECT id FROM city WHERE name='$city_name'";
        $res = $con -> query($fetch_city_id);
        $city_id = $res -> fetch_assoc()["id"];
        $faved_mons = []; 
        if(isset($_COOKIE["is_loged"])){
        $email = $_COOKIE['email'];
        $user_id = $con -> query("SELECT id FROM user WHERE email='$email'") -> fetch_assoc()['id'];
     
    
        $res = $con -> query("SELECT mon_id FROM fav WHERE user_id='$user_id'");
        while($row = $res -> fetch_assoc()) {
            array_push($faved_mons, $row["mon_id"]);
        }
    }
        $fetch_all_city_mons = "SELECT * FROM mon WHERE city_id='$city_id'";
        $res = $con -> query($fetch_all_city_mons);

        while($row = $res -> fetch_assoc()) {
            array_push($all_mons, [$row['name'], $row['img'], $row['des'],$row["id"], in_array($row["id"], $faved_mons)]);
        }
        CloseCon($con);
    }