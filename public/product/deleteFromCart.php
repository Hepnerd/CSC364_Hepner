<?php
session_start();
include('../../includes/application_includes.php');
if (!isset($_SESSION['login_user'])) {
  header("Location: /../index.php");
}
if (isset($_SESSION['login_user']))
{
  if (isset($_SESSION['cart']))
  {
    $id = $_GET['id'];
    //echo $id;
    //print_r($_SESSION['cart']);
    $delete = array_search($id, array_column($_SESSION['cart'], 'uid'));
    //echo $delete;
    unset($_SESSION['cart'][$delete]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("Location: /../index.php");
  }
  else
  {
    header("Location: /../index.php");
  }
}
