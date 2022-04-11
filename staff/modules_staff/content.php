<?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'dashboard':
                include './modules_staff/dashboard_staff/dashboard_staff.php';
                break;

            case 'bookingSche':
                include './modules_staff/schedule/bookingSche.php';
                break;

            case 'list_patient':
                include './modules_staff/checkup/list_patient.php';
                break;
                
            case 'checkup':
                include './modules_staff/checkup/checkup.php';
                break;

            case 'list_checked_up':
                include './modules_staff/checked_up/list_checked_up.php';
                break;

            case 'checked_up': //Benh nhan da kham -> cap nhat benh an
                include './modules_staff/checked_up/checked_up.php';
                break;
                
            case 'medicalRecord': //Benh an dien tu
                include './modules_staff/medicalRecord/medicalRecord.php';
                break;
            }
    }else {
        include './modules_staff/dashboard_staff/dashboard_staff.php';
    }
?>