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
      include("config.php");

      // see if we got here from the filter form
      $subreddit_filter = isset($_GET['subreddit_filter']) ? $_GET['subreddit_filter'] : null;
      $key_words = isset($_GET['key_words']) ? $_GET['key_words'] : null;

      // treat "ALL" as an empty value as well
      $subreddit_filter = (!$subreddit_filter || $subreddit_filter == "ALL") ? null : $subreddit_filter;

      debug("subreddit_filter: $subreddit_filter");
      debug("key_words: $key_words");

      $query = "SELECT * FROM saved_posts WHERE user_id = :id";

      if ($subreddit_filter) {
        $query = $query . " AND subrredit = :subreddit_filter";
      }

      if ($key_words) {
        $query = $query . " AND title LIKE '%:key_words%'";
      }

      debug("query: $query");
      $stmt = $db->prepare($query)

      $stmt->bindValue(':id', $_SESSION['login_id'], PDO::PARAM_STR);
      if ($subreddit_filter) {
        $stmt->bindValue(':subreddit_filter', $subreddit_filter, PDO::PARAM_STR);
      }
      if ($key_words) { $stmt->bindValue(':key_words', $key_words, PDO::PARAM_STR); }

      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // $stmt = $db->prepare('SELECT * FROM saved_posts WHERE user_id=:id');
      // $stmt->bindValue(':id', $_SESSION['login_id'], PDO::PARAM_STR);
      // $stmt->execute();
      // $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

      <input type="text" name="key_words" class="searchTerm" placeholder="Key Words">

      <button type="submit">Go</button>
    </div>
  </form>
</body>
</html>
