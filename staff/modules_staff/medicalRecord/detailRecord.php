<?php
    if(isset($_GET['ID_Appointment'])){
        $ID_Appointment = $_GET['ID_Appointment'];
        $ID_Patient = $_GET['ID_Patient'];

        $sql_medicalRecord = "SELECT * FROM appointment 
            JOIN medicalrecord ON medicalrecord.ID_Appointment=appointment.ID_Appointment
            JOIN diagnose ON diagnose.ID_MedicalRecord=medicalrecord.ID_MedicalRecord
            JOIN disease ON disease.ID_Disease=diagnose.ID_Disease
            JOIN staff ON staff.ID_Staff=appointment.ID_Staff
            WHERE appointment.ID_Appointment=$ID_Appointment";
        $query_medicalRecord = mysqli_query($conn, $sql_medicalRecord);
        $rows_medicalRecord = mysqli_fetch_array($query_medicalRecord);


        $query_getDiseases = mysqli_query($conn, $sql_medicalRecord);
        $diseases='';
        if(mysqli_num_rows($query_medicalRecord)>0){
            while($rows_getDiseases = mysqli_fetch_array($query_getDiseases)){
                $diseases = $diseases.$rows_getDiseases['TitleDisease'].'; ';
                // echo $diseases;
            }
        }        
?>

    <div class="detail_record">
        <h3>Chi tiết hồ sơ</h3>
        <table class="personalInfoTable recordTable">
            <tr>
                <th>Khám bệnh</th>
                <td><?php echo $ID_Appointment ?></td>
                <td><?php echo $rows_medicalRecord['Name_Staff'] ?></td>
                <td><?php echo $diseases ?></td>
                <td></td>
            </tr>
            <tr>
                <th>Hồ sơ</th>
                <td><a href="./index.php?page_layout=medicalRecord&ID_Patient=<?php echo $ID_Patient ?>&ID_Appointment=<?php echo $ID_Appointment?>&record=diagnose">Chẩn đoán</a></td>
                <td><a href="./index.php?page_layout=medicalRecord&ID_Patient=<?php echo $ID_Patient ?>&ID_Appointment=<?php echo $ID_Appointment?>&record=prescription">Đơn thuốc</a></td>
                <td><a href="./index.php?page_layout=medicalRecord&ID_Patient=<?php echo $ID_Patient ?>&ID_Appointment=<?php echo $ID_Appointment?>&record=recheckup">Giấy hẹn</a></td>
            </tr>
            <tr>
                <th>Tổng hợp chi phí</th>
                <td><a href="./index.php?page_layout=medicalRecord&ID_Patient=<?php echo $ID_Patient ?>&ID_Appointment=<?php echo $ID_Appointment?>&record=payment">Hóa đơn</a></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <?php include './modules_staff/medicalRecord/mainRecord.php'; ?>
        </div>
        <?php }else {?>
    <div class="detail_record">
        <h3>Chi tiết hồ sơ</h3>
    </div>
<?php }?>