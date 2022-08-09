<?php
    session_start();
    include "../config/config.php";
    require "../functions/functions.php";



    $post_title = trim(mysqli_real_escape_string($conn, $_POST['post_title']));
    $post_category = trim(mysqli_real_escape_string($conn, $_POST['post_category']));
    $author = trim(mysqli_real_escape_string($conn, $_POST['author']));
    $post_content = trim(mysqli_real_escape_string($conn, $_POST['post_content']));
    $post_image = $_FILES['post_image'];
    $post_tags = trim(mysqli_real_escape_string($conn, $_POST['post_tags']));
    $post_status = trim(mysqli_real_escape_string($conn, $_POST['post_status']));
    $post_category_id = get_post_category_id($post_category) ;

    $post_id = $_SESSION['post_id'];
    
    date_default_timezone_set("Africa/Lagos");
    $date = date("l M d Y");
    $time = date("h:ia");

    // Get image details
    $image_name = $post_image['name'];
    $image_tmp_name = $post_image['tmp_name'];
    $image_size = $post_image['size'];
    $image_error = $post_image['error'];
    $image_type = $post_image['type'];

    $img_array = explode('.',$image_name);
    $img_ext = strtolower(end($img_array));

    $new_image_name = $img_array[0]."_".uniqid().$img_ext;
    $file_destination = "../images/post_images/$new_image_name";


    $allowed = array('jpg', 'png', 'jpeg', 'gif', 'webp');

    $select = mysqli_query($conn, "SELECT * FROM posts WHERE id='$post_id'");

    if(mysqli_num_rows($select) > 0) {
        
            if(!in_array($img_ext, $allowed)) {
                echo "You are not allowed to upload this kind of file.";
                exit();
            }
            if($image_size > 204800) {
                echo "You cannot upload an image more than 200kb.";
                exit();
            }
            if($image_error > 0) {
            echo "There was an error uploading your the post image";
            exit();
            }

        if(move_uploaded_file($image_tmp_name, $file_destination)) {

            // Update the post
            $update = mysqli_query($conn, "UPDATE posts SET post_title='$post_title' , post_category_id='$post_category_id' , post_author='$author', post_content='$post_content', post_image='$new_image_name', post_tags='$post_tags', post_status='$post_status', post_date='$date', post_time='$time' WHERE id='$post_id'");
            if($update) {
                echo "Successfully Updated!";
            }else{
                echo "Failed!";
            }
        }
    }else {
        echo "Post not found!";
    }
