
<?php include '../includes/functions.php'; ?>
<link rel="icon" type="image/x-icon" href="../images/mactea.png">   
<?php
	if (isset($_SESSION['user'])) {
	    $id=$_SESSION['user']['id'];
        require_once "../includes/config.php";
        $select_stmt=$conn->prepare("SELECT * FROM `cart`, `users` WHERE customer_email = email AND customer_id = $id ");
        $select_stmt->execute();
        $grand_total = 0;
        while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)){
?>
        <tr>
            <?php $grand_total +=$row["total_price"];?> 
        </tr>   
<?php 
	  }
    }
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<style>
    /* mactea-color */
    .mtcolor{
        color:#60a333;
    }
    .blk{
        background-color:#000000;
    }
</style>
<body>
    <div class="container-fluid px-5 blk">
    <nav class="navbar navbar-expand-sm navbar-dark py-3 px-4">
        <a
            href="../user/userHomepage.php" 
            class="navbar-brand mb-0 fs-5 logo py-auto fw-bold mtcolor"
            style="display: flex; align-items: center; color: #60a333;"
            data-aos="fade-right" data-aos-delay="100">
                <img 
                class="d-inline-block align-top me-2"
                data-aos="fade-right" data-aos-delay="50"
                src="../images/mactea.png"
                height="60" width="60" />
                MACTEA
        </a>
        <button 
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            class="navbar-toggler"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div 
            class="collapse navbar-collapse " 
            id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="50">
                    <a href="../user/MyAccount.php" class="nav-link mtcolor fw-bold" style="color: #60a333;">My Account</a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="100">
                    <a href="../user/orders.php" class="nav-link mtcolor fw-bold">
                        <i class='fa-solid fa-box' style="color: white;"></i>
                        <span style="color: #60a333;">Orders</span>
                    </a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="100">
                    <a href="../user/cart.php" class="nav-link mtcolor fw-bold">
                        <i class="fas fa-cart-plus" style="color: white;"></i>
                        <span style="color: #60a333;">₱<?= number_format($grand_total,2) ?></span>
                    </a>
                </li>
                <li class="nav-item active h5 "data-aos="fade-down" data-aos-delay="100">
                    <a href="userRewards.php" class="nav-link mtcolor fw-bold" style="color: #60a333;">My Rewards</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
</body>
</html>