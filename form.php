<?php
session_start();

if (isset($_POST['submitInfo'])) {
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$price = 0;
for ($i = 0; $i < count($_SESSION['items']); $i++) {
	$_SESSION['items'][$i][3] = intval(floatval(str_replace("$","",$_SESSION['items'][$i][3]))*100);
	$price = $price + $_SESSION['items'][$i][3];
};

if ($_POST['shipping'] == standard) {
	$price = $price + 400;
} else {
	$price = $price + 1000;
}


require_once('variables.php');

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

for ($i = 0; $i < count($_SESSION['items']); $i++) {
	// Set up the query
	$modelCheck = $_SESSION['items'][$i][0];
	$sizeCheck = $_SESSION['items'][$i][1];
	$colorCheck = $_SESSION['items'][$i][2];

	$query = "SELECT * FROM final_inventory WHERE  model = '$modelCheck' AND size = '$sizeCheck' AND color = '$colorCheck'";

	// Try and talk to the database
	$result = mysqli_query($dbconnection, $query) or die ('id query failed');

	while ($row = mysqli_fetch_array($result)) {
		$bottles[$i][] = $row['id'];
		$bottles[$i][] = $_SESSION['items'][$i][4];
	}
}
$bottles = serialize($bottles);

//BUILD THE query
$query = "INSERT INTO final_checkout(name, email, phone, address1, address2, city, state, zip, in_cart, shipping_cost) VALUES ('$name','$email','$phone','$address','$address2','$city','$state','$zip','$bottles','$price')";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

//RETURN TO THE APPROVE PAGE
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
	header('Location: card.php');
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
          <form action="form.php" method="post" enctype="multipart/form-data">
               <label for="fullname" >FULL NAME</label>
               <input id="fullname" type="text" name="fullname" value="">
               <label for="email">EMAIL</label>
               <input id="email" type="email" name="email" value="">
               <label for="phone">PHONE</label>
               <input id="phone" type="number" name="phone" value="">
               <label for="address1">ADDRESS 1</label>
               <input id="address1" type="text" name="address" value="">
               <label for="adress2">ADDRESS 2</label>
               <input id="address2" type="text" name="address2" value="">
               <label for="city">CITY</label>
               <input id="city" type="text" name="city">
               <label for="state">STATE</label>
               <input id="state" type="text" name="state">
               <label for="zip">ZIP CODE</label>
               <input id="zip" type="text" name="zipcode">
               <div class="shipping-method">
                    <h2>Shipping Method</h2>
                    <div>
                         <label for="standard">$4 Standard</label>
                         <input id="standard" type="radio" name="shipping" value="standard" checked/>
                         <p>(2-3 weeks)</p>

                    </div>
                    <div>
                         <label for="ultra">$10 Ultra</label>
                         <input id="ultra" type="radio" name="shipping" value="ultra" />
                         <p>(1-3 days)</p>
                    </div>
               </div>
               <input type="submit" value="Submit" name="submitInfo" class="cartButton">
          </form>

     </body>


   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
