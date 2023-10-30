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

<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>
<body>

<div class="container" style="padding: 20px;">
    <div class="row">
        <h2>My Cart</h2>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thread>
                        <tr>
                            <th scope="col" style="border-radius: 15px 0 0 0;">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Add-ons</th>
							<th scope="col">Add-ons Price</th>
                            <th scope="col" class="text-center">Total Price</th>
                            <th scope="col" style="border-radius: 0 15px 0 0;" class="text-center">
                                <a href ="action.php?clear=<?php echo $id?>" onClick="return confirm('Are you sure to clear your cart?');" class="btn btn-danger"style="font-weight: bold;">Empty Cart</a>   
                            </th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php
                        require_once "../includes/config.php";
                        $select_stmt=$conn->prepare("SELECT * FROM `cart`, `users` WHERE customer_email = email AND customer_id = $id ");
                        $select_stmt->execute();
                        $grand_total = 0;
                        while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                        <tr>
                            <td><img src="../product/<?php echo $row["image_dir"]; ?>" width="50" height="50"/></td>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["size"];?></td>
                            <td>₱<?php echo number_format($row["price"],2);?></td>
                            <td><input type="number" class="form-control itemQty" min="1" value="<?php echo $row['quantity'] ?>" style="width:75px;"></td>
                            <td><?php echo $row["sinker"];?></td>
							 <td>₱<?php echo number_format($row["addons"],2);?></td>
                            <td class="text-center">₱<?php echo number_format($row["total_price"],2); ?></td>
                            <td class="text-center">
                                <a href="action.php?remove=<?php echo $row["oid"];?>" onclick="return confirm('are you sure you want to remove this item?');" class="btn btn-danger" style="width: 50%"><i class="fa fa-trash"></i></a>
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
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-center">₱<?php echo number_format($grand_total,2); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-center" style="border:1px solid black">₱<strong><?php echo number_format($grand_total,2);?></strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a href="NutellaOreo_series.php" class="btn btn-warning mt-2 mt-lg-0 mt-md-0 mb-2 mb-lg-0 mb-md-0" style="width: 100%;"><i class="fa fa-shopping-cart"></i> ADD MORE </a>
                </div>
                <div class="col-sm-12 col-md-6" text-right>
                    <a href="address.php" class="btn btn-md btn-block btn-success text-uppercase <?=($grand_total > 1 )?"":"disabled";?>" style="width: 100%;"> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	

<script type="text/javascript">
    $(document).ready(function(){
        $(".itemQty").on("change", function(){

            var hide = $(this).closest("tr");
            
            var id = hide.find(".pid").val();
            var price = hide.find(".pprice").val();
            var qty = hide.find(".itemQty").val();
            //location.reload(true);
            $.ajax({
                url:"action.php",
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





