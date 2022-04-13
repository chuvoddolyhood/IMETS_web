<?php
    include './../../../config.php';

    if(isset($_GET['ID_Appointment'])){
        $ID_Appointment = $_GET['ID_Appointment'];
        $reasoncheckup = $_GET['reasoncheckup'];
        $bodycheck = $_GET['bodycheck'];
        $bodypartscheck = $_GET['bodypartscheck'];
        // $cls = $_GET['cls'];

        $pulserate = $_GET['pulserate'];
        $temp = $_GET['temp'];
        $bloodpressure = $_GET['bloodpressure'];
        $breathing = $_GET['breathing'];
        $height = $_GET['height'];
        $weight = $_GET['weight'];

        $result = $_GET['result'];
        $dicection = $_GET['dicection'];
        $advice = $_GET['advice'];
        $dateRecheckup = $_GET['dateRecheckup'];


        // echo $reasoncheckup;

        //update Medical Record
        $sql_update_medicalrecord = "UPDATE medicalrecord SET ReasonCheckup='$reasoncheckup', BodyCheck='$bodycheck', BodyPartsCheck='$bodypartscheck', PulseRate='$pulserate', Temp='$temp', BloodPressure='$bloodpressure', Breathing='$breathing', Height='$height', Weight='$weight', Result='$result', TreatmentDirection='$dicection', Advice='$advice' WHERE ID_Appointment=$ID_Appointment";
        $query_update_medicalrecord = mysqli_query($conn, $sql_update_medicalrecord);

        //update dateRecheckup
        $sql_set_dateRecheckup = "UPDATE `appointment` SET `Date_ReCheckup`='$dateRecheckup' WHERE `ID_Appointment`=$ID_Appointment";
        $query_set_dateRecheckup = mysqli_query($conn, $sql_set_dateRecheckup);

        if($query_update_medicalrecord && $query_set_dateRecheckup){
            echo 'Đã lưu';
        } else{
            echo 'Error';
        }
    }
?>