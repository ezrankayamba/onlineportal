<?php

require_once 'database.php';
//file_put_contents(getcwd()."/callbackdata.txt", var_export($_POST, true));	

header('Content-type: text/html');
$data = filter_input_array(INPUT_POST);

logme(var_export($data, true));

$trans_status = $data['trans_status'];
$trans_stage = 3;
$error_code = 0;
if ($trans_status == 'success') {
    $trans_stage = 4;
} else {
    $error_code = $data['error_code'];
}
$transaction_ref_id = $data['transaction_ref_id'];
$external_ref_id = $data['external_ref_id'];
$mfs_id = $data['mfs_id'];
$verification_code = $data['verification_code'];

$update = update_payment($transaction_ref_id, $trans_status, $trans_stage, $error_code, $external_ref_id, $mfs_id, $verification_code);
if ($update) {
    echo "Successfully updated!";
} else {
    echo "Update failed!";
}

function update_payment($transaction_ref_id, $trans_status, $trans_stage, $error_code, $external_ref_id, $mfs_id, $verification_code) {
    $conn = db_connect();

    $sql = "UPDATE payment set trans_status='$trans_status', trans_stage='$trans_stage', error_code='$error_code', external_ref_id='$external_ref_id',mfs_id='$mfs_id',verification_code='$verification_code' where id='$transaction_ref_id'";
    $last_id = 0;
    if ($conn->query($sql) === TRUE) {
        $last_id = $transaction_ref_id;
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    db_close($conn);

    return $last_id;
}

function logme($data) {
    $myfile = fopen("par_req_res.log", "a") or die("Unable to open file!");
    $newline = PHP_EOL;
    $now = date('y-m-d H:i:s') . ": ";
    fwrite($myfile, $newline);
    fwrite($myfile, $now);
    fwrite($myfile, $data);

    fclose($myfile);
}
