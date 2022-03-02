<?php
    include './../../config.php';
    if(isset($_GET['HoTenKH'])){
        $HoTenKH = $_GET['HoTenKH'];
        $sex_client = $_GET['sex_client'];
        $dob_client = $_GET['dob_client'];
        $SoDienThoai = $_GET['SoDienThoai'];
        $UserName = $_GET['UserName'];
        $password = md5($_GET['password']);

        // echo 'ok';
        // echo $HoTenKH;
        // echo $sex_client;
        // echo $dob_client;
        // echo $SoDienThoai;
        // echo $UserName;
        // echo $password;

        $sql_add = "INSERT INTO `patient`(`Name`, `DOB`, `Sex`, `PhoneNumber`, `UserName`, `Password`) 
        VALUES ('$HoTenKH','$dob_client','$sex_client','$SoDienThoai','$UserName','$password')";

        $query = mysqli_query($conn, $sql_add);

        if($query){
            echo 'True'; // Dang ky thanh cong
        } else {
            echo 'False'; // Dang ky that bai
        }
        
        
    }
?>