<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="">Danh sách chờ khám</a>
            </div>
            <div class="card-header">
                <h2>Danh sách bệnh nhân chờ khám</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Tên bệnh nhân</th>
                            <th>Thời gian hẹn</th>
                            <th>Số phiếu</th>
                            <th>Năm sinh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>CMND</th>
                            <th>BHYT</th>
                            <th>Trạng thái</th>
                            <th>Nhận bệnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                include './../config.php';
                                $sql = "SELECT * FROM appointment 
                                JOIN patient ON appointment.ID_Patient=patient.ID_Patient 
                                JOIN schedule ON schedule.ID_schedule=appointment.Date_Checkup";
                                $count_order=0;
                                $query = mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($query)){ ?>
                                <tr>
                                    <td><?php echo ++$count_order ?></td>
                                    <td><?php echo $rows["Name"] ?></td>
                                    <td><?php echo $rows["start"] ?></td>
                                    <td><?php echo $rows["ID_Appointment"] ?></td>
                                    <td><?php echo $rows["DOB"] ?></td>
                                    <td><?php echo $rows["Address"] ?></td>
                                    <td><?php echo $rows["PhoneNumber"] ?></td>
                                    <td><?php echo $rows["CMND"] ?></td>
                                    <td><?php echo $rows["ID_BHYT"] ?></td>
                                    <td><?php echo $rows["StatusAppointment"] ?></td>
                                    <td>
                                        <a  onclick="return confirm_Del('<?php echo $rows['Name'] ?>')"
                                        href="./index.php?page_layout=checkup&ID_Appointment=<?php echo $rows["ID_Appointment"] ?>"
                                        style="background-color: green;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                            Thực hiện
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

<script>
    function confirm_Del(name){
        return confirm("Bạn nhận bệnh từ "+ name + " không ?");
    }
</script>