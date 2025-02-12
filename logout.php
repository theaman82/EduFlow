<?php
include_once "config/connect.php";

session_destroy();
redirectTo("login.php");