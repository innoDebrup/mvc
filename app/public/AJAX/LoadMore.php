<?php
require "../../model/QueryCall.php";
session_start();
$user_id = $_SESSION['user_id'];
$liked_posts = $read->Liked($user_id);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $offset = (int) $_POST['offset'];
  $loaded_posts = $read->getPosts(2,$offset);
  if (!empty($loaded_posts)) {
    foreach($loaded_posts as $post){
      require "../../view/PostDisplay.php";
    }
  }
  else {
    echo "";
  }
}
