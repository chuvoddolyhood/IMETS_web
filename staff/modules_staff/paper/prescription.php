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
    <title>Đơn thuốc</title>
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
        <h1 class="title-paper">đơn thuốc</h1>
        <div>
            <div class="row row-1 row-flex">
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
            <div class="row row-5">
                <p>Chẩn đoán: <?php echo $diseases ?></p>
            </div>
        </div>
        <br>
        <table >
            <tr>
                <th>STT</th>
                <th>Tên thuốc</th>
                <th>Số lượng</th>
                <th>Đơn vị</th>
                <th>Cách dùng</th>
                <th>Sáng</th>
                <th>Chiều</th>
                <th>Tối</th>
            </tr>
            <?php
                $sql_get_prescriptionList = "SELECT * FROM appointment
                JOIN presciption ON presciption.ID_Appointment=appointment.ID_Appointment
                JOIN medicinesfortreatment ON medicinesfortreatment.ID_Prescription=presciption.ID_Prescription
                JOIN medicine ON medicine.ID_Medicine=medicinesfortreatment.ID_Medicine
                WHERE appointment.ID_Appointment=$ID_Appointment";
                $query_getPrescriptionList = mysqli_query($conn, $sql_get_prescriptionList);
                $count=0;
                while($rows_getPrescriptionList = mysqli_fetch_array($query_getPrescriptionList)){
            ?>
            <tr>
                <td> <?php echo ++$count ?> </td>
                <td> <?php echo $rows_getPrescriptionList['TitleMedicine'] ?> </td>
                <td> <?php echo $rows_getPrescriptionList['Amount'] ?> </td>
                <td> <?php echo $rows_getPrescriptionList['Type'] ?> </td>
                <td> <?php echo $rows_getPrescriptionList['DescriptionTreatment'] ?> </td>
                <td> <?php if($rows_getPrescriptionList['Morning'] == 1){ ?> 
                    <i class="fas fa-pills"><?php } ?>
                </td>
                <td> <?php if($rows_getPrescriptionList['Afternoon'] == 1){ ?> 
                    <i class="fas fa-pills"><?php } ?>
                </td>
                <td> <?php if($rows_getPrescriptionList['Evening'] == 1){ ?> 
                    <i class="fas fa-pills"><?php } ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <div class="after-content">
        <div class="notice">
            <div>
                <h3>Lời dặn</h3>
                <p><?php if($rows_get_prescription['Advice']==''){
                    echo '';
                }else{echo $rows_get_prescription['Advice'];} ?></p>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div>
                <p>Thời gian dùng toa tới ngày: <?php if($rows_get_prescription['expDate']==''){
                    echo '';
                }else{echo date('d/m/Y', strtotime($rows_get_prescription["expDate"]));} ?></p>
                <p>Ngày tái khám: <?php if($rows_get_prescription['Date_ReCheckup']==''){
                    echo '';
                }else if ($rows_get_prescription['Date_ReCheckup']=='0000-00-00'){
                    echo '';
                }else{echo date('d/m/Y', strtotime($rows_get_prescription["Date_ReCheckup"]));} ?></p>
            </div>
        </div>
        <div class="signature">
            <p><b>Bác sĩ/Y sĩ khám bệnh</b></p>
            <p>(Ký/Ghi rõ họ tên)</p>
            <br>
            <br>
            <br>
            <br>
            <p><b><?php echo $rows_get_prescription['Name_Staff'] ?></b></p>
        </div>
    </div>
    <div class="footer">
        <p>Khám lại xin mang theo đơn này • IMETS</p> 
    </div>
</body>
</html>