<?php
// Username and password for admin authorization
$usermane = 'admin';
$password = 'waterbottle';

// If statement to test wether it's true or not
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER']) != $usermane || ($_SERVER['PHP_AUTH_PW']) != $password)
{
header('http/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="UpToDate"');
exit('Sorry you can not access this page.');
} // End if


?>