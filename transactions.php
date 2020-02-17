<?php

require 'vendor/autoload.php';
session_start();

$auth = unserialize($_SESSION['swedbankjson_auth']);
if (!$auth->verify())
    exit("You updated the page, but the login is not approved in the BankID app. Please try again.");
$bankConn = new SwedbankJson\SwedbankJson($auth);
$accountInfo = $bankConn->accountDetails();

header('Content-type: application/json');
print_r(json_encode($accountInfo, JSON_PRETTY_PRINT));

