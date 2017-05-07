<?php
  session_start();
?>
<?php
  if(isset($_POST['submit'])){
    echo $_POST['submit'];
    unset($_POST['shoes'][$_POST['submit']]);
  }
  ?>
<html lang="en">
 <head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
 </head>
 <body>
   <h1>Items currently in your cart:</h1>
   <form method="post">
    <div id="para">
     <?php
      foreach ($_SESSION['shoes'] as $key => $value) {
       echo $value . " ";
       echo '<button name=submit value='.$key.'>remove</button>';
       echo "<br>";
      }
     ?>
  </div>
 </form>
 <a href="browseItems.php">Return to Shopping Cart</a>
 <br>
 <a href="checkout.php">Continue to checkout</a>
 </body>
</html>
