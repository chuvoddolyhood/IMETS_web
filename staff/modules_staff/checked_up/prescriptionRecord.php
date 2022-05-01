<div class="detail-prescription">
    <h1 class="heading-main">Chi tiết thuốc - vật tư</h1>
    <a href="index.php?page_layout=checkup&ID_Appointment=40">sua</a>
    <div class="detail-prescription-table">
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
                    <td><?php echo $rows_get_medicineChoose['UnitPrice'] ?></td>
                        <td><?php 
                            echo $rows_get_medicineChoose['TotalMoney'];
                            $sumMoney=$sumMoney+$rows_get_medicineChoose['TotalMoney'];
                        ?></td>
                    </tr>
                    <?php } ?>
                </thead>
            </table>
        </div>
    </div>
    <div class="totalMoney">
        <h4>Tổng tiền:</h4>
        <p id="TotalMoney"><?php echo $sumMoney ?></p>
    </div>
</div> 