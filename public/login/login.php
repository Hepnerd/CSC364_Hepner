<?php
include('../../includes/application_includes.php');
include("../../templates/layout.php");
$requestType = $_SERVER['REQUEST_METHOD'];
//Layout::createProduct('World Travels Create Post');
if ($requestType == 'GET') {
                    // Display the form
                    // Display the form
                      header("Location: /../index.php");
                } elseif ($requestType == 'POST') {
                    //if (validateInput($_POST)) {
                        // Data is valid so save it to the database
                        // pull the fields from the POST array.
                        //session_start();
                        //print_r($_POST);
                        // Display the form
                        if (isset($_SESSION['login_user'])) {
                          header("Location: /../index.php");
                        }
                        if (!isset($_SESSION['login_user']))
                        {

                        if ((isset($_POST['email']) != '' ) && (isset($_POST['password']) != '' ))
                        {
                        $email = $_POST['email'];
                        //$email = strtoupper($email);
                        $password = $_POST['password'];
                        //echo $password;
                        //$sql = 'select * from customers where email = ' . $email . '';
                        $sql = 'SELECT * FROM `customers` WHERE `email` = lower("' . $email . '")';
                        //echo $sql;
                        $db = connectToDb();
                        $datastuff = $db->query($sql);
                        $posts = $datastuff->fetch_assoc();
                        //echo $posts['password'];
                        //echo $posts['password'];


                        if (password_verify($password, $posts['password']))
                        {
                          $_SESSION['login_user']= $posts;  // Initializing Session with value of PHP Variable
                          //echo $_SESSION['login_user'];
                          //echo " password works";
                          header("Location: /../index.php");
                        }
                        else {
                          //echo "Fails";
                          header('Location: /../index.php?msg=failed');
                        }
                      }
                        else {
                          //echo "Fails";
                          header('Location: /../index.php?msg=failed');
                        }
                      }
              }  else {
    header('location: /../index.php');
}
