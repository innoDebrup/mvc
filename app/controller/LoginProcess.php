<?php
require '../model/QueryCall.php';
session_start();
if (isset($_SESSION['user_mail'])) {
  header('Location: /Home');
}
$invalid = FALSE;
$password_msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['LinkedIn'])){
    $linked_in->authorize();
  }
  else{
    $user_mail = $_POST['user_mail'];
    $password = $_POST['password'];
    $password_hash = $read->getPass($user_mail);
    if (password_verify($password, $password_hash)) {
      header('Location: /Home');
      session_start();
      $_SESSION['user_mail'] = $user_mail;
    }
    else {
      $invalid = TRUE;
      if ($password_hash == NULL) {
        $password_msg = 'Your password is not set!! Please set it through the "Forgot your Password?" link';
      }
    }
  }
}
elseif (isset($_GET['code'])) {
  $linked_in->getAccess($_GET['code']);
  $response = $linked_in->getInfo();
  $response_error = $linked_in->getError();
  $user_email = $response['email'];
  $user_name = $response['name']; 
  if (!$read->checkEmail($user_email)) {
    $create->addUser($user_name, $user_email, NULL);
    header('Location: /Home');
    $user_mail = $response['email'];
  }
  session_start();
  $_SESSION['user_mail'] = $user_email;
  header('Location: /Home');
  echo $response_error;
}
