<?php
    session_start();
    require "../config/config.php";

    $id =  $_SESSION['id'] ;

     
    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $phone_number = trim(mysqli_real_escape_string($conn, $_POST['phone_number']));
    $profile = $_FILES['profile'];

    $file_name = $_FILES['profile']['name'];
    $file_temp_name = $_FILES['profile']['tmp_name'];
    $file_size = $_FILES['profile']['size'];
    $file_error = $_FILES['profile']['error'];
    $file_type = $_FILES['profile']['type'];
    

    $file_ext_array = explode('.', $file_name);
    $file_ext = end($file_ext_array);

    $allowed_ext = array('jpg','png');
    $new_file_name = uniqid().".".$file_ext;
    $file_destination = "../images/profile/$new_file_name";

    if(in_array($file_ext, $allowed_ext)) {
        if($file_size < 1048567) {
           $update = mysqli_query($conn, "UPDATE users SET full_name='$full_name', email='$email', phone_number='$phone_number', profile='$new_file_name' WHERE id='$id'");
           if($update) {
                if(move_uploaded_file($file_temp_name, $file_destination)) {
                    echo "succesfully Updated!";
                }else{
                    echo "Failed!";
                }
           }else {
                echo "Update Failed!";
           }
        }else{
            echo "You can't upload file more than 1mb!";
        }
    }else{
        echo "You cannot upload this type of file";
    }

    