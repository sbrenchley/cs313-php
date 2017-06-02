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

        function debug($message) {
          echo '<script type="text/javascript">console.log("' . $message . '")</script>';
        }

        function isUsernameValid($db, $username) {
          $query = $db->prepare("SELECT 1 FROM users WHERE username = :username");
          $query->bindParam(':username', $username);
          $query->execute();
          $result = $query->fetch(PDO::FETCH_OBJ);

          return $result === false; // if now row exists, then this is good to go
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        debug(isUsernameValid($db, $username) ? "valid" : "not");

        if (isUsernameValid($db, $username)) {
          $query = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
          $query->bindParam(':username', $username);
          $query->bindParam(':password', $password);
          $query->execute();

          // hack to log the new user in: render a hidden form with new values and submit it
          $html = array(
            '<form id="post_back_to_login" action="/login_page.php" method="post" style="display: none;">',
              '<input type="text" name="username" value="' . $username . '">',
              '<input type="password" name="password" value="' . $password . '">',
              '<input type="text" name="submit" value="submit">',
            '</form>',

            '<script type="text/javascript">',
              'HTMLFormElement.prototype.submit.call(document.getElementById("post_back_to_login"));',
            '</script>'
          );

          echo join("", $html);
        }
        else {
          $usernameError = "'$username' is already taken";
        }
      }
    ?>

    <h1>Saved Pages</h1>

    <?php
      if (isset($usernameError)) {
        echo '<div style="color: #f44336;">';
        echo   $usernameError;
        echo '</div>';
      }
    ?>

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
