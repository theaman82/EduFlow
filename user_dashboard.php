<?php
include_once "config/connect.php";
if (isset($_SESSION['user'])) {
    $user = getUser();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="src/output.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#E4F9F5]">
    <?php include_once "includes/navbar.php"; ?>
    <div class="flex w-full">
        <?php include_once "includes/sidebar.php"; ?>
        <div class="w-8/12 flex flex-col gap-4 px-10 pt-28">
            <h1 class="text-2xl text-gray-400 font-semibold">Hello, <?= $user['first_name']?></h1>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>