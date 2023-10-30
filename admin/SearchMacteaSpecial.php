<?php
include('../includes/functions.php');

if (!isLoggedIn()) {
 $_SESSION['msg'] = "You must log in first";
 header('location: ../login_page/login.php');
}
?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Search Mactea Special </title>
		<link rel="icon" href="../images/mactea.png">
		<link rel="stylesheet" href="styledesign.css?v=<?php echo time();?>"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	</head>
	<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
		<div class="header">
				<div class="header-menu">
					<div class="title">  <img src="../images/mactea-home.png" alt="..." height="70"></div>
					<div class="title"> Admin </div>
					<div class="sidebar-btn">
						<i class="fas fa-bars"></i>
					</div>
				</div>
			</div>
			<!--header menu end-->
			<!--sidebar start-->
		<?php include 'sidebar.php' ?>
			<!--sidebar end-->
			<!--main container start-->
				<div class="main-container">
	
			 <form action="SearchMacteaSpecial.php" name="form1" method="post" style=" background-color: #4CAF50; position:absolute; top:  -20px; left :220px;" >
	<div  class="container" style="padding:30px 10px 50px 210px;  position:absolute; top:  210px; left :-45%;"> 
    <input type="text" class="form-control" id="submit" placeholder="Search name" name="submit" style="align: center;  border-radius: 8px; width:400px;height: 40px;" autocomplete="off" > </div>
	
    <div class="main-button" style="padding:30px 50px 90px 46px;  position:absolute; top:  210px; left :43%;"> 
	<div class="container" style="position:relative;">
		<button type="submit" name="search" class="btn btn-success"  style=" font-family: 'Copperplate'; font-size: 20px;color: #E0D9E4; border: 1px solid;border-radius: 8px; background-color: #008000; position: left: 50px;  width:150px;height: 40px;" >
				Search</button> </div></div>
	</form>
	
			
		<link rel="stylesheet"  href="desi.css?v=<?php echo time();?>"/>
 <span class="title"> SEARCH MACTEA SPECIAL</span> 
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<table class="table4">
		<tr>
		<th>Name</th>
		<th>Price Large</th>
		<th>Image</th>
		<th>Action</th>
		</tr>
<?php
	
if(isset($_POST['search'])){
	$search =mysqli_real_escape_string($db, $_POST['submit']);
	$sql = $sql = "SELECT * FROM product WHERE `name`='$search' AND category='7'";
	$result = mysqli_query($db,$sql);	
	$queryResult = mysqli_num_rows($result);
	if ($queryResult > 0) {
		echo '<script>alert("PRODUCT FOUND")</script>';		
	while($crow = mysqli_fetch_assoc($result)){
		?>
	<tr>
				<td><?php echo $crow["name"]; ?></td>
                    <td><?php echo $crow["price"]; ?></td>
                    <td><img src="../product/<?php echo $crow["image_dir"]; ?>" width="50px" height="50px"></td>
					<td> <a href="editMacteaSpecial.php?id=<?php echo $crow["id"]; ?>"><button  class="delete" style="background-color: #4682B4;">Edit</button></a>
					<a href="DeleteMacteaSpecial.php?id=<?php echo $crow["id"]; ?>"><button  class="delete" style="background-color: #B22222;">Delete</button></a> </td>
                </tr>
	 <?php
		}
	}else{
		echo '<script>alert("NO FOUND")</script>';		
		?>
<script type="text/javascript">
window.location="MacteaSpecial_List.php";
</script>
<?php
}}
  ?>
	
    </tbody>
  </table>
</body>
</html>	