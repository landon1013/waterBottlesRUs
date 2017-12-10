<?php
require_once('authorize.php');
require_once('variables.php');


// Build the database connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
//BUILD THE query
$brand_query = "SELECT DISTINCT(brand) FROM `final_inventory` ORDER BY 'brand'";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $brand_query) or die ('query failed');
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
    <title>Home</title>

  </head>
  <body>

  <?php include_once('nav.php'); ?>
  <div id="container">
    <div class="shop-container">
      <div class="content-title">
        <div>
          <h1>List of Items</h1>
        </div>
      </div>

      <div class="content">
        <div class="items-container">
          <?php
          while($row = mysqli_fetch_array($result)) {
            $brand = $row['brand'];
            $query = "SELECT `id`, `model`, `image`, `price`, `size`, `color`, `stock` FROM final_inventory WHERE `brand` = '$brand' GROUP BY `model`";
            $brand_result = mysqli_query($dbconnection, $query) or die ('query failed');
            echo '<div class="item-display">';
            echo '<form>';
            echo '<h1>'.$row['brand'].'</h1>';
            echo '<div class="shop-container-inner">';
            echo '<div class="item-inner-display">';

            while($row2 = mysqli_fetch_array($brand_result)) {
              echo '<a href="adminDetails.php?model=' . $row2['model'] . '">';
              echo '<div class="shop-item">';
              echo '<img class="shop-item-img" src= img/'.$row2['image'].'><br>';
              echo '<h6 class="shop-item-title">'.$row2['model'].'</h6>';
              echo '</div>';
              echo '</a>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>
        </div>
      </div> <!-- end content -->
    </div>
  </div> <!-- End container -->

  <?php include_once('footer.php'); ?>

  </body>
</html>
