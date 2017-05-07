<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <script src="index.js"></script>
  <title>Checkout</title>
</head>
<body>
<h1>Checkout Page</h1>

<form method="post">
<?php

$name = $_POST['fullName'];
$address = $_POST['address'];
$state = $_POST['state'];
$zip = $_POST['zip'];

echo "<p>Full name: $name</p>" . "<br>";
echo "<p>Address: $address $city , $state $zip</p>" . "<br>";
?>
</form>

<p>Items to be purchased:</p>
 <?php
  foreach ($_SESSION['shoes'] as $key => $value) {
   echo $value . "<br>";
 }
?>

</form>

<p>Is all the information correct?</p>
<form action="confirmPage.php" method="post">Confirm
  <input type="hidden" name="confirmed" value="1"></input>
  <input type="submit"></input>
</form>
<form action="confirmPage.php" method="post">Cancel
  <input type="hidden" name="confirmed" value="0"></input>
  <input type="submit"></input>
</form>
</body>
</html>
