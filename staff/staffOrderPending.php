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
};


if(isset($_POST['update_order'])){

   $order_id = $_POST['order_id'];
   $update_orderStatus = $_POST['update_orderStatus'];
   $update_orderStatus = filter_var($update_orderStatus, FILTER_SANITIZE_STRING);
   $update_orders = $conn->prepare("UPDATE `orders` SET order_status = ? WHERE order_id = ?");
   $update_orders->execute([$update_orderStatus, $order_id]);
   $message[] = 'Order has been updated!';

};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_orders = $conn->prepare("DELETE FROM `orders` WHERE order_id = ?");
   $delete_orders->execute([$delete_id]);
   header('location:staffOrderPending.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="icon" href="../images/mactea.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>

</style>
<body>
    <?php include 'staffHeader.php'; ?>

<div class="container-fluid p-lg-5 p-md-2">
   <h1 class="title text-center fw-bold">Pending orders</h1>
   <div class="row box-container d-flex">
      <!-- <div class="box-container d-flex"> -->

      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE order_status = 'Pending' AND order_branch = $staff_brNum");
         $select_orders->execute();
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
      ?>
         <div class="col-lg-4 col-md-6 p-2 box border border-success rounded">
            <p class="fw-semibold"> Order id : <span><?= $fetch_orders['order_id']; ?></span> </p>
            <p class="fw-semibold"> Placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
            <p class="fw-semibold"> Name : <span><?= $fetch_orders['name']; ?></span> </p>
            <p class="fw-semibold"> Email : <span><?= $fetch_orders['email']; ?></span> </p>
            <p class="fw-semibold"> Mobile number : <span><?= $fetch_orders['phone']; ?></span> </p>
            <p class="fw-semibold"> Address : <span><?= $fetch_orders['address']; ?></span> </p>
            <p class="fw-semibold"> Total Products : <span><?= $fetch_orders['products']; ?></span> </p>
            <p class="fw-semibold"> Total Price : <span>₱<?= $fetch_orders['paid_amount']; ?>/-</span> </p>
            <p class="fw-semibold"> Payment Method : <span><?= $fetch_orders['payment_mode']; ?></span> </p>
            
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
                  <option value="" selected><?= $fetch_orders['order_status']; ?></option>
                  <option value="Preparing" style="color:black;">Preparing</option>
               </select>
               <div class="flex-btn text-center">
                  <input type="submit" name="update_order" class="btn option-btn btn-success px-lg-5 px-md-3" value="Update" disabled>
                  <a href="staffOrderPending.php?delete=<?= $fetch_orders['order_id']; ?>" class="btn delete-btn btn-danger px-lg-5 px-md-3" onclick="return confirm('delete this order?');">Delete</a>
               </div>
            </form>
         </div>
      <?php
      }
      }else{
         echo '<p class="empty">No Orders Placed Yet!</p>';
      }
      ?>
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