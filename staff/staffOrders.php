<?php
@include '../includes/config.php';
include('../includes/functions.php');;

	$staff_id = $_SESSION['staff_id'];

if(!isset($staff_id)){
     $_SESSION['msg'] = "You must log in first";
    header('location: ../login_page/login.php');
}

$select_id= $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_id->execute([$staff_id]);
$fetch_id = $select_id->fetch(PDO::FETCH_ASSOC);
$staff_brNum = $fetch_id['branch_num'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="icon" href="../images/mactea.png">
</head>

<body>
    <?php include 'staffHeader.php'; ?>
	
    <div class="container-fluid w-75 border border-dark rounded p-lg-5 p-md-2" style="margin-top: 150px;">
        <h1 class="title p-3 text-center fw-bold">Orders</h1>

        <div class="row box-container justify-content-lg-start justify-content-md-center d-flex">
            <div class="col-lg-3 col-md-5 text-center box border m-0 p-5 border-success rounded">
                <?php
                    $total_pendings = 0;
                    $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE order_status = ? AND order_branch = ?");
                    $select_pendings->execute(['pending',$staff_brNum]);
                    while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                        $total_pendings += $fetch_pendings['paid_amount'];
                    };
                    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE order_status = 'Pending' AND order_branch = $staff_brNum");
                    $select_orders->execute();
                    $number_of_orders = $select_orders->rowCount();
                ?>
                <h1 class="text-center"><?= $number_of_orders; ?></h1>
                <p>Pending orders</p>
                <a href="staffOrderPending.php" class="btn btn-warning">See orders</a>
            </div>
            <div class="col-lg-3 col-md-5 text-center box border m-0 p-5 border-success rounded">
                <?php
                    $total_pendings = 0;
                    $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE order_status = ? AND order_branch = ?");
                    $select_pendings->execute(['preparing',$staff_brNum]);
                    while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                        $total_pendings += $fetch_pendings['paid_amount'];
                    };
                    $select_orders = $conn->prepare("SELECT * FROM `orders` where order_status = 'Preparing' AND order_branch = $staff_brNum");
                    $select_orders->execute();
                    $number_of_orders = $select_orders->rowCount();
                ?>
                <h1 class="text-center"><?= $number_of_orders; ?></h1>
                <p>Orders to be prepared</p>
                <a href="staffOrderPrepare.php" class="btn btn-primary">See orders</a>
            </div>
            <div class="col-lg-3 col-md-5 text-center box border m-0 p-5 border-success rounded ">
                <?php
                    $total_pendings = 0;
                    $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE order_status = ? AND order_branch = ?");
                    $select_pendings->execute(['ship-pickup',$staff_brNum]);
                    while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                        $total_pendings += $fetch_pendings['paid_amount'];
                    };
                    $select_orders = $conn->prepare("SELECT * FROM `orders` where order_status = 'Deliver-pickup' AND order_branch = $staff_brNum");
                    $select_orders->execute();
                    $number_of_orders = $select_orders->rowCount();
                ?>
                <h1 class="text-center"><?= $number_of_orders; ?></h1>
                <p>To deliver or pick-up orders</p>
                <a href="staffOrderShipPickup.php" class="btn btn-primary">See orders</a>
            </div>
            <div class="col-lg-3 col-md-5 text-center box border m-0 p-lg-5 p-5 border-success rounded">
                <?php
                    $total_pendings = 0;
                    $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE order_status = ? AND order_branch = ?");
                    $select_pendings->execute(['completed',$staff_brNum]);
                    while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                        $total_pendings += $fetch_pendings['paid_amount'];
                    };
                    $select_orders = $conn->prepare("SELECT * FROM `orders` where order_status = 'completed' AND order_branch = $staff_brNum");
                    $select_orders->execute();
                    $number_of_orders = $select_orders->rowCount();
                ?>
                <h1 class="text-center"><?= $number_of_orders; ?></h1>
                <p>Completed orders</p>
                <a href="staffOrderComplete.php" class="btn btn-success">See orders</a>
            </div>
        </div>
    </div>
</body>
</html>