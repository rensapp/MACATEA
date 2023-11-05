<?php include '../user/userHeader.php'; ?>

<?php
	$id=$_SESSION['user']['id'];

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

<?php
require_once "../includes/config.php";

$deliveryFee = 30;
$grand_total = 0;
$allItems = "";
$items = array();

$select_stmt=$conn->prepare("SELECT CONCAT(name, '(', quantity,')',' -',sinker)  AS ItemQty, total_price FROM cart WHERE customer_id = ?");
$select_stmt->execute([$id]);

while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) {
    $grand_total = $grand_total + $row["total_price"];
    $items[] = $row["ItemQty"];
}
$allItems = implode(",  ",$items,);

$result=$conn->prepare("SELECT * FROM `users` WHERE id = ?");
$result->execute([$id]);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $name = $row["first_name"]." ".$row["last_name"];
    $email = $row["email"];
    $phone = $row["mobile_number"];
	$mod = $row ["delivery_type"];
    $address = $row['streetnum']." ".$row['streetname']." ".$row['streetnum']." ".$row['barangay']." ".$row['city']." ".$row['zipcode']." ".$row['province'];
    $branch_num = $row["branch_num"];
  }

?>

<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
            crossorigin="anonymous">
	</head>
<style>
    .input-style{
        border: none;
        background: transparent;
        width: 80%;
    }
</style>
<body>
	
<div class="container mt-3">
    <div class="row">
    <form method="POST" id="placeOrder">
        <div class="col-12">
            <h1 class="text-center">Complete your order!</h1>
        </div>
    </div>
            <?php
                $count_cart_items = $conn->prepare("SELECT SUM(quantity) as total_quantity FROM cart WHERE customer_id = ?");
                $count_cart_items->execute([$id]);
                $total_quantity = $count_cart_items->fetch(PDO::FETCH_ASSOC)['total_quantity'];
            ?>
            <label for="products" class="h4">Products <span>(<?= $total_quantity; ?>) : </label>
            <textarea id="products" name="products" rows="2" style="resize: none; width: 100%; max-width: 100%;" class="border-0" readonly><?php echo $allItems ?></textarea>
        <?php
        if($mod == "Deliver"){ ?>
        <h4 class="mb-2">Delivery Fee: ₱
            <input type="number" name="deliveryFee" class="input-style" value="<?= $deliveryFee ?>" readonly>
        </h4>
        <?php 
        $grand_total = $grand_total + $deliveryFee;
        } ?>

        <h4 class="mb-2">Total Amount to Pay: ₱
            <input type="number" name="grand_total" class="input-style" value="<?php echo $grand_total ?>" readonly>
        </h4>

        <input type="hidden" name="clear" value="<?php echo $id ?>">
        <input type="hidden" name="status" value="<?php echo"Pending"; ?>">

        <div class="form-group mb-2">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?= $name ?>" required>
        </div>

        <div class="form-group mb-2">
            <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="<?= $email ?>" required>
        </div>

        <div class="form-group mb-2">
            <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?= $phone ?>" required>
        </div>

        <div class="form-group mb-2">
            <textarea type="text" name="address" class="form-control" row="3" cols="10" placeholder="Enter Complete Address" required><?= $address?></textarea>
        </div>
        <h4 class="text-center lead">Select Payment Method</h4>
        <div class="form-group mb-3">
            <select name="pmode" class="form-control" required>
                <option value="" selected disabled>-- Select Payment --</option>
                <option value="cod">Cash On Delivery</option>
                <option value="online">Pay Online</option>
            </select>
        </div>

        <input type="hidden" name="delivery_reset" class="form-control" value="None" >
        <input type="hidden" name="delivery_type" class="form-control" value="<?= $mod ?>" >
        <input type="hidden" name="product_quantity" class="form-control" value="<?= $total_quantity ?>" >
        <input type="hidden" name="order_branch" class="form-control" value="<?= $branch_num ?>" >
        <input type="hidden" name="payment_status" class="form-control" value="Pending" >

        <div class="row">
            <div class="col d-none d-lg-block d-md-block"></div>
            <div class="col-lg-5 col-md-5 col-sm-12 mt-2 mt-lg-0 mt-md-0">
                <button type="button" style="width: 100%;" class="btn btn-danger btn-block" onclick="window.location.href = '../user/nearest_branch.php'">Cancel</button>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <input type="submit" name="submit" class="btn btn-success btn-block" value="Place Order" style="margin: 0; width: 100%;">
            </div>
            <div class="col d-none d-lg-block d-md-block"></div>
        </div>
    </form> 
</div>


<script src="js/jquery-3.2.1.min.js"></script>	

<script type="text/javascript">
    $(document).ready(function(){
        $("#placeOrder").submit(function(e){

            e.preventDefault();

            $.ajax({
                url: "action.php",
                method: "POST",
                data: $("form").serialize()+"&action=order",
                success: function(response){
                    $("#showOrder").html(response);
                    window.location.href = "../user/orders.php";
                }   
            });
        });
    });
</script>


<?php
// Include database connection and any other necessary configurations

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Retrieve form data
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $phone = $_POST["phone"];
//     $address = $_POST["address"];
//     $pmode = $_POST["pmode"];
//     // ... other form fields

//     // Insert data into the database
//     // Perform your database insert query here

//     // Prepare the response
//     $response = array("status" => "success", "message" => "Order placed successfully");

//     // Send response back to AJAX request
//     header("Content-Type: application/json");
//     echo json_encode($response);
// } else {
//     // Handle non-POST requests
//     echo "Invalid request method";
// }
?>
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous">
</script> 

</body>	
</html>
