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
        // $otp = $_SESSION['otp'];
        // $email = $_SESSION['mail'];

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Change Password</title>
</head>
<style>
    body, html {
         overflow-x: hidden;
    }
</style>
<body style="background-color: #90ee90" >
    <div class="container border border-dark rounded" style="background-color: white; position:absolute; top:50%; left:50%; transform: translate(-50%,-50%);">
        <div class="row p-3 border-bottom border-dark" style="background-color: #008000">
            <h2 class="text-center text-light border-bottom pb-2">Change Password</h2>
        </div>
	      <form action="" name="form1" method="post">
		    <div class="input-group mt-5 row">
          <div class="text-center">
		        <label>Password</label>
		        <input type="password" class="w-50 ms-5" name="password_1" autocomplete="current-password" id="id_password">
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
            </script>
            </i>
          </div>
          <p class="error text-danger text-center my-0 ms-5"> <?php if (isset($errors['password'])) echo $errors ['password'];?></p>
          <p class="error text-danger text-center my-0 ms-5"> <?php if (isset($errors['password4'])) echo $errors ['password4'];?></p>
        </div>
        <div class="input-group row mt-3">
          <div class="text-center">
            <label>Confirm password</label>
            <input type="password" class="w-50" name="password_2">
          </div>
          <p class="error text-danger text-center my-0 ms-5"> <?php if (isset($errors['password2'])) echo $errors ['password2'];?></p>
          <p class="error text-danger text-center my-0 ms-5"> <?php if (isset($errors['password3'])) echo $errors ['password3'];?></p>
        </div>
		    <div class="row p-3">
          <div class="col"></div>
          <div class="col-4">
			      <button type="submit" class="btn btn-dark w-100 rounded text-light" style="background-color: #008000;" name="change"> Change </button>
		      </div>
          <div class="col"></div>
        </div>
	    </form>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
