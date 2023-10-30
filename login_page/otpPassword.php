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
	
		
   <div style="margin-top: -62px; margin-left: 345px;">
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
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

 if (empty($otp_code)) {
  $errors['otp_code'] = "Please enter the OTP code.";
  }
  if ($otp != $otp_code) {
    $errors['otp_code1'] = "Invalid OTP code"; 
}else{
            mysqli_query($connect, "UPDATE users SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("login.php");
             </script>
             <?php
        }

    }

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="../css/loginpage.css?v=<?php echo time();?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Verification</title>
</head>
<body>
                    <div class="header">
						<h2>Change Password</h2>
					</div>
                        <form action="#" method="POST">
                            <div class="input-group">
                                <label> OTP </label>
                                    <input type="text" id="otp" name="otp_code" autocomplete="off"> 
									<p class="error"> <?php if (isset($errors['otp_code'])) echo $errors ['otp_code'];?> </p>
									<p class="error"> <?php if (isset($errors['otp_code1'])) echo $errors ['otp_code1'];?> </p>
                            </div>
							<div class="input-group">
								 <button type="submit" class="btn" name="verify">Submit</button>
                            </div>
                    </form>

</body>
</html>
