

<?php include_once('header.php')?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="card" class="container">
     <div id="main">
     <div class="cardInfo">
    <h2><span>CHECKOUT</span></h2>
    <div class="progress">
    	<img src="img/progressBarCheckout@72x.png" alt="progressBar">
    </div>
    <form action="card.php" enctype="multipart/form-data" method="post">
    	<fieldset>
    		<label><input type="radio" value="Credit" name="payment">Credit Card<div class="cardType"><img src="img/cards.png" alt="cards"></div></label><div class="keepOpen"></div>
    		<span>Card Number</span><br><input type="text" value=" " name="cardNumber" class="number"><br>
    		<span>Name on Card</span><br><input type="text" value=" " name="cardName" class="name"><br>
    		<div class="cardCCV">
    		<label class="expireL"><span>Card Experation</span><br><input type="text" value=" " name="cardExpire" class="expire"></label><br>
    		
    		<label class="securityL"><span>CCV Code</span><br><input type="text" value=" " name="cardSecurity" class="security"></label><br>
    		</div>
    		<div class="keepOpen"></div>
    		<div class="paymentBox">
				<label class="payment"><input class="payPal" type="radio" value="payPal" name="payment"><img src="img/paypalLogo.png" alt="paypal logo"><div class="cardType"><img src="img/cards.png" alt="cards"></div></label><div class="keepOpen"></div>
				
				</div>
    	</fieldset>
    	
    	
    	
    	
    	
    </form>
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
