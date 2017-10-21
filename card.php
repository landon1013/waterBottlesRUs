<?php
require_once('variables.php');

  //BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "SELECT * FROM checkout";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('query failed');
?>

<?php include_once('header.php')?>

    
  </head>
  <body>
    
      <?php include_once('nav.php'); ?>
	<div class="keepOpen"></div>
         <div id="container">
         
      <h1>Checkout</h1>

<?php include_once('footer.php') ?>