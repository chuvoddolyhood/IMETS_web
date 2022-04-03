<?php
    include './../../../config.php';

    $ID_Diagnose = $_GET['ID_Diagnose'];

    // echo $ID_Diagnose;

    //Get ID_Appointment
    $sql_get_idAppointment = "SELECT medicalrecord.ID_Appointment FROM `diagnose` JOIN medicalrecord ON diagnose.ID_MedicalRecord=medicalrecord.ID_MedicalRecord WHERE `ID_Diagnose`=$ID_Diagnose";
    $query_get_idAppointment = mysqli_query($conn, $sql_get_idAppointment);
    $rows_get_idAppointment = mysqli_fetch_array($query_get_idAppointment);
    $ID_Appointment = $rows_get_idAppointment['ID_Appointment'];


    $sql = "DELETE FROM `diagnose` WHERE `ID_Diagnose`=$ID_Diagnose";
    $query = mysqli_query($conn, $sql);

    if($query){
        header("location: ./../../index.php?page_layout=checkup&ID_Appointment=$ID_Appointment");
    }
    
?>