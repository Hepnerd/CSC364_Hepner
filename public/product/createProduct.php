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
                        //print_r($_POST);
                        if (!isset($_SESSION['login_user'])) {
                          header("Location: /../index.php");
                        }
                        if (isset($_SESSION['login_user']))
                        {
                        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                        $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
                        $qty_available = htmlspecialchars($_POST['qty_available'], ENT_QUOTES);
                        $price = htmlspecialchars($_POST['price'], ENT_QUOTES);

                        $target_dir = "../assets/img/products/";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        if(isset($_POST["submit"])) {
                          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                          if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                          } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                          }
                        }
                        // Check if file already exists
                        if (file_exists($target_file)) {
                          echo "Sorry, file already exists.";
                          $uploadOk = 0;
                        }
                        // Check file size
                        if ($_FILES["fileToUpload"]["size"] > 500000) {
                          echo "Sorry, your file is too large.";
                          $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                          $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                          echo "Sorry, your file was not uploaded.";
                          // if everything is ok, try to upload file
                        } else {
                          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                          } else {
                            echo "Sorry, there was an error uploading your file.";
                          }
                        }

                        //$input = $_POST;
                        $sql = "insert into products (name, description, qty_available, price, isActive, picture) values ('" . $name . "', '" . $description . "', '" . $qty_available . "', '" . $price . "', ' 1 ', '" . $target_file . "');";
                        //echo $sql;
                        $db = connectToDb();
                        $posts = $db->query($sql);
                        header('Location: /../index.php');
                      }
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

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="price">Price</label>
                              <div class="col-md-8">
                              <input type="file" name="fileToUpload" id="fileToUpload">
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
