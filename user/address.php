<?php
include '../user/userHeader.php';
include '../includes/config.php';

$id = $_SESSION['user']['id'];

if (!isLoggedIn()) {
  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
    header('location:../login_page/login.php');
  }
}

// $streetname="";
// $streetnum="";
// $barangay="";
// $city="";
// $province="";
// $zipcode="";

$result = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$result->execute([$id]);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  $streetname = $row["streetname"];
  $streetnum = $row["streetnum"];
  $barangay = $row["barangay"];
  $city = $row["city"];
  $province = $row["province"];
  $zipcode = $row["zipcode"];
}

if (isset($_POST['updateAdd'])) {

  $streetname = $_POST['streetname'];
  $streetname = filter_var($streetname, FILTER_SANITIZE_STRING);
  $streetnum = $_POST['streetnum'];
  $streetnum = filter_var($streetnum, FILTER_SANITIZE_NUMBER_INT);
  $barangay = $_POST['barangay'];
  $barangay = filter_var($barangay, FILTER_SANITIZE_STRING);
  $city = $_POST['city'];
  $city = filter_var($city, FILTER_SANITIZE_STRING);
  $province = $_POST['province'];
  $province = filter_var($province, FILTER_SANITIZE_STRING);
  $zipcode = $_POST['zipcode'];
  $zipcode = filter_var($zipcode, FILTER_SANITIZE_NUMBER_INT);

  $update = ("UPDATE users SET streetname=?, streetnum=?, barangay=?, city=?, province=?, zipcode=? WHERE id=?");
  $conn->prepare($update)->execute([$streetname, $streetnum, $barangay, $city, $province, $zipcode, $id]);

  $message[] = 'Updated Successfully!';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Address</title>
  <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script>
    function getUserLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      var userLat = position.coords.latitude;
      var userLng = position.coords.longitude;

      // Display the user's latitude and longitude on the page
      document.getElementById('user_lat').textContent = "Latitude: " + userLat;
      document.getElementById('user_lng').textContent = "Longitude: " + userLng;

      // Send the latitude and longitude to the server for storing in the database
      saveUserLocation(userLat, userLng);
    }

    function saveUserLocation(latitude, longitude) {
      $.ajax({
        type: "POST",
        url: "../user/save_location.php",
        data: {
          latitude: latitude,
          longitude: longitude
        },
        success: function(response) {
          window.location.href = "../user/nearest_branch.php";
          // console.log(response);
        },
        error: function(xhr, status, error) {
          // Handle the error if the request fails
          console.log(error);
        }
      });
    }
  </script> -->
  <script>
  function getUserLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, handleGeolocationError);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    var userLat = position.coords.latitude;
    var userLng = position.coords.longitude;

    document.getElementById('user_lat').textContent = "Latitude: " + userLat;
    document.getElementById('user_lng').textContent = "Longitude: " + userLng;

    saveUserLocation(userLat, userLng);
  }

  function handleGeolocationError(error) {
    // Handle geolocation errors here (e.g., display an error message)
    console.error("Geolocation error:", error.message);
    alert("Error accessing geolocation. Please check your browser settings.");
  }

  function saveUserLocation(latitude, longitude) {
    $.ajax({
      type: "POST",
      url: "../user/save_location.php",
      data: {
        latitude: latitude,
        longitude: longitude
      },
      success: function(response) {
        window.location.href = "../user/nearest_branch.php";
      },
      error: function(xhr, status, error) {
        // Handle the error if the request fails
        console.error("AJAX Error:", status, error);
        alert("Failed to save location. Please try again later.");
      }
    });
  }
</script>

</head>

<style>
  .btn {
    margin: 0;
    width: 100%
  }
  .hidden{
    display: none;
  }
</style>

<body>
  <!-- <div class="box-container" style="display: grid; grid-template-columns: repeat(auto-fit, 10rem); gap:0px; justify-content: center; margin-top: 40px;">
    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="Milktea_series.php">
              <img src="../product/Milktea_Series.jpg" />
            </a>
          </span>
        </div>
        <p style="height: 200px;padding-top: 120px; font-size: 15px; width: 102px;"> Milktea Series </p>
      </div>
    </ul>

    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="Oreo_series.php">
              <img src="../product/Oreo_Series.jpg" />
            </a>
          </span>
        </div>
        <p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 8px;"> Oreo Series </p>
      </div>
    </ul>

    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="Nutella_series.php">
              <img src="../product/Nutella_Series.jpg" />
            </a>
          </span>
        </div>
        <p style="height: 200px;padding-top: 120px; font-size: 15px; width: 101px;"> Nutella Series</p>
      </div>
    </ul>

    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="NutellaOreo_series.php">
              <img src="../product/NutellaOreo_Series.png" />
            </a>
          </span>
        </div>
        <p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 8px;width: 101px;"> Nutella Oreo Series </p>
      </div>
    </ul>

    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="Fruittea_series.php">
              <img src="../product/FruitTea_Series.jpg" />
            </a>
          </span>
        </div>
        <p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 8px;width: 101px;"> Fruit Tea / Yakult </p>
      </div>
    </ul>

    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="Refresher_series.php">
              <img src="../product/Refresher_series.jpg" />
            </a>
          </span>
        </div>
        <p style="height: 200px;padding-top: 120px; font-size: 15px; padding-left: 19px;width: 101px;"> Refresher </p>
      </div>
    </ul>

    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="MacteaSpecial.php">
              <img src="../product/Mactea_Special.jpg" />
            </a>
          </span>
        </div>
        <p style="height: 200px;padding-top: 120px; font-size: 15px;width: 116px;"> Mactea Special </p>
      </div>
    </ul>

    <ul class="one">
      <div class="main" style="width: 100px; height: 200px;">
        <div class="box">
          <span class="circle-image">
            <a href="MacCoffee_series.php">
              <img src="../product/MacCoffee.jpg" />
            </a>
          </span>
        </div>
        <p style="text-align: center; height: 200px;padding-top: 120px; "> Mac Coffee </p>
      </div>
    </ul>
  </div> -->

  <div class="container mt-3" style="border: 1px solid black; padding: 2rem; border-radius: 15px; margin-bottom:2rem;">
    <form action="" method="post">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="text-center" style="margin-bottom: 2rem;">Please Enter your Full Address</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <span>Street Number :</span>
          <input type="number" name="streetnum" placeholder="e.g. 423" min="0" class="form-control" value="<?php echo $streetnum; ?>">
        </div>
        <div class="col-lg-6">
          <span>Street Name :</span>
          <input type="text" name="streetname" placeholder="e.g. Oliver St." class="form-control" value="<?php echo $streetname; ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <span>Barangay :</span>
          <input type="text" name="barangay" placeholder="e.g. San Vicente" class="form-control" value="<?php echo $barangay; ?>" required>
        </div>
        <div class="col-lg-6">
          <span>City :</span>
          <input type="text" name="city" placeholder="e.g. San Pedro" class="form-control" value="<?php echo $city; ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <span>Province :</span>
          <input type="text" name="province" placeholder="e.g. Laguna" class="form-control" value="<?php echo $province; ?>" required>
        </div>
        <div class="col-lg-6">
          <span>Zip Code :</span>
          <input type="number" min="0" name="zipcode" placeholder="e.g. 4023" class="form-control" value="<?php echo $zipcode; ?>">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col d-none d-lg-block d-md-block">
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 d-md-block">
          <input type="submit" name="updateAdd" class="btn btn-primary" value="Update">
        </div>
        <div class="col d-none d-lg-block d-md-block">
		    </div>
      </div>
    </form>
    <div class="row" >
      <div class="col d-none d-lg-block d-md-block">
		</div>
      <div class="col-lg-4 col-md-5">
        <button type="button" class="btn btn-dark"  onclick="window.location.href ='../user/cart.php'">Back</button>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-12">
        <button type="button" class="btn btn-dark mt-2 mt-lg-0 mt-md-0" class="btn btn-block" onclick="validateAndProceed()">Next</button>
      </div>
      <div class="col d-none d-lg-block d-md-block">
        <p id="user_lat" class="hidden"></p>
        <p id="user_lng" class="hidden"></p>
		</div>
    </div>
  </div>

  <script>
  function validateAndProceed() {
    var streetnum = document.getElementsByName('streetnum')[0].value;
    var streetname = document.getElementsByName('streetname')[0].value;
    var barangay = document.getElementsByName('barangay')[0].value;
    var city = document.getElementsByName('city')[0].value;
    var province = document.getElementsByName('province')[0].value;

    if (streetnum === '' || streetname === '' || barangay === '' || city === '' || province === '') {
      alert('Please fill in all required fields before proceeding.');
    } else {
      getUserLocation();
    }
  }
</script>
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous">
</script>  
</body>

</html>