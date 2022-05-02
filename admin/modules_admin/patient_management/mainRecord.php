<?php
    if(isset($_GET['record'])){
        switch ($_GET['record']) {
            case 'diagnose':
                include './modules_admin/patient_management/diagnoseRecord.php';
                break;

            case 'prescription':
                include './modules_admin/patient_management/prescriptionRecord.php';
                break;

            case 'recheckup':
                include './modules_admin/patient_management/recheckupPaper.php';
                break;

            case 'payment':
                include './modules_admin/patient_management/payment.php';
                break;
            }
    }else {
        include './modules_admin/patient_management/diagnoseRecord.php';
    }
?>