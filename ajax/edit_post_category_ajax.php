<?php
    session_start();
    include "../config/config.php";
    require "../functions/functions.php";


    $post_category = trim(mysqli_real_escape_string($conn, $_POST['post_category']));
    

    $cat_id = $_SESSION['cat_id'];
    
    date_default_timezone_set("Africa/Lagos");
    $date = date("l M d Y");
    $time = date("h:ia");


    $select = mysqli_query($conn, "SELECT * FROM post_categories WHERE id='$cat_id'");

    if(mysqli_num_rows($select) > 0) {
        
            // Update the post category
            $update = mysqli_query($conn, "UPDATE post_categories SET post_category='$post_category', date='$date', time='$time' WHERE id='$cat_id'");
            if($update) {
                echo "Successfully Updated!";
            }else{
                echo "Failed!";
            }
        }
     else {
        echo "category not found!";
    }
