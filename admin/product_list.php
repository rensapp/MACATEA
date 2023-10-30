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
    <title>Product List</title>
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
 <span class="title1"> PRODUCT LIST</span> 
<div class="main-products" style="margin-top:100px;">
<a href="MilkteaSeries_List.php"> <button class="button" style="margin-top:50px; margin-left: 60px;"> Milktea Series  </button> </a>
<a href="OreoSeries_List.php"> <button class="button" style="margin-top:50px; margin-left: 360px;"> Oreo Series  </button> </a>
<a href="NutellaSeries_List.php"> <button class="button" style="margin-top:50px; margin-left: 660px;"> Nutella Series  </button> </a>
<a href="NutellaOreoSeries_List.php"> <button class="button" style="margin-top:50px; margin-left: 960px;"> Nutella Oreo Series  </button> </a>
<a href="FruitTeaSeries_List.php"> <button class="button" style="margin-top:170px; margin-left: 60px;"> Fruit Tea/ Yakult Series  </button> </a>
<a href="RefresherSeries_List.php"> <button class="button" style="margin-top:170px; margin-left: 360px;"> Refresher Series  </button> </a>
<a href="MacteaSpecial_List.php"> <button class="button" style="margin-top:170px; margin-left: 660px;"> Mactea Special  </button> </a>
<a href="MacCoffeeSeries_List.php"> <button class="button" style="margin-top:170px; margin-left: 960px;"> Mac Coffee </button> </a>
</div>
	</div>
   </div> 

</body>
</html>
<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>