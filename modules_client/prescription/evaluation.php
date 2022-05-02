<?php
    include './../../config.php';
    
    if(isset($_POST['evaluation_btn'])){
        $PatientComment = $_POST['myTextarea'];
        $DoctorStar = $_POST['votingRate'];
        $ID_Appointment = $_POST['ID_Appointment'];

        // echo $PatientComment;
        // echo $DoctorStar;
        // echo $ID_Appointment;

        $sql_update_evaluation = "UPDATE evaluation SET DoctorStar=$DoctorStar,`PatientComment`='$PatientComment' WHERE ID_Appointment=$ID_Appointment";
        $query_update_evaluation = mysqli_query($conn, $sql_update_evaluation);

        //get ID_Patient form ID_Appointment
        $sql_get_ID_Staff = "SELECT ID_Staff FROM appointment WHERE ID_Appointment=$ID_Appointment";
        $query_get_ID_Staff = mysqli_query($conn, $sql_get_ID_Staff);
        $rows_get_ID_Staff = mysqli_fetch_array($query_get_ID_Staff);
        $ID_Staff = $rows_get_ID_Staff['ID_Staff'];

        
        $sql_get_evaluation = "SELECT evaluation.DoctorStar
            FROM evaluation JOIN appointment ON evaluation.ID_Appointment=appointment.ID_Appointment
            WHERE appointment.ID_Staff=$ID_Staff";
        $query_get_evaluation = mysqli_query($conn, $sql_get_evaluation);
        $count=0;
        $sumRate=0;
        $voteRateDoctor=0;
        while($rows_get_evaluation = mysqli_fetch_array($query_get_evaluation)){
            if($rows_get_evaluation['DoctorStar']!=''){
                ++$count;
                $sumRate = $sumRate + $rows_get_evaluation['DoctorStar'];
            }
            $voteRateDoctor = (double)$sumRate/$count;
        }

        $sql_update_evaluationStaff = "UPDATE staff SET VoteRate=$voteRateDoctor WHERE ID_Staff=$ID_Staff";
        $query_update_evaluationStaff = mysqli_query($conn, $sql_update_evaluationStaff);
    
        if($query_update_evaluation && $query_update_evaluationStaff){
            header('location: ./../../index.php?page_layout=medicalBook');
        }
    }
?>