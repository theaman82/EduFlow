<div class="fixed w-full mb-10 flex justify-between items-center bg-gray-700 px-6 py-2">
    <a href="../index.php" class="text-[#E4F9F5] text-3xl font-bold">EduFlow</a>
    <!-- avatar work start -->
    <?php
    if (isset($_SESSION['admin'])):
    ?>
        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 bg-white p-1 h-10 rounded-full cursor-pointer" src="../assets/default_user.png" alt="User dropdown">
        <!-- Dropdown menu !-->
        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div><?= $user['first_name']; ?></div>
                <div class="font-medium truncate">name@flowbite.com</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
            </ul>
            <div class="py-1">
                <a href="../logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
            </div>
        </div>
    <?php
    else: ?>
        <a href="login.php" class="">Login</a>
    <?php endif; ?>
    <!-- avatar work end  -->


</div>