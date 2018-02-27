<?php
include('../../includes/application_includes.php');
$id = $_GET['id'];
$sql = "delete from products where id = " . $_GET['id'];
//echo $sql;
$db = connectToDb();
$posts = $db->query($sql);
header('Location: ../index.php');
 ?>
