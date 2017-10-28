<?php
session_start();
if(isset($_POST['addCart'])){
$getColor = $_POST['getColor'];
$getSize = $_POST['getSize'];
$_SESSION['color'] = $getColor;
$_SESSION['size'] = $getSize;
}

$model = $_SESSION['model'];
$brand = $_SESSION['brand'];
$color = $_SESSION['color'];
$size = $_SESSION['size'];

	
		require_once('variables.php');

		//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
		$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

		$id_query = "SELECT * FROM inventory WHERE  model = '$model' AND size = '$size' AND color = '$color'";
			
		$item_id = mysqli_query($dbconnection, $id_query) or die ('id query failed');

		$fetch_id  = mysqli_fetch_array($item_id);
		
	
		
		$_SESSION['id']=$fetch_id['id'];
			$items =  $_SESSION['id'];
	
	if(isset($_SESSION['cart'][$fetch_id['id']])){
				$_SESSION['cart'][$fetch_id['id']]++;
			
		}
	
else{
	
	$_SESSION['cart'][$fetch_id['id']]=1;
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
  
     <?php 
		 
			
	$max = count( $items );		
		
		 for( $i = 0; $i < $max; $i++ )
{
	 
		 foreach($_SESSION['cart'] as $items => $count){

			 $display = "SELECT * FROM inventory WHERE id='$items'";
			 $select = mysqli_query($dbconnection, $display) or die ('select query failed');
			 
			$print = mysqli_fetch_array($select);
		
			echo '<h1>'.$print['brand'].'</h1>';
			echo '<h1>'.$print['model'].'</h1>';
			echo '<p> Size:'.$print['size'].'    Color:'.$print['color'].'</p>';
				echo '<form method="post" ><input type="submit" class="remove" value="remove"  name="remove"></form>';
		 
	
		
		
		
		
		 }
	
			  
		 	 
		
		
}//end of for statement
	
		 	 	if(isset($_POST['remove'])){
					$key = $print['id'];
					unset($_SESSION["cart"][$fetch_id['id']]);
					echo '<p> function is running </p>'.$count;
				}
	else{
		echo 'function is not running';
	}
		 
		 
		 ?>

     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>

</html>