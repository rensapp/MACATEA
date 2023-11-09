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
<style>
    .ordnow{
        background-color: black;
        color: white;
        border: 1px solid black;
        position: relative;
        z-index: 10;
        top: -60px;
    }
    .ordnow:hover{
        background-color: white;
        color: black;
    }

    @media (max-width: 1130px){
        .ordnow{
            top: -50px;
        }
    }
    @media (max-width: 880px){
        .ordnow{
            top: -40px;
        }
    }
    @media (max-width: 880px){
        .ordnow{
            top: -40px;
            transform: scale(0.7);
        }
    }
    @media (max-width: 501px){
        .ordnow{
            top: -55px;
            transform: scale(0.5);
        }
    }
</style>
<body class="d-flex flex-column min-vh-100 m-0">
    <?php include 'staffHeader.php'; ?>
    <div class="container-fluid" style="background-color: #7ED957;">
        <div class="row text-center">     
            <!-- <button type="button" class="btn w-25 ordnow fw-semibold">ORDER NOW</button> -->
            <div>
                <img src="../images/designHeader.png" width="100%" height="100%">
            </div>
        </div>
        <div class="row bg-success">
            <div class="col-12 p-0">
                <!-- <img src="https://picsum.photos/1910/500"> -->
                <img src="../images/macteaEdited.png" width="100%" height="100%">
            </div>            
        </div>
    </div>
</body>
</html>