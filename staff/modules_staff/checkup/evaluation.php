<?php
    include './../../../config.php';
    
    if(isset($_POST['evaluation_btn'])){
        $DoctorComment = $_POST['myTextarea'];
        $votingRate = $_POST['votingRate'];
        $ID_Appointment = $_POST['ID_Appointment'];

        // echo $myTextarea;
        // echo $votingRate;
        // echo $ID_Appointment;

        $sql_update_evaluation = "UPDATE evaluation SET PatientStart=$votingRate,`DoctorComment`='$DoctorComment' WHERE ID_Appointment=$ID_Appointment";
        $query_update_evaluation = mysqli_query($conn, $sql_update_evaluation);
    
        if($query_update_evaluation){
            header('location: ./../../index.php?page_layout=list_patient');
        }
    }
?>