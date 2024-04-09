<?php
require_once __DIR__ . '/../controller/LinkedInAPIv2.php';
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url['path'];
$query = '';
$linked_in = new LinkedInAPIv2();
if (isset($url['query'])) {
  $query = $url['query'];
}
// var_dump(http_response_code());
switch ($path) {
  case '/':
  case '/Index':
  case '/Login':
    require '../view/Login.php';
    break;
  case '/SignUp':
    require '../view/SignUp.php';
    break;
  case '/ForgotPass':
    require '../view/ForgotPass.php';
    break;
  case '/ResetPass':
    require '../view/ResetPass.php';
    break;
  case '/Home':
    require '../view/Home.php';
    break;
  case '/Logout':
    require '../controller/Logout.php';
    break;
  case '/Profile':
    require '../view/Profile.php';
    break;
  default:
    require '404.php';
}
