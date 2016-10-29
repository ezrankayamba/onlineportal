<?php

$curl = curl_init($config['service_par_url']);
$curl_post_data = array('MasterMerchant' => array('account' => $config['merchant']['account'], 'pin' => $config['merchant']['pin'], 'id' => $config['merchant']['id']),
    'Subscriber' => array('account' => '', 'countryCode' => '255', 'country' => 'TZA'),
    'redirectUri' => $config['portal']['redirect_url'],
    'callbackUri' => $config['portal']['callback_url'],
    'language' => 'eng',
    'originPayment' => array('amount' => $amount, 'currencyCode' => 'TZS', 'tax' => '0.00', 'fee' => '0.00'),
    'exchangeRate' => '1',
    'LocalPayment' => array('amount' => $amount, 'currencyCode' => 'TZS'),
    'transactionRefId' => '' . $trxn_id . '');

$data_encoded = json_encode($curl_post_data);
logme($data_encoded);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_encoded);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curl, CURLOPT_CAINFO, getcwd() . "/ca/thawtePrimaryRootCA.crt");

//headers
$headers = array();
$headers[] = 'accessToken: ' . $accessToken;
$headers[] = 'Content-Type: application/json';
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$curl_response = curl_exec($curl);
$error = curl_error($curl);

if ($error != "") {
    $curl_response['curl_error'] = $error;
}
curl_close($curl);

logme($curl_response);

$result = json_decode($curl_response, true);

