<?php
if(mysqli_num_rows($select_admin)==0) {
    header('location: dashboard.php?file=home.php&title=Home');
}else{
 echo "<h1>View Product</h1>"
}