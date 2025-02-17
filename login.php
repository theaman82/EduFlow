<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EduFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="src/output.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
</head>
<body class="bg-[#E4F9F5]">
    <div class="flex justify-center p-5 h-screen items-center">
        <form action="actions/loginAction.php" method="post" class="p-8 flex flex-col gap-3 rounded shadow-2xl text-white bg-[#11999E]">
            <h1 class="text-2xl font-bold ">Login</h1>
            <div class="flex flex-col gap-2">
                <label for="" class="text-lg font-semibold">Username or Email :-</label>
                <input type="email" name="email" id="" class="border text-black p-2 rounded outline-none">
            </div>
            <div class="flex flex-col gap-2">
                <label for="" class="text-lg font-semibold">Password :-</label>
                <input type="password" name="password" id="" class="border text-black p-2 rounded outline-none">
            </div>
            <div>
                <input type="submit" name="login" id="" value="Login" class="font-semibold rounded text-white bg-[#40514E] px-3 py-2 w-full">
            </div>
            <hr>
            <a href="register.php" class="font-semibold ">Don't have an account? <span class="text-black">Register Now</span></a>
            <a href="index.php" class=" bg-blue-600 text-white font-semibold w-fit px-2 rounded text-center">Go Back To Home</a>
        </form>
    </div>
</body>
</html>