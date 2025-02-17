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
</head>

<body class="bg-[#E4F9F5]">
    <?php include_once "includes/navbar.php"; ?>
    <!-- hero section  -->
    <div class="flex pt-[8rem] px-10">
        <div class="w-6/12 flex flex-col justify-center gap-7">
            <h1 class="text-5xl text-[#40514E] font-bold capitalize tracking-wide">We've Empowered Thousands of Developers</h1>
            <p class="capitalize text-lg font-semibold text-black">Join our institute and take your skills to the next level !</p>
            <a href="" class="text-white font-semibold px-3 py-2 rounded bg-[#40514E] hover:bg-[#2E3D3A] w-fit">Register Now</a>
        </div>
        <div class="w-6/12">
            <img src="assets/tempelate.jpg" alt="" class="max-w-full object-cover shadow-2xl rounded-lg">
        </div>
    </div>

    <!-- all batches  -->
    <div class="flex flex-col gap-2 justify-center mt-14">
        <h1 class="text-white font-semibold text-xl tracking-wide px-3 py-2 rounded bg-[#40514E] text-center w-full">Our Batches</h1>
        <!-- To switch offline to online batches  -->

        <div class="mb-4 dark:border-gray-700 justify-center items-center flex">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 font-bold text-lg border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Offline Batches</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 font-bold text-lg border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Online Batches</button>
                </li>
            </ul>
        </div>

        <!-- course card  -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 px-5 w-full">
            <?php
            $callingCat = $connect->query("SELECT * FROM courses");
            while ($course = $callingCat->fetch_array()):
            ?>

                <div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                    <img class="rounded-t-lg w-full h-40 object-cover" src="assets/template/<?= $course['template']; ?>" alt="Course Image" />
                    <div class="p-5">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?= $course['title']; ?></h2>
                        <p class="mb-3 font-normal text-gray-700"><?= $course['description']; ?></p>
                        <p class="mb-3 font-normal text-red-500"><?= $course['course_type']; ?></p>
                        <p class="mb-3 font-normal text-gray-700">Running From - <?= $course['date']; ?></p>
                        <a href="view.php?c_id=<?= $course['id']; ?>" class=" inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                            Details
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>

    </div>
    <div class="flex flex-col justify-center mt-14 gap-5">
        <h1 class="text-white font-semibold text-xl tracking-wide px-3 py-2 rounded bg-[#40514E] text-center w-full">Visit Our Offline Center</h1>
        <p class="text-center text-xl font-semibold">📍 Thana Chowk, Purnea, Bihar(854301)</p>
        <div class="container px-5 pt-5 mx-auto flex flex-col justify-center">
            <h1 class="sm:text-3xl text-2xl text-center font-medium title-font text-gray-900 lg:w-full lg:mb-10 mb-10">Experience Our Offline Batch</h1>
            <div class="flex flex-wrap md:-m-2 -m-1">
                <div class="flex flex-wrap w-1/2">
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover rounded-lg shadow-xl h-full object-center block" src="assets/img1.jpg">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover rounded-lg shadow-xl h-full object-center block" src="assets/img2.avif">
                    </div>
                    <div class="md:p-2 p-1 w-full">
                        <img alt="gallery" class="w-full h-full object-cover rounded-lg shadow-xl object-center block" src="assets/img3.jpg">
                    </div>
                </div>
                <div class="flex flex-wrap w-1/2">
                    <div class="md:p-2 p-1 w-full">
                        <img alt="gallery" class="w-full h-full object-cover rounded-lg shadow-xl object-center block" src="assets/img4.jpg">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover rounded-lg shadow-xl h-full object-center block" src="assets/img5.avif">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover rounded-lg shadow-xl h-full object-center block" src="assets/img6.avif">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer bg-gray-900 flex items-center justify-between gap-5 px-[5%] py-5 mt-10">
        <div class="flex items-center gap-5">
            <a href="index.php" class="text-[#E4F9F5] text-3xl font-bold">EduFlow <span class="text-gray-300 ml-2 font-thin">|</span></a>
            <p class="text-gray-300">© 2025 EduFlow —@comestro</p>
        </div>
        <div class="flex text-white gap-3">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
            </svg>

            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>

            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>