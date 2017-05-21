<?php
session_start();
?>

<!DOCTYPE html>
<html lan="en">
<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
  <?php
      echo 'Working 3';
    if (isset($_POST['submit']))
    {
      //include("config.php");
      //session_start();
      //$username=$_POST['username'];
      //$password=$_POST['password'];
      //$_SESSION['login_user']=$username;

      //$query = "SELECT count(*) FROM login WHERE username='$username' and password='$password'";
      //$nRows = $db->query($query)->fetchColumn();
      echo 'word';
    //  echo $nRows;

      /* $stmt = $db->prepare('SELECT * FROM Scriptures WHERE ID=:id');
      $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach($rows as $scrip)
      {
        print '"' . $scrip['content'] . '"';
      }
      */

      /*
      if(pg_num_rows($result) != 1) {
          // do error stuff
      } else {
          // user logged in
      }



      $query = mysql_query("SELECT username FROM login WHERE username='$username' and password='$password'");
      if (mysql_num_rows($query) != 0)
      {
        echo "<script language='javascript' type='text/javascript'> location.href='home.php' </script>";
      }
      else
      {
        echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
      }
      */
    }
  ?>
  <h1>Saved Pages</h1>
  <form action="/login_page.php" method="post">
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      <br/>
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <br/>
      <button type="submit">Login</button>
      <br/>
    </div>
  </form>
</body>
</html>
