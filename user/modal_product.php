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
	
	
	if(ISSET($_POST['update_cart'])){
		
	$customer_email = $_SESSION['user']['email']; 
	$res=mysqli_query($db,"SELECT * FROM users");
	
	
	
		$id = $_POST['id'];
		$cid = $_POST['customer_id'];
		$product_name = $_POST['product_name'];
		$product_image = $_POST['product_image'];
		
		if($delivery_type == "None"){
		$delivery_type_update = $_POST['delivery_type_update'];
		}

		$price = explode(",", $_POST['price']);
		$price_value = $price[0];
		$price_type = $price[1];
		
		$addons = explode(",", $_POST['addons']);
		$addons_value = $addons[0];
		$addons_type = $addons[1];
		
		$product_quantity = 1;
		$total_price = $price_value + $addons_value; 
		
		mysqli_query($db, "INSERT INTO `cart`(customer_email,customer_id,name, price,size,addons,sinker, image_dir, quantity,total_price) VALUES
		('$customer_email','$cid','$product_name','$price_value','$price_type','$addons_value','$addons_type', '$product_image','$product_quantity','$total_price')");

		if($delivery_type == "None"){
		$query = "UPDATE `users` SET delivery_type = ? WHERE id = ?";
		$stmt = mysqli_prepare($db, $query);
		mysqli_stmt_bind_param($stmt, "si", $delivery_type_update, $cid);
		mysqli_stmt_execute($stmt);
		}
		header("location: NutellaOreo_series.php");
		?>
		<!-- <script>
			 window.history.go(-1);
		</script> -->
		<?php
	}
	
	if(isset($_POST["Cancel"]))
{
	?>
	<script type="text/javascript">
	window.location = "../login_page/login.php";
	</script>
	<?php
}
	if(isset($_POST["Delivery"]))
{
	?>
	<script type="text/javascript">
	window.location = "../user/Delivery.php";
	</script>
	<?php
}	
?>

<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form method="POST" action="modal_product.php">
				<div class="modal-header">
					<h3 class="modal-title"><?php echo $fetch['name']?></h3>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<input type="hidden" name="product_name" value="<?php echo $fetch['name']; ?>">
					<input type="hidden" name="customer_id" value="<?php echo $id ?>">
				</div>
				<div class="modal-body ms-2">
					
					<div class="col-12">
						<div class="content">
							<input type="hidden" name="id" value="<?php echo $fetch['id']?>"/>
						<img src="../product/<?php echo $fetch['image_dir']; ?>" class="rounded" width="150px" height="150px" style="display: block; margin-left: auto; margin-right: auto;">
						    <input type="hidden" name="product_image" value="<?php echo $fetch['image_dir']; ?>">
						</div>
						<div class="form-group">
							<label style="margin-top: 30px;">Select Variation</label> <br>
							<?php
								//sees the sizes what what their price is
                                    $sizes = array("16oz", "22oz", "medium", "large", "oneliter");
                                    for ($i = 0; $i < count($sizes); $i++) {
                                        if ($fetch["$sizes[$i]"] > 0) {
                                    ?>
                                        <input type="radio" name="price" value="<?=$fetch["$sizes[$i]"]?>,<?=$sizes[$i]?>" checked> ₱<?php echo $fetch[$sizes[$i]]." ( ".$sizes[$i]." )"?> <br>
                                    <?php
                                        } else {
                                            //no display
                                        }
                                    }
                                ?>
						</div>
						<br>
						<div class="form-group">
							<label>Awesome Add Ons</label> <br>
							<input type="radio" name="addons" value="0, No Sinker" checked> No Sinker <br>
							<input type="radio" name="addons" value="15, Pearl"> Pearl +₱15 <br>
							<input type="radio" name="addons" value="15, Nata de coco"> Nata de coco +₱15 <br>
							<input type="radio" name="addons" value="15, Coffee jelly"> Coffee jelly +₱15 <br>
							<input type="radio" name="addons" value="15, Popping Boba"> Popping Boba +₱15 <br>
							<input type="radio" name="addons" value="15, Egg Pudding"> Egg Pudding +₱15 <br>
							<input type="radio" name="addons" value="15, Oreo Crushes "> Oreo Crushes +₱15 <br>
							<input type="radio" name="addons" value="30, Cream Cheese"> Cream Cheese +₱30 <br>
							<input type="radio" name="addons" value="30,  Nutella"> Nutella +₱30 <br>
						</div>
						<br>
						<?php if($delivery_type == 'None') { ?>
						<div class="form-group">
							<label>Select Delivery type</label> <br>
							<input type="radio" name="delivery_type_update" value="Deliver" required> Deliver<br>
							<input type="radio" name="delivery_type_update" value="Pick-up"> Pick-up
						</div>
						<?php } ?>
						
						<button type="submit" name="update_cart" class="btn btn-primary mt-3" style="width: 100%;">ADD</button>
						
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer ms-1" >
					<button class="btn btn-danger" style="width: 100%;" type="button" data-bs-dismiss="modal">Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
