<?php
    include './config.php';

    if(!isset($_SESSION['login_client'])){
        header('location: ./modules_client/login-signin/loginForm.php');
    }

    $username = $_SESSION['login_client'];

    $sql_appointment = "SELECT *
        FROM patient p JOIN appointment a ON p.ID_Patient=a.ID_Patient
            JOIN staff s ON a.ID_Staff=s.ID_Staff
            JOIN schedule sh ON sh.ID_schedule=a.Date_Checkup
            JOIN room r ON r.ID_Room=sh.ID_Room
            JOIN dept d ON d.ID_Dept=s.ID_Dept
            -- JOIN paymentmethod ON appointment.ID_PaymentMethod=paymentmethod.ID_PaymentMethod
        WHERE p.UserName='$username' AND a.StatusAppointment NOT LIKE'Chờ khám'
        ORDER BY ID_Appointment DESC";
    $query_appointment = mysqli_query($conn, $sql_appointment);
    $query_info = mysqli_query($conn, $sql_appointment);
    $rows_info = mysqli_fetch_array($query_info);
?>


<section class="doctorList">
    <h1> Sổ khám chữa bệnh </h1>
    <?php if(mysqli_num_rows($query_appointment)>0){?>
        <div class="container-appointment">
            <div class="content-appointment">
                <h3><?php echo $rows_info['Name'] ?></h3>
                <h4>Mã BHYT: <?php echo $rows_info['ID_BHYT'] ?></h4>
                <table>
                    <tr>
                        <th>Mã số phiếu</th>
                        <th>Bác sĩ phụ trách</th>
                        <th>Phòng</th>
                        <th>Khoa</th>
                        <th>Ngày đăng ký</th>
                        <th>Ngày tới khám</th>
                        <th>Ngày ra viện</th>
                        <th>Ngày tái khám</th>
                        <th>Phương thức thanh toán</th>
                        <th>Số tiền</th>
                        <th>Trạng thái</th>
                        <th>Xem thông tin</th>
                    </tr>
                    <?php
                        $STT = 0;
                        while($rows_appointment = mysqli_fetch_array($query_appointment)){
                    ?>
                    <tr>
                        <td> <?php echo $rows_appointment['ID_Appointment'] ?> </td>
                        <input type="hidden" name="" id="" value="<?php echo $row_order['MSHH'] ?>">
                        <td> <?php echo $rows_appointment['Name_Staff'] ?> </td>
                        <td> <?php echo $rows_appointment['Name_Room'] ?> </td>
                        <td> <?php echo $rows_appointment['Name_Dept'] ?> </td>
                        <td> <?php echo $rows_appointment['Date_Booking'] ?> </td>
                        <td> <?php echo $rows_appointment['start'] ?> </td>
                        <td> <?php echo $rows_appointment['Date_HospitalDischarge'] ?> </td>
                        <td> <?php echo $rows_appointment['Date_ReCheckup'] ?> </td>
                        <td> # </td>
                        <td> # </td>
                        <td> <?php echo $rows_appointment['StatusAppointment'] ?> </td>
                        <?php if($rows_appointment['StatusAppointment'] == 'Đã khám'){ ?>
                        <td>
                            <a class="button_edit_product" href="./index.php?page_layout=prescription&ID_Appointment=<?php echo $rows_appointment['ID_Appointment'] ?>">Xem</a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php } else {?>
        <div><b>Đặt lịch của bạn hiện đang trống</b></div>
    <?php } ?>
</section>