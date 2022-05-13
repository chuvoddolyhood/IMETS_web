<main>
    <div class="container-table">
        <div class="link-nav-pages">
            <a href="">Kiểm tra sự thay đổi bệnh án</a>
        </div>
        <div class="table-header">
            <h1>Danh sách ghi nhận thay đổi bệnh án</h1>
        </div>
        <div class="table-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã thay đổi</th>
                        <th>Mã bệnh án</th>
                        <th>Bệnh nhân</th>
                        <th>Bác sĩ phụ trách</th>
                        <th>Bảng tác động</th>
                        <th>Hành động</th>
                        <th>Thời gian tác động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './../config.php';
                            $sql = "SELECT medicalrecord_log.ID_Log, medicalrecord.ID_MedicalRecord, patient.Name,staff.Name_Staff, medicalrecord_log.AtTable, medicalrecord_log.Operation,medicalrecord_log.UpdateAt
                            FROM medicalrecord_log JOIN appointment ON medicalrecord_log.ID_Appointment=appointment.ID_Appointment
                            JOIN medicalrecord ON medicalrecord.ID_Appointment=appointment.ID_Appointment
                            JOIN staff ON staff.ID_Staff=appointment.ID_Staff
                            JOIN patient ON patient.ID_Patient=appointment.ID_Patient";
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["ID_Log"] ?></td>
                                <td><?php echo $rows["ID_MedicalRecord"] ?></td>
                                <td><?php echo $rows["Name"] ?></td>
                                <td><?php echo $rows["Name_Staff"] ?></td>
                                <td><?php echo $rows["AtTable"] ?></td>
                                <td><?php echo $rows["Operation"] ?></td>
                                <td><?php echo $rows["UpdateAt"] ?></td>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>