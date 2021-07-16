<?php

require 'vendor/autoload.php';

// Settings

session_start();

$bankApp  = 'swedbank_foretag';
$username = $_GET['pnr'];
$base64 = $_GET['base64'];

$appData = new SwedbankJson\AppData($bankApp, __DIR__.'/AppData.json');
//print_r(__DIR__.'/AppData.json');
//SwedbankJson\AppData::test();
//print_r('Type: '.gettype($appData));


$auth = new SwedbankJson\Auth\MobileBankID($appData, $username);
$output = $auth->initAuth();
if ($base64) {
    header('Content-type: text/plain');
    print_r(base64_encode($auth->QRCode()));
} else {
    header('Content-type: image/png');
    print_r($auth->QRCode());
}