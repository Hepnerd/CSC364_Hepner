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
                        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                        $address = htmlspecialchars($_POST['address'], ENT_QUOTES);
                        $city = htmlspecialchars($_POST['city'], ENT_QUOTES);
                        $state = htmlspecialchars($_POST['state'], ENT_QUOTES);
                        $zip = htmlspecialchars($_POST['zip'], ENT_QUOTES);
                        $cardname = htmlspecialchars($_POST['cardname'], ENT_QUOTES);
                        $cardnumber = htmlspecialchars($_POST['cardnumber'], ENT_QUOTES);
                        $expmonth = htmlspecialchars($_POST['expmonth'], ENT_QUOTES);
                        $expyear = htmlspecialchars($_POST['expyear'], ENT_QUOTES);
                        $cvv = htmlspecialchars($_POST['cvv'], ENT_QUOTES);
                        $sameadr = htmlspecialchars($_POST['sameadr'], ENT_QUOTES);

                        $sql = "UPDATE customers SET address = '" . $address . "', city = '" . $city . "', state = '" . $state . "', zip = '" . $zip . "', billing_address = '" . $address . "', billing_city = '" . $city . "', billing_state = '" . $state . "', billing_zip = '" . $zip . "' WHERE email = '" . $email . "';";
                        //echo $sql;
                        $db = connectToDb();
                        $posts = $db->query($sql);
                        $date = date('Y-m-d');
                        $orderSQL = "insert into orders (customer_id, order_number, shipping_address, shipping_city, shipping_state, shipping_zip, payment_method, order_date) values ('" . $customerID . "', '" . $orderNumber . "', '" . $address . "', '" . $city . "', '" . $state . "', '" . $zip . "', 'credit', '" . $date . "');";
                        echo $orderSQL;
                        //$orderDetailsSQL = "insert into order_details (orderID, product_ID, fulfilled_by_ID, price, quantity, ship_date) values ('" . $firstName . "', '" . $lastName . "', '" . $address . "', '" . $city . "', '" . $state . "', '" . $zip . "', '" . $phone . "', '" . $email . "', '" . $password . "');";
                        //header('Location: /../index.php');


                    } else {
                        // This is an error so show the form again
                        showForm();
                    }
}
function showForm()
                  {
                    $user = $_SESSION['login_user'];
                    $firstName = $user['firstname'];
                    $lastName = $user['lastname'];
                    $address = $user['address'];
                    $city = $user['city'];
                    $state = $user['state'];
                    $zip = $user['zip'];
                    $phone = $user['phone'];
                    $email = $user['email'];

                    $results = $_SESSION['cart'];

                    $string = "";
                    $totalCost = 0;
                    $tax = 0;
                    $shippingCost = 0;
                    $finalCost = 0;
                    $numberOfThings = 0;
                    foreach ($results as $outputCart)
                    {
                      if ($outputCart['quantity'] > 1)
                      {
                        $price = $outputCart['quantity'] * $outputCart['price'];
                      }
                      if ($outputCart['quantity'] == 1)
                      {
                        $price = $outputCart['price'];
                      }
                      $string .= '<p><a href="#">' . $outputCart['name'] . ' - ' . $outputCart['quantity'] . '</a><span class="price">$' . $price . '</span></p>';
                      $numberOfThings++;
                    }
                    foreach ($results as $outputCart)
                    {
                      if ($outputCart['quantity'] > 1)
                      {
                        $price = $outputCart['quantity'] * $outputCart['price'];
                      }
                      if ($outputCart['quantity'] == 1)
                      {
                        $price = $outputCart['price'];
                      }
                      $totalCost += $price;
                    }
                    $tax += $totalCost * 0.06;
                    $shippingCost = $totalCost * 0.002;
                    $finalCost = $totalCost + $tax + $shippingCost;
                      echo <<<postform



<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.containerThing {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
.CheckoutFormStuff
{
  margin-top: 50px;
}
</style>
<div class="CheckoutFormStuff">
<h2>Checkout Form</h2>
<div class="row">
  <div class="col-75">
    <div class="containerThing">
    <form id="registerForm" action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i>Name</label>
            <input type="text" id="fname" name="firstName" value="$firstName $lastName" readonly>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="$email" readonly>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" value="$address">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" value="$city">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" value="$state">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" value="$zip">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="containerThing">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>$numberOfThings</b></span></h4>
      $string
      <hr>
      <p>Total <span class="price" style="color:black"><b>$$totalCost</b></span></p>
      <p>Tax <span class="price" style="color:black"><b>$$tax</b></span></p>
      <p>Shipping <span class="price" style="color:black"><b>$$shippingCost</b></span></p>
      <p>Total Cost<span class="price" style="color:black"><b>$$finalCost</b></span></p>
</div>
</div>
</div>
</div>

postform;
}
