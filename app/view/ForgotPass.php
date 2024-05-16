<?php
require '../controller/ForgotPassProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
  <?php require '../view/CSS/style.css';?>
  </style>
</head>

<body>
  <div class="container">
    <div>
      <div class="main-head">
        <h1>
          Forgot Password
        </h1>
      </div>
      <div class="vert-form">
        <form action="/ForgotPass" method="post">
          <label for="email">Email</label>
          <input type="email" name="email" required>
          <div class="options">
            <ul>
              <li><a href="/">Go Back to Login</a></li>
            </ul>
          </div>
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
    <?php if ($sent) : ?>
      <div class="center">
        <h2>Reset Link sent!!! Check your mail !</h2>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>
