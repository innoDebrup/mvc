<?php
require './controller/LoginChecker.php';
//require './controller/PostProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navigation Bar with Search Box</title>
  <link rel="stylesheet" href="./view/CSS/home.css" />
  <!-- Unicons CSS -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <script src="./view/JS/home.js" defer></script>
</head>

<body>
  <nav class="nav">
    <i class="uil uil-bars navOpenBtn"></i>
    <a href="#" class="logo">Great App</a>
    <div class="nav-links">
      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="#">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>

      <i class="uil uil-search search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Search here..." />
      </div>
    </div>
    <div class="nav-links">
      <div><a href="/Profile">Profile</a></div>
      <div><a href="/Logout">Logout</a></div>
    </div>
  </nav>
  <div class="container2">
    <h2>Create a Post</h2>
    <form action="/Home" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="post-text">Write something:</label>
        <textarea id="post-text" name="post-text" rows="4" cols="50"></textarea>
      </div>
      <div class="form-group">
        <label for="post-image">Upload an image:</label>
        <input type="file" id="post-image" name="post-image">
      </div>
      <button type="submit">Post</button>
    </form>
  </div>
</body>

</html>