<?php
require_once('variables.php');
$model = $_GET[model];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "SELECT * FROM inventory WHERE model = '$model'";
$size_query = "SELECT DISTINCT(size) FROM inventory WHERE model = '$model'";
$color_query = "SELECT DISTINCT(color) FROM inventory WHERE model ='$model'";

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
		<img src="img/<?php echo $row['image'] ?>"  />
		<form>
			<h1><?php echo $row['brand'] ?></h1>
			<h2><?php echo $row['model'] ?></h2>
			<h2 class="yo">Size</h2>
			<select>
				<?php
				while($row2 = mysqli_fetch_array($size_result)) {
					echo '<option>' . $row2[size] . '</option>';
				}
				?>
			</select>

			<h2 class="yo">Color</h2>
			<select>
				<?php
				while($row2 = mysqli_fetch_array($color_result)) {
					echo '<option>' . $row2[color] . '</option>';
				}
				?>
			</select>

			<p>
				<?php echo $row['description']; ?>
			</p>

			<p>In stock.</p>
			<!-- <div class="description">
				<p>Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Pellentesquuris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.</p>
			</div> -->
		</form>
	</div>
</body>
</html>
