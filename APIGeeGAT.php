<?php

$service_url = 'https://securesandbox.tigo.com/v1/oauth/generate/accesstoken?grant_type=client_credentials';
$curl = curl_init($config['service_gat_url']);
$curl_post_data = "client_id=" . $config['auth']['client_id'] . "&client_secret=" . $config['auth']['client_secret'] . "";
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curl, CURLOPT_CAINFO, getcwd() . "/ca/thawtePrimaryRootCA.crt");
$curl_response = curl_exec($curl);
$error = curl_error($curl);
$result_tmp = array('header' => '', 'body' => '', 'curl_error' => '', 'http_code' => '', 'last_url' => '');
if ($error != "") {
    $curl_response['curl_error'] = $error;
}
curl_close($curl);
$result = json_decode($curl_response, true);