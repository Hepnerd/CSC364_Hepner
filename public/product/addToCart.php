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
    foreach ($results as $row => $values)
    {
      //$cart['quantity'] = $_SESSION['cart']['quantity'];
      //echo "works in loop";
      //$cart['quantity'] = $results['quantity'] + 1;
      if ($values[$row]['uid'] == $cart['uid'])
      {
        $results[$row]['quantity']++;
        echo "works";
        break;
      }
      else {
        echo "doesn't work";
        $cart['quantity'] = 1;
        $results[] = $cart;
      }
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

  //header("Location: /../index.php");
}
