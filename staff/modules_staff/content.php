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
            }
    }else {
        include './modules_staff/dashboard_staff/dashboard_staff.php';
    }
?>