<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="">Bệnh nhân đã khám</a>
            </div>
            <div class="card-header">
                <h2>Danh sách bệnh nhân đã khám</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>MSBN</th>
                            <th>Tên bệnh nhân</th>
                            <th>Năm sinh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>CMND</th>
                            <th>BHYT</th>
                            <th>Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                include './../config.php';
                                $sql = "SELECT DISTINCT patient.ID_Patient,patient.Name,patient.DOB,patient.Address,patient.PhoneNumber,patient.CMND, patient.ID_BHYT
                                FROM appointment 
                                JOIN patient ON appointment.ID_Patient=patient.ID_Patient 
                                WHERE appointment.StatusAppointment='Đã khám'
                                ORDER BY ID_Patient ASC";
                                $count_order=0;
                                $query = mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($query)){ ?>
                                <tr>
                                    <td><?php echo $rows["ID_Patient"] ?></td>
                                    <td><?php echo $rows["Name"] ?></td>
                                    <td><?php echo $rows["DOB"] ?></td>
                                    <td><?php echo $rows["Address"] ?></td>
                                    <td><?php echo $rows["PhoneNumber"] ?></td>
                                    <td><?php echo $rows["CMND"] ?></td>
                                    <td><?php echo $rows["ID_BHYT"] ?></td>
                                    <td>
                                        <a href="./index.php?page_layout=checked_up&ID_Patient=<?php echo $rows["ID_Patient"] ?>" style="background-color: green;color: white;padding: 8px 10px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                            Xem
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
                <p><b><?php echo 'Tổng bệnh nhân: '. $count_order;?></b></p>
            </div>
        </div>
    </div>
</main>