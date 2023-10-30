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
		<title>My Address</title>		
	</head>

<style>
.activeCat{
	border: 3px solid #92CA91;
}

.input-group input {
  height: 30px;
  width: 400px;
  margin-top: 5px;
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
	  	width: 300px;
	}
    }
	@media (max-width: 480px){
    .input-group input {
	  	width: 180px;
	}
    }
</style>

<body>

<?php include ('../user/categories.php'); ?>

<div class="container">
	<div class="row">
		<div class="left-container col-lg-3 col-md-5 col-sm-12 p-4">
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
				<a class="p-2 h5" style="text-decoration: none;" href="MyProfile.php?id=<?php echo $crow["id"]; ?>">My Profile</a>
				<?php
				}        
				?>
			</div>
			<div class="mb-3"> 
				<a class="activeCat p-2 h5 rounded" href="MyAddresses.php">My Addresses</a> 
			</div>
			<div class="mb-3"> 
				<div> 
				<a class="p-2 h5" href="../login_page/login.php?logout='1'">Sign out</a> 
				</div>
			</div>
		</div>

		<div class="right-container col-lg-8 col-md-6 col-sm-12" style="background-color: #92CA91;
  		width: 800px; height:455px; border-radius: 10px;">
  
			<div class="header p-3 border-bottom border-dark mb-2">
				<h1 style="margin-left: 20px">My Addresses</h1>
			</div>

			<form action="" name="form1" method="post">

			<?php 
			$id = mysqli_real_escape_string($db, $_SESSION['user']['id']);
			$customer_email = mysqli_real_escape_string($db, $_SESSION['user']['email']);

			$checkUserQuery = "SELECT * FROM users WHERE email = '$customer_email' AND id = '$id'";
			$result = mysqli_query($db, $checkUserQuery);
			while ($crow = mysqli_fetch_array($result)) {
			?>
	
			<div class="input-group">
			<label class="ms-2 mt-2"> Street Number  </label>
			<input style="margin-left: 40px;" type="number" name="streetnum" value="<?php echo $crow['streetnum']; ?>"/></strong>
			</div>
			<div class="input-group">
			<label class="ms-2 mt-2"> Street Name  </label>
			<input style="margin-left: 55px;" type="text" name="streetname" value="<?php echo $crow['streetname']; ?>"/></strong>
			</div>
			<div class="input-group">
			<label class="ms-2 mt-2"> Barangay  </label>
			<input style="margin-left: 77px;" type="text" name="barangay" value="<?php echo $crow['barangay']; ?>"/></strong>
			</div>
			<div class="input-group">
			<label class="ms-2 mt-2"> City  </label>
			<input style="margin-left: 115px;" type="text" name="city" value="<?php echo $crow['city']; ?>"/></strong>
			</div>
			<div class="input-group">
			<label class="ms-2 mt-2"> Province  </label>
			<input style="margin-left: 82px;" type="text" name="province" value="<?php echo $crow['province']; ?>"/></strong>
			</div>
			<div class="input-group">
			<label class="ms-2 mt-2"> Zipcode  </label>
			<input style="margin-left: 85px;" type="number" name="zipcode" value="<?php echo $crow['zipcode']; ?>"/></strong>
			</div>
			
			<?php
				}
			?> 

			<div class="input-group mt-3">
				<button type="submit" class="btn btn-dark w-100" name="updateAddress"> Update </button>
			</div>
		
			</form> 
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

