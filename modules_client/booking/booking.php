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
        WHERE p.UserName='$username' AND a.StatusAppointment LIKE'Chờ khám'
        ORDER BY ID_Appointment DESC";
    $query_appointment = mysqli_query($conn, $sql_appointment);
?>


<section class="doctorList">
    <h1> Danh sách đặt lịch </h1>
    <?php if(mysqli_num_rows($query_appointment)>0){?>
        <div class="container-appointment">
            <div class="content-appointment">
                <table>
                    <tr>
                        <th>Mã số phiếu</th>
                        <th>Bác sĩ phụ trách</th>
                        <th>Phòng</th>
                        <th>Khoa</th>
                        <th>Ngày đăng ký</th>
                        <th>Ngày tới khám</th>
                        <th>Trạng thái</th>
                        <th>Hủy</th>
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
                        <td> <?php echo $rows_appointment['StatusAppointment'] ?> </td>
                        <td> <a onclick="confirm_Del('<?php echo $rows_appointment['ID_Appointment'] ?>')"  href="./modules_client/booking/cancel.php?ID_Appointment=<?php echo $rows_appointment['ID_Appointment'] ?>" id="cancelAppointment">Hủy lịch</a> </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php } else {?>
        <div><p style="text-align:center"><b >Đặt lịch của bạn hiện đang trống</b></p></div>
    <?php } ?>
</section>

<script>
    function confirm_Del(name){
        	return confirm("Bạn có chắc muốn hủy đặt hẹn "+ name + "?");
    	}
</script>
