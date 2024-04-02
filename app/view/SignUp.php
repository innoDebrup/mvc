<?php
require './controller/SignUpProcess.php';
// var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./view/CSS/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="./view/JS/script.js"></script>
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
          <input type="text" name="email" id="email">
          <label for="password">Password</label>
          <input type="password" name="password">
          <div id="otpcon">
            <label for="otp">Email OTP</label>
            <input type="text" name='otp' id="otp">
          </div>
          <div id="getotpcon">
            <input type="button" value="Get OTP" id="check">
          </div>
          <div id="message"></div>
          <div class="options">
            <ul>
              <li><a href="/">Go Back to Login</a></li>
            </ul>
          </div>

          <input type="submit" value="Submit">
        </form>
        <div class="center">
          <h2><?php if (!$valid_input) {echo "Please fill all fields correctly!";} ?></h2>
          <h3 id="response"></h3>
          <h4><?php echo $message ?></h4>
          <?php if ($success) : ?>
            <a href="/">Login</a>
          <?php endif; ?>
        </div>  
      </div>
    </div>
  </div>
</body>

</html>