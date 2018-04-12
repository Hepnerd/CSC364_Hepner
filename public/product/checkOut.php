<?php
include("../../templates/layout.php");
include('../../includes/application_includes.php');
if (!isset($_SESSION['login_user'])) {
//if (!isset($_SESSION['login_user'])) {
  //header("Location: /../index.php");
  echo "failed";
}
if (isset($_SESSION['login_user']))
{
  //echo "passed";
$requestType = $_SERVER['REQUEST_METHOD'];
layout::pageTop("Checkout");
//Layout::createProduct('World Travels Create Post');
if ($requestType == 'GET') {
                    showForm();
                  }
                   elseif ($requestType == 'POST') {
                    //if (validateInput($_POST)) {
                        // Data is valid so save it to the database
                        // pull the fields from the POST array.
                        //print_r($_POST);
                        //session_start();
                          /*
                        $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES);
                        $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES);
                        $address = htmlspecialchars($_POST['address'], ENT_QUOTES);
                        $city = htmlspecialchars($_POST['city'], ENT_QUOTES);
                        $state = htmlspecialchars($_POST['state'], ENT_QUOTES);
                        $zip = htmlspecialchars($_POST['zip'], ENT_QUOTES);
                        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
                        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                        //$email = strtoupper($email);
                        $beforePassword = htmlspecialchars($_POST['password'], ENT_QUOTES);
                        $password = password_hash($beforePassword, PASSWORD_DEFAULT);

                        //echo $password;


                        //$input = $_POST;

                        $emailSQL = 'SELECT count(*) FROM `customers` WHERE `email` = "' . $email . '"';
                        //echo $emailSQL;
                        $db = connectToDb();
                        $posts = $db->query($emailSQL);
                        //$row = $posts->fetch_array(MYSQLI_ASSOC);

                        if(mysqli_fetch_row($posts)[0])
                        {
                          echo "Account Used. Please choose another.";
                        }
                        else {
                        //echo "Not used";
                        $sql = "insert into customers (firstname, lastname, address, city, state, zip, phone, email, password) values ('" . $firstName . "', '" . $lastName . "', '" . $address . "', '" . $city . "', '" . $state . "', '" . $zip . "', '" . $phone . "', '" . $email . "', '" . $password . "');";
                        $db = connectToDb();
                        $posts = $db->query($sql);
                        header('Location: /../index.php');

                      }
*/
                    } else {
                        // This is an error so show the form again
                        showForm();
                    }
}
function showForm()
                  {
                    $results = $_SESSION['cart'];

                    $string = "";
                    $totalCost = 0;
                    $tax = 0;
                    $shippingCost = 0;
                    foreach ($results as $outputCart)
                    {
                      $string .= '<tr><td>' . $outputCart['name'] . '</td><td>' . $outputCart['price'] . '</td><td>' . $outputCart['quantity'] . '</td><td><a href="/product/deleteFromCart.php?id=' . $outputCart['uid'] . '">Delete From Cart</a></td></tr>';
                    }
                    foreach ($results as $outputCart)
                    {
                      $totalCost += $outputCart['price'];
                    }
                    $tax += $totalCost * 0.06;
                    $shippingCost = $totalCost * 0.002;
                      echo <<<postform
                      <section class="container">
                        <div class="left-half">
                          <article>
                            <h1>Cost</h1>
                            <p>Weekends don't count unless you spend them doing something completely pointless.</p>
                            $totalCost
                            $tax
                            $shippingCost
                          </article>
                        </div>
                        <div class="right-half">
                          <article>
                            <h1>Shipping info</h1>
                            <p>If your knees aren't green by the end of the day, you ought to seriously re-examine your life.</p>
                          </article>
                        </div>
                      </section>
                      <div class="productCart">$string</div>
<style>
.productCart
{
  margin-top: 10%;
}
section
{
  margin-top: 50px;
}
article {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  padding: 20px;
}

/* Pattern styles */
.container {
  display: table;
  width: 100%;
}

.left-half {
  position: absolute;
  left: 0px;
  width: 50%;
}

.right-half {
  position: absolute;
  right: 0px;
  width: 50%;
}
</style>

postform;
}
