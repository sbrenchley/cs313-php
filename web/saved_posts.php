<?php
  include 'header.php';
  if (!empty($_SESSION['login_user'])) {
    ?>
    <a href='logout_page.php'>Click here to log out</a>
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
    <a href="get_posts.php">Click here to get my saved posts</a>

  <?php
//  if(isset($_GET['id']))
//    {
      include("config.php");

      $stmt = $db->prepare('SELECT * FROM saved_posts WHERE user_id=:id');
//      $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
      $stmt->bindValue(':id', $_SESSION['login_id'], PDO::PARAM_STR);
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
  <form action="/saved_posts.php" method="get">
    <div class="container">
      <select name='subreddit_filter'>
        <option value="all" selected>All</option>
        <?php
          $stmt = $db->prepare('SELECT DISTINCT(subreddit) FROM saved_posts WHERE user_id=:id ORDER BY subreddit');
          $stmt->bindValue(':id', $_SESSION['login_id'], PDO::PARAM_STR);
          $stmt->execute();
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach($rows as $post)
          {
            echo '<option value="' . $post['subreddit'] . '">' . $post['subreddit'] . '</option>';
          }
        ?>
      </select>
      <input type="text" class="searchTerm" placeholder="Key Words">
      <button type="submit">Go</button>
    </div>
  </form>
  <br/>
  <br/>
  <br/>
  <div class="search">
    <input type="text" class="searchTerm" placeholder="Key Words">
    <button type="submit">Go</button>
  </div>
  <br/>
  <br/>
</body>
</html>
