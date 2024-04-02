<?php
require './controller/LoginChecker.php';
require './controller/ProfileProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./view/CSS/profile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="./view/JS/profile.js"></script>
  <title>Profile</title>
</head>

<body>
  <div class='container'>
    <div>
      <div>
        <a href="/Home" id="back-btn">Back</a>
      </div>
      <div class="profile">
        <div class="center col">
          <div class='pic'>
            <?php if (empty($image)) : ?>
              <img src="./view/public/assets/dummy.jpg" alt="Profile">
            <?php else: ?>
              <img src="data:image;base64, <?php echo(base64_encode($image));?>" alt="Profile">
            <?php endif; ?>
          </div>
          <a class='edit'>Edit</a>
          <form action="/Profile" method="post" enctype="multipart/form-data">
            <input type="file" name="pic" accept="image/png, image/jpg, image/jpeg, image/webp">
            <input type="submit" value="Upload">
          </form>
        </div>
        <div class="user-name">
          <h1><?php echo $user_name; ?></h1>
        </div>
      </div>
      <?php if ($error): ?>
        <div class="error">
          <h2>File Type not allowed.</h2>
        </div>
      <?php endif; ?>
      <table id="main-table">
        <tbody>
          <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
            <td></td>
          </tr>
          <tr>
            <th>First Name</th>
            <td><?php echo (empty($first_name) ? 'Not Set' : $first_name); ?></td>
            <td>
              <a class="edit">Edit</a>
              <form action="/Profile" method="post" class="edit-input">
                <input type="text" name="f_name" placeholder="Enter Your First Name" maxlength="30">
                <input type="submit" value="Submit">
              </form>
            </td>
          </tr>
          
          <tr>
            <th>Last Name</th>
            <td><?php echo (empty($last_name) ? 'Not Set' : $last_name); ?></td>
            <td>
              <a class="edit">Edit</a>
              <form action="/Profile" method="post" class="edit-input">
                <input type="text" name="l_name" placeholder="Enter Your Last Name" maxlength="30">
                <input type="submit" value="Submit">
              </form>
            </td>
          </tr>
          <tr>
            <th>Country</th>
            <td><?php echo (empty($country) ? 'Not Set' : $country); ?></td>
            <td>
              <a class="edit">Edit</a>
              <form action="/Profile" method="post" class="edit-input">
                <input type="text" name="country" placeholder="Enter Your Country Name" maxlength="30">
                <input type="submit" value="Submit">
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>