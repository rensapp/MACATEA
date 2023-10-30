<?php include('../includes/functions.php');
 ?>
  <head>
<link rel="icon" href="../images/mactea.png">
    <link rel="stylesheet" href="../css/logindesign1.css?v=<?php echo time();?>"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<header class="opening-nav">
        <a href="home.php" class="logo" >
		    <img src="../images/mactea-home.png" alt="..." height="70">
			</a>
	
		
   <div style="margin-top: -59px; margin-left: 345px;">
    <?php
	
	 if (isset($_SESSION['user'])) {
   echo '<li class="test"><a href="../user/MyAccount.php" style="color:#008000; text-decoration: none;">My Account</a></li>';

  }else{
     echo '<li class="test"><a href="../login_page/login.php" style="color:#008000; text-decoration: none;">Sign in</a></li>';
  }
 
	?> 
</div>
<?php 
    include('../includes/connection.php');
    if(isset($_POST["change"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];

		$password_1 = $_POST ['password_1'];
		$password_2 = $_POST ['password_2'];
		
		 if (empty($password_1)) { 
    $errors['password'] = "Please enter your password."; 
  }
  if (empty($password_2)) { 
    $errors['password2'] = "Please confirm your password."; 
  }
  if ($password_1 != $password_2) {
    $errors['password3'] = "Two passwords do not match."; 
  }

	if (strlen ($password_1)<8) {
		$errors['password4'] = "Password must be atleast 8 characters."; 
	}
	
	 if (count($errors) == 0) {
		  $password = md5($password_1);
       mysqli_query($connect, "UPDATE users SET password='$password' WHERE email = '$email'");
  ?>
             <script>
                 alert("Changing password done, you may sign in now");
                   window.location.replace("login.php");
             </script>
             <?php
    }
	}
?>

<!------ Include the above in your HEAD tag ---------->

<html lang="en">
<head>
    <!-- Required meta tags -->


    <!-- Fonts -->


  <link rel="stylesheet" type="text/css" href="../css/loginpage.css?v=<?php echo time();?>">


    <!-- Bootstrap CSS -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Verification</title>
</head>
<body>

<div class="header">
		<h2>Change Password</h2>
	</div>
	  <form action="" name="form1" method="post">
		<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1" autocomplete="current-password" id="id_password">
	<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer; margin-top: 6px;">
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
  <div class="input-group">
   <label>Confirm password</label>
   <input type="password" name="password_2">
   <p class="error"> <?php if (isset($errors['password2'])) echo $errors ['password2'];?></p>
   <p class="error"> <?php if (isset($errors['password3'])) echo $errors ['password3'];?></p>
  </div>
		<div class="input-group">
			<button type="submit" class="btn" name="change"> Change </button>
		</div>
	</form>
</body>
</html>
