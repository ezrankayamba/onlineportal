<?php

if (!session_id()) {
    session_start();
}

require_once("APIGeeGAT.php");
$accessToken = $result['accessToken'];
if ($accessToken) {
    $amount = $post_data['price'];
    $trxn_id = record_payment($amount);
    if ($trxn_id) {
        $_SESSION['payment']['trxn_id'] = $trxn_id;
        require_once("APIGeePAR.php");
        $redirect_url = $result['redirectUrl'];
        if ($redirect_url) {
            $auth_code = $result['authCode'];
            update_payment($auth_code, $trxn_id);

            header('Location: ' . $redirect_url);
        } else {
            echo "Error3<br/>";
            var_dump($result);
        }
    } else {
        echo "Error2<br/>";
        var_dump($result);
    }
} else {
    echo "Error1<br/>";
    var_dump($result);
}

function record_payment($amount) {
    $conn = db_connect();

    $sql = "INSERT INTO payment (record_date, amount) VALUES ('" . (date('y-m-d H:i:s')) . "', '$amount')";
    $last_id = 0;
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
    }
    db_close($conn);

    return $last_id;
}

function update_payment($auth_code, $transaction_ref_id) {
    $conn = db_connect();

    $sql = "UPDATE payment set auth_code='$auth_code' where id='$transaction_ref_id'";
    $last_id = 0;
    if ($conn->query($sql) === TRUE) {
        $last_id = $transaction_ref_id;
    }
    db_close($conn);

    return $last_id;
}
