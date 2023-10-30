<?php
include '../includes/config.php';
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
    <title>Rewards</title>
    <link rel="icon" href="../images/mactea.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include 'staffHeader.php'; ?>

    <div class="container">
        <div class="row mt-4">
            <div class="col-10 ">
                <form action="../staff/staffCoupSearch.php" class="d-inline" name="form1" method="post">
                    <input type="text"  id="submit" placeholder="Search Coupon Code" name="codeSearch" class="w-50 p-2">
                    <button type="submit" name="search" class="btn btn-primary">SEARCH</button>
                </form>
                <form action="../staff/sRewards.php" class="d-inline" method="post" class="pull-right">
                    <button type="submit" name="reset" class="btn btn-danger">RESET</button>
                </form>
            </div>
        </div>

        <table class="table table-hover mt-3" >
            <thead>
                <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Points</th>
                <th scope="col">Code</th>
                <th scope="col">Claim</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM rewards";
                    $result = $conn->query($sql);
                        
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row["customer_id"] . "</td>";
                            echo "<td>" . $row["points"] . "</td>";
                            echo "<td>" . $row["code"] . "</td>";

                            $coupID = $row["id"];
                            $points = $row["points"];

                            if($points >= 10){
                                echo '<td>
                                <a href="staffClaim.php?id=' . $row["id"] . '">
                                    <button type="button" class="btn btn-success">Claim</button>
                                </a></td>';
                            }else{
                                echo '<td><button type="button" class="btn btn-danger" disabled>Claim</button></td>';
                            }         
                            echo "</tr>";
                        }
                    } else {
                        echo "There are no results.";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>