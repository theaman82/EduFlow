<?php
include_once "../config/connect.php";
include_once "includes/redirectIfNotAuth.php";
$callingData = $connect->query("select * from coupons");
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
            <div class="flex gap-5">
                <div class="w-4/6">
                    <h1 class="text-xl font-semibold">Manage Coupons (<?= $count;?>)</h1>
                    <table class="w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-400 p-2">Coupon Id</th>
                                <th class="border-b border-gray-400 p-2">Coupon code</th>
                                <th class="border-b border-gray-400 p-2">Coupon Amount</th>
                                <th class="border-b border-gray-400 p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             while($coupon = $callingData->fetch_array()):
                            ?>
                            <tr>
                                <td class="border-b border-gray-400 text-center p-2"><?= $coupon['coupon_id'];?></td>
                                <td class="border-b border-gray-400 text-center p-2"><?= $coupon['coupon_code'];?></td>
                                <td class="border-b border-gray-400 text-center p-2"><?= $coupon['coupon_amount'];?></td>
                                <td class="border-b border-gray-400 text-center p-2">
                                    <a href="?removecoupon=<?= $coupon['coupon_id'];?>" class="bg-red-500 p-1 rounded text-sm text-white">Remove</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="w-2/6">
                    <h1 class="text-xl font-semibold">Insert Coupon</h1>
                    <form action="" class="flex flex-col px-5 py-3 bg-gray-200 mt-4 gap-4" method="post">
                        <div class="flex flex-col gap-1">
                            <label for="" class="text-lg">Coupon Code</label>
                            <input type="text" name="coupon_code" id="" class="border p-2 rounded">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="text-lg">Coupon Amount</label>
                            <input type="text" name="coupon_amount" class="rounded bg-white text-black"></input>
                        </div>
                        <div>
                            <input type="submit" value="Insert Coupon" name="insert_coupon" class="bg-teal-500 px-3 py-2 rounded font-semibold w-full text-white">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['insert_coupon'])){
                           $coupon_code = $_POST['coupon_code'];
                           $coupon_amount =  $_POST['coupon_amount'];

                            $query = $connect->query("insert into coupons (coupon_code, coupon_amount)
                            values('$coupon_code','$coupon_amount')");

                            if($query){
                                msg("inserted successfully");
                                redirectTo("coupons.php");
                            }
                            else{
                                msg("Not Applied");
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
<?php
