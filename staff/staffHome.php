<?php
@include '../includes/config.php';
include('../includes/functions.php');;

	$staff_id = $_SESSION['staff_id'];

if(!isset($staff_id)){
     $_SESSION['msg'] = "You must log in first";
    header('location: ../login_page/login.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Home</title>
    <link rel="icon" href="../images/mactea.png">
</head>
<body>
    <?php include 'staffHeader.php'; ?>
    <div class="container p-5">
        <div class="row p-5">
            <div class="col-12 p-5">
                <button onclick="logout()" class="btn btn-dark text-white text-uppercase btn-lg">logout</button>
            </div>
        </div>
    </div>
    <script>
        function logout(){
            window.location.href="../login_page/login.php?logout='1'"
        }
    </script>
</body>
</html>