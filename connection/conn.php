<?php
    $servername = "localhost";
    $username = "root";
    $password ="";

    // creating connection 
    $conn = new mysqli($servername, $username, $password);
    // checking connection 
    if ($conn->connect_error){
        die("connection failed" .$conn->connect_error);
    }
    echo "Connected";
?>