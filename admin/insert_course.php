<?php
include_once "../config/connect.php";
include_once "includes/redirectIfNotAuth.php";
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
        <div class="w-5/6 bg-[#E4F9F5] pt-16 px-5 ">
            <div class="flex justify-between">
                <p class="font-semibold text-2xl">Insert Batch</p> <a href="" class="px-3 text-white rounded py-2 bg-teal-500">Go Back</a>
            </div>
            <div class="flex  flex-1 w-full p-5 shadow-xl">
                <form action="" method="post" enctype="multipart/form-data" class="w-full">
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex w-full flex-col">
                            <label for="" class="text-lg font-semibold">Batch Title</label>
                            <input type="text" name="title" class="px-2 py-2 w-full  outline-none border border-gray-400 rounded">
                        </div>
                        <div class="flex w-full flex-col">
                            <label for="" class="text-lg font-semibold">Course Name</label>
                            <select name="subject" id="" class="bg-white">
                                <option value="" selected disabled>Select Course</option>
                                <?php
                                $callingSub = $connect->query("select * from subjects");
                                while ($sub = mysqli_fetch_array($callingSub)) {
                                    echo "<option value='" . $sub['title'] . "'>" . $sub['title'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex w-full flex-col">
                            <label for="" class="text-lg font-semibold">Start Date</label>
                            <input type="date" name="date" placeholder="enter exam title" class="px-2 py-2 w-full  outline-none border border-gray-400 rounded">
                        </div>
                        <div class="flex w-full flex-col">
                            <label for="" class="text-lg font-semibold">Template</label>
                            <input type="file" name="template" class=" w-full bg-white outline-none border border-gray-400 rounded">
                        </div>
                    </div>
                    <div class="mt-5 grid grid-cols-2 gap-5 ">
                        <div class="flex items-center gap-5">
                            <label for="course_type">Batch Type:</label>
                            <div class="flex gap-1 items-center">
                                <input type="radio" value="online" name="course_type" id="online">
                                <label for="online">Online</label>
                            </div>
                            <div class="flex gap-1 items-center">
                                <input type="radio" value="offline" name="course_type" id="offline">
                                <label for="offline">Offline</label>
                            </div>
                        </div>
                        <div class="flex w-full flex-col">
                            <label for="" class="text-lg font-semibold">Price</label>
                            <input type="number" name="price" class="px-2 py-2 w-full  outline-none border border-gray-400 rounded">
                        </div>
                    </div>


                    <div class="flex w-full mt-5 flex-col">
                        <label for="" class="text-lg font-semibold">Description</label>
                        <textarea type="file" name="description" rows="4" class="px-2 py-1 bg-white w-full  outline-none border border-gray-400 rounded"></textarea>
                    </div>
                    <input type="submit" name="insert_course" value="Insert Course" class=" bg-teal-500 mt-5 text-white px-2 py-1 w-full font-semibold text-lg outline-none border border-gray-400 rounded">
                </form>
                <?php
                if (isset($_POST['insert_course'])) {
                    $title = $_POST['title'];
                    $subject = $_POST['subject'];
                    $date = $_POST['date'];
                    $description = $_POST['description'];
                    $course_type = $_POST['course_type'];
                    $price = $_POST['price'];

                    $template = $_FILES['template']['name'];
                    $tmp_name = $_FILES['template']['tmp_name'];

                    move_uploaded_file("$tmp_name", "../assets/template/$template");

                    $query = $connect->query("insert into courses (title, subject, date, description,course_type, template, price) values('$title','$subject','$date','$description','$course_type','$template','$price')");

                    if ($query) {
                        redirectTo("all_courses.php");
                    } else {
                        msg("not inserted");
                    }
                }
                ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>