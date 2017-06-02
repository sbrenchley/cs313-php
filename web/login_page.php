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
      //echo 'Working 3';
    if (isset($_POST['submit']))
    {
      include("config.php");
      //session_start();
      $username=$_POST['username'];
      $password=$_POST['password'];

      try {
        $query = $db->prepare("SELECT id, password FROM users WHERE username=:username");
        $query->bindParam(':username', $username);
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_OBJ);
        if($result !== false) {
          //check to see if passwords match
          //TODO make this compare hashes of password instead
          if($result->password === $password) {
            //logged in
            $_SESSION['login_user']=$username;
            $_SESSION['login_id']=$result->id;
            $_SESSION['reddit_state']="initial";
            echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
          }
          else {
            echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
          }
        }
        else {
          echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
        }
      }
      catch (Exception $ex) {
        echo $ex->getMessage();
        echo "<script type='text/javascript'>alert('Unable to access the database!')</script>";
      }

      //$nRows = $db->query($query)->fetchColumn();
      //echo $nRows;

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

*/
/*
      if ($nRows != 0)
      {
        echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
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
      <input type="submit" name="submit" value="submit">
      <br/>

      <br />
      <a href="/new_user.php">Don't have an account? Sign up!</a>
    </div>
  </form>
</body>
</html>
