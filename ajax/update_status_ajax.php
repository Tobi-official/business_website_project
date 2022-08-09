<?php
    require "../config/config.php";

    $table = trim($_POST['table']);
    $column = trim($_POST['column']);
    $id = trim($_POST['id']);
    $status = trim($_POST['status']);

    $update = mysqli_query($conn, "UPDATE $table SET $column='$status' WHERE id='$id'");
    if($update) {
        echo "succesfully Updated!";
    }else{
        echo "Failed!";
    }