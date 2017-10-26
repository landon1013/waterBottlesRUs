<?php
	session_start();
//$row = mysqli_fetch_array($data);
			
			//setcookie('username', $row['username'], time()+(60*60*24*30));

require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "SELECT * FROM inventory";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('query failed');


   
?>
   <?php include_once('header.php')?>
    <title>Checkout - Card</title>

  </head>
  <body >
    <?php include_once('nav.php'); ?>
<div id="shop" class="container">
    <div id="main">
      <div class="shop-container">
        <h1 class="shop-title">Our Products</h1>
        <div class="shop-container-inner">
        <?php  
			while($row = mysqli_fetch_array($result)){
				echo'
        <div class="shop-item">';
         echo'   <img class="shop-item-img" src= img/main-bottle.png>';
           echo '<h6 class="shop-item-title">'.$row['model'].'</h6>
            <p class="shop-item-price">'.$row['price'].'</p><br>
            <input type="submit" name="'.$row['model'].'" value="Add to Cart" class="add2cart" isclicked="'.$_SESSION[$row['model'].$row[color]].'">
        </div>';
			}
			
			?>
       
        </div>
      </div>
    </div>
  </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
