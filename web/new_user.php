<?php session_start(); ?>

<!DOCTYPE html>
<html lan="en">
  <head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
    <?php
      if (isset($_POST['submit'])) {
        include("config.php");
        include("header.php");

        function isUsernameValid($username) {
          $query = $db->prepare("SELECT 1 FROM users WHERE username = :username");
          $query->bindParam(':username', $username);
          $query->execute();
          $result = $query->fetch(PDO::FETCH_OBJ);

          return $result === false; // if now row exists, then this is good to go
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        debug(isUsernameValid($username) ? "valid" : "not");
      }
    ?>

    <h1>Saved Pages</h1>

    <form action="/new_user.php" method="post">
      <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <br />
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <br />
        <input type="submit" name="submit" value="submit">

        <br />
        <br />
        <a href="/login_page.php">Already have an account? Sign in!</a>
      </div>
    </form>
  </body>
</html>
