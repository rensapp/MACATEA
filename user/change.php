<?php include '../includes/sign-inheader.php'; ?>
<?php
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location:../login_page/login.php');
}

if (!isLoggedIn()) {
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	header('location:../login_page/login.php');
	}
}
?> 
<style>
		button[name=cancel] {
			background: #B22222;
		}
	</style>
<html>
	<head>
				<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
		   <link rel="stylesheet" href="../css/finalsstyle.css?v=<?php echo time();?>">
		   
		  <title> Change Password </title>
	</head>
<body>
 <div class="header">
  <h2>Change Password</h2>
 </div>
 
<form method="post" action="">
 <div class="input-group">
  <label>Old Password</label>
  <input type="password" name="oldpw">
 </div>
 <div class="input-group">
  <label>New Password</label>
  <input type="password" name="newpw">
 </div>
 <div class="input-group">
  <label>Confirm Password</label>
  <input type="password" name="confirmpw">
 </div>
  <div class="input-group">
   <button type="submit" class="btn" name="Confirm"> Confirm </button>
   <button type="submit" class="btn btn-danger" name="cancel"> Cancel </button>
  </div>

 </form>
</body>
</html>

<?php
	$id=$_SESSION['user']['id'];
	$res=mysqli_query($db,"SELECT * FROM users WHERE id='$id' ");
	while($crow=mysqli_fetch_array($res))
	{
	?>
<?php
if(isset($_POST["cancel"]))
{
	?>
	<script type="text/javascript">
window.location="MyAccount.php?id=<?php echo $crow["id"]; ?>";
	</script>
	<?php
}
?>

<?php
$connect = mysqli_connect ("localhost","root","","mactea");


if (isset($_POST["Confirm"]))
{$np = ($_POST['newpw']);
if (strlen ($np)<8){
echo '<script>alert("Password must be at least 8 characters")</script>';
}else {

 $op = md5 ($_POST ['oldpw']);
 $np = md5 ($_POST['newpw']);
 $cp = md5 ($_POST['confirmpw']);
 
  if ($np==$cp)
  {
   
   $query="SELECT * FROM users WHERE password='$op'";
   $result=mysqli_query ($connect,$query);
   $count=mysqli_num_rows($result);
   if ($count>0) {
   $query="UPDATE users SET password='$np' WHERE password='$op'";
   mysqli_query ($connect, $query);
   echo '<script>alert("Password Updated Successfully")</script>';
   ?>
<script type="text/javascript">
window.location="MyProfile.php?id=<?php echo $crow["id"]; ?>";
</script>
<?php
  }
  else {
      echo '<script>alert("Old Password Does Not Match")</script>';
  }
 }
  else 
  {
	  echo '<script>alert("The two passwords do not match")</script>';
   
  }
}
}
?>
 <?php
            }        
        ?>
 