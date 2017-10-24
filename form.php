

<?php include_once('header.php')?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="Shipping" class="container">
     <div id="main">
     <div class="nameInfo">
    <h2><span>CHECKOUT</span></h2>
    <div class="progress">
    	<img src="img/progressBarCheckout@72x.png" alt="progressBar">
    </div>
     <body>
          <form action="" method="post" enctype="multipart/form-data">
               <label for="fullname">FULL NAME</label>
               <input id="fullname" type="text" name="fullname" value="">
               <label for="email">EMAIL</label>
               <input id="email" type="email" name="email" value="">
               <label for="phone">PHONE</label>
               <input id="phone" type="number" name="phone" value="">
               <label for="address1">ADDRESS 1</label>
               <input id="address1" type="text" name="address" value="">
               <label for="adress2">ADDRESS 2</label>
               <input id="address2" type="text" name="address" value="">
               <label for="city">CITY</label>
               <input id="city" type="text" name="city">
               <label for="state">STATE</label>
               <input id="state" type="text" name="state">
               <label for="zip">ZIP CODE</label>
               <input id="zip" type="text" name="zipcode">
               <div class="shipping-method">
                    <h2>Shipping Method</h2>
                    <div>
                         <label for="standard">$4 Standard</label>
                         <input id="standard" type="radio" name="shipping" value="Standard" checked/>
                         <p>(2-3 weeks)</p>

                    </div>
                    <div>
                         <label for="ultra">$10 Ultra</label>
                         <input id="ultra" type="radio" name="shipping" value="Ultra" />
                         <p>(1-3 days)</p>
                    </div>
               </div>
               <button type="submit" value="Submit">Continue &nbsp; ></button>
          </form>

     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
