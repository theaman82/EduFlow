<?php
include_once "config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | EduFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="src/output.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#E4F9F5]">
    <?php include_once "includes/navbar.php"; ?>
    <div class="w-full flex-col gap-10 items-center pt-28 flex justify-center">
        <h1 class="text-2xl font-semibold">Contact Us</h1>
        <form action="" method="post" class="bg-gray-200  rounded shadow-xl p-5">
            <div class="flex gap-5">
                <div class="flex flex-col gap-1">
                    <label for="" class="text-lg">Name </label>
                    <input type="text" name="name" class="p-2 rounded">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="" class="text-lg">Email </label>
                    <input type="email" name="email" class="p-2 rounded">
                </div>
            </div>
            <div class="flex flex-col gap-2 mt-5">
                <label for="">Message</label>
                <textarea name="query" id="" rows="5" class="p-2 rounded bg-white text-black"></textarea>
            </div>
            <div class="mt-5">
                <input type="submit" value="Submit Query" name="submit" class="text-lg font-semibold text-white bg-[#11999E] rounded px-3 py-2 w-full">
            </div>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message  = $_POST['message'];

            $query = $connect->query("insert into query (name, email, message) value('$name','$email','$message')");
            if($query){
                msg("Your response has been recorded");
                redirectTo("index.php");
            }else{
                msg("error sending query");
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>