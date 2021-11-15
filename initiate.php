<?php

require 'vendor/autoload.php';

// Settings

session_start();

$bankApp  = 'swedbank_foretag';
$username = $_GET['pnr'];
$base64 = $_GET['base64'];

$appData = new SwedbankJson\AppData($bankApp, __DIR__.'/AppData.json');
$auth = new SwedbankJson\Auth\MobileBankID($appData, $username);
$output = $auth->initAuth();
if ($base64) {
    header('Content-type: text/plain');
    print_r(base64_encode($auth->getChallengeImage()));
} else {
    header('Content-type: image/png');
    print_r($auth->getChallengeImage());
}