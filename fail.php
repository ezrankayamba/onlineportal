<?php
if (!session_id()) {
    session_start();
}
?>
<?php
if (isset($get_data['error_code']) && $get_data['error_code']) {
    ?>
    <p>Your payment failed: <?php echo $get_data['error_code'] ?></p>
    <?php
} else {
    ?>
    <p>Transaction is till under processing... be patient you will be notified!</p>
    <?php
}