<?php
    //session_start();
    require "../config/config.php";
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $comment = trim(mysqli_real_escape_string($conn, $_POST['comment']));
    $post_id = trim(mysqli_real_escape_string($conn, $_POST['post_id']));
    
    date_default_timezone_set("Africa/Lagos");
    $date = date("l M d Y");
    $time = date("h:ia");

    //$post_id = $_SESSION['post_id'];

    //Insert the comment
    $insert = mysqli_query($conn, "INSERT INTO comments (name, email, comment, post_id, date, time) VALUES('$name','$email','$comment','$post_id','$date','$time')");
    if($insert) {
        echo "Successfully posted!";
    }else{
        echo "Failed!";
    }
