<?php
@include '../includes/config.php';
require_once '../includes/functions.php';

$staff_id = $_SESSION['staff_id'];

if (!isset($staff_id)) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login_page/login.php');
}

if(isset($_POST['add_to_cart'])){
    //customer_id,product_name

   $customer_id = $_POST['customer_id'];
   $product_name = $_POST['product_name'];
   $price_arr = explode(",", $_POST['price']);
   $price = $price_arr[0];
   $size = $price_arr[1];
   $addons_arr = explode(",", $_POST['addons']);
   $addons = $addons_arr[0];
   $sinker = $addons_arr[1];
   $product_quantity = 1;
   $total_price = $price + $addons; 

    $insert_cart = $conn->prepare("INSERT INTO `cart`(customer_id, name, price, size, addons, sinker, quantity, total_price) VALUES(?,?,?,?,?,?,?,?)");
    $insert_cart->execute([$customer_id, $product_name, $price, $size, $addons, $sinker, $product_quantity, $total_price]);
    $message[] = 'added to cart!';

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Cart</title>
</head>

<body>
    
<div class="modal fade" id="addToCart" tabindex="-1" aria-labelledby="addToCartLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="addToCartLabel">LABEL</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="addToCart.php">
                <div class="container-fluid">
                    <div class="row d-flex ">        
                            <div class="col-md-6 p-2 border rounded border-success">
                                <div class="form-group">
                                <?php
                                    $sizes = array("16oz", "22oz", "medium", "large", "oneliter");
                                    for ($i = 0; $i < count($sizes); $i++) {
                                        if ($fetch_products["$sizes[$i]"] > 0) {
                                    ?>
                                        <input type="radio" name="price" value="<?=$fetch_products["$sizes[$i]"]?>,<?=$sizes[$i]?>" checked> ₱<?php echo $fetch_products[$sizes[$i]]." ( ".$sizes[$i]." )"?> <br>
                                    <?php
                                        } else {
                                            //no display
                                        }
                                    }
                                ?>
                                </div>
                            </div>

                            <input type="hidden" name="customer_id" value="<?= $staff_id ?>">
					        <input type="hidden" name="product_name" id="inputName">

                            <div class="col-md-6 p-2 border rounded border-success">
                                <div class="form-group">
                                    <label>Awesome Add Ons</label> <br>
                                    <input type="radio" name="addons" value="0, No Sinker" checked> No Sinker <br>
                                    <input type="radio" name="addons" value="15, Pearl"> Pearl +₱15 <br>
                                    <input type="radio" name="addons" value="15, Nata de coco"> Nata de coco +₱15 <br>
                                    <input type="radio" name="addons" value="15, Coffee jelly"> Coffee jelly +₱15 <br>
                                    <input type="radio" name="addons" value="15, Popping Boba"> Popping Boba +₱15 <br>
                                    <input type="radio" name="addons" value="15, Egg Pudding"> Egg Pudding +₱15 <br>
                                    <input type="radio" name="addons" value="15, Oreo Crushes "> Oreo Crushes +₱15 <br>
                                    <input type="radio" name="addons" value="30, Cream Cheese"> Cream Cheese +₱30 <br>
                                    <input type="radio" name="addons" value="30,  Nutella"> Nutella +₱30 <br>
                                </div>
                            </div>
                        
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="add_to_cart" class="btn btn-success">Add to Cart</button>
            </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
