<?php
    include_once "../config/connect.php";

    if(isset($_POST['register'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $query = $connect->query("insert into users (first_name, last_name, email, password) values('$first_name','$last_name','$email','$password')");

        if($query){
            redirectTo("../login.php");
        }
        else{
            msg("Not Inserted");
            redirectTo("../register.php");
        }
    }
?>