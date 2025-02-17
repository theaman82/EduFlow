<?php
include_once "config/connect.php";

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
        <div class="w-8/12 flex flex-col gap-4 px-5 pt-24">
            <h1 class="text-xl font-bold">My Courses</h1>
            <?php
            $calling_enrollCourse =   $connect->query("select * from enroll_course where status='0'");
            $getCourse = $calling_enrollCourse->fetch_assoc();
            $countCourse = $calling_enrollCourse->num_rows;
            if ($countCourse):
                $course_id = $getCourse['course_id'];
                $calling_course = $connect->query("select * from my_course join courses on my_course.course_id=courses.id where user_id='$course_id'");
                while ($course = $calling_course->fetch_array()):
            ?>
                    <div class="shadow border flex gap-5 border-gray-400 rounded p-2">
                        <img src="assets/template/<?= $course['template']; ?>" class="w-32" alt="">
                        <div class="flex justify-center flex-col gap-2">
                            <h2 class="uppercase font-semibold text-lg"><?= $course['title'];?></h2>
                            <p class="capitalize">🔴 <?= $course['course_type']?></p>
                        </div>
                    </div>
                <?php endwhile;
            else:
                ?>
                <h1>Empty</h1>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>