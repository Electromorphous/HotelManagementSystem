<?php

function connectDB() {
    $dbname = "roomistic";
    $username = "root";
    $password = "";
    $host = "localhost";
    
    // create the connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // check connection
    if(!$con) {
        die("Connection failed: ".mysqli_connect_error());
    }
    else {
        return $con;
    }
}