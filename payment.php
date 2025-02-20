<?php
include_once "config/connect.php";
if (!isset($_GET['b_id'])) {
    redirectTo("index.php");
}
$b_id = $_GET['b_id'];
$query = $connect->query("select * from courses where id='$b_id'");

if ($query->num_rows == 0) {
    redirectTo("index.php");
}
$batch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments | EduFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="src/output.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#E4F9F5]">
    <?php include_once "includes/navbar.php"; ?>
    <div class="w-full flex-col gap-10 items-center pt-28 flex justify-center">
        <h1 class="text-2xl font-semibold">Make Payments</h1>

        Course Price :- <?= $batch['price']; ?>
        <?php 
        $callingCoupon = $connect->query("select * from coupons");
        $coupon = $callingCoupon->fetch_array();
        if ($coupon['coupon_id'] == null): ?>
            <div class="bg-slate-300 mt-4 border flex flex-col gap-2">
                <h2 class="text-xl font-semibold text-center">Apply Coupon</h2>
                <div class="p-3">
                    <form action="" method="post">
                        <div class="flex gap-3 justify-center">
                            <input type="text" name="coupon_code" placeholder="Enter Coupon code"
                                class="flex-1 border px-3 py-2 rounded">
                            <button type="submit" name="apply_coupon"
                                class="bg-green-700 text-white p-2 rounded">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <h1>hello</h1>
            <?php endif;?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>