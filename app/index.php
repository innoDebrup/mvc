<?php
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url['path'];
$query = '';
if (isset($url['query'])) {
  $query = $url['query'];
}

switch ($path) {
  case '/SignUp':
    require 'view/SignUp.php';
    break;
  case '/ForgotPass':
    require 'view/ForgotPass.php';
    break;
  case '/ResetPass':
    require 'view/ResetPass.php';
    break;
  case '/Home':
    require 'view/Home.php';
    break;
  case '/Logout':
    require 'controller/Logout.php';
    break;
  case '/Profile':
    require 'view/Profile.php';
    break;
  default:
    require 'view/Login.php';
    break;
}
