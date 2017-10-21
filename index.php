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
    <title>Home</title>
    
  </head>
  <body>
    <?php include_once('nav.php'); ?>
    <div id="home" class="container">
      <div class="hero">
        <a href="shop.html"><div class="btn shop">
          Shop Now
        </div></a>
      </div>
      <div class="about">
        <h2><span>ABOUT US</span></h2>
        <div class="content">
          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad Lorem ipsum dolor sit amet,
          </p>
          <img src="img/main-bottle.png" />
        </div>
      </div>
    </div>

<?php include_once('footer.php'); ?>
