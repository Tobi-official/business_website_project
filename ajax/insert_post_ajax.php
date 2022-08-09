<?php
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

    $select = mysqli_query($conn, "SELECT * FROM posts WHERE post_title='$post_title'");

    if(mysqli_num_rows($select) > 0) {
        echo "Post already existing!";
    }else{
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

            // Insert the post
            $insert = mysqli_query($conn, "INSERT INTO posts (post_title , post_category_id , post_author, post_content, post_image, post_tags, post_status, post_date, post_time) VALUES('$post_title','$post_category_id','$author','$post_content','$new_image_name','$post_tags','$post_status','$date','$time')");
            if($insert) {
                echo "Successfully inserted!";
            }else{
                echo "Failed!";
            }
        }
    }
