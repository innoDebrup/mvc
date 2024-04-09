<?php
require '../model/QueryCall.php';
$user_info = $read->getUserInfo($_SESSION['user_mail']);
$user_id = $user_info['user_id'];
$user_name = $user_info['user_name'];
$email = $user_info['email'];
$profile_details = $read->getUserDetails($user_id);
$first_name = $profile_details['first_name'];
$last_name = $profile_details['last_name'];
$country = $profile_details['country'];
$image = $profile_details['profile_pic'];
$error = FALSE;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['f_name'])) {
    $update->editFirstName($user_id, htmlspecialchars($_POST['f_name']));
    header('Location: /Profile');
  }
  if (isset($_POST['l_name'])) {
    $update->editLastName($user_id, htmlspecialchars($_POST['l_name']));
    header('Location: /Profile');
  }
  if (isset($_POST['country'])) {
    $update->editCountry($user_id, htmlspecialchars($_POST['country']));
    header('Location: /Profile');
  }
  if (isset($_POST['u_name'])) {
    $update->changeUserName($user_id, htmlspecialchars($_POST['u_name']));
    header('Location: /Profile');
  }
  if (isset($_FILES['pic'])) {
    if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
      $mime_type = mime_content_type($_FILES['pic']['tmp_name']);
      $allowed_file_types = ['image/png', 'image/jpeg', 'application/pdf'];
      if (! in_array($mime_type, $allowed_file_types)) {
        $error = TRUE;
      }
      else {
        $img = file_get_contents($_FILES['pic']['tmp_name']);
        $update->editProfile($user_id, $img);
        header('Location: /Profile');
      }
    }
  }
}