<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php 
    include './../config.php'; 
    $UserName = $_SESSION['login_staff'];
?>

<main>
    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Hi! <?php echo $_SESSION['login_staff'] ?></h1>
                <p>Chào mừng đến với trang dành cho nhân viên IMETS</p>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
            <?php
                $sql_countPatient = "SELECT DISTINCT appointment.ID_Patient
                    FROM  appointment JOIN staff ON staff.ID_Staff=appointment.ID_Staff
                    WHERE staff.UserName='$UserName'";
                $query_countPatient = mysqli_query($conn, $sql_countPatient);
                $count=0;
                while($rows_countPatient = mysqli_fetch_array($query_countPatient)){
                    ++$count;
                }
            ?>
            <div class="card">
                <i class="fas fa-heart fa-2x text-red" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Bệnh nhân đã khám</p>
                    <span class="font-bold text-title"><?php echo $count ?></span>
                </div>
            </div>

            <?php
                $sql_evaluation = "SELECT COUNT(appointment.ID_Appointment) AS soluongDK,COUNT(evaluation.ID_Evaluation) AS soluongDG
                    FROM `evaluation` JOIN appointment ON evaluation.ID_Appointment=appointment.ID_Appointment
                        JOIN staff ON staff.ID_Staff=appointment.ID_Staff
                    WHERE staff.UserName='$UserName'";
                $query_evaluation = mysqli_query($conn, $sql_evaluation);
                $rows_evaluation = mysqli_fetch_array($query_evaluation);
            ?>

            <div class="card">
                <i class="fas fa-medkit fa-2x text-lightblue" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Số ca khám</p>
                    <span class="font-bold text-title"><?php echo $rows_evaluation['soluongDK'] ?></span>
                </div>
            </div>

            

            <div class="card">
                <?php
                    $sql_starVoting = "SELECT VoteRate FROM staff WHERE UserName='$UserName'";
                    $query_starVoting = mysqli_query($conn, $sql_starVoting);
                    $rows_starVoting = mysqli_fetch_array($query_starVoting);
                ?>
                <i class="fa fa-star fa-2x text-yellow" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Tỉ lệ tín nhiệm</p>
                    <span class="font-bold text-title"><?php echo $rows_starVoting['VoteRate'] ?></span>
                </div>
            </div>

            <div class="card">
                
                <i class="fa fa-thumbs-up fa-2x text-green" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Lượt đánh giá</p>
                    <span class="font-bold text-title"><?php echo $rows_evaluation['soluongDG'] ?></span>
                </div>
            </div>
        </div>
        <!-- MAIN CARDS ENDS HERE -->

        <!-- CHARTS STARTS HERE -->
        <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                    <h1>Số ca khám trong năm</h1>
                    <p>IMETS</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <canvas id="myChart" width="200" height="130"></canvas>
            </div>

            <div class="charts__right">
                <div class="charts__right__title">
                    <div>
                        <h1>Lịch làm việc hôm nay</h1>
                        <p>IMETS</p>
                    </div>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
              
              <div class="charts__right__cards">
                <div class="schedule">
                    <ul class="a">
                        <?php
                            $sql_schedule = "SELECT schedule.title,TIME(schedule.start) AS start,TIME(schedule.end) AS end
                            FROM `schedule` JOIN staff ON schedule.ID_Staff=staff.ID_Staff
                            WHERE DATE(start)=DATE(NOW()) AND start>=TIME(NOW()) AND staff.UserName='$UserName'
                            ORDER BY schedule.start ASC";
                            $query_schedule = mysqli_query($conn, $sql_schedule);
                            while($rows_schedule = mysqli_fetch_array($query_schedule)){
                        ?>
                        <li>
                            <?php echo $rows_schedule['title'] ?>
                            <div class="schedule-time">
                                <?php echo $rows_schedule['start']?> -
                                <?php echo $rows_schedule['end'] ?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
              </div>
            </div>
        </div>
        <!-- CHARTS ENDS HERE -->
    </div>
</main>

<?php 

    //Bieu do doanh so
    $appointment= '';

    $sql_appointment = "SELECT MONTH(appointment.Date_HospitalDischarge), COUNT(*) AS soluong
                FROM appointment JOIN staff ON appointment.ID_Staff=staff.ID_Staff 
                WHERE staff.UserName='chae' AND appointment.StatusAppointment='Đã khám'
                GROUP BY MONTH(appointment.Date_HospitalDischarge);";
    $query_appointment = mysqli_query($conn, $sql_appointment);

    while($rows_appointment = mysqli_fetch_array($query_appointment)){
        $appointment = $appointment . '"' . $rows_appointment['soluong']. '",';
    }

    $appointment = trim($appointment,",");

?>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'ca khám ngoại',
                data: [<?php echo $appointment; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
                // this dataset is drawn below
                order: 2
            }],
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
        },
    });
</script>