<?php
    include './../config.php';

    $ID_Patient = $_GET['ID_Patient'];

    $sql = "SELECT * FROM appointment JOIN patient ON appointment.ID_Patient=patient.ID_Patient";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);
                
?>

<main>
    <div class="container-table">
        <div class="link-nav-pages">
            <a href="./index.php?page_layout=patient_management">Quản lý bệnh nhân</a> / 
            <a href="">Hồ sơ bệnh nhân</a>
        </div>
        <div class="table-header">
            <h1>Hồ sơ bệnh nhân <?php echo $rows['Name'] ?></h1>
        </div>
        <div class="personalInfo">
                
                <table class="personalInfoTable">
                    <tr>
                        <th>Mã bệnh nhân: </th>
                        <td><?php echo $rows['ID_Patient'] ?></td>
                        <th>Họ và tên: </th>
                        <td><?php echo $rows['Name'] ?></td>
                        <th>Giới tính: </th>
                        <td><?php echo $rows['Sex'] ?></td>
                    </tr>
                    <tr>
                        <th>Ngày sinh: </th>
                        <td><?php
                            echo date('d-m-Y', strtotime($rows['DOB'])); ?></td>
                        <th>Tuổi: </th>
                        <td><?php  
                            $date = getdate(); 
                            echo $date['year'] - substr($rows['DOB'],0,4);
                        ?></td>
                        <th>Số điện thoại: </th>
                        <td><?php echo $rows['PhoneNumber'] ?></td>
                    </tr>
                    <tr>
                        <th>CMND: </th>
                        <td><?php echo $rows['CMND'] ?></td>
                        <th>BHYT: </th>
                        <td><?php echo $rows['ID_BHYT'] ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ: </th>
                        <td colspan="5"><?php echo $rows['Address'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="record">
                <div class="summary">
                    <div class="summary-content">
                        <h3>Số lượt đăng ký khám</h3>
                        <table class="personalInfoTable recordTable">
                            <tr>
                                <th>Mã số phiếu</th>
                                <th>Ngày đăng ký</th>
                                <th>Ngày xuất viện</th>
                                <th>Đối tượng</th>
                                <th>Xem</th>
                            </tr>
                            <?php
                                    $sql_appointment = "SELECT * FROM appointment 
                                    JOIN schedule ON schedule.ID_schedule=appointment.Date_Checkup
                                    JOIN staff ON staff.ID_Staff=appointment.ID_Staff
                                    JOIN medicalrecord ON medicalrecord.ID_Appointment=appointment.ID_Appointment
                                    ORDER BY appointment.ID_Appointment DESC";
                                    $query_appointment = mysqli_query($conn, $sql_appointment);
                                    while($rows_appointment = mysqli_fetch_array($query_appointment)){
                                ?>
                            <tr>
                                <td><?php echo $rows_appointment['ID_Appointment'] ?></td>
                                <td><?php echo $rows_appointment['start'] ?></td>
                                <td><?php echo $rows_appointment['Date_HospitalDischarge'] ?></td>
                                <td><?php if($rows_appointment['BHYT_Checkin']==1) echo 'BHYT';?></td>
                                <td><a href="./index.php?page_layout=patient_management&ID_Patient=<?php echo $ID_Patient ?>&ID_Appointment=<?php echo $rows_appointment['ID_Appointment'] ?>">Xem</a></td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </table>
                    </div>
                    <br>
                    <div class="summary-content">
                        <h3>Số lần nhập viện</h3>
                        <table class="personalInfoTable recordTable">
                            <tr>
                                <th>Mã số phiếu</th>
                                <th>Ngày đăng ký</th>
                                <th>Ngày xuất viện</th>
                                <th>Khoa điều trị</th>
                                <th>Đối tượng</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php include './modules_admin/patient_management/detailRecord.php'; ?>
            </div>
    </div>
</main>