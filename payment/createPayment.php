<?php
$curl = curl_init();

$nonce = round(microtime(true) * 1000); // UNIX Timestamp in milliseconds

// Creating a signature
$data = array(
    'title' => 'MACTEA',
    'amount' => $grand_total,
    'currency' => 'PHP',
    'description' => 'list of your order: '.$products,
    'limit' => 1,
    'fee_pass_on' => true,
    'nonce' => $nonce
);

$data_json = json_encode($data);

$clientSecret = "raanopelvwg731b7f50zfs77";

$reqBodyJson = $data_json;
$signature = hash_hmac('sha256', $reqBodyJson, $clientSecret);

// echo $signature;

// End of creating a signature

// Generate a unique id for idempotency
$idempotencyKey = uniqid();

// POST request
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api-sandbox.nextpay.world/v2/paymentlinks",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $data_json,
    CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Content-Type: application/json",
        "client-id: ck_sandbox_b9olgb0i7qeeil5yr14jwz5i",
        "idempotency-key: " . $idempotencyKey,
        "signature: " . $signature,
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error: " . $err;
}

// Decode the JSON response
$response_data = json_decode($response, true);

// Check if decoding was successful
if ($response_data !== null) {
    // Extract the "id" and "url" values
    $paymentlink_id = $response_data['id'];
    $paymentlink_url = $response_data['url'];

    // Print variables
    // echo "Payment Link ID: " . $paymentlink_id . "<br>";
    // echo "Payment Link URL: " . $paymentlink_url . "<br>";

    $update_pay_stmt = $conn->prepare("UPDATE orders SET payment_id = :payment_id, payment_url = :payment_url WHERE order_id = :ord_id");
    $update_pay_stmt->bindParam(':payment_id', $paymentlink_id);
    $update_pay_stmt->bindParam(':payment_url', $paymentlink_url);
    $update_pay_stmt->bindParam(':ord_id', $order_id);
    $update_pay_stmt->execute();


} else {
    echo "Failed to decode JSON response.";
}



?>
