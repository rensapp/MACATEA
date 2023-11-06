<?php
include('../includes/functions.php');
 

$id=$_GET["id"];


    $first_name="";
	$last_name="";
	$email="";
	$mobile_number="";
	

	$res=mysqli_query($db,"SELECT * FROM users where id=$id");
	while ($row = mysqli_fetch_array($res))
	{
	$first_name=$row["first_name"];
	$last_name=$row["last_name"];
	$email=$row["email"];
	$mobile_number=$row["mobile_number"];

	
	
	}
?>

<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
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
		<h2>Update Staff Information</h2>
	</div>
	  <form action="" name="form1" method="post">
		<div class="input-group">
			<label>First name</label>
			<input type="text" name="first_name" autocomplete="off"  value="<?php echo $first_name; ?>">
			<p class="error"> <?php if (isset($errors['first_name'])) echo $errors ['first_name'];?></p>
		</div>
		<div class="input-group">
			<label>Last name</label>
			<input type="text" name="last_name" autocomplete="off"  value="<?php echo $last_name; ?>">
			<p class="error"> <?php if (isset($errors['last_name'])) echo $errors ['last_name'];?></p>
		</div>
			<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" autocomplete="off"  value="<?php echo $email; ?>" readonly>
	    </div>
		<div class="input-group">
			<label>Branches</label>
			<select name="branch_num">
				<?php
					$link =mysqli_connect ("localhost","root","","mactea");
					$que=mysqli_query($link,"SELECT * FROM users where id = $id");
					while($col=mysqli_fetch_array($que)){
				?>
				<option selected disabled>
					<?php
					if($col['branch_num'] == 1){
						echo "San Antonio (Current Branch)";
					} elseif($col['branch_num'] == 2){
						echo "Luna (Current Branch)";
					} else{
						echo "Calendola (Current Branch)";
					} ?>
				</option>

					<?php if($col['branch_num'] == 1){ ?>
						<option value="1" style="display: none;">San Antonio</option>
					<?php } else{ ?>
						<option value="1">San Antonio</option>
						<?php } ?>
					<?php if($col['branch_num'] == 2){ ?>
						<option value="2" style="display: none;">Luna</option>
					<?php } else{ ?>
						<option value="2">Luna</option>	
					<?php } ?>
					<?php if($col['branch_num'] == 3){ ?>
						<option value="3" style="display: none;">Calendola</option>
					<?php } else{ ?>
						<option value="3">Calendola</option>
					<?php } ?>
				<?php } ?>
				</select>
		</div>

		<div class="input-group">
			<label>Contact Number</label>
			<input type="text" name="mobile_number" autocomplete="off"  value="<?php echo $mobile_number; ?>">
				<p class="error"> <?php if (isset($errors['mobile_number'])) echo $errors ['mobile_number'];?></p>
				<p class="error"> <?php if (isset($errors['mobilenumber1'])) echo $errors ['mobilenumber1'];?></p>
				<p class="error"> <?php if (isset($errors['mobilenumber2'])) echo $errors ['mobilenumber2'];?></p>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="update3"> Update </button>
			  <button type="submit" class="btn btn-danger" name="cancel"> Cancel </button>
		</div>
	</form> 
</body>
<?php
if(isset($_POST["cancel"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/MACATEA/admin/staff_list.php";
	</script>
	<?php
}
?>


