<?php

$connect = new mysqli("localhost", "root", "", "eduflow") or die("Error Connecting To DB");
session_start();

//redirect If not authentication
function redirectIfNotAuth()
{
    if (!isset($_SESSION['user'])) {
        redirectTo("login.php");
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

function validateName($name) {
    // Trim whitespace
    $name = trim($name);
    
    // Regular expression for a valid name (allows letters and spaces only)
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $name)) {
        return "Invalid name. Only letters and spaces allowed (2-50 characters).";
    }

    return "Valid name.";
}

