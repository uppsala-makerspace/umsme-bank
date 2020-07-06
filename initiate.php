<?php

require 'vendor/autoload.php';

// Settings

session_start();

$bankApp  = 'swedbank_foretag';
$username = $_GET['pnr'];

$appData = new SwedbankJson\AppData($bankApp, __DIR__.'/AppData.json');
$auth = new SwedbankJson\Auth\MobileBankID($appData, $username);
$auth->initAuth();

header('Content-type: application/json');
print_r(json_encode(array('status' => 'initiate'), JSON_PRETTY_PRINT));
