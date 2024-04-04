<?php
require '../model/QueryCall.php';
$user_info = $read->getUserInfo($_SESSION['user_mail']);
$user_id = $user_info['user_id'];
$user_name = $user_info['user_name'];
$post_err_msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $content = $_POST['content'];
  $media_path = $_FILES['media']['tmp_name'];
  $media_type = $_FILES['media']['type'];
  if (!empty($content)) {
    if (!empty($media_path)) {
      $media = file_get_contents($media_path);
    }
    else {
      $media = '';
    }
    $create->addPost($user_id, $content, $media, $media_type);
  }
  else {
    $post_err_msg = 'You cannot post without Writing something! Write something :)';
  }
}

$post_arr = $read->getPosts(2,0);