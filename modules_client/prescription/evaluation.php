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
    
        if($query_update_evaluation){
            header('location: ./../../index.php?page_layout=medicalBook');
        }
    }
?>