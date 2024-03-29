<?php
require_once '../model/QueryCall.php';
session_start();
$success = FALSE;
$err = '';
if (isset($_SESSION['otp'])) {
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
  $otp = $_SESSION['otp'];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['entered_otp'] == $otp) {
      $create->addUser($username, $email, $password);
      echo "New User Created Successfully!";
      $success = TRUE;
    }
    else {
      $err = 'Invalid OTP given';
    }
  }
}
else {
  header('Location: /');
}