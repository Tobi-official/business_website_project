<?php
    if(!isset($_GET['cat_id'])) {
        header('location: dashboard.php');
        exit();
    }

    $cat_id = $_GET['cat_id'];
    $_SESSION['cat_id'] = $cat_id;
    $select = mysqli_query($conn, "SELECT * FROM post_categories WHERE id='$cat_id'");
        if(mysqli_num_rows($select) > 0) {
            
            
                $row = mysqli_fetch_array($select);

                $id = $row['id'];
                $post_category = $row['post_category'];
                       
        }

?>


<div class="form_contain">
    <form method="POST" id="edit_category_form">
        <div class="post_title">
            <label for="post_category">Post Category:</label>
            <input type="text" name="post_category" class="form_inputs" id="post_category" value="<?php echo $post_category; ?>" required>
        </div>
        
        <div class="input_box">
            <button type="submit" name="submit" id="post_category_button" class="post_category_button">Update<i class="fa-brands fa-telegram"></i></button>
        </div>
    </form>
</div>