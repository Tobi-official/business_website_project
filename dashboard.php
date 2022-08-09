<?php
    session_start();
    require "includes/dashboard_header.php"; 
    require "functions/functions.php";
    require "config/config.php";

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }else{
        header('location:index.php');
    }

    $select_admin = mysqli_query($conn, "SELECT * FROM users WHERE status='Admin' AND email='$email'");
  
?>
    <body>
        <div class="nav_container">
            <div class="logo_container">
                <img src="images/log.png">
            </div>
            <div class="logout_container">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </div>
        <div class="main_container">
            <div class="sidebar">
            <div class="sidebar_menu">
                    <i class="fas fa-home"></i><a href="dashboard.php?file=home.php&title=Home">Home</a>
                </div>
                <div class="sidebar_menu">
                    <i class="fas fa-user"></i><a href="dashboard.php?file=profile.php&title=profile">Profile</a>
                </div>
            <?php
                if(mysqli_num_rows($select_admin)>0) { 
            ?>
                <div class="sidebar_menu">
                    <i class="fas fa-users"></i><a href="dashboard.php?file=users.php&title=Users">Users</a>
                </div>
                <div class="sidebar_menu">
                    <div class="menu_item">
                        <i class="fab fa-telegram-plane"></i><a href="#">Posts</a>
                    </div>
                    <div class="dropdown">
                        <div class="dropdown_menu">
                        <i class="fas fa-angle-right"></i><a href="dashboard.php?file=add_post.php&title=Add-new-post">Add New Posts</a>
                        </div>
                    <div class="dropdown_menu">
                         <i class="fas fa-angle-right"></i><a href="dashboard.php?file=view.php&title=posts">View Posts</a>
                    </div>
                    </div>
                </div>
                <div class="sidebar_menu">
                    <div class="menu_item">
                        <i class="fab fa-telegram-plane"></i><a href="#">Post categories</a>
                    </div>
                    <div class="dropdown">
                        <div class="dropdown_menu">
                        <i class="fas fa-angle-right"></i><a href="dashboard.php?file=add_post_category.php&title=Add-post-category">Add Post Category</a>
                        </div>
                    <div class="dropdown_menu">
                         <i class="fas fa-angle-right"></i><a href="dashboard.php?file=view_post_categories.php&title=posts-categories">View Post categories</a>
                    </div>
                    </div>
                </div>
                <div class="sidebar_menu">
                    <div class="menu_item">
                        <i class="fas fa-shopping-cart"></i><a href="#">Products</a>
                    </div>
                    <div class="dropdown">
                        <div class="dropdown_menu">
                        <i class="fas fa-angle-right"></i><a href="dashboard.php?file=add_product.php&title=Add-New-Product">Add New Product</a>
                        </div>
                    <div class="dropdown_menu">
                         <i class="fas fa-angle-right"></i><a href="dashboard.php?file=view_product.php&title=Products">View Products</a>
                    </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="sidebar_menu">
                    <i class="far fa-envelope"></i><a href="dashboard.php?file=notifications.php&title=Notifications">Notifications</a>
                </div>
                <?php
                if(mysqli_num_rows($select_admin)>0) { 
            ?>
                <div class="sidebar_menu">
                    <i class="fas fa-comment"></i><a href="dashboard.php?file=comments.php&title=Comments">Comments</a>
                </div>
                <?php
                }
                ?>
                <div class="sidebar_menu">
                    <i class="fas fa-video"></i><a href="dashboard.php?file=tutorial.php&title=Tutorial">Tutorial</a>
                </div>
                <div class="sidebar_menu">
                <i class="fas fa-sign-out-alt"></i><a href="logout.php">Logout</a>
                </div>
            </div>
            <div class="main_body">
                <div class="title">
                    <h2><?php echo get_title(); ?></h2>
                    
                 </div>
               <div class="main_content">
                <div class="message_container">
                    <span class="success_msg"></span>
                    <span class="fail_msg"></span>
                </div>
               <?php get_files(); ?>
                </div>
            </div>
        </div>

        <!--<script src="javascript/jquery.js"></script>-->
        <script src="javascript/dashboard.js"></script>
        <script>
            $('.summernote').summernote({
                //placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 300,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
               ['insert', ['link', 'picture', 'video']]
               ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $(".summernote").on("summernote.paste",function(e,ne) {

                var bufferText = ((ne.originalEvent || ne).clipboardData || window.clipboard).getData("Text");
                ne.preventDefault();
                document.exeCommand('insertText', false, bufferText);
                
            });  

            </script>
        
    </body>
</html>