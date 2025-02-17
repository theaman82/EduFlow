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
    <title>EduFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="src/output.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#E4F9F5]">
    <?php include_once "includes/navbar.php"; ?>
    <div class="pt-20 px-[5%]">
        <h1 class="text-center text-2xl underline font-semibold">Addmission Form</h1>
        <form action="" class="border mt-5 p-5 rounded" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-5">
                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">Full Name</label>
                    <input type="text" name="full_name" class="p-1 rounded" placeholder="eg. raj kumar">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">Father's Name</label>
                    <input type="text" name="father_name" class="p-1 rounded">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">DOB</label>
                    <input type="date" name="dob" class="p-1 rounded" placeholder="eg. raj">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">Email</label>
                    <input type="email" name="email" class="p-1 rounded" placeholder="eg. raj@gmail.com">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">Photo</label>
                    <input type="file" name="photo" class=" rounded border bg-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">Gender</label>
                    <select name="gender" id="" class="rounded bg-white">
                        <option value="" selected disabled>select Gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                        <option value="other">other</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">Education</label>
                    <input type="text" name="education" class="p-1 rounded">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-lg">Address</label>
                    <input type="text" name="address" class="p-1 rounded">
                </div>
            </div>
            <div class="flex items-center gap-5">

                <div class="flex flex-col w-3/6 gap-2">
                    <label for="" class="text-lg">Contact</label>
                    <input type="text" name="contact" class="p-1 rounded">
                </div>
                <div class="w-3/6">
                    <input type="submit" name="submit" value="Submit Form" class="bg-teal-700 px-3 py-2 mt-6 rounded font-semibold text-white w-full">
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $full_name = $_POST['full_name'];
            $father_name = $_POST['father_name'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $education = $_POST['education'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $photo = $_FILES['photo']['name'];
            $tmp_name = $_FILES['photo']['tmp_name'];

            move_uploaded_file("$tmp_name","assets/students_photo/$photo");

            $query = $connect->query("insert into addmission (full_name, father_name, dob, email, photo, gender, education, address, contact) value('$full_name','$father_name','$dob','$email','$photo','$gender','$education','$address','$contact')");

            if($query){
                msg("Addmission Successfully");
                redirectTo("index.php");
            }
            else{
                msg("Addmission Not Successful");
            }

        }
        ?>
    </div>
</body>

</html>