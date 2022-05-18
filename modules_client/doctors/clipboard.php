<?php
    include './config.php';
    $UserName = $_SESSION['login_client'];
    $sql_get_infoPatient = "SELECT * FROM `patient` WHERE UserName='$UserName'";
    $query_get_infoPatient = mysqli_query($conn, $sql_get_infoPatient);
	$rows_get_infoPatient = mysqli_fetch_array($query_get_infoPatient);

    $ID_Staff = $_GET['ID_Staff'];
    $date = $_GET['date'];
    $sql_get_infoStaff = "SELECT * FROM `staff` s 
        JOIN dept d ON s.ID_Dept=d.ID_Dept 
        JOIN img_staff ON s.ID_Staff=img_staff.ID_Staff
        WHERE s.ID_Staff=$ID_Staff";
    $query_get_infoStaff = mysqli_query($conn, $sql_get_infoStaff);
	$rows_get_infoStaff = mysqli_fetch_array($query_get_infoStaff);
?>

<section class="doctorList">
    <h1> Đặt lịch khám bệnh ngày <?php echo date('d-m-Y', strtotime($date)); ?> </h1>
    <div class="imagebox">
        <div class="container-card">
            <div class="card">
                <div class="card-image"> 
                    <img src="./staff/modules_staff/photo/avatar.svg">
                </div>
                <h2><?php echo $rows_get_infoPatient["Name"] ?></h2>
                <h3>Bệnh nhân</h3>
                <h3>MSBN: <?php echo $rows_get_infoPatient["ID_Patient"] ?></h3>
                <h3>Năm sinh: <?php echo date('d-m-Y', strtotime($rows_get_infoPatient["DOB"]))  ?></h3>
                <h3>Giới tính: <?php echo $rows_get_infoPatient["Sex"] ?></h3>
                <h3>BHYT: <?php echo $rows_get_infoPatient["ID_BHYT"] ?></h3>
                    
                <div class="rating-slider">
                    <?php
                        $numberOfStar = round($rows_get_infoPatient["VoteRate"]);
                            // echo 'full:'.$numberOfStar;
                        $fullStart=0;
                        while($fullStart < $numberOfStar){
                            $fullStart++;
                        ?>
                            <i class="fas fa-star"></i>
                    <?php } 
                        $numberOfStar_empty = 5-round($rows_get_infoPatient["VoteRate"]);
                        // echo 'empty:'.$numberOfStar_empty;
                        $i=0;
                        while($i < $numberOfStar_empty){
                            $i++;
                    ?>
                        <i class="far fa-star"></i>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="text-img">
            <h1 class="animate__animated animate__jello animate__infinite infinite">Kết nối với bác sĩ ngay...</h1>
        </div>
        <div class="container-card">
            <div class="card">
                <div class="card-image"> 
                    <img src="./img/staff/<?php echo $rows_get_infoStaff["imgName"] ?>">
                </div>
                <h2><?php echo $rows_get_infoStaff["Name_Staff"] ?></h2>
                <h3>MSNV: <?php echo $rows_get_infoStaff["ID_Staff"] ?></h3>
                <h3><?php echo $rows_get_infoStaff["Position"] ?></h3>
                <h3><?php echo $rows_get_infoStaff["Name_Dept"] ?></h3>
                    
                <div class="rating-slider">
                    <?php
                        $numberOfStar = round($rows_get_infoStaff["VoteRate"]);
                            // echo 'full:'.$numberOfStar;
                        $fullStart=0;
                        while($fullStart < $numberOfStar){
                            $fullStart++;
                        ?>
                            <i class="fas fa-star"></i>
                    <?php } 
                        $numberOfStar_empty = 5-round($rows_get_infoStaff["VoteRate"]);
                        // echo 'empty:'.$numberOfStar_empty;
                        $i=0;
                        while($i < $numberOfStar_empty){
                            $i++;
                    ?>
                        <i class="far fa-star"></i>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <h2>Thời gian làm việc</h2>
    <div class="table-schedule">
        <div class="session">
            <!-- Buoi Sang -->
            <?php
                $sql_get_schedule_sang="SELECT st.Name_Staff,r.Name_Room,d.Name_Dept, s.start AS start
                    FROM schedule s JOIN staff st ON s.ID_Staff=st.ID_Staff
                        JOIN room r ON r.ID_Room=s.ID_Room
                        JOIN dept d ON d.ID_Dept=r.ID_Dept
                    WHERE st.ID_Staff=$ID_Staff AND s.Session='Sáng' AND DATE(s.start)='$date' AND s.status_schedule NOT LIKE 'Có lịch' AND s.start>NOW()";
                $query_get_schedule_sang_1 = mysqli_query($conn, $sql_get_schedule_sang);
                $rows_get_schedule_sang_1 = mysqli_fetch_array($query_get_schedule_sang_1);
                $query_get_schedule_sang = mysqli_query($conn, $sql_get_schedule_sang);
                if(mysqli_num_rows($query_get_schedule_sang_1)>0){
            ?>
            <div id="header-schedule">
                <p>Sáng</p>
                <p>Phòng: <?php echo $rows_get_schedule_sang_1['Name_Room'] ?></p>
                <p>Khoa: <?php echo $rows_get_schedule_sang_1['Name_Dept'] ?></p>
            </div>
            <div id="time-schedule">
                <?php
                    while($rows_get_schedule_sang = mysqli_fetch_array($query_get_schedule_sang)){
                ?>
                <button class="time"><?php echo substr($rows_get_schedule_sang['start'],11) ?></button>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="session">
            <!-- Buoi chieu -->
            <?php
                $sql_get_schedule_sang="SELECT st.Name_Staff,r.Name_Room,d.Name_Dept, s.start AS start
                    FROM schedule s JOIN staff st ON s.ID_Staff=st.ID_Staff
                        JOIN room r ON r.ID_Room=s.ID_Room
                        JOIN dept d ON d.ID_Dept=r.ID_Dept
                    WHERE st.ID_Staff=$ID_Staff AND s.Session='Chiều' AND DATE(s.start)='$date' AND s.status_schedule NOT LIKE 'Có lịch' AND s.start>NOW()";
                $query_get_schedule_sang_1 = mysqli_query($conn, $sql_get_schedule_sang);
                $rows_get_schedule_sang_1 = mysqli_fetch_array($query_get_schedule_sang_1);
                $query_get_schedule_sang = mysqli_query($conn, $sql_get_schedule_sang);
                if(mysqli_num_rows($query_get_schedule_sang_1)>0){
            ?>
            <div id="header-schedule">
                <p>Chiều</p>
                <p>Phòng: <?php echo $rows_get_schedule_sang_1['Name_Room'] ?></p>
                <p>Khoa: <?php echo $rows_get_schedule_sang_1['Name_Dept'] ?></p>
            </div>
            <div id="time-schedule">
                <?php
                    while($rows_get_schedule_sang = mysqli_fetch_array($query_get_schedule_sang)){
                ?>
                <button class="time"><?php echo substr($rows_get_schedule_sang['start'],11) ?></button>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="session">
            <!-- Buoi chieu -->
            <?php
                $sql_get_schedule_sang="SELECT st.Name_Staff,r.Name_Room,d.Name_Dept, s.start AS start
                    FROM schedule s JOIN staff st ON s.ID_Staff=st.ID_Staff
                        JOIN room r ON r.ID_Room=s.ID_Room
                        JOIN dept d ON d.ID_Dept=r.ID_Dept
                    WHERE st.ID_Staff=$ID_Staff AND s.Session='Ngoài giờ' AND DATE(s.start)='$date' AND s.status_schedule NOT LIKE 'Có lịch' AND s.start>NOW()";
                $query_get_schedule_sang_1 = mysqli_query($conn, $sql_get_schedule_sang);
                $rows_get_schedule_sang_1 = mysqli_fetch_array($query_get_schedule_sang_1);
                $query_get_schedule_sang = mysqli_query($conn, $sql_get_schedule_sang);
                if(mysqli_num_rows($query_get_schedule_sang_1)>0){
            ?>
            <div id="header-schedule">
                <p>Tối</p>
                <p>Phòng: <?php echo $rows_get_schedule_sang_1['Name_Room'] ?></p>
                <p>Khoa: <?php echo $rows_get_schedule_sang_1['Name_Dept'] ?></p>
            </div>
            <div id="time-schedule">
                <?php
                    while($rows_get_schedule_sang = mysqli_fetch_array($query_get_schedule_sang)){
                ?>
                <button class="time"><?php echo substr($rows_get_schedule_sang['start'],11) ?></button>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div>
            <select name="" id="typeMedicalCheck">
                <option>Khám theo BHYT</option>
                <option>Khám dịch vụ</option>
            </select>
        </div>
    </div>                 
    
    <div class="clipboard-button">
        <a onclick="book()">Đặt lịch</a>
        <a href="index.php?page_layout=doctors">Hủy bỏ</a>
    </div>
</section>

<input type="hidden" id="date" value="<?php echo $date ?>">
<input type="hidden" id="ID_Staff" value="<?php echo $ID_Staff ?>">
<input type="hidden" id="session_client" value="<?php echo $_SESSION['login_client'] ?>">
<input type="hidden" id="timedemo" value="null">

<script type="text/javascript">
    //Chon thoi gian
    const times = document.querySelectorAll('.time');
    function changeTime(){
        times.forEach(time => time.classList.remove('active'));
        this.classList.add('active');
        checkTime();
    }
    times.forEach(time => time.addEventListener('click', changeTime));

    function checkTime(){
        time = document.querySelector(".active").innerHTML;
        document.querySelector("#timedemo").value=time;
    }


    function book(){
        time = document.getElementById('timedemo').value;
        
        //Lay gia tri trong select
        e = document.getElementById("typeMedicalCheck");
        type = e.options[e.selectedIndex].text;

        date = document.getElementById('date').value;
        ID_Staff = document.getElementById('ID_Staff').value;
        session_client = document.getElementById('session_client').value;
        // alert(time+date+ID_Staff+session_client+type);


        if(time=='null'){
            alert('Vui lòng chọn thời gian.');
        } else {
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
                    } else {
                        alert(response);
                    }
                }
            }
        }
    }
</script>