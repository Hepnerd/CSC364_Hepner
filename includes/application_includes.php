<?php
//require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/config.php');

    function connectToDb()
    {
        $host = "localhost";
        $dbUser = "csc364user";
        $dbPass = "password";
        $database = "csc364";

        $db = new mysqli($host, $dbUser, $dbPass, $database) or die("Connect failed: %s\n". $db -> error);
        $requestType = $_SERVER[ 'REQUEST_METHOD' ];
        //session_start();
        return $db;
    }
    function closeDb($db)
 {
 $db -> close();
 }
//$requestType = $_SERVER[ 'REQUEST_METHOD' ];
//session_start();
