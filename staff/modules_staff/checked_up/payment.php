<?php

    $sql_payment = "SELECT presciption.TotalAmount,presciption.BHYT_Pay,presciption.Patient_Pay,presciption.Status_Pay,paymentmethod.Title_PaymentMethod
    FROM presciption RIGHT JOIN appointment ON presciption.ID_Appointment=appointment.ID_Appointment
        LEFT JOIN paymentmethod ON paymentmethod.ID_PaymentMethod=appointment.ID_PaymentMethod
    WHERE appointment.ID_Appointment=$ID_Appointment";
    $query_payment = mysqli_query($conn, $sql_payment);
    $rows_payment = mysqli_fetch_array($query_payment);
?>

<div class="detail-prescription">
    <h1 class="heading-main">Hóa đơn</h1>
    <div class="btn-medicalrecord-containter">
        <a class="btn-medicalrecord" href="./modules_staff/paper/invoice.php?ID_Appointment=<?php echo $ID_Appointment?>" target="_blank"><i class='fas fa-print'></i> In toa thuốc</a>
    </div>
    <div class="detail-prescription-table table-custom">
        <div class="card-body">
            <table class="table">
                <?php
                    $sql_prescriptionRecord = "SELECT * FROM appointment 
                    JOIN medicalrecord ON medicalrecord.ID_Appointment=appointment.ID_Appointment
                    JOIN presciption ON presciption.ID_Appointment=appointment.ID_Appointment
                    WHERE appointment.ID_Appointment=$ID_Appointment";
                    $query_prescriptionRecord = mysqli_query($conn, $sql_prescriptionRecord);
                    $rows_prescriptionRecord = mysqli_fetch_array($query_prescriptionRecord);

                ?>
                <thead class="thead-dark">
                    <tr>
                        <th>Tổng tiền</th>
                        <th>BHYT chi trả</th>
                        <th>Bệnh nhân chi trả</th>
                        <th>Trạng thái</th>
                        <th>Phương thức thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo number_format($rows_payment['TotalAmount']) ?>₫</td>
                        <td><?php echo number_format($rows_payment['BHYT_Pay']) ?>₫</td>
                        <td><?php echo number_format($rows_payment['Patient_Pay']) ?>₫</td>
                        <td><?php echo $rows_payment['Status_Pay'] ?></td>
                        <td><?php echo $rows_payment['Title_PaymentMethod'] ?></td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div> 