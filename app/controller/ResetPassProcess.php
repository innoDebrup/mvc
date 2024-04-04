<?php
require_once '../model/QueryCall.php';
require_once '../controller/Validate.php';

$reset = 0;
$message = '';
$validator = new Validate();
session_start();

if (!empty($query)) {
  $param = explode('=', $query);
  $_SESSION['token'] = $param[1];
}
else{
  $message = 'Invalid Link!! Please retry forgot password process !!';
}
if (isset($_SESSION['token'])) {
  $token = $_SESSION['token'];
  $returned_array = $read->checkToken($token);
  if ($returned_array) {
    $user_id = $returned_array['user_id'];
    $token_timer = strtotime($returned_array['token_timer']);
    if ($token_timer <= time()) {
      $message = 'The link has expired. Please retry forgot password !!';
    }
    else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        if ($validator->validPassword($password)) {
          $password_hash = password_hash($password, PASSWORD_DEFAULT);
          $update->resetPass($user_id, $password_hash);
          $message = 'Password Reset Successfully! Please Login again!';
          $reset = 1;
        }
        else {
          $message = $validator->getPasswordErr();
        }
      }
    }
  }
  else {
    $message = 'Invalid Link!! Please retry forgot password process !!';
    session_unset();
    session_destroy();
  }
}