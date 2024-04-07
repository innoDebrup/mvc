<?php
require_once __DIR__.'/ConnectDB.php';
/**
 * Class that handles all Create operations for the Web-App.
 */
class CreateQuery extends ConnectDB {
  private $conn;

  public function __construct() {
    $this->conn = $this->getConn();
  }

  /**
   * Function to insert new users to the table.
   *
   * @param string $user_name
   *  User name for the new account.
   * @param string $email
   *  Email for the new account.
   * @param string|null $password
   *  Password set for the new account.
   * 
   * @return void
   */
  public function addUser(string $user_name, string $email, string|null $password) {
    $conn = $this->conn;
    if ($password != NULL) {
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $conn->prepare('INSERT INTO Users (user_name, email, password) VALUES (:username, :email, :password);');
      $stmt->execute([
        'username' => $user_name, 
        'email' => $email,
        'password' => $password_hash,
      ]);
    }
    else {
      $stmt = $conn->prepare('INSERT INTO Users (user_name, email) VALUES (:username, :email);');
      $stmt->execute([
        'username' => $user_name, 
        'email' => $email
      ]);
    }
    
    $stmt2 = $conn->prepare('SELECT user_id FROM Users WHERE email = :email;');
    $stmt2->execute([
      'email' => $email
    ]);
    $resp = $stmt2->fetch(PDO::FETCH_ASSOC);
    $user_id = $resp['user_id'];
    $stmt3 = $conn->prepare('INSERT INTO UserDetails (user_id) VALUES (:user_id);');
    $stmt3->execute([
      'user_id' => $user_id
    ]);
  }

  /**
   * Function to insert a new post to the post database.
   *
   * @param integer $user_id
   *  User-id of the user.
   * @param string $content
   *  Text content of the post.
   * @param string $media
   *  Media content in the post.
   * @param string $media_type
   *  Media type of the media in the post.
   * 
   * @return void
   */
  public function addPost(int $user_id, string $content, string $media, string $media_type) {
    $conn = $this->conn;
    $time = date('Y-m-d H:i:s', time());
    if (empty($media)) {
      $stmt = $conn->prepare('INSERT INTO Posts (user_id, content, time) VALUES (:user_id, :content, :time);');
      $stmt->execute([
        'user_id' => $user_id,
        'content' => $content,
        'time' => $time
      ]);
    }
    else {
      $stmt = $conn->prepare('INSERT INTO Posts (user_id, content, media, time, media_type) VALUES (:user_id, :content, :media, :time, :media_type);');
      $stmt->execute([
        'user_id' => $user_id,
        'content' => $content,
        'media' => $media,
        'time' => $time,
        'media_type' => $media_type
      ]);
    }
  }

  /**
   * Function to insert an entry in the likes table.
   *
   * @param integer $post_id
   *  Post id of the respective post.
   * @param integer $user_id
   *  User id of the user who liked the post.
   * 
   * @return void
   */
  public function addLike(int $post_id, int $user_id) {
    $conn = $this->conn;
    $stmt = $conn->prepare('INSERT INTO Likes (post_id, user_id) VALUES (:post_id, :user_id);');
    $stmt->execute([
      'post_id' => $post_id,
      'user_id' => $user_id
    ]);
  }
}
