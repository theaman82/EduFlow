<?php
include_once "../config/connect.php";
include_once "includes/redirectIfNotAuth.php";
$callingData = $connect->query("select * from users");
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
        <div class="w-5/6 bg-[#E4F9F5] pt-24 px-10 ">
            <div class="flex gap-5">
                <div class="w-5/6">
                    <h1 class="text-xl font-semibold">Manage Students (<?= $count;?>)</h1>
                    <table class="w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-400 p-2">User Id</th>
                                <th class="border-b border-gray-400 p-2">Name</th>
                                <th class="border-b border-gray-400 p-2">Email</th>
                                <th class="border-b border-gray-400 p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             while($users = $callingData->fetch_array()):
                            ?>
                            <tr>
                                <td class="border-b border-gray-400 p-2 text-center"><?= $users['user_id'];?></td>
                                <td class="border-b border-gray-400 p-2 text-center"><?= $users['first_name'];?></td>
                                <td class="border-b border-gray-400 p-2 text-center"><?= $users['email'];?></td>
                                <td class="border-b border-gray-400 p-2 text-center">
                                    <a href="?removeUser=<?= $users['user_id'];?>" class="bg-red-500 p-1 rounded text-sm text-white">Remove</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>

<?php
if(isset($_GET['removeUser'])){
    $user_id =  $_GET['removeUser'];

    $query = $connect->query("delete from users where user_id='$user_id'");

    if($query){
        redirectTo("manage_students.php");
    }
    else{
        msg("error deleting User");
    }
}