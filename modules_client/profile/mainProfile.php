<?php
    if(isset($_GET['category'])){
        switch ($_GET['category']) {
            case 'personalInfo':
                include './modules_client/profile/profileForm.php';
                break;

            case 'password':
                include './modules_client/profile/passwordForm.php';
                break;
            }
    }else {
        include './modules_client/profile/profileForm.php';
    }
?>