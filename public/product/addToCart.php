<?php
session_start();
include('../../includes/application_includes.php');
if (!isset($_SESSION['login_user'])) {
  header("Location: /../index.php");
}
if (isset($_SESSION['login_user']))
{
  $user = $_SESSION['login_user'];

  $sqlReceive = "SELECT * FROM products WHERE id = " . $_GET['id'];
  $db = connectToDb();
  $fromProductsSQL = $db->query($sqlReceive);
  $fromProducts = $fromProductsSQL->fetch_array(MYSQLI_ASSOC);
  print_r($fromProducts);

//$sql = "UPDATE products SET isActive = 0 where id = " . $_GET['id'];
//echo $sql;
//UPDATE `products` SET `isActive`="0" WHERE `id`="28"
//echo $sql;
//$db = connectToDb();
//$posts = $db->query($sql);
//header('Location: ../index.php');
}
