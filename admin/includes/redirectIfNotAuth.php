<?php
 if (!isset($_SESSION['admin'])) {
    redirectTo("../login.php");
}
?>