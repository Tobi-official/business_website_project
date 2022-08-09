<div class="form_contain">
    <form method="POST" id="post_form" enctype="multipart/form-data">
        <div class="post_title">
            <label for="name">Post Title:</label>
            <input type="text" name="post_title" class="form_inputs" id="post_title" required>
        </div>
        <div class="input_box">
            <label for="post_category">Post Category:</label>
            <select  name="post_category" class="form_inputs" id="post_category" required>
                <option value="">Select</option>
                <?php echo fetch_post_categories(); ?>
            </select>
        </div>
        <div class="input_box">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form_inputs" id="author" required>
        </div>
        <div class="input_box">
            <label for="post_content">Post Content:</label>
            <textarea name="post_content" class="form_inputs summernote" id="post_content" cols="20" rows="15" required></textarea>
        </div>
        <div class="input_box">
            <label for="post_image">Post Image:</label>
            <small>Allowed: jpg, gif, png, JPEG</small>
            <input type="file" name="post_image" class="form_inputs" id="post_image" required>
        </div>
        <div class="input_box">
            <label for="post_tags">Post tags:</label>
            <input type="text" name="post_tags" class="form_inputs" id="post_tags" required>
        </div>
        <div class="input_box">
            <label for="post_status">Post Status:</label>
            <select  name="post_status" class="form_inputs" id="post_status" required>
                <option value="">Select</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
        <div class="input_box">
            <button type="submit" name="submit" id="post_button" class="post_button">Insert Post</button>
        </div>
    </form>
</div>