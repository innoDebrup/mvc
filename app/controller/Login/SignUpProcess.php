<?php
require '../model/QueryCall.php';
require_once '../controller/Validate.php';
require_once '../controller/OTP.php';
session_start();
if (isset($_SESSION['otp'])) {
  session_unset();
  session_destroy();
  session_start();
}
$not_duplicate = TRUE;
$valid_email = TRUE;
$valid_password = TRUE;
$valid_input = TRUE;
$validator = new Validate();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_name = htmlspecialchars($_POST['user_name']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  if (!empty($user_name) && !empty($email) && !empty($password)) {
    $not_duplicate = $read->checkUser($user_name, $email);
    $valid_email = $validator->validEmail($email);
    $valid_password = $validator->validPassword($password);
    if ($not_duplicate && $valid_email && $valid_password) {
      //Generate OTP
      $otp = OTP::processOTP($email);
      //Prepare data to be stored.
      $_SESSION['username'] = $user_name;
      $_SESSION['password'] = $password;
      $_SESSION['email'] = $email;
      $_SESSION['otp'] = $otp;
      header('Location: /OTP');
    }
  }
  else {
    $valid_input = FALSE;
  }
  
}
  