<?php
include('../../includes/application_includes.php');
include("../../templates/layout.php");
$requestType = $_SERVER['REQUEST_METHOD'];
layout::pageTop("Hepner's Haggles");
//Layout::createProduct('World Travels Create Post');
$fields = [
    'name' => ['required', 'string'],
    'description' => ['required', 'string'],
    'qty_available' => ['required', 'string'],
    'price' => ['required', 'string']];
if ($requestType == 'GET') {
                    // Display the form
                    showForm();
                } elseif ($requestType == 'POST') {
                    //if (validateInput($_POST)) {
                        // Data is valid so save it to the database
                        // pull the fields from the POST array.
                        print_r($_POST);

                        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                        $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
                        $qty_available = htmlspecialchars($_POST['qty_available'], ENT_QUOTES);
                        $price = htmlspecialchars($_POST['price'], ENT_QUOTES);
                        //$input = $_POST;
                        $sql = "insert into products (name, description, qty_available, price) values ('" . $name . "', '" . $description . "', '" . $qty_available . "', '" . $price . "');";
                        $db = connectToDb();
                        $posts = $db->query($sql);
                        header('Location: /../index.php');
                    } else {
                        // This is an error so show the form again
                        showForm($_POST);
                    }

function showForm($data = null)
                  {
                      $name = $data['name'];
                      $description = $data['description'];
                      $qty_available = $data['qty_available'];
                      $price = $data['price'];
                      echo <<<postform
                  <form id="createPostForm" action='createProduct.php' method="POST" class="form-horizontal" enctype="multipart/form-data">
                      <fieldset>

                          <!-- Form Name -->
                          <legend>Create Vehicle</legend>

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
                                  <textarea class="form-control" id="description" name="description" required="">$description</textarea>
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

 ?>
