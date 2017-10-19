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

    <title>Checkout</title>
    
  </head>
  <body>
    
      <?php include_once('nav.php'); ?>

         <div id="container">
      <h1>Checkout</h1>

</body>
</html>