<?php
session_start();
include('../../includes/application_includes.php');
$id = $_GET['id'];
if (!isset($_SESSION['login_user'])) {
  header("Location: /../index.php");
}
if (isset($_SESSION['login_user']))
{
$sql = "UPDATE products SET isActive = 0 where id = " . $_GET['id'];
//echo $sql;
//UPDATE `products` SET `isActive`="0" WHERE `id`="28"
//echo $sql;
$db = connectToDb();
$posts = $db->query($sql);
header('Location: ../index.php');
}
