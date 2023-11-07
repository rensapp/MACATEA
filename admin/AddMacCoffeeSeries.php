<?php 
include('../includes/functions.php');
if (!isLoggedIn()) {
 $_SESSION['msg'] = "You must log in first";
 header('location: ../login_page/login.php');

}

?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Add Mac Coffee Series</title>
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
			<!--sidebar end-->
			<!--main container start-->
				<div class="main-container">

		<div class="headerA">
	<h2>ADD MAC COFFEE SERIES</h2>
</div>

<form method="POST" action="AddMacCoffeeSeries.php"  enctype="multipart/form-data">
 <link rel="stylesheet" href="adding.css?v=<?php echo time();?>"/>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<div class="input-groupA">
		<div class="input-groupA">
		<label>Name</label>
		<input type="text" name="name" autocomplete="off">
		<p class="error"> <?php if (isset($errors['name'])) echo $errors ['name'];?></p>
	</div>
	<div class="input-groupA">
		<label>Price </label>
		<input type="number" name="price" autocomplete="off">
		<p class="error"> <?php if (isset($errors['price'])) echo $errors ['price'];?></p>
	</div>
	<div class="input-groupA">
		<label>Category</label>
		<select name="category" id="">
			<option value="9">Mac Cold Brew</option>
			<option value="10">Mac Latte</option>
			<option value="11">Mac Signature</option>
		</select>
	</div>
	<div class="input-groupA">
		<label>Image</label>
		<input style="height:40px;" type="file" name="uploadfile"  autocomplete="off">
		<p class="error"> <?php if (isset($errors['filename'])) echo $errors ['filename'];?></p>
	</div>
	<div class="input-groupA">
		<button type="submit" class="btnA" name="AddMacCoffeeSeries">ADD PRODUCT</button>
		<button type="submit" class="btnB" name="cancel">Cancel</button>
	</div>
	<?php
if(isset($_POST["cancel"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/MACATEA/admin/AddProduct.php";
	</script>
	<?php
}
?>
</form>
<!--main container end-->
		</div>
		<!--wrapper end-->

		<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>
		
</body>
</html>	
