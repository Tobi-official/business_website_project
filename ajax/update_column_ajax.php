<?php
    include "../config/config.php";
    $id = trim(mysqli_real_escape_string($conn, $_POST['id']));
    $table = trim(mysqli_real_escape_string($conn, $_POST['table']));
    $column = trim(mysqli_real_escape_string($conn, $_POST['column']));
    $value = trim(mysqli_real_escape_string($conn, $_POST['value']));
    
   
    $select = mysqli_query($conn, "SELECT * FROM $table WHERE id='$id'");
   

    if(mysqli_num_rows($select) > 0) {
       
            $update = mysqli_query($conn, "UPDATE $table SET  comment_status='$value' WHERE id='$id'");
          
            if($update) {
                if($value == "Approved") {
                    echo "Successfully approved!";
                }else{
                echo "Successfully updated!";
            }
            }else{
                echo "Failed!";
            }
    }else{
            echo "Record not found!";
        }
