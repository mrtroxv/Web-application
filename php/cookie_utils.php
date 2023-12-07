<?php

    function store_cookies($email, $password, $full_name) {
        setcookie("is_loged", true, time() + 60*60*24*30, '/');
        setcookie("email", $email, time() + 60*60*24*30, '/');
        setcookie("password", $password, time() + 60*60*24*30, '/');
        setcookie("full_name", $full_name, time() + 60*60*24*30, '/');
    }