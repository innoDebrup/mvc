<?php
require '../controller/Login/SignUpProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <title>Sign Up</title>
</head>

<body>
  <div class="container">
    <div>
      <div class="main-head">
        <h1>
          Sign Up Now!
        </h1>
      </div>
      <div class="vert-form">
        <form action="/SignUp" method="post">
          <label for="user_name">Username</label>
          <input type="text" name="user_name">
          <label for="email">Email</label>
          <input type="email" name="email">
          <label for="password">Password</label>
          <input type="password" name="password">
          <div class="options">
            <ul>
              <li><a href="/">Go Back to Login</a></li>
            </ul>
          </div>
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</body>

</html>