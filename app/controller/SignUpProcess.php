<?php

require '../model/QueryCall.php';
require_once '../controller/Validate.php';
session_start();
$not_duplicate = TRUE;
$valid_password = TRUE;
$valid_input = TRUE;
$success = FALSE;
$message = '';
$validator = new Validate();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_SESSION['otp'])) {
    $user_name = htmlspecialchars($_POST['user_name']);
    $email = $_SESSION['email'];
    $password = htmlspecialchars($_POST['password']);
    $otp = $_SESSION['otp'];
    $entered_otp = $_POST['otp'];
    if (!empty($user_name) && !empty($email) && !empty($password)) {
      $not_duplicate = $read->checkUser($user_name, $email);
      $valid_password = $validator->validPassword($password);
      if ($not_duplicate && $valid_password) {
        if ($entered_otp == $otp){
          $create->addUser($user_name, $email, $password);
          $message = 'User Created Successfully!! Please proceed to Login!';
          $success = TRUE;
        }
        else {
          $message = 'Wrong OTP! Please Retry!!';
        }
      }
      elseif (!$not_duplicate) {
        $message = 'Username already exists!!! Please retry with another';
      }
      else {
        $message = $validator->getPasswordErr();
      }
    }
    else {
      $valid_input = FALSE;
    }
  }
  else {
    $message = "Please verify your email through OTP by clicking Get OTP after entering your email address";
    $valid_input = FALSE;
  }
  session_unset();
  session_destroy();
}