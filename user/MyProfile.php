<?php include '../user/userHeader.php'; ?>
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
		<link 
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
			rel="stylesheet" 
			integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
			crossorigin="anonymous">
		<title>My Profile</title>
	</head>
<style>
.activeCat{
	border: 3px solid #92CA91;
}

.input-group input {
  height: 30px;
  margin-top: 5px;
  width: 400px;
  padding: 20px 15px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.macteaPic{
	width: 270px;
	position: absolute;
	margin-left: 230px;
	margin-top: 15px;
}
 @media (max-width: 768px){
    .input-group input {
  		height: 30px;
  		margin-top: 5px;
  		width: 280px;
  		padding: 20px 15px;
  		font-size: 16px;
  		border-radius: 5px;
  		border: 1px solid gray;
	}
    }
	@media (max-width: 480px){
    .input-group input {
  		height: 30px;
  		margin-top: 5px;
  		width: 180px;
  		padding: 20px 15px;
  		font-size: 16px;
  		border-radius: 5px;
  		border: 1px solid gray;
	}
    }
</style>

<body>

	<?php include ('../user/categories.php'); ?>

<div class="container">
	<div class="row">
		<div class="left-container col-lg-3 col-md-5 col-sm-12 p-4" style="z-index: 2;">
			<div class="mb-4">  
				<a class="p-3 h3 rounded" href="MyAccount.php">My Account</a> 
			</div>
			<div class="mb-3">  
				<?php
				$id=$_SESSION['user']['id'];
				$res=mysqli_query($db,"SELECT * FROM users WHERE id='$id' ");
				while($crow=mysqli_fetch_array($res))
				{
				?>
				<a class="activeCat p-2 h5 rounded" style="text-decoration: none;" href="MyProfile.php?id=<?php echo $crow["id"]; ?>">My Profile</a>
				<?php
				}        
				?>
			</div>
			<div class="mb-3"> 
				<a class="p-2 h5" href="MyAddresses.php">My Addresses</a> 
			</div>
			<div class="mb-3"> 
				<div> 
				<a class="p-2 h5" href="../login_page/login.php?logout='1'">Sign out</a> 
				</div>
			</div>
		</div>


		<div class="right-container col-lg-8 col-md-6 col-sm-12" style="background-color: #92CA91;
  			width: 800px; height:380px; border-radius: 10px;">
			<div class="header p-3 border-bottom border-dark mb-2">
  				<h1 style="margin-left: 20px">My Profile</h1>
			</div>
 			<form action="" name="form1" method="post">
			<?php
				$id=$_SESSION['user']['id'];
				$res=mysqli_query($db,"SELECT * FROM users WHERE id='$id' ");
				while($crow=mysqli_fetch_array($res))
				{	?>
			
			<div class="input-group">
				<label class="ms-2 mt-2">First Name</label>
				<input style="margin-left: 80px;" type="text" name="first_name" pattern="[A-Za-z]*" title="No number & special characters allowed." value="<?php echo $crow['first_name']; ?>"/>
				<p class="error"> <?php if (isset($errors['first_name'])) echo $errors ['first_name'];?> <?php if (isset($errors['first_name1'])) echo $errors ['first_name1'];?></p>
			</div>
	
			<div class="input-group">
				<label class="ms-2 mt-2">Last Name</label>
				<input style="margin-left: 80px;" type="text" name="last_name" pattern="[A-Za-z]*" title="No number & special characters allowed." value="<?php echo $crow['last_name']; ?>"/>
				<p class="error"> <?php if (isset($errors['last_name'])) echo $errors ['last_name'];?></p>
			</div>
	
			<div class="input-group">
				<label class="ms-2 mt-2">Email</label>
				<input style="margin-left: 116px;" type="email" name="email" readonly value="<?php echo $crow['email']; ?>"/>
			</div>

			<div class="input-group">
				<label class="ms-2 mt-2">Contact Number</label>
				<input style="margin-left: 35px;" type="number" name="mobile_number" value="<?php echo $crow['mobile_number']; ?>"/>
			</div>
			
			<div class="row mt-2 mt-lg-4 mt-md-3 mt-sm-2">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<button type="submit" class="btn btn-dark w-100" name="update">Save</button>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 mt-2 mt-lg-0 mt-md-0">
					<a class="btn btn-dark w-100" href="change.php">Change Password</a> 
				</div>
			</div>

			</form>	
			<?php
			}        
			?> 
		</div>

	</div>
</div>
	
	
<script src="js/jquery-3.2.1.min.js"></script>	
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous">
</script>  
</body>	
</html>