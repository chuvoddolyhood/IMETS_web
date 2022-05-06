<?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'dashboard':
                include './modules_admin/dashboard_admin/dashboard_admin.php';
                break;

            case 'staff_management':
                include './modules_admin/staff_management/list_staffManagement.php';
                break;

            case 'staff_detail':
                include './modules_admin/staff_management/detail_staffManagement.php';
                break;

            case 'modifyStaff': //Chinh sua thong tin nhan vien
                include './modules_admin/staff_management/modify_staff.php';
                break;

            case 'statistics_management':
                include './modules_admin/statistics_management/statistics.php';
                break;

            case 'list_patientManagement':
                include './modules_admin/patient_management/list_patientManagement.php';
                break;
            
            case 'patient_management':
                include './modules_admin/patient_management/patientManagement.php';
                break;

            case 'room_management':
                include './modules_admin/room_management/list_room.php';
                break;
            
            case 'detailDateWorking':
                include './modules_admin/room_management/detailDateWorking.php';
                break;
            }
    }else {
        include './modules_admin/dashboard_admin/dashboard_admin.php';
    }
?>