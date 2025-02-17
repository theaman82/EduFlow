<?php
if(isset($_SESSION['user'])){
    $user = getUser();
}
?>
<div class="fixed w-full mb-10 flex justify-between items-center bg-[#11999E] px-[5%] py-2">
    <a href="index.php" class="text-[#E4F9F5] text-3xl font-bold">EduFlow</a>

    <div class="flex items-center gap-5">
        <a href="index.php" class="text-lg font-semibold text-white">Home</a>

        <!-- student dropdown start -->
        <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500" data-dropdown-trigger="hover" class="text-white text-lg focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Student<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownDelay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                <li>
                    <a href="user_dashboard.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Help</a>
                </li>
            </ul>
        </div>
        <!-- student dropdown end  -->
        <a href="contact.php" class="text-lg font-semibold text-white">Contact</a>
    </div>

    <!-- avatar work start -->
    <?php
    if (isset($_SESSION['user'])):
    ?>
        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 bg-white p-1 h-10 rounded-full cursor-pointer" src="assets/default_user.png" alt="User dropdown">
        <!-- Dropdown menu !-->
        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div><?= $user['first_name']; ?></div>
                <div class="font-medium truncate"><?= $user['email']; ?></div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                <li>
                    <a href="user_dashboard.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                
            </ul>
            <div class="py-1">
                <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
            </div>
        </div>
    <?php else: ?>
        <a href="login.php" class="">Login</a>
    <?php endif; ?>
    <!-- avatar work end  -->


</div>