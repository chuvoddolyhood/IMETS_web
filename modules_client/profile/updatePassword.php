<?php
    include './../../config.php';
    
    $old_password = $_GET['old_password'];
    $new_password = $_GET['new_password'];
    $renew_password = $_GET['renew_password'];
    $username = $_GET['username'];

    // echo $username;

    $sql_get_oldPass="SELECT Password FROM patient WHERE UserName='$username'";
    $query_get_oldPass = mysqli_query($conn, $sql_get_oldPass);
    $rows_get_oldPass = mysqli_fetch_array($query_get_oldPass);
    if(md5($old_password)==$rows_get_oldPass['Password']){
        if($new_password==$renew_password){
            $Password=md5($new_password);
            $sql_update_newPass="UPDATE patient SET Password='$Password' WHERE UserName='$username'";
            $query_update_newPass = mysqli_query($conn, $sql_update_newPass);
            if($query_update_newPass){
                echo 'Đổi mật khẩu thành công.';
            }
        } else {
            echo 'Mật khẩu mới và Xác nhận mật khẩu mới không khớp.';
        }
    } else {
        echo 'Mật khẩu cũ không chính xác.';
    }

?>