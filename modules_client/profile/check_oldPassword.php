<?php
    include './../../config.php';
    
    $old_password = $_GET['old_password'];
    $username = $_GET['username'];

    // echo $username;

    $sql_get_oldPass="SELECT Password FROM patient WHERE UserName='$username'";
    $query_get_oldPass = mysqli_query($conn, $sql_get_oldPass);
    $rows_get_oldPass = mysqli_fetch_array($query_get_oldPass);
    if(md5($old_password)==$rows_get_oldPass['Password']){
        echo 'true';
    } else {
        echo 'false';
    }

?>