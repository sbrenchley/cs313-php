<?php
  include 'header.php';

  //send the user to reddit to obtain permission to access their saved posts
  if($_SESSION['reddit_state'] === "initial") {
    $_SESSION['reddit_state'] = "attempt_to_authorize";
    header('Location: https://www.reddit.com/api/v1/authorize?client_id=CXR7MyVIXCoN7A&response_type=code&state=suzanne&redirect_uri=https://ancient-wave-30284.herokuapp.com/get_posts.php&duration=temporary&scope=history')
  }
  //handle the response from reddit
  else if($_SESSION['reddit_state'] === "attempt_to_authorize") {
    //did not get permission
    if(isset($_GET['error'])) {
      $_SESSION['reddit_state'] = "initial";
      echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
    }
    //got permission
    else {
      //$_SESSION['reddit_state'] = "authorized";
      //make sure we initiated request by comparing state
      if ($_GET['state'] !== "suzanne") {
        $_SESSION['reddit_state'] = "initial";
        //TODO randomize state each time a request is made
        echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
      }
      //this is if everything went right so far
      else {
        $_SESSION['reddit_state'] = "authorized";
        $_SESSION['reddit_code'] = $_GET['code'];

        //request an access token via a POST request
        $url = "https://www.reddit.com/api/v1/access_token";
        $data = array('grant_type' => 'authorization_code', 'code' => $_GET['code'], 'redirect_uri' => 'https://ancient-wave-30284.herokuapp.com/get_posts.php');

        // use key 'http' even if you send the request to https://...
        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
          )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
          //something went wrong
          $_SESSION['reddit_state'] = "initial";
          echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
        }
        //everything went right
        else {
          //put data into php array
          $result_data = json_decode($result);
          $_SESSION['reddit_token'] = $result_data->access_token;
          $_SESSION['reddit_state'] = "have_token";
        }
        var_dump($result);
      }
    }
  }

  if ($_SESSION['reddit_state'] === "have_token") {
    //TODO hard-coding this for now. need to request it via reddit api
    $_SESSION['reddit_user'] = 'sbrenchley';



    //request the user's saved posts
    $url = "https://oauth.reddit.com/api/v1/user/" . $_SESSION['reddit_user'] . "/saved";
    $data = array('grant_type' => 'authorization_code', 'code' => $_GET['code'], 'redirect_uri' => 'https://ancient-wave-30284.herokuapp.com/get_posts.php');

    // use key 'http' even if you send the request to https://...
    $options = array(
      'http' => array(
        'header'  => ["Content-type: application/json\r\n",
                      "Authorization: bearer " . $_SESSION['reddit_token'] . "\r\n"],
        'method'  => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) {
      //something went wrong
      $_SESSION['reddit_state'] = "initial";
      echo "<script language='javascript' type='text/javascript'> location.href='saved_posts.php' </script>";
    }
    //everything went right
    else {
      //put data into php array
      $result_data = json_decode($result);
      $_SESSION['reddit_token'] = $result_data->access_token;
      $_SESSION['reddit_state'] = "have_token";
    }
    var_dump($result);
  }
?>
