<?php
$url = parse_url($_SERVER['REQUEST_URI']);
// var_dump($_SERVER);
$path = $url['path'];
$query = $url['query'];

switch ($path) {
  case '/SignUp':
    require './Login/SignUp.php';
    break;
  case '/ForgotPass':
    require './Login/ForgotPass.php';
    break;
  case '/OTP':
    require './Login/OTPview.php';
    break;
  case '/ResetPass':
    require './Login/ResetPass.php';
    break;
  default:
    require './Login/Login.php';
    break;
}
