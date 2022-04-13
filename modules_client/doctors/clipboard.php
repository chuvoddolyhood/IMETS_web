<?php
    include './config.php';
    $UserName = $_SESSION['login_client'];
    $sql_get_infoPatient = "SELECT * FROM `patient` WHERE UserName='$UserName'";
    $query_get_infoPatient = mysqli_query($conn, $sql_get_infoPatient);
	$rows_get_infoPatient = mysqli_fetch_array($query_get_infoPatient);

    $ID_Staff = $_GET['ID_Staff'];
    $date = $_GET['date'];
    $sql_get_infoStaff = "SELECT * FROM `staff` s JOIN dept d ON s.ID_Dept=d.ID_Dept WHERE ID_Staff=$ID_Staff";
    $query_get_infoStaff = mysqli_query($conn, $sql_get_infoStaff);
	$rows_get_infoStaff = mysqli_fetch_array($query_get_infoStaff);
?>

<section class="doctorList">
    <h1> Đặt lịch khám bệnh ngày <?php echo $date ?> </h1>
    <table>
        <tr>
            <th>Bệnh nhân:</th>
            <td colspan=5><?php echo $rows_get_infoPatient['Name'] ?></td>
            <th>MSBN</th>
            <td><?php echo $rows_get_infoPatient['ID_Patient'] ?></td>
        </tr>
        <tr>
            <th>Năm sinh</th>
            <td><?php echo $rows_get_infoPatient['DOB'] ?></td>
            <td></td>
            <th>Giới tính</th>
            <td><?php echo $rows_get_infoPatient['Sex'] ?></td>
        </tr>
        <tr>
            <th>BHYT</th>
            <td><?php echo $rows_get_infoPatient['ID_BHYT'] ?></td>
            <td></td>
            <th>Số điện thoại</th>
            <td><?php echo $rows_get_infoPatient['PhoneNumber'] ?></td>
            <td></td>
            <th>CMND</th>
            <td><?php echo $rows_get_infoPatient['CMND'] ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td colspan=8><?php echo $rows_get_infoPatient['Address'] ?></td>
        </tr>
        <tr colspan=9></tr>
        <tr>
            <th>Bác sĩ</th>
            <td colspan=5><?php echo $rows_get_infoStaff['Name_Staff'] ?></td>
            <th>MSNV</th>
            <td><?php echo $_GET['ID_Staff'];?></td>
        </tr>
        <tr>
            <th>Chuyên khoa</th>
            <td colspan=2><?php echo $rows_get_infoStaff['Name_Dept'];?></td>
        </tr>
        <tr></tr>

        <!-- Buoi Sang -->
        <?php
            $sql_get_schedule_sang="SELECT st.Name_Staff,r.Name_Room,d.Name_Dept, s.start AS start
                FROM schedule s JOIN staff st ON s.ID_Staff=st.ID_Staff
                    JOIN room r ON r.ID_Room=s.ID_Room
                    JOIN dept d ON d.ID_Dept=r.ID_Dept
                WHERE st.ID_Staff=$ID_Staff AND s.Session='Sáng' AND DATE(s.start)='$date'";
            $query_get_schedule_sang_1 = mysqli_query($conn, $sql_get_schedule_sang);
            $rows_get_schedule_sang_1 = mysqli_fetch_array($query_get_schedule_sang_1);
            $query_get_schedule_sang = mysqli_query($conn, $sql_get_schedule_sang);
            if(mysqli_num_rows($query_get_schedule_sang_1)>0){
        ?>
        <tr>
            <th colspan=2>Sáng</th>
            <th>Phòng</th>
            <td><?php echo $rows_get_schedule_sang_1['Name_Room'] ?></td>
            <th>Khoa</th>
            <td><?php echo $rows_get_schedule_sang_1['Name_Dept'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <?php
                while($rows_get_schedule_sang = mysqli_fetch_array($query_get_schedule_sang)){
            ?>
            <td class="time"><?php echo substr($rows_get_schedule_sang['start'],11) ?></td>

            <?php } ?>
        </tr>
        <?php } ?>
        <tr></tr>

        <!-- Buoi Chiều -->
        <?php
            $sql_get_schedule_chieu="SELECT st.Name_Staff,r.Name_Room,d.Name_Dept, s.start AS start
                FROM schedule s JOIN staff st ON s.ID_Staff=st.ID_Staff
                    JOIN room r ON r.ID_Room=s.ID_Room
                    JOIN dept d ON d.ID_Dept=r.ID_Dept
                WHERE st.ID_Staff=$ID_Staff AND s.Session='Chiều' AND DATE(s.start)='$date'";
            $query_get_schedule_chieu_1 = mysqli_query($conn, $sql_get_schedule_chieu);
            $rows_get_schedule_chieu_1 = mysqli_fetch_array($query_get_schedule_chieu_1);
            $query_get_schedule_chieu = mysqli_query($conn, $sql_get_schedule_chieu);
            if(mysqli_num_rows($query_get_schedule_chieu_1)>0){
        ?>
        <tr>
            <th colspan=2>Chiều</th>
            <th>Phòng</th>
            <td><?php echo $rows_get_schedule_chieu_1['Name_Room'] ?></td>
            <th>Khoa</th>
            <td><?php echo $rows_get_schedule_chieu_1['Name_Dept'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <?php
                while($rows_get_schedule_chieu = mysqli_fetch_array($query_get_schedule_chieu)){
            ?>
            <td class="time"><?php echo substr($rows_get_schedule_chieu['start'],11) ?></td>

            <?php } ?>
        </tr>
        <?php } ?>
        <tr colspan=8></tr>

        <!-- Ngoài giờ -->
        <?php
            $sql_get_schedule_ngoaigio="SELECT st.Name_Staff,r.Name_Room,d.Name_Dept, s.start AS start
                FROM schedule s JOIN staff st ON s.ID_Staff=st.ID_Staff
                    JOIN room r ON r.ID_Room=s.ID_Room
                    JOIN dept d ON d.ID_Dept=r.ID_Dept
                WHERE st.ID_Staff=$ID_Staff AND s.Session='Ngoài giờ' AND DATE(s.start)='$date'";
            $query_get_schedule_ngoaigio_1 = mysqli_query($conn, $sql_get_schedule_ngoaigio);
            $rows_get_schedule_ngoaigio_1 = mysqli_fetch_array($query_get_schedule_ngoaigio_1);
            $query_get_schedule_ngoaigio = mysqli_query($conn, $sql_get_schedule_ngoaigio);
            if(mysqli_num_rows($query_get_schedule_ngoaigio_1)>0){
        ?>
        <tr>
            <th colspan=2>Ngoài giờ</th>
            <th>Phòng</th>
            <td><?php echo $rows_get_schedule_ngoaigio_1['Name_Room'] ?></td>
            <th>Khoa</th>
            <td><?php echo $rows_get_schedule_ngoaigio_1['Name_Dept'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <?php
                while($rows_get_schedule_ngoaigio = mysqli_fetch_array($query_get_schedule_ngoaigio)){
            ?>
            <td class="time"><?php echo substr($rows_get_schedule_ngoaigio['start'],11) ?></td>

            <?php } ?>
        </tr>
        <?php } ?>

        <tr>
            <td>
                <select name="" id="typeMedicalCheck">
                    <option value="1">Khám theo BHYT</option>
                    <option value="0">Khám dịch vụ</option>
                </select>
            </td>    
        </tr>
    </table>
    <div>
        <button onclick="book()">Đặt lịch</button>
        <button>Hủy bỏ</button>
    </div>
</section>

<input type="hidden" id="date" value="<?php echo $date ?>">
<input type="hidden" id="ID_Staff" value="<?php echo $ID_Staff ?>">
<input type="hidden" id="session_client" value="<?php echo $_SESSION['login_client'] ?>">

<script type="text/javascript">
    //Chon thoi gian
    const times = document.querySelectorAll('.time');
    function changeTime(){
        times.forEach(time => time.classList.remove('active'));
        this.classList.add('active');
    }
    times.forEach(time => time.addEventListener('click', changeTime));


    function book(){
        time = document.querySelector(".active").innerHTML;
        
        //Lay gia tri trong select
        e = document.getElementById("typeMedicalCheck");
        type = e.options[e.selectedIndex].text;

        date = document.getElementById('date').value;
        ID_Staff = document.getElementById('ID_Staff').value;
        session_client = document.getElementById('session_client').value;
        // alert(time+date+ID_Staff+session_client+type);

        //call ajax
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "./modules_client/doctors/appointment.php?time="+time+"&date="+date+"&ID_Staff="+ID_Staff+"&session_client="+session_client+"&type="+type;
        var asynchronous = true;
        ajax.open(method, url, asynchronous);

        //send
        ajax.send();
            
        //receive
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                // alert(response);
                if(response=='true'){
                    window.location.href='./index.php?page_layout=booking';
                }
            }
        }
    }
</script>