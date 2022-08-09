<!DOCTYPE html>
<html lang="en">
<?php require"includes/header1.php"; ?>
    <body>
        <?php require"includes/header2.php";?>


        <div class="title">Register</div>
         <div class="main_contain">
             <div class="main_body">
                <div class="form_container">
                    <form action="functions/reg_function.php" method="POST">
                        <?php 
                        if(isset($_GET['error'])) {
                            if($_GET['error'] == 'success') {
                            echo "<span class='success'>Succesfully registered!</span>";
                            }elseif($_GET['error'] == "user-already-exist") {
                                echo "<span class='error_msg'>User already exist</span>";
                            }elseif($_GET['error'] == "failed") {
                                echo "<span class='error_msg'>Registration failed</span>";
                             }elseif($_GET['error'] == "wrong-password") {
                                echo "<span class='error_msg'>password do not match</span>";
                             }
                        }
                        ?>
                        <h2>Register</h2>
                        <form>
                        <div class="form_control">
                            <p>Full Name:</p>
                            <input type="text" name="full_name" class="form_input" required>
                        </div>
                        
                        <div class="form_control">
                            <p>Phone Number</p>
                            <input type="tel" name="phone_number" class="form_input" required>
                        </div>

                        <div class="form_control">
                            <p>Email:</p>
                            <input type="email" name="email" class="form_input" required>
                        </div>

                        <div class="form_control">
                            <p>Password:</p>
                            <input type="password" name="password" class="form_input" required>
                        </div>

                        <div class="form_control">
                            <p>Confirm Password:</p>
                            <input type="password" name="confirm_password" class="form_input" required>
                        </div>

                        <div class="form_control">
                            <input type="submit" name="register" class="form_button" value="Register">
                        </div>
                    </form>
                    <br>
                    <p>Already registered? <a href="login.php">Click here to Login</a></p>
                </div>
             </div>
         </div>

     <?php include"includes/footer.php"; ?>
    </body>
</html>