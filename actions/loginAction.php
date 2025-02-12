<?php

include_once "../config/connect.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query = $connect->query("select * from users where email='$email' and password='$password'");
    $count = $query->num_rows;
    $data = $query->fetch_array();

    if ($count) {
        if ($data['isAdmin'] == 1) {
            $_SESSION['admin'] = $email;
            redirectTo("../admin/index.php");
        } else {
            if ($count > 0) {
                $_SESSION['user'] = $email;
                redirectTo("../index.php");
            } else {
                msg("Invalid Username or password");
                redirectTo("../login.php");
            }
        }
    } else {
        msg("Invalid username or password");
        redirectTo("../login.php");
    }
}
