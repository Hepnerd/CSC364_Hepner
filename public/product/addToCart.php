<?php
session_start();
include('../../includes/application_includes.php');
if (!isset($_SESSION['login_user'])) {
  header("Location: /../index.php");
}
if (isset($_SESSION['login_user']))
{

  // Get item info to add to cart
  // This will come from a form submission via POST request
  // id would be found in $_POST['id'];
  if (isset($_SESSION['cart']))
  {
    //$cart = array();
    $results = $_SESSION['cart'];

    $cart['uid'] = $_GET['id'];
    $cart['name'] = $_GET['name'];
    $cart['price'] = $_GET['price'];
    //$cart['quantity'] = 1;

    //if (in_array($cart['uid'], $_SESSION['cart']))
    //echo "works before loop";


    /*
    foreach ($results as $row)
    {
      if (isset($results[$row['uid']]))
      {
        $results
      }
    }

    */

    $boolCheck;
    foreach ($results as $row => $values)
    {
      //$cart['quantity'] = $_SESSION['cart']['quantity'];
      //echo "works in loop";
      //$cart['quantity'] = $results['quantity'] + 1;
      //echo $values['uid'];
      //echo " ";
      //echo $cart['uid'];
      if ($values['uid'] == $cart['uid'])
      {
        $results[$row]['quantity']++;
        //echo " if ";
        //echo $results[$row]['quantity'];
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

  header("Location: /../index.php");
}
