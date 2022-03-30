<?php
    include './../config.php';
    $sql = "SELECT * FROM appointment 
            JOIN patient ON appointment.ID_Patient=patient.ID_Patient 
            JOIN schedule ON schedule.ID_schedule=appointment.Date_Checkup";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);
?>

<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="./index.php?page_layout=list_patient">Danh sách chờ khám</a> /
                <a href="">Phiếu khám</a>
            </div>
        </div>
        <div class="content-checkup">
            <div class="card-body">
                <div class="card-header">
                    <h2>Bệnh nhân <?php echo $rows["Name"] ?></h2>
                </div>
                <div class="card-body">
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên bệnh nhân</th>
                                <th>Thời gian hẹn</th>
                                <th>Số phiếu</th>
                                <th>Năm sinh</th>
                                <th>Giới tính</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>CMND</th>
                                <th>BHYT</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $rows["Name"] ?></td>
                                <td><?php echo $rows["start"] ?></td>
                                <td><?php echo $rows["ID_Appointment"] ?></td>
                                <td><?php echo $rows["DOB"] ?></td>
                                <td><?php echo $rows["Sex"] ?></td>
                                <td><?php echo $rows["Address"] ?></td>
                                <td><?php echo $rows["PhoneNumber"] ?></td>
                                <td><?php echo $rows["CMND"] ?></td>
                                <td><?php echo $rows["ID_BHYT"] ?></td>
                                <td><?php echo $rows["StatusAppointment"] ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>