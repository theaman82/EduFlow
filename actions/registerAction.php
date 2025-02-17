<?php
include_once "../config/connect.php";

if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!validateName($first_name)) {
        msg("Invalid First Name. Only letters and spaces allowed (2-50 characters).");
        redirectTo("../register.php");
        exit(); // Stop execution if validation fails
    }
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        msg("Invalid Email");
        redirectTo("../register.php");
        exit(); // Stop execution if validation fails
    }
    if(!preg_match("/^[A-z]+[!@#$%^&*]{1,}+[0-9]{1,}$/",$password)){
        msg("Invalid password");
        redirectTo("../register.php");
        exit(); 

    
    }
    $enc_password=sha1($password);
    
    $query = $connect->query("insert into users (first_name, last_name, email, password) values('$first_name','$last_name','$email','$enc_password')");

    if ($query) {
        msg("Registered successfull");
        redirectTo("../login.php");
    } else {
        msg("Not Inserted");
        redirectTo("../register.php");
    }
}
