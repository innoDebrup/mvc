<?php
require __DIR__.'/../../model/QueryCall.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $post_id = (int) $_POST['post_id'];
  $user_id = (int) $_POST['user_id'];
  $liked = $read->Liked($user_id);
  $like_status = 1;
  if (!in_array($post_id,array_column($liked,'post_id'))) {
    $create->addLike($post_id,$user_id);
    $update->incrementLike($post_id);
  }
  else {
    $delete->removeLike($post_id, $user_id);
    $update->decrementLike($post_id);
    $like_status = 0;
  }
  $total_likes = $read->getTotalLikes($post_id);
  $data = array($like_status, $total_likes);
  echo json_encode($data);
}
