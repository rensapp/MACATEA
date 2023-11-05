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
		<link rel="icon" href="../images/mactea.png">	
		<title>My Account</title>
		<link 
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
			rel="stylesheet" 
			integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
			crossorigin="anonymous">
	</head>

<style>
.activeCat{
	border: 3px solid #92CA91;
}

.input-group input {
  height: 30px;
  width: 400px;
  margin-left: 50px;
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
    .macteaPic{
	width: 250px;
	margin-left: 130px;
	margin-top: 50px;
}
    }
	@media (max-width: 480px){
    .macteaPic{
	width: 200px;
	margin-left: 100px;
	margin-top: 70px;
}
    }
</style>

<body>

<?php include ('../user/categories.php'); ?>

<div class="container">
	<div class="row">
		<div class="left-container col-lg-3 col-md-5 col-sm-12 p-4">
			<div class="mb-4">  
				<a class="activeCat p-3 h3 rounded" href="MyAccount.php">My Account</a> 
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
				<a class="p-2 h5" href="MyAddresses.php">My Addresses</a> 
			</div>
			<div class="mb-3"> 
				<div> 
				<a class="p-2 h5" href="../login_page/login.php?logout='1'">Sign out</a> 
				</div>
			</div>
		</div>

		<div class="right-container col-lg-8 col-md-6 col-sm-12" style="background-color: #92CA91;
		width: 800px; height:400px; border-radius: 10px;">
			<div class="header p-3 border-bottom border-dark">
				<h1 style="margin-left: 20px">My Account</h1>
			</div>
			<img src="../images/mactea.png" class="macteaPic"> 
		</div>

		<div class="col"></div>

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