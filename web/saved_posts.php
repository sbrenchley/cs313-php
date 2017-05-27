<?php
  session_start();
  include 'header.php';
  if (!empty($_SESSION['login_user'])) {
    ?>
    <a href='logout.php'>Click here to log out</a>
    <?php
  }
?>
<!DOCTYPE html>
<html lan="en">
<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
  <h1>Saved Posts</h1>
  <div class=savedPosts>

  <?php
//  if(isset($_GET['id']))
//    {
      include("config.php");

      $stmt = $db->prepare('SELECT * FROM saved_posts WHERE user_id=:id');
//      $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
      $stmt->bindValue(':id', '1', PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach($rows as $post)
      {
        echo '<div>';
        echo '<h3>' . 'Title: ' . $post['title'] . '</h3>' . '<br/>';
        echo 'Subreddit: ' . $post['subreddit'] . '<br/>';
        echo 'Link: ' . $post['link'] . '<br/>';
        echo 'Votes: ' . $post['votes'] . '<br/>';
        echo 'Date Saved: ' . $post['saved_date'] . '<br/>';
        echo '</div>';

      }
  //  }
  ?>
  </div>
  <br/>
  <br/>
  <p>Filter by Subreddit</p>
  <select>
    <option value="all">All</option>
    <option value="test">Test data</option>
  </select>
  <input type="text" class="searchTerm" placeholder="Key Words">
  <button type="submit">Go</button>
  <br/>
  <br/>
  <br/>
  <div class="search">
    <input type="text" class="searchTerm" placeholder="Search by title">
    <button type="submit">Go</button>
  </div>
  <br/>
  <br/>
</body>
</html>
