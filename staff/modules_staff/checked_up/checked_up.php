<?php
    include './../config.php';

    $ID_Patient = $_GET['ID_Patient'];
    $login_staff = $_SESSION['login_staff'];

    $sql = "SELECT * FROM appointment 
            JOIN patient ON appointment.ID_Patient=patient.ID_Patient 
            JOIN schedule ON schedule.ID_schedule=appointment.Date_Checkup
            JOIN staff ON staff.ID_Staff=appointment.ID_Staff
            JOIN medicalrecord ON medicalrecord.ID_Appointment=appointment.ID_Appointment
            JOIN diagnose ON diagnose.ID_MedicalRecord=medicalrecord.ID_MedicalRecord
            JOIN disease ON disease.ID_Disease=diagnose.ID_Disease
            WHERE staff.UserName='$login_staff'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);

    // $login_staff = $_SESSION['login_staff'];
    // echo $login_staff;
?>

<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="./index.php?page_layout=list_checked_up">Bệnh nhân đã khám</a> / 
                <a href="">Hồ sơ bệnh nhân</a>
            </div>
            <div class="card-header">
                <h2>Hồ sơ bệnh nhân</h2>
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
                            <tr>
                                <td><?php echo $rows['ID_Appointment'] ?></td>
                                <td><?php echo $rows['start'] ?></td>
                                <td><?php echo $rows['Date_HospitalDischarge'] ?></td>
                                <td><?php if($rows['BHYT_Checkin']==1) echo 'BHYT';?></td>
                                <td><a href="./index.php?page_layout=checked_up&ID_Patient=<?php echo $ID_Patient ?>&ID_Appointment=<?php echo $rows['ID_Appointment'] ?>">Xem</a></td>
                            </tr>
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
                <?php include './modules_staff/checked_up/detailRecord.php'; ?>
            </div>
        </div>
    </div>
</main>