<?php
    // GET TIME STAMP
    function get_timestamp($table, $id) {
        global $conn;
        $sql = mysqli_query($conn, "SELECT datetime FROM $table WHERE id='$id'");
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            return $row['datetime'];
        }
    }




    // TIME AGO
    function time_ago($timestamp) {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes = round($seconds /60);
        $hours = round($seconds/3600);
        $days = round($seconds/86400);
        $weeks = round($seconds/604800);
        $months = round($seconds/2629440);
        $years = round($seconds/31553280);

        if($seconds <= 60 ) {
            return "Just now";
        }else if($minutes <= 60) {
            if($minutes == 1) {
                return "One minutes ago";
            }else {
                return "$minutes minutes ago";
            }
        }else if($hours <= 24) {
            if($hours == 1) {
                return "One hour ago";
            }else {
                return "$hours hours ago";
            }
        }else if($days <= 7) {
            if($days == 1) {
                return "Yesterday";
            }else {
                return "$days days ago";
            }
        }else if($weeks <= 4.3) {
            if($weeks == 1) {
                return "A week ago";
            }else{
                return "$weeks weeks ago";
            }
        }else if($months <= 12) {
            if($months == 1) {
                return "A month ago";
            }else{
                return "$months months ago";
            }
        }else{
            if($years == 1) {
                return "One year ago";
            }else{
                 return "$years years ago";
            }
        }

    }

   
    // Show all commments
    function show_all_comments() {
        global $conn;

            $select = mysqli_query($conn, "SELECT * FROM comments ORDER BY id DESC");
            if(mysqli_num_rows($select) > 0) {
                
                $result = "";

                $result .= "
                            <table class='table_format' border=1> 
                            <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Post ID</th>
                            <th>Comment Status</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Approve</th>
                            <th>Delete</th>
                            </tr>
                            ";
                        $sn = 1;
                while($row = mysqli_fetch_array($select)) {

                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $comment = $row['comment'];
                    $post_id = $row['post_id'];
                    $comment_status = $row['comment_status'];
                    $date = $row['date'];
                    $time = $row['time'];
                    
                    

                    $result .="
                            <tr>
                                <td>$sn</td>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$comment</td>
                                <td>$post_id</td>
                                <td>$comment_status</td>
                                <td>$date</td>
                                <td>$time</td>
                                <td><a href='#'><button class='primary_button item_button' data-id='$id' data-table='comments' data-column='$comment_status' data-value='Approved'>Approve</button></a></td>
                                <td><a href='#'><button class='delete_button' data-id='$id' data-table='comments'>Delete</button></a></td>
                                
                            </tr>
                            ";
                     $sn++;   
                }
                
                $result.="
                        
                          </table>
                    ";
                return $result;
        }
    }



    // Show all posts categories
    function show_all_posts_categories() {
        global $conn;

            $select = mysqli_query($conn, "SELECT * FROM post_categories ORDER BY id DESC");
            if(mysqli_num_rows($select) > 0) {
                
                $result = "";

                $result .= "
                            <table class='table_format' border=1> 
                            <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>Post Category</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>
                            ";
                        $sn = 1;
                while($row = mysqli_fetch_array($select)) {

                    $id = $row['id'];
                    $post_category = $row['post_category'];
                    $date = $row['date'];
                    $time = $row['time'];
                    
                    

                    $result .="
                            <tr>
                                <td>$sn</td>
                                <td>$id</td>
                                <td>$post_category</td>
                                <td>$date</td>
                                <td>$time</td>
                                <td><a href='dashboard.php?file=edit_post_category.php&title=Add-post-category&cat_id=$id'><button class='edit_button'>Edit</button></a></td>
                                <td><a href='#'><button class='delete_button' data-id='$id' data-table='post_categories'>Delete</button></a></td>
                                
                            </tr>
                            ";
                     $sn++;   
                }
                
                $result.="
                        
                          </table>
                    ";
                return $result;
        }
    }



     // Show posts categories
     function show_all_posts_categories_section() {
        global $conn;

            $select = mysqli_query($conn, "SELECT * FROM post_categories ORDER BY id");
            if(mysqli_num_rows($select) > 0) {
                
                $result = "";

                $result .= "
                                <div class='category_container'>
                            ";
                        
                while($row = mysqli_fetch_array($select)) {

                    $id = $row['id'];
                    $post_category = $row['post_category'];
                    $date = $row['date'];
                    $time = $row['time'];
                    
                    

                    $result .="
                                <div class='category_box'>
                                <a href='post_category.php?cat_id=$id'><h2>$post_category</h2></a>
                                </div>
                            ";
                      
                }
                
                $result.="
                        
                          </div>
                    ";
                return $result;
        }
    }





    // Get post category
    function get_post_category($post_category_id) {
        global $conn;

        $select = mysqli_query($conn, "SELECT post_category FROM post_categories WHERE id='$post_category_id'");
        if(mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_array($select);
            $post_category = $row['post_category'];
            
            
            return $post_category;
        }
    }



    // Show all posts
    function show_all_posts() {
        global $conn;

            $select = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");
            if(mysqli_num_rows($select) > 0) {
                
                $result = "";

                $result .= "
                            <table class='table_format' border=1> 
                            <tr>
                            <th>S/N</th>
                            <th>Post ID</th>
                            <th>Post Title</th>
                            <th>Post Category</th>
                            <th>Post Author</th>
                            <th>Post Content</th>
                            <th>Post Image</th>
                            <th>Post Tags</th>
                            <th>Post Status</th>
                            <th>Post Date</th>
                            <th>Post Time</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>
                            ";
                        $sn = 1;
                while($row = mysqli_fetch_array($select)) {

                    $id = $row['id'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_category = get_post_category($post_category_id);
                    $post_author = $row['post_author'];
                    $post_content = $row['post_content'];
                    $post_content = substr($post_content, 0,50).'...';

                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_date = $row['post_date'];
                    $post_time = $row['post_time'];
                    
                    

                    $result .="
                            <tr>
                                <td>$sn</td>
                                <td>$id</td>
                                <td>$post_title</td>
                                <td>$post_category</td>
                                <td>$post_author</td>
                                <td>$post_content</td>
                                <td><img src='images/post_images/$post_image'</td>
                                <td>$post_tags</td>
                                <td>$post_status</td>
                                <td>$post_date</td>
                                <td>$post_time</td>
                                <td><a href='dashboard.php?file=edit_post.php&title=edit_post&post_id=$id'><button class='edit_button'>Edit</button></a></td>
                                <td><a href='#'><button class='delete_button' data-id='$id' data-table='posts'>Delete</button></a></td>
                                
                            </tr>
                            ";
                    $sn++;    
                }
                
                $result.="
                        
                          </table>
                    ";
                return $result;
        }
    }


    // Fetch all comments
    function fetch_comments($id) {
        global $conn;

            $select = mysqli_query($conn, "SELECT * FROM comments WHERE post_id='$id' && comment_status='Approved'");
            if(mysqli_num_rows($select) > 0) {
                
                $result = "";

                while($row = mysqli_fetch_array($select)) {

                    $id = $row['id'];
                    $name = $row['name'];
                    $comment = $row['comment'];
                    $datetime = $row['datetime'];
                    
                    $result.="

                <div class='comment_content'>
                    <div class='comment_img'>
                        <img src='images/profile/profile.jpg'>
                    </div>
                    <div class='comment_text'>
                        <p>$comment</p>
                        <small>$name</small>
                    </div>
                </div>

                    ";
                }
                return $result;
        }
    }



    // Fetch sidebar posts
    function fetch_single_post_img($id) {
        global $conn;

        $select = mysqli_query($conn, "SELECT * FROM posts WHERE id='$id' && post_status='Published'");
        if(mysqli_num_rows($select) > 0) {
            
            $result = "";

            $row = mysqli_fetch_array($select);

                $post_image = $row['post_image'];
                
                $result.="

                <img src='images/post_images/$post_image'>
                ";
            return $result;
        }
    }
    


    // Fetch sidebar posts
    function fetch_single_post($id) {
        global $conn;

        $select = mysqli_query($conn, "SELECT * FROM posts WHERE id='$id' && post_status='Published'");
        if(mysqli_num_rows($select) > 0) {
            
            $result = "";

            $row = mysqli_fetch_array($select);

                $id = $row['id'];

                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $datetime = $row['datetime'];
                
                $result.="

                    <h1 class='single_news_head'>$post_title</h1>
                        <small>By $post_author, </small>
                        <small>2 hours ago</small>
                        <p>$post_content</p>
                ";
            return $result;
        }
    }





    // Fetch sidebar posts
    function fetch_sidebar_post() {
        global $conn;

        $select = mysqli_query($conn, "SELECT * FROM posts WHERE post_status='Published' ORDER BY id DESC LIMIT 5");
        if(mysqli_num_rows($select) > 0) {
            
            $result = "";

            while($row = mysqli_fetch_array($select)) {
                $id = $row['id'];

                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $datetime = $row['datetime'];

                //$time_ago = time_ago($datetime);
                
                $result.="

                    <div class='post_container'>
                        <div class='sidebar_post_img'>
                            <img src='images/post_images/$post_image'>
                        </div>
                        <div class='sidebar_post_content'>
                            <h4>$post_title</h4>
                            <small>By $post_author,</small>
                            <small>".time_ago($datetime)."</small>
                            <a href='single_news.php?id=$id'><button class='sidebar_read_more'>Read more</button></a>
                        </div>
                    </div>
                
                ";
            }

            
            return $result;
        }
    }


    // Fetch all posts
    function fetch_all_post() {
        global $conn;

        $select = mysqli_query($conn, "SELECT * FROM posts WHERE post_status='Published' ORDER BY id DESC LIMIT 10");
        if(mysqli_num_rows($select) > 0) {
            
            $result = "";

            while($row = mysqli_fetch_array($select)) {
                $id = $row['id'];

                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $datetime = $row['datetime'];

                //$time_ago = time_ago(get_timestamp("posts", $id));
                $time_ago = time_ago($datetime);
                
                $result.="
                
                        <div class='post_container'>
                        <div class='post_img'>
                            <img src='images/post_images/$post_image'>
                        </div>
                        <div class='post_content'>
                            <h2 class='blog_head'>$post_title</h2>
                            <small>By $post_author, </small>
                            <small>$time_ago</small>
                            <p>$post_content</p>
                            <a href='single_news.php?id=$id'><button class='read_more'>Read more</button></a>
                        </div>
                    </div>
                
                ";
            }

            
            return $result;
        }
    }




    // Get post category id
    function get_post_category_id($post_category) {
        global $conn;

        $select = mysqli_query($conn, "SELECT * FROM post_categories WHERE post_category='$post_category'");
        if(mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_array($select);
            $id = $row['id'];
            
            
            return $id;
        }
    }

    // Fetch Post categories
    function fetch_post_categories() {
        global $conn;

        $select = mysqli_query($conn, "SELECT * FROM post_categories");
        if(mysqli_num_rows($select) > 0) {
            $result = "";
            while($row = mysqli_fetch_array($select)) {
                $post_category = $row['post_category'];
                $result.= "<option value='$post_category'>$post_category</option>";
            }
            return $result;
        }
    }


    // Display Posts based on category id
    function display_category_posts($cat_id) {
        global $conn;

        $select = mysqli_query($conn, "SELECT * FROM posts WHERE post_category_id='$cat_id' ORDER BY id DESC LIMIT 10");
        if(mysqli_num_rows($select) > 0) {
            
            $result = "";

            while($row = mysqli_fetch_array($select)) {
                $id = $row['id'];

                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $datetime = $row['datetime'];

                
                $time_ago = time_ago($datetime);
                
                $result.="
                
                        <div class='post_container'>
                        <div class='post_img'>
                            <img src='images/post_images/$post_image'>
                        </div>
                        <div class='post_content'>
                            <h2 class='blog_head'>$post_title</h2>
                            <small>By $post_author, </small>
                            <small>$time_ago</small>
                            <p>$post_content</p>
                            <a href='single_news.php?id=$id'><button class='read_more'>Read more</button></a>
                        </div>
                    </div>
                
                ";
            }

            
            return $result;
        }
    }



    // GET Dashboard Page Title

    function get_title() {
        if(isset($_GET['title'])) {
            $title = $_GET['title'];
            $title = str_replace("-", " ", $title);
            $title = ucwords(strtolower($title));
            return $title; 
        }else{
        return "Dashboard";
        }
    }

    // INCLUDE FILES To Dashboard
    function get_files() {
        global $select_admin, $conn;
        global $email, $conn;
        if(isset($_GET['file'])) {
            $file = $_GET['file'];
            include "includes/$file";
            
        }else{
            include "includes/home.php";
        }
    }
