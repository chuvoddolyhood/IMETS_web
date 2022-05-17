<?php
    include './../../config.php';

    $ID_Appointment = $_GET['ID_Appointment'];
    // echo $ID_Appointment;

    //Get ID_Schedule
    $sql_get_IDSchedule = "SELECT `Date_Checkup` FROM appointment WHERE `ID_Appointment`=$ID_Appointment";
	$query_get_IDSchedule = mysqli_query($conn, $sql_get_IDSchedule);
    $rows_get_IDSchedule = mysqli_fetch_array($query_get_IDSchedule);
    $ID_Schedule = $rows_get_IDSchedule["Date_Checkup"];


    $sql_delete_appointment = "DELETE FROM `appointment` WHERE `ID_Appointment`= $ID_Appointment";
    $query_delete_appointment = mysqli_query($conn, $sql_delete_appointment);

    

    $sql_update_statusSchedule = "UPDATE `schedule` SET `status_schedule`='' WHERE `ID_schedule`='$ID_Schedule'";
	$query_update_statusSchedule = mysqli_query($conn, $sql_update_statusSchedule);

    if($query_delete_appointment && $query_update_statusSchedule){
        header("location: ./../../index.php?page_layout=booking");
    }

?>