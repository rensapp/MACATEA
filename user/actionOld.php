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
    $pmode = $_POST["pmode"];
    $products = $_POST["products"];
    $grand_total = $_POST["grand_total"];
    $status = $_POST["status"];
    
    if($pmode == "online"){
        $payment_status = $_POST["payment_status"];
    } else{
       $payment_status = ""; 
    }

    $delivery_type = $_POST["delivery_type"];

    $placed_on = date("m/d/Y g:i a");

    $delete_stmt = $conn->prepare("DELETE FROM cart WHERE customer_id = $id");
    $delete_stmt->execute();

    $data="";

    $insert_stmt=$conn->prepare("INSERT INTO orders(customer_id,name,email,phone,address,payment_mode,products,paid_amount,order_status,placed_on,payment_status)
    VALUES(:ct_id,:uname,:email,:phone,:address,:pmode,:products,:pamount,:status,:p_on,:pay_s)");

    $insert_stmt->bindParam(":ct_id",$id);
    $insert_stmt->bindParam(":uname",$name);
    $insert_stmt->bindParam(":email",$email);
    $insert_stmt->bindParam(":phone",$phone);
    $insert_stmt->bindParam(":address",$address);
    $insert_stmt->bindParam(":pmode",$pmode);
    $insert_stmt->bindParam(":products",$products);
    $insert_stmt->bindParam(":pamount",$grand_total);
    $insert_stmt->bindParam(":status",$status);
    $insert_stmt->bindParam(":p_on",$placed_on);
    $insert_stmt->bindParam(":pay_s",$payment_status);

    $insert_stmt->execute();
    
    $order_id = $conn->lastInsertId();

    $update_stmt = $conn->prepare("UPDATE users SET delivery_type = :delivery_type WHERE id = :ct_id");
    $update_stmt->bindParam(':delivery_type', $delivery_type);
    $update_stmt->bindParam(':ct_id', $id);
    $update_stmt->execute();

    if($pmode == "online"){
        include('../payment/createPayment.php');
    }
    
/*
    $data.='<div class="text-center">
                <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                <h2> Your Order Placed Successfully!</h2>
                <h4 class="bg-danger text-light rounded p-2">Items Purchased: '.$products.'</h4>
                <h4>Your Name : '.$name.' </h4>
                <h4>Your E-mail : '.$email.' </h4>
                <h4>Your Phone Number : '.$phone.' </h4>
                <h4>Total Amount Paid : '.number_format($grand_total,2).' </h4> 
                <h4>Payment Mode : '.$pmode.' </h4>
                
                </div>';
    echo $data;
  */  
}


?>


    