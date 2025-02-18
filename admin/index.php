<?php
include_once "../config/connect.php";
include_once "includes/redirectIfNotAuth.php";
if(isset($_SESSION['admin'])){
    $admin = getUser();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="src/output.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>EduFlow | Admin</title>
</head>

<body>
    <?php include_once "includes/adminHeader.php"; ?>
    <div class="flex w-full">
        <?php include_once "includes/admin_sidebar.php"; ?>
        <div class="w-2/6 pt-24 px-12 ">
            <?php
                if(isset($_SESSION['admin'])):
            ?>
            <h1 class="text-2xl font-semibold text-gray-400">Hello, <?= $admin['first_name'];?></h1>
            <?php else:?>
                <h1>Hello User</h1>
                <?php endif;?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>