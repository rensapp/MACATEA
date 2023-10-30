<?php
include 'userHeader.php';
include '../includes/config.php';

$id = $_SESSION['user']['id'];

if (!isLoggedIn()) {
  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
    header('location:../login_page/login.php');
  }
}
    // check if the user already has a stamp coupon for rewards.
    $checkCoupon = $conn->prepare("SELECT * FROM rewards WHERE customer_id = $id");
    $checkCoupon->execute();
    $checkUserCoupon = $checkCoupon->rowCount();

    // if user doesn't has a coupon it will create one.
    $points = 0;
    $code = uniqid();
    if($checkUserCoupon == 0){
        $insert_coupon = $conn->prepare("INSERT INTO rewards(customer_id,code,points) VALUES(:ct_id,:code,:points)");

        $insert_coupon->bindParam(":ct_id", $id);
        $insert_coupon->bindParam(":code", $code);
        $insert_coupon->bindParam(":points", $points);
        $insert_coupon->execute();
    }

//fetch the datas of the user using id    
$select_user_coupon = $conn->prepare("SELECT * FROM rewards WHERE customer_id = $id ");
    $select_user_coupon->execute();
    while($fetch_coupon = $select_user_coupon->fetch(PDO::FETCH_ASSOC)){
        $userPoints = $fetch_coupon['points'];
        $userCode = $fetch_coupon['code'];
        };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Rewards</title>
    <link rel="icon" href="../images/mactea.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<style>
    .round{
        border-radius: 50% !important;
        /* height: 75px; */
        height: 100px;
        width: 100px;
        transform: scale(0.9);
    }
    @media (max-width: 768px){
        .round{
        height: 50px;
        width: 50px;
        transform: scale(1);
        }
        .sca{
           transform: scale(0.5); 
            margin: 0 0 0 -10px !important;

        }
    }
</style>
<body>

    <div class="container p-4 border border-dark mt-5">
        <div class="row">
            <div class="col text-center">
               <h1>Rewards</h1>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <h4>Buy any 10 products from MACTEA, and Get 1 Free drink</h4>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-9">
                <h4>Current Points: (<span
                    <?php if($userPoints > 0) { ?>
                        class="text-success"
                    <?php }else{ ?>
                        class="text-danger"
                    <?php } ?>><?= $userPoints ?></span>)
                </h4>
            </div>
            <?php if($userPoints >= 10){ ?>
                <div class="col"><h4>Status: <span class="text-success">Ready to Claim</span></h4></div>
            <?php }else { ?>
                <div class="col"><h4>Status: <span class="text-danger">Not Yet Claimable</span></h4></div>
            <?php } ?> 
        </div>

        <div class="container mt-3 p-lg-4 p-md-2 p-sm-0 w-75 border border-dark rounded">

            <div class="row">
                <!-- <div class="col-1 d-flex"></div> -->
                <div class="col d-none d-lg-block"></div>
                <!-- 1 -->
                <?php if($userPoints >= 1) {?>
                    <div class="col-lg-5 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-0 mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-lg-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 2 -->
                <?php if($userPoints >= 2) {?>
                    <div class="col-lg-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-lg-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 3 -->
                <?php if($userPoints >= 3) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 4 -->
                <?php if($userPoints >= 4) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 5 -->
                <?php if($userPoints >= 5) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <div class="col d-none d-lg-block"></div>            
            </div>

            <div class="row">
                <div class="col d-none d-lg-block"></div>
                <!-- 6 -->
                <?php if($userPoints >= 6) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 7 -->
                <?php if($userPoints >= 7) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 8 -->
                <?php if($userPoints >= 8) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 9 -->
                <?php if($userPoints >= 9) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <!-- 10 -->
                <?php if($userPoints >= 10) {?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"><i class='fa-3x fa-solid fa-mug-hot mt-4 ms-2 sca' style="color: white;"></i></div>
                <?php } else{ ?>
                    <div class="col-1 text-center bg-dark border border-dark round m-4"></div>
                <?php } ?>
                <div class="col d-none d-lg-block"></div>        
            </div>

        </div>

        <div class="row">
            <div class="col text-center mt-4">
                <p>My code : <?= $userCode ?></p>
            </div>
        </div>
    </div>
</body>
</html>