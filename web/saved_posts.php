<!DOCTYPE html>
<html lan="en">
<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
  <?php
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
