<?php
    include './../../../config.php';

    $ID_Appointment = $_GET['ID_Appointment'];

    //Update status for appointment
    $sql_set_status = "UPDATE `appointment` SET `StatusAppointment`='Nhận bệnh' WHERE `ID_Appointment`=$ID_Appointment";
    $query_set_status = mysqli_query($conn, $sql_set_status);

    //Create medicalrecord follow its appointment
    $sql_create_medicalRecord = "INSERT INTO `medicalrecord`(ID_Appointment) VALUES ($ID_Appointment)";
    $query_create_medicalRecord = mysqli_query($conn, $sql_create_medicalRecord);

    //Create prescription follow its appointment
    $sql_create_prescription = "INSERT INTO presciption(ID_Appointment) VALUES ($ID_Appointment)";
    $query_create_prescription = mysqli_query($conn, $sql_create_prescription);

    if($query_set_status && $query_create_medicalRecord && $query_create_prescription){
        echo "true";
        // header("location: ./../../index.php?page_layout=checkup&ID_Appointment=$ID_Appointment");
    } else {
        echo "Error";
    }
?>