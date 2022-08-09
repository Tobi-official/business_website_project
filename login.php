<!DOCTYPE html>
<html lang="en">
<?php require"includes/header1.php"; ?>
    <body>
        <?php require"includes/header2.php"; ?>
        <div class="title">Login</div>

         <div class="main_contain">
             <div class="main_body">
                <div class="form_container">
                    <form action="functions/login_function.php" method="POST">
                    <?php 
                    if(isset($_GET['error'])) {
                        if($_GET['error'] == "no-user") {
                            echo "<span class='error_msg'>You have not registered yet</span>";
                        }
                        if($_GET['error'] == "incorrect-password") {
                             echo "<span class='error_msg'>Password is incorrect</span>";
                        }
                    }
                        ?>
                        <h2>Login</h2>
                        <div class="form_control">
                            <p>Email:</p>
                            <input type="email" name="email" class="form_input" required>
                        </div>

                        <div class="form_control">
                            <p>Password:</p>
                            <input type="password" name="password" class="form_input" required>
                        </div>

                        <div class="form_control">
                            <input type="submit" name="login" class="form_button" value="Login">
                        </div>
                    </form>
                    <br>
                    <p>Not yet registered? <a href="register.php">Register Here</a></p>
                </div>
             </div>
         </div>

     <?php include"includes/footer.php"; ?>
    </body>
</html>