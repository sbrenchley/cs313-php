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
        print '"' . $post['content'] . '"';
        echo '<div>';
        echo '<h3>' . 'Title: ' . $post['title'] . '</h3>';
        echo '</div>';

      }
  //  }
  ?>
  <h1>Saved Posts</h1>
  <div class=savedPosts>
    <ol>
      <li>sample post 1</li>
      <li>sample post 2</li>
      <li>sample post 3</li>
      <li>sample post 4</li>
    </ol>
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
