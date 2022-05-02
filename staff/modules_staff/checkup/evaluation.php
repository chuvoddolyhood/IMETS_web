<?php
    include './../../../config.php';
    
    if(isset($_POST['evaluation_btn'])){
        $DoctorComment = $_POST['myTextarea'];
        $votingRate = $_POST['votingRate'];
        $ID_Appointment = $_POST['ID_Appointment'];

        // echo $myTextarea;
        // echo $votingRate;
        // echo $ID_Appointment;

        $sql_update_evaluation = "UPDATE evaluation SET PatientStar=$votingRate,`DoctorComment`='$DoctorComment' WHERE ID_Appointment=$ID_Appointment";
        $query_update_evaluation = mysqli_query($conn, $sql_update_evaluation);

        //get ID_Patient form ID_Appointment
        $sql_get_ID_Patient = "SELECT ID_Patient FROM appointment WHERE ID_Appointment=$ID_Appointment";
        $query_get_ID_Patient = mysqli_query($conn, $sql_get_ID_Patient);
        $rows_get_ID_Patient = mysqli_fetch_array($query_get_ID_Patient);
        $ID_Patient = $rows_get_ID_Patient['ID_Patient'];

        
        $sql_get_evaluation = "SELECT evaluation.PatientStar
            FROM evaluation JOIN appointment ON evaluation.ID_Appointment=appointment.ID_Appointment
            WHERE appointment.ID_Patient=$ID_Patient";
        $query_get_evaluation = mysqli_query($conn, $sql_get_evaluation);
        $count=0;
        $sumRate=0;
        $voteRatePatient=0;
        while($rows_get_evaluation = mysqli_fetch_array($query_get_evaluation)){
            if($rows_get_evaluation['PatientStar']!=''){
                ++$count;
                $sumRate = $sumRate + $rows_get_evaluation['PatientStar'];
            }
            $voteRatePatient = (double)$sumRate/$count;
        }

        $sql_update_evaluationPatient = "UPDATE patient SET VoteRate=$voteRatePatient WHERE ID_Patient=$ID_Patient";
        $query_update_evaluationPatient = mysqli_query($conn, $sql_update_evaluationPatient);

    
        if($query_update_evaluation && $query_update_evaluationPatient){
            header('location: ./../../index.php?page_layout=list_patient');
        }
    }
?>