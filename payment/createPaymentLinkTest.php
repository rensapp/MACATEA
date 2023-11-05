<?php
// this is only a test
$curl = curl_init();
// Creating a signature
$reqBody = array('hello' => "world");
$clientSecret = "raanopelvwg731b7f50zfs77";

$reqBodyJson = json_encode($reqBody, JSON_UNESCAPED_SLASHES);
$signature = hash_hmac('sha256', $reqBodyJson, $clientSecret);

// echo $signature;
// End of creating a signature

$nonce = round(microtime(true) * 1000); // UNIX Timestamp in milliseconds

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
    CURLOPT_POSTFIELDS => json_encode([
        'title' => 'MACTEA',
        'amount' => 250,
        'currency' => 'PHP',
        'description' => 'List of order',
        'private_notes' => 'string',
        'limit' => 1,
        'redirect_url' => 'https://mywebsite.com/successful-payment.html',
        'nonce' => $nonce
    ]),
    CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Content-Type: application/json",
        "client-id: ck_sandbox_b9olgb0i7qeeil5yr14jwz5i",
        "idempotency-key: ".$idempotencyKey,
        "signature: ".$signature
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error: " . $err;
} else {
    echo $response;
}

?>
