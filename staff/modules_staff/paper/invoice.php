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
    <title>Hóa đơn</title>
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
        <h2 class="title-paper">bảng kê chi phí khám bệnh, chữa bệnh ngoại trú</h2>
        <p class="BHYT">Mức hưởng <?php echo $rows_get_prescription['BHYT_Checkin']*100 ?>%</p>
        <div>
            <p><b>I - Hành chính</b></p>
            <div class="row row-1 row-flex">
                <p>Họ và tên: <b><?php echo $rows_get_prescription['Name'] ?></b></p>
                <p>Mã bệnh nhân: <b><?php echo $rows_get_prescription['ID_Patient'] ?></b></p>
                <p>Năm sinh: <?php echo date('d/m/Y', strtotime($rows_get_prescription["DOB"])); ?></p>
                <p>Giới tính: <?php echo $rows_get_prescription['Sex'] ?></p>
            </div>
            <div class="row row-2">
                <p>Mã số thẻ bảo hiểm y tế (nếu có): <b><?php echo $rows_get_prescription['ID_BHYT'] ?></b></p>
            </div>
            <div class="row row-3">
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
            <div class="row row-5">
                <p>Chẩn đoán: <?php echo $diseases ?></p>
            </div>
        </div>
        <br>
        <p><b>II - Chi phí khám, điều trị</b></p>
        <table >
            <tr>
                <th>STT</th>
                <th>Nội dung</th>
                <th>Đơn vị</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            <?php
                $sql_get_prescriptionList = "SELECT * FROM appointment
                JOIN presciption ON presciption.ID_Appointment=appointment.ID_Appointment
                JOIN medicinesfortreatment ON medicinesfortreatment.ID_Prescription=presciption.ID_Prescription
                JOIN medicine ON medicine.ID_Medicine=medicinesfortreatment.ID_Medicine
                WHERE appointment.ID_Appointment=$ID_Appointment";
                $query_getPrescriptionList = mysqli_query($conn, $sql_get_prescriptionList);
                $count=0;
                $totalmoney=0;
                while($rows_getPrescriptionList = mysqli_fetch_array($query_getPrescriptionList)){
            ?>
            <tr>
                <td> <?php echo ++$count ?> </td>
                <td> <?php echo $rows_getPrescriptionList['TitleMedicine'] ?> </td>
                <td> <?php echo $rows_getPrescriptionList['Type'] ?> </td>
                <td> <?php echo $rows_getPrescriptionList['Amount'] ?> </td>
                <td> <?php echo $rows_getPrescriptionList['UnitPrice'] ?> </td>
                <td> <?php $totalmoney=$totalmoney+$rows_getPrescriptionList['TotalMoney']; echo $rows_getPrescriptionList['TotalMoney'] ?> </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan=5>Tổng cộng:</td>
                <td><?php echo $totalmoney ?></td>
            </tr>
        </table>
        <?php  
            $query_getPayment = mysqli_query($conn, $sql_get_prescriptionList);
            $rows_getPayment = mysqli_fetch_array($query_getPayment);
        ?>
        <p>Tổng chi phí khám bệnh, chữa bệnh: <?php echo $rows_getPayment['TotalAmount'] ?>₫</p>
        <p>Số tiền quỹ BHYT thanh toán: <?php echo $rows_getPayment['BHYT_Pay'] ?>₫</p>
        <p>Bệnh nhân chi trả: <?php echo $rows_getPayment['Patient_Pay'] ?>₫</p>
    </div>
    <div class="after-content">
        <div class="signature">
            <p><b>Người lập bản kê</b></p>
            <p>(Ký/Ghi rõ họ tên)</p>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="signature">
            <p><b>Kế toán bệnh viện</b></p>
            <p>(Ký/Ghi rõ họ tên)</p>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="signature">
            <p><b>Xác nhận của người bệnh</b></p>
            <p>(Ký/Ghi rõ họ tên)</p>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="signature">
            <p><b>Giám định BHYT</b></p>
            <p>(Ký/Ghi rõ họ tên)</p>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</body>
</html>