<?php
require __DIR__.'/../../model/QueryCall.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $post_id = (int) $_POST['post_id'];
  $user_id = (int) $_POST['user_id'];
  $liked = $read->Liked($user_id);
  if (!in_array($post_id,array_column($liked,'post_id'))) {
    $create->addLike($post_id,$user_id);
    $update->updateLike($post_id);
  }
}
