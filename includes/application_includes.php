<?php
// Include the basic configuration elements
//require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/config.php');
// Include the database connection and query class
//class Database
//{
    function connectToDb()
    {
        $host = "localhost";
        $dbUser = "csc364user";
        //$dbName = "cscuser364";
        $dbPass = "password";
        $database = "csc364";

        $db = new mysqli($host, $dbUser, $dbPass, $database) or die("Connect failed: %s\n". $db -> error);
        return $db;
    }
    function closeDb($db)
 {
 $db -> close();
 }
//}

// Include the HTML layout class
// Connect to the database
//$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
//$requestType = $_SERVER[ 'REQUEST_METHOD' ];
//session_start();
