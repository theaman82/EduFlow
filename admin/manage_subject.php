<?php
include_once "../config/connect.php";
include_once "includes/redirectIfNotAuth.php";
$callingData = $connect->query("select * from subjects");
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
            <div class="flex gap-5">
                <div class="w-4/6">
                    <h1 class="text-xl font-semibold">Manage Subjects (<?= $count;?>)</h1>
                    <table class="w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border p-2">Id</th>
                                <th class="border p-2">Subject Title</th>
                                <th class="border p-2">Description</th>
                                <th class="border p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             while($subject = $callingData->fetch_array()):
                            ?>
                            <tr>
                                <td class="border p-2"><?= $subject['subject_id'];?></td>
                                <td class="border p-2"><?= $subject['title'];?></td>
                                <td class="border p-2"><?= $subject['description'];?></td>
                                <td class="border p-2">
                                    <a href="" class="bg-red-500 p-1 rounded text-sm text-white">Remove</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="w-2/6">
                    <h1 class="text-xl font-semibold">Insert Subject</h1>
                    <form action="" class="flex flex-col px-5 py-3 bg-amber-200 mt-4 gap-4" method="post">
                        <div class="flex flex-col gap-1">
                            <label for="" class="text-lg">Subject Title</label>
                            <input type="text" name="title" id="" class="border p-2 rounded">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="text-lg">Description</label>
                            <textarea name="description" rows="5" id="" class="rounded bg-white text-black"></textarea>
                        </div>
                        <div>
                            <input type="submit" value="Insert Subject" name="insert" class="bg-teal-500 px-3 py-2 rounded font-semibold w-full text-white">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['insert'])){
                            $title = $_POST['title'];
                            $description = $_POST['description'];

                            $query = $connect->query("insert into subjects (title, description)
                            values('$title','$description')");

                            if($query){
                                msg("inserted successfully");
                                redirectTo("manage_subject.php");
                            }
                            else{
                                msg("something went wrong");
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>