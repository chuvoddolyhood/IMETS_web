<?php
    include './../../../config.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $TotalMoney = $_GET['TotalMoney'];
    $ID_Appointment = $_GET['ID_Appointment'];
    $medicine_time = $_GET['medicine_time'];

    //Create ExDate
    if($medicine_time!=''){
        $time = date('Y-m-d');
        $time_stamp = strtotime($time);
        $new = $time_stamp + $medicine_time*24*60*60;
        $expDate = date('Y-m-d',$new);
    }else{
        $expDate='';
    }
    // echo $expDate;

    //Check BHYT must pay
    $sql_get_BHYT = "SELECT BHYT_Checkin FROM appointment 
        JOIN presciption ON appointment.ID_Appointment=presciption.ID_Appointment 
        WHERE appointment.ID_Appointment=$ID_Appointment";
    $query_get_BHYT = mysqli_query($conn, $sql_get_BHYT);
    $rows_get_BHYT = mysqli_fetch_array($query_get_BHYT);
    $BHYT_Checkin = $rows_get_BHYT['BHYT_Checkin'];
    
    // echo $BHYT_Checkin;

    //Calculate PatientPay
    if($TotalMoney<223000){
        $BHYT_Pay = $TotalMoney;
        $Patient_Pay = $TotalMoney - $BHYT_Pay;
    } else {
        $BHYT_Pay = $TotalMoney*$BHYT_Checkin;
        $Patient_Pay = $TotalMoney - $BHYT_Pay;
    }
    // echo $BHYT_Pay;

    $Date_HospitalDischarge = date('Y-m-d H:i:s');
    // echo $Darte_HospitalDischarge;

    $sql_add_prescription = "UPDATE presciption SET TotalAmount=$TotalMoney,BHYT_Pay=$BHYT_Pay,Patient_Pay=$Patient_Pay,expDate='$expDate' WHERE ID_Appointment=$ID_Appointment";
    $query_add_prescription = mysqli_query($conn, $sql_add_prescription);

    $sql_update_appointment = "UPDATE appointment SET Date_HospitalDischarge='$Date_HospitalDischarge', StatusAppointment='Đã khám' WHERE ID_Appointment=$ID_Appointment";
    $query_update_appointment = mysqli_query($conn, $sql_update_appointment);

    if($query_add_prescription && $query_update_appointment){
        echo 'Đã xuất hóa đơn';
    } else {
        echo 'Error';
    }
?>