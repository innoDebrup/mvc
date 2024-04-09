<?php
require __DIR__ . '/../../model/QueryCall.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $post_id = (int) $_POST['post_id'];
  $user_id = (int) $_POST['user_id'];
  $comment = $_POST['comment'];
  
  $create->addComment($post_id, $user_id, $comment);
  require __DIR__ . '/CommentLoad.php';

}