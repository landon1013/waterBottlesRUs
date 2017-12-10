<?php
session_start();

require_once('variables.php');

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

if (isset($_POST['submit'])) {
	for($i = 0; $i < count($_SESSION['items']); $i++) {
		$_SESSION['items'][$i][4] = $_POST['amount' . $i];
	}
	header('Location: form.php');
}

?>

<?php include_once('header.php')?>
<title>Checkout - Shipping</title>
</head>
	<body>
		<?php include_once('nav.php'); ?>
		<div id="Shipping" class="container">
			<div id="main">
				<div class="nameInfo">
					<h2><span>CHECKOUT</span></h2>
					<div class="progress">
						<img src="img/progress1@72x.png" alt="progressBar">
					</div>

					<div class="headerDisplay">
						<p class="title">Name:</p>
						<p class="title">Price:</p>
						<p class="title">quantitiy:</p>
						<div class="keepOpen"></div>
					</div>
					<hr class="fullscreen">

					<form method="POST" action="confirmItems.php">
						<?php
						if(isset($_POST['addCart'])) {
							$_SESSION['items'][] = array($_POST['model'], $_POST['size'], $_POST['color']);
						}
						if(isset($_SESSION['items'])) {
							for ($i = 0; $i < count($_SESSION['items']); $i++) {
								$model = $_SESSION['items'][$i][0];
								$size = $_SESSION['items'][$i][1];
								$color = $_SESSION['items'][$i][2];

								// Set up the query
								$query = "SELECT * FROM final_inventory WHERE  model = '$model' AND size = '$size' AND color = '$color'";

								// Try and talk to the database
								$result = mysqli_query($dbconnection, $query) or die ('id query failed');

								// Set up our $row variable to grab data from table
								while ($row = mysqli_fetch_array($result)) {
									$_SESSION['items'][$i][3] = $row['price'];
									echo '<div class="cartDisplay" id="#delete">';
									echo '<div class="column" id="button">';
									echo '<a class="remove"  href="remove.php?id='.$i.'"><i class="fa fa-times-circle" aria-hidden="true"></i></a>';
									echo '</div>';
									echo '<div class="column" id="#img">';
									echo '<img src="img/'.$row['image'].'"/>';
									echo '</div>';
									echo '<div class="column" id="#img">';
									echo '<h1>'.$row['brand'].'</h1>';
									echo '<h1>'.$row['model'].'</h1>';
									echo '<h1>'.$row['color'].'</h1>';
									echo '</div>';
									echo '<div class="column" id="#img">';
									echo '<p id="Price"> Price: '.$row['price'].'</p>';
									if ($row['stock'] > 0) {
										echo '<p class="stock">In Stock</p>';
									} else {
										echo '<p class="stock out">Out of Stock</p>';
									}
									echo '</div>';
									echo '<div class="column" id="#img">';
									if ($row['stock'] > 0) {
										echo '<input title="How many would you like?" type="number" name="amount' . $i . '" value="1" step="1" min="1" max="100" id="number">';
									} else {
										echo '<input title="Out of stock" type="number" name="amount" value="0" step="1" min="0" max="0" id="number" disabled>';
									}
									// echo '<p id="incrament"><a id="minus" class="minus"><i class="fa fa-minus-square" aria-hidden="true"></i></a></p><div class="counter">1</div><p id="incrament" ><a id="plus" class="plus"><i class="fa fa-plus-square" aria-hidden="true"></i></a></p>';
									echo '</div>';
									echo '</div>';
									echo '<div class="keepOpen"></div>';
								} // end while
							} // end for
						} else {
							echo "Cart is empty";
						} // end if isset
						?>
						<input class="cartButton" type="submit" value="Continue" name="submit">
					</form>
				</div>
			</div> <!-- end of main div -->
		</div> <!-- end of container div -->
		<?php include_once('footer.php'); ?>
	</body>
</html>
