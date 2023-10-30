<?php include '../includes/sign-inheader.php'; 
?>

<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		   <link rel="stylesheet" href="../css/finalsstyle.css?v=<?php echo time();?>">
	</head>
<body>

<div class="box-container" style="display: grid; grid-template-columns: repeat(auto-fit, 10rem); gap:0px; justify-content: center; margin-top: 40px;">

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="Milktea_series.php">
					<img src="../product/Milktea_Series.jpg"/>
				</a>
			</span>
	</div>
<p style="height: 200px;padding-top: 120px; font-size: 15px; width: 102px;"> Milktea Series </p>
</div>
</ul>

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="Oreo_series.php">
				<img src="../product/Oreo_Series.jpg"/>
				</a>
			</span>
	</div>
<p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 8px;"> Oreo Series </p>
</div>
</ul>

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="Nutella_series.php">
					<img src="../product/Nutella_Series.jpg"/>
				</a>
			</span>
	</div>
<p style="height: 200px;padding-top: 120px; font-size: 15px; width: 101px;">  Nutella Series</p>
</div>
</ul>

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="NutellaOreo_series.php">
					<img src="../product/NutellaOreo_Series.png"/>
				</a>
			</span>
	</div>
<p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 8px;width: 101px;"> Nutella Oreo Series </p>
</div>
</ul>

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="Fruittea_series.php">
					<img src="../product/FruitTea_Series.jpg"/>
				</a>
			</span>
	</div>
<p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 8px;width: 101px;">  Fruit Tea / Yakult </p>
</div>
</ul>

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="Refresher_series.php">
					<img src="../product/Refresher_series.jpg"/>
				</a>
			</span>
	</div>
<p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 19px;width: 101px;">  Refresher </p>
</div>
</ul>

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="MacteaSpecial.php">
					<img src="../product/Mactea_Special.jpg"/>
				</a>
			</span>
	</div>
<p style="height: 200px;padding-top: 120px; font-size: 15px;width: 116px;">  Mactea Special </p>
</div>
</ul>

<ul class="one">
<div class="main" style="width: 100px; height: 200px;">
	<div class="box">
			<span class="circle-image">
				<a href="MacCoffee_series.php">
					<img src="../product/MacCoffee.jpg"/>
				</a>
			</span>
	</div>
<p style="text-align: center; height: 200px;padding-top: 120px; "> Mac Coffee </p>
</div>
</ul>
</div>
						

<body>
  <link rel="stylesheet" href="../css/delivery.css?v=<?php echo time();?>"/>
	<div class="header">
		<h2>LETS START ORDERING</h2>
	</div>
	<?php 
	$id=$_SESSION['user']['id'];
	$res=mysqli_query($db,"SELECT * FROM users WHERE id='$id' ");
	while($crow=mysqli_fetch_array($res))
	{		?>
	  <input type="hidden" name="customer_id" value="<?php echo $id ?>">
	  <form action="" name="form1" method="post">
			<div class="input-group">
			 <label>PICK UP</label>
		<input type="radio" name="delivery_type" value="Pick-up" style="height:20px; width:20px; vertical-align: middle; margin-top: -31px;" checked>
	    </div>
		<div class="input-group">
		 <label>DELIVERY</label>
		<input type="radio" name="delivery_type" value="Deliver" style="height:20px; width:20px; vertical-align: middle; margin-top: -31px;"> 
	    </div>
		<div class="input-group">
			<button type="submit" class="btn" name="deliveryUpdate"> CONFIRM </button>
			<button type="submit" class="btn1" name="cancel"> CANCEL </button>
		</div>
	</form> 
	<?php
	}
	?>
</body>

<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>	
</html>
<?php
if(isset($_POST["cancel"]))
{
		?>
<script>
     window.history.go(-2);
</script>";
<?php
}
?>
<?php  ?>