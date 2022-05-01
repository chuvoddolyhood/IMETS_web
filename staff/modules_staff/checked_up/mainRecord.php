<?php
    if(isset($_GET['record'])){
        switch ($_GET['record']) {
            case 'diagnose':
                include './modules_staff/checked_up/diagnoseRecord.php';
                break;

            case 'prescription':
                include './modules_staff/checked_up/prescriptionRecord.php';
                break;

            case 'recheckup':
                include './modules_staff/checked_up/recheckupPaper.php';
                break;
            
            }
    }else {
        include './modules_staff/checked_up/diagnoseRecord.php';
    }
?>