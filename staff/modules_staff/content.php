<?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'dashboard':
                include './modules_staff/dashboard_staff/dashboard_staff.php';
                break;

            case 'bookingSche':
                include './modules_staff/schedule/bookingSche.php';
                break;

            }
    }else {
        include './modules_staff/dashboard_staff/dashboard_staff.php';
    }
?>