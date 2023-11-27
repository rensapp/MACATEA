<?php
include '../user/userheader.php';
require_once "../includes/connection.php";

$id = $_SESSION['user']['id'];

if (!isLoggedIn()) {
    if (!isset($_SESSION['user'])) {
        header('Location: ../login_page/login.php');
        exit();
    }
}

$userQuery = "SELECT latitude, longitude FROM users WHERE id = '$id'";
$userResult = mysqli_query($connect, $userQuery);

if ($userResult) {
    $userData = mysqli_fetch_assoc($userResult);
    $userLat = $userData['latitude'];
    $userLng = $userData['longitude'];

    $query = "SELECT br_id, br_name, br_address, br_latitude, br_longitude,
              (6371 * ACOS(COS(RADIANS($userLat)) * COS(RADIANS(br_latitude)) * COS(RADIANS(br_longitude) - RADIANS($userLng)) + SIN(RADIANS($userLat)) * SIN(RADIANS(br_latitude))))
              AS distance
              FROM branches
              ORDER BY distance ASC";

    $result = mysqli_query($connect, $query);

    ?>

    <?php
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $stmt->execute([$id]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $branch_num = $row["branch_num"];
    }

    if (isset($_POST['updateBr'])) {
        $branch_num = $_POST['branch_num'];
        $branch_num = filter_var($branch_num, FILTER_SANITIZE_NUMBER_INT);

        $update = "UPDATE users SET branch_num = ? WHERE id = ?";
        $stmt = $conn->prepare($update);
        $stmt->execute([$branch_num, $id]);

        echo '<script>window.location.href="../user/checkout.php";</script>';
        exit();
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
        <title>Nearest branch</title>
        <style>
            .h {
                margin-left: 10px;
                margin-top: 5px;
            }
            .i {
                border: 1px solid black;
                border-radius: 10px;
                margin: 10px;
                cursor: pointer;
            }
            .i:hover {
                background-color: lightgreen;
            }
            .i.clicked-div {
                background-color: lightgreen;
            }
            .btn {
                margin: 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center"  id="branch-id-text" style="margin-bottom: 0.5rem; color: green;"></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center" style="margin-bottom: 1rem;">Pick the Nearest Branch</h1>
                </div>
            </div>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $branchDistance = number_format($row['distance'], 2);
                ?>

                <div class="i" onclick="handleClick(this,'<?php echo $row['br_id']; ?>', '<?php echo $row['br_name']; ?>')">
                    <p class="h">Branch ID: <?php echo $row['br_id']; ?></p>
                    <p class="h">Branch Name: <?php echo $row['br_name']; ?></p>
                    <p class="h">Branch Address: <?php echo $row['br_address']; ?></p>
                    <p class="h">Distance: <?php echo $branchDistance; ?> km</p>
                </div>

            <?php
            }
            ?>

            <div class="row">
                <div class="col">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <button type="button" class="btn btn-dark" onclick="window.location.href = 'address.php'">Back</button>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-2 mt-lg-0 mt-md-0">
                    <form action="" method="post">
                        <input type="hidden" id="branch-id" class="text-center" style="color: green;" name="branch_num" readonly>
                        <button type="submit" name="updateBr" id="nextButton" class="btn btn-dark" disabled>Next</button>
                    </form>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <script>
        var selectedDiv = null;
        var nextButton = document.getElementById('nextButton');

        function handleClick(element, brId, brName) {
            if (selectedDiv !== null) {
                selectedDiv.classList.remove("clicked-div");
            }
        element.classList.add("clicked-div");
        selectedDiv = element;

        var branchIdElement = document.getElementById('branch-id');
        branchIdElement.value = brId;
        var branchIdElement2 = document.getElementById('branch-id-text');
        branchIdElement2.textContent = "Successfully Selected '" + brName + " Branch'";

        nextButton.removeAttribute('disabled');
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
    </body>
    </html>

    <?php
    mysqli_free_result($result);
} else {
    // Display an error message or take appropriate action
}

mysqli_close($connect);

function calculateDistance($userLat, $userLng, $branchLat, $branchLng) {
    $earthRadius = 6371; // in kilometers

    $latDiff = deg2rad($branchLat - $userLat);
    $lngDiff = deg2rad($branchLng - $userLng);

    $a = sin($latDiff / 2) * sin($latDiff / 2) +
         cos(deg2rad($userLat)) * cos(deg2rad($branchLat)) *
         sin($lngDiff / 2) * sin($lngDiff / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;
    return $distance;
}
?>