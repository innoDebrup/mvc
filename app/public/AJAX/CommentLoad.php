<?php 
require __DIR__ . '/../../model/QueryCall.php';
if (isset($_POST['post_id'])) {
  $post_ID = (int) $_POST['post_id'];
  $comments = $read->getComments($post_ID);
  foreach ($comments as $comment) {
    require __DIR__ . '/../../view/CommentsView.php';
  }
}