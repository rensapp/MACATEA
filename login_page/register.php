<?php include '../includes/functions.php'; ?>
						
<head>
  <link rel="icon" href="../images/mactea.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Registration system PHP and MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
  <link rel="stylesheet" href="../css/logindesign1.css?v=<?php echo time();?>"/>
</head>
<style>
body {
  height: 100%;
  /* overflow-y: hidden; */
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
  <a href="../homepage.php" class="logo" >
	  <img src="../images/mactea-home.png" alt="..." height="70">
	</a>
</header>

<div class="container-fluid">
  <div class="row">

    <div class="col-lg-2 col-md-1 d-none d-md-block d-lg-block p-0" style="z-index: -1;">
      <div 
        class="bg-image" 
        style="background-image: url('../images/flipGreenSmallEdit.png');
        height: 50vh; background-repeat: no-repeat; background-size: cover;">
      </div>
      <div 
        class="bg-image" 
        style="background-image: url('../images/flipLightGreenSmallEdit.png');
        height: 50vh; background-repeat: no-repeat; background-size: cover;">
      </div>
    </div>

    <div class="col-lg-1 col-md-1 d-none d-md-block d-lg-block"></div>

    <div class="col-lg-6 col-md-8 col-sm-12 px-5 h-100 mt-5 border border-dark rounded">

      <div class="text-center pt-2">
        <h1 class="fw-bold black">Create your account</h1>
      </div>
    
      <form method="post" action="register.php">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name" autocomplete="off" value="<?php echo $first_name; ?>">
        <p class="error text-danger"> <?php if (isset($errors['firstname'])) echo $errors ['firstname'];?></p>
      </div>

      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="last_name" autocomplete="off" value="<?php echo $last_name; ?> ">
        <p class="error text-danger"> <?php if (isset($errors['lastname'])) echo $errors ['lastname'];?></p>
      </div>
      <div class="form-group">
        <label>Contact number</label>
        <input type="text" class="form-control" name="mobile_number" autocomplete="off" value="<?php echo $mobile_number; ?>">
        <p class="error text-danger"> <?php if (isset($errors['mobilenumber'])) echo $errors ['mobilenumber'];?></p>
        <p class="error text-danger"> <?php if (isset($errors['mobilenumber1'])) echo $errors ['mobilenumber1'];?></p>
        <p class="error text-danger"> <?php if (isset($errors['mobilenumber2'])) echo $errors ['mobilenumber2'];?></p>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $email; ?>">
        <p class="error text-danger"> <?php if (isset($errors['email'])) echo $errors ['email'];?></p>
        <p class="error text-danger"> <?php if (isset($errors['email1'])) echo $errors ['email1'];?></p>
      </div>

        <label>Password</label>
      <div class="input-group">  
        <input type="password" class="form-control" name="password_1" autocomplete="current-password" id="id_password">
        <i class="far fa-eye" id="togglePassword" style="cursor: pointer; top:12px; right:46px; z-index:2; position:relative;"></i>    
        <p class="error text-danger"> <?php if (isset($errors['password'])) echo $errors ['password'];?></p>
        <p class="error text-danger"> <?php if (isset($errors['password4'])) echo $errors ['password4'];?></p>
      </div>
      <div class="form-group">
        <label>Confirm password</label>
        <input type="password" class="form-control" name="password_2">
        <p class="error text-danger"> <?php if (isset($errors['password2'])) echo $errors ['password2'];?></p>
        <p class="error text-danger"> <?php if (isset($errors['password3'])) echo $errors ['password3'];?></p>
      </div>
      <div class="mt-3 w-100 text-center">
        <button type="submit" class="btn btn-dark w-100 green btn-lg" name="register_btn">Register</button>
      </div>
      </form>
      <div class="mt-3">
        <p class="text-center black">Already have an account? <a href="../login_page/login.php"  class="green">Sign In Here</a></p>
      </div>
    </div>

    <div class="col-lg-1 col-md-1 d-none d-md-block d-lg-block"></div>

    <div class="col-lg-2 col-md-1 d-none d-md-block d-lg-block p-0">
      <div 
        class="bg-image" 
        style="background-image: url('../images/greenSide.jpg');
        height: 100vh; background-repeat: no-repeat; background-size: cover;">
      </div>
    </div>

  </div>
</div>
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