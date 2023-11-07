<?php 
include('../includes/functions.php'); 
if (!isLoggedIn()) {
 $_SESSION['msg'] = "You must log in first";
 header('location: ../login_page/login.php');

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link rel="stylesheet" href="../css/logindesign1.css?v=<?php echo time();?>"/>
</head>
	<link rel="icon" href="../images/mactea.png">
    <link rel="stylesheet" href="styledesign.css?v=<?php echo time();?>"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <title>Mac Coffee Series List</title>
</head>

<body>
<div class="wrapper">
		<div class="header">
				<div class="header-menu">
					<div class="title">  <img src="../images/mactea-home.png" alt="..." height="70"></div>
					<div class="title"> Admin </div>
					<div class="sidebar-btn">
						<i class="fas fa-bars"></i>
					</div>
				</div>
			</div>
			<?php include 'sidebar.php' ?>	

<div class="main-container">

		<link rel="stylesheet"  href="desi.css?v=<?php echo time();?>"/>
 <span class="title"> MAC COFFEE SERIES</span> 
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	
	<a href="MacColdBrewList.php"> <button class="button" style="margin-top:170px; margin-left: 60px;"> Mac Cold Brew </button> </a>
	<a href="MacLatteList.php"> <button class="button" style="margin-top:170px; margin-left: 360px;"> Mac Latte </button> </a>
	<a href="MacSignatureList.php"> <button class="button" style="margin-top:170px; margin-left: 660px;"> Mac Signature </button> </a>
</body>
</html>
<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>