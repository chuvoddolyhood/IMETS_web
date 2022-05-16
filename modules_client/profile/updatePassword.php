<?php
    include './../../config.php';
    
    $new_password = $_GET['new_password'];
    $username = $_GET['username'];

    // echo $username;

    $Password=md5($new_password);
    $sql_update_newPass="UPDATE patient SET Password='$Password' WHERE UserName='$username'";
    $query_update_newPass = mysqli_query($conn, $sql_update_newPass);
    if($query_update_newPass){
        echo 'true';
    } else {
        echo 'false';
    }

?>