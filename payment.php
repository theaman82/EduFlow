<?php
include_once "config/connect.php";
redirectIfNotAuth();
if (!isset($_GET['b_id'])) {
    redirectTo("index.php");
}
$b_id = $_GET['b_id'];
$query = $connect->query("select * from courses left join coupons on courses.id=coupons.coupon_id where id='$b_id'");

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
        <table class="w-fit bg-white shadow-md rounded-lg overflow-hidden">
                <tr>
                    <th class="px-5 py-2 border text-left">Total Amount</th>
                    <td class="px-5 py-2 border"> ₹<?= $batch['price']; ?>-/</td>
                </tr> 
                <?php
                if ($batch['coupon_id'] != NULL): ?>
                    <tr class="bg-yellow-200">
                        <th class="px-5 py-2 border text-left flex flex-col ">Coupon Discount
                            <span class="text-xs ml-5 text-teal-700">YOUR CODE:<?= $batch['coupon_code'];?>
                            <a href="cart.php?remove_coupon=1" class="text-red-500 underline text-lg">X</a>
                        </span>
                           
                        </th>
                        <td class="px-5 py-2 border"><?= $batch['coupon_amount'];?></td>
                    </tr>
                <?php endif; ?>
               
            </table>
        

        <?php if ($batch['coupon_id'] == null): ?>
            <div class="bg-slate-300 mt-4 border flex flex-col gap-2">
                <h2 class="text-xl font-semibold text-center">Apply Coupon</h2>
                <div class="p-3">
                    <form action="" method="post">
                        <div class="flex gap-3 justify-center">
                            <input type="text" name="coupon_code" placeholder="Enter Coupon code"
                                class="flex-1 border px-3 py-2 rounded">
                            <a href="payment.php?add_to_myCourse=<?= $batch['id'];?>&c_id=<?=$batch['id']?>" type="submit" name="applycoupon"
                                class="bg-green-700 text-white p-2 rounded">Apply</a>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif;?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
<?php
// coupon apply
if (isset($_POST['apply_coupon'])) {
    $code = $_POST['coupon_code'];

    // checking coupon  code
    $checkcode = mysqli_query($connect, "select * from coupons where coupon_code='$code'and coupon_status = 1");
    $couponData = mysqli_fetch_array($checkcode);
    $couponCount = mysqli_num_rows($checkcode);

    if ($couponCount > 0) {
        //order table update
        $coupon_id = $couponData["coupon_id"];
        redirectTo('payment.php');
    } else {
        msg('invalid  coupon code');
    }

}

// add to my course
if(isset($_GET['add_to_myCourse'])){
    $course_id = $_GET['add_to_myCourse'];

    $check_enrollCourse = $connect->query("select * from enroll_course where status='0'");
    $count_enrollCourse = $check_enrollCourse->num_rows;
    if($count_enrollCourse){
        $existCourse = $check_enrollCourse->fetch_array();
        
        $enroll_courseIid = $existCourse['course_id'];
        $check_course = $connect->query("select * from my_course where user_id='$enroll_courseIid' and course_id='$course_id'");
        $count_enrolledCourse = $check_course->num_rows;
        if($count_enrolledCourse){
            msg("course Already enrolled");
        }
        else{
            $create_enrollCourse = $connect->query("insert into my_course (user_id, course_id)
            value ('$enroll_courseIid', '$course_id')");
        }
    }else{
        $create_course =$connect->query("insert into enroll_course (status) value('0')");
        $enroll_courseIid = mysqli_insert_id($connect);
        $check_course = $connect->query("select * from my_course where user_id='$enroll_courseIid' and course_id='$course_id'");
        $count_enrolledCourse = $check_course->num_rows;
        if($count_enrolledCourse){
            msg("course Already enrolled");
        }
        else{
            $create_enrollCourse = $connect->query("insert into my_course (user_id, course_id)
            value='$enroll_courseid', '$course_id'");
        }
    }
    redirectTo("my_courses.php");
}