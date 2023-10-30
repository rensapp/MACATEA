<?php include ('../user/userHeader.php');
	if (isset($_SESSION['user'])) {
	$id=$_SESSION['user']['id'];
	} 

		$cat8 = true;
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
	<title>MacCoffee Seiries</title>
</head>
<style>
.ft-color{
	color:#007b00;
}
.black{
	color:black;
}
.product_con{
	border: 2px solid white;
	background-color: #f0f2f5;
}


</style>
<body>

	<?php include ('../user/categories.php'); ?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center text-dark fw-semibold"> MacCoffee Series </h1>
			</div>
		</div>
		<div class="row">
			
			<?php
				require '../includes/conn.php';
				$select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE  category=8");
				if(mysqli_num_rows($select_products) > 0){
				while($fetch = mysqli_fetch_assoc($select_products)){
      		?>
			<div class="col-lg-2 col-md-4 col-sm-6 product_con mt-3 p-4 text-center rounded">
             <img src="../product/<?php echo $fetch['image_dir']; ?>" class="rounded" width="165px">
            <h4 class="ft-color mt-2"><?php echo $fetch['name']; ?></h4>
			<h6 class="text-dark text-center">Starts at</h6>
            <h4 class="mt-2 black">₱<?php echo $fetch['price']; ?></h4>
			
			<input type="hidden" name="customer_id" value="<?php echo $id ?>">
			
			<button 
				class="btn btn-success btn-block mt-3"
				style="width: 100%;"
				data-bs-toggle="modal"
				type="button"
				data-bs-target="#update_modal<?php echo $fetch['id']?>">
				Add to cart
			</button>
		</div>

      		<?php
        		include '../user/modal_product.php'; }
				} else {
			
					echo "<p align='center'> <font color=black font size='50' font face='courier' size='6pt'><b>NO PRODUCT AVAILABLE</b></font> </p>";
				}
			?>
		
		</div>
	</div>


<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous">
</script>  
<script src="../js/jquery-3.2.1.min.js"></script>	
</body>
</html>