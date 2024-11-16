<?php

require 'functions.php';

$userOrderExists = $order->checkUserOrderExists($_GET['userId'], $_GET['trkNo']);

if ((empty($_GET['userId']) || !isset($_GET['userId'])) || (empty($_GET['trkNo']) || !isset($_GET['trkNo'])) || (empty($_GET['reference']) || !isset($_GET['reference'])) || ($userOrderExists == [])) {
    echo "<script>window.history.back()</script>";
}

// print_r($userOrderExists);

$user_id = $_GET['userId'];
$trkNo = $_GET['trkNo'];
$reference = $_GET['reference'];

// Curl Initialize

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        // "Authorization: Bearer sk_test_3a66810de4128b43553402ce0b6f589cacb11da2", // replace with your secret key key or Uncomment this for testing
        "Authorization: Bearer sk_live_ca6f61dfb513be36c8e13e1be06bffcca29d1251", // replace with your secret key
        // "Cache-Control: no-cache",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
    echo "<script>window.history.back()</script>";
} else {
    $result = json_decode($response, true);
    // echo $response;
    // echo "<pre>";
    // print_r($result);
}

if ($result['data']['status'] == "success") {
    $first_name = $result['data']['customer']['first_name'];
    $last_name = $result['data']['customer']['last_name'];
    $fullname = $first_name . " " . $last_name;
    $email = $result['data']['customer']['email'];
    $phone = $result['data']['customer']['phone'];
    $payment_status = $result['data']['status'];
    $reference = $result['data']['reference'];
    $channel = $result['data']['channel'];
    $ip_address = $result['data']['ip_address'];
    $paid_at = $result['data']['paid_at'];
    $transaction_date = $result['data']['transaction_date'];
    $customer_code = $result['data']['customer']['customer_code'];
    $amount = $result['data']['amount'];

    $payment->insertCustomerRecord($user_id, $trkNo, $fullname, $email, $phone, $payment_status, $reference, $channel, $ip_address, $paid_at, $transaction_date, $customer_code, $amount, "1");
} else {
    header("Location: ../payment_error.php?userId=$user_id&trkNo=$AEFref&reference=$reference&status=paymentError");
    exit;
}
