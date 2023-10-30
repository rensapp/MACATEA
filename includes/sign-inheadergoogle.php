<?php include 'functions.php'; ?>
<head>
    <link rel="stylesheet" href="../css/logindesign1.css?v=<?php echo time();?>"/>
	<link rel="icon" href="../images/mactea.png">
</head>

<header class="opening-nav">
    <div class="flex">
        <a href="home.php" class="logo" >
		    <img src="../images/mactea-home.png" alt="..." height="70">
			</a>
	
		
   <div style="margin-top: -30px;">
    <?php
	$db_connection = mysqli_connect("localhost","root","","mactea");
	$id = $_SESSION['login_id'];

$get_user = mysqli_query($db_connection, "SELECT * FROM `users` WHERE `google_id`='$id'");

if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
	 echo '<li class="test"><a href="../user/MyAccount.php" style="color:#008000; text-decoration: none;">My Account</a></li>';
}else{
     echo '<li class="test"><a href="../user/login.php" style="color:#008000; text-decoration: none;">Sign in</a></li>';
  }
 
	?> 

</div>
</header>