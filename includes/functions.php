<?php 
 session_start();
 session_regenerate_id(true);
 // connect to database
 $db = mysqli_connect('localhost', 'root', '', 'mactea');

 // variable declaration

 $first_name = "";
 $last_name = "";
 $mobile_number = "";
 $email    = "";
 $errors   = array();

 // call the register() function if register_btn is clicked
 if (isset($_POST['register_btn'])) {
  register();
 }

 // call the login() function if register_btn is clicked
 if (isset($_POST['login_btn'])) {
  login();
 }

//  if (isset($_GET['logout'])) {
// 	$id=$_GET["id"];
// 	$query = "Update users SET delivery_type = 'none' WHERE id='$id'";
// 	$result = mysqli_query($db, $query);

// 	session_destroy();
//   	unset($_SESSION['user']);
//   	header("location:../login_page/login.php");
//  }

if (isset($_GET['logout'])) {
    $id = $_SESSION['user']['id'];
    $id = mysqli_real_escape_string($db, $id);
    $query = "UPDATE users SET `delivery_type` = 'None' WHERE id = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_destroy();
    unset($_SESSION['user']);
    mysqli_close($db);
    header("location: ../login_page/login.php");
    exit();
}

 // REGISTER USER
 function register(){
  global $db,$first_name,$last_name,$mobile_number,$email, $errors;
  // receive all input values from the form
  $first_name = e($_POST['first_name']);
  $last_name = e($_POST['last_name']);
  $mobile_number =  e($_POST['mobile_number']);
  $email =  e($_POST['email']);
  $password_1 = e($_POST['password_1']);
  $password_2 = e($_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  if (empty($first_name)) { 
   $errors['firstname'] = "Please enter your first name.";
  }
  if (empty($last_name)) { 
   $errors['lastname'] = "Please enter your last name.";
  }
  if (empty($mobile_number)) { 
    $errors['mobilenumber'] = "Please enter mobile number.";
  }
  if (empty($email)) { 
    $errors['email'] = "Please enter your email address.";
  }
  if (empty($password_1)) { 
    $errors['password'] = "Please enter your password."; 
  }
  if (empty($password_2)) { 
    $errors['password2'] = "Please confirm your password."; 
  }
  if ($password_1 != $password_2) {
    $errors['password3'] = "Two passwords do not match."; 
  }

	if (strlen ($password_1)<8) {
		$errors['password4'] = "Password must be atleast 8 characters."; 
	}
	
	if (strlen ($mobile_number)<11) {
		$errors['mobilenumber1'] = "Invalid mobile number."; 
	}
	if (strlen ($mobile_number)>11) {
		$errors['mobilenumber2'] = "Invalid mobile number."; 
	}
	
	$checkUser="SELECT * from users WHERE email='$email'";
	$result= mysqli_query($db,$checkUser);
	$count = mysqli_num_rows($result);
	
	if ($count>0){
		$errors['email1'] = "Emaill already exists.";
	}
  // register user if there are no errors in the form
  if (count($errors) == 0) {
   $password = md5($password_1);//encrypt the password before saving in the database
                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
					
					 require "../Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='MacTeaPH@gmail.com';
                    $mail->Password='vymanzkrzmbkahnb';
    
                    $mail->setFrom('MacTeaPH@gmail.com', 'OTP Verification');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verification code";
                    $mail->Body="<div class='adM'>
  </div><div style='width:100%;max-width:440px;padding:0 20px'><div class='adM'>
    </div><div style='width:100%;padding:0px 0px'><div class='adM'>
      </div><a href= style='pointer-events: none; cursor: default;'><img style='width:100px;' src='https://lh6.googleusercontent.com/T9-IO-eLwlVM5xkp-EcZyo8Pan4YRgkiko-dKwqvc_-VjfbVhpYVcx8DHL55e8XeqeY=w2400' unselectable='on'>
    </a></div><div style='max-width:100%;background-color:#f1f1f1;padding:20px 16px;font-weight:bold;font-size:20px;color:rgb(22,24,35)'> Verification Code </div>
				<div style='max-width:100%;background-color:#f8f8f8;padding:24px 16px;font-size:17px;color:rgba(22,24,35,0.75);line-height:20px'>
      <p style='margin-bottom:20px'>To verify your account, enter this code in MacTea:</p>
      <p style='margin-bottom:20px;color:rgb(22,24,35);font-weight:bold'> $otp</p>
	  <p style='margin-bottom:20px'>Do not share this code with anyone</p>
      <p style='margin-bottom:20px'>If you didn't request this code, you can ignore this message.</p>  
</div></div>";
					 if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo "Register Failed, Invalid Email "?>");
                                    </script>
                                <?php
                            }else{
                                ?>
								<?php
								 if (isset($_POST['user_type'])) {
    $user_type = e($_POST['user_type']);
    $query = "INSERT INTO users (first_name, last_name,mobile_number, email, user_type, delivery_type, password) 
        VALUES('$first_name','$last_name','$mobile_number', '$email', '$user_type','None','$password')";
    mysqli_query($db, $query);
	
	 $query = "INSERT INTO mobile_number (mobile_number, email) 
        VALUES('$mobile_number', '$email')";
    mysqli_query($db, $query);
   
    header('location: login.php');
   }else{
    $query = "INSERT INTO users (first_name, last_name,mobile_number, email, user_type, delivery_type,password) 
        VALUES('$first_name','$last_name','$mobile_number', '$email', 'user','None','$password')";
    mysqli_query($db, $query);
	$query = "INSERT INTO mobile_number (mobile_number, email) 
        VALUES('$mobile_number', '$email')";
    mysqli_query($db, $query);
 
    // get id of the created user
    $logged_in_user_id = mysqli_insert_id($db);  
   }

  }?>
                                <script>
                                    alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                    window.location.replace('verification.php');
                                </script>
                                <?php
                            }
					
					


 }

 // return user array from their id
 function getUserById($id){
  global $db;
  $query = "SELECT * FROM users WHERE id=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
 }

 // LOGIN USER
 function login(){
  global $db, $email, $errors;

  // grap form values
  $email = e($_POST['email']);
  $password = e($_POST['password']);

  // make sure form is filled properly
  if (empty($email)) {
  $errors['email_login'] = "Please enter a valid email id.";
  }
  if (empty($password)) {
  $errors['pass_login'] = "Please enter your password.";
  }
  
  // attempt login if no errors on form
  if (count($errors) == 0) {
   $password = md5($password);

   $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
   $results = mysqli_query($db, $query);
   
   if (mysqli_num_rows($results) == 1) { // user found
    // check if user is admin or user
    $logged_in_user = mysqli_fetch_assoc($results);
	
    if ($logged_in_user['user_type'] == 'admin') {
	   $_SESSION['user'] = $logged_in_user;
     $_SESSION['success']  = "You are now logged in";
     header('location: ../admin/dashboard.php');    
    }elseif ($logged_in_user['user_type'] == 'staff') {
		if ($logged_in_user['status'] != '0') {
			 $_SESSION['staff_id'] = $logged_in_user['id'];
		// $_SESSION['user'] = $logged_in_user;
     $_SESSION['success']  = "You are now logged in";
     header('location: ../staff/staffHome.php');    
	} else {
	$errors['top1'] = "Please verify email, click to send verification code  <a href='EmailVerification.php'>Resend</a>";}
	}else{
		if ($logged_in_user['status'] != '0') {
		   $_SESSION['user'] = $logged_in_user;
     $_SESSION['success']  = "You are now logged in";
     header('location:../user/userHomePage.php'); 
	} else {
		$errors['top1'] = "Please verify email, click to send verification code  <a href='EmailVerification.php'>Resend</a>";}
	}
   }else {
   $errors['top'] = "Invalid email address or password, please try again.";
   }
  }
 }

 function isLoggedIn()
 {
  if (isset($_SESSION['user'])) {
   return true;
  }else{
   return false;
  }
 }

function isAdmin()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

 // escape string
 function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
 }

 function display_error() {
  global $errors;

  if (count($errors) > 0){
   echo '<div class="error">';
    foreach ($errors as $error){
     echo $error .'<br>';
    }
   echo '</div>';
  }
 }

if (isset($_POST['AddMiltkeaSeries'])) {
	AddMiltkeaSeries();
}

// REGISTER USER
function AddMiltkeaSeries(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium   =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter   =  e($_POST['oneliter']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }
  if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }
  if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, medium, large,oneliter, category,image_dir ) 
					  VALUES('$name','$medium','$large','$oneliter','1','$filename')";
			mysqli_query($db, $query);
echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddMilkteaSeries.php";
</script>
<?php
	}
}
if (isset($_POST['update'])) {
	update();
}

// REGISTER USER
function update(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $email, $mobilenumber,$username;


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$id=$_GET["id"];

	$first_name       =  e($_POST['first_name']);
	$email      =  e($_POST['email']);
	$last_name   =  e($_POST['last_name']);
	$mobile_number   =  e($_POST['mobile_number']);
	

	// form validation: ensure that the form is correctly filled
	 if (empty($first_name)) { 
   $errors['first_name'] = "Field cannot be blank.";
  }
  if (strlen ($first_name)<2) {
		$errors['first_name1'] = "Must have at least 2 letters."; 
	}
	if (is_numeric ($first_name)) {
		$errors['first_name2'] = "No numbers & special characters."; 
	}
	 if (empty($last_name)) { 
   $errors['last_name'] = "Field cannot be blank.";
  }
   if (empty($mobile_number)) { 
   $errors['mobile_number'] = "Field cannot be blank.";
  }
	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update users SET first_name='$first_name',email='$email',last_name='$last_name',mobile_number='$mobile_number' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="MyAccount.php?id=<?php echo $crow["id"]; ?>";
</script>
<?php
}
}

if (isset($_POST['updateAddress'])) {

    $streetnum = mysqli_real_escape_string($db, $_POST['streetnum']);
    $streetname = mysqli_real_escape_string($db, $_POST['streetname']);
    $barangay = mysqli_real_escape_string($db, $_POST['barangay']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $province = mysqli_real_escape_string($db, $_POST['province']);
    $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);

    $id = $_SESSION['user']['id'];

    $updateQuery = "UPDATE users SET streetnum=?, streetname=?, barangay=?, city=?, province=?, zipcode=? WHERE id=?";

    $stmt = mysqli_prepare($db, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ssssssi", $streetnum, $streetname, $barangay, $city, $province, $zipcode, $id);

    if (mysqli_stmt_execute($stmt)) {
		echo '<script>alert("Update Successfully")</script>';
    } else {
        error_log("Error updating address: " . mysqli_stmt_error($stmt));
        echo "An error occurred while updating address.";
    }

    mysqli_stmt_close($stmt);
}


if (isset($_POST['updateMobile'])) {
	updateMobile();
}

// REGISTER USER
function updateMobile(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $mobilenumber;


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	

	$id       =  e($_POST['id']);
	$mobile_number       =  e($_POST['mobile_number']);
	

	// form validation: ensure that the form is correctly filled
	 if (empty($mobile_number)) { 
   $errors['mobile_number'] = "Field cannot be blank.";
  }
  if (strlen($mobile_number)<11) { 
   $errors['mobile_number1'] = "Must be 11 digits long.";
  }
 
	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update mobile_number SET mobile_number='$mobile_number' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="MyAccount.php?id=<?php echo $crow["id"]; ?>";
</script>
<?php
}
}

if (isset($_POST['update1'])) {
	update1();
}


function update1(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $email, $mobilenumber,$username;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$first_name       =  e($_POST['first_name']);
	$last_name      =  e($_POST['last_name']);
	$email   =  e($_POST['email']);
	$mobile_number    =  e($_POST['mobile_number']);
	

	// form validation: ensure that the form is correctly filled
	
	 if (empty($first_name)) { 
   $errors['first_name'] = "Field cannot be blank.";
  }	
	 if (empty($last_name)) { 
   $errors['last_name'] = "Field cannot be blank.";
  }	
   if (empty($mobile_number)) { 
   $errors['mobile_number'] = "Field cannot be blank.";
  }	
  if (strlen ($mobile_number)<11) {
		$errors['mobilenumber1'] = "Invalid mobile number."; 
	}
	if (strlen ($mobile_number)>11) {
		$errors['mobilenumber2'] = "Invalid mobile number."; 
	}
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update users SET id='$id',first_name='$first_name',last_name='$last_name',mobile_number='$mobile_number' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="user_list.php";
</script>
<?php
}
}

if (isset($_POST['update2'])) {
	update2();
}


function update2(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $email, $mobilenumber,$username;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$first_name       =  e($_POST['first_name']);
	$last_name      =  e($_POST['last_name']);
	$email   =  e($_POST['email']);
	$mobile_number    =  e($_POST['mobile_number']);
	

	// form validation: ensure that the form is correctly filled
	
	 if (empty($first_name)) { 
   $errors['first_name'] = "Field cannot be blank.";
  }	
	 if (empty($last_name)) { 
   $errors['last_name'] = "Field cannot be blank.";
  }	
   if (empty($mobile_number)) { 
   $errors['mobile_number'] = "Field cannot be blank.";
  }	
  if (strlen ($mobile_number)<11) {
		$errors['mobilenumber1'] = "Invalid mobile number."; 
	}
	if (strlen ($mobile_number)>11) {
		$errors['mobilenumber2'] = "Invalid mobile number."; 
	}
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update users SET id='$id',first_name='$first_name',last_name='$last_name',mobile_number='$mobile_number' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="admin_list.php";
</script>
<?php
}
}

if (isset($_POST['update3'])) {
	update3();
}


function update3(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $email, $mobilenumber,$username, $branch_num;

$id=$_GET["id"];


    $first_name="";
	$last_name="";
	$email="";
	$mobile_number="";
	$branch_num="";
	

	$res=mysqli_query($db,"SELECT * FROM users where id=$id");
	while ($row = mysqli_fetch_array($res))
	{
	$first_name=$row["first_name"];
	$last_name=$row["last_name"];
	$email=$row["email"];
	$mobile_number=$row["mobile_number"];
	$branch_num = $row["branch_num"];		
	}


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$first_name       =  e($_POST['first_name']);
	$last_name      =  e($_POST['last_name']);
	$email   =  e($_POST['email']);
	$mobile_number    =  e($_POST['mobile_number']);
	$branch_num = e($_POST['branch_num']);


	// form validation: ensure that the form is correctly filled
	
	 if (empty($first_name)) { 
   $errors['first_name'] = "Field cannot be blank.";
  }	
	 if (empty($last_name)) { 
   $errors['last_name'] = "Field cannot be blank.";
  }	
   if (empty($mobile_number)) { 
   $errors['mobile_number'] = "Field cannot be blank.";
  }	
  if (strlen ($mobile_number)<11) {
		$errors['mobilenumber1'] = "Invalid mobile number."; 
	}
	if (strlen ($mobile_number)>11) {
		$errors['mobilenumber2'] = "Invalid mobile number."; 
	}
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update users SET id='$id',first_name='$first_name',last_name='$last_name',mobile_number='$mobile_number',branch_num='$branch_num' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="staff_list.php";
</script>
<?php
}
}

 if (isset($_POST['registerAdmin'])) {
  registerAdmin();
 }
 
  function registerAdmin(){
  global $db,$first_name,$last_name,$mobile_number,$email, $errors;
  // receive all input values from the form
  $first_name    =  e($_POST['first_name']);
  $last_name    =  e($_POST['last_name']);
  $mobile_number    =  e($_POST['mobile_number']);
  $email       =  e($_POST['email']);
  $password_1  =  e($_POST['password_1']);
  $password_2  =  e($_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  if (empty($first_name)) { 
   $errors['firstname'] = "Please enter your first name.";
  }
  if (empty($last_name)) { 
   $errors['lastname'] = "Please enter your last name.";
  }
  if (empty($mobile_number)) { 
    $errors['mobilenumber'] = "Please enter mobile number.";
  }
  if (empty($email)) { 
    $errors['email'] = "Please enter your email address.";
  }
  if (empty($password_1)) { 
    $errors['password'] = "Please enter your password."; 
  }
  if (empty($password_2)) { 
    $errors['password2'] = "Please confirm your password."; 
  }
  if ($password_1 != $password_2) {
    $errors['password3'] = "Two passwords do not match."; 
  }

	if (strlen ($password_1)<8) {
		$errors['password4'] = "Password must be atleast 8 characters."; 
	}
	
	if (strlen ($mobile_number)<11) {
		$errors['mobilenumber1'] = "Invalid mobile number."; 
	}
	if (strlen ($mobile_number)>11) {
		$errors['mobilenumber2'] = "Invalid mobile number."; 
	}
	
	$checkUser="SELECT * from users WHERE email='$email'";
	$result= mysqli_query($db,$checkUser);
	$count = mysqli_num_rows($result);
	
	if ($count>0){
		$errors['email1'] = "Emaill already exists.";
	}
  // register user if there are no errors in the form
  if (count($errors) == 0) {
   $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (first_name, last_name,mobile_number, email, user_type, password) 
        VALUES('$first_name','$last_name','$mobile_number', '$email', 'admin', '$password')";
    mysqli_query($db, $query);
 
echo '<script>alert("New admin added successfully")</script>';

    header('location: admin_list.php');    
   }
  }
  
 if (isset($_POST['registerStaff'])) {
  registerStaff();
 }
 
  function registerStaff(){
  global $db,$first_name,$last_name,$mobile_number,$email, $errors;
  // receive all input values from the form
  $first_name    =  e($_POST['first_name']);
  $last_name    =  e($_POST['last_name']);
  $mobile_number    =  e($_POST['mobile_number']);
  $email       =  e($_POST['email']);
  $password_1  =  e($_POST['password_1']);
  $password_2  =  e($_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  if (empty($first_name)) { 
   $errors['firstname'] = "Please enter your first name.";
  }
  if (empty($last_name)) { 
   $errors['lastname'] = "Please enter your last name.";
  }
  if (empty($mobile_number)) { 
    $errors['mobilenumber'] = "Please enter mobile number.";
  }
  if (empty($email)) { 
    $errors['email'] = "Please enter your email address.";
  }
  if (empty($password_1)) { 
    $errors['password'] = "Please enter your password."; 
  }
  if (empty($password_2)) { 
    $errors['password2'] = "Please confirm your password."; 
  }
  if ($password_1 != $password_2) {
    $errors['password3'] = "Two passwords do not match."; 
  }

	if (strlen ($password_1)<8) {
		$errors['password4'] = "Password must be atleast 8 characters."; 
	}
	
	if (strlen ($mobile_number)<11) {
		$errors['mobilenumber1'] = "Invalid mobile number."; 
	}
	if (strlen ($mobile_number)>11) {
		$errors['mobilenumber2'] = "Invalid mobile number."; 
	}
	
	$checkUser="SELECT * from users WHERE email='$email'";
	$result= mysqli_query($db,$checkUser);
	$count = mysqli_num_rows($result);
	
	if ($count>0){
		$errors['email1'] = "Emaill already exists.";
	}
  // register user if there are no errors in the form
  if (count($errors) == 0) {
   $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (first_name, last_name,mobile_number, email, user_type, password) 
        VALUES('$first_name','$last_name','$mobile_number', '$email', 'staff', '$password')";
    mysqli_query($db, $query);
 
echo '<script>alert("New admin added successfully")</script>';

    header('location: staff_list.php');    
   }

  }
  
  if (isset($_POST['updateNutellaOreoSeries'])) {
	updateNutellaOreoSeries();
}


function updateNutellaOreoSeries(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price_16oz, $price_22oz,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price_16oz      =  e($_POST['price_16oz']);
	$price_22oz   =  e($_POST['price_22oz']);
	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
	 if (empty($price_16oz)) { 
   $errors['price_16oz'] = "Field cannot be blank.";
  }	
   if (empty($price_22oz)) { 
   $errors['price_22oz'] = "Field cannot be blank.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',price_16oz='$price_16oz',price_22oz='$price_22oz',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="NutellaOreoSeries_List.php";
</script>
<?php
}
}

if (isset($_POST['updateMilkteaSeries'])) {
	updateMilkteaSeries();
}


function updateMilkteaSeries(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price_16oz, $price_22oz,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium      =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter      =  e($_POST['oneliter']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
	 if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }	
   if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }	
   if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',medium='$medium',large='$large',oneliter='$oneliter',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="MilkteaSeries_List.php";
</script>
<?php
}
}

if (isset($_POST['updateNutellaSeries'])) {
	updateNutellaSeries();
}


function updateNutellaSeries(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price_16oz, $price_22oz,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price_16oz      =  e($_POST['price_16oz']);
	$price_22oz   =  e($_POST['price_22oz']);
	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
	 if (empty($price_16oz)) { 
   $errors['price_16oz'] = "Field cannot be blank.";
  }	
   if (empty($price_22oz)) { 
   $errors['price_22oz'] = "Field cannot be blank.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',price_16oz='$price_16oz',price_22oz='$price_22oz',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="NutellaSeries_List.php";
</script>
<?php
}
}

if (isset($_POST['updateOreoSeries'])) {
	updateOreoSeries();
}


function updateOreoSeries(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price_16oz, $price_22oz,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium      =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter      =  e($_POST['oneliter']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
	 if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }	
   if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }	
   if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',medium='$medium',large='$large',oneliter='$oneliter',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="OreoSeries_List.php";
</script>
<?php
}
}

if (isset($_POST['updateFruitTeaSeries'])) {
	updateFruitTeaSeries();
}


function updateFruitTeaSeries(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price_16oz, $price_22oz,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium      =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter      =  e($_POST['oneliter']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
	 if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }	
   if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }	
   if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',medium='$medium',large='$large',oneliter='$oneliter',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="FruitTeaSeries_List.php";
</script>
<?php
}
}

if (isset($_POST['updateRefresherSeries'])) {
	updateRefresherSeries();
}


function updateRefresherSeries(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price_16oz, $price_22oz,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium      =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter      =  e($_POST['oneliter']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
	 if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }	
   if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }	
   if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',medium='$medium',large='$large',oneliter='$oneliter',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="RefresherSeries_List.php";
</script>
<?php
}
}

if (isset($_POST['updateMacteaSpecial'])) {
	updateMacteaSpecial();
}


function updateMacteaSpecial(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price_16oz, $price_22oz,$image_dir;

$id=$_GET["id"];

	    $name="";
	$large="";
	$image_dir="";

	$res=mysqli_query($db,"SELECT * FROM product where id=$id");
	while ($row = mysqli_fetch_array($res))
	{
	$name=$row["name"];
	$large=$row["large"];
	$image_dir=$row["image_dir"];

	}


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price   =  e($_POST['price']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
   if (empty($price)) { 
   $errors['price'] = "Field cannot be blank.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',price='$price',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="MacteaSpecial_List.php";
</script>
<?php
}
}


if (isset($_POST['updateMacColdBrew'])) {
	updateMacColdBrew();
}


function updateMacColdBrew(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $category,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price   =  e($_POST['price']);
	$category   =  e($_POST['category']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
   if (empty($price)) { 
   $errors['price'] = "Field cannot be blank.";
  }	
  if (empty($category)) { 
   $errors['category'] = "Select a Category.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',price='$price',category='$category',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="MacColdBrewList.php";
</script>
<?php
}
}

if (isset($_POST['updateMacLatte'])) {
	updateMacLatte();
}


function updateMacLatte(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price,$category,$image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price   =  e($_POST['price']);
	$category   =  e($_POST['category']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
   if (empty($price)) { 
   $errors['price'] = "Field cannot be blank.";
  }	
  if (empty($category)) { 
   $errors['category'] = "FSelect a Category.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',price='$price',category='$category',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="MacLatteList.php";
</script>
<?php
}
}

if (isset($_POST['updateMacSignature'])) {
	updateMacSignature();
}

function updateMacSignature(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $category, $image_dir;

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


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price   =  e($_POST['price']);
	$category   =  e($_POST['category']);

	
	if($_FILES ["new_image"]["name"] !=""){
	$filename = $_FILES ["new_image"]["name"];
	$tempname = $_FILES ["new_image"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	}
	
	else {
		$filename = $_POST ['old_image'];
	}
	// form validation: ensure that the form is correctly filled
	
	 if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }	
   if (empty($price)) { 
   $errors['price'] = "Field cannot be blank.";
  }	
  if (empty($category)) { 
   $errors['category'] = "Select a Category.";
  }	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update product SET id='$id',name='$name',price='$price',category='$category',image_dir='$filename' WHERE id='$id'";
			$result = mysqli_query($db, $query);
echo '<script>alert("Update Successfully")</script>';
	?>
<script type="text/javascript">
window.location="MacSignatureList.php";
</script>
<?php
}
}

if (isset($_POST['AddOreoSeries'])) {
	AddOreoSeries();
}

// REGISTER USER
function AddOreoSeries(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium   =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter   =  e($_POST['oneliter']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }
  if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }
  if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, medium, large,oneliter, category,image_dir ) 
					  VALUES('$name','$medium','$large','$oneliter','2','$filename')";
			mysqli_query($db, $query);
echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddOreoSeries.php";
</script>
<?php
	}
}

if (isset($_POST['AddNutellaSeries'])) {
	AddNutellaSeries();
}

// REGISTER USER
function AddNutellaSeries(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price_16oz   =  e($_POST['price_16oz']);
	$price_22oz   =  e($_POST['price_22oz']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($price_16oz)) { 
   $errors['price_16oz'] = "Field cannot be blank.";
  }
  if (empty($price_22oz)) { 
   $errors['price_22oz'] = "Field cannot be blank.";
  }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, price_16oz, price_22oz, category,image_dir ) 
					  VALUES('$name','$price_16oz','$price_22oz','3','$filename')";
			mysqli_query($db, $query);
echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddNutellaSeries.php";
</script>
<?php
	}
}

if (isset($_POST['AddNutellaOreoSeries'])) {
	AddNutellaOreoSeries();
}

// REGISTER USER
function AddNutellaOreoSeries(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price_16oz   =  e($_POST['price_16oz']);
	$price_22oz   =  e($_POST['price_22oz']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($price_16oz)) { 
   $errors['price_16oz'] = "Field cannot be blank.";
  }
  if (empty($price_22oz)) { 
   $errors['price_22oz'] = "Field cannot be blank.";
  }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, price_16oz, price_22oz, category,image_dir ) 
					  VALUES('$name','$price_16oz','$price_22oz','4','$filename')";
			mysqli_query($db, $query);
echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddNutellaOreoSeries.php";
</script>
<?php
	}
}

if (isset($_POST['AddFruitTeaSeries'])) {
	AddFruitTeaSeries();
}

// REGISTER USER
function AddFruitTeaSeries(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium   =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter   =  e($_POST['oneliter']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }
  if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }
  if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, medium, large,oneliter, category,image_dir ) 
					  VALUES('$name','$medium','$large','$oneliter','5','$filename')";
			mysqli_query($db, $query);
echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddFruitTeaSeries.php";
</script>
<?php
	}
}

if (isset($_POST['AddRefresherSeries'])) {
	AddRefresherSeries();
}

// REGISTER USER
function AddRefresherSeries(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$medium   =  e($_POST['medium']);
	$large   =  e($_POST['large']);
	$oneliter   =  e($_POST['oneliter']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($medium)) { 
   $errors['medium'] = "Field cannot be blank.";
  }
  if (empty($large)) { 
   $errors['large'] = "Field cannot be blank.";
  }
  if (empty($oneliter)) { 
   $errors['oneliter'] = "Field cannot be blank.";
  }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, medium, large,oneliter, category,image_dir ) 
					  VALUES('$name','$medium','$large','$oneliter','6','$filename')";
			mysqli_query($db, $query);
echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddRefresherSeries.php";
</script>
<?php
	}
}

if (isset($_POST['AddMacteaSpecial'])) {
	AddMacteaSpecial();
}

// REGISTER USER
function AddMacteaSpecial(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price   =  e($_POST['price']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($price)) { 
   $errors['price'] = "Field cannot be blank.";
  }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, price, category,image_dir ) 
					  VALUES('$name','$price','7','$filename')";
			mysqli_query($db, $query);
echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddMacteaSpecial.php";
</script>
<?php
	}
}

if (isset($_POST['AddMacCoffeeSeries'])) {
	AddMacCoffeeSeries();
}

// REGISTER USER
function AddMacCoffeeSeries(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $price, $image, $category;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name       =  e($_POST['name']);
	$price   =  e($_POST['price']);
	$category   =  e($_POST['category']);
	
	$filename = $_FILES ["uploadfile"]["name"];
	$tempname = $_FILES ["uploadfile"]["tmp_name"];
	$path="../product/".$filename;
	move_uploaded_file($tempname, $path);
	
	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
   $errors['name'] = "Field cannot be blank.";
  }
  if (empty($price)) { 
   $errors['price'] = "Field cannot be blank.";
  }
  if (empty($category)) { 
	$errors['category'] = "Select a category.";
   }
  if (empty($filename)) { 
   $errors['filename'] = "Please attach a image.";
  }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
			$query = "INSERT INTO product (name, price, category,image_dir ) 
					  VALUES('$name','$price','$category','$filename')";
			mysqli_query($db, $query);
			echo '<script>alert("New Product added successfully")</script>';
			// get id of the created user
					?>
<script type="text/javascript">
window.location="AddMacCoffeeSeries.php";
// <updateMacColdBrew
<?php }
if (isset($_POST['deliveryUpdate'])) {
	deliveryUpdate();
}

// REGISTER USER
function deliveryUpdate(){
	
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $delivery_type;


	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$id=$_SESSION['user']['id'];

	$delivery_type =  e($_POST['delivery_type']);
	
		// register user if there are no errors in the form
	if (count($errors) == 0) {
		
			$query = "Update users SET delivery_type='$delivery_type' WHERE id='$id'";
			$result = mysqli_query($db, $query);
	?>
<script>
     window.history.go(-2);
</script>
<?php
// header('Location: address.php');
// exit();
}
}
?>