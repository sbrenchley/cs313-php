<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="index.js"></script>
  <title>Checkout</title>
</head>
<body>
<h1>Checkout Page</h1>
<form id="myForm" action="purchaseReview.php" method="post" id="form2" name="info"
    onsubmit="mySubmit()" onreset="myReset()">
<table>
 <tr>
 <td>
  <p>Name:</p>
  <input size="20" onChange="validateName(event);"
                   onKeyUp="triggerChange(event);"
                   name="fullName"
  </td>
  <td><span style="color:red">Invalid Name</span></td>
  </tr>
  <tr>
  <td>
   <p>Address:</p>
   <input size="30" onChange="validateAddress(event);"
                    onKeyUp="triggerChange(event);"
                    name="address"
  </td>
  <td><span style="color:red">Invalid Address</span></td>
  </tr>
  <tr>
  <td>
   <p>City:</p>
   <input size="30" onChange="validateCity(event);"
                    onKeyUp="triggerChange(event);"
                    name="city"
   </td>
   <td><span style="color:red">Invalid Address</span></td>
   </tr>
   <tr>
   <td>
    <p>State Abbreviation:</p>
    <input size="30" onChange="validateState(event);"
                     onKeyUp="triggerChange(event);"
                     name="state"
   </td>
   <td><span style="color:red">Invalid Address</span></td>
   </tr>
   <tr>
   <td>
    <p>Zip Code:</p>
    <input size="30" onChange="validateZip(event);"
                     onKeyUp="triggerChange(event);"
                     name="zip"
    </td>
    <td><span style="color:red">Invalid Address</span></td>
    </tr>
</table>
  <input type="submit">Continue to Confirmation Page</input>
</form>
</body>
</html>
