<?php
session_start();
require_once('variables.php');
$model = $_GET[model];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "SELECT * FROM final_inventory WHERE model = '$model'";
$size_query = "SELECT DISTINCT(size) FROM final_inventory WHERE model = '$model'";
$color_query = "SELECT DISTINCT(color) FROM final_inventory WHERE model ='$model'";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('select query failed');
$size_result = mysqli_query($dbconnection, $size_query) or die ('size query failed');
$color_result = mysqli_query($dbconnection, $color_query) or die ('size query failed');

$row = mysqli_fetch_array($result);
?>

<?php include_once('header.php')?>
<title>Details</title>
</head>

<body>
	<?php include_once('nav.php'); ?>

	<div id="details">
		<a href="shopping.php"><div class="btn back">
		Back to Shop
		</div></a>
		<img src="img/<?php echo $row['image'] ?>"  />
		<h1><?php echo $row['brand'] ?></h1>
		<h2><?php echo $row['model'] ?></h2>

		<form method="post" action="confirmItems.php">
			<h3>Size</h3>
			<select name="size">
				<?php
				while($row2 = mysqli_fetch_array($size_result)) {
				echo '<option value="'.$row2['size'].'">' . $row2['size'] . '</option>';
				}
				?>
			</select>

			<h3>Color</h3>
			<select name="color">
				<?php
				while($row2 = mysqli_fetch_array($color_result)) {
				echo '<option value = "'.$row2['color'].'">' . $row2['color'] . '</option>';
				}
				?>
			</select>

			<p>
				<?php echo $row['description']; ?>
			</p>

			<input type="hidden" name="model" value="<?php echo $model ?>">

			<input type="submit" class="btn addCart" name="addCart"	value="Add to Cart">

		</form>
	</div>
</body>
</html>
