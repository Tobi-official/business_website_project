<?php
    include "../config/config.php";
    $post_id = trim(mysqli_real_escape_string($conn, $_POST['post_id']));
    $table = trim(mysqli_real_escape_string($conn, $_POST['table']));
 
    $select = mysqli_query($conn, "SELECT * FROM $table WHERE id='$post_id'");

    if(mysqli_num_rows($select) > 0) {
       
        $delete = mysqli_query($conn, "DELETE FROM $table WHERE id='$post_id'");
        if($delete) {
            echo "Successfully Deleted!";
        }else{
            echo "Failed!";
        }
    }else{
        echo "Record not found!";
    }