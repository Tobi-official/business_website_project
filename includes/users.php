<?php
    if(mysqli_num_rows($select_admin)==0) {
         header('location: dashboard.php?file=home.php&title=Home');
    }else{

        //Update Status
        if(isset($_GET['admin_id']) || isset($_GET['user_id'])) {
            if(isset($_GET['admin_id'])) {
                $status = "Admin";
                $update_id = $_GET['admin_id'];
            }else{
                $status = "User";
                $update_id = $_GET['user_id'];
            }
               
                
                $update = mysqli_query($conn, "UPDATE users SET status='$status' WHERE id='$update_id'");
                if($update) {
                    echo "<p style='color:green'>Successfully Updated!</p>";
                }else{
                    echo "<p style='color:red'>Failed!</p>";
                }
        }

    // Delete user
    if(isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $delete_user = mysqli_query($conn, "DELETE FROM users WHERE id='$delete_id'");
        if($delete_user) {
            echo "<p style='color:green'>Successfully Deleted!</p>";
        }else{
            echo "<p style='color:red'>Failed!</p>";
        }
    }

        $select = mysqli_query($conn, "SELECT * FROM users");
        if(mysqli_num_rows($select)>0) {
            echo "<table class='table_format' border=1>" ;
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>ID</th>";
            echo "<th>Full Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone Number</th>";
            echo "<th>Profile</th>";
            echo "<th>Status</th>";
            echo "<th>Date Registered</th>";
            echo "<th>Time Registered</th>";
            echo "<th>Make Admin</th>";
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";

            $sn = 1;
            while($row = mysqli_fetch_array($select)) {

            $id = $row['id'];
            $full_name = $row['full_name'];
            $email = $row['email'];
            $phone_number = $row['phone_number'];
            $profile = $row['profile'];
            $status = $row['status'];
            $date = $row['date'];
            $time = $row['time'];

            if(empty($profile)) {
                $profile = "profile.jpg";
            }else{
                $profile = $profile;
            }
            echo "<tr>";
            echo "<td>$sn</td>";
            echo "<td>$id</td>";
            echo "<td class='fullname_column'>$full_name</td>";
            echo "<td>$email</td>";
            echo "<td>$phone_number</td>";
            echo "<td><img src='images/profile/$profile'></td>";
            echo "<td>$status</td>";
            echo "<td>$date</td>";
            echo "<td>$time</td>";
            if($status == "User") {
                echo "<td><a href='dashboard.php?file=users.php&title=Users&admin_id=$id'><button class='status_button' data-table='users' data-column='status' data-id='$id' data-status='Admin'>Make Admin</button></a></td>";
            }else{
                echo "<td><a href='dashboard.php?file=users.php&title=Users&user_id=$id'><button class='status_button' data-table='users' data-column='status' data-id='$id' data-status='User'>Make User</button></a></td>";
            }
        
            echo "<td><a href='dashboard.php?file=edit_user.php&title=users&edit_id=$id'><button class='edit_button'>Edit</button></a></td>";
            echo "<td><a href='dashboard.php?file=users.php&title=Users&delete_id=$id'><button class='delete_button'>Delete</button></td>";
            echo "</tr>";
            $sn++;
        }
        echo "</table>";
        
        }else{
            header("location: index.php");
        }
}