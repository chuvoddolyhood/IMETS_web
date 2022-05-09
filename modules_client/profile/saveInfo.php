<?php
    include './../../config.php';
    
    $email_profile = $_GET['email_profile'];
    $name_profile = $_GET['name_profile'];
    $phoneNumber_profile = $_GET['phoneNumber_profile'];
    $date_profile = $_GET['date_profile'];
    $address_profile = $_GET['address_profile'];
    $BHYT_profile = $_GET['BHYT_profile'];
    $CMND_profile = $_GET['CMND_profile'];
    $sex_profile = $_GET['sex_profile'];

    // echo $email_profile;

    $sql_update_patient="UPDATE patient SET Name='$name_profile',`DOB`='$date_profile',`Sex`='$sex_profile',`Address`='$address_profile',`CMND`='$CMND_profile',`PhoneNumber`='$phoneNumber_profile',`ID_BHYT`='$BHYT_profile' WHERE `UserName`='$email_profile'";
    $query_update_patient = mysqli_query($conn, $sql_update_patient);

    if($query_update_patient){
        echo 'true';
    } else {
        echo 'false';
    }

?>