<?php
    $sql_prescriptionRecord = "SELECT * FROM appointment 
                    JOIN medicalrecord ON medicalrecord.ID_Appointment=appointment.ID_Appointment
                    JOIN presciption ON presciption.ID_Appointment=appointment.ID_Appointment
                    WHERE appointment.ID_Appointment=$ID_Appointment";
    $query_prescriptionRecord = mysqli_query($conn, $sql_prescriptionRecord);
    $rows_prescriptionRecord = mysqli_fetch_array($query_prescriptionRecord);
?>

<div class="detail-prescription">
    <h1 class="heading-main">Ngày tái khám</h1>
    <?php 
        if($rows_prescriptionRecord['Date_ReCheckup']!=''){?>
        <a href="./modules_staff/paper/recheckup.php?ID_Appointment=<?php echo $ID_Appointment?>" target="_blank">Xem</a>
    <?php } ?>
    <div class="detail-prescription-table table-custom">
        <div class="card-body">
            <table class="table">
                
                <thead class="thead-dark">
                    <tr>
                        <th>Ngày tái khám</th>
                        <th>Thời gian dùng toa đến</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $rows_prescriptionRecord['Date_ReCheckup'] ?></td>
                        <td><?php echo $rows_prescriptionRecord['expDate'] ?></td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div> 