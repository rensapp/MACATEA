    <?php
    @include '../includes/config.php';
    include('../includes/functions.php');;

        $staff_id = $_SESSION['staff_id'];

    if(!isset($staff_id)){
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login_page/login.php');
    }

    $select_id= $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $select_id->execute([$staff_id]);
    $fetch_id = $select_id->fetch(PDO::FETCH_ASSOC);
    $staff_brNum = $fetch_id['branch_num'];

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>staff POS</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" href="../images/mactea.png">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php include 'staffHeader.php'; ?>

        <div class="container-fluid p-0">
            <h1 class="title p-2  text-center fw-bold bg-dark text-white border-top border-1 border-light">POS-System</h1>
            <div class="row">
                <div class="col-2">
                    <ul class="list-unstyled p-3">
                        <li class="h4 text-center border-bottom border-dark mb-3">Menu</li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" href="staffPos.php?category=1">Milktea Series</a></li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" href="staffPos.php?category=2">Oreo Series</a></li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" href="staffPos.php?category=3">Nutella Series</a></li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" href="staffPos.php?category=4">Nutella Oreo Series</a></li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" class="text-decoration-none text-success fw-bold" href="staffPos.php?category=5">Fruit Tea / Yakult</a></li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" href="staffPos.php?category=6">Refresher</a></li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" href="staffPos.php?category=7">Mactea Special</a></li>
                        <li class="my-2"><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold h5 text-decoration-none" href="staffPos.php?category=8">Mac Coffee</a></li>
                    </ul>
                </div>
                
                <div class="col-5">
                    <div class="row">
                    <?php
                        $category_name = $_GET['category'];
                        $select_products = $conn->prepare("SELECT * FROM `product` WHERE category = ?");
                        $select_products->execute([$category_name]);
                        if($select_products->rowCount() > 0){
                            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                        <div class="col-lg-4 col-md-6 p-2 box border rounded  border-primary text-center">
                        <form action="" class="box" method="POST">
                            <div class="name p-2"><?= $fetch_products['name']; ?></div>
                            <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                            <input type="hidden" name="customerId" value="<?= $staff_id ?>">
                            <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
                            <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
                            <button type="button" class="btn btn-success btn-sm add-to-cart-btn"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#addToCart" 
                                    data-pidm="<?= $fetch_products['name']; ?>">
                                Add to Cart
                            </button>
                        </form>
                        </div>
                        <?php
                            include 'addToCart.php';
                                }
                            }else{
                                echo '<p class="empty h1 fw-bold text-center mt-2">no products available!</p>';
                            }
                        ?>
                    </div>
                </div>

                <div class="col-5">
                    <div class="customer-info p-2">
                        <p class="h4 text-center border-bottom border-dark mb-3">Customer Info</p>
                        <input type="text" class="p-1 mb-1 rounded" id="cName" placeholder="Customer Name">
                        <input type="number" class="p-1 mb-1 rounded" id="cPhone" placeholder="Mobile Number">
                        <input type="email" class="p-1 mb-1 rounded" id="cEmail" placeholder="Email Address">
                        <input type="hidden" class="p-1 mb-1 rounded" id="cAddress" placeholder="Home Address">
                        <input type="hidden" id="cBrNum" value="<?= $staff_brNum ?>">
                    </div>
                    <div class="order-list p-1">
                        <p class="h4 text-center border-bottom border-dark mb-3">Order List</p>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Add-ons</th>
                                                <th scope="col">Add-ons Price</th>
                                                <th scope="col" class="text-center">Total</th>
                                                <th scope="col" style="border-radius: 0 15px 0 0;">
                                                    <a href ="staffAction.php?clear=<?php echo $staff_id?>" onClick="return confirm('Are you sure to clear your cart?');" class="btn btn-sm btn-danger"style="font-weight: bold;">Empty Cart</a>   
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select_stmt=$conn->prepare("SELECT * FROM `cart` WHERE customer_id = $staff_id ");
                                            $select_stmt->execute();
                                            $grand_total = 0;
                                            while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                            <tr>
                                                <td><?php echo $row["name"];?></td>
                                                <td><?php echo $row["size"];?></td>
                                                <td>₱<?php echo number_format($row["price"],2);?></td>
                                                <td><input type="number" class="form-control itemQty" min="1" value="<?php echo $row['quantity'] ?>" style="width:75px;"></td>
                                                <td><?php echo $row["sinker"];?></td>
                                                <td>₱<?php echo number_format($row["addons"],2);?></td>
                                                <td class="text-center">₱<?php echo number_format($row["total_price"],2); ?></td>
                                                <td class="text-right">
                                                    <a href="staffAction.php?remove=<?php echo $row["oid"];?>" onclick="return confirm('are you sure you want to remove this item?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td> 
                                                <input type="hidden" class="pid" value="<?php echo $row["oid"];?>">
                                                <input type="hidden" class="pprice" value="<?php echo $row["price"];?>">
                                                <?php $grand_total +=$row["total_price"];?> 
                                            </tr>   
                                            <?php 
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"><strong>Total price</strong></td>
                                                <td class="text-center border border-dark">₱<strong><?php echo number_format($grand_total,2);?></strong></td>
                                                <!-- <td><a href="checkout.php" class="btn btn-md btn-block btn-success text-uppercase "> Checkout</a></td> -->
                                                <!-- Button trigger modal -->
                                                <td>
                                                    <button type="button" class="btn btn-success text-uppercase placeOrderBtn <?=($grand_total > 1 )?"":"disabled";?>" data-bs-toggle="modal" data-bs-target="#confirmCheckout">
                                                    place order
                                                    </button>
                                                </td>
                                                
                                                <?php
                                                
                                                    $select_staffCart = $conn->prepare("SELECT * FROM `cart` WHERE customer_id = ?");
                                                    $select_staffCart->execute([$staff_id]);
                                                    if($select_staffCart->rowCount() > 0){
                                                    while($fetch_staffCart = $select_staffCart->fetch(PDO::FETCH_ASSOC)){ 
                                                            require_once 'staffCheckoutConfirm.php'; 
                                                    }} else {
                                                        //none
                                                    }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>    

                    </div>
                </div>
            </div>
        </div>


<script>
    $(document).ready(function() {
    $('.add-to-cart-btn').click(function() {
        var pidm = $(this).data('pidm'); // Get the data-pid value from the button
        
        $('#addToCartLabel').text(pidm); // Set the data-pid value in the modal
        $('#inputName').val(pidm);
        
    });
});

$(document).ready(function() {
    $('.placeOrderBtn').click(function() {

        var cName = $('#cName').val();
        var cPhone = $('#cPhone').val();
        var cEmail = $('#cEmail').val();
        var cAddress = $('#cAddress').val();
        var cBrNum = $('#cBrNum').val();

        $('#checkoutConfirmName').text('Name: ' + cName);
        $('#checkoutConfirmPhone').text('Phone: ' + cPhone);
        $('#checkoutConfirmEmail').text('Email: ' + cEmail);
        $('#checkoutConfirmAddress').text('Address: ' + cAddress);

        $('#inputNames').val(cName);
        $('#inputPhone').val(cPhone);
        $('#inputEmail').val(cEmail);
        $('#inputAddress').val(cAddress);
        $('#inputBrNum').val(cBrNum);
        
    });
});


     $(document).ready(function(){
        $(".itemQty").on("change", function(){

            var hide = $(this).closest("tr");
            
            var id = hide.find(".pid").val();
            var price = hide.find(".pprice").val();
            var qty = hide.find(".itemQty").val();
            //location.reload(true);
            $.ajax({
                url:"staffAction.php",
                method:"post",
                cache:false,
                data:{pqty:qty, pid:id, pprice:price},
                success:function(response) {
                    console.log(response);
                },
                complete:function(){
                    location.reload(true);
                }
            });
        });
    });
</script>

    </body>
    </html>