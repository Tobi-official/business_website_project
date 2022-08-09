<!DOCTYPE html>
<html lang="en">
<?php require "includes/header1.php"; 
      require  "config/config.php";
      require  "functions/functions.php";   

?>


    <body>
        <?php require"includes/header2.php"; ?>
       <!-- <div class="title">LATEST NEWS ABOUT HEROIC UNIVERSAL CONCEPT</div>  -->
       <?php echo show_all_posts_categories_section(); ?>
        <!-- 
       <div class="category_container">
       <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>
        <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>
        <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>
        <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>
        <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>
        <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>
        <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>
        <div class="category_box">
                <a href="#"><h2>Politics</h2></a>
        </div>

        </div>
            -->
          
         <div class="main_container">
           
            <div class="main_body">

                <?php echo fetch_all_post(); ?>
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