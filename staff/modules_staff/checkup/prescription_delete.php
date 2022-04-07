<?php
    include './../../../config.php';

    $ID_Medicine = $_GET['ID_Medicine'];
    $ID_Appointment = $_GET['ID_Appointment'];

    // echo $ID_Medicine;
    // echo $ID_Appointment;

    //Get ID_Prescription
    $sql_get_idPrescript = "SELECT * FROM `presciption` WHERE ID_Appointment=$ID_Appointment";
    $query_get_idPrescript = mysqli_query($conn, $sql_get_idPrescript);
    $rows_get_idPrescript = mysqli_fetch_array($query_get_idPrescript);
    $ID_Prescription = $rows_get_idPrescript['ID_Prescription'];


    $sql = "DELETE FROM `medicinesfortreatment` WHERE ID_Prescription=$ID_Prescription AND `ID_Medicine`=$ID_Medicine";
    $query = mysqli_query($conn, $sql);

    if($query){
        header("location: ./../../index.php?page_layout=checkup&ID_Appointment=$ID_Appointment");
    }
    
?>