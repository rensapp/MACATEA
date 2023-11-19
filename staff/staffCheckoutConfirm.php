    <?php
    @include '../includes/config.php';  

        $staff_id = $_SESSION['staff_id'];

    if(!isset($staff_id)){
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login_page/login.php');
    }

    $grand_total = 0;
    $allItems = "";
    $items = array();

    $select_stmt=$conn->prepare("SELECT CONCAT(name, '(', quantity,')',' -',sinker)  AS ItemQty, total_price FROM cart WHERE customer_id = ?");
    $select_stmt->execute([$staff_id]);

    while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) {
      $grand_total = $grand_total + $row["total_price"];
      $items[] = $row["ItemQty"];
    }
    $allItems = implode(",  ",$items,);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Confirmation</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="confirmCheckout" tabindex="-1" role="dialog" aria-labelledby="checkoutConfirm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="checkoutConfirm">Order Confirmation</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="checkoutConfirmName">Name:</p>
        <p id="checkoutConfirmPhone">Phone:</p>
        <p id="checkoutConfirmEmail">Email:</p>
        <!-- <p id="checkoutConfirmAddress">Address:</p> -->
        <p>Total Products: <?php echo $allItems ?></p>
        <p>Total Price: ₱<?php echo number_format($grand_total,2) ?></p>
      </div>
      <form method="post" id="confirmOrder">
        <input type="hidden" name="name" id="inputNames">
        <input type="hidden" name="email" id="inputEmail">
        <input type="hidden" name="phone" id="inputPhone">
        <input type="hidden" name="address" id="inputAddress">
        <input type="hidden" name="products" value="<?php echo $allItems ?>">
        <input type="hidden" name="grand_total" value="<?php echo $grand_total ?>">
        <input type="hidden" name="clear" value="<?php echo $staff_id ?>">
        <input type="hidden" name="status" value="<?php echo"Preparing"; ?>">
        <input type="hidden" name="br_order" id="inputBrNum">
        <input type="hidden" name="pmode" value="N/A">
        <input type="hidden" name="delivery_type" value="N/A">
        
        
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="confirm" class="btn btn-success">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#confirmOrder").submit(function(e){

            e.preventDefault();

            $.ajax({
                url: "StaffAction.php",
                method: "post",
                data: $("form").serialize()+"&action=order",
                success: function(response){
                    // $("#showOrder").html(response);
                    window.location.href = "../staff/staffPos.php?category=1";
                }   
            });
        });
    });
</script>

</body>
</html>