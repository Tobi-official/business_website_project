<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
      require "includes/header1.php"; 
      require  "config/config.php";
      require  "functions/functions.php"; 
      
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['post_id'] = $id;
      }else{
        header('location:blog.php');
        exit();      
    }
?>
    <body>
        <?php require"includes/header2.php"; ?>
       <!-- <div class="title">LATEST NEWS ABOUT HEROIC UNIVERSAL CONCEPT</div>  -->

         <div class="main_container">
            
            <div class="main_body">
                
                <div class="single_news_container">
                    <div class="post_img">
                        <?php echo fetch_single_post_img($id); ?>
                        <!-- <img src="images/house.jpg" alt=""> -->
                    </div>
                    <div class="single_post_content">
                        <?php echo fetch_single_post($id); ?>

                        <!--
                        <h1 class="single_news_head">Heading of the blog post</h1>
                        <small>By Oluwatobi, </small>
                        <small>2 hours ago</small>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        -->
                        <!-- Comments Section -->
                        <div class="comment_container">
                            <h3>Comments</h3>

                            <?php echo fetch_comments($id); ?>

                            <div class="message_container">
                                <span class="success_msg"></span>
                                <span class="fail_msg"></span>
                            </div>

                            <div class="comment_form">
                                <h3>Post Your Comments</h3>
                                <form method="POST" id="comment_form">
                                    <div class="input_box">
                                        <label for="name">Your Name:</label>
                                        <input type="text" name="name" class="form_input" id="name">
                                    </div>
                                    <div class="input_box">
                                        <label for="email">Your Email:</label>
                                        <input type="email" name="email" class="form_input" id="email">
                                    </div>
                                    <div class="input_box">
                                        <label for="comment">Your Comment:</label>
                                        <textarea name="comment" class="form_input" id="comment" cols="20" rows="15"></textarea>
                                    </div>
                                    <input type="hidden" name="post_id" id="post_id" value="<?php echo $id; ?>">
                                    <div class="input_box">
                                        <button type="submit" name="submit" id="post_comment" class="post_button">Post Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="sidebar">
                <?php include "includes/sidebar.php" ?>
            </div>
         </div>

     <?php include"includes/footer.php"; ?>
     <script src="javascript/dashboard.js"></script>
    </body>
</html>