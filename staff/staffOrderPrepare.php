<?php
@include '../includes/config.php';
include('../includes/functions.php');;

	$staff_id = $_SESSION['staff_id'];

   $select_id= $conn->prepare("SELECT * FROM `users` WHERE id = ?");
   $select_id->execute([$staff_id]);
   $fetch_id = $select_id->fetch(PDO::FETCH_ASSOC);
   $staff_brNum = $fetch_id['branch_num'];

if(!isset($staff_id)){
     $_SESSION['msg'] = "You must log in first";
    header('location: ../login_page/login.php');
}

if(isset($_POST['update_order'])){

   $order_id = $_POST['order_id'];
   $cus_id = $_POST['cus_id'];
   $update_orderStatus = $_POST['update_orderStatus'];
   $update_orderStatus = filter_var($update_orderStatus, FILTER_SANITIZE_STRING);
   $update_orders = $conn->prepare("UPDATE `orders` SET order_status = ? WHERE order_id = ?");
   $update_orders->execute([$update_orderStatus, $order_id]);
   $message[] = 'Order has been updated!';

   $nMessage = "Your order has been prepared. Order is being delivered or can be picked-up.";

   $insert_notif_stmt=$conn->prepare("INSERT INTO notification(ncId,nMessage,nStatus) VALUES(:nc_id,:n_message,:n_status)");
   $insert_notif_stmt->bindParam(":nc_id",$cus_id);
   $insert_notif_stmt->bindParam(":n_message",$nMessage);
   $insert_notif_stmt->bindValue(":n_status", 1);
   $insert_notif_stmt->execute();

};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_orders = $conn->prepare("DELETE FROM `orders` WHERE order_id = ?");
   $delete_orders->execute([$delete_id]);
   header('location:staffOrderPrepare.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="icon" href="../images/mactea.png">
</head>
<style>

</style>
<body>
    <?php include 'staffHeader.php'; ?>

<div class="container-fluid p-lg-5 p-md-2">
   <h1 class="title text-center fw-bold">Orders to be prepared</h1>
   <div class="row box-container d-flex">
      <!-- <div class="box-container d-flex"> -->

      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE order_status = 'preparing' AND order_branch = $staff_brNum");
         $select_orders->execute();
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
      ?>
         <div class="col-lg-4 col-md-6 p-2 box border border-success rounded">
            <p class="fw-semibold"> Order id : <span><?= $fetch_orders['order_id']; ?></span> </p>
            <p class="fw-semibold"> Placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>

            <?php if($fetch_orders['name'] == ""){

               }else { ?>
                  <p class="fw-semibold"> Name : <span><?= $fetch_orders['name']; ?></span> </p>
               <?php } ?>

            <?php if($fetch_orders['email'] == ""){

               }else { ?>
                  <p class="fw-semibold"> Email : <span><?= $fetch_orders['email']; ?></span> </p>
               <?php } ?>
            
            <?php if($fetch_orders['phone'] == ""){

               }else { ?>
                  <p class="fw-semibold"> Mobile number : <span><?= $fetch_orders['phone']; ?></span> </p>
            <?php } ?>

            <?php if($fetch_orders['address'] == ""){

               }else { ?>
                  <p class="fw-semibold"> Address : <span><?= $fetch_orders['address']; ?></span> </p>
               <?php } ?>

            <p class="fw-semibold"> Total products : <span><?= $fetch_orders['products']; ?></span> </p>
            <p class="fw-semibold"> Total price : <span>₱<?= $fetch_orders['paid_amount']; ?>/-</span> </p>
            <p class="fw-semibold"> Payment method : <span><?= $fetch_orders['payment_mode']; ?></span> </p>

            <?php
            if($fetch_orders['payment_mode'] == "online"){?>
               <p class="fw-semibold"> Payment Status : <span style="color:
               <?php 
                  if($fetch_orders['payment_status'] == 'Pending'){ 
                     echo 'orange'; 
                  }
                  else{
                     echo 'green'; 
                  };?>"><?= $fetch_orders['payment_status']; ?></span> </p>
            <?php } ?>

            <form action="" method="POST">
               <input type="hidden" name="order_id" value="<?= $fetch_orders['order_id']; ?>">
               <select name="update_orderStatus" class="drop-down mb-3 form-select" onchange="enableUpdateButton(this)">
                  <option value="" selected disabled><?= $fetch_orders['order_status']; ?></option>
                  <?php if($fetch_orders['payment_mode'] == "POS"){ ?>
                     <option value="Completed" style="color:black;">Complete</option>
                  <?php }else{ ?>
                     <option value="Deliver-pickup" style="color:black;">To deliver or to pick-up</option>
                  <?php } ?>
               </select>
               <input type="hidden" name="cus_id" value="<?= $fetch_orders['customer_id']; ?>">
               <div class="flex-btn text-center">
                  <input type="submit" name="update_order" class="btn option-btn btn-success px-lg-5 px-md-3" value="Update" disabled>
                  <a href="staffOrderPrepare.php?delete=<?= $fetch_orders['order_id']; ?>" class="btn delete-btn btn-danger px-lg-5 px-md-3" onclick="return confirm('delete this order?');">Delete</a>
               </div>
            </form>
         </div>
      <?php
      }
      }else{
         echo '<p class="empty fw-semibold h3 text-center mt-5">NO ORDERS TO BE PREPARE YET</p>';
      }
      ?>

      <!-- </div> -->
   </div>
</div>
<script>
   function enableUpdateButton(selectElement) {
      var updateButton = selectElement.parentElement.querySelector('[name="update_order"]');
      updateButton.disabled = (selectElement.value === ''); // Disable if "Pending" is selected
   }
</script>
</body>
</html>