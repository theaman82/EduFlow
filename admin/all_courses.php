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
                <div class="flex justify-between">
                <h1 class="text-xl font-semibold">Manage Batches (<?= $count;?>)</h1>
                <a href="insert_course.php" class="text-xl font-semibold bg-teal-700 text-white rounded px-2 py-1">Insert Batch</a>
                </div>
                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-400 p-2">Id</th>
                            <th class="border-b border-gray-400 p-2">Batch Name</th>
                            <th class="border-b border-gray-400 p-2">Course</th>
                            <th class="border-b border-gray-400 p-2">Start Date</th>
                            <th class="border-b border-gray-400 p-2">Description</th>
                            <th class="border-b border-gray-400 p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      
                     while($batch = $callingData->fetch_array()):
                        ?>
                        <tr>
                            <td class="border-b border-gray-400 text-center p-2"><?= $batch['id']; ?></td>
                            <td class="border-b border-gray-400 text-center p-2"><?= $batch['title']; ?></td>
                            <td class="border-b border-gray-400 text-center p-2"><?= $batch['subject']; ?></td>
                            <td class="border-b border-gray-400 text-center p-2"><?= $batch['date']; ?></td>
                            <td class="border-b border-gray-400 text-center p-2"><?= $batch['description']; ?></td>
                            <td class="border-b border-gray-400 text-center p-2">
                                <a href="?removeBatch=<?= $batch['id'];?>" class="bg-red-500 p-1 rounded text-sm text-white">Remove</a>
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
<?php
if(isset($_GET['removeBatch'])){
    $batch_id = $_GET['removeBatch'];

    $query = $connect->query("delete from courses where id='$batch_id'");
    if($query){
        redirectTo("all_courses.php");
    }
    else{
        msg("error deleting batch");
    }
}