<?php
require_once 'ConnectDB.php';
/**
 * Class that handles all Create operations for the Web-App.
 */
class UpdateQuery extends ConnectDB {
  private $conn;

  public function __construct() {
    $this->conn = $this->getConn();
  }

  /**
   * Function to add Token for Resetting password.
   *
   * @param string $email
   *  Email of the account whose Password is to be reset and Token generated.
   * 
   * @return void
   */
  public function addToken(string $email) {
    $conn = $this->conn;
    $token = bin2hex(random_bytes(16));
    $token_hash = hash('sha256',$token);
    $expiry = date('Y-m-d H:i:s', time() + 60 * 2);
    $stmt = $conn->prepare("UPDATE Users SET reset_token = :token, token_timer = :timer WHERE email = :email;");
    $stmt->execute([
      'token' => $token_hash,
      'timer' => $expiry,
      'email' => $email
    ]);
  }

  /**
   * Function to reset password.
   *
   * @param integer $user_id
   *  User-id of the account whose password is to be reset.
   * @param string $password
   *  New Password for the account.
   * 
   * @return void
   */
  public function resetPass(int $user_id, string $password) {
    $conn = $this->conn;
    $stmt = $conn->prepare("UPDATE Users SET password = :password, reset_token = NULL, token_timer = NULL WHERE user_id = :user_id;");
    $stmt->execute([
      'password' => $password,
      'user_id' => $user_id
    ]);
  }

  /**
   * Function to Edit First Name of the User.
   *
   * @param int $user_id
   *  Unique user_id of the user.
   * @param string $first_name
   *  Name to be added replacing the old value.
   * 
   * @return void
   */
  public function editFirstName($user_id, $first_name) {
    $conn = $this->conn;
    $stmt = $conn->prepare("UPDATE UserDetails SET first_name = :first_name WHERE user_id = :user_id");
    $stmt->execute([
      'first_name' => $first_name,
      'user_id' => $user_id
    ]);
  }

  /**
   * Function to Edit Last Name of the User.
   *
   * @param int $user_id
   *  Unique user_id of the user.
   * @param string $last_name
   *  Name to be added replacing the old value.
   * 
   * @return void
   */
  public function editLastName($user_id, $last_name) {
    $conn = $this->conn;
    $stmt = $conn->prepare("UPDATE UserDetails SET last_name = :last_name WHERE user_id = :user_id");
    $stmt->execute([
      'last_name' => $last_name,
      'user_id' => $user_id
    ]);
  }

  /**
   * Function to Edit Country Name of the User.
   *
   * @param int $user_id
   *  Unique user_id of the user.
   * @param string $country
   *  Country Name to be added replacing the old value.
   * 
   * @return void
   */
  public function editCountry($user_id, $country) {
    $conn = $this->conn;
    $stmt = $conn->prepare("UPDATE UserDetails SET country = :country WHERE user_id = :user_id");
    $stmt->execute([
      'country' => $country,
      'user_id' => $user_id
    ]);
  }

  /**
   * Function to edit Profile Picture of the User.
   *
   * @param int $user_id
   *  Unique user_id of the user.
   * @param string $country
   *  Image to be added.
   * 
   * @return void
   */
  public function editProfile($user_id, $img) {
    $conn = $this->conn;
    $stmt = $conn->prepare("UPDATE UserDetails SET profile_pic = :img WHERE user_id = :user_id");
    $stmt->execute([
      'img' => $img,
      'user_id' => $user_id
    ]);
  }

}


