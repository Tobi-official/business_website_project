<?php
    include "../config/config.php";
    $post_category = trim(mysqli_real_escape_string($conn, $_POST['post_category']));

    date_default_timezone_set("Africa/Lagos");
    $date = date("l M d Y");
    $time = date("h:ia");

    $select = mysqli_query($conn, "SELECT * FROM post_categories WHERE post_category='$post_category'");

    if(mysqli_num_rows($select) > 0) {
        echo "Category already existing!";
    }else{
        $insert = mysqli_query($conn, "INSERT INTO post_categories (post_category, date, time) VALUES('$post_category','$date','$time')");
        if($insert) {
            echo "Successfully inserted!";
        }else{
            echo "Failed!";
        }
    }