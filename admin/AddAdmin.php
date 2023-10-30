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
		<title>Add Admin</title>
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
	<h2>ADD ADMIN</h2>
</div>

<form method="post" action="AddAdmin.php">
 <link rel="stylesheet" href="adding.css?v=<?php echo time();?>"/>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<div class="input-groupA">
		<label>First Name</label>
		<input type="text" name="first_name" autocomplete="off" value="<?php echo $first_name; ?>">
			<p class="error"> <?php if (isset($errors['first_name'])) echo $errors ['first_name'];?></p>
	</div>
	<div class="input-groupA">
		<label>Last Name</label>
		<input type="text" name="last_name" autocomplete="off" value="<?php echo $last_name; ?>">
			<p class="error"> <?php if (isset($errors['last_name'])) echo $errors ['last_name'];?></p>
	</div>
	<div class="input-groupA">
		<label>Mobile Number</label>
		<input type="text" name="mobile_number" autocomplete="off" value="<?php echo $mobile_number; ?>">
			<p class="error"> <?php if (isset($errors['mobilenumber'])) echo $errors ['mobilenumber'];?></p>
				<p class="error"> <?php if (isset($errors['mobilenumber1'])) echo $errors ['mobilenumber1'];?></p>
					<p class="error"> <?php if (isset($errors['mobilenumber2'])) echo $errors ['mobilenumber2'];?></p>
	</div>
		<div class="input-groupA">
		<label>Email</label>
		<input type="email" name="email" autocomplete="off" value="<?php echo $email; ?>">
			<p class="error"> <?php if (isset($errors['email'])) echo $errors ['email'];?></p>
				<p class="error"> <?php if (isset($errors['email1'])) echo $errors ['email1'];?></p>
	</div>
	<div class="input-groupA">
		<label>Password</label>
		<input type="password" name="password_1" autocomplete="current-password" id="id_password">
				<i class="fas fa-eye" id="togglePassword" style="cursor: pointer;margin-left:-30px; margin-top:5px; position: fixed;">
			<script>
			const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script> </i>
			<p class="error"> <?php if (isset($errors['password'])) echo $errors ['password'];?></p>
			<p class="error"> <?php if (isset($errors['password4'])) echo $errors ['password4'];?></p>
	</div>
	<div class="input-groupA">
		<label>Confirm password</label>
		<input type="password" name="password_2">
			<p class="error"> <?php if (isset($errors['password2'])) echo $errors ['password2'];?></p>
			<p class="error"> <?php if (isset($errors['password3'])) echo $errors ['password3'];?></p>
	</div>
	<div class="input-groupA">
		<button type="submit" class="btnA" name="registerAdmin">Add Admin</button>
	</div>
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