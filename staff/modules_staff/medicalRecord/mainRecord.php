<?php
    if(isset($_GET['record'])){
        switch ($_GET['record']) {
            case 'diagnose':
                include './modules_staff/medicalRecord/diagnoseRecord.php';
                break;

            case 'prescription':
                include './modules_staff/medicalRecord/prescriptionRecord.php';
                break;

            case 'recheckup':
                include './modules_staff/medicalRecord/recheckupPaper.php';
                break;

            case 'payment':
                include './modules_staff/medicalRecord/payment.php';
                break;
            }
    }else {
        include './modules_staff/medicalRecord/diagnoseRecord.php';
    }
?>