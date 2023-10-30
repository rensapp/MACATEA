<?php include ('../includes/sign-inheader.php');
	if (isset($_SESSION['user'])) {
	$id=$_SESSION['user']['id'];
	} 
?> 
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		   <link rel="stylesheet" href="../css/finalsstyle.css?v=<?php echo time();?>">
		   <title> Nutella Oreo Series </title>
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

<ul class="active">
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
<p style="text-alignment: center; height: 200px;padding-top: 120px; "> Mac Coffee </p>
</div>
</ul>
</div>



<div class="main-container">
	<section class="products">

   <div class="title"> Fruit Tea / Yakult Series </div>
	  <div class="box-container">

				 <?php
require '../includes/conn.php';
      $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE  category=5");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch = mysqli_fetch_assoc($select_products)){
      ?>
         <div class="box">
             <img src="../product/<?php echo $fetch['image_dir']; ?>" alt="" width="310px">
            <h3><?php echo $fetch['name']; ?></h3>
            <div class="price">₱<?php echo $fetch['medium']; ?></div>
			
			<input type="hidden" name="customer_id" value="<?php echo $id ?>">
			
			<button class="btn" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id']?>"> ADD </button>';
         </div>


      <?php
        	include 'addFruitTea.php'; }
      } else {
	
			echo "<p align='center'> <font color=black font size='50' font face='courier' size='6pt'><b>NO PRODUCT AVAILABLE</b></font> </p>";
	  }
      ?>
			</div>
		</section>
	</div>


<script src="../js/jquery-3.2.1.min.js"></script>	
<script src="../js/bootstrap.js"></script>	
</body>	
</html>