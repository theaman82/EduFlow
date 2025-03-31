<?php
include_once "config/connect.php";
if (isset($_SESSION['user'])) {
    $user = getUser();
}

if (!isset($_GET['c_id'])) {
    redirectTo("index.php");
}
$c_id = $_GET['c_id'];
$query = $connect->query("select * from courses where id='$c_id'");

if ($query->num_rows == 0) {
    redirectTo("index.php");
}
$single_course = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="src/output.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#E4F9F5]">
    <?php include_once "includes/navbar.php"; ?>
    <div class="flex gap-5 pt-24 px-[5%]">
            <div class="flex w-full flex-col">
                <div class="flex h-[50vh]">
                    <div class="w-3/6 h-[100vh]">
                        <img src="assets/template/<?= $single_course['template']; ?>" class="h-[44vh] rounded shadow-xl w-[40vw]" alt="">
                    </div>
                    <div class="flex flex-col gap-3 py-3 w-3/6">
                        <h1 class="text-2xl font-semibold"><?= $single_course['title']; ?></h1>
                        <p class="text-lg text-gray-800">Starting From - <?= date("F d, Y", strtotime($single_course['date'])); ?></p>
                        <p class="capitalize"> <?= $single_course['course_type']; ?> Batch</p>
                        <p class="capitalize text-xl font-semibold"> $ <?= $single_course['price']; ?></p>
                        <?php if($single_course['course_type'] == "online"):?>
                        <a href="payment.php?b_id=<?= $single_course['id']; ?>" class="bg-blue-500 px-3 py-2 rounded text-white font-semibold w-fit">🚀 Enroll Now</a>
                        <?php else:?>
                            <a href='addmission.php' class="bg-blue-500 px-3 py-2 rounded text-white font-semibold w-fit">Take Addmission</a>
                            <?php endif;?>
                    </div>
                </div>
                <div class="flex flex-col border border-gray-400 p-2 rounded gap-2">
                    <h2 class="text-lg font-semibold">Description :-</h2>
                    <hr class="text-gray-300">
                    <p><?= $single_course['description']; ?></p>
                    <hr class="text-gray-300">
                    <p class="text-lg font-semibold">Features Of The Batch :-</p>
                </div>
            </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
<?php

