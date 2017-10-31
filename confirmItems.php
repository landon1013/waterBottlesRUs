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
    	<img src="img/progress1@72x.png" alt="progressBar">
    </div>
  
     <?php $_SESSION['cart'][$fetch_id['id']]=0;?>
     
     
				<div class="headerDisplay">
		 		<p class="title">Name:</p>
				<p class="title">Price:</p>
				<p class="title">quantitiy:</p>
				<div class="keepOpen"></div>
		 		</div>
				<hr class="fullscreen">
	 
		<?php
			$amount = 0;
			 if(isset($_SESSION['cart'][$fetch_id['id']])){
					$_SESSION['cart'][$fetch_id['id']]++;
			 }
		 elseif($_SESSION['cart'][$fetch_id['id']]==0){
				echo "Cart is empty";
		 }

			 foreach($_SESSION['cart'] as $items => $count){

			

		 				
					
			 
			 

			$display = "SELECT * FROM inventory WHERE id='$items'";
			$select = mysqli_query($dbconnection, $display) or die ('select query failed');
			$print = mysqli_fetch_array($select);
			 
			$delete = $print['id'];
			 
		
			 
				
			 echo '<div class="cartDisplay" id="#delete">';
		
			 echo '<div class="column" id="button">';
			 echo '<a class="remove"  href="remove.php?id='.$print['id'].'"><i class="fa fa-times-circle" aria-hidden="true"></i></a>';
		
			 echo '</div>';

			 
			 echo '<div class="column" id="#img">';
			 echo '<img src="img/'.$print['image'].'"/>';
			 echo '</div>';
			 
			echo '<div class="column" id="#img">';
			echo '<h1>'.$print['brand'].'</h1>';
			echo '<h1>'.$print['model'].'</h1>';
			 echo '</div>';
			 
			 
			 echo '<div class="column" id="#img">';
				
			 echo '<p id="Price"> Price: '.$print['price'].'</p>';
			 echo '</div>';
			 
			  echo '<div class="column" id="#img">';
				
					 echo '<input type="number" name="amount" placeholder="1" step="1" min="0" max="100" id="number">';
				
				
			// echo '<p id="incrament"><a id="minus" class="minus"><i class="fa fa-minus-square" aria-hidden="true"></i></a></p><div class="counter">1</div><p id="incrament" ><a id="plus" class="plus"><i class="fa fa-plus-square" aria-hidden="true"></i></a></p>';
			 echo '</div>';
		 		echo '</div>';
			 echo '<div class="keepOpen"></div>';
		
			

				
		
							
			
			

		
			 
			 		
							
			
				
		
		
			  	
		 	
		
			
			 	
		 }
		 

		 
		 ?>
		 
 
     <div><a href="form.php" class="cartButton">Continue &nbsp;</a></div>

     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>

</html>