<?php
    //Chia luồng
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'doctors': //danh sách bac si
                include './modules_client/doctors/list_doctors.php';
                break;
            case 'detail_doctors': 
                include './modules_client/doctors/detail_doctors.php';
                break;
            case 'clipboard':
                include './modules_client/doctors/clipboard.php';
                break;
            case 'profile':
                include './modules_client/profile/profile.php';
                break;
            
        }
    }else {
        include './modules_client/main/homepage.php';
    }
?>