<?php

require 'vendor/autoload.php';

// Settings

session_start();

$bankApp  = 'swedbank_foretag';
$username = $_GET['pnr'];

$appData = new SwedbankJson\AppData($bankApp, __DIR__.'/AppData.json');
//print_r(__DIR__.'/AppData.json');
//SwedbankJson\AppData::test();
//print_r('Type: '.gettype($appData));


$auth = new SwedbankJson\Auth\MobileBankID($appData, $username);
$output = $auth->initAuth();
header('Content-type: image/png');
print_r($auth->QRCode());
