<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Dashboard</title>
		    <link rel="stylesheet" href="styledesign.css?v=<?php echo time();?>"/>
			<link rel="icon" href="../images/mactea.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	</head>
	<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
			<div class="header">
				<div class="header-menu">
					<div class="title">  <img src="../images/mactea-home.png" alt="..." height="70"></div>
					<div class="title"> Admin </div>
					<div class="sidebar-btn">
						<i class="fas fa-bars"></i>
					</div>
				</div>
			</div>
			<!--header menu end-->
			<!--sidebar start-->
				<?php include ('sidebar.php') ?>
				
				<div class="main-container">
     <link rel="stylesheet"  href="desi.css?v=<?php echo time();?>"/>
 <span class="title"> ORDERS COMPLETED </span> 
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<table class="table4">
		<tr>
		<th>Order ID</th>
		<th>Place On</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile Number</th>
		<th>Address</th>
		<th>Total Products</th>
		<th>Total Price</th>
		<th>Payment Method</th>	
		</tr>
<?php
include '../includes/config.php';
	 $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE order_status = 'completed'");
         $select_orders->execute();
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
	?>
		
				<tr>
					<td><?php echo $fetch_orders["order_id"]; ?></td>
                    <td><?php echo $fetch_orders["placed_on"]; ?></td>
                    <td><?php echo $fetch_orders["name"]; ?></td>
					<td><?php echo $fetch_orders["email"]; ?></td>
                    <td><?php echo $fetch_orders['phone']; ?></td>
					<td><?php echo $fetch_orders['address']; ?></td>
					<td><?php echo $fetch_orders['products']; ?></td>
					<td><?php echo $fetch_orders['paid_amount']; ?></td>
					<td><?php echo $fetch_orders['payment_mode']; ?></td>
					
                </tr>
	
	 <?php
	}  }   else {
	
			echo "<p style='text-shadow: 2px 2px #008000;'> <font color=black font size='50' font face='courier' size='6pt'><b>EMPTY</b></font> </p>";
	  }   
        ?>
	</table>
	  
				</div>
<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>
</body>
</html>	