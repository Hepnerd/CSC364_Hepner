<?php
include('../../includes/application_includes.php');
include("../../templates/layout.php");
$requestType = $_SERVER['REQUEST_METHOD'];
//Layout::createProduct('World Travels Create Post');
if ($requestType == 'GET') {
                    // Display the form
                    header('Location: /../index.php');
                } elseif ($requestType == 'POST') {
                    //if (validateInput($_POST)) {
                        // Data is valid so save it to the database
                        // pull the fields from the POST array.
                        //session_start();
                        //print_r($_POST);

                        if ((isset($_POST['email']) != '' ) && (isset($_POST['password']) != '' ))
                        {
                        $email = $_POST['email'];
                        $email = strtoupper($email);
                        $password = $_POST['password'];
                        //echo $password;
                        //$sql = 'select * from customers where email = ' . $email . '';
                        $sql = 'SELECT * FROM `customers` WHERE `email` = "' . $email . '"';
                        //echo $sql;
                        $db = connectToDb();
                        $datastuff = $db->query($sql);
                        $posts = $datastuff->fetch_assoc();
                        //echo $posts['password'];
                        //echo $posts['password'];


                        if (password_verify($password, $posts['password']))
                        {
                          echo "password works";
                        }
                        else {
                          echo "Fails";
                        }
                        }
                else {
  //  header('location: /../index.php');

}
/*

                        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                        $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
                        $qty_available = htmlspecialchars($_POST['qty_available'], ENT_QUOTES);
                        $price = htmlspecialchars($_POST['price'], ENT_QUOTES);
                        //$input = $_POST;
                        $sql = "insert into products (name, description, qty_available, price) values ('" . $name . "', '" . $description . "', '" . $qty_available . "', '" . $price . "');";
                        $db = connectToDb();
                        $posts = $db->query($sql);
                        header('Location: /../index.php');
                        */
                    } else {
                        // This is an error so show the form again
                        header('Location: /../index.php');
                    }
?>
