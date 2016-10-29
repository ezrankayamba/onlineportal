<?php

function logme($data) {
    $myfile = fopen("merchant_portal.log", "a") or die("Unable to open file!");
    $newline = PHP_EOL;
    $now = date('y-m-d H:i:s') . ": ";
    fwrite($myfile, $newline);
    fwrite($myfile, $now);
    fwrite($myfile, $data);

    fclose($myfile);
}
