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
	$_SESSION['cart'][$fetch_id['id']]=0;


	 

		



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
		 
		 
		 
			if(isset($_SESSION['cart'][$fetch_id['id']])){
						$_SESSION['cart'][$fetch_id['id']]++;
								}

						else{

							$_SESSION['cart'][$fetch_id['id']]=0;
						}
		
			 
	

	 
		 foreach($_SESSION['cart'] as $items => $count){
					
			 
			 

			 $display = "SELECT * FROM inventory WHERE id='$items'";
			 $select = mysqli_query($dbconnection, $display) or die ('select query failed');
			$print = mysqli_fetch_array($select);
			 
			 $delete = $print['id'];
			 
		
			 
			
			 echo '<div class="cartDisplay" id="#delete">';
			 echo '<img src="img/'.$print['image'].'"/>';
			echo '<h1>'.$print['brand'].'</h1>';
			echo '<h1>'.$print['model'].'</h1>';
			echo '<p> Size:'.$print['size'].'    Color:'.$print['color'].'</p>';
			 echo '<p> Price: '.$print['price'].'</p>';
				echo '<a class="remove"  href="remove.php?id='.$print['id'].'">Remove</a>';
		 		echo '</div>';
		
			 		
							
			
				
		
		 print $delete.'inloop';
			  	
		 	
		
			
			 	
		 }
		 print $delete;
		 
		/*     if($_GET['remove'] == '500'){
                    
				
            unset($_SESSION['cart'][$delete]);
            echo $delete.' was removed <br>';
} 
            else{
                echo 'function is not running';
            }
		*/
		 
		 ?>

     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>

</html>