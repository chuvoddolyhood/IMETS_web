<main>
    <div class="container-table">
        <div class="link-nav-pages">
            <a href="">Quản lý bệnh nhân</a>
        </div>
        <div class="table-header">
            <h1>Danh sách thông tin bệnh nhân</h1>
        </div>
        <div class="table-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSBN</th>
                        <th>Họ tên</th>
                        <th>Năm sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>CMND</th>
                        <th>Số điện thoại</th>
                        <th>BHYT</th>
                        <th>Xem thông tin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './../config.php';
                            $sql = "SELECT * FROM patient";
                            $count_patient=0;
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["ID_Patient"] ?></td>
                                <td><?php echo $rows["Name"] ?></td>
                                <td><?php echo $rows["DOB"] ?></td>
                                <td><?php echo $rows["Sex"] ?></td>
                                <td><?php echo $rows["Address"] ?></td>
                                <td><?php echo $rows["CMND"] ?></td>
                                <td><?php echo $rows["PhoneNumber"] ?></td>
                                <td><?php echo $rows["ID_BHYT"] ?></td>
                                <?php $count_patient++ ?>
                                <td>
                                    <a href="./index.php?page_layout=patient_management&ID_Patient=<?php echo $rows["ID_Patient"] ?>" style="background-color: green;color: white;padding: 8px 10px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                        Xem
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
            <p><b><?php echo 'Số lượng bệnh nhân: '. $count_patient ?></b></p>
        </div>
    </div>
</main>