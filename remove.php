<?php
session_start();

if (isset($_GET['id'])) {
  $i = $_GET['id'];
  unset($_SESSION['items'][$i]);
  $_SESSION['items'] = array_values($_SESSION['items']);
  header("Location: confirmItems.php");
}
?>
