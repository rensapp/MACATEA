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
    <title>Nutella Series List</title>
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

 <form action="SearchNutellaSeries.php" name="form1" method="post" style=" background-color: #4CAF50; position:absolute; top:  -20px; left :220px;" >
	<div  class="container" style="padding:30px 10px 50px 210px;  position:absolute; top:  210px; left :-45%;"> 
    <input type="text" class="form-control" id="submit" placeholder="Search name" name="submit" style="align: center;  border-radius: 8px; width:400px;height: 40px;" autocomplete="off" > </div>
	
    <div class="main-button" style="padding:30px 50px 90px 46px;  position:absolute; top:  210px; left :43%;"> 
	<div class="container" style="position:relative;">
		<button type="submit" name="search" class="btn btn-success"  style=" font-family: 'Copperplate'; font-size: 20px;color: #E0D9E4; border: 1px solid;border-radius: 8px; background-color: #008000; position: left: 50px;  width:150px;height: 40px;" >
				Search</button> </div>
			</div>
	</form>
		<?php
 include "PaginationNutellaSeries.php";
 ?>
		<link rel="stylesheet"  href="desi.css?v=<?php echo time();?>"/>
 <span class="title"> NUTELLA SERIES</span> 
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<table class="table4">
		<tr>
		<th>Name</th>
		<th>16 oz</th>
		<th>22 oz</th>
		<th>Image</th>
		<th>Action</th>
		</tr>

<?php
	$res=mysqli_query($db,"SELECT * FROM product WHERE category = '3'");
	if(mysqli_num_rows($res) > 0){
	while($crow=mysqli_fetch_array($nquery))
	{
	?>
		
	<tr>
					<td><?php echo $crow["name"]; ?></td>
                    <td><?php echo $crow["price_16oz"]; ?></td>
                    <td><?php echo $crow["price_22oz"]; ?></td>
                    <td><img src="../product/<?php echo $crow["image_dir"]; ?>" width="50px" height="50px"></td>
					<td> <a href="editNutellaSeries.php?id=<?php echo $crow["id"]; ?>"><button  class="delete" style="background-color: #4682B4;">Edit</button></a>
					<a href="DeleteNutellaSeries.php?id=<?php echo $crow["id"]; ?>"><button  class="delete" style="background-color: #B22222;">Delete</button></a> </td>
                </tr>
	
	 <?php
	}  }   else {
	
			echo "<p style='text-shadow: 2px 2px #008000;'> <font color=black font size='50' font face='courier' size='6pt'><b>EMPTY</b></font> </p>";
	  }   
        ?>
	</table>
 
<style>


</style>  
  <div  style="padding:10px 10px 10px 10px;  position:absolute; top:  560px; left :260px;"> 
     <div class="pagination" style= "color: #7CFC00; background-color: #000000; border-radius: 25px;padding: 8px 16px; text-decoration: none;"  
	 
	 id="pagination_controls"><?php echo $paginationCtrls; ?> </div>
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