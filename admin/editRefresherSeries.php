<?php
include('../includes/functions.php');
 

$id=$_GET["id"];


    $name="";
	$medium="";
	$large="";
	$oneliter="";
	$image_dir="";

	$res=mysqli_query($db,"SELECT * FROM product where id=$id");
	while ($row = mysqli_fetch_array($res))
	{
	$name=$row["name"];
	$medium=$row["medium"];
	$large=$row["large"];
	$oneliter=$row["oneliter"];
	$image_dir=$row["image_dir"];
	
	
	}
?>

<html lang="en">
<head>
  <title>Edit</title>
  <link rel="icon" href="../images/mactea.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="edit.css?v=<?php echo time();?>"/>
  
</head>
<body>
<style>
button[name=cancel] {
			background: #000000;
			cursor:pointer;
		}
</style>
	<div class="header">
		<h2>Update Refresher Series</h2>
	</div>
	 	  <form action="" name="" method="post" enctype="multipart/form-data">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" autocomplete="off"  value="<?php echo $name; ?>">
			<p class="error"> <?php if (isset($errors['name'])) echo $errors ['name'];?></p>
		</div>
		<div class="input-group">
			<label>Medium Price</label>
			<input type="text" name="medium" autocomplete="off"  value="<?php echo $medium; ?>">
			<p class="error"> <?php if (isset($errors['medium'])) echo $errors ['medium'];?></p>
		</div>
			<div class="input-group">
		<label>Large Price</label>
		<input type="text" name="large" autocomplete="off"  value="<?php echo $large; ?>">
		<p class="error"> <?php if (isset($errors['large'])) echo $errors ['large'];?></p>
	    </div>
		<div class="input-group">
			<label>1 Liter price</label>
			<input type="text" name="oneliter" autocomplete="off"  value="<?php echo $oneliter; ?>">
			<p class="error"> <?php if (isset($errors['oneliter'])) echo $errors ['oneliter'];?></p>
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
			<button type="submit" class="btn" name="updateRefresherSeries"> Update </button>
			  <button type="submit" class="btn btn-danger" name="cancel"> Cancel </button>
		</div>
	</form> 
</body>
<?php
if(isset($_POST["cancel"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/MACATEA/admin/RefresherSeries_List.php";
	</script>
	<?php
}
?>


