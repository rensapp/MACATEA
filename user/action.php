<?php
require_once "../includes/config.php";
use Google\Auth\Cache\Item;

if(isset($_GET["remove"])){
    $id = $_GET["remove"];
    $delete_stmt = $conn->prepare("DELETE FROM cart WHERE oid =:cid");
    $delete_stmt->execute(array(":cid"=>$id));
    $_SESSION["showAlert"] ="block";
    $_SESSION["message"] = "Item removed from the cart";
    header("location:cart.php");
}

if(isset($_GET['clear'])){
    $id = $_GET["clear"];
    $delete_stmt = $conn->prepare("DELETE FROM cart WHERE customer_id = $id");
    $delete_stmt->execute();

    $_SESSION["showAlert"] = "block";
    $_SESSION["message"] = "All item removed from the cart";
    header("location:cart.php");
}

if(isset($_POST["pqty"])){
    $qty = $_POST["pqty"];
    $id = $_POST["pid"];
    $price = $_POST["pprice"];

    $total_price = $qty * $price;
    $update_stmt=$conn->prepare("UPDATE cart SET quantity=:qty, total_price=:ttl_price WHERE oid=:cid");
    $update_stmt->execute(array(":qty"=>$qty,
                                ":ttl_price"=>$total_price,
                                ":cid"=>$id));
}

if(isset($_POST["action"]) && isset($_POST["action"])=="order")
{
    date_default_timezone_set('Asia/Manila');
    
    $id = $_POST["clear"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $delivery_reset = $_POST["delivery_reset"];
    $delivery_type = $_POST["delivery_type"];
    $pmode = $_POST["pmode"];
    $products = $_POST["products"];
    $grand_total = $_POST["grand_total"];
    $status = $_POST["status"];
    $productQty = $_POST["product_quantity"];

    if($pmode == "online"){
        $payment_status = $_POST['payment_status'];
    } else{
        $payment_status = "";
    }

    $placed_on = date("m/d/Y g:i a");

    $nMessage = "There is a Pending order";

    $order_branch = $_POST["order_branch"];

    $delete_stmt = $conn->prepare("DELETE FROM cart WHERE customer_id = $id");
    $delete_stmt->execute();

    $data="";

    $insert_stmt=$conn->prepare("INSERT INTO orders(customer_id,name,email,phone,address,order_type,payment_mode,products,paid_amount,order_status,placed_on,order_branch,payment_status,product_quantity)
    VALUES(:ct_id,:uname,:email,:phone,:address,:ord_type,:pmode,:products,:pamount,:status,:p_on,:ord_br,:pay_s,:prod_q)");

    $insert_stmt->bindParam(":ct_id",$id);
    $insert_stmt->bindParam(":uname",$name);
    $insert_stmt->bindParam(":email",$email);
    $insert_stmt->bindParam(":phone",$phone);
    $insert_stmt->bindParam(":address",$address);
    $insert_stmt->bindParam(":ord_type",$delivery_type);
    $insert_stmt->bindParam(":pmode",$pmode);
    $insert_stmt->bindParam(":products",$products);
    $insert_stmt->bindParam(":pamount",$grand_total);
    $insert_stmt->bindParam(":status",$status);
    $insert_stmt->bindParam(":p_on",$placed_on);
    $insert_stmt->bindParam(":ord_br",$order_branch);
    $insert_stmt->bindParam(":pay_s",$payment_status);
    $insert_stmt->bindParam(":prod_q",$productQty);
    $insert_stmt->execute();

    $order_id = $conn->lastInsertId();

    $insert_notif_stmt=$conn->prepare("INSERT INTO notification(nbrId,nMessage,nStatus) VALUES(:nbr_id,:n_message,:n_status)");
    $insert_notif_stmt->bindParam(":nbr_id",$order_branch);
    $insert_notif_stmt->bindParam(":n_message",$nMessage);
    $insert_notif_stmt->bindValue(":n_status", 1);
    $insert_notif_stmt->execute();

    $update_stmt = $conn->prepare("UPDATE users SET delivery_type = :delivery_reset WHERE id = :ct_id");
    $update_stmt->bindParam(':delivery_reset', $delivery_reset);
    $update_stmt->bindParam(':ct_id', $id);
    $update_stmt->execute();


    if($pmode == "online"){
        include('../payment/createPayment.php');
    }

    // check if the user already has a stamp coupon for rewards.
    $checkCoupon = $conn->prepare("SELECT * FROM rewards WHERE customer_id = $id");
    $checkCoupon->execute();
    $checkUserCoupon = $checkCoupon->rowCount();

    // if user doesn't has a coupon it will create one.
    $points = 0;
    $code = uniqid();
    if($checkUserCoupon == 0){
        $insert_coupon = $conn->prepare("INSERT INTO rewards(customer_id,code,points) VALUES(:ct_id,:code,:points)");

        $insert_coupon->bindParam(":ct_id", $id);
        $insert_coupon->bindParam(":code", $code);
        $insert_coupon->bindParam(":points", $points);
        $insert_coupon->execute();
    }
}


?>


    