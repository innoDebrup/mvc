<?php
require_once '../model/QueryCall.php';
require_once '../controller/SendMail.php';

$send_mail = new SendMail();
$sent = 0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  $email = htmlspecialchars($_POST['email']);
  $email_present = $read->checkEmail($email);
  // Send Reset Link to the email only if it is registered.
  if ($email_present) {
    $update->addToken($email);
    $token_arr = $read->getToken($email);
    $reset_link = 'http://mvc.com/ResetPass?token='.$token_arr['reset_token'];
    $send_mail->setContent($reset_link);
    $send_mail->sendResetMail($email);
    $sent = 1;
  }
}