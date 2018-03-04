<?php
include('../../includes/application_includes.php');
include("../../templates/layout.php");
$requestType = $_SERVER['REQUEST_METHOD'];
//$requestType = $_SERVER['REQUEST_METHOD'];
layout::pageTop("Hepner's Haggles");
//Layout::createProduct('World Travels Create Post');
if ($requestType == 'GET') {
                    // Display the form
                    // Display the form
                    if (!isset($_SESSION['login_user'])) {
                      header("Location: /../index.php");
                    }
                    if (isset($_SESSION['login_user']))
                    {
                    showForm();
                  }
                } elseif ($requestType == 'POST') {
                    //if (validateInput($_POST)) {
                        // Data is valid so save it to the database
                        // pull the fields from the POST array.
//                        print_r($_POST);

                        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                        $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
                        $qty_available = htmlspecialchars($_POST['qty_available'], ENT_QUOTES);
                        $price = htmlspecialchars($_POST['price'], ENT_QUOTES);
                        $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

                        if (isset($_POST['active']) && htmlspecialchars($_POST['active'] == "on"))
                        {
                          $active = 1;
                        }
                        if (!isset($_POST['active']) || htmlspecialchars($_POST['active'] == null))
                        {
                          $active = 0;
                        }

                        //$input = $_POST;

                        $sql = "UPDATE products SET name = '" . $name . "', description = '" . $description . "', qty_available = '" . $qty_available . "', price = '" . $price . "', isActive = " . $active . " WHERE id = " . $id . ";";
                        //echo $sql;
                        $db = connectToDb();
                        $posts = $db->query($sql);
                        header('Location: ../index.php');

                    } else {
                        // This is an error so show the form again
                        showForm($_POST);
                    }

function showForm($data = null)
                  {
                    $active;
                    $sql = "select * from products where id = " . $_GET['id'];
                    $db = connectToDb();
                    $posts = $db->query($sql);
                    $row = $posts->fetch_array(MYSQLI_ASSOC);

                      $name = $row['name'];
                      $desc = $row['description'];
                      $price = $row['price'];
                      $qty_available = $row['qty_available'];
                      $id = $row['id'];

                      if ($row['isActive'] == "1")
                      {
                        $active = "checked";
                      }
                      else {
                        $active = "";
                      }

                      echo <<<postform
                  <form id="updatePostForm" action='updateProduct.php' method="POST" class="form-horizontal" enctype="multipart/form-data">
                      <fieldset>

                          <!-- Form Name -->
                          <legend>Update Vehicle</legend>
                          <input type='hidden' name="id" value="$id"/>
                          <!-- Text input-->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="name">Name</label>
                              <div class="col-md-8">
                                  <input id="name" name="name" type="text" value="$name" class="form-control input-md" required="">
                              </div>
                          </div>

                          <!-- Textarea -->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="description">Description</label>
                              <div class="col-md-8">
                                  <textarea class="form-control" id="description" name="description" required="">$desc</textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="active">Active?</label>
                              <div class="col-md-8">
                          <input name="active" id="active" type="checkbox" $active>
                          </div>
                      </div>

                          <!-- Text input-->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="qty_available">Quantity Available</label>
                              <div class="col-md-8">
                                  <input id="qty_available" name="qty_available" type="text" value="$qty_available" class="form-control input-md" required="">
                              </div>
                          </div>

                          <!-- Text input-->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="price">Price</label>
                              <div class="col-md-8">
                                  <input id="price" name="price" type="text" value="$price" class="form-control input-md" required="">
                              </div>
                          </div>
<p>
                          <!-- Button (Double) -->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="submit"></label>
                              <div class="col-md-8">
                                  <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                                  <a id="cancel" name="cancel" href="/../index.php" value="Cancel" class="btn btn-info">Cancel</a>
                              </div>
                          </div>

                      </fieldset>
                  </form>
postform;
}
