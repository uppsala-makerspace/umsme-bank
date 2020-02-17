<?php

require 'vendor/autoload.php';

session_start();
header('Content-type: application/json');
// Check if authentication process is initiated
if (!isset($_SESSION['swedbankjson_auth'])) {
   print_r(json_encode(array('status' => 'uninitiated'), JSON_PRETTY_PRINT));
} else {
  // Check if initiated process is verified
  $auth = unserialize($_SESSION['swedbankjson_auth']);
  if (!$auth->verify()) {
      print_r(json_encode(array('status' => 'waiting'), JSON_PRETTY_PRINT));
  } else {
      print_r(json_encode(array('status' => 'ready'), JSON_PRETTY_PRINT));
  }
}

