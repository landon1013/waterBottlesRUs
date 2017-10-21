
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
    <?php include_once('hero.php')?>
    <div id="container">
      
       

      <h1>Blog Commennts</h1>

      <?php

      // DISPLAY WHAT WE FOUND
      while ($row = mysqli_fetch_array($result)) {
        echo '<article>';
        echo '<h3>'.$row['name'].'</h3>';
        echo '<p class="topic">'.$row['topic'].'</p>';
        echo '<p>'.$row['comment'].'</p>';
        echo '<p class="date">'.$row['date'].'</p>';
        echo '</article>';
      }
    ?>
    </div>

<?php include_once('footer.php'); ?>
