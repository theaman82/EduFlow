<?php
    include_once "config/connect.php";
    $user = getUser();
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
        <div class="grid grid-cols-4 gap-5 px-5">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                <img class="rounded-t-lg" src="assets/img1.jpg" alt="" />
                <div class="p-5">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PHP BATCH</h2>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">this batch is running from 11-12-2024, In this batch We're Cover All topics of php</p>
                    <a href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 ">
                        Details
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                <img class="rounded-t-lg" src="assets/img1.jpg" alt="" />
                <div class="p-5">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PHP BATCH</h2>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">this batch is running from 11-12-2024, In this batch We're Cover All topics of php</p>
                    <a href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 ">
                        Details
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                <img class="rounded-t-lg" src="assets/img1.jpg" alt="" />
                <div class="p-5">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PHP BATCH</h2>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">this batch is running from 11-12-2024, In this batch We're Cover All topics of php</p>
                    <a href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 ">
                        Details
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                <img class="rounded-t-lg" src="assets/img1.jpg" alt="" />
                <div class="p-5">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PHP BATCH</h2>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">this batch is running from 11-12-2024, In this batch We're Cover All topics of php</p>
                    <a href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 ">
                        Details
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>