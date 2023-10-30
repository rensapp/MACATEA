<?php

$paymentLink_id = $fetch_orders["payment_id"];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-sandbox.nextpay.world/v2/paymentlinks/$paymentLink_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "client-id: ck_sandbox_b9olgb0i7qeeil5yr14jwz5i "
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
}

$response_data = json_decode($response, true);

// Check if decoding was successful
if ($response_data !== null) {
    // Extract the "id" and "url" values
    $paymentLink_status = $response_data['status'];

    // echo $paymentLink_status;

if($paymentLink_status == "disabled"){
  $pay_stat = "completed";
} else{
  $pay_stat = "pending";
}

$pay_id = $fetch_orders['payment_id'];

  if($fetch_orders['payment_status'] == "pending"){
    $update_pay_stmt = $conn->prepare("UPDATE orders SET payment_status = :payment_status WHERE payment_id = :pay_id");
    $update_pay_stmt->bindParam(':payment_status', $pay_stat);
    $update_pay_stmt->bindParam(':pay_id', $pay_id);
    $update_pay_stmt->execute();
    }

} else {
    echo "Failed to decode JSON response.";
}
?>