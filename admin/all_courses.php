<?php
include_once "../config/connect.php";
include_once "includes/redirectIfNotAuth.php";
$callingData = $connect->query("select * from courses");
$count = $callingData->num_rows;
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
        <div class="w-5/6 bg-[#E4F9F5] pt-20 px-5 ">
            <div class="">
                <h1 class="text-xl font-semibold">Manage Subjects (<?= $count;?>)</h1>
                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="border p-2">Id</th>
                            <th class="border p-2">Course Name</th>
                            <th class="border p-2">Subject</th>
                            <th class="border p-2">Start Date</th>
                            <th class="border p-2">Description</th>
                            <th class="border p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      
                     while($course = $callingData->fetch_array()):
                        ?>
                        <tr>
                            <td class="border p-2"><?= $course['id']; ?></td>
                            <td class="border p-2"><?= $course['title']; ?></td>
                            <td class="border p-2"><?= $course['subject']; ?></td>
                            <td class="border p-2"><?= $course['date']; ?></td>
                            <td class="border p-2"><?= $course['description']; ?></td>
                            <td class="border p-2">
                                <a href="" class="bg-red-500 p-1 rounded text-sm text-white">Remove</a>
                            </td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>