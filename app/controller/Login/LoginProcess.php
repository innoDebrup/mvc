<?php
require '../model/QueryCall.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_mail = $_POST['user_mail'];
  $password = $_POST['password'];
  
  $password_hash = $read->getPass($user_mail);

  if (password_verify($password, $password_hash)) {
    echo 'Login Successful';
  }
  else {
    echo 'Invalid User/Email or Password';
  }
}
