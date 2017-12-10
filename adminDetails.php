<?php
$temp_model = $_GET['model'];

require_once('variables.php');

// Build the database connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

// Select members from database
$query = "SELECT * FROM `final_inventory` WHERE `model`='$temp_model'";

// Connect to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');
?>

<!doctype HTML>
<html>
  <head>
  <meta charset="utf-8">
  <link href="scss/reset.css" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet" type="text/css">

  <!-- link font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- import google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <title>Updating Items</title>
  </head>

  <body>

    <?php include_once('nav.php'); ?>
    <div id="container">
      <div class="content-title">
        <div>
          <h1>Updating Items</h1>
          <a href="inventory.php">Back</a>
        </div>
      </div>

      <div class="content">
        <br />
        <?php
        while ($row = mysqli_fetch_array($result)) {
          echo '<div class="item-details">';
            echo '<form action="updateToDatabase.php" method="POST" enctype="multipart/form-data">';
              echo '<fieldset>';
                echo '<br>';
                echo '<div class="image-container">';
                  echo '<img src="img/' . $row['image'] . '">';
                echo '</div>';
                echo '<div class="details-container">';
                  echo '<br>';
                  echo '<label>Image:</label>';
                  echo '<input type="text" value="' . $row['image'] . '" name="image"> <br>';
                  echo '<label>Brand: </label> <input type="text" name="brand" value="' . $row['brand'] . '" required readonly /><br>';
                  echo '<label>Model: <label> <input type="text" name="model" value="' . $row['model'] . '" required readonly /><br>';
                  echo '<label>Size: </label> <input type="text" name="size" value="' . $row['size'] . '" readonly /><br>';
                  echo '<label>Color: </label> <input type="text" name="color" value="' . $row['color'] . '" required readonly /><br>';
                  echo '<label>Price: <label> <input type="text" name="price" value="' . $row['price'] . '" required /><br>';
                  echo '<label>Stock: </label> <input type="text" name="stock" value="' . $row['stock'] . '" /><br>';
                  echo '<input type="hidden" value="' . $row['id'] . '" name="id" />';
                echo '</fieldset>';
                echo '<br>';
                echo '<input type="submit" value="Update" name="submit"';
            echo '</form>';
          echo '</div>';
        }
      ?>
      </div> <!-- end content -->
    </div> <!-- End container -->

    <?php include_once('footer.php'); ?>

  </body>
</html>
