<?php
require_once "../includes/functions.php";

$id=$_SESSION['user']['id'];

if (!isLoggedIn()) {
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
		header('location:../login_page/login.php');
	}
}

if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

    $updateQuery = "UPDATE users SET latitude = '$latitude', longitude = '$longitude' WHERE id = '$id'";
    $result = mysqli_query($db, $updateQuery);

    if ($result) {
      echo "Location updated successfully!";
    } else {
      echo "Error updating location.";
    }
} else {
  echo "Latitude and longitude values are missing.";
}

mysqli_close($db);
?>