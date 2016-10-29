<?php
if (!session_id()) {
    session_start();
}
require_once 'database.php';
require_once 'logging.php';

if (!isset($config)) {
    require_once("config.php");
}

$get_data = filter_input_array(INPUT_GET);
$post_data = filter_input_array(INPUT_POST);

$page = '';
if ($get_data && isset($get_data['page'])) {
    $page = $get_data['page'];
}
$cmd = '';
if ($post_data && isset($post_data['cmd'])) {
    $cmd = $post_data['cmd'];
}
if (!$page) {
    if ($cmd && $cmd == 'poption') {
        $page = $post_data['poption'];
        require_once($page . ".php"); //make payment
    } else {
        $page = "items";
    }
}

$merchant_id = $config['merchant_id'];
?>

<html>
    <head>
        <title><?php echo $merchant_id; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <table class="mainlayout">
            <tr><td><?php echo $cmd; ?></td><td><a href="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF'); ?>">Demo - <?php echo $merchant_id; ?></a></td><td></td></tr>
            <tr><td></td><td><?php require_once($page . ".php"); ?></td><td></td></tr>
            <tr><td></td><td></td><td></td></tr>
        </table>
    </body>
</html>