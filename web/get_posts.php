<?php
  include 'header.php';
  if($_SESSION['reddit_state'] === "initial") {
    $_SESSION['reddit_state'] = "attempt_to_authorize";
    header('Location: https://www.reddit.com/api/v1/authorize?client_id=CXR7MyVIXCoN7A&response_type=code&state=suzanne&redirect_uri=https://ancient-wave-30284.herokuapp.com/get_posts.php&duration=temporary&scope=history')
  }
  else if($_SESSION['reddit_state'] === "attempt_to_authorize") {
    if(isset($_GET['error'])) {
      $_SESSION['reddit_state'] = "initial";
      echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
    }
    else {
      $_SESSION['reddit_state'] = "authorized";
      if ($_GET['state'] !== "suzanne") {
        $_SESSION['reddit_state'] = "initial";
        //TODO randomize state each time a request is made
        echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";      
      }
      $_SESSION['reddit_code'] = $_GET['code'];
    }
  }
?>
