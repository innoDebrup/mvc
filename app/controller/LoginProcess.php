<?php
require '../model/QueryCall.php';
session_start();
if (isset($_SESSION['user_mail'])) {
  header('Location: /Home');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_mail = $_POST['user_mail'];
  $password = $_POST['password'];
  
  $password_hash = $read->getPass($user_mail);

  if (password_verify($password, $password_hash)) {
    header('Location: /Home');
    session_start();
    $_SESSION['user_mail'] = $user_mail;
  }
  else {
    echo 'Invalid User/Email or Password';
  }
}
