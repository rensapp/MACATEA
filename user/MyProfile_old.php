<?php include '../includes/sign-inheader.php'; ?>
<?php
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

<style>
.div1 {
	height:30px;;
	width: 180px;
	margin-left:40px;
	font-size: 30px;
}
.div2 {
	width: 150px;
	height:30px;
	margin-top: 30px;
	margin-left:70px;

}

.div3 {
	height:30px;
	width: 200px;
	margin-top: 10px;
	margin-left:70px;
}


.div4 {
	height:30px;
	width: 200px;
	margin-top: 10px;
	margin-left:70px;
}
.div5 {
	height:30px;
	width: 200px;
	margin-top: 10px;
	margin-left:70px;
}
</style>
<div class="left-container" style="margin-left: 200px; float: left; ">

  <div class="div1"> 
	<div> 
	<a class="TitleClick" href="MyAccount.php">My Account</a> 
	</div>
 </div>

 
 <div class="div2"> 
	<div class="alive"> 
	<?php
	$id=$_SESSION['user']['id'];
	$res=mysqli_query($db,"SELECT * FROM users WHERE id='$id' ");
	while($crow=mysqli_fetch_array($res))
	{
	?>
<a class="Click" style="text-decoration: none;" href="MyProfile.php?id=<?php echo $crow["id"]; ?>">My Profile</a>
	</div>
	 <?php
            }        
        ?>
 </div>
 
  <div class="div3"> 
	<div> 
	<a class="Click" href="MyAddresses.php">My Addresses</a> 
	</div>
 </div>
 
 
 <div class="div5"> 
	<div> 
	<a class="Click" href="../login_page/login.php?logout='1'">Sign out</a> 
	</div>
 </div>
 
	</div>


<div class="right-container" style="margin-right: 230px; margin-left: 500px;float: right; background-color: #92CA91;
  width: 800px; height:400px; border-radius: 10px; position: absolute;">
  
<div class="header">
  <h1 style="margin-left: 20px">My Profile</h1>
</div>
<Style>
.input-group input {
  height: 30px;
  width: 400px;
  margin-left: 50px;
  padding: 20px 15px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
  
}

</style> 
 <form action="" name="form1" method="post">
<?php
	$id=$_SESSION['user']['id'];
	$res=mysqli_query($db,"SELECT * FROM users WHERE id='$id' ");
	while($crow=mysqli_fetch_array($res))
	{
	?>
				
<div class="input-group">
<label style="margin-left: 20px; margin-top:20px; font-size: 20px;"> First Name  </label>
<input style="margin-left: 90px;" type="text" name="first_name" pattern="[A-Za-z]*" title="No number & special characters allowed." value="<?php echo $crow['first_name']; ?>"/>
 <p class="error"> <?php if (isset($errors['first_name'])) echo $errors ['first_name'];?> <?php if (isset($errors['first_name1'])) echo $errors ['first_name1'];?></p>
 </div>
 
<div class="input-group">
 <label style="margin-left: 30px; margin-top:10px;font-size: 20px;"> Last Name  </label>
<input style="margin-left: 82px;" type="text" name="last_name" pattern="[A-Za-z]*" title="No number & special characters allowed." value="<?php echo $crow['last_name']; ?>"/>
<p class="error"> <?php if (isset($errors['last_name'])) echo $errors ['last_name'];?></p>
 </div>
 
<div class="input-group">
  <label style="margin-left: 30px; margin-top:10px;font-size: 20px;"> Email  </label>
<input style="margin-left: 133px;" type="email" name="email" readonly value="<?php echo $crow['email']; ?>"/></strong>
 </div>

 
 <div class="input-group">
  <label style="margin-left: 30px; margin-top:20px;font-size: 20px;"> Contact Number  </label>
<input style="margin-left: 20px;" type="number" name="mobile_number" value="<?php echo $crow['mobile_number']; ?>"/></strong>
 </div>
<div class="input-group" style="width: 250px; margin-top: 20px;">
			<button type="submit" class="btn" name="update"> Save </button>
		</div>
<div class="input-group" style="width: 400px; margin-top: -30px; margin-left: 220px;">
			<a class="change" href="change.php">Change Password</a> 
		</div>
		</form>	
 <?php
            }        
        ?>
 
 
			</div>
	
	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>	
</html>