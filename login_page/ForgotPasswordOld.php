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

    if(isset($_POST["register"])){
        $email = $_POST["email"];

 
        	$checkUser="SELECT * from users WHERE email='$email'";
	$result= mysqli_query($connect,$checkUser);
	$count = mysqli_num_rows($result);
		  if (empty($email)) {
  $errors['email_login'] = "Please enter a valid email id.";
  }
		if ($count==0){
		$errors['email1'] = "Please register email address before verification.";
	} else {

                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    require "../Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='MacTeaPH@gmail.com';
                    $mail->Password='vymanzkrzmbkahnb';
    
                    $mail->setFrom('MacTeaPH@gmail.com', 'OTP Verification');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verification code";
                    $mail->Body="<div class='adM'>
  </div><div style='width:100%;max-width:440px;padding:0 20px'><div class='adM'>
    </div><div style='width:100%;padding:0px 0px'><div class='adM'>
      </div><a href= style='pointer-events: none; cursor: default;'><img style='width:100px;' src='https://lh6.googleusercontent.com/T9-IO-eLwlVM5xkp-EcZyo8Pan4YRgkiko-dKwqvc_-VjfbVhpYVcx8DHL55e8XeqeY=w2400' unselectable='on'>
    </a></div><div style='max-width:100%;background-color:#f1f1f1;padding:20px 16px;font-weight:bold;font-size:20px;color:rgb(22,24,35)'> Verification Code </div>
				<div style='max-width:100%;background-color:#f8f8f8;padding:24px 16px;font-size:17px;color:rgba(22,24,35,0.75);line-height:20px'>
      <p style='margin-bottom:20px'>To change your password, enter this code in MacTea:</p>
      <p style='margin-bottom:20px;color:rgb(22,24,35);font-weight:bold'> $otp</p>
	  <p style='margin-bottom:20px'>Do not share this code with anyone</p>
      <p style='margin-bottom:20px'>If you didn't request this code, you can ignore this message.</p>  
</div></div>";
					
    
                            if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo "Register Failed, Invalid Email "?>");
                                    </script>
                                <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "OTP sent to " . $email ?>");
                                    window.location.replace('otpPassword.php');
                                </script>
                                <?php
                            }
                }
            
	}

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Verify Email</title>
</head>
<body style="background-color: #90ee90;">
    <div class="container border border-dark rounded mt-5" style="background-color: white;">
        <div class="row p-3 border-bottom border-dark" style="background-color: #008000;">
            <h2 class="text-center text-light border-bottom pb-2">Account Verification</h2>
        </div>
        <form action="#" method="POST" name="register">
        <div class="input-group mt-3" style="justify-content: center;">
            <label class="me-3 fw-bold">Email</label>
            <input type="email" id="email_address" class="w-50" name="email" autocomplete="off">
			<p class="error"> <?php if (isset($errors['email1'])) echo $errors ['email1'];?> </p>
			<p class="error"> <?php if (isset($errors['email_login'])) echo $errors ['email_login'];?></p>
        </div>
        <div class="row mt-3 p-3">
            <div class="col"></div>
            <div class="col-4">
                <button type="submit" class="btn btn-dark w-100 rounded text-light" style="background-color: #008000;" name="register">Submit</button>
            </div>
            <div class="col"></div>
        </div>
    </form>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
