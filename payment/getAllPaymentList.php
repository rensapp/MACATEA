<?php


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-sandbox.nextpay.world/v2/paymentlinks",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "client-id: ck_sandbox_fn1wzwzk9thhfx0q9rt3ipcz"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // var_dump(json_decode($response));
}

$responseData = json_decode($response);

if ($responseData) {
    $totalCount = $responseData->total_count;
    $paymentLinks = $responseData->data;

    // Now you can access individual payment links in the $paymentLinks array.
    foreach ($paymentLinks as $paymentLink) {
        $id = $paymentLink->id;
        $title = $paymentLink->title;
        $amount = $paymentLink->amount;
        // $currency = $paymentLink->currency;
        // $description = $paymentLink->description;
        // $limit = $paymentLink->limit;
        // $status = $paymentLink->status;
        // $privateNotes = $paymentLink->private_notes;
        // $paymentsCount = $paymentLink->payments_count;
        // $url = $paymentLink->url;
        // $redirectUrl = $paymentLink->redirect_url;
        // $createdAt = $paymentLink->created_at;

        echo "\n\nid: ".$id;
        echo "\nTitle: ".$title;
        echo "\namount: ".$amount;
        // echo "\ncurrency: ".$currency;
        // echo "\ndescription: ".$description;
        // echo "\nlimit: ".$limit;
        // echo "\nstatus: ".$status;
        // echo "\nprivateNotes: ".$privateNotes;
        // echo "\npaymentsCount: ".$paymentsCount;
        // echo "\nurl: ".$url;
        // echo "\nredirectUrl: ".$redirectUrl;
        // echo "\ncreatedAt: ".$createdAt;
    }
} else {
    echo "Failed to decode API response.";
}




