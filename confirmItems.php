<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body><?php
if(isset($_POST['submitInfo'])){
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$bottles = "water Bottle";
$price = "12.99";

require_once('variables.php');

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "INSERT INTO checkout(name, email, phone, address1, address2, city, state, zip, in_cart, shipping_cost) VALUES ('$name','$email','$phone','$address','$address2','$city','$state','$zip','$bottles','$price')";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

//RETURN TO THE APPROVE PAGE
header('Location: confirm.php');
}
?>


<?php include_once('header.php')?>
    <title>Checkout - Shipping</title>
    
    
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="Shipping" class="container">
     <div id="main">
     <div class="nameInfo">
    <h2><span>CHECKOUT</span></h2>
    <div class="progress">
    	<img src="img/progress2.png" alt="progressBar">
    </div>
     <body>
      <INPUT TYPE=button NAME=addbox VALUE= "Add This Item To My Total" >
		<INPUT TYPE=button NAME=subbox VALUE= "Subtract This Item From My Total" >

     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>

</html>