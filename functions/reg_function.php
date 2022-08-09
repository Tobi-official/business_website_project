<?php
    if(isset($_POST['register'])) {

        require "../config/config.php";

        $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $phone_number = trim(mysqli_real_escape_string($conn, $_POST['phone_number']));
        $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
        $confirm_password = trim(mysqli_real_escape_string($conn, $_POST['confirm_password']));

        date_default_timezone_set("Africa/Lagos");
        $date = date("l M d, Y");
        $time = date("h:ia");

        // Check if the email or phone number is already registered

            $check_user = mysqli_query($conn, "SELECT * FROM users where email='$email' OR phone_number='$phone_number'");
            if(mysqli_num_rows($check_user)>0) {
                header('location: ../register.php?error=user-already-exist');
            }else {

            if($password == $confirm_password) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $insert = mysqli_query($conn, "INSERT INTO users(full_name, phone_number, email, password, date, time) VALUES('$full_name', '$phone_number', '$email', '$hashed_password', '$date', '$time')");
                if(!$insert) {
                    header('location: ../register.php?error=failed');
                }else {
                    //header('location: ../register.php?error=success');
                    header('location: ../login.php');
                }
            }else {
                header('location: ../register.php?error=wrong-password');
            }
        }

    }


    