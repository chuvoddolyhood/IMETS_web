<?php
    include './../../config.php';
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    $time = $_GET['time'];
    $date = $_GET['date'];
    $ID_Staff = $_GET['ID_Staff'];
    $session_client = $_GET['session_client'];
    // echo $ID_Staff;

    //Lay ID_Schedule
    $sql_get_IDSchedule = "SELECT ID_schedule FROM `schedule` WHERE DateWorking='$date' AND TimeStart='$time'";
	$query_get_IDSchedule = mysqli_query($conn, $sql_get_IDSchedule);
    $rows_get_IDSchedule = mysqli_fetch_array($query_get_IDSchedule);
    $ID_Schedule = $rows_get_IDSchedule["ID_schedule"];
    // echo $ID_Schedule;

    // =======Xu ly Date_Booking============
    $today = date("Y-m-d H:i:s");
    // echo $today;


    // ========Lấy ID_Patient========
    $sql_get_ID_Patient = "SELECT ID_Patient FROM `patient` WHERE UserName='$session_client'";
	$query_get_ID_Patient = mysqli_query($conn, $sql_get_ID_Patient);
    $rows_get_ID_Patient = mysqli_fetch_array($query_get_ID_Patient);
    $ID_Patient = $rows_get_ID_Patient["ID_Patient"];
    // echo $ID_Patient;

    
    
    $sql_add_appointment = "INSERT INTO appointment(`ID_Staff`, `ID_Patient`, `Date_Booking`, `Date_Checkup`) 
        VALUES ($ID_Staff,$ID_Patient,'$today','$ID_Schedule')";
	$query_add_appointment = mysqli_query($conn, $sql_add_appointment);
    echo 'thanh cong';

?>