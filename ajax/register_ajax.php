<?php
    require "../config/config_ajax.php";
    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    
    $insert = mysqli_query($conn, "INSERT INTO my_table2 (full_name,email) VALUES('$full_name', '$email')");
    if($insert) {
        echo "Successfully Registered";
    }else{
        echo "<p'style=color:red; font-size:bold;'>Failed</p>";
    }


    /*require "../config/config_ajax.php";
    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));

    $insert = mysqli_query($conn, "INSERT INTO my_table (full_name,email) VALUES('$full_name', '$email')");
    if($insert) {
        echo "Succesfully Registered!";
    }else{
        echo "Failed!";
    }       */