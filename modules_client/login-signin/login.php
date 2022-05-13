<?php
    include './../../config.php';
    session_start();
        $username_client_login = $_GET['username_client_login'];
        $password_client_login = $_GET['password_client_login'];
        // echo $username_client_login;
        // echo $password_client_login;

        $sql_get_password = "SELECT password FROM patient WHERE UserName='$username_client_login'";
        $query_get_password = mysqli_query($conn, $sql_get_password);
        $rows_get_password = mysqli_fetch_array($query_get_password);

        if($rows_get_password['password'] == md5($password_client_login)){
            $_SESSION['login_client']=$username_client_login;
            echo 'true';
        } else {
            echo 'false';
        }        
    
?>