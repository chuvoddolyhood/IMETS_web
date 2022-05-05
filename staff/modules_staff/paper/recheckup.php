<?php
    include './../../../config.php';

    $ID_Appointment = $_GET['ID_Appointment'];
    $sql_get_prescription = "SELECT * FROM appointment
        JOIN patient ON patient.ID_Patient=appointment.ID_Patient
        JOIN medicalrecord ON medicalrecord.ID_Appointment=appointment.ID_Appointment
        JOIN diagnose ON diagnose.ID_MedicalRecord=medicalrecord.ID_MedicalRecord
        JOIN disease ON disease.ID_Disease=diagnose.ID_Disease
        JOIN presciption ON presciption.ID_Appointment=appointment.ID_Appointment
        JOIN staff ON staff.ID_Staff=appointment.ID_Staff
        JOIN schedule ON schedule.ID_schedule=appointment.Date_Checkup
        WHERE appointment.ID_Appointment=$ID_Appointment";
    $query_get_prescription = mysqli_query($conn, $sql_get_prescription);
    $rows_get_prescription = mysqli_fetch_array($query_get_prescription);

    $query_getDiseases = mysqli_query($conn, $sql_get_prescription);
    $diseases='';
    if(mysqli_num_rows($query_getDiseases)>0){
        while($rows_getDiseases = mysqli_fetch_array($query_getDiseases)){
            $diseases = $diseases.$rows_getDiseases['TitleDisease'].'; ';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giấy tái khám</title>
    <link rel="shortcut icon" type="image/png" href="./../../../img/images/logo.jfif" />
    <link rel="stylesheet" href="prescription.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="logo">
        <img src="./../../../img/images/logo.jfif">
        <div class="logo-info">
            <h3>Bệnh viện IMETS</h3>
            <p>Địa chỉ: Số 24 Nguyễn Tri Phương, P.An Khánh, Q.Ninh Kiều, Tp Cần Thơ</p>
            <p>Điện thoại: 02923.888.999</p>
        </div>
    </div>
    <div class="header">
        <h1 class="title-paper">Giấy tái khám</h1>
        <div>
            <div class="row row-flex">
                <p>Họ và tên: <b><?php echo $rows_get_prescription['Name'] ?></b></p>
                <p>Mã bệnh nhân: <b><?php echo $rows_get_prescription['ID_Patient'] ?></b></p>
                <p>Tuổi: <?php 
                    $date = getdate();
                    $year = $date['year'];
                    echo $year - substr($rows_get_prescription['DOB'],0,4) 
                ?> tuổi</p>
                <p>Cân nặng: <?php 
                    if($rows_get_prescription['Weight']==0){
                        echo '';
                    }else{
                        echo $rows_get_prescription['Weight'].' Kg';
                    }  
                ?></p>
                <p>Giới tính: <?php echo $rows_get_prescription['Sex'] ?></p>
            </div>
            <div class="row">
                <p>Mã số thẻ bảo hiểm y tế (nếu có): <b><?php echo $rows_get_prescription['ID_BHYT'] ?></b></p>
            </div>
            <div class="row">
                <p>Địa chỉ: <?php echo $rows_get_prescription['Address'] ?></p>
            </div>
            <div class="row row-4 row-flex">
                <p>Mã đơn đăng ký khám: <?php echo $rows_get_prescription['ID_Appointment'] ?></p>
                <p>Mã đơn thuốc: <?php echo $rows_get_prescription['ID_Prescription'] ?></p>
            </div>
            <div class="row row-flex">
                <p>Ngày khám bệnh: <?php echo date('H:i:s d/m/Y', strtotime($rows_get_prescription["start"])); ?></p>
                <p>Ngày ra viện: <?php echo date('H:i:s d/m/Y', strtotime($rows_get_prescription["Date_HospitalDischarge"])); ?></p>
            </div>
            <div class="row">
                <p>Chẩn đoán: <?php echo $diseases ?></p>
            </div>
        </div>
        <br>
        <p>Hẹn khám lại vào <b><?php echo date('d/m/Y', strtotime($rows_get_prescription["Date_ReCheckup"])); ?></b> hoặc đến bất kỳ thời gian nào trước ngày được hẹn khám lại nếu có dấu hiệu (triệu chứng) bất thường.</p>
        <p>Giấy hẹn khám lại chỉ có giá trị sử dụng 01 (một) lần trong thời hạn 10 ngày làm việc, kể từ ngày được hẹn khám lại.</p>
        
    </div>
    <div class="after-content">
        <div class="signature">
            <p><b>Bác sĩ/Y sĩ khám bệnh</b></p>
            <p>(Ký/Ghi rõ họ tên)</p>
            <br>
            <br>
            <br>
            <br>
            <p><b><?php echo $rows_get_prescription['Name_Staff'] ?></b></p>
        </div>
        <div class="signature">
            <p><b>Đại diện bệnh viện</b></p>
            <p>(Ký tên, đóng dấu)</p>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
    <div class="footer">
        <p>Khám lại xin mang theo đơn này • IMETS</p> 
    </div>
</body>
</html>