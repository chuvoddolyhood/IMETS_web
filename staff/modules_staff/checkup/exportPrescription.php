<?php
    include './../../../config.php';

    $TotalMoney = $_GET['TotalMoney'];
    $ID_Appointment = $_GET['ID_Appointment'];
    $medicine_time = $_GET['medicine_time'];

    //Create ExDate
    if($medicine_time!=''){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d');
        $time_stamp = strtotime($time);
        $new = $time_stamp + $medicine_time*24*60*60;
        $expDate = date('Y-m-d',$new);
    }else{
        $expDate='';
    }
    // echo $expDate;

    //Check BHYT must pay
    $sql_get_BHYT = "SELECT patient.ID_BHYT
        FROM appointment JOIN patient ON appointment.ID_Patient=patient.ID_Patient
        WHERE appointment.ID_Appointment=$ID_Appointment";
    $query_get_BHYT = mysqli_query($conn, $sql_get_BHYT);
    $rows_get_BHYT = mysqli_fetch_array($query_get_BHYT);
    if($rows_get_BHYT['ID_BHYT']==null){
        $BHYT_pay=0;
    }else{
        $BHYT_ID = $rows_get_BHYT['ID_BHYT'];
        $character_BHYT = substr($BHYT_ID, 2,1);
        if($character_BHYT=='4'){
            $assuranceHealth=0.8;
        }elseif($character_BHYT=='3'){
            $assuranceHealth=0.95;
        }
        // echo $assuranceHealth;
    }

    //Calculate PatientPay
    if($TotalMoney<223000){
        $PatientPays=0;
    } else {
        $PatientPays=$TotalMoney*0.2;
    }
    // echo $PatientPays;

    $Date_HospitalDischarge = date('Y-m-d H:i:s');
    // echo $Darte_HospitalDischarge;

    $sql_add_prescription = "UPDATE presciption SET TotalAmount=$TotalMoney,assuranceHealth=$assuranceHealth,PatientPays=$PatientPays,expDate='$expDate' WHERE ID_Appointment=$ID_Appointment";
    $query_add_prescription = mysqli_query($conn, $sql_add_prescription);

    $sql_update_appointment = "UPDATE appointment SET Date_HospitalDischarge='$Date_HospitalDischarge', StatusAppointment='Đã khám' WHERE ID_Appointment=$ID_Appointment";
    $query_update_appointment = mysqli_query($conn, $sql_update_appointment);

    if($query_add_prescription && $query_update_appointment){
        echo 'Đã xuất hóa đơn';
    } else {
        echo 'Error';
    }
?>