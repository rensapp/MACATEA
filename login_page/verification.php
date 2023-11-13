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

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Verification</title>
</head>
<style>
    body, html {
         overflow-x: hidden;
    }
</style>
<body style="background-image: url('../images/macteabg.png'); background-repeat: no-repeat;">
    <div class="container border border-dark rounded mt-5" style="background-color: white;">
        <div class="row p-3 border-bottom border-dark" style="background-color: #008000;">
            <h2 class="text-center text-light border-bottom pb-2">Account Verification</h2>
        </div>
        <form action="#" method="POST">
        <div class="input-group mt-5 row">
            <div class="text-center" style="justify-content: center;">
                <label class="me-3 fw-bold">OTP</label>
                <input type="text" id="otp" class="w-50" name="otp_code" autocomplete="off"> 
            </div>
			<p class="error text-danger text-center m-0"> <?php if (isset($errors['otp_code'])) echo $errors ['otp_code'];?> </p>
			<p class="error text-danger text-center mb-1"> <?php if (isset($errors['otp_code1'])) echo $errors ['otp_code1'];?> </p>
        </div>
		<div class="row p-3">
            <div class="col"></div>
            <div class="col-4">
                <button type="submit" class="btn btn-dark w-100 rounded text-light" style="background-color: #008000;" name="verify">Submit</button>
            </div>
            <div class="col"></div>
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
