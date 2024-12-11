<?php
    $hosting = "localhost";
    $username = "root";
    $password = "";
    $dbname = "do_an_1";

    $connect = mysqli_connect($hosting, $username, $password, $dbname);
    if(!$connect){
        die("Error: " + mysqli_connect_error($connect));
    }

    session_start();