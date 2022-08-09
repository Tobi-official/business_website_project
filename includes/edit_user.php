<?php
    if(isset($_GET['edit_id'])) {
        $id = $_GET['edit_id'];

        $_SESSION['id'] = $id;

        $select = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
        if(mysqli_num_rows($select)>0) {
            $row = mysqli_fetch_array($select);
            $full_name = $row['full_name'];
            $email = $row['email'];
            $phone_number = $row['phone_number'];
        }
    }else{
        header('location:http://localhost/buisness_website/dashboard.php?file=home.php&title=Home');
    }
?>

<form action="#" method="POST" id="profile_update_form">
    <input type="text" name="full_name" class="form_input" id="full_name" placeholder="Enter Your Full Name" value="<?php echo $full_name; ?>" required>  
    <input type="email" name="email" class="form_input" id="email" placeholder="Enter Your Email" value="<?php echo $email; ?>" required>
    <input type="tel" name="phone_number" class="form_input" id="phone_number" placeholder="Enter Your Phone Number" value="<?php echo $phone_number; ?>" required>
    <p>Upload profile Image (Allowed: *.jpg, *.png)</p>
    <input type="file" name="profile" class="form_input profile" id="profile_img" required>
    <button name="register" class="primary_button" id="profile_edit_button">Update</button>
</form>