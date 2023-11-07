<?php
include('../includes/functions.php');
 

$id=$_GET["id"];


    $name="";
	$price="";
	$image_dir="";
	$category="";

	$res=mysqli_query($db,"SELECT * FROM product where id=$id");
	while ($row = mysqli_fetch_array($res))
	{
	$name=$row["name"];
	$price=$row["price"];
	$image_dir=$row["image_dir"];
	$category=$row["category"];
	
	
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
		<h2>Update Mac Signature</h2>
	</div>
	 	  <form action="" name="" method="post" enctype="multipart/form-data">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" autocomplete="off"  value="<?php echo $name; ?>">
			<p class="error"> <?php if (isset($errors['name'])) echo $errors ['name'];?></p>
		</div>
			<div class="input-group">
		<label> Price</label>
		<input type="text" name="price" autocomplete="off"  value="<?php echo $price; ?>">
		<p class="error"> <?php if (isset($errors['price'])) echo $errors ['price'];?></p>
	    </div>
		<div class="input-group">
			<label>Category</label>
			<select name="category" id="">
				<option selected disabled>
					<?php
					if($category == 9){
						echo "Mac Cold Brew (Current Category)";
					} elseif($category == 10){
						echo "Mac Latte (Current Branch)";
					} else{
						echo "Mac Signature (Current Category)";
					} ?>
				</option>
				<?php if($category == 9) { ?>
					<option value="9" style="display: none;">Mac Cold Brew</option>
				<?php } else { ?>
					<option value="9">Mac Cold Brew</option>
				<?php } ?>
				<?php if($category == 10) { ?>
					<option value="10" style="display: none;">Mac Latte</option>
				<?php } else { ?>
					<option value="10">Mac Latte</option>
				<?php } ?>
				<?php if($category == 11) { ?>
					<option value="11" style="display: none;">Mac Signature</option>
				<?php } else { ?>
					<option value="11">Mac Signature</option>
				<?php } ?>
			</select>
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
			<button type="submit" class="btn" name="updateMacSignature"> Update </button>
			  <button type="submit" class="btn btn-danger" name="cancel"> Cancel </button>
		</div>
	</form> 
</body>
<?php
if(isset($_POST["cancel"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/MACATEA/admin/MacSignatureList.php";
	</script>
	<?php
}
?>


