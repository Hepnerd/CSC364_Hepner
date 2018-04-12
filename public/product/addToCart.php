<?php
if(!isset($_SESSION))
{
    session_start();
}
include('../../includes/application_includes.php');
if (!isset($_SESSION['login_user'])) {
  header("Location: /../index.php");
}
if (isset($_SESSION['login_user']))
{
  if (isset($_SESSION['cart']))
  {
    //$cart = array();
    $results = $_SESSION['cart'];

    $cart['uid'] = $_GET['id'];
    $cart['name'] = $_GET['name'];
    $cart['price'] = $_GET['price'];

    $boolCheck;
    foreach ($results as $row => $values)
    {
      if ($values['uid'] == $cart['uid'])
      {
        $results[$row]['quantity']++;
        $boolCheck = true;
        break;
      }
      else
      {
        echo " else ";
        $boolCheck = false;
      }
    }
    if ($boolCheck == false)
    {
      $cart['quantity'] = 1;
      $results[] = $cart;
    }


    $_SESSION['cart'] = $results;
  }
  else
  {
    $cart = [];
    $cart['uid'] = $_GET['id'];
    $cart['name'] = $_GET['name'];
    $cart['price'] = $_GET['price'];
    $cart['quantity'] = 1;
    //if ()
    $_SESSION['cart'][] = $cart;
  }
//print_r($_SESSION['cart']);
  header("Location: /../index.php");
}
