<?php

$server_data = $_SERVER;

$protocol = isSSL($server_data) ? "https" : "http";
$host = $server_data['HTTP_HOST'];
$base_path = dirname($server_data['PHP_SELF']);
$base_url = $protocol . '://' . $host . $base_path;

$config = array('merchant_id' => "Kazini Group",
    'service_gat_url' => 'https://securesandbox.tigo.com/v1/oauth/generate/accesstoken?grant_type=client_credentials',
    'service_par_url' => 'https://securesandbox.tigo.com/v1/tigo/payment-auth/authorize',
    'auth' => array('client_id' => '05siFLC9zHYPyRmy0K507Awe0UWSyNo4', 'client_secret' => 'SmzOzmvlTRyLYGau'),
    'merchant' => array('account' => '255719803144', 'pin' => '1620', 'id' => 'Kazini Group'),
    'portal' => array('redirect_url' => $base_url . '/redirect.php',
        'callback_url' => $base_url . '/APIGeeCallback.php'));

function isSSL($server_data) {
    //return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
    return (!empty($server_data['HTTPS']) && $server_data['HTTPS'] !== 'off');
}

// json_encode() options
defined('JSON_HEX_TAG') or define('JSON_HEX_TAG', 1);    // Since PHP 5.3.0
defined('JSON_HEX_AMP') or define('JSON_HEX_AMP', 2);    // Since PHP 5.3.0
defined('JSON_HEX_APOS') or define('JSON_HEX_APOS', 4);    // Since PHP 5.3.0
defined('JSON_HEX_QUOT') or define('JSON_HEX_QUOT', 8);    // Since PHP 5.3.0
defined('JSON_FORCE_OBJECT') or define('JSON_FORCE_OBJECT', 16);   // Since PHP 5.3.0
defined('JSON_NUMERIC_CHECK') or define('JSON_NUMERIC_CHECK', 32);   // Since PHP 5.3.3
defined('JSON_UNESCAPED_SLASHES') or define('JSON_UNESCAPED_SLASHES', 64);   // Since PHP 5.4.0
defined('JSON_PRETTY_PRINT') or define('JSON_PRETTY_PRINT', 128);  // Since PHP 5.4.0
defined('JSON_UNESCAPED_UNICODE') or define('JSON_UNESCAPED_UNICODE', 256);  // Since PHP 5.4.0
// json_decode() options
defined('JSON_OBJECT_AS_ARRAY') or define('JSON_OBJECT_AS_ARRAY', 1);    // Since PHP 5.4.0
defined('JSON_BIGINT_AS_STRING') or define('JSON_BIGINT_AS_STRING', 2);    // Since PHP 5.4.0
defined('JSON_PARSE_JAVASCRIPT') or define('JSON_PARSE_JAVASCRIPT', 4);    // upgrade.php
// json_last_error() error codes
defined('JSON_ERROR_NONE') or define('JSON_ERROR_NONE', 0);    // Since PHP 5.3.0
defined('JSON_ERROR_DEPTH') or define('JSON_ERROR_DEPTH', 1);    // Since PHP 5.3.0
defined('JSON_ERROR_STATE_MISMATCH') or define('JSON_ERROR_STATE_MISMATCH', 2);    // Since PHP 5.3.0
defined('JSON_ERROR_CTRL_CHAR') or define('JSON_ERROR_CTRL_CHAR', 3);    // Since PHP 5.3.0
defined('JSON_ERROR_SYNTAX') or define('JSON_ERROR_SYNTAX', 4);    // Since PHP 5.3.0
defined('JSON_ERROR_UTF8') or define('JSON_ERROR_UTF8', 5);    // Since PHP 5.3.3
defined('JSON_ERROR_RECURSION') or define('JSON_ERROR_RECURSION', 6);    // Since PHP 5.5.0
defined('JSON_ERROR_INF_OR_NAN') or define('JSON_ERROR_INF_OR_NAN', 7);    // Since PHP 5.5.0
defined('JSON_ERROR_UNSUPPORTED_TYPE') or define('JSON_ERROR_UNSUPPORTED_TYPE', 8);    // Since PHP 5.5.0
