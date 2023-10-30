<?php include 'functions.php';?>
<link rel="icon" href="../images/mactea.png">
		  <?php
		  if (isset($_SESSION['user'])) {
	$id=$_SESSION['user']['id'];
                        require_once "../includes/config.php";
                        $select_stmt=$conn->prepare("SELECT * FROM `cart`, `users` WHERE customer_email = email AND customer_id = $id ");
                        $select_stmt->execute();
                        $grand_total = 0;
                        while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                        <tr>
                            <?php $grand_total +=$row["total_price"];?> 
                        </tr>   
                        <?php 
		  } }
                        ?>	
						
<head>
    <link rel="stylesheet" href="../css/logindesign1.css?v=<?php echo time();?>"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<header class="opening-nav">
        <a href="home.php" class="logo" >
		    <img src="../images/mactea-home.png" alt="..." height="70">
			</a>
	
		
   <div style="margin-top: -60px; margin-left: 345px;">
    <?php
	
	 if (isset($_SESSION['user'])) {
   echo '<li class="test"><a href="../user/MyAccount.php" style="color:#008000; text-decoration: none;">My Account</a></li>';

  }else{
     echo '<li class="test"><a href="../login_page/login.php" style="color:#008000; text-decoration: none;">Sign in</a></li>';
  }
 
	?> 
</div>
   <div>
    <?php
	 if (isset($_SESSION['user'])) {
   echo '<li class="test1"><a href="cart.php"><i class="fas fa-cart-plus" style="color: white; font-size: 28px;"></i><span></span></a></li>';
   echo "<li class='test2'><a style='color:green; margin-left: 10px; font-size: 25px; font-weight: bold; text-decoration: none'>" . "₱".number_format($grand_total,2). "</a>"."</li>";
   echo"<li class='test3'><a href='orders.php' class='sorder' style='text-decoration:none;'><i class='fa-solid fa-box' style='color:white;'></i><span style='color:green;  font-size: 20px; text-decoration: none'> Orders</span></a></li>";
	 } else{
     return 0;
  }
 
	?> 
	</div>
</header>