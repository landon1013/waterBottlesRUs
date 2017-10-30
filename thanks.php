<?php
session_start();

if($_SESSION['cardNum']== 123456789101112){
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$body = "Got it! your order of ".$_SESSION['cart']." has been processed! Your order will be on its way soon!!";
 

  $to = "bubgirl17@gmail"; //recipient

  $subject = "Confirmation Email"; //subject
  $header = "From: ". $name . " <" . $email . ">\r\n";
	
  if (mail($to, $subject, $body, $header)){
    include'thanks.php';
	  
  } else {
    echo 'Error: something went wrong.';
  }
	
	session_unset('cardNum');

}
else{
	echo 'your card is not valid';
		session_unset('cardNum');
}

?>
<?php include_once('header.php')?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="home" class="container">
     <div id="main">
     <p>Thanks</p>
     <?php
   print $email." ".$body;
		 ?>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
