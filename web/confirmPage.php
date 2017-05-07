<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <title>Confirm</title>
</head>

<body>
<h1>Confirm Page</h1>

<?php
  $confirmed = $_POST["confirmed"];
  if ($confirmed == 1) {
    echo "<p>The purchase was complete!</p>" . "<br>";
  } else {
    echo "<p>The purchase was cancelled.</p>" . "<br>";
  }
?>
</body>
</html>
