<div class="detail-prescription">
    <h1 class="heading-main">Chi tiết thuốc - vật tư</h1>
    <div class="btn-medicalrecord-containter">
        <a class="btn-medicalrecord" href="index.php?page_layout=checkup&ID_Appointment=<?php echo $ID_Appointment?>"><i class='fas fa-edit'></i> Chỉnh sửa</a>
        <a class="btn-medicalrecord" href="./modules_staff/paper/prescription.php?ID_Appointment=<?php echo $ID_Appointment?>" target="_blank"><i class='fas fa-print'></i> In toa thuốc</a>
    </div>
    
    <div class="detail-prescription-table table-custom">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Tên thuốc - vật tư</th>
                        <th>Đơn vị</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql_get_medicineChoose = "SELECT * 
                            FROM medicinesfortreatment JOIN presciption ON medicinesfortreatment.ID_Prescription=presciption.ID_Prescription
                            JOIN medicine ON medicinesfortreatment.ID_Medicine=medicine.ID_Medicine
                            WHERE presciption.ID_Appointment=$ID_Appointment";
                        $query_get_medicineChoose = mysqli_query($conn, $sql_get_medicineChoose);
                        $stt=0;
                        $sumMoney=0;
                        while($rows_get_medicineChoose = mysqli_fetch_array($query_get_medicineChoose)){?>
                    <tr>
                    <td><?php echo ++$stt?></td>
                    <td><?php echo $rows_get_medicineChoose['TitleMedicine'] ?></td>
                    <td><?php echo $rows_get_medicineChoose['Type'] ?></td>
                    <td><?php echo $rows_get_medicineChoose['Amount'] ?></td>
                    <td><?php echo  number_format($rows_get_medicineChoose['UnitPrice']) ?></td>
                        <td><?php 
                            echo  number_format($rows_get_medicineChoose['TotalMoney']);
                            $sumMoney=$sumMoney+$rows_get_medicineChoose['TotalMoney'];
                        ?></td>
                    </tr>
                    <?php } ?>
                </thead>
            </table>
        </div>
    </div>
    <div class="totalMoney">
        <h4>Tổng tiền: <?php echo  number_format($sumMoney) ?>₫</h4>
    </div>
</div> 