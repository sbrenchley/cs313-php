<?php
  session_start();
  include 'header.php';
  header('Location: https://www.reddit.com/api/v1/authorize?client_id=CXR7MyVIXCoN7A&response_type=code&state=suzanne&redirect_uri=https://ancient-wave-30284.herokuapp.com/get_posts.php&duration=temporary&scope=history')
?>
