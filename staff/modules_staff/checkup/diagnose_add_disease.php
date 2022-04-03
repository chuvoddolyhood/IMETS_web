<?php
    include './../../../config.php';

    $id_disease = $_GET['id_disease'];
    $ID_Appointment = $_GET['ID_Appointment'];

    // echo $id_disease;
    // echo $ID_Appointment;

    //Get ID_MedicalRecord
    $sql_get_idMedicalRecord = "SELECT * FROM medicalrecord WHERE ID_Appointment=$ID_Appointment";
    $query_get_idMedicalRecord = mysqli_query($conn, $sql_get_idMedicalRecord);
    $rows_get_idMedicalRecord = mysqli_fetch_array($query_get_idMedicalRecord);
    $ID_MedicalRecord = $rows_get_idMedicalRecord['ID_MedicalRecord'];

    $sql = "INSERT INTO diagnose(ID_Disease, ID_MedicalRecord) VALUES ($id_disease,$ID_MedicalRecord)";
    $query = mysqli_query($conn, $sql);

    if($query){
        header("location: ./../../index.php?page_layout=checkup&ID_Appointment=$ID_Appointment");
    }
    
?>