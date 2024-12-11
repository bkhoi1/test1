<?php
    $hosting = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tech_shop";

    $connect = mysqli_connect($hosting, $username, $password, $dbname);
    if(!$connect){
        die("Error: " + mysqli_connect_error());
    }

    session_start();