<?php
// Delete the cookies by setting their expirations
setcookie('username','',time()-3600);
setcookie('firstname','',time()-3600);
setcookie('lastname','',time()-3600);

// Redirect to home page
header('Location: index.php');

?>