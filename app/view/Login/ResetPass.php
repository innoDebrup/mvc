<?php
require '../controller/Login/ResetPassProcess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <title>Forgot</title>
</head>
<body>
  <div class="container">
    <div>
      <div class="main-head">
        <h1>
          Reset Password
        </h1>
      </div>
      <?php if (!$reset): ?>
      <div class="vert-form">
        <form action="/ResetPass" method="post">
          <label for="password">New Password</label>
          <input type="password" name="password">
          <input type="submit" value="Submit">
        </form>
        <div>
          <?php echo $message; ?>
        </div>
      </div>
      <?php endif;?>
      <?php if($reset): ?>
        <div class="vert-form">
          <h1><?php echo $message; ?></h1>
          <a href='/'>Go to Login page</a>
        </div>  
      <?php endif; ?>
    </div>
  </div>
</body>
</html>