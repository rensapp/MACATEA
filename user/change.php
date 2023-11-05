<?php include '../user/userHeader.php'; ?>
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
		  <link 
			  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
			  rel="stylesheet" 
			  integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
			  crossorigin="anonymous"> 
		  <title> Change Password </title>
	</head>
<body>
  <div class="container border border-dark rounded" style="margin-top: 180px; background-color: #92ca91;">
    <div class="row text-center p-4">
      <h2 class="border-bottom border-dark">Change Password</h2>
    </div>
    
    <div class="row mb-3 p-3">
      <form method="post" action="">
      <div class="input-group mb-2" style="margin-left: 160px;">
        <label class="ms-5 me-5 mt-2">Old Password</label>
        <input type="password" class="w-50" style="margin-left: 70px;" name="oldpw">
      </div>
      <div class="input-group mb-2" style="margin-left: 160px;">
        <label class="ms-5 me-5 mt-2">New Password</label>
        <input type="password" class="w-50" style="margin-left: 65px;" name="newpw">
      </div>
      <div class="input-group" style="margin-left: 160px;">
        <label class="ms-5 me-5 mt-2">Confirm Password</label>
        <input type="password" class="w-50" style="margin-left: 40px;" name="confirmpw">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col d-none d-lg-block d-md-block">
		</div>
      <div class="col-lg-3 col-md-5 col-sm-12">
        <button type="submit" class="btn btn-success w-100" name="Confirm">Confirm</button>
      </div>
      <div class="col-lg-3 col-md-5 col-sm-12">
        <button type="submit" class="btn btn-danger btn-block w-100" name="cancel">Cancel</button>
      </div>
      <div class="col d-none d-lg-block d-md-block">
		</div>
    </div>

  </form>
</div>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous">
</script> 
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
 