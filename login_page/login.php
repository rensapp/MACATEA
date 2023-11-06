<html lang="en">
<head>

    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="../images/mactea.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/logindesign1.css?v=<?php echo time();?>"/>
	<link rel="icon" href="../images/mactea.png">
    <title>Login</title>
</head>
<style>
body {
  height: 100%;
  overflow-y: hidden;
  overflow-x: hidden;
  font-family: Rockwell;
}   
.form-control {
  border: 1px solid black;
}
.btn-dark{
    background-color: black;
}
.black{
    color: black;
}
.green{
    color: #5fa233;
}

</style>

<body>
    

<header class="opening-nav">
    <div class="flex">
        <a href="../homepage.php" class="logo" >
		    <img src="../images/mactea-home.png" alt="..." height="70">
		</a>
    </div>
	
<?php include '../includes/functions.php' ?>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-1 d-none d-md-block d-lg-block p-0" style="z-index: -1;">
            <div 
                class="bg-image" 
                style="background-image: url('../images/greenSide.jpg');
                height: 100vh; background-repeat: no-repeat; background-size: cover;">
            </div>
        </div>
        
        <div class="col-lg-1 col-md-1 d-none d-md-block d-lg-block"></div>
        
        <div class="col-lg-6 col-md-8 col-sm-12 p-5 mt-5 h-100 border border-dark rounded">

            <div class="text-center">
                <h1 class="fw-bold black">Sign in to Order</h1>
            </div>

            <form method="post" action="login.php">
                <p class="errortop"> <?php if (isset($errors['top'])) echo $errors ['top'];?></p>
                <p class="errortop"> <?php if (isset($errors['top1'])) echo $errors ['top1'];?></p>
                <div class="form-group">
                    <label class="h5 black">Email</label>
                    <input type="email" class="form-control" name="email" autocomplete="off">
                    <p class="error"> <?php if (isset($errors['email_login'])) echo $errors ['email_login'];?></p>
                </div>

                <label class="h5 black">Password</label>
                <div class="input-group">  
                    <input type="password" class="form-control" name="password" autocomplete="current-password" id="id_password">
                    <i class="far fa-eye" id="togglePassword" style="cursor: pointer; top:12px; right:46px; z-index:2; position:relative;"></i>    
                    <p class="error"> <?php if (isset($errors['pass_login'])) echo $errors ['pass_login'];?></p>
                </div>

                <div class="mt-3">
                    <a class="text-dark black" href="ForgotPassword.php"> Forgot password? </a>
                </div>
                <div class="mt-5 w-100 text-center">
                    <button type="submit" class="btn btn-dark w-100 green btn-lg" name="login_btn">Login Now</button>
                </div>
                <div class="mt-5">
                    <p class="text-center black">Don't have an account? <a href="../login_page/register.php"  class="green">Sign Up Here</a></p>
                </div>
            </form>
        </div>
        <div class="col-lg-1 col-md-1 d-none d-md-block d-lg-block"></div>
        <div class="col-lg-2 col-md-1 d-none d-md-block d-lg-block p-0">
            <div 
                class="bg-image" 
                style="background-image: url('../images/greenSmallSide.png');
                height: 50vh; background-repeat: no-repeat; background-size: cover;">
            </div>
            <div 
                class="bg-image" 
                style="background-image: url('../images/lightGreenSmallSide.png');
                height: 50vh; background-repeat: no-repeat; background-size: cover;">
            </div>
        </div>
    </div>
</div>


 <?php
if(isset($_POST["register"]))
{
	?>
	<script type="text/javascript">
	window.location = "../login_page/register.php";
	</script>
	<?php
}
?>

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
</body>
</html>
