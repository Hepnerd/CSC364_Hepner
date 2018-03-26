<?php
include('../../includes/application_includes.php');
include("../../templates/layout.php");
$requestType = $_SERVER['REQUEST_METHOD'];
layout::pageTop("Hepner's Haggles Registration");
//Layout::createProduct('World Travels Create Post');
$fields = [
    'name' => ['required', 'string'],
    'description' => ['required', 'string'],
    'qty_available' => ['required', 'string'],
    'price' => ['required', 'string']];
if ($requestType == 'GET') {
                    // Display the form
                    if (isset($_SESSION['login_user'])) {
                      header("Location: /../index.php");
                    }
                    if (!isset($_SESSION['login_user']))
                    {
                    showForm();
                  }
                } elseif ($requestType == 'POST') {
                    //if (validateInput($_POST)) {
                        // Data is valid so save it to the database
                        // pull the fields from the POST array.
                        //print_r($_POST);
                        //session_start();
                        if (isset($_SESSION['login_user'])) {
                          header("Location: /../index.php");
                        }
                        if (!isset($_SESSION['login_user']))
                        {
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

}
                    } else {
                        // This is an error so show the form again
                        showForm($_POST);
                    }

function showForm($data = null)
                  {
                      $firstName = $data['firstName'];
                      $lastName = $data['lastName'];
                      $address = $data['address'];
                      $city = $data['city'];
                      $state = $data['state'];
                      $zip = $data['zip'];
                      $phone = $data['phone'];
                      $email = $data['email'];
                      $password = $data['password'];

                      echo <<<postform
                  <form id="registerForm" action='register.php' method="POST" class="form-horizontal" enctype="multipart/form-data">
                      <fieldset>

                          <!-- Form Name -->
                          <legend>Create Account</legend>

                          <!-- Text input-->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="firstName">First Name</label>
                              <div class="col-md-8">
                                  <input id="firstName" name="firstName" type="text" value="$firstName" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="lastName">Last Name</label>
                              <div class="col-md-8">
                                  <input id="lastName" name="lastName" type="text" value="$lastName" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="address">Address</label>
                              <div class="col-md-8">
                                  <input id="address" name="address" type="text" value="$address" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="city">City</label>
                              <div class="col-md-8">
                                  <input id="city" name="city" type="text" value="$city" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="state">State</label>
                              <div class="col-md-8">
                                  <input id="state" name="state" type="text" value="$state" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="zip">Zip Code</label>
                              <div class="col-md-8">
                                  <input id="zip" name="zip" type="text" value="$zip" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="phone">Phone Number</label>
                              <div class="col-md-8">
                                  <input id="phone" name="phone" type="text" value="$phone" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="email">Email Address</label>
                              <div class="col-md-8">
                                  <input id="email" name="email" type="text" value="$email" class="form-control input-md" required="">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="password">Password</label>
                              <div class="col-md-8">
                                  <input id="password" name="password" type="text" value="$password" class="form-control input-md" required="">
                              </div>
                          </div>


                          <!-- Button (Double) -->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="submit"></label>
                              <div class="col-md-8">
                                  <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                                  <a id="cancel" name="cancel" href="../index.php" value="Cancel" class="btn btn-info">Cancel</a>
                              </div>
                          </div>

                      </fieldset>
                  </form>
postform;
}
