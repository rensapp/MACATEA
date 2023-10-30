<?php
	require_once '../includes/functions.php';
	if (isset($_SESSION['user'])) {
	$id=$_SESSION['user']['id'];
	
	$res=mysqli_query($db,"SELECT * FROM users WHERE id='$id' ");
	while($crow=mysqli_fetch_array($res))
	{
	$delivery_type =  $crow['delivery_type'];
	}
	}
	
	
	if(ISSET($_POST['update'])){
		
	$customer_email = $_SESSION['user']['email']; 
	$res=mysqli_query($db,"SELECT * FROM users");
	
	
	
		$id = $_POST['id'];
		$cid = $_POST['customer_id'];
		$product_name = $_POST['product_name'];
		$product_image = $_POST['product_image'];
		
		$price = explode(",", $_POST['price']);
		$price_value = $price[0];
		$price_type = $price[1];
		
		$addons = explode(",", $_POST['addons']);
		$addons_value = $addons[0];
		$addons_type = $addons[1];
		
		$product_quantity = 1;
		$total_price = $price_value + $addons_value; 
		
		mysqli_query($db, "INSERT INTO `cart`(customer_email,customer_id,name, price,size,addons,sinker, image_dir, quantity,total_price) VALUES
		('$customer_email','$cid','$product_name','$price_value','$price_type','$addons_value','$addons_type', '$product_image','$product_quantity','$total_price')") or die(mysqli_error());

		header("location: NutellaOreo_series.php");
	}
	
	if(isset($_POST["Cancel"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/macatea/login_page/login.php";
	</script>
	<?php
}
	if(isset($_POST["Delivery"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/macatea/user/Delivery.php";
	</script>
	<?php
}	
?>

<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form method="POST" action="addNutellaOreo.php">
				<div class="modal-header">
					<h3 class="modal-title"><?php echo $fetch['name']?></h3>
					<input type="hidden" name="product_name" value="<?php echo $fetch['name']; ?>">
					<input type="hidden" name="customer_id" value="<?php echo $id ?>">
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="content">
							<input type="hidden" name="id" value="<?php echo $fetch['id']?>"/>
						<img src="../product/<?php echo $fetch['image_dir']; ?>" alt="" width="150px" height="150px" style="display: block; margin-left: auto; margin-right: auto;">
						    <input type="hidden" name="product_image" value="<?php echo $fetch['image_dir']; ?>">
						</div>
						<div class="form-group">
							<label style="margin-left: -50px; margin-top: 30px;">Select Variation</label> <br>
							<input style="margin-left: -30px;" type="radio" name="price" value="78, Medium" checked> ₱<?php echo $fetch['medium']?> (Medium) <br>
							<input style="margin-left: -30px;" type="radio" name="price" value="88, Large"> ₱<?php echo $fetch['large']?>(Large) <br>
							<input style="margin-left: -30px;" type="radio" name="price" value="140, 1 Liter"> ₱<?php echo $fetch['oneliter']?>(1 Liter)
						</div>
						<div class="form-group">
							<label style="margin-left: -50px;">Awesome Add Ons</label> <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="0, No Sinker" checked> No Sinker <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="15, Pearl"> Pearl +₱15 <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="15, Nata de coco"> Nata de coco +₱15 <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="15, Coffee jelly"> Coffee jelly +₱15 <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="15, Popping Boba"> Popping Boba +₱15 <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="15, Egg Pudding"> Egg Pudding +₱15 <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="15, Oreo Crushes "> Oreo Crushes +₱15 <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="30, Cream Cheese"> Cream Cheese +₱30 <br>
							<input style="margin-left: -30px;" type="radio" name="addons" value="30,  Nutella"> Nutella +₱30 <br>
						</div>
						
						<?php
						if (isset($_SESSION['user'])) {
							if ($delivery_type != 'None') {
   echo '<button name="update" class="btn" style="width: 250px; margin-left: -50px; margin-bottom: 20px;"><span></span> ADD</button>';
  } else {
	 echo '<button name="Delivery" class="btn" style="width: 250px; margin-left: -50px; margin-bottom: 20px;"><span></span> ADD</button>'; 
  }
} else{
     echo '<button name="Cancel" class="btn" style="width: 250px; margin-left: -50px; margin-bottom: 20px;"><span></span> ADD</button>';
  }
						?>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer" >
					<button class="btn-close" style="margin-left: 10px; width: 250px;" type="button" data-dismiss="modal"><span></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
