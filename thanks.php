<?php
session_start();

if($_SESSION['cardNum']== 123456789101112){
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$body = "Got it! your order of an  ".$_SESSION['model'].' '.$_SESSION['brand']." has been processed! Your order will be on its way soon!!";
 $sender = 'Water Bottles R Us';

  $to = "bubgirl17@gmail"; //recipient

  $subject = "Confirmation Email"; //subject
  $header = "From: ". $sender . " <" . $to . ">\r\n";
	
	  if (mail($email, $subject, $body, $header)){
		include'thanks.php';
	  
  } else {
		echo 'Error: something went wrong.';
	  }

		session_unset('cardNum');

} else{
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	$body = "Sorry your order of an  ".$_SESSION['model'].' '.$_SESSION['brand']." was not proccessed! Please try a different payment method!!";


	  $to = "bubgirl17@gmail"; //recipient

	  $subject = "Payment Declined"; //subject
	  $header = "From: ". $sender . " <" . $to . ">\r\n";

	  if (mail($email, $subject, $body, $header)){
			include'thanks.php';

	  } else {
			echo 'Error: something went wrong.';
		  }
	
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
     <p>Thanks for visiting Water Bottles R Us! Your order is being proccessed! You will hear from us soon!</p>
   
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
