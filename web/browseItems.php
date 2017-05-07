<?php
  session_start();
  $_SESSION['Username']=value;
?>
<html lang="en">
 <head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
 </head>
 <body>
  <h1>Browse Items</h1>
  <form method="post" action="">
   <div class="container">
    <div><input type="checkbox" value="Greek Sandals" data-price="22" name="shoes[]"/>Greek Sandals</div>
    <div><input type="checkbox" value="Business Heels" data-price="30" name="shoes[]"/>Business Heels</div>
    <div><input type="checkbox" value="Flip Flops" data-price="12" name="shoes[]"/>Flip Flops</div>
   </div>
   <br>
   <div class="container">
    <div><img src="greekSandals.jpg" height="150" width="150"></div>
    <div><img src="businessHeels.jpg" height="150" width="150"></div>
    <div><img src="flipFlops.jpg" height="150" width="150"></div>
   </div>
   <br>
   <br>
   <div class="container">
    <div><input type="checkbox" value="Sneakers" data-price="40" name="shoes[]"/>Sneakers</div>
    <div><input type="checkbox" value="Sparkly Heels" data-price="15" name="shoes[]"/>Sparkly Heels</div>
    <div><input type="checkbox" value="Vans" data-price="25" name="shoes[]"/>Vans</div>
   </div>
   <br>
   <div class="container">
    <div><img src="tennisShoes.jpg" height="150" width="150"></div>
    <div><img src="sparklyHeels.jpg" height="150" width="150"></div>
    <div><img src="vans.jpg" height="150" width="150"></div>
   </div>
   <br>
   <br>
   <div class="container">
    <div><input type="checkbox" value="Basketball Shoes" data-price="50" name="shoes[]"/>Basketball Shoes</div>
    <div><input type="checkbox" value="Ballet Flats" data-price="10" name="shoes[]"/>Ballet Flats</div>
    <div><input type="checkbox" value="Crocs" data-price="18" name="shoes[]"/>Crocs</div>
   </div>
   <br>
   <div class="container">
    <div><img src="basketballShoes.jpg" height="150" width="150"></div>
    <div><img src="balletFlats.jpg" height="150" width="150"></div>
    <div><img src="crocs.jpg" height="150" width="150"></div>
   </div>
   <div>
    <input type="submit" name="submit" value="submit">
   </div>
 </form>
 <br>
 <br>
 <div>
  <?php
   if(isset($_POST['submit'])) {
     $_SESSION['shoes'] = $_POST['shoes'];
     foreach ($_SESSION['shoes'] as $key => $value) {
       echo "Shoes : " .$value."<br />";
     }
   }
  ?>
  <br>
  <br>
 </div>
 <a href="viewCart.php">View Cart</a>
 </body>
</html>
