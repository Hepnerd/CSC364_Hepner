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
    $cart['uid'] = $_GET['id'];
    $cart['name'] = $_GET['name'];
    $cart['price'] = $_GET['price'];
    if ($k = array_search($cart['id'], $_SESSION['cart']) === TRUE)
    {
      $cart['quantity'] = $_SESSION['cart']['quantity'];
    }
    else {
      $cart['quantity'] = 1;
    }

    $_SESSION['cart'][] = $cart;

    //print_r($_SESSION['cart']);
    $results = $_SESSION['cart'];
    //print_r($results);
    //echo "<p></p>";

    foreach ($results as $outputCart)
    {
      //print_r($outputCart);
      //echo "<p></p>";

      //extract($outputCart);
      echo '<table>';
      echo '<tr>';
      echo '<td>id ' . $outputCart['uid'] . '</td>';
      echo '<td>name ' . $outputCart['name'] . '</td>';
      echo '<td>price ' . $outputCart['price'] . '</td>';
      echo '<td>Delete Button</td>';
      echo '</tr>';
      echo '</table>';
    }
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
    echo "First Time";
    //print_r($_SESSION['cart']);
    $results = $_SESSION['cart'];

    foreach ($results as $outputCart)
    {
      //print_r($outputCart);
      //echo "<p></p>";

      //extract($outputCart);
      echo '<table>';
      echo '<tr>';
      echo '<td>id ' . $outputCart['uid'] . '</td>';
      echo '<td>name ' . $outputCart['name'] . '</td>';
      echo '<td>price ' . $outputCart['price'] . '</td>';
      echo '<td>quantity ' . $outputCart['quantity'] . '</td>';
      echo '<td>Delete Button</td>';
      echo '</tr>';
      echo '</table>';
    }
  }

  header("Location: /../index.php");
}
