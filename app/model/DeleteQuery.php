<?php
require_once __DIR__.'/ConnectDB.php';

/**
 * Class to handle all delete queries.
 */
class DeleteQuery extends ConnectDB{
  /**
   * Variable to store connected database object.
   *
   * @var \PDO
   */
  private $conn;
  
  /**
   * Constructor to set the conn variable.
   */
  public function __construct() {
    $this->conn = $this->getConn();
  }

  /**
   * Function to remove Like from Likes database.
   *
   * @param int $post_id
   *  Post_id of the post.
   * @param int $user_id
   *  User_id of the user.
   * 
   * @return void
   */
  public function removeLike(int $post_id, int $user_id) {
    $conn = $this->conn;
    $stmt = $conn->prepare('DELETE FROM Likes WHERE post_id = :post_id AND user_id = :user_id;');
    $stmt->execute([
      'post_id' => $post_id,
      'user_id' => $user_id
    ]);
  }
}
