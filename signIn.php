<?php

require_once('variables.php');

// Try to log the user in 
if (isset($_POST['submit'])) {
	
	//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
	$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
	
	$user = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
	$pwd = mysqli_real_escape_string($dbconnection, trim($_POST['password']));
	
	// Get username and password from database
	$query = "SELECT * FROM usersList WHERE username='$user' AND password=SHA('$pwd')";
	$data = mysqli_query($dbconnection, $query) or die ('query failed...');
	
	if (mysqli_num_rows($data) == 1) {
		$row = mysqli_fetch_array($data);
		setcookie('username', $row['username'], time() + (60*60*24*30)); // Set to expire in 30 days
		setcookie('firstname', $row['firstname'], time() + (60*60*24*30)); // Set to expire in 30 days
		setcookie('lastname', $row['lastname'], time() + (60*60*24*30)); // Set to expire in 30 days
		
		// Move to the page after loging in
		header('location: index.php');
		
	} else {
		//echo 'Could not found you, try again...';
		$resultDisplay = 'Could not found you, try again...';
	} // End if/else

}	// End isset

?>


<!doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="scss/reset.css" rel="stylesheet" type="text/css">
    <link href="scss/main.css" rel="stylesheet" type="text/css">
    
   <!-- link font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
  <!-- import google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <title>Sing In | Sign Up</title>
    
 </head>

  <body>

  	<?php include_once('nav.php'); ?>
    <div id="container">
      
      
		
		<div class="content-title">
			<div>
      			<h1>ACCOUNT LOGIN</h1> 
      		</div>
      	</div>
		<div class="content signin-content">
	      	<div class="block">
		      <section class="content-block firstBlock">
				<div class="form-container">
					<div class="form-title"><h2>REGISTER</h2></div>
					<div class="text-container">
						<h3>I am a new Customer</h3>
						<br>
						<p>By creating an account you will be able to shop faster, be up to date on an orders status, and keep track of the orders you have previously made.</p>
					
						<div class="submit-container login-btn1-position">
							<a href="signUp.php">
								<div class="submit-button continue">Continue</div>
							</a>
						</div>
					</div>
				</div>
		      </section> <!-- End first block -->

		      <section class="content-block secondBlock">
		      		<form action="signIn.php" method="POST" class="form-container">
						<div class="form-title"><h2>RETURNING CUSTOMER</h2></div>
						<div class="text-container">
							<h3>I am a Returning Customer</h3>
							<br>
							<div class="labels">Username:</div>
							<input class="form-field" type="text" name="username" value="<?php if(!empty($user)) echo $user; ?>" required /><br />
							<div class="labels">Password:</div>
							<input class="form-field" type="password" name="password" required>
							<div class="submit-container login-btn2-position">
								<input class="submit-button" type="submit" name="submit" value="Log in" />
								<input type="hidden" name="submit">
							</div>
						</div>
					</form>
					<br>
					<div class="result-display">

						<?php 
							if(isset($resultDisplay)) {
								echo($resultDisplay);
							}
						?>
					</div>
		      </section> <!-- End second block -->
				
		    </div> <!-- End block -->

      	</div> <!-- end content -->
      	
    </div> <!-- End container -->

	<?php include_once('footer.php'); ?>

  </body>
</html>

