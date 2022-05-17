<?php
    include './../../config.php';

    $ID_Appointment = $_GET['ID_Appointment'];
    // echo $ID_Appointment;


    $sql_delete_appointment = "DELETE FROM `appointment` WHERE `ID_Appointment`= $ID_Appointment";
    $query_delete_appointment = mysqli_query($conn, $sql_delete_appointment);

    if($query_delete_appointment){
        header("location: ./../../index.php?page_layout=booking");
    }

?>