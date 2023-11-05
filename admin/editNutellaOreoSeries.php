<?php
include('../includes/functions.php');
 

$id=$_GET["id"];


    $name="";
	$price_16oz="";
	$price_22oz="";
	$image_dir="";
	

	$res=mysqli_query($db,"SELECT * FROM product where id=$id");
	while ($row = mysqli_fetch_array($res))
	{
	$name=$row["name"];
	$price_16oz=$row["price_16oz"];
	$price_22oz=$row["price_22oz"];
	$image_dir=$row["image_dir"];

	
	
	}
?>

<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <link rel="icon" href="../images/mactea.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="edit.css?v=<?php echo time();?>"/>
  <link rel="icon" href="../images/mactea.png">
</head>
<body>
<style>
button[name=cancel] {
			background: #000000;
			cursor:pointer;
		}
</style>
	<div class="header">
		<h2>Update Nutella Oreo Series </h2>
	</div>
	  <form action="" name="" method="post" enctype="multipart/form-data">
		<div class="input-group">
			<label>Product name</label>
			<input type="text" name="name" autocomplete="off"  value="<?php echo $name; ?>">
	<p class="error"> <?php if (isset($errors['name'])) echo $errors ['name'];?></p>	
		</div>
		<div class="input-group">
			<label>16oz Price</label>
			<input type="text" name="price_16oz" autocomplete="off"  value="<?php echo $price_16oz; ?>">
				<p class="error"> <?php if (isset($errors['price_16oz'])) echo $errors ['price_16oz'];?></p>
		</div>
			<div class="input-group">
		<label>22oz Price</label>
		<input type="text" name="price_22oz" autocomplete="off"  value="<?php echo $price_22oz; ?>">
			<p class="error"> <?php if (isset($errors['price_22oz'])) echo $errors ['price_22oz'];?></p>
	    </div>
		<div class="input-group">
		<label>Current Image</label>
		<img src="../product/<?php echo $image_dir;  ?>" width="100px" height="100px">
		</div>
		<div class="input-group">
		<label>Image</label>
		<input style="height:40px;" type="file" name="new_image">
		<input type="hidden" name="old_image"  value="<?php echo $image_dir; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="updateNutellaOreoSeries"> Update </button>
			  <button type="submit" class="btn btn-danger" name="cancel"> Cancel </button>
		</div>
	</form> 
</body>
<?php
if(isset($_POST["cancel"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/MACATEA/admin/NutellaOreoSeries_List.php";
	</script>
	<?php
}
?>


