<?php
include('../../includes/application_includes.php');
$id = $_GET['id'];
$sql = "UPDATE products SET isActive = 0 where id = " . $_GET['id'];
//echo $sql;
//UPDATE `products` SET `isActive`="0" WHERE `id`="28"
//echo $sql;
$db = connectToDb();
$posts = $db->query($sql);
header('Location: ../index.php');
