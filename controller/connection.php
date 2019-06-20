<?php
    $servername = "localhost";
    $database = "discap";
    $username = "root";
    $password = "";
    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $database);
    mysqli_query($connection, "SET NAMES 'utf8'");
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
      //Iniciar la session
    if(!isset($_SESSION)){
        session_start();
    }
?>