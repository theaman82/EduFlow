<?php

$connect = new mysqli("localhost", "root", "", "eduflow") or die("Error Connecting To DB");
session_start();

//redirect If not authentication
function redirectIfNotAuth()
{
    if (!isset($_SESSION['user'])) {
        redirectTo("../login.php");
    }
}

// redirect function
function redirectTo($page)
{
    echo "<script>window.open('$page','_self')</script>";
}

// alert message function
function msg($msg)
{
    echo "<script>alert('$msg')</script>";
}

// get user details
function getUser()
{
    global $connect;
    $email = $_SESSION['user'];
    $query = $connect->query("select * from users where email='$email'");
    $userData = $query->fetch_array();
    return $userData;
}
