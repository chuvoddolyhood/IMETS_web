<?php
    include './../../../config.php';

    if(isset($_GET['search'])){
        $search = $_GET['search'];

        $sql_getAppointment = "SELECT * FROM `appointment` WHERE `ID_Patient`=$search";
        $query_getAppointment = mysqli_query($conn, $sql_getAppointment);
        $rows_getAppointment = mysqli_fetch_array($query_getAppointment);
        $rowcount=mysqli_num_rows($query_getAppointment);
        if($rowcount>0){
            echo 'true';
        } else {
            echo 'false';
        }
    }   
?>