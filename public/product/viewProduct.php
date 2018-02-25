<?php
include('../../includes/application_includes.php');
include("../../templates/layout.php");
$requestType = $_SERVER['REQUEST_METHOD'];
layout::pageTop("Hepner's Haggles View Post");
//Layout::createProduct('World Travels Create Post');
if ($requestType == 'GET') {
                        $sql = "select * from products where id = " . $_GET['id'];
                        //echo $sql;
                        $db = connectToDb();
                        $posts = $db->query($sql);
                        //print_r($posts);
                        $row = $posts->fetch_array(MYSQLI_ASSOC);
                        //print_r($row);

                        $id = $row['id'];
                        $name = $row['name'];
                        $desc = $row['description'];
                        $price = $row['price'];
                        $picture = "";
                        $qty_available = $row['qty_available'];

                        echo <<<postform

        <table align="center" class="table">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity Available</th>
            <th></th>
        </tr>
        <tr>
        <th>$name</th>
        <th>$desc</th>
        <th>$price</th>
        <th>$qty_available</th>
        <th><h4><a href="updateProduct.php?id=$id">Edit</a></h4></th>
        </tr>
        </table>

postform;
                      }
                        if ($requestType == 'POST') {
                          header('Location: /../index.php');
                        }
 ?>
