<?php 
    $server_name = "localhost";
    $user_name = "root";
    $db_password = "";
    $db_name = "business_db";

    $conn = mysqli_connect($server_name, $user_name, $db_password, $db_name);

    if(!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }