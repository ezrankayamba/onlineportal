<?php

if (!session_id()) {
    session_start();
}

require_once 'database.php';

$trxn_id = $_SESSION['payment']['trxn_id'];
payment_status($trxn_id);

function payment_status($trxn_id) {
    $conn = db_connect();

    $sql = "SELECT * FROM payment where id=$trxn_id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        handle_status($row);
        mysqli_free_result($result);
    }
    db_close($conn);
}

function handle_status($row) {
    if ($row) {
        if ($row['trans_status'] == 'success') {
            //redirect
            header('Location: index.php?page=success');
        } else {
            header('Location: index.php?page=fail&error_code=' . $row['error_code']);
        }
    } else {
        header('Location: index.php?page=fail&error_code=-1');
    }
}
