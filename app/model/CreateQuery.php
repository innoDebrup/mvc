<?php
require_once 'ConnectDB.php';
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
   * @param string $password
   *  Password set for the new account.
   * 
   * @return void
   */
  public function addUser(string $user_name, string $email, string $password) {
    $conn = $this->conn;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare('INSERT INTO Users (user_name, email, password) VALUES (:username, :email, :password);');
    $stmt->execute([
      'username' => $user_name, 
      'email' => $email,
      'password' => $password_hash,
    ]);
  }
}
