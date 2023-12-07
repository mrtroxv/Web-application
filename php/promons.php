<?php 

if(isset($_POST['add'])) {
    include_once './cos.php';
    $con=OpenCon();
    $mon_id = $_POST["mon_id"];
    $email = $_COOKIE["email"];

    $user_id = $con -> query("SELECT id FROM user WHERE email='$email'") -> fetch_assoc()['id'];
    $res=$con->query("INSERT INTO fav(user_id, mon_id) VALUES ('$user_id','$mon_id')");
}
