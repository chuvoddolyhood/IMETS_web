<?php
    include './../../../config.php';

    if(isset($_POST['update_btn'])){
        $ID_Appointment = $_POST['ID_Appointment'];

        $reasoncheckup = $_POST['reasoncheckup'];
        $bodycheck = $_POST['bodycheck'];
        $bodypartscheck = $_POST['bodypartscheck'];
        $pulserate = $_POST['pulserate'];
        $temp = $_POST['temp'];
        $bloodpressure = $_POST['bloodpressure'];
        $breathing = $_POST['breathing'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $result = $_POST['result'];
        $direction = $_POST['direction'];
        $advice = $_POST['advice'];

        $dateRecheckup = $_POST['dateRecheckup'];
        
        $sql_update = "UPDATE medicalrecord SET ReasonCheckup='$reasoncheckup',BodyCheck='$bodycheck',BodyPartsCheck='$bodypartscheck',PulseRate='$pulserate',Temp='$temp',BloodPressure='$bloodpressure',Breathing='$breathing',Height='$height',Weight='$weight',Result='$result',TreatmentDirection='$direction',Advice='$advice' WHERE ID_Appointment=$ID_Appointment";
        $query_update = mysqli_query($conn, $sql_update);

        
    }
?>