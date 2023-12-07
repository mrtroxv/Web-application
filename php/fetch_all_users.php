<?php 
    $con = OpenCon();
    $res = $con -> query("SELECT * FROM user");

    $all_users = [];

    while($row = $res -> fetch_assoc()) {
        array_push($all_users, [$row['f_name'], $row["l_name"], $row["email"], $row["password"], $row["img"], $row["birth"], $row["is_admin"], $row["id"]]);
    }

    CloseCon($con);
