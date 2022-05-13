<?php
    include './../../config.php';
    $email = $_GET['email'];
    // echo $email;

    $sql_confirmEmail = "SELECT * FROM `patient` WHERE `UserName` = '$email'";
    $query_confirmEmail = mysqli_query($conn, $sql_confirmEmail);
    $rowcount=mysqli_num_rows($query_confirmEmail);

    if($rowcount>0){
        echo 'True';
    } else {
        echo 'False';
    }
?>