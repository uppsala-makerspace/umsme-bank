<?php

require 'vendor/autoload.php';

// Settings

session_start();

$bankApp  = 'swedbank_foretag';
$username = $_GET['pnr'];

$auth = new SwedbankJson\Auth\MobileBankID($bankApp, $username);
$auth->initAuth();

header('Content-type: application/json');
print_r(json_encode(array('status' => 'initiate'), JSON_PRETTY_PRINT));
