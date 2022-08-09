<!DOCTYPE html>
<html lang="en">
<?php require "includes/header1.php"; 
      require  "config/config.php";
      require  "functions/functions.php";   

      if(!isset($_GET['cat_id'])) {
        header('location: blog.php');
        eixt();
      }else {}

      $cat_id = $_GET['cat_id'];
?>

    <body>
        <?php require"includes/header2.php"; ?>
       
        <section class="category_title">
            <h1><?php echo get_post_category($cat_id); ?></h1>
        </section>
        
        <div class="main_container">
           
            <div class="main_body">

                <?php 
                if(empty(display_category_posts($cat_id))){
                    header('location: blog.php');
                    eixt();
                }else{
                    echo display_category_posts($cat_id); 
                }
                
                ?>
            </div>
            <div class="sidebar">
            <?php include "includes/sidebar.php" ?>
            </div>
         </div>

     <?php include"includes/footer.php"; ?>

     <script src="javascript/script.js"></script>
   <script src="javascript/script2.js"></script>
    </body>
</html>