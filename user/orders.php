<?php include '../user/userHeader.php'; ?>
<?php include '../includes/config.php'; ?>
<?php
	$id=$_SESSION['user']['id'];

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location:../login_page/login.php');
}

if (!isLoggedIn()) {
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
		header('location:../login_page/login.php');
	}
}

?> 

<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
		   <title>My Orders</title>
	</head>
<body>
<section class="placed-orders">

<h1 class="title text-center p-3">Placed Orders</h1>

<div class="container-fluid p-5 pt-0" style="display: flex;">
	<div class="row gy-3">
<?php
   $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE customer_id = $id");
   $select_orders->execute();
   if($select_orders->rowCount() > 0){
	  while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){ 
?>
		<div class="box col-lg-3 col-md-4 col-sm-6 border rounded border-black p-2">
			<!-- style="border: 1px solid black; background: white; width: 30%; border-radius: 25px; margin: 10px;" -->
			<div class="">	
				<p class="border-bottom border-dark text-center"> Placed on : <span class="text-danger fw-bold"><?= $fetch_orders['placed_on']; ?></span> </p>
				<p> Name : <span><?= $fetch_orders['name']; ?></span> </p>
				<p> Order Type : <span><?= $fetch_orders['order_type']; ?></span> </p>
				<p> Payment Method : <span><?= $fetch_orders['payment_mode']; ?></span> </p>
				<p> Your Orders : <span><?= $fetch_orders['products']; ?></span> </p>
				<p> Total Price : <span>₱<?= $fetch_orders['paid_amount']; ?></span> </p>

				<?php
				if(!empty($fetch_orders['payment_id'])){
					if($fetch_orders['payment_status'] == "Pending" || empty($fetch_orders['payment_status'])){
					include ('../payment/retrievePaymentLink.php');
					}
				} ?>

				<?php
				if($fetch_orders['payment_mode'] == "online"){ ?>
				<p> Payment Status : <span class="fw-bold" style="color:
				<?php 
					if($fetch_orders['payment_status'] == 'Pending'){ 
						echo 'orange'; 
					}
					else{
						echo 'green'; 
					};?>"><?= $fetch_orders['payment_status']; ?></span> </p>
				<?php } ?>

				<p> Order Status : <span class="fw-bold" style="color:
				<?php 
				if($fetch_orders['order_status'] == 'Pending'){ 
					echo 'orange'; 
				}
				else{
					echo 'green'; 
				};?>"><?= $fetch_orders['order_status']; ?></span> </p>
				

				<?php
				if($fetch_orders['payment_status'] == "Pending"){ ?>
					<div class="text-center">
    					<a href="<?php echo $fetch_orders['payment_url']?>" target="_blank" class="btn btn-primary btn-block m-0">Pay Online</a>
					</div>
				<?php } ?>
				
			</div>
		</div>
<?php
   }
}else{
   echo '<p class="empty">no orders placed yet!</p>';
}
?>
	</div>
</div>

</section>

<script src="js/jquery-3.2.1.min.js"></script>	
</body>	
</html>