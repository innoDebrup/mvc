<?php
  require './controller/LoginProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./view/CSS/style.css">
  <title>Login Page</title>
</head>

<body>
  <div class="container">
    <div>
      <div class="main-head">
        <h1>
          Login
        </h1>
      </div>
      <div class="center">

      </div>
      <div class="vert-form">
        <form action="/index" method="post">
          <label for="user_mail">Username/Email</label>
          <input type="text" name="user_mail" placeholder="Enter your username or email." required>
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter your password." required>
          <div class="options">
            <ul>
              <li>New Here? <a href="/SignUp">Create an Account</a></li>
              <li><a href="/ForgotPass">Forgot your Password? </a></li>
            </ul>
          </div>
          <input type="submit" value="Submit">
        </form>
        <?php if ($invalid) : ?>
          <div>
            <h2>Invalid Username/Email or Password.</h2>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>

</html>